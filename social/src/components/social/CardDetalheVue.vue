<template>
    <span>
        <!-- https://materializecss.com/images/sample-1.jpg -->
        <div v-if="postImagem" class="card-image">
			<img :src="postImagem">
			<span class="card-title">{{ postTitulo || '' }}</span>
		</div>
		<div v-if="postTexto" class="card-content">
			<p>{{ postTexto }}</p>
		</div>
    </span>
</template>
<script>

export default {
    name: 'CardDetalheVue',
    props: ['postTitulo', 'postTexto', 'postImagem'],
    data () {
        return {

        }
    }
}
</script>

