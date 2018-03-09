<?php

namespace Tests\Api;

use InfluxDb;
use InfluxDB\Point;
use Tests\TestCase;
use App\Models\Reading;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StatTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test index on stat
     *
     * @return void
     */
    public function testStatIndex()
    {
        InfluxDb::writePoints([new Point(
            'reading',
            0.64, 
            [
                'device'       => 'abc0',
                'type'         => 1,
                'display_type' => 'Reading'
            ], 
            [
                'reading' => 3456,
                'prev_difference_val' => 20,
                'prev_difference_pct' => 10,
                'power' => 20
            ],
            1435255849
        )]);

        $response = $this->json('GET', '/api/stat')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }

}
