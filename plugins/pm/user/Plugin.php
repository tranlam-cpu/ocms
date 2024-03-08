<?php namespace Pm\User;

use System\Classes\PluginBase;
use RainLab\User\Controllers\Users as UsersController;
use RainLab\User\Models\User as UserModel;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'pm\user\components\UserForm' => 'userform'
        ];
    }

    public function registerSettings()
    {
    }

    public function boot(){
        UserModel::extend(function ($model){
            $model->addFillable([
                'type_user'
            ]);
        });


        UsersController::extendFormFields(function($form, $model, $context){
            $form->addTabFields([
                'type_user' => [
                    'label' => 'TypeUser',
                    'type' => 'text',
                    'tab' => 'rainlab.user::lang.user.account'
                ],
            ]);
        });
    }



}
