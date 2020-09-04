<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_users_groups extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
                'id' => array(
                        'type' => 'INT',
                        'constraint' => 5,
                        'unsigned' => TRUE,
                        'auto_increment' => TRUE
                ),
                'user_id' => array(
                        'type' => 'INT',
                        'constraint' => 5,
                        'unsigned' => TRUE,
                        'null' => TRUE,                                
                ),
                'group_id' => array(
                        'type' => 'MEDIUMINT',
                        'constraint' => 8,
                        'unsigned' => TRUE,
                        'null' => FALSE,
                ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('users_groups');
    }

    public function down()
    {
        $this->dbforge->drop_table('users_groups');
    }
}