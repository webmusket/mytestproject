<template>
    <div>
        <section class="content">
            <div class="row justify-content-around" >
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Item List</h3>

                            <div class="card-tools">
                                <button class="btn btn-primary">
                                    <router-link to="/add-item" style="color:#fff"> Add New Item</router-link>
                                </button>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>

                                    <th>Sl</th>
                                    <th>Subcategory</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>

                                <tr v-for="(item,index) in items">
                                    <td>{{index+1}}</td>
                                    <td v-if="item.subcategory">{{item.subcategory.title}}</td>
                                    <td>{{item.title}}</td>
                                    <td>{{item.price}}</td>
                                    <td>
                                        <router-link :to="`edit-item/${item.id}`">Edit</router-link>

                                        <a href="" @click.prevent = "deleteItem(item.id)" >Delete</a>

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
            this.$store.dispatch('allItem')
        },
        computed:{
            items(){
                return this.$store.getters.getItem
            }
        },
        methods:{

            deleteItem(id){
               axios.get('/deleteitem/'+id)
                   .then(()=>{
                       this.$store.dispatch('allItem')
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