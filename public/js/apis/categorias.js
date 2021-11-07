var ruta = document.querySelector("[name=route]").value;

var apiCategoria= ruta + '/apiCategoria';

new Vue({
	//Pasa automáticamente la petición
	http: {
		headers: {
			'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
		}
	},

	
	el:"#producto",

	data:{
		prueba:'Esta es una prueba de nuevo',
		categorias:[],

		nombre:'',
		descripcion:'',
		precio_venta:'',
		cantidad:'',
		categoria:'',
		
		
		agregando:true,
		id:'',

		buscar:'',
	},

	// AL CREARSE LA PAGINA
	created:function(){
		this.obtenerProductos();
	},


	methods:{
		obtenerProductos:function(){
			this.$http.get(apiProducto).then(function(json){
				this.productos=json.data;
				console.log(json.data);
			}).catch(function(json){
				console.log(json);

			});
		},