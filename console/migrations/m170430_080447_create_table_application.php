<?php

use yii\db\Migration;

class m170430_080447_create_table_application extends Migration {

    public function safeUp() {
        $this->createTable('{{%application}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(50)->notNull(),
            'description' => $this->text(),
            'playstore_url' => $this->text()->notNull(),
            'version' => $this->float()->defaultValue(1.0),
            'user_id' => $this->integer()->notNull(),
            'special' => $this->boolean()->defaultValue(FALSE),
            'featured' => $this->boolean()->defaultValue(FALSE),
            'updated_by' => $this->integer()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('fk_application_user_id', '{{%application}}', 'user_id', '{{%user}}', 'id', 'RESTRICT', 'CASCADE');

        $this->createTable('{{%application_category}}', [
            'application_id' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull(),
        ]);
        $this->addPrimaryKey('pk_application_category_pkey', 'application_category', ['application_id', 'category_id']);

        $this->addForeignKey('fk_application_category_application_id', '{{%application_category}}', 'application_id', '{{%application}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk_application_category_category_id', '{{%application_category}}', 'category_id', '{{%category}}', 'id', 'RESTRICT', 'CASCADE');
    }

    public function safeDown() {

        $this->dropForeignKey('fk_application_user_id', 'application');
        $this->dropForeignKey('fk_application_category_application_id', 'application_category');
        $this->dropForeignKey('fk_application_category_category_id', 'application_category');
        $this->dropTable('{{%application_category}}');
        $this->dropTable('{{%application}}');
    }

}
