
##Installation:

###Note:
 - Vue is needed to use this package. You can install it on your own or accept the installment during the Package installation process
 - laravel auth is used in this package: php .\artisan ui:auth
###Install:
    composer require webfactor_project/wf_basic_function_package

    php artisan vendor:publish --tag=nova-media-library

    php artisan WFBasicFunctionPackage:install

    please add:
    mix.js('resources/js/Webfactor/WfBasicFunctionPackage/WFpackage_app.js', "public/js").vue()
    to your webpack.mix.js file

    Update your database:
    php artisan migrate

##Additional Commands
    - php artisan WFBasicFunctionPackage:publish
to re-publish the package files


npm install vue


php .\artisan ui:auth
