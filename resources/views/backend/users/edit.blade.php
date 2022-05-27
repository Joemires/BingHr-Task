@if (request()->__modal)
    @php
        $name_br = Str::of($user->name)->explode(' ');
    @endphp
    <!-- Modal -->
    <div class="modal fade" id="addNewUserModal" tabindex="-1" aria-labelledby="addNewUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('backend.users.update', $user->identifier) }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-2">
                                    <input type="text" class="form-control form-control-sm" name="identifier" placeholder="Employee ID*" value="{{ $user->identifier }}" @disabled(true)>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-2">
                                    <input type="text" class="form-control form-control-sm" name="first_name" placeholder="First Name*" value="{{ $name_br[0] }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-2">
                                    <input type="text" class="form-control form-control-sm" name="last_name" placeholder="Last Name*" value="{{ optional($name_br)[1] }}">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group mb-2">
                                    <input type="text" class="form-control form-control-sm" name="email" placeholder="Email ID*" value="{{ $user->email }}" @disabled(true)>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group mb-2">
                                    <input type="tel" class="form-control form-control-sm tel-input" name="mobile" placeholder="Mobile No" value="{{ $user->contacts->pull('mobile.working.number') }}">
                                    <input type="hidden" name="mobile_country" value="{{ $user->contacts->pull('mobile.working.country_iso') }}">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group mb-2">
                                    <select class="form-control form-control-sm role-picker" name="role">
                                        <option value="" disabled>Select Role Type</option>
                                        @foreach (App\Enums\UserPosition::getKeys() as $position)
                                        <option value="{{ $position }}" data-role-name="{{ App\Enums\UserPosition::getRole($position) }}" @if($user->position == $position) selected @endif>{{ App\Enums\UserPosition::getTitle($position) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group mb-2">
                                    <input type="text" class="form-control form-control-sm" name="username" placeholder="Username*"  value="{{ $user->username }}" @disabled(true)>
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
                                @php
                                    $has_role = $user->hasRole($role->name);
                                @endphp
                                <tr data-role-name="{{ $role->name }}" {{ !$has_role ? 'class=text-muted' : '' }}>
                                    <td>{{ $role->display_name }}</td>
                                    <td><input class="form-check-input" name="role_permission[]" type="checkbox" value="read" @if($has_role && $user->isAbleTo('read')) @checked(true) @endif {{ !$has_role ? 'disabled' : '' }}></td>
                                    <td><input class="form-check-input" name="role_permission[]" type="checkbox" value="write" @if($has_role && $user->isAbleTo('write')) @checked(true) @endif {{ !$has_role ? 'disabled' : '' }}></td>
                                    <td><input class="form-check-input" name="role_permission[]" type="checkbox" value="delete" @if($has_role && $user->isAbleTo('delete')) @checked(true) @endif {{ !$has_role ? 'disabled' : '' }}></td>
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
@endif
