
var app = new Vue({
    el: '#app',
    data: {
      userid: '',
      message: '',
      username: '',
      email: '',
      password: '',
      fname: '',
      lname: '',
      rank: '',

      action: '',
      secondAction: '',
      delEmail: '',

      /* Array var */
      arr_result: true,
      arr_length: 0,
      fnum : 0,
      snum : 3,

      step: 3,

      showusers: [],
      modalusers: [],
      arrMessage: [],
      arrRank: [ 1, 2, 3, 4, 5]
    },
    methods: {
        mouseleave: function () {

        },

        /* Action to check if user already exist in DB, if not add new user */
        checkNewUser: function () {

            var ufname  = document.querySelector("#fname").value;
            var ulname  = document.querySelector("#lname").value;
            var uemail  = document.querySelector("#email").value;
            var uname   = document.querySelector("#username").value;
            var upass   = document.querySelector("#password").value;
            var urank   = document.querySelector("#rank").value;
            var action   = document.querySelector("#action").value;
            
            const params = {
                fname:    ufname,
                lname:    ulname, 
                email:    uemail,
                username: uname ,
                password: upass,
                rank:     urank,
                action:   action
            };

            axios.post('/admin/vue_request.php', params, {
                headers: {
                    'content-type': 'application/json',
                },
              })
              .then((response) => {
                    app.message = response.data.users;
                    this.clearForm('addForm');
                    console.log(response);
                }, (error) => {
                  console.log(error);
                });
        },

        /** Action to update user data  */
        sendUserUpdateData: function ( id, upaction ) {

            var ufname  = document.querySelector("#upfname").value;
            var ulname  = document.querySelector("#uplname").value;
            var uemail  = document.querySelector("#upemail").value;
            var uname   = document.querySelector("#upusername").value;
            var urank   = document.querySelector("#uprank").value;
            var action  = upaction;
            var upid    = document.querySelector("#updateid").value;;
            
            const params = {
                fname:    ufname,
                lname:    ulname, 
                email:    uemail,
                username: uname ,
                uid:      upid,
                rank:     urank,
                action:   action
            };

           // alert(" Data ==> " + params.fname +" = "+ params.lname +" = "+ params.email +" = "+ params.username +" = "+ params.uid +" = "+ params.rank +" = "+ params.action); 

            
            axios.post('/admin/vue_request.php', params, {
                headers: {
                    'content-type': 'application/json',
                },
              })
              .then((response) => {
                    app.arrMessage = response.data.users;
                    alert(app.arrMessage );
                    //this.clearForm('addForm');
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
            
            this.secondAction = '';
        },

        /* Action to find a single user or list all users */
        searchUser: function ( click_action) {

            var email = document.querySelector("#email").value;
            this.secondAction = click_action;

            const params = {
                email:  email,
                action: click_action
            };
            
            axios.post('/admin/vue_request.php', params, {
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

        /* Action to get user data into update modal */
        getUserForModal: function( id, action) {

            const params = {
                uid:  id,
                action: action
            };
            
            axios.post('/admin/vue_request.php', params, {
                headers: {
                    'content-type': 'application/json',
                },
              })
              .then((response) => {
                    app.modalusers = response.data.users;
                    console.dir(app.modalusers);
                }, (error) => {
                  console.log(error);
                });
        },

        /* Action to delete user */
        deleteUserForModal: function( id, action) {

            var email = document.querySelector("#delemail").value;

            const params = {
                uid:  id,
                email: email,
                action: action,
                action_two: this.secondAction
            };

            axios.post('/admin/vue_request.php', params, {
                headers: {
                    'content-type': 'application/json',
                },
              })
              .then((response) => {
                    app.showusers = response.data.users;
                    if(app.showusers.length < 1){

                        app.arr_length = 0;
                        app.arr_result = false;

                    } else {

                        app.arr_length = app.showusers.length;
                        app.arr_result = true;
                        app.email = '';
                    }
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

        /** Action to set value into the ddelete modal */
        setDeleteValue: function ( uid, uemail) {
            this.userid = uid;
            this.email = uemail;
        },

        remove: function () {
            this.modalusers.length = 0;
        }


    }
  });