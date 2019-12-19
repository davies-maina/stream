require('./bootstrap');

window.Vue = require('vue');
Vue.component("subscription-button", require("./components/SubscribeButton.vue").default);

Vue.component("channel-uploads", require("./components/ChannelUploads.vue").default);


const app = new Vue({
    el: '#app',
});