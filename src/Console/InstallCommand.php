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
        echo "publishing config ";

        $this->call('vendor:publish', [
            '--tag' => 'WfBasicFunctionPackage-config',
            '--force' => true,
        ]);

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

        echo "publishing controllers";

        $this->call('vendor:publish', [
            '--tag' => ' WfBasicFunctionPackage-controllers',
            '--force' => true,
        ]);

        echo "publishing Nova Resources";

        $this->call('vendor:publish', [
            '--tag' => 'WfBasicFunctionPackage-nova',
            '--force' => true,
        ]);

        if($this->confirm('Do you want to install vue?'))
        {
            echo 'installing vue...';
            $this->install("vue");
            $this->install("vue-loader");
        }

        echo "installation completed!";
    }

    public function install($package)
    {
        $process = new Process(["npm", "install", $package], base_path());

        $process->run();

        if(!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
    }
}
