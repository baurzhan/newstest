<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m161202_092524_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string(50),
            'password' => $this->string(50),
            'email' => $this->string(100),
            'token' => $this->string(),
            'active' => $this->boolean(),
            'role' => $this->integer()
        ]);
        $this->createIndex('ix_username', 'user', 'username',true);
        $this->insert('user', ['username' => 'admin', 'password' => md5('admin'),'email' => 'baurzhan@gmail.com', 'active' => TRUE, 'role' => 2]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user');
    }
}
