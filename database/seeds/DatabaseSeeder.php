<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Mail::fake();

        DB::table('users')->insert([
            'name' => 'Marceau Ka',
            'email' => 'admin@example.fr',
            'password' => Hash::make('secret'),
            'api_token' => 'api-token-secret',
            'created_at' => now()->toDateTimeString(),
        ]);

        $links = [
            \App\Link::create([
                'title' => 'The PHP Framework for Web Artisans',
                'content' => 'Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.',
                'url' => 'https://laravel.com/',
            ]),
            \App\Link::create([
                'title' => "Pandrezz X L'indécis X j'san - Belleville EP",
                'url' => 'https://soundcloud.com/pandrezz/pandrezz-x-lindecis-x-jsan-belleville-ep',
                'extra' => '<iframe width="100%" height="140" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?visual=false&url=https%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F563826981&show_artwork=false"></iframe>',
            ]),
            \App\Link::create([
                'title' => 'Morten Granau - Scope (Official Audio)',
                'url' => 'https://www.youtube.com/watch?v=uQbUzL0VE7w',
                'extra' => '<iframe width="100%" src="https://www.youtube.com/embed/uQbUzL0VE7w" frameborder="0" allowfullscreen></iframe>'
            ]),
        ];

        $tags = [
            \Spatie\Tags\Tag::findOrcreate('Web'),
            \Spatie\Tags\Tag::findOrcreate('Musique'),
        ];

        $links[0]->attachTag($tags[0]);
        $links[1]->attachTag($tags[1]);
        $links[2]->attachTag($tags[1]);
    }
}