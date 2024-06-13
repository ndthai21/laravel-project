@extends('admin.layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container mt-5">
        <h1 class="mb-4 text-center text-info">Chi tiết Hồ sơ sinh viên 5 tốt</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header bg-info text-white">
                        <h2 class="text-center text-white">Đạo đức tốt</h2>
                    </div>
                    <div class="card-body">
                        <div id="criteria-dao-duc">
                            @foreach ($criteriaByCategory['dao_duc'] ?? [] as $criterion)
                                <div class="criterion">
                                    @if ($criterion->criterion)
                                        <div class="input-group input-group-lg input-group-dynamic mb-4">
                                            <input type="text" class="form-control" value="{{ $criterion->criterion }}" readonly>
                                        </div>
                                    @endif
                                    @if ($criterion->score !== null)
                                        <div class="input-group input-group-lg input-group-dynamic mb-4 focus is-focused">
                                            <label class="form-label">Điểm rèn luyện học kì I</label>
                                            <input type="number" step="0.01" class="form-control" value="{{ $criterion->score }}" readonly>
                                        </div>
                                    @endif
                                    @if ($criterion->score2 !== null)
                                        <div class="input-group input-group-lg input-group-dynamic mb-4 focus is-focused">
                                            <label class="form-label">Điểm rèn luyện học kì II</label>
                                            <input type="number" step="0.01" class="form-control" value="{{ $criterion->score2 }}" readonly>
                                        </div>
                                    @endif
                                    @if ($criterion->average !== null)
                                        <div class="input-group input-group-lg input-group-dynamic mb-4 focus is-focused">
                                            <label class="form-label">Điểm trung bình</label>
                                            <input type="number" step="0.01" class="form-control" value="{{ $criterion->average }}" readonly>
                                        </div>
                                    @endif
                                    @if ($criterion->file_path)
                                        <div class="mb-5">
                                            <label>File đính kèm</label>
                                            @php
                                                $fileExtension = pathinfo($criterion->file_path, PATHINFO_EXTENSION);
                                            @endphp
                                            @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                                <a href="{{ $criterion->file_path }}" data-lightbox="dao-duc" data-title="Đạo đức tốt">
                                                    <img style="width: 500px; height: auto; height: auto" src="{{ $criterion->file_path }}" alt="Image" class="img-fluid">
                                                </a>
                                            @else
                                                <a href="{{ $criterion->file_path }}" target="_blank" class="btn btn-link">Xem File</a>
                                            @endif
                                        </div>
                                    @endif
                                    <div class="input-group input-group-lg input-group-dynamic mb-4 focus is-focused">
                                        <label class="form-label">Trạng thái</label>
                                        <input type="text" class="form-control" value="{{ getStatusDescription($criterion->status) }}" readonly>
                                    </div>
                                </div>
                            @endforeach
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
                            @foreach ($criteriaByCategory['hoc_tap'] ?? [] as $criterion)
                                <div class="criterion">
                                    @if ($criterion->criterion)
                                        <div class="input-group input-group-lg input-group-dynamic mb-4">
                                            <input type="text" class="form-control" value="{{ $criterion->criterion }}" readonly>
                                        </div>
                                    @endif
                                    @if ($criterion->score !== null)
                                        <div class="input-group input-group-lg input-group-dynamic mb-4 focus is-focused">
                                            <label class="form-label">Điểm trung bình tích lũy học kì I</label>
                                            <input type="number" step="0.01" class="form-control" value="{{ $criterion->score }}" readonly>
                                        </div>
                                    @endif
                                    @if ($criterion->score2 !== null)
                                        <div class="input-group input-group-lg input-group-dynamic mb-4 focus is-focused">
                                            <label class="form-label">Điểm trung bình tích lũy học kì II</label>
                                            <input type="number" step="0.01" class="form-control" value="{{ $criterion->score2 }}" readonly>
                                        </div>
                                    @endif
                                    @if ($criterion->average !== null)
                                        <div class="input-group input-group-lg input-group-dynamic mb-4 focus is-focused">
                                            <label class="form-label">Điểm trung bình</label>
                                            <input type="number" step="0.01" class="form-control" value="{{ $criterion->average }}" readonly>
                                        </div>
                                    @endif
                                    @if ($criterion->file_path)
                                        <div class="mb-5">
                                            <label>File đính kèm</label>
                                            @php
                                                $fileExtension = pathinfo($criterion->file_path, PATHINFO_EXTENSION);
                                            @endphp
                                            @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                                <a href="{{ $criterion->file_path }}" data-lightbox="hoc-tap" data-title="Học tập tốt">
                                                    <img style="width: 500px; height: auto; height: auto" src="{{ $criterion->file_path }}" alt="Image" class="img-fluid">
                                                </a>
                                            @else
                                                <a href="{{ $criterion->file_path }}" target="_blank" class="btn btn-link">Xem File</a>
                                            @endif
                                        </div>
                                    @endif
                                    <div class="input-group input-group-lg input-group-dynamic mb-4 focus is-focused">
                                        <label class="form-label">Trạng thái</label>
                                        <input type="text" class="form-control" value="{{ getStatusDescription($criterion->status) }}" readonly>
                                    </div>
                                </div>
                            @endforeach
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
                    @foreach ($criteriaByCategory['the_luc'] ?? [] as $criterion)
                        <div class="criterion">
                            @if ($criterion->criterion)
                                <div class="input-group input-group-lg input-group-dynamic mb-4">
                                    <input type="text" class="form-control" value="{{ $criterion->criterion }}" readonly>
                                </div>
                            @endif
                            @if ($criterion->file_path)
                                <div class="mb-5">
                                    <label>File đính kèm</label>
                                    @php
                                        $fileExtension = pathinfo($criterion->file_path, PATHINFO_EXTENSION);
                                    @endphp
                                    @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                        <a href="{{ $criterion->file_path }}" data-lightbox="the-luc" data-title="Thể lực tốt">
                                            <img style="width: 500px; height: auto; height: auto" src="{{ $criterion->file_path }}" alt="Image" class="img-fluid">
                                        </a>
                                    @else
                                        <a href="{{ $criterion->file_path }}" target="_blank" class="btn btn-link">Xem File</a>
                                    @endif
                                </div>
                            @endif
                            <div class="input-group input-group-lg input-group-dynamic mb-4 focus is-focused">
                                <label class="form-label">Trạng thái</label>
                                <input type="text" class="form-control" value="{{ getStatusDescription($criterion->status) }}" readonly>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-info text-white">
                <h2 class="text-center text-white">Tình nguyện tốt</h2>
            </div>
            <div class="card-body">
                <div id="criteria-tinh-nguyen">
                    @foreach ($criteriaByCategory['tinh_nguyen'] ?? [] as $criterion)
                        <div class="criterion">
                            @if ($criterion->criterion)
                                <div class="input-group input-group-lg input-group-dynamic mb-4">
                                    <input type="text" class="form-control" value="{{ $criterion->criterion }}" readonly>
                                </div>
                            @endif
                            @if ($criterion->file_path)
                                <div class="mb-5">
                                    <label>File đính kèm</label>
                                    @php
                                        $fileExtension = pathinfo($criterion->file_path, PATHINFO_EXTENSION);
                                    @endphp
                                    @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                        <a href="{{ $criterion->file_path }}" data-lightbox="tinh-nguyen" data-title="Tình nguyện tốt">
                                            <img style="width: 500px; height: auto; height: auto" src="{{ $criterion->file_path }}" alt="Image" class="img-fluid">
                                        </a>
                                    @else
                                        <a href="{{ $criterion->file_path }}" target="_blank" class="btn btn-link">Xem File</a>
                                    @endif
                                </div>
                            @endif
                        </div>
                    @endforeach
                    <div class="input-group input-group-lg input-group-dynamic mb-4 focus is-focused">
                        <label class="form-label">Trạng thái</label>
                        <input type="text" class="form-control" value="{{ getStatusDescription($criterion->status) }}" readonly>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-info text-white">
                <h2 class="text-center text-white">Hội nhập tốt</h2>
            </div>
            <div class="card-body">
                <div id="criteria-the-luc">
                    @foreach ($criteriaByCategory['hoi_nhap'] ?? [] as $criterion)
                        <div class="criterion">
                            @if ($criterion->criterion)
                                <div class="input-group input-group-lg input-group-dynamic mb-4">
                                    <input type="text" class="form-control" value="{{ $criterion->criterion }}" readonly>
                                </div>
                            @endif
                            @if ($criterion->file_path)
                                <div class="mb-5">
                                    <label>File đính kèm</label>
                                    @php
                                        $fileExtension = pathinfo($criterion->file_path, PATHINFO_EXTENSION);
                                    @endphp
                                    @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                        <a href="{{ $criterion->file_path }}" data-lightbox="hoi-nhap" data-title="Hội nhập tốt">
                                            <img style="width: 500px; height: auto; height: auto" src="{{ $criterion->file_path }}" alt="Image" class="img-fluid">
                                        </a>
                                    @else
                                        <a href="{{ $criterion->file_path }}" target="_blank" class="btn btn-link">Xem File</a>
                                    @endif
                                </div>
                            @endif
                        </div>
                    @endforeach
                    <div class="input-group input-group-lg input-group-dynamic mb-4 focus is-focused">
                        <label class="form-label">Trạng thái</label>
                        <input type="text" class="form-control" value="{{ getStatusDescription($criterion->status) }}" readonly>
                    </div>
                </div>
            </div>
        </div>

        <a href="{{ route('profiles.index') }}" class="btn btn-info mt-4">Trở lại</a>
    </div>
@endsection

@php
    function getStatusDescription($status) {
        switch ($status) {
            case 'pending':
                return 'Chờ duyệt';
            case 'approved':
                return 'Đã duyệt';
            case 'rejected':
                return 'Từ chối';
            default:
                return '';
        }
    }
@endphp
