<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
      <!-- CSS only -->
      <link rel="stylesheet" href="{{asset('css/style.css')}}">
      <!-- bootstrap  -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
     
</head>
<body>
    <form action="{{route('promotions.store')}}" method="post">
        @csrf
        <input style="margin-bottom: 40px;" class="inp" type="text" name="name">
        <button class="btn btn-primary" type="submit">
            Envoyer
        </button>
    </form>

</body>
</html>