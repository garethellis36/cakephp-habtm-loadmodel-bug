<?php

use Phinx\Migration\AbstractMigration;

class SetupTables extends AbstractMigration
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
        if (!$this->hasTable("posts")) {
            $this->table("posts")
                 ->addColumn("body", "string")
                 ->create();
        }

        if (!$this->hasTable("tags")) {
            $this->table("tags")
                 ->addColumn("tag", "string")
                 ->create();
        }

        if (!$this->hasTable("posts_tags")) {
            $this->table("posts_tags")
                 ->addColumn("post_id", "integer")
                 ->addColumn("tag_id", "integer")
                 ->create();
        }
    }
}
