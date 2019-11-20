<style scoped>
.theme--light.v-data-table {
    background-color: #fff;
    color: rgba(0,0,0,.87);
    margin: 10px;
}
.textpads{
    padding: 5px;
    color: white;
    margin: 5px 10px;
}
.bg-warning{
  color:black !important;
}
.v_img{
  cursor: pointer !important;
}
.file-upload-form, .image-preview {
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    padding: 20px;
}
img.preview {
    width: 200px;
    background-color: white;
    border: 1px solid #DDD;
    padding: 5px;
}
.image-preview {
    width: 100%;
    max-width: 600px;
    margin: auto;
}

.trans{
  -webkit-animation: NAME-YOUR-ANIMATION 1s infinite;  /* Safari 4+ */
  -moz-animation: NAME-YOUR-ANIMATION 1s infinite;  /* Fx 5+ */
  -o-animation: NAME-YOUR-ANIMATION 1s infinite;  /* Opera 12+ */
  animation: NAME-YOUR-ANIMATION 1s infinite;  /* IE 10+, Fx 29+ */
}

@keyframes NAME-YOUR-ANIMATION {
  0%, 49% {
    background-color: transparent;
    /* border: 3px solid #e50000; */
  }
  50%, 100% {
    background-color: #e50000;
  }
}

.radiOPTS {
    margin-top: 5px;
    margin-left: 10px;
}

/* 2 DAYS */
.transyellow{
  -webkit-animation: YELLOW-ANIMATION 1s infinite;  /* Safari 4+ */
  -moz-animation: YELLOW-ANIMATION 1s infinite;  /* Fx 5+ */
  -o-animation: YELLOW-ANIMATION 1s infinite;  /* Opera 12+ */
  animation: YELLOW-ANIMATION 1s infinite;  /* IE 10+, Fx 29+ */
}

@keyframes YELLOW-ANIMATION {
  0%, 49% {
    background-color: transparent;
    /* border: 3px solid #e50000; */
  }
  50%, 100% {
    background-color: #ffc107;
  }
}
/* 4DAYS */
.transblue{
  -webkit-animation: BLUE-ANIMATION 1s infinite;  /* Safari 4+ */
  -moz-animation: BLUE-ANIMATION 1s infinite;  /* Fx 5+ */
  -o-animation: BLUE-ANIMATION 1s infinite;  /* Opera 12+ */
  animation: BLUE-ANIMATION 1s infinite;  /* IE 10+, Fx 29+ */
}

@keyframes BLUE-ANIMATION {
  0%, 49% {
    background-color: transparent;
    /* border: 3px solid #e50000; */
  }
  50%, 100% {
    background-color: #17a2b8;
  }
}

/* 6 days */
.transgreen{
  -webkit-animation: GREEN-ANIMATION 1s infinite;  /* Safari 4+ */
  -moz-animation: GREEN-ANIMATION 1s infinite;  /* Fx 5+ */
  -o-animation: GREEN-ANIMATION 1s infinite;  /* Opera 12+ */
  animation: GREEN-ANIMATION 1s infinite;  /* IE 10+, Fx 29+ */
}

@keyframes GREEN-ANIMATION {
  0%, 49% {
    background-color: transparent;
    /* border: 3px solid #e50000; */
  }
  50%, 100% {
    background-color: #28a745;
  }
}
.not_special{
   background-color: #e0e0e000 !important;
}
.bg-dark {
    color: #ffc107 !important;
}
.bg-done{
  background-color:#738c86;
}
.bg-pending{
  background-color:#2b986e;
}
.legends {
    margin-left: 23px;
    padding-top: 10px;
}
th {
    font-size: 17px !important;
}
span.fb-sales {
    font-size: 20px !important;;
    font-weight: bold;
    color: #007cb9;
}

</style>


