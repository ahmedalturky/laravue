<template>
<div class="container">

    <div class="content-body">
        <!-- Knob example section start -->
        <section id="knob-examples">
          <div class="row">
        <div class="col-xl-4 col-lg-6 col-sm-12">
             <a href="#" @click="selectModel()"> <div class="card">
                <div class="card-footer">
                  <h4 class="card-footer">
                      <div class="text-center">
                          طلب جديد </div></h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <div class="text-center">
                     <img src="/img/form.png" width="300px" height="170px" alt="">
                    </div>
                  </div>
                </div>
              </div></a>
            </div>
          <div class="col-xl-4 col-lg-6 col-sm-12">
             <a href="/prodects" > <div class="card">
                <div class="card-footer">
                  <h4 class="card-footer">
                      <div class="text-center">
                          الفريمات  </div></h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <div class="text-center">
                     <img src="/img/eye.png" width="300px" height="170px" alt="">
                    </div>
                  </div>
                </div>
              </div></a>
            </div>
            <div class="col-xl-4 col-lg-6 col-sm-12">
             <a href=""> <div class="card">
                <div class="card-footer">
                  <h4 class="card-footer">
                      <div class="text-center">
                          التأمين الصحي </div></h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <div class="text-center">
                     <img src="/img/health.png" width="300px" height="170px" alt="">
                    </div>
                  </div>
                </div>
              </div></a>
            </div>
      
           
          </div>
        </section>
    </div>
    <!-- Modal -->
<div class="modal fade" id="select" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">طلب جديد</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"><center>

 <a href="/order"  class="btn btn-float btn-float-lg btn-outline-pink"><i class="la la-file-text
"></i><span>  طبيه</span> </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="/beautifying"  class="btn btn-float btn-float-lg btn-outline-cyan"><i class="la la-user
"></i><span>  تجميليه  </span>
                          </a>   </center> 
                          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
</div>
</template>

<script>
    export default {
        // mounted() {
        //     console.log('Component mounted.')
        // },
        methods:{
          selectModel(){
            $('#select').modal('show');
          }
        }

    }
</script>
