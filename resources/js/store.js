// export default{
//     state:{
//         userrole:''
//     },
//     mutations:{
//         getRoles(state,roles){
//                state.userrole =roles
//         }
//     },
//     actions:{
//         loadData({commit}){
//             axios.get('/getUser')
//             .then((response)=>{
//                 commit('getRoles',response.data)
//             })
//         }
//     },
//     getters:{
//         userRole(state){
//                return state.userrole
//         }
//     }
// }