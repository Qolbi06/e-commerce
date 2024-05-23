@extends('layouts.parent')

@section('title', 'My Transaction')

@section('content')

< class="card">
    <div class="card-body">
        <h5 class="card-title">My Transaction</h5>

        <nav>
            <ol class="breadcrumb">
                @if (Auth::user()->role == 'admin')
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                @else
                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                @endif
                <li class="breadcrumb-item"><a href="#">Transaction</a></li>
                <li class="breadcrumb-item active">Transaction</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Detail Transaction</h5>

          <!-- Table with stripped rows -->
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Name Account</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Brandon Jacob</td>
              </tr>
            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>

@endsection