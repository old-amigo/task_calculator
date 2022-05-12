<?php


use Phinx\Seed\AbstractSeed;

class SeedProc extends AbstractSeed
{
    public function run()
    {
        $data = [
            [
                'name' => 'Intel E5-2630v3 (8x2.4 ГГц HT)',
                'cost' => '1600'
            ],
            [
                'name' => 'Intel E5-2630v4 (10x2.2 ГГц HT)',
                'cost' => '2400'
            ],
            [
                'name' => 'Intel E5-1650v4 (6x3.6 ГГц HT)',
                'cost' => '3100'
            ],
            [
                'name' => 'Intel E5-2630 (6x2.3 ГГц HT)',
                'cost' => '3400'
            ],
        ];
        $this->table('processors')
            ->insert($data)
            ->saveData();
    }
}
