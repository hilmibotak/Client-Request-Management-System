<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Client;
use App\Models\Category;
use App\Models\Request;
use App\Models\RequestActivity;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 5 users
        User::factory(5)->create();

        // Admin user for easy login
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@crms.test',
        ]);

        // 10 clients
        Client::factory(10)->create();

        // 5 categories
        Category::factory()->create(['name' => 'Website maintenance']);
        Category::factory()->create(['name' => 'Request new feature']);
        Category::factory()->create(['name' => 'Bug fixing']);
        Category::factory()->create(['name' => 'System access request']);
        Category::factory()->create(['name' => 'Data update']);

        // 30 requests
        Request::factory(30)->create();

        // 50 request activities
        RequestActivity::factory(50)->create();
    }
}
