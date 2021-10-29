<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dzongkhag;

class DzongkhagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dzongkhags = [
            'བུམ་ཐང་།',
            'ཆུ་ཁ།',
            'དར་དཀར་ན།',
            'མགར་ས།',
            'ཧཱ།',
            'ལྷུན་རྩེ།',
            'མྱོང་སྒར།',
            'སྤ་གྲོ།',
            'པདྨ་དགའ་ཚལ།',
            'སྤུ་ན་ཁ།',
            'བསམ་གྲུབ་ལྗོངས་མཁར།',
            'བསམ་རྩེ།',
            'གསར་སྤང་།',
            'ཐིམ་ཕུག',
            'བཀྲིས་སྒང་།',
            'བཀྲ་ཤིས་གཡང་རྩེ།',
            'ཀྲོང་གསར།',
            'རྩི་རང་།',
            'དབང་འདུས་ཕྱོ་བྲང་།',
            'གཞལམ་སྒང་།'
        ];
        for($i = 0; $i < count($dzongkhags); $i++){
            Dzongkhag::create([
                'id' => $i + 1,
                'name' => $dzongkhags[$i],
            ]);
        }
    }
}
