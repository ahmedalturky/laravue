<template>
    <div class="container">
        <div class="row mt-5">
             
              <div class="col-md-12">
              <div class="card" style="height: 982px;">
                <div class="card-header">
                  <h4 class="card-title" id="basic-layout-form">تقارير المنتجات  </h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                  </div>
                </div>
                <br>
                <div class="card-content collapse show">
                  <div class="card-body">
                    <div class="card-text">
                      <p>هنا يمكنك استخراج تقارير عن جميع المنصرفات التي تمت داخل النظام , وذلك عن طريق تحديد تاريخ للمنصرف او تديد مبلغ معين للمنصرفات التى ترغب بإستخراج تفاصيل كامله عنها
                         .</p>
                    </div>
                      <div class="form-body">
                        <!-- <h4 class="form-section"><i class="ft-user"></i> Personal Info</h4> -->
                        <div class="row">
                          <div class="col-md-9">
                            <div class="form-group">
                              <label for="projectinput5"> اختار شكل التقرير</label>
                              <select v-model="form.plase" id="projectinput5" name="interested" class="form-control"  @change="onChangeSite($event)">
                                <option value="">....</option>
                                  <option value="1">تقرير بمدى تاريخ </option>
                                 <option value="3">تقرير بكل المنتجات </option>

                                
                              </select>
                            </div>
                          </div>
                   
                        </div>                        </div>

                       <div v-show="inputselect" class="col-md-4">
                         <div class="form-group">
                          <label for="companyName">من</label>
                          <input v-model="dateone" type="date" id="companyName" class="form-control"  name="dateone">
                        </div>                        </div>

                             <div v-show="inputselect" class="col-md-4">
                            <div class="form-group">
                              <label for="projectinput4">الى</label>
                              <input v-model="datetwo" type="date" id="projectinput4" class="form-control"  name="datetwo">
                          </div>
                          
                      </div>
                      <div v-show="inputtype" class="col-md-2">
                         <div class="form-group">
                          <label for="companyName">اكبر من</label>
                          <input v-model="amountone" type="number" id="companyName" class="form-control"  name="amountone">
                        </div>                        </div>

                             <div v-show="inputtype" class="col-md-2">
                            <div class="form-group">
                              <label for="projectinput4">اقل من </label>
                              <input v-model="amountwo" type="number" id="projectinput4" class="form-control"  name="amountwo">
                          </div>
                          
                      </div>
                      <div class="form-actions">
                        <button  @click="getdate()" class="btn btn-primary">
                          <i class="la la-search"></i> بحث
                        </button>
                      </div>
                  </div>
                </div>
                <div v-show="table" class="col-12 ">
                                      <button  class="btn btn-success" type="button"  @click="print"><b>استخراج بصيـغة   </b> &nbsp;<i class="fa fa-file-pdf-o" aria-hidden="true"></i>  </button>
                 <div class="card">

                        <!-- <div class="card-tools">
                         <button class="btn btn-success" @click="newModel">اضافة منصرف
                    <i class="la la-plus"></i>
                  </button>
                </div> -->
              
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table">
                  <thead class="thead-dark">
                    <tr  >
                      <th>#</th>
                      <th>اسم المنتج</th>
                      <th>اسم الشركة</th>
                      <th>المبلغ</th>
                      <th>التاريخ</th>
                      <th>تفاصيل</th>
                      <!-- <th>modify</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(datacam,index) in datacame" :key="datacam.id">
                      <td>{{index+1}}</td>
                      <td>{{datacam.name}}</td>
                      <td>{{datacam.company}}</td>
                      <td>{{datacam.price}}</td>
                      <td>{{datacam.date }}</td>
                      <td>{{datacam.Details }}</td>

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
            </div></div>
             
              <!-- /.card-header -->
              <!-- <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
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
                      <td>{{user.email}}</td>
                      <td>{{user.type | uptext}}</td>
                      <td>{{user.created_at |mydate}}</td>

                      <td>
                        <a href="#" @click="editModel(user)">
                          <i class="fa fa-edit"></i>
                        </a>
                        /
                        <a href="#" @click="deleteuser(user.id)">
                          <i class="fa fa-trash red"></i>
                        </a>
                      </td>
                    </tr>
                
                  </tbody>
                </table> 
              </div>-->
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
                <!-- Modal -->
        <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="addnewLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" v-show="!editmode" id="addnewLabel"> تقارير منصرفات</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div><div class="form-body">
              <div id="Report" class="paper" dir="rtl" >
                    <br>
                             <h4 style="text-align: center;"><strong style="text-align: center; !important">بسـم الله الرحمن الرحيم </strong></h4>
                             <h4 style="text-align: center;"><strong style="text-align: center; !important">   تقـرير حصـر  المنصرفات   </strong></h4>
                          
                        <div style="text-align: center">
                          <br>
                          <div v-show="inputselect"><b >التـاريـخ   <b>  من </b>&nbsp;  {{  this.dateone  }} &nbsp;<b>  الى </b>&nbsp; {{  this.datetwo  }}</b>  </div>
                          <div v-show="inputtype"><b >بمبلغ   <b>  من </b>&nbsp;  {{  this.amountone  }} &nbsp;<b>  الى </b>&nbsp; {{  this.amountwo  }}</b>  </div>

                        
                           </div>

                    <br>

                   
                    <center>
                    <div class="table-responsive">
                        <table style=" border: 1px solid black;  border-collapse: collapse; width: 90%;  height: 50px;padding: 15px;line-height:normal;color:black;">
                                        <thead>
                    <tr class="text-center">
                                       <th  style="text-align:center; border: 1px solid black;"> # </th>
                                       <th  style="text-align:center; border: 1px solid black;"> اسم  الفريم </th>
                                       <th  style="text-align:center; border: 1px solid black;"> اسم  الشركة </th>
                                     <th  style="text-align:center; border: 1px solid black;"> المبلغ      </th>
                                     <th  style="text-align:center; border: 1px solid black;"> التاريخ   </th>
                                     <th  style="text-align:center; border: 1px solid black;">  تفاصيل الفريم   </th>
                                </tr>
                            </thead>
                            <tbody>
             <tr v-for="(datacams,index) in this.datacae" :key="datacams.id">

                               <td style="text-align:center; border: 1px groove black;"> {{index+=1}}</td>
                               <td style="text-align:center; border: 1px groove black;"> {{datacams.name }}</td>
   
                               <td style="text-align:center; border: 1px groove black;"> {{datacams.company }}</td>
                               <td style="text-align:center; border: 1px groove black;"> {{datacams.peice }}</td>
                               <td style="text-align:center; border: 1px groove black;"> {{datacams.date }}</td>
                               <td style="text-align:center; border: 1px groove black;"> {{datacams.Details}}</td>
      
      
                                   
                                    </tr>


                            </tbody>
                        </table>
                    </div>
                           </center>                    </div>

                   <button  class="btn btn-success" type="button"  @click="printData"><b>استخراج بصيـغة PDF  </b> &nbsp;<i class="fa fa-file-pdf-o" aria-hidden="true"></i>  </button>

                        

                    </div>
                  <br>
             
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
              inputselect: false,
              inputtype: false,
              users :{},
              datacame:{},
              datacae:{},
              reporttype:'',
              table:false,
               dateone:'',
               datetwo:'',
                amountone:'',
                amountwo:'',
              form:new Form(
                {
                  id:'',
                  name:'',
                  email:'',
                  password:'',
                  type:'',
                  bio:'',
                  photo:'',
                 
                 
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
                   'Updated!',
                   'Information has been update',
                   'success'
                            )

               this.$Progress.finish();
               Fire.$emit('AfterCreate');


            })
            .catch(() =>{
             this.$Progress.fail();
            });
        },
        print(){
          this.datacae=this.datacame;
                    $('#addnew').modal('show');

        },
        editModel(user){
          this.editmode=true;
          this.form.reset();
          $('#addnew').modal('show');
          this.form.fill(user);
        },
        onChangeSite(data){
          if(data.target.value==2){
          this.inputtype=true;
           this.inputselect=false;
           this.reporttype=1;



          }else if(data.target.value==1){
          this.reporttype=2;
          this.inputselect=true;
          this.inputtype=false;
          }else if(data.target.value==3){
                      this.reporttype=3;
                      this.inputtype=false;
            this.inputselect=false;

          }else {
          this.inputtype=false;
            this.inputselect=false;
           this.reporttype='';



          }
          // alert(data.target.value);

        },
        getdate(){
if(this.reporttype==2){
axios.get(`api/prodects/${this.dateone}/${this.datetwo}`).then(({ data }) => (this.datacame = data.databack));
//Array.isArray(this.datacame)==false
     
  this.table=true;



}else if(this.reporttype==1){
         axios.get(`api/report_expensed/${this.amountone}/${this.amountwo}`).then(({ data }) => (this.datacame = data.databack));

  this.table=true;


}else if(this.reporttype==3){
        axios.get("api/prodects").then(({ data }) => (this.datacame = data.prodect.data));
this.table=true;
}else{
  this.table=false;

}
        }
        ,
        printData(){
                 var divToPrint = document.getElementById("Report");
  var newWin=window.open();
  newWin.document.open();
      newWin.document.write('<html><head><style> {display:none;}th{background-color:lightgray;color:black;}</style><body onload="window.print()"  dir="rtl">'+divToPrint.innerHTML+'</body></html>');
  newWin.document.close();
  setTimeout(function(){newWin.close();},10);
             },
        newModel(){
         this.editmode=false;
          this.form.reset();
          this.id=1;
        axios.get(`api/useres/${this.id}`).then(({ data }) => (this.datacame = data.data));
       $('#addnew').modal('show');


        },
        deleteuser(id){

          // sweet alert 
         swal.fire({
           title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
              }).then((result) => {
                if(result.value){
                // send Http Delete requst 
                this.form.delete('api/user/'+id)
                .then(()=>{
                   swal.fire(
                   'Deleted!',
                   'Your file has been deleted.',
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

        axios.get("api/prodects").then(({ data }) => (this.users = data.data));

        },

        createuser(){
        this.$Progress.start();
          // Http Post data to create new user 
        this.form.post('api/user')
        .then(() => {
           Fire.$emit('AfterCreate');
        $('#addnew').modal('hide');

         toast.fire({
           icon: 'success',
           title: 'User Create in successfully'
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
