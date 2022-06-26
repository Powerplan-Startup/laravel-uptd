<template>
    <v-select
        :items="items"
        label="Publikasi Berita"
        v-model="terbit"
        item-text="text"
        item-value="value"
        clearable
        dense
        outlined
        :error-messages="errors.terbit"
        name="terbit"/>
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
            items: state => state.terbit.items
        }),
        terbit: {
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