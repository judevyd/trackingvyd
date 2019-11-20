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
th {
    font-size: 17px !important;
}

</style>


<template>
<div>
      <v-toolbar flat color="white">
        <v-toolbar-title>Releasing JOF</v-toolbar-title>
        <v-divider class="mx-4" inset vertical></v-divider>
        <v-text-field v-model="search" append-icon="search" label="Search" single-line hide-details></v-text-field>
      <v-spacer></v-spacer>
      </v-toolbar>
      <v-data-table :headers="headers" :items="dataItems" :search="search" class="elevation-1" >
       <template v-slot:item.due_date="{ item }" > 
            <v-chip :class="getColor(item.due_date)" > {{ item.due_date }}</v-chip> 
          </template>
         <template v-slot:item.jofaction="{ item }">
            <div class="my-2">
              <v-btn depressed small color="primary" @click="jofActions(item)">MOVE TO DELIVERED</v-btn>
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
        { text: 'Customer Name', value: 'customer_name',  },
        { text: 'Kind of Ring', value: 'kind_of_ring',  },
        { text: 'Date Prepared', value: 'date_prepared',  },
        { text: 'Due Date', value: 'due_date',  },
        { text: 'JOF Status', value: 'jof_status', },
         { text: 'JOF ACTION', value: 'jofaction', sortable: false },
      ],
      dataItems:[],
    }),

    async mounted(){
        axios.get('/api/JOFinit/10')
        .then((response)=>{
            this.dataItems = response.data
        })
    },
//methods

    methods: {
       getColor (a) {
             const duedate = new Date(a),
            datenow =  new Date(new Date().getTime()+(120*24*7*59*1000)).toISOString().substr(0, 10)
        if (new Date(datenow) > duedate) return 'trans'
        else return 'none'
        // else return 'green'
      },
      jofActions(item){
        item.jof_status = 'Delivered'
         axios.post('/api/JOFupdateStatus',item)
            .then(()=>{
               axios.post('/api/jofhistory',item)
                  .then((response)=>{
                        axios.get('/api/JOFinit/10')
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