<template>
<div>
      <v-toolbar flat color="white">
        <v-toolbar-title>LIST OF ORDERS - JOB ORDER FORM (JOF)</v-toolbar-title>
        <v-divider class="mx-4" inset vertical></v-divider>
        <v-text-field v-model="search" append-icon="search" label="Search" single-line hide-details></v-text-field>
      <v-spacer></v-spacer>
       <v-btn color="primary" v-on:click="printstatus()" dark class="mb-2">PRINT JOF LIST</v-btn>
      <!-- Modal Tracking -->
      <v-dialog v-model="tracking">
            <v-data-table :headers="trackingHeader" :items="trackingItems" class="elevation-1" loading="true">
            </v-data-table>
        </v-dialog>
      <!-- Modal JOF Details -->
        <v-dialog v-model="details">
              <v-card>
              <v-card-title>
                <span class="headline">JOF Details</span>
                <v-flex xs11></v-flex>
              </v-card-title>
            <v-card-text>
              <v-container grid-list-md>
                <v-layout wrap>
                   <v-flex xs12>Kind of Ring: <label>{{detailItems.kind_of_ring}}</label></v-flex>
                   
                    <v-flex xs6>Stone: <label>{{detailItems.stone}}</label></v-flex>
                    <v-flex xs6>Ring Size: <label>{{detailItems.ring_size}}</label></v-flex>
                    <v-flex xs6>Bridge: <label>{{detailItems.bridge}}</label></v-flex>
                    <v-flex xs6>Year: <label>{{detailItems.year}}</label></v-flex>
                    <v-flex xs6>Weight: <label>{{detailItems.weight}}</label></v-flex>
                    <v-flex xs6>Karat: <label>{{detailItems.karat}}</label></v-flex>
                    <v-flex xs6>Oxidation: <label>{{detailItems.oxidation}}</label></v-flex>
                    <v-flex xs6>Text Style: <label>{{detailItems.text_style}}</label></v-flex>
                    <v-flex xs6>Inside Engrave: <label>{{detailItems.inside_engrave}}</label></v-flex>
                    <v-flex xs6>Quantity: <label>{{detailItems.quantity}}</label></v-flex>
                   <!-- Shanks -->
                    <v-flex xs12>
                      <v-card>
                        <v-card-title>
                            <span class="headline">Shanks</span>
                          </v-card-title>
                          <v-card-text>
                            <v-container grid-list-md>
                                <v-layout wrap>
                                    <v-flex xs4><label>LEFT SHANK</label></v-flex>
                                    <v-flex xs4><label>TOP SHANK</label></v-flex>
                                    <v-flex xs4><label>RIGHT SHANK</label></v-flex>
                                     <v-flex xs4><label>{{detailItems.left_shank}}</label></v-flex>
                                    <v-flex xs4><label>{{detailItems.top_shank}}</label></v-flex>
                                    <v-flex xs4><label>{{detailItems.right_shank}}</label></v-flex>
                                </v-layout>
                            </v-container>
                          </v-card-text>
                      </v-card>
                    </v-flex>
                </v-layout>
              </v-container>
            </v-card-text>
          </v-card>
        </v-dialog>
        <!-- Modal JOF Details End -->


