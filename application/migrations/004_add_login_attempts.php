<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_login_attempts extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'ip_address' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '15',
                                'null' => FALSE,                                
                        ),

                        'login' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE,                                
                        ),

                        'time' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'null' => TRUE,
                        ),

                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('login_attempts');
        }

        public function down()
        {
                $this->dbforge->drop_table('login_attempts');
        }
}
