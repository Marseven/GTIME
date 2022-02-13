@extends('layouts.default')

@push('styles')
    <link href="{{ asset('css/pages/wizard/wizard-2.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
@endpush


@section('content')

    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-12 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Heading-->
                <div class="d-flex flex-column">
                    <!--begin::Title-->
                    <h2 class="text-white font-weight-bold my-2 mr-5">Demande de Carte Prépayée</h2>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <div class="d-flex align-items-center font-weight-bold my-2">
                        <!--begin::Item-->
                        <a href="{{ route('home') }}" class="opacity-75 hover-opacity-100">
                            <i class="flaticon2-shelter text-white icon-1x"></i>
                        </a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="#" class="text-white text-hover-white opacity-75 hover-opacity-100">Demande de Carte
                            Prépayée</a>
                        <!--end::Item-->
                    </div>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Heading-->
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->


    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="card card-custom gutter-b">
                <div class="card-header card-header-tabs-line">
                    <div class="card-toolbar">
                        <ul class="nav nav-tabs nav-bold nav-tabs-line">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1_4">
                                    <span class="nav-icon"><img src="{{ asset('media/logos/icon-1.png') }}"
                                            style="width: 80%; height:auto;" alt="Orabank"></span>
                                    <span class="nav-text">Orabank</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2_4">
                                    <span class="nav-icon"><img src="{{ asset('media/logos/uba.png') }}"
                                            style="width: 80%; height:auto;" alt="UBA"></span>
                                    <span class="nav-text">UBA</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_3_4">
                                    <span class="nav-icon"><img src="{{ asset('media/logos/eco.png') }}"
                                            style="width: 80%; height:auto;" alt="Ecobank"></i></span>
                                    <span class="nav-text">Ecobank</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="kt_tab_pane_1_4" role="tabpanel"
                            aria-labelledby="kt_tab_pane_1_4">
                            @include('request_card.orabank')
                        </div>
                        <div class="tab-pane fade" id="kt_tab_pane_2_4" role="tabpanel" aria-labelledby="kt_tab_pane_2_4">
                            @include('request_card.uba')
                        </div>
                        <div class="tab-pane fade" id="kt_tab_pane_3_4" role="tabpanel" aria-labelledby="kt_tab_pane_3_4">
                            @include('request_card.ecobank')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->


@endsection

