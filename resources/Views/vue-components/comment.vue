<template>
    <article class="m-2 border-2 p-2 rounded-xl">
        <h1 v-text="'Comment by: ' + $attrs.data.user.name "></h1>
        <span v-text="$attrs.data.body"></span>
<!--        <create_comment></create_comment>-->
    </article>
</template>

<script>
import Create_comment from "./create_comment.vue"
export default {
    name: "comment.vue",

    components: {Create_comment},
}
</script>

<style scoped>

</style>
