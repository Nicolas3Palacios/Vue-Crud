<template>
    <section class="container">
        <h1>Parents</h1>
        <form-parent :cities="cities" :children="children"></form-parent>
        <table-parent :people="person_update"></table-parent>
    </section>
</template>
<script>
import FormParent from './form.vue'
import TableParent from './table'
export default {
    props:['children','cities','people'],
    data(){
        return {
            person_update: this.people
        }
    },
    components:{
        FormParent,
        TableParent
    }
};
</script>
