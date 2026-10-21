<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
  $userIds[] = DB::table('users')->insertGetId([
    'name' => 'Siswa ' . $i,
    'email' => 'siswa' . $i . '@example.com',
    'password' => Hash::make('password'),
    'role' => 'siswa',
    'created_at' => now(),
    'updated_at' => now(),
]);

    $class = DB::table('classes')
        ->where('nama_kelas', 'XII RPL 3')
        ->first();

    DB::table('students')->insert([
        [
            'user_id' => $userIds[0],
            'nis' => '12001',
            'nama' => 'Siswa 1',
            'class_id' => $class->id,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'user_id' => $userIds[1],
            'nis' => '12002',
            'nama' => 'Siswa 2',
            'class_id' => $class->id,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'user_id' => $userIds[2],
            'nis' => '12003',
            'nama' => 'Siswa 3',
            'class_id' => $class->id,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'user_id' => $userIds[3],
            'nis' => '12004',
            'nama' => 'Siswa 4',
            'class_id' => $class->id,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'user_id' => $userIds[4],
            'nis' => '12005',
            'nama' => 'Siswa 5',
            'class_id' => $class->id,
            'created_at' => now(),
            'updated_at' => now(),
        ],
    ]);
}
}
