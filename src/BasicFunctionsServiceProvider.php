<?php

namespace Webfactor\WfBasicFunctionPackage;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\ServiceProvider;
use Webfactor\WfBasicFunctionPackage\Console\InstallCommand;
use Webfactor\WfBasicFunctionPackage\Console\PublishCommand;

class BasicFunctionsServiceProvider extends ServiceProvider
{
    /*
         * TODO:
            - api routes => return json (maybe more routes)
            - view routes => return blade views
            - package read me
            ----
            - clean up everything!!!
            - test: controller: store, update methods with basic validation? (User can then expand them and create views)
            - comments on comments ?
            - cleaner service provider / multiple providers
            - check needed packages and add missing to require (of the package)
            - login route in config (used in create comment.vue) maybe add redirect to the post or sth. like that
            - placeholder image
            - tests... a lot of them
            - test if migrations should be publishable
         */
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/wf-base.php', 'wf-base');
        $this->mergeConfigFrom(__DIR__.'/../config/wf-routes.php', 'wf-routes');
        $this->mergeConfigFrom(__DIR__.'/../config/wf-resource.php', 'wf-resource');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerCommands();
        $this->load();
        $this->registerPublishableContent();
    }

    private function registerPublishableContent()
    {
        $this->registerPublishableConfig();
        $this->registerPublishableResources();
        $this->registerPublishableControllers();
        $this->registerPublishableNova();
    }

    private function load()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
//        $this->loadViewsFrom(__DIR__.'/../resources/Views/views', 'WfFunctions');
        /**
         * seeders not needed outside package-test
         */
//        $this->loadSeeders(config('wf-resource.seeder'));
        $this->loadNova();
    }

    private function loadNova()
    {
        $models = config('wf-resource.models');
        $resources = config('wf-resource.resources');

        //register resource and set model
        foreach ($resources as $name => $class) {
            if ($name !== 'user') {
                $class::$model = $models[$name];
//                Nova::resources([$class]);
            }
        }

    }

    private function registerPublishableResources()
    {
        $this->publishes([
            __DIR__.'/../resources/Views/views/' => resource_path('views/Webfactor/WfBasicFunctionPackage/'),
            __DIR__.'/../resources/Views/vue-components' => resource_path('js/Webfactor/WfBasicFunctionPackage/vue/'),
            __DIR__.'/../resources/js' => resource_path('js/Webfactor/WfBasicFunctionPackage/'),
        ], 'WfBasicFunctionPackage-views');
    }

    private function registerPublishableControllers()
    {
        //publishes the controllers that should be available to the public
        $this->publishes([
            __DIR__.'/Http/Controllers/view/' => app_path('Http/Controllers/WfBasicFunctionPackage/')
        ], 'WfBasicFunctionPackage-controllers');
    }
    private function registerPublishableConfig()
    {
        $this->publishes([
            __DIR__.'/../config/wf-base.php' => config_path("wf-base.php"),
            __DIR__.'/../config/wf-routes.php' => config_path("wf-routes.php"),
            __DIR__.'/../config/wf-resource.php' => config_path("wf-resource.php"),
        ], 'WfBasicFunctionPackage-config');
    }
    private function registerPublishableNova()
    {
        $this->publishes([
            __DIR__.'/Nova/Publishable/' => app_path("/Nova/"),
        ], 'WfBasicFunctionPackage-nova');
    }

    private function registerCommands()
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
