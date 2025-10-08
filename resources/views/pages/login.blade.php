@extends('layouts.app')

@section('title', 'Login')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="relative min-h-screen flex items-center justify-center bg-gradient-to-b from-blue-900 via-blue-800 to-blue-700 overflow-hidden">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>

    <div class="relative bg-white/10 backdrop-blur-md rounded-3xl shadow-2xl p-10 w-full max-w-md text-white z-10">
        <h2 class="text-3xl font-bold text-center mb-8">Login to Your Account</h2>

        <form action="{{ route('login.store') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-medium mb-1">Email</label>
                <input type="email" name="email" required class="w-full px-4 py-2 rounded-lg bg-white/20 border border-white/30 text-white placeholder-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Enter your email">
            </div>

            <!-- Password with toggle -->
            <div class="relative">
                <label class="block text-sm font-medium mb-1">Password</label>
                <input type="password" name="password" id="password" required class="w-full px-4 py-2 pr-10 rounded-lg bg-white/20 border border-white/30 text-white placeholder-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Enter your password">
                <button type="button" id="togglePassword" class="absolute right-3 top-9 text-gray-300 hover:text-white focus:outline-none">
                    <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>
            </div>

            <div class="text-center pt-4">
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 transition duration-300 font-semibold py-2 rounded-lg shadow-lg">
                    Login
                </button>
            </div>
        </form>

        <p class="text-center text-sm mt-6 text-gray-200">
            Don’t have an account?
            <a href="{{ route('register') }}" class="text-orange-400 hover:text-orange-500 font-semibold">
                Register now
            </a>
        </p>
    </div>
</div>

@if(session('registered'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Account Created!',
    text: 'Your account has been created successfully. You may now log in.',
    confirmButtonColor: '#2563eb',
    confirmButtonText: 'Proceed to Login'
});
</script>
@endif

<script>
// Password Toggle
const togglePassword = document.getElementById('togglePassword');
const password = document.getElementById('password');
const eyeIcon = document.getElementById('eyeIcon');

togglePassword.addEventListener('click', () => {
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    eyeIcon.innerHTML = type === 'password'
        ? `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7
                   -1.274 4.057-5.065 7-9.542 7
                   -4.477 0-8.268-2.943-9.542-7z" />`
        : `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M13.875 18.825A10.05 10.05 0 0112 19
                   c-4.477 0-8.268-2.943-9.542-7
                   a10.05 10.05 0 013.248-4.525M9.88 9.88A3 3 0 0114.12 14.12
                   M9.88 9.88L4.22 4.22M14.12 14.12L19.78 19.78" />`;
});
</script>
@endsection
