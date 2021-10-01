<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component modificado.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    async mounted() {
        const response = await axios.get("/posts");
        const data = response.data;
        console.log(data);
    }
};
</script>
