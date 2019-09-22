<?php

use yii\db\Migration;

/**
 * Handles adding age to table `orders`.
 */
class m190309_163304_add_age_column_to_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->addColumn('orders', 'age', $this->integer(3));
      $this->addColumn('orders', 'qty', $this->integer(3));
      $this->addColumn('orders', 'recipient_age', $this->integer(3));
      $this->addColumn('orders', 'recipient_for', $this->boolean());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
      $this->dropColumn('orders', 'age');
      $this->dropColumn('orders', 'qty');
      $this->dropColumn('orders', 'recipient_age');
      $this->dropColumn('orders', 'recipient_for');
    }
}
