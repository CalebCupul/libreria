<?php

namespace App\Observers;

use App\Http\Controllers\BookRecordController;
use App\Models\BookRecord;

class BookRecordObserver
{
    /**
     * Handle the BookRecord "created" event.
     *
     * @param  \App\Models\BookRecord  $bookRecord
     * @return void
     */
    public function created(BookRecord $bookRecord)
    {
        //
    }

    /**
     * Handle the BookRecord "updated" event.
     *
     * @param  \App\Models\BookRecord  $bookRecord
     * @return void
     */
    public function updated(BookRecord $bookRecord)
    {
        if($bookRecord->status == 'Retrasado' && $bookRecord->user->status == "Activo"){
            $bookRecord->user->update(['status' => 'Suspendido']);
            
            // Send email
            BookRecordController::sendEmailAfterBookDelay($bookRecord);
        }
    }

    /**
     * Handle the BookRecord "deleted" event.
     *
     * @param  \App\Models\BookRecord  $bookRecord
     * @return void
     */
    public function deleted(BookRecord $bookRecord)
    {
        //
    }

    /**
     * Handle the BookRecord "restored" event.
     *
     * @param  \App\Models\BookRecord  $bookRecord
     * @return void
     */
    public function restored(BookRecord $bookRecord)
    {
        //
    }

    /**
     * Handle the BookRecord "force deleted" event.
     *
     * @param  \App\Models\BookRecord  $bookRecord
     * @return void
     */
    public function forceDeleted(BookRecord $bookRecord)
    {
        //
    }
}
