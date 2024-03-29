@extends('layouts.app') <!-- Extending the layout from the 'app.blade.php' file -->

@section('content') <!-- Opening the content section -->
<div class="mb-2">
    <!-- Button to go back to the previous page -->
    <button onclick="window.history.back();" class="btn btn-warning"><span class="bi bi-arrow-return-left"></span> Go Back</button>
</div>
<div class="row">
    <div class="col-lg-6 col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Basic Information</h5> <!-- Card title for basic information -->
            </div>
            <div class="card-body">
                <!-- Form for updating user basic information -->
                <form method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                    @method('PUT') <!-- Method spoofing to use PUT method -->
                    @csrf <!-- CSRF protection -->

                    <div class="row">
                        <div class="col-12">
                            <!-- Input field for user's name -->
                            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                   name="name" value="{{ $user->name }}" required>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div> <!-- Error message for name input -->
                            @enderror
                        </div>

                        <div class="col-12 mt-2">
                            <!-- Input field for user's email (disabled) -->
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                   value="{{ $user->email }}" disabled>
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                            </div>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div> <!-- Error message for email input -->
                            @enderror
                        </div>

                        <div class="col-12 mt-2">
                            <!-- Input field for user's avatar -->
                            <label for="avatar" class="form-label">Avatar</label>
                            <div class="row">
                                <div class="col-10">
                                    <input type="file" class="form-control @error('avatar') is-invalid @enderror"
                                           id="avatar" name="avatar">
                                    @error('avatar')
                                    <div class="invalid-feedback">{{ $message }}</div> <!-- Error message for avatar input -->
                                    @enderror
                                </div>
                                <div class="col-2">
                                    <!-- Displaying user's avatar -->
                                    <img src="{{ asset($user->avatar) }}" alt="Avatar" class="rounded-circle"
                                         height="30">
                                </div>
                            </div>
                        </div>
                        @can('admin') <!-- Checking if user is admin -->

                        @if(auth()->user()->id != $user->id && $user->isNotSuperAdmin())
                        <div class="col-6">
                            <!-- Dropdown for selecting user's role -->
                            <label for="roleSelect" class="form-label">Role <span
                                    class="text-danger">*</span></label>
                            <select class="form-select @error('role') is-invalid @enderror" id="roleSelect"
                                    name="role">
                                @foreach($roles as $value)

                                    <option value="{{ $value->id }}"
                                            @if($value->id == $user->role->id) selected @endif>{{ $value->name }}</option>
                                @endforeach
                            </select>
                            @error('role')
                            <div class="invalid-feedback">{{ $message }}</div> <!-- Error message for role select -->
                            @enderror
                        </div>

                        <div class="col-6 mt-2">
                            <!-- Dropdown for selecting user's status -->
                            <label for="statusSelect" class="form-label">Status <span
                                    class="text-danger">*</span></label>
                            <select class="form-select @error('status') is-invalid @enderror" id="statusSelect"
                                    name="status">
                                @foreach(['pending', 'active', 'inactive', 'banned'] as $value)
                                        <?php
                                        $isSelected = ($user->status == $value) ? 'selected' : '';
                                        ?>
                                    <option value="{{ $value }}" {{ $isSelected }}>{{ ucfirst($value) }}</option>
                                @endforeach
                            </select>
                            @error('status')
                            <div class="invalid-feedback">{{ $message }}</div> <!-- Error message for status select -->
                            @enderror
                        </div>
                        @endif
                        @endcan
                        <div class="col-12 mt-2">
                            <!-- Button to submit user update -->
                            <button type="submit" class="btn btn-success">Update user</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Update Password</h5> <!-- Card title for updating password -->
            </div>
            <div class="card-body">
                <!-- Form for updating user's password -->
                <form method="POST" action="{{ route('user.change-pass', $user->id) }}">
                    @method('PUT') <!-- Method spoofing to use PUT method -->
                    @csrf <!-- CSRF protection -->

                    <div class="mb-3">
                        <!-- Input field for new password -->
                        <label for="password" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div class="mb-3">
                        <!-- Input field for confirming new password -->
                        <label for="password_confirmation" class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                               required>
                    </div>

                    <!-- Button to submit password update -->
                    <button type="submit" class="btn btn-success">Update Password</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection <!-- Closing the content section -->
