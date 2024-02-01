<?php 

namespace app\models;

use app\core\Model;
use app\core\Application;

class LoginForm extends Model
{
    public string $email;
    public string $password;

    public function rules(): array{
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED]
        ];
    }

    public function login(){
        $user = User::findOne(['email' => $this->email]);
        if(!$user){
            $this->addErrorForRule('email', 'User does not exists with this email');
        }
        Application::$app->login();
    }
}