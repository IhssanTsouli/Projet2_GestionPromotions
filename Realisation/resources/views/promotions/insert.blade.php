<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    
    <!-- bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Document</title>
</head>
<body >
    <div class="cc" style="   justify-content: center; align-items: center; min-width: auto; ">
        <div class="card-1" style="margin-left: 40%; margin-top: 5%;">
            <form action="{{Route('gestionstud.store')}}" method="POST">
                @csrf
                Prenom:<input type="text" name="Prenom">
                
                Nom:<input type="text" name="Nom">
                Email:<input type="email" name="Email">
                <br><br>
                <input type="text" name="PromotionID" value="{{$id}}"><br><br>
                {{-- {{dd($id)}} --}} 
                <div class="btnn" style="text-align: center">
                    <button  class="btn btn-primary" type="submit">Ajouter apprenanat</button>
    
                </div>
                </form>
    
    
        </div>
    </div>
    
    
</body>
</html>