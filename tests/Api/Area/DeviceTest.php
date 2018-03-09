<?php

namespace Tests\Api\Area;

use Tests\TestCase;
use App\Models\Area;
use App\Models\Device;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DeviceTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test index on device
     *
     * @return void
     */
    public function testAreaDeviceIndex()
    {
        $area = factory(Area::class)->create([
            'id' => 'tesara'
        ]);
        $device = factory(Device::class)->create([
            'area_id' => 'tesara'
        ]);
        $response = $this->json('GET', '/api/area/tesara/device')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));

        $response->assertJsonFragment([
            'type' => 'device',
            'id'   => $device->id
        ]);
    }
}
