@extends('base::app')

@section('content')
    <section class="bg-blue-50 dark:bg-blue-900 h-full h-screen">
        <div class="col-span-full md:w-4/5 lg:w-2/4 mx-auto pt-4">

            <div class="sm:flex">
                <div class="sm:flex-auto sm:col-span-6  my-3">

                    <form method="POST" action="{!! url(route('isp_access_savelogin')) !!}">
                        @csrf

                        <div class="text-center shadow-xl rounded-md bg-white sm:mr-2 m-1 pt-3 p-2 ">

                            <h3 class="pt-3 text-xl font-semibold leading-6 text-green-700 dark:text-white text-center">
                                {!! ___('isp-access-login-title') !!}

                            </h3>

                            @if ($message != '')
                                <div class="my-2 p-3 text-red-500 border border-dashed border-red-400 rounded bg-red-50">
                                    {!! $message !!}
                                </div>
                            @endif

                            <div class="bg-white mb-3 text-left">

                                <div class="my-3 md:flex md:items-center">
                                    <div class="md:w-1/3 pr-3">
                                        <b class="block md:text-right">{!! ___('isp-access-login-phone') !!} : </b>
                                    </div>
                                    <div class="md:w-2/3">
                                        <input
                                            class="shadow appearance-none border rounded col-span-full py-2 px-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline max-w-xs"
                                            id="phone_number" name="phone" type="tel" placeholder="0722xxxxxx"
                                            required>

                                    </div>
                                </div>

                                <div class="my-3 md:flex md:items-center">
                                    <div class="md:w-1/3 pr-3">
                                        <b class="block md:text-right">{!! ___('isp-access-login-passcode') !!} : </b>
                                    </div>
                                    <div class="md:w-2/3">
                                        <input
                                            class="shadow appearance-none border rounded col-span-full py-2 px-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline max-w-xs"
                                            id="passcode" name="passcode" type="tel" placeholder="{!! ___('isp-access-login-passcode') !!}" required>

                                    </div>
                                </div>
                            </div>

                            <div class="my-3">
                                <button
                                    class="inline-block px-6 py-2.5 bg-blue-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                    {!! ___('isp-access-login-button') !!}
                                </button>
                            </div>


                        </div>


                        <input type="hidden" name="return_url" id="return_url" value="{!! $return_url !!}" />
                    </form>
                </div>
            </div>
        </div>
    </section>



    <div class="relative overflow-hidden mb-8">
        <div class="overflow-hidden px-3 py-10 flex justify-center">
            <div class="col-span-full max-w-xs login-card">

                <p class="text-center text-gray-500 text-xs">
                    &copy;2022 - {!! date('Y') !!}. {!! ___('isp-copy-right') !!}
                </p>
            </div>
        </div>
    </div>
@endsection
