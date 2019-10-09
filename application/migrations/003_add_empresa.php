<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_empresa extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'logo' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'direcion' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'telefono' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '150',
                                'null' => TRUE,
                        ),
                        'correo' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '150',
                                'null' => TRUE,
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('slider');
        }

        public function down()
        {
                $this->dbforge->drop_table('slider');
        }
}