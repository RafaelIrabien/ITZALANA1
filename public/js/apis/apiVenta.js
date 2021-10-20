var ruta = document.querySelector("[name=route]").value;

var apiProducto= ruta + '/apiProducto';
var apiFarmacia= ruta + '/apiFarmacia';
var apiPapeleria= ruta + '/apiPapeleria';
var apiJuguete= ruta + '/apiJuguete';

new Vue({

	//Pasa automáticamente la petición
	http: {
		headers: {
			'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
		}
	},

	el:"#venta",

	data:{
		prueba:'Esta es una prueba de nuevo',
		productos:[],
		farmacias:[],
		papelerias:[],
		juguetes:[],
		sku:'',
		nombre:'',

		cantidades:[1,1,1,1,1,1,1,1,1],
		descuentos:0,
		cantidad:0,
		auxSubtotal:0,
	},

	// AL CREARSE LA PAGINA
//	created:function(){
//		this.obtenerProductos();
//	},


	methods:{

		buscarProducto:function(){
			var producto={};
			this.$http.get(apiProducto + '/' + this.sku).then(function(j) {
				this.producto=j.data;

				producto ={sku: j.data.sku,
						  nombre:j.data.nombre,
						  descripcion:j.data.descripcion,
						  precio_venta:j.data.precio_venta,
						  cantidad:1,
						  total:j.data.precio_venta};

				if (this.producto)
					this.productos.push(producto);
				   this.sku="";
			})

			var producto={};
			this.$http.get(apiFarmacia + '/' + this.sku).then(function(j) {
				this.producto=j.data;

				producto ={sku: j.data.sku,
						  nombre:j.data.nombre,
						  descripcion:j.data.descripcion,
						  precio_venta:j.data.precio_venta,
						  cantidad:1,
						  total:j.data.precio_venta};

				if (this.producto)
					this.productos.push(producto);
				   this.sku="";
			})

			var producto={};
			this.$http.get(apiPapeleria + '/' + this.sku).then(function(j){
				this.producto=j.data;

				producto ={sku: j.data.sku,
						  nombre:j.data.nombre,
						  descripcion:j.data.descripcion,
						  precio_venta:j.data.precio_venta,
						  cantidad:1,
						  total:j.data.precio_venta};

				if (this.producto)
					this.productos.push(producto);
				   this.sku="";
			})

			var producto={};
			this.$http.get(apiJuguete + '/' + this.sku).then(function(j) {
				this.producto=j.data;

				producto ={sku: j.data.sku,
						  nombre:j.data.nombre,
						  descripcion:j.data.descripcion,
						  precio_venta:j.data.precio_venta,
						  cantidad:1,
						  total:j.data.precio_venta};

				if (this.producto)
					this.productos.push(producto);
				   this.sku="";
			})

		},

		eliminarProducto: function(id){
			this.productos.splice(id,1);
		}
},


//	 descuento: function(){
//	    	var porcentaje = Number(document.getElementById("pt").value);
//	    	var cantidad = Number(document.getElementById("ct").value);
//
//	    	var resultado = porcentaje * 100;

//	    	document.getElementById("resul").value=resultado;
	    
//	},

	

	computed:{
		
		totalProducto(){
			return (id)=>{
				var total=0;
				

				total=this.productos[id].precio_venta * this.cantidades[id];

				//Actualiza el total del producto en el Array Productos
				this.productos[id].total=total;

				//Actualiza la cantidad en el Array Productos
				this.productos[id].cantidad=this.cantidades[id];

					return total.toFixed(1);

			}
		},// Fin de totalProducto




		subtotal(){
			var total=0;

			for (var i = this.productos.length -1; i >= 0; i--) {
				total=total+this.productos[i].total;
			}
			//Mando una copia del subtotal a la sección del data
			//para el uso de otros calculos
			this.auxSubtotal=total.toFixed(1);
			return total.toFixed(1);
		},


	//	total_sin_descuento(){
	//	   var sin_des=0;
	//	   var total=0;

	//	   for (var i = this.productos.length -1; i >= 0; i--) {
	//			total=total+this.productos[i].total;
	//		}
			//Mando una copia del subtotal a la sección del data
	//		//para el uso de otros calculos
	//		this.auxSubtotal=total.toFixed(1);
			
	//	   sin_des = total;
	//	   return sin_des.toFixed(1);
//	},


	   


		NoArticulos(){
			var acum=0;
			for (var i = this.productos.length - 1; i>= 0; i--) {
				acum = acum + this.productos[i].cantidad;
			}
			return acum;
		},

	}//FIN DE COMPUTED




});