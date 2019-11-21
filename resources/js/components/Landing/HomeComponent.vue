<style lang="scss" scoped>
.chip{
  background: #ffffff5e !important; 
}
.process{
  background: #64b5f6 !important; 
}
button.my-12.v-btn.v-btn--contained.theme--dark.v-size--large.blue.lighten-2 {
    top: 5px;
}
.row.search-bar>div{
    display: flex;
}
.v-input.my-12.theme--light.v-text-field.v-text-field--is-booted.v-text-field--enclosed.v-text-field--outlined {
    margin: 0px 15px;
}
.row.search-bar>div {
    margin: auto;
    width: 500px !important;
}
th{
  font-size: 17px !important;
}
.row{
    margin-bottom: 15px !important;
}
</style>

<template>
<div>
     <v-app light>
   
    <v-content>
      <section>
        <!-- <v-parallax src="img/home-maxres.jpg" height="600"> -->
        <v-parallax class='bg-dark' height="600">
          <v-layout column align-center justify-center class="white--text">
            <img src="img/vy-logo-main.png" alt="VY DOMINGO" height="200">
            <h1 class="white--text mb-2 display-1 text-center">V.Y. DOMINGO JEWELLERS</h1>
            <div class="subheading mb-4 text-center">• MANUFACTURER • WHOLESALER • DESIGNERS</div>
          </v-layout>
           <v-flex class="my-4">
            <div class="text-center">
              <h2 class="headline"><b>Login for the eyes of V.Y. Domingo Sales Officer And Admin</b></h2>
            </div>
          </v-flex>
          <div class="container">
            <div class="row search-bar">
              <div>
                  <input v-model="loginDetails.email" type="email" class="form-control" placeholder="Email ">
                  
                <!-- <v-btn class="my-12" color="blue lighten-2" dark large @click='searchurl()'> Search</v-btn> -->
              </div>
            </div>
             <div class="row search-bar">
              <div>
                  <span class="help-block" v-if="errorsEmail">        
                      {{emailError}}
                    </span>
              </div>
            </div>
            <div class="row search-bar">
              <div>
                  <input v-model="loginDetails.password" type="password" class="form-control" placeholder="Password">
              </div>
            </div>
            <div class="row search-bar">
              <div>
                   <span class="help-block" v-if="errorsPassword">
                        {{passwordError}}
                    </span>
              </div>
            </div>
            <div class="row search-bar">
              <div>
                <!-- <v-btn class="my-12" color="blue lighten-2" dark large @click='searchurl()'> Search</v-btn> -->
                <b-button class="mt-3" block @click="login()">Login</b-button>
              </div>
            </div>
          </div>
        </v-parallax>
      </section>

      <section>
        <v-layout
          column
          wrap
          class="my-12"
        >
         
         
        </v-layout>
      </section>
       <section>
        <v-layout
          column
          wrap
          class="my-12"
        >
          <v-flex xs12 sm4 class="my-4">
            <div class="text-center">
              <h2 class="headline">GET UPDATES ON YOUR ORDERS!</h2>
            </div>
             <div class="container">
            <div class="row search-bar">
              <div>
                <v-text-field v-model="trackcode"  class="my-12" label="Type your customer code assigned to you" outlined></v-text-field>
                <v-btn class="my-12" color="blue lighten-2" dark large @click='searchurl()'> Search</v-btn>
              </div>
            </div>
          </div>
          </v-flex>
              <v-data-table  :headers="headers" :items="dataItems" :search="search" class="elevation-1">
                      <template v-slot:item.jof_status="{ item }" > 
                        <v-chip class="process" v-if="item.jof_status == 'Receiving Section'"> ORDER RECEIVED</v-chip> 
                        <v-chip class="process" v-else-if="item.jof_status == 'Mold Section'" >MOLDING</v-chip>
                        <v-chip class="process" v-else-if="item.jof_status == 'Casting Section'" >CASTING</v-chip>
                        <v-chip class="process" v-else-if="item.jof_status == 'Stone Section'" >STONE SETTING</v-chip>
                        <v-chip class="process" v-else-if="item.jof_status == 'Finishing Section'" >FINISHING</v-chip>
                        <v-chip class="chip" v-else-if="item.jof_status == 'Done'" >DELIVERED</v-chip> 
                        <v-chip class="process" v-else>{{item.jof_status}}</v-chip>
                    </template>
              </v-data-table>
          <v-flex xs12 >
            <v-container grid-list-xl>
              <v-layout row wrap align-center>
                <v-flex xs12 md12>
                  <div class="headline"><b>NOTE: </b>Incase you cannot search the status of your order, please ask our sales officer</div>
                </v-flex>
              </v-layout>
            </v-container>
          </v-flex>
        </v-layout>
      </section>

    </v-content>
  </v-app>
 </div>
