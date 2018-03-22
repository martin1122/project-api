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
                    
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6 readings-chart" v-for="(device) in devices">
                    <area-chart :data="[{name: device[0].attributes.device_id == "0004a30b0019bc1a" ? 'Canterbury' : device[0].attributes.device_id + ' ' + (device[0].attributes.prev_difference_val != null ? device[0].attributes.prev_difference_val.toFixed(2) : ' ') + ' ' + (device[0].attributes.prev_difference_val != null ? (device[0].attributes.prev_difference_val > 0 ? 'Up' : 'Down') : ' '), data: device.map(d => [d.attributes.time, d.attributes.reading])}]">
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
                errors: []
            }
        },
        props: ['fromDate', 'currentDate'],
        methods: {
            /**
             * [fetchData description]
             * @return {[type]} [description]
             */
            fetchData() {
                // Fetch all devices
                this.axios.get(`api/device`)
                .then(response => {
                    // console.log(response);
                    // For each device returned
                    for (var d in response.data.data) {
                        
                        // And fetch monthly readings for that particular device using its ID
                        var deviceID = response.data.data[d].id;

                        this.axios.get(`api/device/${deviceID}/reading/monthly?type='1'`)
                        .then(response => {
                            // console.log(response);
                            // Push each returned response (one for each device ID) into its own array
                            for(var j in response.data) {
                                // Push devices into components array
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
            /**
             * [fetchDataWithSelectedDate description]
             * @return {[type]} [description]
             */
            fetchDataWithSelectedDate() {

                var deviceID;
                console.log(this.$props.fromDate);
                var fetchedReadings = [];

                for(var i = 0; i < this.devices.length; i++) {
                    
                    deviceID = this.devices[i][i].attributes.device_id;
                    
                    // `api/reading/monthly?filter=device='${deviceID}',time>='2018-02-05T00:00:00Z',time<='now()'`
                    this.axios.get(`api/device/${deviceID}/reading/monthly?filter=time>='${this.$props.fromDate}Z',time<=now()`)
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
        /**
         * [created description]
         * @return {[type]} [description]
         */
        created() {

            this.fetchData();
            // Once parent has emitted the 'handle' event, call fetchDataWithSelectedDate()
            this.$parent.$on('handle', this.fetchDataWithSelectedDate);
        },
        /**
         * [mounted description]
         * @return {[type]} [description]
         */
        mounted() {
            console.log('MonthlyReadings Component mounted.')
            this.calculateIncreaseDecreaseRange();
        }
    }
</script>
