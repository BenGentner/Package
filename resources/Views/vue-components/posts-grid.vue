<template>
    <div>
<!--        post preview-->
         <post-preview
             v-for="post in posts"
             v-bind:data="post"
             v-bind:key="post.id">
         </post-preview>
    </div>
</template>

<script>
import PostPreview from "./post-preview";
export default {
    name: "posts-grid.vue",
    components: {PostPreview},
    data() {
        return {
            posts: []
        }
    },

    created() {
        axios.get("/api/posts/")
            .then(response => this.posts = response.data);
    }
}
</script>

<style scoped>

</style>
