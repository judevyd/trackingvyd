<style scoped>
    .sidebarBackground{
        background: #343a40;
        top: 179px !important;
        overflow: auto;
        height: 100% !important;
        position: fixed;
    }
    .navList{
        color: white;
        font-size: 16px !important;
    }
   
    .main-container {
        padding: 0px 0px 0px 0px !important;
        margin: 0px;
        max-width: 100%;
    }
    /* LOGO */
    header.m-header>.m-h-img>img {
    width: 250px;
    max-width: 100%;
    }
    header.m-header {
        background: #1a75bc !important;
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
        font-size: 40px;
    }
    .m-title>p:nth-child(2) {
        margin-right: 30px;
        font-size: 20px;
        font-family: Century;
    }
    .m-title>p:nth-child(3) {
        font-family: Century;
        font-weight: bold;
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

.theme--light.v-list {
    height: 800px;
}

        
</style>

<template>
<v-app>
      <header class="m-header">
          <div class="m-h-img">
              <img src="img/vy-logo-header.png" alt="">
          </div>
          <div class="m-title">
              <p>V.Y. Domingo Jewellers</p>
              <p>• Manufacturer • Wholesaler • Designers</p>
          </div>
      </header>
       <!-- <v-app-bar class='v-header' dark prominent absolute >
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      </v-app-bar> -->
    <v-navigation-drawer v-if="role!=101" v-model="drawer" app class='sidebarBackground' absolute >
      <!-- <v-list-item >
        <v-list-item-content ></v-list-item-content>
      </v-list-item>
      <v-divider></v-divider> -->
      <v-list dense nav>
        <div v-if="seen">
        <!-- <v-list-item v-if="role==1"  class='navContent' href='/'>
          <v-list-item-content>
            <v-list-item-title class='navList'>Dashboard</v-list-item-title>
          </v-list-item-content>
        </v-list-item> -->
        <v-list-item v-if="role==0"  class='navContent' @click="getRoute('systemuser')">
          <v-list-item-content>
            <v-list-item-title class='navList'>System Users</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

          <v-list-item class='navContent' v-if="role==0 || role==11" @click="getRoute('jofexport')">
          <v-list-item-content>
            <v-list-item-title class='navList'>7-Day Due Date</v-list-item-title>
          </v-list-item-content>
          </v-list-item>

          <v-list-item v-if="role==0 || role==9 ||  role==1 || role==11" class='navContent' @click="getRoute('jofstatus')">
          <v-list-item-content>
            <v-list-item-title class='navList'>List of Orders</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item v-if="role==0 || role==9 || role==11" class='navContent' @click="getRoute('distributors')">
          <v-list-item-content>
            <v-list-item-title class='navList'>Distributors</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item v-if="role==0 || role==9 || role==11"  class='navContent' @click="getRoute('joforder')">
          <v-list-item-content>
            <v-list-item-title class='navList'>JOF Orders </v-list-item-title>
          </v-list-item-content>
        </v-list-item>
         <v-list-item v-if="role==0 || role==1 || role==11"  class='navContent' @click="getRoute('receiving')">
          <v-list-item-content>
            <v-list-item-title class='navList'>Receiving Section</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-list-item v-if="role==0 || role==2 || role==11"   class='navContent' @click="getRoute('divisionI')">
          <v-list-item-content>
            <v-list-item-title class='navList'>Division I</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
           <v-list-item v-if="role==0 || role==3 || role==11"   class='navContent' @click="getRoute('divisionII')">
          <v-list-item-content>
            <v-list-item-title class='navList'>Division II</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <!-- <v-list-item v-if="role==0 || role==3" class='navContent' href='/plastic'>
          <v-list-item-content>
            <v-list-item-title class='navList'>Plastic Section</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-list-item v-if="role==0 || role==4" class='navContent' href='/wax'>
          <v-list-item-content>
            <v-list-item-title class='navList'>Wax Section</v-list-item-title>
          </v-list-item-content>
        </v-list-item> -->

           <!-- <v-list-item v-if="role==0 || role==5" class='navContent' href='/casting'>
          <v-list-item-content>
            <v-list-item-title class='navList'>Casting Section</v-list-item-title>
          </v-list-item-content>
        </v-list-item> -->

           <!-- <v-list-item v-if="role==0 || role==6" class='navContent' href='/salugar'>
          <v-list-item-content>
            <v-list-item-title class='navList'>Salugar Section</v-list-item-title>
          </v-list-item-content>
        </v-list-item> -->

          <!-- <v-list-item v-if="role==0 || role==7" class='navContent' href='/stone'>
          <v-list-item-content>
            <v-list-item-title class='navList'>Stone Section</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

          <v-list-item v-if="role==0 || role==8" class='navContent' href='/finishing'>
              <v-list-item-content>
                <v-list-item-title class='navList'>Finishing Section</v-list-item-title>
              </v-list-item-content>
            </v-list-item> -->

              <v-list-item v-if="role==0 || role==10" class='navContent' @click="getRoute('divisionIII')">
              <v-list-item-content>
                <v-list-item-title class='navList'>Division III</v-list-item-title>
              </v-list-item-content>
            </v-list-item>

            <v-list-item @click="getRoute('changepass')">
              <v-list-item-content>
                <v-list-item-title class='navList'>Change Password</v-list-item-title>
              </v-list-item-content>
            </v-list-item>
        
       
        <v-list-item class='navContent' href='/logout'>
          <v-list-item-content>
            <v-list-item-title class='navList'>Logout</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        </div>
      </v-list>
    </v-navigation-drawer>
    <v-content class="overflow-hidden">
    <v-container class="main-container" fluid>
      <router-view></router-view>
    </v-container>
    </v-content>

</v-app>
</template>

<script>
export default {
    data(){
        return {
            // items: [
            //     { title: 'Dashboard'},
            //     { title: 'System Users'},
            //     { title: 'Tracking'},
            //     { title: 'Collection Report'},
            //     { title: 'Set Email Template'},
            //     { title: 'Change Password'},
            //     { title: 'History Logs'},
            //     { title: 'Logout'},
            // ],
            right: null,
            drawer: false,
            role:'',
            seen:false
        }
    },
      async mounted(){
        axios.get('/userrole')
        .then((response)=>{
              this.role = response.data.role
              this.seen = true
              if(this.role != 101){
               this.drawer= true
              }
        })
     },
     methods:{
       getRoute(routes){
         switch(routes){
          case 'systemuser':
                this.$router.push('/systemuser')
            break;
          case 'jofexport':
                this.$router.push('/jofexport')
            break;
          case 'jofstatus':
                this.$router.push('/jofstatus')
             break;
          case 'distributors':
                this.$router.push('/distributors')
             break;
          case 'joforder':
                this.$router.push('/joforder')
             break;
          case 'receiving':
                this.$router.push('/receiving')
             break;
          case 'divisionI':
                this.$router.push('/divisionI')
             break;
          case 'divisionII':
                this.$router.push('/divisionII')
             break;
          case 'divisionIII':
                this.$router.push('/dispatching')
             break;
           case 'changepass':
                this.$router.push('/changepass')
             break;
         }
       }
     }
   
}
</script>
