<template>
	<site-template>
		<div slot="menuesquerdo">
			<br><br>
			<img :src="usuario.imagem" class="responsive-img" alt="">
		</div>
		<div slot="principal">
			<h1>Perfil</h1>
			<input type="text" placeholder="Nome" v-model="usuario.name">
			<input type="text" placeholder="E-mail" v-model="usuario.email">
			<div class="file-field input-field">
			<div class="btn">
				<span>Foto</span>
				<input type="file" multiple @change="salvaImagem">
			</div>
			<div class="file-path-wrapper">
				<input class="file-path validate" type="text" placeholder="Upload one or more files">
			</div>
			</div>
			<input type="password" placeholder="Senha" v-model="usuario.password">
			<input type="password" placeholder="Confirme senha" v-model="usuario.password_confirmation">
			<button @click="perfil" class="btn blue darken-2">Enviar</button>
		</div>
	</site-template>
</template>

<script>
import SiteTemplate from '@/templates/SiteTemplate'
import axios from 'axios'

export default {
  	name: 'Perfil',
  	data () {
    	return {
			user: false,
			usuario :{
				name: '',
				email: '',
				password: '',
				password_confirmation: '',
				imagem: ''
			}
   		}
  	},
  	components:{
		SiteTemplate
	},
	created() {
        let usuarioAux = sessionStorage.getItem('usuario');
        if(usuarioAux){
			this.user = JSON.parse(usuarioAux);
			this.usuario.name = this.user.name;
			this.usuario.email = this.user.email;
        }else{
            this.$router.push('/login');
        }
    },
	methods:{
		perfil(){
			axios.put('http://localhost:8000/api/perfil',{
				name: this.usuario.name,
				email: this.usuario.email,
				imagem: this.usuario.imagem,
				password: this.usuario.password,
				password_confirmation: this.usuario.password_confirmation
			}, {
				"headers": {
					"authorization": "Bearer " + this.user.token
				}
			})
			.then( response => {
				if( response.data.token ){
					this.usuario = response.data;
					sessionStorage.setItem('usuario', JSON.stringify(response.data));
					console.log(response.data);
					swal({
						title: "Good job!",
						text: "Profile updated",
						icon: "success",
						button: "Yees!",
					});
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
		},
		salvaImagem(e){
			let arquivo = e.target.files || e.dataTransfer.files;
			if (!arquivo.length) {
				return;
			}
			let reader  = new FileReader();
			reader.onloadend = (e) => {
				this.usuario.imagem = e.target.result;
			}
			reader.readAsDataURL(arquivo[0]);

		}
	}
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
