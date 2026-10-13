@extends('admin.master')
@section('page')
    File Storage (APK)
@endsection

@section('content')
    <div class="box">
        <div class="box-body">
            <div class="row">
                <div class="col-lg-12" style="margin-bottom: 5px;">
                    <button class="btn btn-sm btn-primary pull-right" id="btnAddApk">Upload APK</button>
                </div>
            </div>
            <table id="tblApk" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th style="width: 5%;">No.</th>
                        <th>Nama Aplikasi</th>
                        <th style="width: 10%;">Versi</th>
                        <th style="width: 15%;">Tanggal Release</th>
                        <th style="width: 20%;">File</th>
                        <th style="width: 7%;">Published</th>
                        <th style="width: 8%;">Action</th>
                    </tr>
                </thead>
                <tbody id="tblBodyApk">
                    @foreach ($list as $u)
                        <tr>
                            <td></td>
                            <td>{{ $u->app_name }}</td>
                            <td>{{ $u->version }}</td>
                            <td data-order="{{ $u->release_date->format('Y-m-d') }}">{{ $u->release_date->format('d-m-Y') }}</td>
                            <td>{{ $u->file_name }} <small class="text-muted">({{ $u->readable_size }})</small></td>
                            <td style="text-align: center;">
                                @if ($u->publish)
                                    <a href="javascript:void(0)" title="Unpublish"
                                        onclick="setPublish('{{ encrypt($u->id) }}', 0)">
                                        <i class="fa fa-check-circle-o" style="font-size: 20px;"></i>
                                    </a>
                                @else
                                    <a href="javascript:void(0)" title="Publish"
                                        onclick="setPublish('{{ encrypt($u->id) }}', 1)">
                                        <i class="fa fa-circle-o text-danger" style="font-size: 20px;"></i>
                                    </a>
                                @endif
                            </td>
                            <td style="text-align: center;">
                                <a href="javascript:void(0);" class="text-success" title="Edit"
                                    onclick="editSelected('{{ encrypt($u->id) }}')">
                                    <i class="fa fa-edit" style="font-size: 20px;"></i>
                                </a>
                                <a href="javascript:void(0);" class="btnRemove text-danger" title="Remove"
                                    onclick="removeSelected('{{ encrypt($u->id) }}')">
                                    <i class="fa fa-trash" style="font-size: 20px;"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal" id="modalRemoveConfirm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Remove Confirm</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure to remove this APK ? File akan ikut dihapus dari server.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="btnRemoveYes">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modalFormApk">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Form APK</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" onsubmit="return false;">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="formAppName" class="col-sm-4 control-label">Nama Aplikasi <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="formAppName" maxlength="100">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="formVersion" class="col-sm-4 control-label">Versi <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="formVersion" placeholder="mis. 3.0.0"
                                        maxlength="50">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="formReleaseDate" class="col-sm-4 control-label">Tanggal Release <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" id="formReleaseDate">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="formApk" class="col-sm-4 control-label">File APK <span
                                        class="text-danger" id="apkRequired">*</span></label>
                                <div class="col-sm-8">
                                    <input type="file" id="formApk" accept=".apk">
                                    <p class="help-block" id="apkHelp">Format .apk, maksimal 100 MB.</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">&nbsp;</label>
                                <div class="col-sm-8">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" id="formPublish" checked> Publish
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="progress" id="uploadProgress" style="display: none; margin-bottom: 10px;">
                        <div class="progress-bar progress-bar-primary" id="uploadProgressBar" style="width: 0%">0%</div>
                    </div>
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="btnCancelForm">Cancel</button>
                    <button type="button" class="btn btn-primary" id="btnSaveForm">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}">
@endsection

