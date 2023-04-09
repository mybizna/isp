<template>
    <div class="shadow-xl rounded-md  bg-white">
        <div v-if="featured_package.id"
            class=" rounded-md bg-gradient-to-br from-pink-500 via-red-900 to-pink-700 hover:from-pink-500 hover:via-red-900 hover:to-yellow-900">

            <div class="flex p-1">
                <div class="flex-auto">

                    <h3 class="text-4xl text-white pt-2">
                        {{ featured_package.title }}
                    </h3>

                    <p class="text-white pb-2">
                        {{ featured_package.speed }}
                        {{ featured_package.speed_type == 'kilobyte' ? 'KB' : (featured_package.speed_type == 'megabyte' ?
                            'MB'
                            : 'GB') }}

                        for {{ featured_package.duration }} {{ featured_package.duration_type }}
                    </p>

                </div>
                <div class="flex-auto text-right pr-4">
                    <h4 class="text-2xl text-white py-5 h-18">
                        {{ featured_package.amount }} KES
                    </h4>
                </div>
            </div>

            <apexchart width="100%" height="50px" type="area" :options="options" :series="series"></apexchart>

        </div>
        <div class="bg-white pb-1">
            <div v-for="tmp_package in packages" class="mb-2">
                <div role="listitem" class="relative bg-white shadow ring-1 ring-red-200 rounded m-1">

                    <div class="items-center justify-between flex">

                        <div class="mb-1 ">
                            <h2 class="text-2xl font-semibold leading-6 text-gray-800 dark:text-white text-center">
                                {{ tmp_package.title }}
                            </h2>

                            <small class="text-xs leading-6 text-gray-600 dark:text-gray-200 md:w-80">
                                {{ tmp_package.description }}, Package: {{ tmp_package.package_title }},
                                Speed:
                                {{ tmp_package.speed }}
                                {{ tmp_package.speed_type == 'kilobyte' ? 'KB' : (tmp_package.speed_type == 'megabyte' ?
                                    'MB' :
                                    'GB') }}
                            </small>
                        </div>

                        <div>
                            <p class="text-2xl text-center font-semibold leading-6 text-gray-800 dark:text-white md:mt-0 pr-2">
                                {{ tmp_package.amount }}
                                <span class="text-base font-normal">KES</span>
                            </p>
                        </div>
                    </div>

                    <apexchart width="100%" height="20px" type="area" :options="options" :series="series"></apexchart>


                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            id: null,
            featured_package: {
                'id': 1,
                'title': 'Sample',
                'description': 'Sample',
                'speed': 1,
                'speed_type': 'megabyte',
                'duration': 1,
                'duration_type': "Month",
                'amount': 100,
            },
            packages: [{
                'id': 1,
                'title': 'Sample',
                'description': 'Sample',
                'package_title': 'Sample',
                'speed': 1,
                'speed_type': 'megabyte',
                'duration': 1,
                'duration_type': "Month",
                'amount': 100,
            }, {
                'id': 2,
                'title': 'Sample',
                'description': 'Sample',
                'package_title': 'Sample',
                'speed': 1,
                'speed_type': 'megabyte',
                'duration': 1,
                'duration_type': "Month",
                'amount': 100,
            }],
            options: {
                chart: {
                    id: 'vuechart-profit',
                    sparkline: {
                        enabled: true
                    },
                },
                stroke: {
                    curve: 'straight'
                },
                fill: {
                    opacity: 1,
                },
                labels: [...Array(11).keys()].map(n => `2023-09-0${n + 1}`),
                yaxis: {
                    min: 0
                },
                xaxis: {
                    type: 'datetime',
                },
                colors: ['#f87171'],
            },
            series: [{
                name: 'Profit',
                data: [70, 30, 40, 45, 50, 49, 600, 70, 91, 20, 30]
            }]
        }
    }
}
</script>

