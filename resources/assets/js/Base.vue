<template>
    <div class="container">
        <div>
            <transition name="fade"></transition>
            <component :is="currentlyActiveComponent"></component>
            <div id="buttons">
                <button @click="switchToReport">Yearly</button>
                <button @click="switchToProject">Monthly</button>
            </div>
        </div>
    </div>
</template>
<style>
    .fade-enter-active, .fade-leave-active {
      transition: opacity .5s
    }
    .fade-enter, .fade-leave-active {
      opacity: 0
    }
</style>
<script>

    import MonthlyReadings from './components/MonthlyReadings.vue';
    import YearlyReadings from './components/YearlyReadings.vue';
    import Buttons from './components/Buttons.vue';

    export default {
        name: 'Base',
        components: { MonthlyReadings, YearlyReadings },
        data() {
            return {
                currentlyActiveComponent: MonthlyReadings
            }
        },
        methods: {
            switchToReport:function(){
                this.currentlyActiveComponent = YearlyReadings
            },
            switchToProject:function(){
                this.currentlyActiveComponent = MonthlyReadings
            }
        },
        mounted() {
            console.log('Base Component mounted.')
        }
    }
</script>