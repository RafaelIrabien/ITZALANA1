<template>
  <div>
    <!-- INICIA MENU -->
    <div class="row">
      <div class="col-md-12">
        <nav id="menu">
          <ul>
            <li><a id="border" href="#alimentos">Alimentos</a></li>
            <li class="barra">|</li>
            <li><a href="#farmacia">Farmacia</a></li>
            <li class="barra">|</li>
            <li><a href="#papeleria">Papelería</a></li>
            <li class="barra">|</li>
            <li><a href="#jugueteria">Juguetería</a></li>
            <li class="barra">|</li>
          </ul>
        </nav>
      </div>
    </div>
    <!-- TERMINA MENU-->

    <div class="products-table">
      <product-table category="alimentos"></product-table>
      <product-table category="farmacia"></product-table>
      <product-table category="papeleria"></product-table>
      <product-table category="jugueteria"></product-table>
    </div>
  </div>
</template>

<script>
import ProductTable from "./ProductTable.vue";
export default {
  components: {
    ProductTable,
  },
};
</script>

<style scoped>
</style>