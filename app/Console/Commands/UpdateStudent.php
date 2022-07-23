<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateStudent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:student';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Student';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        \App\Models\Student::where('status','active')->update(['status' => 'inactive']);
        return Command::SUCCESS;
    }
}
