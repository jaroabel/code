
var app = new Vue({
    el: '#app',
    data: {
      message: '',
      username: '',
      email: '',
      password: '',
      fname: '',
      lname: '',
      rank: ''
    },
    methods: {
        mouseleave: function () {

        },

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
                    this.clearForm();
                    console.log(response);
                }, (error) => {
                  console.log(error);
                });
        },

        clearForm: function () {

            document.querySelector("#fname").value = "";
            document.querySelector("#lname").value = "";
            document.querySelector("#email").value = "";
            document.querySelector("#username").value = "";
            document.querySelector("#password").value = "";
            document.querySelector("#rank").value = ""; 
        } 
    }
  });