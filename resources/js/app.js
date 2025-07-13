import './bootstrap';

import Inputmask from "inputmask";

window.addEventListener("DOMContentLoaded", () => {
    Inputmask({"mask": "999.999.999-99"}).mask("#cpf");
    Inputmask({"mask": "(99) 99999-9999"}).mask("#telefone");
});

