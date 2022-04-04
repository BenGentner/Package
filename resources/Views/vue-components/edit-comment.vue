<template>
  <div>
      <comment_form
        type="update"
        :body="this.body"
        :post="this.comment"
        @success="success"
      ></comment_form>
  </div>
</template>

<script>
import Comment_form from "./form/comment_form.vue"
export default {
    //previous body + id of the comment
    props: ["body", "comment"],
    name: "edit-commend.vue",
    components: {Comment_form},

    methods: {
        success(message) {
            this.$emit("success", message);
        }
    }
}
</script>

<style scoped>

</style>
