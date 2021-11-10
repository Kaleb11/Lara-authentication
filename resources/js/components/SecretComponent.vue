<template>
    <div class="container">
    <!--- Login form --->
    <div class="row mt-4" v-if="!secrets.length">
      <div class="col-6 offset-3">
          <form action="#" @submit.prevent="handleLogin">
              <h3>Signin for secret</h3>
             <div class="form-row">
                 <input type="email" name="email" class="form-control" v-model="formData.email" placeholder="Email Address">
             </div>
              <div class="form-row">
                 <input type="password" name="password" class="form-control" v-model="formData.password" placeholder="Password">
             </div>
              <div class="form-row">
                 <button type="submit" class="btn btn-primary">Signin</button>
             </div>
          </form>
      </div>
    </div>
    <!--- Secret list --->
    <div class="row mt-4" v-if="secrets.length">
        <div class="col-6 offset-3">
            <h3>My secrets</h3>
            <div class="secret" v-for="{secret,index} in secrets" :key="index">
                <em v-text="secret.created_at"></em><br>
                <strong v-text="secret.secret"></strong>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
    export default {
       data(){
           return{
               secrets:[],
               formData:{
                   email:'',
                   password:'',
               }
           }
       },
       methods:{
           handleLogin(){
             axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/login',this.formData).then(response =>{
                    this.getSecrets();
                });
    
              });
           },
           getSecrets(){
               axios.get('/api/secrets').then(response=>{
                   console.log(response);
                   this.secrets = response.data;
               });
           }
       }
    }
</script>
<style>
  .form-row {
   margin-bottom: 8px;
   }
</style>