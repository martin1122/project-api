<?php

namespace Tests\Api;

use Tests\TestCase;
use App\Models\Area;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AreaTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test index on area
     *
     * @return void
     */
    public function testAreaIndex()
    {
        $area = factory(Area::class)->create();
        $response = $this->json('GET', '/api/area')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', []));

        $response->assertJsonFragment([
            'type' => 'area',
            'id'   => $area->id
        ]);
    }

    /**
     * Test show on area
     *
     * @return void
     */
    public function testAreaShow()
    {
        $area = factory(Area::class)->create([
            'id' => 'test'
        ]);
        $response = $this->json('GET', '/api/area/test')
            ->assertStatus(200);

        $this->assertNotEmpty(array_get($response->json(), 'data', null));

        $response->assertJsonFragment([
            'type' => 'area',
            'id'   => $area->id
        ]);
    }
}
