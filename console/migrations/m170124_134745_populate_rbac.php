<?php

use yii\db\Migration;

class m170124_134745_populate_rbac extends Migration {

    public function safeUp() {

        //Insert roles

        $this->insert('{{%role}}', [
            'role' => 'developer',
            'description' => 'Developer of application , can have debugging features on'
        ]);

        $this->insert('{{%role}}', [
            'role' => 'owner',
            'description' => 'Owner of application, will have all options, delete , update , etc'
        ]);

        $this->insert('{{%role}}', [
            'role' => 'admin',
            'description' => 'This is similar to content manage, can add,view date, Owner will view and finalize. '
        ]);

        /*
          //Insert few permissions for user

          $this->insert('{{%permission}}', [
          'role_id' => '1',
          'resource_id' => '1100',
          'view' => TRUE,
          ]);

          $this->insert('{{%permission}}', [
          'role' => 'user',
          'resource_id' => '1101',
          'view' => TRUE,
          ]);

          //Insert few permissions for admin

          $this->insert('{{%permission}}', [
          'role' => 'admin',
          'resource_id' => '1100',
          'view' => TRUE,
          'create' => TRUE,
          ]);

          $this->insert('{{%permission}}', [
          'role' => 'admin',
          'resource_id' => '1101',
          'view' => TRUE,
          'create' => TRUE,
          ]);
         * 
         */
    }

    public function down() {

        $this->delete('{{%permission}}');
        $this->delete('{{%resource}}');
        $this->delete('{{%role}}');
        return TRUE;
    }

}
