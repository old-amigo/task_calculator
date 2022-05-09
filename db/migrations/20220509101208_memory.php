<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Memory extends AbstractMigration
{
    public function change(): void
    {
        $this->table('memory')
            ->addColumn('name', 'string', ['limit' => 255])
            ->addColumn('cost', 'decimal')
            ->create();
    }
}
