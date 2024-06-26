import "./bootstrap";
import "flowbite";
import "@fortawesome/fontawesome-free/css/fontawesome.css";
import "@fortawesome/fontawesome-free/css/solid.css";
import "@fortawesome/fontawesome-free/css/regular.css";
import "@fortawesome/fontawesome-free/css/brands.css";
import Swal from "sweetalert2/dist/sweetalert2.js";
import "sweetalert2/src/sweetalert2.scss";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

/* ========================================
Scripts
========================================= */
document.addEventListener("DOMContentLoaded", function () {
    /* ========================================
    Autoajustar TextArea
    ========================================= */
    const textAreas = document.querySelectorAll("textarea");

    textAreas.forEach(function (textarea) {
        textarea.addEventListener("input", function () {
            textarea.style.height = "auto"; // Restaurar la altura a auto para ajustar correctamente el contenido
            textarea.style.height = `${textarea.scrollHeight}px`; // Establecer la altura en función del contenido
        });
    });

    /* ========================================
    Inicializar Toast
    ========================================= */
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });

    /* ========================================
    Toast: Muestra mensaje de exito al crear
    un curriculum o vacante
    ========================================= */
    Livewire.on("create_success", (message) => {
        Toast.fire({
            icon: "success",
            title: message,
        });
    });

    /* ========================================
    Toast: Muestra mensaje de exito al actualizar
    un curriculum o vacante
    ========================================= */
    Livewire.on("update_success", (message) => {
        Toast.fire({
            icon: "success",
            title: message,
        });
    });

    /* ========================================
    Toast: Mensaje de exito
    ========================================= */
    Livewire.on("success_message", (message) => {
        Toast.fire({
            icon: "success",
            title: message,
        });
    });

    /* ========================================
    Toast: Mensaje de error
    ========================================= */
    Livewire.on("error_message", (message) => {
        Toast.fire({
            icon: "error",
            title: message,
        });
    });

    /* ========================================
    Alerta: Mensaje de error
    ========================================= */
    Livewire.on("error_message_alert", (message) => {
        Swal.fire({
            title: "Acción denegada",
            text: message,
            icon: "error",
        });
    });

    /* ========================================
    Evento: Cambiar status del curriculum
    ========================================= */
    Livewire.on("statusCurriculumJS", (curriculum_id) => {
        Swal.fire({
            title: "¿Quieres cambiar el estado curriculum?",
            text: "¡La visibilidad del curriculum cambiará!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#7AD8DB",
            cancelButtonColor: "#ED5660",
            confirmButtonText: "Cambiar estatus",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                // Eliminar el curriculum desde el servidor
                Livewire.emit("statusCurriculum", curriculum_id);
            }
        });
    });

    /* ========================================
    Evento: Borrar un curriculum
    ========================================= */
    Livewire.on("deleteCurriculumJS", (curriculum_id) => {
        Swal.fire({
            title: "¿Quieres eliminar este curriculum?",
            text: "¡Esta acción no puede ser revertida!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#7AD8DB",
            cancelButtonColor: "#ED5660",
            confirmButtonText: "Eliminar",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                // Eliminar el curriculum desde el servidor
                Livewire.emit("deleteCurriculum", curriculum_id);
                // Muestra en la vista que el curriculum se eliminó correctamente
                Toast.fire({
                    icon: "success",
                    title: "¡Curriculum eliminado exitosamente!",
                });
            }
        });
    });

    /* ========================================
    Evento: Borrar una vacante
    ========================================= */
    Livewire.on("deleteVacancyJS", (vacancy_id) => {
        Swal.fire({
            title: "¿Quieres eliminar esta vacante?",
            text: "¡Esta acción no puede ser revertida!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#7AD8DB",
            cancelButtonColor: "#ED5660",
            confirmButtonText: "Eliminar",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                // Eliminar la vacante desde el servidor
                Livewire.emit("deleteVacancy", vacancy_id);
                // Muestra en la vista que la vacante se elimino correctamnete
                Toast.fire({
                    icon: "success",
                    title: "¡Vacante eliminada exitosamente!",
                });
            }
        });
    });

    /* ========================================
    Evento: Borrar un usuario
    ========================================= */
    Livewire.on("deleteUserJS", (user_id) => {
        Swal.fire({
            title: "¿Quieres eliminar este usuario?",
            text: "¡Esta acción no puede ser revertida!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#7AD8DB",
            cancelButtonColor: "#ED5660",
            confirmButtonText: "Eliminar",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                // Eliminar la vacante desde el servidor
                Livewire.emit("deleteUser", user_id);
                // Muestra en la vista que la vacante se elimino correctamnete
                Toast.fire({
                    icon: "success",
                    title: "Usuasio eliminado exitosamente!",
                });
            }
        });
    });

    /* ========================================
    Evento: Borrar una empresa
    ========================================= */
    Livewire.on("deleteCompanyJS", (user_id) => {
        Swal.fire({
            title: "¿Quieres eliminar esta empresa?",
            text: "¡Esta acción no puede ser revertida!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#7AD8DB",
            cancelButtonColor: "#ED5660",
            confirmButtonText: "Eliminar",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                // Eliminar la vacante desde el servidor
                Livewire.emit("deleteCompany", user_id);
            }
        });
    });

    /* ========================================
    Evento: Desvincular un usuario de la empresa
    ========================================= */
    Livewire.on("unlinkUserJS", (user_id) => {
        Swal.fire({
            title: "¿Quieres desvincular este usuario de la empresa?",
            text: "¡Esta acción no puede ser revertida!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#7AD8DB",
            cancelButtonColor: "#ED5660",
            confirmButtonText: "Desvincular",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                // Eliminar la vacante desde el servidor
                Livewire.emit("unlinkUser", user_id);
                // Muestra en la vista que la vacante se elimino correctamnete
                Toast.fire({
                    icon: "success",
                    title: "Usuario desvinculado exitosamente!",
                });
            }
        });
    });
});
