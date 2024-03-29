@extends('base::app')

@section('content')
    <section class="bg-blue-50">
        <div class="col-span-full md:w-4/5 lg:col-span-6 mx-auto pt-5">

            @if ($partner)
                <div
                    class="relative flex flex-col min-w-0 break-words bg-transparent border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border mx-1">
                    <div
                        class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500">
                        <div class="relative z-10">


                            @if (isset($current_package->id))
                                <div class="text-center text-white">
                                    <small>{!! ___('isp-access-dashboard-current-active-package') !!}</small>
                                </div>
                                <div class="flex">
                                    <div class="flex-none w-14 sm:w-20">
                                        <div class="grid h-full place-items-center">
                                            <i class="p-2 text-white fas fa-wifi text-4xl" aria-hidden="true"></i>
                                        </div>
                                    </div>

                                    <div class="flex-auto">
                                        <div class="flex flex-wrap">
                                            <div class="flex-auto col-span-6 sm:w-1/4 pt-2 pl-2">
                                                <p class="mb-0 leading-normal text-white text-sm">
                                                    {!! ___('isp-access-dashboard-current-active-package-package') !!}
                                                </p>
                                                <p class="mb-0 text-white text-xs">
                                                    @if ($current_package)
                                                        ({!! $current_package->title !!})
                                                    @endif
                                                </p>
                                            </div>

                                            <div class="flex-auto col-span-6 sm:w-1/4 pt-2 pl-2">
                                                <p class="mb-0 leading-normal text-white text-sm">
                                                    {!! ___('isp-access-dashboard-current-active-package-limits') !!}
                                                </p>
                                                @if ($current_package->bundle)
                                                    <span class="mb-0 text-white text-xs">
                                                        {!! $current_package->bundle !!}{!! $current_package->bundle_type == 'kilobyte' ? 'KB' : ($current_package->bundle_type == 'megabyte' ? 'MB' : 'GB') !!}
                                                    </span>
                                                @endif

                                                @if ($current_package->speed)
                                                    <span class="mb-0 text-white text-xs">
                                                        @
                                                        {!! $current_package->speed !!}
                                                        {!! $current_package->speed_type == 'kilobyte' ? 'KBps' : ($current_package->speed_type == 'megabyte' ? 'MBps' : 'GBps') !!}
                                                    </span>
                                                @endif


                                            </div>

                                            <div class="flex-auto col-span-6 sm:w-1/4 pt-2 pl-2">
                                                <p class="mb-0 leading-normal text-white text-sm">
                                                    {!! ___('isp-access-dashboard-current-active-package-expire') !!}
                                                </p>

                                                <span class="mb-0 text-white text-xs">
                                                    {!! date('d/m/y H:i', strtotime($current_package->end_date)) !!}
                                                </span>
                                            </div>

                                            <div class="flex-auto col-span-6 sm:w-1/4 pt-2 pl-2">
                                                @if ($current_package->duration)
                                                    <p class="mb-0 text-white text-xs">
                                                        ({!! $current_package->duration !!}{!! $current_package->duration_type !!})
                                                    </p>
                                                @endif
                                                <a href="{!! url(route('isp_access_buypackage', ['id' => $current_package->id])) !!}"
                                                    class="inline-block mt-1 text-black bg-yellow-300 hover:bg-yellow-200 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-1 text-center">
                                                    {!! ___('isp-access-dashboard-renew') !!}
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="flex">

                                    <div class="flex-none w-14">
                                        <div class="grid h-full place-items-center">
                                            <i class="p-2 text-white fas fa-wifi text-4xl" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="flex-auto text-center p-2">
                                        <h3 class="text-4xl text-white">
                                            {!! ___('isp-access-dashboard-no-package') !!}
                                        </h3>
                                        <small class="text-xs text-white">
                                            {!! ___('isp-access-dashboard-no-package-instruction') !!}
                                        </small>
                                    </div>
                                </div>
                            @endif

                            @if (count($user_packages) > 1)
                                <div class="text-center text-white">
                                    <small>{!! ___('isp-access-dashboard-active-package') !!}</small>
                                </div>

                                <div class="relative overflow-x-auto px-2">
                                    <table
                                        class="col-span-full text-sm text-left text-gray-500 mb-3 border-r border-r-blue-300/20  border-l border-l-blue-300/20">
                                        <thead class="text-xs text-gray-700 uppercase bg-gray-50/30">
                                            <tr>
                                                <th scope="col" class="py-2 text-white text-center">
                                                    {!! ___('isp-access-dashboard-active-package-name') !!}
                                                </th>
                                                <th scope="col" class="py-2 text-white text-center">
                                                    {!! ___('isp-access-dashboard-active-package-limits') !!}
                                                </th>
                                                <th colspan="2" scope="col" class="py-2 text-white text-center">
                                                    {!! ___('isp-access-dashboard-active-package-expire') !!}
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($user_packages as $user_package)
                                                @if ($current_package->subscription_id != $user_package->subscription_id)
                                                    <tr class="bg-transparent border-b border-b-blue-300/40">
                                                        <th scope="row"
                                                            class="py-2 text-xs font-medium text-white text-center whitespace-nowrap">
                                                            @if ($user_package)
                                                                {!! $user_package->title !!}
                                                            @endif
                                                        </th>

                                                        <td class="py-2 text-xs text-white text-center">
                                                            @if ($user_package->bundle)
                                                                <span>
                                                                    {!! $user_package->bundle !!}{!! $user_package->bundle_type == 'kilobyte' ? 'KB' : ($user_package->bundle_type == 'megabyte' ? 'MB' : 'GB') !!}
                                                                </span>
                                                            @endif

                                                            @if ($user_package->speed)
                                                                <span>
                                                                    @
                                                                    {!! $user_package->speed !!}{!! $user_package->speed_type == 'kilobyte' ? 'KBps' : ($user_package->speed_type == 'megabyte' ? 'MBps' : 'GBps') !!}
                                                                </span>
                                                            @endif

                                                            <span>
                                                                @if ($user_package->duration)
                                                                    {!! $user_package->duration !!}{!! $user_package->duration_type !!}
                                                                @endif
                                                            </span>
                                                        </td>
                                                        <td class="py-2 text-xs text-white text-center">
                                                            {!! date('d/m/y H:i', strtotime($user_package->end_date)) !!}
                                                        </td>
                                                        <td class="py-2 text-white text-center">
                                                            <span>
                                                                <a href="{!! url(route('isp_access_buypackage', ['id' => $user_package->id])) !!}"
                                                                    class="text-black bg-yellow-300 hover:bg-yellow-200 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-1 text-center">
                                                                    {!! ___('isp-access-dashboard-renew') !!}
                                                                </a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif



                        </div>

                    </div>
                </div>
            @endif

            <div class=" shadow-xl rounded-md bg-white sm:mr-2 my-4 pt-2 p-2">
                <div class="flex overflow-hidden">
                    <div class="flex-none">
                        <img width="100px" src="{!! asset('images/login.avif') !!}" />
                    </div>

                    <div class="flex-auto">
                        @if ($subscriber)
                            <div class="text-center">
                                <p class="font-semibold">
                                    {!! ___('isp-access-dashboard-logged-in-title') !!}
                                </p>

                                <p class=" text-sm text-gray-600 py-1">
                                    {!! ___('isp-access-dashboard-logged-in-instruction') !!}
                                </p>

                                <p class="font-bold text-xl text-center">
                                    {!! $subscriber->username !!}
                                </p>
                            </div>
                        @else
                            <div class="text-center">
                                <p class="font-semibold text-lg">
                                    {!! ___('isp-access-dashboard-login-title') !!}
                                </p>

                                <p class=" text-sm text-gray-400 py-1">
                                    {!! ___('isp-access-dashboard-login-instruction') !!}
                                </p>

                                <a id='package'
                                    href="{!! url(route('isp_access_login', ['return_url' => $profile_return_url])) !!}"
                                    class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                    {!! ___('isp-access-dashboard-login-button') !!}
                                </a>

                            </div>
                        @endif

                    </div>
                </div>

            </div>

            <div>
                <div class="sm:flex">
                    <div class="sm:flex-auto sm:col-span-6 @if (!$partner) hidden sm:block @endif">
                        <div class="shadow-xl rounded-md bg-white sm:mr-2 m-1 pt-2 p-2 h-40">
                            @if (!$partner)
                                <div class="text-center">
                                    <span class="fa-stack fa-2x text-gray-500 inline-block">
                                        <i class="fa-regular fa-circle fa-stack-2x"></i>
                                        <i class="fa-solid fa-network-wired fa-stack-1x"></i>
                                    </span>
                                    <h4 class="font-semibold text-lg">
                                        {!! ___('isp-access-dashboard-account-title') !!}
                                    </h4>
                                    <span class="text-gray-500">
                                        {!! ___('isp-access-dashboard-account-instruction') !!}
                                    </span>
                                </div>
                            @else
                                <div class="flex overflow-hidden">
                                    <div class="flex-none">
                                        <div class="grid h-full place-items-center mr-4">
                                            <span class="fa-stack fa-2x text-gray-500" style="vertical-align: top;">
                                                <i class="fa-regular fa-circle fa-stack-2x"></i>
                                                <i class="fa-solid fa-user fa-stack-1x"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="flex-auto">
                                        <div class="border-b border-b-blue-100	">

                                            <p class="font-semibold whitespace-nowrap">
                                                <i class="fa-solid fa-user"></i>: &nbsp;
                                                @if (isset($partner->first_name) && $partner->first_name)
                                                    {!! $partner->first_name !!}
                                                @elseif (isset($subscriber->username) && $subscriber->username)
                                                    {!! $subscriber->username !!}
                                                @endif
                                            </p>


                                            @if (isset($partner->email) && $partner->email)
                                                <p class="whitespace-nowrap">
                                                    <i class="fa-solid fa-envelope"></i>: &nbsp;
                                                    {!! $partner->email !!}
                                                </p>
                                            @endif

                                            @if (isset($partner->phone) && $partner->phone)
                                                <p class="whitespace-nowrap">
                                                    <i class="fa-solid fa-phone"></i>: &nbsp;
                                                    {!! $partner->phone !!}
                                                </p>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="flex-auto">
                                        <small
                                            class="font-sm">{!! ___('isp-access-dashboard-account-balance') !!}:</small><br>
                                        <span class="font-bold">
                                            @if (isset($wallet['balance']))
                                                {!! number_format($wallet['balance']) !!}
                                            @endif
                                            {!! $currency->code !!}
                                        </span>
                                    </div>
                                    <div class="flex-auto text-center">
                                        <small
                                            class="font-sm">{!! ___('isp-access-dashboard-account-unpaid') !!}:</small><br>
                                        {!! $invoices->count() !!}
                                    </div>
                                </div>
                            @endif


                        </div>
                    </div>
                    <div class="sm:flex-auto sm:col-span-6">
                        <div
                            class=" shadow-xl rounded-md bg-gradient-to-br from-pink-500 via-red-900 to-pink-700 hover:from-pink-500  hover:via-red-900  hover:to-yellow-900 sm:ml-2 m-1">

                            @if (isset($featured_package->id))
                                <div class="h-40">
                                    <h3 class="text-4xl text-white text-center py-2">
                                        {!! $featured_package->title !!}
                                    </h3>

                                    <p class="text-white text-center py-2">
                                        {!! $featured_package->speed !!}
                                        {!! $featured_package->speed_type == 'kilobyte' ? 'KB' : ($featured_package->speed_type == 'megabyte' ? 'MB' : 'GB') !!}

                                        for {!! $featured_package->duration !!} {!! $featured_package->duration_type !!}
                                    </p>

                                    <div class="flex p-1">
                                        <div class="flex-none w-28">
                                            <h4 class="text-2xl text-white">
                                                {!! number_format($featured_package->amount) !!} {!! $currency->code !!}
                                            </h4>
                                        </div>
                                        <div class="flex-auto text-right pr-4">
                                            <a href="{!! url(route('isp_access_buypackage', ['id' => $featured_package->id, 'return_url' => $return_url])) !!}"
                                                class="bg-yellow-300 hover:bg-yellow-200 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                {!! ___('isp-access-dashboard-buy-button') !!}
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            @else
                                <div class="grid h-40 place-items-center">
                                    <h3 class="text-4xl text-white text-center">
                                        {!! ___('isp-access-dashboard-nofeatured-title') !!}
                                        <br>
                                        <small class="text-xs">
                                            {!! ___('isp-access-dashboard-nofeatured-instruction') !!}
                                        </small>
                                    </h3>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>

            @if (false)
                <h3 class="text-center font-normal italic text-lg">
                    {!! ___('isp-access-dashboard-quick-links') !!}
                </h3>
                <div class="grid grid-cols-4 gap-4 mt-2 my-4">
                    <div class="text-center rounded shadow sm:p-2 bg-white">
                        <a class="inline-block px-3 py-2 sm:px-8 sm:py-6 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out"
                            style="background-color: #ea4335;">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 488 512" class="w-4 h-4">
                                <path fill="currentColor"
                                    d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z" />
                            </svg>
                        </a>
                        <br>
                        <small class="text-xs">
                            {!! ___('isp-access-dashboard-quick-links-google') !!}

                        </small>
                    </div>
                    <div class="text-center rounded shadow sm:p-2 bg-white">
                        <a class="inline-block px-3 py-2 sm:px-8 sm:py-6 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out"
                            style="background-color: #ff0000;">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-4 h-4">
                                <path fill="currentColor"
                                    d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z" />
                            </svg>
                        </a>
                        <br>
                        <small class="text-xs">
                            {!! ___('isp-access-dashboard-quick-links-youtube') !!}
                        </small>

                    </div>
                    <div class="text-center rounded shadow sm:p-2 bg-white">
                        <a class="inline-block px-3 py-2 sm:px-8 sm:py-6 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out"
                            style="background-color: #1877f2;">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-4 h-4">
                                <path fill="currentColor"
                                    d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z" />
                            </svg>
                        </a>
                        <br>
                        <small class="text-xs">
                            {!! ___('isp-access-dashboard-quick-links-facebook') !!}
                        </small>
                    </div>
                    <div class="text-center rounded shadow sm:p-2 bg-white">
                        <a class="inline-block px-3 py-2 sm:px-8 sm:py-6 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out"
                            style="background-color: #1da1f2;">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4">
                                <path fill="currentColor"
                                    d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z" />
                            </svg>
                        </a>
                        <br>
                        <small class="text-xs">
                            {!! ___('isp-access-dashboard-quick-links-twitter') !!}
                        </small>

                    </div>
                </div>
            @endif


            <div class="relative overflow-hidden mb-8">

                @if ($invoices->count() > 0)
                    <h3 class="text-center font-normal italic text-lg">
                        {!! ___('isp-access-dashboard-purchase-request') !!}
                    </h3>
                    @foreach ($invoices as $invoice)
                        <div role="listitem" class="text-center bg-white p-2 shadow ring-1 ring-gray-900/5 rounded m-2">
                            <h2 class="text-lg font-semibold leading-6 text-gray-800 dark:text-white pb-3 p-3">
                                {!! $invoice->title !!}
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </h2>

                            <small class="text-xs leading-6 text-gray-600 dark:text-gray-200 md:w-80">
                                <b>{!! ___('isp-access-dashboard-purchase-request-date') !!}:</b>
                                {!! date('d/m/y H:i', strtotime($invoice->created_at)) !!},
                                <b>{!! ___('isp-access-dashboard-purchase-request-status') !!}:</b> <span
                                    class="uppercase">{!! $invoice->status !!}</span>
                            </small>
                            <div class="items-center justify-between flex">
                                <p class="mt-4 text-2xl font-semibold leading-6 text-gray-800 dark:text-white md:mt-0">
                                    {!! number_format($invoice->total) !!}
                                    <span class="text-base font-normal">{!! $currency->code !!}</span>
                                </p>
                                <div>
                                    <a id='invoice-cancel'
                                        href="{!! url(route('isp_access_invoicecancel', ['id' => $invoice->id, 'return_url' => $return_url])) !!}"
                                        class="inline-block px-6 py-2.5 bg-red-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                        {!! ___('isp-access-dashboard-purchase-request-cancel') !!}
                                    </a>
                                    <a id='invoice-complete'
                                        href="{!! url(route('account_payment', ['invoice_id' => $invoice->id, 'return_url' => $return_url])) !!}"
                                        class="ml-2 inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                        {!! ___('isp-access-dashboard-purchase-request-payment') !!}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

                @if ($packages->count() > 0)
                    <h3 class="text-center font-normal italic text-lg"> {!! ___('isp-access-dashboard-package-title') !!}
                    </h3>
                    @foreach ($packages as $package)
                        <div class="mb-5">
                            <div role="listitem" class="relative bg-white p-3 shadow ring-1 ring-gray-900/5 rounded m-2">

                                <div class="text-center mb-1 ">
                                    <h2 class="text-2xl font-semibold leading-6 text-gray-800 dark:text-white text-center">
                                        {!! $package->title !!}
                                    </h2>

                                    <small class="text-xs leading-6 text-gray-600 dark:text-gray-200 md:w-80">
                                        {!! $package->description !!}, {!! ___('isp-access-dashboard-package-package') !!}:
                                        {!! $package->package_title !!},
                                        {!! ___('isp-access-dashboard-package-speed') !!}:
                                        {!! $package->speed !!}
                                        {!! $package->speed_type == 'kilobyte' ? 'KB' : ($package->speed_type == 'megabyte' ? 'MB' : 'GB') !!}
                                    </small>
                                </div>

                                <div class="items-center justify-between flex">
                                    <p class="text-2xl font-semibold leading-6 text-gray-800 dark:text-white md:mt-0">
                                        {!! number_format($package->amount) !!}
                                        <span class="text-base font-normal"> {!! $currency->code !!} </span>
                                    </p>
                                    <div>
                                        <a id='package'
                                            href="{!! url(route('isp_access_buypackage', ['id' => $package->id, 'return_url' => $return_url])) !!}"
                                            class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                            {!! ___('isp-access-dashboard-package-button') !!}
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                @endif
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
