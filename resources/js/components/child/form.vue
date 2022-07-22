<template>
    <section class="container mt-5">
        <form @submit.prevent="saveChild">
            <div class="form-group">
                <label for="name">Name</label>
                <input
                    type="text"
                    class="form-control"
                    id="name"
                    v-model="child.name"
                />
            </div>
            <div class="form-group">
                <label for="name">Address</label>
                <input
                    type="text"
                    class="form-control"
                    id="address"
                    v-model="child.address"
                />
            </div>
            <div class="form-group">
                <label for="name">Age</label>
                <input
                    type="number"
                    class="form-control"
                    id="age"
                    v-model="child.age"
                />
            </div>
            <div class="form-group">
                <label for="son">Parent</label>
                <select class="form-control" v-model="child.person_id">
                    <option></option>
                    <option
                        v-for="(person, index) in people"
                        :key="index"
                        :value="person.id"
                    >
                        {{ person.name }}
                    </option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </section>
</template>
<script>
export default {
    props: ["son", "people"],
    data() {
        return {
            child: {
                name: "",
                address: "",
                age: "",
                person_id: "",
            },
        };
    },
    mounted() {
        this.son ? (this.child = this.son) : "";
    },
    methods: {
        async saveChild() {
            let url = "/son/store";
            if (this.son) {
                url = `/son/update/${this.child.id}`;
            }
            await axios.post(url, this.child).then((res) => {
                if (res.data.saved) {
                    this.child = {
                        name: "",
                        address: "",
                        age: "",
                        person_id: "",
                    };
                    alert("Information saved");
                    this.$parent.children_update.push(res.data.son);
                } else if (res.data.updated) {
                    alert("Information updated");
                    window.location.href = "/";
                }
            });
        },
    },
};
</script>
