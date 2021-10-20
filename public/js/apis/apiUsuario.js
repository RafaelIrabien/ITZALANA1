var ruta = document.querySelector("[name=route]").value;

var apiUsuario= ruta + '/apiUsuario';

new Vue({
	//Pasa automáticamente la petición
	http: {
		headers: {
			'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
		}
	},

	
	el:"#usuario",

	data:{
		prueba:'Esta es una prueba de nuevo',
		users:[],

		
		name:'',
    	// email:'',
    	name_verified:'',
    	password:'',
        remember_token:'',
		
		
		
		id:'',

		
	},

	// AL CREARSE LA PAGINA
	created:function(){
		this.obtenerUsuarios();
	},


	methods:{
		obtenerUsuarios:function(){
			this.$http.get(apiUsuario).then(function(json){
				this.users=json.data;
				console.log(json.data);
			}).catch(function(json){
				console.log(json);

			});
		}
	}
});