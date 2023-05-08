@extends('isp::access')

@section('content')
    <form method="POST" action="{{ url(route('isp_access_submitlogin')) }}">
        @csrf
        <div class="relative overflow-hidden mb-8">
            <div class="overflow-hidden px-3 py-10 flex justify-center">
                <div class="w-full max-w-xs login-card">
                    <h3 style="text-align: center"> - {{ __('isp-access-register-title') }} - </h3>
                    <div class="bg-white">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                {{ __('isp-access-register-name') }}
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="name" name="name" type="text"
                                placeholder="{{ __('isp-access-register-name') }}" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                {{ __('isp-access-register-username') }}
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="username" name="username" type="text"
                                placeholder="{{ __('isp-access-register-username') }}" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">

                                {{ __('isp-access-register-password') }}
                            </label>
                            <input
                                class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                id="password" name="password" type="password" placeholder="******************" required>
                            <p class="text-red-500 text-xs italic">{{ __('isp-access-register-password-label') }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">
                                {{ __('isp-access-register-phone') }}
                            </label>
                            <input id="phone" name="phone" type="tel" placeholder="722-xxx-xxx"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                                {{ __('isp-access-register-email') }}
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="email" name="email" type="email"
                                placeholder="{{ __('isp-access-register-email') }}">
                        </div>

                        <div class="flex items-center justify-between">
                            <button
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="submit" name="view" value="submit-register">
                                {{ __('isp-access-register-button') }}
                            </button>
                            <button
                                class="bg-red-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="submit"name="view" value="login">
                                {{ __('isp-access-register-back-button') }}
                            </button>
                        </div>



                        <div style="text-align:center; margin-top:20px;">

                        </div>
                    </div>
                    <p class="text-center text-gray-500 text-xs">
                        &copy;2022 - {{  date('Y') }}. {{ __('isp-copy-right') }}
                    </p>
                </div>
            </div>
        </div>
    </form>
@endsection
