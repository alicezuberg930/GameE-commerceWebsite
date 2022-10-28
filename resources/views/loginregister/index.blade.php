<!DOCTYPE html>
<html>

<head>
    <title>Đăng Nhập</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    {{-- <link rel="shortcut icon" href="../icon/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../style/header.css">
    <link rel="stylesheet" type="text/css" href="../style/footer.css"> --}}
    {{-- <link rel="stylesheet" href="../library/sweetalert2/dist/sweetalert2.min.css"> --}}
    <script type="module" src="{{ url('./js/LoginRegister.js') }}"></script>
    <script src="{{ url('./jquery/dist/jquery.min.js') }}"></script>
    {{-- <script src="{{ url('./js/bootstrap.js') }}"></script>
    <script src="{{ url('./js/popper.js') }}"></script> --}}
    <link rel="stylesheet" type="text/css" href="{{ url('./css/Login-Register.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="container">
        <nav class="nav-bar"></nav>
        <div class="form-box">
            <div class="button-box">
                <div id="slider" class="slider"></div>
                <button type="button" class="toggle-button" id="login-slider">
                    <h5>Đăng Nhập</h5>
                </button>
                <button type="button" class="toggle-button" id="register-slider">
                    <h5>Đăng Kí</h5>
                </button>
            </div>
            <form method="POST" id="login_form" class="input-group" action="loginregister/login">
                @csrf
                <div class="form-control">
                    <input type="text" name="email" class="user-id l-email" placeholder="Nhập email">
                    <span>A</span>
                    <i id="l-email-success" class="far fa-check-circle"></i>
                    <i id="l-email-error" class="fas fa-exclamation-circle"></i>
                </div>
                <div class="form-control">
                    <input type="password" name="password" class="user-id l-password" placeholder="Nhập mật khẩu">
                    <span>B</span>
                    <i id="l-password-success" class="far fa-check-circle"></i>
                    <i id="l-password-error" class="fas fa-exclamation-circle"></i>
                </div>
                <div class="term">
                    <input type="checkbox" class="check-box">
                    <small>Nhớ mật khẩu</small>
                </div>
                <p><a href="./reset-index.php">Quên mật khẩu?</a></p>
                <button class="submit" id="login">Đăng Nhập</button>
            </form>
            <form method="POST" id="register_form" class="input-group" action="loginregister/register">
                @csrf
                <div class="form-control">
                    <input type="text" name="r-username" class="user-id r-username" placeholder="Nhập họ tên">
                    <span>A</span>
                    <i id="r-username-success" class="far fa-check-circle"></i>
                    <i id="r-username-error" class="fas fa-exclamation-circle"></i>
                </div>
                <div class="form-control">
                    <input type="text" name="r-email" class="user-id r-email" placeholder="Nhập email">
                    <span>B</span>
                    <i id="r-email-success" class="far fa-check-circle"></i>
                    <i id="r-email-error" class="fas fa-exclamation-circle"></i>
                </div>
                <div class="form-control">
                    <input type="password" name="r-password" class="user-id r-password" placeholder="Nhập mật khẩu">
                    <span>C</span>
                    <i id="r-password-success" class="far fa-check-circle"></i>
                    <i id="r-password-error" class="fas fa-exclamation-circle"></i>
                </div>
                <div class="form-control">
                    <input type="password" name="r-check-password" class="user-id r-check-password"
                        placeholder="Nhập lại mật khẩu">
                    <span>D</span>
                    <i id="r-check-password-success" class="far fa-check-circle"></i>
                    <i id="r-check-password-error" class="fas fa-exclamation-circle"></i>
                </div>
                <div class="form-control">
                    <input type="text" name="r-phone-number" class="user-id r-phone-number"
                        placeholder="Nhập số điện thoại">
                    <span>D</span>
                    <i id="r-phone-number-success" class="far fa-check-circle"></i>
                    <i id="r-phone-number-error" class="fas fa-exclamation-circle"></i>
                </div>
                <div class="form-control">
                    <div class="r-gender">
                        <p>Chọn giới tính: </p>
                        <div class="gender">
                            <input class="gender-radio" type="radio" name="gender" value="Nam" checked> Nam
                            <input class="gender-radio" type="radio" name="gender" value="Nữ"> Nữ
                        </div>
                    </div>
                </div>
                <div class="term">
                    <input type="checkbox" class="check-box">
                    <small>Tôi đồng ý với điều khoản và dịch vụ</small>
                </div>
                <button class="submit" id="register">Đăng Kí</button>
            </form>
        </div>
    </div>
    <div class="description"></div>
    {{-- <script src="../config/HeaderFooter.js"></script> --}}
    {{-- <script src="../library/sweetalert2/dist/sweetalert2.min.js"></script> --}}

    {{-- <script src="../config/UserState.js"></script> --}}
</body>
@script

</html>
