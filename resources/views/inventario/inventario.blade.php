@extends ('layout.index')
@section('titulo','ITZALANA')
@section('contenido')

<!-- CSS INVENTARIO -->
   <link rel="stylesheet" href="css/inventario.css">

   <inventory-index></inventory-index>


<!-- INICIA VUE-->


	<br><br><br> <div >
              <a href="{{ route('inventario-logout')}}">
                                        Cerrar sesión
                                    </a>

                                   
                                </div><br><br><br>
<a name="alimentos">
	<div id="producto">
		
	<div class="row">
		<div class="col-md-12">
			<div class="card card-warning">
				<div class="card-header">
					
				<h2 style="color:white"><strong>ALIMENTOS</strong>
					<samp  style="font-size:21px" @click="mostrarModal()">
						<button class="btn btn-dark btn-lg"><i class="fas fa-cart-plus"></i> Agregar Producto <i class="fas fa-cart-plus"></i></button>
					</samp>

					
					
					<br>
					<br>
					
					<div class="row">
						<i class="fas fa-filter" style="color:black"></i>
						<div class="col-md-6">
							
							<input type="text" class="form-control" placeholder="Escriba el nombre del producto" v-model="buscar">
						</div>
					</div>
				</h2>
				
				</div>
				<div class="card-body">
								<!--INICO DE LA TABLA-->
			<table class="table table-bordered text-center">
				<thead>
					<th hidden="">ID ALUMNO</th>
					
					<th style="background-color:#FFC000"><h5><strong>Nombre</strong></h5></th>
					<th style="background-color:#FFC000"><h5><strong>Descripción</strong></h5></th>
					<th style="background-color:#FFC000"><h5><strong>Precio</strong></h5></th>
					<th style="background-color:#FFC000"><h5><strong>Cantidad disponible</strong></h5></th>
					<th style="background-color:#FFC000"><h5><strong>Acciones</strong></h5></th>

				</thead>

			<tbody>
				<tr v-for="producto in filtroProductos">
					<td hidden="">@{{producto.id}}</td>
				
					<td  >@{{producto.nombre}}</td>
					<td  >@{{producto.descripcion}}</td>
					<td  >$ @{{producto.precio_venta}}</td>
					<td  >@{{producto.cantidad}}</td>
					
					
					<td  style="background-color:#FFD961">
						<button class="btn btn-xm" @click="editandoProducto(producto.id)">
							<i class="fas fa-edit"></i>
						</button>

						<button class="btn btn-xm" @click="eliminarProducto(producto.id)">
							<i class="fas fa-trash"></i>
						</button>
					</td>	
				</tr>
			</tbody>
			</table>
			<!--FIN DE LA TABLA-->
					
				</div>


			</div>
		</div>
		
	</div>

	<!-- INICIA VENTANA MODAL -->
<div class="modal fade"  id="modalProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background-color:#FFFFC5">
      <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel" v-if="agregando==true">AGREGANDO PRODUCTO</h5>
       <h5 class="modal-title text-center" id="exampleModalLabel" v-if="agregando==false">EDITANDO PRODUCTO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
   
   <input type="text" class="form-control" placeholder="Nombre del producto" v-model="nombre"><br>
   <input type="text" class="form-control" placeholder="Descripción" v-model="descripcion"><br>
   <input type="number" class="form-control" placeholder="Precio" v-model="precio_venta"><br>
   <input type="number" class="form-control" placeholder="Cantidad" v-model="cantidad"><br>


    <br>

       
        
      </div>
      <div class="modal-footer">
        <button type="button" style="background:black" class="btn btn-secondary" data-dismiss="modal"><strong>Cerrar</strong></button>
        <button type="button" style="color:white" class="btn btn-warning" @click="guardarProducto()" v-if="agregando==true"><strong>Guardar</strong></button>
        <button type="button"  style="color:white" class="btn btn-warning" @click="actualizarProducto()" v-if="agregando==false"><strong>Guardar</strong></button>
      </div>
    </div>
  </div>
