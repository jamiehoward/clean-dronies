<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Collection;

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
        // Go through all dronies and sort them by winningest. 
        // Then insert them one by one into the top_dronies table.
        // The ID of their record will serve as the current rank.
        
        $dronies = \App\Models\Dronie::get();

        $bar = $this->output->createProgressBar(count($dronies));

        $rankedDronies = $dronies->map(function($dronie) use ($bar) {
            $winningVotes = $dronie->winningVotes();
            $losingVotes = $dronie->losingVotes();

            $winPercentage = $winningVotes->count() == 0 ?
            0 :
            number_format(($winningVotes->count() / ($winningVotes->count() + $losingVotes->count())) * 100, 2);

            $bar->advance();

            return [
                'dronie_id' => $dronie->id,
                'winning_votes' => $winningVotes->count(),
                'losing_votes' => $losingVotes->count(),
                'total_votes' => $dronie->total_votes,
                'win_percentage' => $winPercentage,
                'clean_score' => $winningVotes->count() - $losingVotes->count()
            ];
        });

        $rankedDronies = $this->multiPropertySort($rankedDronies, [
            ['column' => 'clean_score', 'order' => 'desc'],
            ['column' => 'win_percentage', 'order' => 'desc'],
            ['column' => 'losing_votes', 'order' => 'asc'],
            ['column' => 'total_votes', 'order' => 'desc'],
        ]);

        $bar->finish();

        $this->info('Dronie sorting complete. Now updating the records.');

        $bar = $this->output->createProgressBar(count($rankedDronies));

        foreach ($rankedDronies as $rank => $dronie) {
            $id = $rank + 1; // Since the array is zero-based, we need to add 1

            $topDronie = \App\Models\TopDronie::find($id);

            $topDronie->update([
                'dronie_id' => $dronie['dronie_id'],
                'clean_score' => $dronie['clean_score'],
                'total_votes' => $dronie['total_votes'],
                'win_percentage' => $dronie['win_percentage'],
            ]);

            $bar->advance();
        }

        $bar->finish();

        return 0;
    }

    protected function multiPropertySort(Collection $collection, array $sorting_instructions)
    {

        return $collection->sort(function ($a, $b) use ($sorting_instructions) {

            foreach ($sorting_instructions as $sorting_instruction) {

                $a[$sorting_instruction['column']] = (isset($a[$sorting_instruction['column']])) ? $a[$sorting_instruction['column']] : '';
                $b[$sorting_instruction['column']] = (isset($b[$sorting_instruction['column']])) ? $b[$sorting_instruction['column']] : '';

                if (empty($sorting_instruction['order']) or strtolower($sorting_instruction['order']) == 'asc') {
                    $x = ($a[$sorting_instruction['column']] <=> $b[$sorting_instruction['column']]);
                } else {
                    $x = ($b[$sorting_instruction['column']] <=> $a[$sorting_instruction['column']]);
                }

                if ($x != 0) {
                    return $x;
                }
            }

            return 0;
        })->values();
    }
}
