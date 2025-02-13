document
  .getElementById("form-contato")
  .addEventListener("submit", function (event) {
    event.preventDefault();

    alert("Mensagem enviada com sucesso!");
    document.getElementById("form-contato").reset();
  });
