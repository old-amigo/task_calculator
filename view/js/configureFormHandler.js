Vue.createApp({
    data: () => ({
        processors: [],
        memory: [],
        drives: [],
        motherboards: [],
        cases: [],
        selectedProcessor: {'name':'none', 'cost':0},
        selectedMemory: {'name':'none', 'cost':0},
        selectedDrive: {'name':'none', 'cost':0},
        selectedMotherboard: {'name':'none', 'cost':0},
        selectedCase: {'name':'none', 'cost':0}
    }), methods: {
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

    }, mounted: function () {
        this.fetchProcessors();
        this.fetchMemory();
        this.fetchDrives();
        this.fetchMotherboards();
        this.fetchCases();
    }
}).mount(".js-form");