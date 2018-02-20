<?php

namespace Tests\Api\Area;

use InfluxDb;
use InfluxDB\Point;
use Tests\TestCase;
use App\Models\Area;
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
    public function testAreaErrorIndex()
    {
        $area = factory(Area::class)->create([
            'id' => 'tesara',
        ]);

        $device = factory(Device::class)->create([
            'id' => 'test',
            'area_id' => 'tesara'
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

        $response = $this->json('GET', '/api/area/tesara/error')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }

    /**
     * Test hourly on error
     *
     * @return void
     */
    public function testAreaErrorHourly()
    {
        $area = factory(Area::class)->create([
            'id' => 'tesara',
        ]);

        $device = factory(Device::class)->create([
            'id' => 'test',
            'area_id' => 'tesara'
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

        $response = $this->json('GET', '/api/area/tesara/error/hourly')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }

    
    /**
     * Test daily on error
     *
     * @return void
     */
    public function testAreaErrorDaily()
    {
        $area = factory(Area::class)->create([
            'id' => 'tesara',
        ]);

        $device = factory(Device::class)->create([
            'id' => 'test',
            'area_id' => 'tesara'
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

        $response = $this->json('GET', '/api/area/tesara/error/daily')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }

    /**
     * Test weekly on error
     *
     * @return void
     */
    public function testAreaErrorWeekly()
    {
        $area = factory(Area::class)->create([
            'id' => 'tesara',
        ]);

        $device = factory(Device::class)->create([
            'id' => 'test',
            'area_id' => 'tesara'
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

        $response = $this->json('GET', '/api/area/tesara/error/weekly')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }

    /**
     * Test monthly on error
     *
     * @return void
     */
    public function testAreaErrorMonthly()
    {
        $area = factory(Area::class)->create([
            'id' => 'tesara',
        ]);

        $device = factory(Device::class)->create([
            'id' => 'test',
            'area_id' => 'tesara'
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

        $response = $this->json('GET', '/api/area/tesara/error/monthly')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }

    /**
     * Test yearly on error
     *
     * @return void
     */
    public function testAreaErrorYearly()
    {
        $area = factory(Area::class)->create([
            'id' => 'tesara',
        ]);

        $device = factory(Device::class)->create([
            'id' => 'test',
            'area_id' => 'tesara'
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

        $response = $this->json('GET', '/api/area/tesara/error/yearly')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }
}