<!-- Modal JOF Details -->
        <v-dialog v-model="jof_form">
      <v-btn color="primary" @click.native="print">Print</v-btn>
        <div class="container-fluid" id="printjof">
        <div class="card">
            <div class="card-header">
              Order Details
            </div>
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6 order-no">
                          <div><span class="jof-no">Order type: {{detailItems.kind_of_order}}</span></div>
                        </div>
                        <div class="col-6 jof-no-div">
                            <div><span class="jof-no">JOF#: {{detailItems.jofno}}</span></div>
                            <div><span class="due-date">Due Date : {{detailItems.due_date}}</span></div>
                            <div><span class="fb-sales">{{detailItems.fb_sales_name}}</span></div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-2 order-details">
                            <div>Distributor: </div> 
                            <div>Customer Name:</div> 
                            <div>Order Name:</div> 
                        </div>
                        <div class="col-4 order-details">
                            <div>{{detailItems.distributor_code}}</div>
                            <div>{{detailItems.customer_name}}</div>
                            <div>{{detailItems.orderno}}</div>

                        </div>
                        <div class="col-2 order-details">
                            <div>Date Prepared: </div> 
                            <div>Due Date:</div> 
                            <div>Prepared By:</div> 
                        </div>
                        <div class="col-4 order-details">
                            <div>{{detailItems.date_prepared}}</div>
                            <div>{{detailItems.due_date}}</div>
                            <div>{{detailItems.created_by}}</div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-2 order-details">
                            <div>Kind : </div> 
                        </div>
                        <div class="col-4 order-details">
                            <div>{{detailItems.kind_of_ring}}</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2 ring-details">
                            <div>Stone : </div> 
                            <div>Ring Size :</div> 
                            <div>Text Style :</div> 
                            <div>Inside Engrave :</div>

                        </div>
                        <div class="col-4 ring-details">
                            <div>{{detailItems.stone}}</div>
                            <div>{{detailItems.ring_size}}</div>
                            <div>{{detailItems.text_style}}</div>
                            <div>{{detailItems.inside_engrave}}</div>

                        </div>
                        <div class="col-2 ring-details">
                           <div>Metal :</div> 
                            <div>Karat :</div> 
                            <div>Weight :</div> 
                            <div>Oxidation :</div>
                        </div>
                        <div class="col-4 ring-details">
                            <div>{{detailItems.metal}}</div>
                            <div>{{detailItems.karat}}</div>
                            <div>{{detailItems.weight}}</div>
                            <div>{{detailItems.oxidation}}</div>
                        </div>
                    </div>
                    <br>
                    <div class="row shank-details-hdr">
                        <div class="col shanks-details">
                         Left Shank
                        </div>
                        <div class="col shanks-details">
                         Top Details
                        </div>
                        <div class="col shanks-details">
                         Right Shank
                        </div>
                    </div>
                    <div class="row shank-details-body">
                        <div class="col shanks-details">
                        {{detailItems.left_shank}}
                        </div>
                        <div class="col shanks-details">
                         {{detailItems.top_shank}}
                        </div>
                        <div class="col shanks-details">
                         {{detailItems.right_shank}}
                        </div>
                    </div>
                    <br>
                    <div class="row ring-att">
                        <div class="col remarks">REMARKS :{{detailItems.attach_remarks}}</div>
                    </div>
                    <div class="row ring-attachment">
                        <div class="col-2"></div>
                        <div class="col-8 ring-img"><img :src="detailItems.upload_image" class="img-fluid" alt="Ring Image"></div>
                        <div class="col-2"></div>
                    </div>
                    <br><br>
                    <div class="row foot-remarks">
                        <div class="col">
                            <div>Receiving</div>
                            <div>Mould</div>
                            <div>Plastic</div>
                            <div>Metal</div>
                            <div>Wax</div>
                            <div>Treeing</div>
                            <div>Casting</div>
                        </div>
                        <div class="col">
                            <div>Smithing</div>
                            <div>Pre-Polishing</div>
                            <div>Stone Setting</div>
                            <div>Final Polish</div>
                            <div>Finishing</div>
                            <div>Dispatching</div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
      </div>
        </v-dialog>
  <!-- Modal JOF Details End -->
      </v-toolbar>
        <v-card id="print" hidden>
            <v-card-text>
                <v-data-table
                    :headers="Printheaders"
                    :items="dataItems"
                    :search="search" hide-default-footer
                    :disable-pagination="true"
                    id='printlist'
                >
                </v-data-table>
            </v-card-text>
        </v-card>
      <v-data-table :headers="headers" :items="dataItems" :search="search" class="elevation-1"  :footer-props="{
    'items-per-page-options': [10, 25, 30, 40, 50]
  }"
  :items-per-page="25">
        <template v-slot:top>
           <div class="legends">
             <input type="radio" name="optradio" v-on:click="displayData('All')" :checked='radiobtns.pending'><label class=' bg-pending textpads'>Pending JOF Order</label>
            <input type="radio" name="optradio" v-on:click="displayData('Done')" :checked='radiobtns.delivered'> <label class='bg-done textpads'>Done</label>
            <label class=' bg-warning textpads'>2 Days Delay in Division III</label>
            <label class='bg-info textpads'>2 Days Delay in Divison I or Division II</label>
            <!-- <label class='bg-success textpads'>6+ Days Delay</label> -->
            <label class='bg-danger textpads'>7 Days Before Due Date</label>
            <label class='bg-dark textpads'>Special Order</label>
            </div>
          <!-- <div class="radiOPTS">
            <input type="radio" name="optradio" v-on:click="displayData('All')" :checked='radiobtns.pending'><label class=' bg-primary textpads'>Pending JOF Order</label>
            <input type="radio" name="optradio" v-on:click="displayData('Done')" :checked='radiobtns.delivered'> <label class='bg-done textpads'>Done</label>
          </div> -->
        </template>
            <template v-slot:item.jofno="{ item }"> 
            <v-chip v-if="item.sp_order==1" class="bg-dark" > {{ item.jofno }}</v-chip> 
            <v-chip v-else class="not_special"> {{ item.jofno }}</v-chip> 
          </template>
          <template v-slot:item.due_date="{ item }" > 
            <v-chip v-if="item.jof_status == 'Done'"> {{ item.due_date }}</v-chip> 
            <v-chip v-if="item.jof_status != 'Done'"  :class="getColor(item)" > {{ item.due_date }}</v-chip> 
        </template>
         <template v-slot:item.view_details="{ item }" > 
            <v-chip v-on:click="openJOF(item)">View JOF</v-chip> 
        </template>
         <template v-slot:item.jofaction="{ item }">
          <v-chip v-on:click="getJOFhistory(item)"> JOF HISTORY</v-chip> 
        </template>
         
  </v-data-table>
  </div>
</template>

