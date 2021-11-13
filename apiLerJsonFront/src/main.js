import Vue from 'vue'
import App from './App'
import router from './router'
import axios from "axios";
import Vuex from 'vuex'

Vue.use(Vuex)

Vue.config.productionTip = true
Vue.prototype.$http = axios;
Vue.prototype.$ApiUrl = 'http://127.0.0.1:8000/';

const store = new Vuex.Store({
  state: {
    user: sessionStorage.getItem("user") ? JSON.parse(sessionStorage.getItem("user")) : null,
    content: [],
  },
  getters: {
    getUser: state => {
      return state.user
    },
    getContent: state => {
      return state.content
    }
  },
  mutations: {
    setUser(state, n) {
      state.user = n
    },
    setContent(state, n) {
      state.content = n
    }
  }
})


/* eslint-disable no-new */
new Vue({
  el: '#app',
  store: store,
  router,
  components: {
    App
  },
  template: '<App/>'
})
