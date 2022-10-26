<form action="{{Route('gestionstud.store')}}" method="POST">
    @csrf
    Prenom:<input type="text" name="Prenom">
    Nom:<input type="text" name="Nom">
    Email:<input type="email" name="Email">
    <input type="text" name="PromotionID" value="{{$id}}">
    {{-- {{dd($id)}} --}}
    <button type="submit">Ajouter</button>
    </form>