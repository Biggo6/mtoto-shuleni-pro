<?php
/**
 * Created by PhpStorm.
 * User: biggo
 * Date: 1/25/2017
 * Time: 10:23 AM
 */

class RolesTableSeeder extends Seeder {

    public function run()
    {
        Role::truncate();
        $r1 = new Role();
        $r1->name = "admin";
        $r1->system = 1;
        $r1->save();

        $r2 = new Role();
        $r2->name = "teacher";
        $r2->system = 1;
        $r2->save();

        $r3 = new Role();
        $r3->name = "parent";
        $r3->system = 1;
        $r3->save();

        $r4 = new Role();
        $r4->name = "student";
        $r4->system = 1;
        $r4->save();

        $r5 = new Role();
        $r5->name = "accountant";
        $r5->system = 1;
        $r5->save();
    }

}