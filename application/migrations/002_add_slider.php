<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_slider extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'titulo' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'descripcion' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '150',
                                'null' => TRUE,
                        ),
                        'estado' => array(
                                'type' => 'INT',
                                'constraint' => 1,
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