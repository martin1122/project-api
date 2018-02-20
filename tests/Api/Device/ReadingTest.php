<?php

namespace Tests\Api\Device;

use InfluxDb;
use InfluxDB\Point;
use Tests\TestCase;
use App\Models\Device;
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
    public function testDeviceReadingIndex()
    {
        $device = factory(Device::class)->create([
            'id' => 'test'
        ]);

        InfluxDb::writePoints([new Point(
            'reading',
            0.64, 
            [
                'device'       => 'test',
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

        $response = $this->json('GET', '/api/device/test/reading')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }

    /**
     * Test hourly on reading
     *
     * @return void
     */
    public function testDeviceReadingHourly()
    {
        $device = factory(Device::class)->create([
            'id' => 'test'
        ]);

        InfluxDb::writePoints([new Point(
            'readings',
            0.64, 
            [
                'device'       => 'test',
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

        $response = $this->json('GET', '/api/device/test/reading/hourly')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }

    
    /**
     * Test daily on reading
     *
     * @return void
     */
    public function testDeviceReadingDaily()
    {
        $device = factory(Device::class)->create([
            'id' => 'test'
        ]);

        InfluxDb::writePoints([new Point(
            'readings',
            0.64, 
            [
                'device'       => 'test',
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

        $response = $this->json('GET', '/api/device/test/reading/daily')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }

    /**
     * Test weekly on reading
     *
     * @return void
     */
    public function testDeviceReadingWeekly()
    {
        $device = factory(Device::class)->create([
            'id' => 'test'
        ]);

        InfluxDb::writePoints([new Point(
            'readings',
            0.64, 
            [
                'device'       => 'test',
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

        $response = $this->json('GET', '/api/device/test/reading/weekly')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }

    /**
     * Test monthly on reading
     *
     * @return void
     */
    public function testDeviceReadingMonthly()
    {
        $device = factory(Device::class)->create([
            'id' => 'test'
        ]);

        InfluxDb::writePoints([new Point(
            'readings',
            0.64, 
            [
                'device'       => 'test',
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

        $response = $this->json('GET', '/api/device/test/reading/monthly')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }

    /**
     * Test yearly on reading
     *
     * @return void
     */
    public function testDeviceReadingYearly()
    {
        $device = factory(Device::class)->create([
            'id' => 'test'
        ]);

        InfluxDb::writePoints([new Point(
            'readings',
            0.64, 
            [
                'device'       => 'test',
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

        $response = $this->json('GET', '/api/device/test/reading/yearly')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));
    }
}
