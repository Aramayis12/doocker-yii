<?php

use yii\db\Migration;

/**
 * Handles adding price to table `orders`.
 */
class m190317_110331_add_price_column_to_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('orders', 'price', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('orders', 'price');
    }
}
