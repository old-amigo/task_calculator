<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Motherboards extends AbstractMigration
{
    public function change(): void
    {
        $this->table('motherboards')
            ->addColumn('name', 'string', ['limit' => 255])
            ->addColumn('cost', 'decimal')
            ->create();
    }
}
