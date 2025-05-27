import './bootstrap';
import alertify from 'alertifyjs';
import.meta.glob([
    '../images/**',
]);
import Alpine from 'alpinejs';
import swal from 'sweetalert2';

window.alertify = alertify;
window.swal = swal;
window.Alpine = Alpine;

Alpine.start();