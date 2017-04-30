<?php

use yii\db\Migration;

class m170430_210903_populate_categories_apps extends Migration {

    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp() {

        $user_id = 2;

        $this->insert('{{%category}}', [
            'title' => 'Games',
            'description' => 'Contains all games related categoried',
            'show_in_menu' => TRUE,
            'created_at' => 1493585108,
            'updated_at' => 1493585108,
        ]);

        $category_id = $this->db->getLastInsertID();

        $this->insert('{{%application}}', [
            'title' => 'Sub way surfers',
            'description' => 'This is very good game',
            'playstore_url' => 'http://play.google.com',
            'user_id' => $user_id,
            'created_at' => 1493585108,
            'updated_at' => 1493585108,
        ]);

        $app_id = $this->db->getLastInsertID();

        $this->insert('{{%application_category}}', [
            'application_id' => $app_id,
            'category_id' => $category_id,
        ]);

        $this->insert('{{%application}}', [
            'title' => 'Candy Crush',
            'description' => 'Here you crush candies',
            'playstore_url' => 'http://play.google.com',
            'user_id' => $user_id,
            'created_at' => 1493585108,
            'updated_at' => 1493585108,
        ]);

        $app_id = $this->db->getLastInsertID();

        $this->insert('{{%application_category}}', [
            'application_id' => $app_id,
            'category_id' => $category_id,
        ]);

        //new category
        $this->insert('{{%category}}', [
            'title' => 'Sports',
            'description' => 'Contains all sports apps that provide you sports info.',
            'show_in_menu' => TRUE,
            'created_at' => 1493585108,
            'updated_at' => 1493585108,
        ]);

        $category_id = $this->db->getLastInsertID();

        $this->insert('{{%application}}', [
            'title' => 'Ten Sports',
            'description' => ' Here you watch ten sports live.',
            'playstore_url' => 'http://play.google.com',
            'user_id' => $user_id,
            'created_at' => 1493585108,
            'updated_at' => 1493585108,
        ]);

        $app_id = $this->db->getLastInsertID();

        $this->insert('{{%application_category}}', [
            'application_id' => $app_id,
            'category_id' => $category_id,
        ]);



        $this->insert('{{%application}}', [
            'title' => 'Espncricinfo',
            'description' => ' Here you can check all live cricket matches around the globe.',
            'playstore_url' => 'http://play.google.com',
            'user_id' => $user_id,
            'created_at' => 1493585108,
            'updated_at' => 1493585108,
        ]);

        $app_id = $this->db->getLastInsertID();

        $this->insert('{{%application_category}}', [
            'application_id' => $app_id,
            'category_id' => $category_id,
        ]);


        //new category
        $this->insert('{{%category}}', [
            'title' => 'Health',
            'description' => 'Contains all health related apps.',
            'show_in_menu' => TRUE,
            'created_at' => 1493585108,
            'updated_at' => 1493585108,
        ]);


        $this->insert('{{%application}}', [
            'title' => 'Doctors online',
            'description' => ' Many doctors available to discuss you problems here.',
            'playstore_url' => 'http://play.google.com',
            'user_id' => $user_id,
            'created_at' => 1493585108,
            'updated_at' => 1493585108,
        ]);

        $app_id = $this->db->getLastInsertID();

        $this->insert('{{%application_category}}', [
            'application_id' => $app_id,
            'category_id' => $category_id,
        ]);


        $this->insert('{{%application}}', [
            'title' => 'Fitnuss club ',
            'description' => ' See each and everything related to fitness.',
            'playstore_url' => 'http://play.google.com',
            'user_id' => $user_id,
            'created_at' => 1493585108,
            'updated_at' => 1493585108,
        ]);

        $app_id = $this->db->getLastInsertID();

        $this->insert('{{%application_category}}', [
            'application_id' => $app_id,
            'category_id' => $category_id,
        ]);
    }

    public function safeDown() {
        
    }

}
