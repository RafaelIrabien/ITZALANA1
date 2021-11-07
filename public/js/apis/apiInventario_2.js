var ruta = document.querySelector("[name=route]").value;

var apiFarmacia= ruta + '/apiFarmacia';

new Vue({
	//Pasa automáticamente la petición
	http: {
		headers: {
			'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
		}
	},

	
	el:"#farmacia",

	data:{
		prueba:'Esta es una prueba de nuevo',
		productos:[],

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
			this.$http.get(apiFarmacia).then(function(json){
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
			$('#modalFarmacia').modal('show');
		},

		guardarFarmacia:function(){

			//se construye el json para enviar al controlador
			var farmacia={nombre:this.nombre,
				          descripcion:this.descripcion,
						  precio_venta:this.precio_venta,
						  cantidad:this.cantidad,
						  categoria:this.categoria};

			//Se envia los datos al controlador
			this.$http.post(apiFarmacia,farmacia).then(function(json){
				this.obtenerProductos();
				this.nombre='';
				this.descripcion='';
				this.precio_venta='';
				this.cantidad='';
				this.categoria='';

			}).catch(function(json){
				console.log(json);

			});


			$('#modalFarmacia').modal('hide');

			console.log(farmacia);

		},

		eliminarFarmacia:function(id){
			var confir= confirm('¿Está seguro de eliminar el producto?');

			if (confir) 
			{
				this.$http.delete(apiFarmacia + '/' + id).then(function(json){
					this.obtenerProductos();
				}).catch(function(json){

				});
			}


		},

		editandoFarmacia:function(id){
			this.agregando=false;
			this.id=id;

			this.$http.get(apiFarmacia + '/' + id).then(function(json){
				//console.log(json.data);

				this.nombre=json.data.nombre;
				this.descripcion=json.data.descripcion;
				this.precio_venta=json.data.precio_venta;
				this.cantidad=json.data.cantidad;
				this.categoria=json.data.categoria;
				
			});
			
			$('#modalFarmacia').modal('show');

		},

		actualizarFarmacia:function(){
			
			var jsonFarmacia = {
				               nombre:this.nombre,
				               descripcion:this.descripcion,
				               precio_venta:this.precio_venta,
				               cantidad:this.cantidad,
				               categoria:this.categoria
				                };
				                
		    //console.log(jsonAlumo);

		    this.$http.patch(apiFarmacia + '/' + this.id,jsonFarmacia).then(function(json){
		    	this.obtenerProductos();

			});
			$('#modalFarmacia').modal('hide');

		}
	},

	computed:{
		filtroProductos:function(){
		return this.productos.filter((farmacia)=>{
			return farmacia.nombre.toLowerCase().match(this.buscar.toLowerCase().trim()) 
			    
		});
	   }

	
	}
});