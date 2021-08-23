<template>
  <div class="container">
     <div class="row">
         
       
          <div class="col-12 col-md-9">
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
                <table class="table table-striped table-bordered zero-configuration">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>اسم العميل</th>
                      <th>العنوان</th>
                     <th>الهاتف</th>
                      <th>التاريخ</th>
                    <th>الفريم</th>
                      <th> المبلغ المدفوع</th>
                      <th>المبلغ المتبقي</th>
                      <th>modify</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="order in orders" :key="order.id">
                      <td>{{order.id}}</td>
                      <td>{{order.clint_name}}</td>
                      <td>{{order.clint_address}}</td>
                       <td>{{order.clint_phone}}</td>
                      <td>{{order.date }}</td>
                        <td>{{order.prodect.name }}</td>
                      <td>{{formatPrice(order.payed )}} SDG</td>
                      <td>{{formatPrice(order.amount_left )}} SDG</td>

                      <!-- <td><span class="tag tag-success">Approved</span></td> -->
                      <td> 

                        <a href="#" @click="editModel(order)">
                          <i class="la la-edit"></i>
                        </a>
                        /
                        <a href="#" @click="deleteorder(order.id)">
                          <i class="la la-trash red"></i>
                        </a>
                        /
                         <a href="#" @click="reporte(order)">
                          <i class="la la-print"></i>
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
           <div class="col-12 col-md-3">
             <div class="card bg-success">
                <div class="card-content">
                  <div class="card-body pb-1">
                    <div class="row text-white">
                      <div class="col-6">
                        <h1><i class="la la-dollar background-round text-white"></i></h1>
                        <!-- <h4 class="pt-1 m-0 text-white">10% <i class="la la-arrow-down"></i></h4> -->
                      </div>
                      <div class="col-6 text-right"><center>
                        <h3 class="text-white mb-2"><i class="la la-arrow-up"></i>{{formatPrice(orders_amount)}} &nbsp;&nbsp;SDG </h3></center>
                        <span> مجموع مبلغ المبيعات</span>
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
        <div class="modal fade " id="addnew" tabindex="-1" role="dialog" aria-labelledby="addnewLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" width="100%">
              <div class="modal-header">
                <h5 class="modal-title" v-show="!editmode" id="addnewLabel">طباعة ايصال </h5>
                <h5 class="modal-title" v-show="editmode" id="addnewLabel"> تعديل بيانات الطلب</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div  v-show="reportdata" class="">
              <div  id="Report" class="paper" dir="rtl" >
                <div class="form-body">
                <img  style="border-radius: 50%;width:90px;height: 90px;float:right;" alt="modern admin logo" src="img/logo-o.jpeg" >
                               <img  style="border-radius: 50%;width:90px;height: 90px;float:left;" alt="modern admin logo" src="img/logo-o.jpeg" >
                 <center><h3 class="brand-text">أوبتيزون للبصريات</h3> <br>
                 <h3 class="brand-text">Optizone Optics</h3>
                 </center><br>                        <h4 class="form-section"><i class="la la-user"></i>  استلام الزبون</h4>

                        <table style=" border: 1px solid black;  border-collapse: collapse; width: 90%;  height: 50px;padding: 15px;line-height:normal;color:black;">
                           <tbody> <tr class="text-center" >
                             
                            <td style="text-align:right; border: 1px groove black;"><b>اسم العميل  <b> :</b>  {{  this.form.clint_name  }} </b> </td>
                            <td style="text-align:right; border: 1px groove black;"><b>العنوان   <b> :</b>  {{  this.form.clint_address  }} </b> </td>
                          </tr>
                           <tr class="text-center" >
                            <td style="text-align:right; border: 1px groove black;"><b> رقم الهاتف  <b> :</b>  {{  this.form.clint_phone  }} </b> </td>
                            <td style="text-align:right; border: 1px groove black;"><b>التاريخ   <b> :</b>  {{  this.form.date  }} </b> </td>
                          </tr>
                           <tr class="text-center" >
                            <td style="text-align:right; border: 1px groove black;"><b> مكان الكشف  <b> :</b>  {{  this.plase_form  }} </b> </td>
                            <td style="text-align:right; border: 1px groove black;"><b>نوع الفريم   <b> :</b>  {{  this.form.prodect.name  }} </b> </td>
                          </tr>
                           <tr class="text-center" >
                            <td style="text-align:right; border: 1px groove black;"><b> المبلغ الكلي  <b> :</b>  {{  formatPrice(this.form.prise)  }} </b> </td>
                            <td style="text-align:right; border: 1px groove black;"><b>التخفيض (%)   <b> :</b>  {{  this.form.discount  }} </b> </td>
                          </tr>
                           <tr class="text-center" >
                            <td style="text-align:right; border: 1px groove black;"><b>المبلغ بعد التخفيض   <b> :</b>  {{  formatPrice(this.form.amount_after)  }} </b> </td>
                            <td style="text-align:right; border: 1px groove black;"><b>المدفوع   <b> :</b>  {{  formatPrice(this.form.payed)  }} </b> </td>
                          </tr>
                          <tr class="text-center" >
                            <td style="text-align:right; border: 1px groove black;"><b> المتبقي    <b> :</b>  {{  formatPrice(this.form.amount_left)  }} </b> </td>
                          </tr>
                            <tr class="text-center" >
                            <td style="text-align:right; border: 1px groove black;"><b> ملاحظة    <b> :</b>  {{  this.form.note  }} </b> </td>
                          </tr>
                   
                            </tbody>
                        </table><br>
                       <div style="text-align: right;">
                            <b>-المحل غير مسؤول عن اي منتج لم يتم استلامه خلال 60 يوم من تاريخ الاستلام .
