<template>
	<div>
		<publicar-conteudo-vue></publicar-conteudo-vue>
		<card-conteudo-vue perfil-foto="https://materializecss.com/images/yuna.jpg" perfil-nome="Usuário dos Santos" post-data="12/01/2018 00:50">
			<card-detalhe-vue 
				post-imagem="https://materializecss.com/images/sample-1.jpg"
				post-titulo="É isso aí"
				post-texto="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae fugit necessitatibus optio nostrum eius porro, deleniti odit, perferendis ipsa minima corporis magni commodi, numquam iure animi itaque molestias saepe ex."
			/>
		</card-conteudo-vue>
	</div>
</template>

<script>
import CardConteudoVue from '@/components/social/CardConteudoVue'
import CardDetalheVue from '@/components/social/CardDetalheVue'
import PublicarConteudoVue from '@/components/social/PublicarConteudoVue'
// import GridVue from '@/components/layouts/GridVue'

export default {
  	name: 'Home',
  	data () {
    	return {
      
   		}
  	},
  	components:{
		CardConteudoVue,
		CardDetalheVue,
		// GridVue,
		PublicarConteudoVue
	}
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
