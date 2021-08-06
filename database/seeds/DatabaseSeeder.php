<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = new App\User();
        $admin->name = "admin";
        $admin->email = "admin@gmail.com";
        $admin->password = Hash::make('12345678');
        $admin->type = "admin";
        $admin->phone = "012345";
        $admin->dob = "1959-12-13";
        $admin->address = "Yangon";
        $admin->profile = "ilya-mirnyy-wk_PY_gsEB8-unsplash.jpg";
        $admin->created_user_id = 1;
        $admin->save();
        // $this->call(UsersTableSeeder::class);
       factory(App\Post::class, 20)->create();
       factory(App\User::class, 10)->create();

    }
}

