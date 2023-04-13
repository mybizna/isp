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

                        <template v-if="featured_package.speed">
                            {{ featured_package.speed }}
                            {{ featured_package.speed_type == 'kilobyte' ? 'KB' : (featured_package.speed_type == 'megabyte'
                                ?
                                'MB'
                                : 'GB') }}
                            for {{ featured_package.duration }} {{ featured_package.duration_type }}
                        </template>
                    </p>

                </div>
                <div class="flex-auto text-right pr-4">
                    <h4 class="text-2xl text-white py-5 h-18">
                        <template v-if="featured_package.amount">
                            {{ featured_package.amount }} KES
                        </template>
                    </h4>
                </div>
            </div>


        </div>
        <div class="bg-white pb-1">
            <apexchart width="100%" height="300px" type="bar" :options="options" :series="series"></apexchart>
        </div>
    </div>
</template>

<script>
export default {
    created() {
        var t = this;

        var labels = [];
        var datas = [];

        window.axios
            .get("/isp/summary")
            .then((response) => {

                response.data.packages.forEach(tmp_package => {
                    labels = tmp_package.labels;
                    datas.push(
                        {
                            name: tmp_package.title,
                            data: tmp_package.data,
                        }
                    );
                });

                this.featured_package = response.data.featured_package;

                this.options = {
                    labels: labels
                };

                this.series = datas;
            })
            .catch((response) => {
            });
    },
    data() {
        return {
            id: null,
            featured_package: {
                'id': 1,
                'title': '',
                'description': '',
                'speed': '',
                'speed_type': '',
                'duration': '',
                'duration_type': "",
                'amount': '',
            },
            packages: [],
            options: {
                chart: {
                    id: 'vuechart-stacked',
                    stacked: true,
                },
                plotOptions: {
                    bar: {
                        //columnWidth: '45%',
                    }
                },
                colors: ['#00D8B6', '#008FFB', '#FEB019', '#FF4560', '#775DD0', '#ef9745', '#efdb45', '#45efe1', '#4553ef'],
                labels: ['0', '1', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
                yaxis: {
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                    labels: {
                        style: {
                            colors: '#78909c'
                        }
                    }
                },
                title: {
                    text: 'Monthly ISP Subscription',
                    align: 'left',
                    style: {
                        fontSize: '18px'
                    }
                }
            },
            series: [
                {
                    name: "Loading",
                    data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                }
            ]
        }
    }
}
</script>

