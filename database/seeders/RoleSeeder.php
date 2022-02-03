<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;//modelo role
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //roles
        $role1 = Role::create(['name'=>'Admin']);
        $role2 = Role::create(['name'=>'Blogger']);


        //permisos
        Permission::create(['name'=> 'admin.home','description'=>'Ver el dashboard'])->syncRoles([$role1,$role2]);

        Permission::create(['name'=> 'admin.users.update','description'=>'Editar Usuario'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.users.index','description'=>'Ver listado de usuarios'])->syncRoles([$role1]);
        Permission::create(['name'=> 'admin.users.edit','description'=>'Asignar un rol'])->syncRoles([$role1]);

        Permission::create(['name'=>'admin.categories.index','description'=>'Ver listado de categorias'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=> 'admin.categories.create','description'=>'Crear categorias'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.categories.edit','description'=>'Editar Categorias'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.categories.destroy','description'=>'Eliminar Categorias'])->syncRoles([$role1]);

        Permission::create(['name'=>'admin.tags.index','description'=>'Ver listado de etiquetas'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=> 'admin.tags.create','description'=>'Crear Etiqueta'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.tags.edit','description'=>'Editar Etiqueta'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.tags.destroy','description'=>'Eliminar Etiqueta'])->syncRoles([$role1]);

        Permission::create(['name'=>'admin.posts.index','description'=>'Ver listado de posts'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=> 'admin.posts.create','description'=>'Crear Post'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'admin.posts.edit','description'=>'Editar post'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'admin.posts.destroy','description'=>'Eliminar Post'])->syncRoles([$role1,$role2]);


    }
}
