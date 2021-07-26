<?php
namespace App\Services;

class ConvertKitNewsletter implements Newsletter{


    public function subscribe(string $email, string $list = null)
    {

        //subscribe the user with ConverKit-funtionality
        //API requests
        return 'I subscribed it';
    }


    public function unsubscribe()
    {
    }
}