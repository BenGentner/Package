<?php
    /*
     *
     */
    return
    [
        /**
         * Each of the following values can also be overwritten by adding a different value
         * to the request that calls the show method.
         * They will be used as default values if there is no amount or skip parameter in the request
         */

        /*
        | -----------------------------
        | Amount of posts
        | -----------------------------
        | This value will be used by the PostController. It can be used to
        | in- /decrease the amount of posts which will be returned by the show
        | method.
        */

        'default_amount_posts' => 10,

        /*
        | -----------------------------
        | Skip Posts
        | -----------------------------
        | This value will be used by the PostController. It can be used to
        | skip a specific amount of posts when using the show method.
        */

        'default_skip_posts' => 0,

        /*
        | -----------------------------
        | Amount of galleries
        | -----------------------------
        | This value will be used by the GalleryController. It can be used to
        | in- /decrease the amount of galleries that will be returned by the show
        | method.
        */

        'default_amount_galleries' => 10,

        /*
        | -----------------------------
        | Skip Galleries
        | -----------------------------
        | This value will be used by the GalleryController. It can be used to
        | skip a specific amount of galleries when using the show method.
        */

        'default_skip_galleries' => 0,


    ];




