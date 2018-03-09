<?php

namespace Tests\Api;

use InfluxDb;
use InfluxDB\Point;
use Tests\TestCase;
use App\Models\Error;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ErrorTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test index on error
     *
     * @return void
     */
    public function testErrorIndex()
    {
        InfluxDb::writePoints([new Point(
            'error',
            0.64, 
            [
                'device'       => 'abc0',
                'type'         => 2,
                'display_type' => 'Generic Error'
            ], 
            [
                'power' => 20
            ],
            1435255849
        )]);

        $response = $this->json('GET', '/api/error')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }

    /**
     * Test hourly on error
     *
     * @return void
     */
    public function testErrorHourly()
    {
        InfluxDb::writePoints([new Point(
            'errors',
            0.64, 
            [
                'device'       => 'abc0',
                'type'         => 2,
                'display_type' => 'Generic Error'
            ], 
            [
                'power' => 20
            ],
            1435255849
        )]);

        $response = $this->json('GET', '/api/error/hourly')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }

    
    /**
     * Test daily on error
     *
     * @return void
     */
    public function testErrorDaily()
    {
        InfluxDb::writePoints([new Point(
            'errors',
            0.64, 
            [
                'device'       => 'abc0',
                'type'         => 2,
                'display_type' => 'Generic Error'
            ], 
            [
                'power' => 20
            ],
            1435255849
        )]);

        $response = $this->json('GET', '/api/error/daily')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }

    /**
     * Test weekly on error
     *
     * @return void
     */
    public function testErrorWeekly()
    {
        InfluxDb::writePoints([new Point(
            'errors',
            0.64, 
            [
                'device'       => 'abc0',
                'type'         => 2,
                'display_type' => 'Generic Error'
            ], 
            [
                'power' => 20
            ],
            1435255849
        )]);

        $response = $this->json('GET', '/api/error/weekly')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }

    /**
     * Test monthly on error
     *
     * @return void
     */
    public function testErrorMonthly()
    {
        InfluxDb::writePoints([new Point(
            'errors',
            0.64, 
            [
                'device'       => 'abc0',
                'type'         => 2,
                'display_type' => 'Generic Error'
            ], 
            [
                'power' => 20
            ],
            1435255849
        )]);

        $response = $this->json('GET', '/api/error/monthly')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }

    /**
     * Test yearly on error
     *
     * @return void
     */
    public function testErrorYearly()
    {
        InfluxDb::writePoints([new Point(
            'errors',
            0.64, 
            [
                'device'       => 'abc0',
                'type'         => 2,
                'display_type' => 'Generic Error'
            ], 
            [
                'power' => 20
            ],
            1435255849
        )]);

        $response = $this->json('GET', '/api/error/yearly')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }
}
