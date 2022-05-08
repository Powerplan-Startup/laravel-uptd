<template>
    <v-select
        :items="items"
        label="Status Peserta"
        v-model="status_peserta"
        item-text="text"
        item-value="value"
        clearable
        dense
        outlined
        :error-messages="errors.status_peserta"
        name="status_peserta"/>
</template>
<script>
import { mapState } from 'vuex'
export default {
    props: {
        value: { required: true },
        errors: Object,
    },
    data(){
        return {
            items: [
                'aktif', 'tidak_aktif', 'calon', 'alumni'
            ]
        }
    },
    computed: {
        status_peserta: {
            get(){
                return this.value
            },
            set(val){
                this.$emit('input', val)
            }
        },
    },
}
</script>