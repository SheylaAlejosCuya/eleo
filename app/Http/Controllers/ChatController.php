<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tb_message;

use App\Events\PrivateChatEvent;

class ChatController extends Controller
{
    public function fetchUserMessages($id) {

        try 
        {
            tb_message::where('from_user_id', $id)
                ->where('to_user_id', auth()->id())
                ->where('read', false)
                ->update(['read' => true]);
            
            $messages = tb_message::where(function ($q) use ($id) {
                $q->where('from_user_id', auth()->id());
                $q->where('to_user_id', $id);
            })->orWhere(function ($q) use ($id) {
                $q->where('from_user_id', $id);
                $q->where('to_user_id', auth()->id());
            })
            ->with('fromUser')
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
            
            return [ "messages" => $messages ];

        } catch (\Throwable $th) {
            return [ 'status' => 500, 'message' => $th ];
        }

    }

    public function saveMessage(Request $request) {

        try 
        {
            $message = auth()->user()->messagesFrom()->create([
                'message' => $request->message,
                'to_user_id' => $request->to
            ]);

            broadcast(new PrivateChatEvent($message));
    
            return [ 'status' => 'mensaje guardado' ];

        } catch (\Throwable $th) {
            return [ 'status' => 500, 'message' => $th ];
        }
    }

    public function updateUnreadMessages(Request $request) {

        try 
        {
            tb_message::where('from_user_id', $request->from)
                ->where('to_user_id', auth()->id())
                ->where('read', false)
                ->update(['read' => true]);

            return [ 'status' => 'estatus actualizados' ];

        } catch (\Throwable $th) {
            return [ 'status' => 500, 'message' => $th ];
        }
    }
}
