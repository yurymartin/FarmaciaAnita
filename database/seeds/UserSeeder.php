<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipousers')->insert([
            'tipo' => 'ADMINISTRADOR',
            'desc' => 'tipo de usuario que tiene todos los roles y permisios del sistema',
            'activo' => 1,
            'borrado' => 0
        ]);

        DB::table('tipousers')->insert([
            'tipo' => 'VENDEDOR',
            'desc' => 'tipo de usuario que tiene permiso solo para las tablas relacionada ala venta',
            'activo' => 1,
            'borrado' => 0
        ]);

        DB::table('tipousers')->insert([
            'tipo' => 'ALMACENERO',
            'desc' => 'tipo de usuario que tiene permiso solo para las tablas relacionada ala compra',
            'activo' => 1,
            'borrado' => 0
        ]);

        DB::table('personas')->insert([
            'dni' => '00000000',
            'nombres' => 'YURY',
            'apellidos' => 'MARTIN CHAUCA',
            'direccion' => 'HUARAZ',
            'genero' => '1'
        ]);

        DB::table('especialidades')->insert([
            'nombre' => 'ENFERMERO',
            'descripcion' => '',
            'activo' => 1,
            'borrado' => 0
        ]);

        DB::table('empleados')->insert([
            'foto' => 'L0PifHcrJgshcEVjViCY.jpg',
            'sueldo' => '0.00',
            'telefono' => '999999999',
            'activo' => 1,
            'borrado' => 0,
            'persona_id' => '1',
            'especialidad_id' =>'1'
        ]);


        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'activo' => 1,
            'borrado' => 0,
            'tipouser_id' => 1,
            'empleado_id' => 1
        ]);



    }
}
