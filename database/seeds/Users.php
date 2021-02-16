<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-17 03:05:34
 * @LastEditTime: 2021-02-17 03:23:58
 * @Description:
 */

use think\migration\Seeder;

class Users extends Seeder
{
  /**
   * Run Method.
   *
   * Write your database seeder using this method.
   *
   * More information on writing seeders is available here:
   * http://docs.phinx.org/en/latest/seeding.html
   */
  public function run()
  {
    $faker = Faker\Factory::create();
    $data = [];
    for ($i = 0; $i < 100; $i++) {
      $data[] = [
        'username'      => $faker->userName,
        'password'      => sha1(md5($faker->password)),
        'nickname'    => $faker->name,
        'avatar'         => $faker->imageUrl(),
        'email'         => $faker->email,
        'phone'         => $faker->phoneNumber,
        'gender'         => $faker->numberBetween(0, 2),
      ];
    }
    $this->insert('users', $data);
  }
}
