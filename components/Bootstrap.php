<?php
namespace app\components;
use yii\base\BootstrapInterface;
use app\models\User;
use yii\base\Event;
use yii\db\ActiveRecord;
use Yii;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Bootstrap implements BootstrapInterface{
    
    public function bootstrap($app) {
        Event::on(User::className(), ActiveRecord::EVENT_AFTER_INSERT, function ($event) {
            Yii::trace(get_class($event->sender) . ' is inserted');
            $this->sendActivationCode($event->sender);
        });
    }

    
    /**
     * Sends an email with activation code to the specified user.
     * @param User $user 
     * @return bool 
     */
    public function sendActivationCode(User $user)
    {
        return Yii::$app->mailer->compose('activation',['username' => $user->username,'code' => $user->token])
            ->setTo($user->email)
            ->setCharset('utf-8')
            ->setFrom([Yii::$app->params['adminEmail'] => 'admin'])
            ->setSubject(Yii::$app->name)
            ->send() > 0;
    }
}


