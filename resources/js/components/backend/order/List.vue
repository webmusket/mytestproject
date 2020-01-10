<template>
	<div class="accordion" id="accordionExample">

	  <div  v-for="order in orders" class="card">

	    <div class="card-header" id="headingOne">
	      <h2 class="mb-0">
	        <button class="btn btn-link" type="button" data-toggle="collapse" :data-target="`#${order.id}`" aria-expanded="true" aria-controls="collapseOne">
	          This is order Number #{{order.id}}
	        </button>
	        
	      </h2>
	      <a class="btn btn-primary" href="" @click.prevent="deleteorder(order.id)">Delete</a>
	    </div>

	    <div :id="order.id" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
	      <div  class="card-body">
	        <div class="row">
	        	<div class="col-lg-5">
	        		<table class="table table-bordered">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Item Id</th>
					      <th scope="col">Price</th>
					      <th scope="col">Title</th>
					    </tr>
					  </thead>
					  <tbody>
					    <tr v-for="(item,index) in order.order_data">
					      <th scope="row">{{index+1}}</th>
					      <td>{{item.item_id}}</td>
					      <td>{{item.price}}</td>
					      <td>{{item.title}}</td>
					    </tr>
					  </tbody>
					</table>
	        	</div>
	        	<div class="col-lg-2">
	        		
	        	</div>
	        	<div class="col-lg-5">
	        		<table class="table table-bordered">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Name</th>
					      <th scope="col">Email</th>
					    </tr>
					  </thead>
					  <tbody>
					    <tr >
					      <th scope="row">1</th>
					      <td>{{order.user_data.name}}</td>
					      <td>{{order.user_data.email}}</td>
					    </tr>
					  </tbody>
					</table>
	        	</div>
	        </div>
	      </div>
	    </div>
	  </div>



	</div>
</template>

<script>
    export default {
        name: "List",

        mounted(){
            this.$store.dispatch('getOrder')
        },
        computed:{
            orders(){
                return this.$store.getters.getorder
            }
        },
        methods:{
        	deleteorder(id){ 	
        		this.$confirm("Are you sure?").then(() => {
				  	axios.get('/delete-order/'+id)

	                   .then(()=>{
	                   		
	                       this.$store.dispatch('getOrder')
	                   })
	                   .catch(()=>{

	                   })
				});
               
		    }
        	

        }
    }
</script>