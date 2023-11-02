<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $permissions = [


            'المستخدمين',
            'قائمة المستخدمين',
            'صلاحيات المستخدمين',
            'الاعدادات',
            'المنتجات',
            'الاقسام',




            'اضافة مستخدم',
            'تعديل مستخدم',
            'حذف مستخدم',

            'عرض صلاحية',
            'اضافة صلاحية',
            'تعديل صلاحية',
            'حذف صلاحية',

            'اضافة منتج',
            'تعديل منتج',
            'حذف منتج',

            'اضافة قسم',
            'تعديل قسم',
            'حذف قسم',
            'الاشعارات',

        ];



        foreach ($permissions as $permission) {

            Permission::create(['name' => $permission]);
        }
    }
}
