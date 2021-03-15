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
    protected $description = 'Enviar mensajes vía FCM';

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

        $this->info('Buscando prestamos con estado en curso');
        /*

        //formato fecha                         2021-03-15 09:09:52
        //fecha carbon                          2021-03-15 14:17:13.642210 America/Bogota (-05:00)
        // fecha quitandole 8 dias a la actual  2021-01-13 00:00:00
        //fecha prestamo bd                     2021-01-13 05:12:37
        $now = Carbon::now();


        $prestamo = $this->getPrestamosMas8Dias($now);
        //dd($prestamo);
        foreach ($prestamos as $prestamo) {
            $prestamo->user_id->sendFCM('Test 1');
            $this->info('Mensaje enviado al usuario (ID): '. $prestamo->user_id);
        }

    }

    private function getPrestamosMas8Dias($now)
        {
            return Prestamo::where('estado', 'En curso')
                    ->where('created_at', '<', $now->copy()->subDay(8)->toDateString())
                    ->get(['id', 'user_id'])->toArray()

        }
        */

        // fecha prestamo 2021-01-14 21:14:00 updated_at
        // hora actual   2021-01-17 21:15:00
        // updated_at
        //$now = new \DateTime();
        $now = Carbon::now();


        $headers = ['id', 'updated_at', 'user_id'];

        $prestamosPentinetes = $this->getPrestamosMoreDays($now->copy());
        $this->table($headers, $prestamosPentinetes->toArray());
        //dd($prestamosPentinetes);

        foreach ($prestamosPentinetes as $prestamo) {
            $prestamo->user_id->sendFCM('El prestamo presenta mas de 3 dias con estado en curso.');
            $this->info('Mensaje enviado al usuario (ID): '. $prestamo->user_id);
        }

    }

    private function getPrestamosMoreDays($now)
    {
        return Prestamo::where('estado', 'Terminado')
                    ->where('updated_at', '<', $now->copy()->subDay(8)->toDateString())
                    ->get(['id', 'updated_at', 'user_id']);
    }


}
