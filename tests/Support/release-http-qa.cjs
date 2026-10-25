const fs = require('fs');
const path = require('path');
const https = require('https');
const http = require('http');
const directory = process.argv[2];
let cookies = {};
function request(urlPath, method = 'GET', body = '', headers = {}) {
    return new Promise((resolve, reject) => {
        const req = https.request({hostname: 'localhost', port: 18881, family: 4, rejectUnauthorized: false, path: urlPath, method, headers: {Cookie: Object.entries(cookies).map(([k,v]) => `${k}=${v}`).join('; '), ...headers}}, res => {
            for (const cookie of res.headers['set-cookie'] || []) {const [key, ...parts] = cookie.split(';')[0].split('='); cookies[key] = parts.join('=');}
            let html = ''; res.on('data', chunk => html += chunk); res.on('end', () => resolve({status: res.statusCode, headers: res.headers, html}));
        }); req.on('error', reject); req.end(body);
    });
}
(async () => {
    const results = [];
    for (const url of ['/services/'+encodeURIComponent('خدمة-اختبار'), '/en/services/release-service', '/services/custom-ar', '/en/services/custom-en', '/services/hidden-ar', '/en/services/hidden-en', '/en/services/old-custom', '/en/services/custom-en/', '/sitemap.xml', '/robots.txt', '/', '/en', '/article-ar', '/en/article-en', '/services-category/category-ar', '/api/services']) {
        const response = await request(url, 'GET', '', {'Accept-Language': 'en'});
        const safeName = Buffer.from(url).toString('hex').slice(0, 90);
        fs.writeFileSync(path.join(directory, `http-${safeName}.html`), response.html);
        results.push({url, status: response.status, location: response.headers.location || null, contentType: response.headers['content-type'], title: response.html.match(/<title>([\s\S]*?)<\/title>/i)?.[1].trim(), titles: (response.html.match(/<title>/gi)||[]).length, descriptions: (response.html.match(/<meta name="description"/gi)||[]).length, canonicals: (response.html.match(/rel="canonical"/gi)||[]).length, ogImages: (response.html.match(/property="og:image"/gi)||[]).length});
    }
    const login = await request('/admin/login');
    const token = login.html.match(/name="_token"[^>]*value="([^"]+)"/)?.[1];
    const body = new URLSearchParams({_token: token || '', email:'qa@example.test', password:'disposable-test-password'}).toString();
    const loggedIn = await request('/admin/login', 'POST', body, {'Content-Type':'application/x-www-form-urlencoded'});
    results.push({url:'/admin/login POST (synthetic account)', status: loggedIn.status, location: loggedIn.headers.location});
    for (const url of ['/admin/services/create','/admin/services/edit/2','/admin/services/edit/3']) {
        const response = await request(url);
        results.push({url, status:response.status, hasSeo: response.html.includes('name="og_image"'), hasSavedEnglishTitle: response.html.includes('Custom SEO title')});
    }
    const redirect = await new Promise((resolve,reject) => {
        http.get({host:'127.0.0.1',port:18880,path:'/en/services/custom-en',headers:{Host:'localhost:18881'}},res=>{res.resume();resolve({status:res.statusCode,location:res.headers.location});}).on('error',reject);
    });
    results.push({url:'Loopback HTTP to canonical TLS host',...redirect});
    // Diagnostic only: preserve and report a legacy integration risk rather than masking it.
    await request('/api/services', 'GET', '', {'Accept-Language':'en'});
    const afterApi = await request('/admin/services/edit/2');
    results.push({url:'Existing API/web-session diagnostic',status:afterApi.status,location:afterApi.headers.location || null,sessionPreserved:afterApi.status===200});
    fs.writeFileSync(path.join(directory, 'http-results.json'), JSON.stringify(results, null, 2));
    console.log(JSON.stringify(results, null, 2));
})().catch(error => {console.error(error.message); process.exitCode = 1;});
