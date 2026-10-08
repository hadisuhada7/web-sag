@extends('shared.master')

@section('content')
<x-banner-summary mode="csr.sosial"></x-banner-summary>

<section class="space-ptb bg-green">
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-lg-12 pb-lg-0">
                <div class="section-title mb-3 pt-3">
                    <h2 class="text-white">Sosial </h2>
                </div>
                <p class="text-white">Sido Agung Group Terus Berupaya Meningkatkan Martabat Hidup Masyarakat Di Sekitar Wilayah Kerjanya. Dengan Prinsip "Bisnis Yang Baik dapat Menciptakan Komunitas Yang Baik". Kami Mencoba Terlibat Aktif Dalam Setiap Upaya Pengembangan Masyarakat Atau Komunitas.</p>
            </div>
        </div>
    </div>
</section>

<section class="bg-light">
    <div class="container mobile-desk-container-event">
        <div id="blog-item">
            <div class="row ">
                <div class="col-lg-5">
                    <h2 class="pt-3 mobile-text-event">&nbsp;</h2>
                </div>
                <div class="col-lg-2 mr-3" id="box_year">
                </div>
                <div class="col-lg-4 ml-5">
                    <div class="mt-3 mb-3 ml-3">
                        <input type="text" class="not-click form-control-ntc form-control" name="formKeyword" id="formKeyword" placeholder="Cari.." value="">
                        <button class="button-search" type="button" id="btnSearch" > <i class="fa fa-search not-click"></i></button>
                    </div>
                </div>
            </div>
            <div class="row" id="listBlock"></div>

            <div class="row" id="detailBlock"></div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    var keyword = "";
    var page = 1;
    $(function(){

        getList();
        
        $("#formKeyword").on("change", function(){
            keyword = $(this).val();
            page = 1;
            getList();
        })

        $("#btnSearch").on("click", function(){
            keyword = $("#formKeyword").val();
            page = 1;
            getList();
        });

        $('#formKeyword').keypress(function (e) {
            if (e.which == 13) {
                keyword = $("#formKeyword").val();
                page = 1;
                getList();
                return;
            }
        });
    });

    function getList(){
        $.get("{{route('csr.getList')}}?mode=sosial&keyword=" + keyword + "&page=" + page)
        .done(function(r){
            $(document).find("#listBlock").eq(0).html(r)
        })
        .fail(function(e){
            console.log(e)
        })
    }

    function pageClicked(p)
    {
        keyword = $("#formKeyword").val();
        page = p;
        getList();
        return;
    }

    function showDetail(slug)
    {
        let listBlock = $(document).find("#listBlock").eq(0);
        let detailBlock = $(document).find("#detailBlock").eq(0);

        $.get("{{route('csr.getDetail')}}?mode=sosial&slug=" + slug)
            .done(function(r){
                detailBlock.html(r);

                listBlock.hide();
                detailBlock.show();
            })
            .fail(function(e){
                console.log(e)
            })
    }

    function hideDetail()
    {
        let listBlock = $(document).find("#listBlock").eq(0);
        let detailBlock = $(document).find("#detailBlock").eq(0);

        listBlock.show();
        detailBlock.hide();
    }
</script>
@endsection