<template>
	<div class="container">
        <div class="row">
            <div v-for="item in getitembycat" class="col-lg-3">
        		<div  class="card">
        		  <img src="https://www.gravatar.com/avatar/59a60f10561531f5719b98b55f37b481?s=300" class="card-img-top" alt="">
        		  <div class="card-body">
        		    <h5 class="card-title">{{item.title}}</h5>
        		    <p class="card-text">$ {{item.price}}</p>
        		    <button @click="addtocart(item.id)" class="btn btn-primary">Add to Cart</button>
        		  </div>
        		</div>
            </div>
        </div>
	</div>
</template>

<script>
	export default {
        name: "Items",

        components: {

	    },


	    data(){
	    	return{
	    		data: ''
	    	}

	    },

        mounted(){
        	// console.log(this.$route);
            this.$store.dispatch('getItemByCatSlug',this.$route.params.slug);
        },
        computed:{
           getitembycat(){
                return this.$store.getters.getitembycat
            } 
        },
        methods:{
        	getItembyCat(){
                this.$store.dispatch('getItemByCatSlug',this.$route.params.slug);
            },
            addtocart(id){
            	axios.get('/cart/'+id)
                   .then((response)=>{
                    this.$alert("Item Added to Cart Successfully.");
                       //console.log(response.data)
                   })

            }
           
        },

        watch:{
            $route(to,from){
                this.getItembyCat();
            }
        }
    }
</script>

<style>
	
</style>