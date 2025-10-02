<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Book;

class LibrarySeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['name'=>'J.K. Rowling','books'=>[
                ['title'=>'Harry Potter and the Sorcerer\'s Stone','year'=>1997,'status'=>'available'],
                ['title'=>'Harry Potter and the Chamber of Secrets','year'=>1998,'status'=>'borrowed'],
                ['title'=>'Harry Potter and the Prisoner of Azkaban','year'=>1999,'status'=>'available'],
            ]],
            ['name'=>'George R.R. Martin','books'=>[
                ['title'=>'A Game of Thrones','year'=>1996,'status'=>'available'],
                ['title'=>'A Clash of Kings','year'=>1998,'status'=>'borrowed'],
                ['title'=>'A Storm of Swords','year'=>2000,'status'=>'available'],
            ]],
            ['name'=>'J.R.R. Tolkien','books'=>[
                ['title'=>'The Hobbit','year'=>1937,'status'=>'available'],
                ['title'=>'The Fellowship of the Ring','year'=>1954,'status'=>'borrowed'],
                ['title'=>'The Two Towers','year'=>1954,'status'=>'available'],
            ]],
            ['name'=>'Agatha Christie','books'=>[
                ['title'=>'Murder on the Orient Express','year'=>1934,'status'=>'borrowed'],
                ['title'=>'Death on the Nile','year'=>1937,'status'=>'available'],
                ['title'=>'And Then There Were None','year'=>1939,'status'=>'available'],
            ]],
            ['name'=>'Stephen King','books'=>[
                ['title'=>'The Shining','year'=>1977,'status'=>'available'],
                ['title'=>'It','year'=>1986,'status'=>'borrowed'],
            ]],
        ];

        foreach($data as $authorData){
            $author = Author::create(['name'=>$authorData['name']]);
            foreach($authorData['books'] as $book){
                $b = Book::create($book);
                $b->authors()->attach($author->id);
            }
        }
    }
}
