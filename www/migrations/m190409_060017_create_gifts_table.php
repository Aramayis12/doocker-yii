<?php

use yii\db\Migration;

/**
 * Handles the creation of table `gifts`.
 */
class m190409_060017_create_gifts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('gifts', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'in_stock' => $this->boolean(),
            'qty' => $this->integer(3),
            'sales_qty' => $this->integer(),
            'seller_id' => $this->integer(),
            'price' => $this->integer(),
            'image' => $this->string(),
        ]);

        // creates index for column `categoryID`
        $this->createIndex(
            'idx-gifts-seller_id',
            'gifts',
            'seller_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-gifts-seller_id',
            'gifts',
            'seller_id',
            'seller',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-gifts-seller_id',
            'gifts'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            'idx-gifts-seller_id',
            'gifts'
        );

        $this->dropTable('gifts');
    }
}
