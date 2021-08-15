<template>
  <div class="container">
     <div class="row">
         
       
          <div class="col-12 col-md-8">
                 <div class="card">
                    <div class="card-header">
                     <h3 class="card-title text-center">جدول فريمات </h3>

                        <div class="card-tools">
                         <button class="btn btn-success" @click="newModel">اضافة فريم
                    <i class="la la-plus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>اسم المنتج</th>
                      <th>الشركة</th>
                      <th>التاريخ</th>
                     <th>السعر</th>
                      <th>تفاصيل</th>
                      <th>modify</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="prodects in prodect" :key="prodects.id">
                      <td>{{prodects.id}}</td>
                      <td>{{prodects.name}}</td>
                      <td>{{prodects.company}}</td>
                      <td>{{prodects.date }}</td>
                      <td>{{prodects.price}}</td>
                      <td>{{prodects.Details }}</td>

                      <!-- <td><span class="tag tag-success">Approved</span></td> -->
                      <td>
                        <a href="#" @click="editModel(prodects)">
                          <i class="la la-edit"></i>
                        </a>
                        /
                        <a href="#" @click="deleteuser(prodects.id)">
                          <i class="la la-trash red"></i>
                        </a>
                      </td>
                    </tr>
                
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            
          </div>
           <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-content">
                  <div class="media align-items-stretch">
                    <div class="p-2 bg-gradient-x-warning text-white media-body text-left rounded-left">
                      <h5 class="text-white">الفريمات </h5>
                      <h5 class="text-white text-bold-400 mb-0">{{prodect_total}}</h5>
                    </div>
                    <div class="p-2 text-center bg-warning bg-darken-2 rounded-right">
                      <i class="icon-eyeglasses font-large-2 text-white"></i>
                    </div>
                  </div>
                </div>
              </div>
                
            
          </div>
        
     </div>
                <!-- Modal -->
        <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="addnewLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" v-show="!editmode" id="addnewLabel"> اضافة فريم</h5>
                <h5 class="modal-title" v-show="editmode" id="addnewLabel"> تعديل فريم</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form @submit.prevent="editmode ? updateUser() : createuser()" >
              <div class="modal-body">
                <!-- user name -->
                <div class="form-group">
                 <input v-model="form.name" type="text" name="name" class="form-control" placeholder="اسم فريم">
                 <div v-if="form.errors.has('name')" v-html="form.errors.get('name')" /></div>
                  <!-- user email -->
                  <div class="form-group">
                   <input v-model="form.company" type="text" name="company" class="form-control" placeholder="اسم الشركه">
                 <div v-if="form.errors.has('company')" v-html="form.errors.get('company')" /></div>
              <!-- cg -->
                 <div class="form-group">
              <input v-model="form.price" type="number" name="price" class="form-control" placeholder="المبلغ">
                 <div v-if="form.errors.has('price')" v-html="form.errors.get('price')" /></div>
                 <!--  -->
                <div class="form-group">
                   <input v-model="form.date" type="date" name="date" class="form-control" >
                 <div v-if="form.errors.has('date')" v-html="form.errors.get('date')" /></div>
              <!-- bio -->
                <div class="form-group">
                   <textarea v-model="form.Details"  id="Details" class="form-control" 
                   placeholder="تفاصيل فريم"></textarea>
                 <div v-if="form.errors.has('Details')" v-html="form.errors.get('Details')" />
              </div></div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">الغاء</button>
                <button v-show="editmode" type="submit" class="btn btn-success">تعديل </button>
                <button v-show="!editmode" type="submit" class="btn btn-primary">اضافة</button>
              </div>

              </form>
            </div>
          </div>
        </div>
    </div>
</template>

<script>
  export default {
      data(){
            return{
              editmode: false,
              prodect :{},
              prodect_total:'',
              form:new Form(
                {
                  id:'',
                  name:'',
                  company:'',
                  price:'',
                  date:'',
                  Details:''
                 
                }
              )
            }
      },

      methods:

      {
        updateUser(){
          this.$Progress.start();
            this.form.put('api/prodects/'+this.form.id)
            .then(() => {
              //success
             $('#addnew').modal('hide');
                swal.fire(
                   'تعديل !',
                   'تم التعديل بنجاح ',
                   'success'
                            )

               this.$Progress.finish();
               Fire.$emit('AfterCreate');


            })
            .catch(() =>{
             this.$Progress.fail();
            });
        },
        editModel(user){
          this.editmode=true;
          this.form.reset();
          $('#addnew').modal('show');
          this.form.fill(user);
        },
        newModel(){
         this.editmode=false;
          this.form.reset();
       $('#addnew').modal('show');


        },
        deleteuser(id){

          // sweet alert 
         swal.fire({
           title: 'هل انت متأكد؟',
              text: "هل انت متأكد من حذف هذا فريم!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'نعم!',
              cancelButtonText: 'الغاء'
              }).then((result) => {
                if(result.value){
                // send Http Delete requst 
                this.form.delete('api/prodects/'+id)
                .then(()=>{
                   swal.fire(
                   'حذف!',
                   'تم حذف هذا فريم.',
                   'success'
                            )
                            // fire for Refreshing page
                Fire.$emit('AfterCreate');

  
                })
                .catch(()=>{
                  swal("Failed!","There was something Wronge.","warning");
                });
                }
                
               
})
        },
        loadUsers(){

        axios.get("api/prodects").then(({ data }) => (this.prodect = data.prodect.data));
        axios.get("api/prodects").then(({ data }) => (this.prodect_total = data.prodect_total));
        },

        createuser(){
        this.$Progress.start();
          // Http Post data to create new user 
        this.form.post('api/prodects')
        .then(() => {
           Fire.$emit('AfterCreate');
        $('#addnew').modal('hide');

         toast.fire({
           icon: 'success',
           title: 'تم انشاء فريم بنجاح'
        })
        .catch(

        )
        

       
})


        this.$Progress.finish();

        }
         
      },
        created() {
            this.loadUsers();
            // Refrash page 
             Fire.$on('AfterCreate',() => {
               this.loadUsers();
             });

            // setInterval(() => this.loadUsers(),3000);
        }
    }
</script>
