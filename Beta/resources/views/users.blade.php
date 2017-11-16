@extends('layouts.main')

@section('title','Leden')

@section('content')

    <style>
        .table {
            width: 80% !important;
            margin: 0 auto;
        }

        td img {
            width: 40px;
            border-radius: 50%;
        }

        .table-container {
            background: #fff;
        }

        #addFriend:hover {
            text-decoration-line: underline;
            color: #0d5382
        }

        #addFriend:focus {
            outline: none;
        }
    </style>

<div class="table-container">
    <table id="" class="table">
        <tr>
            <th>Id</th>
            <th>Gebruikersnaam</th>
            <th>Profielfoto</th>
            <th>Vriendschapstatus</th>
            <th>Acties</th>
        </tr>
        @include('users/userlist')
    </table>
</div>
@endsection