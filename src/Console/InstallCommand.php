<?php

namespace Webfactor\WfBasicFunctionPackage\Console;

use Illuminate\Console\Command;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'WfBasicFunctionPackage:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Installing the WfBasicFunctionPackage';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        /*
          TODO:
           -install command
            - check if compile is needed when installing
            - test / maybe  improve
         */

        echo "publishing editable views";

        $this->call('vendor:publish', [
            '--tag' => 'WfBasicFunctionPackage-views',
            '--force' => true,
        ]);

        echo "publishing js";

        $this->call('vendor:publish', [
            '--tag' => 'WfBasicFunctionPackage-js',
            '--force' => true,
        ]);

        echo "installation completed!";
    }
}
