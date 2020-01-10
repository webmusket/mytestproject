<template>
    <div>
        <section class="content">
            <div class="row justify-content-around" >
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">SubCategory List</h3>

                            <div class="card-tools">
                                <button class="btn btn-primary">
                                    <router-link to="/add-subcategory" style="color:#fff"> Add New Post</router-link>
                                </button>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>

                                    <th>Sl</th>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>

                                <tr v-for="(subcategory,index) in subcategories">
                                    <td>{{index+1}}</td>
                                    <td v-if="subcategory.category">{{subcategory.category.title}}</td>
                                    <td>{{subcategory.title}}</td>
                                    <td>{{subcategory.slug}}</td>
                                    <td>
                                        <router-link :to="`edit-subcategory/${subcategory.id}`">Edit</router-link>

                                        <a href="" @click.prevent = "deleteSubcategory(subcategory.id)" >Delete</a>

                                    </td>
                                </tr>
                                </tbody>


                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
</template>

<script>
    export default {
        name: "List",
        mounted(){
            this.$store.dispatch('allSubcategory')
        },
        computed:{
            subcategories(){
                return this.$store.getters.getSubcategory
            }
        },
        methods:{

            deleteSubcategory(id){
               axios.get('/deleteSubcategory/'+id)
                   .then(()=>{
                       this.$store.dispatch('allSubcategory')
                       toast({
                           type: 'success',
                           title: 'Post Deleted successfully'
                       })
                   })
                   .catch(()=>{
                   })
            }
        }
    }
</script>

<style scoped>
</style>