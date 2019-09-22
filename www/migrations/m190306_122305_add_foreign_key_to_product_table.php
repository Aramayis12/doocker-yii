<?php

use yii\db\Migration;

/**
 * Class m190306_122305_add_foreign_key_to_product_table
 */
class m190306_122305_add_foreign_key_to_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      // creates index for column `categoryID`
        $this->createIndex(
            'idx-product-categoryID',
            'product',
            'categoryID'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-product-categoryID',
            'product',
            'categoryID',
            'category',
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
            'fk-product-categoryID',
            'product'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            'idx-product-categoryID',
            'product'
        );
    }

}
