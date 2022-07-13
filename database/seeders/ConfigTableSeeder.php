<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Config;


class ConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Config::create([
            'app_name' => 'Unitop_manager', // String
            'app_name_abv'  => 'Unitop', // String
            'app_slogan'  => 'App Slogan', // String
            'captcha'  => 'F', // 'T' or 'F'
            'datasitekey'  => '', //String
            'recaptcha_secret'  => '', //String
            'img_login'  => 'T', // 'T' or 'F'
            'caminho_img_login'  => 'img/config/logo.png', //String -> defaut: 'img/config/logo.png'
            'tamanho_img_login'  => '40', // Integer
            'titulo_login'  => '<a href="#" ><b>Unitop</b> Manager</a>', //String
            'layout'  => 'fixed', //String -> defaut: 'fixed'
            'skin'  => 'blue', //String -> defaut: 'blue'
            'favicon'  => 'img/config/favicon.png', //String
            'test' => 'Unitop Manager'
        ]);
    }
}
