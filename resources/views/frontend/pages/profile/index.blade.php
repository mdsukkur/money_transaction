@php
    use App\Helpers\CountryLists;
    use App\Helpers\StateLists;
@endphp

@extends('frontend.master')

@section('title', 'Profile')

@push('css')
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/daterangepicker.css') }}">
@endpush

@section('content')
    <div class="container py-4">
        <div class="row">

            @include('response.index')

            @include('frontend.partial_views.user.user_profile_info')

            <div class="col-lg-9">

                <!--============================== Personal Details ==============================-->
                <div class="bg-white shadow-sm rounded p-4 mb-4">
                    <h3 class="text-5 font-weight-400 d-flex align-items-center mb-4">{{ trans('lang.per_details') }}
                        <a href="#edit-personal-details" data-toggle="modal"
                           class="ml-auto text-2 text-uppercase btn-link">
                            <span class="mr-1"><i class="fas fa-edit"></i></span>{{ trans('lang.edit') }}</a></h3>
                    <hr class="mx-n4 mb-4">
                    <div class="form-row align-items-center">
                        <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">{{ trans('lang.name') }}:</p>
                        <p class="col-sm-9 text-3">{{ auth()->user()->first_name ." ". auth()->user()->last_name }}</p>
                    </div>

                    @if(!is_null(auth()->user()->birth_date))
                        <div class="form-row align-items-center">
                            <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">
                                {{ trans('lang.birth_date') }}:</p>
                            <p class="col-sm-9 text-3">{{ date('d-m-Y', strtotime(auth()->user()->birth_date)) }}</p>
                        </div>
                    @endif

                    <div class="form-row align-items-baseline">
                        <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">{{ trans('lang.address') }}:</p>
                        <p class="col-sm-9 text-3">
                            @if(!empty(auth()->user()->address) && !empty(auth()->user()->city))
                                {{ auth()->user()->address }},<br>
                                {{ auth()->user()->city }},<br>
                                {{ StateLists::getAllStates(auth()->user()->state) ." - " .auth()->user()->zip_code }},
                                <br>
                            @endif

                            {{ CountryLists::getAllCountries(auth()->user()->country) }}.</p>
                    </div>
                </div>

                <div id="edit-personal-details" class="modal fade " role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-400">{{ trans('lang.per_details') }}</h5>
                                <button type="button" class="close font-weight-400" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body p-4">
                                <form id="personaldetails" action="{{ route('user.profile.request') }}" method="post">
                                    @csrf

                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="firstName">{{ trans('form.fname') }}</label>

                                                <input type="text" value="{{ auth()->user()->first_name ?? null }}"
                                                       class="form-control" name="first_name"
                                                       id="firstName" required placeholder="{{ trans('form.fname') }}">
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="fullName">{{ trans('form.lname') }}</label>

                                                <input type="text" value="{{ auth()->user()->last_name ?? null }}"
                                                       class="form-control" name="last_name"
                                                       id="fullName" required placeholder="{{ trans('form.lname') }}">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="birthDate">{{ trans('form.birth_date') }}</label>

                                                <div class="position-relative">
                                                    <input id="birthDate" class="form-control" name="birth_date"
                                                           required
                                                           value="{{ !is_null(auth()->user()->birth_date) ? date('m-d-Y', strtotime(auth()->user()->birth_date)) : '' }}"
                                                           type="text" placeholder="{{ trans('form.birth_date') }}">
                                                    <span class="icon-inside"><i class="fas fa-calendar-alt"></i></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="address">{{ trans('form.address') }}</label>

                                                <input type="text" value="{{ auth()->user()->address ?? null }}"
                                                       required class="form-control" id="address" name="address"
                                                       placeholder="{{ trans('form.address') }}">
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="city">{{ trans('form.city') }}</label>

                                                <input id="city" value="{{ auth()->user()->city ?? null }}" type="text"
                                                       class="form-control" required name="city"
                                                       placeholder="{{ trans('form.city') }}">
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="input-zone">{{ trans('form.state') }}</label>

                                                <select class="custom-select" id="input-zone" name="state">

                                                    @foreach(StateLists::getAllStates() as $key => $value)
                                                        <option value="{{ $key }}"
                                                        @if($key == (auth()->user()->state ?? null)) {{ 'selected' }} @endif>
                                                            {{ $value }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="zipCode">{{ trans('form.zip') }}</label>

                                                <input id="zipCode" value="{{ auth()->user()->zip_code ?? null }}"
                                                       type="text" class="form-control" name="zip_code"
                                                       required placeholder="{{ trans('form.zip') }}">
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="inputCountry">{{ trans('form.country') }}</label>

                                                <select class="custom-select" id="inputCountry" name="country">

                                                    @foreach(CountryLists::getAllCountries() as $key => $value)
                                                        <option value="{{ $key }}"
                                                        @if($key == auth()->user()->country) {{ 'selected' }} @endif>
                                                            {{ $value }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary btn-block mt-2" type="submit">
                                        {{ trans('form.save_changes') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--============================== Personal Details End ==============================-->

                <!--============================== Contract Information ==============================-->
                <div class="bg-white shadow-sm rounded p-4 mb-4">
                    <h3 class="text-5 font-weight-400 d-flex align-items-center mb-4">{{ trans('lang.con_details') }}
                        <a href="#edit-email" data-toggle="modal" class="ml-auto text-2 text-uppercase btn-link">
                            <span class="mr-1"><i class="fas fa-edit"></i></span>{{ trans('lang.edit') }}</a></h3>
                    <hr class="mx-n4 mb-4">
                    <div class="form-row align-items-center">
                        <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">{{ trans('lang.email_id') }}:</p>
                        <p class="col-sm-9 text-3">{{ auth()->user()->email }}</p>
                    </div>
                    <div class="form-row align-items-center">
                        <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">{{ trans('lang.phone') }}:</p>
                        <p class="col-sm-9 text-3">{{ auth()->user()->phone }}</p>
                    </div>
                </div>

                <div id="edit-email" class="modal fade " role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-400">{{ trans('lang.con_details') }}</h5>
                                <button type="button" class="close font-weight-400" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body p-4">
                                <form id="emailAddresses" method="post" action="{{ route('user.profile.request') }}">
                                    @csrf

                                    <div class="form-group">
                                        <label for="email">{{ trans('form.email') }}</label>
                                        <input type="email" value="{{ auth()->user()->email }}" class="form-control"
                                               id="email" required placeholder="{{ trans('form.email') }}" name="email">
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">{{ trans('form.phone') }}</label>
                                        <input type="tel" value="{{ auth()->user()->phone }}" class="form-control"
                                               id="phone" required placeholder="{{ trans('form.phone') }}" name="phone">
                                    </div>

                                    <button class="btn btn-primary btn-block" type="submit">
                                        {{ trans('form.save_changes') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--============================== Contract Information End ==============================-->

                <!--=============================== Change Password ===============================-->
                <div class="bg-white shadow-sm rounded p-4 mb-4">
                    <h3 class="text-5 font-weight-400 d-flex align-items-center mb-4">{{ trans('lang.change_password') }}
                        <a href="#change-password" data-toggle="modal" class="ml-auto text-2 text-uppercase btn-link">
                            <span class="mr-1"><i class="fas fa-edit"></i></span>{{ trans('lang.change') }}</a></h3>
                    <hr class="mx-n4 mb-4">
                    <p class="text-3">{{ trans('lang.pass_create') }} - <span class="text-muted">{{ trans('lang.last_changed') }}:
                            {{ date('d M, Y', strtotime(auth()->user()->last_password_changed ?? auth()->user()->created_at)) }}</span>
                    </p>
                </div>

                <div id="change-password" class="modal fade " role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-400">Change Password</h5>
                                <button type="button" class="close font-weight-400" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body p-4">
                                <form id="changePassword" method="post" action="{{ route('user.password.update') }}">
                                    @csrf

                                    <div class="form-group">
                                        <label for="existingPassword">{{ trans('form.crnt_password') }}</label>
                                        <input type="password" class="form-control" name="current_password" autofocus
                                               id="existingPassword" required placeholder="{{ trans('form.crnt_password') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="newPassword">{{ trans('form.new_password') }}</label>
                                        <input type="password" class="form-control" name="password"
                                               id="newPassword" required placeholder="{{ trans('form.new_password') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="confirmPassword">{{ trans('form.con_new_password') }}</label>
                                        <input type="password" class="form-control" name="password_confirmation" required
                                               id="confirmPassword" placeholder="{{ trans('form.con_new_password') }}">
                                    </div>

                                    <button class="btn btn-primary btn-block mt-4" type="submit">
                                        {{ trans('form.update_password') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--=============================== Change Password End ===============================-->

                <!--================================ Bank Accounts ================================-->
                <div class="bg-white shadow-sm rounded p-4 mb-4">
                    <h3 class="text-5 font-weight-400 mb-4">{{ trans('lang.bank_info') }}
                        <span class="text-muted text-4">{{ trans('lang.bank_info_purpose') }}</span></h3>
                    <hr class="mb-4 mx-n4">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="account-card account-card-primary text-white rounded mb-4 mb-lg-0">
                                <div class="row no-gutters">
                                    <div class="col-3 d-flex justify-content-center p-3">
                                        <div class="my-auto text-center"><span class="text-13"><i
                                                    class="fas fa-university"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-9 border-left">
                                        <div class="py-4 my-2 pl-4">
                                            <p class="text-4 font-weight-500 mb-1">HDFC Bank</p>
                                            <p class="text-4 opacity-9 mb-1">XXXXXXXXXXXX-9025</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-card-overlay rounded"><a href="#"
                                                                             data-target="#bank-account-details"
                                                                             data-toggle="modal"
                                                                             class="text-light btn-link mx-2"><span
                                            class="mr-1"><i class="fas fa-share"></i></span>More Details</a> <a href="#"
                                                                                                                class="text-light btn-link mx-2"><span
                                            class="mr-1"><i class="fas fa-minus-circle"></i></span>Delete</a></div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6"><a href="" data-target="#add-new-bank-account" data-toggle="modal"
                                                        class="account-card-new d-flex align-items-center rounded h-100 p-3 mb-4 mb-lg-0">
                                <p class="w-100 text-center line-height-4 m-0"><span class="text-3"><i
                                            class="fas fa-plus-circle"></i></span> <span
                                        class="d-block text-body text-3">Add New Bank Account</span></p>
                            </a></div>
                    </div>
                </div>

                <div id="bank-account-details" class="modal fade" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered transaction-details" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="row no-gutters">
                                    <div class="col-sm-5 d-flex justify-content-center bg-primary rounded-left py-4">
                                        <div class="my-auto text-center">
                                            <div class="text-17 text-white mb-3"><i class="fas fa-university"></i></div>
                                            <h3 class="text-6 text-white my-3">HDFC Bank</h3>
                                            <div class="text-4 text-white my-4">XXX-9027 | US</div>
                                            <p class="badge badge-light text-0 font-weight-500 rounded-pill px-2 mb-0">
                                                Primary</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <h5 class="text-5 font-weight-400 m-3">Bank Account Details
                                            <button type="button" class="close font-weight-400" data-dismiss="modal"
                                                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </h5>
                                        <hr>
                                        <div class="px-3">
                                            <ul class="list-unstyled">
                                                <li class="font-weight-500">Account Type:</li>
                                                <li class="text-muted">Personal</li>
                                            </ul>
                                            <ul class="list-unstyled">
                                                <li class="font-weight-500">Account Name:</li>
                                                <li class="text-muted">Smith Rhodes</li>
                                            </ul>
                                            <ul class="list-unstyled">
                                                <li class="font-weight-500">Account Number:</li>
                                                <li class="text-muted">XXXXXXXXXXXX-9025</li>
                                            </ul>
                                            <ul class="list-unstyled">
                                                <li class="font-weight-500">Bank Country:</li>
                                                <li class="text-muted">India</li>
                                            </ul>
                                            <ul class="list-unstyled">
                                                <li class="font-weight-500">Status:</li>
                                                <li class="text-muted">Approved <span class="text-success text-3"><i
                                                            class="fas fa-check-circle"></i></span></li>
                                            </ul>
                                            <p><a href="#"
                                                  class="btn btn-sm btn-outline-danger btn-block shadow-none"><span
                                                        class="mr-1"><i class="fas fa-minus-circle"></i></span>Delete
                                                    Account</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="add-new-bank-account" class="modal fade" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-400">Add bank account</h5>
                                <button type="button" class="close font-weight-400" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body p-4">
                                <form id="addbankaccount" method="post">
                                    <div class="mb-3">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input id="personal" name="bankAccountType" class="custom-control-input"
                                                   checked="" required type="radio">
                                            <label class="custom-control-label" for="personal">Personal</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input id="business" name="bankAccountType" class="custom-control-input"
                                                   required type="radio">
                                            <label class="custom-control-label" for="business">Business</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputCountry">Bank Country</label>
                                        <select class="custom-select" id="inputCountry" disabled name="country_id">
                                            <option value=""> --- Please Select ---</option>
                                            <option value="244">Aaland Islands</option>
                                            <option value="1">Afghanistan</option>
                                            <option value="2">Albania</option>
                                            <option value="3">Algeria</option>
                                            <option value="4">American Samoa</option>
                                            <option value="5">Andorra</option>
                                            <option value="6">Angola</option>
                                            <option value="7">Anguilla</option>
                                            <option value="8">Antarctica</option>
                                            <option value="9">Antigua and Barbuda</option>
                                            <option value="10">Argentina</option>
                                            <option value="11">Armenia</option>
                                            <option value="12">Aruba</option>
                                            <option value="252">Ascension Island (British)</option>
                                            <option value="13">Australia</option>
                                            <option value="14">Austria</option>
                                            <option value="15">Azerbaijan</option>
                                            <option value="16">Bahamas</option>
                                            <option value="17">Bahrain</option>
                                            <option value="18">Bangladesh</option>
                                            <option value="19">Barbados</option>
                                            <option value="20">Belarus</option>
                                            <option value="21">Belgium</option>
                                            <option value="22">Belize</option>
                                            <option value="23">Benin</option>
                                            <option value="24">Bermuda</option>
                                            <option value="25">Bhutan</option>
                                            <option value="26">Bolivia</option>
                                            <option value="245">Bonaire, Sint Eustatius and Saba</option>
                                            <option value="27">Bosnia and Herzegovina</option>
                                            <option value="28">Botswana</option>
                                            <option value="29">Bouvet Island</option>
                                            <option value="30">Brazil</option>
                                            <option value="31">British Indian Ocean Territory</option>
                                            <option value="32">Brunei Darussalam</option>
                                            <option value="33">Bulgaria</option>
                                            <option value="34">Burkina Faso</option>
                                            <option value="35">Burundi</option>
                                            <option value="36">Cambodia</option>
                                            <option value="37">Cameroon</option>
                                            <option value="38">Canada</option>
                                            <option value="251">Canary Islands</option>
                                            <option value="39">Cape Verde</option>
                                            <option value="40">Cayman Islands</option>
                                            <option value="41">Central African Republic</option>
                                            <option value="42">Chad</option>
                                            <option value="43">Chile</option>
                                            <option value="44">China</option>
                                            <option value="45">Christmas Island</option>
                                            <option value="46">Cocos (Keeling) Islands</option>
                                            <option value="47">Colombia</option>
                                            <option value="48">Comoros</option>
                                            <option value="49">Congo</option>
                                            <option value="50">Cook Islands</option>
                                            <option value="51">Costa Rica</option>
                                            <option value="52">Cote D'Ivoire</option>
                                            <option value="53">Croatia</option>
                                            <option value="54">Cuba</option>
                                            <option value="246">Curacao</option>
                                            <option value="55">Cyprus</option>
                                            <option value="56">Czech Republic</option>
                                            <option value="237">Democratic Republic of Congo</option>
                                            <option value="57">Denmark</option>
                                            <option value="58">Djibouti</option>
                                            <option value="59">Dominica</option>
                                            <option value="60">Dominican Republic</option>
                                            <option value="61">East Timor</option>
                                            <option value="62">Ecuador</option>
                                            <option value="63">Egypt</option>
                                            <option value="64">El Salvador</option>
                                            <option value="65">Equatorial Guinea</option>
                                            <option value="66">Eritrea</option>
                                            <option value="67">Estonia</option>
                                            <option value="68">Ethiopia</option>
                                            <option value="69">Falkland Islands (Malvinas)</option>
                                            <option value="70">Faroe Islands</option>
                                            <option value="71">Fiji</option>
                                            <option value="72">Finland</option>
                                            <option value="74">France, Metropolitan</option>
                                            <option value="75">French Guiana</option>
                                            <option value="76">French Polynesia</option>
                                            <option value="77">French Southern Territories</option>
                                            <option value="126">FYROM</option>
                                            <option value="78">Gabon</option>
                                            <option value="79">Gambia</option>
                                            <option value="80">Georgia</option>
                                            <option value="81">Germany</option>
                                            <option value="82">Ghana</option>
                                            <option value="83">Gibraltar</option>
                                            <option value="84">Greece</option>
                                            <option value="85">Greenland</option>
                                            <option value="86">Grenada</option>
                                            <option value="87">Guadeloupe</option>
                                            <option value="88">Guam</option>
                                            <option value="89">Guatemala</option>
                                            <option value="256">Guernsey</option>
                                            <option value="90">Guinea</option>
                                            <option value="91">Guinea-Bissau</option>
                                            <option value="92">Guyana</option>
                                            <option value="93">Haiti</option>
                                            <option value="94">Heard and Mc Donald Islands</option>
                                            <option value="95">Honduras</option>
                                            <option value="96">Hong Kong</option>
                                            <option value="97">Hungary</option>
                                            <option value="98">Iceland</option>
                                            <option selected="selected" value="99">India</option>
                                            <option value="100">Indonesia</option>
                                            <option value="101">Iran (Islamic Republic of)</option>
                                            <option value="102">Iraq</option>
                                            <option value="103">Ireland</option>
                                            <option value="254">Isle of Man</option>
                                            <option value="104">Israel</option>
                                            <option value="105">Italy</option>
                                            <option value="106">Jamaica</option>
                                            <option value="107">Japan</option>
                                            <option value="257">Jersey</option>
                                            <option value="108">Jordan</option>
                                            <option value="109">Kazakhstan</option>
                                            <option value="110">Kenya</option>
                                            <option value="111">Kiribati</option>
                                            <option value="113">Korea, Republic of</option>
                                            <option value="253">Kosovo, Republic of</option>
                                            <option value="114">Kuwait</option>
                                            <option value="115">Kyrgyzstan</option>
                                            <option value="116">Lao People's Democratic Republic</option>
                                            <option value="117">Latvia</option>
                                            <option value="118">Lebanon</option>
                                            <option value="119">Lesotho</option>
                                            <option value="120">Liberia</option>
                                            <option value="121">Libyan Arab Jamahiriya</option>
                                            <option value="122">Liechtenstein</option>
                                            <option value="123">Lithuania</option>
                                            <option value="124">Luxembourg</option>
                                            <option value="125">Macau</option>
                                            <option value="127">Madagascar</option>
                                            <option value="128">Malawi</option>
                                            <option value="129">Malaysia</option>
                                            <option value="130">Maldives</option>
                                            <option value="131">Mali</option>
                                            <option value="132">Malta</option>
                                            <option value="133">Marshall Islands</option>
                                            <option value="134">Martinique</option>
                                            <option value="135">Mauritania</option>
                                            <option value="136">Mauritius</option>
                                            <option value="137">Mayotte</option>
                                            <option value="138">Mexico</option>
                                            <option value="139">Micronesia, Federated States of</option>
                                            <option value="140">Moldova, Republic of</option>
                                            <option value="141">Monaco</option>
                                            <option value="142">Mongolia</option>
                                            <option value="242">Montenegro</option>
                                            <option value="143">Montserrat</option>
                                            <option value="144">Morocco</option>
                                            <option value="145">Mozambique</option>
                                            <option value="146">Myanmar</option>
                                            <option value="147">Namibia</option>
                                            <option value="148">Nauru</option>
                                            <option value="149">Nepal</option>
                                            <option value="150">Netherlands</option>
                                            <option value="151">Netherlands Antilles</option>
                                            <option value="152">New Caledonia</option>
                                            <option value="153">New Zealand</option>
                                            <option value="154">Nicaragua</option>
                                            <option value="155">Niger</option>
                                            <option value="156">Nigeria</option>
                                            <option value="157">Niue</option>
                                            <option value="158">Norfolk Island</option>
                                            <option value="112">North Korea</option>
                                            <option value="159">Northern Mariana Islands</option>
                                            <option value="160">Norway</option>
                                            <option value="161">Oman</option>
                                            <option value="162">Pakistan</option>
                                            <option value="163">Palau</option>
                                            <option value="247">Palestinian Territory, Occupied</option>
                                            <option value="164">Panama</option>
                                            <option value="165">Papua New Guinea</option>
                                            <option value="166">Paraguay</option>
                                            <option value="167">Peru</option>
                                            <option value="168">Philippines</option>
                                            <option value="169">Pitcairn</option>
                                            <option value="170">Poland</option>
                                            <option value="171">Portugal</option>
                                            <option value="172">Puerto Rico</option>
                                            <option value="173">Qatar</option>
                                            <option value="174">Reunion</option>
                                            <option value="175">Romania</option>
                                            <option value="176">Russian Federation</option>
                                            <option value="177">Rwanda</option>
                                            <option value="178">Saint Kitts and Nevis</option>
                                            <option value="179">Saint Lucia</option>
                                            <option value="180">Saint Vincent and the Grenadines</option>
                                            <option value="181">Samoa</option>
                                            <option value="182">San Marino</option>
                                            <option value="183">Sao Tome and Principe</option>
                                            <option value="184">Saudi Arabia</option>
                                            <option value="185">Senegal</option>
                                            <option value="243">Serbia</option>
                                            <option value="186">Seychelles</option>
                                            <option value="187">Sierra Leone</option>
                                            <option value="188">Singapore</option>
                                            <option value="189">Slovak Republic</option>
                                            <option value="190">Slovenia</option>
                                            <option value="191">Solomon Islands</option>
                                            <option value="192">Somalia</option>
                                            <option value="193">South Africa</option>
                                            <option value="194">South Georgia &amp; South Sandwich Islands</option>
                                            <option value="248">South Sudan</option>
                                            <option value="195">Spain</option>
                                            <option value="196">Sri Lanka</option>
                                            <option value="249">St. Barthelemy</option>
                                            <option value="197">St. Helena</option>
                                            <option value="250">St. Martin (French part)</option>
                                            <option value="198">St. Pierre and Miquelon</option>
                                            <option value="199">Sudan</option>
                                            <option value="200">Suriname</option>
                                            <option value="201">Svalbard and Jan Mayen Islands</option>
                                            <option value="202">Swaziland</option>
                                            <option value="203">Sweden</option>
                                            <option value="204">Switzerland</option>
                                            <option value="205">Syrian Arab Republic</option>
                                            <option value="206">Taiwan</option>
                                            <option value="207">Tajikistan</option>
                                            <option value="208">Tanzania, United Republic of</option>
                                            <option value="209">Thailand</option>
                                            <option value="210">Togo</option>
                                            <option value="211">Tokelau</option>
                                            <option value="212">Tonga</option>
                                            <option value="213">Trinidad and Tobago</option>
                                            <option value="255">Tristan da Cunha</option>
                                            <option value="214">Tunisia</option>
                                            <option value="215">Turkey</option>
                                            <option value="216">Turkmenistan</option>
                                            <option value="217">Turks and Caicos Islands</option>
                                            <option value="218">Tuvalu</option>
                                            <option value="219">Uganda</option>
                                            <option value="220">Ukraine</option>
                                            <option value="221">United Arab Emirates</option>
                                            <option value="222">United Kingdom</option>
                                            <option value="223">United States</option>
                                            <option value="224">United States Minor Outlying Islands</option>
                                            <option value="225">Uruguay</option>
                                            <option value="226">Uzbekistan</option>
                                            <option value="227">Vanuatu</option>
                                            <option value="228">Vatican City State (Holy See)</option>
                                            <option value="229">Venezuela</option>
                                            <option value="230">Viet Nam</option>
                                            <option value="231">Virgin Islands (British)</option>
                                            <option value="232">Virgin Islands (U.S.)</option>
                                            <option value="233">Wallis and Futuna Islands</option>
                                            <option value="234">Western Sahara</option>
                                            <option value="235">Yemen</option>
                                            <option value="238">Zambia</option>
                                            <option value="239">Zimbabwe</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="bankName">Bank Name</label>
                                        <select class="custom-select" id="bankName" name="bankName">
                                            <option value=""> Please Select</option>
                                            <option value="1">Bank Name 1</option>
                                            <option value="2">Bank Name 2</option>
                                            <option value="3">Bank Name 3</option>
                                            <option value="4">Bank Name 4</option>
                                            <option value="5">Bank Name 5</option>
                                            <option value="6">Bank Name 6</option>
                                            <option value="7">Bank Name 7</option>
                                            <option value="8">Bank Name 8</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="accountName">Account Name</label>
                                        <input type="text" class="form-control" data-bv-field="accountName"
                                               id="accountName" required value="" placeholder="e.g. Smith Rhodes">
                                    </div>
                                    <div class="form-group">
                                        <label for="accountNumber">Account Number</label>
                                        <input type="text" class="form-control" data-bv-field="accountNumber"
                                               id="accountNumber" required value="" placeholder="e.g. 12346678900001">
                                    </div>
                                    <div class="form-group">
                                        <label for="ifscCode">NEFT IFSC Code</label>
                                        <input type="text" class="form-control" data-bv-field="ifscCode" id="ifscCode"
                                               required value="" placeholder="e.g. ABCDE12345">
                                    </div>
                                    <div class="form-check custom-control custom-checkbox mb-3">
                                        <input id="remember-me" name="remember" class="custom-control-input"
                                               type="checkbox">
                                        <label class="custom-control-label" for="remember-me">I confirm the bank account
                                            details above</label>
                                    </div>
                                    <button class="btn btn-primary btn-block" type="submit">Add Bank Account</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--================================ Bank Accounts End ================================-->

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('frontend_assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('frontend_assets/js/daterangepicker.js') }}"></script>
    <script>
        $(function () {
            'use strict';

            $('#birthDate').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                autoUpdateInput: false,
                maxDate: moment().add(0, 'days'),
            }, function (chosen_date) {
                $('#birthDate').val(chosen_date.format('YYYY-MM-DD'));
            });
        });
    </script>
@endpush
