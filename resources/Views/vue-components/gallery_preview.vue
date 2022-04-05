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
                <img :src="'./storage/' +$attrs.data.header_image.id + '/conversions/' + $attrs.data.header_image.file_name" alt="https://bulma.io/images/placeholders/640x360.png">
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
export default {
    name: "gallery_preview.vue",

    methods: {
        directToGallery()
        {
            location.href="/gallery/" + this.$attrs.data.slug + "/";
        }
    }
}
</script>

<style scoped>

</style>
