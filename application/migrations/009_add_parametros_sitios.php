<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_parametros_sitios extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'parametro_id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                        ),
                        'sitio_id' => array(
                                'type' => 'INT',
                                'constraint' => 11,                       
                        ),
                        'valor' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '200',
                                'null' => FALSE,                                
                        ),                        
                ));
                $this->dbforge->add_key('parametro_id', TRUE);
                $this->dbforge->create_table('parametros_sitios');
        }

        public function down()
        {
                $this->dbforge->drop_table('parametros_sitios');
        }
}