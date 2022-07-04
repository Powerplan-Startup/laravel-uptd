<template>
    <v-card color="grey lighten-5 overflow-hidden mt-3" rounded="xl" flat>
        <v-card-title>
            {{ item.judul }}
        </v-card-title>
        <v-card-text v-html="item.isi"/>
    </v-card>
</template>
<script>
export default {
    props: {
        item: Object
    }
}
</script>