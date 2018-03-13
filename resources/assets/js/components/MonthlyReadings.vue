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
                    {{ device[0].attributes.prev_difference_val > 0 ? this.increaseDecreaseMessage = 'Up' : this.increaseDecreaseMessage = 'Down' }}

                    <area-chart :data="[{name: device[0].attributes.prev_difference_val.toFixed(2) + ' ' + this.increaseDecreaseMessage, data: device.map(d => [d.attributes.time, d.attributes.reading])}]">
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
                increaseDecrease: [],
                increaseDecreaseMessage: ''
            }
        },
        props: ['fromDate', 'currentDate'],
        methods: {
            /**
             * [fetchData description]
             * @return {[type]} [description]
             */
            fetchData(callback) {
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
                                // Push devices into components array
                                this.devices.push(response.data[j]);
                                // Push most recent and last reading of each device into component array
                                this.increaseDecrease.push(
                                    {
                                        'prev': response.data[j][1].attributes.reading, 
                                        'last': response.data[j][0].attributes.reading,
                                        'device': response.data[j][d].attributes.device_id
                                    }
                                );
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
             * [calculateIncreaseDecreaseRange description]
             * @return {[type]} [description]
             */
            calculateIncreaseDecreaseRange() {
                
                console.log(this.devices);
                for(var i = 0; i < this.devices.length; i++) {
                    // console.log(data[i]);
                    this.devices[i].attributes.prev_difference_val > 0 ? this.increaseDecreaseMessage = 'Up' : this.increaseDecreaseMessage = 'Down';
                }
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
            this.fetchData(this.calculateIncreaseDecreaseRange);
            // Once parent has emitted the 'handle' event, call fetchDataWithSelectedDate()
            this.$parent.$on('handle', this.fetchDataWithSelectedDate);

            var callback = function() {

                console.log(this.devices);
                for(var i = 0; i < this.devices.length; i++) {
                    // console.log(data[i]);
                    this.devices[i].attributes.prev_difference_val > 0 ? this.increaseDecreaseMessage = 'Up' : this.increaseDecreaseMessage = 'Down';
                }
            }
        },
        /**
         * [mounted description]
         * @return {[type]} [description]
         */
        mounted() {
            console.log('MonthlyReadings Component mounted.')
            
        }
    }
</script>
