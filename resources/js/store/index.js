export default {
    state:{
        category:[],
        subcategory:[],
        // blogpost:[],
        // singlepost:[],
        // allcategories:[],
        // latestpost:[]
    },
    getters:{
        getCategory(state){
            return state.category
        },
        getSubcategory(state){
            return state.post
        },
        // getblogPost(state){
        //     return state.blogpost
        // },
        // singlepost(state){
        //     return state.singlepost
        // },
        // allcategories(state){
        //     return state.allcategories
        // },
        // latestpost(state){
        //     return state.latestpost
        // }

    },
    actions:{
        allCategory(context){
            axios.get('/category')
                .then((response)=>{
                    console.log(response.data)
                    context.commit('categoreis',response.data.categories)
                })
        },
        getSubcategory(context){
            axios.get('/subcategory')
                .then((response)=>{
                    console.log(response.data)
                    context.commit('subcategories',response.data.subcategories)
                })
        },
        // getblogPost(context){
        //     axios.get('/blogpost')
        //         .then((response)=>{
        //             // console.log(response.data)
        //             context.commit('getblogPost',response.data.posts)
        //         })
        // },
        // getPostById(context,payload){
        //     axios.get('/singlepost/'+payload)
        //         .then((response)=>{
        //             context.commit('siglePost',response.data.post)
        //         })
        // },

        // getPostByCatId(context,payload){
        //     axios.get('/categorypost/'+payload)
        //         .then((response)=>{
        //             console.log(response.data.posts)
        //             context.commit('getPostByCatId',response.data.posts)
        //         })
        // },
        // SearchPost(context,payload){
        //     axios.get('/search?s='+payload)
        //         .then((response)=>{
        //             context.commit('getSearchPost',response.data.posts)
        //         })

        // },
        // latestPost(context){
        //     axios.get('/latestpost')
        //         .then((response)=>{
        //             // console.log(response.data)
        //             context.commit('latestpost',response.data.posts)
        //         })
        // }
    },
    mutations:{
        categoreis(state,data){
            return state.category = data
        },
        subcategories(state,payload){
            return state.subcategory = payload
        },
        // getblogPost(state,payload){
        //     return state.blogpost = payload
        // },
        // siglePost(state,payload){
        //     return state.singlepost = payload
        // },

        // getPostByCatId(state,payload){
        //     state.blogpost = payload
        // },
        // getSearchPost(state,payload){
        //     state.blogpost = payload
        // },
        // latestpost(state,payload){
        //     state.latestpost = payload
        // }


    }
}