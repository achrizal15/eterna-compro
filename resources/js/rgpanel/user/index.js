import Swal from "sweetalert2/dist/sweetalert2.js";
import "sweetalert2/src/sweetalert2.scss";
import { clearError, showAlert, showError } from "../renderErrorInput";
const syncPermissions = (value) => {
    $("input.js-input-permission").each(function (e) {
        $(this).prop("checked", value);
    });
};
$(function () {
    $(document).on("click", ".js-select-all-permissions", function () {
        const value = $(this).prop("checked");
        syncPermissions(value);
    });
    $(document).on("click", ".js-btn-modal-open", function () {
        const formAction = $(this).data("action");
        $(".js-form-user").attr("action", formAction);
        $("input[name='_method']").val("POST");
        $(".js-form-user").trigger("reset");
        $(".js-form-user .js-password-description").addClass("d-none");
    });
    $(document).on("click", ".js-btn-submit", function () {
        $(".js-form-user").trigger("submit");
    });
    $(document).on("submit", ".js-form-user", function (e) {
        e.preventDefault();
        const formData = new FormData($(this)[0]);
        const url = $(this).attr("action");
        clearError();
        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                setTimeout(() => {
                    window.location.reload();
                }, 300);
            },
            error: function ({ status, responseJSON }) {
                if (status === 422) {
                    const errors = responseJSON.errors;
                    for (const fieldName in errors) {
                        const errorMessage = errors[fieldName][0];
                        showError(fieldName, errorMessage);
                    }
                }
                showAlert(
                    "danger",
                    responseJSON.message,
                    document.querySelector(".js-form-user")
                );
            },
        });
    });
    $(document).on("click", ".js-btn-delete", function () {
        const url = $(this).data("url");
        Swal.fire({
            title: $(this).data("title"),
            showCancelButton: true,
            confirmButtonText: $(this).data("btn-label"),
            cancelButtonText: $(this).data("btn-cancel-label"),
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "delete",
                    url: url,
                    contentType: false,
                    processData: false,
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    success: function (response) {
                        setTimeout(() => {
                            window.location.reload();
                        }, 300);
                    },
                    error: function ({ responseJSON, status }) {
                        Swal.fire({
                            title: responseJSON.title,
                            text: responseJSON.message,
                            icon: "error",
                            confirmButtonText: responseJSON.action,
                        });
                    },
                });
            }
        });
    });
    $(document).on("click", ".js-btn-edit", function () {
        const url = $(this).data("url");
        $.ajax({
            type: "get",
            url: url,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function ({ data }) {
                const user_permissions = data.user.permissions;
                syncPermissions(false);
                $("input[name='email']").val(data.user.email);
                $("input[name='_method']").val("PUT");
                $("input[name='name']").val(data.user.name);
                $(".js-form-user").attr("action", data.url);
                $(".js-form-user .js-password-description").removeClass(
                    "d-none"
                );
                user_permissions.forEach((permission) => {
                    $(`.js-input-permission[value="${permission.name}"]`).prop(
                        "checked",
                        true
                    );
                });
            },
            error: function ({ responseJSON, status }) {
                Swal.fire({
                    title: responseJSON.title,
                    text: responseJSON.message,
                    icon: "error",
                    confirmButtonText: responseJSON.action,
                });
            },
        });
    });
});
