<style scoped>
.theme--light.v-data-table {
    background-color: #fff;
    color: rgba(0,0,0,.87);
    margin: 10px;
}
</style>


<template>
<v-card>
      <v-toolbar flat color="white">
        <v-toolbar-title>System Users</v-toolbar-title>
        <v-divider class="mx-4" inset vertical></v-divider>
        <v-text-field v-model="search" append-icon="search" label="Search" single-line hide-details></v-text-field>
      <v-spacer></v-spacer>
        <v-dialog v-model="dialog" max-width="500px">
          <template v-slot:activator="{ on }">
            <v-btn color="primary" dark class="mb-2" v-on="on">Add User</v-btn>
          </template>
          <v-form ref="form" v-model="valid" lazy-validation  @submit.prevent>
          <v-card>
            <v-card-title>
              <span class="headline">{{ formTitle }}</span>
            </v-card-title>

            <v-card-text>
              <v-container grid-list-md>
                <v-layout wrap>
                  <v-flex xs12>
                        <v-select  v-model="editedItem.organization_name" :items="departments" label="Select Department" outlined></v-select>
                  </v-flex>

                  <v-flex xs6>
                    <v-text-field v-model="editedItem.first_name" label="First name" :rules="ruleRequired"></v-text-field>
                  </v-flex>
                  <v-flex xs6>
                    <v-text-field v-model="editedItem.last_name" label="Last name" :rules="ruleRequired"></v-text-field>
                  </v-flex>
                  <v-flex xs12>
                    <v-text-field v-model="editedItem.email" :rules="emailRules && ruleRequired" label="Email" ></v-text-field>
                  </v-flex>
                  <v-flex xs12>
                    <v-text-field v-model="password" :type="show1 ? 'text': 'password'" label="Password"></v-text-field>
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
      password: '',
      // departments:['Sales Officer','Receiving Section','Mold Section','Casting Section','Stone Section','Finishing Section','Dispatching Section','Full Control'],
       departments:['Sales Officer','Receiving Section','Division I','Division II','Division III','Full Control','Service'],
      headers: [
        { text: 'First Name', value: 'first_name', },
        { text: 'Last Name', value: 'last_name', },
        { text: 'Organization Name', value: 'organization_name', },
        { text: 'Email', value: 'email', },
        { text: 'Password', value: 'password', },
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
      dataItems:[],
      addedItems:[],
      editedIndex: -1,
      editedItem: {
      },
      defaultItem: {},
      toBeUpdated:{}
    }),

    computed: {
      formTitle () {
        return this.editedIndex === -1 ? 'Add User' : 'Edit User'
      },
    },

    watch: {
      dialog (val) {
        val || this.close()
      },
    },

    async mounted(){
        axios.get('/api/user')
        .then((response)=>{
            this.dataItems = response.data
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
        confirm('Are you sure you want to delete this item?') && axios.delete('/api/userdelete/'+item.id).then(()=>this.dataItems.splice(index, 1));
      },

      close () {
        this.dialog = false
        setTimeout(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        }, 300)
      },

     async save () {
        if(this.$refs.form.validate()){
            switch(this.editedItem.organization_name){
              case 'Sales Officer':
                  this.editedItem.role = 9
                break;
              case 'Receiving Section':
                  this.editedItem.role = 1
                break;
              case 'Division I':
                  this.editedItem.role = 2
                break;
              case 'Division II':
                  this.editedItem.role = 3
                break;
              case 'Division III':
                  this.editedItem.role = 10
                break;
              case 'Full Control':
                this.editedItem.role = 11
              case 'Service':
                this.editedItem.role = 30
              break;

            }
              if (this.editedIndex > -1) {
                  this.toBeUpdated = this.dataItems[this.editedIndex]
                 axios.put('/api/userupdate',this.editedItem)
                 .then((res)=>this.editedItem = Object.assign(this.toBeUpdated, res.data))
                   .catch(function (error) {
                        // handle error
                        console.log(error);
                    })

                } else {
                    this.addedItems = this.editedItem
                    this.editedItem.password = this.password
                    axios.post('/api/usercreate',this.editedItem)
                    .then(()=> {
                       this.addedItems.password = ''
                     this.dataItems.push(this.addedItems)
                    })
                }
                this.close()
        }
      
      },
    },
  }
</script>