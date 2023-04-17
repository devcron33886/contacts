<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'category_create',
            ],
            [
                'id'    => 18,
                'title' => 'category_edit',
            ],
            [
                'id'    => 19,
                'title' => 'category_show',
            ],
            [
                'id'    => 20,
                'title' => 'category_delete',
            ],
            [
                'id'    => 21,
                'title' => 'category_access',
            ],
            [
                'id'    => 22,
                'title' => 'company_create',
            ],
            [
                'id'    => 23,
                'title' => 'company_edit',
            ],
            [
                'id'    => 24,
                'title' => 'company_show',
            ],
            [
                'id'    => 25,
                'title' => 'company_delete',
            ],
            [
                'id'    => 26,
                'title' => 'company_access',
            ],
            [
                'id'    => 27,
                'title' => 'contact_create',
            ],
            [
                'id'    => 28,
                'title' => 'contact_edit',
            ],
            [
                'id'    => 29,
                'title' => 'contact_show',
            ],
            [
                'id'    => 30,
                'title' => 'contact_delete',
            ],
            [
                'id'    => 31,
                'title' => 'contact_access',
            ],
            [
                'id'    => 32,
                'title' => 'interaction_create',
            ],
            [
                'id'    => 33,
                'title' => 'interaction_edit',
            ],
            [
                'id'    => 34,
                'title' => 'interaction_show',
            ],
            [
                'id'    => 35,
                'title' => 'interaction_delete',
            ],
            [
                'id'    => 36,
                'title' => 'interaction_access',
            ],
            [
                'id'    => 37,
                'title' => 'project_create',
            ],
            [
                'id'    => 38,
                'title' => 'project_edit',
            ],
            [
                'id'    => 39,
                'title' => 'project_show',
            ],
            [
                'id'    => 40,
                'title' => 'project_delete',
            ],
            [
                'id'    => 41,
                'title' => 'project_access',
            ],
            [
                'id'    => 42,
                'title' => 'task_management_access',
            ],
            [
                'id'    => 43,
                'title' => 'task_status_create',
            ],
            [
                'id'    => 44,
                'title' => 'task_status_edit',
            ],
            [
                'id'    => 45,
                'title' => 'task_status_show',
            ],
            [
                'id'    => 46,
                'title' => 'task_status_delete',
            ],
            [
                'id'    => 47,
                'title' => 'task_status_access',
            ],
            [
                'id'    => 48,
                'title' => 'task_tag_create',
            ],
            [
                'id'    => 49,
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => 50,
                'title' => 'task_tag_show',
            ],
            [
                'id'    => 51,
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => 52,
                'title' => 'task_tag_access',
            ],
            [
                'id'    => 53,
                'title' => 'task_create',
            ],
            [
                'id'    => 54,
                'title' => 'task_edit',
            ],
            [
                'id'    => 55,
                'title' => 'task_show',
            ],
            [
                'id'    => 56,
                'title' => 'task_delete',
            ],
            [
                'id'    => 57,
                'title' => 'task_access',
            ],
            [
                'id'    => 58,
                'title' => 'tasks_calendar_access',
            ],
            [
                'id'    => 59,
                'title' => 'team_create',
            ],
            [
                'id'    => 60,
                'title' => 'team_edit',
            ],
            [
                'id'    => 61,
                'title' => 'team_show',
            ],
            [
                'id'    => 62,
                'title' => 'team_delete',
            ],
            [
                'id'    => 63,
                'title' => 'team_access',
            ],
            [
                'id'    => 64,
                'title' => 'contact_management_access',
            ],
            [
                'id'    => 65,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
