<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('promotions.update',['promotion'=>$promotion->id])}}" method="post">
        @csrf
        @method('PUT')

        <input type="text"  value="{{$promotion->name}}" name="name">
        <button type="submit">
            Modifier
        </button>
    </form>


    <!-- for liste de students -->
    <table>
        <input type="search" id="searchstudent" name="searchstudent" placeholder="Cherche apprenant">
            <tbody class="table1">
            @foreach($apprenants as $values)
                <tr> 
            <td>{{ $values['Prenom'] }}</td>
            <td>{{ $values['Nom'] }}</td>
            <td>{{ $values['Email'] }}</td> 
            <td> <input id="pp" type="hidden" value="{{$values['PromotionID']}}"></td> 
            <td><a href="{{ route('gestion.editstudent',[$values['id']]) }}"><button>Modifier</button></a></td>
            <form action="{{ route('gestionstud.destroy',[$values['id']]) }}" method="POST">
                @csrf
                @method('delete')
                <td><button type="submit">Supprimer</button></td>
        </form>
        </tr>
        @endforeach
        </tbody>
        {{-- table serch vid --}}
        <tbody id="Content" class="table2">
        </tbody>
    </table>
    <a href="{{route('gestion.insert', $promotion->id)}}"> <button>Ajouter apprenant</button> </a>
    
    {{-- for search student --}}
    
    <script type="text/javascript">
        $('#searchstudent').on('keyup',function(){
            $value=$(this).val();
            $idp=$('#pp').val();
            if($value){
                $('.table1').hide();
                $('.table2').show();
            }
            else{
                $('.table1').show();
                $('.table2').hide();
            }
            $.ajax({
                type:'get',
                url:'{{URL::to("searchstudent")}}',
                data:{'search':$value,'PromotionID':$idp},
                success:function(data){
                    console.log(data);
                    $('#Content').html(data);
                }
            });
        })
        </script>

</body>
</html>