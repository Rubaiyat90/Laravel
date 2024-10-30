<?php

namespace Database\Seeders;

use App\Http\Controllers\JobController;
use App\Models\Job;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    public function run(): void
    {
        $tags = Tag::factory(3)->create();
        Job::factory(20)->hasAttached($tags)->create(new Sequence([
            'featured'=>false,
            'schedule'=>'Full-time',
        ],[
            'featured'=>true,
            'schedule'=>'Part-time',
        ]));
    }
}