<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Http\Controllers\ScrapperController;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        //\App\Models\Question::factory(5)->create();
        //appel des fonction du controller pour le scrap des questions
        $Qestion = new ScrapperController();
        $Qestion->dis_moiscrapper();
        $Qestion->hotscrapper();
        $Qestion->hotscrapper2();
        $Qestion->je_nai_jamaisscrapper();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
