<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    //

    public function __invoke(Newsletter $newsletter)
    {
        request()->validate([
            'email' => ['required', 'email']
        ]);


        // $response = $mailchimp->ping->get();
        // $response = $mailchimp->lists->getAllLists();
        // $response = $mailchimp->lists->getList('4d6c1c5401');
        // $response = $mailchimp->lists->getListMembersInfo("4d6c1c5401");


        try {
            // $newsletter = (new NewsLetter);
            $newsletter->subscribe(request('email'));
        } catch (\Exception $e) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'email' => 'This email could not be add to the newsletter list',
            ]);
        }
        return redirect('/')
            ->with('success', 'Your are now signed up for our newsletter');

    }

}
