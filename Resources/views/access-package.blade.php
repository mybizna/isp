@extends('isp::access')

@section('content')
    <form method="POST">
        @csrf
        <div class="relative overflow-hidden mb-8">

            @if ($invoices)
                <h3 style="text-align: center;"> - Past Buy Request - </h3>
                @foreach ($invoices as $invoice)
                    <div class="flex justify-center">
                        <div role="listitem"
                            class="relative bg-white p-3 shadow ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-lg rounded sm:px-10 m-2">
                            <div class="items-center justify-between flex">
                                <h4 class="font-semibold leading-6 text-gray-800 dark:text-white">{{ $invoice->title }}
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </h4>
                                <p class="mt-4 text-2xl font-semibold leading-6 text-gray-800 dark:text-white md:mt-0">
                                    {{ $invoice->total }}
                                    <span class="text-base font-normal">KES</span>
                                </p>
                            </div>
                            <div class="items-center justify-between flex">

                                <button id='invoice-cancel' type="submit" name="view"
                                    value="invoicecancel_{{ $invoice->id }}" data-mdb-ripple="true"
                                    data-mdb-ripple-color="light"
                                    class="inline-block px-6 py-2.5 bg-red-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Cancel</button>

                                <button id='invoice-complete' type="submit" name="view"
                                    value="invoicebuy_{{ $invoice->id }}" data-mdb-ripple="true"
                                    data-mdb-ripple-color="light"
                                    class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Buy</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

            @if ($packages)
                <h3 style="text-align: center;"> - Package List - </h3>
                @foreach ($packages as $package)
                    <div class="flex justify-center">
                        <div role="listitem"
                            class="relative bg-white p-3 shadow ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-lg rounded sm:px-10 m-2">
                            <div class="items-center justify-between flex">
                                <h2 class="text-2xl font-semibold leading-6 text-gray-800 dark:text-white">
                                    {{ $package->title }}
                                </h2>
                                <p class="mt-4 text-2xl font-semibold leading-6 text-gray-800 dark:text-white md:mt-0">
                                    {{ $package->amount }}
                                    <span class="text-base font-normal">KES</span>
                                </p>
                            </div>
                            <div class="items-center justify-between flex">
                                <small class="text-base text-xs leading-6 text-gray-600 dark:text-gray-200 md:w-80">
                                    {{ $package->description }}, Package: {{ $package->package_title }}, Speed:
                                    {{ $package->speed }} {{ $package->speed_type == 'kilobyte' ? 'KB' : 'MB' }}
                                </small>
                                <button id='package' type="submit" name="view" value="package_{{ $package->id }}"
                                    data-mdb-ripple="true" data-mdb-ripple-color="light"
                                    class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Buy</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif


            <input type="hidden" name="username" value="{{ $username }}">
            <input type="hidden" name="password" value="{{ $password }}">
        </div>
    </form>
@endsection
