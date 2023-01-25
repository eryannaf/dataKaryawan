<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class IndexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = Role::create([
            'name' => 'Super Admin',
        ]);

        $user = Role::create([
            'name' => 'User',
        ]);


        $permission = Permission::create([
            'name' => 'see_DashboardMember',
        ]);
        $user->givePermissionTo($permission);

        $data   = [
            'name'      => 'Super Admin',
            'email'     => 'super@mail.com',
            'password'  => Hash::make('12345678')
        ];

        $user = User::create($data);

        $user->syncRoles('Super Admin');

        $data   = [
            'name'      => 'Karyawan',
            'email'     => 'karyawan@mail.com',
            'password'  => Hash::make('12345678')
        ];

        $user = User::create($data);

        $user->syncRoles('User');

        $superAdmin->givePermissionTo($permission);

        $permission = Permission::create([
            'name' => 'create_Transaksi',
        ]);

        $superAdmin->givePermissionTo($permission);


    }
}
