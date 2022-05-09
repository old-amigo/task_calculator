<?php


use Phinx\Seed\AbstractSeed;

class SeedDrives extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
                $data = [
                    [
                        'name' => '240 ГБ SSD SATA Enterprise',
                        'cost' => '1200'
                    ], [
                        'name' => '240 ГБ SSD SATA Enterprise',
                        'cost' => '2100'
                    ], [
                        'name' => '800 ГБ SSD SATA Enterprise',
                        'cost' => '3200'
                    ]
                ];
        $this->table('drives')
            ->insert($data)
            ->saveData();
    }
}
