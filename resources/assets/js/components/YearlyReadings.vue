<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Yearly readings</div>
                    <ul v-if="errors && errors.length">
                        <li v-for="error of errors">
                          {{error.message}}
                        </li>
                    </ul>
                    <div class="panel-body">
                       <!-- <area-chart :data="chartData"></area-chart> -->
                       <p>{{ test }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                chartData: [],
                errors: [],
                test: "Yearly readings"
            }
        },
        methods: {
            fetchData() {
                this.axios.get(`api/reading/yearly`)
                .then(response => {
                    console.log(response.data);
                    for (var d in response.data) {
                        response.data[d].map(d => this.chartData.push([d.attributes.time, d.attributes.reading]));
                    }
                })
                .catch(e => {
                  this.errors.push(e)
                })
            }
        },
        // created() {
        //     this.fetchData();
        // },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
