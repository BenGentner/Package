<?php

namespace Webfactor\WfBasicFunctionPackage;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Nova;
use Webfactor\WfBasicFunctionPackage\Console\InstallCommand;
use Webfactor\WfBasicFunctionPackage\Console\PublishCommand;

class BasicFunctionsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }
    /*
         * TODO:
            - api routes => return json (maybe more routes)
            - view routes => return blade views
            - package read me
            ----
            - clean up everything!!!
            - clean up inserts
            - test: controller: store, update methods with basic validation? (User can then expand them and create views)
            - comments on comments ?
            - cleaner service provider / multiple providers
            - check needed packages and add missing to require (of the package)
            - potential improvements to posts grid ( click event,...)
            - login route in config (used in create comment.vue) maybe add redirect to the post or sth. like that
            - placeholder image
            - tests... a lot of them
         */
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishConfig();
        $this->mergeConfig();
        $this->load();
        $this->publishResources();
        $this->publishControllers();
        $this->addCommands();
    }

    private function load()
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
        $this->loadNova();
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
    private function mergeConfig()
    {
        $this->mergeConfigFrom(config_path("WF_base-config.php"), 'wf-base');
        $this->mergeConfigFrom(config_path("Wf_route-config.php"), 'wf-routes');
        $this->mergeConfigFrom(__DIR__.'/../config/WF_private-config.php', 'wf-private');
    }

    private function publishResources()
    {
        $this->publishes([
            __DIR__.'/../resources/Views/views/' => resource_path('views/Webfactor/WfBasicFunctionPackage/'),
            __DIR__.'/../resources/Views/vue-components' => resource_path('js/Webfactor/WfBasicFunctionPackage/vue/'),
            __DIR__.'/../resources/js' => resource_path('js/Webfactor/WfBasicFunctionPackage/'),
        ], 'WfBasicFunctionPackage-views');
    }

    private function publishControllers()
    {
        //publishes the controllers that should be available to the public
        $this->publishes([
            __DIR__.'/Http/Controllers/view/' => app_path('Http/Controllers/WfBasicFunctionPackage/')
        ], 'WfBasicFunctionPackage-controllers');
    }
    private function publishConfig()
    {
        $this->publishes([
            __DIR__.'/../config/WF_base-config.php' => config_path("WF_base-config.php"),
            __DIR__.'/../config/WF_route-config.php' => config_path("WF_route-config.php"),
        ], 'WfBasicFunctionPackage-config');
    }

    private function addCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
                PublishCommand::class,
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
