<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Cases extends AbstractMigration
{
    public function change(): void
    {
        $this->table('cases')
            ->addColumn('name', 'string', ['limit' => 255])
            ->addColumn('cost', 'decimal')
            ->create();
    }
}
