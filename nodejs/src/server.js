module.exports = function(callback) {
  const express = require("express");
  const bodyParser = require("body-parser");
  const cookieParser = require("cookie-parser");
  const serveStatic = require("serve-static");
  const methodOverride = require("method-override");
  const session = require("express-session");
  const MongoStore = require('connect-mongo')(session);
  const app = express();
  const mongoose = require("./server/mongooseConfig");
  app.use(methodOverride());
  app.use(bodyParser.json());
  app.use(bodyParser.urlencoded({
    extended: true
  }));
  app.use(cookieParser("c6640fd2-eb3d-4961-b540-71f407b2cda8"));
  const sess = {
    resave: false,
    saveUninitialized: false,
    secret: "305e1b93-494a-46e1-8564-0fababf1f14f",
    key: "sid",
    store: new MongoStore({
      mongooseConnection: mongoose.connection,
      touchAfter: 60 * 60, // Só atualiza a sessão após 1h
      stringify: false
    })
  };
  
  app.use(session(sess));
  
  app.use(serveStatic(`${__dirname}/public`, {
    index: ["index.html"]
  }));
  
  app.use(function(err, req, res, next) {
    console.error("Deu ruim!!! =o", err.stack);
    res.status(500).send('Deu algo errado!');
  });

  require("./server/router")(app);
    
  callback(app);
};