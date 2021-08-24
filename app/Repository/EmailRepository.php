<?php

namespace App\Repository;

use App\Mail\UserCreatedMail;
use Illuminate\Support\Facades\Mail;


class EmailRepository {

    public function sendUserCreatedMail($user) {
        Mail::to($user->email)->send(new UserCreatedMail($user));

        return true;
    }
}