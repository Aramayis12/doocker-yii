<?php

use yii\db\Migration;

/**
 * Handles the creation of table `congratulation_messages`.
 */
class m190418_044044_create_congratulation_messages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('congratulation_messages', [
            'id' => $this->primaryKey(),
            'celebration' => $this->string(),
            'message' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('congratulation_messages');
    }
}
