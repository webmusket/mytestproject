<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-10">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add New SubCategory</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" @submit.prevent="addnewSubcategory()">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="subcategoryId">Name </label>
                                    <input type="text" class="form-control" id="subcategoryId" placeholder="Add New SubCategory" v-model="form.title" name="title" :class="{ 'is-invalid': form.errors.has('title') }">
                                    <has-error :form="form" field="title"></has-error>
                                </div>

                                <div class="form-group">
                                    <label for="subcategoryId">Slug </label>
                                    <input type="text" class="form-control" id="subcategoryId" placeholder="Add New SubCategory" v-model="form.slug" name="slug" :class="{ 'is-invalid': form.errors.has('slug') }">
                                    <has-error :form="form" field="slug"></has-error>
                                </div>

                                <div class="form-group" >
                                    <label>Select</label>
                                    <select class="form-control" :class="{ 'is-invalid': form.errors.has('cat_id') }" v-model="form.cat_id">
                                        <option disabled value="">Select One</option>
                                        <option :value="category.id" v-for="category in getCategory">{{category.title}}</option>

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
                    slug: '',
                    cat_id:'',
                })
            }
        },
        mounted(){
            this.$store.dispatch("getSubcategory")
        },
        computed:{
            getCategory(){
                return this.$store.getters.getCategory
            }
        },
        methods:{

            addnewSubcategory(){
                this.form.post('/add-subcategory')
                    .then(()=>{
                        this.$router.push('/subcategory-list')
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