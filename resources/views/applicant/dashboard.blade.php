@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Full Background -->
<div class="relative min-h-screen bg-gradient-to-b from-blue-900 via-blue-800 to-blue-700 text-white overflow-hidden">
    <div class="absolute inset-0 bg-black bg-opacity-40"></div>

    <!-- Navigation Bar -->
    <nav class="relative z-20 bg-white/10 backdrop-blur-md border-b border-white/20 py-3 shadow-md">
        <div class="container mx-auto flex justify-between items-center px-6">
            <h1 class="text-xl font-bold text-white tracking-wide">Philippine Coast Guard</h1>

            <div class="flex items-center space-x-4">
                <span class="text-sm text-gray-200">
                    {{ $user->name ?? 'User' }} ({{ ucfirst($user->role ?? 'user') }})
                </span>

                <a href="#"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="bg-red-600 hover:bg-red-700 transition duration-300 text-white px-4 py-2 rounded-lg shadow-md text-sm font-semibold">
                    Logout
                </a>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </div>
    </nav>

    <!-- Dashboard Content -->
    <div class="relative z-10 flex flex-col items-center justify-center min-h-[80vh] px-4">
        <div class="bg-white/10 backdrop-blur-md rounded-3xl shadow-2xl p-10 w-full max-w-2xl text-center border border-white/20">
            <h2 class="text-4xl font-bold mb-6">Welcome, {{ $user->name ?? 'User' }}!</h2>
            <p class="text-gray-200 text-lg mb-8">
                You are logged in as a <strong class="text-orange-400">{{ ucfirst($user->role ?? 'user') }}</strong>.
            </p>

            <div class="grid md:grid-cols-2 gap-6">
                <!-- Profile Card -->
                <div class="bg-white/10 hover:bg-white/20 rounded-2xl p-6 transition duration-300 border border-white/20">
                    <h3 class="text-xl font-semibold mb-2">Profile</h3>
                    <p class="text-gray-300 text-sm mb-3">View and edit your personal information.</p>
                    <a href="{{ route('profile') }}" class="text-blue-400 hover:text-blue-300 text-sm font-medium">Go to Profile →</a>
                </div>

                <!-- Upload Documents Card -->
                <div class="bg-white/10 hover:bg-white/20 rounded-2xl p-6 transition duration-300 border border-white/20">
                    <h3 class="text-xl font-semibold mb-2">Upload Documents</h3>
                    <p class="text-gray-300 text-sm mb-3">Upload your required applicant files here.</p>
                    <a href="{{ route('upload.documents') }}" class="text-blue-400 hover:text-blue-300 text-sm font-medium">Go to Uploads →</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
