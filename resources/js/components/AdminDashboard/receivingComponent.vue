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
        <v-toolbar-title>Registration Section</v-toolbar-title>
        <v-divider class="mx-4" inset vertical></v-divider>
        <v-text-field v-model="search" append-icon="search" label="Search" single-line hide-details></v-text-field>
      <v-spacer></v-spacer>
      </v-toolbar>
      <v-data-table :headers="headers" :items="dataItems" :search="search" class="elevation-1" >
         <template v-slot:item.jofno="{ item }" > 
            <v-chip v-if="item.sp_order==1" class="bg-dark" > {{ item.jofno }}</v-chip> 
            <v-chip v-else class="not_special"> {{ item.jofno }}</v-chip> 
          </template>
           <template v-slot:item.due_date="{ item }" > 
            <v-chip :class="getColor(item.due_date)" > {{ item.due_date }}</v-chip> 
          </template>
         <template v-slot:item.jofaction="{ item }">
            <div class="my-2">
              <v-btn v-if="item.sp_order==0" depressed small color="primary" @click="jofActions(item)">OUT</v-btn>
            </div>
            <div class="my-2" v-if="item.sp_approve==0">
              <v-btn v-if="item.sp_order==1" @click="specialOrder(item,1)" depressed small color="primary">Approve</v-btn>
            </div>
             <div class="my-2" v-if="item.sp_approve==0">
              <v-btn v-if="item.sp_order==1" @click="specialOrder(item,2)" depressed small color="red">Decline</v-btn>
            </div>
             <div class="my-2" v-if="item.sp_approve==2">
              <v-btn v-if="item.sp_order==1" depressed small color="red">Order Declined</v-btn>
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
      show1:false,
      menu1:false,
      menu2:false,
      headers: [
        { text: 'JOF#', value: 'jofno',  },
        { text: 'Prepared by', value: 'created_by',  },
        { text: 'Order Type', value: 'kind_of_order',  },
        { text: 'distributor_code', value: 'distributor_code',  },
        { text: 'Distributor Name', value: 'distributor_name',  },
        { text: 'Customer Name', value: 'customer_name',  },
        { text: 'Kind of Ring', value: 'kind_of_ring',  },
        { text: 'Date Prepared', value: 'date_prepared',  },
        { text: 'Due Date', value: 'due_date',  },
        { text: 'JOF Status', value: 'jof_status', },
         { text: 'JOF ACTION', value: 'jofaction', sortable: false },
      ],
      ruleRequired: [
        v => !!v || 'Field is required',
      ],
      dataItems:[],
      addedItems:{},
      editedIndex: -1,
      editedItem: {
      },
      defaultItem: {},
      toBeUpdated:{},
      mask: '################',
      date1:new Date().toISOString().substr(0, 10),
      date2:new Date().toISOString().substr(0, 10),
      // date2:new Date(new Date().getTime()+(120*24*60*60*1000)).toISOString().substr(0, 10),
    }),
    
    computed: {
    },

    watch: {
      dialog (val) {
        val || this.close()
      },
    },

    async mounted(){
        axios.get('/JOFinit/1')
        .then((response)=>{
            this.dataItems = response.data
        })
        Echo.channel('my-channel')
        .listen('MyEvents', (e) => {
             axios.get('/JOFinit/1')
              .then((response)=>{
                  this.dataItems = response.data
              })
        });
    },
//methods

    methods: {
       getColor (a) {
          const duedate = new Date(a),
            datenow =  new Date(new Date().getTime()+(120*24*8*31*1000)).toISOString().substr(0, 10)

        if (new Date(datenow) > duedate) return 'trans'
        else return 'none'
        // else return 'green'
      },

      jofActions(item){
        item.jof_status = 'Division I'
         axios.post('/api/JOFupdateStatus',item)
            .then(()=>{
                axios.post('/api/jofhistory',item)
                  .then((response)=>{
                        axios.get('/JOFinit/1')
                        .then((response)=>{
                            this.dataItems = response.data
                        })
                  })
              })
            .catch(error => {
              console.log(error.message);
            })
      },
      ApproveColor(a){
        switch(a){
            case '0':
              return 'gray'
            break;
            case '1':
              return 'green'
            break
        }
      },
      specialOrder(item,status){
        item.sp_approve = status
        switch(status){
          case 1:
            // item.jof_status = 'Mold Section'
             item.jof_status = 'Division I'
            break;
          case 2:
            item.jof_status = 'Registration Section'
            break;
        }
          axios.post('/api/JOFupdateStatus',item)
            .then(()=>{
                axios.post('/api/jofhistory',item)
                  .then((response)=>{
                        axios.get('/JOFinit/1')
                        .then((response)=>{
                            this.dataItems = response.data
                        })
                  })
              })
            .catch(error => {
              console.log(error.message);
            })

      },
       
    },
   
   
    
  }
</script>