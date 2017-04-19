<?php

/*
 * This file is part of the Dektrium project
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var dektrium\user\models\User $user
 * @var dektrium\user\models\Profile $profile
 */
?>

<?php $this->beginContent('@dektrium/user/views/admin/update.php', ['user' => $user]) ?>

<?php $form = ActiveForm::begin([
    'layout' => 'horizontal',
    'enableAjaxValidation' => true,
    'enableClientValidation' => false,
    'fieldConfig' => [
        'horizontalCssClasses' => [
            'wrapper' => 'col-sm-9',
        ],
    ],
]); ?>

<?= $form->field($profile, 'name')->textInput(['placeholder' => 'Name']) ?>
<?= $form->field(new \common\models\UploadForm(), 'imageFile')->fileInput() ?> 
<div class="col-sm-9 col-sm-offset-3">
    <div class="form-group">
<?php
if($profile->user_id > 0){
    ?>
        <img src="<?= $profile->profilePicSrc; ?>" width="100"/>
    <?php
}
?></div>
</div>
<?= $form->field($profile, 'public_email')->textInput(['placeholder' => 'Email Address']) ?>
<?php //$form->field($profile, 'website') ?>
<?php //$form->field($profile, 'location')->textInput(['placeholder' => 'Location']) ?>
<?php //$form->field($profile, 'gravatar_email') ?>
<?= $form->field($profile, 'bio')->textarea(['placeholder' => 'About Member']) ?>
<?php $membershiptypes = \common\models\MembershipTypes::find()->where('status = :status', [':status' => 1 ])->all(); ?>
<?= $form->field($profile, 'designation')->dropDownList(\yii\helpers\ArrayHelper::map($membershiptypes,'id','name'), ['prompt'=>"Select Subscription Type"]) ?>
<?= $form->field($profile, 'profile')->textInput(['placeholder' => 'Profile Name (eg. Additonal Advocate General, Haryana)']) ?>
<?= $form->field($profile, 'enrollment_number')->textInput(['placeholder' => 'Bar Council Enrollment Number']) ?>
<?= $form->field($profile, 'membership_number')->textInput(['placeholder' => 'Highcourt Bar Association Membership Number']) ?>
<?= $form->field($profile, 'landline')->textInput(['placeholder' => 'Landline Number']) ?>
<?= $form->field($profile, 'mobile')->textInput(['placeholder' => 'Mobile Number (Enter comma separated multiple mobile numbers)']) ?>
<?= $form->field($profile, 'residential_address')->textarea(['placeholder' => 'Enter Residential Address Here']) ?>
<?= $form->field($profile, 'court_address')->textarea(['placeholder' => 'Enter Court Address Here']) ?>
<?= $form->field($profile, 'blood_group')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\BloodGroups::find()->all(),'id','name'),["prompt" => "Please select blood group"]) ?>
<?= $form->field($profile, 'lat1')->textInput(['placeholder' => 'Enter Latitude Home (If want to add manually)']) ?>
<?= $form->field($profile, 'long1')->textInput(['placeholder' => 'Enter Longitude Home  (If want to add manually)']) ?>
<?= $form->field($profile, 'lat2')->textInput(['placeholder' => 'Enter Latitude Office  (If want to add manually)']) ?>
<?= $form->field($profile, 'long2')->textInput(['placeholder' => 'Enter Longitude Office  (If want to add manually)']) ?>

<div class="form-group">
    <div class="col-lg-offset-3 col-lg-9">
        <?= Html::submitButton(Yii::t('user', 'Update'), ['class' => 'btn btn-block btn-success']) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>

<?php $this->endContent() ?>
