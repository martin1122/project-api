<?php

namespace Tests\Api;

use Tests\TestCase;
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
    public function testDeviceIndex()
    {
        $device = factory(Device::class)->create();
        $response = $this->json('GET', '/api/device')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));

        $response->assertJsonFragment([
            'type' => 'device',
            'id'   => $device->id
        ]);
    }

    /**
     * Test show on device
     *
     * @return void
     */
    public function testDeviceShow()
    {
        $device = factory(Device::class)->create([
            'id' => 'test'
        ]);
        $response = $this->json('GET', '/api/device/test')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', null));

        $response->assertJsonFragment([
            'type' => 'device',
            'id'   => $device->id
        ]);
    }
}
