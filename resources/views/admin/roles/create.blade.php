@extends('layouts.dashboard.app')
@section('title','Nuevo Grupo.')
@push('css')
    <link rel="stylesheet" href="{{asset('plugins/bootstrap-select/css/bootstrap-select.css')}}">
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Agregar un Nuevo Grupo
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{ route('admin.roles.store') }}" method="POST">
                            @csrf
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="name" class="form-control" name="name">
                                    <label class="form-label">Name</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line {{$errors->has('permission') ? 'focused error' : '' }}">
                                    <label for="tags">Selecciona Permisos</label>
                                    <select name="permissions[]" id="permissions" class="selectpicker form-control show-tick" title="Permisos" data-live-search="false" multiple>
                                        @foreach($permission as $p)
                                            <option value="{{$p->id}}">{{$p->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.roles.index') }}">BACK</a>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
@endpush
