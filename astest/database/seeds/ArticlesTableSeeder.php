<?php
 
use Illuminate\Database\Seeder;
 
class ArticlesTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('articles')->delete();
 
        $projects = array(
            ['id' => 1, 'title' => 'title 1', 'description' => 'project-1', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'title' => 'title 2', 'description' => 'project-2', 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );
 
        // Uncomment the below to run the seeder
        DB::table('articles')->insert($projects);
    }
 
}