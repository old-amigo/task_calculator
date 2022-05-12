Vue.createApp({
    data: () => ({
        processors: [],
        memory: [],
        drives: [],
        motherboards: [],
        cases: [],
        selectedProcessor: JSON.stringify({'name':'none', 'cost':0}),
        selectedMemory: JSON.stringify({'name':'none', 'cost':0}),
        selectedDrive: JSON.stringify({'name':'none', 'cost':0}),
        selectedMotherboard: JSON.stringify({'name':'none', 'cost':0}),
        selectedCase: JSON.stringify({'name':'none', 'cost':0})
    }),
    computed: {
        sum () {
            return JSON.parse(this.selectedProcessor).cost
                + JSON.parse(this.selectedMemory).cost
                + JSON.parse(this.selectedDrive).cost
                + JSON.parse(this.selectedMotherboard).cost
                + JSON.parse(this.selectedCase).cost;
        }
    },
    methods: {
        fetchProcessors: function () {
            axios.get('/src/controllers/getProcessors.php').then((response) => {
                this.processors = response.data;

            });
        },

        fetchMemory: function () {
            axios.get('/src/controllers/getMemory.php').then((response) => {
                this.memory = response.data;
            });
        },

        fetchDrives: function () {
            axios.get('/src/controllers/getDrives.php').then((response) => {
                this.drives = response.data;
            });
        },

        fetchMotherboards: function () {
            axios.get('/src/controllers/getMotherboards.php').then((response) => {
                this.motherboards = response.data;
            });
        },

        fetchCases: function () {
            axios.get('/src/controllers/getCases.php').then((response) => {
                this.cases = response.data;
            });
        },
    }, created: function () {
        this.fetchProcessors();
        this.fetchMemory();
        this.fetchDrives();
        this.fetchMotherboards();
        this.fetchCases();
    }
}).mount(".js-form");