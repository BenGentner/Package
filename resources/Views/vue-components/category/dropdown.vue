<template>
    <b-dropdown variant="primary m-2">
        <template #button-content>
            <div v-text="currentCategory.name"></div>
        </template>
        <b-dropdown-item-button
            v-for="value in valueList"
            v-bind:key = "value.id"
            v-if="checkIsCurrent(value)"
            @click="selectCategory(value)">
            {{value.name}}
        </b-dropdown-item-button>
        <b-dropdown-item-button
            @click="selectCategory(null)"
            v-if="checkIsCurrent(this.all)">
            {{this.all.name}}
        </b-dropdown-item-button>
    </b-dropdown>
</template>

<script>
export default {
    props: ["currentValue", "valueList"],

    name: "dropdown.vue",

    data() {
        return {
            show: false,
            all: {"name": "all Categories", "slug": "all"}
        }
    },
    methods: {
      selectCategory(category) {
            this.$emit('selected', category)
      },
      checkIsCurrent(value) {
        if(value.slug !== this.currentCategory.slug)
            return true;
      }
    },
    computed: {
        currentCategory() {
            if(!this.currentValue)
                return this.all;
            else
                return this.currentValue
        }
    }

}
</script>

<style scoped>

</style>
