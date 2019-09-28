

require('./bootstrap');

window.Vue = require('vue');

//Install bootstrap-vue
import BootstrapVue from 'bootstrap-vue';
Vue.use(BootstrapVue)
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('pricing', require('./components/pricing.vue').default);


const app = new Vue({
    el: '#app',
});
