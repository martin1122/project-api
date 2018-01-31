<template>
    <div class="container">
        <div>
            <transition name="fade"></transition>
            {{ buttons }}
            <!-- <YearlyReadings></YearlyReadings> -->
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

    export default {
        name: 'Buttons',
        data() {
            return {
                buttons: ["Weekly", "Monthly", "Yearly"]
            }
        },
        mounted() {
            console.log('Buttons Component mounted.')
        }
    }
</script>