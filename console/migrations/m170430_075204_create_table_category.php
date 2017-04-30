<?php

use yii\db\Migration;

class m170430_075204_create_table_category extends Migration {

    public function safeUp() {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'parent' => $this->integer()->defaultValue(0),
            'title' => $this->string(50)->notNull(),
            'description' => $this->text(),
            'show_in_menu' => $this->boolean()->defaultValue(FALSE),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        //$this->addForeignKey('fk_category_parent', '{{%category}}', 'parent', '{{%category}}', 'id', 'RESTRICT', 'CASCADE');
    }

    public function safeDown() {
        $this->dropTable('{{%category}}');
    }

}
