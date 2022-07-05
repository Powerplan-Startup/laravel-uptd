<template>
    <div class="pa-md-3">
        <v-card color="white" rounded="xl" class="mb-3 shadow-sm">
            <v-breadcrumbs :items="breadcrumb"></v-breadcrumbs>
        </v-card>
        <v-card class="shadow-sm" rounded="xl">
            <v-card-text class="d-flex">
                <v-text-field type="search" hide-details rounded dense placeholder="Temukan..." v-model="search"/>
            </v-card-text>
            <paket-table
                :headers="headers"
                :items="items"
                :options="options"
                :total="total"
                :loading="loading"
                v-model="selected"
                @update:options="options = $event"
                @update="update"
                @rowClick="toInfoPaket"
                @editRow="ubahInfoPaket"
                @deleteRow="hapusInfoPaket"
                :small="small"
                :no-select="noSelect"/>
            <slot v-bind:update="update"></slot>
        </v-card>
    </div>
</template>
<script>
import { mapActions } from 'vuex'
import PaketTable from '../datatable/PaketTable.vue'
export default {
    props: {
        dataSession: String|Number,
        params: Object,
        small: Boolean,
        noSelect: Boolean,
    },
    components: {
        PaketTable
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
                    text: 'Paket',
                    disabled: false,
                    to: {name: 'paket'},
                    link: true,
                    exact: true,
                },
                {
                    text: 'List Paket',
                    disabled: true,
                },
            ],
            items: [],
            headers: [
                { text: null, align: 'start', sortable: false, value: 'id_paket' },
                { text: 'Tahun', align: 'start', sortable: true, value: 'tahun' },
                { text: 'Kejuruan', align: 'start', sortable: true, value: 'id_kejuruan' },
                { text: 'Paket', align: 'start d-none d-sm-table-cell', sortable: true, value: 'paket' },
                { text: 'Instruktur', align: 'start d-none d-sm-table-cell', sortable: true, value: 'nip' },
                { text: 'Pendaftaran', align: 'start d-none d-sm-table-cell', sortable: true, value: 'tanggal_daftar_mulai' },
                { text: 'Penutupan', align: 'start d-none d-sm-table-cell', sortable: true, value: 'tanggal_daftar_selesai' },
                // { text: 'Dibuat pada', align: 'end d-none d-sm-table-cell', sortable: true, value: 'created_at' },
                { text: null, align: '', sortable: false, value: 'action' },
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
            getItems: 'paket/get',
            notif: 'notifikasi/show',
            showUbahDialog: 'paket/setModalUbah',
            showHapusDialog: 'paket/setModalHapus',
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
            this.$emit('open:paket:info', e)
        },
        editRow(e){

        },
        clickEvent(t, d){
            this.$emit(t, d)
        },
        ubahInfoPaket({id_paket: id}){
            this.showUbahDialog({id, value: true})
        },
        hapusInfoPaket({id_paket: id}){
            this.showHapusDialog({id, value: true})
        },
        toInfoPaket({id_paket}){
            this.$router.push({ name: 'paket.show', params: { id_paket } })
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