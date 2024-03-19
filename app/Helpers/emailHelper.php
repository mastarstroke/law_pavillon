<?php



if(!function_exists('sendWelcomeEmail')){
    function sendWelcomeEmail($email, $user)
    {
        \Mail::to($email)->send(new App\Mail\WelcomeEmail($user));
    }
}


if(!function_exists('sendPhotoNotificationEmail')){
    function sendPhotoNotificationEmail($email, $user)
    {
        \Mail::to($email)->queue(new App\Mail\PhotoNotificationEmail($user));
    }
}






?>