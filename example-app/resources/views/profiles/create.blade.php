@extends('admin.layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4 text-center text-info">Hồ sơ sinh viên 5 tốt</h1>
        <form action="{{ route('profiles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <!-- Đạo đức tốt Section -->    
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header bg-info text-white">
                            <h2 class="text-center text-white">Đạo đức tốt</h2>
                        </div>
                        <div class="card-body">
                            <div class="form-group" hidden>
                                <label for="criteria[dao_duc][0][criterion]">Tiêu chí</label>
                                <input type="text" name="criteria[dao_duc][0][criterion]" value="Điểm rèn luyện"
                                    class="form-control" required>
                            </div>
                            <div class="input-group input-group-lg input-group-dynamic mb-4">
                                <label class="form-label" for="criteria[dao_duc][0][score]">Điểm rèn luyện học kì I</label>
                                <input type="number" step="1" name="criteria[dao_duc][0][score]"
                                    class="form-control" required>
                            </div>
                            <div class="input-group input-group-lg input-group-dynamic mb-4">
                                <label class="form-label" for="criteria[dao_duc][0][score2]">Điểm rèn luyện học kì
                                    II</label>
                                <input type="number" step="1" name="criteria[dao_duc][0][score2]"
                                    class="form-control" required>
                            </div>
                            <div class="input-group input-group-lg input-group-dynamic mb-4">
                                <label class="form-label" for="criteria[dao_duc][0][average]">Điểm trung bình</label>
                                <input type="number" step="1" name="criteria[dao_duc][0][average]"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="criteria[dao_duc][0][file]">File đính kèm</label>
                                <input type="file" name="criteria[dao_duc][0][file]" class="form-control">
                            </div>
                            <div id="criteria-dao-duc"></div>
                            <div id="new-criteria-dao-duc"></div>
                            <button type="button" id="add-criteria-dao-duc" class="btn btn-secondary mt-2">Thêm tiêu chí</button>
                        </div>
                    </div>
                </div>

                <!-- Học tập tốt Section -->
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header bg-info text-white">
                            <h2 class="text-center text-white">Học tập tốt</h2>
                        </div>
                        <div class="card-body">
                            <div class="form-group" hidden>
                                <label for="criteria[hoc_tap][0][criterion]">Tiêu chí</label>
                                <input type="text" name="criteria[hoc_tap][0][criterion]"
                                    value="Điểm trung bình tích lũy" class="form-control" required>
                            </div>
                            <div class="row">
                                <div class="input-group input-group-lg input-group-dynamic mb-4">
                                    <label class="form-label" for="criteria[hoc_tap][0][score]">Điểm trung bình tích lũy học
                                        kì I</label>
                                    <input type="number" step="0.01" name="criteria[hoc_tap][0][score]"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="input-group input-group-lg input-group-dynamic mb-4">
                                <label class="form-label" for="criteria[hoc_tap][0][score2]">Điểm trung bình tích lũy học kì
                                    II</label>
                                <input type="number" step="0.01" name="criteria[hoc_tap][0][score2]"
                                    class="form-control" required>
                            </div>
                            <div class="input-group input-group-lg input-group-dynamic mb-4">
                                <label class="form-label" for="criteria[hoc_tap][0][average]">Điểm trung bình</label>
                                <input type="number" step="0.01" name="criteria[hoc_tap][0][average]"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="criteria[hoc_tap][0][file]">File đính kèm</label>
                                <input type="file" name="criteria[hoc_tap][0][file]" class="form-control">
                            </div>
                            <div id="criteria-hoc-tap"></div>
                            <div id="new-criteria-hoc-tap"></div>
                            <button type="button" id="add-criteria-hoc-tap" class="btn btn-secondary mt-2">Thêm tiêu chí</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Thể lực tốt Section -->
            <div class="card mb-4">
                <div class="card-header bg-info text-white">
                    <h2 class="text-center text-white">Thể lực tốt</h2>
                </div>
                <div class="card-body">
                    <div id="criteria-the-luc">
                        <div class="input-group input-group-lg  input-group-dynamic mb-4">
                            <input type="text" name="criteria[the_luc][0][criterion]" class="form-control" placeholder="Tiêu chí" required>
                        </div>
                        <div class="form-group">
                            <label for="criteria[the_luc][0][file]">File đính kèm</label>
                            <input type="file" name="criteria[the_luc][0][file]" class="form-control">
                        </div>
                    </div>
                    <div id="new-criteria-the-luc"></div>
                    <button type="button" id="add-criteria-the-luc" class="btn btn-secondary mt-2">Thêm tiêu chí</button>
                </div>
            </div>

            <!-- Tình nguyện tốt Section -->
            <div class="card mb-4">
                <div class="card-header bg-info text-white">
                    <h2 class="text-center text-white">Tình nguyện tốt</h2>
                </div>
                <div class="card-body">
                    <div id="criteria-tinh-nguyen">
                        <div class="input-group input-group-lg  input-group-dynamic mb-4">
                            <input type="text" name="criteria[tinh_nguyen][0][criterion]" class="form-control" placeholder="Tiêu chí" required>
                        </div>
                        <div class="form-group">
                            <label for="criteria[tinh_nguyen][0][file]">File đính kèm</label>
                            <input type="file" name="criteria[tinh_nguyen][0][file]" class="form-control">
                        </div>
                    </div>
                    <div id="new-criteria-tinh-nguyen"></div>
                    <button type="button" id="add-criteria-tinh-nguyen" class="btn btn-secondary mt-2">Thêm tiêu chí</button>
                </div>
            </div>

            <!-- Hội nhập tốt Section -->
            <div class="card mb-4">
                <div class="card-header bg-info text-white">
                    <h2 class="text-center text-white">Hội nhập tốt</h2>
                </div>
                <div class="card-body">
                    <div id="criteria-hoi-nhap">
                        <div class="input-group input-group-lg  input-group-dynamic mb-4">
                            <input type="text" name="criteria[hoi_nhap][0][criterion]" class="form-control" placeholder="Tiêu chí" required>
                        </div>
                        <div class="form-group">
                            <label for="criteria[hoi_nhap][0][file]">File đính kèm</label>
                            <input type="file" name="criteria[hoi_nhap][0][file]" class="form-control">
                        </div>

                    </div>
                    <div id="new-criteria-hoi-nhap"></div>
                    <button type="button" id="add-criteria-hoi-nhap" class="btn btn-secondary mt-2">Thêm tiêu chí</button>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>

    <script>
        let daoDucIndex = 1;
        let hocTapIndex = 1;
        let theLucIndex = 1;
        let tinhNguyenIndex = 1;
        let hoiNhapIndex = 1;

        function addCriteria(containerId, category, index) {
            const container = document.getElementById(containerId);
            const newCriterion = document.createElement('div');
            newCriterion.classList.add('criterion');
            newCriterion.innerHTML = `
                <div class="input-group input-group-lg input-group-dynamic mb-4">
                    <input type="text" name="criteria[${category}][${index}][criterion]" class="form-control" placeholder="Tiêu chí" required>
                </div>
                <div class="form-group">
                    <label for="criteria[${category}][${index}][file]">File đính kèm</label>
                    <input type="file" name="criteria[${category}][${index}][file]" class="form-control">
                </div>
                <button type="button" class="btn btn-danger remove-criteria">Xóa</button>
            `;
            container.appendChild(newCriterion);
        }

        document.addEventListener('click', function(event) {
            if (event.target && event.target.classList.contains('remove-criteria')) {
                event.target.closest('.criterion').remove();
            }
        });

        document.getElementById('add-criteria-dao-duc').addEventListener('click', function() {
            addCriteria('criteria-dao-duc', 'dao_duc', daoDucIndex++);
        });

        document.getElementById('add-criteria-hoc-tap').addEventListener('click', function() {
            addCriteria('criteria-hoc-tap', 'hoc_tap', hocTapIndex++);
        });

        document.getElementById('add-criteria-the-luc').addEventListener('click', function() {
            addCriteria('criteria-the-luc', 'the_luc', theLucIndex++);
        });

        document.getElementById('add-criteria-tinh-nguyen').addEventListener('click', function() {
            addCriteria('criteria-tinh-nguyen', 'tinh_nguyen', tinhNguyenIndex++);
        });

        document.getElementById('add-criteria-hoi-nhap').addEventListener('click', function() {
            addCriteria('criteria-hoi-nhap', 'hoi_nhap', hoiNhapIndex++);
        });
    </script>
@endsection