-المبالغ المدفوعة على المنتجات لا يتم استرجاعها بعد التنفيذ بالنسبه للعدسات .
-لا يتم تسليم المنتج إلا بعد دفع قيمته كامله .<br>
-يتم استلام اي شكوى بخصوص المنتج من مده أقصاها اسبوعين من تاريخ الاستلام ولا يتحمل المركز الشكاوي الناتجة عن الإهمال وسوء الاستعمال .<br>
-العدسات اللاصقة لا ترد ولا تستبدل بعد خروجها من المركز.<br>
-عذرا المركز غير مسؤول في حالة حدوث تلف للفريمات من خارج المركز أثناء تركيب العدسات .</b> 
                       </div><br>
                       <h3>_______________________________________________________________________________</h3>
         <img  style="border-radius: 50%;width:90px;height: 90px;float:right;" alt="modern admin logo" src="img/logo-o.jpeg" >
                               <img  style="border-radius: 50%;width:90px;height: 90px;float:left;" alt="modern admin logo" src="img/logo-o.jpeg" >
                 <center><h3 class="brand-text">أوبتيزون للبصريات</h3> <br>
                 <h3 class="brand-text">Optizone Optics</h3>
                 </center><br>                        <h4 class="form-section"><i class="la la-user"></i>  تسليم المركز</h4>

                        <table style=" border: 1px solid black;  border-collapse: collapse; width: 90%;  height: 50px;padding: 15px;line-height:normal;color:black;">
                           <tbody> <tr class="text-center" >
                             
                            <td style="text-align:right; border: 1px groove black;"><b>اسم العميل  <b> :</b>  {{  this.form.clint_name  }} </b> </td>
                            <td style="text-align:right; border: 1px groove black;"><b>العنوان   <b> :</b>  {{  this.form.clint_address  }} </b> </td>
                          </tr>
                           <tr class="text-center" >
                            <td style="text-align:right; border: 1px groove black;"><b> رقم الهاتف  <b> :</b>  {{  this.form.clint_phone  }} </b> </td>
                            <td style="text-align:right; border: 1px groove black;"><b>التاريخ   <b> :</b>  {{  this.form.date  }} </b> </td>
                          </tr>
                           <tr class="text-center" >
                            <td style="text-align:right; border: 1px groove black;"><b> مكان الكشف  <b> :</b>  {{  this.plase_form  }} </b> </td>
                            <td style="text-align:right; border: 1px groove black;"><b>نوع الفريم   <b> :</b>  {{  this.form.prodect.name  }} </b> </td>
                          </tr>
                           </tbody>
                        </table><br>

                                <table v-show="!butifele" style=" border: 1px solid black;  border-collapse: collapse; width: 90%;  height: 50px;padding: 15px;line-height:normal;color:black;" dir="ltr">
                                    <thead>
                               <tr>
                                      <th style="text-align:center; border: 1px solid black;" colspan="4">Right</th>
                                      <th style="text-align:center; border: 1px solid black;" colspan="4">Left</th>
                    </tr>
                    
                                         <tr>
                                     <th style="text-align:center; border: 1px solid black;">#</th>
                                      <th style="text-align:center; border: 1px solid black;"><center>SPH</center></th>
                                     <th style="text-align:center; border: 1px solid black;"> <center>SYL</center></th>
                                     <th style="text-align:center; border: 1px solid black;"><center>AXIS</center></th>
                                     <th style="text-align:center; border: 1px solid black;"><center>SPH</center></th>
                                     <th style="text-align:center; border: 1px solid black;"><center>SYL</center></th>
                                    <th style="text-align:center; border: 1px solid black;"><center>AXIS</center></th>
                    </tr>
                  </thead>
                  <tbody> 
                    <tr >
                      <td> Dist</td>
                      <td style="text-align:right; border: 1px groove black;"><center>{{  this.form.D_R_SPH  }} </center></td>
                      <td style="text-align:right; border: 1px groove black;"><center>{{  this.form.D_R_SYL  }}</center></td>
                      <td style="text-align:right; border: 1px groove black;"><center>{{  this.form.D_R_AXIS  }}</center></td>
                     <td style="text-align:right; border: 1px groove black;"><center>{{  this.form.D_L_SPH  }} </center></td>
                      <td style="text-align:right; border: 1px groove black;"><center>{{  this.form.D_L_SYL  }}</center> </td>
                      <td style="text-align:right; border: 1px groove black;"><center>{{  this.form.D_L_AXIS  }} </center></td>
                    </tr>
                      <tr>
                      <td> Near</td>
                      <td style="text-align:right; border: 1px groove black;"><center>{{  this.form.N_R_SPH  }}</center></td>
                      <td style="text-align:right; border: 1px groove black;"><center>{{  this.form.N_R_SYL  }}</center></td>
                      <td style="text-align:right; border: 1px groove black;"><center>{{  this.form.N_R_AXIS  }}</center></td>
                      <td style="text-align:right; border: 1px groove black;"><center>{{  this.form.N_L_SPH  }}</center></td>
                      <td style="text-align:right; border: 1px groove black;"><center>{{  this.form.N_L_SYL  }}</center></td>
                      <td style="text-align:right; border: 1px groove black;"><center>{{  this.form.N_L_AXIS  }} </center></td>
                    </tr>
                      <tr>
                    <td style="text-align:center; border: 1px solid black;" colspan="0">IPD</td>
                    <td style="text-align:center; border: 1px solid black;" colspan="1">{{  this.form.IPD  }}</td>
                    </tr>
                  </tbody>
                </table>
                
                     
                      </div></div>
                        <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">الغاء</button>
                <button  class="btn btn-success" type="button"  @click="printData"><b>استخراج بصيـغة PDF  </b> &nbsp;<i class="fa fa-file-pdf-o" aria-hidden="true"></i>  </button>
              </div></div>
              
               <form  v-show="!reportdata" @submit.prevent="updateUser()" class="form form-horizontal">
                      <div  class="form-body">
                        <h4 class="form-section"><i class="la la-user"></i> بيانات الزبون</h4>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput1">الاسم  </label>
                              <div class="col-md-9">
                                <input v-model="form.clint_name" type="text" id="userinput1" class="form-control border-primary" placeholder="الاسم رباعي "
                                name="clint_name">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput2"> العنوان</label>
                              <div class="col-md-9">
                                <input v-model="form.clint_address" type="text" id="userinput2" class="form-control border-primary" placeholder="عنوان السكن"
                                name="address">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput3">رقم الهاتف </label>
                              <div class="col-md-9">
                                <input v-model="form.clint_phone"  type="number" id="userinput3" class="form-control border-primary" placeholder="رقم الهاتف"
                                name="phone">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput4">التاريخ</label>
                              <div class="col-md-9">
                                <input v-model="form.date" type="Date" id="userinput4" class="form-control border-primary" placeholder="التاريخ"
                                name="date">
                              </div>
                            </div>
                          </div>
                        </div>
                        <h4 v-show="!editmode" class="form-section"><i class="la la-eye"></i> مقياس العدسات</h4>
                        <h4 v-show="editmode" class="form-section"><i class="la la-eye"></i>  بيانات النظارة</h4>

                        <div class="row">
                          <div class="col-md-12">
                              <div v-show="!editmode" class="card-body table-responsive p-0">
                                <table  class="table table-hover" dir="ltr">
                                    <thead>
                               <tr>
                                      <th colspan="3">Right</th>
                                      <th colspan="3">Left</th>
                    </tr>
                    
                                         <tr>
                                     <th>#</th>
                                      <th ><center>SPH</center></th>
                                     <th> <center>SYL</center></th>
                                     <th><center>AXIS</center></th>
                                     <th><center>SPH</center></th>
                                     <th><center>SYL</center></th>
                                    <th><center>AXIS</center></th>
                    </tr>
                  </thead>
                  <tbody> 
                    <tr >
                      <td> Dist</td>
                      <td><center><input v-model="form.D_R_SPH" type="number" id="userinput3" class="form-control border-primary" style="width:80px;" placeholder=" "
                         name="D_R_SPH"> </center></td>
                      <td ><center><input v-model="form.D_R_SYL" type="number" id="userinput3" class="form-control border-primary" style="width:80px;" placeholder=" "
                         name="D_R_SYL"></center></td>
                      <td><center><input v-model="form.D_R_AXIS" type="number" id="userinput3" class="form-control border-primary" style="width:80px;" placeholder=" "
                         name="D_R_AXIS"></center></td>
                     <td><center><input v-model="form.D_L_SPH" type="number" id="userinput3" class="form-control border-primary"  style="width:80px;" placeholder=" "
                         name="D_L_SPH"> </center></td>
                      <td><center><input v-model="form.D_L_SYL" type="number" id="userinput3" class="form-control border-primary" style="width:80px;" placeholder=" "
                         name="D_L_SYL"></center> </td>
                      <td><center><input v-model="form.D_L_AXIS" type="number" id="userinput3" class="form-control border-primary" style="width:80px;" placeholder=" "
                         name="D_L_AXIS"> </center></td>
                    </tr>
                      <tr>
                      <td> Near</td>
                      <td><center><input v-model="form.N_R_SPH" type="number" id="userinput3" class="form-control border-primary" style="width:80px;" placeholder=" "
                         name="N_R_SPH"></center></td>
                      <td><center><input v-model="form.N_R_SYL" type="number" id="userinput3" class="form-control border-primary" style="width:80px;" placeholder=" "
                         name="N_R_SYL"></center></td>
                      <td><center><input v-model="form.N_R_AXIS" type="number" id="userinput3" class="form-control border-primary" style="width:80px;" placeholder=" "
                         name="N_R_AXIS"></center></td>
                      <td><center><input v-model="form.N_L_SPH" type="number" id="userinput3" class="form-control border-primary" style="width:80px;" placeholder=" "
                         name="N_L_SPH"> </center></td>
                      <td><center><input v-model="form.N_L_SYL" type="number" id="userinput3" class="form-control border-primary" style="width:80px;" placeholder=" "
                         name="N_L_SYL"> </center></td>
                      <td><center><input v-model="form.N_L_AXIS" type="number" id="userinput3" class="form-control border-primary" style="width:80px;" placeholder=" "
                         name="N_L_AXIS"> </center></td>
                    </tr>
                    
                
                  </tbody>
                </table>
                      
              </div>
              <div class="row">
                         <div v-show="!editmode" class="col-md-4">
                            <div class="form-group row">
                              <label  class="col-md-3 label-control" for="userinput5"> IPD</label>
                              <div class="col-md-5">
                                <input  v-model="form.IPD" class="form-control border-primary" type="number" placeholder="  " id="userinput5" name="IPD">
                              </div>
                            </div></div>
                           <div class="col-md-4">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="projectinput6">مكان الكشف</label>
                              <div class="col-md-9">
                              <select v-model="form.plase" id="projectinput6" name="plase" class="form-control">
                                <option value="1">في المركز</option>
                                <option value="2">خارجي</option>
                                <option value="3">بدون كشف</option>
                              </select>
                            </div></div>
                          </div>
                          
                          
                          </div> <div class="col-md-4">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="projectinput6"> الفريم </label>
                              <div class="col-md-9">
                              <select v-model="form.prodect_id" id="projectinput6" name="prodect_id" class="form-control">
                                <option v-for="prodect  in products" :key="prodect.id" :value="prodect.id" >{{prodect.name}}</option>
                              </select>
                            </div></div>
                          </div>
                          <div class="form-group">
                          <label for="userinput8">ملاحظة</label>
                          <textarea v-model="form.note" id="userinput8" rows="5" class="form-control border-primary" name="note" placeholder="ملاحظة"></textarea>
                        </div>
          
                          </div>
                        </div>
                         <h4 class="form-section"><i class="la la-money"></i> الحسابات</h4>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput5">المبلغ الكلي</label>
                              <div class="col-md-9">
                                <input v-model="form.prise" class="form-control border-primary" type="number" placeholder="المبلغ الكلي " id="prise" name="prise">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput6">التخفيض (%)</label>
                              <div class="col-md-9">
                                <input v-model="form.discount" class="form-control border-primary" type="number" placeholder="التخفيض" id="discount" name="discount" @change="discount">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-3 label-control">المبلغ بعد التخفيض</label>
                              <div class="col-md-9">
                                <input v-model="form.amount_after" class="form-control border-primary" type="number" placeholder="المبلغ بعد التخفيض"
                                id="amount_after" name="amount_after" :readonly="true">
                              </div>
                            </div>
                          
                             <div class="form-group row">
                              <label class="col-md-3 label-control">  المدفوع </label>
                              <div class="col-md-9">
                                <input v-model="form.payed" class="form-control border-primary" type="number" placeholder="المدفوع"
                                id="payed" name="payed" @change="total" >
                              </div>
                            </div>
                              <div class="form-group row">
                              <label class="col-md-3 label-control">  المتبقي </label>
                              <div class="col-md-9">
                                <input v-model="form.amount_left" class="form-control border-primary" type="number" placeholder="المتبقي"
                                id="amount_left" name="amount_left" :readonly="true">
                              </div>
                            </div>
                          </div>
                          <!-- <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput8">Bio</label>
                              <div class="col-md-9">
                                <textarea id="userinput8" rows="6" class="form-control border-primary" name="bio"
                                placeholder="Bio"></textarea>
                              </div>
                            </div> 
                          </div>-->
                        </div>
                      </div>
                        <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">الغاء</button>
                <button v-show="!editmode" type="submit" class="btn btn-success">تعديل </button>
                <button v-show="editmode" type="submit" class="btn btn-primary">اضافة</button>
              </div>
                    </form>
            </div>
          </div>
        </div>
    </div>
