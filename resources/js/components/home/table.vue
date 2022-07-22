<template>
    <section class="container mt-4">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Age</th>
                    <th scope="col">Child</th>
                    <th scope="col">City</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(person, index) in people" :key="index">
                    <th scope="row">{{person.id}}</th>
                    <td>{{person.name}}</td>
                    <td>{{person.email}}</td>
                    <td>{{person.age}}</td>
                    <td v-for="(son, index) in person.sons" :key="index">{{son.name}}</td>
                    <td>{{person.city.name}}</td>
                    <td>
                        <a class="btn btn-warning" :href="`/person/edit/${person.id}`">Edit</a>
                        <button class="btn btn-danger" @click="deleteCity(person.id, index)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
</template>
<script>
export default {
props:['people'],
methods:{
    async deleteCity(id, index){
        await axios.delete(`/person/delete/${id}`).then(res=>{
            if(res.data.deleted){
                alert('Person deleted')
                this.$parent.person_update.splice(index, 1)
            }
        })
    }
}
}
</script>
