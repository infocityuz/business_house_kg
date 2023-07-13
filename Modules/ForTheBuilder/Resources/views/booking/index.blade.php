@extends('forthebuilder::layouts.forthebuilder')

@section('title')
    {{ translate('leads') }}
@endsection

<style>
    .bronyaData {
        width: 86% !important;
    }

    .jkMiniData2,
    .jkMiniData {
        width: 98% !important;
    }
</style>

@php
    use Modules\ForTheBuilder\Entities\Clients;
    use Modules\ForTheBuilder\Entities\Constants;
    $list = [];
        foreach ($booking as $key => $model) {
            if ($client = Clients::where('id', $model->client_id)->where('status', Constants::CLIENT_ACTIVE)->first()) {
                // $client = Clients::where('id', $model->client_id)->first();
                // dd($model);
                $data = [
                    'id' => $model->id,
                    'full_name' => ($client) ? $client->first_name . ' ' . $client->last_name . ' ' . $client->middle_name : '',
                    'phone' => ($client) ? $client->phone : '',
                    'status' => $model->status,
                    'prepayment' => $model->prepayment,
                ];
                array_push($list, $data);
            }
        }
        $models=$list;
@endphp

@section('content')
    <div class="d-flex aad">
        @include('forthebuilder::layouts.content.navigation')
        <div class="mainMargin">
            <div style="max-width: 1394px;">
                @include('forthebuilder::layouts.content.header')
            </div>
            <div class="d-flex justify-content-between">
                <div class="d-flex">
                    <h2 class="panelUprText">{{ translate('booking') }}</h2>
                </div>
                <div class="miniSearchDivaffloDour">
                    <ion-icon class="miniSearchIconInput" name="search-outline"></ion-icon>
                    <input placeholder="{{ translate('Search by booking') }}" class="miniInputSdelka5 searchTable"
                        type="text">
                </div>
            </div>
            <div class="bronyaData">
                <div class="jkMiniData2">
                    <a href="" class="d-flex">
                        <div class="checkboxDivInput">
                            <input class="checkBoxInput" type="checkbox">
                        </div>
                        <div class="checkboxDivInput">
                            №
                        </div>
                        <div class="bronyaFio" style="justify-content: center;">
                            {{-- Ф.И.О --}}
                            {{ translate('Full Name') }}
                        </div>
                        <div class="bronyaTelefon">
                            {{-- Телефон --}}
                            {{ translate('Phone') }}
                        </div>
                        <div class="checkboxDivTextInput3 srokDeystvieBronya">
                            {{-- Срок действия --}}
                            {{ translate('Palidity') }}
                        </div>
                        <div class="checkboxDivTextInput" style="width: 19vw;">
                            {{-- Предоплата --}}
                            {{ translate('Prepayment') }}
                        </div>
                    </a>
                    <div class="checkboxDivTextInput4 bronyaDeystvie">
                        {{-- Действиe --}}
                        {{ translate('Actions') }}
                    </div>
                </div>
                {{-- @dd($models) --}}
                @if (!empty($models))
                    @foreach ($models as $key => $model)
                        <div class="jkMiniData mb-1 hideData">
                            <input type="hidden" class="hiddenData"
                                value="{{ $model['full_name'] . ' ' . $model['phone'] }} {{ $model['status'] == 1 ? translate('Active') : translate('No active') }} {{ $model['prepayment'] }}">
                            <div class="d-flex">
                                <a href="{{ route('forthebuilder.booking.show', $model['id']) }}" class="checkboxDivInput">
                                    <input class="checkBoxInput sub_chk" data-id="{{ $model['id'] }}" type="checkbox">
                                </a>
                                <a href="{{ route('forthebuilder.booking.show', $model['id']) }}" class="checkboxDivInput">
                                    {{ $key + 1 }}
                                </a>
                                <a href="{{ route('forthebuilder.booking.show', $model['id']) }}" class="bronyaFio ">
                                    {{ $model['full_name'] }}
                                </a>
                                <a href="{{ route('forthebuilder.booking.show', $model['id']) }}" class="bronyaTelefon">
                                    {{ $model['phone'] }}
                                </a>
                                @if ($model['status'] == 1)
                                    <a href="{{ route('forthebuilder.booking.show', $model['id']) }}" class="bronyaActivniy text-info">
                                        {{ translate('Active') }}
                                    </a>
                                @else
                                    <a href="{{ route('forthebuilder.booking.show', $model['id']) }}" class="bronyaActivniy text-danger">
                                        {{ translate('No active') }}
                                    </a>
                                @endif
                                <a href="{{ route('forthebuilder.booking.show', $model['id']) }}" class="checkboxDivTextInput" style="width: 19vw;">
                                    {{ $model['prepayment'] }}
                                </a>
                            </div>
                            <div class="checkboxDivTextInput4">
                                <a href="{{ route('forthebuilder.booking.show', $model['id']) }}" class="seaDiv">
                                    <img style="margin-top: 4px;" width="25" height="25"
                                        src="{{ asset('/backend-assets/forthebuilders/images/eye.png') }}" alt="Eye">
                                </a>
                                <a href="{{ route('forthebuilder.booking.show', $model['id']) }}" class="seaDiv">
                                    <img class="mt-1" width="20" height="20"
                                        src="{{ asset('/backend-assets/forthebuilders/images/edit.png') }}" alt="Edit">
                                </a>
                                <a class="button seaDiv" style="cursor: pointer;">
                                    <input type="hidden" class="model_id" value="{{ $model['id'] }}">
                                    <img class="mt-1" data-toggle="modal" data-target="#exampleModalLong" class="mt-1"
                                        width="20" height="20"
                                        src="{{ asset('/backend-assets/forthebuilders/images/trash.png') }}"
                                        alt="Trash">
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif


                <div class="aiz-pagination mt-2">
                    {{-- @dd($models->links()->elements) --}}
                    {{ $booking->links() }}
                </div>

            </div>

        </div>
    </div>
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border: none;">
                <div class="modal-body">
                    <h2 class="modalVideystvitelno">{{ translate('Do you really want to delete') }}</h2>
                    <div class="d-flex justify-content-center mt-5">
                        <button class="modalVideystvitelnoDa" data-dismiss="modal">{{ translate('Yes') }}</button>
                        <button class="modalVideystvitelnoNet" data-dismiss="modal">{{ translate('No') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

{{-- @section('scripts') --}}


<script src="{{ asset('/backend-assets/forthebuilders/javascript/jquery.min.js') }}"></script>
<script>
    let page_name = 'booking';
    console.log(page_name)
    $(document).ready(function() {
        $('.modalVideystvitelnoDa').on('click', function() {
            // var model_id=document.getElementById("model_id").value;
            var model_id = $('.model_id').val();
            //    console.log(model_id);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "booking/destroy/" + model_id,
                type: 'DELETE',
                data: {
                    booking_id: model_id
                },
                success: function(response) {
                    console.log(response);
                    // location.reload();
                }
            });
        });
    });
