<?php

use yii\db\Migration;

/**
 * Handles adding utm_source_column_pay_type to table `orders`.
 */
class m190316_165143_add_utm_source_column_pay_type_column_to_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('orders', 'utm_source', $this->string(25));
        $this->addColumn('orders', 'pay_type', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('orders', 'utm_source');
        $this->dropColumn('orders', 'pay_type');
    }
}