</template>

<script>
    import DatatableFactory from 'vuejs-datatable';

  export default {
      data(){
            return{
            
              editmode: false,
              reportdata: false,
              butifele: false,
             products :[],
              orders :{},
              orders_amount:'',
              plase_form:'',
              form:new Form(
                {
                  id:'',
                  clint_name:'',
                  clint_address:'',
                  clint_phone:'',
                  prodect_id:'',
                  prodect:'',
                  date:'',
                  D_R_SPH:'',
                  D_R_SYL:'',
                  D_R_AXIS:'',
                  D_L_SPH:'',
                  D_L_SYL:'',
                  D_L_AXIS:'',

                  N_R_SPH:'',
                  N_R_SYL:'',
                  N_R_AXIS:'',
                  N_L_SPH:'',
                  N_L_SYL:'',
                  N_L_AXIS:'',

                  IPD:'',
                  plase:'',
                  note:'',

                  prise:'',
                  discount:'',
                  amount_after:'',
                  payed:'',
                  amount_left:'',
                  order_type:''
                
                 
                }
              )
            }
      },

      methods:

      { printData(){
                 var divToPrint = document.getElementById("Report");
  var newWin=window.open();
  newWin.document.open();
      newWin.document.write('<html><head><style> {display:none;}th{background-color:lightgray;color:black;}</style><body onload="window.print()"  dir="rtl">'+divToPrint.innerHTML+'</body></html>');
  newWin.document.close();
  setTimeout(function(){newWin.close();},10);
},
         discount(){
            
            // var val=discount;
            // var val2=document.getElementById("price").value;
            var dis=this.form.prise*(this.form.discount/100);
            var amount=this.form.prise-dis;
            this.form.amount_after= amount;
            // document.getElementById("amount_after").value =amount;
            
            // console.log(val)
          },
            formatPrice(value) {
        let val = (value/1).toFixed(2).replace(',', '.')
        return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    },
          total(){
            //  var amount_after=5;
            // var payed=document.getElementById("payed").value;
            var amount=this.form.amount_after-this.form.payed;
            this.form.amount_left =amount;
            // document.getElementById("amount_after").value =val;

          },
        updateUser(){
          this.$Progress.start();
            this.form.put('api/orders/'+this.form.id)
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
        editModel(order){
          this.reportdata=false;
          if(order.order_type==2){
          this.editmode=true;

          }else{
                      this.editmode=false;

          }
          this.form.reset();
          $('#addnew').modal('show');
          this.form.fill(order);
        },
        reporte(order){
          this.reportdata=true;
         $('#addnew').modal('show');
         if(order.plase==1){
        this.plase_form="في المركز";
         }else if(order.plase==2){
       this.plase_form=" خارجي";
         }else{
       this.plase_form=" بدون كشف";
         }
         if(order.order_type==2){
           this.butifele=true;
         }else{
 this.butifele=false;
         }
          this.form.fill(order);
          
        },
        newModel(){
          this.reportdata=false;
         this.editmode=false;
          this.form.reset();
       $('#addnew').modal('show');


        },
        deleteorder(id){
this.reportdata=false;
          // sweet alert 
         swal.fire({
           title: 'هل انت متأكد؟',
              text: "هل انت متأكد من حذف هذا الطلب!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'نعم!',
              cancelButtonText: 'الغاء'
              }).then((result) => {
                if(result.value){
                // send Http Delete requst 
                this.form.delete('api/orders/'+id)
                .then(()=>{
                   swal.fire(
                   'حذف!',
                   'تم حذف هذا الطلب.',
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
        loadorders(){

        axios.get("api/orders").then(({ data }) => (this.orders = data.orders.data));
        axios.get("api/orders").then(({ data }) => (this.orders_amount = data.orders_amount));
        axios.get("api/orders").then(({ data }) => (this.products = data.prodects.data));


        },

//         createuser(){
//         this.$Progress.start();
//           // Http Post data to create new user 
//         this.form.post('api/expenses')
//         .then(() => {
//            Fire.$emit('AfterCreate');
//         $('#addnew').modal('hide');

//          toast.fire({
//            icon: 'success',
//            title: 'تم انشاء المنصرف بنجاح'
//         })
//         .catch(

//         )
        

       
// })


//         this.$Progress.finish();

//         }
         
      },
        created() {
            this.loadorders();
            // Refrash page 
             Fire.$on('AfterCreate',() => {
               this.loadorders();
             });

            // setInterval(() => this.loadUsers(),3000);
        }
    }
</script>
