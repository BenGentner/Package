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
    protected $signature = 'WfBasicFunctionPackage:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Re-publish the WfBasicFunctionPackage assets';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        /*
          TODO:
           -npm run dev can be run server side
            => create command that update the app.js file after the user updated a published vue component
         */

        $process = new Process(["npm", "run", "dev"]);
        $process->run();

        if(!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        echo $process->getOutput();

//        $this->call('vendor:publish', [
//            '--tag' => 'WfBasicFunctionPackage-assets',
//            '--force' => true,
//        ]);
//
//        $this->call('vendor:publish', [
//            '--tag' => 'views',
//            '--force' => true,
//        ]);
    }
}
