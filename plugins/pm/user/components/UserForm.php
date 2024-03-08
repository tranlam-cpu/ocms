<?php
namespace pm\user\Components;

use Cms\Classes\ComponentBase;
use pm\user\models\user;
use Input;
use Session;
use Mail;

class UserForm extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'User Form',
            'description' => 'Form User Manager'
        ];
    }

    public function onSend()
    {
        echo Session::get('username');
        $vars = ['username' => Input::get('username'), 'password' => Input::get('password')];
        $userAdmin = User::where('username', Input::get('username'))->where('password', Input::get('password'))->first();
        
        if($userAdmin){
            Session::put('username', Input::get('username'));
            Session::put('password', Input::get('password'));
            return redirect('/');
        }else{
            if(Session::has('username')){
                echo 'You logged in';
            }
            else{
                echo 'Wrong Username or Password';
            }
        }

        Mail::send('pm.user::mail.message', $vars, function($message){
            $message->to(Input::get('username'));
            $message->subject('Sign Up User');
        });
        echo Input::get('username');
    }

    public function onSendLogOut(){
        if(Session::has('username')){
            Session::flush();
        }
        else{
            echo 'You did not log in';
        }
    }

    public function onRun(){
        if(Session::has('username')){
            $this->users123=Session::get('username');
        }
    }

    public $users123;
}