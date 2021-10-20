new Vue({
	//zona actuacion
	el:'#prueba',

	//data
	data:{
		demo:'Hola mundo 666-Salve satan',
		nombre:'',
		genero:'',
		raza:'',
		edad:6,
		mascotas:[
			{nombre:'Bruno',genero:'H',raza:'Canino',edad:5},
			{nombre:'Susu',genero:'H',raza:'Felino',edad:1},
			{nombre:'BIMBO',genero:'M',raza:'Canino',edad:2}
		],
	},

	//metodos
	methods:{
		incrementar:function(){
			this.edad++;
		},
		decrementar:function(){
			this.edad--;
		}
	}
});