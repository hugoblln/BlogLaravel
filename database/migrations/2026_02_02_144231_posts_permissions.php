<?php

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $permissions = [
            'create posts',
            'update posts',
            'delete posts',
            'view posts',
            'viewAny posts'
        ];

        foreach($permissions as $permission)
            {
                Permission::create(['name' => $permission]);
            }

            $roleAdmin = Role::where('name', 'admin')->first();
            $roleAuthor = Role::where('name', 'Author')->first();

            $roleAdmin->givePermissionTo($permissions);
            $roleAuthor->givePermissionTo($permissions);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $permissions = [
            'create posts',
            'update posts',
            'delete posts',
            'view posts',
            'viewAny posts'
        ];

        // récupérer les rôles
        $roleAdmin = Role::where('name', 'admin')->first();
        $roleAuthor = Role::where('name', 'Author')->first();

        // retirer les permissions des rôles
        if($roleAdmin) {
            $roleAdmin->revokePermissionTo($permissions);
        }

        if($roleAuthor) {
            $roleAuthor->revokePermissionTo($permissions);
        }

        // supprimer les permissions
        foreach($permissions as $permission) {
            $perm = Permission::where('name', $permission)->first();
            if($perm) {
                $perm->delete();
            }
        }
    }
};
