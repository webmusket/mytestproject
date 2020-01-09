<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-10">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add New Item</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" @submit.prevent="addnewItem()">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="itemId">Title </label>
                                    <input type="text" class="form-control" id="itemId" placeholder="Add Title" v-model="form.title" name="title" :class="{ 'is-invalid': form.errors.has('title') }">
                                    <has-error :form="form" field="title"></has-error>
                                </div>

                                <div class="form-group">
                                    <label for="itemId">Price </label>
                                    <input type="text" class="form-control" id="itemId" placeholder="Add  Price" v-model="form.price" name="price" :class="{ 'is-invalid': form.errors.has('price') }">
                                    <has-error :form="form" field="price"></has-error>
                                </div>

                                <div class="form-group" >
                                    <label>Select</label>
                                    <select class="form-control" :class="{ 'is-invalid': form.errors.has('cat_id') }" v-model="form.subcat_id">
                                        <option disabled value="">Select One</option>
                                        <option :value="subcategory.id" v-for="subcategory in getSubcategory">{{subcategory.title}}</option>

                                    </select>
                                    <has-error :form="form" field="cat_id"></has-error>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</template>

<script>
    export default {
        name: "New",
        data(){
            return{
                form: new Form({
                    title:'',
                    subcat_id:'',
                    price: ''
                })
            }
        },
        mounted(){
            this.$store.dispatch("getItem")
        },
        computed:{
            getSubcategory(){
                return this.$store.getters.getSubcategory
            }
        },
        methods:{

            addnewItem(){
                this.form.post('/add-item')
                    .then(()=>{
                        this.$router.push('/item-list')
                        toast({
                            type: 'success',
                            title: 'Post Added successfully'
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