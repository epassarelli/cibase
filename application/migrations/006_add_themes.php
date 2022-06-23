<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_themes extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'theme_id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'theme' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '30',
                                'null' => TRUE,
                        ),
                        'screenshot' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                'null' => FALSE,
                        ),
                ));
                $this->dbforge->add_key('theme_id', TRUE);
                $this->dbforge->create_table('themes');
        }

        public function down()
        {
                $this->dbforge->drop_table('themes');
        }
}