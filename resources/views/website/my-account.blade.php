@extends("website.layouts.app")
@section("content")
 <!-- breadcrumb-area start -->
 <div class="breadcrumb-area">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 text-center">
                        <h2 class="breadcrumb-title">Account</h2>
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Account</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->
   <!-- account area start -->
   <div class="account-dashboard pt-100px pb-100px">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <!-- Nav tabs -->
                        <div class="dashboard_tab_button" data-aos="fade-up" data-aos-delay="0">
                            <ul role="tablist" class="nav flex-column dashboard-list">
                                <li><a href="#dashboard" data-bs-toggle="tab" class="nav-link active">Dashboard</a></li>
                                <li> <a href="#orders" data-bs-toggle="tab" class="nav-link">Orders</a></li>
                                <li><a href="#downloads" data-bs-toggle="tab" class="nav-link">authentication</a></li>
                                <li><a href="#address" data-bs-toggle="tab" class="nav-link">Addresses</a></li>
                                @if(Auth::user()->type == 'artist')
                                <li><a href="#products" data-bs-toggle="tab" class="nav-link">Products</a></li>
                                @endif
                                <li><a href="#account-details" data-bs-toggle="tab" class="nav-link">Account details</a>
                                </li>
                                <li><a href="{{route('logout')}}" class="nav-link">logout</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-9 col-lg-9">
                        <!-- Tab panes -->
                        <div class="tab-content dashboard_content" data-aos="fade-up" data-aos-delay="200">
                            <div class="tab-pane fade show active" id="dashboard">
                                <h4>Dashboard </h4>
                                <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent
                                        orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">Edit your password and account details.</a></p>
                            </div>
                            <div class="tab-pane fade" id="orders">
                                <h4>Orders</h4>
                                <div class="table_page table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Order</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orders as $index=>$order)
                                            <tr>
                                                <td>{{$index + 1 }}</td>
                                                <td>{{$order->created_at}}</td>
                                                @if($order->status == 1)
                                                <td><span class="success">Completed</span></td>
                                                @else
                                                <td><span >Processing</span></td>
                                                @endif

                                                <td>EGP {{$order->total_price}} for {{$order->products->count()}} item </td>
                                                <td><a href="{{route('cart.items')}}" class="view">view</a></td>
                                            </tr>
                                           @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                                <div class="tab-pane fade" id="downloads">
                                    <h4>Change Password</h4>
                                    <div class="login">
                                    <div class="login_form_container">
                                    @include('website.partials._sessions')
                                        <div class="account_login_form">
                                            <form action="{{route('account.dashboard.change_password')}}" method="post">
                                            @csrf
                                                <p>Already have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#loginActive">Log in instead!</a></p>
                                                 <br>
                                                 @include('website.partials._errors')
                                                 <div class="default-form-box mb-20">
                                                    <label>Old Password</label>
                                                    <input type="password" name="old_password">
                                                </div>
                                                <div class="default-form-box mb-20">
                                                    <label>New Password</label>
                                                    <input type="password" name="new_password" >
                                                </div>

                                               <div class="default-form-box mb-20">
                                                    <label>Password Confirmation</label>
                                                    <input type="password" name="new_password_confirmation">
                                                </div>

                                                <div class="save_button mt-3">
                                                    <button class="btn" type="submit">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            <div class="tab-pane" id="address">
                                <p>The following addresses will be used on the checkout page by default.</p>
                                <h5 class="billing-address">Billing address</h5>
                                <a href="#" class="view">Edit</a>
                                <p class="mb-2"><strong>{{$addresses->address}}</strong></p>
                                <address>

                                    <span class="mb-1 d-inline-block"><strong>Phone:</strong> {{$phones->phone_number}}</span>,
                                    <br>
                                    <span class="mb-1 d-inline-block"><strong>ZIP:</strong> {{$addresses->zip_code}}</span>,
                                    <br>
                                    <span><strong>Country:</strong> {{$addresses->location_country}}</span>
                                </address>
                            </div>
                            <div class="tab-pane fade" id="account-details">
                                <h3>Account details </h3>
                                <div class="login">
                                    <div class="login_form_container">
                                    @include('website.partials._sessions')
                                        <div class="account_login_form">
                                            <form action="{{route('account.dashboard.store')}}" method="post">
                                            @csrf

                                                <p>Already have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#loginActive">Log in instead!</a></p>
                                                 <br>
                                                 @include('website.partials._errors')
                                                 <div class="default-form-box mb-20">
                                                    <label>Phone Number</label>
                                                    <input type="text" name="phone_number">
                                                </div>
                                                <div class="default-form-box mb-20">
                                                    <label>address</label>
                                                    <input type="text" name="address" placeholder="Street address, Apartment, suite, unit, building, floor">
                                                </div>
                                                <div class="default-form-box mb-20">
                                                    <label>Country</label>
                                                        <select class="form-control" id="selectCountry" name="location_country">
                                            <option value="" selected="selected">Select a country </option>
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="American Samoa">American Samoa</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Anguilla">Anguilla</option>
                                            <option value="Antarctica">Antarctica</option>
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
                                            <option value="BR">Brazil</option>
                                            <option value="IO">British Indian Ocean Territory</option>
                                            <option value="BN">Brunei Darussalam</option>
                                            <option value="BG">Bulgaria</option>
                                            <option value="BF">Burkina Faso</option>
                                            <option value="Burundi">Burundi</option>
                                            <option value="Cambodia">Cambodia</option>
                                            <option value="Cameroon">Cameroon</option>
                                            <option value="CA">Canada</option>
                                            <option value="CV">Cape Verde</option>
                                            <option value="KY">Cayman Islands</option>
                                            <option value="CF">Central African Republic</option>
                                            <option value="Chad">Chad</option>
                                            <option value="Chile">Chile</option>
                                            <option value="China">China</option>
                                            <option value="CX">Christmas Island</option>
                                            <option value="CC">Cocos (Keeling) Islands</option>
                                            <option value="CO">Colombia</option>
                                            <option value="KM">Comoros</option>
                                            <option value="CG">Congo</option>
                                            <option value="CD">Congo, the Democratic Republic of the</option>
                                            <option value="CK">Cook Islands</option>
                                            <option value="CR">Costa Rica</option>
                                            <option value="CI">Cote d'Ivoire</option>
                                            <option value="HR">Croatia (Hrvatska)</option>
                                            <option value="CU">Cuba</option>
                                            <option value="CY">Cyprus</option>
                                            <option value="CZ">Czech Republic</option>
                                            <option value="Denmark">Denmark</option>
                                            <option value="Djibouti">Djibouti</option>
                                            <option value="Dominica">Dominica</option>
                                            <option value="Dominican Republic">Dominican Republic</option>
                                            <option value="TP">East Timor</option>
                                            <option value="Ecuador">Ecuador</option>
                                            <option value="Egypt">Egypt</option>
                                            <option value="SV">El Salvador</option>
                                            <option value="GQ">Equatorial Guinea</option>
                                            <option value="Eritrea">Eritrea</option>
                                            <option value="Estonia">Estonia</option>
                                            <option value="Ethiopia">Ethiopia</option>
                                            <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                            <option value="FO">Faroe Islands</option>
                                            <option value="FJ">Fiji</option>
                                            <option value="FI">Finland</option>
                                            <option value="France">France</option>
                                            <option value="France, Metropolitan">France, Metropolitan</option>
                                            <option value="French Guiana">French Guiana</option>
                                            <option value="PF">French Polynesia</option>
                                            <option value="TF">French Southern Territories</option>
                                            <option value="GA">Gabon</option>
                                            <option value="GM">Gambia</option>
                                            <option value="GE">Georgia</option>
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
                                            <option value="Heard and Mc Donald Islands">Heard and Mc Donald Islands</option>
                                            <option value="VA">Holy See (Vatican City State)</option>
                                            <option value="Honduras">Honduras</option>
                                            <option value="Hong Kong">Hong Kong</option>
                                            <option value="Hungary">Hungary</option>
                                            <option value="Iceland">Iceland</option>
                                            <option value="India">India</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="IR">Iran (Islamic Republic of)</option>
                                            <option value="IQ">Iraq</option>
                                            <option value="IE">Ireland</option>
                                            <option value="IL">Israel</option>
                                            <option value="IT">Italy</option>
                                            <option value="JM">Jamaica</option>
                                            <option value="JP">Japan</option>
                                            <option value="JO">Jordan</option>
                                            <option value="KZ">Kazakhstan</option>
                                            <option value="KE">Kenya</option>
                                            <option value="KI">Kiribati</option>
                                            <option value="KP">Korea, Democratic People's Republic of</option>
                                            <option value="KR">Korea, Republic of</option>
                                            <option value="KW">Kuwait</option>
                                            <option value="KG">Kyrgyzstan</option>
                                            <option value="LA">Lao People's Democratic Republic</option>
                                            <option value="LV">Latvia</option>
                                            <option value="LB">Lebanon</option>
                                            <option value="LS">Lesotho</option>
                                            <option value="LR">Liberia</option>
                                            <option value="LY">Libyan Arab Jamahiriya</option>
                                            <option value="LI">Liechtenstein</option>
                                            <option value="LT">Lithuania</option>
                                            <option value="LU">Luxembourg</option>
                                            <option value="MO">Macau</option>
                                            <option value="MK">Macedonia, The Former Yugoslav Republic of</option>
                                            <option value="MG">Madagascar</option>
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
                                            <option value="FM">Micronesia, Federated States of</option>
                                            <option value="MD">Moldova, Republic of</option>
                                            <option value="MC">Monaco</option>
                                            <option value="MN">Mongolia</option>
                                            <option value="MS">Montserrat</option>
                                            <option value="MA">Morocco</option>
                                            <option value="MZ">Mozambique</option>
                                            <option value="MM">Myanmar</option>
                                            <option value="NA">Namibia</option>
                                            <option value="NR">Nauru</option>
                                            <option value="NP">Nepal</option>
                                            <option value="NL">Netherlands</option>
                                            <option value="AN">Netherlands Antilles</option>
                                            <option value="NC">New Caledonia</option>
                                            <option value="NZ">New Zealand</option>
                                            <option value="NI">Nicaragua</option>
                                            <option value="NE">Niger</option>
                                            <option value="NG">Nigeria</option>
                                            <option value="NU">Niue</option>
                                            <option value="NF">Norfolk Island</option>
                                            <option value="MP">Northern Mariana Islands</option>
                                            <option value="NO">Norway</option>
                                            <option value="OM">Oman</option>
                                            <option value="PK">Pakistan</option>
                                            <option value="PW">Palau</option>
                                            <option value="PA">Panama</option>
                                            <option value="PG">Papua New Guinea</option>
                                            <option value="PY">Paraguay</option>
                                            <option value="PE">Peru</option>
                                            <option value="PH">Philippines</option>
                                            <option value="PN">Pitcairn</option>
                                            <option value="PL">Poland</option>
                                            <option value="PT">Portugal</option>
                                            <option value="PR">Puerto Rico</option>
                                            <option value="QA">Qatar</option>
                                            <option value="RE">Reunion</option>
                                            <option value="RO">Romania</option>
                                            <option value="RU">Russian Federation</option>
                                            <option value="RW">Rwanda</option>
                                            <option value="KN">Saint Kitts and Nevis</option>
                                            <option value="LC">Saint LUCIA</option>
                                            <option value="VC">Saint Vincent and the Grenadines</option>
                                            <option value="WS">Samoa</option>
                                            <option value="SM">San Marino</option>
                                            <option value="ST">Sao Tome and Principe</option>
                                            <option value="SA">Saudi Arabia</option>
                                            <option value="SN">Senegal</option>
                                            <option value="SC">Seychelles</option>
                                            <option value="SL">Sierra Leone</option>
                                            <option value="SG">Singapore</option>
                                            <option value="SK">Slovakia (Slovak Republic)</option>
                                            <option value="SI">Slovenia</option>
                                            <option value="SB">Solomon Islands</option>
                                            <option value="SO">Somalia</option>
                                            <option value="ZA">South Africa</option>
                                            <option value="GS">South Georgia and the South Sandwich Islands</option>
                                            <option value="ES">Spain</option>
                                            <option value="LK">Sri Lanka</option>
                                            <option value="SH">St. Helena</option>
                                            <option value="PM">St. Pierre and Miquelon</option>
                                            <option value="SD">Sudan</option>
                                            <option value="SR">Suriname</option>
                                            <option value="SJ">Svalbard and Jan Mayen Islands</option>
                                            <option value="SZ">Swaziland</option>
                                            <option value="SE">Sweden</option>
                                            <option value="CH">Switzerland</option>
                                            <option value="SY">Syrian Arab Republic</option>
                                            <option value="TW">Taiwan, Province of China</option>
                                            <option value="TJ">Tajikistan</option>
                                            <option value="TZ">Tanzania, United Republic of</option>
                                            <option value="TH">Thailand</option>
                                            <option value="TG">Togo</option>
                                            <option value="TK">Tokelau</option>
                                            <option value="TO">Tonga</option>
                                            <option value="TT">Trinidad and Tobago</option>
                                            <option value="TN">Tunisia</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="Turkmenistan">Turkmenistan</option>
                                            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
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
                                            <option value="Viet Nam">Viet Nam</option>
                                            <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                                            <option value="Virgin Islands (U.S.)">Virgin Islands (U.S.)</option>
                                            <option value="Wallis and Futuna Islands">Wallis and Futuna Islands</option>
                                            <option value="Western Sahara">Western Sahara</option>
                                            <option value="Yemen">Yemen</option>
                                            <option value="Yugoslavia">Yugoslavia</option>
                                            <option value="Zambia">Zambia</option>
                                            <option value="Zimbabwe">Zimbabwe</option>
                                            </select>

                                                </div>
                                               <div class="default-form-box mb-20">
                                                    <label>Zip Code</label>
                                                    <input type="text" name="zip_code" placeholder="Zip / Postal Code">
                                                </div>
                                                <br>
                                                <label class="checkbox-default" for="offer">
                                                    <input type="checkbox" id="offer">
                                                    <span>Receive offers from our partners</span>
                                                </label>
                                                <br>
                                                <label class="checkbox-default checkbox-default-more-text" for="newsletter">
                                                    <input type="checkbox" id="newsletter">
                                                    <span>Sign up for our newsletter<br><em>You may unsubscribe at any
                                                        moment. For that purpose, please find our contact info in the
                                                        legal notice.</em></span>
                                                </label>
                                                <div class="save_button mt-3">
                                                    <button class="btn" type="submit">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="products">
                                <h3>Products </h3>
                                <div class="login">
                                    <div class="login_form_container">
                                    @include('website.partials._sessions')
                                        <div class="account_login_form" >
                                            <form action="{{route('account.products.store')}}" method="post" enctype="multipart/form-data">
                                            @csrf

                                                 <br>
                                                 @include('website.partials._errors')
                                                 <div class="default-form-box mb-20">
                                                    <label>Product Name</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter product name" name="name">
                                                </div>
                                                <div class="default-form-box mb-20">
                                                    <label>Description</label>
                                                    <textarea class="form-control" rows="1" placeholder="Enter product description" name="description"></textarea>
                                                 </div>
                                                 <div class="default-form-box mb-20">
                                                    <label>Details</label>
                                                    <textarea class="form-control" rows="1" placeholder="Enter product details" name="details"></textarea>
                                                 </div>
                                               <div class="default-form-box mb-20">
                                                <label for="exampleInputEmail1">Purchase_price</label>
                                                <input type="number" class="form-control" id="exampleInputEmail1" placeholder="{{ __("e.g 20") }}" step="0.01" required="" min="0"  name="purchase_price">
                                                                            </div>
                                                                            <div class="default-form-box mb-20">
                                                                                <label for="exampleInputEmail1">Sale_price</label>
                                                                                <input type="number" class="form-control" id="exampleInputEmail1" placeholder="{{ __("e.g 20") }}" step="0.01" required="" min="0" name="sale_price">
                                                                                                                                                                        </div>
                                                        <div class="default-form-box mb-20">
                                                            <label for="exampleInputEmail1">Stock</label>
                                                            <input type="number" class="form-control" id="exampleInputEmail1" placeholder="{{ __("10") }}" step="0.01" required="" min="0" name="stock">
                                                                                                                                                    </div>
                                                                                                                                                    <div class="default-form-box mb-20">
                                                                                                                                                        <label>Image</label>
                                                                                                                                                        <input class="form-control image-3" type="file" name="image[]">                                                                                    </div>
                                                                                                                                                    </div>
                                                                                                                                                    <div class="form-group">
                                                                                                                                                        <label>Category</label>
                                                                                                                                                        <select class="form-control select2bs4" style="width: 100%;" name="category_id">
                                                                                                                                                          <option selected="selected">Select a Category</option>
                                                                                                                                                          @foreach($categories as $category)
                                                                                                                                                          <option value="{{$category->id}}">{{$category->name}}</option>
                                                                                                                                                          @endforeach
                                                                                                                                                          </select>
                                                                                                                                                      </div>



                                                <div class="save_button mt-3">
                                                    <button class="btn" type="submit">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- account area start -->
@endsection
