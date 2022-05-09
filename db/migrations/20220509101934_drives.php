<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Drives extends AbstractMigration
{
    public function change(): void
    {
        $this->table('drives')
            ->addColumn('name', 'string', ['limit' => 255])
            ->addColumn('cost', 'decimal')
            ->create();
    }
}
