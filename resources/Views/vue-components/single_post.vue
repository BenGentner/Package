<template>
    <article class="m-4 border-4 p-2 rounded-3xl">
        <h1 class="label" v-text="$attrs.data.title"></h1>
        <h2 class="label" v-text="'Category: ' + $attrs.data.category.name"></h2>
        <h2 class="label">Body</h2>
        <p  v-html="$attrs.data.body"></p>
        <p class="mt-2 label">Tags: </p>
        <p v-text="tags"></p>
        <div v-if="$attrs.data.commentable">
            <h2 class="mt-3">Comments: </h2>
            <create_comment
                :post = "$attrs.data.slug">
            </create_comment>
        </div>
        <div class="text-red-500 text-xl" v-else>Comments are not allowed on this post!</div>
        <comment v-if="ready"
            v-for="comment in $attrs.data.comments"
            v-bind:data="comment"
            v-bind:key="comment.id"
        ></comment>

    </article>

<!--    <article class="media">-->
<!--        <div class="media-content">-->
<!--            <div class="content">-->
<!--                <p>-->
<!--                    <strong>User</strong>-->
<!--                    <br>-->
<!--                    Post-->
<!--                    <br>-->
<!--                    <small><a>Category</a> · <a>tags</a> · 3 hrs</small>-->
<!--                </p>-->
<!--            </div>-->

<!--        </div>-->
<!--    </article>-->

</template>






<script>
import Comment from "./comment.vue"
import Create_comment from "./create_comment.vue"

export default {
    name: "single_post.vue",
    components: {Create_comment, Comment},

    data () {
        return {
            ready: false,
        }
    },

    mounted() {
        this.ready = true;
    },

    computed: {
        tags() {
            let tags = "";
            this.$attrs.data.tags.map(tag => {
                tags += tag.name + ', ';
            });
            return tags;
        }
        // tags() {
        //     return this.$attrs.data.tags.map(tag => {
        //         return tag.name
        //     });
        // }
    }
}
</script>
