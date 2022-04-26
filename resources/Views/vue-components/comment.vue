<template>
    <article class="m-2 border-2 p-2 rounded-xl grid grid-columns-2">
        <h1 class="col-start-1" v-text="'Comment by: ' + $attrs.data.user.name "></h1>
        <h2 class="col-start-2 text-right pr-2 text-blue-600" v-if="checkUser()" @click="edit = !edit">Edit</h2>
        <span v-if="!this.edit" v-text="$attrs.data.body"></span>
        <edit_comment
            v-if="this.edit"
            :comment="this.$attrs.data.id"
            :body="this.$attrs.data.body"
            @success="success">
        </edit_comment>
    </article>


<!--    <article class="media">-->
<!--        <div class="media-content">-->
<!--            <div class="content">-->
<!--                <p>-->
<!--                    <strong>comment user</strong>-->
<!--                    <br>-->
<!--                    comment body-->
<!--                    <br>-->
<!--                    <small><a>edit</a> 2 hrs</small>-->
<!--                </p>-->
<!--            </div>-->
<!--        </div>-->
<!--    </article>-->

<!--    <article class="media">-->
<!--        another comment-->
<!--    </article>-->

</template>




<script>
import edit_comment from "./edit-comment.vue"
export default {
    name: "comment.vue",

    components: {edit_comment},

    data() {
        return {
            user: '',
            isLoaded: false,
            edit: false,
        }
    },

    mounted() {
        axios.get("/current_user/")
            .then((response) =>
            {
                this.user = response.data;
                this.isLoaded = true;
            });
    },

    methods: {
        checkUser() {
            //prevents v-if before the user has been loaded
            if(this.isLoaded) {
                if (this.$attrs.data.user.name === this.user?.name)
                    return true;
            }
        },
        success(message) {
            console.log(message)
            this.edit = !this.edit;
            /*
                TODO: no complete page reload
             */
            location.reload();
        }
    },
}
</script>

<style scoped>

</style>
