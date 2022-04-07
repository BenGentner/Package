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
import config from "./config.js"
export default {
    name: "posts-grid.vue",
    components: {CategoryDropdown, PostPreview},
    data() {
        return {
            posts: [],
            category: null,
            posts_url: null,
        }
    },

    created() {
        config.get("multiple_posts_path")
            .then((response) => {
                this.posts_url = response;
                this.getPosts();
            }).catch(error => console.error(error))
    },
    methods: {
        getPosts() {
            axios.get("/api/" +  this.posts_url, {
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
