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
    margin-left: 10px;
}
th {
    font-size: 17px !important;
}

</style>


<template>
<div>
      <v-toolbar flat color="white">
        <v-toolbar-title>7th Day Due Date Status</v-toolbar-title>
        <v-divider class="mx-4" inset vertical></v-divider>
        <v-text-field v-model="search" append-icon="search" label="Search" single-line hide-details></v-text-field>
      <v-spacer></v-spacer>
        <template >
            <v-btn color="primary" dark class="mb-2" v-on:click="exportpdf">DOWNLOAD TO PDF 7Day Due Date</v-btn>
        </template>
      </v-toolbar>
      <v-data-table :headers="headers" :items="dataItems" :search="search" class="elevation-1" >
        <template v-slot:top>
          <div class="radiOPTS">
            <label class=' bg-danger textpads'>7-Day Due</label>
          </div>
        </template>
          <template v-slot:item.due_date="{ item }" > 
            <v-chip v-if="item.jof_status == 'Delivered'"> {{ item.due_date }}</v-chip> 
            <v-chip v-if="item.jof_status != 'Delivered'"  :class="getColor(item.due_date)" > {{ item.due_date }}</v-chip> 
        </template>
  </v-data-table>
  </div>
</template>

<script>
  export default {
    data: () => ({
      dialog:false,
      search: '',
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
      ],
      dataItems:[],
      jofData:{
          Delivered:[],
          Pending:[]
      },
      valid:false,
      menu:false,
      date:new Date().toISOString().substr(0, 10),
    }),
    
    computed: {
      formTitle () {
        return this.editedIndex === -1 ? 'Export JOF Order' : 'Export JOF Order'
      },
    },

    watch: {
      dialog (val) {
        val || this.close()
      },
    },

    async mounted(){
        axios.get('/api/sevenDueDate')
        .then((response)=>{
                if(response.data.length > 0){
                    for(var a = 0; a<response.data.length; a++){
                    var b = response.data[a]['jof_status']
                    if(b == 'Done'){
                    this.jofData.Delivered.push(response.data[a])
                    }else{
                      this.jofData.Pending.push(response.data[a])
                    }
                }
                this.dataItems =  this.jofData.Pending
            }else{
                this.dataItems = response.data
            }
        })
    },
//methods

    methods: {
        close (a) {
        this.dialog = false
        setTimeout(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        }, 300)
      },
       getColor (a) {
           const duedate = new Date(a),
            datenow =  new Date(new Date().getTime()+(120*24*8*31*1000)).toISOString().substr(0, 10)

        if (new Date(datenow) > duedate) return 'trans'
        else return 'none'
        // else return 'green'
      },

        displayData(a){
        //radio button when clicked. shows only data needed
        switch(a){
          case 'Delivered':
              this.dataItems = this.jofData.Delivered
            break;
          case 'All':
              this.dataItems = this.jofData.Pending
            break;
        }
      },
      exportpdf(){
          location.href = "/api/exportpdf";
      }

    },
   
   
    
  }
</script>