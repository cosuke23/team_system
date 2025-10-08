@extends('layouts.app')

@section('title', 'Register')

@section('content')
<!-- Background Section -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="relative min-h-screen flex items-center justify-center bg-gradient-to-b from-blue-900 via-blue-800 to-blue-700 overflow-hidden">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>

    <div class="relative bg-white/10 backdrop-blur-md rounded-3xl shadow-2xl p-10 w-full max-w-md text-white z-10">
        <h2 class="text-3xl font-bold text-center mb-8">Create an Account</h2>

        <form action="{{ route('register.store') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-medium mb-1">Full Name</label>
                <input type="text" name="name" class="w-full px-4 py-2 rounded-lg bg-white/20 border border-white/30 text-white placeholder-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Enter your full name">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Email</label>
                <input type="email" name="email" class="w-full px-4 py-2 rounded-lg bg-white/20 border border-white/30 text-white placeholder-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Enter your email">
            </div>

            <!-- Password Field with Toggle -->
            <div class="relative">
                <label class="block text-sm font-medium mb-1">Password</label>
                <input type="password" name="password" id="password" class="w-full px-4 py-2 pr-10 rounded-lg bg-white/20 border border-white/30 text-white placeholder-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Enter your password">
                <button type="button" id="togglePassword" class="absolute right-3 top-9 text-gray-300 hover:text-white focus:outline-none">
                    <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>
            </div>

            <!-- Confirm Password Field with Toggle -->
            <div class="relative">
                <label class="block text-sm font-medium mb-1">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="w-full px-4 py-2 pr-10 rounded-lg bg-white/20 border border-white/30 text-white placeholder-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Confirm your password">
                <button type="button" id="togglePasswordConfirm" class="absolute right-3 top-9 text-gray-300 hover:text-white focus:outline-none">
                    <svg id="eyeIconConfirm" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>
            </div>

            <div class="text-center pt-4">
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 transition duration-300 font-semibold py-2 rounded-lg shadow-lg">
                    Register
                </button>
            </div>
        </form>

        <p class="text-center text-sm mt-6 text-gray-200">
            Already have an account?
            <a href="{{ route('login') }}" class="text-orange-400 hover:text-orange-500 font-semibold">
                Login here
            </a>
        </p>
    </div>
</div>

<!-- Scripts -->
<script>
document.querySelector('form').addEventListener('submit', function() {
    Swal.fire({
        title: 'Registering...',
        text: 'Please wait while we create your account.',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });
});

// Toggle for Password
const togglePassword = document.getElementById('togglePassword');
const password = document.getElementById('password');
const eyeIcon = document.getElementById('eyeIcon');

togglePassword.addEventListener('click', () => {
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    eyeIcon.innerHTML = type === 'password'
        ? `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />`
        : `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a10.05 10.05 0 013.248-4.525M9.88 9.88A3 3 0 0114.12 14.12M9.88 9.88L4.22 4.22M14.12 14.12L19.78 19.78" />`;
});

// Toggle for Confirm Password
const togglePasswordConfirm = document.getElementById('togglePasswordConfirm');
const passwordConfirm = document.getElementById('password_confirmation');
const eyeIconConfirm = document.getElementById('eyeIconConfirm');

togglePasswordConfirm.addEventListener('click', () => {
    const type = passwordConfirm.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordConfirm.setAttribute('type', type);
    eyeIconConfirm.innerHTML = type === 'password'
        ? `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />`
        : `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a10.05 10.05 0 013.248-4.525M9.88 9.88A3 3 0 0114.12 14.12M9.88 9.88L4.22 4.22M14.12 14.12L19.78 19.78" />`;
});
</script>
@endsection
