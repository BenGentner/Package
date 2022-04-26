<template>
    <div v-show="this.show"
         class="bg-blue-500 bottom-3 fixed px-4 py-2 right-3 rounded-xl text-sm text-white">
        <p v-text="message">

        </p>
    </div>
</template>

<script>
export default {
    name: "flash.vue",

    props: ["message"],

    data () {
        return {
            show: true,
            time: 4000,
        }
    },

    methods: {
        countdown() {
            setTimeout(() => this.show = false, this.time)
        }
    },

    mounted() {
        this.countdown();
    }
}
</script>

<style scoped>

</style>
