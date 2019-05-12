import Vue from 'vue'
import Router from 'vue-router'
// import { setPageTitle, routeMiddleware } from './util'
import { auth as Auth, guest as Guest, test } from './middleware'

Vue.use(Router)

export default new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  // beforeEach: (to, from, next) => routeMiddleware({ router, to, next }),
  // beforeResolve: (to, from, next) => setPageTitle(to, next),
  routes: [
    {
      path: '/',
      name: 'index',
      component: () => import('../views/auth/Index')
    },
    {
      path: '/agreement',
      name: 'agreement',
      component: () => import('../views/Agreement'),
      meta: {
        title: 'agr'
      }
    },
    {
      path: '/policy',
      name: 'policy',
      component: () => import('../views/Policy'),
      meta: {
        title: 'agr'
      }
    },
    {
      path: '/registration',
      name: 'registration',
      component: () => import('../views/auth/Registration'),
      meta: {
        title: 'reg',
        middleware: Guest /* Or multiple "[One, ...]". */
      }
    },
    {
      path: '/login',
      name: 'login',
      component: () => import('../views/auth/Login'),
      meta: {
        title: 'log',
        middleware: Guest
      }
    },
    {
      path: '/surveys',
      name: 'surveys',
      component: () => import('../views/SurveyList'),
      meta: {
        title: 'surL',
        middleware: Auth
      }
    },
    {
      path: '/survey/:id',
      name: 'survey',
      component: () => import('../views/Survey'),
      meta: {
        title: 'sur',
        middleware: Auth
      }
    },
    {
      path: '/*',
      name: '404',
      component: () => import('../views/NotFound')
    }
  ]
})
