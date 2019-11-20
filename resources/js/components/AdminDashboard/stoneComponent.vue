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
.remarks{
  color:white;
}
.not_special{
   background-color: #e0e0e000 !important;
}
.bg-dark {
    color: #ffc107 !important;
}
th {
    font-size: 17px !important;
}

</style>


<template>
<div>
      <v-toolbar flat color="white">
        <v-toolbar-title>Stone Section</v-toolbar-title>
        <v-divider class="mx-4" inset vertical></v-divider>
        <v-text-field v-model="search" append-icon="search" label="Search" single-line hide-details></v-text-field>
      <v-spacer></v-spacer>

          <!-- ADD JOF MODAL -->
        <v-dialog v-model="dialog" max-width="500px">
          <v-form ref="form" v-model="valid" lazy-validation  @submit.prevent>
          <v-card>
            <v-card-title>
              <span class="headline">{{ formTitle }}</span>
            </v-card-title>

            <v-card-text>
              <v-container grid-list-md>
                <v-layout wrap>
                  <v-flex xs12>
                      <v-select  v-model="editedStatus" :items="Status" label="SELECT JOF STATUS" outlined></v-select>
                  </v-flex>
                </v-layout>
              </v-container>
            </v-card-text>

            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="blue darken-1" text @click="close">Cancel</v-btn>
              <v-btn color="blue darken-1" text @click="save">Save</v-btn>
            </v-card-actions>
          </v-card>
             </v-form>
        </v-dialog>
      <!--END  ADD JOF MODAL -->
      </v-toolbar>
      <v-data-table :headers="headers" :items="dataItems" :search="search" class="elevation-1" >
        <template v-slot:top>
          <div class="radiOPTS">
            <label class=' bg-warning textpads'>2 Days Delay</label>
            <label class='bg-info textpads'>4 Days Delay</label>
            <label class='bg-success textpads'>6+ Days Delay</label>
            <label class='bg-danger textpads'>7 Day Due Date</label>
            <label class='bg-dark textpads'>Special Order</label>
          </div>
        </template>
         <template v-slot:item.jofno="{ item }" > 
            <v-chip v-if="item.sp_order==1" class="bg-dark" > {{ item.jofno }}</v-chip> 
            <v-chip v-else class="not_special"> {{ item.jofno }}</v-chip> 
          </template>
           <template v-slot:item.due_date="{ item }" > 
            <v-chip  :class="getColor(item)" > {{ item.due_date }}</v-chip> 
          </template>
            <template v-slot:item.remarks="{ item }">
            <div class="my-2">
               <v-chip v-if='item.remarks==1' class="bg-info remarks" > Repair Stone</v-chip> 
            </div>
        </template>
         <template v-slot:item.jofaction="{ item }">
            <div class="my-2">
              <v-btn depressed small color="primary" @click="jofActions(item)">MOVE TO FINISHING</v-btn>
               <v-btn depressed small color="error" @click="editItem(item)">RETURN JOF</v-btn>
            </div>
        </template>
  </v-data-table>
  </div>
</template>

<script>
  export default {
    data: () => ({
      dialog: false,
      valid:false,
      search: '',
      headers: [
        { text: 'JOF#', value: 'jofno',  },
        { text: 'Prepared by', value: 'created_by',  },
        { text: 'Order Type', value: 'kind_of_order',  },
        { text: 'Distributor Name', value: 'distributor_name',  },
        { text: 'Customer Name', value: 'customer_name',  },
        { text: 'Kind of Ring', value: 'kind_of_ring',  },
        { text: 'Date Prepared', value: 'date_prepared',  },
        { text: 'Due Date', value: 'due_date',  },
        { text: 'JOF Status', value: 'jof_status', },
        { text: 'Remarks', value: 'remarks', },
         { text: 'JOF ACTION', value: 'jofaction', sortable: false },
      ],
      // Status:['Mold Section','Plastic Section','Wax Section','Casting Section','Salugar Section'],
      Status:['Mold Section','Casting Section'],
      dataItems:[],
      editedItem:{},
      editedStatus:'',
      defaultItem:{},
      editedIndex: -1,
    }),
    
    computed: {
      formTitle () {
        return this.editedIndex === -1 ? ' JOF Order' : 'Return JOF Order'
      },
    },
    watch: {
      dialog (val) {
        val || this.close()
      },
    },

    async mounted(){
        axios.get('/JOFinit/7')
        .then((response)=>{
            this.dataItems = response.data
        })
        Echo.channel('my-channel')
        .listen('MyEvents', (e) => {
             axios.get('/JOFinit/7')
              .then((response)=>{
                  this.dataItems = response.data
              })
        });
    },
//methods

    methods: {
        getColor (item) {
         var date_diff_indays = function(date1, date2) {
            var dt1 = new Date(date1);
            var dt2 = new Date(date2);
            return Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate()) ) /(1000 * 60 * 60 * 24));
            }

          const duedate = new Date(item.due_date),
          activedate = new Date(new Date(item.active_date).getTime()+(120*24*0*30*1000)).toISOString().substr(0, 10),
          datenow =  new Date(new Date().getTime()+(120*24*8*31*1000)).toISOString().substr(0, 10)
          // derived date
          var dateObj = new Date();
          var month = dateObj.getMonth()+1; 
          var day = dateObj.getDate();
          var year = dateObj.getFullYear();
          if(month <10){
            month = '0'+month
           }
        var newdate = year + "-" + month + "-" + day;
        if (new Date(datenow) > duedate) return 'trans'
        else if (date_diff_indays(activedate,newdate)>=2&&date_diff_indays(activedate,newdate)<=3) return 'transyellow'
        else if (date_diff_indays(activedate,newdate)>=4&&date_diff_indays(activedate,newdate)<=5) return 'transblue'
        else if (date_diff_indays(activedate,newdate)>=6) return 'transgreen'
        else return 'none'
        // else return 'green'
      },
      jofActions(item){
        item.jof_status = 'Finishing Section'
        item.remarks = 0
         axios.post('/api/JOFupdateStatus',item)
            .then(()=>{
                axios.post('/api/jofhistory',item)
                  .then((response)=>{
                        axios.get('/JOFinit/7')
                        .then((response)=>{
                            this.dataItems = response.data
                        })
                  })
              })
            .catch(error => {
              console.log(error.message);
            })
      },
      close (a) {
        this.dialog = false
        setTimeout(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        }, 300)
      },
      editItem (item) {
        this.editedIndex = this.dataItems.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialog = true
      },
      save(){
        if(this.editedStatus != ''){
          this.editedItem.jof_status = this.editedStatus
          this.editedItem.remarks = 1
          axios.post('/api/JOFupdateStatus',this.editedItem)
            .then(()=>{
                axios.get('/JOFinit/7')
                  .then((response)=>{
                      this.dataItems = response.data
                  })
              })
            .catch(error => {
              console.log(error.message);
            })
        }
        this.close()
      }
       
    },
   
   
    
  }
</script>