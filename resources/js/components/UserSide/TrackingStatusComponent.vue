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
.row.search-bar>div>.v-input.my-12.theme--dark.v-text-field.v-text-field--is-booted.v-text-field--enclosed.v-text-field--outlined {
    margin: 0px 15px;
}
.row.search-bar>div {
    margin: auto;
    width: 500px !important;
}
th{
  font-size: 17px !important;
}
</style>

<template>
<div>
  <v-app light>
    <v-toolbar color="white">
      <v-toolbar-title v-text="title"></v-toolbar-title>
    </v-toolbar>
    <v-content>
      <section>
        <!-- <v-parallax src="img/home-maxres.jpg" height="600"> -->
        <v-parallax class='bg-dark' height="600">
          <v-layout
            column
            align-center
            justify-center
            class="white--text"
          >
            <img src="img/vy-logo-main.png" alt="VY DOMINGO" height="200">
            <h1 class="white--text mb-2 display-1 text-center">V.Y. DOMINGO JEWELLERS</h1>
            <div class="subheading mb-4 text-center">• MANUFACTURER • WHOLESALER • DESIGNERS</div>

           
          </v-layout>
         
        </v-parallax>
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
                <v-text-field v-model="trackcode"  class="my-12" label="Type your customer code assigned to you" outlined dark></v-text-field>
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
                  <div class="headline"><b>NOTE:</b>Incase you cannot search the status of your order, please ask our sales officer</div>
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
  data () {
      return {
          title: '',
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
          dataItems:[]
      }
    },
  methods:{
    searchurl(){
        axios.get('/getTracking/'+this.trackcode)
          .then((response)=>{
                this.dataItems =  response.data
          })
    }

  },
 
}
</script>
