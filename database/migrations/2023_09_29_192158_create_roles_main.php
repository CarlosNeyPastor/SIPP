<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
             $role1 = Role::create(['name' => 'upl']);
             $role2 = Role::create(['name' => 'ujp']);
             $role3 = Role::create(['name' => 'ufa']);
             $role4 = Role::create(['name' => 'ujf']);
             $role5 = Role::create(['name' => 'upa']);
             $role6 = Role::create(['name' => 'uep']);
             $role7 = Role::create(['name' => 'dta']);
             $role8 = Role::create(['name' => 'com']);
             $role9 = Role::create(['name' => 'ubo']);
             $role10 = Role::create(['name' => 'ujb']);
             $role11 = Role::create(['name' => 'uac']);
             $role12 = Role::create(['name' => 'uja']);
             $role50 = Role::create(['name' => 'adm']);
             $role14 = Role::create(['name' => 'uba']);
             $role15 = Role::create(['name' => 'ujo']);
             $role16 = Role::create(['name' => 'uco']);
             $role17 = Role::create(['name' => 'ujc']);
             $role18 = Role::create(['name' => 'uay']);
             $role19 = Role::create(['name' => 'ujy']);
             $role20 = Role::create(['name' => 'ufo']);
             $role21 = Role::create(['name' => 'ufj']);
             $role22 = Role::create(['name' => 'udo']);
             $role23 = Role::create(['name' => 'ujd']);
             $role24 = Role::create(['name' => 'udi']);
             $role25 = Role::create(['name' => 'uqo']);
             $role26 = Role::create(['name' => 'ujq']);
             /*$user=User::find(1);
             $user->assignRole($role2);*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
};
