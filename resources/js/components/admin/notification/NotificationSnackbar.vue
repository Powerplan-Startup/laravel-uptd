<template>
    <v-snackbar
        v-model="snackbar"
        multi-line
        :timeout="timeout"
        :color="color"
        app
        v-bind="$attrs"
        :top="top"
        :right="right"
        :left="left"
        :bottom="bottom">
        {{ message }}
        <template v-slot:action="{ attrs }">
            <v-btn
                :color="actioncolor"
                text
                v-bind="attrs"
                @click="snackbar = false">
                Tutup
            </v-btn>
        </template>
    </v-snackbar>
</template>
<script>
export default {
    props: {
        value: { required: true },
        message: { type: String|Number },
        color: { default: 'black' },
        actioncolor: { default: null },
        timeout: { default: 10000 },
        bottom: Boolean,
        left: Boolean,
        right: Boolean,
        top: Boolean,
    },
    computed: {
        snackbar: {
            get(){ return this.value },
            set(val){ this.$emit('input', val) },
        }
    }
    
}
</script>