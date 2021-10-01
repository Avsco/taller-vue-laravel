<template>
    <div>
        <div
            class="card"
            style="width: 20rem;"
            v-for="post of posts"
            :key="post.id"
        >
            <img
                class="card-img-top"
                src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17c3860bd80%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17c3860bd80%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.18333435058594%22%20y%3D%2295.76000022888184%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                alt="Card image cap"
            />
            <div class="card-body">
                <h5 class="card-title">{{ post.title }}</h5>
                <p class="card-text">
                    {{ post.content }}
                </p>
                <div class="d-flex justify-content-between">
                    <a :href="'/posts/' + post.id" class="btn btn-primary"
                        >Detalle</a
                    >
                    <a :href="`/posts/${post.id}/edit`" class="btn btn-warning"
                        >Editar</a
                    >
                    <button @click="deletePost(post.id)" class="btn btn-danger">
                        Borrar
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    async mounted() {
        this.getData();
    },
    data() {
        return {
            posts: []
        };
    },
    methods: {
        async deletePost(id) {
            const response = await axios.delete("/posts/" + id);
            console.log(response);
            this.getData();
        },
        async getData() {
            const response = await axios.get("/posts");
            const data = response.data;
            this.posts = data;
        }
    }
};
</script>

<style scoped></style>
