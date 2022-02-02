<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\TestEvent;

class TestWebsocketController extends Controller
{
    public function test(Request $request){
    	if (! $request->filled('message')) {
            return response()->json([
                'message' => 'No message to send'
            ], 422);
        }

        broadcast(new TestEvent($request->message))->toOthers();

        return response()->json(['success'=> true], 200);
    }
}
