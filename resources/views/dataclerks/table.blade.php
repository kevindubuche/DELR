<div class="table-responsive">
    <table class="table" id="dataclerks-table">
        <thead>
            <tr>
        <th></th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Email</th>
        <th>Username</th>
        <th>Sexe</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($dataclerks as $dataclerk)
            <tr>
            <td><img src="{{asset('user_images/'.$dataclerk->image)}}"
            alt="dataclerk image"
            class="rounded-circle"
            width="50" 
            height="50"
            style="border-radius:50%"/></td>
            <td>{{ $dataclerk->nom }}</td>
            <td>{{ $dataclerk->prenom }}</td>
            <td>{{ $dataclerk->email }}</td>
            <td>{{ $dataclerk->username }}</td>
            <td>@if($dataclerk->email ==0)Masculin @else Féminin @endif </td>
                <td>
                    {!! Form::open(['route' => ['dataclerks.destroy', $dataclerk->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('dataclerks.show', [$dataclerk->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('dataclerks.edit', [$dataclerk->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Etes-vous sur?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
