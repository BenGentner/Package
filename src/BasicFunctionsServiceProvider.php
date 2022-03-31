<?php

namespace Webfactor\WfBasicFunctionPackage;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Nova;
use phpDocumentor\Reflection\DocBlock\Tag;
use Webfactor\WfBasicFunctionPackage\Console\AssetCommand;
use Webfactor\WfBasicFunctionPackage\Console\DevCommand;
use Webfactor\WfBasicFunctionPackage\Console\InstallCommand;
use Webfactor\WfBasicFunctionPackage\Console\PublishCommand;
use Webfactor\WfBasicFunctionPackage\database\seeders\TagSeeder;
use Webfactor\WfBasicFunctionPackage\Nova\Post;

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
        $this->app->make('Webfactor\WfBasicFunctionPackage\Http\Controllers\PostController');
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'wf-functions');
        $this->mergeConfigFrom(__DIR__.'/../config/route_config.php', 'wf-routes');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        /*
         *         TODO:
                        - api routes => return json
                        - view routes => return blade views
                        => maybe separate controller and publish those with the view routes
                        - clean up Service Provider
                        - package read me
         */

        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        $models = config('wf-functions.models');
        $resources = config('wf-functions.resources');

        //register resource and set model
        foreach ($resources as $name => $class) {
            if ($name !== 'user') {
                $class::$model = $models[$name];
                Nova::resources([$class]);
            }
        }

        $this->loadViewsFrom(__DIR__.'/../resources/Views/views', 'WfFunctions');

        $this->loadSeeders(config('wf-functions.seeder'));

        /**
         * todo:
         *  - publish vue components / views
         *  - load views from package or project => potential change
         */

        //publishes just one component (just remove the component to publish the hole directory)

        $this->publishes([
            __DIR__.'/../resources/Views/' => resource_path('views/Webfactor/WfBasicFunctionPackage/'),
        ], 'WfBasicFunctionPackage-views');

        //publish app.js
        $this->publishes([
            __DIR__.'/../public/' => public_path('js/Webfactor/WfBasicFunctionPackage'),
        ], 'WfBasicFunctionPackage-js');

        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
                AssetCommand::class,
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
