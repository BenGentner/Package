import Vue from "vue";
import axios from "axios";
import posts_grid from "../../../../../resources/views/Webfactor/WfBasicFunctionPackage/vue-components/posts-grid.vue";
import post_preview from "../../../../../resources/views/Webfactor/WfBasicFunctionPackage/vue-components/post-preview.vue";
// import test1 from "../../../../../resources/views/Webfactor/WfBasicFunctionPackage/vue-components/test.vue";
// import test2 from "../Views/vue-components/test.vue";

window.axios = axios;

/*
    TODO:
        - update import path
        - default vue component
        - install Command (publishes the vue components that can be changed)
        - update dev command or sth like that => includes npm run dev package side and publishes the new app.js
        - or
        - have another app.js file that gets published to and registers the vue components on the project side
        - => updated vue components will be compiled as soon as the user runs npm run dev



 */

window.onload = function ()
{
    new Vue({
        el: "#app",

        components: {posts_grid, post_preview}
    })
}




