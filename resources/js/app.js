import './bootstrap';
import Inputmask from "inputmask";

window.addEventListener("DOMContentLoaded", () => {
    Inputmask("999.999.999-99", {
        placeholder: "___.___.___-__",
        showMaskOnHover: true,
        showMaskOnFocus: true
    }).mask("#cpf");

    Inputmask("(99) 99999-9999", {
        placeholder: "(__) _____-____",
        showMaskOnHover: true,
        showMaskOnFocus: true
    }).mask("#telefone");
});
