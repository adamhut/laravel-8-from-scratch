<?php

namespace App\Services;

interface Newsletter{

    public function subscribe(string $email,string $list);
    public function unsubscribe();

}