window.Vue = require('vue')

import apolloProvider from './apollo.config.js'

Vue.component('Board', require('./Board.vue').default)

const app = new Vue({
  el: '#app',
  apolloProvider,
})
