<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Topic;

class TopicSeeder extends Seeder
{
    public function run()
    {
        $topics = [
            'Technology',
            'Sports',
            'Health',
            'Business',
            'Entertainment',
            'Science',
            'Politics',
            'Lifestyle',
            'Travel',
            'Food',
            'Education',
            'Environment',
            'Fashion',
            'Finance',
            'Automotive',
            'Gaming',
            'Real Estate'
            // You can add even more if needed
        ];

        foreach ($topics as $topic) {
            Topic::firstOrCreate(['name' => $topic]);
        }
    }
}
