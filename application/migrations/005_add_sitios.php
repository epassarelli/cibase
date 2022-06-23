<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_sitios extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'sitio_id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'sitio' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                'null' => TRUE,
                        ),
                        'url' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,
                        ),
                        'theme_id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'null' => TRUE,
                        ),
                        'landing' => array(
                                'type' => 'TINYINT',
                                'constraint' => 1,
                        ),
                        'activo' => array(
                                'type' => 'TINYINT',
                                'constraint' => 1,
                                'unsigned' => TRUE,
                                'null' => TRUE,
                        ),
                        'razonsocial' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '200',
                                'null' => TRUE,
                        ),
                        'direccion' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '200',
                                'null' => TRUE,
                        ),
                        'cpostal' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '10',
                                'null' => FALSE,
                        ),
                        'localidad' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '150',
                                'null' => FALSE,
                        ),
                        'provincia' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '150',
                                'null' => FALSE,
                        ),
                        'pais' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '150',
                                'null' => FALSE,
                        ),
                        'urlGMap' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '150',
                                'null' => FALSE,
                        ),
                        'telefono' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '150',
                                'null' => FALSE,
                        ),
                        'correo' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '150',
                                'null' => FALSE,
                        ),
                        'facebook' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '150',
                                'null' => FALSE,
                        ),
                        'instagram' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '150',
                                'null' => FALSE,
                        ),
                        'logo' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                'null' => FALSE,
                        ),
                        'icon' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                'null' => FALSE,
                        ),
                        'qr' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                'null' => FALSE,
                        ),
                        'color1' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '7',
                                'null' => FALSE,
                        ),
                        'color2' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '7',
                                'null' => FALSE,
                        ),
                        'color3' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '7',
                                'null' => FALSE,
                        ),
                ));
                $this->dbforge->add_key('sitio_id', TRUE);
                $this->dbforge->create_table('sitios');
        }

        public function down()
        {
                $this->dbforge->drop_table('sitios');
        }
}