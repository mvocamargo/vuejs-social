<template>
    <div>
        <header>
            <nav-bar cor="pink" url="https://www.google.com" logo="Social"></nav-bar>
        </header>
        <main>
            <router-view/>
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
export default {
	name: 'App',
	components:{
		NavBar,
		FooterVue
	}
}
</script>

<style>

</style>
