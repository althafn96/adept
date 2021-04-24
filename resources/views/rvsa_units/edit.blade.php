<x-app-layout>
    <x-slot name="header">
        <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
            <div class="ml-4 mt-4">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Update Unit') }}
                </h2>
            </div>
            <div class="ml-4 mt-4 flex-shrink-0">
                <a href="{{ route('rvsa-units.index') }}" type="button"
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



                        <form method="POST" action="{{ route('rvsa-units.update', [$rvsaUnit->id]) }}" class="space-y-8 divide-y divide-gray-200" enctype="multipart/form-data">
                            <div class="space-y-6 sm:space-y-5">
                                <div
                                    class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start">
                                    <label for="title"
                                        class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                        Unit
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <input type="text" name="title" id="title"
                                        autofocus
                                            autocomplete="title"
                                            value="{{ $rvsaUnit->title }}"
                                            class="block max-w-lg w-full shadow-sm focus:ring-adeptred-1 focus:border-adeptred-1 sm:text-sm border-gray-300 rounded-md">
                                            @if($errors->has('title'))
                                                <p class="mt-2 text-sm text-red-500">{{ $errors->first('title') }}</p>
                                            @endif
                                    </div>
                                </div>
                                <div
                                    class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="responsible_person"
                                        class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                        Contact Person
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <input type="text" name="responsible_person" id="responsible_person"
                                        autofocus
                                            autocomplete="responsible_person"
                                            value="{{ $rvsaUnit->responsible_person }}"
                                            class="block max-w-lg w-full shadow-sm focus:ring-adeptred-1 focus:border-adeptred-1 sm:text-sm border-gray-300 rounded-md">
                                            @if($errors->has('responsible_person'))
                                                <p class="mt-2 text-sm text-red-500">{{ $errors->first('responsible_person') }}</p>
                                            @endif
                                    </div>
                                </div>
                                <div
                                    class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="contact_phone"
                                        class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                        Contact Phone
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <input type="text" name="contact_phone" id="contact_phone"
                                        autofocus
                                            autocomplete="contact_phone"
                                            value="{{ $rvsaUnit->contact_phone }}"
                                            class="block max-w-lg w-full shadow-sm focus:ring-adeptred-1 focus:border-adeptred-1 sm:text-sm border-gray-300 rounded-md">
                                            @if($errors->has('contact_phone'))
                                                <p class="mt-2 text-sm text-red-500">{{ $errors->first('contact_phone') }}</p>
                                            @endif
                                    </div>
                                </div>
                                <div
                                    class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="contact_email"
                                        class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                        Contact Email
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <input type="text" name="contact_email" id="contact_email"
                                        autofocus
                                            autocomplete="contact_email"
                                            value="{{ $rvsaUnit->contact_email }}"
                                            class="block max-w-lg w-full shadow-sm focus:ring-adeptred-1 focus:border-adeptred-1 sm:text-sm border-gray-300 rounded-md">
                                            @if($errors->has('contact_email'))
                                                <p class="mt-2 text-sm text-red-500">{{ $errors->first('contact_email') }}</p>
                                            @endif
                                    </div>
                                </div>


                                <div
                                    class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="picture" class="block text-sm font-medium text-gray-700">
                                        Change Picture
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <input type="file" name="file" id="picture" class="block max-w-lg w-full">

                                    </div>
                                </div>

                                <div class="pt-6 sm:pt-5">
                                    <div role="group" aria-labelledby="label-notifications">
                                        <div
                                        class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                        <div>
                                                <div class="text-base font-medium text-gray-900 sm:text-sm sm:text-gray-700"
                                                    id="label-notifications">
                                                    Type
                                                </div>
                                            </div>
                                            <div class="sm:col-span-2">
                                                <div class="max-w-lg">
                                                    <div class="mt-4 space-y-4">
                                                        <div class="flex items-center">
                                                            <input id="level1" name="type"
                                                                {{ $rvsaUnit->level == '1' ? 'checked' : '' }}
                                                                {{ $rvsaUnit->level == '2' ? '' : 'checked' }}
                                                                value="level1"
                                                                type="radio"
                                                                class="focus:ring-adeptred-1 h-4 w-4 text-adeptred-1 border-gray-300">
                                                            <label for="level1"
                                                                class="ml-3 block text-sm font-medium text-gray-700">
                                                                Provincial
                                                            </label>
                                                        </div>
                                                        <div class="flex items-center">
                                                            <input id="level2" name="type"
                                                                {{ $rvsaUnit->level == '2' ? 'checked' : '' }}
                                                                value="level2"
                                                                type="radio"
                                                                class="focus:ring-adeptred-1 h-4 w-4 text-adeptred-1 border-gray-300">
                                                            <label for="level2"
                                                                class="ml-3 block text-sm font-medium text-gray-700">
                                                                Districtal
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5 provincial-fields">
                                    <label for="province_id"
                                        class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                        Province
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <select id="province_id" name="province_id"
                                            class="select2 max-w-lg block focus:ring-adeptred-2 focus:border-adeptred-2 w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                                            <option {{ $rvsaUnit->province_id == '1' ? 'selected' : '' }} value="1">Western Province</option>
                                            <option {{ $rvsaUnit->province_id == '2' ? 'selected' : '' }} value="2">Central  Province</option>
                                            <option {{ $rvsaUnit->province_id == '3' ? 'selected' : '' }} value="3">Southern  Province</option>
                                            <option {{ $rvsaUnit->province_id == '4' ? 'selected' : '' }} value="4">Uva Province</option>
                                            <option {{ $rvsaUnit->province_id == '5' ? 'selected' : '' }} value="5">Sabaragamuwa Province</option>
                                            <option {{ $rvsaUnit->province_id == '6' ? 'selected' : '' }} value="6">North Western  Province</option>
                                            <option {{ $rvsaUnit->province_id == '7' ? 'selected' : '' }} value="7">North Central Province</option>
                                            <option {{ $rvsaUnit->province_id == '8' ? 'selected' : '' }} value="8">Nothern  Province</option>
                                            <option {{ $rvsaUnit->province_id == '9' ? 'selected' : '' }} value="9">Eastern Province</option>
                                        </select>
                                        @if($errors->has('province_id'))
                                        <p class="mt-2 text-sm text-red-500">{{ $errors->first('province_id') }}</p>
                                        @endif
                                    </div>
                                </div>



                                <div
                                    class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5 districtal-fields">
                                    <label for="district_id"
                                        class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                        District
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <select id="district_id" name="district_id"
                                            class="select2 max-w-lg block focus:ring-adeptred-2 focus:border-adeptred-2 w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            @foreach ($districts as $district)
                                                <option {{ $rvsaUnit->district_id == $district->id ? 'selected' : '' }} value="{{ $district->id }}">{{ $district->title }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('district_id'))
                                        <p class="mt-2 text-sm text-red-500">{{ $errors->first('district_id') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div
                                    class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5 districtal-fields">
                                    <label for="rvsa_unit_id"
                                        class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                        RVSA Unit - Provincial
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <select id="rvsa_unit_id" name="rvsa_unit_id"
                                            class="select2 max-w-lg block focus:ring-adeptred-2 focus:border-adeptred-2 w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            @foreach ($units as $unit)
                                                <option {{ $rvsaUnit->rvsa_unit_id == $unit->id ? 'selected' : '' }} value="{{ $unit->id }}">{{ $unit->title }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('rvsa_unit_id'))
                                        <p class="mt-2 text-sm text-red-500">{{ $errors->first('rvsa_unit_id') }}</p>
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
                                        <input type="text" name="address" id="address"
                                        autofocus
                                            autocomplete="address"
                                            value="{{ $rvsaUnit->address }}"
                                            class="block max-w-lg w-full shadow-sm focus:ring-adeptred-1 focus:border-adeptred-1 sm:text-sm border-gray-300 rounded-md">
                                            @if($errors->has('address'))
                                                <p class="mt-2 text-sm text-red-500">{{ $errors->first('address') }}</p>
                                            @endif
                                    </div>
                                </div>
                            </div>

                            <div class="pt-5">
                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-adeptred-1 hover:bg-adeptred-2 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-adeptred-1">
                                        Update
                                    </button>
                                </div>
                            </div>
                            @csrf
                            @method('PUT')
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
            $(document).ready(function() {

                $('.select2').select2()

                if('{{ $rvsaUnit->level }}' == 1) {
                    $('.provincial-fields').css('display', '');
                    $('.districtal-fields').css('display', 'none');
                } else {
                    $('.provincial-fields').css('display', 'none');
                    $('.districtal-fields').css('display', '');
                }

                $('body').on('change', 'input[name="type"]', function() {

                    if($(this).val() == 'level1') {
                        $('.provincial-fields').css('display', '');
                        $('.districtal-fields').css('display', 'none');
                    } else {
                        $('.provincial-fields').css('display', 'none');
                        $('.districtal-fields').css('display', '');
                    }
                })
            });
        </script>
    </x-slot>
</x-app-layout>
