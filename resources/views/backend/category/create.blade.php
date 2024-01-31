@extends('backend.layout.app')
@section('title','Add category')
@section('content')
   <!-- Horizontal Form -->
   <main id="main" class="main">

    <div class="pagetitle">
      <h1>Form Elements</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Elements</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">General Form Elements</h5>

              <!-- General Form Elements -->
              <form class="form" method="POST" enctype="multipart/form-data" action="{{route('category.store')}}">
                @csrf
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label"> Category Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ old('name')}}" name="name">
                        @if($errors->has('name'))
                        <span class="text-danger"> {{ $errors->first('name') }}</span>
                        @endif
                  </div>
                </div>

                <div class="row mb-3">
                    <label for="shift">Shift</label>
                    <select id="shift" class="form-control" name="shift">
                        <option>Morning</option>
                        <option>Evening</option>
                        <option>Night</option>
                    </select>
                    @if($errors->has('shift'))
                    <span class="text-danger"> {{ $errors->first('shift') }}</span>
                    @endif
                </div>

                <div class="row mb-3">
                    <label for="status">Status</label>
                    <select id="status" class="form-control" name="status">
                        <option value="1" @if(old('status')==1) selected @endif>Active</option>
                        <option value="0" @if(old('status')==0) selected @endif>Inactive</option>
                    </select>
                    @if($errors->has('status'))
                    <span class="text-danger"> {{ $errors->first('status') }}</span>
                    @endif
                </div>

              <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Submit Button</label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit Form</button>
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
