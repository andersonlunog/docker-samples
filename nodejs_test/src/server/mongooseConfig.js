const mongoose = require('mongoose');
const environment = require('./config/environment')();

const options = {
  useNewUrlParser: true,
  autoReconnect: true,
  reconnectTries: Number.MAX_VALUE, // Never stop trying to reconnect
  reconnectInterval: 1000, // Reconnect every 1000ms
  poolSize: 10, // Maintain up to 10 socket connections
  // If not connected, return errors immediately rather than waiting for reconnect
  bufferMaxEntries: 0,
  connectTimeoutMS: 10000, // Give up initial connection after 10 seconds
  socketTimeoutMS: 45000, // Close sockets after 45 seconds of inactivity
};

// mongoose.connection.on("error", function(e) {
//   console.log("\x1b[31m%s\x1b[0m", `Erro de conexão com DB: ${e}`);
// });
var logCount = 0;
const _connect = function() {
  mongoose.connect(environment.dbURI, options).then(
    () => console.log(`Configurou o mongoose ${environment.dbURI}`),
    err => {
      if (logCount == 0) {
        console.error(`Erro ao tentar conectar ao DB: ${environment.dbURI}`, err);
        logCount = 10;
      }
      logCount--;
      setTimeout(() => {
        _connect();
      }, options.reconnectInterval);
    }
  );
}
_connect();
mongoose.Error.messages.general.required = "O campo `{PATH}` é requerido.";

module.exports = mongoose;