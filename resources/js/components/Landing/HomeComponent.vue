<style scoped>
header.m-header>.m-h-img>img {
    width: 250px;
    max-width: 100%;
}
header.m-header {
    background-color: #1a75bc;
}
header.m-header {
    display: flex;
}
.m-title>p {
    padding: 0px !important;
    margin: 0px !important;
}
.m-title {
    text-align: center;
    margin-top: 10px;
    margin: auto;
    color: white !important;
}
.m-title>p>ul {
    display: inline-flex;
    margin-bottom: 0px !important;
    margin-left: 15px !important;
}
.m-title>p:nth-child(1) {
    font-family: Century;
    font-size: 58px;
}
.m-title>p:nth-child(2) {
    margin-right: 30px;
    font-size: 26px;
    font-family: Century;
}
.m-title>p:nth-child(3) {
    font-family: Century;
    font-weight: bold;
    font-size: 20px;
    margin-top: 5px !important;

}
@media only screen and (max-width: 716px) {
    .m-title>p:nth-child(1) {
        font-size: 34px;
    }
    .m-title>p:nth-child(2) {
        font-size: 16px;
    }

    .m-title>p:nth-child(3) {
        font-size: 14px;
    }

    header.m-header>.m-h-img>img {
        width: 210px;
        max-width: 100%;
    }
}

@media only screen and (max-width: 600px) {
    .m-title>p:nth-child(1) {
        font-size: 26px;
    }
    .m-title>p:nth-child(2) {
        font-size: 14px;
    }
    .m-title>p:nth-child(3) {
        font-size: 12px;
    }

    header.m-header>.m-h-img>img {
        width: 170px;
        max-width: 100%;
    }
}

@media only screen and (max-width: 464px){
    .m-title>p:nth-child(1) {
        font-size: 18px;
    }
    .m-title>p:nth-child(2) {
        font-size: 10px;
    }
    .m-title>p:nth-child(3) {
        font-size: 8px;
    }

    header.m-header>.m-h-img>img {
        width: 140px;
        max-width: 100%;
    }
}

@media only screen and (max-width: 360px) {
    .m-title>p:nth-child(1) {
        font-size: 14px;
    }
    .m-title>p:nth-child(2) {
        font-size: 8px;
    }
    .m-title>p:nth-child(3) {
        font-size: 6px;
    }

    header.m-header>.m-h-img>img {
        width: 110px;
        max-width: 100%;
    }
}
.container {
    border-top: 2px Solid gray;
    max-width: 100%;
    background: white;
}


.row.t-row>.col-md-4.offset-md-8>p {
    text-align: center;
    color: white;
}

.row.t-row>.t-row-2.col-md-7>p {
    text-align: center;
    color: #000304;
    font-family: Arial;
    font-size: 30px;
    font-weight: bold;
}
.embed-responsive.embed-responsive-16by9 {
    border: 1px Solid white;
}

.form-header {
    padding: 8px !important;
    margin: 15px -15px;
    background: #1a75bc;
    text-align: center;
    font-size: 29px;
}

input.form-control {
    background: transparent;
    color: black;
    border-radius: 0px !important;
    border: 2px solid black;
}

.t-row-2.col-md-5>form {
    background: gray;
    padding: 15px;
}

::placeholder {
  color: black;
  opacity: 1; /* Firefox */
}

:-ms-input-placeholder { /* Internet Explorer 10-11 */
 color: black;
}

::-ms-input-placeholder { /* Microsoft Edge */
 color: black;
}

.row.t-row>.col-md-5.offset-md-7 {
    text-align: center;
}

.t-row-2.col-md-5>img {
    border-radius: 30px;
}
.row.t-row>.col-md-5.offset-md-7>p {
    display: inline;
    color: black;
    border: 1px solid;
    padding: 10px;
}

.row.t-row>.col-md-5.offset-md-7>p:hover {
    color: white;
    background: #1a75bc;
    border: 1px solid #1a75bc;
    cursor: pointer;
}

button.btn.mt-3.btn-secondary.btn-block {
    width: 125px;
    margin: auto;
    background: #1a75bc;
    border: 1px solid #1a75bc;
    color: white;
    font-weight: 500;
}

