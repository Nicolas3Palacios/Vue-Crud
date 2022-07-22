<template>
    <section class="container">
        <form @submit.prevent="saveParent">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" v-model="parent.name" />
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input
                    type="email"
                    class="form-control"
                    v-model="parent.email"
                />
            </div>
            <div class="form-group">
                <label for="name">Age</label>
                <input
                    type="number"
                    class="form-control"
                    v-model="parent.age"
                />
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <select class="form-control" v-model="parent.city_id">
                    <option></option>
                    <option
                        v-for="(city, index) in cities"
                        :key="index"
                        :value="city.id"
                    >
                        {{ city.name }}
                    </option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </section>
</template>
<script>
export default {
    props: ["children", "cities",'person'],
    data() {
        return {
            parent: {
                name: "",
                email: "",
                age: "",
                city_id: "",
                son_id: "",
            },
        };
    },
    mounted(){
        this.person ? this.parent = this.person:''
    },
    methods: {
        async saveParent() {
            let url = "/person/store"
            if(this.person){
                url = `/person/update/${this.parent.id}`
            }
            await axios.post(url, this.parent).then((res) => {
                if (res.data.saved) {
                    alert("Parent saved");
                    this.parent = {
                        name: "",
                        email: "",
                        age: "",
                        city_id: "",
                        son_id: "",
                    };
                    this.$parent.person_update.push(res.data.person)
                }else if (res.data.updated) {
                    alert("Parent updated");
                    window.location.href="/"
                }
            });
        },
    },
};
</script>
