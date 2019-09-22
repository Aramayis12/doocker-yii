<?php

use yii\db\Migration;

/**
 * Handles the creation of table `seller`.
 */
class m190409_054400_create_seller_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('seller', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'phone' => $this->string(),
            'address' => $this->string(),
            'description' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('seller');
    }
}
