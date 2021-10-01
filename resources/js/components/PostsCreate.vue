<template>
    <form class="form-group" @submit.prevent="submit()">
        <label for="title">Titulo</label>
        <input
            class="form-control"
            id="title"
            type="text"
            v-model="post.title"
        />
        <label for="content">Contenido</label>
        <input
            class="form-control"
            id="content"
            type="text"
            v-model="post.content"
        />
        <button type="submit" class="btn btn-primary mt-3">
            {{ id == undefined ? "Crear" : "Actualizar" }}
        </button>
    </form>
</template>

<script>
export default {
    props: {
        id: {
            type: String,
            default: undefined
        }
    },
    async mounted() {
        if (this.id != undefined) {
            const response = await axios.get("/posts/" + this.id);
            const data = response.data;
            this.post = data[0];
        }
    },
    data() {
        return {
            post: {
                title: "",
                content: "",
                id: ""
            }
        };
    },
    methods: {
        async submit() {
            if (this.id == undefined) {
                const response = await axios.post("/posts", this.post);
                this.post.title = "";
                this.post.content = "";
                console.log(response);
            } else {
                const response = await axios.put(
                    "/posts/" + this.post.id,
                    this.post
                );
                console.log(response);
            }
        }
    }
};
</script>

<style lang="scss" scoped></style>
