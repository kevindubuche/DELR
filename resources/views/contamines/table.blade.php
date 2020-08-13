<div class='table-responsive' >
        <table id='myTable' class=' display   table table-bordered table-striped table-condensed'>
        
        <thead>
            <tr>
         <th>Nom</th>
        <th>Prénom</th>
        <th>Sexe</th>
        <th>Commune</th>
        <th>Département</th>
        <th>Adresse</th>
        <th>Téléphone</th>
        <th>Institution</th>
        <th>Ajouté le</th>
        
        
                <th >Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($contamines as $contamine)
            <tr>
            <td>{{ $contamine->nom }}</td>
            <td>{{ $contamine->prenom }}</td>
            @if($contamine->sexe ==0)
            <td>Masculin</td>
            @else
            <td>Féminin</td>
            @endif
            <td>{{ $contamine->commune }}</td>
            <td>{{ $contamine->departement }}</td>
            <td>{{ $contamine->adresse }}</td>
            <td>{{ $contamine->telephone }}</td>
            <td>{{ $contamine->institution }}</td>
            <td>{{ $contamine->created_at }}</td>
      
                <td>
                    {!! Form::open(['route' => ['contamines.destroy', $contamine->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('contamines.show', [$contamine->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('contamines.edit', [$contamine->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Etes-vous sur?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>


@push('scripts')
<script>
    $(document).ready(function()
    {
        $('#myTable').DataTable({
            select:true,
            "language": {
            "lengthMenu": "Voir _MENU_ lignes par page",
            "zeroRecords": "Aucune information",
            "info": "_PAGE_ sur _PAGES_",
            "infoEmpty": "Aucun résultat trouvé",
            "infoFiltered": "(filtre de _MAX_ total résultats)",
            "search": "Rechercher",
            "paginate":{
            "previous":"Précédent",
            "next":"Suivant"
            }
        },
        buttons:['selectRows']
    }

        );
    });
</script>

@endpush