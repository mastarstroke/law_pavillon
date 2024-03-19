import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import DefaultLayout from '../components/DefaultLayout.vue'

import SignUpView from '../views/SignUpView.vue'
import ViewUsersView from '../views/ViewUsers.vue'
import AUserView from '../views/AUserView.vue'


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'Home',
      component: DefaultLayout,
      children: [
          {path: "/", name: 'Home', component: HomeView},
          {path: "/SignUp", name: 'SignUp', component: SignUpView},
          {path: "/ViewUsers", name: 'ViewUsers', component: ViewUsersView},
          {path: "/AUserView/:id", name: 'AUserView', component: AUserView},
      ],
  },

  ]
})




export default router
