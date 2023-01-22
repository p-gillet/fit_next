@extends('layouts.main')

@section('title', 'Ajout d\'un client')

@section('content')

<a href="/" class="goBack">Retour à la page d'accueil</a>
<h1>Création d'une personne</h1>
<form action="/features/addNewClient" method="POST">
    <div class="form-elem">
        <label for="numavs">Numéro AVS</label>
        <input type="number" name="numavs" id="numavs">
    </div>
    <div class="form-elem">
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom">
    </div>
    <div class="form-elem">
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom">
    </div>
    <div class="form-elem">
        <label for="sexe">Sexe</label>
        <input type="text" name="sexe" id="sexe" maxlength="1">
    </div>
    <div class="form-elem">
        <label for="numTelephone">Numéro téléphone</label>
        <input type="text" name="numtelephone" id="numtelephone">
    </div>
    <div class="form-elem">
        <label for="photo">Photo</label>
        <input type="file" name="photo" id="photo">
    </div>
    <div class="form-elem">
        <label for="datenaissance">Date de naissance</label>
        <input type="date" name="datenaissance" id="datenaissance">
    </div>
    <div class="form-elem">
        <label for="numadresse">Adresse</label>
        <select name="numadresse" id="numadresse">
            @foreach($adresses as $adresse)
                <option value="{{ $adresse->numadresse }}">{{ $adresse->ville }} {{ $adresse->codepostale }}, {{ $adresse->rue }} {{ $adresse->numeroderue }}</option>
            @endforeach
        </select>
    </div>
    
    <div class="form-elem">
        <label for="abonne">Abonné</label>
        <input type="checkbox" name="abonne" id="abonne">
    </div>

    <div id="datefincontratsection" class="form-elem">
        <label for="datefincontrat">Date de fin de contrat</label>
        <input type="date" name="datefincontrat" id="datefincontrat">
    </div>
    
    <div class="form-elem">
        <label for="employe">Employé</label>
        <input type="checkbox" name="employe" id="employe">
    </div>

    <div class="form-elem employesection">
        <label for="salaire">Salaire</label>
        <input type="number" name="salaire" id="salaire">
    </div>

    <div class="form-elem employesection">
        <label for="tauxactivite">Taux d'activité</label>
        <input type="number" name="tauxactivite" id="tauxactivite" >
    </div>

    <div class="form-elem coachsection">
        <label for="coach">Coach</label>
        <input type="checkbox" name="coach" id="coach">
    </div>

    <div class="form-elem employesection certificationsection">
        <label for="certification">Numéro de licence</label>
        <input type="text" name="certification" id="certification">
    </div>

    <button class="btn btn-submit" type="submit">Créer</button>
</form>


<script>
    document.querySelector('#datefincontratsection').style.display = 'none';
    document.querySelector('.certificationsection').style.display = 'none';
    document.querySelector('.employesection').style.display = 'none';
    document.querySelector('.coachsection').style.display = 'none';



    document.querySelector('#employe').addEventListener('change', function() {
        if (this.checked) {
            document.querySelector('.employesection').style.display = 'block';
            document.querySelector('.coachsection').style.display = 'block';
        } else {
            document.querySelector('.employesection').style.display = 'none';
            document.querySelector('.coachsection').style.display = 'none';
        }
    });

    document.querySelector('#coach').addEventListener('change', function() {
        if (this.checked) {
            document.querySelector('.certificationsection').style.display = 'block';
        } else {
            document.querySelector('.certificationsection').style.display = 'none';
        }
    });

    document.querySelector('#abonne').addEventListener('change', function() {
        if (this.checked) {
            document.querySelector('#datefincontratsection').style.display = 'block';
        } else {
            document.querySelector('#datefincontratsection').style.display = 'none';
        }
    });
</script>

<style>
.form-elem {
   position: relative;
   width: 100%;
   display: block;
}

.form-elem > label {
   display: block;
   font-size: 22px;
   padding: 5px;
}

.form-elem > input {
   font-size: 22px;
   width: 100%;
   border-style: solid;
   border-color: black;
   border-width: 2px;
   height: 50px;
   padding: 5px;
   margin-bottom: 20px;
}

.btn-submit {
   font-size: 25px;
   width: 100%;
   margin-bottom: 50px;
   border-color: green !important;
   border-style: solid !important;
   cursor: pointer;
}

.btn-submit:hover {
   color: white !important;
   background-color: green !important;
}
</style>