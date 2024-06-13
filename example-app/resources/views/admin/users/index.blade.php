@extends('admin.layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
            <h3 class="mb-0 text-white">Tài khoản</h3>
            <a href="{{ route('users.create') }}" class="btn btn-light">Thêm tài khoản</a>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Họ và Tên</th>
                            <th>Mã SV</th>
                            <th>Email</th>
                            <th>Phân quyền</th>
                            <th class="text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->studentId }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @php
                                        $maxPermissionsToShow = 3;
                                        $permissions = $user->permissions;
                                        $extraPermissionsCount = $permissions->count() - $maxPermissionsToShow;
                                    @endphp
                                    @if ($permissions->count() > 0)
                                        <div class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $permissions->pluck('name')->join(', ') }}">
                                            @foreach ($permissions->take($maxPermissionsToShow) as $permission)
                                                <span class="badge bg-info">{{ $permission->name }}</span>
                                            @endforeach
                                            @if ($extraPermissionsCount > 0)
                                                <span class="badge bg-secondary">và {{ $extraPermissionsCount }} quyền khác</span>
                                            @endif
                                        </div>
                                    @else
                                        <span class="badge bg-secondary">Không có quyền</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('users.edit', ['user' => $user]) }}" class="btn btn-warning btn-sm">Sửa</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Bạn có chắc chắn muốn xóa tài khoản này?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- {{ $users->links() }} <!-- Thêm phân trang nếu cần --> --}}
        </div>
    </div>
</div>

<!-- Tooltip initialization script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    });
</script>
@endsection
