@extends('base::app')

@section('content')
    <section class="bg-blue-50 dark:bg-blue-900 h-full h-screen">
        <div class="w-full md:w-4/5 lg:w-2/4 mx-auto pt-10">

            <div class="sm:flex">
                <div class="sm:flex-auto sm:w-1/2  my-3">

                    <form method="POST" action="{{ url(route('isp_access_savebuyform')) }}">
                        @csrf

                        <div class="text-center shadow-xl rounded-md bg-white sm:mr-2 m-1 pt-5 p-2 ">

                            <h3 class="pt-3 text-xl font-semibold leading-6 text-green-700 dark:text-white text-center">
                                {{ __('isp-access-buyform-phone-label') }}
                            </h3>

                            <div class="bg-white mb-4 text-center">

                                <div class="my-3 text-center">
                                    <input
                                        class="shadow appearance-none border rounded w-full py-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-80"
                                        id="phone" name="phone" type="tel" placeholder="0722xxxxxx" required>
                                </div>

                                <button
                                    class="inline-block px-6 py-2.5 bg-blue-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                    {{ __('isp-access-buyform-button-label') }}
                                </button>
                            </div>
                        </div>

                        <input type="hidden" name="package_id" id="package_id" value="{{ $package_id }}" />
                    </form>
                </div>
            </div>
        </div>
    </section>



    <div class="relative overflow-hidden mb-8">
        <div class="overflow-hidden px-3 py-10 flex justify-center">
            <div class="w-full max-w-xs login-card">

                <p class="text-center text-gray-500 text-xs">
                    &copy;2022 - {{  date('Y') }}. {{ __('isp-copy-right') }}
                </p>
            </div>
        </div>
    </div>
@endsection
