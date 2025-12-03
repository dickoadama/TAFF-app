<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\NotificationService;
use App\Models\User;

class SendTestNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notification:test {userId?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envoyer une notification de test';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(NotificationService $notificationService)
    {
        $userId = $this->argument('userId');
        
        if ($userId) {
            $user = User::find($userId);
            if (!$user) {
                $this->error("Utilisateur avec l'ID {$userId} non trouvé.");
                return Command::FAILURE;
            }
            
            $notificationService->sendToUser(
                $user,
                'Notification de test',
                'Ceci est une notification de test envoyée depuis la console.',
                'info',
                '/dashboard'
            );
            
            $this->info("Notification envoyée à l'utilisateur {$user->name}");
        } else {
            // Envoyer à tous les utilisateurs
            $notificationService->sendToAllUsers(
                'Notification de test globale',
                'Ceci est une notification de test envoyée à tous les utilisateurs.',
                'success',
                '/notifications'
            );
            
            $this->info('Notification envoyée à tous les utilisateurs');
        }
        
        return Command::SUCCESS;
    }
}
