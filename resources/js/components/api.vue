<template>
    <section class="container mt-5">
        <h1>Rick & Morty</h1>
        <div class="container row">
            <div
                class="card col-md-4 btn"
                v-for="(character, index) in data.results"
                :key="index"
                @click="getLocation(character)"
            >
                <img
                    class="card-img-top"
                    :src="character.image"
                    alt="character image"
                />
                <div class="card-body">
                    <p class="card-text">
                        {{ character.name }}
                    </p>
                </div>
            </div>

            <div class="modal" tabindex="-1" role="dialog" id="modal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button
                                type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close"
                            >
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img
                                class="card-img-top"
                                :src="character.image"
                                alt="character image"
                            />
                            <p>{{ location }}</p>
                        </div>
                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-dismiss="modal"
                            >
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
export default {
    data() {
        return {
            url: "https://rickandmortyapi.com/api/character",
            data: {},
            location: null,
            character: {},
        };
    },
    created() {
        this.index();
    },
    methods: {
        index() {
            this.getData();
        },
        async getData() {
            await axios.get(this.url).then((res) => {
                this.data = res.data;
            });
        },
        getLocation(character) {
            this.character = character;
            this.location = character.location.name;
            $("#modal").modal("show");
        },
    },
};
</script>
