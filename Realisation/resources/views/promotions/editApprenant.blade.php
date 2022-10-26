<form action="{{route('gestionstud.update',[$apprenant->id])}}" method="post">
    @csrf
    @method('PUT')
 Prenom:<input name="Prenom" value="{{$apprenant->Prenom}}" type="text"  >
 Nom:<input name="Nom" value="{{$apprenant->Nom}}" type="text"  >
 Email:<input name="Email" value="{{$apprenant->Email}}" type="email"  >
 idpromotion:<input name="PromotionID" value="{{$apprenant->PromotionID}}">

    <button type="submit">Modifier</button>
</form>