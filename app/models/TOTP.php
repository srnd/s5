<?php

class TOTP extends \OTPHP\TOTP {
    protected $user;
    protected $secret;
    public function setUser(User $user)
    {
        $this->user = $user;
        return $this;
    }

    public function getLabel()
    {
        return 'StudentRND s5 - '.$this->user->username;
    }

    public function getInterval()
    {
        return 30;
    }

    public function getDigits()
    {
        return 6;
    }

    public function getDigest()
    {
        return 'SHA1';
    }

    public function getIssuer()
    {
        return 'StudentRND';
    }

    public function isIssuerIncludedAsParameter()
    {
        return true;
    }

    /**
     * @param $secret
     * @return $this
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;
        return $this;
    }

    public function getSecret()
    {
        return $this->secret;
    }

    public function getQrUri()
    {
        return 'https://chart.googleapis.com/chart?cht=qr&chs=250x250&chl='.urlencode($this->getProvisioningUri());
    }

    public static function getRandomSecret()
    {
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $str = '';

        for ($i = 0; $i < 20; $i++) {
            $byte = hexdec(bin2hex(openssl_random_pseudo_bytes(1)));

            $cindex = $byte % strlen($chars);
            $str .= substr($chars, $cindex, 1);
        }

        return $str;
    }
}