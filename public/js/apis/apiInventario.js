var ruta = document.querySelector("[name=route]").value;

var apiProducto= ruta + '/apiProducto';
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
		productos:[],
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
		mostrarModal:function(){
			    this.agregando=true;
			    this.id='';
			    this.nombre='';
				this.descripcion='';
				this.precio_venta='';
				this.cantidad='';
				this.categoria='';
			$('#modalProducto').modal('show');
		},

		guardarProducto:function(){

			//se construye el json para enviar al controlador
			var producto={nombre:this.nombre,
						  descripcion:this.descripcion,
						  precio_venta:this.precio_venta,
						  cantidad:this.cantidad,
						  categoria:this.categoria};

			//Se envia los datos al controlador
			this.$http.post(apiProducto,producto).then(function(json){
				this.obtenerProductos();
				this.nombre='';
				this.descripcion='';
				this.precio_venta='';
				this.cantidad='';
				this.categoria='';

			}).catch(function(json){
				console.log(json);

			});


			$('#modalProducto').modal('hide');

			console.log(producto);

		},

		eliminarProducto:function(id){
			var confir= confirm('¿Está seguro de eliminar el producto?');

			if (confir) 
			{
				this.$http.delete(apiProducto + '/' + id).then(function(json){
					this.obtenerProductos();
				}).catch(function(json){

				});
			}


		},

		editandoProducto:function(id){
			this.agregando=false;
			this.id=id;

			this.$http.get(apiProducto + '/' + id).then(function(json){
				//console.log(json.data);

				this.nombre=json.data.nombre;
				this.descripcion=json.data.descripcion;
				this.precio_venta=json.data.precio_venta;
				this.cantidad=json.data.cantidad;
				this.categoria=json.data.categoria;
				
			});
			
			$('#modalProducto').modal('show');

		},

		actualizarProducto:function(){
			
			var jsonProducto = {
				               nombre:this.nombre,
				               descripcion:this.descripcion,
				               precio_venta:this.precio_venta,
				               cantidad:this.cantidad,
				               categoria:this.categoria
				                };
				                
		    //console.log(jsonAlumo);

		    this.$http.patch(apiProducto + '/' + this.id,jsonProducto).then(function(json){
		    	this.obtenerProductos();

			});
			$('#modalProducto').modal('hide');

		}
	},

	computed:{
		filtroProductos:function(){
		return this.productos.filter((producto)=>{
			return producto.nombre.toLowerCase().match(this.buscar.toLowerCase().trim()) 
			    
		});
	   }

	
	}
});