
import AdminHome from './components/backend/AdminHome.vue'
import CategoryList from './components/backend/category/List.vue'
import AddCategory from './components/backend/category/New.vue'
import EditCategory from './components/backend/category/Edit.vue'


// Post
import SubcategoryList from './components/backend/subcategory/List.vue'
import AddSubcategory from './components/backend/subcategory/New.vue'
import EditSubcategory from './components/backend/subcategory/Edit.vue'


export const routes = [
    {
        path:'/admin',
        component:AdminHome
    },
    {
        path:'/category-list',
        component:CategoryList
    },
    {
        path:'/add-category',
        component:AddCategory
    },
    {
        path:'/edit-category/:categoryid',
        component:EditCategory
    },

    {
        path:'/subcategory-list',
        component:SubcategoryList
    },
    {
        path:'/add-subcategory',
        component:AddSubcategory
    },
    {
        path:'/edit-subcategory/:subcategoryid',
        component:EditSubcategory
    },

    // // Frontend Route
    // {
    //     path:'/',
    //     component:PublicHome
    // },
    // {
    //     path:'/item',
    //     component:Items
    // },
    // {
    //     path:'/item/:id',
    //     component:SingleItem
    // }

];