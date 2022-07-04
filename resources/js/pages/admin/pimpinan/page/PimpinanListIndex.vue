<template>
    <div class="pa-md-3">
        <v-card color="white" rounded="xl" class="mb-3 shadow-sm" v-if="!noBreadcrumb">
            <v-breadcrumbs :items="breadcrumb"></v-breadcrumbs>
        </v-card>
        <v-card class="shadow-sm" rounded="xl">
            <v-card-text class="d-flex">
                <v-text-field type="search" hide-details rounded dense placeholder="Temukan..." v-model="search"/>
            </v-card-text>
            <pimpinan-table
                :headers="headers"
                :items="items"
                :options="options"
                :total="total"
                :loading="loading"
                v-model="selected"
                @update:options="options = $event"
                @update="update"
                @rowClick="toInfoPimpinan"
                @editRow="ubahInfoPimpinan"
                @deleteRow="hapusInfoPimpinan"
                :small="small"
                :no-select="noSelect"/>
            <slot v-bind:update="update"></slot>
        </v-card>
    </div>
</template>
<script>
import { mapActions } from 'vuex'
import PimpinanTable from '../datatable/PimpinanTable.vue'
export default {
    props: {
        dataSession: String|Number,
        params: Object,
        small: Boolean,
        noSelect: Boolean,
        noBreadcrumb: Boolean,
        headers: {
            type: Array,
            default: () => {
                return [
                    { text: null, align: 'center', sortable: false, value: 'foto' },
                    { text: 'Nama', align: 'start', sortable: true, value: 'nama' },
                    { text: 'Username', align: 'start d-none d-sm-table-cell', sortable: true, value: 'username' },
                    { text: 'Email', align: 'end d-none d-sm-table-cell', sortable: true, value: 'email' },
                    { text: null, align: '', sortable: true, value: 'action' },
                ]
            }
        }
    },
    components: {
        PimpinanTable
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
                    text: 'Pimpinan',
                    disabled: false,
                    to: {name: 'pimpinan'},
                    link: true,
                    exact: true,
                },
                {
                    text: 'List Pimpinan',
                    disabled: true,
                },
            ],
            items: [],
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
            getItems: 'pimpinan/get',
            notif: 'notifikasi/show',
            showUbahDialog: 'pimpinan/setModalUbah',
            showHapusDialog: 'pimpinan/setModalHapus',
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
            this.$emit('open:pimpinan:info', e)
        },
        editRow(e){

        },
        clickEvent(t, d){
            this.$emit(t, d)
        },
        ubahInfoPimpinan({id: id}){
            this.showUbahDialog({id, value: true})
        },
        hapusInfoPimpinan({id: id}){
            this.showHapusDialog({id, value: true})
        },
        toInfoPimpinan({id}){
            this.$router.push({ name: 'pimpinan.show', params: { id } })
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