<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    
    <!-- bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  
</head>
<body>
    <h1 class="tit" >Modifier Promotion</h1>
    <br><br>
    <form action="{{route('promotions.update',['promotion'=>$promotion->id])}}" method="post">
        @csrf
        @method('PUT')

        <input  class="inp" type="text"  value="{{$promotion->name}}" name="name"> 
         <br>
        <button   class="btn btn-success" type="submit">
            Modifier
        </button>
    </form>
   <br> 



    <!-- for liste des apprenanats -->
    <table class="table">
        <input style="  border: 4px solid #1398f7;
        border-radius: 7px;
        outline: none;
       " class="inp" type="search" id="searchstudent" name="searchstudent" placeholder="Cherche apprenant"> <br> <br>
            <tbody class="table1">
            @foreach($apprenants as $values)
                <tr > 
            <td>{{ $values['Prenom'] }}</td>
            <td>{{ $values['Nom'] }}</td>
            <td>{{ $values['Email'] }}</td> 
            <td> <input id="pp" type="hidden" value="{{$values['PromotionID']}}"></td> 
            <td><a  class="btn btn-success" href="{{ route('gestion.editstudent',[$values['id']]) }}">Modifier</a></td>
            <form action="{{ route('gestionstud.destroy',[$values['id']]) }}" method="POST">
                @csrf
                @method('delete')
                <td><button  class="btn btn-danger" type="submit">Supprimer</button></td>
        </form>
        </tr>
        @endforeach
        </tbody>
        {{-- table serch vid --}}
        <tbody id="Content" class="table2">
        </tbody>
    </table>
    
    <a  class="btn btn-primary" href="{{route('gestion.insert', $promotion->id)}}"> Ajouter apprenant</a>
    
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