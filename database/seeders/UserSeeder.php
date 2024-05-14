<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    //1
    $usuario = User::create([
      'name' => 'Miguel Ángel Arteaga Guzmán',
      'email' => 'miguel@gmail.com',
      'password' => Hash::make('12345678'),
      'rol_id' => '2'
    ])->assignRole('usuario');
    //2
    $usuario = User::create([
      'name' => 'Roque Mauricio Banegas Lopez',
      'email' => 'mauricio@gmail.com',
      'password' => Hash::make('12345678'),
      'rol_id' => '2'
    ])->assignRole('usuario');
    //3
    $usuario = User::create([
      'name' => 'Jose Humberto Castro Ortiz',
      'email' => 'josehco85@gmail.com',
      'password' => Hash::make('123'),
      'rol_id' => '2'
    ])->assignRole('usuario');
    //4
    $usuario = User::create([
      'name' => 'Rodrigo Centellas Delgadillo',
      'email' => 'rodrigo@gmail.com',
      'password' => Hash::make('123'),
      'rol_id' => '2'
    ])->assignRole('usuario');
    
    //5
    $usuario = User::create([
      'name' => 'Abel Alejandro López Cabero',
      'email' => 'abel@gmail.com',
      'password' => Hash::make('1234'),
      'rol_id' => '2'
    ])->assignRole('usuario');
    //6
    $usuario = User::create([
      'name' => 'Tania Valda Donozo',
      'email' => 'tania@gmail.com',
      'password' => Hash::make('12345678'),
      'rol_id' => '2'
    ])->assignRole('usuario');
    //7
    $usuario = User::create([
      'name' => 'admin',
      'email' => 'admin@gmail.com',
      'password' => Hash::make('1234'),
      'rol_id' => '1'
    ])->assignRole('administrador');
  }
}
