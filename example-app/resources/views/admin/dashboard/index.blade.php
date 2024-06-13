@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid d-flex justify-content-center align-items-center p-0" style="height: 100vh; overflow: hidden;">
        <div class="rounded-container position-relative">
            <img src="{{ asset('HUMG/HUMG.jpeg') }}" class="img-fluid w-100 rounded" alt="Giới thiệu">
            <div class="overlay rounded"></div>
            <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center text-center text-white">
                <div class="mb-4">
                    <img src="{{ asset('HUMG/logodoan.png') }}" class="logo" alt="">
                    <img src="{{ asset('HUMG/logo2.png') }}" class="logo" alt="">
                    <img src="{{ asset('HUMG/logoHoi.png') }}" class="logo" alt="">
                </div>
                <p class="card-text">
                    Phong trào “Sinh viên 5 tốt” được Trung ương Hội Sinh viên Việt Nam phát động trong cả nước nhằm hướng
                    tới việc xây dựng hình ảnh sinh viên toàn diện với các tiêu chí: “Học tập tốt”, “Đạo đức tốt”, “Thể lực
                    tốt”, “Tình nguyện tốt”, “Hội nhập tốt”.
                </p>
                <p class="card-text mb-4">
                    Phấn đấu để đạt được danh hiệu “Sinh viên 5 tốt” đồng nghĩa với việc bạn sẽ trải qua một quá trình rèn
                    luyện, phấn đấu về các mặt: học tập, đạo đức, thể lực, tình nguyện và hội nhập trong suốt năm học. Vì
                    vậy, đây đã trở thành danh hiệu cao quý mà mỗi bạn sinh viên đều cố gắng để đạt được.
                </p>
                <a href="{{ route('profiles.create') }}" class="btn btn-primary">Bắt đầu tạo hồ sơ</a>
            </div>
        </div>
    </div>

    <style>
        body {
            overflow: hidden;
        }

        .container-fluid {
            height: 100vh;
        }

        .rounded-container {
            width: 100%;
            max-width: 1620px;
            height: 100vh;
            max-height: 900px;

            /* overflow: hidden; */
            margin-bottom: 50px;
        }

        .img-fluid {
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 1;
            border-radius: 20px;
        }

        .card-img-overlay {
            z-index: 2;
        }

        .logo {
            display: inline-block;
            margin: 0 15px;
            width: 12%;
        }

        .card-text {
            font-size: 1.2rem;
            max-width: 800px;
            margin-bottom: 1rem;
            line-height: 1.6;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 12px 24px;
            font-size: 1.1rem;
            border-radius: 25px;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        @media (max-width: 768px) {
            .logo {
                width: 20%;
                margin: 10px;
            }

            .card-text {
                font-size: 1rem;
                padding: 0 20px;
            }

            .btn-primary {
                font-size: 1rem;
                padding: 10px 20px;
            }

            .rounded-container {
                width: 90%;
                height: 70vh;
            }
        }
    </style>
@endsection
