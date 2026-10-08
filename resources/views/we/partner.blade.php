@extends('shared.master')

@php
    $categories = [
        'feed'   => "Pakan Ternak",
        'doc'     => "Bibit Ayam Umur Sehari",
        'livebird'     => "Ayam Hidup",
        'broiler'    => "Ayam Potong"
    ];
@endphp

@section('content')
<x-banner-summary mode="contact"></x-banner-summary>

<section class="space-pt our-be-ourpartner" style="padding-top:50px;">
   <div class="container">
      <div class="row justify-content-center ">
         <div class="col-lg-12">
            <div class="section-title text-center">
               <h2>Bergabung dan jadi mitra kami</h2>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="bg-white shadow-lg p-4 p-sm-5 border-radius mt-2 ">
            <div class="col-lg-12">
               <form class="mt-4 row" id="frmBePartner">
                  {{ csrf_field() }}                       
                  <div class="form-group col-md-6 mb-3">
                     <label>Nama Depan</label>
                     <input type="text" class="form-control" placeholder="Ex: AlXXX" name="formFirstName" id="formFirstName" required>
                  </div>
                  <div class="form-group col-md-6 mb-3">
                     <label>Nama Belakang</label>
                     <input type="text" name="formLastName" id="formLastName" class="form-control" placeholder="..">
                  </div>
                  <div class="form-group col-6 mb-3">
                     <label>Tgl. Lahir</label>
                     <input type="date" name="formBod" id="formBod" class="form-control" placeholder="Date" required>
                  </div>
                  <div class="form-group col-6 mb-3">
                     <label>Nomor Hp.</label>
                     <input type="number" name="formPhone" id="formPhone" class="form-control" placeholder="Ex : 08XXX" required>
                  </div>
                  <div class="form-group col-6 mb-3">
                     <label>Surel</label>
                     <input type="email" name="formEmail" id="formEmail" class="form-control" placeholder=" Email " required>
                  </div>
                  <div class="form-group col-6 mb-3">
                     <label>Kategori</label>
                     <select class="form-control" name="formCategory" id="formCategory" required>
                        <option value="">Pilih Kategori</option>
                        <option value="feed">Pakan Ternak</option>
                        <option value="broiler">Ayam Potong</option>
                        <option value="livebird">Ayam Hidup Siap Potong</option>
                        <option value="doc">Bibit Ayam Umur Sehari</option>
                     </select>
                  </div>
                  <div class="col-lg-12">
                     <hr>
                  </div>
                  <div class="form-group col-6 mt-3 mb-3">
                     <label>Nama Perusahaan</label>
                     <input type="text" name="formCompanyName" id="formCompanyName" class="form-control" placeholder="Ex: PT XX" required>
                  </div>
                  <div class="form-group col-6 mt-3 mb-3">
                     <label>Lokasi Perusahaan</label>
                     <input type="text" name="formCompanyLocation" id="formCompanyLocation" class="form-control" placeholder="Ex: PT XX" required>
                  </div>
                  <div class="col-lg-6 pb-3 pt-3">
                     <h4>Beri tahu kami sedikit tentang perusahaan Anda
                     </h4>
                  </div>
                  <div class="form-group col-12 mb-4">
                     <textarea name="formCompanyDescription" id="formCompanyDescription" class="form-control" placeholder="Description" rows="5" required></textarea>
                  </div>
                  <div class="form-group  d-md-flex justify-content-center align-items-center col-12 mb-0">
                     <button type="button" id="btnSubmit" class="btn btn-primary">Memproses</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>

@include("we.modal-response")

@endsection

@section('script')
    <script>
       $(function(){
         @if(session()->has("success"))
            $("#modalRespons").modal("show");
            setTimeout(() => {
               
               $("#modalRespons").modal("hide");
            }, 7000);
         @endif

         $("#btnSubmit").click(function(){
            let valid = true;
            const check = ["formFirstName", "formLastName", "formBod", "formPhone", "formEmail", "formCategory", "formCompanyName",
            "formCompanyLocation", "formCompanyDescription"];
            check.map(function(e){
               const x = $("#" + e)
               x.removeClass("is-invalid");
               if(x.val() == "")
               {
                  x.addClass("is-invalid");
                  valid = false;
               }
            });

            if(!isEmail($("#formEmail").val()))
            {
               $("#formEmail").addClass("is-invalid");
               valid = false;
            }

            if(valid)
            {
               $("#frmBePartner")
                  .prop("method", "post")
                  .prop("action", "{{route('we.join-as-partner')}}")
                  .submit()
            }
         })
      })

      function isEmail(email) {
         var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
         return regex.test(email);
      }
    </script>
@endsection