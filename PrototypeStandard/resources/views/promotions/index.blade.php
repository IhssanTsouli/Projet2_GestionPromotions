<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <a href="{{route('promotions.create')}}">Ajouter</a>
    <ul>
        @foreach ($promotions as $promotion)
            <li>
                {{ $promotion->title }}
                <a href="{{route('promotions.edit',$promotion->id)}}">edit</a>
                <form action="{{route('promotions.destroy',$promotion->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input  type="submit" value="Delete" />
                </form>
    
    
               
            </li>
        @endforeach
    </ul>
    
</body>
</html>