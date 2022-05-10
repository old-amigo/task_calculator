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
        },

        fetchMemory:function (){
            axios.get('/src/controllers/getMemory.php').then(
                (response) => {
                    this.memory = response.data;
                    console.log(response);
                });
        },

        fetchDrives:function (){
            axios.get('/src/controllers/getDrives.php').then(
                (response) => {
                    this.drives = response.data;
                    console.log(response);
                });
        },

        fetchMotherboards:function (){
            axios.get('/src/controllers/getMotherboards.php').then(
                (response) => {
                    this.motherboards = response.data;
                    console.log(response);
                });
        },

        fetchCases:function (){
            axios.get('/src/controllers/getCases.php').then(
                (response) => {
                    this.cases = response.data;
                    console.log(response);
                });
        }


    },
    created:function (){
        console.log('vue is ok');

    },
    mounted:function (){
        this.fetchProcessors();
        this.fetchMemory();
        this.fetchDrives();
        this.fetchMotherboards();
        this.fetchCases();
    }
}).mount(".js-form");