<?php
    return [
        /**
         * ----------------------------------------
         *         Route Configuration
         * ----------------------------------------
         *
         */


        /*
        *-----------------------------
        *         Gallery Paths
        *-----------------------------
        */


        // path  all galleries:
        "galleries_path" => "galleries/",


         //path a single gallery with images
        "gallery_path" => "gallery/{key}/",


        /*
        *-----------------------------
        *         Medium Paths
        *-----------------------------
        */

         // path to a single medium (image)
        "medium_path" => "media/{key}/",


        /*
        *-----------------------------
        *         Post Paths
        *-----------------------------
        */

        // path to a single post
        "single_post_path" => "post/{key}/",


        // path to multiple posts
        "multiple_posts_path" => "posts/",


        /*
        *-----------------------------
        *         Comment Paths
        *-----------------------------
        */

        // path to store a comment
        "store_comment" => '/api/' . 'post/{key}/' . 'comment/store/',


        // path to update a comment
        "update_comment" => '/api/' . 'comment/{key}/' . 'comment/update/'

    ];
