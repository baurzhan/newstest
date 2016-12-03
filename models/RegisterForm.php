<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class RegisterForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $confirmPassword;
    public $verifyCode;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['username', 'email', 'password', 'confirmPassword'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            ['username', 'unique', 'targetClass' => 'app\models\User', 'message' => 'Данный логин уже занят'],
            // password and confirmPassword must be equal
            ['confirmPassword','compare', 'compareAttribute' => 'password'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Проверочный код',
            'username' => 'Логин',
            'password' => 'Пароль',
            'password' => 'Подтверждение пароля',
            'email' => 'E-mail'
        ];
    }

    
    
    public static function generateCode($length = 16) {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array(); 
        $alphaLength = strlen($alphabet) - 1; 
        for ($i = 0; $i < $length; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); 
    }
}
