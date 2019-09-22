<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product`.
 */
class m190306_120644_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'categoryID' => $this->integer(),
            'title' => $this->string(),
            'description' => $this->text(),
            'inStock' => $this->boolean(),
            'price' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product');
    }
}
