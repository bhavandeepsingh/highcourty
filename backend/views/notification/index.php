<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\NotificationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Notifications';
$this->params['breadcrumbs'][] = $this->title;
$templates="";
$templates.=(Yii::$app->user->can(USER_CAN_UPDATE_POSTS))?"{update} ":"";
$templates.=(Yii::$app->user->can(USER_CAN_DELETE_POSTS))?"{delete} ":"";
?>
<div class="notification-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Notification', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            //'id',
            'title',
            'description:ntext',
            [
                'label' => 'Files',
                'format' => 'raw',
                'value' => function($data){
                    if($data->is_file && strlen($data->filename)){
                        return "<a class='btn btn-success' style='margin-bottom:10px;' href='".Yii::$app->urlManager->baseUrl."/../../uploads/notifications/".$data->id."/".$data->filename."'>"
                             ."<span class='glyphicon glyphicon-download-alt'></span></a><div class='clearfix'></div>";
                    }else{ return "No file selected.";}
                }
            ],
            //'sender_id',
            //'reciever_id',
            // 'created_at',
            // 'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} '.$templates
            ],
        ],
    ]); ?>
</div>
