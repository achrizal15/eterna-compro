import axios from "axios";
import { showError, clearError, showAlert } from "../renderErrorInput";

const form = document.querySelector(".js-form-banner");
form.addEventListener("submit", (e) => {
    e.preventDefault();
    const formData = new FormData(form);
    const url = form.getAttribute("action");
    clearError("title");
    clearError("image_desktop");
    clearError("image_mobile");
    axios
        .post(url, formData)
        .then((res) => {
            setTimeout(() => {
                window.location.reload();
            }, 300);
        })
        .catch(function (error) {
            // Tanggapan jika ada kesalahan
            if (error.response.status === 422) {
                const errors = error.response.data.errors;
                for (const fieldName in errors) {
                    // Menampilkan pesan kesalahan untuk setiap field
                    const errorMessage = errors[fieldName][0]; // Mengambil pesan kesalahan pertama
                    showError(fieldName, errorMessage);
                }
            }
            showAlert("danger", error.response.data.message, form);
        });
});
