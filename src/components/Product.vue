<template>
  <div class="hello">
    <h3>{{msg}}</h3>
    <!-- <p>{{ category }}</p><br> -->
    <!-- <p>{{ product }}</p> -->
 <div>
     <div>
          <h1>Add Product</h1>
  <b-form inline>
    <label class="sr-only" for="inline-form-input-name">Name</label>Product Name:-
    <b-form-input
      type=text
      id="inline-form-input-name"
      class="mb-2 mr-sm-2 mb-sm-0"
      placeholder="Produt Name"
      v-model="form.name"
    ></b-form-input>

    <b-form-input
    type=number
      id="inline-form-input-name"
      class="mb-2 mr-sm-2 mb-sm-0"
      placeholder="price"
      v-model="form.price"
    ></b-form-input>
     Category
    <b-form-select v-model="form.category" :options="mainCat" @input="getSubcat(form.category)"></b-form-select>

    <label for="">Sub Category</label>
    <b-form-select v-model="form.subcategory" :options="subcat" v-show="subcat_show" ></b-form-select>
  
     

  


    <b-button variant="primary" @click="saveProduct()">Save</b-button>
  </b-form>
</div>
    <b-table class="mt-3" striped hover :items="product">


    </b-table>

    
  </div>
  </div>
</template>

<script>
import axios from 'axios'
export default {
  name: 'Product',
  props: {
    msg: String
  },
  data:function(){
      return{
        form:{},
      category:[{value:null, text:'select'}],
      mainCat:[{value:null, text:'select'}],
      subcat:[{value:null, text:'select'}],
      product:[],
      selected:null,
      subcat_show:false
      }
  },
   mounted () {
     // set main category
    this.Category();
    this.getAllProduct();
  },
  methods:{
    Category(){
      //set category
      var categ= [{value:null, text:'some text'}]
      axios
      .get('http://localhost:8085/getCategories.php')
      .then(response => (
          response.data.map((r)=>{return categ.push({value:r.id,text:r.category})})
           ))
     this.mainCat = categ
     
    },
    getAllProduct(){
       //get all products    
       this.product = [] 
      axios
      .get('http://localhost:8085/getProduct.php')
      .then(response => (this.product = response.data))
    },
    saveProduct(){
      if(this.form.name !=''){
      axios
      .post('http://localhost:8085/addProduct.php',this.form)
      .then(response => (
          response.data.map((r)=>{return this.mainCat.push({value:r.category,text:r.category})})
           ))
           this.getAllProduct()
           }
           this.getAllProduct()
            this.subcat_show =false
    },
    getSubcat(id){
      let data = {id:id}
      this.subcat = []
       axios
      .post('http://localhost:8085/getSubcat.php',data)
      .then(response => (
          response.data.map((r)=>{return this.subcat.push({value:r.id,text:r.category})})
           ))
           this.subcat_show =true
      
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
