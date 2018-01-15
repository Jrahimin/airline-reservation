<?php

use App\Model\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    public function run()
    {
        $setting = new Setting();
        $setting->key = "company_name";
        $setting->value = "Airlines XYZ";
        $setting->save();

        $setting = new Setting();
        $setting->key = "description";
        $setting->value = "Proper Description";
        $setting->save();

        $setting = new Setting();
        $setting->key = "location";
        $setting->value = "Australia";
        $setting->save();

        $setting = new Setting();
        $setting->key = "image_url";
        $setting->value = "images/company_logo/66d7f9a4-675d-4f40-9f03-aecb56370bbb.jpg";
        $setting->save();

        $setting = new Setting();
        $setting->key = "telephone";
        $setting->value = "09090909090909";
        $setting->save();
    }
}
