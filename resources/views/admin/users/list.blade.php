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
                    <h3>Agents</h3>
                    <p class="text-subtitle text-muted">Liste</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Tableau de Bord</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Liste des utilisateurs
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
                            <i class="fa fa-plus"></i> Créer un utilisateur
                        </button>
                    </div>
                </div>
                <br>

                <div class="card">
                    <!-- Tab content -->
                    <div class="tab-content p-4" id="pills-tabContent-table">
                        <div class="tab-pane tab-example-design fade show active" id="pills-table-design" role="tabpanel"
                            aria-labelledby="pills-table-design-tab">
                            <form class="row g-3 needs-validation" method="POST" action="{{ url('admin/export/') }}">
                                @csrf
                                <input type="hidden" name="type" value="User">
                                <div class="col-md-3">
                                    <input type="text" name="begin" class="form-control datepicker" autocomplete="off"
                                        placeholder="Date de Début" required>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="end" class="form-control datepicker" autocomplete="off"
                                        placeholder="Date de Fin" required>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-select" name="extension" required>
                                        <option>EXCEL</option>
                                        <option>CSV</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <button class="form-control btn btn-primary" type="submit">Expoter</button>
                                </div>
                            </form>
                        </div>
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
                                                        <th>Nom complet</th>
                                                        <th>Email</th>
                                                        <th>Téléphone</th>
                                                        <th>Rôle</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($users as $user)
                                                        <tr>
                                                            <td>{{ $user->id }}</td>
                                                            <td>{{ $user->name }}</td>
                                                            <td>{{ $user->email }}</td>
                                                            <td>{{ $user->phone ?? '' }}</td>
                                                            <td>{{ $user->SecurityRole ? $user->SecurityRole->name : 'Client' }}
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-primary"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#cardModal{{ $user->id }}"><i
                                                                        data-feather="edit"
                                                                        class="icon-sm me-2"></i></button>
                                                                <button type="button" class="btn btn-primary"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#cardModalCenter{{ $user->id }}">
                                                                    Supprimer
                                                                </button>

                                                            </td>
                                                        </tr>
                                                    @endforeach
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
                    <h4 class="modal-title" id="myModalLabel33">Ajouter une agent</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="{{ url('admin-create') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row align-items-center mb-8">
                            <div class="col-md-3 mb-3 mb-md-0">
                                <h5 class="mb-0">Photo de profil</h5>
                            </div>
                            <div class="col-md-9">
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        <img src="{{ asset('media/users/blank.png') }}"
                                            class="rounded-circle avatar avatar-lg" alt="">
                                    </div>
                                    <div>
                                        <input type="file" class="btn btn-outline-white me-1" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-6">
                            <h4 class="mb-1">Informations</h4>

                        </div>

                        <!-- row -->

                        <div class="mb-3 row">
                            <label for="fullName" class="col-sm-4 col-form-label
              form-label">Nom
                                complet</label>
                            <div class="col-sm-4 mb-3 mb-lg-0">
                                <input name="name" ype="text" class="form-control" placeholder="First name" id="name"
                                    required>
                            </div>
                        </div>

                        <!-- row -->
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-4 col-form-label
              form-label">Email</label>
                            <div class="col-md-8 col-12">
                                <input type="email" class="form-control" name="email" placeholder="Email" id="email"
                                    required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="email" class="col-sm-4 col-form-label
              form-label">Téléphone</label>
                            <div class="col-md-8 col-12">
                                <input type="tel" class="form-control" name="phone" placeholder="Téléphone" id="phone"
                                    required>
                            </div>
                        </div>

                        <!-- row -->
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-4 col-form-label
                form-label">Rôle</label>
                            <div class="col-md-8 col-12">
                                <select id="selectOne" class="form-control" name="security_role_id">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
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

    @foreach ($users as $user)
        <div class="modal fade text-left" id="inlineForm{{ $user->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Mettre à jour l'agent</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <form action="{{ url('admin/users/' . $user->id) }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="row align-items-center mb-8">
                                <div class="col-md-3 mb-3 mb-md-0">
                                    <h5 class="mb-0">Photo de profil</h5>
                                </div>
                                <div class="col-md-9">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <img src="{{ asset('media/users/blank.png') }}"
                                                class="rounded-circle avatar avatar-lg" alt="">
                                        </div>
                                        <div>
                                            <input type="file" class="btn btn-outline-white me-1" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6">
                                <h4 class="mb-1">Informations</h4>

                            </div>

                            <!-- row -->

                            <div class="mb-3 row">
                                <label for="fullName" class="col-sm-4 col-form-label
                  form-label">Nom
                                    complet</label>
                                <div class="col-sm-4 mb-3 mb-lg-0">
                                    <input name="name" ype="text" class="form-control" placeholder="First name" id="name"
                                        required>
                                </div>
                            </div>

                            <!-- row -->
                            <div class="mb-3 row">
                                <label for="email"
                                    class="col-sm-4 col-form-label
                  form-label">Email</label>
                                <div class="col-md-8 col-12">
                                    <input type="email" class="form-control" name="email" placeholder="Email" id="email"
                                        required>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="email"
                                    class="col-sm-4 col-form-label
                  form-label">Téléphone</label>
                                <div class="col-md-8 col-12">
                                    <input type="tel" class="form-control" name="phone" placeholder="Téléphone"
                                        id="phone" required>
                                </div>
                            </div>

                            <!-- row -->
                            <div class="mb-3 row">
                                <label for="email"
                                    class="col-sm-4 col-form-label
                    form-label">Rôle</label>
                                <div class="col-md-8 col-12">
                                    <select id="selectOne" class="form-control" name="security_role_id">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
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

    @foreach ($users as $user)
        <div class="modal fade" id="cardModalView{{ $user->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelOne">{{ $user->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-5">
                                <!-- text -->
                                <h6 class="text-uppercase fs-5 ls-2">Agent</h6>
                            </div>
                            <div class="col-6 mb-5">
                                <h6 class="text-uppercase fs-5 ls-2">Nom </h6>
                                <p class="mb-0">{{ $user->libelle }}</p>
                            </div>
                            <div class="col-6 mb-5">
                                <h6 class="text-uppercase fs-5 ls-2">Description </h6>
                                <p class="mb-0">{{ $user->description }}</p>
                            </div>
                            <div class="col-6 mb-5">
                                <h6 class="text-uppercase fs-5 ls-2">Reponsable </h6>
                                <p class="mb-0">{{ $user->responsable }}</p>
                            </div>
                            <div class="col-6">
                                <h6 class="text-uppercase fs-5 ls-2">Email
                                </h6>
                                <p class="mb-0">{{ $user->email }}</p>
                            </div>
                            <div class="col-6">
                                <h6 class="text-uppercase fs-5 ls-2">Téléhone
                                </h6>
                                <p class="mb-0">{{ $user->phone }}</p>
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

    @foreach ($users as $user)
        <!-- Modal -->

        <div class="modal fade" id="cardModalCenter{{ $user->id }}" tabindex="-1" role="dialog"
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
                        Êtes-vous sûr de vouloir supprimer cet agent ?
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Fermé</span>
                        </button>
                        <form method="POST" action="{{ url('admin/admin-user/' . $user->id) }}">
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

    <script src="{{ asset('vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#gt_datatable');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

@endpush
