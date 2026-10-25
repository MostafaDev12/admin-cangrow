// Uses Chromium's pipe protocol directly: no browser package or repository dependency installation.
const {spawn} = require('child_process');
const fs = require('fs');
const path = require('path');
const directory = process.argv[2];
const suffix = Date.now().toString();
const workflowOnly = process.argv.includes('--workflow-only');
const browser = spawn('C:\\Program Files (x86)\\Microsoft\\Edge\\Application\\msedge.exe', ['--headless=new','--remote-debugging-pipe','--no-first-run','--disable-background-networking','--ignore-certificate-errors',`--user-data-dir=${path.join(directory,'edge-profile-'+suffix)}`], {windowsHide:true, stdio:['ignore','ignore','ignore','pipe','pipe']});
let sequence = 0, buffered = '';
const pending = new Map();
const exceptions = [];
browser.stdio[4].on('data', chunk => {
    buffered += chunk;
    let end;
    while ((end = buffered.indexOf('\0')) >= 0) {
        const raw = buffered.slice(0,end); buffered = buffered.slice(end+1);
        if (!raw) continue;
        const message = JSON.parse(raw);
        if (message.method === 'Runtime.exceptionThrown') {
            const details = message.params.exceptionDetails;
            exceptions.push({url:details.url, text:details.exception?.description || details.text});
        }
        if (pending.has(message.id)) {
            const {resolve,reject,timer} = pending.get(message.id); clearTimeout(timer); pending.delete(message.id);
            message.error ? reject(new Error(message.error.message)) : resolve(message.result);
        }
    }
});
function send(method, params = {}, sessionId) {
    return new Promise((resolve,reject) => {
        const id = ++sequence;
        const timer = setTimeout(() => {pending.delete(id); reject(new Error(`Timeout: ${method}`));},20000);
        pending.set(id,{resolve,reject,timer}); browser.stdio[3].write(JSON.stringify({id,method,params,sessionId})+'\0');
    });
}
const wait = ms => new Promise(resolve => setTimeout(resolve,ms));
(async () => {
    const {targetId} = await send('Target.createTarget',{url:'about:blank'});
    const {sessionId} = await send('Target.attachToTarget',{targetId,flatten:true});
    const cdp = (method,params={}) => send(method,params,sessionId);
    const evaluate = async expression => {
        const response = await cdp('Runtime.evaluate',{expression,awaitPromise:true,returnByValue:true});
        if (response.exceptionDetails) throw new Error(response.exceptionDetails.exception?.description || response.exceptionDetails.text);
        return response.result.value;
    };
    await cdp('Page.enable'); await cdp('Network.enable'); await cdp('Runtime.enable');
    await cdp('Network.setBlockedURLs',{urls:['*googletagmanager*','*google-analytics*','*doubleclick*','*facebook.com*','*youtube.com*']});
    await cdp('Emulation.setDeviceMetricsOverride',{width:1440,height:1000,deviceScaleFactor:1,mobile:false});
    const results = [];
    async function inspect(name,url) {
        await cdp('Page.navigate',{url});
        for (let i=0;i<60;i++) {await wait(100); if(await evaluate(`location.href === ${JSON.stringify(url)} && document.readyState === "complete"`)) break;}
        await wait(1000);
        await evaluate(`document.querySelector('#theme-settings-offcanvas.show [data-bs-dismiss="offcanvas"]')?.click()`);
        await wait(300);
        const data = await evaluate(`({url:location.href,title:document.title,h1:[...document.querySelectorAll('h1')].map(e=>e.textContent.trim()),canonical:document.querySelector('link[rel=canonical]')?.href,titles:document.querySelectorAll('title').length,descriptions:document.querySelectorAll('meta[name=description]').length,ogImages:document.querySelectorAll('meta[property="og:image"]').length,seoFields:document.querySelectorAll('[name^=og_]').length,bodyWidth:document.body.scrollWidth,viewport:innerWidth,forms:document.forms.length})`);
        results.push({name,...data});
        const {data:image} = await cdp('Page.captureScreenshot',{format:'png',captureBeyondViewport:false});
        fs.writeFileSync(path.join(directory,`browser-${name}.png`),Buffer.from(image,'base64'));
    }
    if (!workflowOnly) {
    await inspect('arabic','https://localhost:18881/services/'+encodeURIComponent('خدمة-اختبار'));
    await inspect('english','https://localhost:18881/en/services/custom-en');
    await cdp('Emulation.setDeviceMetricsOverride',{width:390,height:844,deviceScaleFactor:1,mobile:true});
    await inspect('arabic-mobile','https://localhost:18881/services/custom-ar');
    await cdp('Emulation.setDeviceMetricsOverride',{width:1440,height:1000,deviceScaleFactor:1,mobile:false});
    await inspect('homepage','https://localhost:18881/');
    await inspect('article','https://localhost:18881/article-ar');
    }
    await inspect('admin-login','https://localhost:18881/admin/login');
    await evaluate(`(async()=>{const form=document.querySelector('form');const data=new FormData(form);data.set('email','qa@example.test');data.set('password','disposable-test-password');await fetch(form.action,{method:'POST',body:data});return true;})()`);
    await inspect('admin-edit','https://localhost:18881/admin/services/edit/2');
    await inspect('admin-create','https://localhost:18881/admin/services/create');
    const imagePath = path.join(directory,'browser-upload.png');
    fs.writeFileSync(imagePath, Buffer.from('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAwMCAO+a8u0AAAAASUVORK5CYII=','base64'));
    const {result:input} = await cdp('Runtime.evaluate',{expression:'document.querySelector("#og_image")'});
    if (!input.objectId) throw new Error('OG input is unavailable on the create form');
    await cdp('DOM.setFileInputFiles',{objectId:input.objectId,files:[imagePath]});
    const created = await evaluate(`(async()=>{const form=document.querySelector('#geniusform');const data=new FormData(form);for(const [key,value] of Object.entries({title_ar:'خدمة متصفح',title_en:'Browser service',slug_ar:'browser-created-ar-${suffix}',slug_en:'browser-created-en-${suffix}',meta_title_en:'Browser SEO title',meta_details_en:'Browser SEO description',og_title_en:'Browser OG title',is_published:'1'})){data.set(key,value);}const response=await fetch(form.action,{method:'POST',body:data});return {status:response.status,result:await response.json()};})()`);
    results.push({name:'browser-create-with-og-upload',...created});
    // The legacy API starts an unencrypted web session; omit credentials so the API response
    // cannot replace the authenticated web cookie. This is a pre-existing API/session concern.
    const id = await evaluate(`(async()=>{const response=await fetch('/api/services',{credentials:'omit',headers:{'Accept-Language':'en'}});return (await response.json()).data.find(item=>item.slug==='browser-created-en-${suffix}')?.id;})()`);
    if (!id || created.result?.errors) throw new Error('Browser service creation failed');
    await inspect('browser-created-edit',`https://localhost:18881/admin/services/edit/${id}`);
    results.push({name:'browser-persistence',...(await evaluate(`({title:document.querySelector('[name=meta_title_en]').value,og:document.querySelector('[name=og_title_en]').value,image:document.querySelector('img[alt="صورة المشاركة الحالية"]')?.src})`))});
    const updated = await evaluate(`(async()=>{const form=document.querySelector('#geniusform');const data=new FormData(form);data.set('meta_title_en','Browser updated title');data.set('slug_en','browser-updated-en-${suffix}');const response=await fetch(form.action,{method:'POST',body:data});return {status:response.status,result:await response.json()};})()`);
    results.push({name:'browser-update',...updated});
    if (updated.result?.errors) throw new Error('Browser update validation failed');
    await inspect('browser-created-public','https://localhost:18881/en/services/browser-updated-en-'+suffix);
    results.push({name:'browser-old-slug',...(await evaluate(`(async()=>{const response=await fetch('/en/services/browser-created-en-${suffix}');return {finalStatus:response.status,redirected:response.redirected,finalUrl:response.url};})()`))});
    fs.writeFileSync(path.join(directory,workflowOnly?'browser-workflow-results.json':'browser-results.json'),JSON.stringify(results,null,2));
    fs.writeFileSync(path.join(directory,workflowOnly?'browser-workflow-exceptions.json':'browser-exceptions.json'),JSON.stringify(exceptions,null,2));
    console.log(JSON.stringify(results,null,2));
    await send('Browser.close');
})().catch(error=>{console.error(error.stack);browser.kill();process.exitCode=1;});
