<x-app-layout>
    <x-slot name="header">
        <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
            <div class="ml-4 mt-4">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Update Specialization') }}
                </h2>
            </div>
            <div class="ml-4 mt-4 flex-shrink-0">
                <a href="{{ route('specializations.index') }}" type="button"
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



                        <form method="POST" action="{{ route('specializations.update', [$specialization]) }}" class="space-y-8 divide-y divide-gray-200" enctype="multipart/form-data">


                            <div class="space-y-6 sm:space-y-5">
                                <div
                                    class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start">
                                    <label for="title"
                                        class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                        Title
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <input type="text" name="title" id="title"
                                        autofocus
                                            autocomplete="title"
                                            value="{{ $specialization->title }}"
                                            class="block max-w-lg w-full shadow-sm focus:ring-adeptred-1 focus:border-adeptred-1 sm:text-sm border-gray-300 rounded-md">
                                            @if($errors->has('title'))
                                                <p class="mt-2 text-sm text-red-500">{{ $errors->first('title') }}</p>
                                            @endif
                                    </div>
                                </div>

                                <div
                                    class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-center sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="icon" class="block text-sm font-medium text-gray-700">
                                        Change Icon
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <input type="file" name="file" id="icon"
                                            class="block max-w-lg w-full">
                                        @if($errors->has('icon'))
                                            <p class="mt-2 text-sm text-red-500">{{ $errors->first('icon') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div
                                    class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="description"
                                        class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                        Description
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <textarea id="description" name="description" rows="3"
                                            class="max-w-lg shadow-sm block w-full focus:ring-adeptred-1 focus:border-adeptred-1 sm:text-sm border-gray-300 rounded-md">{{ $specialization->description }}</textarea>

                                    </div>
                                </div>

                                <div
                                    class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="verticals"
                                        class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                        Verticals
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <select multiple id="verticals" name="verticals[]"
                                            class="select2 max-w-lg block focus:ring-adeptred-1 focus:border-adeptred-1 w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            @foreach ($verticals as $vertical)
                                                <option {{ in_array($vertical->id, $specialization_verticals) ? 'selected' : '' }} value="{{ $vertical->id }}">{{ $vertical->title }}</option>

                                            @endforeach
                                        </select>
                                        @if($errors->has('verticals'))
                                        <p class="mt-2 text-sm text-red-500">{{ $errors->first('verticals') }}</p>
                                        @endif
                                    </div>
                                </div>


                                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="status" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                        Status
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <select id="status" name="status" class="max-w-lg block focus:ring-adeptred-1 focus:border-adeptred-1 w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <option {{ $specialization->status == '1' ? 'selected' : '' }}  value="1">Enabled</option>
                                            <option {{ $specialization->status == '0' ? 'selected' : '' }} value="0">Disabled</option>
                                        </select>
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
                            @method('PUT')
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
            $('#verticals').select2({
                multiple: true,
                placeholder: 'Select Verticals'
            })
        </script>
    </x-slot>
</x-app-layout>