.m-desc.col>p {
    text-align: center;
    color: black;
    margin: 30px 30px;
    font-size: 20px;
}
.gradient-divider {
    background-image: linear-gradient(black, #a2a2a2);
    padding: 10px;
    width: 100%;
}
.t-row-2.col-md-5 {
    margin: auto;
}
.divider {
    color: grey;
    background: grey;
    width: 1px;
    margin: 10px;
}
p.l-row-address {
    margin-top: 15px;
    margin-left: 20px;
}
p.l-row-address-2 {
    margin-top: 15px;
    text-align: center;
}
p.l-row-address-2>span {
   color: black;
    font-size: 26px;
    font-weight: bold;
}
p.l-row-address>span:nth-child(1) {
    color: black;
    font-size: 24px;
}

p.l-row-address>span:nth-child(2) {
   color: black;
}

.l-sm-form>form {
    background: white;
    padding: 10px;
    margin: 15px;
}
.form-group.message-area>textarea.form-control {
    border-radius: 0px;
    border: 2px solid;
}
.contact-info.col {
    margin: auto;
}

.help-block{
    color: #e83530;
}

.t-row-2.col-md-7 {
    margin: auto;
}

</style>



<template>
    <div>
        <header class="m-header">
            <div class="m-h-img">
                <img src="img/vy-logo-header.png" alt="">
            </div>
            <div class="m-title">
                <p>V.Y. Domingo Jewellers</p>
                <p>• Manufacturer • Wholesaler • Designers</p>
            </div>
        </header>
        <b-container class="vy-main-cont">
            <b-row class="t-row">
                <b-col md="5" offset-md="7"><p v-b-modal.modal-1> Login to your account </p></b-col>
                <b-col md="7" class="t-row-2"><p>Get updates on your orders!</p></b-col>
            </b-row>
            <b-row class="m-row">
                <b-col md="7" class="t-row-2">
                    <div>
                        <b-carousel
                            id="carousel-1" :interval="7000" controls indicators background="#ababab" img-width="1024" img-height="480" style="text-shadow: 1px 1px 2px #333;">

                            <!-- Slides with custom text -->
                            <b-carousel-slide img-src="img/FT_1.jpg">
                                <p style="font-size: 26px;">The wax impression of each ring is carefully check, clean and resize to its proper size and weight before costing.</p>
                            </b-carousel-slide>

                              <b-carousel-slide img-src="img/FT_2.jpg">
                                <p style="font-size: 26px;">The process of setting a stone in the ring. All stones are meticulously selected to ensures same sizes and quality.</p>
                            </b-carousel-slide>

                              <b-carousel-slide img-src="img/FT_3.jpg">
                                <p style="font-size: 26px;">Rings are being checked carefully to ensure that all spellings and wordings are correct before smithing.</p>
                            </b-carousel-slide>

                            <b-carousel-slide img-src="img/FT_4.jpg">
                                <p style="font-size: 26px;">Details as to size diameter and proper placement of inserts are accurately done.</p>
                            </b-carousel-slide>
                              
                            <b-carousel-slide img-src="img/FT_5.jpg">
                                <p style="font-size: 26px;">Soldering inserts in the shank are manually done to make sure that inserts are correctly positioned.</p>
                            </b-carousel-slide>

                            <b-carousel-slide img-src="img/FT_6.jpg">
                                <p style="font-size: 26px;">The process of creating / producing of mother mold to ensure the accurate output of the exact weight, dimension, size and wordings in the ring.</p>
                            </b-carousel-slide>

                            </b-carousel>
                    </div>
                </b-col>
                <b-col md="5" class="t-row-2">
                     <b-col class="m-desc"><p>Welcome to V.Y.Domingo Jewellers Incorporated.<br>
                    World famous for customized and personalized Jewelry.<br>
                    We are the largest manufacturer ,supplier and exporter of Class Rings, Military Rings, Corporate Award Jewelry,<br>
                    Name Jewelry and Championship/Sports Rings from the Philippines to the whole World.<br>
                    Our excellent workmanship is the trademark of truly successful International Jewelry brands Worldwide.<br>
                    Our pieces are carefully handcrafted with masterpieces produced by our artisans and designers.<br>
                    Lowest Pricing – Direct Manufacturer Prices<br>
                    and Best Quality Assurance !<br>
                    Quality and Service is our Mission !<br>
                    Customer Satisfaction is our GOAL!</p></b-col>
                </b-col>
            </b-row>
           <b-modal hide-footer id="modal-1" title="Login">
                            <div class="form-group">
                                <input v-model="loginDetails.email" type="email" class="form-control" placeholder="Email ">
                                <span class="help-block" v-if="errorsEmail">
                                        {{emailError}}
                                </span>
                            </div>
                            <div class="form-group">
                                <input v-model="loginDetails.password" type="password" class="form-control" placeholder="Password">
                                <span class="help-block" v-if="errorsPassword">
                                    {{passwordError}}
                                </span>
                            </div>
                                <!-- <label for="forgot-password">Forgot Password?</label> -->
                            <b-button class="mt-3" block @click="login()">Login</b-button>
                        </b-modal>
            <b-row class="l-row">
                <b-col class="contact-info">
                    <div>
                        <p class="l-row-address">
                        <span for="address">Address <br></span>
                        <span for="address">#35 Emerald Street, Millionaires Village, <br> Novaliches, Quezon City, Philippines, 1117</span>
                        </p>
                    </div>
                    <div>
                        <p class="l-row-address">
                        <span for="address">Let's Talk <br></span>
                        <span for="address">(632) 938-4221</span>
                        </p>
                    </div>
                     <div>
                        <p class="l-row-address">
                        <span for="address">Sales Support <br></span>
                        <span for="address">vydomingo@gmail.com</span>
                        </p>
                    </div>
                </b-col>
            </b-row>
        </b-container>
    </div>
</template>

<script>
export default {
   data() {
        return {
            loginDetails: {
                email: '',
                password: '',
                remember: false

            },
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
        }
    }
}
</script>