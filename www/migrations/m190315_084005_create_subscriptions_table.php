<?php

use yii\db\Migration;

/**
 * Handles the creation of table `subscriptions`.
 */
class m190315_084005_create_subscriptions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('subscriptions', [
            'id' => $this->primaryKey(),
            'email' => $this->string()->notNull()->unique(),
            'created_at' => $this->timestamp()->null(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('subscriptions');
    }
}
