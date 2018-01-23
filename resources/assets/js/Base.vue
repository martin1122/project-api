<template>
    <div class="container">
        <div>
            <transition name="fade" mode="out-in">
                <component :is="currentlyActiveComponent"></component>
            </transition>
            <div id="buttons">
                <button type="button" class="btn btn-primary" @click="switchToHourly">Hourly</button>
                <button type="button" class="btn btn-primary" @click="switchToDaily">Daily</button>
                <button type="button" class="btn btn-primary" @click="switchToMonthly">Monthly</button>
                <button type="button" class="btn btn-primary" @click="switchToYearly">Yearly</button>
            </div>
        </div>
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
    import HourlyReadings from './components/HourlyReadings.vue';
    import DailyReadings from './components/DailyReadings.vue';
    import MonthlyReadings from './components/MonthlyReadings.vue';
    import YearlyReadings from './components/YearlyReadings.vue';
    import Buttons from './components/Buttons.vue';

    export default {
        name: 'Base',
        components: { HourlyReadings, DailyReadings, MonthlyReadings, YearlyReadings },
        data() {
            return {
                currentlyActiveComponent: DailyReadings
            }
        },
        methods: {
            switchToYearly:function(){
                this.currentlyActiveComponent = YearlyReadings
            },
            switchToMonthly:function(){
                this.currentlyActiveComponent = MonthlyReadings
            },
            switchToDaily:function(){
                this.currentlyActiveComponent = DailyReadings
            },
            switchToHourly:function(){
                this.currentlyActiveComponent = HourlyReadings
            }
        },
        mounted() {
            console.log('Base Component mounted.')
        }
    }
</script>