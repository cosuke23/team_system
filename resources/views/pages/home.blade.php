@extends('layouts.app')

@section('title', 'Home')

@section('content')

<!-- ============================= -->
<!-- 1. Fullscreen Hero Section -->
<!-- ============================= -->
<div class="relative w-screen h-screen overflow-hidden">

    <!-- Background Video -->
    <video
        autoplay
        loop
        muted
        playsinline
        class="absolute top-0 left-0 w-full h-full object-cover"
        poster="{{ asset('images/video-poster.jpg') }}"
    >
        <source src="{{ asset('videos/background_security.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/70"></div>

    <!-- Hero Content -->
    <div class="relative z-10 flex flex-col justify-center items-center text-center w-full h-full px-6">
        <h1 class="text-5xl sm:text-6xl lg:text-7xl font-extrabold text-white leading-tight mb-4 drop-shadow-lg">
            Philippine Coast Guard
        </h1>

        <p class="text-lg sm:text-xl text-gray-200 max-w-2xl mb-6 drop-shadow-lg">
            Protecting lives, property, and the marine environment across the Philippine archipelago.
        </p>

        <div class="flex flex-wrap justify-center gap-4 mt-6">
            <a href="{{ route('services') }}"
               class="px-8 py-3 bg-orange-600 text-white font-medium rounded-md shadow-lg hover:bg-orange-700 transition transform hover:scale-105">
                Our Services
            </a>

            <a href="{{ route('contact') }}"
               class="px-8 py-3 bg-white/20 text-white font-medium rounded-md shadow-lg backdrop-blur-sm hover:bg-white/40 transition transform hover:scale-105">
                Contact Us
            </a>
        </div>

        <!-- Scroll Down Arrow -->
        <div class="absolute bottom-10 animate-bounce">
            <a href="#mission" class="text-white text-2xl">
                &#x25BC;
            </a>
        </div>
    </div>
</div>

<!-- ============================= -->
<!-- 2. Mission & Vision Section -->
<!-- ============================= -->
<section id="mission" class="bg-gradient-to-b from-blue-50 to-white py-20">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-4xl font-extrabold text-blue-900 mb-12">Our Mission & Vision</h2>

        <div class="grid md:grid-cols-2 gap-10">
            <!-- Mission -->
            <div class="p-8 bg-white rounded-2xl shadow-lg hover:shadow-2xl transition">
                <h3 class="text-2xl font-bold text-orange-600 mb-4">Mission</h3>
                <p class="text-gray-700 leading-relaxed">
                    To ensure the safe, secure, and clean seas of the Philippines through maritime law enforcement,
                    search and rescue operations, environmental protection, and disaster response.
                </p>
            </div>

            <!-- Vision -->
            <div class="p-8 bg-white rounded-2xl shadow-lg hover:shadow-2xl transition">
                <h3 class="text-2xl font-bold text-orange-600 mb-4">Vision</h3>
                <p class="text-gray-700 leading-relaxed">
                    To be a world-class guardian of the sea — responsive, resilient, and respected for its service to the nation.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ============================= -->
<!-- 3. About Us Section -->
<!-- ============================= -->
<section id="about" class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-4xl font-extrabold text-blue-900 mb-12">About Us</h2>

        <div class="grid md:grid-cols-2 gap-10 items-center">
            <div>
                <img src="{{ asset('images/pcg_vessel.jpg') }}" alt="PCG Vessel" class="rounded-2xl shadow-xl w-full">
            </div>

            <div class="text-left">
                <p class="text-gray-700 mb-4">
                    The Philippine Coast Guard (PCG) is the country’s premier maritime safety and security organization.
                    It is mandated to perform search and rescue operations, enforce maritime laws, protect marine
                    environments, and provide humanitarian assistance in times of calamity.
                </p>

                <p class="text-gray-700">
                    With professionalism and commitment, the PCG continues to uphold its core values of
                    <strong>Honor, Service, and Sacrifice</strong> — ensuring the protection and welfare of the Filipino people.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ============================= -->
<!-- 4. Contact Us Section -->
<!-- ============================= -->
<section id="contact" class="bg-gradient-to-b from-blue-900 to-blue-700 py-20 text-white">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-4xl font-extrabold mb-10">Contact Us</h2>

        <p class="text-lg text-blue-100 mb-8 max-w-2xl mx-auto">
            Have a concern, inquiry, or want to collaborate? The Philippine Coast Guard is ready to assist.
        </p>

        <div class="grid md:grid-cols-3 gap-8 mt-10">
            <div class="bg-white/10 p-6 rounded-xl backdrop-blur-md">
                <h3 class="text-xl font-semibold mb-2">Headquarters</h3>
                <p>139 25th Street, Port Area, Manila</p>
            </div>

            <div class="bg-white/10 p-6 rounded-xl backdrop-blur-md">
                <h3 class="text-xl font-semibold mb-2">Email</h3>
                <p>info@coastguard.gov.ph</p>
            </div>

            <div class="bg-white/10 p-6 rounded-xl backdrop-blur-md">
                <h3 class="text-xl font-semibold mb-2">Hotline</h3>
                <p>PCG Action Center: (02) 8527-8481</p>
            </div>
        </div>

        <div class="mt-12">
            <a href="{{ route('contact') }}"
               class="px-8 py-3 bg-orange-500 hover:bg-orange-600 text-white rounded-md font-semibold transition shadow-lg">
                Send Us a Message
            </a>
        </div>
    </div>
</section>

@endsection
