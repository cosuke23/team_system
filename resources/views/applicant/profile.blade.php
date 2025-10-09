@extends('layouts.app')

@section('title', 'Profile Setup')

@section('content')
    <div x-data="{ step: 1 }"
        class="relative min-h-screen bg-gradient-to-b from-blue-900 via-blue-800 to-blue-700 text-white px-6 py-16 sm:p-10">
        <div class="bg-white/10 backdrop-blur-md p-8 rounded-3xl border border-white/20 max-w-4xl mx-auto shadow-2xl">

            <!-- Title -->
            <h2 class="text-3xl font-bold mb-6 text-center">Complete Your Profile</h2>

            <!-- Step Indicators -->
            <div class="flex justify-center mb-8 space-x-4">
                <template x-for="i in [1,2,3]">
                    <div :class="step === i ? 'bg-blue-500 text-white' : 'bg-white/20 text-gray-300'"
                        class="w-10 h-10 rounded-full flex items-center justify-center text-sm font-semibold transition-all"
                        x-text="i"></div>
                </template>
            </div>

            <!-- Step Forms -->
            <form method="POST" action="{{ route('profile.update') }}" class="space-y-8">
                @csrf

                <div x-show="step === 1" x-transition>
                    <h3 class="text-xl font-semibold mb-4 text-center">Personal Information</h3>

                    <div class="flex justify-center mb-6">
                        <div class="relative">
                            <label for="photo" class="cursor-pointer flex flex-col items-center">
                                <img id="photoPreview" src="{{ asset('images/default-2x2.png') }}" alt="2x2 Photo"
                                    class="w-24 h-24 rounded-lg object-cover border-2 border-white/30">
                                <span class="text-xs text-gray-300 mt-2">Upload 2x2 Photo</span>
                            </label>
                            <input type="file" id="photo" name="photo" accept="image/*" class="hidden"
                                onchange="previewPhoto(event)">
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-200 mb-1">First Name</label>
                                <input type="text" name="first_name"
                                    class="w-full rounded-lg p-3 bg-white/10 border border-white/20 text-white"
                                    placeholder="Enter first name" required>
                            </div>
                            <div>
                                <label class="block text-gray-200 mb-1">Middle Name</label>
                                <input type="text" name="middle_name"
                                    class="w-full rounded-lg p-3 bg-white/10 border border-white/20 text-white"
                                    placeholder="Enter middle name">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-200 mb-1">Last Name</label>
                                <input type="text" name="last_name"
                                    class="w-full rounded-lg p-3 bg-white/10 border border-white/20 text-white"
                                    placeholder="Enter last name" required>
                            </div>
                            <div>
                                <label class="block text-gray-200 mb-1">Extension (e.g., Jr., III)</label>
                                <input type="text" name="extension_name"
                                    class="w-full rounded-lg p-3 bg-white/10 border border-white/20 text-white"
                                    placeholder="Optional">
                            </div>
                        </div>

                        <!-- Hidden Email Field -->
                        <input type="hidden" name="email" value="{{ $user->email ?? '' }}">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Birthday + Age -->
                            <div>
                                <label class="block text-gray-200 mb-1">Birthday</label>
                                <input type="date" name="birthday" id="birthday"
                                    class="w-full rounded-lg p-3 bg-white/10 border border-white/20 text-white"
                                    onchange="calculateAge()">
                                <p id="ageDisplay" class="text-sm text-gray-300 mt-1"></p>
                            </div>

                            <!-- Gender (Radio Buttons) -->
                            <div>
                                <label class="block text-gray-200 mb-1">Sex</label>
                                <div class="flex items-center space-x-4">
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="sex" value="Male"
                                            class="form-radio text-blue-500 focus:ring-0">
                                        <span class="ml-2 text-gray-200">Male</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="sex" value="Female"
                                            class="form-radio text-pink-500 focus:ring-0">
                                        <span class="ml-2 text-gray-200">Female</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 text-right">
                        <button type="button" @click="step = 2"
                            class="bg-blue-600 hover:bg-blue-700 px-6 py-2 rounded-lg font-semibold transition">Next
                            →</button>
                    </div>
                </div>

                <!-- Scripts -->
                <script>
                    function previewPhoto(event) {
                        const reader = new FileReader();
                        reader.onload = function() {
                            document.getElementById('photoPreview').src = reader.result;
                        }
                        reader.readAsDataURL(event.target.files[0]);
                    }

                    function calculateAge() {
                        const birthday = document.getElementById('birthday').value;
                        if (!birthday) {
                            document.getElementById('ageDisplay').textContent = '';
                            return;
                        }
                        const birthDate = new Date(birthday);
                        const today = new Date();
                        let age = today.getFullYear() - birthDate.getFullYear();
                        const m = today.getMonth() - birthDate.getMonth();
                        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                            age--;
                        }
                        document.getElementById('ageDisplay').textContent = `Age: ${age} years old`;
                    }
                </script>

                <!-- ✅ STEP 2: Address -->
                <div x-show="step === 2" x-transition>
                    <h3 class="text-xl font-semibold mb-4 text-center">Address Information</h3>

                    <div class="space-y-8">
                        <!-- ✅ Permanent Address -->
                        <div>
                            <h4 class="text-lg font-semibold text-gray-100 mb-2">Permanent Address</h4>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-gray-200 mb-1">Street</label>
                                    <input type="text" name="perm_street" id="perm_street"
                                        class="w-full rounded-lg p-3 bg-white/10 border border-white/20 text-white"
                                        placeholder="Street Address">
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-gray-200 mb-1">City/Municipality</label>
                                        <input type="text" name="perm_city" id="perm_city"
                                            class="w-full rounded-lg p-3 bg-white/10 border border-white/20 text-white"
                                            placeholder="City or Municipality">
                                    </div>
                                    <div>
                                        <label class="block text-gray-200 mb-1">Province</label>
                                        <input type="text" name="perm_province" id="perm_province"
                                            class="w-full rounded-lg p-3 bg-white/10 border border-white/20 text-white"
                                            placeholder="Province">
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-gray-200 mb-1">Zip Code</label>
                                        <input type="text" name="perm_zipcode" id="perm_zipcode"
                                            class="w-full rounded-lg p-3 bg-white/10 border border-white/20 text-white"
                                            placeholder="Zip Code">
                                    </div>
                                    <div>
                                        <label class="block text-gray-200 mb-1">Years of Residency</label>
                                        <input type="number" name="perm_years_residency" id="perm_years_residency"
                                            class="w-full rounded-lg p-3 bg-white/10 border border-white/20 text-white"
                                            placeholder="Enter number of years" min="0">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ✅ Present Address -->
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <h4 class="text-lg font-semibold text-gray-100">Present Address</h4>
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" id="same_as_permanent" class="w-4 h-4 text-blue-600 rounded">
                                    <span class="text-gray-300 text-sm">Same as Permanent Address</span>
                                </label>
                            </div>

                            <div class="space-y-4">
                                <div>
                                    <label class="block text-gray-200 mb-1">Street</label>
                                    <input type="text" name="pres_street" id="pres_street"
                                        class="w-full rounded-lg p-3 bg-white/10 border border-white/20 text-white"
                                        placeholder="Street Address">
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-gray-200 mb-1">City/Municipality</label>
                                        <input type="text" name="pres_city" id="pres_city"
                                            class="w-full rounded-lg p-3 bg-white/10 border border-white/20 text-white"
                                            placeholder="City or Municipality">
                                    </div>
                                    <div>
                                        <label class="block text-gray-200 mb-1">Province</label>
                                        <input type="text" name="pres_province" id="pres_province"
                                            class="w-full rounded-lg p-3 bg-white/10 border border-white/20 text-white"
                                            placeholder="Province">
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-gray-200 mb-1">Zip Code</label>
                                        <input type="text" name="pres_zipcode" id="pres_zipcode"
                                            class="w-full rounded-lg p-3 bg-white/10 border border-white/20 text-white"
                                            placeholder="Zip Code">
                                    </div>
                                    <div>
                                        <label class="block text-gray-200 mb-1">Years of Residency</label>
                                        <input type="number" name="pres_years_residency" id="pres_years_residency"
                                            class="w-full rounded-lg p-3 bg-white/10 border border-white/20 text-white"
                                            placeholder="Enter number of years" min="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-between">
                        <button type="button" @click="step = 1"
                            class="bg-gray-500 hover:bg-gray-600 px-6 py-2 rounded-lg font-semibold transition">←
                            Back</button>

                        <button type="button" @click="step = 3"
                            class="bg-blue-600 hover:bg-blue-700 px-6 py-2 rounded-lg font-semibold transition">Next
                            →</button>
                    </div>
                </div>

                <!-- ✅ Script: Copy Permanent to Present -->
                <script>
                    document.getElementById('same_as_permanent').addEventListener('change', function() {
                        const isChecked = this.checked;
                        const fields = ['street', 'city', 'province', 'zipcode', 'years_residency'];
                        fields.forEach(field => {
                            const perm = document.getElementById(`perm_${field}`);
                            const pres = document.getElementById(`pres_${field}`);
                            if (isChecked) {
                                pres.value = perm.value;
                                pres.readOnly = true;
                            } else {
                                pres.value = '';
                                pres.readOnly = false;
                            }
                        });
                    });
                </script>

                <!-- ✅ STEP 3: Educational Background -->
                <div x-show="step === 3" x-transition x-data="{ highestLevel: '' }">
                    <h3 class="text-xl font-semibold mb-4 text-center">Educational Background</h3>

                    <!-- 🎓 Highest Educational Attainment -->
                    <div class="mb-6">
                        <label class="block text-gray-200 mb-1">Highest Educational Attainment</label>
                        <select x-model="highestLevel" name="education_level"
                            class="w-full rounded-lg p-3 bg-black/70 border border-white/20 text-white focus:ring focus:ring-blue-500/40 focus:outline-none">
                            <option value="">Select</option>
                            <option value="Elementary">Elementary</option>
                            <option value="Secondary">Secondary</option>
                            <option value="Tertiary">Tertiary</option>
                        </select>
                    </div>

                    <!-- 🎓 Tertiary Education -->
                    <div x-show="highestLevel === 'Tertiary'" x-transition>
                        <h4 class="text-lg font-semibold text-gray-100 mb-2">Tertiary Education</h4>

                        <div class="space-y-4">
                            <div>
                                <label class="block text-gray-200 mb-1">Course / Major</label>
                                <input type="text" name="tertiary_course"
                                    class="w-full rounded-lg p-3 bg-white/10 border border-white/20 text-white"
                                    placeholder="e.g., BS in Information Technology">
                            </div>

                            <div>
                                <label class="block text-gray-200 mb-1">School / University</label>
                                <input type="text" name="tertiary_school"
                                    class="w-full rounded-lg p-3 bg-white/10 border border-white/20 text-white"
                                    placeholder="Name of University / College">
                            </div>

                            <div>
                                <label class="block text-gray-200 mb-1">Year Graduated</label>
                                <input type="text" name="tertiary_year_graduated"
                                    class="w-full rounded-lg p-3 bg-white/10 border border-white/20 text-white"
                                    placeholder="YYYY">
                            </div>
                        </div>
                    </div>

                    <!-- 🏫 Secondary Education -->
                    <div x-show="highestLevel === 'Secondary' || highestLevel === 'Tertiary'" x-transition>
                        <h4 class="text-lg font-semibold text-gray-100 mb-2 mt-6">Secondary Education</h4>

                        <div class="space-y-4">
                            <div>
                                <label class="block text-gray-200 mb-1">School Name</label>
                                <input type="text" name="secondary_school"
                                    class="w-full rounded-lg p-3 bg-white/10 border border-white/20 text-white"
                                    placeholder="Name of High School / Senior High">
                            </div>

                            <div>
                                <label class="block text-gray-200 mb-1">Track / Strand</label>
                                <input type="text" name="secondary_strand"
                                    class="w-full rounded-lg p-3 bg-white/10 border border-white/20 text-white"
                                    placeholder="e.g., STEM, HUMSS, GAS, TVL">
                            </div>

                            <div>
                                <label class="block text-gray-200 mb-1">Year Graduated</label>
                                <input type="text" name="secondary_year_graduated"
                                    class="w-full rounded-lg p-3 bg-white/10 border border-white/20 text-white"
                                    placeholder="YYYY">
                            </div>
                        </div>
                    </div>

                    <!-- 🏫 Elementary Education -->
                    <div x-show="highestLevel === 'Elementary' || highestLevel === 'Secondary' || highestLevel === 'Tertiary'"
                        x-transition>
                        <h4 class="text-lg font-semibold text-gray-100 mb-2 mt-6">Elementary Education</h4>

                        <div class="space-y-4">
                            <div>
                                <label class="block text-gray-200 mb-1">School Name</label>
                                <input type="text" name="elementary_school"
                                    class="w-full rounded-lg p-3 bg-white/10 border border-white/20 text-white"
                                    placeholder="Name of Elementary School">
                            </div>

                            <div>
                                <label class="block text-gray-200 mb-1">Year Graduated</label>
                                <input type="text" name="elementary_year_graduated"
                                    class="w-full rounded-lg p-3 bg-white/10 border border-white/20 text-white"
                                    placeholder="YYYY">
                            </div>
                        </div>
                    </div>

                    <!-- ✅ Navigation Buttons -->
                    <div class="mt-6 flex justify-between">
                        <button type="button" @click="step = 2"
                            class="bg-gray-500 hover:bg-gray-600 px-6 py-2 rounded-lg font-semibold transition">
                            ← Back
                        </button>

                        <button type="submit"
                            class="bg-green-600 hover:bg-green-700 px-6 py-2 rounded-lg font-semibold transition">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
