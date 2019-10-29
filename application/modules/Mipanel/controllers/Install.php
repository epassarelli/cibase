<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Install extends MX_Controller {

    var $data;

    function __construct() {
        parent::__construct();
        
        $this->load->library('migration');

        if ($this->migration->current() === FALSE)
        {
            show_error($this->migration->error_string());
        } 

        $this->load->model('Install_model');
    }

	public function index() {

        // Correr las migraciones

        // Insertar los grupos
        $grupos = array(
                array(
                        'id' => 1,
                        'name' => 'admin',
                        'description' => 'Super Administrador'
                ),
                array(
                        'id' => 2,
                        'name' => 'cliente',
                        'description' => 'Cliente del sitio'
                )
        );

        $this->Install_model->insertarGrupos($grupos);




        // Insertar user Admin + SAdmin
        $usuarios = array(
                          'id' => 1,  
                          'ip_address' => '127.0.0.1',  
                          'username' => 'admin',  
                          'password' => '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36',  
                          'salt' => '',  
                          'email' => 'admin@admin.com',  
                          'activation_code' => '',  
                          'forgotten_password_code' => NULL,  
                          'created_on' => '1268889823',  
                          'last_login' => '1268889823',  
                          'active' => '1',  
                          'first_name' => 'Admin',  
                          'last_name' => 'Admin',  
                          'company' => 'ADMIN',  
                          'phone' => '0'
                            );

        $this->Install_model->insertarUsuarios($usuarios);

        // Insertar un registro para empresa
        $empresa = [
                        'id' => 1,
                        'razonsocial' => 'Bondrolfio S.A.',
                        'direcion'    => '9 de Julio 488',
                        'cpostal'    => '1653',
                        'localidad'    => 'San Martin',
                        'provincia'    => 'Buenos Aires',
                        'pais'    => 'Argentina',
                        'cordenadas'    => '9 de Julio 488',
                        'telefono'    => '4567-8912',
                        'correo'    => 'bondrolfiosa@bondrolfio.com',
                        'facebook'    => 'https://www.facebook.com',
                        'instagram'    => '@bondrolfioSA'
                ];

        $this->Install_model->insertarEmpresa($empresa);

        // Insertar un registro para nosotros
        $nosotros = [
                        'username' => 'darth',
                        'email'    => 'darth@theempire.com'
                ];

        $this->Install_model->insertarNosotros($nosotros);        

        // Insertar los slides
        $slider = array(
                    array(
                            'title' => 'My title',
                            'name' => 'My Name',
                            'date' => 'My date'
                    ),
                    array(
                            'title' => 'Another title',
                            'name' => 'Another Name',
                            'date' => 'Another date'
                    )
        );

        $this->Install_model->insertarSlides($slider);

        // Insertar los servicios
        $servicios = [
                        'username' => 'darth',
                        'email'    => 'darth@theempire.com'
                ];

        $this->Install_model->insertarServicios($servicios);


        $this->template->load('layout_back', 'mipanel_dashboard_view', $this->data);
    }


}
