@extends('layouts.admin')

@push('styles')
    <link rel="stylesheet" href="{{ asset('vendors/simple-datatables/style.css') }}">
@endpush

@section('content')


    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Gestion des utilisateurs</h3>
                    <p class="text-subtitle text-muted">Liste</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Tableau de Bord</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Liste des Permissions
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="container-fluid px-6 py-4">
                <div class="row">
                    <div class="col-sm-12" align="right">
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                            data-bs-target="#inlineForm">
                            <i class="fa fa-plus"></i> Créer une permission
                        </button>
                    </div>
                </div>
                <br>
                <div class="py-6">
                    <!-- table -->
                    <div class="row mb-6">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <!-- Card -->
                            <div class="card">
                                <!-- Tab content -->
                                <div class="tab-content p-4" id="pills-tabContent-table">
                                    <div class="tab-pane tab-example-design fade show
                        active"
                                        id="pills-table-design" role="tabpanel" aria-labelledby="pills-table-design-tab">
                                        <!-- Basic table -->
                                        <div class="table-responsive">
                                            <table class="table" id="gt_datatable">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Libellé</th>
                                                        <th>Description</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($permissions as $permission)
                                                        <tr>
                                                            <td>{{ $permission->id }}</td>
                                                            <td>{{ $permission->name }}</td>
                                                            <td>{{ $permission->description }}</td>
                                                            <td>
                                                                <button type="button" class="btn btn-danger"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#cardModalCenter{{ $permission->id }}">
                                                                    Supprimer
                                                                </button>

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- Basic table -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Ajouter une permission</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="{{ url('admin/security-permission') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="col-form-label">Libellé</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="security_object_id" class="col-form-label">Description</label>
                            <textarea class="form-control" name="description" id="message-text"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Fermé</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Enregistrer</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach ($permissions as $permission)
        <!-- Modal -->

        <div class="modal fade" id="cardModalCenter{{ $permission->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Suppression</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Êtes-vous sûr de vouloir supprimer cette permission ?
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Fermé</span>
                        </button>
                        <form method="POST" action="{{ url('admin/security-permission/delete/' . $permission->id) }}">
                            @csrf
                            <input type="hidden" name="delete" value="true">
                            <button type="submit" class="btn btn-danger ml-1" ">
                                        <i class="  bi bi-trash d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">valider</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection

@push('scripts')

    <script src="{{ asset('vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#gt_datatable');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

@endpush
