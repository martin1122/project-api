<?php

namespace Tests\Api;

use InfluxDb;
use InfluxDB\Point;
use Tests\TestCase;
use App\Models\Reading;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ReadingTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test index on reading
     *
     * @return void
     */
    public function testReadingIndex()
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

        $response = $this->json('GET', '/api/reading')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }

    /**
     * Test hourly on reading
     *
     * @return void
     */
    public function testReadingHourly()
    {
        InfluxDb::writePoints([new Point(
            'readings',
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

        $response = $this->json('GET', '/api/reading/hourly')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }

    
    /**
     * Test daily on reading
     *
     * @return void
     */
    public function testReadingDaily()
    {
        InfluxDb::writePoints([new Point(
            'readings',
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

        $response = $this->json('GET', '/api/reading/daily')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }

    /**
     * Test weekly on reading
     *
     * @return void
     */
    public function testReadingWeekly()
    {
        InfluxDb::writePoints([new Point(
            'readings',
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

        $response = $this->json('GET', '/api/reading/weekly')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }

    /**
     * Test monthly on reading
     *
     * @return void
     */
    public function testReadingMonthly()
    {
        InfluxDb::writePoints([new Point(
            'readings',
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

        $response = $this->json('GET', '/api/reading/monthly')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }

    /**
     * Test yearly on reading
     *
     * @return void
     */
    public function testReadingYearly()
    {
        InfluxDb::writePoints([new Point(
            'readings',
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

        $response = $this->json('GET', '/api/reading/yearly')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }
}
