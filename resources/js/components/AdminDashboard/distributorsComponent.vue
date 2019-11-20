<style scoped>
.theme--light.v-data-table {
    background-color: #fff;
    color: rgba(0,0,0,.87);
    margin: 10px;
}
th {
    font-size: 17px !important;
}
</style>


<template>
<v-card>
      <v-toolbar flat color="white">
        <v-toolbar-title>List of Distributors</v-toolbar-title>
        <v-divider class="mx-4" inset vertical></v-divider>
        <v-text-field v-model="search" append-icon="search" label="Search" single-line hide-details></v-text-field>
      <v-spacer></v-spacer>
        <v-dialog v-model="dialog" max-width="700px">
          <template v-slot:activator="{ on }">
            <v-btn color="primary" dark class="mb-2" v-on="on">Add Distributor</v-btn>
          </template>
          <v-form ref="form" v-model="valid" lazy-validation  @submit.prevent>
          <v-card>
            <v-card-title>
              <div class="row">
                <div class="col">
                    <span class="headline">{{ formTitle }}</span>
                </div>
                <div class="col">
                    <v-btn color="primary" dark class="mb-2 generate" v-on:click="generateCode()" :disabled="seriesbtn">Generate Distributor Code</v-btn>
                </div>
              </div>
            </v-card-title>

            <v-card-text>
              <v-container grid-list-md>
                <v-layout wrap>
                  <v-flex xs12>
                    <v-text-field v-model="editedItem.distributor_code" filled readonly label="Distributor Code"></v-text-field>
                  </v-flex>
                  <v-flex xs12>
                    <v-text-field v-model="editedItem.distributor_name" label="Distributor Name" :rules="ruleRequired"></v-text-field>
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
      </v-toolbar>
      <v-data-table :headers="headers" :items="dataItems" :search="search" class="elevation-1">
      <template v-slot:item.action="{ item }">
          <v-icon small class="mr-2" @click="editItem(item)"> edit </v-icon>
          <v-icon small @click="deleteItem(item)"> delete </v-icon>
        </template>
  </v-data-table>
  </v-card>
</template>

<script>
  export default {
    data: () => ({
      dialog: false,
      valid:false,
      search: '',
      show1:false,
      inset: false,
      seriesbtn:false,
      headers: [
        { text: 'Distributor Code', value: 'distributor_code', },
        { text: 'Distributor Name', value: 'distributor_name', },
        { text: 'Actions', value: 'action', sortable: false },
      ],
      ruleRequired: [
        v => !!v || 'Field is required',
      ],
      emailRules: [
        v => !!v || 'Field is required',
        v => /.+@.+/.test(v) || 'E-mail must be valid'
      ],
      emailExist:'',
      activeuser:{},
      dataItems:[],
      addedItems:[],
      editedIndex: -1,
      editedItem: {
        distributor_code:'',
      },
      defaultItem: {
        distributor_code:'',
      },
      toBeUpdated:{}
    }),

    computed: {
      formTitle () {
        return this.editedIndex === -1 ? 'Add Distributor' : 'Edit Distributor'
      },
    },

    watch: {
      dialog (val) {
        val || this.close()
      },
    },

    async mounted(){
        axios.get('/distributorInit')
        .then((response)=>{
            this.dataItems = response.data
        })
           axios.get('/getUser')
        .then((response)=>{
           this.activeuser = response.data
            this.editedItem.active_user =this.activeuser.id
            this.defaultItem.active_user =this.activeuser.id
        })
    },
    
    methods: {
      editItem (item) {
        this.editedIndex = this.dataItems.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialog = true
      },

      deleteItem (item) {
        const index = this.dataItems.indexOf(item)
        confirm('Are you sure you want to delete this item?') && axios.delete('/api/distributorDelete/'+item.id).then(()=>this.dataItems.splice(index, 1));
      },

      close () {
        this.dialog = false
        setTimeout(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        }, 300)
      },

     async save () {
       this.editedItem.created_by = this.activeuser.first_name+' '+ this.activeuser.last_name
        if(this.$refs.form.validate()){
            if (this.editedIndex > -1) {
                this.toBeUpdated = this.dataItems[this.editedIndex]
                axios.put('/api/distributorUpdate',this.editedItem)
                .then(()=>{  
                    axios.get('/distributorInit')
                        .then((response)=>{
                            this.dataItems = response.data
                        })
                    })
                .catch(function (error) {
                    console.log(error);
                })

            } else {
                axios.post('/api/distributorCreate',this.editedItem)
                .then(()=> {
                     axios.get('/distributorInit')
                      .then((response)=>{
                          this.dataItems = response.data
                      })
                })
            }
             this.defaultItem.distributor_code=''
            this.seriesbtn=false
            this.close()
        }
      },
      generateCode(){
        this.seriesbtn=true
        axios.get('/api/generateCode')
          .then((res)=> {
            var seriesno = res.data
            this.editedItem.distributor_code =seriesno
            this.defaultItem.distributor_code = seriesno
          })
      },
    },
  }
</script>