import Vue from "vue";
import axios from "axios";
import posts_grid from "./vue/posts-grid.vue";
import post_preview from "./vue/post-preview.vue";
import single_post from "./vue/single_post.vue";
import single_gallery from "./vue/single_gallery.vue";
import galleries from "./vue/galleries.vue";
import flash from "./vue/flash.vue"

window.axios = axios;

/*
    TODO:
     - update import path / tests needed (if the path still works when importing the package)
 */

// import {createApp} from "vue";
// createApp({
//     components: {posts_grid, post_preview, single_post, single_gallery, galleries}
// }).mount("#app")

window.onload = function ()
{
    new Vue({
        el: "#app",

        components: {posts_grid, post_preview, single_post, single_gallery, galleries, flash}
    })
}




