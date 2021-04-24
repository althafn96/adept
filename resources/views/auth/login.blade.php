<x-guest-layout>
    <div>

        <div class="min-h-screen bg-white flex">
            <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
                <div class="mx-auto w-full max-w-sm lg:w-96 flex-grow">
                    <div>
                        <div class="flex-shrink-0 flex items-center justify-center">
                            <a href="#" onclick="return false;">
                                <img class="w-20" src="{{asset('assets/icon.png')}}" />
                            </a>
                        </div>
                    </div>

                    <div class="mt-8">
                        <div>
                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        </div>

                        <div class="mt-6">
                            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                                @csrf
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700">
                                        Email
                                    </label>
                                    <div class="mt-1">
                                        <input autofocus id="email" name="email" type="email" autocomplete="email" required=""
                                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-adeptred-1 focus:border-adeptred-1 sm:text-sm">
                                    </div>
                                </div>

                                <div class="space-y-1">
                                    <label for="password" class="block text-sm font-medium text-gray-700">
                                        Password
                                    </label>
                                    <div class="mt-1">
                                        <input id="password" name="password" type="password"
                                            autocomplete="current-password" required=""
                                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-adeptred-1 focus:border-adeptred-1 sm:text-sm">
                                    </div>
                                </div>

                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <input id="remember_me" name="remember" type="checkbox"
                                            class="h-4 w-4 text-adeptred-2 focus:ring-adeptred-1 border-gray-300 rounded">
                                        <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                                            Remember me
                                        </label>
                                    </div>

                                    <!--<div class="text-sm">-->
                                    <!--    <a href="{{ route('password.request') }}" class="font-medium text-adeptred-2 hover:text-adeptred-1">-->
                                    <!--        Forgot your password?-->
                                    <!--    </a>-->
                                    <!--</div>-->
                                </div>

                                <div>
                                    <button type="submit"
                                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-adeptred-1 hover:bg-adeptred-2 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-adeptred-1">
                                        Sign in
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="mt-8">
                    <footer id="footer" class="relative z-50 dark:bg-gray-900 mt-8">
                        <div class="py-16 flex flex-col justify-center items-center mt-8 bottom-0">
                            <p class="mt-6 text-xs lg:text-sm leading-none text-gray-900 dark:text-gray-50">{{ date('Y') }}&copy; Adept. Engineered by <a href="https://pragicts.com" style="color: #ed2039" target="_blank">PragICTS</a>.</p>
                        </div>
                    </footer>
                </div>
            </div>
            <div class="hidden lg:block relative w-0 flex-1">
                <img class="absolute inset-0 h-full w-full object-cover"
                    src="{{ asset('assets/bg-image.jpg') }}"
                    alt="">
            </div>
        </div>

    </div>
</x-guest-layout>
