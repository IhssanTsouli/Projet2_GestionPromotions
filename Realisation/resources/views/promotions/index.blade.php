<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- CSS only -->
    <link rel="stylesheet" href="css/style.css">
    <!-- bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="center">
                    <h1 style="text-align: center; margin-top: 40px;" >Promotions</h1>

                    <div style="text-align: center">
                    <a  style="float: left;"  href="{{route('promotions.create')}}"> <button class="btn btn-primary"> Ajouter promotion</button> </a>
                
                        <input style="float: right; margin-bottom: 40px;" class="inp" type="search" id="idsearch" name="search" placeholder="Search">
                    </div>
                    
                    
                    <table class="table">
                        <thead>
                            <tr class="table-dark">
                                <th>Nom </th>
                                <th>Actions </th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="table1">
                        @foreach ($promotions as $promotion)
                            <tr>
                                <td>{{ $promotion->name }}</td>
                                <td><a class="btn btn-success" href="{{route('promotions.edit',$promotion->id)}}">Modifier</a>
                                    <form action="{{route('promotions.destroy',$promotion->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <td><input class="btn btn-danger" type="submit" value="Supprimer" /></td>
                                    </form>
                                </td>
                            
                            </tr>
                        @endforeach
                    </tbody>
                
                    <tbody id="Content" class="table2"></tbody>
                
                    </table>
                
    
    
    
    

    </div>
  
    
<script type="text/javascript">
    $('#idsearch').on('keyup',function(){
        
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
        url:'{{URL::to("routesearch")}}',
        data:{'searchValue':$value},
        success:function(data){
            $('#Content').html(data);

        }
    });
    })

</script>
    
</body>
</html>