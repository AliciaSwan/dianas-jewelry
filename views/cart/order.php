<?php
use yii\widgets\ActiveForm;
?>

<h2>place your order</h2>
<? $form = ActiveForm::begin();
$form->field($order, 'name');
$form->field($order, 'phone');
$form->field($order, 'email');
$form->field($order, 'address');
ActiveForm::end();