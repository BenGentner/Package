<template>
    <div class="m-2.5">
        <label class="label mr-4">Category</label>
        <dropdown :current-value="this.category"
                  :value-list="categories"
                  @selected="getSelectedCategory">
        </dropdown>
    </div>
</template>

<script>
import dropdown from "./dropdown.vue"
export default {
    props: ["category"],
    name: "category-dropdown.vue",
    components: {dropdown},

    data() {
        return {
            categories: '',
        }
    },

    created() {
        axios.get("/api/categories/")
            .then(response => this.categories = response.data)
    },
    methods: {
      getSelectedCategory(category) {
          this.$emit("selectedCategory", category)
      }
    }
}
</script>

<style scoped>

</style>