</template>

<script>
export default {
   data() {
        return {
            title: '',
            loginDetails: {
                email: '',
                password: '',
                remember: false

            },
            trackcode:'',
            search: '',
            headers:[
            { text: 'Job Order No', value: 'refno',},
            { text: 'Tracking No', value: 'trackingno',},
            { text: 'Kind', value: 'kind_of_ring',  },
            { text: 'Date Prepared', value: 'date_prepared',  },
            { text: 'Due Date', value: 'due_date',  },
            { text: 'Order Status', value: 'jof_status', },
            ],
            dataItems:[],
              signUpDetails:{
                first_name: '',
                last_name: '',
                organization_name:'',
                address: '',
                mobileno: '',
                email: '',
                password: '',
            },
            errorsEmail: false,
            errorsPassword: false,
            emailError: null,
            passwordError: null,
            RegisterEmailErr: false,
            RegisterPasswordErr: false,
            RegisterEmailMsg: false,
            RegisterPasswordMsg: false,
        }
    },
    methods: {
        login(){
            let _self = this;
            axios.post('/login', _self.loginDetails)
            .then((response) => {
                axios.get('/userrole')
                .then((response) => {
                    switch(response.data.role){
                     case 0:
                            location.href = "/systemuser";
                        break;
                    case 1:
                            location.href = "/receiving";
                        break; 
                    case 2:
                            // location.href = "/mold";
                            location.href = "/divisionI";
                        break; 
                    case 3:
                            location.href = "/divisionII";
                            // location.href = "/plastic";
                        break; 
                    case 4:
                            location.href = "/wax";
                        break; 
                    case 5:
                            location.href = "/casting";
                        break; 
                    case 6:
                            location.href = "/salugar";
                        break; 
                    case 7:
                            location.href = "/stone";
                        break; 
                    case 8:
                            location.href = "/finishing";
                        break; 
                    case 9:
                            location.href = "/jofstatus";
                        break; 
                     case 10:
                            location.href = "/releasing";
                        break;
                     case 11:
                            location.href = "/jofexport";
                        break; 
                      case 101:
                            location.href = "/jofstatus";
                        break; 
                      case 30:
                            location.href = "/jofstatus";
                        break; 
                    }
                })
            })
            .catch((error) => {
                var errors = error.response;
                _self.errorsEmail = false;
                _self.errorsPassword = false;

                if(errors.statusText === "Unprocessable Entity" || errors.status === 422){
                    if(errors.data.errors) {
                        
                        if(errors.data.errors.email) {
                            _self.errorsEmail = true;
                            _self.emailError = _.isArray(errors.data.errors.email) ? errors.data.errors.email[0]: errors.data.errors.email;
                           console.log(errors.data.errors.email) 
                        }
                        if(errors.data.errors.password) {
                            _self.errorsPassword = true;
                            _self.passwordError = _.isArray(errors.data.errors.password) ? errors.data.errors.password[0]: errors.data.errors.password;
                        }
                    }
                }
            });
        },
         signUpPost() {
            let _self = this;
            axios.post('/register', _self.signUpDetails)
            .then((response) => {
                location.reload();
            })
            .catch((error)=> {
                var errors = error.response;

                _self.RegisterEmailErr = false;
                _self.RegisterPasswordErr = false;
                
                if(errors.statusText === 'Unprocessable Entity' || errors.status === 422) {
                    if(errors.data.errors) {
                        
                        if(errors.data.errors.email) {
                            _self.RegisterEmailErr = true;
                            _self.RegisterEmailMsg = _.isArray(errors.data.errors.email) ? errors.data.errors.email[0]: errors.data.errors.email;
                        }
                        if(errors.data.errors.password) {
                            _self.RegisterPasswordErr = true;
                            _self.RegisterPasswordMsg = _.isArray(errors.data.errors.password) ? errors.data.errors.password[0]: errors.data.errors.password;
                        }
                    }
                }
            });
        },
        searchurl(){
        axios.get('/getTracking/'+this.trackcode)
          .then((response)=>{
                this.dataItems =  response.data
          })
    }
    }
}
</script>