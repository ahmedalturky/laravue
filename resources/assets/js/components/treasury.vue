<template>
  <div class="container">
     <div class="row">
          <!-- <div class="col-8 col-md-12">
             <div class="card bg-success">
                <div class="card-content">
                  <div class="card-body pb-1">
                    <div class="row text-white">
                      <div class="col-6">
                        <h1><i class="la la-dollar background-round text-white"></i></h1>
                         <h4 class="pt-1 m-0 text-white">10% <i class="la la-arrow-down"></i></h4> 
                      </div>
                      <div class="col-6 text-right">
                        <h3 class="text-white mb-2"><i class="la la-arrow-down"></i> </h3>
                        <h3 class="text-white mb-2"><i class="la la-arrow-up"></i>{{orders_amount}} ج.س </h3>
                        <span> مجموع مبلغ المنصرفات</span>
                        <br>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
                </div> -->
                <div class="col-8 col-md-12">
              <div class="card">
                <div class="card-content">
                  <div class="media align-items-stretch bg-gradient-x-warning text-white rounded">
                    <div class="p-2 media-middle">
                      <h1 class="text-white">{{expenses_total}} ج.س</h1>
                      <h1 class="text-white">{{orders_amount}} ج.س </h1>
                      <h1 class="text-white">-------------</h1>
                      <h1 class="text-white">{{orders_amount-expenses_total}}</h1>
                    </div>
                    <div class="media-body p-2">
                      <h4 class="text-white">مجموع الخزن</h4>
                      <span>المبيعات - المنصرفات</span>
                    </div>
                    <div class="media-right p-2 media-middle">
                      <i class="icon-wallet font-large-2 text-white"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
         <div class="col-12 col-md-6">
                 <div class="card">
                    <div class="card-header">
                     <h3 class="card-title text-center">جدول المبيعات</h3>

                        <!-- <div class="card-tools">
                         <button class="btn btn-success" @click="newModel">اضافة منصرف
                    <i class="la la-plus"></i>
                  </button>
                </div> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr style="background-color:#5DD39F;color:#FFFFFF;">
                      <th>ID</th>
                      <th>اسم العميل<i class="la la-arrow-up"></i></th>
                      <th>العنوان<i class="la la-arrow-up"></i></th>
                     <th>الهاتف<i class="la la-arrow-up"></i></th>
                      <th>التاريخ<i class="la la-arrow-up"></i></th>
                      <th>المنتج <i class="la la-arrow-up"></i></th>
                      <th>المبلغ<i class="la la-arrow-up"></i></th>
                      <!-- <th>modify</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <tr  v-for="order in orders" :key="order.id">
                      <td>{{order.id}}</td>
                      <td>{{order.clint_name}}</td>
                      <td>{{order.clint_address}}</td>
                       <td>{{order.clint_phone}}</td>
                      <td>{{order.date }}</td>
                      <td>{{order.prodect.name }}</td>
                      <td>{{order.amount_left }} ج.س</td>

                      <!-- <td><span class="tag tag-success">Approved</span></td> -->
                      <!-- <td> 

                        <a href="#" @click="editModel(order)">
                          <i class="la la-edit"></i>
                        </a>
                        /
                        <a href="#" @click="deleteorder(order.id)">
                          <i class="la la-trash red"></i>
                        </a>
                      </td> -->
                    </tr>
                
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div></div>
            <!-- /.card -->
       
          <div class="col-12 col-md-6">
                 <div class="card">
                    <div class="card-header">
                     <h3 class="card-title text-center">جدول المنصرفات</h3>

                        <!-- <div class="card-tools">
                         <button class="btn btn-success" @click="newModel">اضافة منصرف
                    <i class="la la-plus"></i>
                  </button>
                </div> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr style="background-color:#EF4D5F;color:#FFFFFF;" >
                      <th>ID</th>
                      <th>اسم المنصرف<i class="la la-arrow-down"></i></th>
                      <th>المبلغ<i class="la la-arrow-down"></i></th>
                      <th>التاريخ<i class="la la-arrow-down"></i></th>
                      <th>تفاصيل<i class="la la-arrow-down"></i></th>
                      <!-- <th>modify</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="expense in expenses" :key="expense.id">
                      <td>{{expense.id}}</td>
                      <td>{{expense.name}}</td>
                      <td>{{expense.amount}}</td>
                      <td>{{expense.date }}</td>
                      <td>{{expense.details }}</td>

                      <!-- <td><span class="tag tag-success">Approved</span></td> -->
                      <!-- <td>
                        <a href="#" @click="editModel(expense)">
                          <i class="la la-edit"></i>
                        </a>
                        /
                        <a href="#" @click="deleteuser(expense.id)">
                          <i class="la la-trash red"></i>
                        </a>
                      </td> -->
                    </tr>
                
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            
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
       </div> 
   
</template>

<script>
  export default {
      data(){
            return{
              editmode: false,
              expenses :{},
              expenses_total:'',
              orders:{},
              orders_amount:'',
              total:'',
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
         suma(epx_amount,ord_amount){
this.total=ord_amount-epx_amount;
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
        axios.get("api/orders").then(({ data }) => (this.orders = data.orders.data));
        axios.get("api/orders").then(({ data }) => (this.orders_amount = data.orders_amount));
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
            // this.suma(this.orders_amount,this.expenses_total);
            // Refrash page 
             Fire.$on('AfterCreate',() => {
               this.loadUsers();
             });

            // setInterval(() => this.loadUsers(),3000);
        }
    }
</script>
