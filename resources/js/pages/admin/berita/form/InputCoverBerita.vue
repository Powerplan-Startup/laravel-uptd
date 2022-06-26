<template>
    <div>
        <v-slide-y-reverse-transition mode="out-in">
            <div class="d-flex pb-10" v-if="imgdata" key="1">
                <div class="d-flex justify-center" style="position: relative; width: 100%">
                    <img :src="imgdata" alt="" :style="imgStyle" class="rounded-lg img-transition">
                    <v-btn fab bottom absolute dark small @click.prevent="small = !small" type="button">
                        <v-icon light v-text="small ? 'mdi-fullscreen' : 'mdi-fullscreen-exit'"/>
                    </v-btn>
                </div>
            </div>
            <div class="d-flex pb-10" v-else-if="data_cover" key="2">
                <div class="d-flex justify-center" style="position: relative; width: 100%">
                    <v-scroll-y-transition mode="out-in">
                        <v-img
                            :lazy-src="data_cover" 
                            :src="data_cover"
                            :alt="data_cover" 
                            class="rounded-lg"
                            :key="small"
                            max-height="400"
                            max-width="100%">
                            <template v-slot:placeholder>
                                <v-row
                                    class="fill-height ma-0"
                                    align="center"
                                    justify="center">
                                    <v-progress-circular
                                        indeterminate
                                        color="grey lighten-5"></v-progress-circular>
                                </v-row>
                            </template>    
                        </v-img>
                    </v-scroll-y-transition>
                </div>
            </div>
            <div class="d-flex pb-10" v-else key="3">
                <div class="d-flex justify-center" style="position: relative; width: 100%">
                    <v-card class="rounded-lg" color="grey lighten-2" flat style="width: 100%; min-height: 200px">
                        <v-card-text class="pa-10">
                            <v-icon large dark>mdi-image</v-icon>
                        </v-card-text>
                    </v-card>
                </div>
            </div>
        </v-slide-y-reverse-transition>
        <v-file-input
            accept="image/png, image/jpeg, image/bmp"
            append-icon="mdi-camera"
            prepend-icon=""
            label="Latar Berita"
            v-model="item.cover_input"
            @change="this.$emit('change', 'cover')"
            :error-messages="errors.cover"
            v-bind="$attrs"
            outlined
            dense
            show-size
            name="cover"/>
    </div>
</template>
<script>
export default {
    props: {
        errors: Object,
        value: Object,
        cover: String|Object
    },
    data(){
        return {
            imgdata: null,
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
        },
        data_cover(){
            return this.cover 
                ? this.cover
                : this.item.cover_url 
                    ? this.item.cover_url
                    : null
        }
    },
    methods: {
        getImage(){
            if(this.item.cover_input){
                let reader = new FileReader();
                reader.onload = e =>{
                    this.imgdata = reader.result;
                }
                reader.readAsDataURL(this.item.cover_input);
                return
            }
            this.imgdata = null;
        }
    },
    watch: {
        'value.cover_input': function(val){
            this.getImage()
        }
    }
}
</script>