@push('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

    <script language="JavaScript">
        function afficherPro() {
            var professionel = document.getElementById("professionel");

            if (document.request.profil_pro.value == "Sans emploi" || document.request.profil_pro.value ==
                "À votre compte") {
                professionel.style.display = "none";
            } else {
                professionel.style.display = "block";
            }
        }

        function afficherOrabank() {
            var orabank = document.getElementById("orabank");

            if (document.request.account_orabank.value == "yes") {
                orabank.style.display = "block";
            } else {
                orabank.style.display = "none";
            }
        }

        function afficherDelivery() {
            var delivery_section = document.getElementById("delivery_section");

            if (document.request.delivery.value == "yes") {
                delivery_section.style.display = "block";
            } else {
                delivery_section.style.display = "none";
            }
        }

        const phoneInputField = document.querySelector("#phonenumber");
        const phoneInput = window.intlTelInput(phoneInputField, {
            preferredCountries: ["ga", "fr", "cm", "us"],
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",

        });

        var KTInputmask = function() {

            // Private functions
            var demos = function() {

                // empty placeholder
                $("#phonenumber").inputmask({
                    "mask": "999999999",
                    placeholder: "077010203" // remove underscores from the input mask
                });

                $("#birthday").inputmask("9999-99-99", {
                    "placeholder": "yyyy-mm-dd",
                    autoUnmask: true
                });

            }


            return {
                // public functions
                init: function() {
                    demos();
                }
            };
        }();

        var KTWizard2 = function() {
            // Base elements
            var _wizardEl;
            var _formEl;
            var _wizardObj;
            var _validations = [];

            // Private functions
            var _initWizard = function() {
                // Initialize form wizard
                _wizardObj = new KTWizard(_wizardEl, {
                    startStep: 1, // initial active step number
                    clickableSteps: true // to make steps clickable this set value true and add data-wizard-clickable="true" in HTML for class="wizard" element
                });

                // Validation before going to next page
                _wizardObj.on('change', function(wizard) {
                    if (wizard.getStep() > wizard.getNewStep()) {
                        return; // Skip if stepped back
                    }

                    // Validate form before change wizard step
                    var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step

                    if (validator) {
                        validator.validate().then(function(status) {
                            if (status == 'Valid') {
                                wizard.goTo(wizard.getNewStep());

                                KTUtil.scrollTop();
                            } else {
                                Swal.fire({
                                    text: "Désolé, il semble que des erreurs aient été détectées, veuillez vérifier le formulaire.",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok",
                                    customClass: {
                                        confirmButton: "btn font-weight-bold btn-light"
                                    }
                                }).then(function() {
                                    KTUtil.scrollTop();
                                });
                            }
                        });
                    }

                    return false; // Do not change wizard step, further action will be handled by he validator
                });

                // Change event
                _wizardObj.on('changed', function(wizard) {
                    KTUtil.scrollTop();
                });

                // Submit event
                _wizardObj.on('submit', function(wizard) {

                    // Validate form before change wizard step
                    var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step

                    if (validator) {
                        validator.validate().then(function(status) {
                            if (status == 'Valid') {
                                _formEl.submit(); // Submit form
                            } else {
                                Swal.fire({
                                    text: "Désolé, il semble que des erreurs aient été détectées, veuillez vérifier le formulaire.",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok",
                                    customClass: {
                                        confirmButton: "btn font-weight-bold btn-light"
                                    }
                                }).then(function() {
                                    KTUtil.scrollTop();
                                });
                            }
                        });
                    }

                    return false;

                });
            }

            var _initValidation = function() {
                // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
                // Step 1
                _validations.push(FormValidation.formValidation(
                    _formEl, {
                        fields: {
                            civility: {
                                validators: {
                                    notEmpty: {
                                        message: 'La civilité est obligatoire.'
                                    }
                                }
                            },
                            lastname: {
                                validators: {
                                    notEmpty: {
                                        message: 'Le nom est obligatoire.'
                                    }
                                }
                            },
                            birthday: {
                                validators: {
                                    notEmpty: {
                                        message: 'La date de naissance est obligatoire.'
                                    }
                                }
                            },
                            birthplace: {
                                validators: {
                                    notEmpty: {
                                        message: 'Le lieu de naissance est obligatoire.'
                                    }
                                }
                            },
                            country: {
                                validators: {
                                    notEmpty: {
                                        message: 'Le pays est obligatoire.'
                                    }
                                }
                            },
                            profession: {
                                validators: {
                                    notEmpty: {
                                        message: 'La profession est obligatoire.'
                                    }
                                }
                            },
                            marital: {
                                validators: {
                                    notEmpty: {
                                        message: 'Lsituation matrimonial est obligatoire.'
                                    }
                                }
                            },
                            adress: {
                                validators: {
                                    notEmpty: {
                                        message: 'L\'adresse est obligatoire.'
                                    }
                                }
                            },
                            type_id_card: {
                                validators: {
                                    notEmpty: {
                                        message: 'Le type de pièce est obligatoire.'
                                    }
                                }
                            },
                            number_id_card: {
                                validators: {
                                    notEmpty: {
                                        message: 'Le numéro de votre pièce est obligatoire.'
                                    }
                                }
                            },
                            id_card: {
                                validators: {
                                    notEmpty: {
                                        message: 'La pièce jointe est obligatoire.'
                                    },
                                    file: {
                                        maxSize: '1048576',
                                        message: 'La pièce jointe est trop lourde. ( 1Mo Maximum )',
                                    },
                                }
                            },
                            phone: {
                                validators: {
                                    notEmpty: {
                                        message: 'Le téléphone est obligatoire.'
                                    }
                                }
                            },
                            email: {
                                validators: {
                                    notEmpty: {
                                        message: 'l\'email est obligatoire'
                                    },
                                    emailAddress: {
                                        message: 'l\'email n\'est pas valide'
                                    }
                                }
                            }
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            // Bootstrap Framework Integration
                            bootstrap: new FormValidation.plugins.Bootstrap({
                                //eleInvalidClass: '',
                                eleValidClass: '',
                            })
                        }
                    }
                ));

                // Step 2
                _validations.push(FormValidation.formValidation(
                    _formEl, {
                        fields: {
                            address1: {
                                validators: {
                                    notEmpty: {
                                        message: 'Address is required'
                                    }
                                }
                            },
                            postcode: {
                                validators: {
                                    notEmpty: {
                                        message: 'Postcode is required'
                                    }
                                }
                            },
                            city: {
                                validators: {
                                    notEmpty: {
                                        message: 'City is required'
                                    }
                                }
                            },
                            state: {
                                validators: {
                                    notEmpty: {
                                        message: 'State is required'
                                    }
                                }
                            },
                            country: {
                                validators: {
                                    notEmpty: {
                                        message: 'Country is required'
                                    }
                                }
                            },
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            // Bootstrap Framework Integration
                            bootstrap: new FormValidation.plugins.Bootstrap({
                                //eleInvalidClass: '',
                                eleValidClass: '',
                            })
                        }
                    }
                ));

                // Step 3
                _validations.push(FormValidation.formValidation(
                    _formEl, {
                        fields: {
                            delivery: {
                                validators: {
                                    notEmpty: {
                                        message: 'Delivery type is required'
                                    }
                                }
                            },
                            packaging: {
                                validators: {
                                    notEmpty: {
                                        message: 'Packaging type is required'
                                    }
                                }
                            },
                            preferreddelivery: {
                                validators: {
                                    notEmpty: {
                                        message: 'Preferred delivery window is required'
                                    }
                                }
                            }
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            // Bootstrap Framework Integration
                            bootstrap: new FormValidation.plugins.Bootstrap({
                                //eleInvalidClass: '',
                                eleValidClass: '',
                            })
                        }
                    }
                ));

                // Step 4
                _validations.push(FormValidation.formValidation(
                    _formEl, {
                        fields: {
                            locaddress1: {
                                validators: {
                                    notEmpty: {
                                        message: 'Address is required'
                                    }
                                }
                            },
                            locpostcode: {
                                validators: {
                                    notEmpty: {
                                        message: 'Postcode is required'
                                    }
                                }
                            },
                            loccity: {
                                validators: {
                                    notEmpty: {
                                        message: 'City is required'
                                    }
                                }
                            },
                            locstate: {
                                validators: {
                                    notEmpty: {
                                        message: 'State is required'
                                    }
                                }
                            },
                            loccountry: {
                                validators: {
                                    notEmpty: {
                                        message: 'Country is required'
                                    }
                                }
                            }
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            // Bootstrap Framework Integration
                            bootstrap: new FormValidation.plugins.Bootstrap({
                                //eleInvalidClass: '',
                                eleValidClass: '',
                            })
                        }
                    }
                ));

                // Step 5
                _validations.push(FormValidation.formValidation(
                    _formEl, {
                        fields: {
                            agree: {
                                validators: {
                                    notEmpty: {
                                        message: 'Confimer les conditions d\'utilisations.'
                                    }
                                }
                            }
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            // Bootstrap Framework Integration
                            bootstrap: new FormValidation.plugins.Bootstrap({
                                //eleInvalidClass: '',
                                eleValidClass: '',
                            })
                        }
                    }
                ));
            }

            return {
                // public functions
                init: function() {
                    _wizardEl = KTUtil.getById('kt_wizard');
                    _formEl = KTUtil.getById('kt_form');

                    _initWizard();
                    _initValidation();
                }
            };
        }();

        // Class definition
        var KTSelect2 = function() {

            // Private functions
            var demos = function() {
                // basic
                $('#kt_select2_1').select2({
                    placeholder: "Selectioner le lieu"
                });

                // Public functions
                return {
                    init: function() {
                        demos();
                        modalDemos();
                    }
                };
            }();
        }();

        jQuery(document).ready(function() {
            KTInputmask.init();
            KTWizard2.init();
            KTSelect2.init();
        });
    </script>
@endpush
