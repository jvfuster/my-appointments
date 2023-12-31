@extends('layouts.panel')

@section('content')

<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
            <h3 class="mb-0">Editar médico</h3>
            </div>
            <div class="col text-right">
            <a href="{{ url('doctors') }}" class="btn btn-sm btn-default">
                Cancelar y volver
            </a>
            </div>
        </div>
    </div>
    <div class="card-body border">
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ url('doctors/'.$doctor->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nombre del médico</label>
            <input type="text" name="name" class="form-control input-lg" value="{{ old('name', $doctor->name) }}" required autofocus>
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
            <input type="text" name="email" class="form-control input-lg" value="{{ old('email', $doctor->email) }}">
            </div>
            <div class="form-group">
                <label for="dni">DNI</label>
            <input type="text" name="dni" class="form-control input-lg" value="{{ old('dni', $doctor->dni) }}">
            </div>
            <div class="form-group">
                <label for="address">Dirección</label>
            <input type="text" name="address" class="form-control input-lg" value="{{ old('address', $doctor->address) }}">
            </div>
            <div class="form-group">
                <label for="phone">Teléfono / móvil</label>
            <input type="text" name="phone" class="form-control input-lg" value="{{ old('phone', $doctor->phone) }}">
            </div>
            <div class="form-group">
                <label for="password">Contraseña </label>
                <input type="text" name="password" class="form-control input-lg" value="">
                <p style="color:#ff002b">Ingrese un valor solo si desea modificar la contraseña.</p>
            </div>
            <button type="submit" class="btn btn-primary">
                Guardar
            </button>
        </form>
    </div>
    
</div>

@endsection
