
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

// import 'bootstrap-toggle/js/bootstrap-toggle.js';
window.toastr = require('toastr');
require('bootstrap-toggle/js/bootstrap-toggle.js');

// Validamos y activamos el Permiso para Notificar
if(Notification.permission!=="granted") {
    Notification.requestPermission();
}

require('@fortawesome/fontawesome-free/js/all.js');