// Dedicated local QA TLS terminator. Usage: node release-tls-proxy.cjs <certificate-directory>
const fs = require('fs');
const http = require('http');
const https = require('https');
const path = require('path');
const directory = process.argv[2];
const server = https.createServer({key: fs.readFileSync(path.join(directory, 'key.pem')), cert: fs.readFileSync(path.join(directory, 'cert.pem'))}, (req, res) => {
    const upstream = http.request({host: '127.0.0.1', port: 18880, method: req.method, path: req.url, headers: {...req.headers, 'x-release-qa-tls': 'loopback-only'}}, response => {
        res.writeHead(response.statusCode, {...response.headers, 'content-security-policy': "connect-src 'self'; frame-src 'none'; form-action 'self'"});
        response.pipe(res);
    });
    upstream.on('error', () => {res.writeHead(502); res.end('Local QA upstream unavailable');});
    req.pipe(upstream);
});
server.listen(18881, '127.0.0.1', () => console.log('QA TLS ready on https://localhost:18881'));
