@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h1>Hồ sơ sinh viên 5 tốt</h1>
        <div class="profile-details">
            <h2>Thông tin cá nhân</h2>
            <p>Họ và Tên: {{ $profile->user->name }}</p>
            <p>Mã sinh viên: {{ $profile->user->studentId }}</p>
            <p>Lớp: {{ $profile->user->class }}</p>
        </div>

        <form action="{{ route('profiles.updateStatus', $profile->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header bg-info text-white">
                            <h2 class="text-center text-white">Đạo đức tốt</h2>
                        </div>
                        <div class="card-body">
                            <div id="criteria-dao-duc">
                                @if (isset($criteriaByCategory['dao_duc']))
                                    @foreach ($criteriaByCategory['dao_duc'] as $criterion)
                                        @if ($criterion->criterion)
                                            <div
                                                class="input-group input-group-lg input-group-dynamic mb-4 focus is-focused">
                                                {{-- <label class="form-label" for="criteria[dao_duc][{{ $criterion->id }}][criterion]">Tiêu chí</label> --}}
                                                <input type="hidden" name="criteria[dao_duc][{{ $criterion->id }}][id]"
                                                    value="{{ $criterion->id }}">
                                                <input type="text"
                                                    name="criteria[dao_duc][{{ $criterion->id }}][criterion]"
                                                    class="form-control" value="{{ $criterion->criterion }}" required
                                                    readonly>
                                            </div>
                                        @endif
                                        @if ($criterion->score != null)
                                            <div
                                                class="input-group input-group-lg input-group-dynamic mb-4 focus is-focused">
                                                <label class="form-label"
                                                    for="criteria[dao_duc][{{ $criterion->id }}][score]">Điểm rèn luyện học
                                                    kì I</label>
                                                <input type="number" step="0.01"
                                                    name="criteria[dao_duc][{{ $criterion->id }}][score]"
                                                    class="form-control" value="{{ $criterion->score }}" required readonly>
                                            </div>
                                        @endif
                                        @if ($criterion->score2 != null)
                                            <div
                                                class="input-group input-group-lg input-group-dynamic mb-4 focus is-focused">
                                                <label class="form-label"
                                                    for="criteria[dao_duc][{{ $criterion->id }}][score2]">Điểm rèn luyện
                                                    học
                                                    kì
                                                    II</label>
                                                <input type="number" step="0.01"
                                                    name="criteria[dao_duc][{{ $criterion->id }}][score2]"
                                                    class="form-control" value="{{ $criterion->score2 }}" required
                                                    readonly>
                                            </div>
                                        @endif
                                        @if ($criterion->average != null)
                                            <div
                                                class="input-group input-group-lg input-group-dynamic mb-4 focus is-focused">
                                                <label class="form-label"
                                                    for="criteria[dao_duc][{{ $criterion->id }}][average]">Điểm trung
                                                    bình</label>
                                                <input type="number" step="0.01"
                                                    name="criteria[dao_duc][{{ $criterion->id }}][average]"
                                                    class="form-control" value="{{ $criterion->average }}" required
                                                    readonly>
                                            </div>
                                        @endif
                                        @if ($criterion->file_path)
                                            <div class="mb-5">
                                                <label>File đính kèm</label>
                                                @php
                                                    $fileExtension = pathinfo(
                                                        $criterion->file_path,
                                                        PATHINFO_EXTENSION,
                                                    );
                                                @endphp
                                                @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                                    <a href="{{ $criterion->file_path }}" data-lightbox="dao-duc"
                                                        data-title="Đạo đức tốt">
                                                        <img style="width: 500px; height: auto; height: auto"
                                                            src="{{ $criterion->file_path }}" alt="Image"
                                                            class="img-fluid">
                                                    </a>
                                                @else
                                                    <a href="{{ $criterion->file_path }}" target="_blank"
                                                        class="btn btn-link">Xem
                                                        File</a>
                                                @endif
                                            </div>
                                        @endif
                                        <div
                                            class="input-group input-group-lg input-group-dynamic mb-4 focus is-focused mt-4">
                                            <label class="form-label"
                                                for="criteria[dao_duc][{{ $criterion->id }}][status]">Trạng
                                                thái:</label>
                                            <select name="criteria[dao_duc][{{ $criterion->id }}][status]"
                                                class="form-control" required>
                                                <option value="pending"
                                                    {{ $criterion->status == 'pending' ? 'selected' : '' }}>Chờ duyệt
                                                </option>
                                                <option value="approved"
                                                    {{ $criterion->status == 'approved' ? 'selected' : '' }}>Đã duyệt
                                                </option>
                                                <option value="rejected"
                                                    {{ $criterion->status == 'rejected' ? 'selected' : '' }}>Từ chối
                                                </option>
                                            </select>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header bg-info text-white">
                            <h2 class="text-center text-white">Học tập tốt</h2>
                        </div>

                        <div class="card-body">
                            <div id="criteria-hoc-tap">
                                @if (isset($criteriaByCategory['hoc_tap']))
                                    @foreach ($criteriaByCategory['hoc_tap'] as $criterion)
                                        @if ($criterion->criterion)
                                            <div
                                                class="input-group input-group-lg input-group-dynamic mb-4 focus is-focused">
                                                {{-- <label class="form-label" for="criteria[hoc_tap][{{ $criterion->id }}][criterion]">Tiêu chí</label> --}}
                                                <input type="hidden" name="criteria[hoc_tap][{{ $criterion->id }}][id]"
                                                    value="{{ $criterion->id }}">
                                                <input type="text"
                                                    name="criteria[hoc_tap][{{ $criterion->id }}][criterion]"
                                                    class="form-control" value="{{ $criterion->criterion }}" required
                                                    readonly>
                                            </div>
                                        @endif
                                        @if ($criterion->score != null)
                                            <div
                                                class="input-group input-group-lg input-group-dynamic mb-4 focus is-focused">
                                                <label class="form-label"
                                                    for="criteria[hoc_tap][{{ $criterion->id }}][score]">Điểm trung bình
                                                    tích
                                                    lũy học kì
                                                    I</label>
                                                <input type="number" step="0.01"
                                                    name="criteria[hoc_tap][{{ $criterion->id }}][score]"
                                                    class="form-control" value="{{ $criterion->score }}" required readonly>
                                            </div>
                                        @endif
                                        @if ($criterion->score2 != null)
                                            <div
                                                class="input-group input-group-lg input-group-dynamic mb-4 focus is-focused">
                                                <label class="form-label"
                                                    for="criteria[hoc_tap][{{ $criterion->id }}][score2]">Điểm trung bình
                                                    tích
                                                    lũy học
                                                    kì
                                                    II</label>
                                                <input type="number" step="0.01"
                                                    name="criteria[hoc_tap][{{ $criterion->id }}][score2]"
                                                    class="form-control" value="{{ $criterion->score2 }}" required
                                                    readonly>
                                            </div>
                                        @endif
                                        @if ($criterion->average != null)
                                            <div
                                                class="input-group input-group-lg input-group-dynamic mb-4 focus is-focused">
                                                <label class="form-label"
                                                    for="criteria[hoc_tap][{{ $criterion->id }}][average]">Điểm trung
                                                    bình</label>
                                                <input type="number" step="0.01"
                                                    name="criteria[hoc_tap][{{ $criterion->id }}][average]"
                                                    class="form-control" value="{{ $criterion->average }}" required
                                                    readonly>
                                            </div>
                                        @endif
                                        @if ($criterion->file_path)
                                            <div class="mb-5">
                                                <label>File đính kèm</label>
                                                @php
                                                    $fileExtension = pathinfo(
                                                        $criterion->file_path,
                                                        PATHINFO_EXTENSION,
                                                    );
                                                @endphp
                                                @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                                    <a href="{{ $criterion->file_path }}" data-lightbox="hoc-tap"
                                                        data-title="Học tập tốt">
                                                        <img style="width: 500px; height: auto; height: auto"
                                                            src="{{ $criterion->file_path }}" alt="Image"
                                                            class="img-fluid">
                                                    </a>
                                                @else
                                                    <a href="{{ $criterion->file_path }}" target="_blank"
                                                        class="btn btn-link">Xem
                                                        File</a>
                                                @endif
                                            </div>
                                        @endif
                                        <div
                                            class="input-group input-group-lg input-group-dynamic mb-4 focus is-focused mt-4">
                                            <label class="form-label"
                                                for="criteria[hoc_tap][{{ $criterion->id }}][status]">Trạng
                                                thái:</label>
                                            <select name="criteria[hoc_tap][{{ $criterion->id }}][status]"
                                                class="form-control" required>
                                                <option value="pending"
                                                    {{ $criterion->status == 'pending' ? 'selected' : '' }}>Chờ duyệt
                                                </option>
                                                <option value="approved"
                                                    {{ $criterion->status == 'approved' ? 'selected' : '' }}>Đã duyệt
                                                </option>
                                                <option value="rejected"
                                                    {{ $criterion->status == 'rejected' ? 'selected' : '' }}>Từ chối
                                                </option>
                                            </select>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card mb-4">
                <div class="card-header bg-info text-white">
                    <h2 class="text-center text-white">Thể lực tốt</h2>
                </div>
                <div class="card-body">
                    <div id="criteria-the-luc">
                        @if (isset($criteriaByCategory['the_luc']))
                            @foreach ($criteriaByCategory['the_luc'] as $criterion)
                                <div class="input-group input-group-lg input-group-dynamic mb-4">
                                    {{-- <label class="form-label"
                                        for="criteria[the_luc][{{ $criterion->id }}][criterion]">Tiêu chí</label> --}}
                                    <input type="hidden" name="criteria[the_luc][{{ $criterion->id }}][id]"
                                        value="{{ $criterion->id }}" placeholder="Tiêu chí">
                                    <input type="text" name="criteria[the_luc][{{ $criterion->id }}][criterion]"
                                        class="form-control" value="{{ $criterion->criterion }}" required readonly>
                                </div>
                                @if ($criterion->file_path)
                                    <div class="mb-5">
                                        <label>File đính kèm</label>
                                        @php
                                            $fileExtension = pathinfo($criterion->file_path, PATHINFO_EXTENSION);
                                        @endphp
                                        @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                            <a href="{{ $criterion->file_path }}" data-lightbox="the-luc"
                                                data-title="Thể lực tốt">
                                                <img style="width: 500px; height: auto; height: auto"
                                                    src="{{ $criterion->file_path }}" alt="Image" class="img-fluid">
                                            </a>
                                        @else
                                            <a href="{{ $criterion->file_path }}" target="_blank"
                                                class="btn btn-link">Xem
                                                File</a>
                                        @endif
                                    </div>
                                @endif
                                <div class="input-group input-group-lg input-group-dynamic mb-4 focus is-focused mt-4">
                                    <label class="form-label" for="criteria[the_luc][{{ $criterion->id }}][status]">Trạng
                                        thái:</label>
                                    <select name="criteria[the_luc][{{ $criterion->id }}][status]" class="form-control"
                                        required>
                                        <option value="pending" {{ $criterion->status == 'pending' ? 'selected' : '' }}>
                                            Chờ duyệt
                                        </option>
                                        <option value="approved" {{ $criterion->status == 'approved' ? 'selected' : '' }}>
                                            Đã duyệt
                                        </option>
                                        <option value="rejected" {{ $criterion->status == 'rejected' ? 'selected' : '' }}>
                                            Từ chối
                                        </option>
                                    </select>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header bg-info text-white">
                    <h2 class="text-center text-white">Tình nguyện tốt</h2>
                </div>
                <div class="card-body">
                    <div id="criteria-tinh-nguyen">
                        @if (isset($criteriaByCategory['tinh_nguyen']))
                            @foreach ($criteriaByCategory['tinh_nguyen'] as $criterion)
                                <div class="input-group input-group-lg input-group-dynamic mb-4">
                                    {{-- <label class="form-label"
                                        for="criteria[tinh_nguyen][{{ $criterion->id }}][criterion]">Tiêu chí</label> --}}
                                    <input type="hidden" name="criteria[tinh_nguyen][{{ $criterion->id }}][id]"
                                        value="{{ $criterion->id }}" placeholder="Tiêu chí">
                                    <input type="text" name="criteria[tinh_nguyen][{{ $criterion->id }}][criterion]"
                                        class="form-control" value="{{ $criterion->criterion }}" required readonly>
                                </div>
                                @if ($criterion->file_path)
                                    <div class="mb-5">
                                        <label>File đính kèm</label>
                                        @php
                                            $fileExtension = pathinfo($criterion->file_path, PATHINFO_EXTENSION);
                                        @endphp
                                        @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                            <a href="{{ $criterion->file_path }}" data-lightbox="tinh-nguyen"
                                                data-title="Tình nguyện tốt">
                                                <img style="width: 500px; height: auto; height: auto"
                                                    src="{{ $criterion->file_path }}" alt="Image" class="img-fluid">
                                            </a>
                                        @else
                                            <a href="{{ $criterion->file_path }}" target="_blank"
                                                class="btn btn-link">Xem
                                                File</a>
                                        @endif
                                    </div>
                                @endif
                                <div class="input-group input-group-lg input-group-dynamic mb-4 focus is-focused mt-4">
                                    <label class="form-label"
                                        for="criteria[tinh_nguyen][{{ $criterion->id }}][status]">Trạng
                                        thái:</label>
                                    <select name="criteria[tinh_nguyen][{{ $criterion->id }}][status]"
                                        class="form-control" required>
                                        <option value="pending" {{ $criterion->status == 'pending' ? 'selected' : '' }}>
                                            Chờ duyệt
                                        </option>
                                        <option value="approved" {{ $criterion->status == 'approved' ? 'selected' : '' }}>
                                            Đã duyệt
                                        </option>
                                        <option value="rejected" {{ $criterion->status == 'rejected' ? 'selected' : '' }}>
                                            Từ chối
                                        </option>
                                    </select>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header bg-info text-white">
                    <h2 class="text-center text-white">Hội nhập tốt</h2>
                </div>
                <div class="card-body">
                    <div id="criteria-hoi-nhap">
                        @if (isset($criteriaByCategory['hoi_nhap']))
                            @foreach ($criteriaByCategory['hoi_nhap'] as $criterion)
                                <div class="input-group input-group-lg input-group-dynamic mb-4">
                                    {{-- <label class="form-label"
                                        for="criteria[hoi_nhap][{{ $criterion->id }}][criterion]">Tiêu chí</label> --}}
                                    <input type="hidden" name="criteria[hoi_nhap][{{ $criterion->id }}][id]"
                                        value="{{ $criterion->id }}" placeholder="Tiêu chí">
                                    <input type="text" name="criteria[hoi_nhap][{{ $criterion->id }}][criterion]"
                                        class="form-control" value="{{ $criterion->criterion }}" required readonly>
                                </div>
                                @if ($criterion->file_path)
                                    <div class="mb-5">
                                        <label>File đính kèm</label>
                                        @php
                                            $fileExtension = pathinfo($criterion->file_path, PATHINFO_EXTENSION);
                                        @endphp
                                        @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                            <a href="{{ $criterion->file_path }}" data-lightbox="hoi-nhap"
                                                data-title="Hội nhập tốt">
                                                <img style="width: 500px; height: auto; height: auto"
                                                    src="{{ $criterion->file_path }}" alt="Image" class="img-fluid">
                                            </a>
                                        @else
                                            <a href="{{ $criterion->file_path }}" target="_blank"
                                                class="btn btn-link">Xem
                                                File</a>
                                        @endif
                                    </div>
                                @endif
                                <div class="input-group input-group-lg input-group-dynamic mb-4 focus is-focused mt-4">
                                    <label class="form-label"
                                        for="criteria[hoi_nhap][{{ $criterion->id }}][status]">Trạng
                                        thái:</label>
                                    <select name="criteria[hoi_nhap][{{ $criterion->id }}][status]" class="form-control"
                                        required>
                                        <option value="pending" {{ $criterion->status == 'pending' ? 'selected' : '' }}>
                                            Chờ duyệt
                                        </option>
                                        <option value="approved" {{ $criterion->status == 'approved' ? 'selected' : '' }}>
                                            Đã duyệt
                                        </option>
                                        <option value="rejected" {{ $criterion->status == 'rejected' ? 'selected' : '' }}>
                                            Từ chối
                                        </option>
                                    </select>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    @endsection
