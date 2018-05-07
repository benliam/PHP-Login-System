<?php


use Phinx\Migration\AbstractMigration;

class Members extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {

        $table = $this->table('members');
        $table->addColumn('username','string',['limit' => 255])
              ->addColumn('password', 'string', ['limit' => 255])
              ->addColumn('email', 'string', ['limit' => 255])
              ->addColumn('first_name', 'string', ['limit' => 255])
              ->addColumn('last_name', 'string', ['limit' => 255])
              ->addColumn('phone', 'string', ['limit' => 100])
              ->addColumn('active', 'integer',['limit' => 11])
              ->addColumn('date_created', 'integer', ['limit' => 11])
              ->create();

    }

   
}
