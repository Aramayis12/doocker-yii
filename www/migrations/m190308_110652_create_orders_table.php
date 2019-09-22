<?php

use yii\db\Migration;

/**
 * Handles the creation of table `orders`.
 */
class m190308_110652_create_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('orders', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string(),
            'last_name' => $this->string(),
            'company' => $this->string(),
            'address_1' => $this->string(),
            'address_2' => $this->string(),
            'city' => $this->string(),
            'zip' => $this->string(),
            'phone' => $this->string(),
            'email' => $this->string(),
            'interests' => $this->string(),

            'recipient_first_name' => $this->string(),
            'recipient_last_name' => $this->string(),
            'recipient_company' => $this->string(),
            'recipient_address_1' => $this->string(),
            'recipient_address_2' => $this->string(),
            'recipient_city' => $this->string(),
            'recipient_zip' => $this->string(),
            'recipient_interests' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('orders');
    }
}
