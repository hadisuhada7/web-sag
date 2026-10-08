@extends('shared.master')

@section('content')
    <x-banner-summary mode="contact"></x-banner-summary>
    <section class="space-ptb background-sidoagung">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 mb-4 mb-lg-0">
                    <div class="section-title pt-5">
                        <h2 class="mb-3 text-white">Hubungi Kami</h2>
                        <p class="text-white">Sebagai Bagian Dari Layanan Konsumen Sido Agung Group, Kami Membuka Kanal - Kanal Komunikasi Yang Dapat Dengan Mudah Diakses.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="space-ptb">
        <div class="container">
            <div class="row justify-content-lg-around position-relative pt-5">
                <div class="col-lg-4 col-md-5 mb-4 pb-5" pb->
                    <div class="img-shadow-right img-talkus"
                        style="background-image:url('{{ asset('images/content/hands.png') }}')">
                        <center>
                            <h4 class="text-white be-our-partner">Jadi Mitra Kami</h4>
                        </center>
                    </div>
                    <center>
                        <a href="{{ route('we.be-our-partner') }}"
                            class="btn btn-warning btn-bottom-center text-white">Klik
                            di sini</a>
                    </center>
                </div>
                <div class="col-lg-7 col-md-7 pr-lg-5">
                    <div class="p-4 p-md-5 bg-white shadow border-radius">
                        <h4>Kami Ingin Sekali Mendengar Dari Anda</h4>
                        <form class="mt-4" id="frmQuestion">
                            {{ csrf_field() }}
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" id="formName" placeholder="Name"
                                    name="formName" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="email" class="form-control" id="formEmail" name="formEmail"
                                    placeholder="Alamat Surel" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" id="formType" name="formType"
                                    placeholder="Type Pertanyaan" required>
                            </div>
                            <div class="form-group mb-4">
                                <textarea class="form-control" id="formDescription" name="formDescription"
                                    placeholder="Deskripsi Pertanyaan Anda" rows="5" required></textarea>
                            </div>
                            <div class="form-group mb-0">
                                <button type="button" id="btnSubmit" class="btn btn-warning text-white">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="space-ptb bg-green">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 mb-4 mb-lg-0">
                  <div class="col-md-12 bg-white border-radius mt-3">
                     <div class="circle-text"></div>
                     <div class="pl-5 pb-5 pt-5 ">
                         <h5 class="text-primary mb-2">Sido Agung Group</h5>
                         {{-- <p class="mb-2">Ruko Garden Shopping Arcade Madison Park Unit 9CE, Central Park, Jln. LetJend. S. Parman, Tanjung Duren Selatan, Grogol, Jakarta Barat 11470</p>--}}
						 <p>JLN. AIP KS TUBUN IIC NO.30, SLIPI, PALMERAH, JAKARTA BARAT 11410</p>
                         <p class="mb-0">
							<a class="contactus-text" href="tel:+6282125998700"><i class="fas fa-fax"></i> 0821-2599-8700</a> 
                         </p>
                     </div>
                 </div>

                    <div class="col-md-12 bg-white border-radius mt-3">
                        <div class="circle-text"></div>
                        <div class="pl-5 pb-5 pt-5 ">
                            <h5 class="text-primary mb-2">PT. Sido Agung Agro Prima</h5>
                            <p class="mb-2">Jl. Raya Cirebon - Losari KM.16, Desa Bendungan, Kec. Pangenan, Cirebon, Jawa Barat </p>
                            {{-- <p class="mb-0">
                              <a class="contactus-text" href="tel:+622318512395"><i class="fas fa-fax"></i> (0231) 8512395</a>
                            </p> --}}
							<p class="mb-0">
								<a class="contactus-text" href="tel:+6282125998700"><i class="fas fa-fax"></i> 0821-2599-8700</a> 
							 </p>
                        </div>
                    </div>

                    <div class="col-md-12 bg-white border-radius mt-3">
                        <div class="circle-text"></div>
                        <div class="pl-5 pb-5 pt-5 ">
                            <h5 class="text-primary mb-2">PT. Sido Agung Farm</h5>
                            <p class="mb-0">Jl. Magelang - Purworejo No.KM. 10, RW.5, Sidomukti 2, Sidoagung, Kec. Tempuran, Kabupaten Magelang, Jawa Tengah 56161 </p>
							<p class="mb-0">
								<a class="contactus-text" href="tel:+6282125998700"><i class="fas fa-fax"></i> 0821-2599-8700</a> 
							 </p>
						</div>
                    </div>

                    <div class="col-md-12 bg-white border-radius mt-3">
                        <div class="circle-text"></div>
                        <div class="pl-5 pb-5 pt-5 ">
                           <h5 class="text-primary mb-2">PT. Sido Sari Multifarm</h5>
                           <p class="mb-2">Sindangsari, Kec. Luragung, Kabupaten Kuningan, Jawa Barat 45581 </p>
                           {{-- <p class="mb-0">
                              <a class="contactus-text" href="tel:+6289677879015"><i class="fas fa-fax"></i> 0896-7787-9015</a>
						   </p> --}}
						   <p class="mb-0">
								<a class="contactus-text" href="fax:+6282125998700"><i class="fas fa-fax"></i> 0821-2599-8700</a> 
							 </p>
                        </div>
                     </div>
                     
                     <div class="col-md-12 bg-white border-radius mt-3">
                        <div class="circle-text"></div>
                        <div class="pl-5 pb-5 pt-5 ">
                           <h5 class="text-primary mb-2">PT. Asia Pangan Utama</h5> 
                           <p class="mb-2">Dusun Darupono, Kelurahan Darupono, Kecamatan Kaliwungu Selatan, Kabupaten Kendal, Provinsi Jawa Tengah</p>
						   <p class="mb-0">
								<a class="contactus-text" href="tel:+6282125998700"><i class="fas fa-fax"></i> 0821-2599-8700</a> 
							 </p>
                        </div>
                     </div>

                     {{-- <div class="col-md-12 bg-white border-radius mt-3">
                        <div class="circle-text"></div>
                        <div class="pl-5 pb-5 pt-5 ">
                           <h5 class="text-primary mb-2">PT. Sidoagung Foods Processing</h5>
                           <p class="mb-2">Jl. H. Hasan Arif, Sukasenang, Kec. Banyuresmi, Kabupaten Garut, Jawa Barat 44191 </p>
                           <p class="mb-0">
                              <a class="contactus-text" href="tel:+6281221725758"><i class="fas fa-fax"></i> 0812-2172-5758</a>
                            </p>
                        </div>
                     </div> --}}
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
            const check = ["formName", "formType", "formEmail", "formDescription"];
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
               $("#frmQuestion")
                  .prop("method", "post")
                  .prop("action", "{{route('we.question')}}")
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
