import Vue from "vue";
import {BootstrapVue, BootstrapVueIcons} from "bootstrap-vue"
import axios from "axios";
import posts_grid from "./vue/posts-grid.vue";
import post_preview from "./vue/post-preview.vue";
import single_post from "./vue/single_post.vue";
import single_gallery from "./vue/single_gallery.vue";
import galleries from "./vue/galleries.vue";
// import test1 from "../../../../../resources/views/Webfactor/WfBasicFunctionPackage/vue-components/test.vue";
// import test2 from "../Views/vue-components/test.vue";

window.axios = axios;

/*
    TODO:
        - update import path / tests needed (if the path still works when importing the package)
 */

window.onload = function ()
{
    Vue.use(BootstrapVue)
    Vue.use(BootstrapVueIcons)
    new Vue({
        el: "#app",

        components: {posts_grid, post_preview, single_post, single_gallery, galleries}
    })
}



