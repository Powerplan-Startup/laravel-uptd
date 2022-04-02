<template>
    <div class="pa-md-3">
        <v-card color="white" rounded="xl" class="mb-3 shadow-sm">
            <v-breadcrumbs :items="breadcrumb"></v-breadcrumbs>
        </v-card>
        <v-card class="shadow-sm" rounded="xl">
            <v-card-text class="d-flex">
                <v-text-field type="search" hide-details rounded dense placeholder="Temukan..." v-model="search"/>
            </v-card-text>
            <peserta-table
                :headers="headers"
                :items="items"
                :options="options"
                :total="total"
                :loading="loading"
                v-model="selected"
                @update:options="options = $event"
                @update="update"
                @rowClick="toInfoPeserta"
                @editRow="ubahInfoPeserta"
                @deleteRow="hapusInfoPeserta"
                :small="small"
                :no-select="noSelect"/>
            <slot v-bind:update="update"></slot>
        </v-card>
    </div>
</template>
<script>
import { mapActions } from 'vuex'
import PesertaTable from '../datatable/PesertaTable.vue'
export default {
    props: {
        dataSession: String|Number,
        params: Object,
        small: Boolean,
        noSelect: Boolean,
    },
    components: {
        PesertaTable
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
                    text: 'Peserta',
                    disabled: false,
                    to: {name: 'peserta'},
                    link: true,
                    exact: true,
                },
                {
                    text: 'List Peserta',
                    disabled: true,
                },
            ],
            items: [],
            headers: [
                { text: 'Nama Peserta', align: 'start', sortable: true, value: 'nama_peserta' },
                { text: 'Paket', align: 'start d-none d-sm-table-cell', sortable: true, value: 'paket' },
                { text: 'Jadwal', align: 'end d-none d-sm-table-cell', sortable: true, value: 'id_jadwal' },
                { text: 'Dibuat pada', align: 'end d-none d-sm-table-cell', sortable: true, value: 'created_at' },
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
            getItems: 'peserta/get',
            notif: 'notifikasi/show',
            showUbahDialog: 'peserta/setModalUbah',
            showHapusDialog: 'peserta/setModalHapus',
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
            this.$emit('open:peserta:info', e)
        },
        editRow(e){

        },
        clickEvent(t, d){
            this.$emit(t, d)
        },
        ubahInfoPeserta({id_peserta: id}){
            this.showUbahDialog({id, value: true})
        },
        hapusInfoPeserta({id_peserta: id}){
            this.showHapusDialog({id, value: true})
        },
        toInfoPeserta({id_peserta}){
            this.$router.push({ name: 'peserta.show', params: { id_peserta } })
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