@extends('layouts.admin')

@push('styles')
    <link rel="stylesheet" href="{{ asset('vendors/simple-datatables/style.css') }}">
@endpush

@section('content')


    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Services</h3>
                    <p class="text-subtitle text-muted">Liste</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Tableau de Bord</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Liste des Service
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
                            <i class="fa fa-plus"></i> Créer un service
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
                                                        <th>Description</th>
                                                        <th>Position</th>
                                                        <th>Structure</th>
                                                        <th>Statut</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($services as $service)
                                                        <tr>
                                                            <td>{{ $service->id }}</td>
                                                            <td>{{ $service->libelle }}</td>
                                                            <td>{{ $service->description }}</td>
                                                            <td>{{ $service->position }}</td>
                                                            @php
                                                                $service->load(['structure']);
                                                                $status = App\Http\Controllers\Controller::status($service->status);
                                                            @endphp
                                                            <td>{{ $service->structure->libelle }}</td>
                                                            <td><span
                                                                    class="badge bg-{{ $status['type'] }}">{{ $status['message'] }}</span>
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-info"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#cardModalView{{ $service->id }}"><i
                                                                        class="bi bi-eye"></i></button>
                                                                <button type="button" class="btn btn-primary"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#cardModal{{ $service->id }}"><i
                                                                        class="bi bi-pencil-square"></i></button>
                                                                <button type="button" class="btn btn-danger"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#cardModalCenter{{ $service->id }}">
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
                    <h4 class="modal-title" id="myModalLabel33">Ajouter un service</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="{{ url('admin/service') }}" method="POST">
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
                            <label for="recipient-name" class="col-form-label">Position</label>
                            <input type="number" class="form-control" name="position" required>
                        </div>
                        @if (Auth::user()->security_role_id == 1)
                            <div class="mb-3">
                                <label for="email" class="col-form-label form-label">Structure</label>
                                <select id="selectOne" class="form-control" name="structure_id">
                                    @foreach ($structures as $structure)
                                        <option value="{{ $structure->id }}">{{ $structure->libelle }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @else
                            <input type="hidden" name="structure_id" value="{{ Auth::user()->structure_id }}">
                        @endif
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

    @foreach ($services as $service)
        <div class="modal fade text-left" id="cardModal{{ $service->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Mettre à jour le service</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <form action="{{ url('admin/service/' . $service->id) }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Nom</label>
                                <input value="{{ $service->libelle }}" type="text" class="form-control" name="libelle"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Description </label>
                                <textarea class="form-control" name="description"
                                    required>{{ $service->description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Position</label>
                                <input type="number" value="{{ $service->position }}" class="form-control"
                                    name="position" required>
                            </div>
                            @if (Auth::user()->security_role_id == 1)
                                <div class="mb-3">
                                    <label for="email" class="col-form-label form-label">Structure</label>
                                    <select id="selectOne" class="form-control" name="structure_id">
                                        @foreach ($structures as $structure)
                                            <option value="{{ $structure->id }}">{{ $structure->libelle }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @else
                                <input type="hidden" name="structure_id" value="{{ Auth::user()->structure_id }}">
                            @endif
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

    @foreach ($services as $service)
        <div class="modal fade" id="cardModalView{{ $service->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelOne">{{ $service->libelle }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-5">
                                <!-- text -->
                                <h6 class="text-uppercase fs-5 ls-2">Service</h6>
                            </div>
                            <div class="col-6 mb-5">
                                <h6 class="text-uppercase fs-5 ls-2">Nom </h6>
                                <p class="mb-0">{{ $service->libelle }}</p>
                            </div>
                            <div class="col-6 mb-5">
                                <h6 class="text-uppercase fs-5 ls-2">Description </h6>
                                <p class="mb-0">{{ $service->description }}</p>
                            </div>
                            <div class="col-6 mb-5">
                                <h6 class="text-uppercase fs-5 ls-2">position </h6>
                                <p class="mb-0">{{ $service->position }}</p>
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

    @foreach ($services as $service)
        <!-- Modal -->

        <div class="modal fade" id="cardModalCenter{{ $service->id }}" tabindex="-1" role="dialog"
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
                        Êtes-vous sûr de vouloir supprimer ce service ?
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Fermé</span>
                        </button>
                        <form method="POST" action="{{ url('admin/services/' . $service->id) }}">
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
