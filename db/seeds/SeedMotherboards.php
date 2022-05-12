<?php


use Phinx\Seed\AbstractSeed;

class SeedMotherboards extends AbstractSeed
{
    public function run()
    {
        $data = [
            [
                'name' => 'X10SRi',
                'cost' => '4000'
            ]
        ];
        $this->table('motherboards')
            ->insert($data)
            ->saveData();
    }
}
