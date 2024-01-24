<?php 

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\User;

class AuthController extends Controller
{
    public function login() {
        $this->setLayout('auth');
        return $this->render('login');
    }

    public function register(Request $request) {
        $User = new User();
        if ($request->isPost()){
            $User->loadData($request->getBody());
            if($User->validate() && $User->register()) {
                return 'Success';
            }
            return $this->render('register', ['model' => $User]);
        }
        $this->setLayout('auth');
        return $this->render('register', ['model' => $User]);
    }
}