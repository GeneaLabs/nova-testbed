<?php

use Illuminate\Database\Seeder;
use App\Book;
use App\Author;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Author::class, 10)->create([]);
        factory(Book::class, 10)->create([]);
        // $this->call(UsersTableSeeder::class);
    }
}
