<?php

namespace Webfactor\WfBasicFunctionPackage;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Nova;
use Webfactor\WfBasicFunctionPackage\Console\AssetCommand;
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
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'wf-functions');
        $this->mergeConfigFrom(__DIR__.'/../config/route_config.php', 'wf-routes');
    }
    /*
         * TODO:
            - api routes => return json
            - view routes => return blade views
            => maybe separate controller and publish those with the view routes
            - package read me
            - clean up !!!
            - check if all() methods make sense (or render the first 10 and then the next 10 ....)
            - check which controllers, ... should be published and then add them to publish (and) install command
            - front-end create post needed in package?
            - controller: store, update methods with basic validation? (User can then expand them and create views)
            - basic create, ... view?
            - update nova (new columns and comments)
            - comments on comments ?
            - install command with register service provider (example install command laravel nova) (multiple service provider)
            - check needed packages and add missing to require (of the package)
            - php .\artisan ui:auth needed! (maybe add to install, definitely add to read me)
            - potential improvements to posts grid ( click event,...)
            - login route in config (used in create comment.vue)
            - flash messages (successful create/ edit comment,...) (maybe should be made by user?) https://laravel-news.com/building-a-flash-message-component-with-vue-js-and-tailwind-css
            - gallery improvements
            - placeholder image
            - check gallery and media seeder
            - http://127.0.0.1:8000/storage/6/conversions/fotograf-thomas-weber-oldenburg-landschaftsfotos-naturfotos-002-2048x1365-thumb.jpg
            - http://127.0.0.1:8000/storage/6/fotograf-thomas-weber-oldenburg-landschaftsfotos-naturfotos-002-2048x1365.jpg
            - optimize frontend gallery on new media/gallery system
            - test gallery changes (especially header)
            - optimize frontend (galleries)
            - make posts prettier (single post, comment, create comment)
            - gallery header image foreign key
            - gallery media upload message
            - media trigger insert url (maybe think about it)
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
        $this->addCommands();
    }

    private function loadMethods()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        /*
         * TODO:
         *  - currently using published views => we don't have to load them
         *  - just load views that won't be published
         */
//        $this->loadViewsFrom(__DIR__.'/../resources/Views/views', 'WfFunctions');
        $this->loadSeeders(config('wf-functions.seeder'));
    }

    private function loadNova()
    {
        $models = config('wf-functions.models');
        $resources = config('wf-functions.resources');

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
            __DIR__.'/../resources/Views/' => resource_path('views/Webfactor/WfBasicFunctionPackage/'),
        ], 'WfBasicFunctionPackage-views');

        //publish app.js
        $this->publishes([
            __DIR__.'/../public/' => public_path('js/Webfactor/WfBasicFunctionPackage'),
        ], 'WfBasicFunctionPackage-js');
    }

    private function addCommands()
    {
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
