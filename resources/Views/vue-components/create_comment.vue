<template>
    <div class="flex grid grid-cols-2">
        <h2 class="m-2 col-start-1">Create Comment: </h2>
        <h2 class="m-2 col-start-2 text-right mr-4">You are commenting as: </h2>
        <form class="m-4 col-start-1 col-span-2" @submit.prevent="onSubmit()" @keydown="form.errors.clear($event.target.name)">
            <p>
                <textarea class="w-100 border-2 border-black" rows="15" name="body" v-model="form.body" placeholder="comment"></textarea>
                <span class="text-danger"
                    :disabled="form.errors.any()"
                    v-if="form.errors.has('body')"
                    v-text="form.errors.get('body')">
                </span>
            </p>
            <p>
                <button :disabled="form.errors.any()" class="button is-primary mt-2">Submit</button>
            </p>
        </form>
    </div>



</template>

<script>
import Form from "./form/Form.js"
export default {
    props: ["post"],
    name: "create_comment.vue",

    data() {
        return {
            form: new Form({
                body: ''
            }),
            post_url: '',
        }
    },
    created() {
        axios.get("/url/store_comment/")
            .then(response => this.post_url = response.data.replace('{key}', this.post));
    },
    methods: {
        onSubmit() {
            this.form.post(this.post_url)
                .then(success_message => console.log(success_message))
                .catch(error_message => console.error(error_message));
        },
    },
}
</script>

<style scoped>

</style>
