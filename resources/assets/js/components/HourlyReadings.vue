<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Hourly readings</div>
                    <ul v-if="errors && errors.length">
                        <li v-for="error of errors">
                          {{error.message}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6 readings-chart" v-for="(device) in devices">
                    <area-chart :data="[{name: (device[0].attributes.device_id == '0004a30b0019bc1a' ? 'Canterbury' : device[0].attributes.device_id) + ' ' + (device[0].attributes.prev_difference_val != null ? device[0].attributes.prev_difference_val.toFixed(2) : ' ') + ' ' + (device[0].attributes.prev_difference_val != null ? (device[0].attributes.prev_difference_val > 0 ? 'Up' : 'Down') : ' '), data: device.map(d => [d.attributes.time, d.attributes.reading])}]">
                    </area-chart> 
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'HourlyReadings',
        data() {
            return {
                devices: [],
                errors: []
            }
        },
        props: ['from-date'],
        methods: {
            fetchData() {
                // Fetch all devices
                this.axios.get(`api/device`)
                .then(response => {
                    // For each device returned
                    for (var d in response.data.data) {
                    
                        // And fetch monthly readings for that particular device using its ID
                        var deviceID = response.data.data[d].id;

                        this.axios.get(`api/device/${deviceID}/reading/daily?type='1'`)
                        .then(response => {
                            
                            // Push each returned response (one for each device ID) into its own array
                            for(var j in response.data) {
                                // Push devices into components array
                                this.devices.push(response.data[j]);
                                // Push most recent and last reading of each device into component array
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
            calculateIncreaseDecreaseRange() {
                
                //
            },
            fetchDataWithSelectedDate() {

                var deviceID;

                var fetchedReadings = [];

                for(var i = 0; i < this.devices.length; i++) {
                    
                    deviceID = this.devices[i][i].attributes.device_id;

                    this.axios.get(`api/device/${deviceID}/reading/hourly?filter=time>='${this.$props.fromDate}Z',time<=now()`)
                    .then(response => {
                        console.log(response);

                        // Push each returned response (one for each device ID) into its own array
                        for(var j in response.data) {
                            // Push devices into components array
                            fetchedReadings.push(response.data[j]);

                            this.devices.splice(0, fetchedReadings.length, ...fetchedReadings);
                        }
                    })
                    .catch(e => {
                      this.errors.push(e)
                    })
                }  
            },
        }, 
        created() {
            this.fetchData();
            // Once parent has emitted the 'handle' event, call fetchDataWithSelectedDate()
            this.$parent.$on('handle', this.fetchDataWithSelectedDate);
            
        },
        mounted() {
            console.log('HourlyReadings Component mounted.')
        }
    }
</script>
