<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_nosotros extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'imagen' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'titulo' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'subtitulo' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'descripcion' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '150'
                        ),
                        'estado' => array(
                                'type' => 'INT',
                                'constraint' => 1,
                                'null' => TRUE,
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('nosotros');
        }

        public function down()
        {
                $this->dbforge->drop_table('nosotros');
        }
}