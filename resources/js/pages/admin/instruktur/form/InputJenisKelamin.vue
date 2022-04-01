<template>
    <v-select
        :items="items"
        label="Jenis Kelamin"
        v-model="jenis_kelamin"
        item-text="text"
        item-value="value"
        clearable
        dense
        outlined
        :error-messages="errors.jenis_kelamin"
        name="jenis_kelamin"/>
</template>
<script>
import { mapState } from 'vuex'
export default {
    props: {
        value: { required: true },
        errors: Object,
    },
    computed: {
        ...mapState({
            items: state => state.jenis_kelamin.items
        }),
        jenis_kelamin: {
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