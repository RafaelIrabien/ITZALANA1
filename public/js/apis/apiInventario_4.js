var ruta = document.querySelector("[name=route]").value;

var apiJuguete= ruta + '/apiJuguete';

new Vue({
	//Pasa automáticamente la petición
	http: {
		headers: {
			'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
		}
	},

	
	el:"#juguete",

	data:{
		prueba:'Esta es una prueba de nuevo',
		juguetes:[],

		nombre:'',
		descripcion:'',
		precio_venta:'',
		cantidad:'',
		
		
		agregando:true,
		sku:'',

		buscar:'',
	},

	// AL CREARSE LA PAGINA
	created:function(){
		this.obtenerProductos();
	},


	methods:{
		obtenerProductos:function(){
			this.$http.get(apiJuguete).then(function(json){
				this.juguetes=json.data;
				console.log(json.data);
			}).catch(function(json){
				console.log(json);

			});
		},
		mostrarModal:function(){
			    this.agregando=true;
			    this.sku='';
			    this.nombre='';
			    this.descripcion='';
				this.precio_venta='';
				this.cantidad='';
			$('#modalJuguete').modal('show');
		},

		guardarJuguete:function(){

			//se construye el json para enviar al controlador
			var juguete={nombre:this.nombre,
				          descripcion:this.descripcion,
						  precio_venta:this.precio_venta,
						  cantidad:this.cantidad};

			//Se envia los datos al controlador
			this.$http.post(apiJuguete,juguete).then(function(json){
				this.obtenerProductos();
				this.nombre='';
				this.descripcion='';
				this.precio_venta='';
				this.cantidad='';

			}).catch(function(json){
				console.log(json);

			});


			$('#modalJuguete').modal('hide');

			console.log(juguete);

		},

		eliminarJuguete:function(id){
			var confir= confirm('¿Está seguro de eliminar el producto?');

			if (confir) 
			{
				this.$http.delete(apiJuguete + '/' + id).then(function(json){
					this.obtenerProductos();
				}).catch(function(json){

				});
			}


		},

		editandoJuguete:function(id){
			this.agregando=false;
			this.sku=id;

			this.$http.get(apiJuguete + '/' + id).then(function(json){
				//console.log(json.data);

				this.nombre=json.data.nombre;
				this.descripcion=json.data.descripcion;
				this.precio_venta=json.data.precio_venta;
				this.cantidad=json.data.cantidad;
				
			});
			
			$('#modalJuguete').modal('show');

		},

		actualizarJuguete:function(){
			
			var jsonJuguete = {
				               nombre:this.nombre,
				               descripcion:this.descripcion,
				               precio_venta:this.precio_venta,
				               cantidad:this.cantidad
				                };
				                
		    //console.log(jsonAlumo);

		    this.$http.patch(apiJuguete + '/' + this.sku,jsonJuguete).then(function(json){
		    	this.obtenerProductos();

			});
			$('#modalJuguete').modal('hide');

		}
	},

	computed:{
		filtroProductos:function(){
		return this.juguetes.filter((juguete)=>{
			return juguete.nombre.toLowerCase().match(this.buscar.toLowerCase().trim()) 
			    
		});
	   }

	
	}
});