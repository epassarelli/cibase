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
                        'razonsocial' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '200',
                        ),
                        'direcion' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '200',
                        ),
                        'cpostal' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '10',
                                'null' => TRUE,
                        ),
                        'localidad' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '150',
                                'null' => TRUE,
                        ),
                        'provincia' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '150',
                                'null' => TRUE,
                        ),
                        'pais' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '150',
                                'null' => TRUE,
                        ),
                        'cordenadas' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,
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
                        'facebook' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '150',
                                'null' => TRUE,
                        ),
                        'instagram' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '150',
                                'null' => TRUE,
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('empresa');
        }

        public function down()
        {
                $this->dbforge->drop_table('empresa');
        }
}