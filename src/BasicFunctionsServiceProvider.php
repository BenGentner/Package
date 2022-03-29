<?php

namespace Webfactor\WfBasicFunctionPackage;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Nova;
use phpDocumentor\Reflection\DocBlock\Tag;
use Webfactor\WfBasicFunctionPackage\database\seeders\TagSeeder;
use Webfactor\WfBasicFunctionPackage\Nova\Post;

class BasicFunctionsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Webfactor\WfBasicFunctionPackage\Http\Controllers\PostController');
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'wf-functions');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
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



        $this->loadSeeders(config('wf-functions.seeder'));
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
