import './bootstrap';
import alertify from 'alertifyjs';
import.meta.glob([
    '../images/**',
]);
import Alpine from 'alpinejs';

window.alertify = alertify;

window.Alpine = Alpine;

Alpine.start();
