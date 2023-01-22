@extends('layouts.main')

@section('title', 'Organisation d\'un cours')

@section('content')

<a href="/features/organizeCourse" class="goBack">Retour aux cours</a>

<h1>Organisation d'un cours</h1>

<form action="/features/organizeCourse/update/{{ $cours->numcours }}" method="POST">
    <div class="form-elem">
        <label for="typecours">Type de cours</label>
        <input type="text" name="typecours" id="typecours" value="{{ $cours->typecours }}">
    </div>
    <div class="form-elem">
        <label for="heurecours">Heure</label>
        <input type="time" name="heurecours" id="heurecours" value="{{ $cours->heurecours }}">
    </div>
    <div class="form-elem">
        <label for="datecours">Date</label>
        <input type="date" name="datecours" id="datecours" required value="{{ $cours->datecours }}">
    </div>

    <div class="form-elem">
        <label for="coach" >Coach</label>
        <select name="coach[]" id="coach" multiple>
            @foreach($coaches as $coach)
                <option @if(in_array($coach->numavs, $selectedCoaches)){ selected } @endif value="{{ $coach->numavs }}">{{ $coach->nom }} {{ $coach->prenom }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-elem">
        <label for="abonne">Abonnés</label>
        <select name="abonne[]" id="abonne" multiple>
            @foreach($abonnes as $abonne)
                <option @if(in_array($abonne->numavs, $selectedAbonnes)){ selected } @endif value="{{ $abonne->numavs }}">{{ $abonne->nom }} {{ $abonne->prenom }}</option>
            @endforeach
        </select>
        <a href="/personne/create">Créer un abonné</a>
        <a href="/features/organizeCours/abonne/{{ $cours->numcours }}">Voir la liste des abonnés inscrits</a>
    </div>

    <div class="form-elem">
        <label for="local" >Local</label>
        <select name="local" id="local">
            @foreach($locals as $local)
                <option @if($local->numlocal == $cours->numlocal){ selected } @endif value="{{ $local->numlocal }}">{{ $local->ville }} {{ $local->codepostale }}, {{ $local->rue }} {{ $local->numeroderue }}</option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-submit" type="submit">Modifier</button>
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
   border-color: orange !important;
   border-style: solid !important;
   cursor: pointer;
}

.btn-submit:hover {
   color: white !important;
   background-color: orange !important;
}
</style>