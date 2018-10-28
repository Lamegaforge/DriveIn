<?php

use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Permission::class)->create([
            'name' => 'manage-token',
        ]);

        factory(\App\Models\Permission::class)->create([
            'name' => 'manage-user',
        ]);        
    }
}
