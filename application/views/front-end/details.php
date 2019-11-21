<style>
.sidebar-menu-inner{

    background-image:url(<?php echo base_url('front-end/login-image/back4.jpg')?>);
    
}
</style>

<div class="container" style="margin: 50px;">
    <div class="row">  
		
		<div class="col-sm-3"></div>
		<div class="col-sm-6" style="border-style: solid;border-radius: 5px;
                    border-color:#e6772e;">

				<div class="row" style="margin-bottom:100px;" >
					
						
						
		
			<form id="project-create" class="hc_form" action="<?php echo base_url('quotes/details_submit') ?>" method="POST">
				<input name="action" value="project_form_api" type="hidden">
				<input name="project_id" value="5d5259eddae96" type="hidden">
				<input name="referred_by" id="referred_by" type="hidden" value="">
				<div class="personal-details proj-steps">
					<h5 style="text-align:center;background-color:#f39659;padding:12px 10px 16px 16px;font-size:15px;color:white;margin:0px">Enter contact details</h5>
					<div class="real-form" style="color:black;">
						<div style="padding: 30px 10px 10px 9px;">
							<label class="projectLabel" for="name">Full Name</label><br>
							<input class="projectInput" name="name" id="name" type="text" required>
						</div>
						<div>
							<label class="projectLabel" for="address" style="margin-left:7px">Apartment/Villa Name and Locality</label><br>
							<textarea class="projectInput" name="address" id="address" rows="5" style="width:90%;margin-left:8px;" required></textarea>
						</div>
						<div>
							<label class="projectLabel" for="city" style="margin-left:8px">City</label><br>
							<select name="city" style="width: 150px;margin-left:8px;" required>
								<option value="Bangalore" selected>Bangalore</option>
								<option value="Hyderabad">Hyderabad</option>
							</select>
						</div>
						<div>
							<label class="projectLabel" for="mobile" style="margin-left:8px">Mobile Number</label><br>
							<select name="country_code" style="width: 130px;margin-left:8px;" required>
								<option value="93">Afghanistan (+93)</option><option value="355">Albania (+355)</option><option value="213">Algeria (+213)</option><option value="1684">American samoa (+1684)</option><option value="376">Andorra (+376)</option><option value="244">Angola (+244)</option><option value="1264">Anguilla (+1264)</option><option value="672">Antarctica (+672)</option><option value="1268">Antigua and barbuda (+1268)</option><option value="54">Argentina (+54)</option><option value="374">Armenia (+374)</option><option value="297">Aruba (+297)</option><option value="43">Austria (+43)</option><option value="994">Azerbaijan (+994)</option><option value="1242">Bahamas (+1242)</option><option value="973">Bahrain (+973)</option><option value="880">Bangladesh (+880)</option><option value="1246">Barbados (+1246)</option><option value="375">Belarus (+375)</option><option value="32">Belgium (+32)</option><option value="501">Belize (+501)</option><option value="229">Benin (+229)</option><option value="1441">Bermuda (+1441)</option><option value="975">Bhutan (+975)</option><option value="591">Bolivia (+591)</option><option value="387">Bosnia and herzegovina (+387)</option><option value="267">Botswana (+267)</option><option value="55">Brazil (+55)</option><option value="673">Brunei darussalam (+673)</option><option value="359">Bulgaria (+359)</option><option value="226">Burkina faso (+226)</option><option value="257">Burundi (+257)</option><option value="855">Cambodia (+855)</option><option value="237">Cameroon (+237)</option><option value="238">Cape verde (+238)</option><option value="1345">Cayman islands (+1345)</option><option value="236">Central african republic (+236)</option><option value="235">Chad (+235)</option><option value="56">Chile (+56)</option><option value="86">China (+86)</option><option value="61">Christmas island (+61)</option><option value="57">Colombia (+57)</option><option value="269">Comoros (+269)</option><option value="242">Congo (+242)</option><option value="243">Congo, the democratic republic of the (+243)</option><option value="682">Cook islands (+682)</option><option value="506">Costa rica (+506)</option><option value="225">Cote d ivoire (+225)</option><option value="385">Croatia (+385)</option><option value="53">Cuba (+53)</option><option value="357">Cyprus (+357)</option><option value="420">Czech republic (+420)</option><option value="45">Denmark (+45)</option><option value="253">Djibouti (+253)</option><option value="1767">Dominica (+1767)</option><option value="1809">Dominican republic (+1809)</option><option value="593">Ecuador (+593)</option><option value="20">Egypt (+20)</option><option value="503">El salvador (+503)</option><option value="240">Equatorial guinea (+240)</option><option value="291">Eritrea (+291)</option><option value="372">Estonia (+372)</option><option value="251">Ethiopia (+251)</option><option value="500">Falkland islands (malvinas) (+500)</option><option value="298">Faroe islands (+298)</option><option value="679">Fiji (+679)</option><option value="358">Finland (+358)</option><option value="33">France (+33)</option><option value="689">French polynesia (+689)</option><option value="241">Gabon (+241)</option><option value="220">Gambia (+220)</option><option value="995">Georgia (+995)</option><option value="49">Germany (+49)</option><option value="233">Ghana (+233)</option><option value="350">Gibraltar (+350)</option><option value="30">Greece (+30)</option><option value="299">Greenland (+299)</option><option value="1473">Grenada (+1473)</option><option value="1671">Guam (+1671)</option><option value="502">Guatemala (+502)</option><option value="224">Guinea (+224)</option><option value="245">Guinea-bissau (+245)</option><option value="592">Guyana (+592)</option><option value="509">Haiti (+509)</option><option value="39">Holy see (vatican city state) (+39)</option><option value="504">Honduras (+504)</option><option value="852">Hong kong (+852)</option><option value="36">Hungary (+36)</option><option value="354">Iceland (+354)</option><option value="91" selected="selected">India (+91)</option><option value="62">Indonesia (+62)</option><option value="98">Iran, islamic republic of (+98)</option><option value="964">Iraq (+964)</option><option value="353">Ireland (+353)</option><option value="44">Isle of man (+44)</option><option value="972">Israel (+972)</option><option value="1876">Jamaica (+1876)</option><option value="81">Japan (+81)</option><option value="962">Jordan (+962)</option><option value="254">Kenya (+254)</option><option value="686">Kiribati (+686)</option><option value="850">Korea democratic peoples republic of (+850)</option><option value="82">Korea republic of (+82)</option><option value="381">Kosovo (+381)</option><option value="965">Kuwait (+965)</option><option value="996">Kyrgyzstan (+996)</option><option value="856">Lao peoples democratic republic (+856)</option><option value="371">Latvia (+371)</option><option value="961">Lebanon (+961)</option><option value="266">Lesotho (+266)</option><option value="231">Liberia (+231)</option><option value="218">Libyan arab jamahiriya (+218)</option><option value="423">Liechtenstein (+423)</option><option value="370">Lithuania (+370)</option><option value="352">Luxembourg (+352)</option><option value="853">Macau (+853)</option><option value="389">Macedonia, the former yugoslav republic of (+389)</option><option value="261">Madagascar (+261)</option><option value="265">Malawi (+265)</option><option value="60">Malaysia (+60)</option><option value="960">Maldives (+960)</option><option value="223">Mali (+223)</option><option value="356">Malta (+356)</option><option value="692">Marshall islands (+692)</option><option value="222">Mauritania (+222)</option><option value="230">Mauritius (+230)</option><option value="262">Mayotte (+262)</option><option value="52">Mexico (+52)</option><option value="691">Micronesia, federated states of (+691)</option><option value="373">Moldova, republic of (+373)</option><option value="377">Monaco (+377)</option><option value="976">Mongolia (+976)</option><option value="382">Montenegro (+382)</option><option value="1664">Montserrat (+1664)</option><option value="212">Morocco (+212)</option><option value="258">Mozambique (+258)</option><option value="95">Myanmar (+95)</option><option value="264">Namibia (+264)</option><option value="674">Nauru (+674)</option><option value="977">Nepal (+977)</option><option value="31">Netherlands (+31)</option><option value="599">Netherlands antilles (+599)</option><option value="687">New caledonia (+687)</option><option value="64">New zealand (+64)</option><option value="505">Nicaragua (+505)</option><option value="227">Niger (+227)</option><option value="234">Nigeria (+234)</option><option value="683">Niue (+683)</option><option value="1670">Northern mariana islands (+1670)</option><option value="47">Norway (+47)</option><option value="968">Oman (+968)</option><option value="92">Pakistan (+92)</option><option value="680">Palau (+680)</option><option value="507">Panama (+507)</option><option value="675">Papua new guinea (+675)</option><option value="595">Paraguay (+595)</option><option value="51">Peru (+51)</option><option value="63">Philippines (+63)</option><option value="870">Pitcairn (+870)</option><option value="48">Poland (+48)</option><option value="351">Portugal (+351)</option><option value="974">Qatar (+974)</option><option value="40">Romania (+40)</option><option value="7">Russian federation (+7)</option><option value="250">Rwanda (+250)</option><option value="590">Saint barthelemy (+590)</option><option value="290">Saint helena (+290)</option><option value="1869">Saint kitts and nevis (+1869)</option><option value="1758">Saint lucia (+1758)</option><option value="1599">Saint martin (+1599)</option><option value="508">Saint pierre and miquelon (+508)</option><option value="1784">Saint vincent and the grenadines (+1784)</option><option value="685">Samoa (+685)</option><option value="378">San marino (+378)</option><option value="239">Sao tome and principe (+239)</option><option value="966">Saudi arabia (+966)</option><option value="221">Senegal (+221)</option><option value="248">Seychelles (+248)</option><option value="232">Sierra leone (+232)</option><option value="65">Singapore (+65)</option><option value="421">Slovakia (+421)</option><option value="386">Slovenia (+386)</option><option value="677">Solomon islands (+677)</option><option value="252">Somalia (+252)</option><option value="27">South africa (+27)</option><option value="34">Spain (+34)</option><option value="94">Sri lanka (+94)</option><option value="249">Sudan (+249)</option><option value="597">Suriname (+597)</option><option value="268">Swaziland (+268)</option><option value="46">Sweden (+46)</option><option value="41">Switzerland (+41)</option><option value="963">Syrian arab republic (+963)</option><option value="886">Taiwan, province of china (+886)</option><option value="992">Tajikistan (+992)</option><option value="255">Tanzania, united republic of (+255)</option><option value="66">Thailand (+66)</option><option value="670">Timor-leste (+670)</option><option value="228">Togo (+228)</option><option value="690">Tokelau (+690)</option><option value="676">Tonga (+676)</option><option value="1868">Trinidad and tobago (+1868)</option><option value="216">Tunisia (+216)</option><option value="90">Turkey (+90)</option><option value="993">Turkmenistan (+993)</option><option value="1649">Turks and caicos islands (+1649)</option><option value="688">Tuvalu (+688)</option><option value="256">Uganda (+256)</option><option value="380">Ukraine (+380)</option><option value="971">United arab emirates (+971)</option><option value="1">United states (+1)</option><option value="598">Uruguay (+598)</option><option value="998">Uzbekistan (+998)</option><option value="678">Vanuatu (+678)</option><option value="58">Venezuela (+58)</option><option value="84">Viet nam (+84)</option><option value="1284">Virgin islands, british (+1284)</option><option value="1340">Virgin islands, u.s. (+1340)</option><option value="681">Wallis and futuna (+681)</option><option value="967">Yemen (+967)</option><option value="260">Zambia (+260)</option><option value="263">Zimbabwe (+263)</option>
							</select>
							<input class="projectInput" name="mobile" id="mobile" placeholder="" required><br>
						</div>
						<div>
							<label class="projectLabel" for="email" style="margin-left:8px">Email</label><br>
							<input class="" name="email" id="email" type="text" style="margin-left:8px" required>
						</div>
						<br>
						<!-- <div style="background-color: #f1f9f7;color: #1d9d74;border: 1px solid #dfe4e3;border-radius: 4px;font-size:14px;margin-bottom:10px;padding:10px;text-align:left;"><i class="fa fa-info-circle"></i><span style="padding-left:5px;">
							Quotations will be shared over SMS and email.</span></div> -->
					</div>
				</div>
		
				<div class="btn-group">
					<button class="btn btn-primary"  type="submit" value="SUBMIT" style="margin-left:50px" >SUBMIT</button>
<!-- 					<a href="<?php echo base_url() ?>">
						<button class="btn btn-info right"  type="button">Cancel</button>
					</a> -->	
				</div>
			</form>
		</div>
		</div>
		<div class="col-sm-3"></div>
		
</div>
</div>