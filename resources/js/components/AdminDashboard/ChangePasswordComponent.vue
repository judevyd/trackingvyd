.<style lang="scss" scoped>
.card-title{
      background-color: #fb8f0a;
}
label.cmp {
    font-size: 30px;
    font-weight: 600;
    color: #1a75bc;
}

</style>

<template>
    <div>
     <v-stepper v-model="e1">
    <v-stepper-header class="card-title">
      <v-stepper-step :complete="e1 > 1" step="1">Current Password</v-stepper-step>
      <v-divider></v-divider>
      <v-stepper-step :complete="e1 > 2" step="2">Set New Password</v-stepper-step>
      <v-divider></v-divider>
      <v-stepper-step step="3">Complete</v-stepper-step>
    </v-stepper-header>

    <v-stepper-items>

      <v-stepper-content step="1">
         <v-card flat height="100px" class="mb-12">
           <v-alert type="error" v-show="alert.value == true">{{alert.error}}</v-alert>
           <v-alert type="error" v-show="alert.value2 == true">{{alert.error2}}</v-alert>
            <v-text-field v-model="login.current_password" prepend-icon="lock" name="Password" label="Enter Current Password" type="password" 
            :rules="[rules.required, rules.min]">
            </v-text-field>
          </v-card>
        <v-btn color="primary" @click="verifylogin"> Verify</v-btn>
      </v-stepper-content>

      <v-stepper-content step="2">
         <v-card flat height="200px" class="mb-12">
           <v-alert type="error" v-show="alert2.value == true">{{alert2.error}}</v-alert>
            <v-text-field prepend-icon="lock" v-model="editedPassword.newpass" name="Password" label="New Password" type="password" :rules="[rules.required, rules.min]"></v-text-field>
            <v-text-field prepend-icon="lock" v-model="editedPassword.confirm_password" name="Password" label="Confirm New Password" type="password"></v-text-field>
          </v-card>
        <v-btn color="primary" @click="changepassword" >Change Password</v-btn>
      </v-stepper-content>

      <v-stepper-content step="3">
         <v-card flat height="100px" class="mb-12">
           <label class="cmp">Your Password Succesfully Updated!</label>
           <p>Please click the "Reload" button to apply change password</p>
          </v-card>
        <v-btn color="primary" @click="completeChangePassword" >Reload</v-btn>

        <v-btn text>Cancel</v-btn>
      </v-stepper-content>

    </v-stepper-items>
  </v-stepper>
    
</div>
</template>

<script>
export default {
  data () {
      return {
        rules: {
          required: value => !!value || 'Required.',
          min: v => v.length >= 6 || 'Min 6 characters',
          // emailMatch: () => ('The email and password you entered don\'t match'),
        },
        alert: {
          value: false,
          value2: false,
          error: '',
          error2: '',
          },
        alert2: {
          value:false,
          error:'',
        },
        login:{
          current_password:'',
        },
        editedPassword:{
          newpass:'',
          confirm_password:''
        },  
        e1: 0,
      }
    },
  methods:{
    verifylogin(){
      axios.post('/changepass/1',this.login)
      .then((res)=>{
        
        if(res.data == 'Confirmed'){
          this.e1 = 2
            console.log(this.e1)
              }else if(res.data == 'error'){
                this.alert.value = true    
                this.alert.value2 = false
                this.alert.error = 'Please Enter Your Valid Password'    
              }else if(res.data == 'empty' ){
                console.log(res.data)
                this.alert.value = false
                this.alert.value2 = true
                this.alert.error2 = 'Please Enter Your Current Password'    
              }
        })
    },
    changepassword(){
      if(this.editedPassword.newpass === this.editedPassword.confirm_password){
        axios.post('/changepass/2',this.editedPassword)
          .then((res)=>{
            if(res.data == 'Change Password Confirmed'){
              this.e1 = 3
            }else if(res.data == 'empty'){
              this.alert2.value = true              
              this.alert2.error = 'Please Enter Your Current Password'              
            }
        })
      }else{
        this.alert2.value = true;
        this.alert2.error = 'password did not match';
      }
    },
    completeChangePassword(){
      location.href='/changepass'
    }

  },
 
}
</script>

