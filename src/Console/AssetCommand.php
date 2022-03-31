<?php

namespace Webfactor\WfBasicFunctionPackage\Console;

use Illuminate\Console\Command;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class AssetCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'WfBasicFunctionPackage:Update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates published WfBasicFunctionPackage Vue components';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        /*
          TODO:
           -make echo output prettier
         */

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

        echo "Update complete";
    }
}
