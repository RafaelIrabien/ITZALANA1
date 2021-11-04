<template>
  <div class="row" :id="category">
    <div class="col-md-12 product-section">
      <div class="card card-warning">
        <div class="card-header">
          <h2 style="color: white">
            <strong>{{ category }}</strong>
            <samp style="font-size: 21px" @click="mostrarModal()">
              <button
                class="btn btn-dark btn-lg"
                data-toggle="modal"
                data-target="#modalJuguete"
              >
                <i class="fas fa-cart-plus"></i> Agregar Producto
                <i class="fas fa-cart-plus"></i>
              </button>
            </samp>

            <div class="row">
              <i class="fas fa-filter" style="color: black"></i>
              <div class="col-md-6">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Escriba el nombre del producto"
                  v-model="buscar"
                />
              </div>
            </div>
          </h2>
        </div>
        <div class="card-body">
          <!--INICO DE LA TABLA-->
          <table class="table table-bordered text-center">
            <thead>
              <th hidden="">ID ALUMNO</th>

              <th style="background-color: #ffc000">
                <h5><strong>Nombre</strong></h5>
              </th>
              <th style="background-color: #ffc000">
                <h5><strong>Descripción</strong></h5>
              </th>
              <th style="background-color: #ffc000">
                <h5><strong>Precio</strong></h5>
              </th>
              <th style="background-color: #ffc000">
                <h5><strong>Cantidad disponible</strong></h5>
              </th>
              <th style="background-color: #ffc000">
                <h5><strong>Acciones</strong></h5>
              </th>
            </thead>

            <tbody>
              <tr v-for="producto in filtroProductos" :key="producto.id">
                <td hidden="">{{ producto.id }}</td>

                <td>{{ producto.nombre }}</td>
                <td>{{ producto.descripcion }}</td>
                <td>$ {{ producto.precio_venta }}</td>
                <td>{{ producto.cantidad }}</td>

                <td style="background-color: #ffd961">
                  <button
                    class="btn btn-xm"
                    @click="editandoProducto(producto.id)"
                  >
                    <i class="fas fa-edit"></i>
                  </button>

                  <button
                    class="btn btn-xm"
                    @click="eliminarProducto(producto.id)"
                  >
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

    <!-- INICIA VENTANA MODAL -->
    <div
      class="modal fade"
      id="modalJuguete"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #ffffc5">
          <div class="modal-header">
            <h5
              class="modal-title"
              id="exampleModalLabel"
              v-if="agregando == true"
            >
              AGREGANDO PRODUCTO
            </h5>
            <h5
              class="modal-title text-center"
              id="exampleModalLabel"
              v-if="agregando == false"
            >
              EDITANDO PRODUCTO
            </h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input
              type="text"
              class="form-control"
              placeholder="Nombre del producto"
              v-model="nombre"
            /><br />
            <input
              type="text"
              class="form-control"
              placeholder="Descripción"
              v-model="descripcion"
            /><br />
            <input
              type="number"
              class="form-control"
              placeholder="Precio"
              v-model="precio_venta"
            /><br />
            <input
              type="number"
              class="form-control"
              placeholder="Cantidad"
              v-model="cantidad"
            /><br />

            <br />
          </div>
          <div class="modal-footer">
            <button
              type="button"
              style="background: black"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
              <strong>Cerrar</strong>
            </button>
            <button
              type="button"
              style="color: white"
              class="btn btn-warning"
              @click="guardarJuguete()"
              v-if="agregando == true"
            >
              <strong>Guardar</strong>
            </button>
            <button
              type="button"
              style="color: white"
              class="btn btn-warning"
              @click="actualizarJuguete()"
              v-if="agregando == false"
            >
              <strong>Guardar</strong>
            </button>
          </div>
        </div>
      </div>
    </div>
    <!--FIN VENTANA MODAL-->
  </div>
</template>

<script>
export default {
  props: {
    category: {
      required: true,
    },
  },

  data() {
    return {
      filtroProductos: [
        {
          id: 1,
          nombre: "Manzana",
          descripcion: "Rojos y feos",
          precio_venta: 12,
          cantidad: 7,
        },
        {
          id: 2,
          nombre: "Pera",
          descripcion: "Verdes y bonitas",
          precio_venta: 12,
          cantidad: 7,
        },
        {
          id: 3,
          nombre: "Vacuna covid-19",
          descripcion: "No exponer a red 5G",
          precio_venta: 12,
          cantidad: 7,
        },
        {
          id: 4,
          nombre: "Algo",
          descripcion: "Verde",
          precio_venta: 12,
          cantidad: 7,
        },
        {
          id: 5,
          nombre: "Xbox 360 chipeada",
          descripcion: "2hrs de garantía",
          precio_venta: 12,
          cantidad: 7,
        },
      ],
    };
  },
};
</script>

<style scoped>
strong {
  text-transform: capitalize;
}

.product-section {
  padding-top: 100px;
}
</style>