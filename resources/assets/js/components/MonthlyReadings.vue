<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Monthly readings</div>
                    <ul v-if="errors && errors.length">
                        <li v-for="error of errors">
                          {{error.message}}
                        </li>
                    </ul>
                    <div class="panel-body">
                        {{ increaseDecreaseMessage }} by {{ increaseDecrease }} from last month
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6 readings-chart" v-for="(device) in devices">
                    
                    <area-chart :data="[{name: device[0].id, data: device.map(d => [d.attributes.time, d.attributes.reading])}]">
                    </area-chart> 
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        name: 'MonthlyReadings',
        data() {
            return {
                devices: [],
                errors: [],
                increaseDecrease: 0,
                increaseDecreaseMessage: ''
            }
        },
        methods: {
            fetchData() {
                // Fetch all devices
                this.axios.get(`api/device`)
                .then(response => {
                    // For each device returned
                    for (var d in response.data.data) {
                    
                        // And fetch monthly readings for that particular device using its ID
                        var deviceID = response.data.data[d].id;

                        this.axios.get(`api/device/${deviceID}/reading/monthly?type='1'`)
                        .then(response => {
                            
                            // Push each returned response (one for each device ID) into its own array
                            for(var j in response.data) {
                                this.devices.push(response.data[j]);
                            }
                        })
                        .catch(e => {
                          this.errors.push(e)
                        })
                    }
                })
                .catch(e => {
                  this.errors.push(e)
                })
            },

            calculateIncreaseDecreaseRange(devices) {
                // Latest value in array (first one)
                // var latestReading = this.chartData[0][1];
                // // Oldest value in array (last one)
                // var oldestReading = this.chartData[this.chartData.length-1][1];

                // // Calculate difference between first reading and last 
                // this.increaseDecrease = Math.abs(oldestReading - latestReading);
       
                // // Determine whether it has increased or decreased
                // console.log(this.chartData);
                // if(latestReading > oldestReading) {
                //     this.increaseDecreaseMessage = 'Up'
                // } else {
                //     this.increaseDecreaseMessage = 'Down'
                // }
            }
        }, 
        created() {
            this.fetchData();
            
        },
        mounted() {
            console.log('MonthlyReadings Component mounted.')
            this.calculateIncreaseDecreaseRange(this.devices);
        }
    }
</script>
