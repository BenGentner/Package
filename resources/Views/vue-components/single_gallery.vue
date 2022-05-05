<template>
    <div>
        <article class="card w-1/5 flex float-left m-2" v-for="image in this.$attrs.data.images">
            <div class="card-image">
                <figure class="image is-16by9">
                    <a :href="url + image.uuid">
                        <img :src="getThumbnailUrl(image)" rel="test" :alt="image.name" loading="lazy">
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
        getThumbnailUrl(image)
        {
            var og_path = image.original_url;
            var extension = image.file_name.substring(image.file_name.lastIndexOf('.'), image.file_name.length) || image.file_name
            return og_path.replace(image.file_name,  'conversions/' + image.name + "-thumb" + extension);
        },
    },

    created() {
        config.get("medium_path")
            .then(response => this.url = "/" + response.replace('{key}/', ''))
            .catch(error => console.error(error));

    }
}
</script>

<style scoped>

</style>
