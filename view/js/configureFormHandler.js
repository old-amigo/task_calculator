Vue.createApp({
    data: () => ({
        // таким образом данные задаваться не должны, это заглушка пока не работает получение с БД
        processors: [
            {
                "name": "AMD Ryzen 5 5600G (6x3.9 \u0413\u0413\u0446 SMT)",
                "cost": 2300
            }
        ],
        memory: [
            {
                "name": "8 \u0413\u0411 DDR4 NON-ECC",
                "cost": 240
            }, {
                "name": "16 \u0413\u0411 DDR4 NON-ECC",
                "cost": 480
            }, {
                "name": "32 \u0413\u0411 DDR4 NON-ECC",
                "cost": 960
            }, {
                "name": "64 \u0413\u0411 DDR4 NON-ECC",
                "cost": 1920
            }],
        drives: [
            {
                "name": "240 \u0413\u0411 SSD SATA Enterprise",
                "cost": 1200
            }, {
                "name": "240 \u0413\u0411 SSD SATA Enterprise",
                "cost": 2100
            }, {
                "name": "800 \u0413\u0411 SSD SATA Enterprise",
                "cost": 3200
            }],
        motherboards: [{"name": "AMD B550", "cost": 960}],
        cases: [
            {
                "name": "2U, 1 \u0431\u043b\u043e\u043a \u043f\u0438\u0442\u0430\u043d\u0438\u044f",
                "cost": 3900
            }, {
                "name": "4U, 1 \u0431\u043b\u043e\u043a \u043f\u0438\u0442\u0430\u043d\u0438\u044f",
                "cost": 7900
            }],
        selectedProcessor: 2300,
        selectedMemory: 240,
        selectedDrive: 1200,
        selectedMotherboard: 960,
        selectedCase: 3900
    }),
    methods: {
        fetchProcessors: function () {
            axios.get('/src/controllers/getProcessors.php').then(
                (response) => {
                    this.processors = response.data;
                    console.log(response);
                });
        },

        fetchMemory: function () {
            axios.get('/src/controllers/getMemory.php').then(
                (response) => {
                    this.memory = response.data;
                    console.log(response);
                });
        },

        fetchDrives: function () {
            axios.get('/src/controllers/getDrives.php').then(
                (response) => {
                    this.drives = response.data;
                    console.log(response);
                });
        },

        fetchMotherboards: function () {
            axios.get('/src/controllers/getMotherboards.php').then(
                (response) => {
                    this.motherboards = response.data;
                    console.log(response);
                });
        },

        fetchCases: function () {
            axios.get('/src/controllers/getCases.php').then(
                (response) => {
                    this.cases = response.data;
                    console.log(response);
                });
        }


    },
    created: function () {
        console.log('vue is ok');

    },
    mounted: function () {
        // TODO: починить получение данных от БД
        // this.fetchProcessors();
        // this.fetchMemory();
        // this.fetchDrives();
        // this.fetchMotherboards();
        // this.fetchCases();
    }
}).mount(".js-form");