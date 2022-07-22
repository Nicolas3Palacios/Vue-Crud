<template>
    <section class="container mt-5">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Addres</th>
                    <th scope="col">Age</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(son, index) in children" :key="index">
                    <th scope="row">{{son.id}}</th>
                    <td>{{son.name}}</td>
                    <td>{{son.address}}</td>
                    <td>{{son.age}}</td>
                    <td>
                        <a class="btn btn-warning" :href="`/son/edit/${son.id}`">Edit</a>
                        <button class="btn btn-danger" @click="deleteCity(son.id, index)">Delete</button>
                    </td>

                </tr>
            </tbody>
        </table>
    </section>
</template>
<script>
export default {
    props:['children'],
    methods:{
        async deleteCity(id, index){
             await axios.delete(`/son/delete/${id}`).then(res=>{
                if (res.data.deleted) {
                    alert('Child deleted')
                    this.$parent.children_update.splice(index, 1)
                }
            })
        }
    }
};
</script>
