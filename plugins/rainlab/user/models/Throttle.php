<?php namespace RainLab\User\Models;

use Config;
use October\Rain\Auth\Models\Throttle as ThrottleBase;

class Throttle extends ThrottleBase
{
    /**
     * @var string The database table used by the model.
     */
    protected $table = 'user_throttle';

    /**
     * @var array Relations
     */
    public $belongsTo = [
        'user' => User::class
    ];

    public function __construct()
    {
        parent::__construct();

        static::$attemptLimit = Config::get('auth.throttle.attemptLimit', 5);
        static::$suspensionTime = Config::get('auth.throttle.suspensionTime', 1);
    }
}
