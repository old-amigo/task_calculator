<?php


use Phinx\Seed\AbstractSeed;

class SeedMemory extends AbstractSeed
{
    public function run()
    {
        $data = [
            [
                'name' => '8 ГБ DDR4 NON-ECC',
                'cost' => '240'
            ], [
                'name' => '16 ГБ DDR4 NON-ECC',
                'cost' => '480'
            ], [
                'name' => '32 ГБ DDR4 NON-ECC',
                'cost' => '960'
            ], [
                'name' => '64 ГБ DDR4 NON-ECC',
                'cost' => '1920'
            ]
        ];
        $this->table('memory')
            ->insert($data)
            ->saveData();
    }
}
