@extends('admin.layouts.app')

@section('content')

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Hồ sơ sinh viên 5 tốt</h1>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Họ và Tên</th>
                    <th>Mã SV</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($profiles as $profile)
                    <tr>
                        <td>{{ $profile->user->name }}</td>
                        <td>{{ $profile->user->studentId }}</td>
                        <td>
                            <span class="badge bg-{{ $profile->status == 'approved' ? 'success' : ($profile->status == 'rejected' ? 'danger' : 'warning') }}">
                                {{ ucfirst($profile->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('profiles.teacherBReview', $profile->id) }}" class="btn btn-info btn-sm">Xem</a>
                            <form action="{{ route('profiles.approveByB', $profile->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Duyệt</button>
                            </form>
                            <form action="{{ route('profiles.rejectByB', $profile->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Từ chối</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
