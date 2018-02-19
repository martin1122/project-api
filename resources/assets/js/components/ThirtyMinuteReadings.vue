<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Thirty Minute readings</div>
                    <ul v-if="errors && errors.length">
                        <li v-for="error of errors">
                          {{error.message}}
                        </li>
                    </ul>
                    
                </div>
            </div>
        </div>

        <!-- <div class="col-6 readings-chart" v-for="incDec in increaseDecrease">
            <p>{{ incDec.device }} -> First: {{ incDec.first }}, Last: {{ incDec.last }}</p>
            {{ this.increaseDecrease = Math.abs(incDec.last - incDec.first) }}

            
             {{ incDec.first > incDec.last ? this.increaseDecreaseMessage = 'Up' : this.increaseDecreaseMessage = 'Down' }}
        </div> -->

        <div class="row">
            <div class="col-6 readings-chart" v-for="(device) in devices">
                    <div class="panel-body">
                        <!-- {{ increaseDecreaseMessage }} by {{ increaseDecrease }} from last month -->
                    </div>
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
                increaseDecrease: [],
                increaseDecreaseMessage: ''
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

                        this.axios.get(`api/device/${deviceID}/reading`)
                        .then(response => {
                            
                            // Push each returned response (one for each device ID) into its own array
                            for(var j in response.data) {
                                // Push devices into components array
                                this.devices.push(response.data[j]);
                                // Push most recent and last reading of each device into component array
                                this.increaseDecrease.push(
                                    {
                                        'first': response.data[j][d].attributes.reading, 
                                        'last': response.data[j][response.data[j].length-1].attributes.reading,
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
