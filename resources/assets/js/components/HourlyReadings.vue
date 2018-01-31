<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Hourly readings</div>
                    <ul v-if="errors && errors.length">
                        <li v-for="error of errors">
                          {{error.message}}
                        </li>
                    </ul>
                    <div class="panel-body">
                        {{ increaseDecreaseMessage }} by {{ increaseDecrease }} from an hour ago
                       <area-chart :data="chartData"></area-chart>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'HourlyReadings',
        data() {
            return {
                chartData: [],
                errors: [],
                increaseDecrease: 0,
                increaseDecreaseMessage: ''
            }
        },
        methods: {
            fetchData() {
                this.axios.get(`api/reading/hourly`)
                .then(response => {
                    console.log(response);
                    for (var d in response.data) {
                        response.data[d].map(d => this.chartData.push([d.attributes.time, d.attributes.reading]));
                    }

                    this.calculateIncreaseDecreaseRange();
                })
                .catch(e => {
                  this.errors.push(e)
                })
            },
            calculateIncreaseDecreaseRange(chartData) {
                // Latest value in array (first one)
                var latestReading = this.chartData[0][1];
                // Oldest value in array (last one)
                var oldestReading = this.chartData[this.chartData.length-1][1];

                // Calculate difference between first reading and last 
                this.increaseDecrease = Math.abs(oldestReading - latestReading);
       
                // Determine whether it has increased or decreased
                console.log(this.chartData);
                if(latestReading > oldestReading) {
                    this.increaseDecreaseMessage = 'Up'
                } else {
                    this.increaseDecreaseMessage = 'Down'
                }
            }
        }, 
        created() {
            this.fetchData();
        },
        mounted() {
            console.log('HourlyReadings Component mounted.')
        }
    }
</script>
