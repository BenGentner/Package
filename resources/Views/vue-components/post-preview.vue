<template>
    <a  :href="'/' + post_url + $attrs.data.slug"
        class="border-4 m-2 p-4 hover:border-blue-300 flex grid grid-cols-2 rounded-3xl bg-gray-100 border-gray-400">
        <div class="col-start-1 " v-text="$attrs.data.title"></div>
        <div class="col-start-2 text-right " v-text="'User: ' + $attrs.data.user.name"></div>
        <div class="col-start-1 pt-2 pb-3" v-text="$attrs.data.category.name"></div>
        <p class="col-span-2 col-start-1" v-html="$attrs.data.excerpt"></p>
    </a>


</template>
<script>
export default {
    name: "post-preview",

    data() {
        return {
            post_url: ""
        }
    },
    methods: {

    },

    created() {
        axios.get("/url/single_post_path/")
            .then(response => this.post_url = response.data.replace('{key}/', ''));
    }
}
</script>

<style scoped>

</style>
