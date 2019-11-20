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
        <v-toolbar-title>Division I</v-toolbar-title>
        <v-divider class="mx-4" inset vertical></v-divider>
        <v-text-field v-model="search" append-icon="search" label="Search" single-line hide-details></v-text-field>
      <v-spacer></v-spacer>
      </v-toolbar>
      <v-data-table :headers="headers" :items="dataItems" :search="search" class="elevation-1" >
          <template v-slot:top>
          <div class="radiOPTS">
            <!-- <label class=' bg-warning textpads'>2 Days Delay</label> -->
            <label class='bg-info textpads'>2 Days Delay</label>
            <!-- <label class='bg-success textpads'>6+ Days Delay</label> -->
            <label class='bg-danger textpads'>7 Days Before Due Date</label>
            <label class='bg-dark textpads'>Special Order</label>
          </div>
        </template>
           <template v-slot:item.jofno="{ item }" > 
            <v-chip v-if="item.sp_order==1" class="bg-dark" > {{ item.jofno }}</v-chip> 
            <v-chip v-else class="not_special"> {{ item.jofno }}</v-chip> 
          </template>
          <template v-slot:item.due_date="{ item }" > 
            <v-chip :class="getColor(item)" > {{ item.due_date }}</v-chip> 
          </template>
            <template v-slot:item.remarks="{ item }">
            <div class="my-2">
               <v-chip v-if='item.remarks==1' class="bg-info remarks" > Returned JOF</v-chip> 
            </div>
        </template>
         <template v-slot:item.jofaction="{ item }">
            <div class="my-2">
              <v-btn depressed small color="primary" @click="jofActions(item)">OUT</v-btn>
            </div>
        </template>
  </v-data-table>
  </div>
</template>

<script>
  export default {
    data: () => ({
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
      dataItems:[],
    }),

    async mounted(){
        axios.get('/JOFinit/2')
        .then((response)=>{
            this.dataItems = response.data
        })
        Echo.channel('my-channel')
        .listen('MyEvents', (e) => {
             axios.get('/JOFinit/2')
                        .then((response)=>{
                            this.dataItems = response.data
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
        else if (cntDays > 6)return 'transblue'
        else return 'none'
      },

      jofActions(item){
        item.jof_status = 'Division II'
        item.remarks = 0
         axios.post('api/JOFupdateStatus',item)
            .then((res)=>{
               axios.post('/api/jofhistory',item)
                  .then((response)=>{
                        axios.get('/JOFinit/2')
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