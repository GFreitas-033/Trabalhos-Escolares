<?php

/**
 * Description of HomeController
 * Esta classe é chamada por default quando não é digitado um controller
 *   específico na URL. 
 * O método index() será chamado por default e simplesmente renderiza a
 *   view home/index através do método render() da classe Mãe Controller.php 
 */

namespace App\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $this->render('home/index');
    }
}

