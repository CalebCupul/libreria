<?php

namespace App\Listeners;

use App\Events\UserSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class OptimizedUserImage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserSaved  $event
     * @return void
     */
    public function handle(UserSaved $event)
    {

        // Redimensiona la imagen
        $image = Image::make(Storage::get($event->user->imagen))
            ->widen(600)
            ->limitColors(255)
            ->encode();
        
        Storage::put($event->user->imagen, (string) $image);
        
    }
}
