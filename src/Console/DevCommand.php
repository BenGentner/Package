<?php

namespace Webfactor\WfBasicFunctionPackage\Console;

use Illuminate\Console\Command;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class DevCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'WfBasicFunctionPackage:dev';

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
        /*
          TODO:
           - probably remove this command (just for dev)
         */

        $this->call('vendor:publish', [
            '--tag' => 'WfBasicFunctionPackage-views',
            '--force' => true,
        ]);

        echo "Recompiling assets! Please stand by!";

        $process = new Process(["npm", "run", "dev"], __DIR__);
        $process->run();

        if(!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        echo $process->getOutput();

        $this->call('vendor:publish', [
            '--tag' => 'WfBasicFunctionPackage-js',
            '--force' => true,
        ]);

        echo "dev complete";
    }
}
