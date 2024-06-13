@extends('admin.layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-info text-white">
                <h3 class="mb-0 text-white">Thông tin cá nhân</h3>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Họ và Tên</label>
                            <p id="name" class="form-control-plaintext">{{ $user->name }}</p>
                        </div>
                        <div class="mb-3">
                            <label for="studentId" class="form-label">Mã sinh viên</label>
                            <p id="studentId" class="form-control-plaintext">{{ $user->studentId }}</p>
                        </div>
                        <div class="mb-3">
                            <label for="birth" class="form-label">Ngày sinh</label>
                            <input type="date" name="birth" class="form-control" id="birth" value="{{ old('birth', $user->birth ? $user->birth->format('Y-m-d') : '') }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Giới tính</label>
                            <p id="gender" class="form-control-plaintext">
                                @switch($user->gender)
                                    @case('male')
                                        Nam
                                        @break
                                    @case('female')
                                        Nữ
                                        @break
                                    @case('other')
                                        Khác
                                        @break
                                    @default
                                        Không xác định
                                @endswitch
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="class" class="form-label">Lớp</label>
                            <p id="class" class="form-control-plaintext">{{ $user->class }}</p>
                        </div>
                        <div class="mb-3">
                            <label for="course" class="form-label">Khóa</label>
                            <p id="course" class="form-control-plaintext">{{ $user->course }}</p>
                        </div>
                        <div class="mb-3">
                            <label for="major" class="form-label">Chuyên ngành</label>
                            <p id="major" class="form-control-plaintext">{{ $user->major }}</p>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <p id="phone" class="form-control-plaintext">{{ $user->phone }}</p>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <p id="email" class="form-control-plaintext">{{ $user->email }}</p>
                </div>
                <div class="text-end">
                    <a href="{{ route('users.edit', ['user' => $user]) }}" class="btn btn-warning">Sửa</a>
                </div>
            </div>
        </div>
    </div>
@endsection
