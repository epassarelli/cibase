<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_parametros extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'descripcion' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '200',
                        ),
                        'default' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '200',
                        ),
                        'detalle' => array(
                                'type' => 'TEXT',
                        ),
                        'relacionados' => array(
                                'type' => 'TEXT',
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('parametros');
        }

        public function down()
        {
                $this->dbforge->drop_table('parametros');
        }
}