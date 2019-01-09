$("#btnGerar").click((e) => {
  e.preventDefault();
  $("#txtSend").val(`Mensagem ${Date.now()}`);
});

$("#btnSend").click((e) => {
  e.preventDefault();
  let msg = $("#txtSend").val();
  let data = {
    message: msg
  }
  $.post("api/send", data)
  .done(function(res) {
    console.log(res)
    alert(`Mensagem enviada!\r${msg}`);
  })
  .fail(function(err) {
    console.log(err);
    alert("Erro!");
  });
});

$("#btnReceive").click((e) => {
  e.preventDefault();
  $.post("api/receive")
  .done(function(res) {
    console.log(res)
    $("#txtReceive").val(res);
  })
  .fail(function(err) {
    console.log(err);
    alert("Erro!");
  });
});