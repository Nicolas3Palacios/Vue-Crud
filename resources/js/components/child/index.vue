<template>
    <section class="container mt-5">
        <h1>Children</h1>
        <form-child :people="people"></form-child>
        <table-child :children="children_update"></table-child>
    </section>
</template>
<script>
import FormChild from './form.vue'
import TableChild from './table.vue'
export default {
    props:['children','people'],
    data(){
        return {
            children_update: this.children
        }
    },
    components:{
        FormChild,
        TableChild
    }
};
</script>
