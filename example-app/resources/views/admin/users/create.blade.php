@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h2>Tạo tài khoản</h2>
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group input-group-static mb-4">
                        <label for="name">Họ và Tên</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group input-group-static mb-4">
                        <label for="studentId">Mã sinh viên</label>
                        <input type="text" name="studentId" class="form-control" id="studentId"
                            value="{{ old('studentId') }}">
                        @error('studentId')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group input-group-static mb-4">
                        <label for="birth">Ngày sinh</label>
                        <input type="date" name="birth" class="form-control" id="birth"
                            value="{{ old('birth') }}">
                        @error('birth')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group input-group-static mb-4" <label for="gender">Giới tính</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="">Chọn giới tính</option>
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Nam</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Nữ</option>
                            <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Khác</option>
                        </select>
                        @error('gender')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group input-group-static mb-4">
                        <label for="class">Lớp</label>
                        <input type="class" name="class" class="form-control" id="class"
                            value="{{ old('class') }}">
                        @error('class')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group input-group-static mb-4">
                        <label for="course">Khóa</label>
                        <input type="text" name="course" class="form-control" id="course"
                            value="{{ old('course') }}">
                        @error('course')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group input-group-static mb-4">
                        <label for="major">Chuyên ngành</label>
                        <select name="major" class="form-control">
                            <option class="dropdown-image" value="">Chọn chuyên ngành</option>
                            <option class="dropdown-image" value="Công nghệ Phần mềm"
                                {{ old('major') == 'Công nghệ Phần mềm' ? 'selected' : '' }}>Công nghệ Phần mềm</option>
                            <option class="dropdown-image" value="Khoa học Máy tính và Ứng dụng"
                                {{ old('major') == 'Khoa học Máy tính và Ứng dụng' ? 'selected' : '' }}>Khoa học Máy tính
                                và Ứng dụng</option>
                            <option class="dropdown-image" value="Mạng máy tính"
                                {{ old('major') == 'Mạng máy tính' ? 'selected' : '' }}>Mạng máy tính</option>
                            <option class="dropdown-image" value="Tin học Kinh tế"
                                {{ old('major') == 'Tin học Kinh tế' ? 'selected' : '' }}>Tin học Kinh tế</option>
                            <option class="dropdown-image" value="Công nghệ Thông tin Địa học"
                                {{ old('major') == 'Công nghệ Thông tin Địa học' ? 'selected' : '' }}>Công nghệ Thông tin
                                Địa học</option>
                        </select>
                        @error('major')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group input-group-static mb-4">
                        <label for="phone">Số điện thoại</label>
                        <input type="text" name="phone" class="form-control" id="phone"
                            value="{{ old('phone') }}">
                        @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>



                </div>

            </div>

            <div class="input-group input-group-static mb-4">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}">
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
            <div class="mb-3">
                <label for="permissions" class="form-label">Chức năng</label>
                <div class="form-check">
                    @foreach ($permissions as $permission)
                        <input class="form-check-input" type="checkbox" name="permissions[]"
                            id="permission_{{ $permission->id }}" value="{{ $permission->name }}">
                        <label class="form-check-label" for="permission_{{ $permission->id }}">
                            {{ $permission->name }}
                        </label><br>
                    @endforeach
                </div>
                @error('permissions')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Tạo</button>
        </form>
    </div>
@endsection
