<?php

use Illuminate\Database\Seeder;
use App\Models\Permissao;

class PermissaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(Permissao::class,2)->create();
    }
}
