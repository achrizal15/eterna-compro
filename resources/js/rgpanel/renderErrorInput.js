const showError = (fieldName, errorMessage) => {
    const errorElement = document.getElementById(`${fieldName}Error`);
    errorElement.innerHTML = errorMessage;
    errorElement.classList.add("d-block");
};

// Menghilangkan pesan kesalahan
const clearError = (fieldName) => {
    const errorElement = document.getElementById(`${fieldName}Error`);
    if (!errorElement) return "";
    errorElement.innerHTML = "";
    errorElement.classList.remove("d-block");
    const errorAlertElement = document.querySelector(".js-alert");
    if (errorAlertElement) {
        errorAlertElement.remove();
    }
};

const showAlert = (severity = "danger", message, elementAdjacentClass) => {
    const errorAlertElement = document.createElement("div");
    errorAlertElement.className = `js-alert alert alert-${severity}`;
    errorAlertElement.textContent = message;
    elementAdjacentClass.insertAdjacentElement(
        "beforebegin",
        errorAlertElement
    );
};
export { clearError, showError, showAlert };
