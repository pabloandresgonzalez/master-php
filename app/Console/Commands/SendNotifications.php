<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Prestamo;
use Carbon\Carbon;
use App\User;

use App\Helpers\FormatTime;

class SendNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fcm:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enviar mensajes via FCM';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Buscando citas');

        // fecha prestamo 2021-01-12 11:34:00 updated_at
        // hora actual   2021-01-15 12:12:00
        // updated_at
        //$now = new \DateTime();
        $now = Carbon::now();


        $headers = ['i', 'updated_at', 'user_id'];

        $prestamosPentinetes = $this->getPrestamosMoreDays($now->copy());
        $this->table($headers, $prestamosPentinetes->toArray());
        //dd($prestamosPentinetes);

        foreach ($prestamosPentinetes as $prestamo) {
            $prestamo->user->sendFCM('El prestamo presenta mas de 8 dias con estado en curso.');
            $this->info('Mensaje enviado al usuario (ID): '. $prestamo->user_id);
        }

    }

    private function getPrestamosMoreDays($now)
    {
        return Prestamo::where('estado', 'En curso')
                    ->where('updated_at', '>=',  $now->copy()->subDay(3)->toTimeString())
                    ->get(['id', 'updated_at', 'user_id']);
    }
}