@section('script')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script>
        var selectedId = "";
        var MAX_SIZE = 100 * 1024 * 1024; // 100 MB
        var saving = false;

        function toastError(text) {
            $.toast({
                heading: 'Error',
                text: text,
                showHideTransition: 'fade',
                position: 'bottom-right',
                icon: 'error'
            });
        }

        $(document).ready(function() {
            $("#tblBodyApk").find("tr").each(function(i, e) {
                $(this).find("td").eq(0).html(i + 1)
            });
            $("#tblApk").DataTable({
                order: [[3, 'desc']]
            });

            $("#btnAddApk").click(function() {
                clearForm();
                $("#modalFormApk").modal("show");
            });

            $("#btnRemoveYes").click(function() {
                $.post("{{ url('/wongelek/file-storage/remove') }}/" + selectedId, function() {
                    $("#modalRemoveConfirm").modal("hide");
                    window.location.reload();
                });
            });

            $("#btnSaveForm").click(function() {
                if (saving) return;

                const appName = $("#formAppName").val().trim();
                const version = $("#formVersion").val().trim();
                const releaseDate = $("#formReleaseDate").val();
                const files = $("#formApk").prop('files');
                const publish = $("#formPublish").is(":checked") ? 1 : 0;

                if (appName == "" || version == "" || releaseDate == "") {
                    toastError("Nama aplikasi, versi, dan tanggal release wajib diisi.");
                    return;
                }

                if (selectedId == "" && files.length < 1) {
                    toastError("File APK wajib dipilih.");
                    return;
                }

                if (files.length > 0) {
                    if (!files[0].name.toLowerCase().endsWith(".apk")) {
                        toastError("Ekstensi file harus .apk");
                        return;
                    }
                    if (files[0].size > MAX_SIZE) {
                        toastError("Ukuran file maksimal 100 MB.");
                        return;
                    }
                }

                var form = new FormData();
                form.append('id', selectedId);
                form.append('app_name', appName);
                form.append('version', version);
                form.append('release_date', releaseDate);
                form.append('publish', publish);
                if (files.length > 0) {
                    form.append('apk', files[0]);
                }

                saving = true;
                $("#btnSaveForm").prop("disabled", true);
                $("#uploadProgress").show();

                $.ajax({
                    url: "{{ url('/wongelek/file-storage/save') }}",
                    type: "POST",
                    data: form,
                    contentType: false,
                    cache: false,
                    processData: false,
                    xhr: function() {
                        var xhr = $.ajaxSettings.xhr();
                        if (xhr.upload) {
                            xhr.upload.addEventListener('progress', function(e) {
                                if (e.lengthComputable) {
                                    var pct = Math.round(e.loaded / e.total * 100);
                                    $("#uploadProgressBar").css("width", pct + "%").text(pct + "%");
                                }
                            });
                        }
                        return xhr;
                    },
                    success: function(res) {
                        if (res.code == 200) {
                            window.location.reload();
                        } else {
                            resetSaving();
                            toastError(res.msg);
                        }
                    },
                    error: function(e) {
                        resetSaving();
                        toastError(e.status == 413 ?
                            "File terlalu besar untuk server (cek batas upload server)." :
                            "Gagal menyimpan form.");
                    }
                });
            });
        });

        function resetSaving() {
            saving = false;
            $("#btnSaveForm").prop("disabled", false);
            $("#uploadProgress").hide();
            $("#uploadProgressBar").css("width", "0%").text("0%");
        }

        function setPublish(id, publish) {
            $.post("{{ url('/wongelek/file-storage/publish') }}/" + id, {
                publish: publish
            }, function() {
                window.location.reload();
            });
        }

        function removeSelected(id) {
            selectedId = id;
            $("#modalRemoveConfirm").modal("show");
        }

        function editSelected(id) {
            $.get("{{ url('/wongelek/file-storage/get') }}/" + id, function(res) {
                if (res.code != 200) {
                    toastError(res.msg);
                    return;
                }
                clearForm();
                selectedId = id;
                $("#formAppName").val(res.data.app_name);
                $("#formVersion").val(res.data.version);
                $("#formReleaseDate").val(res.data.release_date);
                $("#formPublish").prop("checked", res.data.publish == 1);
                $("#apkRequired").hide();
                $("#apkHelp").text("File saat ini: " + res.data.file_name +
                    ". Kosongkan jika tidak ingin mengganti file.");
                $("#modalFormApk").modal("show");
            });
        }

        function clearForm() {
            selectedId = "";
            resetSaving();
            $("#formAppName, #formVersion, #formReleaseDate, #formApk").val("");
            $("#formPublish").prop("checked", true);
            $("#apkRequired").show();
            $("#apkHelp").text("Format .apk, maksimal 100 MB.");
        }
    </script>
@endsection
