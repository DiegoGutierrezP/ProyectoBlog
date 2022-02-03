<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use Livewire\Component;

use Livewire\WithPagination;/* para usar la paginacion con livewire */

class PostsIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";/* los estilos de la paginacion cambian estilo de tailwind a boostrap */

    public $search;/* sincronisado con el input de la vista */

    public function updatingSearch(){/* este metodo se activara cuando la variable search cambie */
        $this->resetPage();
    }

    public function render()
    {

        $posts = Post::where('user_id',auth()->user()->id)
                                ->where('name','like','%'.$this->search.'%')
                                ->orderBy('id','desc')
                                //->latest('id')
                                ->paginate();

        return view('livewire.admin.posts-index',compact('posts'));
    }
}
