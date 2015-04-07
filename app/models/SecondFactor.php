<?php

class SecondFactor extends Eloquent {
    protected $table = 'users_2fa';
    protected $primaryKey = 'id';
    protected $guarded = ['*'];

    public function verify($response)
    {
        $lengths = [
            'yubikey'   => 44,
            'totp'      => 6
        ];

        // Is it the correct length for the current type (this allows us to quickly check all 2fa types when the user
        // is logging in.)
        if (strlen($response) !== $lengths[$this->type]) return false;

        switch ($this->type) {
            case "totp":
                $times = [time() - (new TOTP)->getInterval(), time(), time() + (new TOTP)->getInterval()];
                foreach ($times as $time) {
                    if ((new TOTP)
                        ->setUser($this->user)
                        ->setSecret($this->private)
                        ->at($time) === intval($response)) return true;
                }
                return false;

            case "yubikey":
                // Make sure it's the correct YubiKey
                if (substr($response, 0, 12) !== $this->private) return false;

                // Validate with Yubico
                $yubico = new \Yubikey\Validate(\Config::get('yubico.secret_key'), \Config::get('yubico.client_id'));
                return $yubico->check($response);

            default:
                return false;
        }
    }

    public function getNameAttribute()
    {
        switch ($this->type) {
            case "totp":
                return "Google Authenticator";

            case "yubikey":
                return "YubiKey ".$this->private;

            default:
                return ucfirst($this->type);
        }
    }

    public function user()
    {
        return $this->belongsTo('User', 'userID', 'userID');
    }
}