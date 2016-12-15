<?php
use Migrations\AbstractMigration;

class AddColumnsToUsers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('users');
        $table->addColumn('password', 'string', [
            'default' => null,
            'limit' => 255,
            // 'null' => false,
        ]);
        $table->addColumn('role', 'integer', [
            'default' => null,
            'limit' => 11,
            // 'null' => false,
        ]);
        $table->addColumn('status', 'integer', [
            'default' => null,
            'limit' => 11,
            // 'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            // 'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            // 'null' => false,
        ]);
        $table->update();
    }
}
