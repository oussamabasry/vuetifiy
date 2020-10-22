import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export const store = new Vuex.Store({
    state: {
        user: null,
        drawer: true,
        listcondidates: [
            {
                "id": "1",
                "name": "Jim Richardson",
                "age": "25",
                "note": "13.6644",
                "diploma": "Catherine",
                "school": "Leo",
                "filiere": "GLSID"
                },
                {
                "id": "2",
                "name": "Tim Steele",
                "age": "25",
                "note": "13.9807",
                "diploma": "Teresa",
                "school": "Chris",
                "filiere": "BDCC"
                },
                {
                "id": "3",
                "name": "Lynn Lopez",
                "age": "25",
                "note": "15.3122",
                "diploma": "Louise",
                "school": "Kenneth",
                "filiere": "GMSI"
                },
                {
                "id": "4",
                "name": "Michelle Heath",
                "age": "25",
                "note": "17.6233",
                "diploma": "Lewis",
                "school": "Ronald",
                "filiere": "GIL"
                },
                {
                "id": "5",
                "name": "Pauline Ferrell",
                "age": "25",
                "note": "19.4143",
                "diploma": "Melanie",
                "school": "Harvey",
                "filiere": "SEER"
                },
                {
                "id": "6",
                "name": "Malcolm Stanton",
                "age": "25",
                "note": "19.745",
                "diploma": "Megan",
                "school": "Brian",
                "filiere": "GECSI"
                },
                {
                "id": "7",
                "name": "Stacy Jensen",
                "age": "25",
                "note": "19.6461",
                "diploma": "Carrie",
                "school": "Beth",
                "filiere": "GLSID"
                },
                {
                "id": "8",
                "name": "Joseph Sharpe",
                "age": "25",
                "note": "15.8463",
                "diploma": "Martin",
                "school": "Walter",
                "filiere": "BDCC"
                },
                {
                "id": "9",
                "name": "Doris Shelton",
                "age": "25",
                "note": "13.4096",
                "diploma": "Hazel",
                "school": "Melanie",
                "filiere": "GMSI"
                },
                {
                "id": "10",
                "name": "Rhonda Kane",
                "age": "25",
                "note": "14.3552",
                "diploma": "Emily",
                "school": "Wayne",
                "filiere": "GIL"
                },
                {
                "id": "11",
                "name": "Kimberly Song",
                "age": "25",
                "note": "16.0902",
                "diploma": "Joshua",
                "school": "Don",
                "filiere": "SEER"
                },
                {
                "id": "12",
                "name": "Alex Bunn",
                "age": "25",
                "note": "16.3183",
                "diploma": "Edna",
                "school": "Christina",
                "filiere": "GECSI"
                },
                {
                "id": "13",
                "name": "Roger Pickett",
                "age": "25",
                "note": "14.0779",
                "diploma": "Steven",
                "school": "Lester",
                "filiere": "GLSID"
                },
                {
                "id": "14",
                "name": "Jill Stanton",
                "age": "25",
                "note": "13.4032",
                "diploma": "Kathy",
                "school": "Doris",
                "filiere": "BDCC"
                },
                {
                "id": "15",
                "name": "Nina Powers",
                "age": "25",
                "note": "18.9415",
                "diploma": "William",
                "school": "Ruth",
                "filiere": "GMSI"
                },
                {
                "id": "16",
                "name": "Audrey Livingston",
                "age": "25",
                "note": "13.3532",
                "diploma": "Shelley",
                "school": "Vanessa",
                "filiere": "GIL"
                },
                {
                "id": "17",
                "name": "Audrey Eaton",
                "age": "25",
                "note": "14.5995",
                "diploma": "Kerry",
                "school": "Floyd",
                "filiere": "SEER"
                },
                {
                "id": "18",
                "name": "Vincent Justice",
                "age": "25",
                "note": "18.6601",
                "diploma": "Beth",
                "school": "Eugene",
                "filiere": "GECSI"
                },
                {
                "id": "19",
                "name": "Claude Lassiter",
                "age": "25",
                "note": "13.5553",
                "diploma": "Robert",
                "school": "Kim",
                "filiere": "GLSID"
                },
                {
                "id": "20",
                "name": "Stacy Rubin",
                "age": "25",
                "note": "19.0543",
                "diploma": "Nathan",
                "school": "Jerome",
                "filiere": "BDCC"
                },
                {
                "id": "21",
                "name": "Charlene Abbott",
                "age": "25",
                "note": "11.4777",
                "diploma": "Gail",
                "school": "Ross",
                "filiere": "GIL"
                },
                {
                "id": "22",
                "name": "Diana Middleton",
                "age": "25",
                "note": "15.0765",
                "diploma": "Peter",
                "school": "Thomas",
                "filiere": "GMSI"
                },
                {
                "id": "23",
                "name": "Tonya Griffin",
                "age": "25",
                "note": "17.4004",
                "diploma": "Priscilla",
                "school": "Joanne",
                "filiere": "SEER"
                },
                {
                "id": "24",
                "name": "Anita Marsh",
                "age": "25",
                "note": "15.2006",
                "diploma": "Glen",
                "school": "Angela",
                "filiere": "GECSI"
                },
                {
                "id": "25",
                "name": "Nina Marsh",
                "age": "25",
                "note": "16.6145",
                "diploma": "Dawn",
                "school": "Eva",
                "filiere": "GLSID"
                },
                {
                "id": "26",
                "name": "Wanda Bender",
                "age": "25",
                "note": "10.2791",
                "diploma": "Lorraine",
                "school": "Betty",
                "filiere": "BDCC"
                },
                {
                "id": "27",
                "name": "Bonnie Olson",
                "age": "25",
                "note": "12.2788",
                "diploma": "Ted",
                "school": "Dorothy",
                "filiere": "GIL"
                },
                {
                "id": "28",
                "name": "Cathy Dyer",
                "age": "25",
                "note": "14.3321",
                "diploma": "Jay",
                "school": "Dean",
                "filiere": "GMSI"
                },
                {
                "id": "29",
                "name": "Jason Owens",
                "age": "25",
                "note": "16.7092",
                "diploma": "Brandon",
                "school": "Johnny",
                "filiere": "GECSI"
                },
                {
                "id": "30",
                "name": "Sue Conway",
                "age": "25",
                "note": "15.2511",
                "diploma": "Kimberly",
                "school": "Brett",
                "filiere": "GLSID"
                },
                {
                "id": "31",
                "name": "Randy Gallagher",
                "age": "25",
                "note": "19.9895",
                "diploma": "Jonathan",
                "school": "Kerry",
                "filiere": "BDCC"
                },
                {
                "id": "32",
                "name": "Robert Schwartz",
                "age": "25",
                "note": "18.3602",
                "diploma": "Glen",
                "school": "Gene",
                "filiere": "GIL"
                },
                {
                "id": "33",
                "name": "Megan Teague",
                "age": "25",
                "note": "14.5231",
                "diploma": "Marian",
                "school": "Leo",
                "filiere": "GMSI"
                },
                {
                "id": "34",
                "name": "Hazel Sherrill",
                "age": "25",
                "note": "15.0324",
                "diploma": "Kenneth",
                "school": "Courtney",
                "filiere": "SEER"
                },
                {
                "id": "35",
                "name": "Marsha Winters",
                "age": "25",
                "note": "18.5119",
                "diploma": "Nicholas",
                "school": "Kurt",
                "filiere": "GECSI"
                },
                {
                "id": "36",
                "name": "Marsha Crews",
                "age": "25",
                "note": "14.9451",
                "diploma": "Elsie",
                "school": "Dwight",
                "filiere": "GLSID"
                },
                {
                "id": "37",
                "name": "Deborah Blanchard",
                "age": "25",
                "note": "16.9665",
                "diploma": "Dana",
                "school": "Todd",
                "filiere": "BDCC"
                },
                {
                "id": "38",
                "name": "Keith Garrett",
                "age": "25",
                "note": "15.6733",
                "diploma": "Dennis",
                "school": "Maria",
                "filiere": "GIL"
                },
                {
                "id": "39",
                "name": "Jennifer Tyler",
                "age": "25",
                "note": "17.9931",
                "diploma": "Alexander",
                "school": "Penny",
                "filiere": "GMSI"
                },
                {
                "id": "40",
                "name": "Sidney Riley",
                "age": "25",
                "note": "17.4262",
                "diploma": "Natalie",
                "school": "Jerome",
                "filiere": "SEER"
                },
                {
                "id": "41",
                "name": "Joel Adkins",
                "age": "25",
                "note": "11.2716",
                "diploma": "Alison",
                "school": "Calvin",
                "filiere": "GECSI"
                },
                {
                "id": "42",
                "name": "Ruth Butler",
                "age": "25",
                "note": "19.0597",
                "diploma": "Leon",
                "school": "Molly",
                "filiere": "GLSID"
                },
                {
                "id": "43",
                "name": "Allan Leach",
                "age": "25",
                "note": "14.7037",
                "diploma": "Wendy",
                "school": "Ernest",
                "filiere": "BDCC"
                },
                {
                "id": "44",
                "name": "Todd Casey",
                "age": "25",
                "note": "13.3139",
                "diploma": "Lynda",
                "school": "Ronnie",
                "filiere": "GECSI"
                },
                {
                "id": "45",
                "name": "Stacey O",
                "age": "25",
                "note": "14.6078",
                "diploma": "Nicholas",
                "school": "George",
                "filiere": "SEER"
                },
                {
                "id": "46",
                "name": "Sarah Dickson",
                "age": "25",
                "note": "11.1938",
                "diploma": "Sidney",
                "school": "Joseph",
                "filiere": "GMSI"
                },
                {
                "id": "47",
                "name": "Lee Riley",
                "age": "25",
                "note": "13.4667",
                "diploma": "Mary",
                "school": "Evelyn",
                "filiere": "GIL"
                },
                {
                "id": "48",
                "name": "Christopher Rosenberg",
                "age": "25",
                "note": "13.2071",
                "diploma": "George",
                "school": "Florence",
                "filiere": "GLSID"
                },
                {
                "id": "49",
                "name": "Mike Lucas",
                "age": "25",
                "note": "13.4058",
                "diploma": "Joy",
                "school": "Beth",
                "filiere": "BDCC"
                },
                {
                "id": "50",
                "name": "Deborah Durham",
                "age": "25",
                "note": "15.5855",
                "diploma": "Caroline",
                "school": "Gayle",
                "filiere": "GIL"
                }
         
        ],
    },
    mutations: {
        setUser(state, payload) {
            state.user = payload
        },
        changeDrawer(state, payload) {
            state.drawer = payload
        }
    },
    actions: {

    },
    getters: {
        user(state) {
            return state.user
        },
        drawer(state){
            return state.drawer
        },

        getCondidateById: (state) => (id) => {
            return state.listcondidates.find(cand => cand.id === id)
          },

        getCondidates:(state) => {
            return state.listcondidates
        }
    },
    
})
