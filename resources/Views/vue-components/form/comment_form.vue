<template>
    <form class="m-4 col-start-1 col-span-2" @submit.prevent="onSubmit()" @keydown="form.errors.clear($event.target.name)">
        <p>
            <textarea class="w-100 border-2 border-black" rows="15" name="body" v-model="form.body" v-text="this.getBody"></textarea>
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
</template>

<script>
import Form from "./Form.js"
export default {
    props: ["post", "body", "type"],
    name: "comment_form.vue",
    data() {
        return {
            form: new Form({
                body: ''
            }),
            post_url: '',
            user: null,
        }
    },
    created() {
        if(this.type === "create")
        {
            axios.get("/url/store_comment/")
                .then(response => this.post_url = response.data.replace('{key}', this.post));
        }
        else if(this.type === "update")
        {
            axios.get("/url/update_comment/")
                .then(response => this.post_url = response.data.replace('{key}', this.post));
        }

        axios.get("/current_user/")
            .then(response => this.user = response.data);
    },
    methods: {
        onSubmit() {
            this.form.post(this.post_url)
                .then(success_message => this.$emit("success", success_message))
                .catch(error_message => console.error(error_message));
        },
    },
    computed: {
        getBody() {
            return this.body ?? "comment";
        }
    }
}
</script>

<style scoped>

</style>
