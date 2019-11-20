const sidePanel = require('./components/AdminDashboard/SidePanelComponent.vue').default;
const systemUser = require('./components/AdminDashboard/SystemUserComponent.vue').default;
const superAdmin = require('./components/AdminDashboard/SuperAdminComponent.vue').default;

// distributors Maintenance
const distributors = require('./components/AdminDashboard/distributorsComponent.vue').default;
// departments
const joforder = require('./components/AdminDashboard/JOForderComponent.vue').default;
const receiving = require('./components/AdminDashboard/receivingComponent.vue').default;
const mold = require('./components/AdminDashboard/moldComponent.vue').default;
const casting = require('./components/AdminDashboard/castingComponent.vue').default;
const stone = require('./components/AdminDashboard/stoneComponent.vue').default;
const finishing = require('./components/AdminDashboard/finishingComponent.vue').default;
const dispatching = require('./components/AdminDashboard/dispatchingComponent.vue').default;
// division
const divisionI = require('./components/AdminDashboard/divisionIComponent.vue').default;
const divisionII = require('./components/AdminDashboard/divisionIIComponent.vue').default;

const jofstatus = require('./components/AdminDashboard/jofstatusComponent.vue').default;
const jofexport = require('./components/AdminDashboard/JOFexportComponent.vue').default;
const jofform = require('./components/AdminDashboard/JOFFormComponent.vue').default;

//change pass
const changepass = require('./components/AdminDashboard/ChangePasswordComponent.vue').default;

const trackingStatus = require('./components/UserSide/TrackingStatusComponent.vue').default;
const landingPage = require('./components/Landing/HomeComponent.vue').default;
const registerPage = require('./components/Landing/RegisterComponent.vue').default;



export default{
    mode:'history',
    routes: [
        { path: '/side-panel', name:'admin', component: sidePanel, 
            meta: { 
                title: "Side Panel" 
            } 
        },
        { path: '/vy-installment', name:'home', component: landingPage, 
        meta: { 
            title: "Home Page" 
        }
         },
        { path: '/user-register', name:'register', component: registerPage, 
         meta: { 
             title: "Register Page" 
        }
        }, 
        { path: '/systemuser', name:'systemuser', component: systemUser, 
        meta: { 
            title: "System User" 
            }
        },
        { path: '/', name:'superadmin', component: jofstatus, 
        meta: { 
            title: "Dashboard" 
            } 
        },
        { path: '/distributors', name:'distributors', component: distributors, 
        meta: { 
            title: "Distributors" 
            } 
        },
        { path: '/joforder', name:'joforder', component: joforder, 
        meta: { 
            title: "JOF Order" 
            } 
        },
        { path: '/jofform', name:'jofform', component: jofform, 
        meta: { 
            title: "JOF Form" 
            } 
        },
        { path: '/receiving', name:'receiving', component: receiving, 
        meta: { 
            title: "receiving" 
            } 
        },
        { path: '/divisionI', name:'divisionI', component: divisionI, 
        meta: { 
            title: "divisionI" 
            } 
        },
        { path: '/divisionII', name:'divisionII', component: divisionII, 
        meta: { 
            title: "divisionII" 
            } 
        },
        { path: '/mold', name:'mold', component: mold, 
        meta: { 
            title: "Mold" 
            } 
        },
        { path: '/casting', name:'casting', component: casting, 
        meta: { 
            title: "Casting" 
            } 
        },
        { path: '/stone', name:'stone', component: stone, 
        meta: { 
            title: "Stone" 
            } 
        },
        { path: '/finishing', name:'finishing', component: finishing, 
        meta: { 
            title: "finishing" 
            } 
        },
        { path: '/dispatching', name:'dispatching', component: dispatching, 
        meta: { 
            title: "dispatching" 
            } 
        },
        { path: '/jofstatus', name:'jofstatus', component: jofstatus, 
        meta: { 
            title: "JOF Status" 
            } 
        },
        { path: '/jofexport', name:'jofexport', component: jofexport, 
        meta: { 
            title: "JOF Export" 
            } 
        },
        { path: '/changepass', name:'changepass', component: changepass, 
        meta: { 
            title: "changepass" 
            } 
        },
        
    ]
}