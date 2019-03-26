<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'inputOptions' => ['class' => 'col-sm-4 form-control'],
            'horizontalCssClasses' => ['error' => 'col-sm-6 col-form-label'],
            'template' => "{label}\n{input}\n{error}\n{hint}",
            'checkHorizontalTemplate' => "<div class=\"offset-sm-2\">\n<div class=\"form-check\">\n{input}\n{label}\n{error}\n{hint}\n</div>\n</div>",
        ],
    ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'rememberMe', [
            'labelOptions' => ['class' => 'col-sm-12'],
        ])->checkbox() ?>

        <div class="form-group">
            <div class="col-sm-offset-1 col-sm-11">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

    <div class="col-xl-offset-1" style="color:#999;">
        You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
        To modify the username/password, please check out the code <code>app\models\User::$users</code>.
    </div>
</div>
