<?php


use Phinx\Seed\AbstractSeed;

class SeedProc extends AbstractSeed
{
    public function run()
    {
        $data = [
            [
                'name' => 'AMD Ryzen 5 5600G (6x3.9 ГГц SMT)',
                'cost' => '2300'
            ], [
                'name' => 'Intel Core i5-10600 (6x3.3 ГГц HT)',
                'cost' => '2100'
            ]
        ];
        $this->table('processors')
            ->insert($data)
            ->saveData();
    }
}
