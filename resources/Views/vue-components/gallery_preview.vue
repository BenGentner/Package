<template>
<!--    <a :href="'./gallery/' + $attrs.data.slug">-->
<!--        -->
<!--    </a>-->
    <article class="card w-1/5 m-2 inline-flex" @click="directToGallery">
        <div class="card-header">
            <p class="card-header-title" v-text="$attrs.data.title"></p>
        </div>
        <div class="card-image">
            <figure class="image is-16by9">
                <img :src="this.url" :alt="$attrs.data.title">
            </figure>
        </div>
        <div class="card-content">
            <div class="content">
                <div v-html="$attrs.data.description"></div>
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
        getThumbnailUrl(image)
        {
          if(image == null)
            return null;
          var og_path = image.original_url;
          var extension = image.file_name.substring(image.file_name.lastIndexOf('.'), image.file_name.length) || image.file_name
          return og_path.replace(image.file_name,  'conversions/' + image.name + "-thumb" + extension);
        }
    },

    created() {
        this.url = this.getThumbnailUrl(this.$attrs.data.header_image);

        config.get("gallery_path")
            .then(response => this.routes_url = response.replace('{key}', this.$attrs.data.slug))
            .catch(error => console.error(error));
    }
}
</script>

<style scoped>

</style>
