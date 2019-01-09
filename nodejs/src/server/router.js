const amqp = require('amqplib');
const environment = require("./config/environment")();
const RequisicaoModel = require("./model/requisicao");

module.exports = (app) => {
  var channel;
  var q = 'hello';
  app.post("/api/send", (req, res) => {
    console.log(req.body);
    amqp.connect(environment.amqURI)
    .then(function(conn) {
      return conn.createChannel();
    }).then(function(ch) {
      channel = ch;
      return ch.assertQueue(q, {durable: false});
    }).then(function(ok) {
      var msg = req.body.message;
      channel.sendToQueue(q, Buffer.from(msg));
      res.send(` [x] Sent ${msg}`);
    }).catch(console.warn);
  });

  app.post("/api/receive", (req, res) => {
    var channel;
    var q = 'hello';
    amqp.connect(environment.amqURI)
    .then(function(conn) {
      console.log("Conectou...");
      return conn.createChannel();
    }).then(function(ch) {
      console.log("Criou canal...");
      channel = ch;
      return ch.assertQueue(q, {durable: false});
    }).then(function(ok) {
        console.log("Achou a queue...");
        return channel.get(q);
    }).then(function(msg) {
      console.log(`Consumindo... ${msg}`);
      if (msg) {
        console.log(msg.content.toString());
        channel.ack(msg);
        res.send(msg.content.toString());
      } else {
        res.send("Nada na fila");
      }
    }).catch(console.warn);
  });

  app.post("/api/receiveMessage", (req, res) => {
    // console.log(req.body);
    console.log("Header da Requisicao:\r\n" + JSON.stringify(req.headers, null, '\t'));
    console.log("Corpo da Requisicao:\r\n" + JSON.stringify(req.body, null, '\t'));
    res.send({
      "message": "Respondido pelo node",
      "data": req.body
    })
  });

  app.post("/api/teste", (req, res) => {
    // console.log("Corpo da Requisicao:\r\n" + JSON.stringify(req.body, null, '\t'));

    var req = new RequisicaoModel({
      moment: new Date(),
      data: req.body
    });
    
    req.save().then((r) => {
      res.send({
        "message": "Respondido pelo node",
        "data": r
      })
    }).catch((err) => {
      res.status(400).send(err);
    })
  });
};