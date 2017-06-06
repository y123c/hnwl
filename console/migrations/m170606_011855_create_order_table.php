<?php

use yii\db\Migration;

/**
 * Handles the creation of table `order`.
 */
class m170606_011855_create_order_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('cart', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'num' => $this->integer()->defaultValue(0),
            'price' => $this->decimal(10,2)->defaultValue(0),
            'money' => $this->decimal(10,2)->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);
        
        $this->createTable('order', [
            'id' => $this->primaryKey(),
            'serial_id' => $this->string(100)->notNull(),
            'total_money' => $this->decimal(10,2)->defaultValue(0),
            'pay_status' => $this->smallInteger()->defaultValue(0),
            'paid_money' => $this->decimal(10,2)->defaultValue(0),
            'status' => $this->smallInteger()->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);
        
        $this->createTable('order_product', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'num' => $this->integer()->defaultValue(0)
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('cart');
        $this->dropTable('order');
        $this->dropTable('order_product');
    }
}
