require('./bootstrap');

window.Vue = require('vue');
Vue.component("subscription-button", require("./components/SubscribeButton.vue").default);

const app = new Vue({
    el: '#app',
});