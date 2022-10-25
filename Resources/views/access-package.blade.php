<div class="relative overflow-hidden mb-8">
    
    @foreach($packages as $package)
        <div class="flex justify-center">
            <div role="listitem"
                class="relative bg-white p-3 shadow ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-lg rounded sm:px-10 m-2">
                <div class="items-center justify-between flex">
                    <h2 class="text-2xl font-semibold leading-6 text-gray-800 dark:text-white">{{ $package->title }}</h2>
                    <p class="mt-4 text-2xl font-semibold leading-6 text-gray-800 dark:text-white md:mt-0">
                        {{ $package->amount }}<span class="text-base font-normal">/{{ $package->package_title }}</span></p>
                </div>
                <div class="items-center justify-between flex">
                    <small class="text-base text-xs leading-6 text-gray-600 dark:text-gray-200 md:w-80">
                        {{ $package->description }}
                    </small>
                    <button type="button" data-mdb-ripple="true" data-mdb-ripple-color="light"
                        class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Buy</button>
                </div>
            </div>
        </div>
    @endforeach
   
</div>
