const app = new Vue({
    el: '#notificaciones',
    data: {
        notifications: [],
    },

    computed:{
       
    },
    methods:{
        readNotification(id,ruta){
            let url = '/cronograma/public/admin/notification/'+id;
           
            axios.put(url).then(response => {
                window.location.href = ruta;
            });   
        }
    },
    created() {

        let url = '/cronograma/public/admin/notification'
       
        axios.get(url).then(response => {
            this.notifications = response.data;
    
            console.log(response.data);
        }).catch(error => {
            console.log(error)
        });

        // var userId = $('meta[name="userId"]').attr('content');

        // Echo.private('App.User.' + userId).notification((notification) => {
        //     this.notifications.unshift(notification);
        // });
    }

});