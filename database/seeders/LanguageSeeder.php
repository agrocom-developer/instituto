<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->delete();
        
        // English Language
        Language::create([
            'name'=>'English',
            'code'=>'en',
            'direction'=>'0',
            'default'=>'1',
            'status'=>'1',
        ]);
        
        // Spanish Language
        Language::create([
            'name'=>'Español',
            'code'=>'es',
            'direction'=>'0',
            'default'=>'0',
            'status'=>'1',
        ]);
    }
}
