@extends('layouts.app')

@section('content')
<section><h1>Gestió de casals</h1><a href="/create">Afegir</a></section>

<table>
    <thead>
        <th>Nom</th>
        <th>Data de inici</th>
        <th>Data final</th>
        <th>Num Places</th>
        <th>Ciutat</th>
        <th>Editar</th>
        <th>Eliminar</th>
    </thead>
    <tbody>
        @foreach ($casals as $casal )
            <tr>
                <td>{{$casal->nom}}</td>
                <td>{{$casal->data_inici}}</td>
                <td>{{$casal->data_final}}</td>
                <td>{{$casal->n_places}}</td>
                <td>{{$casal->ciutat->nom}}</td>
                <td><a href="/edit/{{$casal->id}}">Editar</a></td>
                <td><a href="/delete/{{$casal->id}}">Eliminar</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
@stop