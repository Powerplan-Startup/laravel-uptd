<template>
    <v-data-table
        :headers="headers"
        :items="items"
        :options.sync="mOptions"
        :server-items-length="total"
        :loading="loading"
        @update:options="update($event)"
        fixed-header
        :footer-props="{'items-per-page-options':[5, 10, 20, 30, 50, 100]}"
        :item-class="(item)=>{ return `hover-activator ${ item.id == currentId ? ' ' : null }` }"
        :show-select="!noSelect"
        single-select
        v-model="selected"
        :mobile-breakpoint="0">
        <template #item.id_jadwal="{item}">
            <a href="#" class="d-block py-1" @click.prevent="rowClick(item)">
                <div class="mb-1">
                    #{{ item.id_jadwal }}
                </div>
            </a>
        </template>
        <template #item.id_kejuruan="{item}">
            <div v-if="item.paket">
                {{ item.paket.kejuruan.nama_kejuruan }}
            </div>
        </template>
        <template #item.nip="{item}">
            <v-list-item-content v-if="item.instruktur">
                <v-list-item-title>
                    {{ item.instruktur.nama }}
                </v-list-item-title>
                <v-list-item-subtitle>
                    NIP.{{ item.nip }}
                </v-list-item-subtitle>
            </v-list-item-content>
        </template>
        <template #item.created_at="{item}">
			{{ item.created_at | datetime }}
        </template>
        <template #item.tanggal="{item}">
			{{ item.tanggal | date }}
        </template>
        <template #item.action="{item}">
			<div class="d-flex justify-end">
				<v-slide-x-transition mode="out-in">
					<v-card
						:key="item.id == currentId"
						flat
						rounded="pill"
						class="pa-1 d-flex shadow flex-no-wrap justify-center my-2"
						dark>
                        <template>
                            <v-btn icon color="error darken-1" @click="deleteRow(item)">
                                <v-icon small>mdi-delete</v-icon>
                            </v-btn>
                            <v-btn icon @click="editRow(item)">
                                <v-icon small>mdi-pencil</v-icon>
                            </v-btn>
                        </template>
						<v-btn icon @click="rowClick(item)">
							<v-icon small>mdi-chevron-right</v-icon>
						</v-btn>
					</v-card>
				</v-slide-x-transition>
			</div>
        </template>
    </v-data-table>
</template>
<script>
import { mapActions, mapGetters } from 'vuex'
export default {
    props: {
        headers: Array,
        items: Array,
        options: Object,
        total: Number,
        loading: Boolean,
        currentId: Number|String,
        value: Array,
        small: Boolean,
        noSelect: Boolean,
    },
    computed: {
        mOptions: {
            get(){ return this.options },
            set(val){ this.$emit('update:options', val) }
        },
        selected: {
            get(){ return this.value },
            set(val){ this.$emit('input', val) }
        },
        ...mapGetters({
        })
    },
    methods: {
        update(e){
            this.$emit('update', e)
        },
        rowClick(e){
            this.$emit('rowClick', e)
        },
        editRow(e){
            this.$emit('editRow', e)
        },
        deleteRow(e){
            this.$emit('deleteRow', e)
        },
        clickEvent(t, d){
            this.$emit(t, d)
        },
    },
    filters: {
        sub(val, len){
            if(val)
                return val.substr(0, len);
            return null
        },
    },
}
</script>
<style lang="scss" scoped>
    .hover-activator{
        &:hover{
            & .hover-default{
                display: none;
            }
            & .hover-target{
                display: block;
            }
        } 
        .hover-target{
            display: none;
        }
    }
</style>