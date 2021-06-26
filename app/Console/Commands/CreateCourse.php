<?php

namespace App\Console\Commands;

use App\Models\Course;
use Faker\Factory as Faker;
use Illuminate\Console\Command;

class CreateCourse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:course';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $faker = Faker::create();

        Course::create([
            'name' => $faker->text(),
            'description' => $faker->text(),
            'content' => $faker->text(),
            'price' => $faker->randomNumber($nbDigits = NULL, $strict = false),
            'discount' => $faker->numberBetween($min = 0, $max = 99),
            'thumbnail' => $faker->imageUrl(),
            'category_id' => 1,
        ]);
    }
}
