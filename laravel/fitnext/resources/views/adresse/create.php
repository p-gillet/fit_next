<!DOCTYPE html>
<html>
<head>
    <title>Création d'une adresse</title>
</head>
<body>
    <h1>Création d'une adresse</h1>
    <form action="{{ route('adresse.store') }}" method="POST">
        @csrf
        <label for="ville">Ville</label>
        <input type="text" name="ville" id="ville">
        <label for="codepostale">Code postale</label>
        <input type="text" name="codepostale" id="codepostale">
        <label for="rue">Rue</label>
        <input type="text" name="rue" id="rue">
        <label for="numeroderue">Numéro de rue</label>
        <input type="text" name="numeroderue" id="numeroderue">
        <button type="submit">Créer</button>
    </form>
</body>
</html>

