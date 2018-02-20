<?php

namespace Tests\Api\Device;

use InfluxDb;
use InfluxDB\Point;
use Tests\TestCase;
use App\Models\Error;
use App\Models\Device;
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
    public function testDeviceErrorIndex()
    {
        $device = factory(Device::class)->create([
            'id' => 'test'
        ]);

        InfluxDb::writePoints([new Point(
            'error',
            0.64, 
            [
                'device'       => 'test',
                'type'         => 2,
                'display_type' => 'Generic Error'
            ], 
            [
                'power' => 20
            ],
            1435255849
        )]);

        $response = $this->json('GET', '/api/device/test/error')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }

    /**
     * Test hourly on error
     *
     * @return void
     */
    public function testDeviceErrorHourly()
    {
        $device = factory(Device::class)->create([
            'id' => 'test'
        ]);
        
        InfluxDb::writePoints([new Point(
            'errors',
            0.64, 
            [
                'device'       => 'test',
                'type'         => 2,
                'display_type' => 'Generic Error'
            ], 
            [
                'power' => 20
            ],
            1435255849
        )]);

        $response = $this->json('GET', '/api/device/test/error/hourly')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }

    
    /**
     * Test daily on error
     *
     * @return void
     */
    public function testDeviceErrorDaily()
    {
        $device = factory(Device::class)->create([
            'id' => 'test'
        ]);

        InfluxDb::writePoints([new Point(
            'errors',
            0.64, 
            [
                'device'       => 'test',
                'type'         => 2,
                'display_type' => 'Generic Error'
            ], 
            [
                'power' => 20
            ],
            1435255849
        )]);

        $response = $this->json('GET', '/api/device/test/error/daily')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }

    /**
     * Test weekly on error
     *
     * @return void
     */
    public function testDeviceErrorWeekly()
    {
        $device = factory(Device::class)->create([
            'id' => 'test'
        ]);

        InfluxDb::writePoints([new Point(
            'errors',
            0.64, 
            [
                'device'       => 'test',
                'type'         => 2,
                'display_type' => 'Generic Error'
            ], 
            [
                'power' => 20
            ],
            1435255849
        )]);

        $response = $this->json('GET', '/api/device/test/error/weekly')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }

    /**
     * Test monthly on error
     *
     * @return void
     */
    public function testDeviceErrorMonthly()
    {
        $device = factory(Device::class)->create([
            'id' => 'test'
        ]);

        InfluxDb::writePoints([new Point(
            'errors',
            0.64, 
            [
                'device'       => 'test',
                'type'         => 2,
                'display_type' => 'Generic Error'
            ], 
            [
                'power' => 20
            ],
            1435255849
        )]);

        $response = $this->json('GET', '/api/device/test/error/monthly')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }

    /**
     * Test yearly on error
     *
     * @return void
     */
    public function testDeviceErrorYearly()
    {
        $device = factory(Device::class)->create([
            'id' => 'test'
        ]);

        InfluxDb::writePoints([new Point(
            'errors',
            0.64, 
            [
                'device'       => 'test',
                'type'         => 2,
                'display_type' => 'Generic Error'
            ], 
            [
                'power' => 20
            ],
            1435255849
        )]);

        $response = $this->json('GET', '/api/device/test/error/yearly')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }
}
