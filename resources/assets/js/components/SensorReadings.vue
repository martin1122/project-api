<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Great Stour river readings</div>

                    <div class="panel-body">
                       <area-chart :data="chartData"></area-chart>
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
                chartData: [["Jan", 5000], ["Feb", 4900], ["Mar", 4500], ["Apr", 4700], ["May", 4900]]
            }
        }
    }
</script>
