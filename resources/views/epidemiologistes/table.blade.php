<div class="table-responsive">
    <table class="table" id="epidemiologistes-table">
        <thead>
            <tr>
        <th></th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Username</th>
        <th>Téléphone</th>
        <th>Sexe</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($epidemiologistes as $epidemiologiste)
            <tr>
            <td><img src="{{asset('user_images/'.$epidemiologiste->image)}}"
                alt="dataclerk image"
                class="rounded-circle"
                width="50" 
                height="50"
                style="border-radius:50%"/></td>
            <td>{{ $epidemiologiste->nom }}</td>
            <td>{{ $epidemiologiste->prenom }}</td>
            <td>{{ $epidemiologiste->email }}</td>
            <td>{{ $epidemiologiste->username }}</td>
            <td>{{ $epidemiologiste->telephone }}</td>
            <td>@if($epidemiologiste->email ==0)Masculin @else Féminin @endif </td>
           
                <td>
                    {!! Form::open(['route' => ['epidemiologistes.destroy', $epidemiologiste->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('epidemiologistes.show', [$epidemiologiste->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('epidemiologistes.edit', [$epidemiologiste->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Etes-vous sur?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
