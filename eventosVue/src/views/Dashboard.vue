<template>
    <div>
        <Header/>

            <div class="container izquierda">

                 <button class="btn btn-primary" v-on:click="nuevo()" >Nuevo Usuario</button>
                <br><br>
                 <input type="text" v-model="buscador"> <button class="btn btn-success"  v-on:click="search(buscador)">Buscar</button>
                 <br>
                 <br>
                 <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Correo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in Listauser" :key="user.id" v-on:click="editar(user.id)">
                        <th scope="row">{{ user.id}}</th>
                        <td>{{ user.nombres }}</td>
                        <td>{{ user.apellidos }}</td>
                        <td>{{ user.telefono }}</td>
                        <td>{{ user.correo }}</td>                 
                    </tr>
            
                </tbody>
                </table>

            </div>
    </div>
    
</template>
<script>
import Header from '@/components/Header.vue';
import axios from 'axios';
export default {
    name:"Dashboard",
    data(){
        return {
            Listauser:null,
            pagina:1,
            buscador: null
        }
    },
    components:{
        Header,
    },
    methods:{
          
            editar(id){
                this.$router.push('/editar/' + id);
               },
            nuevo(){
                this.$router.push('/nuevo');
             }, 
            search(filter){
                console.log(filter);
                let direccion = `http://127.0.0.1:8000/api/buscador?texto=${filter}`;
                axios.get(direccion).then( data =>{
                //this.search = data.data;
                console.log(data);
                this.Listauser = data.data;
            });
             } 
},
    mounted:function(){
        let direccion = "http://127.0.0.1:8000/api/usuarios/";
        axios.get(direccion).then( data =>{
            this.Listauser = data.data;
        });
    },
    /* mountedSearch:function(){
      let direccion = "http://127.0.0.1:8000/api/buscador";
        axios.get(direccion).then( data =>{
            this.search = data.data;
        });
    }
 */}
</script>
<style  scoped>
    .izquierda{
        text-align: left;
    }
</style>