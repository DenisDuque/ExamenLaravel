@extends('layouts.app')

@section('content')
<h1>Editar Casal</h1>
<form  action="{{ route('editCasal') }}" method="POST">
    @csrf
    <input id="casalId" name="casalId" type="hidden" value="{{$casal->id}}">
    <div class="row mb-3">
        <label for="nom" class="col-md-4 col-form-label text-md-end">{{ __('Nom') }}</label>

        <div class="col-md-6">
            <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ $casal->nom }}" required autocomplete="nom" autofocus>

            @error('nom')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <label for="data_inici" class="col-md-4 col-form-label text-md-end">{{ __('Data inici') }}</label>

        <div class="col-md-6">
            <input id="data_inici" type="date" class="form-control @error('data_inici') is-invalid @enderror" name="data_inici" value="{{  date('Y/m/d', strtotime($casal->data_inici)) }}" required autocomplete="data_inici" autofocus>

            @error('data_inici')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <label for="data_final" class="col-md-4 col-form-label text-md-end">{{ __('Data final') }}</label>

        <div class="col-md-6">
            <input id="data_final" type="date" class="form-control @error('data_final') is-invalid @enderror" name="data_final" value="{{$casal->data_final }}" required autocomplete="data_final" autofocus>

            @error('data_final')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <label for="n_places" class="col-md-4 col-form-label text-md-end">{{ __('Numero de places') }}</label>

        <div class="col-md-6">
            <input id="n_places" type="number" class="form-control @error('n_places') is-invalid @enderror" name="n_places" value="{{ $casal->n_places }}" required autocomplete="n_places" autofocus>

            @error('n_places')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <label for="ciutat_id" class="col-md-4 col-form-label text-md-end">{{ __('Ciutat') }}</label>

        <div class="col-md-6">
            <select name="ciutat_id" id="ciutat_id">
                @foreach ($ciutats as $ciutat)
                    @if ($ciutat->id === $casal->ciutat_id)
                        <option value="{{$ciutat->id}}" selected>{{$ciutat->nom}}</option>
                    @else
                        <option value="{{$ciutat->id}}">{{$ciutat->nom}}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Editar Casal</button>
</form>
@stop