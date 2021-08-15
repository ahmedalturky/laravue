<template>
<div class="container">
      <div class="content-body">
      <section id="basic">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">بيانات المستخدمين</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <!-- <li><a data-action="close"><i class="ft-x"></i></a></li> -->
                    </ul>
                  </div>
                </div>
               <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                     <p class="card-text">هنا ستجد جميع حسابات المستخدمين الذين لديهم قدرة للدخول علي النظام 
                       مع بيانات كل مستخدم حيث يمكنك ايضاَ التعديل علي هؤلاء المستخدمين او حذفهم و كذلك يمكنك اضافة 
                       مستخدم جيد مع تحديد صلاحية هذا المستخدم داخل النظام.
                    </p> 
                    
                      <button class="btn btn-success" @click="newModel">Add New
                      <i class="fa fa-user-plus fa-fw"></i>
                       </button>
                
                    <table class="table table-striped table-bordered dataex-key-basic">
                      <thead>
                       <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <th>type</th>
                      <th>Register at</th>
                      <th>modify</th>
                    </tr>
                      </thead>
                  <tbody>
                    <tr v-for="user in users" :key="user.id">
                      <td>{{user.id}}</td>
                      <td>{{user.name}}</td>
                      <td>{{user.phone}}</td>
                      <td>{{user.email}}</td>
                      <td>{{user.type | uptext}}</td>
                      <td>{{user.created_at |mydate}}</td>

                      <!-- <td><span class="tag tag-success">Approved</span></td> -->
                      <td>
                        <a href="#" @click="editModel(user)">
                          <i class="la la-edit"></i>
                        </a>
                        /
                        <a href="#" @click="deleteuser(user.id)">
                          <i class="la la-trash red"></i>
                        </a>
                      </td>
                    </tr>
                
                  </tbody>
                
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
 <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="addnewLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" v-show="!editmode" id="addnewLabel"> اضافة مستخدم جديد</h5>
                <h5 class="modal-title" v-show="editmode" id="addnewLabel">  تعديل المستخدم</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form @submit.prevent="editmode ? updateUser() : createuser()" >
              <div class="modal-body">
                <!-- user name -->
                <div class="form-group">
                 <input v-model="form.name" type="text" name="name" class="form-control" placeholder="الاسم رباعي">
                 <div v-if="form.errors.has('name')" v-html="form.errors.get('name')" /></div>
                 <!-- phone -->
                 <div class="form-group">
                 <input v-model="form.phone" type="number" name="phone" class="form-control" placeholder=" رقم الهاتف ">
                 <div v-if="form.errors.has('phone')" v-html="form.errors.get('phone')" /></div>
                  <!-- user email -->
                  <div class="form-group">
                   <input v-model="form.email" type="email" name="email" class="form-control" placeholder="الايميل (اسم المستخدم)">
                 <div v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
              </div>
              <!-- bio -->
                <div class="form-group">
                   <textarea v-model="form.bio"  id="bio" class="form-control" 
                   placeholder="وصف للمستخدم (اختياري)"></textarea>
                 <div v-if="form.errors.has('bio')" v-html="form.errors.get('bio')" />
              </div>
              <!-- type user -->
                <div class="form-group">
                   <select name="type" v-model="form.type"  id="type" class="form-control" 
                   >
                   <option value="">اختار سلطة المستخدم</option>
                   <option value="user">موظف</option>
                  <option value="admin">مدير</option>
                  <option value="author">غير ذلك</option>
                   </select>
                 <div v-if="form.errors.has('type')" v-html="form.errors.get('type')" />
              </div>
              <!-- password -->
              <div class="form-group">
                 <input v-model="form.password" type="password" name="password" class="form-control" placeholder="كلمة السر">
                 <div v-if="form.errors.has('password')" v-html="form.errors.get('password')" /></div>
              
              </div>
              
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
                <button v-show="editmode" type="submit" class="btn btn-success">تعديل</button>
                <button v-show="!editmode" type="submit" class="btn btn-primary">انشاء</button>
              </div>

              </form>
            </div>
          </div>
        </div>
    </div>
<!--  -->
</template>

<script>
    export default {
      data(){
            return{
              editmode: false,
              users :{},
              form:new Form(
                {
                  id:'',
                  name:'',
                  phone:'',
                  email:'',
                  password:'',
                  type:'',
                  bio:'',
                  photo:''
                }
              )
            }
      },
      methods:

      {
        updateUser(){
          this.$Progress.start();
            this.form.put('api/user/'+this.form.id)
            .then(() => {
              //success
             $('#addnew').modal('hide');
                swal.fire(
                   'تعديل!',
                   'تم تعديل البيانات بنجاح',
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
              text: "هل انت متأكد من حذف هذا المستخدم!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'نعم!',
              cancelButtonText: 'الغاء'
              }).then((result) => {
                if(result.value){
                // send Http Delete requst 
                this.form.delete('api/user/'+id)
                .then(()=>{
                   swal.fire(
                   'حذف!',
                   'تم حذف هذا المستخدم.',
                   'نجاح'
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

        axios.get("api/user").then(({ data }) => (this.users = data.data));

        },

        createuser(){
        this.$Progress.start();
          // Http Post data to create new user 
        this.form.post('api/user')
        .then(() => {
           Fire.$emit('AfterCreate');
        $('#addnew').modal('hide');

         toast.fire({
           icon: 'نجاح',
           title: 'تم انشاء المستخدم بنجاح'
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
