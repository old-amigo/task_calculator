<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Processors extends AbstractMigration
{
    public function change(): void
    {
        $this->table('processors')
            ->addColumn('name', 'string', ['limit' => 255])
            ->addColumn('cost', 'decimal')
            ->create();
    }
}
