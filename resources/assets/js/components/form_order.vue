<template>
    <div class="container">
      <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <center><h4 class="card-title" id="horz-layout-colored-controls"><b>طــلــب بــيــع  </b></h4></center>
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
                <div class="card-content collpase show">
                  <div class="card-body">
                    <div class="card-text">
                      <p></p>
                    </div>
                    <form @submit.prevent="createorder()" class="form form-horizontal">
                      <div class="form-body">
                        <h4 class="form-section"><i class="la la-user"></i> بيانات الزبون</h4>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput1" >الاسم  </label>
                              <div class="col-md-9">
                                <input v-model="form.clint_name" type="text" id="userinput1" class="form-control border-primary" placeholder="الاسم رباعي "
                                name="clint_name" required>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput2"> العنوان</label>
                              <div class="col-md-9">
                                <input v-model="form.address" type="text" id="userinput2" class="form-control border-primary" placeholder="عنوان السكن"
                                name="address" required>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput3">رقم الهاتف </label>
                              <div class="col-md-9">
                                <input v-model="form.phone"  type="number" id="userinput3" class="form-control border-primary" placeholder="رقم الهاتف"
                                name="phone" required>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput4">التاريخ</label>
                              <div class="col-md-9">
                                <input v-model="form.date" type="Date" id="userinput4" class="form-control border-primary" placeholder="التاريخ"
                                name="date" required>
                              </div>
                            </div>
                          </div>
                        </div>
                        <h4 class="form-section"><i class="la la-eye"></i> مقياس العدسات</h4>
                        <div class="row">
                        
                        
                          <div class="col-md-12">
                              <div class="card-body table-responsive p-0">
                                <table class="table table-hover" dir="ltr">
                                    <thead>
          
                    
                                         <tr>
                                     <th>#</th>
                                      <th ><center>SPH</center></th>
                                     <th> <center>SYL</center></th>
                                     <th><center>AXIS</center></th>
                                     <th><center>ADD1</center></th>
                                     <th><center>ADD2</center></th>
                                    <th><center>VA</center></th>
                                    <th><center>C.lenses</center></th>
                    </tr>
                  </thead>
                  <tbody> 
                    <tr >
                      <td> Right</td>
                      <td><center><input v-model="form.D_R_SPH" type="number" id="userinput3" class="form-control border-primary" style="width:80px;" step="0.01"
                         name="D_R_SPH" > </center></td>
                      <td ><center><input v-model="form.D_R_SYL" type="number" id="userinput3" class="form-control border-primary" style="width:80px;" step="0.01"
                         name="D_R_SYL"></center></td>
                      <td><center><input v-model="form.D_R_AXIS" type="number" id="userinput3" class="form-control border-primary" style="width:80px;" step="0.01"
                         name="D_R_AXIS"></center></td>
                     <td><center><input v-model="form.D_L_SPH" type="number" id="userinput3" class="form-control border-primary"  style="width:80px;" step="0.01"
                         name="D_L_SPH"> </center></td>
                      <td><center><input v-model="form.D_L_SYL" type="number" id="userinput3" class="form-control border-primary" style="width:80px;" step="0.01"
                         name="D_L_SYL"></center> </td>
                      <td><center><input v-model="form.D_L_AXIS" type="number" id="userinput3" class="form-control border-primary" style="width:80px;" step="0.01"
                         name="D_L_AXIS"> </center></td>
                          <td><center><input v-model="form.D_L_ah1" type="number" id="userinput3" class="form-control border-primary" style="width:80px;" step="0.01"
                         name="D_L_ah1"> </center></td>
                    </tr>
                      <tr>
                      <td> Left</td>
                      <td><center><input v-model="form.N_R_SPH" type="number" id="userinput3" class="form-control border-primary" style="width:80px;" step="0.01"
                         name="N_R_SPH"></center></td>
                      <td><center><input v-model="form.N_R_SYL" type="number" id="userinput3" class="form-control border-primary" style="width:80px;" step="0.01"
                         name="N_R_SYL"></center></td>
                      <td><center><input v-model="form.N_R_AXIS" type="number" id="userinput3" class="form-control border-primary" style="width:80px;" step="0.01"
                         name="N_R_AXIS"></center></td>
                      <td><center><input v-model="form.N_L_SPH" type="number" id="userinput3" class="form-control border-primary" style="width:80px;" step="0.01"
                         name="N_L_SPH"> </center></td>
                      <td><center><input v-model="form.N_L_SYL" type="number" id="userinput3" class="form-control border-primary" style="width:80px;" step="0.01"
                         name="N_L_SYL"> </center></td>
                      <td><center><input v-model="form.N_L_AXIS" type="number" id="userinput3" class="form-control border-primary" style="width:80px;" step="0.01"
                         name="N_L_AXIS"> </center></td>
                         <td><center><input v-model="form.N_L_ah2" type="number" id="userinput3" class="form-control border-primary" style="width:80px;" step="0.01"
                         name="N_L_ah2"> </center></td>
                    </tr>
                
                  </tbody>
                </table>
               
              </div>

              <div class="row">
                         <div class="col-md-4">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput4">Progressive</label>
                              <div class="col-md-5">
                                <input v-model="form.progressive" type="checkbox" id="userinput4" class="state icheckbox_minimal checked mr-1" placeholder=""
                                name="progressive" >
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput4">Bifocal</label>
                              <div class="col-md-5">
                                <input v-model="form.bifocal" type="checkbox" id="userinput4" class="state icheckbox_minimal checked mr-1" placeholder=""
                                name="bifocal" >
                              </div>
                            </div>
                          </div>
                            <div class="col-md-4">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput4">S.V</label>
                              <div class="col-md-5">
                                <input v-model="form.sv" type="checkbox" id="userinput4" class="state icheckbox_minimal checked mr-1" placeholder=""
                                name="sv" >
                              </div>
                            </div>
                          </div>


                         <div class="col-md-4">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput5"> IPD</label>
                              <div class="col-md-5">
                                <input v-model="form.IPD" class="form-control border-primary" type="number" placeholder="  " id="userinput5" name="IPD" step="0.01" >
                              </div>
                            </div></div>
                              <div class="col-md-5">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput5"> نوع العدسات</label>
                              <div class="col-md-5">
                                <input v-model="form.type" class="form-control border-primary" type="text" placeholder="  " id="userinput5" name="type" step="0.01" >
                              </div>
                            </div></div>
                           <div class="col-md-4">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="projectinput6">مكان الكشف</label>
                              <div class="col-md-9">
                              <select v-model="form.plase" id="plase" name="plase" class="form-control" required>
                                <option value="1">في المركز</option>
                                <option value="2">خارجي</option>
                                <option value="3">بدون كشف</option>
                              </select>
                            </div></div>
                          </div>
                          <!-- -->
                           <div class="col-md-4">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="projectinput6"> الفريم </label>
                              <div class="col-md-9">
                              <select v-model="form.prodect_id" id="prodect_id" name="prodect_id" class="form-control" required>
                                <option v-for="prodect  in products" :key="prodect.id" :value="prodect.id" >{{prodect.name}}</option>
                              </select>
                            </div></div>
                          </div>
                          
                          </div>
                          <div class="form-group">
                          <label for="userinput8">ملاحظة</label>
                          <textarea v-model="form.note" id="userinput8" rows="5" class="form-control border-primary" name="note" placeholder="ملاحظة"></textarea>
                        </div>
                            <!-- <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput5">Email</label>
                              <div class="col-md-9">
                                <input class="form-control border-primary" type="email" placeholder="email" id="userinput5">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput6">Website</label>
                              <div class="col-md-9">
                                <input class="form-control border-primary" type="url" placeholder="http://" id="userinput6">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-3 label-control">Contact Number</label>
                              <div class="col-md-9">
                                <input class="form-control border-primary" type="tel" placeholder="Contact Number"
                                id="userinput7">
                              </div>
                            </div> 
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput8">Bio</label>
                              <div class="col-md-9">
                                <textarea id="userinput8" rows="6" class="form-control border-primary" name="bio"
                                placeholder="Bio"></textarea>
                              </div>
                            </div>-->
                          </div>
                        </div>
                         <h4 class="form-section"><i class="la la-money"></i> الحسابات</h4>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput5">المبلغ الكلي</label>
                              <div class="col-md-9">
                                <input v-model="form.price" class="form-control border-primary" type="number" placeholder="المبلغ الكلي " id="price" name="price" required>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput6">التخفيض (%)</label>
                              <div class="col-md-9">
                                <input v-model="form.discount" class="form-control border-primary" type="number" placeholder="التخفيض" id="discount" name="discount" @change="discount" required>
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
                                id="payed" name="payed" @change="total" required >
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
                      <div class="form-actions center">
                        <a href="/dashboard" type="button" class="btn btn-warning mr-1">
                          <i class="ft-x"></i>  إلــغــاء
                        </a>
                        <!-- <button type="button" data-toggle="modal" data-target="#addnew">Launch modal</button> -->

                        <button type="submit" class="btn btn-primary">
                          <i class="la la-check-square-o"></i> حـــفـــظ
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
           <div class="modal fade " id="addnew" tabindex="-1" role="dialog" aria-labelledby="addnewLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" width="100%">
              <div class="modal-header">
                <h5 class="modal-title" v-show="!editmode" id="addnewLabel"> </h5>
                <h5 class="modal-title" v-show="editmode" id="addnewLabel"> تعديل بيانات الطلب</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
               
              <div class="form-body"><div id="Report" class="paper" dir="rtl" >
                <img  style="border-radius: 50%;width:90px;height: 90px;float:right;" alt="modern admin logo" src="img/logo-o.jpeg" >
                               <img  style="border-radius: 50%;width:90px;height: 90px;float:left;" alt="modern admin logo" src="img/logo-o.jpeg" >
                 <center><h3 class="brand-text">مركز أوبتيزون للبصريات</h3> 
                 <h3 class="brand-text">Optizone Optics</h3>
                                       
                      <h4 class="form-section"><i class="la la-home"></i>  الخرطوم-الطائف-شارع الستين-جوار كليةالرياض العالمية</h4>
                      <h4 >0992989975-0121258927 :Tel<i class="la la-phone"></i>  </h4></center> 
                      <!-- <h4 class="form-section"><i class="la la-user"></i>  استلام الزبون</h4> -->

                        <table style=" border: 1px solid black;  border-collapse: collapse; width: 90%;  height: 50px;padding: 15px;line-height:normal;color:black;">
                           <tbody> <tr class="text-center" >
                             
                            <td style="text-align:right; border: 1px groove black;"><b>اسم العميل  <b> :</b>  {{  this.form.clint_name  }} </b> </td>
                            <td style="text-align:right; border: 1px groove black;"><b>العنوان   <b> :</b>  {{  this.form.address  }} </b> </td>
                          </tr>
                           <tr class="text-center" >
                            <td style="text-align:right; border: 1px groove black;"><b> رقم الهاتف  <b> :</b>  {{  this.form.phone  }} </b> </td>
                            <td style="text-align:right; border: 1px groove black;"><b>التاريخ   <b> :</b>  {{  this.form.date  }} </b> </td>
                          </tr>
                           <tr class="text-center" >
                            <td style="text-align:right; border: 1px groove black;"><b> مكان الكشف  <b> :</b>  {{  this.plase_data  }} </b> </td>
                            <td style="text-align:right; border: 1px groove black;"><b>نوع الفريم   <b> :</b>  {{  this.frame  }} </b> </td>
                          </tr>
                           <tr class="text-center" >
                            <td style="text-align:right; border: 1px groove black;"><b>نوع العدسات   <b> :</b>  {{  this.form.type  }} </b> </td>
                            <td style="text-align:right; border: 1px groove black;"><b> المبلغ الكلي  <b> :</b>  {{  this.form.price  }} </b> </td>
                          
                          </tr>
                           <tr class="text-center" >
                            <td style="text-align:right; border: 1px groove black;"><b>التخفيض (%)   <b> :</b>  {{  this.form.discount  }} </b> </td>
                            <td style="text-align:right; border: 1px groove black;"><b>المبلغ بعد التخفيض   <b> :</b>  {{  this.form.amount_after  }} </b> </td>
                          </tr>
                          <tr class="text-center" >
                            <td style="text-align:right; border: 1px groove black;"><b>المدفوع   <b> :</b>  {{  this.form.payed  }} </b> </td>
                            <td style="text-align:right; border: 1px groove black;"><b> المتبقي    <b> :</b>  {{  this.form.amount_left  }} </b> </td>
                          </tr>
                            <tr class="text-center" >
                            <td style="text-align:right; border: 1px groove black;"><b> ملاحظة    <b> :</b>  {{  this.form.note  }} </b> </td>
                          </tr>
                   
                            </tbody>
                        </table>
                       <div style="text-align: right;"><br>
                            <b>-المحل غير مسؤول عن اي منتج لم يتم استلامه خلال 60 يوم من تاريخ الاستلام .
