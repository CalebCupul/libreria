<?php

namespace App\Listeners;

use App\Events\BookSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class OptimizedBookImage
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
     * @param  \App\Events\BookSaved  $event
     * @return void
     */
    public function handle(BookSaved $event)
    {
        // Redimensiona la imagen
        $image = Image::make(Storage::get($event->book->image))
            ->widen(600)
            ->limitColors(255)
            ->encode();
        
        Storage::put($event->book->image, (string) $image);
    }
}
