
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

      showusers: []
    },
    methods: {
        mouseleave: function () {

        },

        /* Check if user exist, if not add new user */
        checkNewUser: function () {

            this.fname    = document.querySelector("#fname").value;
            this.lname    = document.querySelector("#lname").value;
            this.email    = document.querySelector("#email").value;
            this.username = document.querySelector("#username").value;
            this.password = document.querySelector("#password").value;
            this.rank     = document.querySelector("#rank").value;
            
            const params = {
                fname:    this.fname,
                lname:    this.lname, 
                email:    this.email,
                username: this.username ,
                password: this.email,
                rank:     this.rank,
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
                document.querySelector("#findall").checked = false;               
            }
            

        },

        /* Search for a single user or list all users */
        searchUser: function ( click_action) {

            this.email      = document.querySelector("#email").value;
            
            const params = {
                email:   this.email,
                action: click_action
            };

            axios.post('/admin/vue_search_user.php', params, {
                headers: {
                    'content-type': 'application/json',
                },
              })
              .then((response) => {
                    app.showusers = response.data.users;
                    console.dir(app.showusers);
                }, (error) => {
                  console.log(error);
                });
        },
    }
  });