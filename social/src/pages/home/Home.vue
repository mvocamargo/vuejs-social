<template>
	<site-template>
		<div slot="menuesquerdo">
			<card-menu-vue>
				<div class="row valign-wrapper">
					<grid-vue tamanho="4">
						<img src="https://materializecss.com/images/yuna.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
					</grid-vue>
					<grid-vue tamanho="8">
						<span class="black-text">
							<h5>Nome</h5>
							This is a square image. Add the "circle" class to it to make it appear circular.
						</span>
					</grid-vue>
				</div>
			</card-menu-vue>
		</div>
		<div slot="principal">
			<publicar-conteudo-vue></publicar-conteudo-vue>
			<card-conteudo-vue perfil-foto="https://materializecss.com/images/yuna.jpg" perfil-nome="Usuário dos Santos" post-data="12/01/2018 00:50">
				<card-detalhe-vue 
					post-imagem="https://materializecss.com/images/sample-1.jpg"
					post-titulo="É isso aí"
					post-texto="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae fugit necessitatibus optio nostrum eius porro, deleniti odit, perferendis ipsa minima corporis magni commodi, numquam iure animi itaque molestias saepe ex."
				/>
			</card-conteudo-vue>
		</div>
	</site-template>
</template>

<script>
import SiteTemplate from '@/templates/SiteTemplate'
import CardConteudoVue from '@/components/social/CardConteudoVue'
import CardDetalheVue from '@/components/social/CardDetalheVue'
import CardMenuVue from '@/components/layouts/CardMenuVue'
import PublicarConteudoVue from '@/components/social/PublicarConteudoVue'
import GridVue from '@/components/layouts/GridVue'

export default {
  	name: 'Home',
  	data () {
    	return {
      
   		}
  	},
  	components:{
		CardConteudoVue,
		CardDetalheVue,
		GridVue,
		PublicarConteudoVue,
		SiteTemplate,
		CardMenuVue
	}
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
