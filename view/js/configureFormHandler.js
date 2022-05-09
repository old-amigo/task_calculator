Vue.createApp({
    data: () => ({
        processors:'',
        memory:'',
        drives:'',
        motherboards:'',
        cases:'',
    }),
    methods:{
        fetchProcessors:function (){
            axios.get('/src/controllers/getProcessors.php').then(
                (response) => {
                    this.processors = response.data;
                    console.log(response);
                });
        }
    },
    created:function (){
        console.log('vue is ok');
        this.fetchProcessors();
    }
}).mount(".js-form");