@extends('base::app')

@section('content')


    <section class="bg-blue-50 dark:bg-blue-900 h-full h-screen">
        <div class="w-full md:w-4/5 lg:w-2/4 mx-auto pt-10">


            <div
                class="relative flex flex-col min-w-0 break-words bg-transparent border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                <div
                    class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500">
                    <div class="relative z-10 flex-auto p-4">
                        <i class="p-2 text-white fas fa-wifi" aria-hidden="true"></i>
                        <div class="flex">
                            <div class="flex">
                                <div class="mr-6">
                                    <p class="mb-0 leading-normal text-white text-sm opacity-80">Card Holder</p>
                                    <h6 class="mb-0 text-white">Jack Peterson</h6>
                                </div>
                                <div>
                                    <p class="mb-0 leading-normal text-white text-sm opacity-80">Expires</p>
                                    <h6 class="mb-0 text-white">11/22</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex my-5">
                <div class="flex-auto w-1/2">
                    <div class=" shadow-xl rounded-md bg-white mr-2 pt-2">
                        <div class="text-center">
                            <span class="fa-stack fa-2x text-gray-500" style="vertical-align: top;">
                                <i class="fa-regular fa-circle fa-stack-2x"></i>
                                <i class="fa-solid fa-user fa-stack-1x"></i>
                            </span>
                        </div>
                        <div class="text-center">
                            {{ $user.name}} ({{ $user.username}})
                            <i class="fa-solid fa-email"></i> {{ $user.email}}
                            <i class="fa-solid fa-phone"></i> {{ $user.phone}}
                        </div>

                    </div>
                </div>
                <div class="flex-auto w-1/2">
                    <div
                        class=" shadow-xl rounded-md bg-gradient-to-r from-green-400 to-blue-500 hover:from-pink-500 hover:to-yellow-500 ml-2">
                        Hover me
                    </div>
                </div>
            </div>


            <form method="POST" action="{{ url(route('isp_access_submitlogin')) }}">
                @csrf

                <div class="relative overflow-hidden mb-8">

                    @if ($invoices)
                        <h3 style="text-align: center;"> - Past Buy Request - </h3>
                        @foreach ($invoices as $invoice)
                            <div class="flex justify-center">
                                <div role="listitem"
                                    class="relative bg-white p-3 shadow ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-lg rounded sm:px-10 m-2">
                                    <div class="items-center justify-between flex">
                                        <h4 class="font-semibold leading-6 text-gray-800 dark:text-white">
                                            {{ $invoice->title }}
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </h4>
                                        <p
                                            class="mt-4 text-2xl font-semibold leading-6 text-gray-800 dark:text-white md:mt-0">
                                            {{ $invoice->total }}
                                            <span class="text-base font-normal">KES</span>
                                        </p>
                                    </div>
                                    <div class="items-center justify-between flex">

                                        <a id='invoice-cancel'
                                            href="{{ url(route('isp_access_invoicecancel', ['id' => $invoice->id])) }}"
                                            class="inline-block px-6 py-2.5 bg-red-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Cancel</a>

                                        <a id='invoice-complete'
                                            href="{{ url(route('isp_access_invoicebuy', ['id' => $invoice->id])) }}"
                                            value="invoicebuy_{{ $invoice->id }}"
                                            class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Buy</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    @if ($packages)
                        <h3 style="text-align: center;"> Package </h3>
                        @foreach ($packages as $package)
                            <div class="my-5">
                                <div role="listitem"
                                    class="relative bg-white p-3 shadow ring-1 ring-gray-900/5 rounded m-2">
                                    <div class="items-center justify-between flex">
                                        <h2 class="text-2xl font-semibold leading-6 text-gray-800 dark:text-white">
                                            {{ $package->title }}
                                        </h2>
                                        <p
                                            class="mt-4 text-2xl font-semibold leading-6 text-gray-800 dark:text-white md:mt-0">
                                            {{ $package->amount }}
                                            <span class="text-base font-normal">KES</span>
                                        </p>
                                    </div>
                                    <div class="items-center justify-between flex">
                                        <small class="text-base text-xs leading-6 text-gray-600 dark:text-gray-200 md:w-80">
                                            {{ $package->description }}, Package: {{ $package->package_title }},
                                            Speed:
                                            {{ $package->speed }}
                                            {{ $package->speed_type == 'kilobyte' ? 'KB' : 'MB' }}
                                        </small>
                                        <a id='package'
                                            href="{{ url(route('isp_access_singlepackage', ['id' => $package->id])) }}"
                                            data-mdb-ripple="true" data-mdb-ripple-color="light"
                                            class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Buy</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </form>
        </div>
    </section>


@endsection
