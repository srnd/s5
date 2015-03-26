<?php

return json_decode(file_get_contents(app_path().DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'.local.json'), true)
    ['yubico'];
