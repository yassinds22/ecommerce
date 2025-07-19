<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/stylerigster.css">
</head>
<style>

input{
    padding: 5px;
    direction: rtl;
}
</style>

<body >
    <div class="wrapper" >
        <div class="title-text">
            <div class="title login">Login Form</div>
            <div class="title signup">Signup Form</div>
        </div>
        <div class="form-container">
            <div class="slide-controls">
                <input type="radio" name="slide" id="login" checked>
                <input type="radio" name="slide" id="signup">
                <label for="login" class="slide login">Login</label>
                <label for="signup" class="slide signup">Signup</label>
                <div class="slider-tab"></div>
            </div>
            <div class="form-inner">
                <form method="POST" action="{{ route('checkuserLogin') }}" class="login">
                    @csrf
                    <div class="field" dir="rtl">
                        <input style="padding: 5px" name="email" type="text" placeholder="البريد الالكتروني " required>
                    </div>
                    <div class="field">
                        <input type="password" name="pass" placeholder="كلمة السر" required>
                    </div>
                    <div class="pass-link"><a href="#">Forgot password?</a></div>
                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" value="Login">
                    </div>
                    <div class="signup-link">Not a member? <a href="">Signup now</a></div>
                </form>
                <form method="POST" action="{{ route('regster') }}" class="signup" >
                    @csrf
                    <div class="field">
                        <input type="text" name="username" placeholder="الاسم الرباعي" >
                    </div>
                    <div class="field">
                        <input type="email" name="email" placeholder="البريد الالكتروني">
                    </div>
                    <div class="field">
                        <input type="password" name="pass" placeholder="كلمة السر" >
                    </div>
                    {{-- <div class="field">
                        <input type="password" placeholder="تاكيد كلمة السر" required>
                    </div> --}}
                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" value="Signup">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        const loginText = document.querySelector(".title-text .login");
        const loginForm = document.querySelector("form.login");
        const loginBtn = document.querySelector("label.login");
        const signupBtn = document.querySelector("label.signup");
        const signupLink = document.querySelector("form .signup-link a");
        signupBtn.onclick = (() => {
            loginForm.style.marginLeft = "-50%";
            loginText.style.marginLeft = "-50%";
        });
        loginBtn.onclick = (() => {
            loginForm.style.marginLeft = "0%";
            loginText.style.marginLeft = "0%";
        });
        signupLink.onclick = (() => {
            signupBtn.click();
            return false;
        });
    </script>
</body>

</html>
