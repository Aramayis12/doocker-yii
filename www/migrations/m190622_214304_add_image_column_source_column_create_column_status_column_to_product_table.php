<?php

use yii\db\Migration;

/**
 * Handles adding image_column_source_column_create_column_status to table `product`.
 */
class m190622_214304_add_image_column_source_column_create_column_status_column_to_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->addColumn('product', 'expenses_price', $this->integer());
      $this->addColumn('product', 'original_price', $this->integer());
      $this->addColumn('product', 'sales_qty', $this->integer());
      $this->addColumn('product', 'views_qty', $this->integer());
      $this->addColumn('product', 'image', $this->string());
      $this->addColumn('product', 'source', $this->string());
      $this->addColumn('product', 'date_created', $this->string());
      $this->addColumn('product', 'date_updated', $this->string());
      $this->addColumn('product', 'status', $this->integer()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
      $this->dropColumn('product', 'expenses_price');
      $this->dropColumn('product', 'original_price');
      $this->dropColumn('product', 'sales_qty');
      $this->dropColumn('product', 'views_qty');
      $this->dropColumn('product', 'image');
      $this->dropColumn('product', 'source');
      $this->dropColumn('product', 'date_created');
      $this->dropColumn('product', 'date_updated');
      $this->dropColumn('product', 'status');
    }
}
