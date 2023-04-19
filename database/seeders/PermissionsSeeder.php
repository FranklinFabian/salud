<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\Models\Administracion\User;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions_array = [];
        array_push($permissions_array, Permission::create(['name' => 'administrador_create']));
        array_push($permissions_array, Permission::create(['name' => 'administrador_edit']));
        array_push($permissions_array, Permission::create(['name' => 'administrador_delete']));

        $viewPermission = Permission::create(['name' => 'administrador_view']);
        array_push($permissions_array, $viewPermission);

        $superAdminRole = Role::create(['name' => 'administrador']);
        $superAdminRole->syncPermissions($permissions_array);
        $userCovidRole = Role::create(['name' => 'covid_sala_situacional']);
        $userCovidRole->givePermissionTo($viewPermission);

        $userSuperAdmin = User::create([
            'name' => 'Administrador del Sistema',
            'email' => 'admin@asuss.gob.bo',
            'estado' => 'Activo',
            'password' => Hash::make('admin'),
        ]);
        $userSuperAdmin->assignRole('administrador');


        $userCovid = User::create([
            'name' => 'Mirka Susana Zuñiga Rivera',
            'email' => 'mirka.zuniga@asuss.gob.bo',
            'estado' => 'Activo',
            'password' => Hash::make('mirka.zuniga'),
        ]);
        $userCovid->assignRole('covid_sala_situacional');
    }
}
