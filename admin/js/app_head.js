
var app = new Vue({
    el: '#app_head',
    data: {

      headerData: [],
    },
    methods: {
        mouseleave: function () {

        },

        /* Log out user */
        userLogOut: function( action) {

            const params = {
                action: action
            };
            
            //alert( "Call for action ==> " + action );
            axios.post('/admin/vue_request.php', params, {
                headers: {
                    'content-type': 'application/json',
                },
              })
              .then((response) => {
                    app.headerData = response.data.users;
                    console.dir(app.headerData);
                }, (error) => {
                  console.log(error);
                });
        },


    }
  });