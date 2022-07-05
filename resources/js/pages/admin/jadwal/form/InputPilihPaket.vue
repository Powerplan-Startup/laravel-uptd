<template>
    <v-autocomplete
        v-model="paket"
        :name="name"
        :items="items_named"
        :loading="loading"
        :search-input.sync="search"
        :item-text="itemText"
        item-value="id_paket"
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
        label: { default: "Pilih Paket" },
        itemText: { default: 'nama' },
        name: { default: 'id_paket' },
    },
    computed: {
        paket: {
            get(){ return this.value },
            set(val){ 
                this.$emit('input', val)
            },
        },
        data_paket(){
            const r = RegExp(this.search)
            return this.items_named.filter(it => r.test(it.nama) )
        },
        search: {
            get(){ return this.query },
            set(value, old){
                this.query = value
                if(!value) return
                if(this.data_paket.length > 0) return
                if(this.loading) return
                this.loadItems()
            }
        },
        items_named(){
            return this.items.map(e => ({
                ...e, nama: `Kejuruan ${e.kejuruan.nama_kejuruan} tahun ${e.tahun} paket ${e.paket}`
            }));
        }
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
            getItem: 'paket/get',
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