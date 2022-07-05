<template>
    <v-autocomplete
        v-model="kejuruan"
        :name="name"
        :items="items"
        :loading="loading"
        :search-input.sync="search"
        :item-text="itemText"
        item-value="nip"
        :label="label"
        required
		dense
        outlined
        v-bind="$attrs"
        persistent-hint
        :error-messages="errors[name]"
        @change="errors[name] = []"/>
    
</template>
<script>
import { mapState, mapGetters, mapActions, mapMutations } from 'vuex'
export default {
    props: {
        value: String|Number,
        errors: { required: true },
        label: { default: "Pilih Instruktur" },
        itemText: { default: 'nama' },
        name: { default: 'nip' },
    },
    computed: {
        kejuruan: {
            get(){ return this.value },
            set(val){ 
                this.$emit('input', val)
            },
        },
        data_kejuruan(){
            const r = RegExp(this.search)
            return this.items.filter(it => r.test(it.nama) )
        },
        search: {
            get(){ return this.query },
            set(value, old){
                this.query = value
                if(!value) return
                if(this.data_kejuruan.length > 0) return
                if(this.loading) return
                this.loadItems()
            }
        },
    },
    data(){
        return {
            items: [],
            query: '',
            loading: false,
            total: 0,
        }
    },
    methods: {
        ...mapActions({
            getItem: 'instruktur/get',
        }),
        async loadItems(){
            this.loading = true
            let res = await this.getItem({
                search: this.query,
            }).catch(e => {
                this.loading = false
            })
            this.loading = false
            if(res?.data?.data){
                this.items = res.data.data
            }
        }
    },
    watch: {},
    created(){
        this.loadItems()
    }
}
</script>