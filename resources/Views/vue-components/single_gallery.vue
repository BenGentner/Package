<template>
    <div>
        <article class="card w-1/5 float-left m-2" v-for="medium in this.$attrs.data.media">
            <div class="card-image">
                <figure class="image is-16by9">
                    <a :href="'/storage/' + medium.id + '/' + medium.file_name">
                        <img :src="getUrl(medium)" rel="test" alt="https://bulma.io/images/placeholders/640x360.png" loading="lazy">
                    </a>

                </figure>
            </div>
        </article>
    </div>
</template>

<script>
export default {
    name: "single_gallery.vue",
    data() {
        return {
            url: '',
        }
    },

    methods: {
        getUrl(image)
        {
            var path = '/./storage/' + image.id + '/conversions/';
            var extension = image.file_name.substring(image.file_name.lastIndexOf('.'), image.file_name.length) || image.file_name
            var thumbnail =  image.name + "-thumb" + extension;
            return path +thumbnail;
        }
    },

    created() {
    }
}
</script>

<style scoped>

</style>
