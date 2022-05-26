@if ($data->get('is_modal'))
    <!-- Modal -->
    <div class="modal fade" id="editExistingUserModal" tabindex="-1" aria-labelledby="editExistingUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="">
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-2">
                                    <input type="text" class="form-control form-control-sm" name="name" id="" placeholder="Employee ID*">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-2">
                                    <input type="text" class="form-control form-control-sm" name="name" id="" placeholder="First Name*">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-2">
                                    <input type="text" class="form-control form-control-sm" name="name" id="" placeholder="Last Name*">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group mb-2">
                                    <input type="text" class="form-control form-control-sm" name="name" id="" placeholder="Email ID*">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group mb-2">
                                    <input type="text" class="form-control form-control-sm" name="name" id="" placeholder="Mobile No">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group mb-2">
                                    <input type="text" class="form-control form-control-sm" name="name" id="" placeholder="Employee ID*">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group mb-2">
                                    <input type="text" class="form-control form-control-sm" name="name" id="" placeholder="Username*">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group mb-2">
                                    <input type="text" class="form-control form-control-sm" name="name" id="" placeholder="Password">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group mb-2">
                                    <input type="text" class="form-control form-control-sm" name="name" id="" placeholder="Confirm Password*">
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
                                <tr>
                                    <td>Super Admin</td>
                                    <td><input class="form-check-input" type="checkbox" value="read"></td>
                                    <td><input class="form-check-input" type="checkbox" value="write"></td>
                                    <td><input class="form-check-input" type="checkbox" value="delete"></td>
                                </tr>
                                <tr>
                                    <td>Admin</td>
                                    <td><input class="form-check-input" type="checkbox" value="read"></td>
                                    <td><input class="form-check-input" type="checkbox" value="write"></td>
                                    <td><input class="form-check-input" type="checkbox" value="delete"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif
