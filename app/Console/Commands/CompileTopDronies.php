<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CompileTopDronies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dronies:compile-top';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Compile the top dronies';

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
            $winningVotes = $dronie->winningVotes();
            $losingVotes = $dronie->losingVotes();

            $topDronie = \App\Models\TopDronie::updateOrCreate([
                'dronie_id' => $dronie->id,
            ], [
                'clean_score' => $winningVotes->count() - $losingVotes->count(),
                'total_votes' => $dronie->winningVotes()->count() + $dronie->losingVotes()->count(),
            ]);

            $bar->advance();
        }

        $bar->finish();

        return 0;
    }
}
