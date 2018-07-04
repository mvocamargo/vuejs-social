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
			<h1>Login</h1>
			<input type="text" placeholder="E-mail" v-model="usuario.email">
			<input type="password" placeholder="Senha" v-model="usuario.password">
			<router-link to="/cadastro" class="btn blue lighten-2">Cadastre-se</router-link>
			<button class="btn blue darken-2" @click="login">Entrar</button>
		</div>
	</login-template>
</template>

<script>
import LoginTemplate from '@/templates/LoginTemplate'
import axios from 'axios';
export default {
  	name: 'Login',
  	data () {
    	return {
			usuario :{
				email: '',
				password: ''
			}
   		}
  	},
  	components:{
		LoginTemplate
	},
	methods:{
		login(){
			console.log(this.usuario);
			axios.post('http://localhost:8000/api/login',{
				email: this.usuario.email,
				password: this.usuario.password
			})
			.then( response => {
				if( response.data.token ){
					console.log('existe');
					sessionStorage.setItem('usuario', JSON.stringify(response.data));
					this.$router.push('/');
				}else if( response.data.status == false){
					console.log('ñ existe');
				}else{
					console.log('dados erados');
					let erros = '';
					for (let erro of Object.values(response.data)) {
						const element = array[erro];
						
					}
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
