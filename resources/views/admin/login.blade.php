<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

```
<title>Login Admin</title>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    body {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: linear-gradient(135deg, #f1efff, #dcd7ff);
    }

    .login-box {
        width: 380px;
        background: white;
        padding: 35px;
        border-radius: 20px;
        box-shadow: 0 15px 40px rgba(80, 65, 120, 0.12);
        border: 1px solid #eeeaf5;
    }

    .login-icon {
        width: 55px;
        height: 55px;
        margin: 0 auto 18px;
        border-radius: 16px;
        background: #8b7cf6;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 25px;
    }

    .login-box h2 {
        text-align: center;
        margin-bottom: 8px;
        color: #7565e8;
        font-size: 25px;
    }

    .login-box p {
        text-align: center;
        color: #9993aa;
        margin-bottom: 25px;
        font-size: 14px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-group label {
        display: block;
        margin-bottom: 7px;
        font-weight: bold;
        color: #4d475c;
        font-size: 14px;
    }

    .form-group input {
        width: 100%;
        padding: 12px 14px;
        border: 1px solid #e4e0ed;
        border-radius: 11px;
        outline: none;
        font-size: 14px;
        transition: 0.2s;
    }

    .form-group input:focus {
        border-color: #8b7cf6;
        box-shadow: 0 0 0 3px rgba(139, 124, 246, 0.10);
    }

    .form-group input::placeholder {
        color: #b4afbd;
    }

    .btn-login {
        width: 100%;
        padding: 13px;
        border: none;
        border-radius: 11px;
        background: #8576ef;
        color: white;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.2s;
        box-shadow: 0 6px 15px rgba(133, 118, 239, 0.20);
    }

    .btn-login:hover {
        background: #7161dc;
        transform: translateY(-1px);
    }

    .btn-login:active {
        transform: translateY(0);
    }

    .error-message {
        background: #fff0f2;
        color: #df5d70;
        padding: 10px 12px;
        border-radius: 10px;
        margin-bottom: 18px;
        font-size: 13px;
    }
</style>
```

</head>

<body>

```
<div class="login-box">

    <div class="login-icon">
        ✦
    </div>

    <h2>Login Admin</h2>

    <p>Silakan masuk untuk melanjutkan</p>

    @if($errors->any())
        <div class="error-message">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('admin.authenticate') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Email</label>

            <input
                type="email"
                name="email"
                placeholder="Masukkan email"
                value="{{ old('email') }}"
            >
        </div>

        <div class="form-group">
            <label>Password</label>

            <input
                type="password"
                name="password"
                placeholder="Masukkan password"
            >
        </div>

        <button type="submit" class="btn-login">
            Login
        </button>

    </form>

</div>
```

</body>
</html>
