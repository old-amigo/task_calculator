<?php


use Phinx\Seed\AbstractSeed;

class SeedMemory extends AbstractSeed
{
    public function run()
    {
        $data = [
            [
                'name' => '16 ГБ DDR4 ECC REG',
                'cost' => '1280'
            ], [
                'name' => '24 ГБ DDR4 ECC REG',
                'cost' => '1920'
            ], [
                'name' => '32 ГБ DDR4 ECC REG',
                'cost' => '2560'
            ], [
                'name' => '48 ГБ DDR4 ECC REG',
                'cost' => '3840'
            ]
        ];
        $this->table('memory')
            ->insert($data)
            ->saveData();
    }
}
