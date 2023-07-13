@extends('forthebuilder::layouts.forthebuilder')
@php
    use Modules\ForTheBuilder\Entities\House;
    use Modules\ForTheBuilder\Entities\HouseFlat;
@endphp
@section('title')
    {{ translate('JK') }}
@endsection
<style>
    .sozdatJkData {
        height: auto !important;
    }
</style>
@section('content')
    <div class="d-flex aad">
        @include('forthebuilder::layouts.content.navigation')
        <div class="mainMargin">
            @include('forthebuilder::layouts.content.header')

            <div class="d-flex justify-content-between">
                <div class="d-flex">
                    <a href="{{ route('forthebuilder.deal.index') }}" class="plus2 profileMaxNazadInformatsiyaKlient">
                        <img src="{{ asset('backend-assets/forthebuilders/images/icons/arrow-left.png') }}" alt="">
                    </a>
                    <h2 class="panelUprText">{{ translate('Sale') }}</h2>
                </div>
            </div>

            <div class="sozdatJkData">
                <form id="deal-create-form" action="{{ route('forthebuilder.deal.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex justify-content-between">
                        <div>
                            <h3 class="prodnoDataH5Text">{{ translate('Description of the object') }}</h3>
                            <div class="form-group">
                                <h3 class="sozdatImyaSpisokH3Prodno">{{ translate('jk') }}</h3>
                                <select
                                    class="form-control sozdatImyaSpisokSelectOptionJkProdno deal_create_house_id @error('house_id') is-invalid error-data-input @enderror"
                                    readonly id="exampleFormControlSelect1" name="house_id">
                                    {{-- <option value="default">-----------------</option> --}}
                                    @if (!empty($houses))
                                        @foreach ($houses as $house)
                                            @if (isset(request()->house_id) && $house->id == request()->house_id)
                                                <option value="{{ $house->id }}">
                                                    {{ $house->name }} {{ $house->description }}
                                                </option>
                                            @endif

                                            {{-- @if (isset(request()->house_id) && $house->id == request()->house_id)
                                                <option value="{{ $house->id }}" selected>
                                                    {{ $house->name }} {{ $house->description }}
                                                </option>
                                            @else
                                                <option value="{{ $house->id }}" selected>
                                                    {{ $house->name }} {{ $house->description }}
                                                </option>
                                            @endif --}}
                                        @endforeach
                                    @endif
                                </select>
                                <span class="error-data">
                                    @error('house_id')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="form-group">
                                <h3 class="sozdatImyaSpisokH3Prodno">{{ translate('Apartment No.') }}</h3>
                                <input type="text" name="house_flat_number"
                                    class="form-control sozdatImyaSpisokSelectOptionJkProdno"
                                    value="{{ request()->house_flat_number }}">
                                <span class="error-data">
                                    @error('house_flat_number')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="sozdatImyaSpsok">
                                <h3 class="sozdatImyaSpisokH3Prodno">{{ translate('description') }}</h3>
                                <input type="text" name="description"
                                    class="sozdatImyaSpisokInputProdnoBig form-control @error('description') error-data-input is-invalid @enderror"
                                    id="description"
                                    placeholder="{{ translate('Brief description of the residential complex') }}"
                                    value="{{ old('description') }}">
                                <span class="error-data">
                                    @error('description')
                                        {{ $messager }}
                                    @enderror
                                </span>
                            </div>

                            <div class="displayNoneProdnoMobile">
                                <div class="form-group">
                                    <h3 class="sozdatImyaSpisokH3Prodno">{{ translate('Contract number') }}
                                    </h3>
                                    <input type="text" name="agreement_number"
                                        class="form-control sozdatImyaSpisokSelectOptionJkProdno select2 @error('agreement_number') is-invalid error-data-input @enderror">
                                    {{--  . '/' . date('d-m') --}}
                                    <span class="error-data">
                                        @error('agreement_number')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group" style="margin-left: 10px;">
                                    <h3 class="sozdatImyaSpisokH3Prodno">{{ translate('date') }}</h3>
                                    <input id="dateInput" placeholder="{{ date('d.m.Y') }}" type="date" name="date_deal"
                                        class="form-control sozdatImyaSpisokSelectOptionJkProdnoDate @error('date_deal') error-data-input is-invalid @enderror"
                                        value="{{ old('date_deal') }}">
                                    <span class="error-data">
                                        @error('date_deal')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <h3 class="prodnoDataH5Text">{{ translate('Passport data of the client') }}</h3>

                            <div class="sozdatImyaSpsok">
                                <h3 class="sozdatImyaSpisokH3Prodno">{{ translate('First name') }}</h3>
                                <input
                                    class="sozdatImyaSpisokInputProdnoBig form-control keyUpName booking-first_name @error('first_name') error-data-input is-invalid @enderror"
                                    type="text" name="first_name" value="{{ old('first_name') }}">
                                <div class="keyUpNameResult d-none"
                                    style="width: 65%; background: lightgrey; max-height: 220px; position: absolute; margin-top: 75px; overflow: scroll; border-radius: 15px;">
                                </div>
                                <span class="error-data">
                                    @error('first_name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <input type="hidden" name="client_id" class="booking-client_id" id="">
                            <div class="sozdatImyaSpsok">
                                <h3 class="sozdatImyaSpisokH3Prodno">{{ translate('Last name') }}</h3>
                                <input
                                    class="sozdatImyaSpisokInputProdnoBig keyUpName form-control booking-last_name @error('last_name') error-data-input is-invalid @enderror"
                                    type="text" name="last_name" value="{{ old('last_name') }}">
                                <div class="keyUpNameResult d-none"
                                    style="width: 65%; background: lightgrey; max-height: 220px; position: absolute; margin-top: 75px; overflow: scroll; border-radius: 15px;">
                                </div>
                                <span class="error-data">
                                    @error('last_name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="sozdatImyaSpsok">
                                <h3 class="sozdatImyaSpisokH3Prodno">{{ translate('Middle name') }}</h3>
                                <input
                                    class="sozdatImyaSpisokInputProdnoBig keyUpName booking-middle_name form-control @error('middle_name') error-data-input is-invalid @enderror"
                                    type="text" name="middle_name" value="{{ old('middle_name') }}">
                                <div class="keyUpNameResult d-none"
                                    style="width: 65%; background: lightgrey; max-height: 220px; position: absolute; margin-top: 75px; overflow: scroll; border-radius: 15px;">
                                </div>
                                <span class="error-data">
                                    @error('middle_name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="form-group">
                                <h3 class="sozdatImyaSpisokH3Prodno">{{ translate('Gender') }}</h3>
                                <select class="form-control sozdatImyaSpisokSelectOptionJkProdno"
                                    id="exampleFormControlSelect1" name="gender">
                                    <option value="1">{{ translate('Man') }}</option>
                                    <option value="0">{{ translate('Woman') }}</option>
                                </select>
                            </div>

                            <div class="sozdatImyaSpsok">
                                <h3 class="sozdatImyaSpisokH3Prodno">
                                    {{ translate('Birth date') }}</h3>
                                <input
                                    class="sozdatImyaSpisokInputProdnoBig form-control @error('birth_date') error-data-input is-invalid @enderror"
                                    value="{{ isset($clients) && $clients != 'NULL' ? $clients->birth_date : '', old('birth_date') }}" type="date" name="birth_date" id="birth_date">
                                <span class="error-data">
                                    @error('birth_date')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="sozdatImyaSpsok">
                                <h3 class="sozdatImyaSpisokH3Prodno">{{ translate('Serial number of the passport') }}</h3>
                                <input
                                    class="sozdatImyaSpisokInputProdnoBig keyUpName booking-series_number form-control @error('series_number') error-data-input is-invalid @enderror"
                                    type="text" name="series_number" value="{{ old('series_number') }}">
                                <div class="keyUpNameResult d-none"
                                    style="width: 65%; background: lightgrey; max-height: 220px; position: absolute; margin-top: 75px; overflow: scroll; border-radius: 15px;">
                                </div>
                                <span class="error-data">
                                    @error('series_number')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="sozdatImyaSpsok">
                                <h3 class="sozdatImyaSpisokH3Prodno">
                                    {{ translate('Issued by (Date of issue and expiration date)') }}</h3>
                                <input
                                    class="sozdatImyaSpisokInputProdnoBig booking-given_date form-control @error('given_date') error-data-input is-invalid @enderror"
                                    value="{{ old('given_date') }}" type="date" name="given_date" id="given_date">
                                <span class="error-data">
                                    @error('given_date')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="sozdatImyaSpsok">
                                <h3 class="sozdatImyaSpisokH3Prodno">
                                    {{ translate('Issued by') }}</h3>
                                <input
                                    class="sozdatImyaSpisokInputProdnoBig booking-issued_by form-control @error('issued_by') error-data-input is-invalid @enderror"
                                    value="{{ isset($clients) && $clients != 'NULL' ? $clients->informations->issued_by : '', old('issued_by') }}" type="text" name="issued_by" id="issued_by">
                                <span class="error-data">
                                    @error('issued_by')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="sozdatImyaSpsok">
                                <h3 class="sozdatImyaSpisokH3Prodno">{{ translate('Registration by passport') }}</h3>
                                <input
                                    class="sozdatImyaSpisokInputProdnoBig booking-live_address form-control @error('live_address') error-data-input is-invalid @enderror"
                                    value="{{ old('live_address') }}" type="text" name="live_address"
                                    id="live_address">
                                <span class="error-data">
                                    @error('live_address')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="sozdatImyaSpsok">
                                <h3 class="sozdatImyaSpisokH3Prodno">{{ translate('PINFL or TIN') }}</h3>
                                <input
                                    class="sozdatImyaSpisokInputProdnoBig booking-inn @error('inn') error-data-input is-invalid @enderror"
                                    value="{{ old('inn') }}" type="text" name="inn" id="inn">
                                <span class="error-data">
                                    @error('inn')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <h3 class="prodnoDataH5Text">{{ translate('Contact details') }}</h3>

                            <div class="sozdatImyaSpsok">
                                <h3 class="sozdatImyaSpisokH3Prodno">{{ translate('Phone number') }}</h3>
                                <div class="d-flex">
                                    <div>
                                        <img style="width:70px" src="{{ asset('backend-assets/forthebuilders/images/kirgiz.jpg') }}" alt="Region">

                                        {{-- <img src="{{ asset('backend-assets/forthebuilders/images/region.png') }}"
                                            alt="Region"> --}}
                                    </div>
                                    <div>
                                        <label
                                            style="margin-bottom: -35px;z-index: 99;width: 50px;margin-left: 5px;margin-right: -55px;position: sticky;margin-top: 13px;padding-left: 6px;"
                                            for="+998">+996</label>
                                        <input type="hidden" name="phone_code" value="+998">
                                        <input
                                            class="sozdatImyaSpisokInputTel keyUpName booking-phone @error('phone') error-data-input is-invalid @enderror"
                                            type="tel" id="phone" name="phone_number"
                                            value="{{ old('phone_number') }}">
                                        {{-- pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" --}}
                                        <span class="error-data">
                                            @error('phone_number')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="sozdatImyaSpsok">
                                <h3 class="sozdatImyaSpisokH3Prodno">{{ translate('Additional phone number') }}</h3>
                                <div class="d-flex">
                                    <div>
                                        <img style="width:70px" src="{{ asset('backend-assets/forthebuilders/images/kirgiz.jpg') }}" alt="Region">

                                        {{-- <img src="{{ asset('backend-assets/forthebuilders/images/region.png') }}"
                                            alt="Region"> --}}
                                    </div>
                                    <div>
                                        <label
                                            style="margin-bottom: -35px;z-index: 99;width: 50px;margin-left: 5px;margin-right: -55px;position: sticky;margin-top: 13px;padding-left: 6px;"
                                            for="+998">+996</label>
                                        <input
                                            class="sozdatImyaSpisokInputTel keyUpName booking-additional_phone @error('additional_phone') error-data-input is-invalid @enderror"
                                            type="tel" id="phone" name="additional_phone"
                                            value="{{ old('additional_phone') }}">
                                        {{-- pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" --}}
                                    </div>
                                </div>
                            </div>

                            <div class="sozdatImyaSpsok">
                                <h3 class="sozdatImyaSpisokH3Prodno">{{ translate('Email address') }}</h3>
                                <input
                                    class="sozdatImyaSpisokInputProdnoBig booking-email form-control @error('email') error-data-input is-invalid @enderror"
                                    value="{{ old('email') }}" type="email" name="email" id="email">
                                <span class="error-data">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            {{-- <div class="d-flex">
                                <label class="login_file">
                                    <input class="login_file" type="file" style="display: none;">
                                    <div class="d-flex">
                                        <button class="dobavitFotoPolzovatel">+</button>
                                        <h5 class="dobavitFotoTextPolzovatel">Прикрепить файл</h5>
                                    </div>
                                </label>
                            </div> --}}
                            {{-- <h3 class="sozdatImyaSpisokH3Prodno">{{ translate('file__upload') }}</h3>
                            <input type="file" name="files[]" id="files" multiple> --}}

                            <div class="d-flex">
                                <label class="login_file">
                                    <input class="login_file" type="file" style="display: none;" name="files">
                                    <div class="d-flex">
                                        <button type="button"
                                            class="dobavitFotoPolzovatel btn btnDealCreateFile">+</button>
                                        <h5 class="dobavitFotoTextPolzovatel clickDealCreateFile">
                                            {{ translate('Attach file') }}</h5>
                                    </div>
                                </label>
                            </div>

                        </div>

                        <div class="d-flex prodnoRightImportData" style="margin-top: 40px;">
                            <div>
                                <div class="form-group">
                                    <h3 class="sozdatImyaSpisokH3Prodno">{{ translate('Registry number') }}</h3>
                                    <select
                                        class="form-control sozdatImyaSpisokSelectOptionJkProdno deal_create_registry_number @error('house_flat_id') error-data-input is-invalid @enderror"
                                        id="exampleFormControlSelect1" name="house_flat_id" readonly>
                                        {{-- <option value=" "> </option> --}}
                                        <option value="{{ request()->house_flat_id ?? '' }}">
                                            {{ request()->house_flat_number ?? '' }}</option>
                                    </select>
                                    <span class="error-data">
                                        @error('house_flat_id')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <input type="hidden" name="doc_number"
                                    value="{{ request()->house_flat_number ?? '' }}">

                                <div class="form-group" style="margin-right: 30px;">
                                    <h3 class="sozdatImyaSpisokH3Prodno">{{ translate('price') }}</h3>
                                    {{-- <input type="hidden" name="price_sell" id="price_sell"
                                        class="form-control @error('price_sell') error-data-input is-invalid @enderror"
                                        value="{{ old('price_sell') }}" step="0.01" min="0"> --}}
                                    <input type="text" name="price_sell"
                                        class="form-control sozdatImyaSpisokSelectOptionJkProdno dealCreatePrice @error('price_sell') error-data-input is-invalid @enderror"
                                        value="{{ request()->flat_price ?? old('price_sell') }}" step="0.01"
                                        min="0" original-price="{{ request()->flat_price ?? old('price_sell') }}">
                                    <span class="error-data">
                                        @error('price_sell')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group" style="margin-right: 30px;">
                                    <h3 class="sozdatImyaSpisokH3Prodno">{{ translate('Price m2') }}</h3>
                                    <input type="text" name="price_sell_m2" class="form-control sozdatImyaSpisokSelectOptionJkProdno dealCreatePriceM2 @error('price_sell_m2') error-data-input is-invalid @enderror" value="{{ request()->price_m2 ?? old('price_sell_m2') }}" step="0.01" min="0" original-price="{{ request()->price_m2 ?? old('price_sell_m2') }}">

                                    <span class="error-data">
                                        @error('price_sell')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <!-- <div class="form-group">
                                    <h3 class="sozdatImyaSpisokH3Prodno">{{ translate('Gender') }}</h3>
                                    <select class="form-control sozdatImyaSpisokSelectOptionJkProdno"
                                        id="exampleFormControlSelect1" name="gender">
                                        <option value="1">{{ translate('Man') }}</option>
                                        <option value="0">{{ translate('Woman') }}</option>
                                    </select>
                                </div> -->

                                <div class="form-group" style="margin-right: 30px; width: 250px;">
                                    <h3 class="sozdatImyaSpisokH3">{{ translate('Coupon') }}</h3>
                                    <input class="sozdatImyaSpisokInput" style="padding-right: 10px;" type="text"
                                        name="coupon" autocomplete="off" id="coupon-in-deal" value="">
                                    <span id="applied" style="color: green"></span>
                                    <input type="hidden" name="coupon_percent" id="coupon_percent">
                                    <button class="calculate_coupon_price d-none">Calculate Coupon Price</button>
                                </div>

                                <div>
                                    <div class="rassrochkaProdnoCheckBox7">
                                        <label class="d-flex flexDropdownRassrochka mt-1">
                                            <input class="rassrochkaProdnoCheck mt-2" type="checkbox"
                                                name="is_installment" id=""> {{ translate('Installment plan') }}
                                            <span class="error-data">
                                                @error('is_installment')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>

                                        <div id="noneDownDrop" class="noneDropDown">
                                            <div class="polniy_DropDown">
                                                <h3 class="sozdatImyaDropDowno">{{ translate('Installment period') }}</h3>
                                                <select class="form-control sozdatImyaSpisokDropDown selectPeriod"
                                                    id="exampleFormControlSelect1" name="period">
                                                    <option value=" "> </option>
                                                    @empty(!$installmentPlan)
                                                        @foreach ($installmentPlan as $val)
                                                            <option value="{{ $val->id }}"
                                                                data-percent="{{ $val->percent_type }}">{{ $val->period }}
                                                                {{ translate('month') }}</option>
                                                        @endforeach
                                                    @endempty
                                                    {{-- <option value="Apple">Apple</option> --}}
                                                </select>
                                            </div>

                                            <div class="polniy_DropDown d-none">
                                                <h3 class="sozdatImyaDropDowno">{{ translate('Installment percent') }}
                                                </h3>
                                                <select class="form-control sozdatImyaSpisokDropDown selectPercent"
                                                    id="exampleFormControlSelect1" name="percent">
                                                    <option value=" "> </option>
                                                    @empty(!$installmentPlan)
                                                        @foreach ($installmentPlan as $val)
                                                            <option value="{{ $val->id }}"
                                                                data-percent="{{ $val->percent_type }}">
                                                                {{ $val->percent_type }} %
                                                            </option>
                                                        @endforeach
                                                    @endempty
                                                    {{-- <option value="Apple">Apple</option> --}}
                                                </select>
                                            </div>

                                            <div class="polniy_DropDown">
                                                <h3 class="sozdatImyaDropDowno">{{ translate('An initial fee') }}</h3>
                                                <input class="form-control sozdatImyaSpisokDropDown initialFeeDeal"
                                                    type="text" name="initial_fee">
                                                <span class="error-data">
                                                    @error('initial_fee')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>

                                            <div class="polniy_DropDown">
                                                <h3 class="sozdatImyaDropDowno">{{ translate('Installment start date') }}
                                                </h3>
                                                <input id="dateInput3" class="form-control sozdatImyaSpisokDropDown"
                                                    type="date" name="installment_date" value="{{ date('Y-m-d'); }}">
                                                <span class="error-data">
                                                    @error('installment_date')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="form-group" style="margin-right: 30px;">
                                    <h3 class="sozdatImyaSpisokH3Prodno">{{ translate('price') }}</h3>
                                    <input type="hidden" name="price_sell" id="price_sell"
                                        class="form-control @error('price_sell') error-data-input is-invalid @enderror"
                                        value="{{ old('price_sell') }}" step="0.01" min="0">
                                    <input type="text" name="price_sell_commas"
                                        class="form-control sozdatImyaSpisokSelectOptionJkProdno @error('price_sell') error-data-input is-invalid @enderror"
                                        value="{{ old('price_sell') }}" step="0.01" min="0">
                                    <span class="error-data">
                                        @error('price_sell')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div> --}}
                            </div>

                            <div class="displayNoneProdno">
                                <div class="form-group">
                                    <h3 class="sozdatImyaSpisokH3Prodno">{{ translate('Contract number') }}</h3>
                                    <input type="text" class="form-control sozdatImyaSpisokSelectOptionJkProdno">
                                </div>

                                <div class="form-group">
                                    <h3 class="sozdatImyaSpisokH3Prodno">{{ translate('Date') }}</h3>
                                    <input id="dateInput" placeholder="{{ date('d.m.Y') }}" type="date"
                                        class="form-control sozdatImyaSpisokSelectOptionJkProdnoDate">
                                </div>
                            </div>
                        </div>
                    </div>

                    <label>{{ translate('Type of currency deal') }}</label>
                    <br>
                    <input type="radio" name="valuta" id="Som" value="1" checked> <label for="Som"> {{ translate('Som') }} </label>
                    <br>
                    <input type="radio" name="valuta" id="Dollar" value="0"> <label for="Dollar"> {{ translate('Dollar') }} </label>
                    <button type="submit" class="sozdatImyaSpisokSozdatButtonSave text-light saveDealDogovor" style="cursor: pointer; margin-top: 50px;">{{ translate('Save') }}</button>
                </form>
            </div>

        </div>
    </div>
     <script src="{{ asset('/backend-assets/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
     <script src="{{ asset('/backend-assets/plugins/jquery.maskedinput.min.js') }}"></script>
    <script>
        let page_name = 'deal';
    </script>
     <script>
        $(document).ready(function() {
            // $('#sent').datetimepicker({
            //     format: 'Y-M-D',
            // }); 
            $('input[type=tel]').mask("(999) 999-999");

            let sessionWarning = "{{ session('warning') }}";
            if (sessionWarning) {
                toastr.warning(sessionWarning)
            }
        });
    </script>
@endsection
{{-- @extends('forthebuilder::house.extra') --}}
