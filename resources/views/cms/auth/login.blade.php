<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login CMS - {{ config('app.name', 'Portal PTSP') }}</title>

        <style>
            * {
                box-sizing: border-box;
            }

            body {
                min-height: 100vh;
                margin: 0;
                display: grid;
                place-items: center;
                background: #f4f7fa;
                color: #0b1a22;
                font-family: Arial, sans-serif;
            }

            .login-card {
                width: min(100% - 32px, 420px);
                padding: 28px;
                border-radius: 8px;
                background: #ffffff;
                box-shadow: 0 18px 44px rgba(8, 51, 73, 0.14);
            }

            .login-title {
                margin: 0 0 6px;
                font-size: 24px;
                line-height: 1.2;
            }

            .login-subtitle {
                margin: 0 0 24px;
                color: #64748b;
                font-size: 14px;
            }

            .form-group {
                margin-bottom: 16px;
            }

            label {
                display: block;
                margin-bottom: 8px;
                font-size: 13px;
                font-weight: 700;
            }

            input[type="text"],
            input[type="password"] {
                width: 100%;
                min-height: 44px;
                padding: 10px 12px;
                border: 1px solid #cbd5e1;
                border-radius: 6px;
                font-size: 14px;
            }

            input:focus {
                border-color: #0a8f8f;
                outline: 3px solid rgba(10, 143, 143, 0.14);
            }

            .remember-row {
                display: flex;
                align-items: center;
                gap: 8px;
                margin-bottom: 20px;
                font-size: 14px;
            }

            .error-message {
                margin-top: 8px;
                color: #b91c1c;
                font-size: 13px;
            }

            .login-button {
                width: 100%;
                min-height: 44px;
                border: 0;
                border-radius: 6px;
                background: #083349;
                color: #ffffff;
                cursor: pointer;
                font-size: 14px;
                font-weight: 700;
            }

            .login-button:hover {
                background: #0a425e;
            }
        </style>
    </head>
    <body>
        <main class="login-card">
            <h1 class="login-title">Login CMS</h1>
            <p class="login-subtitle">Masuk menggunakan username dan password.</p>

            <form method="POST" action="{{ route('cms.login.authenticate') }}">
                @csrf

                <div class="form-group">
                    <label for="username">Username</label>
                    <input
                        id="username"
                        name="username"
                        type="text"
                        value="{{ old('username') }}"
                        autocomplete="username"
                        required
                        autofocus
                    >

                    @error('username')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        autocomplete="current-password"
                        required
                    >

                    @error('password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <label class="remember-row">
                    <input name="remember" type="checkbox" value="1">
                    Ingat saya
                </label>

                <button class="login-button" type="submit">Masuk</button>
            </form>
        </main>
    </body>
</html>
