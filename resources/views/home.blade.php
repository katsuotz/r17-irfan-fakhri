@extends('layouts.app')
@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h3 class="fw-semibold">Test Candidate</h3>
        <div class="d-flex gap-2">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal" data-url="{{ route('test-candidate.store') }}">Add</button>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#importModal">Import</button>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form class="d-flex justify-content-end mb-2" action="">
                <input type="text" name="search" class="form-control" style="max-width: 200px;" placeholder="Search..." value="{{ @$search }}">
            </form>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Alamat</th>
                    <th scope="col" style="width: 200px">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @if($candidates->count())
                    @foreach($candidates as $key => $candidate)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $candidate->nama }}</td>
                            <td>{{ $candidate->jabatan }}</td>
                            <td>{{ $candidate->jenis_kelamin }}</td>
                            <td>{{ $candidate->alamat }}</td>
                            <td>
                                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#formModal" data-url="{{ route('test-candidate.update', $candidate) }}" data-item="{{ $candidate }}">Edit</button>
                                <button class="btn btn-danger btn-delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-url="{{ route('test-candidate.destroy', $candidate) }}">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" class="text-center">No Data</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
    @include('test-candidates.form')
    @include('test-candidates.import')
    @include('test-candidates.delete')
@endsection
