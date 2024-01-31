@extends('backend.layout.app')
@section('title', 'User')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Datatables</h5>
              <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable. Check for <a href="https://fiduswriter.github.io/simple-datatables/demos/" target="_blank">more examples</a>.</p>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                    <tr>
                        <th scope="col">{{__('#SL')}}</th>
                        <th scope="col">{{__('Name')}}</th>
                        <th scope="col">{{__('Email')}}</th>
                        <th scope="col">{{__('Contact')}}</th>
                        <th scope="col">{{__('Role')}}</th>
                        <th scope="col">{{__('Image')}}</th>
                        <th scope="col">{{__('Status')}}</th>
                        <th class="white-space-nowrap">{{__('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $d)
                <tr class="">
                    <td>{{++$loop->index}}</td>
                    <td>{{$d->name_en}}</td>
                    <td>{{$d->email}}</td>
                    <td>{{$d->contact_no_en}}</td>
                    {{-- <td class="d-flex align-items-center text-primary">	<i class='bx bx-radio-circle-marked bx-burst bx-rotate-90 align-middle font-18 me-1'></i>
                        <span>{{$d->role?->name}}</span>
                    </td> --}}
                    <td>{{$d->role?->name}}</td>
                    <td><img width="50px" class="product-img" src="{{asset('public/uploads/users/'.$d->image)}}" alt=""></td>
                    <td style="color: @if($d->status==1) green @else red @endif; border-radius: 5px;font-weight: bold; font-size:15px">@if($d->status==1){{__('Active')}} @else{{__('Inactive')}} @endif</td>
                    <td class="">
                         <!-- Example split danger button -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger">Action</button>
                            <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"> <i class="bi bi-pencil"></i> Edit</a></li>
                            <li><a class="dropdown-item" href="#"> <i class="bi bi-eye"></i> View</a></li>
                          <li class="dropdown-item" >
                            
                            <form id="deleteForm" action="{{ route('user.destroy', encrypt($d->id)) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-link" style="color: inherit; padding: 0; border: none; background: none;">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                          </li>




                            </ul>
                        </div>
                    </td>


            </tr>
        @empty
            <tr>
                <th colspan="8" class="text-center">No Pruduct Found</th>
            </tr>
        @endforelse
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

@endsection
