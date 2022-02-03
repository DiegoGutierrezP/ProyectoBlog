<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostObserver
{

    public function creating(Post $post)//cambiamos created a creating, para que este evento se active antes de que se elimine el post
    {
        if(! \App::runningInConsole()){//si no estamos ejecutando el create desde la consola ,osea los seeders
            $post->user_id = auth()->user()->id;//agregamos un campo mas al post
        }


    }

   /*  public function updated(Post $post)
    {
        //
    } */

    public function deleting(Post $post)//cambiamos deleted a deleting, para que este evento se active antes de que se elimine el post
    {
        //observer. este funcion se activa cada ves que eliminems un post

        if($post->image){
            Storage::delete($post->image->url);

            $post->image()->delete();
        }
    }

    /* public function restored(Post $post)
    {
        //
    }

    public function forceDeleted(Post $post)
    {
        //
    } */
}
