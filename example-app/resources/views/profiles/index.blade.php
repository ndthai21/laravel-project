@extends('admin.layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Danh sách hồ sơ</h1>
            <a href="{{ route('profiles.create') }}" class="btn btn-info">Tạo hồ sơ mới</a>
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
                        <th>ID</th>
                        <th>Họ và Tên</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>{{ $profile->id }}</td>
                            <td>{{ $profile->user->name }}</td>
                            <td>
                                <span class="badge bg-{{ $profile->status == 'approved' ? 'success' : 'warning' }}">
                                    {{ ucfirst($profile->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('profiles.show', $profile->id) }}" class="btn btn-info btn-sm">Xem</a>
                                <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                                <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                                </form>
                                <form action="{{ route('profiles.submitToTeacherA', $profile->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Gửi hồ sơ</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
