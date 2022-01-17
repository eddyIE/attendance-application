@extends("layout");
@section('css')
    <style>
        #error-container {
            width: 100%;
            height: 600px;
            text-align: center;
            background: url("../public/img/error.jpg");
            background-size: 100%;
            background-repeat: no-repeat;
            backface-visibility: 0.5;
            vertical-align: center;
        }

        #bg-opacity {
            background-color: rgba(255, 255, 255, 0.8);
            height: 100%;
        }

        img {
            width: 500px;
            margin: 0 auto;
            top: 0px;
            z-index: 1;
            opacity: 0.8;
            position: absolute;
            top: 0;
            left: 200px;
            bottom: 0;
            right: 0;
        }

        h1 {
            color: red;
            font-size: 80px !important;
            font-weight: bold;
            margin: auto;
            z-index: 500;
            font-family: monospace;
            padding: 100px 0px 30px;
        }

        #error-message {
            font-size: 30px !important;
        }

    </style>
@endsection
@section('title', 'BKACAD - Error!')
@section('content')
    <div id="error-container">
        <div id="bg-opacity">
            <h1>Đã có lỗi xảy ra!</h1>
            {{-- <img src="../public/img/error.jpg"" alt=" Đã có lỗi xảy ra"> --}}
            @isset($message)
                <p id="error-message">{{ $message }}</p>
            @endisset
            <a href="{{route('index')}}"><button class="btn btn-outline-primary">Trở lại trang chủ</button></a>
        </div>
    </div>
@endsection
