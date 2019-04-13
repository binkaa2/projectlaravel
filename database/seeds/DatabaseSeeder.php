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

         // $this->call(contentSeeder::class);
          //$this->call(subCategorySeeder::class);
          $this->call(categorySeeder::class);
         // $this->call(usersSeeder::class);
    }


}


class contentSeeder extends Seeder{
  public function run(){
    DB::table('contents') -> insert([
      ['title' => 'Chú Bé Chăn Cừu','content' => 'jk just du it','is_trend' => '1','content_date'=>'1998-01-02','img' => 'images/anh1','alias' => 'chubechancuu','views'=>'200','user_id' => '1','sub_category_id'=>'1'],
      ['title' => 'Bác Tài Xế','content' => 'awwwwwwwwwwwwww','is_trend' => '0','content_date'=>'1998-01-02','img' => 'images/anh2','alias' => 'bactaixe','views'=>'2','user_id' => '2','sub_category_id'=>'1'],
      ['title' => 'Bác Tài Xế','content' => 'awwwwwwwwwwwwww','is_trend' => '0','content_date'=>'1998-01-02','img' => 'images/anh2','alias' => 'bactaixe','views'=>'2','user_id' => '2','sub_category_id'=>'2'],
      ['title' => 'Bác Tài Xế','content' => 'awwwwwwwwwwwwww','is_trend' => '0','content_date'=>'1998-01-02','img' => 'images/anh2','alias' => 'bactaixe','views'=>'2','user_id' => '2','sub_category_id'=>'3'],
    ]);
  }
}

class subCategorySeeder extends Seeder{
  public function run(){
    DB::table('sub_content_categories') -> insert([
      ['name'=>'Báo Hành Động','alias'=>'bao_hanh_dong','category_id'=>'1'],
      ['name'=>'Báo Porn ?? :D ??','alias'=>'bao_porn','category_id'=>'2'],
      ['name'=>'Báo Ge','alias'=>'bao_ge','category_id'=>'3'],
    ]);
  }
}

class categorySeeder extends Seeder{
  public function run(){
    DB::table('content_categories') -> insert([
      ['name'=>'Báo','alias'=>'bao'],
      ['name'=>'Tap Chi','alias'=>'tap_chi'],
      ['name'=>'Pim','alias'=>'pim'],
    ]);
  }
}

class usersSeeder extends Seeder{
  public function run(){
    DB::table('users')->insert([
      ['name'=>'binkaa2','password'=>bcrypt('054882762'),'email'=>'binkaa1@gmail.com','is_admin'=>'1','address'=>'30 lich doi'],
      ['name'=>'cpt.macmilan2','password'=>bcrypt('Ngan1996'),'email'=>'nganhoang@gmail.com','is_admin'=>'1','address'=>'can tho'],
    ]);
  }
}
