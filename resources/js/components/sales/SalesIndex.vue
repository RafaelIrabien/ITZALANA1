<template>
  <div id="venta">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="input-group mb-3">
            <input
              type="text"
              placeholder="Escribe el código del producto"
              aria-label="Recipient's username"
              class="form-control"
              aria-describedby="basic-addon2"
              v-on:keyup.enter="buscarProducto()"
            />
            <div class="input-group-append">
              <button
                class="btn btn-primary"
                type="button"
                @click="buscarProducto()"
              >
                Buscar
              </button>
            </div>
          </div>
        </div>
      </div>
      <!--INICO DE LA TABLA-->

      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <table class="table table-bordered text-center">
                <thead style="background-color: #ffc000">
                  <th>SKU</th>

                  <th>
                    <h5><strong>Nombre</strong></h5>
                  </th>
                  <th>
                    <h5><strong>Descripción</strong></h5>
                  </th>
                  <th>
                    <h5><strong>Precio</strong></h5>
                  </th>
                  <th>
                    <h5><strong>Cantidad</strong></h5>
                  </th>
                  <th>
                    <h5><strong>Descuento</strong></h5>
                  </th>
                  <th>
                    <h5><strong>Total</strong></h5>
                  </th>
                  <th>
                    <h5><strong>Acciones</strong></h5>
                  </th>
                </thead>

                <tbody>
                  <tr v-for="product in cart" :key="product.sku">
                    <td>{{ product.sku }}</td>

                    <td style="background-color: #ffffc5">
                      {{ product.nombre }}
                    </td>
                    <td style="background-color: #ffffc5">
                      {{ product.descripcion }}
                    </td>
                    <td style="background-color: #ffffc5">
                      $ {{ product.precio_venta }}
                    </td>
                    <td style="background-color: #ffffc5">
                      <input type="number" style="width: 60px" />
                    </td>
                    <td style="background-color: #ffffc5">
                      <input
                        type="number"
                        placeholder="0"
                        style="width: 60px"
                      />
                    </td>

                    <td id="resul">$2</td>
                    <td style="background-color: #ffd961">
                      <button class="btn btn-xm">
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

      <hr />
      <!-- ABALA DEL TOTAL -->
      <div class="row">
        <div class="col-md-8"></div>
        <div class="card">
          <div class="card-body">
            <div class="col md-4">
              <table class="table table-bordered table-condensed">
                <tr>
                  <th style="background: #ffff66">SUBTOTAL</th>
                  <td>${{ "subtotal" }}</td>
                </tr>

                <tr>
                  <th style="background: #ffff66">ARTICULOS</th>
                  <td>{{ "NoArticulos" }}</td>
                </tr>

                <!--	<tr>
							<th style="background: #ffff66">SIN DESCUENTO</th>
							<td>@{{total_sin_descuento}}</td>
						</tr>  -->
              </table>

              <button
                id="vender"
                style="height: 40px"
                type="button"
                class="btn btn-warning btn-xm btn-block"
              >
                <i class="fas fa-cart-arrow-down"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!--FIN DE LA TABLA DEL TOTAL -->
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      cart: [], // Productos agregados al carrito
    };
  }, // end data

  methods: {
    buscarProducto() {
      var p = {
        params: {
          sku: "666",
        },
      };
      axios.get("/search-product", p).then((response) => {
        this.cart.push(response.data);
      });
    },
  }, // end methods
};
</script>

<style>
</style>