</div>
<!--FIN VENTANA MODAL-->
</a>
</div>
<!-- FIN DE VUE PRODUCTO -->

<br><br>






<!-- INICIA VUE-->

	<div id="farmacia">
		<a name="farmacia">
			<br><br><br><br>
	<div class="row">
		<div class="col-md-12">
			<div class="card card-warning">
				<div class="card-header">
				<h2 style="color:white"><strong>FARMACIA</strong>
					<samp style="font-size:21px" @click="mostrarModal()">
						<button class="btn btn-dark btn-lg"><i class="fas fa-cart-plus"></i> Agregar Producto <i class="fas fa-cart-plus"></i></button>
					</samp>

					
					<br>
					<br>
					
					<div class="row">
						<i class="fas fa-filter" style="color:black"></i>
						<div class="col-md-6">
							
							<input type="text" class="form-control" placeholder="Escriba el nombre del producto" v-model="buscar">
						</div>
					</div>
				</h2>
				
				</div>
				<div class="card-body">
								<!--INICO DE LA TABLA-->
			<table class="table table-bordered  text-center">
				<thead>
					<th hidden="">ID ALUMNO</th>
					
					<th style="background-color:#FFC000"><h5><strong>Nombre</strong></h5></th>
					<th style="background-color:#FFC000"><h5><strong>Descripción</strong></h5></th>
					<th style="background-color:#FFC000"><h5><strong>Precio</strong></h5></th>
					<th style="background-color:#FFC000"><h5><strong>Cantidad disponible</strong></h5></th>
					<th style="background-color:#FFC000"><h5><strong>Acciones</strong></h5></th>

				</thead>

			<tbody>
				<tr v-for="farmacia in filtroProductos">
					<td hidden="">@{{farmacia.sku}}</td>
				
					<td >@{{farmacia.nombre}}</td>
					<td >@{{farmacia.descripcion}}</td>
					<td >$ @{{farmacia.precio_venta}}</td>
					<td >@{{farmacia.cantidad}}</td>
					
					
					<td  style="background-color:#FFD961">
						<button class="btn btn-xm" @click="editandoFarmacia(farmacia.sku)">
							<i class="fas fa-edit"></i>
						</button>

						<button class="btn btn-xm" @click="eliminarFarmacia(farmacia.sku)">
							<i class="fas fa-trash"></i>
						</button>
					</td>	
				</tr>
			</tbody>
			</table>
			<!--FIN DE LA TABLA-->
					
				</div>


			</div>
		</div>
		
	</div>

	<!-- INICIA VENTANA MODAL -->
<div class="modal fade"  id="modalFarmacia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background-color:#FFFFC5">
      <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel" v-if="agregando==true">AGREGANDO PRODUCTO</h5>
       <h5 class="modal-title text-center" id="exampleModalLabel" v-if="agregando==false">EDITANDO PRODUCTO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
   
   <input type="text" class="form-control" placeholder="Nombre del producto" v-model="nombre"><br>
   <input type="text" class="form-control" placeholder="Descripción" v-model="descripcion"><br>
   
   <input type="number" class="form-control" placeholder="Precio" v-model="precio_venta"><br>
   <input type="number" class="form-control" placeholder="Cantidad" v-model="cantidad"><br>


    <br>

       
        
      </div>
      <div class="modal-footer">
        <button type="button" style="background:black" class="btn btn-secondary" data-dismiss="modal"><strong>Cerrar</strong></button>
        <button type="button" style="color:white" class="btn btn-warning" @click="guardarFarmacia()" v-if="agregando==true"><strong>Guardar</strong></button>
        <button type="button"  style="color:white" class="btn btn-warning" @click="actualizarFarmacia()" v-if="agregando==false"><strong>Guardar</strong></button>
      </div>
    </div>
  </div>
</div>
<!--FIN VENTANA MODAL-->

</div>
<!-- FIN DE FARMACIA -->
</a>

	<br><br>

