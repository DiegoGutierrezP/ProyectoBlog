<div class="card">

    @if (session('msginfo'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('msginfo')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

   {{-- {{$search}} --}}
    <div class="card-header">
        <input  wire:model="search" class="form-control" placeholder="Ingrese nombre de un post" >
    </div>
    <div class="card-body">
        <table class="table table-striped" >

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @if ($posts->count())
                @foreach ($posts as $post)
                    <tr>
                       <td>{{$post->id}}</td>
                       <td>{{$post->name}}</td>
                       <td width="10px"><a class="btn btn-primary btn-sm" href="{{route('admin.posts.edit',$post)}}">Editar</a></td>
                       <td width="10px">
                           <form action="{{route('admin.posts.destroy',$post)}}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger btn-sm" value="Eliminar">
                           </form>
                       </td>
                    </tr>
                @endforeach
                @else
                    <tr><td colspan="4">No hay registros</td></tr>
                @endif

            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{$posts->links()}}
    </div>
</div>
