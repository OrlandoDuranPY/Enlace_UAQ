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
                Livewire.emit('deleteCurriculum', curriculum_id);
                // Muestra en la vista que el curriculum se eliminó correctamente
                Toast.fire({
                    icon: "success",
                    title: "¡Curriculum eliminado exitosamente!",
                });
            }
        });
    });

});
