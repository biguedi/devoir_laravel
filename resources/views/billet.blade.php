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
    
    <style>

body {
  font-family: 'lato', sans-serif;
}
.container {
  max-width: 1000px;
  margin-left: auto;
  margin-right: auto;
  padding-left: 10px;
  padding-right: 10px;
}

h2 {
  font-size: 26px;
  margin: 20px 0;
  text-align: center;
  small {
    font-size: 0.5em;
  }
}

.responsive-table {
  li {
    border-radius: 3px;
    padding: 25px 30px;
    display: flex;
    justify-content: space-between;
    margin-bottom: 25px;
  }
  .table-header {
    background-color: #95A5A6;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.03em;
  }
  .table-row {
    background-color: #ffffff;
    box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.1);
  }
  .col-1 {
    flex-basis: 20%;
  }
  .col-2 {
    flex-basis: 20%;
  }
  .col-3 {
    flex-basis: 25%;
  }
  .col-4 {
    flex-basis: 25%;
  }
  
  @media all and (max-width: 767px) {
    .table-header {
      display: none;
    }
    .table-row{
      
    }
    li {
      display: block;
    }
    .col {
      
      flex-basis: 100%;
      
    }
    .col {
      display: flex;
      padding: 10px 0;
      &:before {
        color: #6C7A89;
        padding-right: 10px;
        content: attr(data-label);
        flex-basis: 50%;
        text-align: right;
      }
    }
  }
}

    </style>
             
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __(" ") }}
                </div>
            </div> <br><br>

    <?php
        $reservation = DB::table('reservations')->get(); 
    ?>


<div class="container">
  <ul class="responsive-table">
    <li class="table-header">
      <div class="col col-1">Trajet</div>
      <div class="col col-2">Classe</div>
      <div class="col col-3">Date</div>
      
      <div class="col col-4">Code QR</div>
    </li>

    @foreach($reservation as $reservations)
    <li class="table-row">
      <div class="col col-1" data-label="trajet">{{ $reservations->trajet }}</div>
      <div class="col col-2" data-label="classe">{{ $reservations->classe }}</div>
      <div class="col col-3" data-label="date">{{ $reservations->date }}</div>
        
      <div class="col col-4" data-label="code_qr">
      @if(isset($reservations->qr_code))
        <img src="data:image/png;base64,{{ $reservations->qr_code }}" alt="QR Code">
        <p>Valide jusqu'au : {{ $reservations->date_expiration }}</p>
      @endif
      </div>
    </li>
    @endforeach    


  </ul>
</div>

        </div>
    </div>
</x-app-layout>
