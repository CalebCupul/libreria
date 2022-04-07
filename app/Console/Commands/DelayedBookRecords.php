<?php

namespace App\Console\Commands;

use App\Models\BookRecord;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DelayedBookRecords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'quote:notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates the book records and sends an email to the users';

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

        $todaysDate = Carbon::now();

        $delayedBookRecords = BookRecord::where('status', 'Pendiente')->get();

        foreach ($delayedBookRecords as $delayedBookRecord) {
            if( $todaysDate->greaterThan($delayedBookRecord->returned_at)){
                $delayedBookRecord->update(['status' => 'Retrasado']);
            }
        }

        $this->info('Task funcionando');
    }
}
