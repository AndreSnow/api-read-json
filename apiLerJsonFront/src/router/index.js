import Vue from 'vue'
import Router from 'vue-router'
import Login from '@/pages/Login'
import Planiums from '@/pages/planiums'

Vue.use(Router)

export default new Router({
  routes: [{
      path: '/',
      name: 'Login',
      component: Login
    },
    {
      path: '/login',
      name: 'Login',
      component: Login
    },
    {
      path: '/planiums',
      name: 'Planium',
      component: Planiums
    },
  ]
})
