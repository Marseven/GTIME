@extends('layouts.admin')

@push('styles')
    <link rel="stylesheet" href="{{ asset('vendors/simple-datatables/style.css') }}">
@endpush

@section('content')


    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Gestion des Utilisateurs</h3>
                    <p class="text-subtitle text-muted">Liste</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Tableau de Bord</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Liste des Rôles
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
                            <i class="fa fa-plus"></i> Créer un rôle
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
                                                        <th>Espace</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($roles as $role)
                                                        @php
                                                            $role->load(['object']);
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $role->id }}</td>
                                                            <td>{{ $role->name }}</td>
                                                            <td>{{ $role->object ? $role->object->name : 'NULL' }}</td>
                                                            <td>
                                                                <button type="button" class="btn btn-primary"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#cardModalView{{ $role->id }}">Voir</button>
                                                                <button type="button" class="btn btn-primary"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#cardModal{{ $role->id }}">Modifer</button>
                                                                <button type="button" class="btn btn-primary"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#cardModalCenter{{ $role->id }}">
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
                    <h4 class="modal-title" id="myModalLabel33">Ajouter un rôle</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="{{ url('admin/security-role') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="col-form-label">Libellé</label>
                            <input type="text" class="form-control" name="name">
                        </div>

                        <div class="mb-3">
                            <label for="security_object_id" class="col-form-label">Espace</label>
                            <select id="selectOne" class="form-control" name="security_object_id">
                                @foreach ($objects as $object)
                                    <option value="{{ $object->id }}">{{ $object->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Fermé</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Enregistrer</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach ($roles as $role)
        <div class="modal fade text-left" id="inlineForm{{ $role->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">{{ $role->name }}</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive mb-3">
                            <table class="table text-nowrap">
                                <thead class="table-light">
                                    <tr>
                                        <th class="w-75">Permissions du rôle</th>
                                        <th><i data-feather="eye" class="icon-sm me-2"></i></th>
                                        <th><i data-feather="plus" class="icon-sm me-2"></i></th>
                                        <th><i data-feather="edit" class="icon-sm me-2"></i></th>
                                        <th><i data-feather="trash-2" class="icon-sm me-2"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rolepermissions as $permission)
                                        @if ($permission->security_role_id == $role->id)

                                            <tr>

                                                <td class="border-top-0">
                                                    {{ $permission->name }}
                                                </td>
                                                <td class="border-top-0">
                                                    <div class="form-check ">
                                                        <input type="checkbox"
                                                            {{ $permission->look == 'on' ? 'checked' : '' }} disabled
                                                            class="form-check-input" id="customCheckOne">
                                                        <label class="form-check-label" for="customCheckOne"></label>
                                                    </div>
                                                </td>
                                                <td class="border-top-0">
                                                    <div class="form-check ">
                                                        <input type="checkbox"
                                                            {{ $permission->creat == 'on' ? 'checked' : '' }} disabled
                                                            class="form-check-input" id="customCheckOne">
                                                        <label class="form-check-label" for="customCheckOne"></label>
                                                    </div>
                                                </td>
                                                <td class="border-top-0">
                                                    <div class="form-check ">
                                                        <input type="checkbox"
                                                            {{ $permission->updat == 'on' ? 'checked' : '' }} disabled
                                                            class="form-check-input" id="customCheckTwo">
                                                        <label class="form-check-label" for="customCheckTwo"></label>
                                                    </div>
                                                </td>
                                                <td class="border-top-0">
                                                    <div class="form-check ">
                                                        <input type="checkbox"
                                                            {{ $permission->del == 'on' ? 'checked' : '' }} disabled
                                                            class="form-check-input" id="customCheckThree">
                                                        <label class="form-check-label" for="customCheckThree"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Fermé</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Enregistrer</span>
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($roles as $role)
        <div class="modal fade" id="cardModalView{{ $role->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelOne">{{ $role->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('admin/security-permission/edit/' . $role->id) }}" method="POST">
                            @csrf
                            <div class="table-responsive mb-3">
                                <table class="table text-nowrap">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="w-75">Permissions du rôle</th>
                                            <th><i data-feather="eye" class="icon-sm me-2"></i></th>
                                            <th><i data-feather="plus" class="icon-sm me-2"></i></th>
                                            <th><i data-feather="edit" class="icon-sm me-2"></i></th>
                                            <th><i data-feather="trash-2" class="icon-sm me-2"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permissions as $permission)
                                            <tr>
                                                <td class="border-top-0">
                                                    {{ $permission->name }}
                                                </td>
                                                <td class="border-top-0">
                                                    <div class="form-check ">
                                                        <input type="checkbox" name="{{ $permission->name }}-view"
                                                            class="form-check-input" id="customCheckOne">
                                                        <label class="form-check-label" for="customCheckOne"></label>
                                                    </div>
                                                </td>
                                                <td class="border-top-0">
                                                    <div class="form-check ">
                                                        <input type="checkbox" name="{{ $permission->name }}-create"
                                                            class="form-check-input" id="customCheckOne">
                                                        <label class="form-check-label" for="customCheckOne"></label>
                                                    </div>
                                                </td>
                                                <td class="border-top-0">
                                                    <div class="form-check ">
                                                        <input type="checkbox" name="{{ $permission->name }}-edit"
                                                            class="form-check-input" id="customCheckTwo">
                                                        <label class="form-check-label" for="customCheckTwo"></label>
                                                    </div>
                                                </td>
                                                <td class="border-top-0">
                                                    <div class="form-check ">
                                                        <input type="checkbox" name="{{ $permission->name }}-delete"
                                                            class="form-check-input" id="customCheckThree">
                                                        <label class="form-check-label" for="customCheckThree"></label>
                                                    </div>
                                                </td>
                                                <input type="hidden" name="role" value="{{ $role->id }}">
                                                <input type="hidden" name="{{ $permission->name }}-permission"
                                                    value="{{ $permission->id }}">

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Fermé</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Enregistrer</span>
                        </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($roles as $role)
        <!-- Modal -->

        <div class="modal fade" id="cardModalCenter{{ $role->id }}" tabindex="-1" role="dialog"
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
                        Êtes-vous sûr de vouloir supprimer ce rôle ?
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Fermé</span>
                        </button>
                        <form method="POST" action="{{ url('admin/security-role/delete/' . $role->id) }}">
                            @csrf
                            <input type="hidden" name="delete" value="true">
                            <button type="submit" class="btn btn-danger ml-1" data-bs-dismiss="modal">
                                <i class="bi bi-trash d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Enregistrer</span>
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
