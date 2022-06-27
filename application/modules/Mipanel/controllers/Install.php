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

         // Insertar un registro en users_group
         $usgroup = array(
                array(
                        'id' => 1,
                        'user_id' => 1,
                        'group_id' => 1
                ),
                array(
                        'id' => 2,
                        'user_id' => 1,
                        'group_id' => 2
                )
        );

        $this->Install_model->insertarUsuarioGrupo($usgroup);


        // Insertar un sitio
        $sitio = [
                        'sitio_id' => 1,
                        'sitio' => 'Sitio Empresa',
                        'url' => 'empresa',
                        'theme_id' => 1,
                        'landing' => 1,
                        'activo' => 1,
                        'razonsocial' => 'Empresa SA',
                        'direccion'    => 'Calle xx Nro 999',
                        'cpostal'    => '9999',
                        'localidad'    => 'Localidad',
                        'provincia'    => 'Buenos Aires',
                        'pais'    => 'Argentina',
                        'urlGmap'    => 'mapa',
                        'telefono'    => '4444-4444',
                        'correo'    => 'info@empresa.com',
                        'facebook'    => 'https://www.facebook.com',
                        'instagram'    => '@empresa',
                        'logo'    => 'logo.jpg',
                        'icon'    => 'logo.ico',
                        'qr'    => 'qr.jpg',
                        'color1'    => '#b2acac',
                        'color2'    => '#201e1e',
                        'color3'    => '#eb2c2c'
                ];

        $this->Install_model->insertarSitio($sitio);

        // Insertar registros para themes
        $theme = [
                        ['theme_id' => 1,
                        'theme'     => 'AVADA',
                        'screenshot'  => ' ', ],
                        ['theme_id' => 2,
                        'theme'     => 'PORTO',
                        'screenshot'  => ' ', ],
                ];

        $this->Install_model->insertarTema($theme);        

        // Insertar un registro en users_sitio
         $usSitio = array(
                // array(
                        'id' => 1,
                        'user_id' => 1,
                        'sitio_id' => 1
                // ),
        );

        $this->Install_model->insertarUsuarioSitio($usSitio);

        // Insertar parametros
        $parametros = array(
                    array(
                            'id' => 1,
                            'descripcion' => 'Utiliza Carrito de Compra',
                            'default' => 'N',
                            'detalle' => 'Utiliza E-Comerce',
                            'relacionados' => '1'
                    ),
                    array(
                                'id' => 2,
                                'descripcion' => 'Necesita Registro para efectuar una compra',
                                'default' => 'S',
                                'detalle' => 'Si el valor del campo es S, debera registrarse para poder comprar, si el valor es N, podra comprar por e-commerce sin necesidad de registrarse',
                                'relacionados' => '1'
                        ),
                    array(
                                'id' => 3,
                                'descripcion' => 'Costo de entrega por Delivery',
                                'default' => '100',
                                'detalle' => 'Costo de los envios por las compras de e-commerce',
                                'relacionados' => '1'
                        ),
                    array(
                                'id' => 4,
                                'descripcion' => 'Efectua Delivery',
                                'default' => 'N',
                                'detalle' => 'Realiza envíos a domicilio',
                                'relacionados' => '3'
                        ),
                     array(
                                'id' => 5,
                                'descripcion' => 'Usa pasarela de pago',
                                'default' => 'N',
                                'detalle' => 'Cobra a través del ecommerce',
                                'relacionados' => '1,3'
                        ),
                        array(
                                'id' => 6,
                                'descripcion' => 'Es multiidioma',
                                'default' => 'N',
                                'detalle' => 'Si el sitio es multiidioma debe completar en cada pagina el idioma correspondiente',
                                'relacionados' => '1,3'
                        ),
                );
        $this->Install_model->insertarParam($parametros);

        // Insertar parametros por sitio es el que falta
       
        $this->template->load('layout_back', 'mipanel_dashboard_view', $this->data);
    }


}
