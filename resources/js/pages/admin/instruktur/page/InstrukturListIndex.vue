<template>
    <div class="pa-md-3">
        <v-card color="white" rounded="xl" class="mb-3 shadow-sm">
            <v-breadcrumbs :items="breadcrumb"></v-breadcrumbs>
        </v-card>
        <v-card class="shadow-sm" rounded="xl">
            <v-card-text class="d-flex">
                <v-text-field type="search" hide-details rounded dense placeholder="Temukan..." v-model="search"/>
            </v-card-text>
            <instruktur-table
                :headers="headers"
                :items="items"
                :options="options"
                :total="total"
                :loading="loading"
                v-model="selected"
                @update:options="options = $event"
                @update="update"
                @rowClick="toInfoInstruktur"
                @editRow="ubahInfoInstruktur"
                @deleteRow="hapusInfoInstruktur"
                :small="small"
                :no-select="noSelect"/>
            <slot v-bind:update="update"></slot>
        </v-card>
    </div>
</template>
<script>
import { mapActions } from 'vuex'
import InstrukturTable from '../datatable/InstrukturTable.vue'
export default {
    props: {
        dataSession: String|Number,
        params: Object,
        small: Boolean,
        noSelect: Boolean,
    },
    components: {
        InstrukturTable
    },
    data(){
        return {
            breadcrumb: [
                {
                    text: 'Panel Admin',
                    disabled: false,
                    to: {name: 'admin'},
                    link: true,
                    exact: true,
                },
                {
                    text: 'Instruktur',
                    disabled: false,
                    to: {name: 'instruktur'},
                    link: true,
                    exact: true,
                },
                {
                    text: 'List Instruktur',
                    disabled: true,
                },
            ],
            items: [],
            headers: [
                { text: 'NIP', align: 'start', sortable: true, value: 'nip' },
                { text: 'Nama Instruktur', align: 'start', sortable: true, value: 'nama' },
                { text: 'Telepon', align: 'start d-none d-sm-table-cell', sortable: true, value: 'no_hp' },
                { text: 'Alamat', align: 'end d-none d-sm-table-cell', sortable: true, value: 'alamat' },
                // { text: 'Dibuat pada', align: 'end d-none d-sm-table-cell', sortable: true, value: 'created_at' },
                { text: null, align: '', sortable: true, value: 'action' },
            ],
            options: {
                page: 1,
                itemsPerPage: 10,
                sortBy: ['created_at'],
                sortDesc: [true],
                groupBy: [],
                groupDesc: [],
                mustSort: false,
                multiSort: false,
            },
            selected: [],
            total: 0,
            search: '',
            loading: false,
            view: 'table',
            snackbar: {
                status: true,
                message: "Error!",
            },
            lazyTransition: null,
        }
    },
    computed: {
    },
    methods: {
        ...mapActions({
            getItems: 'instruktur/get',
            notif: 'notifikasi/show',
            showUbahDialog: 'instruktur/setModalUbah',
            showHapusDialog: 'instruktur/setModalHapus',
        }),
        async loadItems(){
            this.loading = true
            let res = await this.getItems({...this.options, search: this.search, ...this.params }).catch(e => {});
            this.loading = false
            if(res){
                this.items = res.data.data
                let meta = res.data.meta
                this.options = {
                    ...this.options,
                    page: parseInt(meta.current_page),
                    itemsPerPage: parseInt(meta.per_page),
                    mustSort: false,
                    multiSort: false,
                }
                this.total = parseInt(meta.total)
            }
        },
        update(){
            this.loadItems()
        },
        lazy(callback){
            if(this.lazyTransition)
                clearTimeout(this.lazyTransition);
            this.lazyTransition = setTimeout(()=>{
                callback();
                this.lazyTransition = null;
            }, 800);
        },
        rowClick(e){
            this.$emit('open:instruktur:info', e)
        },
        editRow(e){

        },
        clickEvent(t, d){
            this.$emit(t, d)
        },
        ubahInfoInstruktur({nip: id}){
            this.showUbahDialog({id, value: true})
        },
        hapusInfoInstruktur({nip: id}){
            this.showHapusDialog({id, value: true})
        },
        toInfoInstruktur({nip}){
            this.$router.push({ name: 'instruktur.show', params: { nip } })
        },
    },
    watch: {
        search(val, old){
            if(val != old)
                this.lazy(_=>this.loadItems())
        },
        dataSession(val, old){
            this.update()
        }
    },
    created(){}
}
</script>