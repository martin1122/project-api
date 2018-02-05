<?php

use Illuminate\Database\Seeder;
use App\Models\Device;
use App\Models\Area;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $area1 = factory(Area::class)->create();

        factory(Device::class)->create([
            'id'      => 'abc0',
            'name'    => 'Depth Sensor abc0',
            'area_id' => $area1->id
        ]);
        factory(Device::class)->create([
            'id'   => 'abc1',
            'name' => 'Depth Sensor abc1',
            'area_id' => $area1->id
        ]);

        $areaParent = factory(Area::class)->create();
        $area2 = factory(Area::class)->create([
            'parent_id' => $areaParent->id
        ]);
        $area3 = factory(Area::class)->create([
            'parent_id' => $areaParent->id
        ]);
        factory(Device::class)->create([
            'id'   => 'abc2',
            'name' => 'Depth Sensor abc2',
            'area_id' => $area2->id
        ]);
        factory(Device::class)->create([
            'id'   => 'abc3',
            'name' => 'Depth Sensor abc3',
            'area_id' => $area2->id
        ]);
        factory(Device::class)->create([
            'id'   => 'abc4',
            'name' => 'Depth Sensor abc4',
            'area_id' => $area3->id
        ]);
        factory(Device::class)->create([
            'id'   => 'abc5',
            'name' => 'Depth Sensor abc5',
            'area_id' => $area3->id
        ]);
    }
}
