<template>
    <div>
        <h1 v-text="$attrs.data.title"></h1>
        <p v-text="$attrs.data.body"></p>
    </div>

</template>

<script>
export default {
    name: "single_post.vue"
}
</script>
