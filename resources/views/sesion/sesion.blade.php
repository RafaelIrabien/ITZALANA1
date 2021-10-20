@extends('layout.index')
@section('titulo', 'ITZALANA')
@section('contenido')
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sesión</title>

	<link rel="stylesheet" href="css/sesion.css">
</head>
<body>
	<div class="fondoi">
	<div class="imagen">
	<i class="fa fa-user-circle"></i>
	
</div>
</div>

<br><br>

<div id="usuario">
   <table  class="table table-bordered text-center">
    <thead>
    	<th style="background-color:#FFC000">Nombre</th>
    	<th style="background-color:#FFC000">Correo electrónico</th>
    	
    	
    </thead>

    <tbody>
		<tr v-for="(u,index) in users">
			<td hidden="">@{{u.id}}</td>
				
			<td  >@{{u.name}}</td>
			<td  >@{{u.email}}</td>
		    
		</tr>
	</tbody>

   </table>
   	
  
</div>


</body>
@endsection

@push('scripts')
<script type="text/javascript" src="js/vue-resource.js"></script>
<script type="text/javascript" src="js/apis/apiUsuario.js"></script>


@endpush
<input type="hidden" name="route" value="{{ url('/')}}">



</html>






