<template>
    <section>
        <form-city></form-city>
        <table-city :cities="city_update"></table-city>
    </section>
</template>
<script>
import FormCity from './form.vue'
import TableCity from './table.vue'
export default {
    props:['cities'],
    data(){
        return {
            city_update: this.cities
        }
    },
    components:{
        FormCity,
        TableCity
    }
};
</script>
