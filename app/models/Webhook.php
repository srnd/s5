<?php

class Webhook extends Eloquent {
    protected $table = 'webhooks';
    protected $primaryKey = 'id';
    protected $guarded = ['*'];

    public static $AllEvents = [
        'User.Create',
        'User.Update',
        'User.Delete',
        'User.Restore',
        'User.PasswordChange'
    ];

    public function application()
    {
        return $this->hasOne('Application', 'applicationID', 'applicationID');
    }

    public function Execute($data)
    {
        $opts = ['http' => ['method'  => 'POST']];

        $data['secret'] = $this->application->secret;
        $data['event'] = $this->event;

        $opts['http']['header'] = 'Content-type: application/x-www-form-urlencoded';
        $opts['http']['content'] = http_build_query($data);

        $context  = stream_context_create($opts);
        try {
            @file_get_contents($this->url, false, $context);
        } catch (\Exception $ex) {}
    }

    public static function ExecuteAll($event, $data)
    {
        $all_hooks = self::where('event', '=', $event)->get();
        foreach ($all_hooks as $hook) {
            $hook->Execute($data);
        }
    }
}