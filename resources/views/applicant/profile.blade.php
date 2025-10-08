@extends('layouts.app')

@section('title', 'Profile Setup')

@section('content')
<div
    x-data="{ step: 1 }"
    class="relative min-h-screen bg-gradient-to-b from-blue-900 via-blue-800 to-blue-700 text-white px-6 py-16 sm:p-10"
>
    <div class="bg-white/10 backdrop-blur-md p-8 rounded-3xl border border-white/20 max-w-4xl mx-auto shadow-2xl">

        <!-- Title -->
        <h2 class="text-3xl font-bold mb-6 text-center">Complete Your Profile</h2>

        <!-- Step Indicators -->
        <div class="flex justify-center mb-8 space-x-4">
            <template x-for="i in [1,2,3]">
                <div
                    :class="step === i ? 'bg-blue-500 text-white' : 'bg-white/20 text-gray-300'"
                    class="w-10 h-10 rounded-full flex items-center justify-center text-sm font-semibold transition-all"
                    x-text="i"
                ></div>
            </template>
        </div>

        <!-- Step Forms -->
        <form method="POST" action="{{ route('profile.update') }}" class="space-y-8">
            @csrf

            <!-- ✅ STEP 1: Personal Info -->
            <div x-show="step === 1" x-transition>
                <h3 class="text-xl font-semibold mb-4 text-center">Personal Information</h3>

                <div class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-200 mb-1">First Name</label>
                            <input type="text" name="first_name" class="w-full rounded-lg p-3 bg-white/10 border border-white/20 text-white" placeholder="Enter first name" required>
                        </div>
                        <div>
                            <label class="block text-gray-200 mb-1">Middle Name</label>
                            <input type="text" name="middle_name" class="w-full rounded-lg p-3 bg-white/10 border border-white/20 text-white" placeholder="Enter middle name">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-200 mb-1">Last Name</label>
                            <input type="text" name="last_name" class="w-full rounded-lg p-3 bg-white/10 border border-white/20 text-white" placeholder="Enter last name" required>
                        </div>
                        <div>
                            <label class="block text-gray-200 mb-1">Extension (e.g., Jr., III)</label>
                            <input type="text" name="extension_name" class="w-full rounded-lg p-3 bg-white/10 border border-white/20 text-white" placeholder="Optional">
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-200 mb-1">Email</label>
                        <input type="email" name="email" value="{{ $user->email ?? '' }}" class="w-full rounded-lg p-3 bg-white/10 border border-white/20 text-white" readonly>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-200 mb-1">Birthday</label>
                            <input type="date" name="birthday" class="w-full rounded-lg p-3 bg-white/10 border border-white/20 text-white">
                        </div>
                        <div>
                            <label class="block text-gray-200 mb-1">Sex</label>
                            <select name="sex" class="w-full rounded-lg p-3 bg-white/10 border border-white/20 text-white">
                                <option value="">Select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mt-6 text-right">
                    <button
                        type="button"
                        @click="step = 2"
                        class="bg-blue-600 hover:bg-blue-700 px-6 py-2 rounded-lg font-semibold transition"
                    >Next →</button>
                </div>
            </div>

            <!-- ✅ STEP 2: Address -->
            <div x-show="step === 2" x-transition>
                <h3 class="text-xl font-semibold mb-4 text-center">Address Information</h3>

                <div class="space-y-4">
                    <div>
                        <label class="block text-gray-200 mb-1">Street</label>
                        <input type="text" name="street" class="w-full rounded-lg p-3 bg-white/10 border border-white/20 text-white" placeholder="Street Address">
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-200 mb-1">City/Municipality</label>
                            <input type="text" name="city" class="w-full rounded-lg p-3 bg-white/10 border border-white/20 text-white" placeholder="City or Municipality">
                        </div>
                        <div>
                            <label class="block text-gray-200 mb-1">Province</label>
                            <input type="text" name="province" class="w-full rounded-lg p-3 bg-white/10 border border-white/20 text-white" placeholder="Province">
                        </div>
                    </div>
                    <div>
                        <label class="block text-gray-200 mb-1">Zip Code</label>
                        <input type="text" name="zipcode" class="w-full rounded-lg p-3 bg-white/10 border border-white/20 text-white" placeholder="Zip Code">
                    </div>
                </div>

                <div class="mt-6 flex justify-between">
                    <button
                        type="button"
                        @click="step = 1"
                        class="bg-gray-500 hover:bg-gray-600 px-6 py-2 rounded-lg font-semibold transition"
                    >← Back</button>

                    <button
                        type="button"
                        @click="step = 3"
                        class="bg-blue-600 hover:bg-blue-700 px-6 py-2 rounded-lg font-semibold transition"
                    >Next →</button>
                </div>
            </div>

            <!-- ✅ STEP 3: Educational Background -->
            <div x-show="step === 3" x-transition>
                <h3 class="text-xl font-semibold mb-4 text-center">Educational Background</h3>

                <div class="space-y-4">
                    <div>
                        <label class="block text-gray-200 mb-1">Highest Educational Attainment</label>
                        <input type="text" name="education_level" class="w-full rounded-lg p-3 bg-white/10 border border-white/20 text-white" placeholder="e.g., Bachelor's Degree">
                    </div>
                    <div>
                        <label class="block text-gray-200 mb-1">Course / Major</label>
                        <input type="text" name="course" class="w-full rounded-lg p-3 bg-white/10 border border-white/20 text-white" placeholder="Your Course">
                    </div>
                    <div>
                        <label class="block text-gray-200 mb-1">School / University</label>
                        <input type="text" name="school" class="w-full rounded-lg p-3 bg-white/10 border border-white/20 text-white" placeholder="Name of School">
                    </div>
                    <div>
                        <label class="block text-gray-200 mb-1">Year Graduated</label>
                        <input type="text" name="year_graduated" class="w-full rounded-lg p-3 bg-white/10 border border-white/20 text-white" placeholder="YYYY">
                    </div>
                </div>

                <div class="mt-6 flex justify-between">
                    <button
                        type="button"
                        @click="step = 2"
                        class="bg-gray-500 hover:bg-gray-600 px-6 py-2 rounded-lg font-semibold transition"
                    >← Back</button>

                    <button
                        type="submit"
                        class="bg-green-600 hover:bg-green-700 px-6 py-2 rounded-lg font-semibold transition"
                    >Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
