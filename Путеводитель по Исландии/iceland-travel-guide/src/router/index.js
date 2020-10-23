import { createRouter, createWebHistory, scrollBehavior } from 'vue-router'
import homePage from '@/views/homePage.vue'

const routes = [
   {
     path: "/",
     component: homePage,
     meta: { title: 'Путеводитель по Исландии' }
   },
   {
    path: '/:name',
    component: () => import('@/views/cityPage.vue'),
    meta: { title: "Подробнее о городе" },
   },
   {
    path: '/attractions',
    component: () => import('@/views/attractionsPage.vue'),
    meta: { title: 'Достопримечательности' }
   },
   {
    path: '/kitchen',
    component: () => import('@/views/kitchenPage.vue'),
    meta: { title: 'Кухня Исландии' },
    meta: { title: 'Исландская кухня' }
   },
   {
    path: '/housing',
    component: () => import('@/views/housingPage.vue'),
    meta: { title: 'Гайд по жилью' }
   },
   {
    path: '/trip',
    component: () => import('@/views/tripPage.vue'),
    meta: { title: 'Гайд по транспорту' }
   },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
  scrollBehavior(to, from, savedPosition) {
    if (to.hash) {
      document.getElementById(to.hash).scrollIntoView();
      return {selector: to.hash}
    } else {
      document.getElementById('app').scrollIntoView();
    }
},
})

router.beforeEach((to, from, next) => {
  document.title = to.meta.title
  next()
});

export default router
