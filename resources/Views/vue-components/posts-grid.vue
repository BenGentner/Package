<template>
    <div>
        <div v-for="post in posts" v-text="post.title"></div>
    </div>
</template>

<script>
export default {
    name: "posts-grid.vue",

    data() {
        return {
            posts: []
        }
    },

    created() {
        axios.get("/posts")
            .then(response => this.posts = response.data);
    }
}
</script>

<style scoped>

</style>
