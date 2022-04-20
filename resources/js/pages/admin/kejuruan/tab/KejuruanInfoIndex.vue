<template>
    <v-card color="grey lighten-5 overflow-hidden mt-3" rounded="xl" flat>
        <v-card-text>
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
            <template v-if="item.jadwal">
                <v-subheader>
                    Jadwal
                </v-subheader>
                <v-list-item>
                    <v-list-item-icon>
                        <v-icon>mdi-calendar</v-icon>
                    </v-list-item-icon>
                    <v-list-item-content>
                        <v-list-item-subtitle>
                            Tanggal
                        </v-list-item-subtitle>
                        <v-list-item-title class="">
                            {{ item.jadwal.tanggal | date }}
                        </v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item>
                    <v-list-item-icon>
                        <v-icon>mdi-clock</v-icon>
                    </v-list-item-icon>
                    <v-list-item-content>
                        <v-list-item-subtitle>
                            Waktu
                        </v-list-item-subtitle>
                        <v-list-item-title class="">
                            {{ item.jadwal.waktu | time }}
                        </v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item>
                    <v-list-item-icon>
                        <v-icon>mdi-account-tie</v-icon>
                    </v-list-item-icon>
                    <v-list-item-content>
                        <v-list-item-subtitle>
                            Instruktur
                        </v-list-item-subtitle>
                        <v-list-item-title class="" v-if="item.jadwal.instruktur != null">
                            {{ item.jadwal.instruktur.nama }}
                        </v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item>
                    <v-list-item-icon>
                    </v-list-item-icon>
                    <v-list-item-content>
                        <v-list-item-subtitle>
                            NIP
                        </v-list-item-subtitle>
                        <v-list-item-title class="" v-if="item.jadwal.instruktur != null">
                            {{ item.jadwal.instruktur.nip }}
                        </v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </template>
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
         * get id from params id_kejuruan
         * 
         */
        id: function () {
            return this.$route.params.id_kejuruan
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