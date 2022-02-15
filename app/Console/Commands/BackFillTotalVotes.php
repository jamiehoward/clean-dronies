<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class BackFillTotalVotes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dronies:backfill-total-votes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backfill total votes for all dronies';

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
        $dronies = \App\Models\Dronie::get();

        $bar = $this->output->createProgressBar(count($dronies));

        foreach ($dronies as $dronie) {
            $dronie->total_votes = $dronie->winningVotes->count() + $dronie->losingVotes->count();
            $dronie->save();

            $bar->advance();
        }

        $bar->finish();

        return 0;
    }
}
