<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Monthly readings</div>
                    <ul v-if="errors && errors.length">
                        <li v-for="error of errors">
                          {{error.message}}
                        </li>
                    </ul>
                    <div class="panel-body">
                        {{ increaseDecreaseMessage }} by {{ increaseDecrease }} from last month
                        <div class="readings-chart" v-for="(device) in devices">

                            <!-- <div v-for="(d) in device"> -->
                                <!-- <p>{{ device.map(d => [d.attributes.reading, d.attributes.time]) }}</p> -->
                            <!-- </div> -->
                   

                            <area-chart :data="[{name: device[0].id, data: device.map(d => [d.attributes.time, d.attributes.reading])}]"></area-chart>
            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        name: 'MonthlyReadings',
        data() {
            return {
                chartData: [],
                devices: [],
                errors: [],
                increaseDecrease: 0,
                increaseDecreaseMessage: ''
            }
        },
        methods: {
            // fetchData() {
            //     this.axios.get(`api/device/abc4/reading/monthly?type='1'`)
            //     .then(response => {
            //         console.log(response);
            //         for (var d in response.data) {
            //             response.data[d].map(d => this.chartData.push([d.attributes.time, d.attributes.reading]));
            //         }

            //         this.calculateIncreaseDecreaseRange();
            //     })
            //     .catch(e => {
            //       this.errors.push(e)
            //     })
            // },
            fetchData() {
                var responseArrays = [];
                // Fetch all devices
                this.axios.get(`api/device`)
                .then(response => {
                    //console.log(response);
                    // For each device returned
                    for (var d in response.data.data) {
                    
                        // And fetch monthly readings for that particular device using its ID
                        var deviceID = response.data.data[d].id;

                        this.axios.get(`api/device/${deviceID}/reading/monthly?type='1'`)
                        .then(response => {
                            
                            // console.log(response);
                            // Push each returned response (one for each device ID) into its own array
                 
                            for(var j in response.data) {
                                // responseArrays.push(response.data[j]);
                                this.devices.push(response.data[j]);
                            }
                            console.log(this.devices);

                            // for(var i = 0; i < this.devices.length; i++) {
                            //     console.log(this.devices[i]);
                            // }
                        })
                        .catch(e => {
                          this.errors.push(e)
                        })
                    }
                })
                .catch(e => {
                  this.errors.push(e)
                })

                // Push the response data array into the devices array
                // this.devices = responseArrays;
                // console.log(this.devices);

                // for(var dev in this.devices) {
                //     if (this.devices.hasOwnProperty(dev)) {
                //         console.log(this.devices[dev]);
                //      }
                // }
                
                


                // for (var i = 0; i < this.devices.length; i++) {
                //     console.log(this.devices);
                // }
                
            },
            // calculateIncreaseDecreaseRange(chartData) {
            //     // Latest value in array (first one)
            //     var latestReading = this.chartData[0][1];
            //     // Oldest value in array (last one)
            //     var oldestReading = this.chartData[this.chartData.length-1][1];

            //     // Calculate difference between first reading and last 
            //     this.increaseDecrease = Math.abs(oldestReading - latestReading);
       
            //     // Determine whether it has increased or decreased
            //     console.log(this.chartData);
            //     if(latestReading > oldestReading) {
            //         this.increaseDecreaseMessage = 'Up'
            //     } else {
            //         this.increaseDecreaseMessage = 'Down'
            //     }
            // }
            

        }, 
        created() {
            this.fetchData();
        },
        mounted() {
            console.log('MonthlyReadings Component mounted.')
        }
    }
</script>
