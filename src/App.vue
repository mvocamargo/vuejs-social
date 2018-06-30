<template>
    <div>
        <header>
            <nav-bar cor="pink" url="https://www.google.com" logo="Social"></nav-bar>
        </header>
        <main>
            <div class="container">
                <div class="row">
                    <grid-vue tamanho="4">
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
                    </grid-vue>
                    <grid-vue tamanho="8">
                        <router-view/>
                    </grid-vue>

                </div>
            </div>
        </main>
        <footer-vue cor="purple" logo="Social" descricao="Descrição do rolê">
            <li><a class="grey-text text-lighten-3" href="#!">Link</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Link</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Link</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Link</a></li>
        </footer-vue>
    </div>
</template>

<script>
import NavBar from '@/components/layouts/NavBar'
import FooterVue from '@/components/layouts/FooterVue'
import GridVue from '@/components/layouts/GridVue'
import CardMenuVue from '@/components/layouts/CardMenuVue'
export default {
	name: 'App',
	components:{
		NavBar,
		FooterVue,
        GridVue,
        CardMenuVue
	}
}
</script>

<style>

</style>
