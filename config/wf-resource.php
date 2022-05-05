<?php
/*
 *
 */
return
    [
        /*
         * names of the resources used by the resources
         */

        'models' => [
            'post' => \Webfactor\WfBasicFunctionPackage\Models\Post::class,
            'tag' => \Webfactor\WfBasicFunctionPackage\Models\Tag::class,
            'category' => \Webfactor\WfBasicFunctionPackage\Models\Category::class,
            'media' => \Spatie\MediaLibrary\MediaCollections\Models\Media::class,
            'gallery' => \Webfactor\WfBasicFunctionPackage\Models\Gallery::class,
            'comment' => \Webfactor\WfBasicFunctionPackage\Models\Comment::class,
        ],

        /*
         * names of the resources used by the package
         */

        'resources' => [
            'post' => \Webfactor\WfBasicFunctionPackage\Nova\Post::class,
            'tag' => \Webfactor\WfBasicFunctionPackage\Nova\Tag::class,
            'category' => \Webfactor\WfBasicFunctionPackage\Nova\Category::class,
            'media' => \Webfactor\WfBasicFunctionPackage\Nova\Media::class,
            'gallery' => \Webfactor\WfBasicFunctionPackage\Nova\Gallery::class,
            'comment' => \Webfactor\WfBasicFunctionPackage\Nova\Comment::class,
        ],

        /*
         * All needed Database seeder
         */

        'seeder' => [
            'Webfactor\WfBasicFunctionPackage\database\seeders\TagSeeder',
            'Webfactor\WfBasicFunctionPackage\database\seeders\CategorySeeder',
            'Webfactor\WfBasicFunctionPackage\database\seeders\UserSeeder',
            'Webfactor\WfBasicFunctionPackage\database\seeders\PostSeeder',
            'Webfactor\WfBasicFunctionPackage\database\seeders\MediaSeeder',
            'Webfactor\WfBasicFunctionPackage\database\seeders\GallerySeeder',
            'Webfactor\WfBasicFunctionPackage\database\seeders\CommentSeeder'
        ]
    ];




