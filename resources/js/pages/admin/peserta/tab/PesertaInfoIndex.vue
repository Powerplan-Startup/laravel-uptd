<template>
    <div>
        <v-card color="grey lighten-5 overflow-hidden mt-3" rounded="xl" flat v-if="item.paket">
            <v-card-text>
                <v-list-item>
                    <v-list-item-icon>
                    </v-list-item-icon>
                    <v-list-item-content>
                        <v-list-item-subtitle>
                            Paket
                        </v-list-item-subtitle>
                        <v-list-item-title class="">
                            Kejuruan {{item.paket.kejuruan.nama_kejuruan}} tahun {{item.paket.tahun}} paket {{item.paket.paket}}
                        </v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-card-text>
        </v-card>
        <v-card color="grey lighten-5 overflow-hidden mt-3" rounded="xl" flat>
            <v-card-text>
                <v-list-item>
                    <v-list-item-icon>
                    </v-list-item-icon>
                    <v-list-item-content>
                        <v-list-item-subtitle>
                            Umur
                        </v-list-item-subtitle>
                        <v-list-item-title class="">
                            {{ item.umur }} Tahun
                        </v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item>
                    <v-list-item-icon>
                    </v-list-item-icon>
                    <v-list-item-content>
                        <v-list-item-subtitle>
                            Alamat
                        </v-list-item-subtitle>
                        <v-list-item-title class="">
                            {{ item.alamat }}
                        </v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item>
                    <v-list-item-icon>
                    </v-list-item-icon>
                    <v-list-item-content>
                        <v-list-item-subtitle>
                            Email
                        </v-list-item-subtitle>
                        <v-list-item-title class="">
                            {{ item.email }}
                        </v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item>
                    <v-list-item-icon>
                    </v-list-item-icon>
                    <v-list-item-content>
                        <v-list-item-subtitle>
                            Telepon
                        </v-list-item-subtitle>
                        <v-list-item-title class="">
                            {{ item.no_hp }}
                        </v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item>
                    <v-list-item-icon>
                    </v-list-item-icon>
                    <v-list-item-content>
                        <v-list-item-subtitle>
                            Agama
                        </v-list-item-subtitle>
                        <v-list-item-title class="">
                            {{ item.agama }}
                        </v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item>
                    <v-list-item-icon>
                    </v-list-item-icon>
                    <v-list-item-content>
                        <v-list-item-subtitle>
                            Pendidikan Terakhir
                        </v-list-item-subtitle>
                        <v-list-item-title class="">
                            {{ item.pendidikan_terakhir | pendidikan_terakhir }}
                        </v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item>
                    <v-list-item-icon>
                    </v-list-item-icon>
                    <v-list-item-content>
                        <v-list-item-subtitle>
                            Instruktur
                        </v-list-item-subtitle>
                        <v-list-item-title class="" v-if="item.paket">
                            {{ item.paket.instruktur.nama}}
                        </v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item>
                    <v-list-item-icon>
                    </v-list-item-icon>
                    <v-list-item-content>
                        <v-list-item-subtitle>
                            NIP Instruktur
                        </v-list-item-subtitle>
                        <v-list-item-title class="" v-if="item.paket">
                            {{ item.paket.instruktur.nip}}
                        </v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item>
                    <v-list-item-icon>
                    </v-list-item-icon>
                    <v-list-item-content>
                        <v-list-item-subtitle>
                            Angkatan
                        </v-list-item-subtitle>
                        <v-list-item-title class="">
                            {{ item.angkatan}}
                        </v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item>
                    <v-list-item-icon>
                    </v-list-item-icon>
                    <v-list-item-content>
                        <v-list-item-subtitle>
                            Status Peserta
                        </v-list-item-subtitle>
                        <v-list-item-title class="">
                            {{ item.status_peserta}}
                        </v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
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
    </div>
</template>
<script>
import { mapActions, mapGetters } from 'vuex'
export default {
    props: {
        item: Object
    },
    computed: {
        /**
         * get id from params id_peserta
         * 
         */
        id: function () {
            return this.$route.params.id_peserta
        },
        ...mapGetters({
        })
    },
    methods: {
        ...mapActions({
        }),
    },
    filters: {
        pendidikan_terakhir(val){
            switch(val){
                case '1':
                default:
                    return "SD";
                case '2':
                    return "SMP";
                case '3':
                    return "SMA-SMK";
                case '4':
                    return "D1";
                case '5':
                    return "D2";
                case '6':
                    return "D3";
                case '7':
                    return "D4";
                case '8':
                    return "S2";
                case '9':
                    return "S3";
            }
        }
    }
}
</script>