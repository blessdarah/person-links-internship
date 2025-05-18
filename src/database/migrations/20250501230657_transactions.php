<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Transactions extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $table = $this->table('transactions');
        $table->addColumn('user_id', 'integer', [
            'limit' => 11,
            'null' => false,
        ])
        ->addColumn('amount', 'decimal', [
            'precision' => 10,
            'scale' => 2,
            'null' => false,
        ])
        ->addColumn('transaction_type', 'string', [
            'limit' => 10,
            'null' => false,
        ])
        ->addColumn('created_at', 'timestamp', [
            'default' => 'CURRENT_TIMESTAMP',
            'null' => false,
        ])
        ->addColumn('status', 'string') // pending, failed, successful
        ->addColumn('phone_number', 'string')
        ->addColumn('description', 'string')
        ->addColumn('reference', 'string')
        ->addIndex(['user_id'])
        ->create();
    }
}
