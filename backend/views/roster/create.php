<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Roster */

$this->title = Yii::t('app', 'Create Roster');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rosters'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="roster-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelJudges' => $modelJudges
    ]) ?>

</div>
