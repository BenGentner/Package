<?php

namespace Webfactor\WfBasicFunctionPackage\Console;

use Illuminate\Console\Command;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class PublishCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'WfBasicFunctionPackage:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish WfBasicFunctionPackage Views';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        echo "publishing js & vue ";
        $this->call('vendor:publish', [
            '--tag' => 'WfBasicFunctionPackage-views',
            '--force' => true,
        ]);

        echo "publishing controllers ";

        $this->call('vendor:publish', [
            '--tag' => 'WfBasicFunctionPackage-controllers',
            '--force' => true,
        ]);

        echo "publishing config ";

        $this->call('vendor:publish', [
            '--tag' => 'WfBasicFunctionPackage-config',
            '--force' => true,
        ]);

    }
}
