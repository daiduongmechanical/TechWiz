<?php

namespace App\Http\Controllers\Chat;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Chat;

class CreateController extends Controller
{
    public function __invoke(Request $request)

    {

        $check = Chat::where('email', $request->email)->where('name', $request->name)->get();
        $chat = $check;
        if ($check == null) {
            $chat = Chat::create([
                'name'              => $request->name,
                'email'             => $request->email,
                'unseen_messages'   => 0,
                'last_sender'       => 'customer'
            ]);
        }


        return response()->json($chat, 200);
    }
}
