<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

use Livewire\WithPagination;

class UsersIndex extends Component
{

    use WithPagination;

    protected $paginationTheme = "bootstrap";/* los estilos de la paginacion cambian estilo de tailwind a boostrap */

    public $search = '';

    public function updatingSearch(){/* este metodo se activara cuando la variable search cambie */
        $this->resetPage();
    }

    public function render()
    {

        $users = User::where('name','like','%'.$this->search.'%')
                        ->orWhere('email','like','%'.$this->search.'%')
                        ->paginate(10);

        return view('livewire.admin.users-index',compact('users'));
    }
}
