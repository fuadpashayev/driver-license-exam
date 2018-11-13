<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Settings::class, 1)->create()->each(function ($settings) {
            $settings->save();
        });
    }
}