<script>
  export default {
    data: () => ({
      printdialog:false,
      search: '',
      tracking:false,
      details:false,
      jof_form: false,
      headers: [
        { text: 'JOF#', value: 'jofno',  },
        { text: 'Prepared by', value: 'created_by',  },
        { text: 'Order Type', value: 'kind_of_order',  },
        { text: 'JOB Order#', value: 'refno',  },
        { text: 'Distributor Code', value: 'distributor_code',  },
        { text: 'Customer Name', value: 'customer_name',  },
        { text: 'Date Prepared', value: 'date_prepared',  },
        { text: 'Due Date', value: 'due_date',  },
        { text: 'JOF Status', value: 'jof_status', },
        { text: 'View Details', value: 'view_details', },
        { text: 'JOF History',value: 'jofaction', sortable: false },

      ],
      Printheaders: [
        { text: 'JOF#', value: 'jofno',  },
        { text: 'Prepared by', value: 'created_by',  },
        { text: 'Order Type', value: 'kind_of_order',  },
        { text: 'JOB Order#', value: 'refno',  },
        { text: 'Distributor Name', value: 'distributor_name',  },
        { text: 'Kind of Ring', value: 'kind_of_ring',  },
        { text: 'Date Prepared', value: 'date_prepared',  },
        { text: 'Due Date', value: 'due_date',  },
        { text: 'JOF Status', value: 'jof_status', },
      ],
      trackingHeader:[
        { text: 'JOF#', value: 'jofno',  },
        { text: 'Kind of Ring', value: 'kind_of_ring',  },
        { text: 'Event Date', value: 'event_time',  },
        { text: 'JOF Status', value: 'jof_status', },
      ],
      dataItems:[],
      detailItems:[],
      trackingItems:[],
      jofData:{
          Delivered:[],
          Pending:[],
      },
      radiobtns:{
        pending:true,
        delivered:false
      }
    }),
    
    computed: {
   
    },
      dialog (val) {
        val || this.close()
      },
    created(){
      //  var pusher = new Pusher('anykey');
      //  var channel = pusher.subscribe('JOFStatus');

        // Echo.channel('JOFStatus')
        //   .listen('joforder', (e) => {
        //       console.log(e);
        //   });
    },
    async mounted(){
          axios.get('/JOFPending')
          .then((response)=>{
                this.jofData.Pending = response.data
                this.dataItems =  response.data
          })
           axios.get('/JOFDelivered')
          .then((response)=>{
                this.jofData.Delivered = response.data
          })

          // mas live to
        Echo.channel('my-channel')
        .listen('MyEvents', (e) => {
               axios.get('/JOFPending')
              .then((response)=>{
                this.jofData.Pending = response.data
                this.dataItems =  response.data
              })
            axios.get('/JOFDelivered')
            .then((response)=>{
                  this.jofData.Delivered = response.data
            })
        });
    },
 
//methods
    methods: {
      getColor (item) {
        const duedate = new Date(item.due_date),
          date_prepared = new Date(item.date_prepared),
          datenow =  new Date()
          // derived date
          var one = new Date(date_prepared.getFullYear(), date_prepared.getMonth(), date_prepared.getDate());
          var two = new Date(datenow.getFullYear(), datenow.getMonth(), datenow.getDate());
          // Do the math.
          var millisecondsPerDay = 1000 * 60 * 60 * 24;
          var millisBetween = two.getTime() - one.getTime();
          var days = millisBetween / millisecondsPerDay;
          var cntDays = Math.floor(days)
        if (new Date(datenow) > duedate) return 'trans'
        else if (cntDays > 6 && item.jof_status == 'Division I')return 'transblue'
        else if (cntDays > 11 && item.jof_status == 'Division II')return 'transblue'
        else return 'none'
      },

      displayData(a){
        //radio button when clicked. shows only data needed
        switch(a){
          case 'Done':
              this.radiobtns.delivered = true
              this.radiobtns.pending = false
              this.dataItems = this.jofData.Delivered
            break;
          case 'All':
              this.radiobtns.pending = true
              this.radiobtns.delivered = false
              this.dataItems = this.jofData.Pending
            break;
        }

      },
      getJOFhistory(item){
        this.tracking = true
            axios.get('/api/getJOF/'+item.id)
          .then((response)=>{
                this.trackingItems = response.data
          })
      },
      getDetails(item){
        this.details=true
        this.detailItems = item
      },
      openJOF(item) {
        this.jof_form = true
        this.detailItems = item
      },
      print(){
        this.$htmlToPaper('printjof');
      },
      printstatus(){
        this.$htmlToPaper('printlist');
      },
    },
   
   
    
  }
</script>