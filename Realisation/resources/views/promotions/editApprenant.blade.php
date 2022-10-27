<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    <div class="cc" style="   justify-content: center; align-items: center; min-width: auto; ">
        <div class="card-1" style="margin-left: 40%; margin-top: 5%;">

    <form action="{{route('gestionstud.update',[$apprenant->id])}}" method="post">
        @csrf
        @method('PUT')
     Prenom:<input name="Prenom" value="{{$apprenant->Prenom}}" type="text"  >
     Nom:<input name="Nom" value="{{$apprenant->Nom}}" type="text"  >
     Email:<input name="Email" value="{{$apprenant->Email}}" type="email"  >
     idpromotion:<input name="PromotionID" value="{{$apprenant->PromotionID}}"> <br><br>

      <div class="btnn" style="text-align: center">
    
        <button class="btn btn-primary" type="submit">Modifier apprenant</button>
    </form>
</div>
    


</body>
</html>