<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div>
        <input type="search" id="search" name="search">
     </div>
     
    
    <a href="{{route('promotions.create')}}"> <button> Ajouter promotion</button> </a>
    <table>
        <tbody class="table1">
        @foreach ($promotions as $promotion)
            <tr>
                <td>{{ $promotion->name }}</td>
                <td><a href="{{route('promotions.edit',$promotion->id)}}"><button>Modifier</button></a></td>
                <td>
                <form action="{{route('promotions.destroy',$promotion->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <td><input  type="submit" value="Supprimer" /></td>
                </form>
                </td>
            </tr>
        @endforeach
    </tbody>

    <tbody id="Content" class="table2"></tbody>

    </table>
   




    
<script type="text/javascript">
    $('#search').on('keyup',function(){
        $value=$(this).val();
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
        url:'{{URL::to("search")}}',
        data:{'search':$value},
        success:function(data){
            $('#Content').html(data);

        }
    });
    })

</script>
    
</body>
</html>