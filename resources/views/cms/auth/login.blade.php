<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login CMS - {{ config('app.name', 'Portal PTSP') }}</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        /* Custom Gradient matched to the image */
        .bg-brand-gradient {
            background-color: #0164CA;
            /* background-image: linear-gradient(135deg, #0d47a1 0%, #1976d2 50%, #2196f3 100%); */
        }

        .brand-blue {
            background-color: #0164CA;
        }
    </style>
</head>
<body class="min-h-screen bg-gray-50 flex antialiased text-gray-800">

    <!-- Left Panel (Blue Side) -->
    <div class="hidden lg:flex lg:w-1/2 bg-brand-gradient relative flex-col justify-center px-16 xl:px-24 text-white overflow-hidden">
        <!-- Optional Decorative Glow -->
        <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl opacity-30"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-96 h-96 bg-blue-600 rounded-full mix-blend-multiply filter blur-3xl opacity-30"></div>

        <div class="relative z-10 w-full max-w-lg">
            <div class="bg-white p-3 rounded-2xl inline-flex mb-8 shadow-lg">
                <img src="{{ asset('images/logo/ptsp.png') }}" alt="Logo" class="h-10 w-auto rounded">
            </div>

            <h1 class="text-3xl xl:text-4xl font-bold mb-2 tracking-tight">Pelayanan Terpadu</h1>
            <h2 class="text-3xl xl:text-4xl font-bold text-yellow-400 mb-6 tracking-tight">Satu Pintu (PTSP)</h2>

            <p class="text-blue-50 text-base xl:text-lg mb-12 leading-relaxed">
                Pemerintah Kota Tangerang Selatan berkomitmen untuk mewujudkan pelayanan perizinan dan non-perizinan yang mudah, cepat, efisien, dan transparan melalui tata kelola pemerintahan yang baik.
            </p>

            <div class="border-t border-blue-400 border-opacity-30 pt-8 flex gap-12">
                <div>
                    <h3 class="text-xl font-bold mb-1">Transparan</h3>
                    <p class="text-blue-100 text-sm">Penilaian yang objektif</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-1">Akuntabel</h3>
                    <p class="text-blue-100 text-sm">Dapat dipertanggungjawabkan</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Panel (Login Form) -->
    <div class="w-full lg:w-1/2 flex flex-col justify-center items-center px-8 sm:px-16 relative bg-white">
        <div class="w-full max-w-[400px]">

            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-gray-900 mb-3 tracking-tight">Selamat Datang</h2>
                <p class="text-gray-500 text-sm">Silakan masuk ke akun Anda untuk melanjutkan</p>
            </div>

            <form method="POST" action="{{ route('cms.login.authenticate') }}" class="w-full">
                @csrf

                <div class="mb-5">
                    <label for="username" class="block text-xs font-bold text-gray-700 mb-2 uppercase tracking-wide">Username</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                            <i class="fa-regular fa-user text-gray-400"></i>
                        </div>
                        <input id="username" name="username" type="text" value="{{ old('username') }}" required autofocus
                            class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-lg text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:border-[#0164CA] focus:ring-1 focus:ring-[#0164CA] transition-colors shadow-sm"
                            placeholder="Masukkan username Anda">
                    </div>
                    @error('username')
                        <p class="mt-2 text-xs text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-xs font-bold text-gray-700 mb-2 uppercase tracking-wide">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                            <i class="fa-solid fa-lock text-gray-400 text-sm"></i>
                        </div>
                        <input id="password" name="password" type="password" required
                            class="w-full pl-10 pr-10 py-3 border border-gray-200 rounded-lg text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:border-[#0164CA] focus:ring-1 focus:ring-[#0164CA] transition-colors shadow-sm"
                            placeholder="Masukkan password Anda">
                        <button type="button" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none" onclick="const p = document.getElementById('password'); p.type = p.type === 'password' ? 'text' : 'password'; this.querySelector('i').classList.toggle('fa-eye'); this.querySelector('i').classList.toggle('fa-eye-slash');">
                            <i class="fa-regular fa-eye"></i>
                        </button>
                    </div>
                    @error('password')
                        <p class="mt-2 text-xs text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center mb-8">
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <div class="relative flex items-center justify-center w-4 h-4 border border-gray-300 rounded bg-white group-hover:border-blue-500 transition-colors">
                            <input type="checkbox" name="remember" value="1" class="peer absolute opacity-0 w-full h-full cursor-pointer">
                            <i class="fa-solid fa-check text-[10px] text-white peer-checked:text-blue-600 opacity-0 peer-checked:opacity-100 transition-opacity pointer-events-none"></i>
                        </div>
                        <span class="text-sm font-medium text-gray-600 select-none">Ingat Saya</span>
                    </label>
                </div>

                <button type="submit" class="w-full brand-blue text-white font-semibold py-3.5 px-4 rounded-lg transition-all flex items-center justify-center gap-2 text-sm">
                    Masuk ke Sistem <i class="fa-solid fa-arrow-right text-[12px] opacity-90"></i>
                </button>
            </form>

            <div class="mt-16 text-center text-xs text-gray-400 font-medium">
                <p class="mb-1">&copy; {{ date('Y') }} {{ config('app.name', 'Portal PTSP') }}</p>
                <p>Pemerintah Kota Tangerang Selatan</p>
            </div>

        </div>
    </div>

</body>
</html>
