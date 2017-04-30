<?php

use yii\db\Migration;

class m170430_203329_create_users extends Migration {

    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp() {

        $this->insert('{{%user}}', [
            'role_id' => 1,
            'username' => 'developer',
            'auth_key' => 'sMCCWHi28a9KvjSaA04qFXoWWgo46lwP',
            'password_hash' => '$2y$13$bjc5x/Nclng/uGazUbzfheXCQFByBR2XdtL6bDBJ0ZohVPlY4KOKW',
            'password_reset_token' => NULL,
            'email' => 'developer@appstore.com',
            'status' => 10,
            'created_at' => 1493585108,
            'updated_at' => 1493585108,
        ]);

        $this->insert('{{%user}}', [
            'role_id' => 2,
            'username' => 'owner',
            'auth_key' => 'uFV5Q9qJohDWYncoQHFrxseHXtKi_NAw',
            'password_hash' => '$2y$13$ORxopAX0uvH.BWsL37uwu.AEawObqeB9NPNRlwl6dwMz10ELEjD0e',
            'password_reset_token' => NULL,
            'email' => 'owner@appstore.com',
            'status' => 10,
            'created_at' => 1493585108,
            'updated_at' => 1493585108,
        ]);

        $this->insert('{{%user}}', [
            'role_id' => 1,
            'username' => 'admin',
            'auth_key' => 'pLz_H-CirXjZA06wMvstc6xXTgUyeFWQ',
            'password_hash' => '$2y$13$mWXFFmssulCjeXPaImUy3.HrkFinZlnfQ7cFBn/2YjxpyQxL1AlPK',
            'password_reset_token' => NULL,
            'email' => 'admin@appstore.com',
            'status' => 10,
            'created_at' => 1493585108,
            'updated_at' => 1493585108,
        ]);
    }

    public function safeDown() {
        
    }

}
