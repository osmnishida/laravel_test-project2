<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Jobs\SendMailJob;

class SendMailController extends Controller
{
    public function send(Request $request) {
        $name = 'テストユーザー';
        $email = 'osmnishida@gmail.com';

        SendMailJob::dispatch($name, $email);

        return redirect('.');
    }
}
