// auth.js - efek animasi jika input kosong
document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    if (!form) return;

    form.addEventListener("submit", function (e) {
        let valid = true;
        const inputs = form.querySelectorAll("input");

        inputs.forEach((input) => {
            if (input.value.trim() === "") {
                valid = false;
                input.style.borderColor = "#ff4d4d";
                input.style.background = "#fff0f0";
            } else {
                input.style.borderColor = "#ddd";
                input.style.background = "#fff";
            }
        });

        if (!valid) {
            e.preventDefault();
        }
    });
});
