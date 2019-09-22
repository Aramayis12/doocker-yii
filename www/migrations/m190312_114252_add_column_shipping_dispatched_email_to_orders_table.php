<?php

use yii\db\Migration;

/**
 * Class m190312_114252_add_column_shipping_dispatched_email_to_orders_table
 */
class m190312_114252_add_column_shipping_dispatched_email_to_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('orders', 'shipping_dispatched_email', $this->boolean()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('orders', 'shipping_dispatched_email');
    }

}
