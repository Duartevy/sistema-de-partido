/******/ (() => { // webpackBootstrap
/*!*******************************!*\
  !*** ./resources/js/masks.js ***!
  \*******************************/
document.addEventListener('DOMContentLoaded', function () {
  var cpfInput = document.getElementById('cpf');
  var telefoneInput = document.getElementById('telefone');
  var nomeInput = document.getElementById('nome');

  // CPF - 000.000.000-00
  if (cpfInput) {
    cpfInput.addEventListener('input', function () {
      var value = cpfInput.value.replace(/\D/g, '').slice(0, 11);
      value = value.replace(/(\d{3})(\d)/, '$1.$2');
      value = value.replace(/(\d{3})(\d)/, '$1.$2');
      value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
      cpfInput.value = value;
    });
  }

  // Telefone - (00) 00000-0000
  if (telefoneInput) {
    telefoneInput.addEventListener('input', function () {
      var value = telefoneInput.value.replace(/\D/g, '').slice(0, 11);
      value = value.replace(/^(\d{2})(\d)/g, '($1) $2');
      value = value.replace(/(\d{5})(\d)/, '$1-$2');
      telefoneInput.value = value;
    });
  }

  // Nome - apenas letras e espaços
  if (nomeInput) {
    nomeInput.addEventListener('input', function () {
      nomeInput.value = nomeInput.value.replace(/[^a-zA-ZÀ-ú\s]/g, '');
    });
  }
});
/******/ })()
;