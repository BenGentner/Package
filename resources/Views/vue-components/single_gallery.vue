<template>
    <div>
        <article class="card w-1/5 float-left m-2" v-for="image in this.$attrs.data.images">
            <div class="card-image">
                <figure class="image is-16by9">
                    <a :href="url + image.id">
                        <img :src="getStorageUrl(image)" rel="test" alt="https://bulma.io/images/placeholders/640x360.png" loading="lazy">
                    </a>

                </figure>
            </div>
        </article>
    </div>
</template>

<script>
import config from "./config";

export default {
    name: "single_gallery.vue",
    data() {
        return {
            url: 'default',
        }
    },

    methods: {
        getStorageUrl(image)
        {
            var path = '/storage/' + image.id + '/conversions/';
            var extension = image.file_name.substring(image.file_name.lastIndexOf('.'), image.file_name.length) || image.file_name
            var thumbnail =  image.name + "-thumb" + extension;
            return path +thumbnail;
        },

    },

    created() {
        config.get("medium_path")
            .then(response => this.url = "/api/" + response.replace('{key}/', ''))
            .catch(error => console.error(error));

    }
}
</script>

<style scoped>

</style>
