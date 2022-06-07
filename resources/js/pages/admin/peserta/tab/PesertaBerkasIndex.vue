<template>
    <v-card color="grey lighten-5 overflow-hidden mt-3" rounded="xl" flat>
        <v-card-text>
            <v-list-item>
                <v-list-item-content>
                    <v-list-item-title class="">
                        KTP
                    </v-list-item-title>
                    <v-list-item-subtitle>
                        Lihat KTP
                    </v-list-item-subtitle>
                </v-list-item-content>
                <v-list-item-action>
                    <v-btn link icon :href="`/storage/${item.ktp}`" target="_blank">
                        <v-icon>mdi-chevron-right</v-icon>
                    </v-btn>
                </v-list-item-action>
            </v-list-item>
            <v-card-text>
                <v-img :src="`/storage/${item.ktp}`" class="elevation-2 rounded"></v-img>
            </v-card-text>
            
            <v-list-item>
                <v-list-item-content>
                    <v-list-item-title class="">
                        Foto
                    </v-list-item-title>
                    <v-list-item-subtitle>
                        Lihat Foto
                    </v-list-item-subtitle>
                </v-list-item-content>
                <v-list-item-action>
                    <v-btn link icon :href="`/storage/${item.foto}`" target="_blank">
                        <v-icon>mdi-chevron-right</v-icon>
                    </v-btn>
                </v-list-item-action>
            </v-list-item>
            <v-card-text>
                <v-img :src="`/storage/${item.foto}`" class="elevation-2 rounded"></v-img>
            </v-card-text>

            <v-list-item>
                <v-list-item-content>
                    <v-list-item-title class="">
                        Ijazah
                    </v-list-item-title>
                    <v-list-item-subtitle>
                        Lihat Ijazah
                    </v-list-item-subtitle>
                </v-list-item-content>
                <v-list-item-action>
                    <v-btn link icon :href="`/storage/${item.ijazah}`" target="_blank">
                        <v-icon>mdi-chevron-right</v-icon>
                    </v-btn>
                </v-list-item-action>
            </v-list-item>
            <v-card-text>
                <v-img :src="`/storage/${item.ijazah}`" class="elevation-2 rounded"></v-img>
            </v-card-text>

            <v-list-item>
                <v-list-item-content>
                    <v-list-item-title class="">
                        Kartu Vaksin
                    </v-list-item-title>
                    <v-list-item-subtitle>
                        Lihat Kartu Vaksin
                    </v-list-item-subtitle>
                </v-list-item-content>
                <v-list-item-action>
                    <v-btn link icon :href="`/storage/${item.kartu_vaksin}`" target="_blank">
                        <v-icon>mdi-chevron-right</v-icon>
                    </v-btn>
                </v-list-item-action>
            </v-list-item>
            <v-card-text>
                <v-img :src="`/storage/${item.kartu_vaksin}`" class="elevation-2 rounded"></v-img>
            </v-card-text>

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