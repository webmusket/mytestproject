<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-10">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Update Item</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" @submit.prevent="updateItem()">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="itemId">Title </label>
                                    <input type="text" class="form-control"  placeholder="Add New Item" v-model="form.title" name="title" :class="{ 'is-invalid': form.errors.has('title') }">
                                    <has-error :form="form" field="title"></has-error>
                                </div>

                                <div class="form-group">
                                    <label for="itemId">Title </label>
                                    <input type="text" class="form-control"  placeholder="Add New Item" v-model="form.slug" name="slug" :class="{ 'is-invalid': form.errors.has('slug') }">
                                    <has-error :form="form" field="slug"></has-error>
                                </div>

                                <div class="form-group">
                                    <label for="itemId">Price</label>
                                    <input type="text" class="form-control"  placeholder="Add New Item" v-model="form.price" name="price" :class="{ 'is-invalid': form.errors.has('price') }">
                                    <has-error :form="form" field="price"></has-error>
                                </div>

                                <div class="form-group" >
                                    <label>Select</label>
                                    <select class="form-control" :class="{ 'is-invalid': form.errors.has('cat_id') }" v-model="form.subcat_id">
                                        <option disabled value="">Select One</option>
                                        <option :value="subcategory.id" v-for="subcategory in getallSubCategory">{{subcategory.title}}</option>

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
                    slug: '',
                    subcat_id:'',
                    price: ''
                })
            }
        },
        mounted(){
            this.$store.dispatch("allSubcategory")
        },
        created(){
            axios.get(`edititem/${this.$route.params.itemid}`)
                .then((response)=>{
                    console.log(response.data)
                    this.form.fill(response.data.item)
                })
        },
        computed:{
            getallSubCategory(){
                return this.$store.getters.getSubcategory
            }
        },
        methods:{
            updateItem(){
                this.form.post(`update-item/${this.$route.params.itemid}`)
                    .then(()=>{
                        this.$router.push('/item-list')
                    })
                    .catch(()=>{
                    })
            }
        }
    }
</script>

<style scoped>
</style>