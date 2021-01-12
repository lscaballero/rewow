@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-sm-12">
            @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            <a class="btn btn-primary" href="{{ route('pet.create') }}">Crear Mascota</a>
            <ul class="list-group">
                @foreach ($pets as $pet)
                <li class="list-group-item">{{ $pet->name }}</li>
                @if ($pet->image)
                <li class="list-group-item">
                    {{-- <img class="img-fluid" src="{{ url('/pet/image/'.$pet->image) }}" alt="" /> --}}
                    <img class="img-fluid" src="{{ route('pet.image', ['filename' => $pet->image]) }}" />
                </li>
                @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
