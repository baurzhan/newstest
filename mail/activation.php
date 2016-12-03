Уважаемый,  <?php echo $username;?> 
<br/><br/> 
Для активации Вашей учетной записи пройдите по этой ссылке 
<a href="<?php echo \yii\helpers\Url::to(['site/activate', 'code' => $code],true); ?>">Активировать</a>

