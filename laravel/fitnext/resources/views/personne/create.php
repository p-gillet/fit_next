<html>
    <div class="container">
    <h1>Création d'une personne</h1>
        <form action="{{ route('personne.store') }}" method="POST">
            @csrf
            <label for="numAVS">Numéro AVS</label>
            <input type="text" name="numAVS" id="numAVS">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom">
            <label for="sexe">Sexe</label>
            <input type="text" name="sexe" id="sexe" maxlength="1">
            <label for="numTelephone">Numéto téléphone</label>
            <input type="text" name="numTelephone" id="numTelephone">
            <label for="photo">Photo</label>
            <input type="file" name="photo" id="photo">
            <label for="dateNaissance">Date de naissance</label>
            <input type="date" name="dateNaissance" id="dateNaissance">
            <label for="adresse_id">Adresse</label>
            <select name="adresse_id" id="adresse_id">
                @foreach($adresses as $adresse)
                    <option value="{{ $adresse->id }}">{{ $adresse->rue }} {{ $adresse->numeroderue }}, {{ $adresse->codepostale }} {{ $adresse->ville }}</option>
                @endforeach
            </select>
            <button type="submit">Créer</button>
        </form>
    </div>
</html>