<template>
  <div class="container">
     <div class="row">
         
       
          <div class="col-12 col-md-8">
                 <div class="card">
                    <div class="card-header">
                     <h3 class="card-title text-center">جدول المنصرفات</h3>

                        <div class="card-tools">
                         <button class="btn btn-success" @click="newModel">اضافة منصرف
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
                      <th>اسم المنصرف</th>
                      <th>المبلغ</th>
                      <th>التاريخ</th>
                      <th>تفاصيل</th>
                      <th>modify</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="expense in expenses" :key="expense.id">
                      <td>{{expense.id}}</td>
                      <td>{{expense.name}}</td>
                      <td>{{formatPrice(expense.amount)}}</td>
                      <td>{{expense.date }}</td>
                      <td>{{expense.details }}</td>

                      <!-- <td><span class="tag tag-success">Approved</span></td> -->
                      <td>
                        <a href="#" @click="editModel(expense)">
                          <i class="la la-edit"></i>
                        </a>
                        /
                        <a href="#" @click="deleteuser(expense.id)">
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
             <div class="card bg-danger">
                <div class="card-content">
                  <div class="card-body pb-1">
                    <div class="row text-white">
                      <div class="col-6">
                        <h1><i class="la la-dollar background-round text-white"></i></h1>
                        <!-- <h4 class="pt-1 m-0 text-white">10% <i class="la la-arrow-down"></i></h4> -->
                      </div>
                      <div class="col-6 text-right">
                        <h3 class="text-white mb-2"><i class="la la-arrow-down"></i>{{formatPrice(expenses_total)}} SDG </h3>
                        <span> مجموع مبلغ المنصرفات</span>
                        <br>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
                </div>
            <!-- <div class="card">
              <div class="card-content">
                <div class="earning-chart position-relative">
                  <div class="chart-title position-absolute mt-2 ml-2 ">
                    <h1 class="display-4">{{expenses_total}}</h1>
                    <span class="text-muted">مجموع مبلغ المنصرفات </span>
                  </div>
                  <canvas id="earning-chart" class="height-150"></canvas>
                   
                </div>
              </div>
            </div>
          </div> -->
        
     </div>
                <!-- Modal -->
        <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="addnewLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" v-show="!editmode" id="addnewLabel"> اضافة منصرف</h5>
                <h5 class="modal-title" v-show="editmode" id="addnewLabel"> تعديل منصرف</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form @submit.prevent="editmode ? updateUser() : createuser()" >
              <div class="modal-body">
                <!-- user name -->
                <div class="form-group">
                 <input v-model="form.name" type="text" name="name" class="form-control" placeholder="اسم المنصرف">
                 <div v-if="form.errors.has('name')" v-html="form.errors.get('name')" /></div>
                  <!-- user email -->
                  <div class="form-group">
                   <input v-model="form.amount" type="number" name="amount" class="form-control" placeholder="المبلغ">
                 <div v-if="form.errors.has('amount')" v-html="form.errors.get('amount')" /></div>
              <!-- cg -->
                <div class="form-group">
                   <input v-model="form.date" type="date" name="date" class="form-control" placeholder="تفاصيل ">
                 <div v-if="form.errors.has('date')" v-html="form.errors.get('date')" /></div>
              <!-- bio -->
                <div class="form-group">
                   <textarea v-model="form.details"  id="details" class="form-control" 
                   placeholder="تفاصيل المنصرف"></textarea>
                 <div v-if="form.errors.has('details')" v-html="form.errors.get('details')" />
              </div>
              </div>
      
              
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
              expenses :{},
              expenses_total:'',
              form:new Form(
                {
                  id:'',
                  name:'',
                  amount:'',
                  date:'',
                  details:''
                 
                }
              )
            }
      },

      methods:

      {
        updateUser(){
          this.$Progress.start();
            this.form.put('api/expenses/'+this.form.id)
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
            formatPrice(value) {
        let val = (value/1).toFixed(2).replace(',', '.')
        return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    },
        deleteuser(id){

          // sweet alert 
         swal.fire({
           title: 'هل انت متأكد؟',
              text: "هل انت متأكد من حذف هذا المنصرف!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'نعم!',
              cancelButtonText: 'الغاء'
              }).then((result) => {
                if(result.value){
                // send Http Delete requst 
                this.form.delete('api/expenses/'+id)
                .then(()=>{
                   swal.fire(
                   'حذف!',
                   'تم حذف هذا المنصرف.',
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

        axios.get("api/expenses").then(({ data }) => (this.expenses = data.expenses.data));
        axios.get("api/expenses").then(({ data }) => (this.expenses_total = data.expenses_total));
        },

        createuser(){
        this.$Progress.start();
          // Http Post data to create new user 
        this.form.post('api/expenses')
        .then(() => {
           Fire.$emit('AfterCreate');
        $('#addnew').modal('hide');

         toast.fire({
           icon: 'success',
           title: 'تم انشاء المنصرف بنجاح'
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
