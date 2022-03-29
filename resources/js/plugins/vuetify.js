import Vue from 'vue'
import Vuetify from 'vuetify'
import colors from 'vuetify/lib/util/colors';

Vue.use(Vuetify);

const opts = { 
    customVariables: ['./sass/_variables.scss'],
    treeShake: true,
    theme: {
        options: {
            customProperties: true,
        },
        themes: {
            light: {
                primary: colors.indigo,
                secondary: colors.indigo.accent3,
                accent: colors.cyan.darken1,
                error: colors.pink.accent3,
                info: colors.blue.accent3,
                success: colors.teal.darken1,
            },
            dark: {
                // background: colors.blueGrey.base,
                // primary: '#1976D2',
                // secondary: '#424242',
                // accent: '#82B1FF',
                // error: '#FF5252',
                // info: '#2196F3',
                // success: '#4CAF50',
                // warning: '#FFC107',
            },
        }
    } 
}

export default new Vuetify(opts)