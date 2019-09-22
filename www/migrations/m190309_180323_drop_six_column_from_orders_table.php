<?php

use yii\db\Migration;

/**
 * Handles dropping six from table `orders`.
 */
class m190309_180323_drop_six_column_from_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->dropColumn('orders', 'company');
      $this->dropColumn('orders', 'address_2');
      $this->dropColumn('orders', 'zip');
      $this->dropColumn('orders', 'recipient_company');
      $this->dropColumn('orders', 'recipient_address_2');
      $this->dropColumn('orders', 'recipient_zip');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
      $this->addColumn('orders', 'company', $this->string());
      $this->addColumn('orders', 'address_2', $this->string());
      $this->addColumn('orders', 'zip', $this->string());
      $this->addColumn('orders', 'recipient_company', $this->string());
      $this->addColumn('orders', 'recipient_address_2', $this->string());
      $this->addColumn('orders', 'recipient_zip', $this->string());
    }
}
