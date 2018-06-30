<template>
    <div class="row">
        <grid-vue class="input-field" tamanho="12">
            <textarea v-model="postConteudo" id="textConteudo" class="materialize-textarea"></textarea>
            <label for="textConteudo">Que que pega?</label>
        </grid-vue>
        <p v-if="postConteudo">
            <button class="btn col s2 offset-s10 waves-effect waves-light">Publicar</button>
        </p>
    </div>
</template>
<script>
import GridVue from '@/components/layouts/GridVue'

export default {
    name: 'PublicarConteudoVue',
    props: [],
    data () {
        return {
            postConteudo: ''
        }
    },
    components: {
        GridVue
    }
}
</script>

