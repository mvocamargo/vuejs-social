<template>
	<login-template>
		<div slot="menuesquerdo">
			<ul class="browser-default">
				<li>Item 1</li>
				<li>Item 2</li>
				<li>Item 3</li>
				<li>Item 4</li>
				<li>Item 5</li>
			</ul>
		</div>
		<div slot="principal">
			<h1>Cadastro</h1>
			<input type="text" placeholder="Nome" v-model="usuario.name">
			<input type="text" placeholder="E-mail" v-model="usuario.email">
			<input type="password" placeholder="Senha" v-model="usuario.password">
			<input type="password" placeholder="Confirme senha" v-model="usuario.password_confirmation">
			<router-link to="/login" class="btn blue lighten-2">Tenho cadastro!</router-link>
			<button @click="cadastro" class="btn blue darken-2">Enviar</button>
		</div>
	</login-template>
</template>

<script>
import LoginTemplate from '@/templates/LoginTemplate'
import axios from 'axios'

export default {
  	name: 'Cadastro',
  	data () {
    	return {
			usuario :{
				name: '',
				email: '',
				password: '',
				password_confirmation: ''
			}
   		}
  	},
  	components:{
		LoginTemplate
	},
	methods:{
		cadastro(){
			console.log(this.usuario);
			axios.post('http://localhost:8000/api/cadastro',{
				name: this.usuario.name,
				email: this.usuario.email,
				password: this.usuario.password,
				password_confirmation: this.usuario.password_confirmation
			})
			.then( response => {
				if( response.data.token ){
					console.log('cadastrou');
					sessionStorage.setItem('usuario', JSON.stringify(response.data));
					this.$router.push('/');
				}else if( response.data.status == false){
					console.log('ñ cadastrou');
				}else{
					console.log('dados erados');
					let erros = '';
					for (let erro of Object.values(response.data)) {
						erros += erro + " ";
					}
					alert(erros);
				}
			} )
			.catch( e => {
				console.log(e)
			});
		}
	}
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
