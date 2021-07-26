<?php
namespace App\Services;

use MailchimpMarketing\ApiClient;


class MailchimpNewsLetter implements Newsletter{

    protected $client;

    public function __construct(ApiClient $client)
    {
        $this->client = $client;
    }

    public function subscribe(string $email,string $list=null)
    {

        $list = $list ?? config('services.mailchimp.lists.subscribers');
        // $mailchimp = new \MailchimpMarketing\ApiClient();
        // $mailchimp->setConfig([
        //     'apiKey' => config('services.mailchimp.key'),
        //     'server' => 'us6'
        // ]);

        return $this->client->lists->addListMember($list, [
            "email_address" => $email,
            "status" => "subscribed",
        ]);
    }

    public function unsubscribe()
    {

    }
}