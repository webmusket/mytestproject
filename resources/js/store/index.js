export default {
    state:{
        category:[],
        subcategory:[],
        item:[],
        itembycat:[],

    },
    getters:{
        getCategory(state){
            return state.category
        },
        getSubcategory(state){
            return state.subcategory
        },
        getItem(state){
            return state.item
        },
        getitembycat(state){
            return state.itembycat
        },
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
        allSubcategory(context){
            axios.get('/subcategory')
                .then((response)=>{
                    console.log(response.data)
                    context.commit('subcategories',response.data.subcategories)
                })
        },
        allItem(context){
            axios.get('/item')
                .then((response)=>{
                    console.log(response.data)
                    context.commit('items',response.data.items)
                })
        },

        getItemByCatSlug(context,payload){
            axios.get('/itemfor/'+payload)
                .then((response)=>{
                    console.log(response.data.itembycat)
                    context.commit('getItemByCatSlug',response.data.itembycat)
                })
        },
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
        items(state,payload){
            return state.item = payload
        },


        getItemByCatSlug(state,payload){
            state.itembycat = payload
        },



    }
}