</script>


{{-- <script>
    $(document).ready(function () {
        $('.button-booking').on('click', function(){
            $('#booking_add_id').val($(this).attr('booking_id'))
        });
        $('.button-booking').on('click', function(){
            $('#booking_finish_id').val($(this).attr('booking_id'))
        });
        $('.booking_type').on('click', function () {
            if($(this).siblings(".booking_content").hasClass('display-none')){
                $(this).siblings(".booking_content").removeClass('display-none')
            }else{
                $(this).siblings(".booking_content").addClass('display-none')
            }
        });
        $(document).ready(function () {
            $('.button-booking').on('click', function(){
                $('#booking_add_id').val($(this).attr('booking_id'))
            });
            $('.button-booking').on('click', function(){
                $('#booking_finish_id').val($(this).attr('booking_id'))
            });
            $('.booking_type').on('click', function () {
                if ($(this).siblings('.booking_content').hasClass('display-none')) {
                    $(this).siblings('.booking_content').removeClass('display-none')
                } else {
                    $(this).siblings('.booking_content').addClass('display-none')
                }
            });

            $('#task_date').datetimepicker({
                format: 'Y-M-D',
            });
            $('#modal-form').validate({
                rules: {
                    task_date: {
                        required: true,
                    },
                },
                messages: {
                    task_date: {
                        required: " task date Поле, обязательное для заполнения.",
                    },
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });

            //pay-status

            $('.show-status').on('click',function (e) {

                e.preventDefault();

                $('.forthebuilder').addClass('active');
                $('.right__sidebar').addClass('active');

                var id = $(this).data('id');
                let price = $(this).data('price');
                let priceTwo = $(this).data('price-two');

                // $.ajaxSetup({
                //     beforeSend: function() {
                //         // TODO: show your spinner
                //         $("#for-preloader").addClass('spinner-border');
                //     },
                //     complete: function() {
                //         // TODO: hide your spinner
                //         $("#for-preloader").removeClass('spinner-border');
                //     }
                // });

                $.ajax({
                    url: `/forthebuilder/installment-plan/get-status/${id}`,
                    // data: {status: selectedstatuses},
                    type: 'GET',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function (data) {

                        let statuses = data.statuses;
                        $.each(statuses, function(index, element) {
                            let i = index+1;
                            let color = '';
                            let status1 = '';
                            let status2 = '';
                            if(element.status == 'Не оплачен'){
                                color = 'red';
                                status1 = 'selected';
                            }else{
                                color = 'rgb(25,132,86)';
                                status2 = 'selected';
                            }

                            if(priceTwo>0){
                                $('#flatItemDetailTable .two').show();

                                if(i<13){
                                    if($('.status-tr[data-id='+i+']').data('id') == i){
                                        $('.status-tr[data-id='+i+'] .status-price').text(price);
                                        $('.status-tr[data-id='+i+'] .status-date').text(element.pay_start_date);

                                        $('.status-tr[data-id='+i+'] .plan_status').attr('data-id',element.id);
                                        $('.status-tr[data-id='+i+'] .plan_status').css('background',color);
                                        $('.status-tr[data-id='+i+'] .plan_status').html(
                                            "<option value='Не оплачен' " + status1 + ">Не оплачен</option>" +
                                            "<option value='Оплачен'" + status2 + ">Оплачен</option>");
                                    }
                                }else if(i>12){
                                    if($('.status-tr[data-id='+i+']').data('id') == i){
                                        $('.status-tr[data-id='+i+'] .status-price').text(priceTwo);
                                        $('.status-tr[data-id='+i+'] .status-date').text(element.pay_start_date);

                                        $('.status-tr[data-id='+i+'] .plan_status').attr('data-id',element.id);
                                        $('.status-tr[data-id='+i+'] .plan_status').css('background',color);
                                        $('.status-tr[data-id='+i+'] .plan_status').html(
                                            "<option value='Не оплачен' " + status1 + ">Не оплачен</option>" +
                                            "<option value='Оплачен'" + status2 + ">Оплачен</option>");
                                    }
                                }
                            }else{
                                $('#flatItemDetailTable .two').hide();
                                if($('.status-tr[data-id='+i+']').data('id') == i){
                                    $('.status-tr[data-id='+i+'] .status-price').text(price);
                                    $('.status-tr[data-id='+i+'] .status-date').text(element.pay_start_date);

                                    $('.status-tr[data-id='+i+'] .plan_status').attr('data-id',element.id);
                                    $('.status-tr[data-id='+i+'] .plan_status').css('background',color);
                                    $('.status-tr[data-id='+i+'] .plan_status').html(
                                        "<option value='Не оплачен' " + status1 + ">Не оплачен</option>" +
                                        "<option value='Оплачен'" + status2 + ">Оплачен</option>");
                                }
                            }


                        });
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });

            });

            $('.plan_status').on('change',function (e) {
                e.preventDefault();
                let id = $(this).data('id');
                var selectedstatuses = $(this).val();
                $.ajax({
                    url: `/forthebuilder/installment-plan/update-status/${id}`,
                    data: {status: selectedstatuses},
                    type: 'PUT',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function (data) {
                        if(data['warning']){
                            toastr.warning(data['warning']);
                        }
                        if(data['success']){
                            toastr.success(data['success']);
                        }
                        if(data['status'] == 'Не оплачен'){
                            color = 'red';
                            status1 = 'selected';
                        }else{
                            color = 'rgb(25,132,86)';
                            status2 = 'selected';
                        }
                        $('.plan_status[data-id='+data['id']+']').css('background',color);
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            })

            $('.close_sidebar span').on('click',function (e) {
                e.preventDefault();
                $('.forthebuilder').removeClass('active');
                $('.right__sidebar').removeClass('active');
            });

            //pay-status

            $("#dashboard_datatable").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "paging": false,
                "language": {
                    "url": "{{ asset('/backend-assets/plugins/datatables/dataTables.russian.json') }}"
                }
            });

            let sessionSuccess ="{{ session('success') }}";
            if(sessionSuccess){
                toastr.success(sessionSuccess)
            }
            let sessionWarning = "{{ session('warning') }}";
            if(sessionWarning){
                toastr.warning(sessionWarning)
            }
            let sessionError = "{{ session('error') }}";
            if(sessionError){
                toastr.warning(sessionError)
            }

            $('#master').on('click', function(e) {
            if($(this).is(':checked',true))
            {
                $(".sub_chk").prop('checked', true);
            } else {
                $(".sub_chk").prop('checked',false);
            }
            });

            $('.delete_all').on('click', function(e) {

                var allVals = [];
                $(".sub_chk:checked").each(function() {
                    allVals.push($(this).attr('data-id'));
                });

                if(allVals.length <=0)
                {
                    alert("Please select row.");
                }  else {

                    var check = confirm("Belgilangan qatorlarni o'chirishga ishonchingiz komilmi?");
                    if(check == true){

                        var join_selected_values = allVals.join(",");

                        $.ajax({
                            url: $(this).data('url'),
                            type: 'DELETE',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: 'ids='+join_selected_values,
                            success: function (data) {
                                if (data['success']) {
                                    $(".sub_chk:checked").each(function() {
                                        $(this).parents("tr").remove();
                                    });
                                    alert(data['success']);
                                } else if (data['error']) {
                                    alert(data['error']);
                                } else {
                                    alert('Whoops Something went wrong!!');
                                }
                            },
                            error: function (data) {
                                alert(data.responseText);
                            }
                        });

                    $.each(allVals, function( index, value ) {
                        $('table tr').filter("[data-row-id='" + value + "']").remove();
                    });
                    }
                }
            });


            $(document).on('confirm', function (e) {
                var ele = e.target;
                e.preventDefault();

                $.ajax({
                    url: ele.href,
                    type: 'DELETE',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function (data) {
                        if (data['success']) {
                            $("#" + data['tr']).slideUp("slow");
                            alert(data['success']);
                        } else if (data['error']) {
                            alert(data['error']);
                        } else {
                            alert('Whoops Something went wrong!!');
                        }
                    },
                    error: function (data) {
                        alert(data.responseText);
                    }
                });

                return false;
            });

        });
    });
    </script> --}}
{{-- @endsection --}}
