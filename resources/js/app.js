import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

const inputImage = document.getElementById("photo");
const previewImage = document.getElementById("preview-image");

inputImage.addEventListener("change", function () {
    const file = this.files[0];

    if (file) {
        const reader = new FileReader();

        reader.onload = function (e) {
            console.log("e", e);
            previewImage.src = e.target.result;
        };

        reader.readAsDataURL(file);
    } else {
        previewImage.src = "images/icon-photo.jpg";
    }
});

function mascaraTelefone(phone) {
    // Remove caracteres não numéricos
    phone = phone.replace(/\D/g, "");

    // Formata o telefone (exemplo: (XX) XXXX-XXXX)
    phone = phone.replace(/(\d{2})(\d{5})(\d{4})/, "($1) $2-$3");

    return phone;
}

// Exemplo de uso
const inputPhone = document.getElementById("phone");
inputPhone.addEventListener("keyup", () => {
    inputPhone.value = mascaraTelefone(inputPhone.value);
});
