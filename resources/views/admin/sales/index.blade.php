@extends('layouts.dashboard.app')

@section('title','Ventas')

@push('css')
    <!-- JQuery DataTable Css -->
    <link href="{{ asset('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <a class="btn btn-primary waves-effect" href="#">
                <i class="material-icons">eye</i>
                <span>Ventas.</span>
            </a>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Sku</th>
                                    <th>Nombre</th>
                                    <th>correo</th>
                                    <th>Precio</th>
                                    <th>cantidad</th>
                                    <th>total</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Sku</th>
                                    <th>Nombre</th>
                                    <th>correo</th>
                                    <th>Precio</th>
                                    <th>cantidad</th>
                                    <th>total</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($sales as $key=>$sale)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $sale->product->sku}}</td>
                                        <td>{{ $sale->user->name }}</td>
                                        <td>{{ $sale->user->email}}</td>
                                        <td>{{ $sale->price }}</td>
                                        <td>{{ $sale->amount }}</td>
                                        <td>{{ $sale->total }}</td>
                                        <td class="text-center">
                                            <a href="{{route('admin.products.active',$product->id)}}" class="btn btn-info"><i class="material-icons">
                                                    @if($product->public == 1)done
                                                    @else
                                                        clear
                                                    @endif
                                                </i></a>
                                            <a href="{{route('admin.products.edit',$product->id)}}" class="btn btn-info"><i class="material-icons">create</i></a>
                                            <button class="btn btn-danger waves-effect" type="button" onclick="deleteUsers({{ $product->id }})">
                                                <i class="material-icons">delete</i>
                                            </button>
                                            <form id="delete-form-{{ $product->id }}" action="{{route('admin.products.destroy',$product->id)}}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
@endsection

@push('js')
    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>

    <script src="{{ asset('js/admin-template/pages/tables/jquery-datatable.js') }}"></script>
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
    <script type="text/javascript">
        function deleteUsers(id) {
            swal({
                title: 'Quieres Continuar?',
                text: "este procesos no puede revertirse!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Borrar!',
                cancelButtonText: 'No, Cancelar!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelado',
                        'Sus datos estan a salvo :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush
