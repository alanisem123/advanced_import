import Vuex from 'vuex';
import Vue from 'vue';
Vue.use(Vuex);

import app from '@/store/modules/app'
import settings from '@/store/modules/settings'
import logs from '@/store/modules/logs'
import import_settings from '@/store/modules/import_settings'
import export_settings from '@/store/modules/export_settings'
import csv_data from '@/store/modules/csv_data'

/**
 * state management
 */
var initialState = {}

const store = new Vuex.Store({
    state: {...initialState},
    modules: {
        app,
        settings,
        logs,
        import_settings,
        export_settings,
        csv_data,
    },
    mutations: {},
    actions: {},
    getters: {},
})

export default store