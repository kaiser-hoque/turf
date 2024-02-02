@extends('backend.layout.app')
@section('title', 'user')
@section('content')
    <!-- Horizontal Form -->
    <main id="main" class="main">

        <div class="pagetitle">

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">User</li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center text-white fs-4 bg-primary mt-3">Add User</h5>
                            <!-- General Form Elements -->
                            <form class="form" method="POST" enctype="multipart/form-data"
                                action="{{ route('user.store') }}">
                                @csrf
                                <div class="row mb-3 mt-3">
                                    <div class="col-md-4">
                                        <label for="status" class="col-form-label fs-5"> <b  ><span style="font-size: 15px" class="text-muted">Select Role</span></b> </label>
                                        <select class="form-control" name="roleId" id="roleId">
                                            <option value="">Select Role</option>
                                            @forelse($role as $r)
                                                <option value="{{ $r->id }}"
                                                    {{ old('roleId') == $r->id ? 'selected' : '' }}> {{ $r->name }}
                                                </option>
                                            @empty
                                                <option value="">No Role found</option>
                                            @endforelse
                                        </select>
                                        @if ($errors->has('roleId'))
                                            <span class="text-danger"> {{ $errors->first('roleId') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputText" class="col-form-label fs-5"><b  ><span style="font-size: 15px" class="text-muted">Name(English)</span></b></label>
                                        <input type="text" class="form-control" value="{{ old('userName_en') }}"
                                            name="userName_en">
                                        @if ($errors->has('userName_en'))
                                            <span class="text-danger"> {{ $errors->first('userName_en') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="inputText" class="col-form-label fs-5 "><b  ><span style="font-size: 15px" class="text-muted">Name(Bangla)</span></b></label>
                                        <input type="text" class="form-control" value="{{ old('userName_bn') }}"
                                            name="userName_bn">
                                        @if ($errors->has('userName_bn'))
                                            <span class="text-danger"> {{ $errors->first('userName_bn') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="inputEmail" class="  col-form-label fs-5"><b><span style="font-size: 15px" class="text-muted">Email </span></b></label>
                                        <input type="email" class="form-control" value="{{ old('EmailAddress') }}"
                                            name="EmailAddress">
                                        @if ($errors->has('EmailAddress'))
                                            <span class="text-danger"> {{ $errors->first('EmailAddress') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="inputPassword" class="  col-form-label fs-5"><b  ><span style="font-size: 15px" class="text-muted">Contact Number(English)</span></b></label>
                                        <input type="number" class="form-control" value="{{ old('contactNumber_en') }}"
                                            name="contactNumber_en">
                                        @if ($errors->has('contactNumber_en'))
                                            <span class="text-danger"> {{ $errors->first('contactNumber_en') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="inputPassword" class="  col-form-label fs-5"><b  ><span style="font-size: 15px" class="text-muted"> Contact Number(Bangla)</span></b></label>
                                        <input type="number" class="form-control" value="{{ old('contactNumber_bn') }}"
                                            name="contactNumber_bn">
                                        @if ($errors->has('contactNumber_bn'))
                                            <span class="text-danger"> {{ $errors->first('contactNumber_bn') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="inputPassword" class="  col-form-label fs-5"><b  ><span style="font-size: 15px" class="text-muted"> Password</span></b></label>
                                        <input type="password" class="form-control" name="password">
                                        @if ($errors->has('password'))
                                            <span class="text-danger"> {{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <label for="status" class="col-form-label fs-5"><b  ><span style="font-size: 15px" class="text-muted"> Status</span></b></label>
                                        <select id="status" class="form-control" name="status">
                                            <option value="1" @if (old('status') == 1) selected @endif>Active
                                            </option>
                                            <option value="0" @if (old('status') == 0) selected @endif>
                                                Inactive
                                            </option>
                                        </select>
                                        @if ($errors->has('status'))
                                            <span class="text-danger"> {{ $errors->first('status') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <label for="fullAccess" class="col-form-label fs-5"> <b  ><span style="font-size: 15px" class="text-muted"> Full Access</span></b></label>
                                        <select id="fullAccess" class="form-control" name="fullAccess">
                                            <option value="0" @if (old('fullAccess') == 0) selected @endif>No
                                            </option>
                                            <option value="1" @if (old('fullAccess') == 1) selected @endif>Yes
                                            </option>
                                        </select>
                                        @if ($errors->has('fullAccess'))
                                            <span class="text-danger"> {{ $errors->first('fullAccess') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <label for="image" class="  col-form-label fs-5"> <b  ><span style="font-size: 15px" class="text-muted"> User Image</span></b></label>
                                        <input class="form-control" type="file" id="image" name="image">
                                    </div>
                                    <hr class="mt-2">

                                        <button type="submit" class="btn btn-primary"><b>Submit</b></button>

                                </div>
                        </div>
                    </div>
                    </form><!-- End General Form Elements -->
                </div>
            </div>
            </div>
            </div>
        </section>
    </main>
@endsection
