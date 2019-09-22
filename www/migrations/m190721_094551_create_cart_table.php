<?php

use yii\db\Migration;

/**
 * Handles the creation of table `cart`.
 */
class m190721_094551_create_cart_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('cart', [
            'id' => $this->primaryKey(),
            'hash' => $this->string(),
            'user_id' => $this->integer(),
            'product_id' => $this->integer(),
            'qty' => $this->integer(3),
            'price' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('cart');
    }
}
