<?php

class ProfilePhotoController extends BaseController {
    public function redirect_photo()
    {
        $user = Route::input('user');
        $size = Route::input('photosize');

        return '/photo/'.$user->username.'_'.$size.'/'.$user->updated_at->timestamp.'.jpg';

        $response = Response::make('', 307);
        $response->header('Content-Type', 'image/jpeg');
        $response->header('Cache-control', 'public,max-age=300,no-transform');
        $response->header('Location', '/photo/'.$user->username.'_'.$size.'/'.$user->modified_at->getTimestamp().'.jpg');
    }

    public function show_photo()
    {
        $response = Response::make('', 200);
        // Images bigger than ~100x100px will cause PHP to flush the output buffer, so we need to send a header now
        // but images smaller than that won't cause any output buffering, so we need to return a response with the
        // proper header so it doesn't get overridden.
        //
        // This wouldn't be a problem if imagepng would return instead of echoing.
        header('Content-type: image/jpeg');
        header('Cache-control: public,max-age=604800,no-transform');
        $response->header('Content-Type', 'image/jpeg');
        $response->header('Cache-control', 'public,max-age=604800,no-transform');

        $user = Route::input('user');
        $size = Route::input('photosize');

        if ($user->photo !== null) {
            $image = new Image($user->photo);
        } else {
            $image = new Image(public_path().'/assets/img/default_user.png');
        }
        $image->fill($size, $size);
        imagejpeg($image->getResource());

        return $response;
    }
}