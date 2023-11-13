<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTablas([
            'permissions',
            'roles',
            'model_has_permissions',
            'model_has_roles',
            'role_has_permissions'
            ,'users'
            ,
            'datos'
        ]);

        $this->call([
            RoleSeeder::class,
            UsersSeeder::class,
            DatosSeeder::class,
        ]);
    }

    protected function truncateTablas(array $tablas)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach ($tablas as $tabla) {
            DB::table($tabla)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
