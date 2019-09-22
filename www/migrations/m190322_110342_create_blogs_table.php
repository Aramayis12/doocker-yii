<?php

use yii\db\Migration;

/**
 * Handles the creation of table `blogs`.
 */
class m190322_110342_create_blogs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('blogs', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'public_date' => $this->string(),
            'text' => $this->text(),
            'slug' => $this->string()->notNull()->unique(),
            'cover_image' => $this->string(),
            'created_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('blogs');
    }
}
