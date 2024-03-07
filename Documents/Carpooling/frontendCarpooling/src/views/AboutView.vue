<script setup>
import { ref } from 'vue';
import axios from 'axios';

const usuario = ref(null)
const contrasena = ref(null)
const nombres = ref(null)
const apellidos = ref(null)
const estamento = ref(1)
const fecha_nacimiento = ref(null)
const errors = ref({})
const flaq = ref(false)


const registrarse =()=>{
  flaq.value = false

axios({
  method: 'post',
  url: 'http://localhost:8000/api/registrar',
  data: {
    usuario: usuario.value,
    contrasena: contrasena.value,
    nombres: nombres.value,
    apellidos: apellidos.value,
    estamento: estamento.value,
    fecha_nacimiento: fecha_nacimiento.value,
    
  }
}).then(function (response) {
  flaq.value=true
   
    console.log(response.data)
  })
  .catch(error => {
    flaq.value=false
            if (error.response.status === 422) {
              console.log(error.response.data)
           
                errors.value = error.response.data
            }
        })
  
  ;



}

</script>


<template>
  <main>
  <h1>Registrarse</h1>

<div v-show="flaq===true" class="alert alert-success" role="alert">
  Usuario registrado
</div>
  
<div class="form-group">
  <label for="exampleInputEmail1">Usuario</label>
  <input v-model="usuario" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introduzca un usuario">
  <span style="color: red;" v-if="errors?.usuario">{{ errors.usuario[0] }}</span>
  
   </div>
<div class="form-group">
  <label for="exampleInputPassword1">Contrase&ntilde;a</label>
  <input v-model="contrasena" type="password" class="form-control" id="exampleInputPassword1" placeholder="Introduzca una contrase&ntilde;a">
  <span style="color: red;" v-if="errors?.contrasena">{{ errors.contrasena[0] }}</span>
</div>

<div class="form-group">
  <label for="exampleInputNombres">Nombres</label>
  <input v-model="nombres" type="text" class="form-control" id="exampleInputNombres" placeholder="Introduzca un nombre">
  <span style="color: red;" v-if="errors?.nombres">{{ errors.nombres[0] }}</span>
</div>

<div class="form-group">
  <label for="exampleInputApellidos">Apellidos</label>
  <input v-model="apellidos" type="text" class="form-control" id="exampleInputApellidos" placeholder="Introduzca un apellido">
  <span style="color: red;" v-if="errors?.apellidos">{{ errors.apellidos[0] }}</span>
</div>

<div class="form-group">
  <label for="exampleInputEstamento">Estamento</label>
  <select v-model="estamento" class="form-control" id="exampleInputEstamento">
    <option value="1">Administrador</option>
    <option value="2">Docente</option>
    <option value="3">Estudiante</option>
    </select>

</div>

<div class="form-group">
  <label for="exampleInputFechaNacimiento">Fecha de Nacimiento</label>
  <input v-model="fecha_nacimiento" type="date" class="form-control" id="exampleInputFechaNacimiento" placeholder="Fecha de nacimiento">
</div>


<button @click.prevent = "registrarse" class="btn btn-primary">Registrarse</button>

</main>
  
</template>

<style>
@media (min-width: 1024px) {
  .about {
    min-height: 100vh;
    display: flex;
    align-items: center;
  }
}
</style>
