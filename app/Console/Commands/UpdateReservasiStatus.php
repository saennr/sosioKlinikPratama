<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Reservasi;
use Carbon\Carbon;

class UpdateReservasiStatus extends Command
{
    protected $signature = 'reservasi:update-status';
    protected $description = 'Update status aktif pada reservasi berdasarkan tanggal';

    public function handle()
    {
        $now = Carbon::now();

        Reservasi::where('tanggal', '<', $now->toDateString())
            ->where('aktif', true)
            ->update(['aktif' => false]);

        $this->info('Status aktif pada reservasi telah diperbarui.');
    }
}
