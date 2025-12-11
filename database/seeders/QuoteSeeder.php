<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $quotes = [
            // Football
            ['content' => "I spent a lot of money on booze, birds and fast cars. The rest I just squandered.", 'author' => 'George Best', 'category' => 'football'],
            ['content' => "Some people think football is a matter of life and death. I assure you, it's much more serious than that.", 'author' => 'Bill Shankly', 'category' => 'football'],
            ['content' => "Success is not final, failure is not fatal: it is the courage to continue that counts.", 'author' => 'Marcelo Bielsa', 'category' => 'football'],
            ['content' => "The ball does not stain.", 'author' => 'Diego Maradona', 'category' => 'football'],

            // Music
            ['content' => "One good thing about music, when it hits you, you feel no pain.", 'author' => 'Bob Marley', 'category' => 'music'],
            ['content' => "I'm not a rock star. I'm a rock 'n' roll star.", 'author' => 'Liam Gallagher', 'category' => 'music'],
            ['content' => "Music is the strongest form of magic.", 'author' => 'Marilyn Manson', 'category' => 'music'],
            ['content' => "I don't have a problem with thieves, I have a problem with bad music.", 'author' => 'Dave Grohl', 'category' => 'music'],
        ];

        foreach ($quotes as $quote) {
            \App\Models\Quote::create($quote);
        }
    }
}
