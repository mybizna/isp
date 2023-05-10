@extends('base::app')

@section('content')
    <section class="bg-blue-50 dark:bg-blue-900 h-full h-screen">
        <div class="w-full md:w-4/5 lg:w-2/4 mx-auto pt-10">

            <div class="sm:flex">
                <div class="sm:flex-auto sm:w-1/2  my-3">
                    <div class="text-center shadow-xl rounded-md bg-white sm:mr-2 m-1 pt-5 p-2">

                        <i class="far fa-times-circle text-5xl text-red-700"></i>

                        <h3 class="pt-3 text-2xl font-semibold leading-6 text-red-700 dark:text-white text-center">
                            - {{ ___('isp-access-canceled-title') }} -
                        </h3>

                        <div class="bg-white mb-4 text-center">

                            <p style="text-align:center; padding:20px;">
                                {{ ___('isp-access-canceled-instructions') }}
                            </p>

                            <a id='package' href="{{ url(route('isp_profile')) }}"
                                class="inline-block px-6 py-2.5 bg-red-700 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                {{ ___('isp-access-canceled-button') }}
                            </a>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>



    <div class="relative overflow-hidden mb-8">
        <div class="overflow-hidden px-3 py-10 flex justify-center">
            <div class="w-full max-w-xs login-card">

                <p class="text-center text-gray-500 text-xs">
                    &copy;2022 - {{  date('Y') }}. {{ ___('isp-copy-right') }}
                </p>
            </div>
        </div>
    </div>
@endsection
