<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FAQ;
use App\Models\Category;


class FAQSeeder extends Seeder
{
/**
* Run the database seeds.
*/
public function run(): void
{
$cat1 = Category::create(['name' => 'Algemeen']);
$cat2 = Category::create(['name' => 'Account']);


FAQ::create([
'question' => 'Wat is dit?',
'answer' => 'Dit is een test website!',
])->categories()->attach($cat1);
FAQ::create([
'question' => 'Hoe maak ik een account aan?',
'answer' => 'Klik op register!',
])->categories()->attach($cat2);
}
}