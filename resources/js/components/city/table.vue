<template>
    <section class="container  mt-5">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(city, index) in cities" :key="index">
                    <th scope="row">{{city.id}}</th>
                    <td>{{city.name}}</td>
                    <td>
                        <a class="btn btn-warning" :href="`/city/edit/${city.id}`">Edit</a>
                        <button class="btn btn-danger" @click="deleteCity(city.id, index)">Delete</button>
                    </td>

                </tr>
            </tbody>
        </table>
    </section>
</template>
<script>
export default {
    props:['cities'],
    methods: {
        async deleteCity(id, index){
            await axios.delete(`/city/delete/${id}`).then(res=>{
                if (res.data.deleted) {
                    alert('City deleted')
                    this.$parent.city_update.splice(index, 1)
                }
            })
        }
    }
};
</script>
