var ruta = document.querySelector("[name=route]").value;

var apiPapeleria= ruta + '/apiPapeleria';

new Vue({
	//Pasa automáticamente la petición
	http: {
		headers: {
			'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
		}
	},

	
	el:"#papeleria",

	data:{
		prueba:'Esta es una prueba de nuevo',
		papelerias:[],

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
			this.$http.get(apiPapeleria).then(function(json){
				this.papelerias=json.data;
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
			$('#modalPapeleria').modal('show');
		},

		guardarPapeleria:function(){

			//se construye el json para enviar al controlador
			var papeleria={nombre:this.nombre,
				          descripcion:this.descripcion,
						  precio_venta:this.precio_venta,
						  cantidad:this.cantidad};

			//Se envia los datos al controlador
			this.$http.post(apiPapeleria,papeleria).then(function(json){
				this.obtenerProductos();
				this.nombre='';
				this.descripcion='';
				this.precio_venta='';
				this.cantidad='';

			}).catch(function(json){
				console.log(json);

			});


			$('#modalPapeleria').modal('hide');

			console.log(papeleria);

		},

		eliminarPapeleria:function(id){
			var confir= confirm('¿Está seguro de eliminar el producto?');

			if (confir) 
			{
				this.$http.delete(apiPapeleria + '/' + id).then(function(json){
					this.obtenerProductos();
				}).catch(function(json){

				});
			}


		},

		editandoPapeleria:function(id){
			this.agregando=false;
			this.sku=id;

			this.$http.get(apiPapeleria + '/' + id).then(function(json){
				//console.log(json.data);

				this.nombre=json.data.nombre;
				this.descripcion=json.data.descripcion;
				this.precio_venta=json.data.precio_venta;
				this.cantidad=json.data.cantidad;
				
			});
			
			$('#modalPapeleria').modal('show');

		},

		actualizarPapeleria:function(){
			
			var jsonPapeleria = {
				               nombre:this.nombre,
				               descripcion:this.descripcion,
				               precio_venta:this.precio_venta,
				               cantidad:this.cantidad
				                };
				                
		    //console.log(jsonAlumo);

		    this.$http.patch(apiPapeleria + '/' + this.sku,jsonPapeleria).then(function(json){
		    	this.obtenerProductos();

			});
			$('#modalPapeleria').modal('hide');

		}
	},

	computed:{
		filtroProductos:function(){
		return this.papelerias.filter((papeleria)=>{
			return papeleria.nombre.toLowerCase().match(this.buscar.toLowerCase().trim()) 
			    
		});
	   }

	
	}
});