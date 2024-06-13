@extends('admin.layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0 text-white">Chỉnh sửa tài khoản</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group input-group-static mb-4">
                            <label for="name">Họ và Tên</label>
                            <input type="text" name="name" class="form-control" id="name"
                                   value="{{ old('name', $user->name) }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-group input-group-static mb-4">
                            <label for="studentId">Mã sinh viên</label>
                            <input type="text" name="studentId" class="form-control" id="studentId"
                                   value="{{ old('studentId', $user->studentId) }}">
                            @error('studentId')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-group input-group-static mb-4">
                            <label for="birth">Ngày sinh</label>
                            <input type="date" name="birth" class="form-control" id="birth"
                                   value="{{ old('birth', $user->birth ? $user->birth->format('Y-m-d') : '') }}">
                            @error('birth')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-group input-group-static mb-4">
                            <label for="gender">Giới tính</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="">Chọn giới tính</option>
                                <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>Nam</option>
                                <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>Nữ</option>
                                <option value="other" {{ old('gender', $user->gender) == 'other' ? 'selected' : '' }}>Khác</option>
                            </select>
                            @error('gender')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-static mb-4">
                            <label for="class">Lớp</label>
                            <input type="text" name="class" class="form-control" id="class"
                                   value="{{ old('class', $user->class) }}">
                            @error('class')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-group input-group-static mb-4">
                            <label for="course">Khóa</label>
                            <input type="text" name="course" class="form-control" id="course"
                                   value="{{ old('course', $user->course) }}">
                            @error('course')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-group input-group-static mb-4">
                            <label for="major">Chuyên ngành</label>
                            <select name="major" class="form-control">
                                <option value="">Chọn chuyên ngành</option>
                                <option value="Công nghệ Phần mềm" {{ old('major', $user->major) == 'Công nghệ Phần mềm' ? 'selected' : '' }}>Công nghệ Phần mềm</option>
                                <option value="Khoa học Máy tính và Ứng dụng" {{ old('major', $user->major) == 'Khoa học Máy tính và Ứng dụng' ? 'selected' : '' }}>Khoa học Máy tính và Ứng dụng</option>
                                <option value="Mạng máy tính" {{ old('major', $user->major) == 'Mạng máy tính' ? 'selected' : '' }}>Mạng máy tính</option>
                                <option value="Tin học Kinh tế" {{ old('major', $user->major) == 'Tin học Kinh tế' ? 'selected' : '' }}>Tin học Kinh tế</option>
                                <option value="Công nghệ Thông tin Địa học" {{ old('major', $user->major) == 'Công nghệ Thông tin Địa học' ? 'selected' : '' }}>Công nghệ Thông tin Địa học</option>
                            </select>
                            @error('major')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-group input-group-static mb-4">
                            <label for="phone">Số điện thoại</label>
                            <input type="text" name="phone" class="form-control" id="phone"
                                   value="{{ old('phone', $user->phone) }}">
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="input-group input-group-static mb-4">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email"
                           value="{{ old('email', $user->email) }}">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group input-group-static mb-4">
                    <label for="password">Mật khẩu</label>
                    <input type="password" name="password" class="form-control" id="password">
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group input-group-static mb-4">
                    <label for="password_confirmation">Nhập lại mật khẩu</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                </div>
                @can('delete user')
                <div class="mb-3">
                    <label for="permissions" class="form-label">Chức năng</label>
                    <div class="form-check">
                        @foreach ($permissions as $permission)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permissions[]" id="permission_{{ $permission->id }}" value="{{ $permission->name }}"
                                    {{ in_array($permission->name, $user->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
                                <label class="form-check-label" for="permission_{{ $permission->id }}">
                                    {{ $permission->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    @error('permissions')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                @endcan
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
@endsection
