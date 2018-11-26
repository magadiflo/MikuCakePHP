<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $components = array(
        'Session',
        'Auth' => array(
            //En este caso apenas nos logueemos nos redireccionará a la lista de usuarios
            'loginRedirect' => array(
                'controller' => 'platillos',
                'action' => 'index'
            ),
            //A donde nos redigirirá una vez salga el usuario del sistema
            'logoutRedirect' => array(
                'controller' => 'users',
                'action' => 'login'
            ),
            //Cuando no está autorizado a realizar alguna acción, redirecciona.
            'unauthorizedRedirect' => array(
                'controller' => 'platillos',
                'action' => 'index',
                'prefix' => false
            ),
            //Indicamos el tipo de encriptación que usamos
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish'
                )
            ),
            //Indicamos que las autorizaciones se harán desde el controlador
            'authorize' => array('Controller'),
             //No permitirá mostrar el mensaje de error al autenticarse ya que eso lo
             //mostraremos de una vista especial
            'authError' => false
        )
    );
    //Antes de que el usuario se loguee, es decir
    //se puedene establecer acceso del usuario sin
    //necesidad de que esté logueado
    public function beforeFilter(){
        $this->Auth->allow('login', 'logout');
        //Definimos una variable 'current_user', el cual
        //mandará los datos del usuario actual.
        //Podrá ser accedido desde cualquier vista de los controladores de la aplicación
        $this->set('current_user', $this->Auth->user());
        /*Pero si se quiere acceder a los datos del usuario actualmente
        logueado desde las clases controladores se puede usar:
        $this->Auth->user('id'), donde 'id' puede ser el nombre del campo que 
        se quiere recuperar
        */
    }
    // Se replicará en todos los controladores de la aplicación
    public function isAuthorized($user){
        //Si es de tipo admin, que acceda a cualquier parte de la aplicación.
        if(isset($user['role']) && $user['role'] === 'admin'){
            return true;
        }
        return false;
    }
}
