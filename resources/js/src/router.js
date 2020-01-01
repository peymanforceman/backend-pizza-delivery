/*=========================================================================================
  File Name: router.js
  Description: Routes for vue-router. Lazy loading is enabled.
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/


import Vue from 'vue'
import Router from 'vue-router'
import store from './store/store'

Vue.use(Router)
const ifNotAuthenticated = (to, from, next) => {
    if (!store.getters['auth/authenticated']) {
        next()
        return
    }
    next('/')
}

const ifAuthenticated = (to, from, next) => {
    if (store.getters['auth/authenticated']) {
        next()
        return
    }
    next('/login')
}

const router = new Router({
    mode: 'history',
    base: process.env.BASE_URL,
    scrollBehavior() {
        return {x: 0, y: 0}
    },
    routes: [

        {
            // =============================================================================
            // MAIN LAYOUT ROUTES
            // =============================================================================
            path: '',
            component: () => import('./layouts/main/Main.vue'),
            children: [
                // =============================================================================
                // Theme Routes
                // =============================================================================
                {
                    path: '/',
                    name: 'home',
                    component: () => import('./views/Home.vue'),
                },
                {
                    path: '/dashboard/factors',
                    name: 'factors',
                    component: () => import('./views/Page2.vue'),
                },
                {
                    path: '/dashboard/cars',
                    name: 'cars',
                    component: () => import('./views/Page2.vue'),
                },
                {
                    path: '/dashboard/drivers',
                    name: 'drivers',
                    component: () => import('./views/pages/Drivers.vue'),
                },
                {
                    path: '/dashboard/admins',
                    name: 'admins',
                    component: () => import('./views/Page2.vue'),
                }
            ],
        },
        // =============================================================================
        // FULL PAGE LAYOUTS
        // =============================================================================
        {
            path: '',
            component: () => import('@/layouts/full-page/FullPage.vue'),
            children: [
                // =============================================================================
                // PAGES
                // =============================================================================
                {
                    path: '/login',
                    name: 'login',
                    component: () => import('@/views/pages/login/Login.vue'),
                    beforeEnter: ifNotAuthenticated,
                },
                {
                    path: '/comingsoon',
                    name: 'coming-soon',
                    component: () => import('@/views/pages/ComingSoon.vue'),
                },
                {
                    path: '/error-404',
                    name: 'page-error-404',
                    component: () => import('@/views/pages/Error404.vue'),
                },
                {
                    path: '/error-500',
                    name: 'page-error-500',
                    component: () => import('@/views/pages/Error500.vue'),
                },
                {
                    path: '/not-authorized',
                    name: 'page-not-authorized',
                    component: () => import('@/views/pages/NotAuthorized.vue'),
                },
                {
                    path: '/maintenance',
                    name: 'page-maintenance',
                    component: () => import('@/views/pages/Maintenance.vue'),
                },
            ]
        },
        // Redirect to 404 page, if no match found
        {
            path: '*',
            redirect: '/error-404'
        }
    ],
})

router.afterEach(() => {
    // Remove initial loading
    const appLoading = document.getElementById('loading-bg')
    if (appLoading) {
        appLoading.style.display = "none";
    }
})

export default router
