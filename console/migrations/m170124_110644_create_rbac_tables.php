<?php

use yii\db\Migration;

class m170124_110644_create_rbac_tables extends Migration {

    public function safeUp() {

        $this->createTable('{{%resource}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(50)->notNull(),
        ]);

        $this->createTable('{{%role}}', [
            'id' => $this->primaryKey(),
            'role' => $this->string(15)->unique(),
            'description' => $this->text(),
        ]);

        //Add foreighn key to user table for role. 
        $this->addForeignKey('fk_user_role_id', '{{%user}}', 'role_id', '{{%role}}', 'id', 'RESTRICT', 'CASCADE');

        $this->createTable('{{%permission}}', [
            'id' => $this->primaryKey(),
            'resource_id' => $this->integer()->notNull(),
            'role_id' => $this->integer()->notNull(),
            'view' => $this->boolean()->defaultValue(FALSE),
            'create' => $this->boolean()->defaultValue(FALSE),
            'update' => $this->boolean()->defaultValue(FALSE),
            'delete' => $this->boolean()->defaultValue(FALSE),
        ]);

        $this->addForeignKey('fk_permission_resource_id', '{{%permission}}', 'resource_id', '{{%resource}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk_permission_role_id', '{{%permission}}', 'role_id', '{{%role}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function safeDown() {
        $this->dropForeignKey('fk_permission_resource_id', 'permission');
        $this->dropForeignKey('fk_permission_role_id', 'permission');
        $this->dropTable('{{%resource}}');
        $this->dropTable('{{%role}}');
        $this->dropTable('{{%permission}}');
        return TRUE;
    }

}
