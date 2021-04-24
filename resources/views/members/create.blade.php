<x-app-layout>
    <x-slot name="header">
        <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
            <div class="ml-4 mt-4">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Add New Member') }}
                </h2>
            </div>
            <div class="ml-4 mt-4 flex-shrink-0">
                <a href="{{ route('members.index') }}" type="button"
                    class="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-adeptred-1 hover:bg-adeptred-2 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-adeptred-1">
                    Back
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="bg-white">
                    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">



                        <form method="POST" action="{{ route('members.store') }}"
                            class="space-y-8 divide-y divide-gray-200" enctype="multipart/form-data">
                            <div class="space-y-6 sm:space-y-5">
                                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start">
                                    <label for="first_name"
                                        class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                        First Name
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <input type="text" name="first_name" id="first_name" autocomplete="first_name"
                                        autofocus
                                            value="{{ old('first_name') }}"
                                            class="block max-w-lg w-full shadow-sm focus:ring-adeptred-1 focus:border-adeptred-1 sm:text-sm border-gray-300 rounded-md">
                                        @if($errors->has('first_name'))
                                        <p class="mt-2 text-sm text-red-500">{{ $errors->first('first_name') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div
                                    class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="title" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                        Last Name
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <input type="text" name="last_name" id="last_name" autocomplete="last_name"
                                            value="{{ old('last_name') }}"
                                            class="block max-w-lg w-full shadow-sm focus:ring-adeptred-1 focus:border-adeptred-1 sm:text-sm border-gray-300 rounded-md">
                                        @if($errors->has('last_name'))
                                        <p class="mt-2 text-sm text-red-500">{{ $errors->first('last_name') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div
                                    class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="picture" class="block text-sm font-medium text-gray-700">
                                        Picture
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <input type="file" name="file" id="picture" class="block max-w-lg w-full">

                                    </div>
                                </div>

                                <div
                                    class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="rvsa_id"
                                        class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                        RVSA ID
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <input type="text" name="rvsa_id" id="rvsa_id" autocomplete="rvsa_id"
                                            value="{{ old('rvsa_id') }}"
                                            class="block max-w-lg w-full shadow-sm focus:ring-adeptred-1 focus:border-adeptred-1 sm:text-sm border-gray-300 rounded-md">
                                        @if($errors->has('rvsa_id'))
                                        <p class="mt-2 text-sm text-red-500">{{ $errors->first('rvsa_id') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div
                                    class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="mobile_1"
                                        class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                        Mobile 1
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <input type="text" name="mobile_1" id="mobile_1" autocomplete="mobile_1"
                                            value="{{ old('mobile_1') }}"
                                            class="block max-w-lg w-full shadow-sm focus:ring-adeptred-1 focus:border-adeptred-1 sm:text-sm border-gray-300 rounded-md">
                                        @if($errors->has('mobile_1'))
                                        <p class="mt-2 text-sm text-red-500">{{ $errors->first('mobile_1') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div
                                    class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="mobile_2"
                                        class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                        Mobile 2
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <input type="text" name="mobile_2" id="mobile_2" autocomplete="mobile_2"
                                            value="{{ old('mobile_2') }}"
                                            class="block max-w-lg w-full shadow-sm focus:ring-adeptred-1 focus:border-adeptred-1 sm:text-sm border-gray-300 rounded-md">
                                        @if($errors->has('mobile_2'))
                                        <p class="mt-2 text-sm text-red-500">{{ $errors->first('mobile_2') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div
                                    class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="email" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                        Email
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <input type="text" name="email" id="email" autocomplete="email"
                                            value="{{ old('email') }}"
                                            class="block max-w-lg w-full shadow-sm focus:ring-adeptred-1 focus:border-adeptred-1 sm:text-sm border-gray-300 rounded-md">
                                        @if($errors->has('email'))
                                        <p class="mt-2 text-sm text-red-500">{{ $errors->first('email') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div
                                    class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="address"
                                        class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                        Address
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <input type="text" name="address" id="address" autocomplete="address"
                                            value="{{ old('address') }}"
                                            class="block max-w-lg w-full shadow-sm focus:ring-adeptred-1 focus:border-adeptred-1 sm:text-sm border-gray-300 rounded-md">
                                        @if($errors->has('address'))
                                        <p class="mt-2 text-sm text-red-500">{{ $errors->first('address') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div
                                    class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="nic"
                                        class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                        NIC
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <input type="text" name="nic" id="nic" autocomplete="nic"
                                            value="{{ old('nic') }}"
                                            class="block max-w-lg w-full shadow-sm focus:ring-adeptred-1 focus:border-adeptred-1 sm:text-sm border-gray-300 rounded-md">
                                        @if($errors->has('nic'))
                                        <p class="mt-2 text-sm text-red-500">{{ $errors->first('nic') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div
                                    class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="nic" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                        DOB
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <input type="date" name="dob" id="dob" autocomplete="dob"
                                            value="{{ old('dob') }}"
                                            class="block max-w-lg w-full shadow-sm focus:ring-adeptred-1 focus:border-adeptred-1 sm:text-sm border-gray-300 rounded-md">
                                        @if($errors->has('dob'))
                                        <p class="mt-2 text-sm text-red-500">{{ $errors->first('dob') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="pt-6 sm:pt-5">
                                    <div role="group" aria-labelledby="label-notifications">
                                        <div
                                        class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                        <div>
                                                <div class="text-base font-medium text-gray-900 sm:text-sm sm:text-gray-700"
                                                    id="label-notifications">
                                                    Gender
                                                </div>
                                            </div>
                                            <div class="sm:col-span-2">
                                                <div class="max-w-lg">
                                                    <div class="mt-4 space-y-4">
                                                        <div class="flex items-center">
                                                            <input checked id="gender_male" name="gender"
                                                                value="M"
                                                                type="radio"
                                                                class="focus:ring-adeptred-1 h-4 w-4 text-adeptred-1 border-gray-300">
                                                            <label for="gender_male"
                                                                class="ml-3 block text-sm font-medium text-gray-700">
                                                                M
                                                            </label>
                                                        </div>
                                                        <div class="flex items-center">
                                                            <input id="gender_female" name="gender"
                                                            value="F"
                                                                type="radio"
                                                                class="focus:ring-adeptred-1 h-4 w-4 text-adeptred-1 border-gray-300">
                                                            <label for="gender_female"
                                                                class="ml-3 block text-sm font-medium text-gray-700">
                                                                F
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="areas"
                                        class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                        Service Areas
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <select multiple id="areas" name="areas[]"
                                            class="select2 max-w-lg block focus:ring-adeptred-1 focus:border-adeptred-1 w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            @foreach ($districts as $district)
                                                <option {{ in_array($district->id, old('areas') ?? []) ? 'selected' : '' }} value="{{ $district->id }}">{{ $district->title }}</option>

                                            @endforeach
                                        </select>
                                        @if($errors->has('areas'))
                                        <p class="mt-2 text-sm text-red-500">{{ $errors->first('areas') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div
                                    class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="specializations"
                                        class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                        Specializations
                                    </label>

                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <select multiple id="specializations" name="specializations[]"
                                            class="select2 max-w-lg block focus:ring-adeptred-1 focus:border-adeptred-1 w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            @foreach ($specializations as $specialization)
                                                <option {{ in_array($specialization->id, old('specializations') ?? []) ? 'selected' : '' }}  value="{{ $specialization->id }}">{{ $specialization->title }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('specializations'))
                                        <p class="mt-2 text-sm text-red-500">{{ $errors->first('specializations') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div
                                    class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="rvsa_unit_id"
                                        class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                        RVSA Unit
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <select id="rvsa_unit_id" name="rvsa_unit_id"
                                            class="max-w-lg block focus:ring-adeptred-1 focus:border-adeptred-1 w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <option value="">Select Unit</option>
                                            @foreach ($units as $unit)
                                                <option {{ old('rvsa_unit_id') == $unit->id ? 'selected' : '' }} value="{{ $unit->id }}">{{ $unit->title }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('rvsa_unit_id'))
                                        <p class="mt-2 text-sm text-red-500">{{ $errors->first('rvsa_unit_id') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div
                                    class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="other_skills_experience_and_qualifications"
                                        class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                        Experience & Qualification Details
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <textarea id="other_skills_experience_and_qualifications" name="other_skills_experience_and_qualifications" rows="3"
                                            class="max-w-lg shadow-sm block w-full focus:ring-adeptred-1 focus:border-adeptred-1 sm:text-sm border-gray-300 rounded-md">{{ old('other_skills_experience_and_qualifications') }}</textarea>

                                    </div>
                                </div>

                                <div
                                    class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="status"
                                        class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                        Status
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <select id="status" name="status"
                                            class="max-w-lg block focus:ring-adeptred-1 focus:border-adeptred-1 w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <option selected value="1">Enabled</option>
                                            <option value="0">Disabled</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-5">
                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-adeptred-1 hover:bg-adeptred-2 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-adeptred-1">
                                        Save
                                    </button>
                                </div>
                            </div>
                            @csrf
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>


    <x-slot name="styles">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    </x-slot>
    <x-slot name="scripts">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script>
            $('#areas').select2({
                multiple: true,
                placeholder: 'Select areas'
            })
            $('#specializations').select2({
                multiple: true,
                placeholder: 'Select Specializations'
            })
            $('#rvsa_unit_id').select2()

            @if (old('areas') == null)
                $('#areas').val(null).trigger("change");
            @endif
            @if (old('specializations') == null)
                $('#specializations').val(null).trigger("change");
            @endif
        </script>
    </x-slot>
</x-app-layout>
