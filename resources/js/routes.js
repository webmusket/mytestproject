
import AdminHome from './components/backend/AdminHome.vue'

import CategoryList from './components/backend/category/List.vue'
import AddCategory from './components/backend/category/New.vue'
import EditCategory from './components/backend/category/Edit.vue'


// Post
import SubcategoryList from './components/backend/subcategory/List.vue'
import AddSubcategory from './components/backend/subcategory/New.vue'
import EditSubcategory from './components/backend/subcategory/Edit.vue'

//Items
import ItemList from './components/backend/item/List.vue'
import AddItem from './components/backend/item/New.vue'
import EditItem from './components/backend/item/Edit.vue'


//frontend
import PublicHome from './components/frontend/PublicHome.vue'
import Items from './components/frontend/Items.vue'

export const routes = [
    {
        path:'/admin',
        component:AdminHome
    },

//category
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

//subcategory
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

//item
    {
        path:'/item-list',
        component:ItemList
    },
    {
        path:'/add-item',
        component:AddItem
    },
    {
        path:'/edit-item/:itemid',
        component:EditItem
    },

    // Frontend Route
    {
        path:'/',
        component:PublicHome
    },

    {
        path:'/itemfor/:slug',
        component:Items
    },
    // {
    //     path:'/cart/:id',
    //     component:SingleItem
    // }

];