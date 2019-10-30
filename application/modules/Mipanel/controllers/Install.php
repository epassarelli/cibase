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
                        'id' => 1,
                        'quienesfoto'       => '400x300.jpg',
                        'quienestitulo'     => 'QUIENES SOMOS',
                        'quienessubtitulo'  => 'Bajada de quienes somos',
                        'quienestexto'      => 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500',
                        'nosotrosfoto'      => '400x300.jpg',
                        'nosotrostitulo'    => 'NUESTRA MISION',
                        'nosotrossubtitulo' => 'Bajada de nuestra mision',
                        'nosotrostexto'     => 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500',
                        'visionfoto'        => '400x300.jpg',
                        'visiontitulo'      => 'NUESTRA VISION',
                        'visionsubtitulo'   => 'Bajada de nuestra vision',
                        'visiontexto'       => 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500'
                ];

        $this->Install_model->insertarNosotros($nosotros);        

        // Insertar los slides
        $slider = array(
                    array(
                            'id' => 1,
                            'imagen' => '2000x1333.jpg',
                            'titulo' => 'Titular Slide 1',
                            'descripcion' => 'Texto Subtitulo 1',
                            'estado' => 1
                    ),
                    array(
                            'id' => 2,
                            'imagen' => '2000x1333.jpg',
                            'titulo' => 'Titular Slide 2',
                            'descripcion' => 'Texto Subtitulo 2',
                            'estado' => 1
                    ),
                    array(
                            'id' => 3,
                            'imagen' => '2000x1333.jpg',
                            'titulo' => 'Titular Slide 3',
                            'descripcion' => 'Texto Subtitulo 3',
                            'estado' => 1
                    ),                    
        );

        $this->Install_model->insertarSlides($slider);

        // Insertar los servicios
        $servicios = array(
                    array(
                            'id' => 1,
                            'titulo' => 'SERVICIO 1',
                            'descripcion' => 'Ejemplo de texto bajada descriptivo de un servicio que prestamos como empresa o emprendimiento individual.',
                            'estado' => 1
                    ),
                    array(
                            'id' => 2,
                            'titulo' => 'SERVICIO 2',
                            'descripcion' => 'Ejemplo de texto bajada descriptivo de un servicio que prestamos como empresa o emprendimiento individual.',
                            'estado' => 1
                    ),
                    array(
                            'id' => 3,
                            'titulo' => 'SERVICIO 3',
                            'descripcion' => 'Ejemplo de texto bajada descriptivo de un servicio que prestamos como empresa o emprendimiento individual.',
                            'estado' => 1
                    ),                    
                    array(
                            'id' => 4,
                            'titulo' => 'SERVICIO 4',
                            'descripcion' => 'Ejemplo de texto bajada descriptivo de un servicio que prestamos como empresa o emprendimiento individual.',
                            'estado' => 1
                    ), 
                    array(
                            'id' => 5,
                            'titulo' => 'SERVICIO 5',
                            'descripcion' => 'Ejemplo de texto bajada descriptivo de un servicio que prestamos como empresa o emprendimiento individual.',
                            'estado' => 1
                    ), 
        );

        $this->Install_model->insertarServicios($servicios);


        $this->template->load('layout_back', 'mipanel_dashboard_view', $this->data);
    }


}
