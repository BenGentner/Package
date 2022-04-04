<template>
    <div>
        <category-dropdown :category="category" @selectedCategory="updateCategory"></category-dropdown>
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
import CategoryDropdown from "./category/category-dropdown.vue"
export default {
    name: "posts-grid.vue",
    components: {CategoryDropdown, PostPreview},
    data() {
        return {
            posts: [],
            category: null,
        }
    },

    created() {
        this.getPosts()

    },
    methods: {
        getPosts() {
            axios.get("/api/posts/", {
                params: {category: this.category?.id}})
                .then(response => this.posts = response.data)

        },
        updateCategory (category) {
            this.category = category;
            this.getPosts();
        }
    }
}
</script>

<style scoped>

</style>
