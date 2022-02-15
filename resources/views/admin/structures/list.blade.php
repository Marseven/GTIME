@extends('layouts.admin')

@push('styles')
    <link rel="stylesheet" href="{{ asset('vendors/simple-datatables/style.css') }}">
@endpush

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Structures</h3>
                    <p class="text-subtitle text-muted">Liste</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Tableau de Bord</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Liste des Structure
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
                            <i class="fa fa-plus"></i> Créer une structure
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
                                                        <th>Nom</th>
                                                        <th>Responsable</th>
                                                        <th>Téléphone</th>
                                                        <th>Email</th>
                                                        <th>Statut</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($structures as $structure)
                                                        <tr>
                                                            <td>{{ $structure->id }}</td>
                                                            <td>
                                                                <a target="_blank" href="{{ url('/' . $structure->id) }}">
                                                                    {{ $structure->libelle }}
                                                                </a>
                                                            </td>
                                                            <td>{{ $structure->responsable }}</td>
                                                            <td>{{ $structure->telephone }}</td>
                                                            <td>{{ $structure->email }}</td>
                                                            @php
                                                                $status = App\Http\Controllers\Controller::status($structure->status);
                                                            @endphp
                                                            <td><span
                                                                    class="badge bg-{{ $status['type'] }}">{{ $status['message'] }}</span>
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-info"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#cardModalView{{ $structure->id }}"><i
                                                                        class="bi bi-eye"></i></button>
                                                                <button type="button" class="btn btn-primary"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#cardModal{{ $structure->id }}"><i
                                                                        class="bi bi-pencil-square"></i></button>
                                                                <button type="button" class="btn btn-danger"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#cardModalCenter{{ $structure->id }}">
                                                                    <i class="bi bi-trash"></i>
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
                    <h4 class="modal-title" id="myModalLabel33">Ajouter une Structure</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="{{ url('admin/structure') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nom</label>
                            <input type="text" class="form-control" name="libelle" required>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Description </label>
                            <textarea class="form-control" name="description" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Responsable</label>
                            <input type="text" class="form-control" name="responsable" required>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Email</label>
                            <input type="text" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Télphone</label>
                            <input type="text" class="form-control" name="telephone" required>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Statut</label>
                            <select id="selectOne" class="form-control" name="status">
                                @php
                                    App\Http\Controllers\Controller::card_status();
                                @endphp
                            </select>
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

    @foreach ($structures as $structure)
        <div class="modal fade text-left" id="cardModal{{ $structure->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Mettre à jour la structure</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <form action="{{ url('admin/structure/' . $structure->id) }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Nom</label>
                                <input value="{{ $structure->libelle }}" type="text" class="form-control"
                                    name="libelle" required>
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Description </label>
                                <textarea class="form-control" name="description"
                                    required>{{ $structure->description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Responsable</label>
                                <input value="{{ $structure->responsable }}" type="text" class="form-control"
                                    name="responsable" required>
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Email</label>
                                <input value="{{ $structure->email }}" type="text" class="form-control" name="email"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Télphone</label>
                                <input type="text" value="{{ $structure->telephone }}" class="form-control"
                                    name="telephone" required>
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Statut</label>
                                <select id="selectOne" class="form-control" name="status">
                                    @php
                                        App\Http\Controllers\Controller::card_status();
                                    @endphp
                                </select>
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
    @endforeach

    @foreach ($structures as $structure)
        <div class="modal fade" id="cardModalView{{ $structure->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelOne">{{ $structure->libelle }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-5">
                                <!-- text -->
                                <h6 class="text-uppercase fs-5 ls-2">Structure</h6>
                            </div>
                            <div class="col-6 mb-5">
                                <h6 class="text-uppercase fs-5 ls-2">Nom </h6>
                                <p class="mb-0">{{ $structure->libelle }}</p>
                            </div>
                            <div class="col-6 mb-5">
                                <h6 class="text-uppercase fs-5 ls-2">Description </h6>
                                <p class="mb-0">{{ $structure->description }}</p>
                            </div>
                            <div class="col-6 mb-5">
                                <h6 class="text-uppercase fs-5 ls-2">Reponsable </h6>
                                <p class="mb-0">{{ $structure->responsable }}</p>
                            </div>
                            <div class="col-6">
                                <h6 class="text-uppercase fs-5 ls-2">Email
                                </h6>
                                <p class="mb-0">{{ $structure->email }}</p>
                            </div>
                            <div class="col-6">
                                <h6 class="text-uppercase fs-5 ls-2">Téléhone
                                </h6>
                                <p class="mb-0">{{ $structure->phone }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Fermé</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($structures as $structure)
        <!-- Modal -->

        <div class="modal fade" id="cardModalCenter{{ $structure->id }}" tabindex="-1" role="dialog"
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
                        Êtes-vous sûr de vouloir supprimer cette structure ?
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Fermé</span>
                        </button>
                        <form method="POST" action="{{ url('admin/structures/' . $structure->id) }}">
                            @csrf
                            <input type="hidden" name="delete" value="true">
                            <button type="submit" class="btn btn-danger ml-1">
                                <i class="bi bi-trash d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Supprimer</span>
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
