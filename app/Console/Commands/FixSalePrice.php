<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FixSalePrice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fixes:sale-price';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fix sale price.';

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
        $droniesWithIssue = \App\Models\Dronie::where('sale_price', 'like', '%◎%')->get();

        foreach ($droniesWithIssue as $dronie) {
            $dronie->update(['sale_price' => str_replace('◎', '', $dronie->sale_price)]);
        }

        return 0;
    }
}
