<template>
    <div class="flex grid grid-cols-2">
        <h2 class="m-2 col-start-1">Create Comment: </h2>
        <h2 v-if="this.user" class="m-2 col-start-2 text-right mr-4">You are commenting as: {{this.user.name}}</h2>
        <h2 v-else class="m-2 col-start-2 text-right mr-4">Please <a href="/login">Log in</a> to comment</h2>
        <comment_form
            :post="this.post"
            type="create"
        @success="success">
        </comment_form>
    </div>

<!--    <article class="media">-->
<!--        username-->
<!--        <div class="media-content">-->
<!--            <div class="field">-->
<!--                <p class="control">-->
<!--                    <textarea class="textarea" placeholder="Add a comment..."></textarea>-->
<!--                </p>-->
<!--            </div>-->
<!--            <div class="field">-->
<!--                <p class="control">-->
<!--                    <button class="button">Post comment</button>-->
<!--                </p>-->
<!--            </div>-->
<!--        </div>-->
<!--    </article>-->

</template>

<script>

import Comment_form from "./form/comment_form.vue"
export default {
    components: {Comment_form},
    props: ["post"],
    name: "create_comment.vue",

    data() {
        return {
            user: null,
        }
    },
    created() {
        axios.get("/current_user/")
            .then(response => this.user = response.data);
    },
    methods: {
        success(message)
        {
            console.log("message")
            location.reload();
        }
    }
}
</script>

<style scoped>

</style>
