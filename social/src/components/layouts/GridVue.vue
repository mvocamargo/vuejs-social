<template>
    <div class="col" :class="'s' + tamanho">
        <slot></slot>
    </div>
</template>
<script>
export default {
    name: 'GridVue',
    props: ['tamanho'],
    data () {
        return {

        }
    }
}
</script>

