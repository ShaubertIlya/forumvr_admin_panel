@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(!empty($errors->all()))
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} |  {{ __('You are logged in!') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="" method="post" class="form-horizontal" id="user-details-form" accept-charset="UTF-8" enctype="multipart/form-data">
                        @csrf

                        <div class="box-body">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab-form-1" data-toggle="tab" aria-expanded="true">
                                            User Details <i class="fa fa-exclamation-circle text-red hide"></i>
                                        </a>
                                    </li>
                                    <li class="" style="margin-left: 30px;">
                                        <a href="#tab-form-2" data-toggle="tab" aria-expanded="false">
                                            Business Information <i class="fa fa-exclamation-circle text-red hide"></i>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content fields-group">
                                    <div class="tab-pane active" id="tab-form-1">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 asterisk control-label">Name</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                                    <input readonly class="form-control" required type="text" id="name" name="name" value="{{ $user->name }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-sm-2 asterisk control-label">Email</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
                                                    <input class="form-control" required type="email" id="email" name="email" value="{{ $user->email }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="profile_company_name" class="col-sm-2 asterisk control-label">Company name</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                                    <input class="form-control" readonly type="text" id="profile_company_name" name="profile[company_name]" value="{{ optional($user->profile)->company_name }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="profile_bin" class="col-sm-2  control-label">Bin</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                                    <input class="form-control" type="text" id="profile_bin" name="profile[bin]" value="{{ optional($user->profile)->bin }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="profile_address" class="col-sm-2 asterisk control-label">Address</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                                    <input class="form-control" required type="text" id="profile_address" name="profile[address]" value="{{ optional($user->profile)->address }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="profile_phone_number" class="col-sm-2 asterisk control-label">Phone number</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
                                                    <input class="form-control" required type="number" id="profile_phone_number" name="profile[phone_number]" value="{{ optional($user->profile)->phone_number }}" placeholder="999 9999 9999" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="profile_website" class="col-sm-2  control-label">Website</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-internet-explorer fa-fw"></i></span>
                                                    <input class="form-control" type="url" id="profile_website" name="profile[website]" value="{{ optional($user->profile)->website }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="profile_description" class="col-sm-2  control-label">Description</label>
                                            <div class="col-sm-8">
                                                <textarea name="profile[description]" class="form-control profile_description_" rows="5" placeholder="Input Description">{{ optional($user->profile)->description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="profile_company_logo" class="col-sm-2  control-label">Company logo</label>
                                            <div class="col-sm-8">
                                                <input type="file" name="profile[company_logo]" class="">
{{--                                                    <div class="file-input file-input-new"><div class="file-preview ">--}}
{{--                                                            <button type="button" class="close fileinput-remove" aria-label="Close">--}}
{{--                                                                <span aria-hidden="true">×</span>--}}
{{--                                                            </button>    <div class="file-drop-disabled">--}}
{{--                                                                <div class="file-preview-thumbnails">--}}
{{--                                                                </div>--}}
{{--                                                                <div class="clearfix"></div>    <div class="file-preview-status text-center text-success"></div>--}}
{{--                                                                <div class="kv-fileinput-error file-error-message" style="display: none;"></div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="kv-upload-progress kv-hidden" style="display: none;"><div class="progress">--}}
{{--                                                                <div class="progress-bar bg-success progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%;">--}}
{{--                                                                    0%--}}
{{--                                                                </div>--}}
{{--                                                            </div></div><div class="clearfix"></div>--}}
{{--                                                        <div class="input-group file-caption-main">--}}
{{--                                                            <div class="input-group-btn input-group-append">--}}
{{--                                                                <div tabindex="500" class="btn btn-primary btn-file">--}}
{{--                                                                    <i class="glyphicon glyphicon-folder-open"></i>--}}
{{--                                                                    &nbsp;  <span class="hidden-xs">Browse</span>--}}
{{--                                                                    <input type="file" class="profile_company_logo_" name="profile[company_logo]" id="1634471322150_51">--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div></div>--}}
                                            </div>
                                            @if(optional($user->profile)->company_logo)
                                            <div class="col-md-12">
                                                <img src="{{ asset('upload/' . $user->profile->company_logo) }}" />
                                            </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="col-sm-2  control-label">Password</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-eye-slash fa-fw"></i></span>
                                                    <input class="form-control" type="password" id="password" name="password" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-form-2">
                                        <div class="form-group">
                                            <label for="business_information_main_presentation_link" class="col-sm-2  control-label">Main presentation link</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                                    <input class="form-control" type="text" id="business_information_main_presentation_link" name="business_information[main_presentation_link]" value="{{ optional($user->business_information)->main_presentation_link }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">

                                            <label class="col-sm-2  control-label">Additional presentation links</label>

                                            <div class="col-sm-8">
                                                <table class="table table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>Key</th>
                                                        <th>Value</th>
                                                        <th style="width: 75px;"></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="kv-business_information-additional_presentation_links-table">


                                                    @forelse($user->business_information->additional_presentation_links ?: [] as $key => $value)
                                                        <tr>
                                                            <td>
                                                                <div class="form-group ">
                                                                    <div class="col-sm-12">
                                                                        <input class="form-control" name="business_information[additional_presentation_links][keys][]" value="{{ $key }}">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group ">
                                                                    <div class="col-sm-12">
                                                                        <input class="form-control" name="business_information[additional_presentation_links][values][]" value="{{ $value }}">
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td class="form-group">
                                                                <div>
                                                                    <div class="business_information-additional_presentation_links-remove btn btn-warning btn-sm pull-right">
                                                                        <i class="fa fa-trash">&nbsp;</i>Remove
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @empty

                                                    @endforelse

                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            <div class="save-btn-0 business_information-additional_presentation_links-add btn btn-success btn-sm pull-right">
                                                                <i class="fa fa-save"></i>&nbsp;New
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <template class="business_information-additional_presentation_links-tpl">
                                                <tr>
                                                    <td>
                                                        <div class="form-group  ">
                                                            <div class="col-sm-12">
                                                                <input name="business_information[additional_presentation_links][keys][]" class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="col-sm-12">
                                                                <input name="business_information[additional_presentation_links][values][]" class="form-control">
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td class="form-group">
                                                        <div>
                                                            <div class="business_information-additional_presentation_links-remove btn btn-warning btn-sm pull-right">
                                                                <i class="fa fa-trash">&nbsp;</i>Remove
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </template>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2  control-label">Videoclip links</label>
                                            <div class="col-sm-8">
                                                <table class="table table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>Key</th>
                                                        <th>Value</th>
                                                        <th style="width: 75px;"></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="kv-business_information-videoclip_links-table">

                                                    @forelse($user->business_information->videoclip_links ?? [] as $key => $value)
                                                        <tr>
                                                            <td>
                                                                <div class="form-group ">
                                                                    <div class="col-sm-12">
                                                                        <input class="form-control" name="business_information[videoclip_links][keys][]" value="{{ $key }}">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group ">
                                                                    <div class="col-sm-12">
                                                                        <input class="form-control" name="business_information[videoclip_links][values][]" value="{{ $value }}">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="form-group">
                                                                <div>
                                                                    <div class="business_information-videoclip_links-remove btn btn-warning btn-sm pull-right">
                                                                        <i class="fa fa-trash">&nbsp;</i>Remove
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @empty

                                                    @endforelse

                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            <div class="save-btn-1 business_information-videoclip_links-add btn btn-success btn-sm pull-right">
                                                                <i class="fa fa-save"></i>&nbsp;New
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <template class="business_information-videoclip_links-tpl">
                                                <tr>
                                                    <td>
                                                        <div class="form-group  ">
                                                            <div class="col-sm-12">
                                                                <input name="business_information[videoclip_links][keys][]" class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group  ">
                                                            <div class="col-sm-12">
                                                                <input name="business_information[videoclip_links][values][]" class="form-control">
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td class="form-group">
                                                        <div>
                                                            <div class="business_information-videoclip_links-remove btn btn-warning btn-sm pull-right">
                                                                <i class="fa fa-trash">&nbsp;</i>Remove
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </template>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2  control-label">Gallery links</label>
                                            <div class="col-sm-8">
                                                <table class="table table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>Key</th>
                                                        <th>Value</th>
                                                        <th style="width: 75px;"></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="kv-business_information-gallery_links-table">

                                                    @forelse($user->business_information->gallery_links ?? [] as $key => $value)
                                                        <tr>
                                                            <td>
                                                                <div class="form-group ">
                                                                    <div class="col-sm-12">
                                                                        <input class="form-control" name="business_information[gallery_links][keys][]" value="{{ $key }}">

                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group ">
                                                                    <div class="col-sm-12">
                                                                        <input class="form-control" name="business_information[gallery_links][values][]" value="{{ $value }}">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="form-group">
                                                                <div>
                                                                    <div class="business_information-gallery_links-remove btn btn-warning btn-sm pull-right">
                                                                        <i class="fa fa-trash">&nbsp;</i>Remove
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        
                                                    @endforelse

                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            <div class="save-btn-2 business_information-gallery_links-add btn btn-success btn-sm pull-right">
                                                                <i class="fa fa-save"></i>&nbsp;New
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <template class="business_information-gallery_links-tpl">
                                                <tr>
                                                    <td>
                                                        <div class="form-group  ">
                                                            <div class="col-sm-12">
                                                                <input name="business_information[gallery_links][keys][]" class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group  ">
                                                            <div class="col-sm-12">
                                                                <input name="business_information[gallery_links][values][]" class="form-control">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="form-group">
                                                        <div>
                                                            <div class="business_information-gallery_links-remove btn btn-warning btn-sm pull-right">
                                                                <i class="fa fa-trash">&nbsp;</i>Remove
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </template>
                                        </div>
                                        <div class="form-group">
                                            <label for="business_information_company_visitcard" class="col-sm-2  control-label">Company visitcard</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                                    <input class="form-control" type="text" id="business_information_company_visitcard" name="business_information[company_visitcard]" value="{{ optional($user->business_information)->company_visitcard }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="business_information_model3d_link" class="col-sm-2 control-label">Model3D link</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                                    <input class="form-control" type="text" id="business_information_model3d_link" name="business_information[model3d_link]" value="{{ optional($user->business_information)->model3d_link }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="business_information_gallery_link" class="col-sm-2  control-label">Gallery link</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                                    <input class="form-control" type="text" id="business_information_gallery_link" name="business_information[gallery_link]" value="{{ optional($user->business_information)->gallery_link }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">

                            <div class="col-md-2">
                            </div>

                            <div class="col-md-8">

                                <div class="btn-group pull-right">
                                    <button type="submit" form="user-details-form" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>

                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        var hash = document.location.hash;
        if (hash) {
            const activeTab = $('.nav-tabs a[href="' + hash + '"]');

            $('.nav-tabs li').removeClass('active');
            activeTab.tab('show');
            activeTab.closest('li').addClass('active');
        }

        // Change hash for page-reload
        $('.nav-tabs a').on('shown.bs.tab', function (e) {
            history.pushState(null,null, e.target.hash);

            const self = $(e.currentTarget);

            $('.nav-tabs li').removeClass('active');

            self.closest('li').addClass('active');
        });

        ;(function () {
            $('form.model-form-616c0d99d4f16').submit(function (e) {
                e.preventDefault();
                $(this).find('div.cascade-group.hide :input').attr('disabled', true);
            });
        })();

        $('.business_information-additional_presentation_links-add').on('click', function () {
            var tpl = $('template.business_information-additional_presentation_links-tpl').html();
            $('tbody.kv-business_information-additional_presentation_links-table').append(tpl);
        });

        $('tbody').on('click', '.business_information-additional_presentation_links-remove', function () {
            $(this).closest('tr').remove();
        });

        $('.business_information-videoclip_links-add').on('click', function () {
            var tpl = $('template.business_information-videoclip_links-tpl').html();
            $('tbody.kv-business_information-videoclip_links-table').append(tpl);
        });

        $('tbody').on('click', '.business_information-videoclip_links-remove', function () {
            $(this).closest('tr').remove();
        });

        $('.business_information-gallery_links-add').on('click', function () {
            var tpl = $('template.business_information-gallery_links-tpl').html();
            $('tbody.kv-business_information-gallery_links-table').append(tpl);
        });

        $('tbody').on('click', '.business_information-gallery_links-remove', function () {
            $(this).closest('tr').remove();
        });

        // $("tr[data-value]").each((index, e) => {
        //     const self = $(e);
        //     const values = self.data('value');
        //
        //     if (!values) return;
        //
        //     const countItems = Object.keys(values).length;
        //
        //     for(let i = 0; i < countItems; i++) {
        //         if (countItems > 1) {
        //             setTimeout(() => {
        //                 $(".save-btn-" + index).click();
        //             }, 0);
        //         }
        //     }
        //
        //     let n = 0;
        //     for(let i = 0; i < countItems; i++) {
        //         setTimeout(() => {
        //             console.log(self.find('input'));
        //             const keyInput = self.find('input').eq(i);
        //             const valueInput = self.find('input').eq(i + 1);
        //
        //             keyInput.val(Object.keys(values)[i]);
        //             valueInput.val(Object.values(values)[i]);
        //         }, 500);
        //     }
        //
        //     console.log(77777777777777);
        // });
    });
</script>
@endsection
