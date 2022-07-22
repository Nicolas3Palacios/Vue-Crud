<template>
    <section class="container mt-5">
        <form @submit.prevent="saveCity">
            <div class="form-group">
                <label for="name">City name</label>
                <input type="text" class="form-control" id="name" v-model="city.name"/>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </section>
</template>
<script>
export default {
    props:['citi'],
    data(){
        return {
            city:{
                name: ''
            }
        }
    },
    mounted(){
        this.citi ? this.city = this.citi:''
    },
    methods: {
        async saveCity(){
            let url='/city/store'
            if (this.citi) {
                url=`/city/update/${this.city.id}`
            }
            await axios.post(url, this.city).then(res=>{
                if (res.data.saved) {
                    this.city = ''
                    alert('City saved')
                    this.$parent.city_update.push(res.data.city)
                } else if (res.data.updated){
                    alert('City updated')
                    window.location.href="/"
                }
            })
        }
    }
};
</script>
