<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::create([
            'nip' => '35101834997800004',
            'nama' => 'Mochammad Jamal',
            'alamat' => 'Jl. Raya Situbondo Km. 17, Bangsring - Banyuwangi',
            'no_telp' => '081556898090',
        ]);
        Employee::create([
            'nip' => '35101834997800005',
            'nama' => 'Fandi Masud',
            'alamat' => 'Jl. Diponegoro Surabaya',
            'no_telp' => '081556898090',
        ]);
        Employee::create([
            'nip' => '35101834997800006',
            'nama' => 'Dendi Suwarno',
            'alamat' => 'Jl. Raya Mastrip Surabaya',
            'no_telp' => '0815568000987',
        ]);
        Employee::create([
            'nip' => '35101834997800007',
            'nama' => 'Mochammad Rifai',
            'alamat' => 'Jl. Pahlawan Sidoarjo',
            'no_telp' => '081556909876',
        ]);
    }
}
