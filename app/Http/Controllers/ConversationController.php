<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\Order;
use App\Events\MessageSent;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    public function index($orderId)
    {
        $order = Order::findOrFail($orderId);

        $conversation = Conversation::with('messages.sender')
            ->where('order_id', $orderId)
            ->firstOrCreate([
                'user_id' => auth()->id(),
                'store_id' => $order->store_id,
            ]);


        return response()->json($conversation);
    }

    public function storeMessage(Request $request, $conversationId)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $conversation = Conversation::findOrFail($conversationId);

        $message = $conversation->messages()->create([
            'sender_id' => auth()->id(),
            'message' => $request->message,
        ]);

        broadcast(new MessageSent($message))->toOthers();

        return response()->json($message);
    }
}
