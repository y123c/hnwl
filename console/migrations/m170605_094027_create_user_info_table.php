<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_info`.
 */
class m170605_094027_create_user_info_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user_info', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11)->notNull()->unique(),
            'full_name' => $this->string(20),
            'birthday' => $this->date(),
            'gender' => $this->smallInteger(6),
            'company' => $this->string(100),
            'profession' => $this->string(40),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user_info');
    }
}
