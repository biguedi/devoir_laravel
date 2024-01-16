<x-app-layout>
    <x-slot name="header">

    </x-slot>

        </div>
    </div>
</x-app-layout>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>

        <style>
            *, *:before, *:after {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  font-family: 'Nunito', sans-serif;
  color: #384047;
  background-color : rgb(238 242 255);
}

form {
  max-width: 300px;
  margin: 10px auto;
  padding: 10px 20px;
  background: rgb(165 180 252);
  border-radius: 8px;
}

h1 {
  margin: 0 0 30px 0;
  text-align: center;
}

input[type="text"],
input[type="password"],
input[type="date"],
input[type="datetime"],
input[type="email"],
input[type="number"],
input[type="search"],
input[type="tel"],
input[type="time"],
input[type="url"],
textarea,
select {
  background: rgba(255,255,255,0.1);
  border: none;
  font-size: 16px;
  height: auto;
  margin: 0;
  outline: 0;
  padding: 15px;
  width: 100%;
  background-color: #e8eeef;
  color: #8a97a0;
  box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
  margin-bottom: 30px;
}

input[type="radio"],
input[type="checkbox"] {
  margin: 0 4px 8px 0;
}

select {
  padding: 6px;
  height: 32px;
  border-radius: 2px;
}
















fieldset {
  margin-bottom: 30px;
  border: none;
}

legend {
  font-size: 1.4em;
  margin-bottom: 10px;
}

label {
  display: block;
  margin-bottom: 8px;
}

label.light {
  font-weight: 300;
  display: inline;
}

.number {
  background-color: #5fcf80;
  color: #fff;
  height: 30px;
  width: 30px;
  display: inline-block;
  font-size: 0.8em;
  margin-right: 4px;
  line-height: 30px;
  text-align: center;
  text-shadow: 0 1px 0 rgba(255,255,255,0.2);
  border-radius: 100%;
}

@media screen and (min-width: 480px) {

  form {
    max-width: 480px;
  }

}
        </style>
    </head>
    <body>

<?php

$horaires = DB::table('_horaire')->get(); 
?>
    

    <form action="{{ route('reservation') }}" method="POST">
    @csrf
        
        <h1>Reservez un billet</h1>


          <label for="">Trajet</label>
          <select id="trajet" name="trajet">
              <option value="dakar-diamniadio">Dakar-Diamniadio</option>
              <option value="diamniadio-dakar">Diamniadio-Dakar</option>
          </select>       
          </br>  
                 
          
          <label for="">Classe:</label>
          <input type="radio" id="" value="affaire" name="classe"><label for="affaire" class="light">Affaire</label><br>
          <input type="radio" id="" value="economique" name="classe"><label for="economique" class="light">Economique</label>
          </br>
          </br>

                <label for="">Date</label>
                <input type="date" class="form-control" name="date">
                </br>
                </br>
          
          <label for="">Heure de départ</label>
                <select name="horaire_id" id="" class="form-control">
                    @foreach($horaires as $_horaire)
                        <option value="{{ $_horaire->id }}">{{ $_horaire->heure_depart }}</option>
                    @endforeach
                </select> 
        
          
          
        <button type="submit">Enregistrer</button>
        
      </form>
      
      
    </body>
</html>
