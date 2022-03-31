<template>
    <a  :href="'/post/' + $attrs.data.slug" class="border-4 m-2 p-4 hover:border-blue-300 flex grid grid-cols-2" @click="loadPost">
        <div class="col-start-1" v-text="$attrs.data.title"></div>
        <div class="col-start-2 text-right" v-text="'User: ' + $attrs.data.user.name"></div>
        <br>
        <p class="col-span-2 col-start-1" v-text="$attrs.data.excerpt"></p>
    </a>


</template>

<script>
export default {
    name: "post-preview",

    data() {
        return {

        }
    },
    methods: {
        loadPost() {
            console.log("hi")
        }
    }
}
</script>

<style scoped>

</style>
