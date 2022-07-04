<template>
    <div>
        <div class="d-grid-form">
            <v-text-field
                dense
                outlined
                v-model="item.nama"
                name="nama"
                label="Nama Pimpinan"
                :error-messages="errors.nama"
                @keyup="errors.nama = null"
                counter="50"/>
            <v-text-field
                dense
                outlined
                v-model="item.username"
                name="username"
                label="Username Pimpinan"
                :error-messages="errors.username"
                @keyup="errors.username = null"
                counter="30"/>
            <template v-if="!noPassword">
                <v-text-field
                    dense
                    outlined
                    v-model="item.password"
                    name="password"
                    label="Password Pimpinan"
                    :error-messages="errors.password"
                    @keyup="errors.password = null"
                    type="password"/>
                <v-text-field
                    dense
                    outlined
                    v-model="item.password_confirmation"
                    name="password_confirmation"
                    label="Ulangi Password"
                    :error-messages="errors.password_confirmation"
                    @keyup="errors.password_confirmation = null"
                    type="password"/>
            </template>
        </div>
    </div>
</template>
<script>
export default {
    components: { },
    props: {
        errors: Object,
        noPassword: Boolean,
        value: {
            type: Object,
            default: ()=>{
                return {
                    nama_guru: null,
                    nip: null,
                    alamat: null,
                }
            }
        },
        kategori: {
            type: Object
        }
    },
    computed: {
        item: {
            get(){
                return this.value
            },
            set(val){
                this.$emit('input', val)
            },
        },
        is_pengumuman(){
            return this.kategori && this.kategori.nama_kategori.toLocaleLowerCase() == 'pengumuman'
        }
    },
    data() {
        return {
			modal_tanggal_lahir: false,
        };
    },
    methods: {}
};
</script>
