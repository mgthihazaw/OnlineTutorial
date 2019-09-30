

require('./bootstrap');


window.Vue = require('vue');

//Install bootstrap-vue
import BootstrapVue from 'bootstrap-vue';

Vue.use(BootstrapVue)
import 'bootstrap-vue/dist/bootstrap-vue.css'
// import Vimeo from '@vimeo/player';
// Vue.use(Vimeo)

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('pricing', require('./components/pricing.vue').default);
Vue.component('episodes', require('./components/episodes.vue').default);
Vue.component('video-player', require('./components/VideoPlayer.vue').default);
const app = new Vue({
    el: '#app',
});
