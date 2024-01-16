<doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/autofill/2.4.0/css/autoFill.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <!-- <link href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <script src="cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script> -->
    <title></title>
  </head>
  

<x-app-layout>
    <x-slot name="header">
        
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Horaires de départ et d'arrivée ") }}
                </div>
            </div> <br><br>

            <?php

    $horaires = DB::table('_horaire')->get(); 
    ?>


            <table class="table table-light table-striped">
  <thead>
    <tr>
      <th scope="col">Dakar-Diamniadio</th>
      <th scope="col">Heure de départ</th>
      <th scope="col">Heure d'arrivée</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>

    @foreach($horaires as $_horaire)
            <tr>
                <td>{{ $_horaire->id }}</td>
                <td>{{ $_horaire->heure_depart }}</td>
                <td>{{ $_horaire->heure_arrivee }}</td>
                
            </tr>
            @endforeach
      
    </tr>
  </tbody>
</table>




        </div>
    </div>
</x-app-layout>
