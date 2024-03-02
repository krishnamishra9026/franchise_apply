<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $this->call(CarMakeSeeder::class);
        
        

        \App\Models\User::factory()->create([
            'name' => 'Prashant Chauhan',
            'email' => 'sponser@example.com'
        ]);

        \App\Models\User::factory(39)->create();

        $this->call(CarModelSeeder::class);
        $this->call(PermissionSeeder::class);
        

        $admin = \App\Models\Administrator::factory()->create([
            'firstname' => 'Nurul',
            'lastname' => 'Hasan',
            'email' => 'admin@admin.com'
        ]);

       $role = Role::where('name', 'Administrator')->first();
        if ($role) {
            $admin->assignRole($role); // --> search with default guard
        }

        \App\Models\Administrator::factory(5)->create();

        $this->call(CarModelSeriesSeeder::class);
        

        \App\Models\Seller::factory()->create([
            'firstname' => 'John',
            'lastname' => 'Doe',
            'email' => 'seller@admin.com'
        ]);

        \App\Models\Seller::factory(39)->create();

        $this->call(CarRangeSeeder::class);

        $this->call(CarYearSeeder::class);        


        \App\Models\Buyer::factory()->create([
            'firstname' => 'John',
            'lastname' => 'Doe',
            'email' => 'buyer@admin.com'
        ]);

        \App\Models\Buyer::factory(39)->create();

        $this->call(CarSeeder::class);
        $this->call(PageManagementSeeder::class);
    }
}
