<?php

namespace Webfactor\WfBasicFunctionPackage;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Nova;
use Webfactor\WfBasicFunctionPackage\Console\DevCommand;
use Webfactor\WfBasicFunctionPackage\Console\InstallCommand;
use Webfactor\WfBasicFunctionPackage\Console\PublishCommand;

class BasicFunctionsServiceProvider extends ServiceProvider
{
    /*
     * TODO:
     *  - clean up provider / make multiple providers and one that calls the others
     */
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /*
         * TODO:
         *  -make controller probably not needed:
         */
//        $this->app->make('Webfactor\WfBasicFunctionPackage\Http\Controllers\PostController');
        $this->mergeConfig();
    }

    private function mergeConfig()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/WF_base-config.php', 'wf-base');
        $this->mergeConfigFrom(__DIR__.'/../config/WF_private-config.php', 'wf-private');
        $this->mergeConfigFrom(__DIR__.'/../config/Wf_route-config.php', 'wf-routes');
    }
    /*
         * TODO:
            - api routes => return json (maybe more routes)
            - view routes => return blade views
            - package read me
            - clean up everything!!!
            - clean up inserts
            - front-end create post needed in package?
            - controller: store, update methods with basic validation? (User can then expand them and create views)
            - basic create, ... view?
            - comments on comments ?
            - install command with register service provider (example install command laravel nova) (multiple service provider)
            - check needed packages and add missing to require (of the package)
            - potential improvements to posts grid ( click event,...)
            - login route in config (used in create comment.vue) maybe add redirect to the post or sth. like that
            - placeholder image
            - make posts prettier (single post, comment, create comment)
            - gallery header image foreign key
            - nova group resources
            - tests... a lot of them
            - comment body improvements (return doesn't get shown properly)
            - command to install vue (working but vue 3 get installed, not working with bootstrap)
            - sql optimization (too many curren_user requests...) (check clockwork)
            - category with bulma css

         */
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMethods();
        $this->loadNova();
        $this->publishResources();
        $this->publishControllers();
        $this->addCommands();
    }

    private function loadMethods()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        /*
         * TODO:
         *  - currently using published views => don't have to load them
         *  - just load views that won't be published
         */
//        $this->loadViewsFrom(__DIR__.'/../resources/Views/views', 'WfFunctions');
        $this->loadSeeders(config('wf-private.seeder'));
    }

    private function loadNova()
    {
        $models = config('wf-private.models');
        $resources = config('wf-private.resources');

        //register resource and set model
        foreach ($resources as $name => $class) {
            if ($name !== 'user') {
                $class::$model = $models[$name];
                Nova::resources([$class]);
            }
        }
    }

    private function publishResources()
    {
        /**
         * todo:
         *  - publish which vue components / views
         */

        //publishes just one component (just remove the component to publish the hole directory)

        $this->publishes([
            __DIR__.'/../resources/Views/views/' => resource_path('views/Webfactor/WfBasicFunctionPackage/'),
            __DIR__.'/../resources/Views/vue-components' => resource_path('js/Webfactor/WfBasicFunctionPackage/vue/'),
            __DIR__.'/../resources/js' => resource_path('js/Webfactor/WfBasicFunctionPackage/'),
        ], 'WfBasicFunctionPackage-views');

        // todo: test if needed (publish app.js:)
//        $this->publishes([
//            __DIR__.'/../public/' => public_path('js/Webfactor/WfBasicFunctionPackage'),
//        ], 'WfBasicFunctionPackage-js');
    }

    private function publishControllers()
    {
        //publishes the controllers that should be available to the public
        $this->publishes([
            __DIR__.'/Http/Controllers/view/' => app_path('Http/Controllers/WfBasicFunctionPackage/')
        ], 'WfBasicFunctionPackage-controllers');
    }

    private function addCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
                PublishCommand::class,
                DevCommand::class
            ]);
        }
    }

    private function loadSeeders($seed_list){
        $this->callAfterResolving(DatabaseSeeder::class, function ($seeder) use ($seed_list) {
            foreach ((array) $seed_list as $path) {
                $seeder->call($path);
                // here goes the code that will print out in console that the migration was succesful
            }
        });
    }
}
