<template>
    <div class="field">
        <div class="control">
            <div class="select">
                <select  @change="selectCategory">
                    <option :value="null" v-text="all.name">
                    </option>
                    <option v-for="value in valueList"
                        v-bind:key = "value.id"
                        v-if="checkIsCurrent(value)"
                        v-text="value.name"
                        :value="value.id">
                    </option>
                </select>
            </div>
        </div>
    </div>
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
          console.log(category.target.value);
            this.$emit('selected', category.target.value);
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
