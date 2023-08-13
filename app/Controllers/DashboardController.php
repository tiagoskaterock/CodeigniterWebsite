<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    function index(): string {  
        $title = "Dashboard";      
        return view('Dashboard/index', compact('title'));
    }

    private function sendTestEmail() {
        $email = \Config\Services::email();
        $email->setTo('tiagolemespalhano@gmail.com');
        $email->setSubject('Que saudade de você');
        $email->setMessage("Vamos sair amanhã a noite? Quero comer pizza =) ");
        if($email->send()) {
            echo 'Email send';
        }
        else {
            echo 'Erro ao enviar o email: ' . $email->printDebugger();
        }
    }
}
