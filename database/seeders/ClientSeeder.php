<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Named dummy clients
        $namedClients = [
            ['name' => 'PT Maju Bersama',        'company' => 'PT Maju Bersama',        'email' => 'info@majubersama.co.id',       'phone' => '+62 21 1234 5678', 'address' => 'Jl. Gatot Subroto No. 10, Jakarta Selatan', 'status' => 'active'],
            ['name' => 'CV Teknologi Nusantara', 'company' => 'CV Teknologi Nusantara', 'email' => 'contact@teknusinusantara.co.id','phone' => '+62 21 9876 5432', 'address' => 'Jl. Sudirman Kav. 25, Jakarta Pusat',   'status' => 'active'],
            ['name' => 'PT Digital Indonesia',   'company' => 'PT Digital Indonesia',   'email' => 'hello@digitalindonesia.co.id', 'phone' => '+62 31 5678 1234', 'address' => 'Jl. Pemuda No. 50, Surabaya',              'status' => 'active'],
            ['name' => 'PT Solusi Mandiri',      'company' => 'PT Solusi Mandiri',      'email' => 'admin@solusimandiri.co.id',    'phone' => '+62 22 3456 7890', 'address' => 'Jl. Asia Afrika No. 8, Bandung',           'status' => 'inactive'],
            ['name' => 'CV Kreatif Nusantara',   'company' => 'CV Kreatif Nusantara',   'email' => 'info@kreatiif.co.id',          'phone' => '+62 24 6789 0123', 'address' => 'Jl. Pandanaran No. 15, Semarang',          'status' => 'active'],
        ];

        foreach ($namedClients as $data) {
            Client::firstOrCreate(['email' => $data['email']], $data);
        }

        // Additional random clients via factory (up to 10 total)
        Client::factory(5)->create();
    }
}
