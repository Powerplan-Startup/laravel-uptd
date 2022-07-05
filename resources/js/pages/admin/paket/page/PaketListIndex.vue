<template>
    <div class="pa-md-3">
        <v-card color="white" rounded="xl" class="mb-3 shadow-sm">
            <v-breadcrumbs :items="breadcrumb"></v-breadcrumbs>
        </v-card>
        <v-card class="shadow-sm" rounded="xl">
            <v-card-text class="d-flex">
                <v-text-field type="search" hide-details rounded dense placeholder="Temukan..." v-model="search"/>
            </v-card-text>
            <jadwal-table
                :headers="headers"
                :items="items"
                :options="options"
                :total="total"
                :loading="loading"
                v-model="selected"
                @update:options="options = $event"
                @update="update"
                @rowClick="toInfoJadwal"
                @editRow="ubahInfoJadwal"
                @deleteRow="hapusInfoJadwal"
                :small="small"
                :no-select="noSelect"/>
            <slot v-bind:update="update"></slot>
        </v-card>
    </div>
</template>
<script>
import { mapActions } from 'vuex'
import JadwalTable from '../datatable/PaketTable.vue'
export default {
    props: {
        dataSession: String|Number,
        params: Object,
        small: Boolean,
        noSelect: Boolean,
    },
    components: {
        JadwalTable
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
                    text: 'Jadwal',
                    disabled: false,
                    to: {name: 'jadwal'},
                    link: true,
                    exact: true,
                },
                {
                    text: 'List Jadwal',
                    disabled: true,
                },
            ],
            items: [],
            headers: [
                { text: null, align: 'start', sortable: false, value: 'id_jadwal' },
                { text: 'Kejuruan', align: 'start', sortable: true, value: 'id_kejuruan' },
                { text: 'Instruktur', align: 'start d-none d-sm-table-cell', sortable: true, value: 'nip' },
                { text: 'Judul', align: 'start d-none d-sm-table-cell', sortable: true, value: 'judul' },
                { text: 'Tanggal', align: 'end d-none d-sm-table-cell', sortable: true, value: 'tanggal' },
                { text: 'jam', align: 'end d-none d-sm-table-cell', sortable: true, value: 'waktu' },
                { text: 'Selesai', align: 'end d-none d-sm-table-cell', sortable: true, value: 'waktu_berakhir' },
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
            getItems: 'jadwal/get',
            notif: 'notifikasi/show',
            showUbahDialog: 'jadwal/setModalUbah',
            showHapusDialog: 'jadwal/setModalHapus',
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
            this.$emit('open:jadwal:info', e)
        },
        editRow(e){

        },
        clickEvent(t, d){
            this.$emit(t, d)
        },
        ubahInfoJadwal({id_jadwal: id}){
            this.showUbahDialog({id, value: true})
        },
        hapusInfoJadwal({id_jadwal: id}){
            this.showHapusDialog({id, value: true})
        },
        toInfoJadwal({id_jadwal}){
            this.$router.push({ name: 'jadwal.show', params: { id_jadwal } })
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