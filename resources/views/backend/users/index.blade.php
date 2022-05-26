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

            .table-responsive>div,
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

        </style>
    @endpush
    <div class="row gap-3">
        <div class="col-12 text-end">
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addNewUserModal">Add
                User</button>
        </div>
        <div class="col-12">
            <div class="table-responsive bg-white rounded-0">
                <div class="d-flex align-items-center justify-content-between py-2">
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
                        @foreach ([1, 2, 3, 4] as $iteration)
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <i class="bx bx-user"></i>
                                            {{-- <img src="images/avatar.svg" class="rounded-circle" alt="Sample Image"> --}}
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h5 class="m-0 f-large">Jhon Carter
                                                <small class="d-block text-muted">user@mail.com</small>
                                            </h5>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-success">Admin</span></td>
                                <td>25th June, 2022</td>
                                <td>CEO and Founder</td>
                                <td class="text-end action">
                                    <a class="text-muted me-1" href=""> <i class="bx bx-edit"></i> </a>
                                    <a class="text-muted" href=""> <i class="bx bx-trash"></i> </a>
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
                                        <input type="tel" class="form-control form-control-sm tel-input" name="name" placeholder="Mobile No">
                                        <input type="hidden" name="mobile_country" value="US">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group mb-2">
                                        <select class="form-control form-control-sm" name="role">
                                            <option value="" selected disabled>Select Role Type</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group mb-2">
                                        <input type="text" class="form-control form-control-sm" name="username" placeholder="Username*">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group mb-2">
                                        <input type="password" class="form-control form-control-sm" name="passsword" placeholder="Password">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group mb-2">
                                        <input type="password" class="form-control form-control-sm" name="confirm_password" placeholder="Confirm Password*">
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
                                    <tr class="text-muted" data-role-name="{{ $role->name }}">
                                        <td>{{ $role->display_name }}</td>
                                        <td><input class="form-check-input" name="role_permission[]" type="checkbox" value="read"></td>
                                        <td><input class="form-check-input" name="role_permission[]" type="checkbox" value="write"></td>
                                        <td><input class="form-check-input" name="role_permission[]" type="checkbox" value="delete"></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-primary">Add User</button>
                            <button type="button" class="btn btn-sm" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="edit-modal-container"></div>
    @endpush

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.7/js/intlTelInput.js"></script>
        <script>
            $(document).ready(function () {
                $("input.tel-input").intlTelInput({
                    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
                });

                $("input.tel-input").on("countrychange", function(e, countryData) {
                    // do something with countryData
                    $('[name=mobile_country]').val(countryData.iso2.toUpperCase())
                });
            });
        </script>

    @endpush
</x-app-layout>
