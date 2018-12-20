module.exports = function(pEnvironment) {
  let amb = {
    test: {
      dbURI: "mongodb://mongo:27017/BasicNodeTest",      
      mailSettings: {
        send: false
      },
      url: "localhost:3000"
    },
    development: {
      dbURI: "mongodb://mongo:27017/ESB_API",
      amqURI: "amqp://admin:admin@rabbitmq:5672",
      url: "localhost:5000"
    },
    production: {
      dbURI: "mongodb://localhost:27017/ESB_API",      
      url: "www.api.com.br"
    }
  };
  return amb[pEnvironment || process.env.NODE_ENV || "development"];
};