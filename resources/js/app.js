require('./bootstrap');

window.Vue = require('vue');
Vue.component("subscription-button", require("./components/SubscribeButton.vue").default);

Vue.component("channel-uploads", require("./components/ChannelUploads.vue").default);

Vue.component("video-player", require("./components/VideoPlayer.vue").default);

Vue.component("video-data", require("./components/VideoData.vue").default);


const app = new Vue({
    el: '#app',
});