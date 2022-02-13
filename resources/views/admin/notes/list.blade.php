@extends('layouts.admin')

@push('styles')
    <link rel="stylesheet" href="{{ asset('vendors/simple-datatables/style.css') }}">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
@endpush

@section('content')


    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Notes</h3>
                    <p class="text-subtitle text-muted">Liste</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Tableau de Bord</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Liste des notes
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="container-fluid px-6 py-4">

                <div class="card">
                    <!-- Tab content -->
                    <div class="tab-content p-4" id="pills-tabContent-table">
                        <div class="tab-pane tab-example-design fade show active" id="pills-table-design" role="tabpanel"
                            aria-labelledby="pills-table-design-tab">
                            <form class="row g-3 needs-validation" method="GET" action="{{ url('admin/list-notes/') }}">
                                @csrf
                                <input type="hidden" name="type" value="User">
                                <div class="col-md-3">
                                    <input type="text" name="begin" class="form-control datepicker" autocomplete="off"
                                        placeholder="Date de Début" required>
                                </div>
                                <div class="col-md-3">
                                    <button class="form-control btn btn-primary" type="submit">Filtrer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

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
                                                        <th>Structure</th>
                                                        <th>Service</th>
                                                        <th>Ticket</th>
                                                        <th>Date</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($notes as $note)
                                                        <tr>
                                                            <td>{{ $note->id }}</td>
                                                            <td>{{ $note->structure->libelle }}</td>
                                                            <td>{{ $note->service->libelle }}</td>
                                                            <td>{{ $note->ticket->numero }}</td>
                                                            <td>{{ $note->created_at }}</td>
                                                            <td>
                                                                <button type="button" class="btn btn-info"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#cardModalView{{ $note->id }}"><i
                                                                        data-feather="eye"
                                                                        class="icon-sm me-2"></i></button>
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

    @foreach ($notes as $note)
        <div class="modal fade" id="cardModalView{{ $note->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelOne">Note N°{{ $note->id }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-5">
                                <!-- text -->
                                <h6 class="text-uppercase fs-5 ls-2">Note</h6>
                            </div>
                            <div class="col-6 mb-5">
                                <h6 class="text-uppercase fs-5 ls-2">Entreprise </h6>
                                <p class="mb-0">{{ $note->structure->libelle }}</p>
                            </div>
                            <div class="col-6 mb-5">
                                <h6 class="text-uppercase fs-5 ls-2">Service </h6>
                                <p class="mb-0">{{ $note->service->libelle }}</p>
                            </div>
                            <div class="col-6">
                                <h6 class="text-uppercase fs-5 ls-2">Agent
                                </h6>
                                <p class="mb-0">{{ $note->user->name }}</p>
                            </div>
                            <div class="col-6 mb-5">
                                <h6 class="text-uppercase fs-5 ls-2">Ticket </h6>
                                <p class="mb-0">{{ $note->ticket->numero }}</p>
                            </div>
                            <div class="col-6">
                                <h6 class="text-uppercase fs-5 ls-2">Note
                                </h6>
                                <p class="mb-0">{{ $note->note }} Étoile(s)</p>
                            </div>
                            <div class="col-6">
                                <h6 class="text-uppercase fs-5 ls-2">Commentaire
                                </h6>
                                <p class="mb-0">{{ $note->commentaire }}</p>
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

@endsection

@push('scripts')

    <script src="{{ asset('vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#gt_datatable');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
    <!--end::Page Vendors-->

    <script>
        $(function() {
            $('.datepicker').datepicker({
                endDate: new Date(),
            });
        });
    </script>

@endpush
