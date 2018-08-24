<template>
    <div>
        <header>
            <nav-bar cor="blue" logo="Social">
                <li v-if="!usuario"><router-link to="/login">Login</router-link></li>
                <li v-if="!usuario"><router-link to="/cadastro">Cadastre-se</router-link></li>
                <li v-if="usuario"><router-link to="/perfil">{{usuario.name}}</router-link></li>
                <li v-if="usuario"><a @click="sair">Sair</a></li>
            </nav-bar>
        </header>
        <main>
            <div class="container">
                <div class="row">
                    <grid-vue tamanho="4">
                        <slot name="menuesquerdo"></slot>
                        <card-menu-vue>
                            <h3>Amigos</h3>
                            <li>Murilo</li>
                            <li>Gustavo</li>
                            <li>Mano 1</li>
                            <li>Mano 2</li>
                        </card-menu-vue>
                    </grid-vue>
                    <grid-vue tamanho="8">
                        <slot name="principal"></slot>
                    </grid-vue>

                </div>
            </div>
        </main>
        <footer-vue cor="blue" logo="Social" descricao="Descrição do rolê">
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
	name: 'SiteTemplate',
	components:{
		NavBar,
		FooterVue,
        GridVue,
        CardMenuVue
    },
    data(){
        return {
            usuario: false
        }
    },
    created() {
        let usuarioAux = sessionStorage.getItem('usuario');
        if(usuarioAux){
            this.usuario = JSON.parse(usuarioAux);
        }else{
            this.$router.push('/login');
        }
    },
    methods: {
        sair(){
            sessionStorage.clear();
            this.usuario = false;
            this.$router.push('/login');
        }
    }
    
}
</script>

<style>

</style>
