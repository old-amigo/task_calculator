<?php


use Phinx\Seed\AbstractSeed;

class SeedProcessorsMotherboards extends AbstractSeed
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
                'id_processor' => 1,
                'id_motherboard' => 1
            ], [
                'id_processor' => 2,
                'id_motherboard' => 2
            ]
        ];
        $this->table('processors_motherboards')
            ->insert($data)
            ->saveData();
    }
}