<!-- INICIA VUE-->
<div id="papeleria">
<a name="papeleria">

	<br><br><br><br>
	<div class="row">
		<div class="col-md-12">
			<div class="card card-warning">
				<div class="card-header">
							
						<h2  style="color:white"><strong>PAPELERIA</strong>
					<samp style="font-size:21px" @click="mostrarModal()">
						<button class="btn btn-dark btn-lg"><i class="fas fa-cart-plus"></i> Agregar Producto <i class="fas fa-cart-plus"></i></button>
					</samp>


				
					<br>
					<br>
					
					<div class="row">
						<i class="fas fa-filter" style="color:black"></i>
						<div class="col-md-6">
							
							<input type="text" class="form-control" placeholder="Escriba el nombre del producto" v-model="buscar">
						</div>
					</div>
				</h2>
				
				</div>
				<div class="card-body">
								<!--INICO DE LA TABLA-->
			<table class="table table-bordered  text-center">
				<thead >
					<th hidden="">ID ALUMNO</th>
					
					<th style="background-color:#FFC000"><h5><strong>Nombre</strong></h5></th>
					<th style="background-color:#FFC000"><h5><strong>Descripción</strong></h5></th>
					<th style="background-color:#FFC000"><h5><strong>Precio</strong></h5></th>
					<th style="background-color:#FFC000"><h5><strong>Cantidad disponible</strong></h5></th>
					<th style="background-color:#FFC000"><h5><strong>Acciones</strong></h5></th>

				</thead>

			<tbody>
				<tr v-for="papeleria in filtroProductos">
					<td hidden="">@{{papeleria.sku}}</td>
				
					<td >@{{papeleria.nombre}}</td>
					<td >@{{papeleria.descripcion}}</td>
					<td >$ @{{papeleria.precio_venta}}</td>
					<td >@{{papeleria.cantidad}}</td>
					
					
					<td  style="background-color:#FFD961">
						<button class="btn btn-xm" @click="editandoPapeleria(papeleria.sku)">
							<i class="fas fa-edit"></i>
						</button>

						<button class="btn btn-xm" @click="eliminarPapeleria(papeleria.sku)">
							<i class="fas fa-trash"></i>
						</button>
					</td>	
				</tr>
			</tbody>
			</table>
			<!--FIN DE LA TABLA-->
					
				</div>


			</div>
		</div>
		
	</div>

	<!-- INICIA VENTANA MODAL -->
<div class="modal fade"  id="modalPapeleria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background-color:#FFFFC5">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel" v-if="agregando==true">AGREGANDO PRODUCTO</h5>
       <h5 class="modal-title text-center" id="exampleModalLabel" v-if="agregando==false">EDITANDO PRODUCTO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
   
   <input type="text" class="form-control" placeholder="Nombre del producto" v-model="nombre"><br>
   <input type="text" class="form-control" placeholder="Descripción" v-model="descripcion"><br>
   <input type="number" class="form-control" placeholder="Precio" v-model="precio_venta"><br>
   <input type="number" class="form-control" placeholder="Cantidad" v-model="cantidad"><br>


    <br>

       
        
      </div>
      <div class="modal-footer">
        <button type="button" style="background:black" class="btn btn-secondary" data-dismiss="modal"><strong>Cerrar</strong></button>
        <button type="button" style="color:white" class="btn btn-warning" @click="guardarPapeleria()" v-if="agregando==true"><strong>Guardar</strong></button>
        <button type="button"  style="color:white" class="btn btn-warning" @click="actualizarPapeleria()" v-if="agregando==false"><strong>Guardar</strong></button>
      </div>
    </div>
  </div>
</div>
<!--FIN VENTANA MODAL-->

	
</div>
<!-- TERMINA VUE -->

</a>

<br><br>




