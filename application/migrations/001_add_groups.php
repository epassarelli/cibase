<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_groups extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'MEDIUMINT',
                                'constraint' => 8,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '20',
                                'null' => FALSE,
                        ),
                        'description' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE,
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('groups');
        }

        public function down()
        {
                $this->dbforge->drop_table('groups');
        }
}