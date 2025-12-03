<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MessagingService;
use App\Models\User;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MessagingController extends Controller
{
    protected $messagingService;
    
    public function __construct(MessagingService $messagingService)
    {
        $this->messagingService = $messagingService;
    }
    
    /**
     * Afficher la liste des conversations
     */
    public function index()
    {
        $conversations = $this->messagingService->getUserConversationsWithLastMessage(Auth::user());
        
        return view('messaging.index', compact('conversations'));
    }
    
    /**
     * Afficher une conversation spécifique
     */
    public function show(Conversation $conversation)
    {
        // Vérifier que l'utilisateur fait partie de la conversation
        if ($conversation->user1_id != Auth::id() && $conversation->user2_id != Auth::id()) {
            abort(403, 'Unauthorized');
        }
        
        // Marquer les messages comme lus
        $this->messagingService->markConversationAsRead($conversation, Auth::user());
        
        // Charger les messages
        $messages = $this->messagingService->getConversationMessages($conversation);
        
        // Obtenir l'autre participant
        $otherParticipant = $conversation->otherParticipant(Auth::id());
        
        return view('messaging.show', compact('conversation', 'messages', 'otherParticipant'));
    }
    
    /**
     * Créer une nouvelle conversation
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'recipient_id' => 'required|exists:users,id',
            'message' => 'required|string|max:1000'
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $recipient = User::findOrFail($request->recipient_id);
        
        // Créer ou obtenir la conversation
        $conversation = $this->messagingService->getOrCreateConversation(Auth::user(), $recipient);
        
        // Envoyer le message
        $this->messagingService->sendMessage($conversation, Auth::user(), $request->message);
        
        return redirect()->route('messaging.show', $conversation);
    }
    
    /**
     * Envoyer un message dans une conversation existante
     */
    public function store(Request $request, Conversation $conversation)
    {
        // Vérifier que l'utilisateur fait partie de la conversation
        if ($conversation->user1_id != Auth::id() && $conversation->user2_id != Auth::id()) {
            abort(403, 'Unauthorized');
        }
        
        $validator = Validator::make($request->all(), [
            'message' => 'required|string|max:1000'
        ]);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        
        // Envoyer le message
        $message = $this->messagingService->sendMessage($conversation, Auth::user(), $request->message);
        
        return response()->json([
            'success' => true,
            'message' => $message->load('sender')
        ]);
    }
    
    /**
     * Obtenir les messages non lus
     */
    public function unreadCount()
    {
        $count = $this->messagingService->getUnreadMessagesCount(Auth::user());
        
        return response()->json(['count' => $count]);
    }
}
