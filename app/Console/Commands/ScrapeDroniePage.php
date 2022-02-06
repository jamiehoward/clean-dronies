<?php

namespace App\Console\Commands;

use DOMDocument;
use DOMXPath;
use Illuminate\Console\Command;

class ScrapeDroniePage extends Command
{
    const url = 'https://howrare.is/dronies/';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:single-dronie
                            {id : The NFT ID to scrape}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $id = $this->argument('id');

        // use guzzle to get the page
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', self::url . $id);

        // get the body of the page
        $body = $response->getBody();

        $doc = new DOMDocument();

        $internalErrors = libxml_use_internal_errors(true);
        $doc->loadHTML($body);
        libxml_use_internal_errors($internalErrors);

        $xpath = new DOMXPath($doc);

        $searches = [
            // 'name' => '/html/body/div[2]/div[1]/div/div[2]/span',
            'token_link' => '/html/body/div[2]/div[1]/div/div[2]/a/@href',
            'image' => "//*[@class='nfts_detail_img']/a/img/@src",
            'rank' => '/html/body/div[2]/div[2]/div[2]/div[2]/div[1]/span',
            'score' => '/html/body/div[2]/div[2]/div[2]/div[2]/div[2]/span',
            'attribute_count' => '/html/body/div[2]/div[2]/div[2]/div[2]/div[3]/span[1]',
            'color' => '/html/body/div[2]/div[2]/div[2]/div[4]/div[1]/span',
            'background' => '/html/body/div[2]/div[2]/div[2]/div[4]/div[2]/span',
            'back_storage' => '/html/body/div[2]/div[2]/div[2]/div[4]/div[3]/span',
            'body' => '/html/body/div[2]/div[2]/div[2]/div[4]/div[4]/span',
            'body_texture' => '/html/body/div[2]/div[2]/div[2]/div[4]/div[5]/span',
            'chest_accessory' => '/html/body/div[2]/div[2]/div[2]/div[4]/div[6]/span',
            'head' => '/html/body/div[2]/div[2]/div[2]/div[4]/div[7]/span',
            'eyes' => '/html/body/div[2]/div[2]/div[2]/div[4]/div[8]/span',
            'mask' => '/html/body/div[2]/div[2]/div[2]/div[4]/div[9]/span',
            'beak' => '/html/body/div[2]/div[2]/div[2]/div[4]/div[10]/span',
            'hat'  => '/html/body/div[2]/div[2]/div[2]/div[4]/div[11]/span',
            'wings' => '/html/body/div[2]/div[2]/div[2]/div[4]/div[12]/span',
            'elite_prototype' => '/html/body/div[2]/div[2]/div[2]/div[4]/div[13]/span',
            'sale_link' => '/html/body/div[2]/div[2]/div[2]/div[6]/div[2]/a/@href',
            'sale_price' => '/html/body/div[2]/div[2]/div[2]/div[6]/div[2]/a/span/text()',
        ];

        $fields = [
            'nft_id' => $id,
            'url' => self::url . $id,
        ];

        foreach ($searches as $key => $search) {
            if ($search) {
                $item = $xpath->query($search)->item(0);
                $fields[$key] = $item ? trim($item->nodeValue) : null;
            }
        }

        $fields['token_hash'] = explode('/', $fields['token_link'])[4];

        if ($fields['sale_price']) {
            $fields['sale_price'] = explode(' ', $fields['sale_price'])[2];
            $fields['sale_price'] = str_replace('◎', '', $fields['sale_price']);
        }

        $dronie = \App\Models\Dronie::updateOrCreate(['nft_id' => $id], $fields);

        $this->info('Dronie #' . $id . ' scraped and saved.');

        return 0;
    }
}
