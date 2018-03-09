<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div id="date-range">
                        <div class="form-group row">
                            
                            <div class="col-6">
                                <label for="example-datetime-local-input" class="col-2 col-form-label">From:</label>
                                <input class="form-control" type="datetime-local" value="2018-02-03T13:45:00" id="example-datetime-local-input date-from" @change="updateFromDate" :v-model="currentDate">
                                <p>From: {{ fromDate }}</p>
                            </div>
                            <div class="col-6">
                                <label for="example-datetime-local-input" class="col-2 col-form-label">To:</label>
                                <input class="form-control" type="datetime-local" value="2018-02-19T15:57:20.62" id="example-datetime-local-input date-to">
                                <p>To: today</p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div id="buttons">
                        <button type="button" class="btn btn-primary" @click="switchToThirtyMinutes">Thirty Minutes</button>
                        <button type="button" class="btn btn-primary" @click="switchToHourly">Hourly</button>
                        <button type="button" class="btn btn-primary" @click="switchToDaily">Daily</button>
                        <button type="button" class="btn btn-primary" @click="switchToMonthly">Monthly</button>
                        <button type="button" class="btn btn-primary" @click="switchToYearly">Yearly</button>
                    </div>
                </div>
            </div>
        </div>
        <transition name="fade" mode="out-in">
            <component v-bind:fromDate="fromDate" :is="currentlyActiveComponent"></component>
        </transition>
    </div>

</template>
<style>
    .fade-enter-active, .fade-leave-active {
      transition: opacity .3s ease
    }
    .fade-enter, .fade-leave-to {
      opacity: 0
    }
</style>
<script>

   
    import ThirtyMinuteReadings from './components/ThirtyMinuteReadings.vue';
    import HourlyReadings from './components/HourlyReadings.vue';
    import DailyReadings from './components/DailyReadings.vue';
    import MonthlyReadings from './components/MonthlyReadings.vue';
    import YearlyReadings from './components/YearlyReadings.vue';
    import Buttons from './components/Buttons.vue';
    import Datepicker from 'vuejs-datepicker';

    export default {
        name: 'Base',
        components: { ThirtyMinuteReadings, HourlyReadings, DailyReadings, MonthlyReadings, YearlyReadings },
        data() {
            return {
                currentDate: new Date(),
                fromDate: "2018-02-03T13:45:00",
                currentlyActiveComponent: MonthlyReadings,
            }
        },
        methods: {
            switchToYearly:function() {
                this.currentlyActiveComponent = YearlyReadings
            },
            switchToMonthly:function() {
                this.currentlyActiveComponent = MonthlyReadings
            },
            switchToDaily:function() {
                this.currentlyActiveComponent = DailyReadings
            },
            switchToHourly:function() {
                this.currentlyActiveComponent = HourlyReadings
            },
            switchToThirtyMinutes:function() {
                this.currentlyActiveComponent = ThirtyMinuteReadings
            },
            updateFromDate:function(event) {
                // Update component variable with chosen html date
                this.fromDate = event.target.value;

                // const newDate = new Date(this.fromDate);

                // Reformat to unix date for querying the DB
                // const epochDate = newDate.valueOf();
                // Update component variable with epoch version of chosen html date
                // this.fromDate = newDate;

                // Emit event which child listens to
                this.$emit('handle')
            },
        },
        mounted() {
            console.log('Base Component mounted.') 
            
            // this.currentDate = this.currentDate.toISOString();
            // console.log(this.currentDate.toISOString());
        }
    }
</script>