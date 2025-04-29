<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Registration extends AbstractMigration
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
        $registrationTable = $this->table('register');
        $registrationTable->addColumn('applicant_id', 'string')
            ->addColumn('fullname', 'string', ['limit' => 70])
            ->addColumn('email', 'string')
            ->addColumn('phone', 'string', ['limit' => 15])
            ->addColumn('school', 'string')
            ->addColumn('speciality', 'string')
            ->addColumn('referral', 'string')
            ->addColumn('comments', 'string')
            ->create();
    }
}