<br>-المبالغ المدفوعة على المنتجات لا يتم استرجاعها بعد التنفيذ بالنسبه للعدسات .
<br>-لا يتم تسليم المنتج إلا بعد دفع قيمته كامله .
<br>-يتم استلام اي شكوى بخصوص المنتج من مده أقصاها اسبوعين من تاريخ الاستلام ولا يتحمل المركز الشكاوي الناتجة عن الإهمال وسوء الاستعمال .<br>
<br>-العدسات اللاصقة لا ترد ولا تستبدل بعد خروجها من المركز.
<br>-عذرا المركز غير مسؤول في حالة حدوث تلف للفريمات من خارج المركز أثناء تركيب العدسات .
                            </b>   </div>
                       <h3>_______________________________________________________________________________</h3>
         <img  style="border-radius: 50%;width:90px;height: 90px;float:right;" alt="modern admin logo" src="img/logo-o.jpeg" >
                               <img  style="border-radius: 50%;width:90px;height: 90px;float:left;" alt="modern admin logo" src="img/logo-o.jpeg" >
                 <center><h3 class="brand-text">مركز أوبتيزون للبصريات</h3> 
                 <h3 class="brand-text">Optizone Optics</h3>
                 </center>              
                  <!-- <h4 class="form-section"><i class="la la-home"></i>  الخرطوم ,الطائف, شارع الستين</h4>
                      <h4 style="float:left;">0992989975-0121258927 :Tel<i class="la la-phone"></i>  </h4><br>     -->
                      <!-- <h4 class="form-section"><i class="la la-user"></i>  تسليم المركز</h4> -->

                        <table style=" border: 1px solid black;  border-collapse: collapse; width: 90%;  height: 50px;padding: 15px;line-height:normal;color:black;">
                           <tbody> <tr class="text-center" >
                             
                            <td style="text-align:right; border: 1px groove black;"><b>اسم العميل  <b> :</b>  {{  this.form.clint_name  }} </b> </td>
                            <td style="text-align:right; border: 1px groove black;"><b>العنوان   <b> :</b>  {{  this.form.address  }} </b> </td>
                          </tr>
                           <tr class="text-center" >
                            <td style="text-align:right; border: 1px groove black;"><b> رقم الهاتف  <b> :</b>  {{  this.form.phone  }} </b> </td>
                            <td style="text-align:right; border: 1px groove black;"><b>التاريخ   <b> :</b>  {{  this.form.date  }} </b> </td>
                          </tr>
                           <tr class="text-center" >
                            <td style="text-align:right; border: 1px groove black;"><b> مكان الكشف  <b> :</b>  {{  this.plase_data  }} </b> </td>
                            <td style="text-align:right; border: 1px groove black;"><b>نوع الفريم   <b> :</b>  {{  this.frame  }} </b> </td>
                          </tr><tr>
                           <td style="text-align:right; border: 1px groove black;"><b>نوع العدسات   <b> :</b>  {{  this.form.type  }} </b> </td>
                          </tr>
                             </tbody>
                        </table><br>
                        <table>
                          <tbody>
                          <tr class="text-center" >
                            <td style="text-align:right; border: 1px groove black;"><b>  Progressive      <input v-model="form.progressive" type="checkbox" disabled="false" id="userinput4" class="state icheckbox_minimal checked mr-1"  > </b> </td>
                            <td style="text-align:right; border: 1px groove black;"><b> Bifocal    <input v-model="form.bifocal" type="checkbox" disabled="false" id="userinput4" class="state icheckbox_minimal checked mr-1"  > </b> </td>
                            <td style="text-align:right; border: 1px groove black;"><b> SV     <input v-model="form.sv" type="checkbox" disabled="false" id="userinput4" class="state icheckbox_minimal checked mr-1"> </b> </td>
                         
                          </tr>
                           </tbody>
                        </table><br>
                                <table style=" border: 1px solid black;  border-collapse: collapse; width: 90%;  height: 50px;padding: 15px;line-height:normal;color:black;" dir="ltr">
                                    <thead>
                      
                    
                                         <tr>
                                     <th style="text-align:center; border: 1px solid black;">#</th>
                                      <th style="text-align:center; border: 1px solid black;"><center>SPH</center></th>
                                     <th style="text-align:center; border: 1px solid black;"> <center>SYL</center></th>
                                     <th style="text-align:center; border: 1px solid black;"><center>AXIS</center></th>
                                     <th style="text-align:center; border: 1px solid black;"><center>ِADD1</center></th>
                                     <th style="text-align:center; border: 1px solid black;"><center>ADD2</center></th>
                                     <th style="text-align:center; border: 1px solid black;"><center>VA</center></th>
                                    <th style="text-align:center; border: 1px solid black;"><center>C.lenses</center></th>
                    </tr>
                  </thead>
                  <tbody> 
                    <tr >
                      <td> Right</td>
                      <td style="text-align:right; border: 1px groove black;"><center>{{  this.form.D_R_SPH  }} </center></td>
                      <td style="text-align:right; border: 1px groove black;"><center>{{  this.form.D_R_SYL  }}</center></td>
                      <td style="text-align:right; border: 1px groove black;"><center>{{  this.form.D_R_AXIS  }}</center></td>
                     <td style="text-align:right; border: 1px groove black;"><center>{{  this.form.D_L_SPH  }} </center></td>
                      <td style="text-align:right; border: 1px groove black;"><center>{{  this.form.D_L_SYL  }}</center> </td>
                      <td style="text-align:right; border: 1px groove black;"><center>{{  this.form.D_L_AXIS  }} </center></td>
                      <td style="text-align:right; border: 1px groove black;"><center>{{  this.form.D_L_ah1  }} </center></td>
                    </tr>
                      <tr>
                      <td> Left</td>
                      <td style="text-align:right; border: 1px groove black;"><center>{{  this.form.N_R_SPH  }}</center></td>
                      <td style="text-align:right; border: 1px groove black;"><center>{{  this.form.N_R_SYL  }}</center></td>
                      <td style="text-align:right; border: 1px groove black;"><center>{{  this.form.N_R_AXIS  }}</center></td>
                      <td style="text-align:right; border: 1px groove black;"><center>{{  this.form.N_L_SPH  }}</center></td>
                      <td style="text-align:right; border: 1px groove black;"><center>{{  this.form.N_L_SYL  }}</center></td>
                      <td style="text-align:right; border: 1px groove black;"><center>{{  this.form.N_L_AXIS  }} </center></td>
                      <td style="text-align:right; border: 1px groove black;"><center>{{  this.form.N_L_ah2  }} </center></td>
                    </tr>
                        </tbody>
                </table>
                <br>
                <table  dir="ltr">
                <tbody>
                      <tr>
                    <td style="text-align:left; border: 1px solid black;" colspan="0"><b>IPD <b> :</b>{{  this.form.IPD  }}</b></td>
                    <!-- <td style="text-align:center; border: 1px solid black;" colspan="1">{{  this.form.IPD  }}</td> -->
                    </tr>
                  </tbody>
                </table>
                      </div></div>
                        <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">الغاء</button>
                <button  class="btn btn-success" type="button"  @click="printData"><b>استخراج بصيـغة PDF  </b> &nbsp;<i class="fa fa-file-pdf-o" aria-hidden="true"></i>  </button>
              </div>
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
              products :[],
              frame :'',
              plase_data :'',
              // expenses_total:'',
              form:new Form(
                {
                  id:'',
                  clint_name:'',
                  address:'',
                  phone:'',
                  date:'',

                  D_R_SPH:'',
                  D_R_SYL:'',
                  D_R_AXIS:'',
                  D_L_SPH:'',
                  D_L_SYL:'',
                  D_L_AXIS:'',
                  D_L_ah1:'',

                  N_R_SPH:'',
                  N_R_SYL:'',
                  N_R_AXIS:'',
                  N_L_SPH:'',
                  N_L_SYL:'',
                  N_L_AXIS:'',
                  N_L_ah2:'',

                  progressive:'',
                  bifocal:'',
                  sv:'',

                  IPD:'',
                  prodect_id:'',
                  type:'',

                  plase:'',
                  note:'',

                  price:'',
                  discount:'',
                  amount_after:'',
                  payed:'',
                  amount_left:'',
                  order_type:'1'



                 
                }
              )
            }
      },
        methods:{
          discount(){
            
            // var val=discount;
            // var val2=document.getElementById("price").value;
            var dis=this.form.price*(this.form.discount/100);
            var amount=this.form.price-dis;
            this.form.amount_after= amount;
            // document.getElementById("amount_after").value =amount;
            
            // console.log(val)
          },
          total(){
            //  var amount_after=5;
            // var payed=document.getElementById("payed").value;
            var amount=this.form.amount_after-this.form.payed;
            this.form.amount_left =amount;
            // document.getElementById("amount_after").value =val;

          },
          getdata(){
this.plase_data = $("#plase option:selected").text();
this.frame = $("#prodect_id option:selected").text();
      $('#addnew').modal('show');

          },
          printData(){
                 var divToPrint = document.getElementById("Report");
  var newWin=window.open();
  newWin.document.open();
      newWin.document.write('<html><head><style> {display:none;}th{background-color:lightgray;color:black;}</style><body onload="window.print()"  dir="rtl">'+divToPrint.innerHTML+'</body></html>');
  newWin.document.close();
  setTimeout(function(){newWin.close();},10);
              window.location.href="/orders";
},
         createorder(){
        this.$Progress.start();
          // Http Post data to create new user 
         
         this.form.post('api/orders')
        .then(() => {
          
           Fire.$emit('AfterCreate');
            
         toast.fire({
           icon: 'success',
           title: 'تم انشاء الطلب بنجاح'
        });
         this.getdata()

        
        
        .catch(
)})


 this.$Progress.finish();

  },
  
   loadprodects(){

        axios.get("api/orders").then(({ data }) => (this.products = data.prodects));
        
        },
        

        },
        created() {
            this.loadprodects();
            // Refrash page 
            //  Fire.$on('AfterCreate',() => {
            //    this.loadUsers();
            //  });

            // setInterval(() => this.loadUsers(),3000);
        },
        mounted() {
       
        }

    }
</script>
