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
                        'quienesfoto' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'quienestitulo' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '150',
                                'null' => TRUE,
                        ),
                        'quienessubtitulo' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '150',
                                'null' => TRUE,
                        ),
                        'quienestexto' => array(
                                'type' => 'TEXT',
                                'constraint' => '',
                                'null' => TRUE,
                        ),
                        'nosotrosfoto' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'nosotrostitulo' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '150',
                                'null' => TRUE,
                        ),
                        'nosotrossubtitulo' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '150',
                                'null' => TRUE,
                        ),
                        'nosotrostexto' => array(
                                'type' => 'TEXT',
                                'constraint' => '',
                                'null' => TRUE,
                        ),
                        'visionfoto' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'visiontitulo' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '150',
                                'null' => TRUE,
                        ),
                        'visionsubtitulo' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '150',
                                'null' => TRUE,
                        ),
                        'visiontexto' => array(
                                'type' => 'TEXT',
                                'constraint' => '',
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