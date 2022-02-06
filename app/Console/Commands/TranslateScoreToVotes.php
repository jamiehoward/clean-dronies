<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TranslateScoreToVotes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'votes:translate-score';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Translate score to votes';

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
        $droniesWithCleanScore = \App\Models\Dronie::where('clean_score', '>', 0)->get();

        foreach ($droniesWithCleanScore as $dronie) {
            $vote = \App\Models\Vote::create([
                'winner_id' => $dronie->id,
            ]);
        }

        return 0;
    }
}
