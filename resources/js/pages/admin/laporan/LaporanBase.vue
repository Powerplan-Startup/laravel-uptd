<template>
    <div>
        <router-view/>
    </div>
</template>
<script>
import { mapGetters } from 'vuex'
export default {
    components: { 
    },
    computed: {
        ...mapGetters({
            // isPimpinan: 'login/isPimpinan'
        })
    }
}
</script>