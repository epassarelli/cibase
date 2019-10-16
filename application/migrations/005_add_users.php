<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_users extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'ip_address' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '45',
                                'null' => FALSE,                                
                        ),
                        'username' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,                                
                        ),
                        'password' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                'null' => FALSE,                                
                        ),                        
                       'salt' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                'null' => TRUE,                                
                        ),
                       'email' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE,                                
                        ),
                        'activation_code' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '40',
                                'null' => TRUE,                                
                        ),
                        'forgotten_password_code' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '40',
                                'null' => TRUE,                                
                        ),
                        'forgotten_password_time' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'null' => TRUE,                                
                        ),
                        'remember_code' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '40',
                                'null' => TRUE,                                
                        ),
                        'created_on' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'null' => FALSE,
                        ),
                        'last_login' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'null' => FALSE,
                        ),
                        'active' => array(
                                'type' => 'TINYINT',
                                'constraint' => 1,
                                'unsigned' => TRUE,
                                'null' => TRUE,
                        ),
                        'first_name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '50',
                                'null' => TRUE,
                        ),
                        'last_name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '50',
                                'null' => TRUE,
                        ),
                        'company' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,
                        ),
                        'phone' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '20',
                                'null' => TRUE,
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('users');
        }

        public function down()
        {
                $this->dbforge->drop_table('users');
        }
}