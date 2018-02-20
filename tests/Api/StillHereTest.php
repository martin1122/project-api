<?php

namespace Tests\Api;

use InfluxDb;
use InfluxDB\Point;
use Tests\TestCase;
use App\Models\StillHere;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StillHereTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test index on still-here
     *
     * @return void
     */
    public function testStillHereIndex()
    {
        InfluxDb::writePoints([new Point(
            'still_heres',
            0.64, 
            [
                'device'       => 'abc0',
                'type'         => 0,
                'display_type' => 'Still Here'
            ], 
            [
                'power' => 20
            ],
            1435255849
        )]);

        $response = $this->json('GET', '/api/still-here')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }

    /**
     * Test hourly on still-here
     *
     * @return void
     */
    public function testStillHereHourly()
    {
        InfluxDb::writePoints([new Point(
            'still_heres',
            0.64, 
            [
                'device'       => 'abc0',
                'type'         => 0,
                'display_type' => 'Still Here'
            ], 
            [
                'power' => 20
            ],
            1435255849
        )]);

        $response = $this->json('GET', '/api/still-here/hourly')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }

    
    /**
     * Test daily on still-here
     *
     * @return void
     */
    public function testStillHereDaily()
    {
        InfluxDb::writePoints([new Point(
            'still_heres',
            0.64, 
            [
                'device'       => 'abc0',
                'type'         => 0,
                'display_type' => 'Still Here'
            ], 
            [
                'power' => 20
            ],
            1435255849
        )]);

        $response = $this->json('GET', '/api/still-here/daily')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }

    /**
     * Test weekly on still-here
     *
     * @return void
     */
    public function testStillHereWeekly()
    {
        InfluxDb::writePoints([new Point(
            'still_heres',
            0.64, 
            [
                'device'       => 'abc0',
                'type'         => 0,
                'display_type' => 'Still Here'
            ], 
            [
                'power' => 20
            ],
            1435255849
        )]);

        $response = $this->json('GET', '/api/still-here/weekly')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }

    /**
     * Test monthly on still-here
     *
     * @return void
     */
    public function testStillHereMonthly()
    {
        InfluxDb::writePoints([new Point(
            'still_heres',
            0.64, 
            [
                'device'       => 'abc0',
                'type'         => 0,
                'display_type' => 'Still Here'
            ], 
            [
                'power' => 20
            ],
            1435255849
        )]);

        $response = $this->json('GET', '/api/still-here/monthly')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }

    /**
     * Test yearly on still-here
     *
     * @return void
     */
    public function testStillHereYearly()
    {
        InfluxDb::writePoints([new Point(
            'still_heres',
            0.64, 
            [
                'device'       => 'abc0',
                'type'         => 0,
                'display_type' => 'Still Here'
            ], 
            [
                'power' => 20
            ],
            1435255849
        )]);

        $response = $this->json('GET', '/api/still-here/yearly')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }
}
