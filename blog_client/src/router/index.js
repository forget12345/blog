import Vue from 'vue'
import Router from 'vue-router'
// import Browse from '@/components/Browse'
import Login from '@/components/manage/Login' //login view
import New from '@/components/manage/new' //add blog view
import index from '@/components/manage/index' //add blog view
import PersonalInfoSet from '@/components/manage/PersonalInfoSet' //personal info set  view
import init from '@/components/public/index'
import remuse from '@/components/public/remuse'
import article from '@/components/public/article'
import collection from '@/components/public/collection'
import tmp from '@/components/public/tmp'


Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'init',
      component: init
    }, {
      path: '/remuse',
      name: 'remuse',
      component: remuse
    }, {
      path: '/tmp',
      name: 'tmp',
      component: tmp
    }, {
      path: '/article',
      name: 'article',
      component: article
    }, {
      path: '/collection',
      name: 'collection',
      component: collection

    }, {
      path: '/manage/index',
      name: 'index',
      component: index
    },
    {
      path: '/manage/Login',
      name: 'Login',
      component: Login
    }, {
      path: '/manage/New',
      name: 'New',
      component: New
    }, {
      path: '/manage/PersonalInfoSet',
      name: 'PersonalInfoSet',
      component: PersonalInfoSet
    }
  ]
})
