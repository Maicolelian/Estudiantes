@extends('layouts.app')

@section('template_title')
    {{ $listum->name ?? "{{ __('Show') Listum" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Listum</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('lista.index') }}"> {{ __('Atras') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $listum->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido:</strong>
                            {{ $listum->apellido }}
                        </div>
                        <div class="form-group">
                            <strong>Genero:</strong>
                            {{ $listum->genero }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $listum->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $listum->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Correo:</strong>
                            {{ $listum->correo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
