const http = require("http");

const opts = {
  host: '127.0.0.1',
  path: '/api/register-publisher',
  port: 8080,
  method: 'POST',
  headers: {
    'Content-Type': 'application/json'
  }
};

function getRandomInt(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min)) + min;
}

for (let i = 0; i < 100; i++) {
  setTimeout(() => {
    let req = http.request(opts, (res) => {
      // console.log(`STATUS: ${res.statusCode}`);
      // console.log(`HEADERS: ${JSON.stringify(res.headers)}`);
      res.setEncoding('utf8');
      res.on('data', (chunk) => {
        console.log(`Tudo certo! =)`);
      });
      res.on('end', () => {
        // console.log('No more data in response.');
      });
    });
    
    req.on('error', (e) => {
      console.error(`PROBLEMA!!! =( ${e.message}`);
    });
    
    let num = getRandomInt(10, 99);
  
    let data = {
      "channel": "empresa1_teste",
      "data": {
        "nome": `Nome ${num}`,
        "descricao": `Descrição ${num}`,
        "quantidade": num,
        "ativo": true
      }
    };
  
    req.write(JSON.stringify(data));
    req.end();
  }, 1);
}