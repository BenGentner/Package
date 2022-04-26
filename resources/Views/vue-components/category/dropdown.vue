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
<!--    TODO: -which dropdown? top isn't working atm-->
<!--    <b-dropdown variant="primary m-2">-->
<!--        <template #button-content>-->
<!--            <div v-text="currentCategory.name"></div>-->
<!--        </template>-->
<!--        <b-dropdown-item-button-->
<!--            v-for="value in valueList"-->
<!--            v-bind:key = "value.id"-->
<!--            v-if="checkIsCurrent(value)"-->
<!--            @click="selectCategory(value)">-->
<!--            {{value.name}}-->
<!--        </b-dropdown-item-button>-->
<!--        <b-dropdown-item-button-->
<!--            @click="selectCategory(null)"-->
<!--            v-if="checkIsCurrent(this.all)">-->
<!--            {{this.all.name}}-->
<!--        </b-dropdown-item-button>-->
<!--    </b-dropdown>-->

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
