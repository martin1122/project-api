<?php

namespace Tests\Api\Area;

use InfluxDb;
use InfluxDB\Point;
use Tests\TestCase;
use App\Models\Area;
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
    public function testAreaStillHereIndex()
    {
        $area = factory(Area::class)->create([
            'id' => 'tesara',
        ]);

        $device = factory(Device::class)->create([
            'id' => 'test',
            'area_id' => 'tesara'
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

        $response = $this->json('GET', '/api/area/tesara/still-here')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }

    /**
     * Test hourly on still-here
     *
     * @return void
     */
    public function testAreaStillHereHourly()
    {
        $area = factory(Area::class)->create([
            'id' => 'tesara',
        ]);

        $device = factory(Device::class)->create([
            'id' => 'test',
            'area_id' => 'tesara'
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

        $response = $this->json('GET', '/api/area/tesara/still-here/hourly')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }

    
    /**
     * Test daily on still-here
     *
     * @return void
     */
    public function testAreaStillHereDaily()
    {
        $area = factory(Area::class)->create([
            'id' => 'tesara',
        ]);

        $device = factory(Device::class)->create([
            'id' => 'test',
            'area_id' => 'tesara'
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

        $response = $this->json('GET', '/api/area/tesara/still-here/daily')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }

    /**
     * Test weekly on still-here
     *
     * @return void
     */
    public function testAreaStillHereWeekly()
    {
        $area = factory(Area::class)->create([
            'id' => 'tesara',
        ]);

        $device = factory(Device::class)->create([
            'id' => 'test',
            'area_id' => 'tesara'
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

        $response = $this->json('GET', '/api/area/tesara/still-here/weekly')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }

    /**
     * Test monthly on still-here
     *
     * @return void
     */
    public function testAreaStillHereMonthly()
    {
        $area = factory(Area::class)->create([
            'id' => 'tesara',
        ]);

        $device = factory(Device::class)->create([
            'id' => 'test',
            'area_id' => 'tesara'
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

        $response = $this->json('GET', '/api/area/tesara/still-here/monthly')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }

    /**
     * Test yearly on still-here
     *
     * @return void
     */
    public function testAreaStillHereYearly()
    {
        $area = factory(Area::class)->create([
            'id' => 'tesara',
        ]);

        $device = factory(Device::class)->create([
            'id' => 'test',
            'area_id' => 'tesara'
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

        $response = $this->json('GET', '/api/area/tesara/still-here/yearly')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }
}
