import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import Login from '@/components/manage/Login' //login view
import New from '@/components/manage/new' //add blog view
import index from '@/components/manage/index' //add blog view
import PersonalInfoSet from '@/components/manage/PersonalInfoSet' //personal info set  view
import Visit from '@/components/Visit' //personal info set  view

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'HelloWorld',
      component: HelloWorld
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
    }, {
      path: '/Visit',
      name: 'Visit',
      component: Visit
    },
  ]
})
