<template>
      <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">FrontEnd <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Frontend</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <li v-for="cat in category" class="nav-item">
        <a  class="nav-link collapsed" href="#" data-toggle="collapse" :data-target="`#${cat.title}`" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span> {{cat.title}}</span>
        </a>

        <div :id="cat.title" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Sub Category:</h6>
            <div v-for="subcat in cat.subcategories">
	            <router-link  class="nav-link" :to="`/itemfor/${subcat.slug}`">
		          <i class="fas fa-fw fa-cog"></i>
		          <span style="color: black;">{{subcat.title}}</span>
		        </router-link>
		    </div>

          </div>
        </div>

      </li>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

          	<button type="button" @click="getcartitem()" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
			  Cart
			</button>
			<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-scrollable" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        


<table  class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Item Id</th>
      <th scope="col">Title</th>
      <th scope="col">Price</th>
      <th scope="col">User Email</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for='(cartitem,index) in cart'>
      <td scope="row">{{index+1}}</td>
      <td>{{cartitem.item_id}}</td>
      <td>{{cartitem.title}}</td>
      <td>{{cartitem.price}}</td>
      <td>{{cartitem.user_email}}</td>
      <td><a href="" @click.prevent = "deletecartitem(cartitem.id)" >Delete</a></td>
    </tr>
  </tbody>
</table>



			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button @click="checkout()" type="button" class="btn btn-primary">Checkout</button>
			      </div>
			    </div>
			  </div>
			</div>






            <div class="topbar-divider d-none d-sm-block"></div>
            




          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->

      <div class="container-fluid">
      	<router-view></router-view>

      </div>

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
</template>

<script>
    export default {
        name: "Front",
        components: {

	    },
	    props: ['catwithsubcat'],

	    data(){
	    	return{
	    		category: JSON.parse(this.catwithsubcat),
	    		cart: ''
	    	}

	    },
	    methods:{
	    	getcartitem(){
	    		axios.get('/gotocart')
                   .then((response)=>{
                       // console.log(response.data)
                       this.cart = response.data.userCart
                   })
	    	},
	    	checkout(){
	    		axios.get('/checkout')
                   .then((response)=>{
                       // console.log(response.data)
                       this.$alert(response.data.message);
                   })
	    	},
	    	deletecartitem(id){
	    		axios.get('/deletecart/'+id)
                   .then(()=>{
                       this.getcartitem()
                   })
	    	}
	    }



    }
</script>

<style scoped>
</style>