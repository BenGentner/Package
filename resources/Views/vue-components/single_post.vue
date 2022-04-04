<template>
    <article class="m-4 border-4 p-2 rounded-3xl">
        <h1 v-text="$attrs.data.title"></h1>
        <h2 v-text="$attrs.data.category.name"></h2>
        <p  v-html="$attrs.data.body"></p>
        <h2 class="mt-3">Comments: </h2>
        <create_comment
            v-if="$attrs.data.comments_allowed"
            :post = "$attrs.data.slug">
        </create_comment>
        <comment
            v-for="comment in $attrs.data.comments"
            v-bind:data="comment"
            v-bind:key="comment.id"
        ></comment>

    </article>

</template>

<script>
import Comment from "./comment.vue"
import Create_comment from "./create_comment.vue"

export default {
    name: "single_post.vue",
    components: {Create_comment, Comment}
}
</script>
