@extends('layouts.app')
@section('content')



<body>

    @include('inc.profileheader')

    <!-- Start User Settings -->
    <section class="user-setting pb-60">
        <div class="container">

            @include('inc.profilelinks')

            <div class="row" id="tabs">
                <div class="col-lg-3">
                    <div class="options-sidebar">
                      <ul>
                      <h4 class="text-uppercase pt-20 pb-20">Pengaturan Profil</h4>
                        <li><a href="#tabs-1">Informasi Pribadi</a></li>
                        <li><a href="#tabs-2">Profile</a></li>
                        <!-- <li><a href="#tabs-3">Email Settings</a></li>
                        <li><a href="#tabs-4">Saved Credit Card</a></li> -->
                        <li><a href="#tabs-5">Akun Sosial Media</a></li>
                      </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div id="tabs-1">
                        <div class="settings-content">
                            <h4>Informasi Identitas</h4>
                            <form method="POST" action="{{ action('UserController@storePersonal', $userinfo->id) }}" class="billing-form">
                                @csrf
                                {{ method_field('PUT') }}

                                <div class="row pt-10">
                                    <div class="col-lg-6">
                                        <input type="text" name="fname" placeholder="First name*" onfocus="this.placeholder=''" onblur="this.placeholder = 'First name*'" value="{{ $userinfo->fname }}" required class="common-input">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="lname" placeholder="Last name*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Last name*'" value="{{ $userinfo->lname }}" required class="common-input">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="companyname" placeholder="Company Name" onfocus="this.placeholder=''" onblur="this.placeholder = 'Company Name'" value="{{ $userinfo->companyname }}" required class="common-input">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="phone" placeholder="Phone number*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Phone number*'" value="{{ $userinfo->phone }}" required class="common-input">
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="sorting">
                                            <select name="role">
                                                <option value="">Select Tipe Akun</option>
                                                <?php if (!empty($userinfo->role)): ?>
                                                    <option selected value="{{ $userinfo->role }}"><?php if($userinfo->role == 2){ echo "Buyer";}else if($userinfo->role == 3){ echo "Seller";}else if($userinfo->role == 4){ echo "Buyer & Seller"; }else{ echo "Admin";} ?></option>
                                                <?php endif; ?>
                                                <option value="2">Buyer</option>
                                                <option value="3">Seller</option>
                                                <option value="4">Buyer & Seller</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="sorting">
                                            <select name="country">
                                                <option value="">Select Country</option>
                                                <?php if (!empty($userinfo->country)): ?>
                                                    <option selected value="{{ $userinfo->country }}">{{ $userinfo->country }}</option>
                                                <?php endif; ?>
                                                <option value="Afghanistan">Afghanistan</option>
                                                <option value="Albania">Albania</option>
                                                <option value="Algeria">Algeria</option>
                                                <option value="American Samoa">American Samoa</option>
                                                <option value="Andorra">Andorra</option>
                                                <option value="Angola">Angola</option>
                                                <option value="Anguilla">Anguilla</option>
                                                <option value="Antartica">Antarctica</option>
                                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                <option value="Argentina">Argentina</option>
                                                <option value="Armenia">Armenia</option>
                                                <option value="Aruba">Aruba</option>
                                                <option value="Australia">Australia</option>
                                                <option value="Austria">Austria</option>
                                                <option value="Azerbaijan">Azerbaijan</option>
                                                <option value="Bahamas">Bahamas</option>
                                                <option value="Bahrain">Bahrain</option>
                                                <option value="Bangladesh">Bangladesh</option>
                                                <option value="Barbados">Barbados</option>
                                                <option value="Belarus">Belarus</option>
                                                <option value="Belgium">Belgium</option>
                                                <option value="Belize">Belize</option>
                                                <option value="Benin">Benin</option>
                                                <option value="Bermuda">Bermuda</option>
                                                <option value="Bhutan">Bhutan</option>
                                                <option value="Bolivia">Bolivia</option>
                                                <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                                                <option value="Botswana">Botswana</option>
                                                <option value="Bouvet Island">Bouvet Island</option>
                                                <option value="Brazil">Brazil</option>
                                                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                <option value="Bulgaria">Bulgaria</option>
                                                <option value="Burkina Faso">Burkina Faso</option>
                                                <option value="Burundi">Burundi</option>
                                                <option value="Cambodia">Cambodia</option>
                                                <option value="Cameroon">Cameroon</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Cape Verde">Cape Verde</option>
                                                <option value="Cayman Islands">Cayman Islands</option>
                                                <option value="Central African Republic">Central African Republic</option>
                                                <option value="Chad">Chad</option>
                                                <option value="Chile">Chile</option>
                                                <option value="China">China</option>
                                                <option value="Christmas Island">Christmas Island</option>
                                                <option value="Cocos Islands">Cocos (Keeling) Islands</option>
                                                <option value="Colombia">Colombia</option>
                                                <option value="Comoros">Comoros</option>
                                                <option value="Congo">Congo</option>
                                                <option value="Congo">Congo, the Democratic Republic of the</option>
                                                <option value="Cook Islands">Cook Islands</option>
                                                <option value="Costa Rica">Costa Rica</option>
                                                <option value="Cota D'Ivoire">Cote d'Ivoire</option>
                                                <option value="Croatia">Croatia (Hrvatska)</option>
                                                <option value="Cuba">Cuba</option>
                                                <option value="Cyprus">Cyprus</option>
                                                <option value="Czech Republic">Czech Republic</option>
                                                <option value="Denmark">Denmark</option>
                                                <option value="Djibouti">Djibouti</option>
                                                <option value="Dominica">Dominica</option>
                                                <option value="Dominican Republic">Dominican Republic</option>
                                                <option value="East Timor">East Timor</option>
                                                <option value="Ecuador">Ecuador</option>
                                                <option value="Egypt">Egypt</option>
                                                <option value="El Salvador">El Salvador</option>
                                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                <option value="Eritrea">Eritrea</option>
                                                <option value="Estonia">Estonia</option>
                                                <option value="Ethiopia">Ethiopia</option>
                                                <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
                                                <option value="Faroe Islands">Faroe Islands</option>
                                                <option value="Fiji">Fiji</option>
                                                <option value="Finland">Finland</option>
                                                <!-- <option value="France">France</option>
                                                <option value="France Metropolitan">France, Metropolitan</option>
                                                <option value="French Guiana">French Guiana</option>
                                                <option value="French Polynesia">French Polynesia</option>
                                                <option value="French Southern Territories">French Southern Territories</option> -->
                                                <option value="Gabon">Gabon</option>
                                                <option value="Gambia">Gambia</option>
                                                <option value="Georgia">Georgia</option>
                                                <option value="Germany">Germany</option>
                                                <option value="Ghana">Ghana</option>
                                                <option value="Gibraltar">Gibraltar</option>
                                                <option value="Greece">Greece</option>
                                                <option value="Greenland">Greenland</option>
                                                <option value="Grenada">Grenada</option>
                                                <option value="Guadeloupe">Guadeloupe</option>
                                                <option value="Guam">Guam</option>
                                                <option value="Guatemala">Guatemala</option>
                                                <option value="Guinea">Guinea</option>
                                                <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                <option value="Guyana">Guyana</option>
                                                <option value="Haiti">Haiti</option>
                                                <option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
                                                <option value="Holy See">Holy See (Vatican City State)</option>
                                                <option value="Honduras">Honduras</option>
                                                <option value="Hong Kong">Hong Kong</option>
                                                <option value="Hungary">Hungary</option>
                                                <option value="Iceland">Iceland</option>
                                                <option value="India">India</option>
                                                <option value="Indonesia">Indonesia</option>
                                                <option value="Iran">Iran (Islamic Republic of)</option>
                                                <option value="Iraq">Iraq</option>
                                                <option value="Ireland">Ireland</option>
                                                <option value="Israel">Israel</option>
                                                <option value="Italy">Italy</option>
                                                <option value="Jamaica">Jamaica</option>
                                                <option value="Japan">Japan</option>
                                                <option value="Jordan">Jordan</option>
                                                <option value="Kazakhstan">Kazakhstan</option>
                                                <option value="Kenya">Kenya</option>
                                                <option value="Kiribati">Kiribati</option>
                                                <option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
                                                <option value="Korea">Korea, Republic of</option>
                                                <option value="Kuwait">Kuwait</option>
                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                <option value="Lao">Lao People's Democratic Republic</option>
                                                <option value="Latvia">Latvia</option>
                                                <option value="Lebanon">Lebanon</option>
                                                <option value="Lesotho">Lesotho</option>
                                                <option value="Liberia">Liberia</option>
                                                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                <option value="Liechtenstein">Liechtenstein</option>
                                                <option value="Lithuania">Lithuania</option>
                                                <option value="Luxembourg">Luxembourg</option>
                                                <option value="Macau">Macau</option>
                                                <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
                                                <option value="Madagascar">Madagascar</option>
                                                <option value="Malawi">Malawi</option>
                                                <option value="Malaysia">Malaysia</option>
                                                <option value="Maldives">Maldives</option>
                                                <option value="Mali">Mali</option>
                                                <option value="Malta">Malta</option>
                                                <option value="Marshall Islands">Marshall Islands</option>
                                                <option value="Martinique">Martinique</option>
                                                <option value="Mauritania">Mauritania</option>
                                                <option value="Mauritius">Mauritius</option>
                                                <option value="Mayotte">Mayotte</option>
                                                <option value="Mexico">Mexico</option>
                                                <option value="Micronesia">Micronesia, Federated States of</option>
                                                <option value="Moldova">Moldova, Republic of</option>
                                                <option value="Monaco">Monaco</option>
                                                <option value="Mongolia">Mongolia</option>
                                                <option value="Montserrat">Montserrat</option>
                                                <option value="Morocco">Morocco</option>
                                                <option value="Mozambique">Mozambique</option>
                                                <option value="Myanmar">Myanmar</option>
                                                <option value="Namibia">Namibia</option>
                                                <option value="Nauru">Nauru</option>
                                                <option value="Nepal">Nepal</option>
                                                <option value="Netherlands">Netherlands</option>
                                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                <option value="New Caledonia">New Caledonia</option>
                                                <option value="New Zealand">New Zealand</option>
                                                <option value="Nicaragua">Nicaragua</option>
                                                <option value="Niger">Niger</option>
                                                <option value="Nigeria">Nigeria</option>
                                                <option value="Niue">Niue</option>
                                                <option value="Norfolk Island">Norfolk Island</option>
                                                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                <option value="Norway">Norway</option>
                                                <option value="Oman">Oman</option>
                                                <option value="Pakistan">Pakistan</option>
                                                <option value="Palau">Palau</option>
                                                <option value="Panama">Panama</option>
                                                <option value="Papua New Guinea">Papua New Guinea</option>
                                                <option value="Paraguay">Paraguay</option>
                                                <option value="Peru">Peru</option>
                                                <option value="Philippines">Philippines</option>
                                                <option value="Pitcairn">Pitcairn</option>
                                                <option value="Poland">Poland</option>
                                                <option value="Portugal">Portugal</option>
                                                <option value="Puerto Rico">Puerto Rico</option>
                                                <option value="Qatar">Qatar</option>
                                                <option value="Reunion">Reunion</option>
                                                <option value="Romania">Romania</option>
                                                <option value="Russia">Russian Federation</option>
                                                <option value="Rwanda">Rwanda</option>
                                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                <option value="Saint LUCIA">Saint LUCIA</option>
                                                <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
                                                <option value="Samoa">Samoa</option>
                                                <option value="San Marino">San Marino</option>
                                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                <option value="Senegal">Senegal</option>
                                                <option value="Seychelles">Seychelles</option>
                                                <option value="Sierra">Sierra Leone</option>
                                                <option value="Singapore">Singapore</option>
                                                <option value="Slovakia">Slovakia (Slovak Republic)</option>
                                                <option value="Slovenia">Slovenia</option>
                                                <option value="Solomon Islands">Solomon Islands</option>
                                                <option value="Somalia">Somalia</option>
                                                <option value="South Africa">South Africa</option>
                                                <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
                                                <option value="Span">Spain</option>
                                                <option value="SriLanka">Sri Lanka</option>
                                                <option value="St. Helena">St. Helena</option>
                                                <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
                                                <option value="Sudan">Sudan</option>
                                                <option value="Suriname">Suriname</option>
                                                <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
                                                <option value="Swaziland">Swaziland</option>
                                                <option value="Sweden">Sweden</option>
                                                <option value="Switzerland">Switzerland</option>
                                                <option value="Syria">Syrian Arab Republic</option>
                                                <option value="Taiwan">Taiwan, Province of China</option>
                                                <option value="Tajikistan">Tajikistan</option>
                                                <option value="Tanzania">Tanzania, United Republic of</option>
                                                <option value="Thailand">Thailand</option>
                                                <option value="Togo">Togo</option>
                                                <option value="Tokelau">Tokelau</option>
                                                <option value="Tonga">Tonga</option>
                                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                <option value="Tunisia">Tunisia</option>
                                                <option value="Turkey">Turkey</option>
                                                <option value="Turkmenistan">Turkmenistan</option>
                                                <option value="Turks and Caicos">Turks and Caicos Islands</option>
                                                <option value="Tuvalu">Tuvalu</option>
                                                <option value="Uganda">Uganda</option>
                                                <option value="Ukraine">Ukraine</option>
                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="United States">United States</option>
                                                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                <option value="Uruguay">Uruguay</option>
                                                <option value="Uzbekistan">Uzbekistan</option>
                                                <option value="Vanuatu">Vanuatu</option>
                                                <option value="Venezuela">Venezuela</option>
                                                <option value="Vietnam">Viet Nam</option>
                                                <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                                                <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
                                                <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
                                                <option value="Western Sahara">Western Sahara</option>
                                                <option value="Yemen">Yemen</option>
                                                <option value="Yugoslavia">Yugoslavia</option>
                                                <option value="Zambia">Zambia</option>
                                                <option value="Zimbabwe">Zimbabwe</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <input type="text" name="address1" placeholder="Address line 01*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Address line 01*'" value="{{ $userinfo->address1 }}" required class="common-input">
                                    </div>
                                    <div class="col-lg-12">
                                        <input type="text" name="address2" placeholder="Address line 02*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Address line 02*'" value="{{ $userinfo->address2 }}" required class="common-input">
                                    </div>
                                    <div class="col-lg-12">
                                        <input type="text" name="town" placeholder="Town/City*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Town/City*'" value="{{ $userinfo->town }}" required class="common-input">
                                    </div>
                                    <div class="col-lg-12">
                                        <input type="text" name="district" placeholder="District *" onfocus="this.placeholder=''" onblur="this.placeholder = 'District*'" value="{{ $userinfo->district }}" required class="common-input">
                                    </div>
                                    <div class="col-lg-12 text-right">
                                        <input type="text" name="postcode" placeholder="Postcode/ZIP" onfocus="this.placeholder=''" onblur="this.placeholder = 'Postcode/ZIP'"  value="{{ $userinfo->postcode }}" class="common-input">
                                    </div>
                                    <div class="col-lg-12 text-right">
                                        <!-- <textarea name="description" onfocus="this.placeholder=''" onblur="this.placeholder = 'Description'"  class="common-input">{!! $userinfo->description !!}</textarea> -->
                                        <button type="submit" class="primary-btn">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="tabs-2">
                       <div class="settings-content">
                            <h4>Avatar</h4>
                            <form method="POST" action="{{ action('UserController@storeAvatar', $userinfo->id) }}" class="billing-form" enctype="multipart/form-data">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="d-flex align-items-center avatar-wrap">
                                    <div class="avatar-thumb mr-20">
                                        <?php if($userinfo->avatar){ ?>
                                            <img class="img-60" src="{{ URL::asset('images/profile/' . $userinfo->avatar)}}" alt="Photo">
                                        <?php } else{ ?>
                                            <img class="img-60" src="{{ URL::asset('images/default.png')}}" alt="Photo">
                                        <?php } ?>
                                    </div>
                                    <div class="upload-fleid">
                                        <p>Upload avatar</p>
                                        <div class="input-group input-file">
                                            <input name="avatar" class="form-control" type="file">
                                        </div>
                                        <p>JPEG 150x150PX</p>
                                    </div>
                                </div>
                                <div class="text-right mt-20">
                                    <button type="submit" class="primary-btn">Simpan</button>
                                </div>
                            </form>


                            <h4 class="mt-20">Foto Sampul</h4>
                            <form method="POST" action="{{ action('UserController@storeCover', $userinfo->id) }}" class="billing-form" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                                <?php if($userinfo->avatar){ ?>
                                    <img class="img-fluid" src="{{ URL::asset('images/profile/' . $userinfo->cover)}}" alt="Photo">
                                <?php } else{ ?>
                                    <img class="img-fluid" src="{{ URL::asset('images/default-cover.jpg')}}" alt="Photo">
                                <?php } ?>
                                <div class="d-flex mt-20">
                                    <div class="upload-fleid">
                                        <p>Upload foto</p>
                                        <div class="input-group input-file">
                                            <input name="cover" class="form-control" type="file">
                                        </div>
                                        <p>JPEG 910x450PX</p>
                                    </div>
                                </div>
                                <div class="text-right mt-20">
                                    <button type="submit" class="primary-btn">Simpan</button>
                                </div>
                            </form>

                            <h4>Deskripsi Profil</h4>
                            <form method="POST" action="{{ action('UserController@storeProfileDescription', $userinfo->id) }}" class="billing-form">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="row pt-10">
                                    <div class="col-lg-12">
                                        <textarea name="description" onfocus="this.placeholder=''" onblur="this.placeholder = 'Description'"  class="common-input mb-20">{!! $userinfo->description !!}</textarea>
                                    </div>
                                    <div class="col-lg-12 text-right mt-20">
                                        <button type="submit" class="primary-btn">Simpan</button>
                                    </div>
                                </div>
                            </form>
                       </div>
                    </div>
                    <!-- <div id="tabs-3">
                        <div class="settings-content email-settings">
                            <h4>Email Settings</h4>
                            <form novalidate method="POST" action="{{ action('UserController@storeEmail', $userinfo->id) }}" class="billing-form">
                                @csrf
                                {{ method_field('PUT') }}

                                    <label class="checkbox-wrap">
                                        <span>Rating</span>
                                        <input name="noti_rating" type="checkbox" @php echo ( $userinfo->noti_rating == 'on') ? "checked" : '' @endphp >
                                        <span class="checkmark"></span>
                                    </label>
                                    <p>
                                        Send an email reminding me to rate an item a week after purchase
                                    </p>
                                    <label class="checkbox-wrap">
                                        <span>Item update notifications</span>
                                        <input name="noti_itemupdate"  type="checkbox" @php echo ( $userinfo->noti_itemupdate == 'on') ? "checked" : '' @endphp>
                                        <span class="checkmark"></span>
                                    </label>
                                    <p>
                                        Send an email when an item I've purchased is updated
                                    </p>
                                    <label class="checkbox-wrap">
                                      <span>Pemberitahuan komentar produk</span>
                                        <input name="noti_itemcomment"  type="checkbox" @php echo ( $userinfo->noti_itemcomment == 'on') ? "checked" : '' @endphp>
                                        <span class="checkmark"></span>
                                    </label>
                                    <p>
                                        Send me an email when someone comments on one of my items
                                    </p>
                                    <label class="checkbox-wrap">
                                      <span>Pemberitahuan komentar tim</span>
                                        <input name="noti_teamcomment"  type="checkbox" @php echo ( $userinfo->noti_teamcomment == 'on') ? "checked" : '' @endphp>
                                        <span class="checkmark"></span>
                                    </label>
                                    <p>
                                        Send me an email when my items are approved or rejected
                                    </p>
                                    <label class="checkbox-wrap">
                                      <span>Daily summary emails</span>
                                        <input name="noti_dailysummary"  type="checkbox" @php echo ( $userinfo->noti_dailysummary == 'on') ? "checked" : '' @endphp>
                                        <span class="checkmark"></span>
                                    </label>
                                    <p>
                                        Send me an email when someone leaves a review with their rating
                                    </p>
                                    <label class="checkbox-wrap">
                                        <span>Item review notifications</span>
                                        <input name="noti_itemreview"  type="checkbox" @php echo ( $userinfo->noti_itemreview == 'on') ? "checked" : '' @endphp>
                                        <span class="checkmark"></span>
                                    </label>
                                    <p>
                                        Send me emails showing my soon to expire support entitlements
                                    </p>
                                    <label class="checkbox-wrap">
                                        <span>Buyer review notifications</span>
                                        <input name="noti_buyerreview" type="checkbox" @php echo ( $userinfo->noti_buyerreview == 'on') ? "checked" : '' @endphp>
                                        <span class="checkmark"></span>
                                    </label>
                                    <p>
                                        Kirimi saya ringkasan harian dari semua item yang disetujui atau ditolak
                                    </p>
                                    <label class="checkbox-wrap">
                                        <span>Expiring support notifications</span>
                                        <input name="noti_expiring" type="checkbox" @php echo ( $userinfo->noti_expiring == 'on') ? "checked" : '' @endphp>
                                        <span class="checkmark"></span>
                                    </label>
                                    <p>
                                        Send an email when an item I've purchased is updated
                                    </p>
                                    <div class="text-right">
                                        <button type="submit" class="primary-btn">Simpan</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                    <div id="tabs-4">
                        <div class="settings-content">
                            <h4>Credit Card</h4>
                            <div class="d-flex justify-content-between align-items-center credit-card-detials">
                                <div class="card-thumb">
                                    <img class="img-fluid" src="img/credit-card.jpg" alt="">
                                </div>
                                <div class="card-detials">
                                  <table class="table">
                                    <tbody>
                                      <tr>
                                        <td class="title">Card Number</td>
                                        <td>: @php if(!empty($userinfo->card_number)){ echo $userinfo->card_number; }else{ echo "  N/A";} @endphp</td>
                                      </tr>
                                      <tr>
                                        <td class="title">Card Holder Name</td>
                                        <td>: @php if(!empty($userinfo->card_holder)){ echo $userinfo->card_holder; }else{ echo "  N/A";} @endphp</td>
                                      </tr>
                                      <tr>
                                        <td class="title">Expire Date</td>
                                        <td>: @php if(!empty($userinfo->card_expire)){ echo $userinfo->card_expire; }else{ echo "  N/A";} @endphp</td>
                                      </tr>
                                      <tr>
                                        <td class="title">Card CVV</td>
                                        <td>: @php if(!empty($userinfo->card_cvv)){ echo $userinfo->card_cvv; }else{ echo "  N/A";} @endphp</td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                                <div class="btns">
                                    <form method="POST" action="{{ action('UserController@storeCard', $userinfo->id) }}" class="billing-form">
                                        @csrf
                                        {{ method_field('PUT') }}
                                        <button type="submit" class="primary-btn color-red">Delete Card</button>
                                    </form>
                                </div>
                            </div>
                            <h4 class="mt-30">Add/Edit Credit Card</h4>
                            <form method="POST" action="{{ action('UserController@storeCard', $userinfo->id) }}" class="billing-form">
                                @csrf
                                {{ method_field('PUT') }}

                                <div class="row">
                                    <div class="col-lg-6">
                                        <input name="card_number" placeholder="Card Number *" onfocus="this.placeholder=''" onblur="this.placeholder = 'Card Number *'" required class="common-input" type="text">
                                    </div>
                                    <div class="col-lg-6">
                                        <input name="card_holder" placeholder="Card Holder Name *" onfocus="this.placeholder=''" onblur="this.placeholder = 'Card Holder Name *'" required class="common-input" type="text">
                                    </div>
                                    <div class="col-lg-6">
                                        <input name="card_expire" placeholder="Expire Date *" onfocus="this.placeholder=''" onblur="this.placeholder = 'Expire Date *'" required class="common-input" type="text">
                                    </div>
                                    <div class="col-lg-6">
                                        <input name="card_cvv" placeholder="Card CVV Number *" onfocus="this.placeholder=''" onblur="this.placeholder = 'Card CVV Number *'" required class="common-input" type="text">
                                        <div class="btns text-right">
                                            <button type="submit" class="primary-btn">Update Credit Card</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> -->
                    <div id="tabs-5">
                        <div class="settings-content social-settings">
                            <h4>Akun Sosial Media</h4>
                            <form method="POST" action="{{ action('UserController@storeSocial', $userinfo->id) }}" class="billing-form">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <i class="social-icon be fa fa-behance" aria-hidden="true"></i>
                                            <input name="social_behance" type="text" class="form-control" value="{{ $userinfo->social_behance }}" placeholder="Behance username" onfocus="this.placeholder=''" onblur="this.placeholder = 'Behance username'" >
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <i class="social-icon digg fa fa-digg" aria-hidden="true"></i>
                                            <input name="social_digg" type="text" class="form-control"  value="{{ $userinfo->social_digg }}" placeholder="Digg username" onfocus="this.placeholder=''" onblur="this.placeholder = 'Digg username'" >
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <i class="social-icon fb fa fa-facebook" aria-hidden="true"></i>
                                            <input name="social_facebook" type="text" class="form-control"  value="{{ $userinfo->social_facebook }}" placeholder="Facebook username" onfocus="this.placeholder=''" onblur="this.placeholder = 'Facebook username'" >
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <i class="social-icon git fa fa-github" aria-hidden="true"></i>
                                            <input name="social_github" type="text" class="form-control"  value="{{ $userinfo->social_github }}" placeholder="Github username" onfocus="this.placeholder=''" onblur="this.placeholder = 'Github username'" >
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <i class="social-icon lf fa fa-lastfm" aria-hidden="true"></i>
                                            <input name="social_lastfm" type="text" class="form-control"  value="{{ $userinfo->social_lastfm }}" placeholder="Lastfm username" onfocus="this.placeholder=''" onblur="this.placeholder = 'Lastfm username'" >
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <i class="social-icon ri fa fa-reddit-alien" aria-hidden="true"></i>
                                            <input name="social_reddit" type="text" class="form-control" value="{{ $userinfo->social_reddit }}" placeholder="Reddit username" onfocus="this.placeholder=''" onblur="this.placeholder = 'Reddit username'" >
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <i class="social-icon th fa fa-tumblr" aria-hidden="true"></i>
                                            <input name="social_thumblr" type="text" class="form-control"  value="{{ $userinfo->social_tumblr }}" placeholder="Thumblr username" onfocus="this.placeholder=''" onblur="this.placeholder = 'Thumblr username'" >
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <i class="social-icon vi fa fa-vimeo" aria-hidden="true"></i>
                                            <input name="social_vimeo" type="text" class="form-control" value="{{ $userinfo->social_vimeo }}" placeholder="Vimeo username" onfocus="this.placeholder=''" onblur="this.placeholder = 'Vimeo username'" >
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <i class="social-icon dv fa fa-deviantart" aria-hidden="true"></i>
                                            <input name="social_devianart" type="text" class="form-control" value="{{ $userinfo->social_devianart }}" placeholder="Devianart username" onfocus="this.placeholder=''" onblur="this.placeholder = 'Devianart username'" >
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <i class="social-icon dr fa fa-dribbble" aria-hidden="true"></i>
                                            <input name="social_dribble" type="text" class="form-control" value="{{ $userinfo->social_dribble }}" placeholder="Dribble username" onfocus="this.placeholder=''" onblur="this.placeholder = 'Dribble username'" >
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <i class="social-icon fl fa fa-flickr" aria-hidden="true"></i>
                                            <input name="social_flickr" type="text" class="form-control" value="{{ $userinfo->social_flickr }}" placeholder="Flickr username" onfocus="this.placeholder=''" onblur="this.placeholder = 'Flickr username'" >
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <i class="social-icon gp fa fa-google-plus" aria-hidden="true"></i>
                                            <input name="social_google" type="text" class="form-control" value="{{ $userinfo->social_google }}" placeholder="Google plus username" onfocus="this.placeholder=''" onblur="this.placeholder = 'Google plus username'" >
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <i class="social-icon li fa fa-linkedin" aria-hidden="true"></i>
                                            <input name="social_linkedin" type="text" class="form-control" value="{{ $userinfo->social_linkedin }}" placeholder="Linkedin username" onfocus="this.placeholder=''" onblur="this.placeholder = 'Linkedin username'" >
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <i class="social-icon sc fa fa-soundcloud" aria-hidden="true"></i>
                                            <input name="social_soundcloud" type="text" class="form-control" value="{{ $userinfo->social_soundcloud }}" placeholder="Soundcloud username" onfocus="this.placeholder=''" onblur="this.placeholder = 'Soundcloud username'" >
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <i class="social-icon tw fa fa-twitter" aria-hidden="true"></i>
                                            <input name="social_twitter" type="text" class="form-control" value="{{ $userinfo->social_twitter }}" placeholder="Twitter username" onfocus="this.placeholder=''" onblur="this.placeholder = 'Twitter username'" >
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <i class="social-icon yt fa fa-youtube-play" aria-hidden="true"></i>
                                            <input name="social_youtube" type="text" class="form-control" value="{{ $userinfo->social_youtube }}" placeholder="Youtube username" onfocus="this.placeholder=''" onblur="this.placeholder = 'Youtube username'" >
                                        </div>
                                        <div class="btns text-right">
                                            <button type="submit" class="primary-btn">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End User Settings -->


    <!-- Start counter-section -->
    @include('inc.fcounterblue')
    <!-- End counter-section -->


@endsection
