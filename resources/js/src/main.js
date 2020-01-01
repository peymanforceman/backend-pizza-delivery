import Vue from 'vue'
import App from './App.vue'
import Vuesax from 'vuesax'
import axios from 'axios'
// Vuesax Component Framework
// Globally Registered Components
import './globalComponents.js'
// Theme Configurations
import '../themeConfig.js'
// Vuex Store
import store from './store/store'
// Vue Router
import router from './router'
// i18n
import i18n from './i18n/i18n'
// Clipboard
import VueClipboard from 'vue-clipboard2'
// Tour
import VeeValidate, {Validator} from 'vee-validate'
import fa from 'vee-validate/dist/locale/fa'
// PrismJS
import 'prismjs'

require('@/store/subscriber')
Vue.use(Vuesax)

// axios
// Vue.prototype.$http = axios
axios.defaults.baseURL = document.head.querySelector('meta[name="api-base-url"]').content + '/api'

Vue.use(VueClipboard);
require('vue-tour/dist/vue-tour.css')

Validator.localize({fa: fa})
Vue.use(VeeValidate, {locale: 'fa'})

// Vuejs - Vue wrapper for hammerjs
import {VueHammer} from 'vue2-hammer'

Vue.use(VueHammer)

import 'prismjs/themes/prism-tomorrow.css'

// Vue select css
// Note: In latest version you have to add it separately
// import 'vue-select/dist/vue-select.css';
// Feather font icon
require('@assets/css/iconfont.css')
require('@assets/css/byekan.css')

Vue.config.productionTip = false
store.dispatch('auth/attempt', localStorage.getItem('token')).then(() => {
    new Vue({
        router,
        store,
        i18n,
        render: h => h(App)
    }).$mount('#app')
})
