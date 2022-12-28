@extends('isp::access')

@section('content')
    <div class="relative overflow-hidden mb-8">
        <div class="overflow-hidden px-3 py-10 flex justify-center">
            <div class="w-full max-w-xs login-card">
                <h3 style="text-align: center"> - THANK YOU - </h3>
                <div class="bg-white mb-4">

                    <p style="text-align:center; padding:20px;">
                        Thank you.<br> Proceed to access Internet.
                    </p>

                    <form name="login" action="{{ $link_login }}" method="post">
                        <input type="hidden" name="username" value="{{ $username }}">
                        <input type="hidden" name="password" value="{{ $password }}">
                        <input type="hidden" name="domain" value="">
                        <input type="hidden" name="dst" value="{{ $link_orig_esc }}">

                        <p style="text-align:center;" class="p-4">
                            <button id='register' type="submit" name="view" value="register"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Access Internet
                            </button>
                        </p>
                    </form>

                    <div style="text-align:center; margin-top:20px;">

                    </div>
                </div>
                <p class="text-center text-gray-500 text-xs">
                    &copy;2022. All rights reserved.
                </p>
            </div>
        </div>
    </div>
@endsection
