<template>
    <snackbar 
        :message="message" 
        :color="color" 
        :timeout="timeout" 
        v-model="show" 
        transition="slide-y-reverse-transition"
        :top="top"
        :right="right"
        :bottom="bottom"
        :left="left"/>
</template>
<script>
import Snackbar from "./NotificationSnackbar.vue";
export default {
    data(){
        return {
            message: "",
            color: null,
            timeout: 10000,
            show: false,
            top: null,
            left: null,
            bottom: null,
            right: null,
        }
    },
    components: {
        Snackbar,
    },
    created(){
        this.$store.subscribe((mutation, state)=>{
            if(mutation.type === "notifikasi/SHOW_MESSAGE"){
                this.message = state.notifikasi.message
                this.color = state.notifikasi.color
                this.timeout = state.notifikasi.timeout
                this.show = true
                this.top = state.notifikasi.top
                this.right = state.notifikasi.right
                this.bottom = state.notifikasi.bottom
                this.left = state.notifikasi.left
            }
        })
    }
}
</script>