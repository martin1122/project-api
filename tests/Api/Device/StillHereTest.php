<?php

namespace Tests\Api\Device;

use InfluxDb;
use InfluxDB\Point;
use Tests\TestCase;
use App\Models\Device;
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
    public function testDeviceStillHereIndex()
    {
        $device = factory(Device::class)->create([
            'id' => 'test'
        ]);

        InfluxDb::writePoints([new Point(
            'still_heres',
            0.64, 
            [
                'device'       => 'test',
                'type'         => 0,
                'display_type' => 'Still Here'
            ], 
            [
                'power' => 20
            ],
            1435255849
        )]);

        $response = $this->json('GET', '/api/device/test/still-here')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }

    /**
     * Test hourly on still-here
     *
     * @return void
     */
    public function testDeviceStillHereHourly()
    {
        $device = factory(Device::class)->create([
            'id' => 'test'
        ]);

        InfluxDb::writePoints([new Point(
            'still_heres',
            0.64, 
            [
                'device'       => 'test',
                'type'         => 0,
                'display_type' => 'Still Here'
            ], 
            [
                'power' => 20
            ],
            1435255849
        )]);

        $response = $this->json('GET', '/api/device/test/still-here/hourly')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }

    
    /**
     * Test daily on still-here
     *
     * @return void
     */
    public function testDeviceStillHereDaily()
    {
        $device = factory(Device::class)->create([
            'id' => 'test'
        ]);

        InfluxDb::writePoints([new Point(
            'still_heres',
            0.64, 
            [
                'device'       => 'test',
                'type'         => 0,
                'display_type' => 'Still Here'
            ], 
            [
                'power' => 20
            ],
            1435255849
        )]);

        $response = $this->json('GET', '/api/device/test/still-here/daily')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }

    /**
     * Test weekly on still-here
     *
     * @return void
     */
    public function testDeviceStillHereWeekly()
    {
        $device = factory(Device::class)->create([
            'id' => 'test'
        ]);

        InfluxDb::writePoints([new Point(
            'still_heres',
            0.64, 
            [
                'device'       => 'test',
                'type'         => 0,
                'display_type' => 'Still Here'
            ], 
            [
                'power' => 20
            ],
            1435255849
        )]);

        $response = $this->json('GET', '/api/device/test/still-here/weekly')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }

    /**
     * Test monthly on still-here
     *
     * @return void
     */
    public function testDeviceStillHereMonthly()
    {
        $device = factory(Device::class)->create([
            'id' => 'test'
        ]);

        InfluxDb::writePoints([new Point(
            'still_heres',
            0.64, 
            [
                'device'       => 'test',
                'type'         => 0,
                'display_type' => 'Still Here'
            ], 
            [
                'power' => 20
            ],
            1435255849
        )]);

        $response = $this->json('GET', '/api/device/test/still-here/monthly')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }

    /**
     * Test yearly on still-here
     *
     * @return void
     */
    public function testDeviceStillHereYearly()
    {
        $device = factory(Device::class)->create([
            'id' => 'test'
        ]);

        InfluxDb::writePoints([new Point(
            'still_heres',
            0.64, 
            [
                'device'       => 'test',
                'type'         => 0,
                'display_type' => 'Still Here'
            ], 
            [
                'power' => 20
            ],
            1435255849
        )]);

        $response = $this->json('GET', '/api/device/test/still-here/yearly')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }
}
