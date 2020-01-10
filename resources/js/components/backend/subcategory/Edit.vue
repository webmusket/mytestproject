<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-10">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Update Subcategory</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" @submit.prevent="updateSubcategory()">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="subcategoryId">Update Title </label>
                                    <input type="text" class="form-control"  placeholder="Add New Subcategory" v-model="form.title" name="title" :class="{ 'is-invalid': form.errors.has('title') }">
                                    <has-error :form="form" field="title"></has-error>
                                </div>

                                <div class="form-group">
                                    <label for="subcategoryId">Update Slug </label>
                                    <input type="text" class="form-control"  placeholder="Add New Subcategory" v-model="form.slug" name="slug" :class="{ 'is-invalid': form.errors.has('slug') }">
                                    <has-error :form="form" field="slug"></has-error>
                                </div>

                                <div class="form-group" >
                                    <label>Select</label>
                                    <select class="form-control" :class="{ 'is-invalid': form.errors.has('cat_id') }" v-model="form.cat_id">
                                        <option disabled value="">Select One</option>
                                        <option :value="category.id" v-for="category in getallCategory">{{category.title}}</option>

                                    </select>
                                    <has-error :form="form" field="cat_id"></has-error>
                                </div>


                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
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
        name: "Edit",
        data(){
            return{
                form: new Form({
                    title:'',
                    cat_id:'',
                    slug:''
                })
            }
        },
        mounted(){
            this.$store.dispatch("allCategory")
        },
        created(){
            axios.get(`editsubcategory/${this.$route.params.subcategoryid}`)
                .then((response)=>{
                    console.log(response.data)
                    this.form.fill(response.data.subcategory)
                })
        },
        computed:{
            getallCategory(){
                return this.$store.getters.getCategory
            }
        },
        methods:{
            updateSubcategory(){
                this.form.post(`update-subcategory/${this.$route.params.subcategoryid}`)
                    .then(()=>{
                        this.$router.push('/subcategory-list')
                        toast({
                            type: 'success',
                            title: 'Post Updated successfully'
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