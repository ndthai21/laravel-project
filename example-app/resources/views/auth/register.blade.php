@extends('auth.layouts.app')

@section('title', 'Register')

@section('content')
<section>
  <div class="page-header min-vh-100">
    <div class="container">
      <div class="row">
        <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
          <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center"
               style="background-image: url('{{ asset('HUMG/humg.jpg') }}'); background-size: cover;">
          </div>
        </div>
        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5" 
             style="width: 50%; margin-right: -10rem !important;">
          <div class="card card-plain border-2 border-primary bg-white">
            <div class="card-header bg-primary text-white text-center">
              <h4 class="font-weight-bolder text-white">ĐĂNG KÍ</h4>
              <p class="mb-0">Nhập thông tin cá nhân để tạo tài khoản</p>
            </div>
            <div class="card-body">
              <form method="POST" action="{{ route('register') }}">
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
                      <input type="text" name="studentId" class="form-control" id="studentId" value="{{ old('studentId') }}">
                      @error('studentId')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="input-group input-group-static mb-4">
                      <label for="birth">Ngày sinh</label>
                      <input type="date" name="birth" class="form-control" id="birth" value="{{ old('birth') }}">
                      @error('birth')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="input-group input-group-static mb-4">
                      <label for="gender">Giới tính</label>
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
                      <input type="text" name="class" class="form-control" id="class" value="{{ old('class') }}">
                      @error('class')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    
                    <div class="input-group input-group-static mb-4">
                      <label for="course">Khóa</label>
                      <input type="text" name="course" class="form-control" id="course" value="{{ old('course') }}">
                      @error('course')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="input-group input-group-static mb-4">
                      <label for="major">Chuyên ngành</label>
                      <select name="major" class="form-control">
                        <option value="">Chọn chuyên ngành</option>
                        <option value="Công nghệ Phần mềm" {{ old('major') == 'Công nghệ Phần mềm' ? 'selected' : '' }}>Công nghệ Phần mềm</option>
                        <option value="Khoa học Máy tính và Ứng dụng" {{ old('major') == 'Khoa học Máy tính và Ứng dụng' ? 'selected' : '' }}>Khoa học Máy tính và Ứng dụng</option>
                        <option value="Mạng máy tính" {{ old('major') == 'Mạng máy tính' ? 'selected' : '' }}>Mạng máy tính</option>
                        <option value="Tin học Kinh tế" {{ old('major') == 'Tin học Kinh tế' ? 'selected' : '' }}>Tin học Kinh tế</option>
                        <option value="Công nghệ Thông tin Địa học" {{ old('major') == 'Công nghệ Thông tin Địa học' ? 'selected' : '' }}>Công nghệ Thông tin Địa học</option>
                      </select>
                      @error('major')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="input-group input-group-static mb-4">
                      <label for="phone">Số điện thoại</label>
                      <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone') }}">
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

                <div class="text-center">
                  <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Đăng Ký</button>
                </div>
              </form>
            </div>
            <div class="card-footer text-center pt-0 px-lg-2 px-1">
              <p class="mb-4 text-sm mx-auto">
                Đã có tài khoản?
                <a href="{{ route('login') }}" class="text-primary text-gradient font-weight-bold">Đăng Nhập</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
