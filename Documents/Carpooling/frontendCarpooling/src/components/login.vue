<script setup>
import axios from "axios"
import { ref } from "vue";

const usuario = ref(null)
const contrasena = ref(null)
const mensaje = ref(null)
const flaq = ref(null)


const ingresar =()=>{

axios({
  method: 'post',
  url: 'http://localhost:8000/api/login',
  data: {
    usuario: usuario.value,
    contrasena: contrasena.value
  }
}).then(function (response) {
    mensaje.value = response.data.msg
    flaq.value = response.data.flaq
    console.log(response.data)
  });



}

</script>


<template>
<h1>Ingresar</h1>

  <div class="form-group">
    <label for="exampleInputEmail1">Usuario</label>
    <input v-model="usuario" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introduzca un usuario">
     </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Contrase&ntilde;a</label>
    <input v-model="contrasena" type="password" class="form-control" id="exampleInputPassword1" placeholder="Introduzca una contrase&ntilde;a">
  </div>
 
  <button @click.prevent = "ingresar" class="btn btn-primary">Ingresar</button>



<div v-show="flaq===true" class="alert alert-success" role="alert">
 {{ mensaje }}
</div>
<div v-show="flaq===false" class="alert alert-danger" role="alert">
  {{ mensaje }}
</div>



</template>