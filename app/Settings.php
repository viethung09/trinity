<?php


namespace App;


use App\Models\User;
use Exception;

class Settings
{
    protected $user;
    protected $settings = [];

    function __construct(array $settings, User $user)
    {
        $this->settings = $settings;
        $this->user = $user;
    }

    public function get($key)
    {
        return array_get($this->settings, $key);
    }

    public function set($key, $value)
    {
        $this->settings[$key] = $value;

        return $this->duration();
    }

    public function has($key)
    {
        return array_key_exists($key, $this->settings);
    }

    public function all()
    {
        $this->settings;
    }

    public function merge(array $attributes)
    {
        $this->settings = array_merge(
            $this->settings,
            array_only($attributes, array_keys($this->settings))
        );

        return $this->duration();
    }

    protected function duration()
    {
        return $this->user->update(['settings' => $this->settings]);
    }
// $this->settings[$key]
    public function __get($key)
    {
        if(!$this->has($key)) {
            throw new Exception("The {$key} settings does not exists");
        }
        return $this->get($key);
    }
}

/**
 * Created by PhpStorm.
 * User: Hung
 * Date: 9/7/15
 * Time: 10:45 PM
 */