<template>
<!--    <a :href="'./gallery/' + $attrs.data.slug">-->
<!--        -->
<!--    </a>-->
    <article class="card w-1/5 float-left m-2" @click="directToGallery">
        <div class="card-header">
            <p class="card-header-title" v-text="$attrs.data.title"></p>
        </div>
        <div class="card-image">
            <figure class="image is-16by9">
                <img :src="this.url" alt="https://bulma.io/images/placeholders/640x360.png">
            </figure>
        </div>
        <div class="card-content">
            <div class="content">
                <div v-text="$attrs.data.description"></div>
                <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
            </div>
        </div>
    </article>


</template>

<script>
import config from "./config";

export default {
    name: "gallery_preview.vue",

    data() {
        return {
            url: '',
            routes_url: null,
        }
    },

    methods: {
        directToGallery()
        {
            location.href=this.routes_url;
        },
        getUrl(image)
        {
            var path = './storage/' + image.id + '/conversions/';
            var extension = image.file_name.substring(image.file_name.lastIndexOf('.'), image.file_name.length) || image.file_name
            var thumbnail = image.name + "-thumb" + extension;

            return path +thumbnail;
        }
    },

    created() {
        this.url = this.getUrl(this.$attrs.data.header_image);

        config.get("gallery_path")
            .then(response => this.routes_url = response.replace('{key}', this.$attrs.data.slug))
            .catch(error => console.error(error));
    }
}
</script>

<style scoped>

</style>
