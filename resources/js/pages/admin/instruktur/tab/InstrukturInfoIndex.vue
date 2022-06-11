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
            <v-list-item link :href="item.materi_url" target="_blank">
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
         * get id from params nip
         * 
         */
        id: function () {
            return this.$route.params.nip
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