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
export default {
    name: "galleries.vue",
    components: {Gallery_preview},
    data() {
        return {
            galleries: [],
        }
    },

    created() {
        axios.get("/api/galleries/")
            .then(response => this.galleries = response.data);
    },
}
</script>

<style scoped>

</style>
