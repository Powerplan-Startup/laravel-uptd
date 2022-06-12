<template>
    <div class="rowspan-3">
        <v-scale-transition group mode="out-in">
            <div v-if="item.input_foto" class="mb-3" key="local">
                <v-card flat outlined rounded="lg">
                    <v-list>
                        <v-list-item>
                            <v-list-item-avatar>
                            </v-list-item-avatar>
                            <v-list-item-content>
                                <v-list-item-title>
                                    {{ item.input_foto.name }}
                                </v-list-item-title>
                                <v-list-item-subtitle>
                                    {{ item.input_foto.size }}byte
                                </v-list-item-subtitle>
                            </v-list-item-content>
                        </v-list-item>
                    </v-list>
                </v-card>
            </div>
            <div v-else class="mb-3" key="empty">
                <v-card outlined flat rounded="lg">
                    <v-list>
                        <v-list-item>
                            <v-list-item-avatar color="grey lighten-4">
                                <v-icon>mdi-plus</v-icon>
                            </v-list-item-avatar>
                            <v-list-item-content>
                                <v-list-item-title>
                                    Pilih Berkas
                                </v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                    </v-list>
                </v-card>
            </div>
        </v-scale-transition>
        <v-file-input
            accept="image/jpg, image/jpeg, image/bmp, image/png"
            prepend-icon="mdi-file"
            label="Foto"
            v-model="item.input_foto"
            @change="errors.foto = []"
            :error-messages="errors.foto"
            v-bind="$attrs"
            outlined
            dense
            name="foto"/>
    </div>
</template>
<script>
import { mapActions } from 'vuex'
export default {
    props: {
        errors: { required: true },
        value: { required: true },
    },
    data(){
        return {
            filedata: null,
            small: false,
        }
    },
    computed: {
        item: {
            get(){
                return this.value
            },
            set(val){ this.$emit('input', val) }
        },
        imgStyle(){
            return [
                {
                    'max-width': this.small ? '200px' : '100%',
                    width: '100%'
                }
            ]
        }
    },
    methods: {
        // getImage(){
        //     if(this.item.input_foto){
        //         let reader = new FileReader();
        //         reader.onload = e =>{
        //             this.filedata = reader.result;
        //         }
        //         reader.readAsDataURL(this.item.input_foto);
        //         return
        //     }
        //     this.filedata = null;
        // },
    },
    watch: {
        'value.input_foto': function(val){
            // this.getImage()
        }
    }
}
</script>