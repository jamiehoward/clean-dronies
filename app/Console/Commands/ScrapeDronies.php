<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ScrapeDronies extends Command
{
    const COLLECTION_COUNT = 10000;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:dronies';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrape all dronies';

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
        $this->info("Scraping all dronies...");

        for ($i = 1; $i <= self::COLLECTION_COUNT; $i++) {
            try {
                $alreadyScraped = \App\Models\Dronie::where('nft_id', $i)->first();

                if ($alreadyScraped) {
                    $this->info("Dronie #$i already scraped");
                    continue;
                }

                $this->call('scrape:single-dronie', ['id' => $i]);
            } catch (\Exception $e) {
                $this->error("Error scraping dronie #$i: " . $e->getMessage());
                sleep(5);
            }

            sleep(1);
        }

        return 0;
    }
}
