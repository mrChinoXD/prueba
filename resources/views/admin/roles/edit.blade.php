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
                            Editara un Grupo
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{ route('admin.roles.update' ,$role->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="name" class="form-control" name="name" value="{{$role->name}}">
                                    <label class="form-label">Name</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line {{$errors->has('permission') ? 'focused error' : '' }}">
                                    <label for="permission">Selecciona Permisos</label>
                                    <select name="permission[]" id="tags" class="form-control show-tick" data-live-search="false" multiple>
                                        @foreach($permission as $item)
                                            <option
                                                    @foreach($rolePermissions as $r)
                                                    {{$r == $item->id ? 'selected' : ''}}
                                                    @endforeach
                                                    value="{{$item->id}}">{{$item->name}}
                                            </option>
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
