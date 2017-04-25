<?php
namespace app\modules\v1\controllers;

use Yii;

class UserController extends ApiController{
    
    public function actionLogin(){
        $login = new \common\models\LoginForm();
        $login->load(Yii::$app->request->post());        
        if($login->laywerLogin()){
            return $this->success(['user' => $login->getLoginUser(), 'profile' => $login->getProfile()]);
        }else{
            return $this->error(['error' => $login->getFirstError('password')]);
        }        
    }
    
    public function actionResetPassword(){
        if(!$this->loginId()) return $this->errorLoginRequierd();            
        $model = new \common\models\PasswordResetForm($this->login_user);
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            return $this->success(['passwordReset' => $model->resetPassword()]);
        }
        return $this->error(['error' => $model->getFirstError('old_password')]);
    }
    
    
    public function actionRequestResetPassword(){        
        $model = new \common\models\RequestResetPassword();
        $model->load(Yii::$app->request->post());
        if($model->validate()){            
            return $this->success(['requestSend' => $model->requestSend()]);
        }        
        return $this->error(['license_no' => $model->getFirstError('license_no')]);
    }
    
}