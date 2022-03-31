import Vue from "vue";
import axios from "axios";
import posts_grid from "../../../../../resources/views/Webfactor/WfBasicFunctionPackage/vue-components/posts-grid.vue";
import post_preview from "../../../../../resources/views/Webfactor/WfBasicFunctionPackage/vue-components/post-preview.vue";
import single_post from "../../../../../resources/views/Webfactor/WfBasicFunctionPackage/vue-components/single_post.vue";
// import test1 from "../../../../../resources/views/Webfactor/WfBasicFunctionPackage/vue-components/test.vue";
// import test2 from "../Views/vue-components/test.vue";

window.axios = axios;

/*
    TODO:
        - update import path / tests needed (if the path still works when importing the package)
 */

window.onload = function ()
{
    new Vue({
        el: "#app",

        components: {posts_grid, post_preview, single_post}
    })
}




