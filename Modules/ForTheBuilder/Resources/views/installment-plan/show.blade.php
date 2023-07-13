@extends('forthebuilder::layouts.forthebuilder')

@section('title')
    {{ translate('show') }}
@endsection

@php
    use Modules\ForTheBuilder\Entities\Constants;
@endphp
@section('styles')
    <link rel="stylesheet" href="{{ asset('/backend-assets/forthebuilders/datatables/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('/backend-assets/forthebuilders/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/backend-assets/forthebuilders/toastr/toastr.min.css') }}">
@endsection

@section('content')

    <div class="modal fade" id="modal-default-reduce" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <form class="modal-dialog" style="max-width: 500px" action="{{ route('forthebuilder.installment-plan.reduceSum') }}"
            method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header" style="padding:14px 34px 14px 84px">
                    <h4 class="modal-title">{{ translate('Cancel entered amount') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <input class="form-control install_id" type="hidden" name="id">
                            <input class="form-control payment_status" type="hidden" name="status">
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-end">
                        <div class="col-md-5">
                            <button type="submit" class="btn btn-success"
                                id="reduce_sum">{{ translate('Confirm') }}</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </form>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal-default-sum" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <form action="{{ route('forthebuilder.installment-plan.paySum') }}" class="modal-dialog" style="max-width: 500px"
            method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header" style="padding:14px 34px 14px 84px">
                    <h4 class="modal-title">{{ translate('Enter payment amount') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <input class="form-control" type="number" name="sum" step="0.01" min="0">
                            <input class="form-control payment_status" type="hidden" name="status">
                            <input class="form-control install_id" type="hidden" name="id">
                            <input class="form-control deal_id" type="hidden" name="deal_id">
                            <input class="form-control installment_plan_id" type="hidden" name="installment_plan_id">
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-end">
                        <div class="col-md-5">
                            <button type="submit" class="btn btn-success" id="payment_sum">{{ translate('Pay') }}</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </form>
        <!-- /.modal-dialog -->
    </div>

    <div class="d-flex aad">
        @include('forthebuilder::layouts.content.navigation')
        <div class="mainMargin">
            @include('forthebuilder::layouts.content.header')
            <div class="d-flex justify-content-between">
                <div class="d-flex">
                    <a href="{{ route('forthebuilder.installment-plan.index') }}"
                        class="plus2 profileMaxNazadInformatsiyaKlient"><img
                            src="{{ asset('/backend-assets/forthebuilders/images/icons/arrow-left.png') }}"
                            alt=""></a>
                    <h2 class="panelUprText">{{ translate('Installment plan') }}</h2>
                </div>
            </div>

            <div class="sozdatRassrochkaData">
                <div style="width: 100%;" class="d-flex">
                    <div>
                        {{--                        <a href="{{route('forthebuilder.exports.rassrochka', $model->id)}}" class="btn btn-secondary buttons-excel buttons-html5" tabindex="0" aria-controls="example1" type="button"> --}}
                        {{--                            <span>{{translate('Excel')}}</span> --}}
                        {{--                        </a> --}}
                        <div class="sozdatImyaSpsok">
                            <h3 class="sozdatImyaSpisokH3">{{ translate('Client full name') }}</h3>
                            <a href="{{ route('forthebuilder.clients.show', [$model->client->id, 0, 0]) }}" style="color: currentColor;">
                                <div class="sozdatImyaSpisokInput1272">
                                    {{ $model->client->first_name ?? '' }} {{ $model->client->last_name ?? '' }} {{ $model->client->middle_name ?? '' }}
                                </div>
                            </a>
                        </div>

                        <div class="d-flex">
                            <div class="lidiMarginRight1272">
                                <div class="sozdatImyaSpsok">
                                    <h3 class="sozdatImyaSpisokH3">{{ translate('Phone') }}</h3>
                                    <div class="sozdatImyaSpisokInputTel1272">{{ $model->client->phone ?? '' }}</div>

                                </div>

                                <div class="sozdatImyaSpsok">
                                    <h3 class="sozdatImyaSpisokH3">{{ translate('Email') }}</h3>
                                    <div class="sozdatImyaSpisokInputMail1272">{{ $model->client->email ?? '' }}</div>
                                </div>

                                <div class="sozdatImyaSpsok">
                                    <h3 class="sozdatImyaSpisokH3">{{ translate('Passport data') }}</h3>
                                    <div class="sozdatImyaSpisokInputPasport1272">
                                        {{ $model->client->informations->series_number ?? '' }}
                                    </div>
                                </div>
                                <div class="sozdatImyaSpsok">
                                    <h3 class="sozdatImyaSpisokH3">{{ translate('Contract start date') }}</h3>
                                    <div class="sozdatImyaSpisokInputPasport1272">
                                        {{ date('d.m.Y', strtotime($model->initial_fee_date)) }}</div>
                                </div>
                            </div>

                            <div class="lidiMarginRight1272">
                                <div class="sozdatImyaSpsok">
                                    <h3 class="sozdatImyaSpisokH3">{{ translate('Apartment') }}</h3>
                                    <div class="sozdatImyaSpisokInputKvartira1272">
                                        {{ $model->agreement_number ?? '' }}
                                    </div>
                                </div>

                                <div class="sozdatImyaSpsok">
                                    <h3 class="sozdatImyaSpisokH3">{{ translate('Transaction price') }}</h3>
                                    <div class="sozdatImyaSpisokInputPredoplata1272">
                                        {{ number_format($model->price_sell, 2, ',', '.') }}</div>

                                </div>

                                <div class="sozdatImyaSpsok">
                                    <h3 class="sozdatImyaSpisokH3RassrochkaSozdat">{{ translate('Down payment') }}</h3>
                                    <div class="sozdatImyaSpisokInputPredoplata1272">
                                        {{ number_format($model->initial_fee, 2, ',', '.') }}</div>
                                </div>

                                <div class="sozdatImyaSpsok">
                                    <h3 class="sozdatImyaSpisokH31272">{{ translate('Installment period') }} <br> <span
                                            class="sozdatImyaSpisokH31272mini">{{ translate('month') }}</span></h3>
                                    <div class="sozdatImyaSpisokInputKvartira1272">{{ $model->installmentPlan->period }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="margin-left: -100px;">
                        <p class="sozdatBronImya">{{ translate('Responsible') }}: <br>
                            {{ $model && $model->user ? $model->user->first_name . ' ' . $model->user->last_name . ' ' . $model->user->middle_name : '' }}
                        </p>
                        @php
                            $mainImg = "/backend-assets/forthebuilders/images/a6d5ae15f8f52bd6b9db53be7746c650 1.png";
                            if ($model->files) {
                                // $mainImg = asset('/uploads/deal/' . $model->id . '/m_' . $model->files[0]->guid);
                            }
                        @endphp
                        <img class="homeSozdatImage1272"
                            src="{{ $mainImg }}"
                            alt="House">
                    </div>
                    {{-- @dd($model->files[0]); --}}
                </div>
            </div>

            <div class="sozdatRassrochkaData1272">
                <div class="sozdatRassrochkaDataUae">
                    <div class="checkboxDivInput">
                        №
                    </div>
                    <div class="checkboxDivTextInput3565">
                        {{ translate('Status') }}
                    </div>
                    <div class="checkboxDivTextInput3565">
                        {{ translate('Sum') }}
                    </div>
                    <div class="checkboxDivTextInput3565">
                        {{ translate('Date must payment') }}
                    </div>
                    <div class="checkboxDivTextInput3565">
                        {{ translate('Date of payment') }}
                    </div>
                </div>
                @php
                    if (isset($model)) {
                        switch ($model->installmentPlan->period) {
                            case 12:
                                $pay_month = round(($model->price_sell - $model->initial_fee) / 12, 2, PHP_ROUND_HALF_UP);
                                break;
                            case 18:
                                $pay_month = round(($model->price_sell - $model->initial_fee) / 18, 2, PHP_ROUND_HALF_UP);
                                break;
                        }
                    }
                @endphp
                @empty(!$statuses)
                    @php $i=0; @endphp
                    @foreach ($statuses as $status)
                        @php
                            $i++;
                            $back_color = '';
                            $text_color = '';
                            $text = '';
                            $paid_sum = $status->sum ?? 0;
                        @endphp
                        <div class="sozdatRassrochkaDataUae2">
                            <div class="checkboxDivInput">
                                {{ $i }}
                            </div>
                            @php
                                if (isset($status)) {
                                    if ($status->status == Constants::NOT_PAID) {
                                        $back_color = '#FF9D9D';
                                        $text = translate('Not paid');
                                    } elseif ($status->status == Constants::PAID) {
                                        $back_color = '#B1FF9D';
                                        $text = translate('Paid');
                                    } else {
                                        $text_color = 'black';
                                        $back_color = '#F7FF9C';
                                        $text = translate('Partial payment');
                                    }
                                }
                            @endphp
                            <a data-content="{{ $i }}" class="plan_status_button checkboxDivTextInput3565"
                                style="background-color:{{ $back_color ?? 'red' }}; color:{{ $text_color ?? 'black' }}">{{ $text }}</a>
                            <div class="plan_status_content display-none" id="content_{{ $i }}"
                                style="color:{{ $text_color ?? 'black' }}; background-color: white; padding: 10 5; transform: scale(1.2);">
                                @if ($status->status != Constants::NOT_PAID)
                                    <a data-id="{{ $status->id }}" data-deal_id="{{ $status->deal_id }}"
                                        data-installment_plan_id="{{ $status->installment_plan_id }}" data-toggle="modal"
                                        data-target="#modal-default-reduce" data-val="{{ Constants::NOT_PAID }}"
                                        class="plan_status_not_paid"
                                        style="background-color: #FF9D9D; color:{{ $text_color ?? 'black' }}; margin-bottom: 5px; border-radius: 20px; border: 1px solid #94B2EB; height: 50px; display: flex; justify-content: center; align-items: center;">
                                        {{ translate('Cancel pay') }}
                                    </a>
                                @endif
                                @if ($status->status != Constants::PAID)
                                    <a data-id="{{ $status->id }}" data-deal_id="{{ $status->deal_id }}"
                                        data-installment_plan_id="{{ $status->installment_plan_id }}" data-toggle="modal"
                                        data-target="#modal-default-sum" data-val="{{ Constants::PAID }}"
                                        class="plan_status_paid"
                                        style="background-color:#B1FF9D; color:{{ $text_color ?? 'black' }}; margin-bottom: 5px; border-radius: 20px; border: 1px solid #94B2EB; height: 50px; display: flex; justify-content: center; align-items: center;">
                                        {{ translate('Paid') }}
                                    </a>
                                    <a data-id="{{ $status->id }}" data-deal_id="{{ $status->deal_id }}"
                                        data-installment_plan_id="{{ $status->installment_plan_id }}" data-toggle="modal"
                                        data-target="#modal-default-sum" data-val="{{ Constants::HALF_PAY }}"
                                        class="plan_status_part"
                                        style="background-color:#F7FF9C; color:{{ $text_color ?? 'black' }}; margin-bottom: 5px; border-radius: 20px; border: 1px solid #94B2EB; height: 50px; display: flex; justify-content: center; align-items: center;">
                                        {{ translate('Partial payment') }}
                                    </a>
                                @endif
                            </div>
                            <div class="checkboxDivTextInput3565">
                                {{ number_format(round($status->price_to_pay, 2, PHP_ROUND_HALF_UP), 2) }}
                            </div>
                            <div class="checkboxDivTextInput3565">
                                {{ $status->must_pay_date ? date('d.m.Y', strtotime($status->must_pay_date)) : '' }}
                            </div>
                            <div class="checkboxDivTextInput3565">
                                {{ $status->pay_date ? date('d.m.Y', strtotime($status->pay_date)) : '' }}
                            </div>
                        </div>
                    @endforeach
                @endempty
            </div>
        </div>
    </div>
@endsection
<script src="{{ asset('/backend-assets/forthebuilders/javascript/jquery-3.6.1.js') }}"></script>
<script>
    let page_name = 'installment-plan';
    $(document).ready(function() {
        $('.plan_status_button').on('click', function() {
            let content_id = $(this).data('content');
            let play_status_content = $('.plan_status_content')
            let play_status_array = Array.from(play_status_content)
            if ($('#content_' + content_id).hasClass('display-none')) {
                play_status_array.forEach(PlanStatus)
                $('#content_' + content_id).removeClass('display-none')
            } else {
                $('#content_' + content_id).addClass('display-none')
            }
        });

        function PlanStatus(item, index) {
            if (item.classList.contains('display-none') == false) {
                item.classList.add('display-none')
            }
        }
        $('.plan_status_paid').on('click', function() {
            $('.install_id').val($(this).data('id'))
            $('.payment_status').val($(this).data('val'))
            $('.deal_id').val($(this).data('deal_id'))
            $('.installment_plan_id').val($(this).data('installment_plan_id'))
        });
        $('.plan_status_not_paid').on('click', function() {
            $('.install_id').val($(this).data('id'))
            $('.payment_status').val($(this).data('val'))
            $('.deal_id').val($(this).data('deal_id'))
            $('.installment_plan_id').val($(this).data('installment_plan_id'))
        });
        $('.plan_status_part').on('click', function() {
            $('.install_id').val($(this).data('id'))
            $('.payment_status').val($(this).data('val'))
            $('.deal_id').val($(this).data('deal_id'))
            $('.installment_plan_id').val($(this).data('installment_plan_id'))
        });
    });
</script>
