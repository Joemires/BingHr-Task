<x-app-layout>
    @push('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/css/intlTelInput.css">

        <style>
            body {
                /* font-size: 14px; */
            }
            .iti, .intl-tel-input {
                width: 100%;
                font-size: 14px
            }

            table,
            table h5 {
                font-size: 14px
            }

            table .action {
                font-size: 18px
            }

            .table-responsive thead tr th {
                padding-top: .7rem;
                padding-bottom: .7rem;
                border: none;
                color: #b7c0d1
            }

            .table-responsive > div.allow-pad,
            .table-responsive tr>th,
            .table-responsive tr>td {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .table-responsive tr td {
                vertical-align: middle;
            }

            table.last-border-none tr:last-child td {
                border: none
            }

            input.error + label.error, select.error + label.error {
                color: #ff9494;
                margin-top: 5px;
                font-size: 12px;
            }

            .table-responsive .form-group label.error {
                /* margin: 20px */
                border-top: 1px solid #dee2e6;
                padding: .3rem 1.5rem;
                padding-right: 1.5rem;
                margin: 0;
                display: block
            }

        </style>
    @endpush
    <div class="row gap-3">
        <div class="col-12 text-end">
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addNewUserModal">Add
                User</button>
        </div>
        <div class="col-12">
            <div class="table-responsive bg-white rounded-0">
                <div class="d-flex align-items-center justify-content-between py-2 allow-pad">
                    <h5 class="m-0" style="font-size: 18px">List Users</h5>

                    <div class="form-group m-0 position-relative">
                        <input type="text" class="form-control form-control-sm pe-5" placeholder="Search">
                        <i class="bx bx-search position-absolute top-0 h-100 d-flex align-items-center text-muted me-2"
                            style="right: 0;"></i>
                    </div>
                </div>
                <table class="table table-hover mb-0">
                    <thead class="pt-5" style="background-color: #eff4fa">
                        <tr class="px-3">
                            <th>Name</th>
                            <th></th>
                            <th>Created Date</th>
                            <th>Role</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            {!! $user->avatarSvg !!}
                                            {{-- <i class="bx bx-user"></i> --}}
                                            {{-- <img src="images/avatar.svg" class="rounded-circle" alt="Sample Image"> --}}
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h5 class="m-0 f-large">
                                                {{ $user->name }}
                                                <small class="d-block text-muted">{{ $user->email }}</small>
                                            </h5>
                                        </div>
                                    </div>
                                </td>
                                <td>{!! role_badge($user->roles->first()->name) !!}</td>
                                {{-- <td><span class="badge bg-success">{{ $user->roles->first()->display_name }}</span></td> --}}
                                <td>{{ $user->created_at->format('jS M, Y') }}</td>
                                <td>{{ App\Enums\UserPosition::getTitle($user->position) }}</td>
                                <td class="text-end action">
                                    <a class="text-muted me-1 edit" href="{{ route('backend.users.edit', $user->identifier) }}"> <i class="bx bx-edit"></i> </a>
                                    <a class="text-muted trash" href="{{ route('backend.users.destroy', $user->identifier) }}"> <i class="bx bx-trash"></i> </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('modals')
        <!-- Modal -->
        <div class="modal fade" id="addNewUserModal" tabindex="-1" aria-labelledby="addNewUserModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('backend.users.store') }}" method="POST">
                        <div class="modal-body">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mb-2">
                                        <input type="text" class="form-control form-control-sm" name="identifier" placeholder="Employee ID*">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-2">
                                        <input type="text" class="form-control form-control-sm" name="first_name" placeholder="First Name*">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-2">
                                        <input type="text" class="form-control form-control-sm" name="last_name" placeholder="Last Name*">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group mb-2">
                                        <input type="text" class="form-control form-control-sm" name="email" placeholder="Email ID*">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group mb-2">
                                        <input type="tel" class="form-control form-control-sm tel-input" name="mobile" placeholder="Mobile No">
                                        <input type="hidden" name="mobile_country" value="US">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group mb-2">
                                        <select class="form-control form-control-sm role-picker" name="role">
                                            <option value="" selected disabled>Select Role Type</option>
                                            @foreach (App\Enums\UserPosition::getKeys() as $position)
                                            <option value="{{ $position }}" data-role-name="{{ App\Enums\UserPosition::getRole($position) }}">{{ App\Enums\UserPosition::getTitle($position) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group mb-2">
                                        <input type="text" class="form-control form-control-sm" name="username" placeholder="Username*"b required>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group mb-2">
                                        <input type="password" class="form-control form-control-sm" name="password" placeholder="Password">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group mb-2">
                                        <input type="password" class="form-control form-control-sm" name="password_confirmation" placeholder="Confirm Password*">
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover last-border-none mb-0">
                                <thead class="pt-5" style="background-color: #eff4fa">
                                    <tr>
                                        <th>Module Permission</th>
                                        <th>Read</th>
                                        <th>Write</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                    <tr data-role-name="{{ $role->name }}">
                                        <td>{{ $role->display_name }}</td>
                                        <td><input class="form-check-input" name="role_permission[]" type="checkbox" value="read"></td>
                                        <td><input class="form-check-input" name="role_permission[]" type="checkbox" value="write"></td>
                                        <td><input class="form-check-input" name="role_permission[]" type="checkbox" value="delete"></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="form-group">
                                <input type="hidden" name="role_permission_error">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-sm btn-primary">Add User</button>
                            <button type="button" class="btn btn-sm" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="edit-modal-container">
            {{-- {{ dd(App\Enums\UserPosition::getDescription(1))}} --}}
        </div>
    @endpush

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.7/js/intlTelInput.js"></script>
        <script>
            $(document).ready(function () {
                $("input.tel-input").intlTelInput({
                    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
                });

                $('body').on("countrychange", "input.tel-input", function(e, countryData) {
                    $('[name=mobile_country]').val(countryData.iso2.toUpperCase())
                });

                var validator = $('.modal form').validate()

                $('body').on('submit', '.modal form', function(e) {
                    e.preventDefault()
                    var form = $(this)
                    if(validator.form()) {
                        $.ajax({
                            url: $(this).attr('action'),
                            method: 'POST',
                            data: $(this).serialize()
                        })
                        .success( function(data) {
                            console.log(data);
                            Notiflix.Report.success('Action Completed', data.success, "Continue", function cb() {
                                location.reload()
                            })
                        })
                        .fail(function(error) {

                            if(error.responseJSON.errors instanceof Array) {
                                var errors = [];
                                Object.entries(error.responseJSON.errors).forEach( (error) => {
                                    errors[error[0] == 'mobile' ? 'mobile_country' : (error[0] == 'role_permission' ? 'role_permission_error' : error[0])] = error[1][0];
                                });

                                $(form).validate().showErrors(Object.assign({}, errors))
                            }

                            if(error.responseJSON.error)
                                Notiflix.Report.failure('Error Occurred', error.responseJSON.error)
                            else
                                Notiflix.Report.failure('Error Occurred', 'Something went wrong')
                        });
                    }
                })

                $('tr .action a.edit').click( function(e) {
                    e.preventDefault();
                    $.get($(this).attr('href'), {__modal: true}, function(data) {
                        console.log(data)
                        $('.edit-modal-container').html(data.html)
                        $('.edit-modal-container .modal').modal('show');

                        $("input.tel-input").intlTelInput({
                            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
                        });
                        $('body').on("countrychange", "input.tel-input", function(e, countryData) {
                            $('[name=mobile_country]').val(countryData.iso2.toUpperCase())
                        });
                    })
                })

                $('tr .action a.trash').click( function(e) {
                    e.preventDefault();
                    var href = $(this).attr('href');
                    Notiflix.Confirm.show(
                        "Critical Action Confirmation",
                        "You're about deleting this user. Please understand that there is no trash bag. This user will be lost",
                        "Confirm", "Cancel",
                        function okCb() {
                            $.ajax({
                                url: href,
                                method: 'POST',
                                data: {_token: '{{ csrf_token() }}', _method: 'DELETE'}
                            })
                            .success( function(data) {
                                Notiflix.Report.success('Action Completed', data.success, "Continue", function cb() {
                                    location.reload()
                                })
                            })
                            .fail(error => {
                                if(error.responseJSON.error)
                                    Notiflix.Report.failure('Error Occurred', error.responseJSON.error)
                                else
                                    Notiflix.Report.failure('Error Occurred', 'Something went wrong')
                            })
                        }
                    );
                })

                $('body').on('change', '.role-picker', function () {
                    $(this).parents('.modal-body').next().find('tbody tr').removeClass('text-muted').find('input').prop('disabled', false);
                    var tr = $(this).parents('.modal-body').next().find('tbody tr:not([data-role-name=' + $(this).find('option:selected').data('role-name') + '])');
                    tr.addClass('text-muted');
                    tr.find('input').prop('disabled', true);
                })

                Array.prototype.insert = function ( index, item ) {
                    this.splice( index, 0, item );
                };

            });
        </script>

    @endpush
</x-app-layout>
