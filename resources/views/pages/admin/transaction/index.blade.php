@extends('layouts.parent')

@section('title', 'My Transaction')

@section('content')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Transaction</h5>

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Transaction</a></li>
                    <li class="breadcrumb-item active">Transaction</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="card-title"><i class="bi bi-cart"></i> List Transaction </div>

            <table class="table table-striped table-hover table-bordered datatable">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Name Account</td>
                        <td>Reciever Name</td>
                        <td>Reciever Email</td>
                        <td>Reciever Phone</td>
                        <td>Total Price</td>
                        <td>Payment URL</td>
                        <td>Status</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transaction as $row )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->user->name }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->phone }}</td>
                        <td>
                            {{ number_format($row->total_price) }}
                        </td>
                        <td>
                          @if ( $row->payment_url == null )
                              <span class="badge bg-danger"></span>
                            @else
                          <span class="badge bg-success">
                            <a href="{{ $row->payment_url }}" class="text-white">MIDTRANS</a>
                          </span>
                          @endif
                        </td>
                        <td>
                            @if($row->status == 'EXPIRED')
                            <span class="badge bg-danger">Expired</span>
                            @elseif ($row->status == 'PENDING')
                            <span class="badge bg-warning">Pending</span>
                            @elseif ($row->status == 'SETTLEMENT')
                            <span class="badge bg-info">Settelement</span>
                            @else
                            <span class="badge bg-success">Success</span>
                            @endif
                        </td>
                        <td>
                            <a href="#" class="btn btn-info btn-sm mx-2">Show</a>
                            <!-- Basic Modal -->
                        <button type="button" class="btn btn-warning btn-sm m-2" data-bs-toggle="modal" data-bs-target="#updateStatus{{ $row->id }}">Edit</button>

                        @include('pages.admin.transaction.modal-edit')

                            <!-- End Basic Modal-->
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal{{ $row->id }}">
                                <i class="bi bi-eye"></i>
                            </button>
                            @include('pages.admin.my-transaction.modal-show')
                        </td>
                    </tr>
                    @empty
                        
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
