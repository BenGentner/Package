<template>
    <div>
        <article class="card w-1/5 float-left m-2" v-for="medium in this.$attrs.data.media">
            <div class="card-image">
                <figure class="image is-16by9">
                    <img :src="'/storage/' + medium.path" rel="test" alt="https://bulma.io/images/placeholders/640x360.png" loading="lazy">
                </figure>
            </div>
        </article>
    </div>
</template>

<script>
export default {
    name: "single_gallery.vue"
}
</script>

<style scoped>

</style>
