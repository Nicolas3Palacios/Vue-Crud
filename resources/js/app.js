import './bootstrap';

import Vue from 'vue'

import IndexPerson from './components/home/index.vue'
import FormPerson from './components/home/form.vue'
import IndexCity from './components/city/index.vue'
import FormCity from './components/city/form.vue'
import IndexChild from './components/child/index.vue'
import FormChild from './components/child/form.vue'
import Api from './components/api.vue'


new Vue({
    el: '#app',
    components: {
        IndexPerson,
        FormPerson,
        IndexCity,
        FormCity,
        IndexChild,
        FormChild,
        Api
    }

})
