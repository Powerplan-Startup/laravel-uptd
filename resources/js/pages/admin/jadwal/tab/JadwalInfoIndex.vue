<template>
    <v-card color="grey lighten-5 overflow-hidden mt-3" rounded="xl" flat>
        <v-card-text>
            <template v-for="(pert, i) in item.jadwals">
                <v-list-item :key="pert.id_jadwal">
                    <v-list-item-icon>
                        <v-icon>mdi-calendar</v-icon>
                    </v-list-item-icon>
                    <v-list-item-content>
                        <v-list-item-subtitle>
                            Pertemuan ke-{{ i+1 }}
                        </v-list-item-subtitle>
                        <v-list-item-title class="">
                            {{ `${pert.tanggal}` | date }} | {{ pert.waktu }} - {{ pert.waktu_berakhir }}
                        </v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item link :href="pert.materi_url" target="_blank" :key="`materi-${pert.id_jadwal}`" v-if="pert.materi">
                    <v-list-item-icon>
                        <v-icon>mdi-download</v-icon>
                    </v-list-item-icon>
                    <v-list-item-content>
                        <v-list-item-subtitle>
                            Materi
                        </v-list-item-subtitle>
                        <v-list-item-title class="">
                            Unduh materi
                        </v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item :key="`materi-${pert.id_jadwal}`" v-else>
                    <v-list-item-icon>
                        <v-icon>mdi-timer-sand-empty</v-icon>
                    </v-list-item-icon>
                    <v-list-item-content>
                        <v-list-item-subtitle>
                            Materi belum di unggah Instruktur
                        </v-list-item-subtitle>
                    </v-list-item-content>
                </v-list-item>
            </template>
            <v-divider/>
            <v-list-item>
                <v-list-item-icon>
                    <v-icon>mdi-calendar</v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                    <v-list-item-subtitle>
                        Terakhir Diubah
                    </v-list-item-subtitle>
                    <v-list-item-title class="">
                        {{ item.updated_at | datetime }}
                    </v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </v-card-text>
    </v-card>
</template>
<script>
import { mapActions, mapGetters } from 'vuex'
export default {
    props: {
        item: Object
    },
    computed: {
        /**
         * get id from params id_jadwal
         * 
         */
        id: function () {
            return this.$route.params.id_jadwal
        },
        ...mapGetters({
        })
    },
    methods: {
        ...mapActions({
        }),
    }
}
</script>