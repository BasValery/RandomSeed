<?php

use yii\db\Migration;

/**
 * Handles the creation of table `sequence`.
 */
class m190218_122208_create_sequence_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('sequence', [
            'id' => $this->primaryKey(),
            'value' => $this->text(), 
            'ip' => $this->string(),
            'request_time' => $this->datetime()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('sequence');
    }
}
