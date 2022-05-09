<?php


use Phinx\Seed\AbstractSeed;

class SeedCases extends AbstractSeed
{
    public function run()
    {
        $data = [
            [
                'name' => '2U, 1 блок питания',
                'cost' => '3900'
            ], [
                'name' => '4U, 1 блок питания',
                'cost' => '7900'
            ]
        ];
        $this->table('cases')
            ->insert($data)
            ->saveData();
    }
}
