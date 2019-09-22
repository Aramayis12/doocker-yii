<?php

use yii\db\Migration;

/**
 * Class m190706_064754_add_column_slug_to_product_table
 */
class m190706_064754_add_column_slug_to_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('product', 'slug', $this->string()->notNull()->unique());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('product', 'slug');
    }
}
