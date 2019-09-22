<?php

use yii\db\Migration;

/**
 * Handles adding shipping_status_column_payment_status to table `orders`.
 */
class m190310_115439_add_shipping_status_column_payment_status_column_to_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->addColumn('orders', 'shipping_status', $this->string());
      $this->addColumn('orders', 'payment_status', $this->string());

      $this->alterColumn('orders', 'interests', $this->text());
      $this->alterColumn('orders', 'recipient_interests', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
      $this->dropColumn('orders', 'shipping_status');
      $this->dropColumn('orders', 'payment_status');

      $this->alterColumn('orders', 'interests', $this->string());
      $this->alterColumn('orders', 'recipient_interests', $this->string());
    }
}