<!-- INICIA VUE-->
<div id="juguete">
<a name="juguete">

	<br><br><br><br>
	<div class="row">
		<div class="col-md-12">
			<div class="card card-warning">
				<div class="card-header">
							
						<h2  style="color:white"><strong>JUGUETES</strong>
					<samp style="font-size:21px" @click="mostrarModal()">
						<button class="btn btn-dark btn-lg"><i class="fas fa-cart-plus"></i> Agregar Producto <i class="fas fa-cart-plus"></i></button>
					</samp>


				
					<br>
					<br>
					
					<div class="row">
						<i class="fas fa-filter" style="color:black"></i>
						<div class="col-md-6">
							
							<input type="text" class="form-control" placeholder="Escriba el nombre del producto" v-model="buscar">
						</div>
					</div>
				</h2>
				
				</div>
				<div class="card-body">
								<!--INICO DE LA TABLA-->
			<table class="table table-bordered  text-center">
				<thead >
					<th hidden="">ID ALUMNO</th>
					
					<th style="background-color:#FFC000"><h5><strong>Nombre</strong></h5></th>
					<th style="background-color:#FFC000"><h5><strong>Descripción</strong></h5></th>
					<th style="background-color:#FFC000"><h5><strong>Precio</strong></h5></th>
					<th style="background-color:#FFC000"><h5><strong>Cantidad disponible</strong></h5></th>
					<th style="background-color:#FFC000"><h5><strong>Acciones</strong></h5></th>

				</thead>

			<tbody>
				<tr v-for="juguete in filtroProductos">
					<td hidden="">@{{juguete.sku}}</td>
				
					<td >@{{juguete.nombre}}</td>
					<td >@{{juguete.descripcion}}</td>
					<td >$ @{{juguete.precio_venta}}</td>
					<td >@{{juguete.cantidad}}</td>
					
					
					<td  style="background-color:#FFD961">
						<button class="btn btn-xm" @click="editandoJuguete(juguete.sku)">
							<i class="fas fa-edit"></i>
						</button>

						<button class="btn btn-xm" @click="eliminarJuguete(juguete.sku)">
							<i class="fas fa-trash"></i>
						</button>
					</td>	
				</tr>
			</tbody>
			</table>
			<!--FIN DE LA TABLA-->
					
				</div>


			</div>
		</div>
		
	</div>

	<!-- INICIA VENTANA MODAL -->
<div class="modal fade"  id="modalJuguete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background-color:#FFFFC5">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel" v-if="agregando==true">AGREGANDO PRODUCTO</h5>
       <h5 class="modal-title text-center" id="exampleModalLabel" v-if="agregando==false">EDITANDO PRODUCTO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
   
   <input type="text" class="form-control" placeholder="Nombre del producto" v-model="nombre"><br>
   <input type="text" class="form-control" placeholder="Descripción" v-model="descripcion"><br>
   <input type="number" class="form-control" placeholder="Precio" v-model="precio_venta"><br>
   <input type="number" class="form-control" placeholder="Cantidad" v-model="cantidad"><br>


    <br>

       
        
      </div>
      <div class="modal-footer">
        <button type="button" style="background:black" class="btn btn-secondary" data-dismiss="modal"><strong>Cerrar</strong></button>
        <button type="button" style="color:white" class="btn btn-warning" @click="guardarJuguete()" v-if="agregando==true"><strong>Guardar</strong></button>
        <button type="button"  style="color:white" class="btn btn-warning" @click="actualizarJuguete()" v-if="agregando==false"><strong>Guardar</strong></button>
      </div>
    </div>
  </div>
</div>
<!--FIN VENTANA MODAL-->

	
</div>
<!-- TERMINA VUE -->

</a>

<br><br><br><br><br>


@endsection

@push('scripts') 
<script type="text/javascript" src="js/vue-resource.js"></script>
<!-- JS del inventario de los Alimentos-->
<script type="text/javascript" src="js/apis/apiInventario.js"></script>
<!-- JS del inventario de la Farmacia-->
<script type="text/javascript" src="js/apis/apiInventario_2.js"></script>
<!-- JS del inventario de la Papeleria-->
<script type="text/javascript" src="js/apis/apiInventario_3.js"></script>
<!-- JS del inventario de los Juguetes-->
<script type="text/javascript" src="js/apis/apiInventario_4.js"></script>

@endpush

<input type="hidden" name="route" value="{{ url('/')}}">