<?php

use yii\db\Migration;

/**
 * Handles adding user_id_column_month_column_day_column_created_at to table `orders`.
 */
class m190309_151437_add_user_id_column_month_column_day_column_created_at_column_to_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->addColumn('orders', 'user_id', $this->integer());
      $this->addColumn('orders', 'month', $this->integer(2));
      $this->addColumn('orders', 'day', $this->integer(2));
      $this->addColumn('orders', 'time', $this->string());
      $this->addColumn('orders', 'created_at', $this->integer());

      // creates index for column `categoryID`
      $this->createIndex(
          'idx-orders-user_id',
          'orders',
          'user_id'
      );

      // add foreign key for table `user`
      $this->addForeignKey(
          'fk-orders-user_id',
          'orders',
          'user_id',
          'user',
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
          'fk-orders-user_id',
          'orders'
      );

      // drops index for column `author_id`
      $this->dropIndex(
          'idx-orders-user_id',
          'orders'
      );

      $this->dropColumn('orders', 'user_id');
      $this->dropColumn('orders', 'month');
      $this->dropColumn('orders', 'day');
      $this->dropColumn('orders', 'time');
      $this->dropColumn('orders', 'created_at');
    }
}
