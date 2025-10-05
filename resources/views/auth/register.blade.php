<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Dashboard Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .hidden {
            display: none;
        }
    </style>
</head>
<body class="bg-gray-100 antialiased">
    <div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 p-10 bg-white rounded-xl shadow-lg">
            <div>
                <div class="flex justify-center">
                    <svg class="h-12 w-auto text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                    </svg>
                </div>
                <h2 class="mt-6 text-center text-3xl font-bold text-gray-900">
                    Buat Akun Baru
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Daftar untuk memulai sesi Anda
                </p>
            </div>
            <form id="register-form" class="mt-8 space-y-6" action="{{ route('register') }}" method="POST">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-user text-gray-400"></i>
                        </div>
                        <input id="name" name="name" type="text" autocomplete="name" required
                            value="{{ old('name') }}"
                            class="block w-full pl-10 pr-3 py-2 border @error('name') border-red-500 @else border-gray-300 @enderror rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            placeholder="Nama Anda">
                    </div>
                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Alamat Email</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <input id="email" name="email" type="email" autocomplete="email" required
                            value="{{ old('email') }}"
                            class="block w-full pl-10 pr-3 py-2 border @error('email') border-red-500 @else border-gray-300 @enderror rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            placeholder="anda@email.com">
                    </div>
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input id="password" name="password" type="password" required
                            class="block w-full pl-10 pr-10 py-2 border @error('password') border-red-500 @else border-gray-300 @enderror rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            placeholder="Password">
                        <button type="button" id="toggle-password"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <i id="eye-icon" class="fas fa-eye text-gray-500"></i>
                            <i id="eye-slash-icon" class="fas fa-eye-slash text-gray-500 hidden"></i>
                        </button>
                    </div>
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi
                        Password</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input id="password_confirmation" name="password_confirmation" type="password" required
                            class="block w-full pl-10 pr-10 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            placeholder="Ketik ulang password">
                        <button type="button" id="toggle-confirm-password"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <i id="confirm-eye-icon" class="fas fa-eye text-gray-500"></i>
                            <i id="confirm-eye-slash-icon" class="fas fa-eye-slash text-gray-500 hidden"></i>
                        </button>
                    </div>
                </div>
                <div>
                    <button type="submit" id="register-button"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-opacity duration-300">
                        <span class="button-text">Daftar</span>
                        <i class="fas fa-spinner fa-spin button-spinner hidden ml-2"></i>
                    </button>
                </div>
            </form>
            <div class="text-center text-sm text-gray-600">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500">
                    Masuk di sini
                </a>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            function setupPasswordToggle(inputId, toggleButtonId, eyeIconId, eyeSlashIconId) {
                const passwordInput = document.getElementById(inputId);
                const togglePasswordButton = document.getElementById(toggleButtonId);
                if (passwordInput && togglePasswordButton) {
                    const eyeIcon = document.getElementById(eyeIconId);
                    const eyeSlashIcon = document.getElementById(eyeSlashIconId);
                    togglePasswordButton.addEventListener('click', () => {
                        const type = passwordInput.getAttribute('type') === 'password' ? 'text' :
                        'password';
                        passwordInput.setAttribute('type', type);
                        eyeIcon.classList.toggle('hidden');
                        eyeSlashIcon.classList.toggle('hidden');
                    });
                }
            }
            setupPasswordToggle('password', 'toggle-password', 'eye-icon', 'eye-slash-icon');
            setupPasswordToggle('password_confirmation', 'toggle-confirm-password', 'confirm-eye-icon',
                'confirm-eye-slash-icon');
            const registerForm = document.getElementById('register-form');
            const registerButton = document.getElementById('register-button');
            const buttonText = registerButton.querySelector('.button-text');
            const buttonSpinner = registerButton.querySelector('.button-spinner');
            registerForm.addEventListener('submit', () => {
                registerButton.disabled = true;
                registerButton.classList.add('opacity-75', 'cursor-not-allowed');
                buttonText.classList.add('hidden');
                buttonSpinner.classList.remove('hidden');
            });
        });
    </script>
</body>
</html>
