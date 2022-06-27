<?php

namespace App\Console\Commands;

use App\Models\Company;
use Illuminate\Console\Command;

class GenerateDocsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'docs:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate API documentation';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = \App\Models\User::findOrFail(1);
        $user->update(['company_id' => Company::first()->id]);

        config(['scribe.auth.use_value' => $user->createToken('test')->plainTextToken]);
        $this->call('scribe:generate');

        $user->update(['company_id' => null]);
        return 0;
    }
}
