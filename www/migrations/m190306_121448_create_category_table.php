<?php

use yii\db\Migration;

/**
 * Handles the creation of table `category`.
 */
class m190306_121448_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'categoryName' => $this->string(),
            'parentCategory' => $this->integer()->defaultValue(0),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('category');
    }
}
