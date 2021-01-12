@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    Crear Mascota
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('pet.save') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input id="pet-image" class="form-control" type="file" name="image" required />
                            @if ($errors->has('image'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input id="pet-name" class="form-control" type="text" name="name" placeholder="Nombre de la mascota" required />
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <select id="pet-type" class="custom-select" name="type" required>
                                <option disabled selected value>Tipo de mascota </option>
                                @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->type_pet_value }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('type'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('type') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <select id="pet-size" class="custom-select" name="size" required>
                                <option disabled selected value>Tamaño de la mascota </option>
                                @foreach ($sizes as $size)
                                <option value="{{ $size->id }}">{{ $size->size_pet_value }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('size'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('size') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input id="pet-age" class="form-control" type="number" name="age" placeholder="Edad" required />
                            @if ($errors->has('age'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('age') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input id="pet-race" class="form-control" type="text" name="race" placeholder="Raza" required />
                            @if ($errors->has('race'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('race') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-0">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Crear') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
