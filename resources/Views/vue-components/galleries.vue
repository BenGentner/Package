<template>
    <div>
        <gallery_preview v-for="gallery in galleries"
                             v-bind:data="gallery"
                             v-bind:key="gallery.id">
        </gallery_preview>
    </div>


</template>

<script>
import Gallery_preview from "./gallery_preview.vue"
import config from "./config";
export default {
    name: "galleries.vue",
    components: {Gallery_preview},
    data() {
        return {
            galleries: [],
        }
    },

    created() {
        config.get("galleries_path")
            .then(response => this.getGalleries(response))
            .catch(error => console.error(error));
    },
    methods: {
        getGalleries(path)
        {
            axios.get("/api/" + path)
                .then(response => this.galleries = response.data);
        }
    }
}
</script>

<style scoped>

</style>
