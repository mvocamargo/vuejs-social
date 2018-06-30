<template>
    <div class="card">
        <div class="card-content">
            <div class="row valign-wrapper">
                <grid-vue tamanho="1">
                    <img :src="perfilFoto" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                </grid-vue>
                <grid-vue tamanho="11">
                    <span class="black-text">
                        <strong>{{perfilNome}}</strong> - <small>{{ postData }}</small>
                    </span>
                </grid-vue>
            </div>
            <slot></slot>
            <div class="card-action">
                <!-- <a href="#">This is a link</a> -->
                <i class="small material-icons">favorite_border</i>
                <i class="small material-icons">insert_comment</i>
            </div>
        </div>
    </div>
</template>
<script>
import GridVue from '@/components/layouts/GridVue'

export default {
    name: 'CardConteudoVue',
    props: ['perfilFoto', 'perfilNome', 'postData'],
    data () {
        return {

        }
    },
    components: {
        GridVue
    }
}
</script>

