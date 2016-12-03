<?php if (Yii::$app->session->hasFlash('userActivated')): ?>
        <div class="alert alert-success">
            Ваша учетная запись успешно активирована. Через 5 секунд Вы будете перенаправлены на главную страницу. 
        </div>
        <?php $this->registerJs('window.setTimeout(function(){window.location.href='/';},5000);');?>
<?php else: ?>
        <p class="alert alert-warning">
            Неверный код активации <?php echo $code;?>
        </p>
<?php endif;