<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user= App\User::create([
           'name'    => 'toan',
          'email'    => 'toan@gmail.com',
          'password' => bcrypt('password'),
          'admin'    => 1
        ]);

      App\profileModel::create([
           'user_id' => $user->id,
           'avatar'  => 'link to image',
           'about'   => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio voluptatibus ea fugit tenetur, sint ipsa in quae quaerat perspiciatis fuga dicta vitae minima consequuntur molestias officia, deserunt culpa nesciunt veniam!',
           'facebook' => 'facebook.com',
           'youtube'  => 'youtube.com'

      ]);


    }
}
