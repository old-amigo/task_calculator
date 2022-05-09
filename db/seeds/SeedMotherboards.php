<?php


use Phinx\Seed\AbstractSeed;

class SeedMotherboards extends AbstractSeed
{
    public function run()
    {
        $data = [
            [
                'name' => 'AMD B550',
                'cost' => '960'
            ], [
                'name' => 'Intel B460',
                'cost' => '560'
            ]
        ];
        $this->table('motherboards')
            ->insert($data)
            ->saveData();
    }
}
