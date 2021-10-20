@extends ('layout.index')
@section('titulo','ITZALANA')
@section('contenido')
<br><br>
<!-- INICIA VUE-->
<link rel="stylesheet" href="css/ventas.css">

<div id="venta">
	<div class="container">
		<div class="row">
			<div class="col-md-4">

				<div class="input-group mb-3">
				<input type="text" placeholder="Escribe el código del producto" aria-label="Recipient's username" class="form-control" aria-describedby="basic-addon2" v-model="sku" v-on:keyup.enter="buscarProducto()">
				<div class="input-group-append">
				<button  class="btn btn-primary" type="button" @click="buscarProducto()">Buscar</button>
				</div>
			</div>

			</div>
		</div>
								<!--INICO DE LA TABLA-->

		<div class="card">
			<div class="card-body">
		<div class="row">
			<div class="col-md-12">
			<table class="table table-bordered  text-center">
				<thead style="background-color:#FFC000">
					<th>SKU</th>
					
					<th><h5><strong>Nombre</strong></h5></th>
					<th><h5><strong>Descripción</strong></h5></th>
					<th><h5><strong>Precio</strong></h5></th>
					<th><h5><strong>Cantidad</strong></h5></th>  
				    <th><h5><strong>Descuento</strong></h5></th> 
					<th><h5><strong>Total</strong></h5></th>
					<th><h5><strong>Acciones</strong></h5></th>

				</thead>

			<tbody>
				<tr v-for="(v,index) in productos">
					<td>@{{v.sku}}</td>
				
					<td  style="background-color:#FFFFC5">@{{v.nombre}}</td>
					<td  style="background-color:#FFFFC5">@{{v.descripcion}}</td>
					<td  style="background-color:#FFFFC5">$ @{{v.precio_venta}}</td>
					<td  style="background-color:#FFFFC5"><input type="number" style="width:60px" v-model.number="cantidades[index]"> 
					</td> 
    <td style="background-color:#FFFFC5"><input type="number" placeholder="0" style="width:60px"></td>


					<td id="resul">$ @{{totalProducto(index)}}</td>
					<td  style="background-color:#FFD961">
						<button class="btn btn-xm" @click="eliminarProducto(index)">
							<i class="fas fa-trash"></i>
						</button>
					</td>	
				</tr>
			</tbody>
			</table>
		</div>
	</div>
</div>
</div>

<!--
<label>Porcentaje<input id="pt"  type="number" placeholder="0" style="width:60px"></label>

<label>Cantidad<input id="ct" type="number" placeholder="0" style="width:60px"></label>
<button class="btn btn-primary"@click="descuento"></button>
<label>Resultado<input id="resul" type="number" placeholder="0" style="width:60px"></label> -->



			<!--FIN DE LA TABLA-->

				<hr>
		<!-- ABALA DEL TOTAL -->
		<div class="row">
		<div class="col-md-8"></div>
		<div class="card">
			<div class="card-body">
				<div class="col md-4">
					<table class="table table-bordered table-condensed">
						
						<tr>
							<th style="background: #ffff66">SUBTOTAL</th>
							<td>$ @{{subtotal}}</td>
						</tr>

						<tr>
							<th style="background: #ffff66">ARTICULOS</th>
							<td>@{{NoArticulos}}</td>
						</tr>

								
								
					<!--	<tr>
							<th style="background: #ffff66">SIN DESCUENTO</th>
							<td>@{{total_sin_descuento}}</td>
						</tr>  -->
					</table>
					
						<button id="vender" style="height: 40px;" type="button" class="btn btn-warning btn-xm btn-block"><i class="fas fa-cart-arrow-down"></i></button>
					
				</div>
			</div>
		</div>
	</div>
		<!--FIN DE LA TABLA DEL TOTAL -->


					
				</div>
			</div>
		</div>
		
	</div>

	

</div>
	
</div>
<!-- TERMINA VUE -->

@endsection

@push('scripts') 
<script type="text/javascript" src="js/vue-resource.js"></script>
<script type="text/javascript" src="js/apis/apiVenta.js"></script>

@endpush

<input type="hidden" name="route" value="{{ url('/')}}">