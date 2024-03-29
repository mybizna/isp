@extends('base::app')

@section('content')
    <section class="bg-blue-50 dark:bg-blue-900 h-full h-screen">
        <div class="col-span-full md:w-4/5 lg:w-2/4 mx-auto pt-10">

            <div class="sm:flex">
                <div class="sm:flex-auto sm:col-span-6  my-5">
                    <div class=" shadow-xl rounded-md bg-white sm:mr-2 m-1 pt-2 p-2">

                        <h3 class="text-2xl font-semibold leading-6 text-gray-800 dark:text-white text-center pt-2">
                            - {!! ___('isp-access-mikrotik-login-title') !!} -
                        </h3>

                        <div class="bg-white mb-4">

                            <div class="text-center text-green-400">
                                <p class="pt-4">
                                    {!! ___('isp-access-mikrotik-login-wait') !!}
                                </p>

                                <div class="fa-3x">
                                    <i class="fa-solid fa-sync fa-spin"></i>
                                </div>
                            </div>

                            @if ($subscriber_login)
                                @if ($subscriber_login->link_login)
                                    <form id="mikrotik_login" name="login" action="{!! $subscriber_login->link_login !!}"
                                        method="post">
                                        <input type="hidden" name="username" value="{!! $subscriber->username !!}">
                                        <input type="hidden" name="password" value="{!! $subscriber->password !!}">
                                        <input type="hidden" name="domain" value="">
                                        <input type="hidden" name="dst" value="{!! $subscriber_login->link_orig_esc !!}">

                                        <p style="text-align:center;" class="p-1">
                                            <button id='register' type="submit" name="view" value="register"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                                {!! ___('isp-access-mikrotik-login-button') !!}
                                            </button>
                                        </p>
                                    </form>
                                @else
                                    <div class="text-center text-red-400">
                                        <a href="https://www.google.com"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                            {!! ___('isp-access-mikrotik-login-button') !!}
                                        </a>
                                    </div>
                                @endif
                            @endif

                        </div>

                    </div>
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

    <script>
        var auto_refresh = setInterval(submitform, 1000);

        function submitform() {
            document.getElementById("mikrotik_login").submit();
        }
    </script>
@endsection
