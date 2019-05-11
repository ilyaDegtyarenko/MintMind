import Vue from 'vue';
import VueRouter from 'vue-router'

import {setPageTitle, routeMiddleware} from './util';
import {auth as Auth, guest as Guest, test} from './middleware';

import Index from '@components/auth/Index';
import Login from '@components/auth/Login';
import Register from '@components/auth/Register';
import SurveyList from '@components/content/SurveyList';
import CurrentSurvey from '@components/content/CurrentSurvey';
import PageNotFound from '@components/errors/PageNotFound';
import Agreement from '@components/content/Agreement';
import Policy from '@components/content/Policy';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'index',
            component: Index
        },
        {
            path: '/registration',
            name: 'registration',
            component: Register,
            meta: {
                title: translate.registration,
                middleware: Guest /* Or multiple "[One, ...]". */
            }
        },
        {
            path: '/login',
            name: 'login',
            component: Login,
            meta: {
                title: translate.login,
                middleware: Guest
            }
        },
        {
            path: '/surveys',
            name: 'survey-list',
            component: SurveyList,
            meta: {
                title: translate.survey_list,
                middleware: Auth
            }
        },
        {
            path: '/survey/:id',
            name: 'survey',
            component: CurrentSurvey,
            meta: {
                title: translate.survey,
                middleware: Auth
            }
        },
        {
            path: '/agreement',
            name: 'agreement',
            component: Agreement,
            meta: {
                title: translate.agreement
            }
        },
        {
            path: '/privacy-policy',
            name: 'policy',
            component: Policy,
            meta: {
                title: translate.privacy_policy
            }
        },
        {
            path: '/*',
            component: PageNotFound,
            meta: {
                title: translate.page_not_found
            }
        }
    ]
});

router.beforeEach((to, from, next) => routeMiddleware({router, to, next}));
router.beforeResolve((to, from, next) => setPageTitle(to, next));

export default router;