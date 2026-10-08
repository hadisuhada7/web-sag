@extends('admin.master')
@section('page')
Manajemen
@endsection

@section('content')
    <div class="box">
        <div class="box-body">
            <form id="frmManagement" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group" style="margin-top:15px;">
                    <label for="formName" class="col-lg-2 control-label">Name <span class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control input-sm" id="formName" placeholder="Name" maxlength="100" value="{{old("formName") ?? $rs->name}}">
                    </div>
                </div>
                <div class="form-group" style="margin-top:15px;">
                    <label for="formPosition" class="col-lg-2 control-label">Position <span class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control input-sm" id="formPosition" placeholder="Position" maxlength="100" value="{{old("formPosition") ?? $rs->position}}">
                    </div>
                </div>
                <div class="form-group" >
                    <label for="formOrder" class="col-lg-2 control-label">Order <span class="text-danger">*</span></label>
                    <div class="col-lg-3">
                        <select id="formOrder" class="form-control input-sm">
                            @for($order = 1; $order <= $orders; $order++)
                                @if($order == (old("formOrder") ?? $rs->order))
                                    <option value="{{$order}}" selected>{{$order}}</option>
                                @else
                                    <option value="{{$order}}" >{{$order}}</option>
                                @endif
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="form-group" >
                    <label for="formPhoto" class="col-lg-2 control-label">Photo <span class="text-danger">*</span></label>
                    <div class="col-lg-3">
                        <input type="file" id="formPhoto">
                    </div>
                </div>
                <div class="form-group" >
                    <label for="formDescription" class="col-lg-2 control-label">Description</label>
                    <div class="col-lg-10">
                        <textarea class="form-control input-sm" id="formDescription" rows="10" cols="80">{{old("formDescription") ?? $rs->description}}</textarea>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-lg-12 text-right">
                        <button id="btnBack" type="button" class="btn btn-sm btn-default">Kembali</button>
                        <button id="btnClear" type="button" class="btn btn-sm btn-default">Clear</button>
                        <button id="btnSave" type="button" class="btn btn-sm btn-success">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('style')
    
@endsection

@section('script')
    <script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        $(function(){

            CKEDITOR.replace('formDescription');

            $("#btnBack").click(function(){
                window.location.href = "{{url('/wongelek/management')}}"
            })

            $("#btnClear").click(function(){
                window.location.href = "{{url('/wongelek/management/add')}}"
            })

            $("#btnSave").click(function(){
                submitForm();
            });
        })

        function submitForm(){
            const tmb = $("#formPhoto").prop('files');
            const allowExt = ["image/png", "image/jpg", "image/jpeg"];

            let mandatories = ["formName", "formPosition", "formOrder"];
            for(let i in mandatories)
                if($("#" + mandatories).val() == "")
                {
                    $.toast({
                        heading: 'Error',
                        text: `Require's empty`,
                        showHideTransition: 'fade',
                        position: 'bottom-right',
                        icon: 'error'
                    })
                    return;
                }
            
            if (tmb.length < 1) {
                $.toast({
                    heading: 'Error',
                    text: `Require's empty`,
                    showHideTransition: 'fade',
                    position: 'bottom-right',
                    icon: 'error'
                })
                return;
            }

            const file = tmb[0];

            if (!allowExt.includes(file.type)) {
                $.toast({
                    heading: 'Error',
                    text: `Extention file not allowed. (png, jpg, jpeg)`,
                    showHideTransition: 'fade',
                    position: 'bottom-right',
                    icon: 'error'
                })
                return;
            }

            let inputs = mandatories.concat(["formDescription", "formPhoto"]);
            inputs.map(function(e){
                $("#" + e).prop("name", e)
            })

            $("#frmManagement")
                .prop("method", "post")
                .prop("action", "{{url('/wongelek/management/save')}}")
               .submit()
        }
    </script>
@endsection