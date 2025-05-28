<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $files = [
            'Huggies' => 'MYodycKA5_UjAkBRKffrZzoLoxwTb-B6A6hqDcpgLG4=.jpg',
            'YokoSun' => 't7bp6hs0ZC3MIt_o2rvwUWAW1aJa3WMvZZCfn3HJXr8=.png',
            'Kioshi' => 'iXQ4RgLvoCT1PfWaBL0xgzB6Di5GiYkoQ4remTf9XSs=.jpg',
            'Pampers' => 'Xaun13pbi6pMTBoVBEdKePrHXJ5B1ebnXAJToKlqxws=.jpg',
            'Demi Star' => 'QHO_GH-zJFftB8Ru_BAssDnQcoSUogdXc8XcVY_Duf0=.jpg',
            'Barbie' => 'LQ4Y9VXTKgMEJeagFp61FobLF8Za0JeKhx2WDK1ebJg=.jpg',
            'Mobicaro' => 'xOa2MXh15KfwmTsiZpUcHI5_79Fh51IDrw2iT4WueqE=.jpg',
            'Bondibon' => '3JghKrnBE86SfW8tSbCkMjk6-wK6yetxvXMkqb9wFg0=.jpg',
            'Futurino' => 'FPiMXFJVjW-hIacaJlZxGhWIRbPBsBxpitDqqA_NB7Y=.png',
            'Philips Avent' => 'ikfoQ4fNDBAsr2o0wYF7rIE-MnmkPuBnbYdYhM56L0M=.png',
            'Brauberg' => 'K_F3hQDcjJmkHRBwmZW31xR3Gopg4q6778IqZ6Jh74U=.jpg',
            'LEGO' => 'OYVVcLqXRv_q7pyeZkUklB_bMZxqWehB0Ao_AnrBcjU=.jpg',
            'Attivio' => 'RdhQELrhQm05MdUk4JxJAJWVrInilOWjbJlhIP3c9RI=.jpg',
            'BabyGo' => '9xGECFJBQoNa6Rpc5UTMM_JczJGOCFEncqe5kdiMr-o=.jpg',
            'Zuru' => 'hFGy0XvEIkSp_b13Za0TYlYGaV4jORsYhWOwWASTKeI=.jpg',
            'Olsson' => '-LQQZIsn5DWGXNncLeYp9IZdJMvspiVR75M8PblJ_4Y=.jpg',
            'MANU' => 'UO3JFhtVvk2HCPUKYNn87cf7tk42baR9cWhQ1kdFJdc=.jpg',
            'Hot Wheels' => '85bO2g6qlAiETNUZT4dyUccfv3-HJhPSguROZiYM6Oc=.jpg',
            'White Edition' => 'PAsZKC-aoCi_neHbenwwP0jJigIe3_WkLl-PDNQYTVE=.jpg',
        ];
        foreach ($files as $name => $image){
            Brand::insert([
                'brand_name' => $name,
                'image' => $image
            ]);
        }
    }
}
