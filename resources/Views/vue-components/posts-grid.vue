<template>
    <div>
        <category-dropdown :category="category" @selectedCategory="updateCategory"></category-dropdown>
        <div class="field flex p-2 inline-flex items-center w-3/4">
            <label class="label pr-4">Search: </label>
            <div class="control w-1/4" >
                <input name="search"
                       @keyup="updateSearch($event)"
                       onclick="this.select()"
                       class="input"
                       type="text"
                       placeholder="Search for tags, usernames or titles">
            </div>
        </div>
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
            search_text: null
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
                params: {category: this.category, search: this.search_text}})
                .then(response => this.posts = response.data)

        },
        updateCategory (category) {
            this.category = category;
            this.getPosts();
        },
        updateSearch(event) {
            this.search_text = event.target.value;
            this.getPosts();
        }
    }
}
</script>

<style scoped>

</style>
