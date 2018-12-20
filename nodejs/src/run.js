require('./server')(function(app) {
  const port = Number(process.env.PORT || 3000);
  return app.listen(port, function() {
    return console.log(`Rodando na porta ${port}`);
  });
});