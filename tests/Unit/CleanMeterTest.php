<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Classes\CleanMeter;


class CleanMeterTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_class_exists()
    {
        $this->assertTrue(class_exists(CleanMeter::class));
    }

    public function test_dronie_can_be_set_and_retrieved()
    {
        $cleanMeter = new CleanMeter();

        $dronie = \App\Models\Dronie::factory()->make();

        $cleanMeter->setDronie($dronie);

        $this->assertEquals($dronie, $cleanMeter->getDronie());
    }

    public function test_can_get_rules()
    {
        $cleanMeter = new CleanMeter();

        $this->assertGreaterThan(1, count($cleanMeter->getRules()));
    }

    public function test_can_get_clean_penalty()
    {
        $dronie = \App\Models\Dronie::factory()->make();

        $cleanMeter = new CleanMeter();
        $cleanMeter->setDronie($dronie);
        $this->assertIsNumeric($cleanMeter->getPenalty());
    }

    public function test_can_get_clean_score()
    {
        $dronie = \App\Models\Dronie::factory()->make();

        $cleanMeter = new CleanMeter();
        $cleanMeter->setDronie($dronie);

        $this->assertIsNumeric($cleanMeter->getCleanScore());
    }

    public function test_can_get_clean_category()
    {
        $dronie = \App\Models\Dronie::factory()->make();

        $cleanMeter = new CleanMeter();
        $cleanMeter->setDronie($dronie);

        $this->assertNotNull($cleanMeter->getCategory());
        $this->assertNotEquals($cleanMeter->getCategory(), 'Unrated');
    }
}
