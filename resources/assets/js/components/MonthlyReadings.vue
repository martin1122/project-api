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

        <div class="panel-body">
            <div class="row">
                <div class="col-3 readings-chart" v-for="incDec in increaseDecrease">
                    <!-- <p>{{ incDec.device }} -> Previous: {{ incDec.prev }}, Last: {{ incDec.last }}</p> -->
                    {{ incDec.device }} -> {{ this.increaseDecrease = Math.abs(incDec.last - incDec.prev) }}
                    
                    {{ incDec.last > incDec.prev ? this.increaseDecreaseMessage = 'Up' : this.increaseDecreaseMessage = 'Down' }}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6 readings-chart" v-for="(device) in devices">
                    
                    <area-chart :data="[{name: device[0].attributes.device_id, data: device.map(d => [d.attributes.time, d.attributes.reading])}]">
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
        props: ['fromDate'],
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

            calculateIncreaseDecreaseRange() {
                
                //
            },
            fetchDataWithSelectedDate() {

                var deviceID;

                var fetchedReadings = [];

                for(var i = 0; i < this.devices.length; i++) {
                    
                    deviceID = this.devices[i][i].attributes.device_id;
                    
                    // `api/reading/monthly?filter=device='${deviceID}',time>='2018-02-05T00:00:00Z',time<='now()'`
                    this.axios.get(`api/device/abc4/reading/monthly?filter=time>='2017-10-25T00:00:00Z',time<='2018-02-05T00:00:00Z'`)
                    .then(response => {
                        // console.log(response);

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
            console.log('MonthlyReadings Component mounted.')
        }
    }
</script>
