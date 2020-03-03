
var app = new Vue({
    el: '#app',
    data: {
      message: '',
      username: '',
      email: '',
      password: '',
      fname: '',
      lname: '',
      rank: '',
      action: '',

      /* Array var */
      arr_result: true,
      arr_length: 0,
      fnum : 0,
      snum : 3,

      step: 3,

      showusers: [],
      modalusers: []
    },
    methods: {
        mouseleave: function () {

        },

        /* Check if user exist, if not add new user */
        checkNewUser: function () {

            var ufname  = document.querySelector("#fname").value;
            var ulname  = document.querySelector("#lname").value;
            var uemail  = document.querySelector("#email").value;
            var uname   = document.querySelector("#username").value;
            var upass   = document.querySelector("#password").value;
            var urank   = document.querySelector("#rank").value;
            
            const params = {
                fname:    ufname,
                lname:    ulname, 
                email:    uemail,
                username: uname ,
                password: upass,
                rank:     urank,
            };

            axios.post('/admin/vue_check_user.php', params, {
                headers: {
                    'content-type': 'application/json',
                },
              })
              .then((response) => {
                    app.message = response.data;
                    this.clearForm('addForm');
                    console.log(response);
                }, (error) => {
                  console.log(error);
                });
        },

        /* Clear form */
        clearForm: function ( clear ) {

            if( clear == "addForm" ) {
                document.querySelector("#fname").value      = "";
                document.querySelector("#lname").value      = "";
                document.querySelector("#email").value      = "";
                document.querySelector("#username").value   = "";
                document.querySelector("#password").value   = "";
                document.querySelector("#rank").value       = ""; 
            }
            
            if( clear == "finduser" ) {

                document.querySelector("#email").value = ""; 
                this.arr_result = true;
                this.email = '';
                this.arr_length = 0;   
                this.showusers = [];      
            }
            

        },

        /* Search for a single user or list all users */
        searchUser: function ( click_action) {

            var uemail = document.querySelector("#email").value;
            
            const params = {
                email:  uemail,
                action: click_action
            };

            axios.post('/admin/vue_search_user.php', params, {
                headers: {
                    'content-type': 'application/json',
                },
              })
              .then((response) => {
                    app.showusers = response.data.users;
                    if(app.showusers.length < 1){

                        app.arr_length = 0;
                        app.arr_result = false;
                        app.email = uemail;

                    } else {

                        app.arr_length = app.showusers.length;
                        app.arr_result = true;
                        app.email = '';
                    }
                    console.dir(app.showusers);
                }, (error) => {
                  console.log(error);
                });
        },

        /* get user data for modal */
        getUserForModal: function( id, action) {

            const params = {
                uid:  id,
                action: action
            };

            axios.post('/admin/vue_update_delete.php', params, {
                headers: {
                    'content-type': 'application/json',
                },
              })
              .then((response) => {
                    app.modalusers = response.data.user;
                    console.dir(app.modalusers);
                }, (error) => {
                  console.log(error);
                });
        },

        /* Set 'Previous' and 'Next' button for user list display on page */
        navigateSearch: function ( prev, next, action ){

            if( action == "prev" ) {
                this.fnum = prev - this.step;
                this.snum = next - this.step;
            }
            if( action == "next" ) {
                this.fnum = prev + this.step;
                this.snum = next + this.step;
            }
        },
        remove: function () {
            this.modalusers.length = 0;
        }


    }
  });