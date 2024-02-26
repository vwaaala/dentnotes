@extends('layouts.app')
@push('styles')
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

@endpush
@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1>Clinic Notes Generator</h1>
                    <span
                        class="">Please note: Website still under development and not all sections are functional</span>
                </div>

                <div class="card-body">
                    <div id="container">
                        <div class="leftHolder">
                            <button id="contentgenerate" onclick="myGenerate()">Generate</button>
                            @auth
                                <button id="contenthistory" onclick="myHistory()">History</button>
                                <div id="contentcat" class="d-none">
                                    <hr>
                                    @foreach($notesByCategory as $key=>$noteCategory)
                                        <button class="accordion">{{ $key }}</button>
                                        <div class="panel">
                                            <ul>
                                                @foreach($noteCategory as $key=>$notes)
                                                <li class="card" data-note_id="{{ $notes['id'] }}">
                                                    <span>{{ $notes['name'] }}</span>
                                                    <span class="bi bi-trash text-danger"></span>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endforeach


                                </div>
                            @endauth
                            <div id="checkboxes">
                                <hr>
                                <button class="toggle-button5" id="button1">DIAGNOSTIC SERVICES (0xx)</button>
                                <div id="dxSection1" class="section">
                                    <button class="toggle-button" id="button2">011 Comprehensive oral examination
                                    </button>
                                    <input type="Checkbox" id="B100Checkbox" class="TEST">
                                    <div id="011Section1" class="section">
                                        <input type="Checkbox" id="ptCheckbox" class="TEST">
                                        Pt. presented to
                                        <select id="yearDropdown" class="TEST">
                                            <option value=""></option>
                                            <option value="3rd Year">3rd Year</option>
                                            <option value="4th Year">4th Year</option>
                                            <option value="5th Year">5th Year</option>
                                        </select>
                                        <select id="clinicDropdown" class="TEST" class="TEST">
                                            <option value="GDP Clinic">GDP Clinic</option>
                                            <option value="Pros Clinic">Pros Clinic</option>
                                            <option value="Perio Clinic">Perio Clinic</option>
                                        </select>
                                        <select id="codeDropdown" class="TEST">
                                            <option value=""></option>
                                            <option value="2.1">2.1</option>
                                            <option value="3.1">3.1</option>
                                            <option value="3.2">3.2</option>
                                            <option value="3.3">3.3</option>
                                            <option value="3.4">3.4</option>
                                            <option value="4.1">4.1</option>
                                            <option value="4.2">4.2</option>
                                            <option value="5.1">5.1</option>
                                            <option value="5.2">5.2</option>
                                            <option value="6.2">6.2</option>
                                            <option value="6.3">6.3</option>
                                        </select>
                                        for
                                        <select id="typeDropdown" class="TEST">
                                            <option value="011">011</option>
                                            <option value="S/C">S/C</option>
                                            <option value="Consult">Consult</option>
                                        </select>
                                        OR
                                        <input type="text" id="A1TextInput" class="TEST" placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="c3sCheckbox" class="TEST">
                                        3C’s confirmed
                                        <input type="text" id="c3sTextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="colgateCheckbox" class="TEST">
                                        Colgate 1.5% Hydrogen Peroxide Mouth rinse given. <br>
                                        <input type="Checkbox" id="medicalHxCheckbox" class="TEST">
                                        Medical Hx
                                        <select id="hxDropdown" class="TEST">
                                            <option value="updated">Updated</option>
                                            <option value="verified- no changes">Verified</option>
                                            <option value="taken">taken</option>
                                        </select>
                                        <br>
                                        <br>
                                        <pr></pr>
                                        <input type="Checkbox" id="B1Checkbox" class="TEST" checked hidden="">
                                        RFV:
                                        <input type="text" id="B1TextInput" class="TEST" placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="B2Checkbox" class="TEST" checked hidden="">
                                        CC:
                                        <input type="text" id="B2TextInput" class="TEST" placeholder="Enter details...">
                                        <br>
                                        <strong>Hx of Present Complaint</strong>
                                        <input type="Checkbox" id="B105Checkbox" class="TEST" hidden="">
                                        <br>
                                        <input type="Checkbox" id="B30Checkbox" class="TEST" checked hidden="">
                                        Site:
                                        <input type="text" id="B30TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="B31Checkbox" class="TEST" checked hidden="">
                                        Onset
                                        <input type="text" id="B31TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="B32Checkbox" class="TEST" checked hidden="">
                                        Character
                                        <input type="text" id="B32TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="B33Checkbox" class="TEST" checked hidden="">
                                        Radiation
                                        <input type="text" id="B33TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="B34Checkbox" class="TEST" checked hidden="">
                                        Alleviating factor
                                        <input type="text" id="B34TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="B35Checkbox" class="TEST" checked hidden="">
                                        Exacerbating factors
                                        <input type="text" id="B35TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="B36Checkbox" class="TEST" checked hidden="">
                                        Severity
                                        <input type="text" id="B36TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <br>
                                        <br>
                                        <input type="Checkbox" id="B11Checkbox" class="TEST">
                                        <strong>Select ALL</strong>
                                        <input type="Checkbox" id="B3Checkbox" class="TEST">
                                        E/O examination:
                                        <input type="Checkbox" id="B4Checkbox" class="TEST">
                                        Temporalis m
                                        <input type="Checkbox" id="B5Checkbox" class="TEST">
                                        masseter m.
                                        <input type="Checkbox" id="B6Checkbox" class="TEST">
                                        TMJ
                                        <input type="Checkbox" id="B7Checkbox" class="TEST">
                                        salivary glands
                                        <input type="Checkbox" id="B8Checkbox" class="TEST">
                                        lymph nodes
                                        <input type="Checkbox" id="B9Checkbox" class="TEST">
                                        muscles of facial expression
                                        <input type="Checkbox" id="B10Checkbox" class="TEST">
                                        – NAD.  <br>
                                        <br>
                                        <input type="Checkbox" id="B12Checkbox" class="TEST">
                                        <strong>Select ALL</strong>
                                        <input type="Checkbox" id="B13Checkbox" class="TEST">
                                        I/OE:
                                        <input type="Checkbox" id="B14Checkbox" class="TEST">
                                        FOM
                                        <input type="Checkbox" id="B15Checkbox" class="TEST">
                                        tongue
                                        <input type="Checkbox" id="B16Checkbox" class="TEST">
                                        buccal mucosa 
                                        <input type="Checkbox" id="B17Checkbox" class="TEST">
                                        palatal mucosa
                                        <input type="Checkbox" id="B117Checkbox" class="TEST">
                                        – NAD <br>
                                        <input type="Checkbox" id="htpsrCheckbox" class="TEST">
                                        Hard tissue & PSR – as charted in ISOH. <br>
                                        <br>
                                        <input type="Checkbox" id="radioCheckbox" class="TEST">
                                        <select id="radioDropdown" class="TEST">
                                            <option value="OPG & 2x BWs taken">OPG & 2x BWs taken</option>
                                            <option value="2x BWs taken. No OPG Indicated">2x BWs taken</option>
                                            <option value="No x-rays taken">No x-rays taken</option>
                                        </select>
                                        <br>
                                        <input type="Checkbox" id="B18CCheckbox" class="TEST" checked hidden="">
                                        Main Findings:
                                        <input type="text" id="B18CTextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="BWCheckbox" class="TEST" hidden="">
                                        <strong>BW taken</strong> <br>
                                        <input type="Checkbox" id="BW1Checkbox" class="TEST" checked hidden="">
                                        Interproximal caries:
                                        <input type="text" id="BW1TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="BW2Checkbox" class="TEST" checked hidden="">
                                        Occlusal caries:
                                        <input type="text" id="BW2TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="BW3Checkbox" class="TEST" checked hidden="">
                                        Secondary caries:
                                        <input type="text" id="BW3TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="BW4Checkbox" class="TEST" checked hidden="">
                                        Bone level:
                                        <input type="text" id="BW4TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="BW5Checkbox" class="TEST" checked hidden="">
                                        Calculus:
                                        <input type="text" id="BW5TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="BW6Checkbox" class="TEST" checked hidden="">
                                        Restoration:
                                        <input type="text" id="BW6TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <br>
                                        <input type="Checkbox" id="opgCheckbox" class="TEST" hidden="">
                                        <strong>OPG taken</strong> <br>
                                        <input type="Checkbox" id="opg1Checkbox" class="TEST" checked hidden="">
                                        Missing teeth:
                                        <input type="text" id="opg1TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="opg2Checkbox" class="TEST" checked hidden="">
                                        8’s:
                                        <input type="text" id="opg2TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="opg3Checkbox" class="TEST" checked hidden="">
                                        Caries:
                                        <input type="text" id="opg3TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        : <br>
                                        <input type="Checkbox" id="opg4Checkbox" class="TEST" checked hidden="">
                                        Restoration/dental work:
                                        <input type="text" id="opg4TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="opg5Checkbox" class="TEST" checked hidden="">
                                        Bone level:
                                        <input type="text" id="opg5TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="opg6Checkbox" class="TEST" checked hidden="">
                                        Mx sinus:
                                        <input type="text" id="opg6TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="opg7Checkbox" class="TEST" checked hidden="">
                                        Condyles
                                        <input type="text" id="opg7TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="opg8Checkbox" class="TEST" checked hidden="">
                                        Ghost images:
                                        <input type="text" id="opg8TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <br>
                                        <br>
                                        <input type="Checkbox" id="B18Checkbox" class="TEST" checked hidden="">
                                        Provisional Tx:
                                        <input type="text" id="B18TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <strong>Tx options discussed and presented to pt: </strong>
                                        <input type="Checkbox" id="B25Checkbox" class="TEST" hidden="">
                                        <br>
                                        <input type="Checkbox" id="B19Checkbox" class="TEST" checked hidden="">
                                        -Systemic phase:
                                        <input type="text" id="B19TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="B20Checkbox" class="TEST" checked hidden="">
                                        -Acute phase
                                        <input type="text" id="B20TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="B21Checkbox" class="TEST" checked hidden="">
                                        -Disease control:
                                        <input type="text" id="B21TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="B22Checkbox" class="TEST" checked hidden="">
                                        -Definitive phase:
                                        <input type="text" id="B22TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="B23Checkbox" class="TEST" checked hidden="">
                                        Maintenance phase:
                                        <input type="text" id="B23TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="B24Checkbox" class="TEST" checked hidden="">
                                        Extra comment:
                                        <input type="text" id="B24TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <br>
                                        <input type="Checkbox" id="supervisorCheckbox" class="TEST">
                                        Supervisor: Dr
                                        <input type="text" id="supervisornameTextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="nvCheckbox" class="TEST">
                                        N/V:
                                        <input type="text" id="nvTextInput" class="TEST" placeholder="Enter details...">
                                        OR <br>
                                        <input type="Checkbox" id="waitlistCheckbox" class="TEST">
                                        Patient placed on general waitlist and seperated
                                        OR
                                        <input type="text" id="waitlistTextInput" class="TEST" class="TEST"
                                               placeholder="Enter details...">
                                        <hr>
                                    </div>

                                    <hr>
                                </div>
                                <button class="toggle-button5" id="button6">PREVENTIVE, PROPHYLACTIC & BLEACHING
                                    SERVICES
                                    (1xx)
                                </button>
                                <br>
                                <div id="ppSection" class="section">
                                    <button class="toggle-button" id="button7">114 Removal of calculus – first
                                        appointment
                                    </button>
                                    <input type="Checkbox" id="selectSpecificSCCheckbox" class="TEST">
                                    <br>
                                    <div id="scaleAndCleansSection" class="section">
                                        <h3>Scale and Cleans</h3>


                                        <input type="Checkbox" id="ptsc1Checkbox" class="TEST"> Pt. presented to
                                        <select id="sc1yearDropdown" class="TEST">

                                            <option value="3rd Year">3rd Year</option>
                                            <option value="4th Year">4th Year</option>
                                            <option value="5th Year">5th Year</option>
                                        </select>
                                        <select id="sc1clinicDropdown" class="TEST">
                                            <option value="GDP Clinic">GDP Clinic</option>
                                            <option value="Pros Clinic">Pros Clinic</option>
                                            <option value="Perio Clinic">Perio Clinic</option>

                                        </select>
                                        <select id="sc1codeDropdown" class="TEST">
                                            <option value="5.1">5.1</option>
                                            <option value="5.2">5.2</option>
                                            <option value="2.1">2.1</option>
                                            <option value="3.1">3.1</option>
                                            <option value="3.2">3.2</option>
                                            <option value="3.3">3.3</option>
                                            <option value="3.4">3.4</option>
                                            <option value="4.1">4.1</option>
                                            <option value="4.2">4.2</option>
                                            <option value="6.2">6.2</option>
                                            <option value="6.3">6.3</option>
                                        </select>
                                        for
                                        <select id="sc1typeDropdown" class="TEST">
                                            <option value="S/C">S/C</option>
                                            <option value="011">011</option>
                                            <option value="S/C">S/C</option>
                                            <option value="Consult">Consult</option>
                                        </select>
                                        OR
                                        <input type="text" id="sc1A1TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="sc1c3sCheckbox" class="TEST"> 3C’s confirmed
                                        <input type="text" id="sc1c3sTextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>

                                        <input type="Checkbox" id="sc1colgateCheckbox" class="TEST"> Colgate 1.5%
                                        Hydrogen
                                        Peroxide Mouth rinse
                                        given. <br>

                                        <input type="Checkbox" id="sc1medicalHxCheckbox" class="TEST"> Medical Hx
                                        <select id="sc1hxDropdown" class="TEST">
                                            <option value="updated">Updated</option>
                                            <option value="verified">Verified</option>
                                            <option value="taken">taken</option>
                                        </select> <br><br>


                                        <input type="Checkbox" id="consentsCheckbox" class="TEST">
                                        Pt consents to S/C – informed of risks bleeding, post op sensitivity, natural
                                        gaps
                                        between teeth <br>
                                        <input type="Checkbox" id="debridementCheckbox" class="TEST">
                                        Debridement of all quadrants using ultrasonic scaler <br>
                                        <input type="Checkbox" id="refinementCheckbox" class="TEST">
                                        Refinement using hand scalers <br>
                                        <input type="Checkbox" id="prophyCheckbox" class="TEST">
                                        Prophy and fluoride applied <br>
                                        <input type="Checkbox" id="ohiCheckbox" class="TEST">
                                        OHI provided <br><br>

                                        <input type="Checkbox" id="sc1G22Checkbox" class="TEST"> Pt well on discharge
                                        <br>
                                        <input type="Checkbox" id="sc1supervisorCheckbox"> Supervisor: Dr
                                        <input type="text" id="sc1supervisornameTextInput"
                                               placeholder="Enter details...">
                                        <br>

                                        <input type="Checkbox" id="sc1nvCheckbox" class="TEST"> N/V:
                                        <input type="text" id="sc1nvTextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                    </div>
                                    <button class="toggle-button" id="button8">Enamel micro-abrasion – per tooth (tooth
                                        lightening)
                                    </button>
                                    <input type="Checkbox" id="116Checkbox" class="TEST">
                                    <br>
                                    <div id="116Section1" class="section"> COMING SOON</div>
                                    <hr>
                                </div>
                                <button class="toggle-button5" id="button9">PERIODONTICS (2xx)</button>
                                <div id="perioSection1" class="section">
                                    <button class="toggle-button" id="button10">221 Clinical periodontal analysis and
                                        recording
                                    </button>
                                    <input type="Checkbox" id="E221Checkbox" class="TEST">

                                    <div id="221Section" class="section">

                                        <input type="Checkbox" id="ptperio1Checkbox" class="TEST"> Pt. presented to
                                        <select id="perio1yearDropdown" class="TEST">

                                            <option value="4th Year">4th Year</option>
                                            <option value="3rd Year">3rd Year</option>
                                            <option value="5th Year">5th Year</option>
                                        </select>
                                        <select id="perio1clinicDropdown" class="TEST">
                                            <option value="Perio Clinic">Perio Clinic</option>
                                            <option value="Pros Clinic">Pros Clinic</option>

                                            <option value="GDP Clinic">GDP Clinic</option>
                                        </select>
                                        <select id="perio1codeDropdown" class="TEST">
                                            <option value="5.1">5.1</option>
                                            <option value="5.2">5.2</option>
                                            <option value="2.1">2.1</option>
                                            <option value="3.1">3.1</option>
                                            <option value="3.2">3.2</option>
                                            <option value="3.3">3.3</option>
                                            <option value="3.4">3.4</option>
                                            <option value="4.1">4.1</option>
                                            <option value="4.2">4.2</option>
                                            <option value="6.2">6.2</option>
                                            <option value="6.3">6.3</option>
                                        </select>
                                        for
                                        <select id="perio1typeDropdown" class="TEST">
                                            <option value="Perio charting">Perio charting</option>
                                            <option value="011">011</option>
                                            <option value="S/C">S/C</option>
                                            <option value="Consult">Consult</option>
                                        </select>
                                        OR
                                        <input type="text" id="perio1A1TextInput" class="TEST"
                                               placeholder="Enter details..."> <br>
                                        <input type="Checkbox" id="perio1c3sCheckbox" class="TEST"> 3C’s confirmed
                                        <input type="text" id="perio1c3sTextInput" class="TEST"
                                               placeholder="Enter details..."> <br>

                                        <input type="Checkbox" id="perio1colgateCheckbox" class="TEST"> Colgate 1.5%
                                        Hydrogen Peroxide Mouth rinse
                                        given. <br>

                                        <input type="Checkbox" id="perio1medicalHxCheckbox" class="TEST"> Medical Hx
                                        <select id="perio1hxDropdown" class="TEST">
                                            <option value="updated">Updated</option>
                                            <option value="verified">Verified</option>
                                            <option value="taken">taken</option>
                                        </select> <br><br>


                                        <input type="Checkbox" id="P1ACheckbox" class="TEST">
                                        <strong>DENTAL Hx:</strong> <br>

                                        <input type="Checkbox" id="P1Checkbox" class="TEST" checked hidden="">
                                        Brushing freq, TB & TP
                                        <input type="text" id="P1TextInput" class="TEST" placeholder="Enter details...">
                                        <br>

                                        <input type="Checkbox" id="P2Checkbox" class="TEST" checked hidden="">
                                        Interdental cleaning/mouthwash:
                                        <input type="text" id="P2TextInput" class="TEST" placeholder="Enter details...">
                                        <br>

                                        <input type="Checkbox" id="P3Checkbox" class="TEST" checked hidden="">
                                        Pain Hx:
                                        <input type="text" id="P3TextInput" class="TEST" placeholder="Enter details...">
                                        <br>

                                        <input type="Checkbox" id="P4Checkbox" class="TEST" checked hidden="">
                                        Bleeding gums:
                                        <input type="text" id="P4TextInput" class="TEST" placeholder="Enter details...">
                                        <br>

                                        <input type="Checkbox" id="P5Checkbox" class="TEST" checked hidden="">
                                        Missing teeth & reason:
                                        <input type="text" id="P5TextInput" class="TEST" placeholder="Enter details...">
                                        <br>

                                        <input type="Checkbox" id="P6Checkbox" class="TEST" checked hidden="">
                                        Tooth mobility or movement:
                                        <input type="text" id="P6TextInput" class="TEST" placeholder="Enter details...">
                                        <br><br>
                                        <input type="Checkbox" id="P1BCheckbox" class="TEST">
                                        <strong>SOCIAL & FAMILY HX</strong> <br>

                                        <input type="Checkbox" id="P7Checkbox" class="TEST" checked hidden="">
                                        Snacks/sugary drinks
                                        <input type="text" id="P7TextInput" class="TEST" placeholder="Enter details...">
                                        <br>

                                        <input type="Checkbox" id="P8Checkbox" class="TEST" checked hidden="">
                                        Smoking Hx:
                                        <input type="text" id="P8aTextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>

                                        <input type="Checkbox" id="P9Checkbox" class="TEST" checked hidden="">
                                        Family Hx of diabetes/gum disease/tooth loss:
                                        <input type="text" id="P9TextInput" class="TEST" placeholder="Enter details...">
                                        <br><br>

                                        <strong> LA</strong>
                                        <br>
                                        <input type="Checkbox" id="LAperio16Checkbox" class="TEST">
                                        LA/Topical Used
                                        <select id="LAperio16Dropdown" class="TEST">
                                            <option value="Topical 5% Xylocaine LA used">Topical 5% Xylocaine AND (See
                                                below)
                                            </option>
                                            <option value="No LA/Topical used">No LA/Topical used</option>
                                        </select>
                                        <br>
                                        <input type="Checkbox" id="LAperio17Checkbox" class="TEST">
                                        <select id="LAperio17Dropdown" class="TEST">
                                            <option value="2.2mL Lignospan: 2% Lignocaine w Adrenaline 1:80,000">2.2mL
                                                Lignospan
                                            </option>
                                            <option value="2.2mL Septanest: 4% Articaine w Adrenaline 1:100,000">2.2mL
                                                Septanest
                                            </option>
                                            <option value="2.2mL Scandonest: 3% Mepivacaine">2.2mL Scandonest</option>
                                        </select>
                                        VIA
                                        <select id="LAperio17InfilDropdown" class="TEST">
                                            <option value="palatal infil">Palatal Infiltration</option>
                                            <option value="buccal infil">Buccal Infiltration</option>
                                            <option value="IDB">Inferior Dental Block</option>
                                            <option value="long buccal">Long Buccal</option>
                                        </select>
                                        <br>

                                        <input type="Checkbox" id="P10Checkbox" class="TEST">
                                        <strong>Full perio charted. Significant findings: </strong><br>


                                        <table>
                                            <thead>
                                            <tr>
                                                <th>Stage</th>
                                                <th>Stage I</th>
                                                <th>Stage II</th>
                                                <th>Stage III</th>
                                                <th>Stage IV</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <tr>
                                                <td> Interdental CAL at site of greatest loss</td>
                                                <td><input type="Checkbox" id="P101Checkbox" class="TEST"> 1 – 2 mm</td>
                                                <td><input type="Checkbox" id="P102Checkbox" class="TEST"> 3 – 4 mm</td>
                                                <td><input type="Checkbox" id="P103Checkbox" class="TEST"> ≥ 5mm</td>
                                                <td><input type="Checkbox" id="P104Checkbox" class="TEST"> ≥ 5mm</td>
                                            </tr>
                                            <tr>
                                                <td>Radiographic Bone loss</td>

                                                <td><input type="Checkbox" id="P105Checkbox" class="TEST"> Coronal Third
                                                    (<
                                                    15%)
                                                </td>
                                                <td><input type="Checkbox" id="P106Checkbox" class="TEST"> Coronal Third
                                                    (15
                                                    – 33 %)
                                                </td>
                                                <td><input type="Checkbox" id="P107Checkbox" class="TEST"> Extending to
                                                    the
                                                    mid third of the root and
                                                    beyond.
                                                </td>
                                                <td><input type="Checkbox" id="P108Checkbox" class="TEST"> Extending to
                                                    the
                                                    mid third of the root and
                                                    beyond.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Periodontitis-associated tooth loss</td>
                                                <td colspan="2"><input type="Checkbox" id="P109Checkbox" class="TEST">
                                                    No
                                                    tooth loss due to
                                                    Periodontitis.
                                                </td>
                                                <td><input type="Checkbox" id="P110Checkbox" class="TEST">Tooth loss due
                                                    to
                                                    Periodontitis of ≤ 4
                                                    teeth.
                                                </td>
                                                <td><input type="Checkbox" id="P111Checkbox" class="TEST"> Tooth loss
                                                    due to
                                                    Periodontitis of ≥ 5
                                                    teeth.
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>Complexity <br>
                                                    SEE CHECKBOXES BELOW


                                                </td>
                                                <td> Maximum probing depth ≤ 4mm. Mostly horizontal bone loss.</td>
                                                <td> Maximum probing depth ≤ 5mm. Mostly horizontal bone loss.</td>
                                                <td> In addition to stage II complexity; probing depth ≥ 6mm, vertical
                                                    bone
                                                    loss ≥ 3mm, furcation
                                                    involvement (class II or III), moderate ridge defects.
                                                </td>
                                                <td> In addition to Stage III complexity; Need for comprehensive
                                                    rehabilitation due to secondary
                                                    occlusal trauma (mobility ≥ 2), bite collapse, drifting, flaring,
                                                    less
                                                    than 10 opposing pairs of
                                                    teeth, masticatory dysfunction, severe ridge defects.
                                                </td>
                                            </tr>

                                            <tr>

                                                <td colspan="5"><input type="Checkbox" id="P14Checkbox" class="TEST">
                                                    Max PPD:
                                                    <select id="P14Dropdown" class="TEST">
                                                        <option value="≤4">≤4</option>
                                                        <option value="≤5">≤5</option>
                                                        <option value="≥6mm beyond (Stage III/IV)">≥6mm beyond (Stage
                                                            III/IV)
                                                        </option>
                                                    </select>
                                                    <br>


                                                    <input type="Checkbox" id="P15Checkbox" class="TEST">
                                                    RBL pattern:
                                                    <select id="P15Dropdown" class="TEST">
                                                        <option value="Mostly horizontal RBL (Stage I/II)">Mostly
                                                            horizontal
                                                            RBL (Stage I/II)
                                                        </option>
                                                        <option value="Vertical bone loss ≥3mm (Stage III/IV)">Vertical
                                                            bone
                                                            loss ≥3mm (Stage III/IV)
                                                        </option>
                                                    </select>
                                                    <br>


                                                    <input type="Checkbox" id="P16Checkbox" class="TEST">
                                                    Furcation involvement:
                                                    <select id="P16Dropdown" class="TEST">
                                                        <option value="None">None</option>
                                                        <option value="Class II">Class II</option>
                                                        <option
                                                            value="Class III (Stage III/IV) w moderate ridge defects">
                                                            Class III (Stage III/IV) w
                                                            moderate ridge defects
                                                        </option>
                                                    </select>
                                                    <br>

                                                    <!-- P17 -->
                                                    <input type="Checkbox" id="P17Checkbox" class="TEST">
                                                    Ridge defects:
                                                    <select id="P17Dropdown" class="TEST">
                                                        <option value="None">None</option>
                                                        <option value="Moderate (Stage III)">Moderate (Stage III)
                                                        </option>
                                                        <option value="Severe (Stage IV)">Severe (Stage IV)</option>
                                                    </select>
                                                    <br>

                                                    <!-- P18 -->
                                                    <input type="Checkbox" id="P18Checkbox" class="TEST" checked
                                                           hidden="">
                                                    Addition (Stage IV):
                                                    <input type="text" id="P18TextInput" class="TEST"
                                                           placeholder="Enter details...">
                                                    <br><br>


                                                </td>


                                            </tr>


                                            <tr>
                                                <td>Extent & Distribution</td>
                                                <td>Add to stage as descriptor</td>
                                                <td colspan="3">For each stage, describe extent as localised (< 30% of
                                                    teeth
                                                    involved) or generalised,
                                                    or molar/incisor pattern. <input type="Checkbox" id="P19Checkbox"
                                                                                     class="TEST">
                                                    <select id="P19Dropdown" class="TEST">
                                                        <option value="Localized">Localized</option>
                                                        <option value="Generalized">Generalized</option>
                                                        <option value="Molar/incisor pattern">Molar/incisor pattern
                                                        </option>
                                                    </select></td>

                                            </tr>
                                            </tbody>
                                        </table>


                                        <!-- P15 -->


                                        <!-- P16 -->

                                        <strong>EXTENT & DISTRIBUTION</strong>
                                        <br>
                                        <br> <br>

                                        <table>
                                            <thead>
                                            <tr>
                                                <th colspan="2"></th>


                                                <th>Grade A</th>
                                                <th>Grade B</th>
                                                <th>Grade C</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <tr>
                                                <th colspan="5">
                                                    <center> Primary Criteria</center>
                                                </th>


                                            </tr>


                                            <tr>
                                                <th>Direct Evidence of Progression</th>
                                                <th>Longitudinal Data (radiographic bone loss or CAL)</th>
                                                <td><input type="Checkbox" id="P116Checkbox" class="TEST"> Evidence of
                                                    no
                                                    loss over 5 years.
                                                </td>
                                                <td><input type="Checkbox" id="P117Checkbox" class="TEST"> &lt;2mm over
                                                    5
                                                    years.
                                                </td>
                                                <td><input type="Checkbox" id="P118Checkbox" class="TEST"> &ge; 2mm over
                                                    5
                                                    years.
                                                </td>
                                            </tr>
                                            <tr>

                                                <th rowspan="2">Indirect Evidence of Progression</th>
                                                <th>Percent (%) of Progression (bone loss/age)</th>
                                                <td><input type="Checkbox" id="P119Checkbox" class="TEST"> &lt;0.25</td>
                                                <td><input type="Checkbox" id="P120Checkbox" class="TEST"> 0.25 – 1.0
                                                </td>
                                                <td><input type="Checkbox" id="P121Checkbox" class="TEST"> &gt;1.0</td>
                                            </tr>
                                            <tr>
                                                <th>Case Phenotype</th>
                                                <td><input type="Checkbox" id="P122Checkbox" class="TEST"> Heavy biofilm
                                                    deposits with low levels of
                                                    destruction.
                                                </td>
                                                <td><input type="Checkbox" id="P123Checkbox" class="TEST"> Destruction
                                                    commensurate with biofilm
                                                    deposits.
                                                </td>
                                                <td><input type="Checkbox" id="P124Checkbox" class="TEST"> Destruction
                                                    disproportionate to biofilm
                                                    deposits; evidence of periods of rapid progression and/or
                                                    early-onset
                                                    disease (molar/incisor
                                                    pattern); expected poor response to standard bacterial control.
                                                </td>
                                            </tr>

                                            <tr>
                                                <th colspan="5">
                                                    <center>Grade Modifier</center>
                                                </th>


                                            </tr>

                                            <tr>

                                                <th rowspan="2">Risk Factors</th>
                                                <th>Smoking</th>
                                                <td><input type="Checkbox" id="P125Checkbox" class="TEST"> Non-smoker
                                                </td>
                                                <td><input type="Checkbox" id="P126Checkbox" class="TEST"> Smoker &lt;
                                                    10
                                                    cigarettes/day
                                                </td>
                                                <td><input type="Checkbox" id="P127Checkbox" class="TEST"> Smoker &ge;10
                                                    cigarettes/day
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Diabetes</th>
                                                <td><input type="Checkbox" id="P128Checkbox" class="TEST"> Normoglycemic
                                                    /
                                                    no diagnosis of Diabetes
                                                </td>
                                                <td><input type="Checkbox" id="P129Checkbox" class="TEST"> HbA1c &lt;
                                                    7.0%
                                                    in a Diabetes Patient
                                                </td>
                                                <td><input type="Checkbox" id="P130Checkbox" class="TEST"> HbA1c &ge;
                                                    7.0 %
                                                    in a Diabetes Patient
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>

                                        <strong>DX</strong>
                                        <br>
                                        <!-- P25 -->
                                        <input type="Checkbox" id="P25Checkbox" class="TEST">


                                        Stage
                                        <select id="P25ADropdown" class="TEST">
                                            <option value="Stage I">Stage I</option>
                                            <option value="Stage II">Stage II</option>
                                            <option value="Stage III">Stage III</option>
                                            <option value="Stage Iv">Stage IV</option>
                                        </select> </td>

                                        <select id="P19BDropdown" class="TEST">
                                            <option value="Localized">Localized</option>
                                            <option value="Generalized">Generalized</option>
                                            <option value="Molar/incisor pattern">Molar/incisor pattern</option>
                                        </select>, Grade <select id="P25BDropdown" class="TEST">
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                        </select> </td> periodontitis

                                        <br>

                                        <input type="Checkbox" id="perio1G22Checkbox" class="TEST"> Pt well on discharge
                                        <br>
                                        <input type="Checkbox" id="perio1supervisorCheckbox"> Supervisor: Dr
                                        <input type="text" id="perio1supervisornameTextInput"
                                               placeholder="Enter details..."> <br>

                                        <input type="Checkbox" id="perio1nvCheckbox" class="TEST"> N/V:
                                        <input type="text" id="perio1nvTextInput" class="TEST"
                                               placeholder="Enter details..."> <br>


                                    </div>
                                    <button class="toggle-button" id="button11">250 Active non-surgical periodontal
                                        therapy
                                        - per
                                        quadrant
                                    </button>
                                    <input type="Checkbox" id="E250Checkbox" class="TEST">

                                    <div id="250Section" class="section">


                                        <input type="Checkbox" id="ptperio2Checkbox" class="TEST"> Pt. presented to
                                        <select id="perio2yearDropdown" class="TEST">

                                            <option value="3rd Year">3rd Year</option>
                                            <option value="4th Year">4th Year</option>
                                            <option value="5th Year">5th Year</option>
                                        </select>
                                        <select id="perio2clinicDropdown" class="TEST">
                                            <option value="Perio Clinic">Perio Clinic</option>
                                            <option value="Pros Clinic">Pros Clinic</option>

                                            <option value="GDP Clinic">GDP Clinic</option>
                                        </select>
                                        <select id="perio2codeDropdown" class="TEST">
                                            <option value="5.1">5.1</option>
                                            <option value="5.2">5.2</option>
                                            <option value="2.1">2.1</option>
                                            <option value="3.1">3.1</option>
                                            <option value="3.2">3.2</option>
                                            <option value="3.3">3.3</option>
                                            <option value="3.4">3.4</option>
                                            <option value="4.1">4.1</option>
                                            <option value="4.2">4.2</option>
                                            <option value="6.2">6.2</option>
                                            <option value="6.3">6.3</option>
                                        </select>
                                        for
                                        <select id="perio2typeDropdown" class="TEST">
                                            <option value="Perio scaling ">Perio Scaling</option>
                                            <option value="011">011</option>
                                            <option value="S/C">S/C</option>
                                            <option value="Consult">Consult</option>
                                        </select>
                                        OR
                                        <input type="text" id="perio2A1TextInput" class="TEST"
                                               placeholder="Enter details..."> <br>
                                        <input type="Checkbox" id="perio2c3sCheckbox" class="TEST"> 3C’s confirmed
                                        <input type="text" id="perio2c3sTextInput" class="TEST"
                                               placeholder="Enter details..."> <br>

                                        <input type="Checkbox" id="perio2colgateCheckbox" class="TEST"> Colgate 1.5%
                                        Hydrogen Peroxide Mouth rinse
                                        given. <br>

                                        <input type="Checkbox" id="perio2medicalHxCheckbox" class="TEST"> Medical Hx
                                        <select id="perio2hxDropdown" class="TEST">
                                            <option value="updated">Updated</option>
                                            <option value="verified">Verified</option>
                                            <option value="taken">taken</option>
                                        </select> <br><br>

                                        <strong> LA</strong>
                                        <br>
                                        <input type="Checkbox" id="LAperio26Checkbox" class="TEST">
                                        LA/Topical Used
                                        <select id="LAperio26Dropdown" class="TEST">
                                            <option value="Topical 5% Xylocaine LA used">Topical 5% Xylocaine AND (See
                                                below)
                                            </option>
                                            <option value="No LA/Topical used">No LA/Topical used</option>
                                        </select>
                                        <br>
                                        <input type="Checkbox" id="LAperio27Checkbox" class="TEST">
                                        <select id="LAperio27Dropdown" class="TEST">
                                            <option value="2.2mL Lignospan: 2% Lignocaine w Adrenaline 1:80,000">2.2mL
                                                Lignospan
                                            </option>
                                            <option value="2.2mL Septanest: 4% Articaine w Adrenaline 1:100,000">2.2mL
                                                Septanest
                                            </option>
                                            <option value="2.2mL Scandonest: 3% Mepivacaine">2.2mL Scandonest</option>
                                        </select>
                                        VIA
                                        <select id="LAperio27InfilDropdown" class="TEST">
                                            <option value="palatal infil">Palatal Infiltration</option>
                                            <option value="buccal infil">Buccal Infiltration</option>
                                            <option value="IDB">Inferior Dental Block</option>
                                            <option value="long buccal">Long Buccal</option>
                                        </select>
                                        <br>


                                        <input type="Checkbox" id="p40Checkbox5" class="TEST">
                                        U/S & hand scaling (Gracey curettes) used to debride all sub- & supra-gingival
                                        surfaces. All calculus &
                                        plaque removed.
                                        <br><br>

                                        <!-- Checkbox 6 -->
                                        <input type="Checkbox" id="p40Checkbox6" class="TEST">
                                        Prophy paste used to clean & polish all supragingival surfaces. Floss confirmed
                                        removal of calculus on
                                        interproximal surfaces.
                                        <br><br>

                                        <!-- Checkbox 7 -->
                                        <input type="Checkbox" id="p40Checkbox7" class="TEST">
                                        OHI reinforced to patient.
                                        <br><br>

                                        <strong>REMAINING Tx PLAN</strong>
                                        <br><br>
                                        <!-- Checkbox 8 -->
                                        <input type="Checkbox" id="p40Checkbox8" class="TEST">
                                        250 x2 Active non-surgical perio tx Q2 & Q3 w LA.
                                        <br><br>

                                        <!-- Checkbox 9 -->
                                        <input type="Checkbox" id="p40Checkbox9" class="TEST">
                                        251 Supportive periodontal therapy/review.
                                        <br><br>

                                        <strong>POST OP</strong>
                                        <br><br>
                                        <!-- Checkbox 10 -->
                                        <input type="Checkbox" id="p40Checkbox10" class="TEST">
                                        POIG regarding bleeding, sensitivity & gap formation (if any).
                                        <br><br>


                                        <input type="Checkbox" id="perio2G22Checkbox" class="TEST"> Pt well on discharge
                                        <br>
                                        <input type="Checkbox" id="perio2supervisorCheckbox"> Supervisor: Dr
                                        <input type="text" id="perio2supervisornameTextInput"
                                               placeholder="Enter details..."> <br>

                                        <input type="Checkbox" id="perio2nvCheckbox" class="TEST"> N/V:
                                        <input type="text" id="perio2nvTextInput" class="TEST"
                                               placeholder="Enter details..."> <br>
                                    </div>


                                    <hr>
                                </div>
                                <button class="toggle-button5" id="button12">ORAL SURGERY (3xx))</button>
                                <div id="surgSection1" class="section">
                                    <button class="toggle-button" id="button13">Oral Surg</button>
                                    <input type="Checkbox" id="F1Checkbox" class="TEST">

                                    <div id="oralsurgSection" class="section">

                                        <input type="Checkbox" id="ptsurg1Checkbox" class="TEST"> Pt. presented to
                                        <select id="surg1yearDropdown" class="TEST">

                                            <option value="3rd Year">3rd Year</option>
                                            <option value="4th Year">4th Year</option>
                                            <option value="5th Year">5th Year</option>
                                        </select>
                                        <select id="surg1clinicDropdown" class="TEST">
                                            <option value="Oral surgery Clinic">Oral surgery Clinic</option>
                                            <option value="Perio Clinic">Perio Clinic</option>
                                            <option value="GDP Clinic">GDP Clinic</option>
                                        </select>
                                        <select id="surg1codeDropdown" class="TEST">
                                            <option value="6.2">6.2</option>
                                            <option value="5.1">5.1</option>
                                            <option value="5.2">5.2</option>
                                            <option value="2.1">2.1</option>
                                            <option value="3.1">3.1</option>
                                            <option value="3.2">3.2</option>
                                            <option value="3.3">3.3</option>
                                            <option value="3.4">3.4</option>
                                            <option value="4.1">4.1</option>
                                            <option value="4.2">4.2</option>

                                            <option value="6.3">6.3</option>
                                        </select> Exos
                                        for
                                        <select id="surg1typeDropdown" class="TEST">
                                            <option value="Exos"> Exos</option>
                                            <option value="011">011</option>
                                            <option value="S/C">S/C</option>
                                            <option value="Consult">Consult</option>
                                        </select>
                                        OR
                                        <input type="text" id="surg1A1TextInput" class="TEST"
                                               placeholder="Enter details..."> <br>
                                        <input type="Checkbox" id="surg1c3sCheckbox" class="TEST"> 3C’s confirmed
                                        <input type="text" id="surg1c3sTextInput" class="TEST"
                                               placeholder="Enter details..."> <br>

                                        <input type="Checkbox" id="surg1colgateCheckbox" class="TEST"> Colgate 1.5%
                                        Hydrogen
                                        Peroxide Mouth rinse
                                        given. <br>

                                        <input type="Checkbox" id="surg1medicalHxCheckbox" class="TEST"> Medical Hx
                                        <select id="surg1hxDropdown" class="TEST">
                                            <option value="updated">Updated</option>
                                            <option value="verified">Verified</option>
                                            <option value="taken">taken</option>
                                        </select> <br><br>


                                        <input type="Checkbox" id="o1Checkbox3" class="TEST" checked hidden="">
                                        Tooth of interest:

                                        <input type="text" id="o1TextInput3" class="TEST"
                                               placeholder="Enter details..."><br><br>


                                        <input type="Checkbox" id="o1Checkbox3A" class="TEST" checked hidden="">
                                        RADIOGRAPHIC FINDINGS
                                        <input type="text" id="o1TextInput3A" class="TEST"
                                               placeholder="Enter details..."><br>


                                        <input type="Checkbox" id="o1Checkbox4" class="TEST" checked hidden="">
                                        CLINICAL EXAMINATION

                                        <input type="text" id="o1TextInput4" class="TEST"
                                               placeholder="Enter details..."><br><br>


                                        <input type="Checkbox" id="o1Checkbox5" class="TEST">
                                        Pt informed of the risks & complications of the procedure including damage to
                                        soft
                                        tissue, adjacent teeth,
                                        infection, bleeding, swelling, dry socket, numbness & pain. Tooth replacement
                                        options discussed & pt
                                        understood.
                                        <br><br>

                                        <strong>Tx DELIVERED</strong>
                                        <br>


                                        <input type="Checkbox" id="OA11Checkbox" class="TEST">
                                        LA/Topical Used
                                        <select id="OA11Dropdown" class="TEST">
                                            <option value="Topical 5% Xylocaine LA used">Topical 5% Xylocaine AND (See
                                                below)
                                            </option>
                                            <option value="No LA/Topical used">No LA/Topical used</option>
                                        </select>
                                        <br>
                                        <input type="Checkbox" id="OA12Checkbox" class="TEST">
                                        <select id="OA12Dropdown" class="TEST">
                                            <option value="2.2mL Lignospan: 2% Lignocaine w Adrenaline 1:80,000">2.2mL
                                                Lignospan
                                            </option>
                                            <option value="2.2mL Septanest: 4% Articaine w Adrenaline 1:100,000">2.2mL
                                                Septanest
                                            </option>
                                            <option value="2.2mL Scandonest: 3% Mepivacaine">2.2mL Scandonest</option>
                                        </select>
                                        VIA
                                        <select id="OA12InfilDropdown" class="TEST">
                                            <option value="palatal infil">Palatal Infiltration</option>
                                            <option value="buccal infil">Buccal Infiltration</option>
                                            <option value="IDB">Inferior Dental Block</option>
                                            <option value="long buccal">Long Buccal</option>
                                        </select>
                                        <br><br>

                                        <!-- Checkbox 6 -->
                                        <input type="Checkbox" id="o1Checkbox6" class="TEST">
                                        Luxators, elevators, forceps used to decuff & deliver the tooth.
                                        <br>

                                        <!-- Checkbox 7 -->
                                        <input type="Checkbox" id="o1Checkbox7" class="TEST">
                                        Tooth & socket inspected for fragments. Nil root fragments. Socket compressed
                                        immediately.
                                        <br>

                                        <!-- Checkbox 8 -->
                                        <input type="Checkbox" id="o1Checkbox8" class="TEST">
                                        Haemostasis achieved (HA) w/ gauze OR simple interrupted suture w/ 3-0 VR with
                                        Gelfoam.
                                        <br><br>
                                        <input type="Checkbox" id="o1Checkbox8A" class="TEST">
                                        <strong>REMAINING TX PLAN</strong>
                                        <br><br><br>
                                        <!-- Checkbox 9 -->

                                        <!-- Checkbox 10 -->
                                        <input type="Checkbox" id="o1Checkbox10" class="TEST">
                                        POIG (regarding numbness, pain, swelling, bleeding, infection) & gauze packs w/
                                        instruction on usage
                                        provided.
                                        <br><br>


                                        <input type="Checkbox" id="surg1G22Checkbox" class="TEST"> Pt well on discharge
                                        <br>
                                        <input type="Checkbox" id="surg1supervisorCheckbox"> Supervisor: Dr
                                        <input type="text" id="surg1supervisornameTextInput"
                                               placeholder="Enter details...">
                                        <br>

                                        <input type="Checkbox" id="surg1nvCheckbox" class="TEST"> N/V:
                                        <input type="text" id="surg1nvTextInput" class="TEST"
                                               placeholder="Enter details..."> <br>


                                    </div>

                                    <button class="toggle-button2" id="button166">ORAL SURGERY POST-OPERATIVE
                                        INSTRUCTIONS
                                    </button>


                                    <div id="oralsurg2Section" class="section">

                                        <h2>ORAL SURGERY POST-OPERATIVE INSTRUCTIONS</h2>

                                        <table>
                                            <tr>
                                                <th>Time Frame</th>
                                                <th>Instructions</th>
                                            </tr>
                                            <tr>
                                                <td>Immediately</td>
                                                <td>
                                                    <ol>
                                                        <li><strong>Numbness:</strong> Avoid eating for the next few
                                                            hours
                                                            until the numbness has worn off
                                                            to avoid biting & burning yourself.
                                                        </li>
                                                        <li><strong>Pain:</strong> You can expect some pain because the
                                                            tissue has been disturbed during the
                                                            treatment. Control pain by taking paracetamol (if no
                                                            allergy)
                                                            and/or ibuprofen. Call the clinic if
                                                            pain persists.
                                                        </li>
                                                        <li><strong>Bleeding:</strong> There may be some bleeding enough
                                                            to
                                                            discolor your saliva for a few
                                                            hours. Apply a clean gauze (do not use tissue) & keep it in
                                                            place by applying pressure firmly by
                                                            closing your jaws on it for at least 10 mins.
                                                        </li>
                                                        <li><strong>Swelling:</strong> Some swelling or difficulty in
                                                            opening the mouth is common & should
                                                            subside after 1-2 days. Use an ice pack on the outside of
                                                            the
                                                            face wrapped in a cloth to reduce
                                                            facial swelling.
                                                        </li>
                                                    </ol>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>First 24h</td>
                                                <td>
                                                    <ol>
                                                        <li>Avoid excessive activity or heavy lifting for about 24 hours
                                                            (may increase the risk of
                                                            bleeding).
                                                        </li>
                                                        <li>Try to keep your head elevated when lying down (decreases
                                                            the
                                                            risk of bleeding).
                                                        </li>
                                                        <li>Start with soft food (i.e. scrambled eggs, finely chopped
                                                            meat
                                                            or cheese, milk, soup or fruit
                                                            juice) & chew on the opposite side of the mouth to the
                                                            wound.
                                                        </li>
                                                        <li>Important to maintain good oral hygiene as usual (to prevent
                                                            infection) but avoid disturbing the
                                                            blood clot or rinsing the mouth for the first 24 hrs after
                                                            surgery (prevent washing blood clot
                                                            away).
                                                        </li>
                                                    </ol>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>After 24h & throughout healing (up to a week)</td>
                                                <td>
                                                    <ol>
                                                        <li>You can start rinsing your mouth gently, especially after
                                                            meals,
                                                            with ½ teaspoon of table salt
                                                            in a glass of lukewarm water.
                                                        </li>
                                                        <li>Avoid disturbing the blood clot by creating too much
                                                            pressure
                                                            (using a straw or smoking) or with
                                                            objects.
                                                        </li>
                                                        <li>If swelling persists, use a warm pack on the outside of the
                                                            face
                                                            wrapped in a cloth to promote
                                                            healing.
                                                        </li>
                                                        <li>Avoid smoking or drinking as it delays healing.</li>
                                                    </ol>
                                                </td>
                                            </tr>
                                        </table>


                                    </div>
                                    <hr>
                                </div>
                                <button class="toggle-button5" id="button14">ENDODONTICS (4xx)</button>
                                <div id="endoSection1" class="section">
                                    <button class="toggle-button2" id="button15">014 Consultation (endodontics)</button>
                                    <input type="Checkbox" id="endo1allCheckbox" class="TEST">

                                    <div id="endo1Section" class="section">
                                        <h3>014 Consultation (endodontics)</h3>
                                        <input type="Checkbox" id="ptendo1Checkbox" class="TEST">
                                        Pt. presented to
                                        <select id="endo1yearDropdown" class="TEST">
                                            <option value="4th Year">4th Year</option>
                                            <option value="5th Year">5th Year</option>
                                        </select>
                                        <select id="endo1clinicDropdown" class="TEST">
                                            <option value="Endo Clinic">Endo Clinic</option>
                                            <option value="Pros Clinic">Pros Clinic</option>
                                            <option value="Perio Clinic">Perio Clinic</option>
                                            <option value="GDP Clinic">GDP Clinic</option>
                                        </select>
                                        <select id="endo1codeDropdown" class="TEST">
                                            <option value="3.1">3.1</option>
                                            <option value="2.1">2.1</option>
                                            <option value="3.1">3.1</option>
                                            <option value="3.2">3.2</option>
                                            <option value="3.3">3.3</option>
                                            <option value="3.4">3.4</option>
                                            <option value="5.1">5.1</option>
                                            <option value="5.2">5.2</option>
                                            <option value="4.1">4.1</option>
                                            <option value="4.2">4.2</option>
                                            <option value="6.2">6.2</option>
                                            <option value="6.3">6.3</option>
                                        </select>
                                        for
                                        <select id="endo1typeDropdown" class="TEST">
                                            <option value="Endo Consult (014)"> Endo Consult (014)</option>
                                            <option value="011">011</option>
                                            <option value="S/C">S/C</option>
                                            <option value="Consult">Consult</option>
                                        </select>
                                        OR
                                        <input type="text" id="endo1A1TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="endo1c3sCheckbox" class="TEST">
                                        3C’s confirmed
                                        <input type="text" id="endo1c3sTextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="endo1colgateCheckbox" class="TEST">
                                        Colgate 1.5% Hydrogen Peroxide Mouth rinse given. <br>
                                        <input type="Checkbox" id="endo1medicalHxCheckbox" class="TEST">
                                        Medical Hx
                                        <select id="endo1hxDropdown" class="TEST">
                                            <option value="updated">Updated</option>
                                            <option value="verified">Verified</option>
                                            <option value="taken">taken</option>
                                        </select>
                                        <br>
                                        <br>

                                        <input type="Checkbox" id="E1Checkbox" class="TEST">
                                        <strong> CLINICAL FINDINGS </strong><br>
                                        <input type="Checkbox" id="E1ACheckbox" class="TEST">
                                        Discoloration:
                                        <select id="E1ADropdown" class="TEST">
                                            <option value="unchanged">unchanged</option>
                                            <option value="yellowish">yellowish</option>
                                            <option value="grey">grey</option>
                                        </select>
                                        <br>
                                        <input type="Checkbox" id="E1BCheckbox" class="TEST">
                                        Swelling:
                                        <select id="E1BDropdown" class="TEST">
                                            <option value="none">none</option>
                                            <option value="intraoral">intraoral</option>
                                            <option value="extraoral">extraoral</option>
                                        </select>
                                        <br>
                                        <input type="Checkbox" id="E1CCheckbox" class="TEST">
                                        Sinus tract:
                                        <select id="E1CDropdown" class="TEST">
                                            <option value="present">present</option>
                                            <option value="absent">absent</option>
                                        </select>
                                        <br>
                                        <br>
                                        <strong> HX OF TOOTH </strong><br>
                                        <input type="Checkbox" id="E2Checkbox" class="TEST">
                                        PA radiograph taken. RADIOGRAPHIC EXAMINATION <br>
                                        <input type="Checkbox" id="E3Checkbox" class="TEST" checked hidden="">
                                        Carious w/wo exposure
                                        <input type="text" id="E3TextInput" class="TEST" placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="E4Checkbox" class="TEST" checked hidden="">
                                        Restored
                                        <input type="text" id="E4TextInput" class="TEST" placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="E5Checkbox" class="TEST" checked hidden="">
                                        Pulp capping
                                        <input type="text" id="E5TextInput" class="TEST" placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="E7Checkbox" class="TEST" checked hidden="">
                                        Hx of trauma
                                        <input type="text" id="E7TextInput" class="TEST" placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="E8Checkbox" class="TEST" checked hidden="">
                                        Previous pulpotomy
                                        <input type="text" id="E8TextInput" class="TEST" placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="E9Checkbox" class="TEST" checked hidden="">
                                        Previously root treated
                                        <input type="text" id="E9TextInput" class="TEST" placeholder="Enter details...">
                                        <br>
                                        <br>
                                        <br>
                                        <input type="Checkbox" id="E10Checkbox" class="TEST">
                                        PULP SENSIBILITY TESTS performed. <br>

                                        <table>
                                            <tr>
                                                <th>Tests</th>
                                                <th><input type="text1" id="E11TextInput" class="TEST"
                                                           placeholder="Tooth #"></th>
                                                <th><input type="text1" id="E11BTextInput" class="TEST"
                                                           placeholder="Tooth #"></th>
                                                <th><input type="text1" id="E11CTextInput" class="TEST"
                                                           placeholder="Tooth #"></th>
                                            </tr>


                                            <tr>
                                                <th><input type="Checkbox" id="E11Checkbox" class="TEST">Cold</th>
                                                <td><select id="E11Dropdown" class="TEST">
                                                        <option value=""></option>
                                                        <option value=""></option>
                                                        <option value="Normal">Normal</option>
                                                        <option value="(+)">(+)</option>
                                                        <option value="(++)">(++)</option>
                                                        <option value="(+++)">(+++)</option>
                                                        <option value="(-)">(-)</option>
                                                    </select>
                                                </td>

                                                <td><select id="E11BDropdown" class="TEST">
                                                        <option value=""></option>
                                                        <option value=""></option>
                                                        <option value="Normal">Normal</option>
                                                        <option value="(+)">(+)</option>
                                                        <option value="(++)">(++)</option>
                                                        <option value="(+++)">(+++)</option>
                                                        <option value="(-)">(-)</option>
                                                    </select>
                                                </td>

                                                <td><select id="E11CDropdown" class="TEST">
                                                        <option value=""></option>
                                                        <option value=""></option>
                                                        <option value="Normal">Normal</option>
                                                        <option value="(+)">(+)</option>
                                                        <option value="(++)">(++)</option>
                                                        <option value="(+++)">(+++)</option>
                                                        <option value="(-)">(-)</option>
                                                    </select>
                                                </td>


                                            </tr>


                                            <tr>
                                                <th><input type="Checkbox" id="E12Checkbox" class="TEST">EPT</th>
                                                <td>


                                                    <select id="E12Dropdown" class="TEST">
                                                        <option value=""></option>
                                                        <option value="Normal">Normal</option>
                                                        <option value="(+)">(+)</option>
                                                        <option value="(++)">(++)</option>
                                                        <option value="(+++)">(+++)</option>
                                                        <option value="(-)">(-)</option>
                                                    </select>
                                                </td>

                                                <td>


                                                    <select id="E12BDropdown" class="TEST">
                                                        <option value=""></option>
                                                        <option value="Normal">Normal</option>
                                                        <option value="(+)">(+)</option>
                                                        <option value="(++)">(++)</option>
                                                        <option value="(+++)">(+++)</option>
                                                        <option value="(-)">(-)</option>
                                                    </select>
                                                </td>

                                                <td>


                                                    <select id="E12CDropdown" class="TEST">
                                                        <option value=""></option>
                                                        <option value="Normal">Normal</option>
                                                        <option value="(+)">(+)</option>
                                                        <option value="(++)">(++)</option>
                                                        <option value="(+++)">(+++)</option>
                                                        <option value="(-)">(-)</option>
                                                    </select>
                                                </td>


                                            </tr>
                                            <tr>
                                                <th><input type="Checkbox" id="E13Checkbox" class="TEST">Palpation</th>
                                                <td>


                                                    <select id="E13Dropdown" class="TEST">
                                                        <option value=""></option>
                                                        <option value="Normal">Normal</option>
                                                        <option value="(+)">(+)</option>
                                                        <option value="(++)">(++)</option>
                                                        <option value="(+++)">(+++)</option>
                                                        <option value="(-)">(-)</option>
                                                    </select>
                                                </td>

                                                <td>


                                                    <select id="E13BDropdown" class="TEST">
                                                        <option value=""></option>
                                                        <option value="Normal">Normal</option>
                                                        <option value="(+)">(+)</option>
                                                        <option value="(++)">(++)</option>
                                                        <option value="(+++)">(+++)</option>
                                                        <option value="(-)">(-)</option>
                                                    </select>
                                                </td>

                                                <td>


                                                    <select id="E13CDropdown" class="TEST">
                                                        <option value=""></option>
                                                        <option value="Normal">Normal</option>
                                                        <option value="(+)">(+)</option>
                                                        <option value="(++)">(++)</option>
                                                        <option value="(+++)">(+++)</option>
                                                        <option value="(-)">(-)</option>
                                                    </select>
                                                </td>

                                            </tr>

                                            <tr>
                                                <th><input type="Checkbox" id="E15Checkbox" class="TEST">Percussion</th>
                                                <td>


                                                    <select id="E15Dropdown" class="TEST">
                                                        <option value=""></option>
                                                        <option value="Normal">Normal</option>
                                                        <option value="(+)">(+)</option>
                                                        <option value="(++)">(++)</option>
                                                        <option value="(+++)">(+++)</option>
                                                        <option value="(-)">(-)</option>
                                                    </select>
                                                </td>
                                                <td>


                                                    <select id="E15BDropdown" class="TEST">
                                                        <option value=""></option>
                                                        <option value="Normal">Normal</option>
                                                        <option value="(+)">(+)</option>
                                                        <option value="(++)">(++)</option>
                                                        <option value="(+++)">(+++)</option>
                                                        <option value="(-)">(-)</option>
                                                    </select>
                                                </td>

                                                <td>


                                                    <select id="E15CDropdown" class="TEST">
                                                        <option value=""></option>
                                                        <option value="Normal">Normal</option>
                                                        <option value="(+)">(+)</option>
                                                        <option value="(++)">(++)</option>
                                                        <option value="(+++)">(+++)</option>
                                                        <option value="(-)">(-)</option>
                                                    </select>
                                                </td>

                                            </tr>

                                            <tr>
                                                <th><input type="Checkbox" id="E16Checkbox" class="TEST">Mobility</th>
                                                <td>


                                                    <select id="E16Dropdown" class="TEST">
                                                        <option value=""></option>
                                                        <option value="Normal">Normal</option>
                                                        <option value="(+)">(+)</option>
                                                        <option value="(++)">(++)</option>
                                                        <option value="(+++)">(+++)</option>
                                                        <option value="(-)">(-)</option>
                                                    </select>
                                                </td>

                                                <td>


                                                    <select id="E16BDropdown" class="TEST">
                                                        <option value=""></option>
                                                        <option value="Normal">Normal</option>
                                                        <option value="(+)">(+)</option>
                                                        <option value="(++)">(++)</option>
                                                        <option value="(+++)">(+++)</option>
                                                        <option value="(-)">(-)</option>
                                                    </select>
                                                </td>
                                                <td>


                                                    <select id="E16CDropdown" class="TEST">
                                                        <option value=""></option>
                                                        <option value="Normal">Normal</option>
                                                        <option value="(+)">(+)</option>
                                                        <option value="(++)">(++)</option>
                                                        <option value="(+++)">(+++)</option>
                                                        <option value="(-)">(-)</option>
                                                    </select>
                                                </td>

                                            </tr>

                                        </table>


                                        <br>


                                        <br>

                                        <br>
                                        <input type="Checkbox" id="E17Checkbox" class="TEST" checked hidden="">Abnormal
                                        Probing:
                                        <input type="text" id="E17TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <br>
                                        <input type="Checkbox" id="E18Checkbox" class="TEST">
                                        PULPAL DX

                                        <select id="E18Dropdown" class="TEST">
                                            <option value="Normal pulp">Normal pulp</option>
                                            <option value="Reversible pulpitis">Reversible pulpitis</option>
                                            <option value="Symptomatic irreversible pulpitis">Symptomatic irreversible
                                                pulpitis
                                            </option>
                                            <option value="Asymptomatic irreversible pulpitis">Asymptomatic irreversible
                                                pulpitis
                                            </option>
                                            <option value="Pulp necrosis">present</option>
                                            <option value="Previous RCT initiated">Previous RCT initiated</option>
                                            <option value="Previous RCT completed">Previous RCT completed</option>
                                        </select>
                                        <br>
                                        <input type="Checkbox" id="E19Checkbox" class="TEST">
                                        PERIAPICAL DX
                                        <select id="E19Dropdown" class="TEST">
                                            <option value=""></option>
                                            <option value="Normal">Normal</option>
                                            <option value="Symptomatic apical periodontitis">Symptomatic apical
                                                periodontitis
                                            </option>
                                            <option value="Asymptomatic apical periodontitis">Asymptomatic apical
                                                periodontitis
                                            </option>
                                            <option value="Acute apical abscess">Acute apical abscess</option>
                                            <option value="Chronic apical abscess">Chronic apical abscess</option>
                                            <option value="Condensing osteitis">Condensing osteitis</option>
                                        </select>
                                        <br>
                                        <br>
                                        <input type="Checkbox" id="E20Checkbox" class="TEST">
                                        Results from tests & diagnosis were discussed with pt. <br>
                                        <input type="Checkbox" id="E21Checkbox" class="TEST">
                                        TX OPTIONS
                                        <select id="E21Dropdown" class="TEST">
                                            <option value="RCT w direct/indirect restoration">RCT w direct restoration
                                            </option>
                                            <option value="RCT w direct/indirect restoration">RCT w indirect restoration
                                            </option>
                                            <option value="> Extraction w removable/fixed prothesis">> Extraction w
                                                fixed
                                                prothesis
                                            </option>
                                            <option value="> Extraction w removable/fixed prothesis">> Extraction w
                                                removable prothesis
                                            </option>
                                        </select>
                                        <br>
                                        <br>
                                        <input type="Checkbox" id="E22Checkbox" class="TEST">
                                        Advantages & disadvantages of each Tx option were discussed with patient,
                                        written
                                        information sheets
                                        provided. <br>
                                        <input type="Checkbox" id="E23Checkbox" class="TEST">
                                        The patient understood the advantages, risks, as well as the cost involved in
                                        RCT,
                                        including the need for
                                        multiple visits, and consented for RCT. <br>
                                        <br>
                                        <input type="Checkbox" id="E24Checkbox" class="TEST">
                                        Post-endodontic restorative options discussed: <br>
                                        <input type="Checkbox" id="E25Checkbox" class="TEST">
                                        1) Bonded composite
                                        <select id="E25Dropdown" class="TEST">
                                            <option value="(short-term resto for posterior teeth)">(short-term resto for
                                                posterior teeth)
                                            </option>
                                            <option value="(anterior tooth w sufficient remaining tooth structure)">
                                                (anterior tooth w sufficient
                                                remaining tooth structure)
                                            </option>
                                        </select>
                                        <br>
                                        <input type="Checkbox" id="E26Checkbox" class="TEST">
                                        2) Crown
                                        <select id="E26Dropdown" class="TEST">
                                            <option value="(anterior w extensive proximal caries/resto)">(anterior w
                                                extensive proximal caries/resto)
                                            </option>
                                            <option value="(posterior for cuspal coverage against occlusal forces)">
                                                (posterior for cuspal coverage
                                                against occlusal forces)
                                            </option>
                                        </select>
                                        <br>
                                        <br>
                                        <input type="Checkbox" id="E27Checkbox" class="TEST">
                                        Pt understood that the type of final restoration recommended after RCT will be
                                        determined by the amount of
                                        tooth structure remaining after removal of existing restoration & caries & that
                                        a
                                        post may be indicated to
                                        retain the core. <br>
                                        <br>

                                        <br>
                                        <input type="Checkbox" id="endo1G22Checkbox" class="TEST">
                                        Pt well on discharge <br>
                                        <input type="Checkbox" id="endo1supervisorCheckbox">
                                        Supervisor: Dr
                                        <input type="text" id="endo1supervisornameTextInput"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="endo1nvCheckbox" class="TEST">
                                        N/V:
                                        <input type="text" id="endo1nvTextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                    </div>
                                    <br>
                                    <button class="toggle-button2" id="button16">414 Pulpotomy</button>
                                    <input type="Checkbox" id="endo2allCheckbox" class="TEST">

                                    <div id="endo2Section" class="section">
                                        <h3> 414 Pulpotomy</h3>
                                        <input type="Checkbox" id="ptendo2Checkbox" class="TEST">
                                        Pt. presented to
                                        <select id="endo2yearDropdown" class="TEST">
                                            <option value="4th Year">4th Year</option>
                                            <option value="3rd Year">3rd Year</option>

                                            <option value="5th Year">5th Year</option>
                                        </select>
                                        <select id="endo2clinicDropdown" class="TEST">
                                            <option value="Endo Clinic">Endo Clinic</option>
                                            <option value="Perio Clinic">Perio Clinic</option>
                                            <option value="GDP Clinic">GDP Clinic</option>
                                        </select>
                                        <select id="endo2codeDropdown" class="TEST">
                                            <option value="3.1">3.1</option>
                                            <option value="5.1">5.1</option>
                                            <option value="5.2">5.2</option>
                                            <option value="2.1">2.1</option>
                                            <option value="3.1">3.1</option>
                                            <option value="3.2">3.2</option>
                                            <option value="3.3">3.3</option>
                                            <option value="3.4">3.4</option>
                                            <option value="4.1">4.1</option>
                                            <option value="4.2">4.2</option>
                                            <option value="6.2">6.2</option>
                                            <option value="6.3">6.3</option>
                                        </select>
                                        for
                                        <select id="endo2typeDropdown" class="TEST">
                                            <option value="Pulpotomy">Pulpotomy</option>
                                            <option value="Emergency">Emergency</option>
                                            <option value="S/C">S/C</option>
                                            <option value="Consult">Consult</option>
                                        </select>
                                        OR
                                        <input type="text" id="endo2A1TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="endo2c3sCheckbox" class="TEST">
                                        3C’s confirmed
                                        <input type="text" id="endo2c3sTextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="endo2colgateCheckbox" class="TEST">
                                        Colgate 1.5% Hydrogen Peroxide Mouth rinse given. <br>
                                        <input type="Checkbox" id="endo2medicalHxCheckbox" class="TEST">
                                        Medical Hx
                                        <select id="endo2hxDropdown" class="TEST">
                                            <option value="updated">Updated</option>
                                            <option value="verified">Verified</option>
                                            <option value="taken">taken</option>
                                        </select>

                                        <br><br>
                                        <input type="Checkbox" id="E40Checkbox" class="TEST">
                                        Pt informed of the risks & complications of the procedure & an informed consent
                                        for
                                        tx was obtained.
                                        <br>
                                        <input type="Checkbox" id="E41Checkbox" class="TEST">
                                        LA/Topical Used
                                        <select id="E41Dropdown" class="TEST">
                                            <option value="Topical 5% Xylocaine LA used">Topical 5% Xylocaine AND (See
                                                below)
                                            </option>
                                            <option value="No LA/Topical used">No LA/Topical used</option>
                                        </select>
                                        <br>
                                        <input type="Checkbox" id="E42Checkbox" class="TEST">
                                        <select id="E42Dropdown" class="TEST">
                                            <option value="2.2mL Lignospan: 2% Lignocaine w Adrenaline 1:80,000">2.2mL
                                                Lignospan
                                            </option>
                                            <option value="2.2mL Septanest: 4% Articaine w Adrenaline 1:100,000">2.2mL
                                                Septanest
                                            </option>
                                            <option value="2.2mL Scandonest: 3% Mepivacaine">2.2mL Scandonest</option>
                                        </select>
                                        VIA
                                        <select id="E42InfilDropdown" class="TEST">
                                            <option value="palatal infil">Palatal Infiltration</option>
                                            <option value="buccal infil">Buccal Infiltration</option>
                                            <option value="IDB">Inferior Dental Block</option>
                                            <option value="long buccal">Long Buccal</option>
                                        </select>
                                        <br>
                                        <input type="Checkbox" id="E43Checkbox" class="TEST">
                                        Isolation
                                        <select id="E43Dropdown" class="TEST">
                                            <option value="Moisture control achieved through dental dam">Dental Dam
                                            </option>
                                            <option value="Cotton rolls isolation used">Cotton Rolls</option>
                                            <option value="Dry tips isolation used">Dry Tips</option>
                                        </select>
                                        <br><br>
                                        <input type="Checkbox" id="E44Checkbox" class="TEST">
                                        Cavity prepared using HS and SS, previous restoration removed/caries free.
                                        Exposed
                                        pulp reveals
                                        <select id="E44Dropdown" class="TEST">
                                            <option value="hemorrhagic inflamed pulp"> hemorrhagic inflamed pulp
                                            </option>
                                            <option value="necrotic pulp">necrotic pulp</option>
                                        </select>
                                        <br>
                                        <input type="Checkbox" id="E45Checkbox" class="TEST">Pulp amputation was
                                        performed
                                        using S/S #8 large round
                                        bur. Canal orifice(s) were visually inspected to ensure complete removal of the
                                        pulp
                                        tissue.
                                        <br>
                                        <br> <input type="Checkbox" id="E46Checkbox" class="TEST">Disinfection &
                                        hemostatis
                                        was achieved by
                                        compression of sterile cotton pellets soaked in 2% sodium hypochlorite over the
                                        pulp
                                        stump(s) using gentle
                                        pressure for 2-5mins.
                                        <br>
                                        <input type="Checkbox" id="E47Checkbox" class="TEST"> Access cavity is
                                        temporized
                                        with
                                        <select id="E47ADropdown" class="TEST">
                                            <option value="Odontopaste,">Odontopaste</option>
                                            <option value="calcium hydroxide paste,">calcium hydroxide paste</option>

                                        </select>

                                        <select id="E47BDropdown" class="TEST">
                                            <option value="">No cotton pellet</option>
                                            <option value=" Sterile cotton pellet,">Sterile cotton pellet</option>

                                        </select> &
                                        <select id="E47CDropdown" class="TEST">
                                            <option value=" Fuji 7 GIC (pink)">Fuji 7 GIC (pink)</option>
                                            <option value=" Cavit">Cavit</option>

                                        </select>


                                        <br> <input type="Checkbox" id="E48Checkbox" class="TEST">Cusps lightly reduced
                                        to
                                        take tooth out of
                                        occlusion for symptomatic relief & decrease risk of cuspal fracture (discussed
                                        with
                                        pt prior to tx)
                                        <br>
                                        <br>

                                        <input type="Checkbox" id="endo2G22Checkbox" class="TEST">
                                        Pt well on discharge <br>
                                        <input type="Checkbox" id="endo2supervisorCheckbox">
                                        Supervisor: Dr
                                        <input type="text" id="endo2supervisornameTextInput"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="endo2nvCheckbox" class="TEST">
                                        N/V:
                                        <input type="text" id="endo2nvTextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                    </div>
                                    <button class="toggle-button2" id="button17">415 Complete chemo-mechanical
                                        preparation
                                        of root canal – one
                                        canal
                                    </button>
                                    <input type="Checkbox" id="endo3allCheckbox" class="TEST">

                                    <div id="endo3Section" class="section">
                                        <h3></h3>
                                        <input type="Checkbox" id="ptendo3Checkbox" class="TEST">
                                        Pt. presented to
                                        <select id="endo3yearDropdown" class="TEST">
                                            <option value="4th Year">4th Year</option>
                                            <option value="3rd Year">3rd Year</option>

                                            <option value="5th Year">5th Year</option>
                                        </select>
                                        <select id="endo3clinicDropdown" class="TEST">
                                            <option value="Endo Clinic">Endo Clinic</option>
                                            <option value="Pros Clinic">Pros Clinic</option>
                                            <option value="Perio Clinic">Perio Clinic</option>
                                            <option value="GDP Clinic">GDP Clinic</option>
                                        </select>
                                        <select id="endo3codeDropdown" class="TEST">
                                            <option value="3.1">3.1</option>
                                            <option value="5.1">5.1</option>
                                            <option value="5.2">5.2</option>
                                            <option value="2.1">2.1</option>
                                            <option value="3.1">3.1</option>
                                            <option value="3.2">3.2</option>
                                            <option value="3.3">3.3</option>
                                            <option value="3.4">3.4</option>
                                            <option value="4.1">4.1</option>
                                            <option value="4.2">4.2</option>
                                            <option value="6.2">6.2</option>
                                            <option value="6.3">6.3</option>
                                        </select>
                                        for
                                        <select id="endo3typeDropdown" class="TEST">
                                            <option value="chemo-mechanical preparation of root canal">chemo-mechanical
                                                preparation of root canal
                                            </option>
                                            <option value="011">011</option>
                                            <option value="S/C">S/C</option>
                                            <option value="Consult">Consult</option>
                                        </select>
                                        OR
                                        <input type="text" id="endo3A1TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="endo3c3sCheckbox" class="TEST">
                                        3C’s confirmed
                                        <input type="text" id="endo3c3sTextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="endo3colgateCheckbox" class="TEST">
                                        Colgate 1.5% Hydrogen Peroxide Mouth rinse given. <br>
                                        <input type="Checkbox" id="endo3medicalHxCheckbox" class="TEST">
                                        Medical Hx
                                        <select id="endo3hxDropdown" class="TEST">
                                            <option value="updated">Updated</option>
                                            <option value="verified">Verified</option>
                                            <option value="taken">taken</option>
                                        </select><br><br>

                                        <input type="Checkbox" id="E50Checkbox" class="TEST">
                                        Advantages & disadvantages of each Tx option were discussed with patient,
                                        written
                                        information sheets
                                        provided.
                                        <br>
                                        <input type="Checkbox" id="E51Checkbox" class="TEST">
                                        The patient understood the advantages, risks, as well as the cost involved in
                                        RCT,
                                        including the need for
                                        multiple visits, and consented for RCT.
                                        <br>
                                        <br>

                                        Post-endodontic restorative options discussed:
                                        <br>
                                        <input type="Checkbox" id="E53Checkbox" class="TEST">
                                        1) Bonded composite

                                        <br>
                                        <input type="Checkbox" id="E54Checkbox" class="TEST">
                                        2) Crown

                                        <br>
                                        <br>
                                        <input type="Checkbox" id="E55Checkbox" class="TEST">
                                        Pt understood that the type of final restoration recommended after RCT will be
                                        determined by the amount of
                                        tooth structure remaining after removal of existing restoration & caries & that
                                        a
                                        post may be indicated to
                                        retain the core.
                                        <br>
                                        <br>

                                        <strong> LA</strong>
                                        <br>
                                        <input type="Checkbox" id="E56Checkbox" class="TEST">
                                        LA/Topical Used
                                        <select id="E56Dropdown" class="TEST">
                                            <option value="Topical 5% Xylocaine LA used">Topical 5% Xylocaine AND (See
                                                below)
                                            </option>
                                            <option value="No LA/Topical used">No LA/Topical used</option>
                                        </select>
                                        <br>
                                        <input type="Checkbox" id="E57Checkbox" class="TEST">
                                        <select id="E57Dropdown" class="TEST">
                                            <option value="2.2mL Lignospan: 2% Lignocaine w Adrenaline 1:80,000">2.2mL
                                                Lignospan
                                            </option>
                                            <option value="2.2mL Septanest: 4% Articaine w Adrenaline 1:100,000">2.2mL
                                                Septanest
                                            </option>
                                            <option value="2.2mL Scandonest: 3% Mepivacaine">2.2mL Scandonest</option>
                                        </select>
                                        VIA
                                        <select id="E57InfilDropdown" class="TEST">
                                            <option value="palatal infil">Palatal Infiltration</option>
                                            <option value="buccal infil">Buccal Infiltration</option>
                                            <option value="IDB">Inferior Dental Block</option>
                                            <option value="long buccal">Long Buccal</option>
                                        </select>
                                        <br>

                                        <input type="Checkbox" id="E58Checkbox" class="TEST">
                                        Isolation
                                        <select id="E58Dropdown" class="TEST">
                                            <option value="Moisture control achieved through dental dam">Dental Dam
                                            </option>
                                            <option value="Cotton rolls isolation used">Cotton Rolls</option>
                                            <option value="Dry tips isolation used">Dry Tips</option>
                                        </select>
                                        <br><br>

                                        <strong> Cavity Prep</strong>
                                        <br>

                                        <input type="Checkbox" id="E59Checkbox" class="TEST">
                                        Cavity prepared using HS and SS, previous restoration removed/caries free.
                                        <br>
                                        <input type="Checkbox" id="E60Checkbox" class="TEST">NIL pulp exposure/ Pulp
                                        exposed.
                                        <select id="E60Dropdown" class="TEST">
                                            <option value="NIL pulp exposure">NIL pulp exposure</option>
                                            <option
                                                value="Exposed pulp is covered with Teflon tape & cavit for pre-endodontic provisional restoration.">
                                                Exposed pulp is covered with Teflon tape & cavit for pre-endodontic
                                                provisional restoration.
                                            </option>
                                        </select>
                                        <br><br>

                                        <strong>Pre-Endo Resto</strong> <br>
                                        <input type="Checkbox" id="E61Checkbox" class="TEST">
                                        Etched with 37% phosphoric acid, clearfil primer and bond. Gradia
                                        <select id="E61GradiaDropdown" class="TEST">
                                            <option value="A1">A1</option>
                                            <option value="A2">A2</option>
                                            <option value="A3">A3</option>
                                            <option value="A3.5">A3.5</option>
                                        </select>
                                        <br>
                                        <input type="Checkbox" id="E62Checkbox" class="TEST">Pre-endodontic provisional
                                        restoration completed using
                                        GIC/ composite/ bulk fill flowable composite.
                                        <br>
                                        <input type="Checkbox" id="E63Checkbox" class="TEST">Access cavity prepared
                                        using
                                        H/S & U/S.
                                        <br><br>
                                        <br>
                                        <input type="Checkbox" id="E64Checkbox" class="TEST">
                                        <select id="E64Dropdown" class="TEST">
                                            <option value="1 Canal">1 Canal</option>
                                            <option value="2 Canals">2 Canals</option>
                                            <option value="3 Canals">3 Canals</option>
                                            <option value="4 Canals">4 Canals</option>
                                        </select> identified. XA Protaper was used to prepare the coronal 3rd of all
                                        canal(s)
                                        <br>
                                        <input type="Checkbox" id="E65Checkbox" class="TEST"> EWL estimated using
                                        pre-operative radiograph & apex
                                        locator. WL radiograph taken & CWL obtained.
                                        <br>
                                        <input type="Checkbox" id="E66Checkbox" class="TEST"> Proglider was used to
                                        prepare
                                        glide path in all
                                        canal(s). Canal(s) prepared up to Protaper
                                        <select id="E66ProtaperDropdown" class="TEST">
                                            <option value="X2">X2</option>
                                            <option value="X1">X1</option>
                                            <option value="X3">X3</option>
                                            <option value="X4">X4</option>
                                        </select>, irrigated with 4% sodium hypochlorite & recapitulated with size 10
                                        hand
                                        files after each
                                        instrumentation.
                                        <br><br>
                                        <input type="Checkbox" id="E67Checkbox" class="TEST"> Access cavity is
                                        temporized
                                        with
                                        <select id="E67ADropdown" class="TEST">
                                            <option value="Odontopaste,">Odontopaste</option>
                                            <option value="calcium hydroxide paste,">calcium hydroxide paste</option>

                                        </select>

                                        <select id="E67BDropdown" class="TEST">
                                            <option value="">No cotton pellet</option>
                                            <option value=" Sterile cotton pellet,">Sterile cotton pellet</option>

                                        </select> &
                                        <select id="E67CDropdown" class="TEST">
                                            <option value=" Fuji 7 GIC (pink)">Fuji 7 GIC (pink)</option>
                                            <option value=" Cavit">Cavit</option>

                                        </select>


                                        <br>
                                        <input type="Checkbox" id="E68Checkbox" class="TEST"> Cusps lightly reduced to
                                        take
                                        tooth out of occlusion
                                        for symptomatic relief & decrease risk of cuspal fracture (discussed with pt
                                        prior
                                        to tx)
                                        <br><br><br>
                                        <strong>TX RECORD</strong><br>


                                        <table>
                                            <tr>
                                                <td>
                                                    Canal
                                                </td>
                                                <td>
                                                    <input type="text1" id="E69ATextInput" placeholder="MB, D ....">
                                                </td>

                                                <td>
                                                    <input type="text1" id="E69BTextInput" placeholder="MB, D ....">
                                                </td>

                                                <td>
                                                    <input type="text1" id="E69CTextInput" placeholder="MB, D ....">
                                                </td>

                                                <td>
                                                    <input type="text1" id="E69DTextInput" placeholder="MB, D ....">
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>Ref point
                                                </td>
                                                <td>
                                                    <input type="text1" id="E70ATextInput"
                                                           placeholder="Enter details...">
                                                </td>

                                                <td>
                                                    <input type="text1" id="E70BTextInput"
                                                           placeholder="Enter details...">
                                                </td>
                                                <td>
                                                    <input type="text1" id="E70CTextInput"
                                                           placeholder="Enter details...">
                                                </td>
                                                <td>
                                                    <input type="text1" id="E70DTextInput"
                                                           placeholder="Enter details...">
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    EWL
                                                </td>
                                                <td>
                                                    <input type="text1" id="E71ATextInput"
                                                           placeholder="Enter details...">
                                                </td>

                                                <td>
                                                    <input type="text1" id="E71BTextInput"
                                                           placeholder="Enter details...">
                                                </td>
                                                <td>
                                                    <input type="text1" id="E71CTextInput"
                                                           placeholder="Enter details...">
                                                </td>
                                                <td>
                                                    <input type="text1" id="E71DTextInput"
                                                           placeholder="Enter details...">
                                                </td>


                                            </tr>
                                            <tr>
                                                <td>
                                                    WLF size
                                                </td>
                                                <td>
                                                    <input type="text1" id="E72ATextInput"
                                                           placeholder="Enter details...">
                                                </td>
                                                <td>
                                                    <input type="text1" id="E72BTextInput"
                                                           placeholder="Enter details...">
                                                </td>
                                                <td>
                                                    <input type="text1" id="E72CTextInput"
                                                           placeholder="Enter details...">
                                                </td>
                                                <td>
                                                    <input type="text1" id="E72DTextInput"
                                                           placeholder="Enter details...">
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>
                                                    CWL
                                                </td>
                                                <td>
                                                    <input type="text1" id="E73ATextInput"
                                                           placeholder="Enter details...">
                                                </td>

                                                <td>
                                                    <input type="text1" id="E73BTextInput"
                                                           placeholder="Enter details...">
                                                </td>
                                                <td>
                                                    <input type="text1" id="E73CTextInput"
                                                           placeholder="Enter details...">
                                                </td>
                                                <td>
                                                    <input type="text1" id="E73DTextInput"
                                                           placeholder="Enter details...">
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>
                                                    Last rotary file used
                                                </td>
                                                <td>
                                                    <input type="text1" id="E74ATextInput"
                                                           placeholder="Enter details...">
                                                </td>

                                                <td>
                                                    <input type="text1" id="E74BTextInput"
                                                           placeholder="Enter details...">
                                                </td>
                                                <td>
                                                    <input type="text1" id="E74CTextInput"
                                                           placeholder="Enter details...">
                                                </td>
                                                <td>
                                                    <input type="text1" id="E74DTextInput"
                                                           placeholder="Enter details...">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    (MC)
                                                </td>
                                                <td>
                                                    <input type="text1" id="E75ATextInput"
                                                           placeholder="Enter details...">
                                                </td>

                                                <td>
                                                    <input type="text1" id="E75BTextInput"
                                                           placeholder="Enter details...">
                                                </td>
                                                <td>
                                                    <input type="text1" id="E75CTextInput"
                                                           placeholder="Enter details...">
                                                </td>
                                                <td>
                                                    <input type="text1" id="E75DTextInput"
                                                           placeholder="Enter details...">
                                                </td>

                                            </tr>
                                            <tr>
                                                </td>
                                            </tr>
                                        </table>
                                        <br>
                                        <br>
                                        <input type="Checkbox" id="endo3G22Checkbox" class="TEST">
                                        Pt well on discharge <br>
                                        <input type="Checkbox" id="endo3supervisorCheckbox">
                                        Supervisor: Dr
                                        <input type="text" id="endo3supervisornameTextInput"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="endo3nvCheckbox" class="TEST">
                                        N/V:
                                        <input type="text" id="endo3nvTextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                    </div>
                                    <button class="toggle-button2" id="button18">417 Root canal obturation – one canal
                                    </button>
                                    <input type="Checkbox" id="endo4allCheckbox" class="TEST">

                                    <div id="endo4Section" class="section">
                                        <h3></h3>
                                        <input type="Checkbox" id="ptendo4Checkbox" class="TEST">
                                        Pt. presented to
                                        <select id="endo4yearDropdown" class="TEST">
                                            <option value="4th Year">4th Year</option>
                                            <option value="3rd Year">3rd Year</option>

                                            <option value="5th Year">5th Year</option>
                                        </select>
                                        <select id="endo4clinicDropdown" class="TEST">
                                            <option value="Endo Clinic">Endo Clinic</option>
                                            <option value="Pros Clinic">Pros Clinic</option>
                                            <option value="Perio Clinic">Perio Clinic</option>
                                            <option value="GDP Clinic">GDP Clinic</option>
                                        </select>
                                        <select id="endo4codeDropdown" class="TEST">
                                            <option value="3.1">3.1</option>
                                            <option value="5.1">5.1</option>
                                            <option value="5.2">5.2</option>
                                            <option value="2.1">2.1</option>
                                            <option value="3.1">3.1</option>
                                            <option value="3.2">3.2</option>
                                            <option value="3.3">3.3</option>
                                            <option value="3.4">3.4</option>
                                            <option value="4.1">4.1</option>
                                            <option value="4.2">4.2</option>
                                            <option value="6.2">6.2</option>
                                            <option value="6.3">6.3</option>
                                        </select>
                                        for
                                        <select id="endo4typeDropdown" class="TEST">
                                            <option value="RCT obturation">RCT obturation</option>
                                            <option value="011">011</option>
                                            <option value="S/C">S/C</option>
                                            <option value="Consult">Consult</option>
                                        </select>
                                        OR
                                        <input type="text" id="endo4A1TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="endo4c3sCheckbox" class="TEST">
                                        3C’s confirmed
                                        <input type="text" id="endo4c3sTextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="endo4colgateCheckbox" class="TEST">
                                        Colgate 1.5% Hydrogen Peroxide Mouth rinse given. <br>
                                        <input type="Checkbox" id="endo4medicalHxCheckbox" class="TEST">
                                        Medical Hx
                                        <select id="endo4hxDropdown" class="TEST">
                                            <option value="updated">Updated</option>
                                            <option value="verified">Verified</option>
                                            <option value="taken">taken</option>
                                        </select>
                                        <br>
                                        <br>
                                        <input type="Checkbox" id="E80Checkbox" class="TEST">
                                        LA/Topical Used
                                        <select id="E81Dropdown" class="TEST">
                                            <option value="Topical 5% Xylocaine LA used">Topical 5% Xylocaine AND (See
                                                below)
                                            </option>
                                            <option value="No LA/Topical used">No LA/Topical used</option>
                                        </select>
                                        <br>

                                        <input type="Checkbox" id="E82Checkbox" class="TEST">
                                        <select id="E82Dropdown" class="TEST">
                                            <option value="2.2mL Lignospan: 2% Lignocaine w Adrenaline 1:80,000">2.2mL
                                                Lignospan
                                            </option>
                                            <option value="2.2mL Septanest: 4% Articaine w Adrenaline 1:100,000">2.2mL
                                                Septanest
                                            </option>
                                            <option value="2.2mL Scandonest: 3% Mepivacaine">2.2mL Scandonest</option>
                                        </select>
                                        VIA
                                        <select id="E82InfilDropdown" class="TEST">
                                            <option value="palatal infil">Palatal Infiltration</option>
                                            <option value="buccal infil">Buccal Infiltration</option>
                                            <option value="IDB">Inferior Dental Block</option>
                                            <option value="long buccal">Long Buccal</option>
                                        </select>
                                        <br>

                                        <input type="Checkbox" id="E83Checkbox" class="TEST">
                                        Isolation
                                        <select id="E84Dropdown" class="TEST">
                                            <option value="Moisture control achieved through dental dam">Dental Dam
                                            </option>
                                            <option value="Cotton rolls isolation used">Cotton Rolls</option>
                                            <option value="Dry tips isolation used">Dry Tips</option>
                                        </select>
                                        <br><br>

                                        <input type="Checkbox" id="E85Checkbox" class="TEST">
                                        Temporary restorations removed using H/S & U/S.
                                        <br>

                                        <input type="Checkbox" id="E86Checkbox" class="TEST">Canal(s) were irrigated
                                        with 4%
                                        sodium hypochlorite &
                                        recapitulated to prepared lengths to ensure patency.
                                        <br>
                                        <br> <input type="Checkbox" id="E87Checkbox" class="TEST">Master cone tried &
                                        tug-back achieved. Master cone
                                        radiograph taken.
                                        <br> <input type="Checkbox" id="E88Checkbox" class="TEST">All canal(s) were
                                        dried
                                        with length-controlled
                                        paper points.
                                        <br> <input type="Checkbox" id="E89Checkbox" class="TEST">All canal(s) were
                                        obturated with master cones &
                                        medium fine accessory GP points using AH Plus sealer & lateral condensation
                                        technique.
                                        <br><br> <input type="Checkbox" id="E90Checkbox" class="TEST">
                                        Excess GP were removed using Super endo up to 4mm below each canal orifice (to
                                        reduce risk of staining &
                                        allow sufficient space for Cavit placement) & the remaining GP were packed with
                                        a
                                        plugger.
                                        <br> <input type="Checkbox" id="E91Checkbox" class="TEST">
                                        Excess GP & sealer on the coronal portion of each orifice were removed with
                                        Gates
                                        Glidden at 10,000 RPM & 5s
                                        etch, respectively.
                                        <br><br> <input type="Checkbox" id="E92Checkbox" class="TEST">Final PA
                                        radiograph
                                        taken
                                        <br> <input type="Checkbox" id="E93Checkbox" class="TEST">Final restoration was
                                        placed using composite /
                                        Access cavity is temporized with Cavit, & Fuji 9 GIC.

                                        <br>

                                        <br> <input type="Checkbox" id="E94Checkbox" class="TEST">POIG. Tooth may be
                                        sensitive for the next few days
                                        post-op (recommend ibuprofen 600mg &/or paracetamol if necessary); Cautioned
                                        against
                                        consuming hot
                                        food/drinks until the LA wears off due to numb lip & cheek/lip biting
                                        <br> <input type="Checkbox" id="E95Checkbox" class="TEST">Informed pt about
                                        future
                                        treatment appointments,
                                        such as the restoration & recall appointments.


                                        <br>
                                        <br>
                                        <input type="Checkbox" id="endo4G22Checkbox" class="TEST">
                                        Pt well on discharge <br>
                                        <input type="Checkbox" id="endo4supervisorCheckbox">
                                        Supervisor: Dr
                                        <input type="text" id="endo4supervisornameTextInput"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="endo4nvCheckbox" class="TEST">
                                        N/V:
                                        <input type="text" id="endo4nvTextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                    </div>
                                    <hr>
                                </div>
                                <button class="toggle-button5" id="button19">RESTORATIVE SERVICES (5xx)</button>
                                <div id="restoSection1" class="section">
                                    <button class="toggle-button" id="button20">Restoration</button>
                                    <input type="Checkbox" id="selectAllRestoCheckbox" class="TEST">
                                    Composite
                                    <input type="Checkbox" id="selectAllResto2Checkbox" class="TEST">
                                    GIC
                                    <div id="restorationSection" class="section">
                                        <h2>Restoration</h2>

                                        <input type="Checkbox" id="ptresto1Checkbox" class="TEST"> Pt. presented to
                                        <select id="resto1yearDropdown" class="TEST">

                                            <option value="3rd Year">3rd Year</option>
                                            <option value="4th Year">4th Year</option>
                                            <option value="5th Year">5th Year</option>
                                        </select>
                                        <select id="resto1clinicDropdown" class="TEST">
                                            <option value="Pros Clinic">Pros Clinic</option>
                                            <option value="Perio Clinic">Perio Clinic</option>
                                            <option value="GDP Clinic">GDP Clinic</option>
                                        </select>
                                        <select id="resto1codeDropdown" class="TEST">
                                            <option value="5.1">5.1</option>
                                            <option value="5.2">5.2</option>
                                            <option value="2.1">2.1</option>
                                            <option value="3.1">3.1</option>
                                            <option value="3.2">3.2</option>
                                            <option value="3.3">3.3</option>
                                            <option value="3.4">3.4</option>
                                            <option value="4.1">4.1</option>
                                            <option value="4.2">4.2</option>
                                            <option value="6.2">6.2</option>
                                            <option value="6.3">6.3</option>
                                        </select>
                                        for
                                        <select id="resto1typeDropdown" class="TEST">
                                            <option value="restoration">restoration</option>
                                            <option value="011">011</option>
                                            <option value="S/C">S/C</option>
                                            <option value="Consult">Consult</option>
                                        </select>
                                        OR
                                        <input type="text" id="resto1A1TextInput" class="TEST"
                                               placeholder="Enter details..."> <br>
                                        <input type="Checkbox" id="resto1c3sCheckbox" class="TEST"> 3C’s confirmed
                                        <input type="text" id="resto1c3sTextInput" class="TEST"
                                               placeholder="Enter details..."> <br>

                                        <input type="Checkbox" id="resto1colgateCheckbox" class="TEST"> Colgate 1.5%
                                        Hydrogen Peroxide Mouth rinse
                                        given. <br>

                                        <input type="Checkbox" id="resto1medicalHxCheckbox" class="TEST"> Medical Hx
                                        <select id="resto1hxDropdown" class="TEST">
                                            <option value="updated">Updated</option>
                                            <option value="verified">Verified</option>
                                            <option value="taken">taken</option>
                                        </select> <br><br>


                                        <input type="Checkbox" id="restoCheckbox" class="TEST">
                                        Tooth - required restoration due to
                                        <select id="restoDropdown" class="TEST">
                                            <option value="decay">decay</option>
                                            <option value="NCTL">NCTL</option>
                                            <option value="defective margin">defective margin</option>
                                        </select>
                                        AND
                                        <select id="resto2Dropdown" class="TEST">
                                            <option value=""></option>
                                            <option value="NCTL">NCTL</option>
                                            <option value="defective margin">defective margin</option>
                                        </select>
                                        <br>
                                        <input type="Checkbox" id="bwCheckbox" class="TEST">
                                        BW’s reviewed <br>
                                        <input type="Checkbox" id="xylocaineCheckbox" class="TEST">
                                        LA/Topical Used
                                        <select id="laDropdown" class="TEST">
                                            <option value="Topical 5% Xylocaine LA used">Topical 5% Xylocaine AND (See
                                                below)
                                            </option>
                                            <option value="No LA/Topical used">No LA/Topical used</option>
                                        </select>
                                        <br>
                                        <input type="Checkbox" id="latypeCheckbox" class="TEST">
                                        <select id="anestheticDropdown" class="TEST">
                                            <option value="2.2mL Lignospan: 2% Lignocaine w Adrenaline 1:80,000">2.2mL
                                                Lignospan
                                            </option>
                                            <option value="2.2mL Septanest: 4% Articaine w Adrenaline 1:100,000">2.2mL
                                                Septanest
                                            </option>
                                            <option value="2.2mL Scandonest: 3% Mepivacaine">2.2mL Scandonest</option>
                                        </select>
                                        VIA
                                        <select id="infilDropdown" class="TEST">
                                            <option value="palatal infil">Palatal Infiltration</option>
                                            <option value="buccal infil">Buccal Infiltration</option>
                                            <option value="IDB">Inferior Dental Block</option>
                                            <option value="long buccal">Long Buccal</option>
                                        </select>
                                        <br>
                                        <br>
                                        <input type="Checkbox" id="isolationCheckbox" class="TEST">
                                        Isolation
                                        <select id="isolationDropdown" class="TEST">
                                            <option value="Moisture control achieved through Dental dam">Dental Dam
                                            </option>
                                            <option value="Cotton rolls isolation used">Cotton Rolls</option>
                                            <option value="Dry tips isolation used">Dry Tips</option>
                                        </select>
                                        <br>
                                        <input type="Checkbox"
                                               value="Cavity prepared using HS and SS, previous restoration removed/caries free"
                                               id="cavityCheckbox" class="TEST">
                                        Cavity prepared using HS and SS, previous restoration removed/caries free <br>
                                        <input type="Checkbox" id="C12Checkbox" class="TEST">
                                        Matrix
                                        <select id="C12Dropdown" class="TEST">
                                            <option value="Tofflemire Matrix placed">Tofflemire Matrix</option>
                                            <option value="Sectional matrix placed">Sectional matrix</option>
                                            <option value="Automatrix placed">Automatrix</option>
                                        </select>
                                        <br>
                                        <br>
                                        <input type="Checkbox" id="cordCheckbox" class="TEST">
                                        Retraction cord size
                                        <select id="cordDropdown" class="TEST">
                                            <option value="0">0</option>
                                            <option value="00">00</option>
                                            <option value="000">000</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                        placed w hemostat <br>
                                        <br>
                                        <strong>Composite</strong> <br>
                                        <input type="Checkbox" id="etchedCheckbox" class="TEST">
                                        Etched with 37% phosphoric acid, clearfil primer and bond. Gradia
                                        <select id="gradiaDropdown" class="TEST">
                                            <option value="A1">A1</option>
                                            <option value="A2">A2</option>
                                            <option value="A3">A3</option>
                                            <option value="A3.5">A3.5</option>
                                        </select>
                                        <br>
                                        <br>
                                        <strong>GIC</strong> <br>
                                        <input type="Checkbox" id="C110Checkbox" class="TEST">
                                        Dentine conditioned w 10% polyacrylic acid <br>
                                        <input type="Checkbox" id="C111Checkbox" class="TEST">
                                        Restored with
                                        <select id="GICDropdown" class="TEST">
                                            <option value=" GC Fuji II LC ">GC Fuji II LC</option>
                                            <option value="GC Fuji IX ">GC Fuji IX</option>
                                            <option value="GC Fuji VII ">GC Fuji VII</option>
                                            <option value="GC Fuji Bulk ">GC Fuji Bulk</option>
                                        </select>
                                        <select id="GICshadeDropdown" class="TEST">
                                            <option value="">Shade</option>
                                            <option value="A1">A1</option>
                                            <option value="A2">A2</option>
                                            <option value="A3">A3</option>
                                            <option value="A3.5">A3.5</option>
                                        </select>
                                        and cured <br><br>
                                        <input type="Checkbox" id="C11Checkbox" class="TEST">
                                        Restoration polished, occlusion checked <br><br>

                                        <input type="Checkbox" id="resto1G22Checkbox" class="TEST"> Pt well on discharge
                                        <br>
                                        <input type="Checkbox" id="resto1supervisorCheckbox"> Supervisor: Dr
                                        <input type="text" id="resto1supervisornameTextInput"
                                               placeholder="Enter details..."> <br>

                                        <input type="Checkbox" id="resto1nvCheckbox" class="TEST"> N/V:
                                        <input type="text" id="resto1nvTextInput" class="TEST"
                                               placeholder="Enter details..."> <br>


                                    </div>
                                    <hr>
                                </div>
                                <button class="toggle-button5" id="button21">PROSTHODONTICS – FIXED (6xx)</button>
                                <div id="prosSection1" class="section">


                                    <button class="toggle-button2" id="button41"> Consultation (crown)
                                    </button>
                                    <input type="Checkbox" id="crown1allCheckbox" class="TEST">


                                    <div id="crown1Section" class="section">
                                        <h3>Consultation (crown)</h3>


                                        <input type="Checkbox" id="ptcrown1Checkbox" class="TEST"> Pt. presented to
                                        <select id="crown1yearDropdown" class="TEST">
                                            <option value="4th Year">4th Year</option>
                                            <option value="3rd Year">3rd Year</option>

                                            <option value="5th Year">5th Year</option>
                                        </select>
                                        <select id="crown1clinicDropdown" class="TEST">
                                            <option value="Pros Clinic">Pros Clinic</option>
                                            <option value="Perio Clinic">Perio Clinic</option>
                                            <option value="GDP Clinic">GDP Clinic</option>
                                        </select>
                                        <select id="crown1codeDropdown" class="TEST">
                                            <option value="5.1">5.1</option>
                                            <option value="5.2">5.2</option>
                                            <option value="2.1">2.1</option>
                                            <option value="3.1">3.1</option>
                                            <option value="3.2">3.2</option>
                                            <option value="3.3">3.3</option>
                                            <option value="3.4">3.4</option>
                                            <option value="4.1">4.1</option>
                                            <option value="4.2">4.2</option>
                                            <option value="6.2">6.2</option>
                                            <option value="6.3">6.3</option>
                                        </select>
                                        for
                                        <select id="crown1typeDropdown" class="TEST">
                                            <option value="Crown consult">Crown Consult</option>
                                            <option value="011">011</option>
                                            <option value="S/C">S/C</option>
                                            <option value="Consult">Consult</option>
                                        </select>
                                        OR
                                        <input type="text" id="crown1A1TextInput" class="TEST"
                                               placeholder="Enter details..."> <br>
                                        <input type="Checkbox" id="crown1c3sCheckbox" class="TEST"> 3C’s confirmed
                                        <input type="text" id="crown1c3sTextInput" class="TEST"
                                               placeholder="Enter details..."> <br>

                                        <input type="Checkbox" id="crown1colgateCheckbox" class="TEST"> Colgate 1.5%
                                        Hydrogen Peroxide Mouth rinse
                                        given. <br>

                                        <input type="Checkbox" id="crown1medicalHxCheckbox" class="TEST"> Medical Hx
                                        <select id="crown1hxDropdown" class="TEST">
                                            <option value="updated">Updated</option>
                                            <option value="verified">Verified</option>
                                            <option value="taken">taken</option>
                                        </select> <br><br>

                                        <strong> DENTAL & SOCIAL HX </strong><br>

                                        <table>

                                            <tr>
                                                <td>
                                                    <input type="Checkbox" id="J1Checkbox" class="TEST" checked
                                                           hidden="">
                                                    Brushing freq, TB & TP:
                                                </td>
                                                <td>
                                                    <input type="text" id="J1TextInput" class="TEST"
                                                           placeholder="Enter details...">
                                                    <br>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <input type="Checkbox" id="J2Checkbox" class="TEST" checked
                                                           hidden="">
                                                    Interdental cleaning/mouthwash:
                                                </td>
                                                <td>
                                                    <input type="text" id="J2TextInput" class="TEST"
                                                           placeholder="Enter details...">
                                                    <br>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <input type="Checkbox" id="J3Checkbox" class="TEST" checked
                                                           hidden="">
                                                    Tobacco or alcohol consumption:
                                                </td>
                                                <td>
                                                    <input type="text" id="J3TextInput" class="TEST"
                                                           placeholder="Enter details...">
                                                    <br>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <input type="Checkbox" id="J4Checkbox" class="TEST" checked
                                                           hidden="">
                                                    Snacks/sugary drinks (freq. & timing):
                                                </td>
                                                <td>
                                                    <input type="text" id="J4TextInput" class="TEST"
                                                           placeholder="Enter details...">
                                                    <br>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <input type="Checkbox" id="J5Checkbox" class="TEST" checked
                                                           hidden="">
                                                    Risk factors related to occupation/interests:
                                                </td>
                                                <td>
                                                    <input type="text" id="J5TextInput" class="TEST"
                                                           placeholder="Enter details...">
                                                    <br><br>
                                                </td>
                                            </tr>

                                        </table>


                                        <input type="Checkbox" id="J6Checkbox" class="TEST">
                                        <strong>PATIENT EXPECTATION:</strong>
                                        <select id="J6Dropdown" class="TEST">
                                            <option value="low">low</option>
                                            <option value="moderate">moderate</option>
                                            <option value="high">high</option>

                                        </select>
                                        <input type="text" id="J6TextInput" class="TEST" placeholder="Enter details...">
                                        <br><br>

                                        <strong>AESTHETIC EVALUATION</strong>
                                        <br>
                                        <!-- J7 -->
                                        <input type="Checkbox" id="J7Checkbox" class="TEST">
                                        Smile line exposing cervical area of teeth:
                                        <select id="J7Dropdown" class="TEST">
                                            <option value="present">present</option>
                                            <option value="absent">absent</option>
                                        </select>
                                        <br>

                                        <!-- J8 -->
                                        <input type="Checkbox" id="J8Checkbox" class="TEST">
                                        Incisal plane canting (slant):
                                        <select id="J8Dropdown" class="TEST">
                                            <option value="present">present</option>
                                            <option value="absent">absent</option>
                                        </select>
                                        <br><br>

                                        <strong>I/O EXAMINATION</strong>
                                        <br>
                                        <table>
                                            <tr>
                                                <td>


                                            <tr>
                                                <td>
                                                    <!-- J10 -->
                                                    <label for="J10Checkbox">Furcation involvement:</label>
                                                </td>
                                                <td>
                                                    <input type="Checkbox" id="J10Checkbox" class="TEST">
                                                    <select id="J10Dropdown" class="TEST">
                                                        <option value="absent">Absent</option>
                                                        <option value="I">I</option>
                                                        <option value="II">II</option>
                                                        <option value="III">III</option>
                                                    </select>
                                                    <br>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="J11Checkbox">Working side contacts:</label>
                                                </td>
                                                <td>
                                                    <input type="Checkbox" id="J11Checkbox" class="TEST">
                                                    <select id="J11Dropdown" class="TEST">
                                                        <option value="canine guidance">Canine guidance</option>
                                                        <option value="group function">Group function</option>
                                                        <option value="open bite bilateral">Open bite bilateral</option>
                                                    </select>
                                                    <input type="text" id="J11TextInput" class="TEST"
                                                           placeholder="Enter details...">
                                                    <br>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="J12Checkbox">Anterior guidance:</label>
                                                </td>
                                                <td>
                                                    <input type="Checkbox" id="J12Checkbox" class="TEST">
                                                    <select id="J12Dropdown" class="TEST">
                                                        <option value="present">Present</option>
                                                        <option value="absent">Absent</option>
                                                    </select>
                                                    <input type="text" id="J12TextInput" class="TEST"
                                                           placeholder="Enter details...">
                                                    <br>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="J13Checkbox">Parafuction:</label>
                                                </td>
                                                <td>
                                                    <input type="Checkbox" id="J13Checkbox" class="TEST">
                                                    <select id="J13Dropdown" class="TEST">
                                                        <option value="yes">Yes (type)</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                    <input type="text" id="J13TextInput" class="TEST"
                                                           placeholder="Enter details...">
                                                    <br>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="J14Checkbox">Opposing teeth:</label>
                                                </td>
                                                <td>
                                                    <input type="Checkbox" id="J14Checkbox" class="TEST">
                                                    <select id="J14Dropdown" class="TEST">
                                                        <option value="natural">Natural</option>
                                                        <option value="artificial">Artificial</option>
                                                        <option value="no antagonist">No antagonist</option>
                                                    </select>
                                                    <input type="text" id="J14TextInput" class="TEST"
                                                           placeholder="Enter details...">
                                                    <br>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="J15Checkbox">OVD:</label>
                                                </td>
                                                <td>
                                                    <input type="Checkbox" id="J15Checkbox" class="TEST">
                                                    <select id="J15Dropdown" class="TEST">
                                                        <option value=""></option>
                                                        <option value="Normal">Normal</option>
                                                        <option value="increased">Increased</option>
                                                        <option value="reduced">Reduced</option>
                                                    </select>
                                                    <input type="text" id="J15TextInput" class="TEST"
                                                           placeholder="Enter details...">
                                                    <br>
                                                </td>
                                            </tr>
                                        </table>


                                        <strong>TOOTH ASSESSMENT</strong><br>


                                        <input type="Checkbox" id="J21Checkbox" class="TEST">
                                        Ferrule height:
                                        <input type="text" id="J21TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>

                                        <!-- J22 -->

                                        <!-- J23 -->
                                        <input type="Checkbox" id="J23Checkbox" class="TEST">
                                        Radiographic findings:
                                        <input type="text" id="J23TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>

                                        <!-- J24 -->
                                        <input type="Checkbox" id="J24Checkbox" class="TEST">
                                        Pulp vitality (cold/ EPT):
                                        <input type="text" id="J24TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>

                                        <!-- J25 -->
                                        <input type="Checkbox" id="J25Checkbox" class="TEST">
                                        Dx:
                                        <input type="text" id="J25TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br><br>


                                        <input type="Checkbox" id="J34BCheckbox" class="TEST">
                                        Patient informed that tooth has compromised tooth structure & requires
                                        protective
                                        measure from
                                        occluding forces. Warned risk of further fracturing, bacterial leakage requiring
                                        RCT
                                        & risk of complete
                                        fracture warranting extraction. Advised that direct restoration may be
                                        inadequate to
                                        withstand cusps & that
                                        cuspal coverage (in the form of crown, onlay or overlay depending on the extent
                                        of
                                        defect) may be ideal.
                                        Explained the multiple visits involved & what happens at each stage. Pt
                                        understood &
                                        happy to move
                                        forward with tx. Informed consent obtained.
                                        <br><br>


                                        <strong>RESTORATION TYPE</strong><br>

                                        <!-- J38 -->
                                        <input type="Checkbox" id="J38Checkbox" class="TEST">
                                        Coverage:
                                        <select id="J38Dropdown" class="TEST">
                                            <option value="full">full</option>
                                            <option value="partial">partial</option>
                                        </select>
                                        <br>

                                        <!-- J39 -->
                                        <input type="Checkbox" id="J39Checkbox" class="TEST">
                                        Material:
                                        <select id="J39Dropdown" class="TEST">
                                            <option value="metal">metal</option>
                                            <option value="PFM">PFM</option>
                                            <option value="all ceramic">all ceramic</option>
                                        </select>
                                        <br>

                                        <!-- J40 -->
                                        <input type="Checkbox" id="J40Checkbox" class="TEST">
                                        FDP:
                                        <select id="J40Dropdown" class="TEST">
                                            <option value="single unit">single unit</option>
                                            <option value="bridge">bridge</option>
                                        </select>
                                        <br>

                                        <!-- J41 -->
                                        <input type="Checkbox" id="J41Checkbox" class="TEST">
                                        Pontic design:
                                        <select id="J41Dropdown" class="TEST">
                                            <option value="sanitary">sanitary</option>
                                            <option value="bullet">bullet</option>
                                            <option value="modified ridge lap">modified ridge lap</option>
                                            <option value="ovate">ovate</option>
                                        </select>
                                        <br>


                                        <input type="Checkbox" id="J43Checkbox" class="TEST">
                                        Occlusal surface material:
                                        <select id="J43Dropdown" class="TEST">
                                            <option value="metal">metal</option>
                                            <option value="ceramic">ceramic</option>
                                        </select>
                                        <br>

                                        <strong>TX DELIVERED</strong>
                                        <br>
                                        <!-- J44 -->
                                        <input type="Checkbox" id="J44Checkbox" class="TEST">
                                        Max & mand alginate primary impression taken. Impression checked for quality,
                                        sterilized & bagged. Lab card
                                        with instructions for construction of diagnostic models & custom tray for PVS
                                        impression of tooth ___
                                        written, scanned & sent to the lab.
                                        <br>
                                        <br>


                                        <input type="Checkbox" id="crown1G22Checkbox" class="TEST"> Pt well on discharge
                                        <br>
                                        <input type="Checkbox" id="crown1supervisorCheckbox"> Supervisor: Dr
                                        <input type="text" id="crown1supervisornameTextInput"
                                               placeholder="Enter details..."> <br>

                                        <input type="Checkbox" id="crown1nvCheckbox" class="TEST"> N/V:
                                        <input type="text" id="crown1nvTextInput" class="TEST"
                                               placeholder="Enter details..."> <br>

                                        <br><br>

                                        <strong>LAB INSTRUCTIONS</strong>
                                        <br>
                                        <!-- J47 -->
                                        <input type="Checkbox" id="J47Checkbox" class="TEST">
                                        Please construct diagnostic models from alginate impression & return on ___ for
                                        diagnostic wax up.
                                        <br>

                                        <!-- J48 -->
                                        <input type="Checkbox" id="J48Checkbox" class="TEST">
                                        Please construct custom try for PVS impression for tooth ___.
                                        <br>


                                    </div>


                                    <button class="toggle-button2" id="button42"> Crown Preparation
                                    </button>
                                    <input type="Checkbox" id="crown2allCheckbox" class="TEST">


                                    <div id="crown2Section" class="section">
                                        <h3> crown preparation </h3>

                                        <input type="Checkbox" id="ptcrown2Checkbox" class="TEST"> Pt. presented to
                                        <select id="crown2yearDropdown" class="TEST">
                                            <option value="4th Year">4th Year</option>
                                            <option value="3rd Year">3rd Year</option>
                                            <option value="4th Year">4th Year</option>
                                            <option value="5th Year">5th Year</option>
                                        </select>
                                        <select id="crown2clinicDropdown" class="TEST">
                                            <option value="Pros Clinic">Pros Clinic</option>
                                            <option value="Perio Clinic">Perio Clinic</option>
                                            <option value="GDP Clinic">GDP Clinic</option>
                                        </select>
                                        <select id="crown2codeDropdown" class="TEST">
                                            <option value="5.1">5.1</option>
                                            <option value="5.2">5.2</option>
                                            <option value="2.1">2.1</option>
                                            <option value="3.1">3.1</option>
                                            <option value="3.2">3.2</option>
                                            <option value="3.3">3.3</option>
                                            <option value="3.4">3.4</option>
                                            <option value="4.1">4.1</option>
                                            <option value="4.2">4.2</option>
                                            <option value="6.2">6.2</option>
                                            <option value="6.3">6.3</option>
                                        </select>
                                        for
                                        <select id="crown2typeDropdown" class="TEST">
                                            <option value="Crown prep">Crown prep</option>
                                            <option value="011">011</option>
                                            <option value="S/C">S/C</option>
                                            <option value="Consult">Consult</option>
                                        </select>
                                        OR
                                        <input type="text" id="crown2A1TextInput" class="TEST"
                                               placeholder="Enter details..."> <br>
                                        <input type="Checkbox" id="crown2c3sCheckbox" class="TEST"> 3C’s confirmed
                                        <input type="text" id="crown2c3sTextInput" class="TEST"
                                               placeholder="Enter details..."> <br>

                                        <input type="Checkbox" id="crown2colgateCheckbox" class="TEST"> Colgate 1.5%
                                        Hydrogen Peroxide Mouth rinse
                                        given. <br>

                                        <input type="Checkbox" id="crown2medicalHxCheckbox" class="TEST"> Medical Hx
                                        <select id="crown2hxDropdown" class="TEST">
                                            <option value="updated">Updated</option>
                                            <option value="verified">Verified</option>
                                            <option value="taken">taken</option>
                                        </select> <br><br>
                                        <input type="Checkbox" id="J50Checkbox" class="TEST">
                                        LAB WORK
                                        <br>

                                        <!-- J51 -->
                                        <input type="Checkbox" id="J51Checkbox" class="TEST">
                                        Study model poured up & special tray fabricated.
                                        <br>

                                        <!-- J52 -->
                                        <input type="Checkbox" id="J52Checkbox" class="TEST">
                                        Diagnostic wax up done & putty keys made.
                                        <br>

                                        <!-- J53 -->
                                        <input type="Checkbox" id="J53Checkbox" class="TEST">
                                        Crown material chosen:
                                        <select id="J53Dropdown" class="TEST">
                                            <option value="PFM">PFM</option>
                                            <option value="Emax">Emax</option>
                                            <option value="Zirconia">Zirconia</option>
                                            <option value="Sinfony">Sinfony</option>
                                        </select>
                                        <br>

                                        <!-- J54 -->
                                        <input type="Checkbox" id="J54Checkbox" class="TEST">
                                        Shade selected: <input type="text" id="J54ATextInput" class="TEST"
                                                               placeholder="Enter details..."> VITA 3D
                                        Master (for PFM) / <input type="text" id="J54BTextInput" class="TEST"
                                                                  placeholder="Enter details..."> VITA
                                        Classic

                                        <br>

                                        <strong>TX DELIVERED</strong>
                                        <br><br>
                                        <!-- J55 -->

                                        <!-- J60 -->
                                        <input type="Checkbox" id="J60Checkbox" class="TEST">
                                        All existing restorative materials removed. NIL pulp exposure. Foundation
                                        restoration required/ not required
                                        to establish resistance form / block out undercuts.
                                        <br><br>

                                        <!-- J61 -->
                                        <input type="Checkbox" id="J61Checkbox" class="TEST">
                                        Crown preparation completed using H/S & refined-polished using S/S coarse soflex
                                        disc.
                                        <br><br>

                                        <!-- J62 -->
                                        <input type="Checkbox" id="J62Checkbox" class="TEST">
                                        Gingival retraction is achieved using retraction cord.
                                        <br>

                                        <!-- J63 -->
                                        <input type="Checkbox" id="J63Checkbox" class="TEST">
                                        Vaseline was used to lubricate the completed crown preparation & adjacent
                                        structures.
                                        <br><br>

                                        <!-- J64 -->
                                        <input type="Checkbox" id="J64Checkbox" class="TEST">
                                        Provisional restoration is constructed using Structure 2 (flowable composite
                                        used to
                                        refine deficient
                                        margins) & finished & polish using H/S & S/S.
                                        <br>

                                        <!-- J65 -->
                                        <input type="Checkbox" id="J65Checkbox" class="TEST">
                                        Interproximal contact checked w/ floss. Occlusion checked w/ articulating paper
                                        &
                                        adjusted accordingly.
                                        <br>

                                        <!-- J66 -->
                                        <input type="Checkbox" id="J66Checkbox" class="TEST">
                                        Crown preparation surface is cleaned thoroughly using Endodry & provisional
                                        restoration is cemented using
                                        Temp-Bond NE. Excess cement is removed using probe & floss.
                                        <br><br>

                                        <strong>REMAINING TX PLAN</strong>
                                        <br>
                                        <!-- J67 -->
                                        <input type="Checkbox" id="J67Checkbox" class="TEST">
                                        Secondary impression
                                        <br>

                                        <!-- J68 -->
                                        <input type="Checkbox" id="J68Checkbox" class="TEST">
                                        Crown insertion
                                        <br><br>

                                        <strong>POST OP</strong>
                                        <br>
                                        <!-- J69 -->
                                        <input type="Checkbox" id="J69Checkbox" class="TEST">
                                        POIG. Tooth may be sensitive for the next few days after tx (recommend
                                        Panadol/Nurofen if necessary);
                                        Cautioned against consuming hot food/drinks until the LA wears off due to numb
                                        lip &
                                        cheek/lip biting.
                                        <br><br>


                                        <input type="Checkbox" id="crown2G22Checkbox" class="TEST"> Pt well on discharge
                                        <br>
                                        <input type="Checkbox" id="crown2supervisorCheckbox"> Supervisor: Dr
                                        <input type="text" id="crown2supervisornameTextInput"
                                               placeholder="Enter details..."> <br>

                                        <input type="Checkbox" id="crown2nvCheckbox" class="TEST"> N/V:
                                        <input type="text" id="crown2nvTextInput" class="TEST"
                                               placeholder="Enter details..."> <br>

                                        <br>


                                    </div>


                                    <button class="toggle-button2" id="button43"> Crown Impression

                                    </button>
                                    <input type="Checkbox" id="crown3allCheckbox" class="TEST">


                                    <div id="crown3Section" class="section">
                                        <h3> Crown Impression

                                        </h3><input type="Checkbox" id="ptcrown3Checkbox" class="TEST"> Pt. presented to
                                        <select id="crown3yearDropdown" class="TEST">
                                            <option value="4th Year">4th Year</option>
                                            <option value="3rd Year">3rd Year</option>
                                            <option value="4th Year">4th Year</option>
                                            <option value="5th Year">5th Year</option>
                                        </select>
                                        <select id="crown3clinicDropdown" class="TEST">
                                            <option value="Pros Clinic">Pros Clinic</option>
                                            <option value="Perio Clinic">Perio Clinic</option>
                                            <option value="GDP Clinic">GDP Clinic</option>
                                        </select>
                                        <select id="crown3codeDropdown" class="TEST">
                                            <option value="5.1">5.1</option>
                                            <option value="5.2">5.2</option>
                                            <option value="2.1">2.1</option>
                                            <option value="3.1">3.1</option>
                                            <option value="3.2">3.2</option>
                                            <option value="3.3">3.3</option>
                                            <option value="3.4">3.4</option>
                                            <option value="4.1">4.1</option>
                                            <option value="4.2">4.2</option>
                                            <option value="6.2">6.2</option>
                                            <option value="6.3">6.3</option>
                                        </select>
                                        for
                                        <select id="crown3typeDropdown" class="TEST">
                                            <option value="Crown impression">Crown impression</option>
                                            <option value="011">011</option>
                                            <option value="S/C">S/C</option>
                                            <option value="Consult">Consult</option>
                                        </select>
                                        OR
                                        <input type="text" id="crown3A1TextInput" class="TEST"
                                               placeholder="Enter details..."> <br>
                                        <input type="Checkbox" id="crown3c3sCheckbox" class="TEST"> 3C’s confirmed
                                        <input type="text" id="crown3c3sTextInput" class="TEST"
                                               placeholder="Enter details..."> <br>

                                        <input type="Checkbox" id="crown3colgateCheckbox" class="TEST"> Colgate 1.5%
                                        Hydrogen Peroxide Mouth rinse
                                        given. <br>

                                        <input type="Checkbox" id="crown3medicalHxCheckbox" class="TEST"> Medical Hx
                                        <select id="crown3hxDropdown" class="TEST">
                                            <option value="updated">Updated</option>
                                            <option value="verified">Verified</option>
                                            <option value="taken">taken</option>
                                        </select> <br><br>


                                        <strong>TX DELIVERED</strong>
                                        <br><br>
                                        <!-- J75 -->

                                        <!-- J80 -->
                                        <input type="Checkbox" id="J80Checkbox" class="TEST">
                                        Existing temporary crown restoration removed using flat plastic &/or spoon
                                        excavator. Existing cement
                                        materials removed using U/S at low frequency.
                                        <br>

                                        <!-- J81 --><br>
                                        <input type="Checkbox" id="J81Checkbox" class="TEST">
                                        Gingival retraction achieved using two-cord technique with Ultrapak #0 cord
                                        followed
                                        by Ultrapk #1 cord
                                        (infil with articaine w/ adrenaline to reduce bleeding if retraction cord w/
                                        hemodent is insufficient)
                                        <br><br>

                                        <!-- J82 -->
                                        <input type="Checkbox" id="J82Checkbox" class="TEST">
                                        Crown preparation margins refined using H/S.
                                        <br>

                                        <!-- J83 -->
                                        <input type="Checkbox" id="J83Checkbox" class="TEST">
                                        Crown prep surface was ensured moisture-free with Endodry using cotton pellets
                                        <br><br>

                                        <!-- J84 -->
                                        <input type="Checkbox" id="J84Checkbox" class="TEST">
                                        Crown impression taken with one-step impression technique using light body &
                                        heavy
                                        body PVS.
                                        <br><br>

                                        <!-- J85 -->
                                        <input type="Checkbox" id="J85Checkbox" class="TEST">
                                        Secondary impression checked for quality, sterilized & bagged. Lab card with
                                        instructions for construction
                                        of model & fixed prosthesis in selected shade written, scanned & sent to the
                                        lab.
                                        <br><br>

                                        <!-- J86 -->
                                        <input type="Checkbox" id="J86Checkbox" class="TEST">
                                        Temporary crown recemented. Margins assessed.
                                        <br><br>

                                        <strong>REMAINING TX PLAN</strong>
                                        <br>
                                        <!-- J87 -->
                                        <input type="Checkbox" id="J87Checkbox" class="TEST">
                                        Crown insertion
                                        <br><br>

                                        <strong>POST OP</strong>
                                        <br>
                                        <!-- J88 -->
                                        <input type="Checkbox" id="J88Checkbox" class="TEST">
                                        POIG. Tooth may be sensitive for the next few days after tx (recommend
                                        Panadol/Nurofen if necessary);
                                        Cautioned against consuming hot food/drinks until the LA wears off due to numb
                                        lip &
                                        cheek/lip biting.
                                        <br><br>

                                        <!-- J89 -->
                                        <input type="Checkbox" id="crown3G22Checkbox" class="TEST"> Pt well on discharge
                                        <br>
                                        <input type="Checkbox" id="crown3supervisorCheckbox"> Supervisor: Dr
                                        <input type="text" id="crown3supervisornameTextInput"
                                               placeholder="Enter details..."> <br>

                                        <input type="Checkbox" id="crown3nvCheckbox" class="TEST"> N/V:
                                        <input type="text" id="crown3nvTextInput" class="TEST"
                                               placeholder="Enter details..."> <br>


                                        <strong>LAB INSTRUCTIONS</strong>
                                        <br>
                                        <!-- J91 -->
                                        <input type="Checkbox" id="J91Checkbox" class="TEST">
                                        Please pour up PVS impression in die stone & mount max & mand model.
                                        <br>

                                        <!-- J92 -->
                                        <input type="Checkbox" id="J92Checkbox" class="TEST">
                                        Please construct PFM crown in fine gold cervical collar in SHADE ___ VITA 3D
                                        Master
                                        for TOOTH ___ OR Please
                                        construct Emax/Zirconia/Sinfony crown in SHADE ___ VITA Classic for TOOTH ___
                                        with
                                        STUMP SHADE ___.
                                        <br><br>

                                    </div>


                                    <button class="toggle-button2" id="button44"> Full crown – indirect


                                    </button>
                                    <input type="Checkbox" id="crown4allCheckbox" class="TEST">


                                    <div id="crown4Section" class="section">
                                        <h3> Full crown – indirect
                                        </h3>

                                        <input type="Checkbox" id="ptcrown4Checkbox" class="TEST"> Pt. presented to
                                        <select id="crown4yearDropdown" class="TEST">
                                            <option value="4th Year">4th Year</option>
                                            <option value="3rd Year">3rd Year</option>
                                            <option value="4th Year">4th Year</option>
                                            <option value="5th Year">5th Year</option>
                                        </select>
                                        <select id="crown4clinicDropdown" class="TEST">
                                            <option value="Pros Clinic">Pros Clinic</option>
                                            <option value="Perio Clinic">Perio Clinic</option>
                                            <option value="GDP Clinic">GDP Clinic</option>
                                        </select>
                                        <select id="crown4codeDropdown" class="TEST">
                                            <option value="5.1">5.1</option>
                                            <option value="5.2">5.2</option>
                                            <option value="2.1">2.1</option>
                                            <option value="3.1">3.1</option>
                                            <option value="3.2">3.2</option>
                                            <option value="3.3">3.3</option>
                                            <option value="3.4">3.4</option>
                                            <option value="4.1">4.1</option>
                                            <option value="4.2">4.2</option>
                                            <option value="6.2">6.2</option>
                                            <option value="6.3">6.3</option>
                                        </select>
                                        for
                                        <select id="crown4typeDropdown" class="TEST">
                                            <option value="Crown insertion">Crown insertion</option>
                                            <option value="011">011</option>
                                            <option value="S/C">S/C</option>
                                            <option value="Consult">Consult</option>
                                        </select>
                                        OR
                                        <input type="text" id="crown4A1TextInput" class="TEST"
                                               placeholder="Enter details..."> <br>
                                        <input type="Checkbox" id="crown4c3sCheckbox" class="TEST"> 3C’s confirmed
                                        <input type="text" id="crown4c3sTextInput" class="TEST"
                                               placeholder="Enter details..."> <br>

                                        <input type="Checkbox" id="crown4colgateCheckbox" class="TEST"> Colgate 1.5%
                                        Hydrogen Peroxide Mouth rinse
                                        given. <br>

                                        <input type="Checkbox" id="crown4medicalHxCheckbox" class="TEST"> Medical Hx
                                        <select id="crown4hxDropdown" class="TEST">
                                            <option value="updated">Updated</option>
                                            <option value="verified">Verified</option>
                                            <option value="taken">taken</option>
                                        </select> <br><br>


                                        <input type="Checkbox" id="J93Checkbox" class="TEST">
                                        <strong>TX DELIVERED</strong>
                                        <br>

                                        <!-- J94 -->

                                        <input type="Checkbox" id="J99Checkbox" class="TEST">
                                        Existing temporary crown restoration removed using spoon excavator. Existing
                                        cement
                                        materials removed using
                                        U/S at low frequency & use of pumice on S/S.
                                        <br>

                                        <!-- J100 -->
                                        <input type="Checkbox" id="J100Checkbox" class="TEST">
                                        Gingival retraction achieved using retraction cord.
                                        <br><br>

                                        <!-- J101 -->
                                        <input type="Checkbox" id="J101Checkbox" class="TEST">
                                        Fixed prosthesis trial seated & assessed for marginal adaptation using sickle
                                        probe,
                                        interproximal contacts
                                        using floss, MIP using Shimstock, lateral/protrusive slide patterns, shade &
                                        shape.
                                        <br><br>

                                        <!-- J102 -->
                                        <input type="Checkbox" id="J102Checkbox" class="TEST">
                                        Tooth preparation was cleaned using prophy with a mixture of flour pumice &
                                        water.
                                        <br><br>

                                        <!-- J103 -->
                                        <input type="Checkbox" id="J103Checkbox" class="TEST">
                                        Fixed prosthesis is cemented using resin-modified GIC (capsulated GC Fuji Plus)
                                        &
                                        held in place while excess
                                        cement is removed at the rubbery stage.
                                        <br>

                                        <!-- J104 -->
                                        <input type="Checkbox" id="J104Checkbox" class="TEST">
                                        Isolation is maintained for at least 5mins to allow complete set before rinse.
                                        <br><br>

                                        <!-- J105 -->
                                        <input type="Checkbox" id="J105Checkbox" class="TEST">
                                        Occlusion post-insertion is reassessed with the patient in the upright position.
                                        <br><br>

                                        <strong>REMAINING TX PLAN</strong>
                                        <br>
                                        <!-- J106 -->
                                        <input type="Checkbox" id="J106Checkbox" class="TEST">
                                        Fixed prosthesis review in 4/52.
                                        <br><br>

                                        <strong>POST OP</strong>
                                        <br>
                                        <!-- J107 -->
                                        <input type="Checkbox" id="J107Checkbox" class="TEST">
                                        POIG. Tooth may be sensitive for the next few days & while already adjusted for,
                                        minor discrepancy may still
                                        be felt but should resolve over the next few days. Gums may be a bit tender but
                                        cont. to brush gently using
                                        a soft TB; Rinsing w/ warm saltwater may help to reduce pain. Recommended
                                        Panadol/Nurofen if necessary.
                                        Reinforced care for fixed prosthesis i.e. OHI & encourage 6-monthly maintenance.
                                        Cautioned against consuming
                                        hot food/drinks until the LA wears off due to numb lip & lip biting.
                                        <br><br>

                                        <!-- J108 -->
                                        <input type="Checkbox" id="crown4G22Checkbox" class="TEST"> Pt well on discharge
                                        <br>
                                        <input type="Checkbox" id="crown4supervisorCheckbox"> Supervisor: Dr
                                        <input type="text" id="crown4supervisornameTextInput"
                                               placeholder="Enter details..."> <br>

                                        <input type="Checkbox" id="crown4nvCheckbox" class="TEST"> N/V:
                                        <input type="text" id="crown4nvTextInput" class="TEST"
                                               placeholder="Enter details..."> <br>

                                        <br><br>
                                    </div>


                                </div>
                                <button class="toggle-button5" id="button22">PROSTHODONTICS – REMOVABLE (7xx)</button>
                                <div id="dentureSection" class="section">
                                    <h3> 71x Complete maxillary & mandibular dentures </h3>
                                    <button class="toggle-button2" id="button23">F/F Primary Impression</button>
                                    <input type="Checkbox" class="TEST" id="ff1allCheckbox" class="TEST">

                                    <div id="denture1Section" class="section">
                                        <h3>700 Interim denture service – Consult, exam & primary impression for
                                            removable
                                            complete denture (1/6)
                                        </h3>
                                        <input type="Checkbox" id="ptff1Checkbox" class="TEST">
                                        Pt. presented to
                                        <select id="ff1yearDropdown" class="TEST">
                                            <option value="3rd Year">3rd Year</option>
                                            <option value="4th Year">4th Year</option>
                                            <option value="5th Year">5th Year</option>
                                        </select>
                                        <select id="ff1clinicDropdown" class="TEST">
                                            <option value="Pros Clinic">Pros Clinic</option>
                                            <option value="GDP Clinic">GDP Clinic</option>
                                            <option value="Perio Clinic">Perio Clinic</option>
                                        </select>
                                        <select id="ff1codeDropdown" class="TEST">
                                            <option value="5.1">5.1</option>
                                            <option value="5.2">5.2</option>
                                            <option value="2.1">2.1</option>
                                            <option value="3.1">3.1</option>
                                            <option value="3.2">3.2</option>
                                            <option value="3.3">3.3</option>
                                            <option value="3.4">3.4</option>
                                            <option value="4.1">4.1</option>
                                            <option value="4.2">4.2</option>
                                            <option value="6.2">6.2</option>
                                            <option value="6.3">6.3</option>
                                        </select>
                                        for
                                        <select id="ff1typeDropdown" class="TEST">
                                            <option value="F/F Primary Impression">F/F Primary Impression</option>
                                            <option value="011">011</option>
                                            <option value="S/C">S/C</option>
                                            <option value="Consult">Consult</option>
                                        </select>
                                        OR
                                        <input type="text" id="ff1A1TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="ff1c3sCheckbox" class="TEST">
                                        3C’s confirmed
                                        <input type="text" id="ff1c3sTextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="ff1colgateCheckbox" class="TEST">
                                        Colgate 1.5% Hydrogen Peroxide Mouth rinse given. <br>
                                        <input type="Checkbox" id="ff1medicalHxCheckbox" class="TEST">
                                        Medical Hx
                                        <select id="ff1hxDropdown" class="TEST">
                                            <option value="updated">Updated</option>
                                            <option value="verified">Verified</option>
                                            <option value="taken">taken</option>
                                        </select>
                                        <br>
                                        <br>
                                        DENTAL/DENTURE Hx: <br>
                                        <input type="Checkbox" id="G1Checkbox" class="TEST" class="TEST" checked
                                               hidden="">
                                        Reason for tooth loss (years of edentulous):
                                        <input type="text" id="G1TextInput" class="TEST" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="G2Checkbox" class="TEST" class="TEST" checked hidden>
                                        Patient’s responsibility in home care:
                                        <input type="text" id="G2TextInput" class="TEST" placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="G3Checkbox" class="TEST" checked hidden>
                                        Hx & preference of existing & previous denture:
                                        <input type="text" id="G3TextInput" class="TEST" placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="G4Checkbox" class="TEST" checked hidden>
                                        Evaluation of existing denture:
                                        <input type="text" id="G4TextInput" class="TEST" placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="G5Checkbox" class="TEST" checked hidden>
                                        Smoking Hx:
                                        <input type="text" id="G5aTextInput" class="TEST"
                                               placeholder="Enter details...">
                                        a day, since
                                        <input type="text" id="G5bTextInput" class="TEST"
                                               placeholder="Enter details...">
                                        ago,
                                        <input type="text" id="G5cTextInput" class="TEST"
                                               placeholder="Enter details...">
                                        intention of quitting. <br>
                                        <input type="Checkbox" id="G6Checkbox" class="TEST">
                                        Personality assessment:
                                        <select id="G6Dropdown" class="TEST">
                                            <option value="">Type</option>
                                            <option value="Philosophical (normal)">Philosophical (normal)</option>
                                            <option value="Exacting (demanding)">Exacting (demanding)</option>
                                            <option value="Indifferent">Indifferent</option>
                                            <option value="Hysterical">Hysterical</option>
                                        </select>
                                        <br>
                                        <br>
                                        <input type="Checkbox" id="G7Checkbox" class="TEST">
                                        E/O EXAMINATION > NAD <br>
                                        <input type="Checkbox" id="G8Checkbox" class="TEST">
                                        I/O EXAMINATION > NAD <br>
                                        <input type="Checkbox" id="G9Checkbox" class="TEST" checked hidden>
                                        RADIOGRAPHIC ASSESSMENT:
                                        <input type="text" id="G9TextInput" class="TEST" placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="G10Checkbox" class="TEST" checked hidden="">
                                        TX OPTIONS
                                        <input type="text" id="G10TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <br>
                                        <input type="Checkbox" id="G10ACheckbox" class="TEST">
                                        Pt notified that completion of complete denture will take a min of 3mo (i.e. 6
                                        appt
                                        with 2weeks interval
                                        <br>
                                        <input type="Checkbox" id="G11Checkbox" class="TEST">
                                        TX DELIVERED
                                        > Max & mand alginate primary impression taken. Impression checked for quality,
                                        sterilized & bagged. Lab
                                        card with instructions for pour up of impression & construction of special trays
                                        for
                                        ZOE impression written,
                                        scanned & sent to the lab. <br>
                                        <input type="Checkbox" id="G12Checkbox" class="TEST">
                                        Denture hygiene instructions given for existing denture (i.e. to clean with a
                                        soft
                                        brush & gentle soap, to
                                        remove denture at night & to soak in diluted white vinegar or Milton
                                        antibacterial
                                        tablets) <br>
                                        <br>
                                        <input type="Checkbox" id="G13Checkbox" class="TEST">
                                        Pt well on discharge
                                        <input type="text" id="G13TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="G13aCheckbox1">
                                        Supervisor: Dr
                                        <input type="text" id="G13aTextInput1" placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="G14Checkbox" class="TEST">
                                        N/V: F/F secondary impression OR
                                        <input type="text" id="G14TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <br>
                                        <br>
                                        <strong>Lab Instructions</strong> <br>
                                        <input type="Checkbox" class="TEST" id="G15Checkbox" class="TEST">
                                        1. Please construct diagnostic models from alginate impressions. <br>
                                        <input type="Checkbox" class="TEST" id="G16Checkbox" class="TEST">
                                        2. Please construct custom trays:
                                        <select class="TEST" id="G16Dropdown" class="TEST">
                                            <option value="">Tray type</option>
                                            <option
                                                value="for ZOE impression – custom trays 2mm shy of depth of sulcus, no spacer; ">
                                                ZOE impression
                                            </option>
                                            <option
                                                value="for PVS – custom trays with 2 sheets of baseplate wax as spacer">
                                                PVS Impression
                                            </option>
                                        </select>
                                        <br>
                                        <hr>
                                    </div>
                                    <button class="toggle-button2" id="button24">F/F Secondary Impression</button>
                                    <input type="Checkbox" id="ff2allCheckbox" class="TEST">

                                    <div id="denture2Section" class="section">
                                        <h3>700 Interim denture service – Secondary impression for removable complete
                                            denture (2/6)</h3>
                                        <input type="Checkbox" id="ptff2Checkbox" class="TEST">
                                        Pt. presented to
                                        <select id="ff2yearDropdown" class="TEST">
                                            <option value="3rd Year">3rd Year</option>
                                            <option value="4th Year">4th Year</option>
                                            <option value="5th Year">5th Year</option>
                                        </select>
                                        <select id="ff2clinicDropdown" class="TEST">
                                            <option value="Pros Clinic">Pros Clinic</option>
                                            <option value="Perio Clinic">Perio Clinic</option>
                                            <option value="GDP Clinic">GDP Clinic</option>
                                        </select>
                                        <select id="ff2codeDropdown" class="TEST">
                                            <option value="5.1">5.1</option>
                                            <option value="5.2">5.2</option>
                                            <option value="2.1">2.1</option>
                                            <option value="3.1">3.1</option>
                                            <option value="3.2">3.2</option>
                                            <option value="3.3">3.3</option>
                                            <option value="3.4">3.4</option>
                                            <option value="4.1">4.1</option>
                                            <option value="4.2">4.2</option>
                                            <option value="6.2">6.2</option>
                                            <option value="6.3">6.3</option>
                                        </select>
                                        for
                                        <select id="ff2typeDropdown" class="TEST">
                                            <option value="F/F 2ndary Impression"> 2ndary Impression</option>
                                            <option value="011">011</option>
                                            <option value="S/C">S/C</option>
                                            <option value="Consult">Consult</option>
                                        </select>
                                        OR
                                        <input type="text" id="ff2A1TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="ff2c3sCheckbox" class="TEST">
                                        3C’s confirmed
                                        <input type="text" id="ff2c3sTextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="ff2colgateCheckbox" class="TEST">
                                        Colgate 1.5% Hydrogen Peroxide Mouth rinse given. <br>
                                        <input type="Checkbox" id="ff2medicalHxCheckbox" class="TEST">
                                        Medical Hx
                                        <select id="ff2hxDropdown" class="TEST">
                                            <option value="updated">Updated</option>
                                            <option value="verified">Verified</option>
                                            <option value="taken">taken</option>
                                        </select>
                                        <br>
                                        <br>
                                        <input type="Checkbox" id="G18Checkbox" class="TEST">
                                        Custom tray adjusted with acrylic burs to 1mm short of sulcus, not interfering
                                        with
                                        frenum <br>
                                        <input type="Checkbox" id="G19Checkbox" class="TEST">
                                        Border moulding was performed with the addition of compound stick to the
                                        periphery
                                        of trays <br>
                                        <input type="Checkbox" id="G20Checkbox" class="TEST">
                                        Max & mand secondary impression taken with
                                        <select id="G20Dropdown" class="TEST">
                                            <option value="Green Alginate">Green Alginate</option>
                                            <option value="PVS">PVS</option>
                                        </select>
                                        . Post dam was marked with an indelible marker & transferred to the impression.
                                        Impression checked for
                                        quality, sterilized & bagged. <br>
                                        <input type="Checkbox" id="G21Checkbox" class="TEST">
                                        Lab card with instructions for construction of master cast & provision of
                                        occlusal
                                        wax rims in std
                                        dimensions written, scanned & sent to the lab. <br>
                                        <br>
                                        <input type="Checkbox" id="G22Checkbox" class="TEST">
                                        Pt well on discharge <br>
                                        <input type="Checkbox" id="ff2supervisorCheckbox">
                                        Supervisor: Dr
                                        <input type="text" id="ff2supervisornameTextInput"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="G23Checkbox" class="TEST">
                                        N/V: F/F Jaw registration <br>
                                        <br>
                                        <strong>Lab Instructions</strong> <br>
                                        <input type="Checkbox" id="G24Checkbox" class="TEST">
                                        > Please construct master cast in stone with 3mm land area, scribe post-dam as
                                        indicated on Max impression,
                                        depth of post dam
                                        <input type="text" id="G24TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        mm. <br>
                                        <input type="Checkbox" id="G25Checkbox" class="TEST">
                                        Please provide occlusal wax rims to standard dimensions. <br>
                                        <hr>
                                    </div>
                                    <button class="toggle-button2" id="button25">F/F Jaw Reg Impression</button>
                                    <input type="Checkbox" id="ff3allCheckbox" class="TEST">

                                    <div id="denture3Section" class="section">
                                        <input type="Checkbox" id="ptff3Checkbox" class="TEST">
                                        Pt. presented to
                                        <select id="ff3yearDropdown" class="TEST">
                                            <option value="3rd Year">3rd Year</option>
                                            <option value="4th Year">4th Year</option>
                                            <option value="5th Year">5th Year</option>
                                        </select>
                                        <select id="ff3clinicDropdown" class="TEST">
                                            <option value="Pros Clinic">Pros Clinic</option>
                                            <option value="Perio Clinic">Perio Clinic</option>
                                            <option value="GDP Clinic">GDP Clinic</option>
                                        </select>
                                        <select id="ff3codeDropdown" class="TEST">
                                            <option value="5.1">5.1</option>
                                            <option value="5.2">5.2</option>
                                            <option value="2.1">2.1</option>
                                            <option value="3.1">3.1</option>
                                            <option value="3.2">3.2</option>
                                            <option value="3.3">3.3</option>
                                            <option value="3.4">3.4</option>
                                            <option value="4.1">4.1</option>
                                            <option value="4.2">4.2</option>
                                            <option value="6.2">6.2</option>
                                            <option value="6.3">6.3</option>
                                        </select>
                                        for
                                        <select id="ff3typeDropdown" class="TEST">
                                            <option value="F/F Jaw reg"> F/F Jaw Reg</option>
                                            <option value="011">011</option>
                                            <option value="S/C">S/C</option>
                                            <option value="Consult">Consult</option>
                                        </select>
                                        OR
                                        <input type="text" id="ff3A1TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="ff3c3sCheckbox" class="TEST">
                                        3C’s confirmed
                                        <input type="text" id="ff3c3sTextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="ff3colgateCheckbox" class="TEST">
                                        Colgate 1.5% Hydrogen Peroxide Mouth rinse given. <br>
                                        <input type="Checkbox" id="ff3medicalHxCheckbox" class="TEST">
                                        Medical Hx
                                        <select id="ff3hxDropdown" class="TEST">
                                            <option value="updated">Updated</option>
                                            <option value="verified">Verified</option>
                                            <option value="taken">taken</option>
                                        </select>
                                        <br>
                                        <br>
                                        <input type="Checkbox" id="G28Checkbox" class="TEST" checked hidden="">
                                        VDR:
                                        <input type="text" id="G28TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        mm est. from nose tip to chin. 3mm freeway space selected OR <br>
                                        <input type="Checkbox" id="G29Checkbox" class="TEST" checked hidden="">
                                        VDO of existing denture:
                                        <input type="text" id="G29TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        mm. <br>
                                        <input type="Checkbox" id="G30Checkbox" class="TEST">
                                        Occlusal wax rims were checked for their stability. <br>
                                        <input type="Checkbox" id="G31Checkbox" class="TEST">
                                        Max wax rim was adjusted for lip support, tooth display & occlusal plane <br>
                                        <input type="Checkbox" id="G32Checkbox" class="TEST">
                                        Facial midline, canine lines & smile line were marked on the wax rims. <br>
                                        <input type="Checkbox" id="G33Checkbox" class="TEST">
                                        Centric relation was recorded & reproduceable. <br>
                                        <input type="Checkbox" id="G34Checkbox" class="TEST">
                                        Tooth shade
                                        <input type="text" id="G34TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        &
                                        <select id="G34Dropdown" class="TEST">
                                            <option value="square">square</option>
                                            <option value="rectangular">rectangular</option>
                                            <option value="triangular">triangular</option>
                                            <option value=" ovoid"> ovoidr</option>
                                        </select>
                                        anterior mould was selected. <br>
                                        <input type="Checkbox" id="G35Checkbox" class="TEST">
                                        Marked occlusal wax rims were sterilized & bagged. Lab card with instructions
                                        for
                                        articulation of master
                                        casts & set up of teeth for try-in was written, scanned & sent to the lab. <br>
                                        <br>
                                        <input type="Checkbox" id="ff3G22Checkbox" class="TEST">
                                        Pt well on discharge <br>
                                        <input type="Checkbox" id="ff3supervisorCheckbox">
                                        Supervisor: Dr
                                        <input type="text" id="ff3supervisornameTextInput"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="ff3G23Checkbox" class="TEST">
                                        N/V: Teeth Try In <br>
                                        <br>
                                        <strong>Lab Instructions </strong> <br>
                                        <input type="Checkbox" id="G38Checkbox" class="TEST">
                                        > Please articulate master casts with bite registration provided. <br>
                                        <input type="Checkbox" id="G38ACheckbox" class="TEST">
                                        > Please set up Max & Mand teeth for try-in in shade ___, MOLD selected above.
                                        <br>
                                        <input type="Checkbox" id="G38BCheckbox" class="TEST">
                                        If old dentures present: Please mould to match existing denture based on denture
                                        impression provided. <br>
                                        <input type="Checkbox" id="G38CCheckbox" class="TEST">
                                        If Class III skeletal: Please try to achieve edge-to-edge occlusion even if max
                                        teeth have to be brought
                                        forward. <br>
                                        <hr>
                                    </div>
                                    <button class="toggle-button2" id="button26">F/F Teeth Try In</button>
                                    <input type="Checkbox" id="ff4allCheckbox" class="TEST">

                                    <div id="denture6Section" class="section"> Interim denture service – Wax tooth
                                        try-in
                                        for removable complete
                                        denture (4/6)
                                        <input type="Checkbox" id="ptff4Checkbox" class="TEST">
                                        Pt. presented to
                                        <select id="ff4yearDropdown" class="TEST">
                                            <option value="3rd Year">3rd Year</option>
                                            <option value="4th Year">4th Year</option>
                                            <option value="5th Year">5th Year</option>
                                        </select>
                                        <select id="ff4clinicDropdown" class="TEST">
                                            <option value="Pros Clinic">Pros Clinic</option>
                                            <option value="Perio Clinic">Perio Clinic</option>
                                            <option value="GDP Clinic">GDP Clinic</option>
                                        </select>
                                        <select id="ff4codeDropdown" class="TEST">
                                            <option value="5.1">5.1</option>
                                            <option value="5.2">5.2</option>
                                            <option value="2.1">2.1</option>
                                            <option value="3.1">3.1</option>
                                            <option value="3.2">3.2</option>
                                            <option value="3.3">3.3</option>
                                            <option value="3.4">3.4</option>
                                            <option value="4.1">4.1</option>
                                            <option value="4.2">4.2</option>
                                            <option value="6.2">6.2</option>
                                            <option value="6.3">6.3</option>
                                        </select>
                                        for
                                        <select id="ff4typeDropdown" class="TEST">
                                            <option value="F/F Wax tooth try-in"> Wax tooth try-in</option>
                                            <option value="011">011</option>
                                            <option value="S/C">S/C</option>
                                            <option value="Consult">Consult</option>
                                        </select>
                                        OR
                                        <input type="text" id="ff4A1TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="ff4c3sCheckbox" class="TEST">
                                        3C’s confirmed
                                        <input type="text" id="ff4c3sTextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="ff4colgateCheckbox" class="TEST">
                                        Colgate 1.5% Hydrogen Peroxide Mouth rinse given. <br>
                                        <input type="Checkbox" id="ff4medicalHxCheckbox" class="TEST">
                                        Medical Hx
                                        <select id="ff4hxDropdown" class="TEST">
                                            <option value="updated">Updated</option>
                                            <option value="verified">Verified</option>
                                            <option value="taken">taken</option>
                                        </select>
                                        <br>
                                        <br>
                                        <input type="Checkbox" id="G49Checkbox" class="TEST">
                                        Wax-tooth was inserted to verify midline, CR, VDO, lip support, tooth position,
                                        buccal corridor, occlusal
                                        plane (w/ articulating paper), phonetics, & aesthetics. <br>
                                        <input type="Checkbox" id="G50Checkbox" class="TEST">
                                        Bite position was reverified. Retake of jaw record
                                        <select id="G49Dropdown" class="TEST">
                                            <option value="not required">not required</option>
                                            <option value="required">required</option>
                                        </select>
                                        <br>
                                        <input type="Checkbox" id="G51Checkbox" class="TEST">
                                        <label for="G51Checkbox" class="TEST"> Patient was given a mirror & was
                                            satisfied
                                            with the teeth size,
                                            colour, & the overall appearance of the denture. Patient’s approval to
                                            process
                                            the denture was obtained.
                                        </label>
                                        <br>
                                        <input type="Checkbox" id="G52Checkbox" class="TEST">
                                        <label for="G52Checkbox" class="TEST"> Wax-tooth was sterilized & bagged. Lab
                                            card
                                            with instructions to seal
                                            wax rims, process the denture in 60:40 original & light pink acrylic, &
                                            finish
                                            for insertion was written,
                                            scanned & sent to the lab. </label>
                                        <br>
                                        <br>
                                        <input type="Checkbox" id="ff4G22Checkbox" class="TEST">
                                        Pt well on discharge <br>
                                        <input type="Checkbox" id="ff4supervisorCheckbox">
                                        Supervisor: Dr
                                        <input type="text" id="ff4supervisornameTextInput"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="ff4G23Checkbox" class="TEST">
                                        N/V: Insertion <br>
                                        <br>
                                        <input type="Checkbox" id="G54Checkbox" class="TEST">
                                        <label for="G54Checkbox" class="TEST"> <strong>LAB INSTRUCTIONS</strong> <br>
                                            > Please do not move the teeth, seal wax rims & finesse wax up in anterior
                                            region. <br>
                                            > Please process in 60:40 original & light pink acrylic & finish for
                                            insertion.
                                        </label>
                                        <br>
                                        <hr>
                                    </div>
                                    <button class="toggle-button2" id="button27">F/F Insertion</button>
                                    <input type="Checkbox" id="G156Checkbox" class="TEST">

                                    <div id="denture5Section" class="section"> Interim denture service – Insertion of
                                        removable complete denture
                                        (5/6) <br>
                                        <input type="Checkbox" id="ptff5Checkbox" class="TEST">
                                        Pt. presented to
                                        <select id="ff5yearDropdown" class="TEST">
                                            <option value="3rd Year">3rd Year</option>
                                            <option value="4th Year">4th Year</option>
                                            <option value="5th Year">5th Year</option>
                                        </select>
                                        <select id="ff5clinicDropdown" class="TEST">
                                            <option value="Pros Clinic">Pros Clinic</option>
                                            <option value="Perio Clinic">Perio Clinic</option>
                                            <option value="GDP Clinic">GDP Clinic</option>
                                        </select>
                                        <select id="ff5codeDropdown" class="TEST">
                                            <option value="5.1">5.1</option>
                                            <option value="5.2">5.2</option>
                                            <option value="2.1">2.1</option>
                                            <option value="3.1">3.1</option>
                                            <option value="3.2">3.2</option>
                                            <option value="3.3">3.3</option>
                                            <option value="3.4">3.4</option>
                                            <option value="4.1">4.1</option>
                                            <option value="4.2">4.2</option>
                                            <option value="6.2">6.2</option>
                                            <option value="6.3">6.3</option>
                                        </select>
                                        for
                                        <select id="ff5typeDropdown" class="TEST">
                                            <option value="F/F Insertion"> Insertion</option>
                                            <option value="011">011</option>
                                            <option value="S/C">S/C</option>
                                            <option value="Consult">Consult</option>
                                        </select>
                                        OR
                                        <input type="text" id="ff5A1TextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="ff5c3sCheckbox" class="TEST">
                                        3C’s confirmed
                                        <input type="text" id="ff5c3sTextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="ff5colgateCheckbox" class="TEST">
                                        Colgate 1.5% Hydrogen Peroxide Mouth rinse given. <br>
                                        <input type="Checkbox" id="ff5medicalHxCheckbox" class="TEST">
                                        Medical Hx
                                        <select id="ff5hxDropdown" class="TEST">
                                            <option value="updated">Updated</option>
                                            <option value="verified">Verified</option>
                                            <option value="taken">taken</option>
                                        </select>
                                        <br>
                                        <br>
                                        <input type="Checkbox" id="G41Checkbox" class="TEST">
                                        Denture base areas & peripheral borders were checked for high spots/overextended
                                        areas using pressure
                                        indicator paste. Frenum is cleared. <br>
                                        <input type="Checkbox" id="G42Checkbox" class="TEST">
                                        Effective post dam was confirmed w/ extrusion forces <br>
                                        <input type="Checkbox" id="G43Checkbox" class="TEST">
                                        Occlusion was reverified with articulating paper. <br>
                                        <input type="Checkbox" id="G44Checkbox" class="TEST">
                                        Denture hygiene instructions given (i.e. to clean with soft brush & gentle soap,
                                        to
                                        remove denture at night
                                        & to soak in diluted white vinegar or Milton antibacterial tablets) <br>
                                        <br>
                                        <input type="Checkbox" id="ff5G22Checkbox" class="TEST">
                                        Written denture instructions given & explained. Pt well on discharge <br>
                                        <input type="Checkbox" id="ff5supervisorCheckbox">
                                        Supervisor: Dr
                                        <input type="text" id="ff5supervisornameTextInput"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="ff5G23Checkbox" class="TEST">
                                        N/V: F/F Review <br>
                                        <br>
                                    </div>
                                    <button class="toggle-button2" id="button28">F/F Review</button>
                                    <input type="Checkbox" id="ff6allCheckbox" class="TEST">

                                    <div id="denture50Section" class="section"> Interim denture service – Review of
                                        removable complete denture
                                        (6/6) <br>
                                        <input type="Checkbox" id="ptff6Checkbox" class="TEST">
                                        Pt. presented to
                                        <select id="ff6yearDropdown" class="TEST">
                                            <option value="3rd Year">3rd Year</option>
                                            <option value="4th Year">4th Year</option>
                                            <option value="5th Year">5th Year</option>
                                        </select>
                                        <select id="ff6clinicDropdown" class="TEST">
                                            <option value="Pros Clinic">Pros Clinic</option>
                                            <option value="Perio Clinic">Perio Clinic</option>
                                            <option value="GDP Clinic">GDP Clinic</option>
                                        </select>
                                        <select id="ff6codeDropdown" class="TEST">
                                            <option value="5.1">5.1</option>
                                            <option value="5.2">5.2</option>
                                            <option value="2.1">2.1</option>
                                            <option value="3.1">3.1</option>
                                            <option value="3.2">3.2</option>
                                            <option value="3.3">3.3</option>
                                            <option value="3.4">3.4</option>
                                            <option value="4.1">4.1</option>
                                            <option value="4.2">4.2</option>
                                            <option value="6.2">6.2</option>
                                            <option value="6.3">6.3</option>
                                        </select>
                                        for
                                        <select id="ff6typeDropdown" class="TEST">
                                            <option value="F/F Review">F/F Review</option>
                                            <option value="011">011</option>
                                            <option value="S/C">S/C</option>
                                            <option value="Consult">Consult</option>
                                        </select>
                                        <input type="text" id="ff6A1TextInput" class="TEST"
                                               placeholder="Enter details..."
                                               hidden="">
                                        <br>
                                        <input type="Checkbox" id="ff6c3sCheckbox" class="TEST">
                                        3C’s confirmed
                                        <input type="text" id="ff6c3sTextInput" class="TEST"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="ff6colgateCheckbox" class="TEST">
                                        Colgate 1.5% Hydrogen Peroxide Mouth rinse given. <br>
                                        <input type="Checkbox" id="ff6medicalHxCheckbox" class="TEST">
                                        Medical Hx
                                        <select id="ff6hxDropdown" class="TEST">
                                            <option value="updated">Updated</option>
                                            <option value="verified">Verified</option>
                                            <option value="taken">taken</option>
                                        </select>
                                        <br>
                                        <br>
                                        <input type="Checkbox" id="G55Checkbox" class="TEST">
                                        Patient interview & intraoral examination were performed to review for any
                                        post-operative issues due to the
                                        denture. <br>
                                        <input type="Checkbox" id="G56Checkbox" class="TEST">
                                        FINDINGS > NAD <strong>OR</strong> <br>
                                        <br>
                                        <input type="Checkbox" id="G57Checkbox" class="TEST">
                                        Ulcers in frenum region, sulcus & mylohyoid ridge due to lack of clearance <br>
                                        <input type="Checkbox" id="G58Checkbox" class="TEST">
                                        Correction of occlusion required <br>
                                        <input type="Checkbox" id="G59Checkbox" class="TEST">
                                        Cheek biting due to lack of buccal overjet <br>
                                        <input type="Checkbox" id="G60Checkbox" class="TEST">
                                        Restricted food or chewing <br>
                                        <input type="Checkbox" id="G61Checkbox" class="TEST">
                                        Lack of retention (i.e. overextension, processing errors) <br>
                                        <input type="Checkbox" id="G62Checkbox" class="TEST">
                                        Too bulky in palatal or buccal surfaces <br>
                                        <br>
                                        <input type="Checkbox" id="ff6G22Checkbox" class="TEST">
                                        Pt well on discharge <br>
                                        <input type="Checkbox" id="ff6supervisorCheckbox">
                                        Supervisor: Dr
                                        <input type="text" id="ff6supervisornameTextInput"
                                               placeholder="Enter details...">
                                        <br>
                                        <input type="Checkbox" id="ff6G23Checkbox" class="TEST">
                                        N/V: Review 2.0 <br>
                                        <br>
                                    </div>
                                    <br>
                                    <hr>

                                    <button class="toggle-button2" id="button35"> Other removable prosthodontic services
                                    </button>
                                    <div id="othercodesSection" class="section"> - 736 Immediate tooth replacement – per
                                        tooth (either new or
                                        addition to existing denture post-exo)<br>
                                        <br>
                                        - 741 Adjustment of a denture (should be recorded for adjustments if it is >3
                                        months
                                        after date of
                                        insertion or if insertion clinician is external to HHS)<br>
                                        <br>
                                        - 743 Relining - complete denture – processed; 744 Relining - partial denture –
                                        processed<br>
                                        <br>
                                        - 763 Repairing broken base of a complete denture; 764 Repairing broken base of
                                        a
                                        partial denture<br>
                                        <br>
                                        - 772 Splint – resin – indirect <br>
                                        <br>
                                        - 776 Impression – dental appliance repair/modification<br>
                                        <br>
                                    </div>
                                    <button class="toggle-button2" id="button36">P/P Item Codes</button>
                                    <div id="ppcodesSection" class="section"> 700 Interim denture service (no fee;
                                        should be
                                        recorded at each
                                        appointment during the construction
                                        stages of a denture)<br>
                                        - 721 Partial maxillary denture - resin base<br>
                                        - 722 Partial mandibular denture - resin base<br>
                                        - 727 Partial maxillary denture – cast metal framework<br>
                                        - 728 Partial mandibular denture – cast metal framework<br>
                                        - 731 Retainer - per tooth<br>
                                        - 732 Occlusal rest – per rest<br>
                                    </div>
                                    <hr>
                                </div>
                                <button class="toggle-button5" id="button37">OTHER SERVICES (9xx)</button>
                                <br>
                                <div id="otherSection1" class="section"> COMING SOON</div>

                                <div id="output1">
                                    If you write on right, your text will be deleted if you go back to the template or
                                    change anything.
                                    Enter Your Text here to be generated on the right.
                                    <br>
                                    <p><strong> AFTER MED HISTORY</strong></p>
                                    <textarea id="generatedText2" class="TEST" placeholder=""></textarea>
                                    <p><strong> BEFORE SUPERVISOR</strong></p>
                                    <textarea id="generatedText1" class="TEST" placeholder=""></textarea>
                                </div>

                                <hr>
                                <h2>MISCELLANEOUS </h2>
                                <button class="toggle-button5" id="button38">PSR Scores</button>
                                <br>
                                <div id="psrSection1" class="section">
                                    <table>
                                        <tr>
                                            <th>Score</th>
                                            <th>Description</th>
                                            <th>Treatment Plan</th>
                                        </tr>
                                        <tr>
                                            <td>0</td>
                                            <td>Healthy periodontium, PDD <3.5mm< /td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Bleeding on gentle probing, plaque present</td>
                                            <td>OHI & prophylaxis</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Presence of calculus &/or defective margin</td>
                                            <td>OHI & debridement (dead tissue removal)</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>PDD >3.5mm but below 5.5mm</td>
                                            <td>Comprehensive exam & periodontal treatment</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>PDD >5.5mm</td>
                                            <td>Comprehensive exam & specialist periodontal treatment</td>
                                        </tr>
                                        <tr>
                                            <td>*</td>
                                            <td>Presence of recession, mobility, furcation exposure, or other
                                                mucogingival
                                                problems
                                            </td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>x</td>
                                            <td>Sextant with <2 teeth</td>
                                            <td>Not included in overall evaluation</td>
                                        </tr>
                                    </table>
                                    <hr>
                                </div>
                                <button class="toggle-button5" id="button39">ICDAS Scoring System</button>
                                <br>
                                <div id="icdasSection1" class="section">
                                    <table>
                                        <tr>
                                            <th>Code</th>
                                            <th>Description</th>
                                        </tr>
                                        <tr>
                                            <td>0</td>
                                            <td>Sound tooth surface no caries change after drying (5s), hypoplasia,
                                                wear,
                                                erosion & other non-caries
                                                lesions
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>First visual change in enamel (colored change limited to the confines of
                                                the
                                                pit & fissure area) seen
                                                after air drying
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Distinct visual change in enamel (white/colored wider than the
                                                fissure/pit)
                                                seen when wet
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Localized enamel breakdown (discontinuity of enamel surface or widening
                                                of
                                                fissure) w/ no visible
                                                dentine/underlying shadow
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Underlying dark shadow from dentine w/wo localized enamel breakdown</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Distinct cavity (<1 /2 of tooth surface) w/ visible dentine</td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Extensive distinct cavity (deep & wide; >1/2 tooth surface) w/ visible
                                                dentine
                                            </td>
                                        </tr>
                                    </table>
                                    <table>
                                        <tr>
                                            <th>Code</th>
                                            <th>Description</th>
                                        </tr>
                                        <tr>
                                            <td>0</td>
                                            <td>No visible radiolucency</td>
                                        </tr>
                                        <tr>
                                            <td>RA1</td>
                                            <td>Radiolucency in the outer ½ of enamel</td>
                                        </tr>
                                        <tr>
                                            <td>RA2</td>
                                            <td>Radiolucency in the inner ½ of enamel up to the DEJ border</td>
                                        </tr>
                                        <tr>
                                            <td>RA3</td>
                                            <td>Radiolucency limited to outer 3rd of dentine</td>
                                        </tr>
                                        <tr>
                                            <td>RB4</td>
                                            <td>Radiolucency reaching the middle 3rd of dentine</td>
                                        </tr>
                                        <tr>
                                            <td>RC5</td>
                                            <td>Radiolucency reaching the inner 3rd of dentine, clinically cavitated
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>RC6</td>
                                            <td>Radiolucency into the pulp, clinically cavitated</td>
                                        </tr>
                                    </table>
                                    <hr>
                                </div>
                                <button class="toggle-button5" id="button40">LA Information</button>
                                <br>
                                <div id="laSection1" class="section">
                                    <h2>Drug Brand, Maximum Dose, and Maximum Number of Cartridges</h2>
                                    <table>
                                        <tr>
                                            <th>Drug</th>
                                            <th>Brand</th>
                                            <th>Max Dose</th>
                                            <th>Max No. Cartridges (~70KG)</th>
                                        </tr>
                                        <tr>
                                            <td>Articaine 4% w/ 1:100k adrenaline</td>
                                            <td>Septanest 4%</td>
                                            <td>7mg/kg (up to 500mg)</td>
                                            <td>7</td>
                                        </tr>
                                        <tr>
                                            <td>Bupivacaine 0.5% w/ 1:200k adrenaline</td>
                                            <td>Marcain 0.5%</td>
                                            <td>2mg/kg (up to 200mg)</td>
                                            <td>10</td>
                                        </tr>
                                        <tr>
                                            <td>Lidocaine w/ 1:80k adrenaline</td>
                                            <td>Lignospan Sp 2%</td>
                                            <td>7mg/kg (up to 500mg)</td>
                                            <td>13</td>
                                        </tr>
                                        <tr>
                                            <td> Mepivacaine 3% w/o adrenaline</td>
                                            <td>Scandonest 3%</td>
                                            <td>6.6mg/kg (up to 400mg)</td>
                                            <td>11 (7 if 3% w/o vasoconstrictor)</td>
                                        </tr>
                                        <tr>
                                            <td>Prilocaine 4%</td>
                                            <td>Citanest Plain 4%</td>
                                            <td>8mg/kg (up to 500mg)</td>
                                            <td>8</td>
                                        </tr>
                                    </table>
                                    <hr>
                                </div>

                                <button class="toggle-button5" id="button400">AAP/EFP Periodonal Classification 2018
                                </button>
                                <br>
                                <div id="perioclassSection1" class="section">


                                    <table>
                                        <thead>
                                        <tr>
                                            <th>Stage</th>
                                            <th>Stage I</th>
                                            <th>Stage II</th>
                                            <th>Stage III</th>
                                            <th>Stage IV</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <td>Interdental CAL at site of greatest loss</td>
                                            <td>1 – 2 mm</td>
                                            <td>3 – 4 mm</td>
                                            <td>≥ 5mm</td>
                                            <td>≥ 5mm</td>
                                        </tr>
                                        <tr>
                                            <td>Radiographic Bone loss</td>

                                            <td>Coronal Third (< 15%)</td>
                                            <td>Coronal Third (15 – 33 %)</td>
                                            <td>Extending to the mid third of the root and beyond.</td>
                                            <td>Extending to the mid third of the root and beyond.</td>
                                        </tr>
                                        <tr>
                                            <td>Periodontitis-associated tooth loss</td>
                                            <td colspan="2">No tooth loss due to Periodontitis.</td>
                                            <td>Tooth loss due to Periodontitis of ≤ 4 teeth.</td>
                                            <td>Tooth loss due to Periodontitis of ≥ 5 teeth.</td>

                                        </tr>
                                        <tr>
                                            <td>Complexity</td>
                                            <td>Maximum probing depth ≤ 4mm. Mostly horizontal bone loss.</td>
                                            <td>Maximum probing depth ≤ 5mm. Mostly horizontal bone loss.</td>
                                            <td>In addition to stage II complexity; probing depth ≥ 6mm, vertical bone
                                                loss
                                                ≥ 3mm, furcation
                                                involvement (class II or III), moderate ridge defects.
                                            </td>
                                            <td>In addition to Stage III complexity; Need for comprehensive
                                                rehabilitation
                                                due to secondary occlusal
                                                trauma (mobility ≥ 2), bite collapse, drifting, flaring, less than 10
                                                opposing pairs of teeth,
                                                masticatory dysfunction, severe ridge defects.
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Extent & Distribution</td>
                                            <td>Add to stage as descriptor</td>
                                            <td colspan="3">For each stage, describe extent as localised (< 30% of teeth
                                                involved) or generalised,
                                                or molar/incisor pattern.
                                            </td>

                                        </tr>
                                        </tbody>
                                    </table>

                                    <br> <br>

                                    <table>
                                        <thead>
                                        <tr>
                                            <th colspan="2"></th>


                                            <th>Grade A</th>
                                            <th>Grade B</th>
                                            <th>Grade C</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <th colspan="5">
                                                <center> Primary Criteria</center>
                                            </th>


                                        </tr>


                                        <tr>
                                            <th>Direct Evidence of Progression</th>
                                            <th>Longitudinal Data (radiographic bone loss or CAL)</th>
                                            <td>Evidence of no loss over 5 years.</td>
                                            <td>&lt;2mm over 5 years.</td>
                                            <td>&ge; 2mm over 5 years.</td>
                                        </tr>
                                        <tr>

                                            <th rowspan="2">Indirect Evidence of Progression</th>
                                            <th>Percent (%) of Progression (bone loss/age)</th>
                                            <td>&lt;0.25</td>
                                            <td>0.25 – 1.0</td>
                                            <td>&gt;1.0</td>
                                        </tr>
                                        <tr>
                                            <th>Case Phenotype</th>
                                            <td>Heavy biofilm deposits with low levels of destruction.</td>
                                            <td>Destruction commensurate with biofilm deposits.</td>
                                            <td>Destruction disproportionate to biofilm deposits; evidence of periods of
                                                rapid progression and/or
                                                early-onset disease (molar/incisor pattern); expected poor response to
                                                standard bacterial control.
                                            </td>
                                        </tr>

                                        <tr>
                                            <th colspan="5">
                                                <center>Grade Modifier</center>
                                            </th>


                                        </tr>

                                        <tr>

                                            <th rowspan="2">Risk Factors</th>
                                            <th>Smoking</th>
                                            <td>Non-smoker</td>
                                            <td>Smoker &lt; 10 cigarettes/day</td>
                                            <td>Smoker &ge;10 cigarettes/day</td>
                                        </tr>
                                        <tr>
                                            <th>Diabetes</th>
                                            <td>Normoglycemic / no diagnosis of Diabetes</td>
                                            <td>HbA1c &lt; 7.0% in a Diabetes Patient</td>
                                            <td>HbA1c &ge; 7.0 % in a Diabetes Patient</td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>

                                <button class="toggle-button5" id="button401">Teeth Eruption Times</button>
                                <br>
                                <div id="eteethSection1" class="section">

                                    <h3> Primary Teeth Eruption Times</h3>

                                    <table>
                                        <thead>
                                        <tr>
                                            <th>Upper Teeth</th>
                                            <th>Erupt</th>
                                            <th>Shed</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Central incisor</td>
                                            <td>8-12 months</td>
                                            <td>6-7 yrs.</td>
                                        </tr>
                                        <tr>
                                            <td>Lateral incisor</td>
                                            <td>9-13 months</td>
                                            <td>7-8 yrs.</td>
                                        </tr>
                                        <tr>
                                            <td>Canine</td>
                                            <td>16-22 months</td>
                                            <td>10-12 yrs.</td>
                                        </tr>
                                        <tr>
                                            <td>First molar</td>
                                            <td>13-19 months</td>
                                            <td>9-11 yrs.</td>
                                        </tr>
                                        <tr>
                                            <td>Second molar</td>
                                            <td>25-33 months</td>
                                            <td>10-12 yrs.</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"></td>

                                        </tr>
                                        <tr>
                                            <th>Lower Teeth</th>
                                            <th>Erupt</th>
                                            <th>Shed</th>
                                        </tr>
                                        <tr>
                                            <td>Second molar</td>
                                            <td>23-31 months</td>
                                            <td>10-12 yrs.</td>
                                        </tr>
                                        <tr>
                                            <td>First molar</td>
                                            <td>14-18 months</td>
                                            <td>9-11 yrs.</td>
                                        </tr>
                                        <tr>
                                            <td>Canine</td>
                                            <td>17-23 months</td>
                                            <td>9-12 yrs.</td>
                                        </tr>
                                        <tr>
                                            <td>Lateral incisor</td>
                                            <td>10-16 months</td>
                                            <td>7-8 yrs.</td>
                                        </tr>
                                        <tr>
                                            <td>Central incisor</td>
                                            <td>6-10 months</td>
                                            <td>6-7 yrs.</td>
                                        </tr>
                                        </tbody>
                                    </table>


                                    <h3> Permament Teeth Eruption Times</h3>
                                    <table>
                                        <thead>
                                        <tr>
                                            <th>Upper Teeth</th>
                                            <th>Erupt</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Central incisor</td>
                                            <td>7-8 yrs.</td>
                                        </tr>
                                        <tr>
                                            <td>Lateral incisor</td>
                                            <td>8-9 yrs.</td>
                                        </tr>
                                        <tr>
                                            <td>Canine</td>
                                            <td>11-12 yrs.</td>
                                        </tr>
                                        <tr>
                                            <td>First premolar</td>
                                            <td>10-11 yrs.</td>
                                        </tr>
                                        <tr>
                                            <td>Second premolar</td>
                                            <td>10-11 yrs.</td>
                                        </tr>
                                        <tr>
                                            <td>First molar</td>
                                            <td>6-7 yrs.</td>
                                        </tr>
                                        <tr>
                                            <td>Second molar</td>
                                            <td>12-13 yrs.</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"></td>

                                        </tr>
                                        <tr>
                                            <th>Lower Teeth</th>
                                            <th>Erupt</th>
                                        </tr>
                                        <tr>
                                            <td>Third molar (wisdom teeth)</td>
                                            <td>17-21 yrs.</td>
                                        </tr>
                                        <tr>
                                            <td>Second molar</td>
                                            <td>11-13 yrs.</td>
                                        </tr>
                                        <tr>
                                            <td>First molar</td>
                                            <td>6-7 yrs.</td>
                                        </tr>
                                        <tr>
                                            <td>Second premolar</td>
                                            <td>11-12 yrs.</td>
                                        </tr>
                                        <tr>
                                            <td>First premolar</td>
                                            <td>10-12 yrs.</td>
                                        </tr>
                                        <tr>
                                            <td>Canine</td>
                                            <td>9-10 yrs.</td>
                                        </tr>
                                        <tr>
                                            <td>Lateral incisor</td>
                                            <td>7-8 yrs.</td>
                                        </tr>
                                        <tr>
                                            <td>Central incisor</td>
                                            <td>6-7 yrs.</td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    Reference: <a
                                        href="https://www.teeth.org.au/ADA/media/Teeth_org_au/ADA/media/Teeth_org_au/documents/ADA2022-Factsheet-Tooth-eruption.pdf">ADA
                                        Factsheet: Tooth eruption charts</a>
                                </div>

                                <button class="toggle-button5" id="button402">Equipment List</button>
                                <br>
                                <div id="elistSection1" class="section">

                                    <h2>List of Instruments & Materials Required for Endodontic Appointments</h2><br>

                                    <strong>ASSESSMENT</strong><br>
                                    o Three pieces diagnostic instrument kit (mirror, probe, tweezer) <br>
                                    o Modified paralleling holder + Cotton rolls (x3 bundle) + Size 2 film <br>
                                    o Cold spray + cotton pallets <br>
                                    o EPT machine + EPT tip toothpaste <br>
                                    o Rubber dam single tooth isolation (for hot test) + Clamp <br><br>

                                    <strong>EDODONTIC APPOINTMENTS (choose as required)
                                        General</strong><br>
                                    o Topical anesthesia <br>
                                    o LA + needle + syringe + artery forceps <br>
                                    o Rubber dam + Punch + Frame & rubber dam forceps+ Clamp + Floss<br>
                                    o Histoacryl<br>
                                    o Endo kit<br>
                                    o High speed + Slow speed + Ultrasonic handpieces<br>
                                    o Resto burs (if needed) + Ultrasonic tip<br>
                                    o Modified paralleling holder (TruView or Snap-a-Ray)+ cotton rolls (x3 bundle)
                                    +size 2
                                    film<br>
                                    o Hand files (as needed) <br>
                                    o Rotary files (as needed)<br>
                                    o Odontostand (to hold files)<br>
                                    o Paper points<br>
                                    o Sodium hypochlorite w/ side venting needle<br>
                                    o Eucalyptus 0.5ml (?only if needed) w/ side venting needle<br>
                                    o Microbrush<br><br>

                                    <strong>Chemo-mech appointment</strong><br>
                                    o Apex locator + Lip hook + file attachment<br>
                                    o Lentino spiral<br>
                                    o Calcium hydroxide paste OR Odontopaste<br>
                                    o Cavit<br>
                                    o GIC (pink) + FUJI gun<br><br>

                                    <strong>Obturation appointment</strong>
                                    o EDTA (for obturation) w/ side venting needle<br>
                                    o GP points + accessory points<br>
                                    o AH plus sealer<br>
                                    o Alcohol + cotton pellet (non-sterile ones)<br>
                                    o SuperEndo + Tip<br>
                                    o Restoration material & associated necessities (if doing permanent restoration)<br>
                                    o Etch<br>
                                    o Prime + Bond OR Dentine conditioner<br>

                                     

                                </div>
                                <button class="toggle-button5" id="button403">Year 4 ADA Code List</button>
                                <br>
                                <div id="adayr41Section1" class="section">

                                    <h3>Exam/Diagnostic/Radiographic 😁</h3>
                                    <table>
                                        <tr>
                                            <th>Code</th>
                                            <th>Description</th>
                                        </tr>
                                        <tr>
                                            <td>011</td>
                                            <td>Comprehensive Oral Examination</td>
                                        </tr>
                                        <tr>
                                            <td>012</td>
                                            <td>Periodic Oral Examination</td>
                                        </tr>
                                        <tr>
                                            <td>013</td>
                                            <td>Oral Examination (Limited or emergency)</td>
                                        </tr>
                                        <tr>
                                            <td>014</td>
                                            <td>Consultation (< 30mins)</td>
                                        </tr>
                                        <tr>
                                            <td>015</td>
                                            <td>Consultation-extended (≥ 30 mins)</td>
                                        </tr>
                                        <tr>
                                            <td>018</td>
                                            <td>Written report</td>
                                        </tr>
                                        <tr>
                                            <td>019</td>
                                            <td>Letter of referral</td>
                                        </tr>
                                        <tr>
                                            <td>022A</td>
                                            <td>Intraoral periapical or bitewing radiograph - (per exposure) 022B-
                                                subsequent exp
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>025</td>
                                            <td>Intraoral radiograph - Occlusal, maxillary, mandibular - per exposure
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>037</td>
                                            <td>Panoramic radiograph - (OPG) per exposure</td>
                                        </tr>
                                        <tr>
                                            <td>047</td>
                                            <td>Saliva screening test</td>
                                        </tr>
                                        <tr>
                                            <td>048</td>
                                            <td>Bacteriological screening test</td>
                                        </tr>
                                        <tr>
                                            <td>059</td>
                                            <td>Comprehensive head and neck cancer examination</td>
                                        </tr>
                                        <tr>
                                            <td>061</td>
                                            <td>Pulp testing</td>
                                        </tr>
                                        <tr>
                                            <td>071</td>
                                            <td>Diagnostic model</td>
                                        </tr>
                                        <tr>
                                            <td>072</td>
                                            <td>Photographic records-intraoral</td>
                                        </tr>
                                        <tr>
                                            <td>073</td>
                                            <td>Photographic records-extraoral</td>
                                        </tr>
                                        <tr>
                                            <td>221</td>
                                            <td>Clinical Periodontal analysis and recording (must be in conjunction with
                                                251)
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>300</td>
                                            <td>Routine post-operative visit</td>
                                        </tr>
                                    </table>

                                    <h3>Preventive & Periodontics 😁</h3>
                                    <table>
                                        <tr>
                                            <th>Code</th>
                                            <th>Description</th>
                                        </tr>
                                        <tr>
                                            <td>014</td>
                                            <td>Consultation (< 30mins)</td>
                                        </tr>
                                        <tr>
                                            <td>015</td>
                                            <td>Consultation-extended (≥ 30mins)</td>
                                        </tr>
                                        <tr>
                                            <td>111</td>
                                            <td>Removal of plaque &/or stain</td>
                                        </tr>
                                        <tr>
                                            <td>113</td>
                                            <td>Recontouring/polishing of pre-existing restoration (s) - per appt</td>
                                        </tr>
                                        <tr>
                                            <td>114</td>
                                            <td>Removal of calculus - first appt (already includes 111)</td>
                                        </tr>
                                        <tr>
                                            <td>115</td>
                                            <td>Removal of calculus - subsequent appt (already includes 111)</td>
                                        </tr>
                                        <tr>
                                            <td>116</td>
                                            <td>Enamel micro-abrasion-per tooth</td>
                                        </tr>
                                        <tr>
                                            <td>121</td>
                                            <td>Topical application of remineralisation agents - one treatment</td>
                                        </tr>
                                        <tr>
                                            <td>123</td>
                                            <td>Concentrated remin &/or cariostatic agents - single tooth application
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>131</td>
                                            <td>Dietary analysis & advice</td>
                                        </tr>
                                        <tr>
                                            <td>141</td>
                                            <td>Oral hygiene instruction</td>
                                        </tr>
                                        <tr>
                                            <td>142</td>
                                            <td>Tobacco counselling (include 019 if referred to Quitline or other
                                                pathway
                                                services)
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>151</td>
                                            <td>Provision of mouthguard-indirect</td>
                                        </tr>
                                        <tr>
                                            <td>153</td>
                                            <td>Bi-maxillary mouthguard-indirect</td>
                                        </tr>
                                        <tr>
                                            <td>161</td>
                                            <td>Fissure and/or tooth surface sealing-per tooth</td>
                                        </tr>
                                        <tr>
                                            <td>165</td>
                                            <td>Desensitizing procedure - per appt</td>
                                        </tr>
                                        <tr>
                                            <td>171</td>
                                            <td>Odontoplasty -per tooth</td>
                                        </tr>
                                        <tr>
                                            <td>222</td>
                                            <td>Periodontal debridement-per tooth</td>
                                        </tr>
                                        <tr>
                                            <td>250</td>
                                            <td>Active non-surgical Periodontal therapy-per quadrant</td>
                                        </tr>
                                        <tr>
                                            <td>251</td>
                                            <td>Supportive Periodontal Therapy (must be in conjunction with 221)</td>
                                        </tr>
                                        <tr>
                                            <td>753</td>
                                            <td>Cleaning and polishing of pre-existing denture</td>
                                        </tr>
                                    </table>
                                    <h3>Restorative 😁</h3>
                                    <table>
                                        <tr>
                                            <th>Code</th>
                                            <th>Description</th>
                                        </tr>
                                        <tr>
                                            <td>014</td>
                                            <td>Consultation (< 30mins)</td>
                                        </tr>
                                        <tr>
                                            <td>015</td>
                                            <td>Consultation-extended (≥ 30mins)</td>
                                        </tr>
                                        <tr>
                                            <td>411</td>
                                            <td>Direct pulp capping</td>
                                        </tr>
                                        <tr>
                                            <td>412</td>
                                            <td>Incomplete endodontic therapy (tooth not suitable for further treatment)
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>511-515</td>
                                            <td>Metallic restoration- 1-5 surfaces - direct</td>
                                        </tr>
                                        <tr>
                                            <td>521-525</td>
                                            <td>Adhesive restoration- 1-5 surfaces-anterior tooth-direct</td>
                                        </tr>
                                        <tr>
                                            <td>526</td>
                                            <td>Adhesive restoration-veneer-anterior tooth-direct</td>
                                        </tr>
                                        <tr>
                                            <td>531-535</td>
                                            <td>Adhesive restoration- 1-5 surfaces-posterior tooth-direct</td>
                                        </tr>
                                        <tr>
                                            <td>536</td>
                                            <td>Adhesive restoration-veneer-posterior tooth-direct</td>
                                        </tr>
                                        <tr>
                                            <td>541-545</td>
                                            <td>Metallic restoration- 1-5 surfaces-indirect</td>
                                        </tr>
                                        <tr>
                                            <td>551-555</td>
                                            <td>Tooth-coloured restoration-1-5 surfaces-indirect</td>
                                        </tr>
                                        <tr>
                                            <td>556</td>
                                            <td>Tooth-coloured-veneer-indirect</td>
                                        </tr>
                                        <tr>
                                            <td>574</td>
                                            <td>Metal band</td>
                                        </tr>
                                        <tr>
                                            <td>572</td>
                                            <td>Provisional (intermediate/temporary) restoration - per tooth</td>
                                        </tr>
                                        <tr>
                                            <td>575</td>
                                            <td>Pin retention- per pin</td>
                                        </tr>
                                        <tr>
                                            <td>577</td>
                                            <td>Cusp capping-per cusp</td>
                                        </tr>
                                        <tr>
                                            <td>578</td>
                                            <td>Restoration of an incisal corner-per corner (in addition to 522-525;
                                                always
                                                with IM & ID fractures)
                                            </td>
                                        </tr>
                                    </table>

                                    <h3>Oral Surgery 😀</h3>
                                    <table>
                                        <tr>
                                            <th>Code</th>
                                            <th>Description</th>
                                        </tr>
                                        <tr>
                                            <td>013</td>
                                            <td>Oral examination (Limited or Emergency)</td>
                                        </tr>
                                        <tr>
                                            <td>014</td>
                                            <td>Consultation (< 30mins)</td>
                                        </tr>
                                        <tr>
                                            <td>015</td>
                                            <td>Consultation - extended (≥ 30mins)</td>
                                        </tr>
                                        <tr>
                                            <td>300</td>
                                            <td>Routine post-operative visit</td>
                                        </tr>
                                        <tr>
                                            <td>311A</td>
                                            <td>Removal of a tooth or part(s)-first tooth extracted from each quadrant
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>311B</td>
                                            <td>Removal of a tooth or part(s)-each subsequent tooth in the same quadrant
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>314A</td>
                                            <td>Sectional removal of a tooth or part(s) - 1st sectional removal from
                                                each
                                                quadrant
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>314B</td>
                                            <td>Sectional removal of a tooth or part(s)- each subsequent tooth in the
                                                same
                                                quadrant
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>322A</td>
                                            <td>Surgical removal of a tooth/fragment not requiring removal of bone in a
                                                quadrant
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>322B</td>
                                            <td>Surgical removal of a subsequent tooth/fragment not requiring bone
                                                removal
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>323A</td>
                                            <td>Surgical removal of a tooth/fragment requiring removal of bone-1st tooth
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>323B</td>
                                            <td>Surgical removal of a subsequent tooth/fragment requiring bone removal
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>324A</td>
                                            <td>Surgical removal of a tooth/fragment requiring bone removal and tooth
                                                division
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>324B</td>
                                            <td>Surgical removal of a subsequent tooth/fragment requiring bone removal &
                                                tooth division
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>392</td>
                                            <td>Drainage of abscess</td>
                                        </tr>
                                        <tr>
                                            <td>399</td>
                                            <td>Control of reactionary or secondary post-operative haemorrhage</td>
                                        </tr>
                                    </table>
                                    <h3>Prosthodontics (Simple/Advanced and Complex) 😀</h3>
                                    <table>
                                        <tr>
                                            <th>Code</th>
                                            <th>Description</th>
                                        </tr>
                                        <tr>
                                            <td>014</td>
                                            <td>Consultation (< 30mins)</td>
                                        </tr>
                                        <tr>
                                            <td>015</td>
                                            <td>Consultation-extended (≥ 30mins)</td>
                                        </tr>
                                        <tr>
                                            <td>071</td>
                                            <td>Diagnostic model</td>
                                        </tr>
                                        <tr>
                                            <td>074</td>
                                            <td>Diagnostic wax-up</td>
                                        </tr>
                                        <tr>
                                            <td>597A</td>
                                            <td>Post-direct-1st post in a tooth</td>
                                        </tr>
                                        <tr>
                                            <td>588</td>
                                            <td>Crown-tooth-coloured- preformed</td>
                                        </tr>
                                        <tr>
                                            <td>600</td>
                                            <td>Interim crown and bridge</td>
                                        </tr>
                                        <tr>
                                            <td>611</td>
                                            <td>Full crown-acrylic resin-indirect</td>
                                        </tr>
                                        <tr>
                                            <td>613</td>
                                            <td>Full crown-non-metallic-indirect</td>
                                        </tr>
                                        <tr>
                                            <td>615</td>
                                            <td>Full crown-veneered-indirect</td>
                                        </tr>
                                        <tr>
                                            <td>618</td>
                                            <td>Full crown-metallic-indirect</td>
                                        </tr>
                                        <tr>
                                            <td>625</td>
                                            <td>Post and core for crown-indirect</td>
                                        </tr>
                                        <tr>
                                            <td>627</td>
                                            <td>Preliminary restoration for crown</td>
                                        </tr>
                                        <tr>
                                            <td>631</td>
                                            <td>Provisional crown (intermediate/temp)</td>
                                        </tr>
                                        <tr>
                                            <td>632</td>
                                            <td>Provisional bridge pontic- per pontic</td>
                                        </tr>
                                        <tr>
                                            <td>642</td>
                                            <td>Bridge pontic-direct-per pontic</td>
                                        </tr>
                                        <tr>
                                            <td>643</td>
                                            <td>Bridge pontic-indirect-per pontic</td>
                                        </tr>
                                        <tr>
                                            <td>651</td>
                                            <td>Recementing crown or veneer</td>
                                        </tr>
                                        <tr>
                                            <td>655</td>
                                            <td>Removal of crown</td>
                                        </tr>
                                        <tr>
                                            <td>656</td>
                                            <td>Removal of bridge or splint</td>
                                        </tr>
                                        <tr>
                                            <td>659</td>
                                            <td>Repair of crown, bridge or splint-direct</td>
                                        </tr>
                                        <tr>
                                            <td>700</td>
                                            <td>F/-, -/F, P/-, -/P, F/F, P/P, P/F, F/P NB: Strictly only Interim Denture
                                                Stages/Service
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>711</td>
                                            <td>Complete maxillary Denture Insert F/- (F/P)</td>
                                        </tr>
                                        <tr>
                                            <td>712</td>
                                            <td>Complete mandibular Denture Insert -/F (P/F)</td>
                                        </tr>
                                        <tr>
                                            <td>713</td>
                                            <td>Provisional complete Maxillary Denture</td>
                                        </tr>
                                        <tr>
                                            <td>714</td>
                                            <td>Provisional complete Mandibular Denture</td>
                                        </tr>
                                        <tr>
                                            <td>715</td>
                                            <td>Provisional complete Max & Mand Dentures</td>
                                        </tr>
                                        <tr>
                                            <td>716</td>
                                            <td>Metal palate or plate</td>
                                        </tr>
                                        <tr>
                                            <td>719</td>
                                            <td>Complete Maxillary & Mandibular Dentures</td>
                                        </tr>
                                        <tr>
                                            <td>721A-D</td>
                                            <td>Partial Max Denture-resin base- 1 to 4 teeth</td>
                                        </tr>
                                        <tr>
                                            <td>721E</td>
                                            <td>Partial Max Denture-resin base- 5 to 9 teeth</td>
                                        </tr>
                                        <tr>
                                            <td>721F</td>
                                            <td>Partial Max Denture-resin base- 10 to 12 teeth</td>
                                        </tr>
                                        <tr>
                                            <td>722A-F</td>
                                            <td>Partial Mand Denture-resin base- 1 to 12 teeth (as above)</td>
                                        </tr>
                                        <tr>
                                            <td>727A-F</td>
                                            <td>Partial Max Denture-cast metal framework- 1 to 12 teeth (as above)</td>
                                        </tr>
                                        <tr>
                                            <td>728A-F</td>
                                            <td>Partial Mand Denture-cast metal framework- 1-to 12 teeth (as above)</td>
                                        </tr>
                                        <tr>
                                            <td>731</td>
                                            <td>Retainer-per tooth</td>
                                        </tr>
                                        <tr>
                                            <td>732</td>
                                            <td>Occlusal rest-per rest</td>
                                        </tr>
                                        <tr>
                                            <td>736</td>
                                            <td>Immediate tooth replacement-per tooth</td>
                                        </tr>
                                        <tr>
                                            <td>737</td>
                                            <td>Resilient lining</td>
                                        </tr>
                                        <tr>
                                            <td>740</td>
                                            <td>Adjustment to new denture</td>
                                        </tr>
                                        <tr>
                                            <td>741</td>
                                            <td>Adjustment of a denture</td>
                                        </tr>
                                    </table>
                                    <h3>Prosthodontics – Continued</h3>
                                    <table>
                                        <tr>
                                            <th>Code</th>
                                            <th>Description</th>
                                        </tr>
                                        <tr>
                                            <td>743</td>
                                            <td>Relining-complete denture-processed</td>
                                        </tr>
                                        <tr>
                                            <td>744</td>
                                            <td>Relining-partial denture-processed</td>
                                        </tr>
                                        <tr>
                                            <td>751</td>
                                            <td>Relining-complete denture-direct</td>
                                        </tr>
                                        <tr>
                                            <td>752</td>
                                            <td>Relining partial denture-direct</td>
                                        </tr>
                                        <tr>
                                            <td>753</td>
                                            <td>Cleaning and polishing of pre-existing denture</td>
                                        </tr>
                                        <tr>
                                            <td>765</td>
                                            <td>Replacing/adding new tooth on denture-per tooth</td>
                                        </tr>
                                        <tr>
                                            <td>766</td>
                                            <td>Reattaching existing tooth on denture-per tooth</td>
                                        </tr>
                                        <tr>
                                            <td>768</td>
                                            <td>Adding tooth to partial denture to replace extracted or decoronated
                                                tooth-per tooth
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>772</td>
                                            <td>Splint resin-indirect</td>
                                        </tr>
                                        <tr>
                                            <td>776</td>
                                            <td>Impression-dental appliance repair/modification</td>
                                        </tr>
                                        <tr>
                                            <td>926</td>
                                            <td>Individually made tray-medicament(s)</td>
                                        </tr>
                                        <tr>
                                            <td>965</td>
                                            <td>Occlusal splint</td>
                                        </tr>
                                    </table>

                                    <h3>Endodontics 😀</h3>
                                    <table>
                                        <tr>
                                            <th>Code</th>
                                            <th>Description</th>
                                        </tr>
                                        <tr>
                                            <td>014</td>
                                            <td>Consultation (< 30mins)</td>
                                        </tr>
                                        <tr>
                                            <td>015</td>
                                            <td>Consultation- extended (≥ 30mins)</td>
                                        </tr>
                                        <tr>
                                            <td>022A</td>
                                            <td>Intraoral periapical or bitewing radiograph - per exposure</td>
                                        </tr>
                                        <tr>
                                            <td>022B</td>
                                            <td>Intraoral periapical or bitewing radiograph - per exposure</td>
                                        </tr>
                                        <tr>
                                            <td>061</td>
                                            <td>Pulp testing – per appointment</td>
                                        </tr>
                                        <tr>
                                            <td>117</td>
                                            <td>Bleaching - internal - per tooth</td>
                                        </tr>
                                        <tr>
                                            <td>392</td>
                                            <td>Drainage of abscess</td>
                                        </tr>
                                        <tr>
                                            <td>411</td>
                                            <td>Direct pulp capping</td>
                                        </tr>
                                        <tr>
                                            <td>412</td>
                                            <td>Incomplete endodontic therapy (tooth not suitable for further treatment)
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>414</td>
                                            <td>Pulpotomy</td>
                                        </tr>
                                        <tr>
                                            <td>415</td>
                                            <td>Complete chemo-mechanical preparation of root canal - one canal</td>
                                        </tr>
                                        <tr>
                                            <td>416</td>
                                            <td>Complete chemo-mechanical preparation of root canal - each additional
                                                canal
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>417</td>
                                            <td>Root canal obturation - one canal</td>
                                        </tr>
                                        <tr>
                                            <td>418</td>
                                            <td>Root canal obturation - each additional canal</td>
                                        </tr>
                                        <tr>
                                            <td>419</td>
                                            <td>Extirpation of pulp or debridement of root canal(s) - emergency or
                                                palliative
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>421</td>
                                            <td>Resorbable canal filling - primary tooth</td>
                                        </tr>
                                        <tr>
                                            <td>445</td>
                                            <td>Exploration and/or negotiation of a calcified canal - per canal - per
                                                appt
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>455</td>
                                            <td>Additional visit for irrigation and /or dressing of root canal system -
                                                per
                                                tooth
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>458</td>
                                            <td>Interim therapeutic root filling - per tooth</td>
                                        </tr>
                                        <tr>
                                            <td>572</td>
                                            <td>Provisional (intermediate/temporary) restoration - per tooth</td>
                                        </tr>
                                    </table>


                                </div>
                                <button class="toggle-button5" id="button4034">Denture Guides</button>
                                <div id="dentureguidessection" class="section" style="display: none;">

                                    <h1>Complete Denture Appointments</h1>
                                    <h2>1st Appointment: Consult/Exam; Primary impressions</h2>
                                    <h3>Medical History</h3>
                                    <ul>
                                        <li>Full list of medications and their purpose, especially medications affecting
                                            salivary flow
                                        </li>
                                        <li>Smoking history: frequency, number of years. Consider quitting?</li>
                                        <li>Sjogren’s disease</li>
                                        <li>MVA – affected TMJ, fractures</li>
                                        <li>Cancer – radiation, resections (especially oral cancer)</li>
                                        <li>Stroke / dementia – affects neuromuscular control</li>
                                    </ul>
                                    <h3>Interview</h3>
                                    <ul>
                                        <li>Reason for attendance (i.e. wants dentures)</li>
                                        <li>Reason for tooth loss: perio/caries</li>
                                        <li>How many years edentulous</li>
                                        <li>How many pairs of dentures</li>
                                        <li>Do they like their current set? Why? How old is it?</li>
                                    </ul>
                                    <h3>Extra-oral</h3>
                                    <ul>
                                        <li>Facial symmetry</li>
                                        <li>Loss of OVD: Thin, inverted lips, creasing at the commissures</li>
                                        <li>TMJ</li>
                                        <li>Saliva flow</li>
                                    </ul>
                                    <h3>Prosthodontics assessment</h3>
                                    <ul>
                                        <li>Clinical factors influencing stability, retention, support of complete
                                            dentures
                                        </li>
                                        <li>Quality of bearing mucosa</li>
                                        <li>Attached / unattached [attached]</li>
                                        <li>Keratinisation [keratinised]</li>
                                        <li>Bone contours (Denture support area)</li>
                                        <li>Height and contour of alveolar ridge</li>
                                        <li>Md Mylohyoid ridge [blunt]</li>
                                        <li>Md Retromolar pad [well defined]</li>
                                        <li>Tori?</li>
                                        <li>Resorption patterns</li>
                                        <li>Muscle attachments</li>
                                        <li>Frenum [low]</li>
                                        <li>Floor of mouth, Mylohyoid m.</li>
                                        <li>Retromylohyoid space [deep]</li>
                                        <li>Tongue posture</li>
                                        <li>Neuromuscular control</li>
                                    </ul>
                                    <h3>Denture assessment</h3>
                                    <ul>
                                        <li>Aesthetics</li>
                                        <li>Retention</li>
                                        <li>Stability</li>
                                        <li>Primary impression should have no major pressure spots or voids, should
                                            capture all peripheral extensions (sulcus, Mx: hamular notch, posterior
                                            palatal seal; Md: retromolar pad)
                                        </li>
                                    </ul>
                                    <p>Please construct diagnostic models from alginate impressions.</p>
                                    <p>Please construct custom trays:</p>
                                    <ol>
                                        <li>for ZOE impression – custom trays 2mm shy of depth of sulcus, no spacer;
                                        </li>
                                        <li>for PVS – custom trays with 2 sheets of baseplate wax as spacer.</li>
                                    </ol>
                                    <hr>
                                    <h2>2nd Appointment: Secondary impressions</h2>
                                    <p>Adjust fit of custom trays- trim with acrylic burs to 1mm short of sulcus, not
                                        interfering with frenum</p>
                                    <p>If tissues are compressible, make holes (“swiss cheese) with acrylic bur so that
                                        impression is mucostatic</p>
                                    <p>Add green stick compound to periphery of trays</p>
                                    <p>(Mark with indelible marker the post dam and the compressibility of glandular
                                        tissues.)</p>
                                    <p>Set up – slow speed evacuation, dry teeth, retract lips. Clear bracket table of
                                        all instruments except mirror</p>
                                    <p>Patient laid back</p>
                                    <p>Mix ZOE, apply thin layer to tray.</p>
                                    <p>Seat tray. Border mould. Sit patient up, check for overflowing ZOE</p>
                                    <p>Wait 4-5 minutes, remove impression by retracting lip to dislodge seal</p>
                                    <p>Check for show through. Trim with acrylic bur. Add ZOE to deficient areas and
                                        retake impression.</p>
                                    <p>Add post dam with inlay wax: 1mm thick at posterior border, and tapering to knife
                                        edge at other borders</p>
                                    <p>Please construct master cast in stone with 3mm land area, scribe post-dam as
                                        indicated on Mx impression, depth of post dam ~mm. Please provide occlusal wax
                                        rims to standard dimensions</p>
                                    <hr>

                                    <h2>3rd Appointment: Jaw Registration</h2>
                                    <ul>
                                        <li>Use denture adhesive to aid in stability of bases for record</li>
                                        <li>Adjust Mx wax rim for lip support</li>
                                        <li>Adjust Mx wax rim for tooth display</li>
                                        <li>Mark facial midline on Mx wax rim</li>
                                        <li>Mark canines lines</li>
                                        <li>Mark smile line</li>
                                        <li>Adjust Mx wax rim for occlusal plane</li>
                                        <li>Parallel to ala-tragus plane – use Fox plane</li>
                                        <li>Parallel to interpupillary width</li>
                                        <li>OVD = RVD – Freeway space</li>
                                        <ul>
                                            <li>RVD:</li>
                                            <ul>
                                                <li>Swallow and allow lips to part</li>
                                                <li>Relax and allow lips to part</li>
                                                <li>Repeat ‘emma’ and allow lips to part</li>
                                            </ul>
                                        </ul>
                                        <li>CR: Interocclusal records – physiologic technique:</li>
                                        <ul>
                                            <li>Mark notches on Md wax rim</li>
                                            <li>Practice going into CR</li>
                                            <li>Bi-manual manipulation</li>
                                        </ul>
                                        <li>Materials: Wax (baseplate wax, Alu-wax, Beauty wax); Impression compound;
                                            Elastomeric materials (PVS)
                                        </li>
                                        <li>Tooth shade and mould</li>
                                        <li>Please articulate master casts with bite record in PVS/Wax/Acrylic
                                            provided
                                        </li>
                                        <li>Set up Mx and Md teeth for try-in in shade ~, mould ~</li>
                                    </ul>
                                    <hr>
                                    <h2>4th Appointment: Wax Tooth Try-In</h2>
                                    <ul>
                                        <li>Dental midline matches facial midline</li>
                                        <li>Occlusal plane anteriorly and posteriorly</li>
                                        <li>Buccal corridor</li>
                                        <li>Distal extension</li>
                                        <li>Aesthetics – tooth mould, shape, position</li>
                                        <li>Phonetics</li>
                                        <li>VDO</li>
                                        <li>CR verified</li>
                                        <li>Recline pt chair back to help retrude mandible</li>
                                        <li>Stabilise Md base with index fingers; thumbs under mandible = bimanual
                                            technique
                                        </li>
                                        <li>Rehearse closing into CR</li>
                                        <li>Have patient gently close into the compound just short of tooth contact</li>
                                        <li>Wax correctly contoured</li>
                                        <li>Patient signature</li>
                                        <li>Please seal wax rims and finesse waxup in anterior region. Please process
                                            the Mx and Md dentures in acrylic 60% original and 40% light pink. Finish
                                            for insertion
                                        </li>
                                    </ul>
                                    <hr>
                                    <h2>5th Appointment: Insert</h2>
                                    <ul>
                                        <li>Frenum cleared</li>
                                        <li>No overextension</li>
                                        <li>Distal extrusion of Mx denture, effective post dam</li>
                                        <li>No high pressure spots on denture bearing surfaces</li>
                                        <li>Occlusion and CR</li>
                                    </ul>
                                    <hr>
                                    <h2>6th Appointment: Review</h2>
                                    <ul>
                                        <li>Post-operative issues:</li>
                                        <ul>
                                            <li>Ulcers in frenum region, sulcus and mylohyoid ridge due to lack of
                                                clearance
                                            </li>
                                            <li>Correction of occlusion</li>
                                            <li>Cheek biting due to lack of buccal overjet</li>
                                            <li>Restricted food or chewing</li>
                                            <li>Lack of retention – overextension, processing errors</li>
                                            <li>Too bulky in palatal or buccal surfaces</li>
                                        </ul>
                                    </ul>

                                    <hr>


                                    <h1>Partial Denture Appointments</h1>
                                    <h2>1st Appointment: Consult/Exam; Primary impressions</h2>
                                    <h3>Medical History</h3>
                                    <ul>
                                        <li>Full list of medications and their purpose, especially medications affecting
                                            salivary flow
                                        </li>
                                        <li>Smoking history: frequency, number of years. Consider quitting?</li>
                                        <li>Sjogren’s disease</li>
                                        <li>MVA – affected TMJ, fractures</li>
                                        <li>Cancer – radiation, resections (especially oral cancer)</li>
                                        <li>Stroke / dementia –neuromuscular control</li>
                                    </ul>
                                    <h3>Interview</h3>
                                    <ul>
                                        <li>Diet Hx</li>
                                        <li>Dental Hx:</li>
                                        <ul>
                                            <li>Reason for tooth loss: perio/caries/trauma</li>
                                            <li>History of existing and previous RPDs:</li>
                                            <ul>
                                                <li>Evaluate existing RPD</li>
                                            </ul>
                                        </ul>
                                    </ul>
                                    <h3>Saliva flow</h3>
                                    <p>Primary impression should have no major pressure spots or voids, should capture
                                        all peripheral extensions (sulcus, Mx: hamular notch, posterior palatal seal;
                                        Md: retromolar pad)</p>
                                    <p>Please construct diagnostic models from alginate impressions.</p>
                                    <p>Please construct custom trays: for PVS – custom trays with 2 sheets of baseplate
                                        wax as spacer</p>
                                    <hr>
                                    <h2>Survey; Treatment plan</h2>
                                    <p>Study casts</p>
                                    <ul>
                                        <li>Good preliminary casts</li>
                                        <li>No bubbles/drags</li>
                                        <li>Clear gingival margins</li>
                                        <li>Extending to hamular notch and retromolar pad region</li>
                                        <li>Floor of mouth captured, tongue space cleared</li>
                                    </ul>
                                    <p>Check occlusion</p>
                                    <p>Hand articulate cases</p>
                                    <p>Mark the occlusal overlap = incisal limit of the framework extension</p>
                                    <p>Check tilt and tripod</p>
                                    <p>Survey undercuts: tooth and soft tissue</p>
                                    <h3>Design</h3>
                                    <p>Pre-prosthetic treatment: exo, caries control, survey crowns, OH</p>
                                    <p>Periodontal management</p>
                                    <p>Surgical modifications as needed</p>
                                    <p>Restorations, endodontic</p>
                                    <p>Fixed prosthodontics</p>
                                    <p>Removable prosthodontics</p>
                                    <hr>
                                    <h2>2nd Appointment: Mouth Preps; Secondary Impressions</h2>
                                    <h3>Mouth Preps</h3>
                                    <ul>
                                        <li>Parallel guideplanes</li>
                                        <li>Prepare rest seats</li>
                                        <li>Create favorable undercuts for direct retainers</li>
                                        <li>Recontour tipped or overerupted teeth which interfere with the occlusal
                                            plane
                                        </li>
                                    </ul>

                                    <h3>Secondary Impressions</h3>
                                    <ul>
                                        <li>Adjust fit of custom trays</li>
                                        <li>(Border moulding for distal end saddle)</li>
                                        <li>Apply Vector VP (vinyl polysiloxane) tray adhesive</li>
                                        <li>Check design and indicate to DA the borders of PVS required</li>
                                        <li>Set up – slow speed evacuation, dry teeth, retract lips. Clear bracket table
                                            of all instruments except mirror, light body PVS gun
                                        </li>
                                        <li>Patient laid back</li>
                                        <li>Ask DA to start loading medium body PVS and to indicate when they are
                                            loading halfway
                                        </li>
                                        <li>Light body PVS over rest preps, guide planes, plating areas around tooth
                                            margins especially distal. Also place a blob outside tray to check when
                                            light body PVS has set
                                        </li>
                                        <li>Seat tray. Sit patient up, check for overflowing PVS</li>
                                        <li>Wait 4-5 minutes, remove impression by retracting lip to dislodge seal</li>
                                        <li>Please construct master cast in high strength stone with 3mm land area.</li>
                                        <li>Construct CoCr partial framework, as per design indicated on the study
                                            model, mandibular cast enclosed for occlusal examination.
                                        </li>
                                        <li>Return framework for metal try-in. Provide wax bases</li>
                                    </ul>
                                    <hr>
                                    <h2>3rd Appointment: Metal Framework Try-In; Bite Registration (MIP/CR); Tooth
                                        Shade, Mould</h2>
                                    <ul>
                                        <li>Check rests sitting in the rest seat</li>
                                        <li>Check major connector sitting against the tissues completely</li>
                                        <li>Check for occlusal interferences with articulating paper</li>
                                        <li>MIP/CR</li>
                                        <li>Tooth shade and mould</li>
                                        <li>Please articulate maxillary and mandibular cases casts with bite record
                                            provided. Do not reduce vertical dimension following articulation
                                        </li>
                                        <li>Set up denture teeth shade ~, mould ~ for #</li>
                                        <li>Return for wax tooth try-in</li>
                                    </ul>
                                    <hr>
                                    <h2>4th Appointment: Wax tooth try-in </h2>
                                    <ul>
                                        <strong>
                                            <li>Aesthetics – tooth mould, shape, position</li>
                                            <li>Bite position verified</li>
                                        </strong>
                                        <li>Recline pt chair back to help retrude mandible</li>
                                        <li>Stabilize Md base with index fingers; thumbs under mandible = bimanual
                                            technique
                                        </li>
                                        <li>Rehearse closing into CR</li>
                                        <li>Have patient gently close into the compound just short of tooth contact</li>
                                        <li>Please do not move the teeth.</li>
                                        <li>Please finesse wax up in # region</li>
                                        <li>Please process in 60:40 original and light pink acrylic</li>
                                    </ul>
                                    <hr>
                                    <h2>5th Appointment: Insert, Home Care Instructions</h2>
                                    <ul>
                                        <li>Check denture base areas and peripheral borders</li>
                                        <li>Check for any acrylic in the guideplanes that may hinder seating</li>
                                        <li>Check occlusion with articulating paper</li>
                                        <li>Home care instructions</li>
                                    </ul>
                                    <hr>
                                    <h2>6th Appointment: Review</h2>
                                    <ul>
                                        <li>Pt. presented to 4th Year Pros Clinic 5.1 for</li>
                                        <ul>
                                            <li>COVID-19 Level 1 Restriction (Mouth rinse for 30sec & verbal consent
                                                given)
                                            </li>
                                            <li>3C’s confirmed (name, DOB, address)</li>
                                            <li>Medical Hx confirmed</li>
                                        </ul>
                                        <li>RFV:</li>
                                        <li>CC:</li>
                                        <li>Hx of present complaint:</li>
                                        <ul>
                                            <li>Site, onset, character, radiation, alleviating factor, exacerbating
                                                factors, severity
                                            </li>
                                        </ul>
                                        <li>Provisional Dx:</li>
                                        <li>Tx options discussed and presented to pt:</li>
                                        <li>Tx elected by pt:</li>
                                        <li>Extra comment:</li>
                                        <li>Supervisor name:</li>
                                        <li>N/V:</li>
                                    </ul>
                                </div>


                            </div>
                        </div>
                        <div id="output">





        <textarea id="generatedText" disabled class="TEST" placeholder="Select an area and check the checkbox beside it for text to generate.

Please use this as a guide only and always listen to your supervisors' instructions."></textarea>
                            <div class="actionButtonHolder">
                                <div class="copyfi mb-1">
                                    <button id="button" class="copybut" onclick="myFunction()">Copy Text</button>
                                    <button id="newnote" onclick="myNewNote()">New Note</button>
                                    <button id="finalize" class="finalize" onclick="myFinalize()">Finalize</button>
                                </div>
                                @auth
                                    <div class="saveholder">
                                        <select id="contentcatselect" disabled>
                                            @foreach($categoryDropdown as $key=>$value)
                                                <option value="{{$value}}">{{$key}}</option>
                                            @endforeach
                                        </select>
                                        <input type="text" id="saveName" placeholder="Enter save file name" disabled>
                                        <button id="saveContent" data-note_id="0" class="saveContent" disabled>Save
                                        </button>
                                    </div>
                                @endauth
                                <div id="myTooltip" hidden="">Copied!</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

    <script>
        var finalizebool = true;
        var contentToSave = "null";
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
            });
        }

        function getListOfIdsAndValues() {
            const datadiv = document.getElementById('checkboxes');
            const checkboxes = datadiv.querySelectorAll('input[type="checkbox"]');
            const radios = datadiv.querySelectorAll('input[type="radio"]:checked');
            const textInputs = datadiv.querySelectorAll('input[type="text"]');
            const selects = datadiv.querySelectorAll('select');
            const textAreas = datadiv.querySelectorAll('textarea');

            const selectedCheckboxIds = Array.from(checkboxes)
                .filter(checkbox => checkbox.checked)
                .map(checkbox => checkbox.id);

            const selectedRadioIds = Array.from(radios)
                .map(radio => radio.id);

            const nonEmptyTextInputValues = Array.from(textInputs)
                .filter(input => input.value.trim() !== '')
                .map(input => ({id: input.id, value: input.value}));

            const nonEmptySelectValues = Array.from(selects)
                .filter(input => input.value.trim() !== '')
                .map(input => ({id: input.id, value: input.value}));

            const nonEmptyTextAreaValues = Array.from(textAreas)
                .filter(input => input.value.trim() !== '')
                .map(input => ({id: input.id, value: input.value}));

            console.log('Selected Checkbox IDs:', selectedCheckboxIds);
            console.log('Selected Radio IDs:', selectedRadioIds);
            console.log('Non-empty Text Input IDs and Values:', nonEmptyTextInputValues);
            console.log('Non-empty Select IDs and Values:', nonEmptySelectValues);
            console.log('Non-empty Text Area IDs and Values:', nonEmptyTextAreaValues);
        }



        function myNewNote() {

            var saveBut = document.getElementById('saveContent');
            if (saveBut) {
                var saveName = document.getElementById('saveName');
                saveName.value = new Date().toLocaleDateString('en-US', {
                    weekday: 'long',
                    day: 'numeric',
                    month: 'short',
                    year: 'numeric'
                });
                var contentcatselect = document.getElementById('contentcatselect');
            }
            var outcon = document.getElementById('generatedText');
            var container = document.getElementById('checkboxes');
            var inputs = container.querySelectorAll('input, select, textarea');

            outcon.disabled = false;
            if (saveBut) {
                saveBut.disabled = false;
                saveName.disabled = false;
                contentcatselect.disabled = false;
            }
            inputs.forEach(function (input) {
                input.disabled = false;
            });


            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            var textboxes = document.querySelectorAll('input[type="text"]');
            var numberboxes = document.querySelectorAll('input[type="number"]');
            var selectboxes = document.querySelectorAll('select');
            var textareaboxes = document.querySelectorAll('textarea');
            checkboxes.forEach(function (checkbox) {
                if (checkbox.checked) {
                    checkbox.click();
                }
            });
            textboxes.forEach(function (textboxes) {
                textboxes.value = "";
            });
            numberboxes.forEach(function (numberboxes) {
                numberboxes.value = "";
            });
            textareaboxes.forEach(function (textareaboxes) {
                textareaboxes.value = "";
            });
            selectboxes.forEach(function (selectboxes) {
                selectboxes.selectedIndex = 0;
            });

            finalizebool = true;
            outcon.disabled = true;

            if (saveBut) {
                saveBut.disabled = true;
                saveName.disabled = true;
                contentcatselect.disabled = true;
            }
            inputs.forEach(function (input) {
                input.disabled = false;
            });

        }

        function myGenerate() {
            document.getElementById('contentcat').classList.remove("d-none");
            document.getElementById('contentcat').classList.add("d-none");
            document.getElementById('checkboxes').classList.remove("d-none");
        }

        function myHistory() {
            document.getElementById('checkboxes').classList.remove("d-none");
            document.getElementById('checkboxes').classList.add("d-none");
            document.getElementById('contentcat').classList.remove("d-none");
        }

        function myFinalize() {
            //getListOfIdsAndValues();
            // Get the container element by ID
            var saveBut = document.getElementById('saveContent');
            if (saveBut) {
                var saveName = document.getElementById('saveName');
                if(saveName.value.trim() == ""){
                    saveName.value = new Date().toLocaleDateString('en-US', {
                        weekday: 'long',
                        day: 'numeric',
                        month: 'short',
                        year: 'numeric'
                    });
                }
            }
            var contentcatselect = document.getElementById('contentcatselect');
            var outcon = document.getElementById('generatedText');
            var container = document.getElementById('checkboxes');
            var inputs = container.querySelectorAll('input, select, textarea');
            if (finalizebool) {

                outcon.disabled = false;
                finalizebool = false;

                // Disable each input element

                if (saveBut) {
                    saveBut.disabled = false;
                    saveName.disabled = false;
                    contentcatselect.disabled = false;
                }
                inputs.forEach(function (input) {
                    input.disabled = true;
                });
            } else {
                outcon.disabled = true;
                finalizebool = true;

                // Disable each input element

                if (saveBut) {
                    saveBut.disabled = true;
                    saveName.disabled = true;
                    contentcatselect.disabled = true;
                }
                inputs.forEach(function (input) {
                    input.disabled = false;
                });
            }
        }


        Spry.Utils.addLoadListener(function () {
            Spry.$$("#button1").addEventListener('click', function (e) {
                toggleSection('dxSection1')
            }, false);
            Spry.$$("#button2").addEventListener('click', function (e) {
                toggleSection('011Section1')
            }, false);
            Spry.$$("#button3").addEventListener('click', function (e) {
                toggleSection('paeds011Section1')
            }, false);
            Spry.$$("#button4").addEventListener('click', function (e) {
                toggleSection('013Section1')
            }, false);
            Spry.$$("#button5").addEventListener('click', function (e) {
                toggleSection('013eSection1')
            }, false);
            Spry.$$("#button6").addEventListener('click', function (e) {
                toggleSection('ppSection')
            }, false);
            Spry.$$("#button7").addEventListener('click', function (e) {
                toggleSection('scaleAndCleansSection')
            }, false);
            Spry.$$("#button8").addEventListener('click', function (e) {
                toggleSection('116Section1')
            }, false);
            Spry.$$("#button9").addEventListener('click', function (e) {
                toggleSection('perioSection1')
            }, false);
            Spry.$$("#button10").addEventListener('click', function (e) {
                toggleSection('221Section')
            }, false);
            Spry.$$("#button11").addEventListener('click', function (e) {
                toggleSection('250Section')
            }, false);
            Spry.$$("#button12").addEventListener('click', function (e) {
                toggleSection('surgSection1')
            }, false);
            Spry.$$("#button13").addEventListener('click', function (e) {
                toggleSection('oralsurgSection')
            }, false);
            Spry.$$("#button14").addEventListener('click', function (e) {
                toggleSection('endoSection1')
            }, false);
            Spry.$$("#button15").addEventListener('click', function (e) {
                toggleSection('endo1Section')
            }, false);
            Spry.$$("#button16").addEventListener('click', function (e) {
                toggleSection('endo2Section')
            }, false);
            Spry.$$("#button17").addEventListener('click', function (e) {
                toggleSection('endo3Section')
            }, false);
            Spry.$$("#button18").addEventListener('click', function (e) {
                toggleSection('endo4Section')
            }, false);
            Spry.$$("#button19").addEventListener('click', function (e) {
                toggleSection('restoSection1')
            }, false);
            Spry.$$("#button20").addEventListener('click', function (e) {
                toggleSection('restorationSection')
            }, false);
            Spry.$$("#button21").addEventListener('click', function (e) {
                toggleSection('prosSection1')
            }, false);
            Spry.$$("#button22").addEventListener('click', function (e) {
                toggleSection('dentureSection')
            }, false);
            Spry.$$("#button23").addEventListener('click', function (e) {
                toggleSection('denture1Section')
            }, false);
            Spry.$$("#button24").addEventListener('click', function (e) {
                toggleSection('denture2Section')
            }, false);
            Spry.$$("#button25").addEventListener('click', function (e) {
                toggleSection('denture3Section')
            }, false);
            Spry.$$("#button26").addEventListener('click', function (e) {
                toggleSection('denture6Section')
            }, false);
            Spry.$$("#button27").addEventListener('click', function (e) {
                toggleSection('denture5Section')
            }, false);
            Spry.$$("#button28").addEventListener('click', function (e) {
                toggleSection('denture50Section')
            }, false);
            Spry.$$("#button29").addEventListener('click', function (e) {
                toggleSection('denturepp1Section')
            }, false);
            Spry.$$("#button30").addEventListener('click', function (e) {
                toggleSection('denturepp2Section')
            }, false);
            Spry.$$("#button31").addEventListener('click', function (e) {
                toggleSection('denturepp3Section')
            }, false);
            Spry.$$("#button32").addEventListener('click', function (e) {
                toggleSection('denturepp4Section')
            }, false);
            Spry.$$("#button33").addEventListener('click', function (e) {
                toggleSection('denturepp5Section')
            }, false);
            Spry.$$("#button34").addEventListener('click', function (e) {
                toggleSection('denturepp6Section')
            }, false);
            Spry.$$("#button35").addEventListener('click', function (e) {
                toggleSection('othercodesSection')
            }, false);
            Spry.$$("#button36").addEventListener('click', function (e) {
                toggleSection('ppcodesSection')
            }, false);
            Spry.$$("#button37").addEventListener('click', function (e) {
                toggleSection('otherSection1')
            }, false);
            Spry.$$("#button38").addEventListener('click', function (e) {
                toggleSection('psrSection1')
            }, false);
            Spry.$$("#button39").addEventListener('click', function (e) {
                toggleSection('icdasSection1')
            }, false);
            Spry.$$("#button40").addEventListener('click', function (e) {
                toggleSection('laSection1')
            }, false);
            Spry.$$("#button41").addEventListener('click', function (e) {
                toggleSection('crown1Section')
            }, false);
            Spry.$$("#button42").addEventListener('click', function (e) {
                toggleSection('crown2Section')
            }, false);
            Spry.$$("#button43").addEventListener('click', function (e) {
                toggleSection('crown3Section')
            }, false);
            Spry.$$("#button44").addEventListener('click', function (e) {
                toggleSection('crown4Section')
            }, false);
            Spry.$$("#button166").addEventListener('click', function (e) {
                toggleSection('oralsurg2Section')
            }, false);

            Spry.$$("#button400").addEventListener('click', function (e) {
                toggleSection('perioclassSection1')
            }, false);
            Spry.$$("#button401").addEventListener('click', function (e) {
                toggleSection('eteethSection1')
            }, false);
            Spry.$$("#button402").addEventListener('click', function (e) {
                toggleSection('elistSection1')
            }, false);
            Spry.$$("#button403").addEventListener('click', function (e) {
                toggleSection('adayr41Section1')
            }, false);
            Spry.$$("#button4034").addEventListener('click', function (e) {
                toggleSection('dentureguidessection')
            }, false);

            function getElementsWithClass(TEST) {
                const elements = {};
                document.querySelectorAll(`.${TEST}`).forEach(element => {
                    elements[element.id] = element;
                });
                return elements;
            }

// Use the function to get all elements with the "auto-element" class
            const autoElements = getElementsWithClass('TEST');


            // Get references to HTML elements
            const generatedText = document.getElementById('generatedText');

            const ptCheckbox = document.getElementById('ptCheckbox');
            const yearDropdown = document.getElementById('yearDropdown');
            const clinicDropdown = document.getElementById('clinicDropdown');
            const codeDropdown = document.getElementById('codeDropdown');
            const typeDropdown = document.getElementById('typeDropdown');
            const colgateCheckbox = document.getElementById('colgateCheckbox');
            const c3sCheckbox = document.getElementById('c3sCheckbox');
            const medicalHxCheckbox = document.getElementById('medicalHxCheckbox');
            const hxDropdown = document.getElementById('hxDropdown');
            const htpsrCheckbox = document.getElementById('htpsrCheckbox');
            const opgCheckbox = document.getElementById('opgCheckbox');
            const restoCheckbox = document.getElementById('restoCheckbox');
            const bwCheckbox = document.getElementById('bwCheckbox');
            const xylocaineCheckbox = document.getElementById('xylocaineCheckbox');
            const latypeCheckbox = document.getElementById('latypeCheckbox');
            const anestheticDropdown = document.getElementById('anestheticDropdown');
            const infilDropdown = document.getElementById('infilDropdown');
            const isolationCheckbox = document.getElementById('isolationCheckbox');
            const isolationDropdown = document.getElementById('isolationDropdown');
            const cavityCheckbox = document.getElementById('cavityCheckbox');
            const etchedCheckbox = document.getElementById('etchedCheckbox');
            const gradiaDropdown = document.getElementById('gradiaDropdown');
            const consentsCheckbox = document.getElementById('consentsCheckbox');
            const debridementCheckbox = document.getElementById('debridementCheckbox');
            const refinementCheckbox = document.getElementById('refinementCheckbox');
            const prophyCheckbox = document.getElementById('prophyCheckbox');
            const ohiCheckbox = document.getElementById('ohiCheckbox');
            const supervisorCheckbox = document.getElementById('supervisorCheckbox');
            const nvCheckbox = document.getElementById('nvCheckbox');


            const c3sTextInput = document.getElementById('c3sTextInput'); // Add this line
            const supervisorNameTextInput = document.getElementById('supervisornameTextInput');
            const A1TextInput = document.getElementById('A1TextInput');
            const selectAllRestoCheckbox = document.getElementById('selectAllRestoCheckbox');
            const B1 = document.getElementById('B1Checkbox');
            const selectSpecificRestoCheckbox = document.getElementById('selectSpecificSCCheckbox');


            B11Checkbox.addEventListener('change', toggleSubCheckboxes); // here
            B12Checkbox.addEventListener('change', toggleSubCheckboxes);
            B100Checkbox.addEventListener('change', toggleSubCheckboxes);
            selectSpecificRestoCheckbox.addEventListener('change', toggleSubCheckboxes);
            B105Checkbox.addEventListener('change', toggleSubCheckboxes);
            B25Checkbox.addEventListener('change', toggleSubCheckboxes);
            selectAllRestoCheckbox.addEventListener('change', toggleSubCheckboxes);
            selectAllResto2Checkbox.addEventListener('change', toggleSubCheckboxes);
            G156Checkbox.addEventListener('change', toggleSubCheckboxes);
            //F/F
            ff1allCheckbox.addEventListener('change', toggleSubCheckboxes);
            ff2allCheckbox.addEventListener('change', toggleSubCheckboxes);
            ff3allCheckbox.addEventListener('change', toggleSubCheckboxes);
            ff4allCheckbox.addEventListener('change', toggleSubCheckboxes);
            ff6allCheckbox.addEventListener('change', toggleSubCheckboxes);
            endo1allCheckbox.addEventListener('change', toggleSubCheckboxes);
            crown1allCheckbox.addEventListener('change', toggleSubCheckboxes);
            crown2allCheckbox.addEventListener('change', toggleSubCheckboxes);
            crown3allCheckbox.addEventListener('change', toggleSubCheckboxes);
            crown4allCheckbox.addEventListener('change', toggleSubCheckboxes);
            F1Checkbox.addEventListener('change', toggleSubCheckboxes);
            E221Checkbox.addEventListener('change', toggleSubCheckboxes);
            E250Checkbox.addEventListener('change', toggleSubCheckboxes);
            endo2allCheckbox.addEventListener('change', toggleSubCheckboxes);
            endo4allCheckbox.addEventListener('change', toggleSubCheckboxes);
            endo3allCheckbox.addEventListener('change', toggleSubCheckboxes);

            function toggleSubCheckboxes() {
                // Check or uncheck checkboxes B3, B4, B5, B6 based on B11Checkbox state
                B3Checkbox.checked = B100Checkbox.checked;
                B4Checkbox.checked = B100Checkbox.checked;
                B5Checkbox.checked = B100Checkbox.checked;
                B6Checkbox.checked = B100Checkbox.checked;
                B7Checkbox.checked = B100Checkbox.checked;
                B8Checkbox.checked = B100Checkbox.checked;
                B9Checkbox.checked = B100Checkbox.checked;
                B10Checkbox.checked = B100Checkbox.checked;
                B25Checkbox.checked = B100Checkbox.checked;
                B13Checkbox.checked = B100Checkbox.checked;
                B14Checkbox.checked = B100Checkbox.checked;
                B15Checkbox.checked = B100Checkbox.checked;
                B16Checkbox.checked = B100Checkbox.checked;
                B17Checkbox.checked = B100Checkbox.checked;
                B17Checkbox.checked = B100Checkbox.checked;
                B117Checkbox.checked = B100Checkbox.checked;
                B31Checkbox.checked = B100Checkbox.checked;
                B32Checkbox.checked = B100Checkbox.checked;
                B33Checkbox.checked = B100Checkbox.checked;
                B34Checkbox.checked = B100Checkbox.checked;
                B35Checkbox.checked = B100Checkbox.checked;
                B36Checkbox.checked = B100Checkbox.checked;
                htpsrCheckbox.checked = B100Checkbox.checked;
                opgCheckbox.checked = B100Checkbox.checked;
                B18Checkbox.checked = B100Checkbox.checked;
                B1Checkbox.checked = B100Checkbox.checked;
                B2Checkbox.checked = B100Checkbox.checked;
                B105Checkbox.checked = B100Checkbox.checked;
                ptCheckbox.checked = B100Checkbox.checked;
                c3sCheckbox.checked = B100Checkbox.checked;
                colgateCheckbox.checked = B100Checkbox.checked;
                medicalHxCheckbox.checked = B100Checkbox.checked;
                supervisorCheckbox.checked = B100Checkbox.checked;
                nvCheckbox.checked = B100Checkbox.checked;
                radioCheckbox.checked = B100Checkbox.checked;


                ptff1Checkbox.checked = ff1allCheckbox.checked;
                ff1c3sCheckbox.checked = ff1allCheckbox.checked;
                ff1colgateCheckbox.checked = ff1allCheckbox.checked;
                ff1medicalHxCheckbox.checked = ff1allCheckbox.checked;
                G13Checkbox.checked = ff1allCheckbox.checked;
                G13aCheckbox1.checked = ff1allCheckbox.checked;
                G14Checkbox.checked = ff1allCheckbox.checked;
                G6Checkbox.checked = ff1allCheckbox.checked;
                G7Checkbox.checked = ff1allCheckbox.checked;
                G8Checkbox.checked = ff1allCheckbox.checked;
                G10ACheckbox.checked = ff1allCheckbox.checked;
                G11Checkbox.checked = ff1allCheckbox.checked;

                G15Checkbox.checked = ff1allCheckbox.checked;
                G16Checkbox.checked = ff1allCheckbox.checked;


                ptff2Checkbox.checked = ff2allCheckbox.checked;
                ff2c3sCheckbox.checked = ff2allCheckbox.checked;
                ff2colgateCheckbox.checked = ff2allCheckbox.checked;
                ff2medicalHxCheckbox.checked = ff2allCheckbox.checked;
                G22Checkbox.checked = ff2allCheckbox.checked;
                ff2supervisorCheckbox.checked = ff2allCheckbox.checked;
                G23Checkbox.checked = ff2allCheckbox.checked;
                G18Checkbox.checked = ff2allCheckbox.checked;
                G19Checkbox.checked = ff2allCheckbox.checked;
                G20Checkbox.checked = ff2allCheckbox.checked;
                G21Checkbox.checked = ff2allCheckbox.checked;
                G22Checkbox.checked = ff2allCheckbox.checked;
                G24Checkbox.checked = ff2allCheckbox.checked;
                G25Checkbox.checked = ff2allCheckbox.checked;


                ptff3Checkbox.checked = ff3allCheckbox.checked;
                ff3c3sCheckbox.checked = ff3allCheckbox.checked;
                ff3colgateCheckbox.checked = ff3allCheckbox.checked;
                ff3medicalHxCheckbox.checked = ff3allCheckbox.checked;
                ff3G22Checkbox.checked = ff3allCheckbox.checked;
                ff3supervisorCheckbox.checked = ff3allCheckbox.checked;
                ff3G23Checkbox.checked = ff3allCheckbox.checked;
                G30Checkbox.checked = ff3allCheckbox.checked;
                G31Checkbox.checked = ff3allCheckbox.checked;
                G32Checkbox.checked = ff3allCheckbox.checked;
                G33Checkbox.checked = ff3allCheckbox.checked;
                G34Checkbox.checked = ff3allCheckbox.checked;
                G35Checkbox.checked = ff3allCheckbox.checked;
                G38Checkbox.checked = ff3allCheckbox.checked;

                ptff4Checkbox.checked = ff4allCheckbox.checked;
                ff4c3sCheckbox.checked = ff4allCheckbox.checked;
                ff4colgateCheckbox.checked = ff4allCheckbox.checked;
                ff4medicalHxCheckbox.checked = ff4allCheckbox.checked;
                ff4G22Checkbox.checked = ff4allCheckbox.checked;
                ff4supervisorCheckbox.checked = ff4allCheckbox.checked;
                ff4G23Checkbox.checked = ff4allCheckbox.checked;
                G49Checkbox.checked = ff4allCheckbox.checked;
                G50Checkbox.checked = ff4allCheckbox.checked;
                G51Checkbox.checked = ff4allCheckbox.checked;
                G52Checkbox.checked = ff4allCheckbox.checked;
                G54Checkbox.checked = ff4allCheckbox.checked;


                ptff5Checkbox.checked = G156Checkbox.checked;
                ff5c3sCheckbox.checked = G156Checkbox.checked;
                ff5colgateCheckbox.checked = G156Checkbox.checked;
                ff5medicalHxCheckbox.checked = G156Checkbox.checked;
                ff5G22Checkbox.checked = G156Checkbox.checked;
                ff5supervisorCheckbox.checked = G156Checkbox.checked;
                ff5G23Checkbox.checked = G156Checkbox.checked;
                G41Checkbox.checked = G156Checkbox.checked;
                G42Checkbox.checked = G156Checkbox.checked;
                G43Checkbox.checked = G156Checkbox.checked;
                G44Checkbox.checked = G156Checkbox.checked;


                ptff6Checkbox.checked = ff6allCheckbox.checked;
                ff6c3sCheckbox.checked = ff6allCheckbox.checked;
                ff6colgateCheckbox.checked = ff6allCheckbox.checked;
                ff6medicalHxCheckbox.checked = ff6allCheckbox.checked;
                ff6G22Checkbox.checked = ff6allCheckbox.checked;
                ff6supervisorCheckbox.checked = ff6allCheckbox.checked;
                ff6G23Checkbox.checked = ff6allCheckbox.checked;
                G55Checkbox.checked = ff6allCheckbox.checked;
                G56Checkbox.checked = ff6allCheckbox.checked;


                restoCheckbox.checked = selectAllRestoCheckbox.checked;
                bwCheckbox.checked = selectAllRestoCheckbox.checked;
                xylocaineCheckbox.checked = selectAllRestoCheckbox.checked;
                latypeCheckbox.checked = selectAllRestoCheckbox.checked;
                isolationCheckbox.checked = selectAllRestoCheckbox.checked;
                cavityCheckbox.checked = selectAllRestoCheckbox.checked;
                C12Checkbox.checked = selectAllRestoCheckbox.checked;
                etchedCheckbox.checked = selectAllRestoCheckbox.checked;
                C11Checkbox.checked = selectAllRestoCheckbox.checked;


                C110Checkbox.checked = selectAllResto2Checkbox.checked;
                C111Checkbox.checked = selectAllResto2Checkbox.checked;
                ptresto1Checkbox.checked = selectAllRestoCheckbox.checked;
                resto1c3sCheckbox.checked = selectAllRestoCheckbox.checked;
                resto1colgateCheckbox.checked = selectAllRestoCheckbox.checked;
                resto1medicalHxCheckbox.checked = selectAllRestoCheckbox.checked;
                resto1G22Checkbox.checked = selectAllRestoCheckbox.checked;
                resto1supervisorCheckbox.checked = selectAllRestoCheckbox.checked;
                resto1nvCheckbox.checked = selectAllRestoCheckbox.checked;

                // S/C section
                consentsCheckbox.checked = selectSpecificRestoCheckbox.checked;
                debridementCheckbox.checked = selectSpecificRestoCheckbox.checked;
                refinementCheckbox.checked = selectSpecificRestoCheckbox.checked;
                prophyCheckbox.checked = selectSpecificRestoCheckbox.checked;
                ohiCheckbox.checked = selectSpecificRestoCheckbox.checked;
                ptsc1Checkbox.checked = selectSpecificSCCheckbox.checked;
                sc1c3sCheckbox.checked = selectSpecificSCCheckbox.checked;
                sc1colgateCheckbox.checked = selectSpecificSCCheckbox.checked;
                sc1medicalHxCheckbox.checked = selectSpecificSCCheckbox.checked;
                sc1G22Checkbox.checked = selectSpecificSCCheckbox.checked;
                sc1supervisorCheckbox.checked = selectSpecificSCCheckbox.checked;
                sc1nvCheckbox.checked = selectSpecificSCCheckbox.checked;


                ptperio1Checkbox.checked = E221Checkbox.checked;
                perio1c3sCheckbox.checked = E221Checkbox.checked;
                perio1colgateCheckbox.checked = E221Checkbox.checked;
                perio1medicalHxCheckbox.checked = E221Checkbox.checked;
                perio1G22Checkbox.checked = E221Checkbox.checked;
                perio1supervisorCheckbox.checked = E221Checkbox.checked;
                perio1nvCheckbox.checked = E221Checkbox.checked;
                P25Checkbox.checked = E221Checkbox.checked;
                P10Checkbox.checked = E221Checkbox.checked;
                P1ACheckbox.checked = E221Checkbox.checked;
                P1BCheckbox.checked = E221Checkbox.checked;
                LAperio16Checkbox.checked = E221Checkbox.checked;
                LAperio17Checkbox.checked = E221Checkbox.checked;


                ptperio2Checkbox.checked = E250Checkbox.checked;
                perio2c3sCheckbox.checked = E250Checkbox.checked;
                perio2colgateCheckbox.checked = E250Checkbox.checked;
                perio2medicalHxCheckbox.checked = E250Checkbox.checked;
                p40Checkbox5.checked = E250Checkbox.checked;
                p40Checkbox6.checked = E250Checkbox.checked;
                p40Checkbox7.checked = E250Checkbox.checked;
                p40Checkbox8.checked = E250Checkbox.checked;
                p40Checkbox9.checked = E250Checkbox.checked;
                p40Checkbox10.checked = E250Checkbox.checked;
                perio2G22Checkbox.checked = E250Checkbox.checked;
                perio2supervisorCheckbox.checked = E250Checkbox.checked;
                perio2nvCheckbox.checked = E250Checkbox.checked;
                LAperio26Checkbox.checked = E250Checkbox.checked;
                LAperio27Checkbox.checked = E250Checkbox.checked;

                B30Checkbox.checked = B105Checkbox.checked;
                B31Checkbox.checked = B105Checkbox.checked;
                B32Checkbox.checked = B105Checkbox.checked;
                B33Checkbox.checked = B105Checkbox.checked;
                B34Checkbox.checked = B105Checkbox.checked;
                B35Checkbox.checked = B105Checkbox.checked;
                B36Checkbox.checked = B105Checkbox.checked;

                ptendo1Checkbox.checked = endo1allCheckbox.checked;
                endo1c3sCheckbox.checked = endo1allCheckbox.checked;
                endo1colgateCheckbox.checked = endo1allCheckbox.checked;
                endo1medicalHxCheckbox.checked = endo1allCheckbox.checked;
                endo1G22Checkbox.checked = endo1allCheckbox.checked;
                endo1supervisorCheckbox.checked = endo1allCheckbox.checked;
                endo1nvCheckbox.checked = endo1allCheckbox.checked;

                E5Checkbox.checked = endo1allCheckbox.checked
                E7Checkbox.checked = endo1allCheckbox.checked
                E8Checkbox.checked = endo1allCheckbox.checked
                E9Checkbox.checked = endo1allCheckbox.checked
                E10Checkbox.checked = endo1allCheckbox.checked
                E11Checkbox.checked = endo1allCheckbox.checked
                E12Checkbox.checked = endo1allCheckbox.checked
                E13Checkbox.checked = endo1allCheckbox.checked

                E15Checkbox.checked = endo1allCheckbox.checked
                E16Checkbox.checked = endo1allCheckbox.checked
                E17Checkbox.checked = endo1allCheckbox.checked
                E1Checkbox.checked = endo1allCheckbox.checked
                E1ACheckbox.checked = endo1allCheckbox.checked
                E1BCheckbox.checked = endo1allCheckbox.checked
                E1CCheckbox.checked = endo1allCheckbox.checked
                E2Checkbox.checked = endo1allCheckbox.checked
                E3Checkbox.checked = endo1allCheckbox.checked
                E4Checkbox.checked = endo1allCheckbox.checked

                E18Checkbox.checked = endo1allCheckbox.checked
                E19Checkbox.checked = endo1allCheckbox.checked
                E20Checkbox.checked = endo1allCheckbox.checked
                E21Checkbox.checked = endo1allCheckbox.checked
                E22Checkbox.checked = endo1allCheckbox.checked
                E23Checkbox.checked = endo1allCheckbox.checked
                E24Checkbox.checked = endo1allCheckbox.checked
                E25Checkbox.checked = endo1allCheckbox.checked
                E26Checkbox.checked = endo1allCheckbox.checked
                E27Checkbox.checked = endo1allCheckbox.checked


                ptendo2Checkbox.checked = endo2allCheckbox.checked;
                endo2c3sCheckbox.checked = endo2allCheckbox.checked;
                endo2colgateCheckbox.checked = endo2allCheckbox.checked;
                endo2medicalHxCheckbox.checked = endo2allCheckbox.checked;
                E40Checkbox.checked = endo2allCheckbox.checked;
                E41Checkbox.checked = endo2allCheckbox.checked;
                E42Checkbox.checked = endo2allCheckbox.checked;
                E43Checkbox.checked = endo2allCheckbox.checked;
                E44Checkbox.checked = endo2allCheckbox.checked;
                E45Checkbox.checked = endo2allCheckbox.checked;
                E46Checkbox.checked = endo2allCheckbox.checked;
                E47Checkbox.checked = endo2allCheckbox.checked;
                E48Checkbox.checked = endo2allCheckbox.checked;
                endo2G22Checkbox.checked = endo2allCheckbox.checked;
                endo2supervisorCheckbox.checked = endo2allCheckbox.checked;
                endo2nvCheckbox.checked = endo2allCheckbox.checked;


                ptendo4Checkbox.checked = endo4allCheckbox.checked;
                endo4c3sCheckbox.checked = endo4allCheckbox.checked;
                endo4colgateCheckbox.checked = endo4allCheckbox.checked;
                endo4medicalHxCheckbox.checked = endo4allCheckbox.checked;

                E80Checkbox.checked = endo4allCheckbox.checked;
                E82Checkbox.checked = endo4allCheckbox.checked;
                E83Checkbox.checked = endo4allCheckbox.checked;
                E85Checkbox.checked = endo4allCheckbox.checked;
                E86Checkbox.checked = endo4allCheckbox.checked;
                E87Checkbox.checked = endo4allCheckbox.checked;
                E88Checkbox.checked = endo4allCheckbox.checked;
                E89Checkbox.checked = endo4allCheckbox.checked;
                E90Checkbox.checked = endo4allCheckbox.checked;
                E91Checkbox.checked = endo4allCheckbox.checked;
                E92Checkbox.checked = endo4allCheckbox.checked;
                E93Checkbox.checked = endo4allCheckbox.checked;

                E94Checkbox.checked = endo4allCheckbox.checked;
                E95Checkbox.checked = endo4allCheckbox.checked;

                endo4G22Checkbox.checked = endo4allCheckbox.checked;
                endo4supervisorCheckbox.checked = endo4allCheckbox.checked;
                endo4nvCheckbox.checked = endo4allCheckbox.checked;

// Additional checkboxes mentioned in the comment
                ptendo3Checkbox.checked = endo3allCheckbox.checked;
                endo3c3sCheckbox.checked = endo3allCheckbox.checked;
                endo3colgateCheckbox.checked = endo3allCheckbox.checked;
                endo3medicalHxCheckbox.checked = endo3allCheckbox.checked;

                E50Checkbox.checked = endo3allCheckbox.checked;
                E51Checkbox.checked = endo3allCheckbox.checked;

                E53Checkbox.checked = endo3allCheckbox.checked;
                E54Checkbox.checked = endo3allCheckbox.checked;
                E55Checkbox.checked = endo3allCheckbox.checked;

                E56Checkbox.checked = endo3allCheckbox.checked;
                E57Checkbox.checked = endo3allCheckbox.checked;
                E58Checkbox.checked = endo3allCheckbox.checked;

                E59Checkbox.checked = endo3allCheckbox.checked;
                E60Checkbox.checked = endo3allCheckbox.checked;

                E61Checkbox.checked = endo3allCheckbox.checked;
                E62Checkbox.checked = endo3allCheckbox.checked;
                E63Checkbox.checked = endo3allCheckbox.checked;

                E64Checkbox.checked = endo3allCheckbox.checked;
                E65Checkbox.checked = endo3allCheckbox.checked;
                E66Checkbox.checked = endo3allCheckbox.checked;

                E67Checkbox.checked = endo3allCheckbox.checked;
                E68Checkbox.checked = endo3allCheckbox.checked;


                endo3G22Checkbox.checked = endo3allCheckbox.checked;
                endo3supervisorCheckbox.checked = endo3allCheckbox.checked;
                endo3nvCheckbox.checked = endo3allCheckbox.checked;


                ptff1Checkbox.checked = ff1allCheckbox.checked;
                ff1c3sCheckbox.checked = ff1allCheckbox.checked;
                ff1colgateCheckbox.checked = ff1allCheckbox.checked;
                ff1medicalHxCheckbox.checked = ff1allCheckbox.checked;
                G13Checkbox.checked = ff1allCheckbox.checked;
                G13aCheckbox1.checked = ff1allCheckbox.checked;
                G14Checkbox.checked = ff1allCheckbox.checked;


                // Crown Section

                document.getElementById('ptcrown1Checkbox').checked = crown1allCheckbox.checked;
                document.getElementById('crown1c3sCheckbox').checked = crown1allCheckbox.checked;
                document.getElementById('crown1colgateCheckbox').checked = crown1allCheckbox.checked;
                document.getElementById('crown1medicalHxCheckbox').checked = crown1allCheckbox.checked;


                document.getElementById('J1Checkbox').checked = crown1allCheckbox.checked;
                document.getElementById('J2Checkbox').checked = crown1allCheckbox.checked;
                document.getElementById('J3Checkbox').checked = crown1allCheckbox.checked;
                document.getElementById('J4Checkbox').checked = crown1allCheckbox.checked;
                document.getElementById('J5Checkbox').checked = crown1allCheckbox.checked;
                document.getElementById('J6Checkbox').checked = crown1allCheckbox.checked;
                document.getElementById('J7Checkbox').checked = crown1allCheckbox.checked;
                document.getElementById('J8Checkbox').checked = crown1allCheckbox.checked;

                document.getElementById('J10Checkbox').checked = crown1allCheckbox.checked;
                document.getElementById('J11Checkbox').checked = crown1allCheckbox.checked;
                document.getElementById('J12Checkbox').checked = crown1allCheckbox.checked;
                document.getElementById('J13Checkbox').checked = crown1allCheckbox.checked;
                document.getElementById('J14Checkbox').checked = crown1allCheckbox.checked;


// Relevant Abutment/Adjacent Teeth Assessment Section


// TX PLAN Section


                document.getElementById('J38Checkbox').checked = crown1allCheckbox.checked;
                document.getElementById('J39Checkbox').checked = crown1allCheckbox.checked;
                document.getElementById('J40Checkbox').checked = crown1allCheckbox.checked;
                document.getElementById('J41Checkbox').checked = crown1allCheckbox.checked;
                document.getElementById('J43Checkbox').checked = crown1allCheckbox.checked;
                document.getElementById('J44Checkbox').checked = crown1allCheckbox.checked;

                document.getElementById('J47Checkbox').checked = crown1allCheckbox.checked;
                document.getElementById('J48Checkbox').checked = crown1allCheckbox.checked;
// Assuming crown1allCheckbox is the master checkbox for this section
                document.getElementById('crown1G22Checkbox').checked = crown1allCheckbox.checked;
                document.getElementById('crown1supervisorCheckbox').checked = crown1allCheckbox.checked;
                document.getElementById('crown1nvCheckbox').checked = crown1allCheckbox.checked;


                document.getElementById('ptcrown2Checkbox').checked = crown2allCheckbox.checked;
                document.getElementById('crown2c3sCheckbox').checked = crown2allCheckbox.checked;
                document.getElementById('crown2colgateCheckbox').checked = crown2allCheckbox.checked;
                document.getElementById('crown2medicalHxCheckbox').checked = crown2allCheckbox.checked;

                document.getElementById('J50Checkbox').checked = crown2allCheckbox.checked;
                document.getElementById('J51Checkbox').checked = crown2allCheckbox.checked;
                document.getElementById('J52Checkbox').checked = crown2allCheckbox.checked;
                document.getElementById('J53Checkbox').checked = crown2allCheckbox.checked;
                document.getElementById('J54Checkbox').checked = crown2allCheckbox.checked;

                document.getElementById('J60Checkbox').checked = crown2allCheckbox.checked;
                document.getElementById('J61Checkbox').checked = crown2allCheckbox.checked;
                document.getElementById('J62Checkbox').checked = crown2allCheckbox.checked;
                document.getElementById('J63Checkbox').checked = crown2allCheckbox.checked;
                document.getElementById('J64Checkbox').checked = crown2allCheckbox.checked;
                document.getElementById('J65Checkbox').checked = crown2allCheckbox.checked;
                document.getElementById('J66Checkbox').checked = crown2allCheckbox.checked;

                document.getElementById('J67Checkbox').checked = crown2allCheckbox.checked;
                document.getElementById('J68Checkbox').checked = crown2allCheckbox.checked;

                document.getElementById('J69Checkbox').checked = crown2allCheckbox.checked;

                document.getElementById('crown2G22Checkbox').checked = crown2allCheckbox.checked;
                document.getElementById('crown2supervisorCheckbox').checked = crown2allCheckbox.checked;
                document.getElementById('crown2nvCheckbox').checked = crown2allCheckbox.checked;


                document.getElementById('ptcrown3Checkbox').checked = crown3allCheckbox.checked;
                document.getElementById('crown3c3sCheckbox').checked = crown3allCheckbox.checked;
                document.getElementById('crown3colgateCheckbox').checked = crown3allCheckbox.checked;
                document.getElementById('crown3medicalHxCheckbox').checked = crown3allCheckbox.checked;

                document.getElementById('J80Checkbox').checked = crown3allCheckbox.checked;
                document.getElementById('J81Checkbox').checked = crown3allCheckbox.checked;
                document.getElementById('J82Checkbox').checked = crown3allCheckbox.checked;
                document.getElementById('J83Checkbox').checked = crown3allCheckbox.checked;
                document.getElementById('J84Checkbox').checked = crown3allCheckbox.checked;
                document.getElementById('J85Checkbox').checked = crown3allCheckbox.checked;
                document.getElementById('J86Checkbox').checked = crown3allCheckbox.checked;

                document.getElementById('J87Checkbox').checked = crown3allCheckbox.checked;

                document.getElementById('J88Checkbox').checked = crown3allCheckbox.checked;
                document.getElementById('crown3G22Checkbox').checked = crown3allCheckbox.checked;
                document.getElementById('crown3supervisorCheckbox').checked = crown3allCheckbox.checked;
                document.getElementById('crown3nvCheckbox').checked = crown3allCheckbox.checked;

                document.getElementById('J91Checkbox').checked = crown3allCheckbox.checked;
                document.getElementById('J92Checkbox').checked = crown3allCheckbox.checked;

                document.getElementById('ptcrown4Checkbox').checked = crown4allCheckbox.checked;
                document.getElementById('crown4c3sCheckbox').checked = crown4allCheckbox.checked;
                document.getElementById('crown4colgateCheckbox').checked = crown4allCheckbox.checked;
                document.getElementById('crown4medicalHxCheckbox').checked = crown4allCheckbox.checked;

                document.getElementById('J93Checkbox').checked = crown4allCheckbox.checked;
                document.getElementById('J99Checkbox').checked = crown4allCheckbox.checked;
                document.getElementById('J100Checkbox').checked = crown4allCheckbox.checked;
                document.getElementById('J101Checkbox').checked = crown4allCheckbox.checked;
                document.getElementById('J102Checkbox').checked = crown4allCheckbox.checked;
                document.getElementById('J103Checkbox').checked = crown4allCheckbox.checked;
                document.getElementById('J104Checkbox').checked = crown4allCheckbox.checked;
                document.getElementById('J105Checkbox').checked = crown4allCheckbox.checked;

                document.getElementById('J106Checkbox').checked = crown4allCheckbox.checked;

                document.getElementById('J107Checkbox').checked = crown4allCheckbox.checked;
                document.getElementById('crown4G22Checkbox').checked = crown4allCheckbox.checked;
                document.getElementById('crown4supervisorCheckbox').checked = crown4allCheckbox.checked;
                document.getElementById('crown4nvCheckbox').checked = crown4allCheckbox.checked;

                document.getElementById('ptsurg1Checkbox').checked = F1Checkbox.checked;
                document.getElementById('surg1c3sCheckbox').checked = F1Checkbox.checked;
                document.getElementById('surg1colgateCheckbox').checked = F1Checkbox.checked;
                document.getElementById('surg1medicalHxCheckbox').checked = F1Checkbox.checked;

                document.getElementById('surg1G22Checkbox').checked = F1Checkbox.checked;
                document.getElementById('surg1supervisorCheckbox').checked = F1Checkbox.checked;
                document.getElementById('surg1nvCheckbox').checked = F1Checkbox.checked;

                document.getElementById('o1Checkbox3').checked = F1Checkbox.checked;
                document.getElementById('o1Checkbox3A').checked = F1Checkbox.checked;
                document.getElementById('o1Checkbox4').checked = F1Checkbox.checked;
                document.getElementById('o1Checkbox5').checked = F1Checkbox.checked;

                document.getElementById('OA11Checkbox').checked = F1Checkbox.checked;
                document.getElementById('OA12Checkbox').checked = F1Checkbox.checked;
                document.getElementById('o1Checkbox6').checked = F1Checkbox.checked;
                document.getElementById('o1Checkbox7').checked = F1Checkbox.checked;
                document.getElementById('o1Checkbox8A').checked = F1Checkbox.checked;
                document.getElementById('o1Checkbox8').checked = F1Checkbox.checked;
                document.getElementById('o1Checkbox10').checked = F1Checkbox.checked;

                // Trigger the generateText function after changing the checkboxes
                generateText();
            }


            function toggleSection(sectionId) {
                var section = document.getElementById(sectionId);
                section.style.display = section.style.display === 'none' || section.style.display === '' ? 'block' : 'none';
                // Do not call generateText() here
                adjustGeneratedTextWidth();
            }


            var button = document.getElementById("button");

            function myFunction() {
                var copyText = document.getElementById("generatedText");
                copyText.select();
                copyText.setSelectionRange(0, 99999);
                navigator.clipboard.writeText(copyText.value);

                var tooltip = document.getElementById("myTooltip");
                tooltip.innerHTML = "Copied!";
            }

            button.addEventListener("click", myFunction);

            function generateText(event) {
                // Check if the input field should be excluded
                if (event.target.id !== 'generatedText') {
                    // Perform your actions here
                    console.log('Text generated:', event.target.value);
                }
            }


            // Get all input elements
            const inputFields = document.querySelectorAll('input');

            // Add event listener to each input field
            inputFields.forEach(function (input) {
                input.addEventListener('input', generateText);
            });


            generatedText2.addEventListener('input', generateText);
            generatedText1.addEventListener('input', generateText);


            // Function to generate text based on selected options
            function generateText() {

                if (finalizebool) {

                    const text = [];

                    // 011 Intro
                    if (ptCheckbox.checked) {
                        const A1TextInputValue = A1TextInput.value;
                        const presentationText = `Pt. presented to ${yearDropdown.value} ${clinicDropdown.value} ${codeDropdown.value} for ${typeDropdown.value}`;

                        if (A1TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`${presentationText} ${A1TextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push(presentationText);
                        }
                    }
                    if (c3sCheckbox.checked) {
                        const c3sTextInputValue = c3sTextInput.value;
                        if (c3sTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`3C’s confirmed - ${c3sTextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push('3C’s confirmed');
                        }
                    }

                    if (colgateCheckbox.checked) {
                        text.push('\n');
                        text.push('Colgate 1.5% Hydrogen Peroxide Mouth rinse given.');
                    }
                    if (medicalHxCheckbox.checked) {
                        text.push('\n');
                        text.push(`Medical Hx ${hxDropdown.value}`);
                        text.push('\n');
                    }


                    //F/F Primary
                    if (ptff1Checkbox.checked) {
                        const ff1A1TextInputValue = ff1A1TextInput.value;
                        const ff1presentationText = `Pt. presented to ${ff1yearDropdown.value} ${ff1clinicDropdown.value} ${ff1codeDropdown.value} for ${ff1typeDropdown.value}`;

                        if (ff1A1TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`${ff1presentationText} ${ff1A1TextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push(ff1presentationText);
                        }
                    }

                    if (ff1c3sCheckbox.checked) {
                        text.push('\n');
                        text.push('3C’s confirmed');
                    }

                    if (ff1colgateCheckbox.checked) {
                        text.push('\n');
                        text.push('Colgate 1.5% Hydrogen Peroxide Mouth rinse given.');
                    }

                    if (ff1medicalHxCheckbox.checked) {
                        text.push('\n');
                        text.push(`Medical Hx ${ff1hxDropdown.value}`);
                        text.push('\n');
                    }


                    // F/F Seconday Intro
                    if (ptff2Checkbox.checked) {
                        const ff2A1TextInputValue = ff2A1TextInput.value;
                        const ff2presentationText = `Pt. presented to ${ff2yearDropdown.value} ${ff2clinicDropdown.value} ${ff2codeDropdown.value} for ${ff2typeDropdown.value}`;

                        if (ff2A1TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`${ff2presentationText} ${ff2A1TextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push(ff2presentationText);
                        }
                    }
                    if (ff2c3sCheckbox.checked) {
                        const ff2c3sTextInputValue = ff2c3sTextInput.value;
                        if (ff2c3sTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`3C’s confirmed - ${ff2c3sTextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push('3C’s confirmed');
                        }
                    }

                    if (ff2colgateCheckbox.checked) {
                        text.push('\n');
                        text.push('Colgate 1.5% Hydrogen Peroxide Mouth rinse given.');
                    }
                    if (ff2medicalHxCheckbox.checked) {
                        text.push('\n');
                        text.push(`Medical Hx ${ff2hxDropdown.value}`);
                        text.push('\n');
                    }

                    //F/F Jaw Reg Intro
                    if (ptff3Checkbox.checked) {
                        const ff3A1TextInputValue = ff3A1TextInput.value;
                        const presentationText = `Pt. presented to ${ff3yearDropdown.value} ${ff3clinicDropdown.value} ${ff3codeDropdown.value} for ${ff3typeDropdown.value}`;

                        if (ff3A1TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`${presentationText} ${ff3A1TextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push(presentationText);
                        }
                    }
                    if (ff3c3sCheckbox.checked) {
                        const ff3c3sTextInputValue = ff3c3sTextInput.value;
                        if (ff3c3sTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`3C’s confirmed - ${ff3c3sTextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push('3C’s confirmed');
                        }
                    }

                    if (ff3colgateCheckbox.checked) {
                        text.push('\n');
                        text.push('Colgate 1.5% Hydrogen Peroxide Mouth rinse given.');
                    }
                    if (ff3medicalHxCheckbox.checked) {
                        text.push('\n');
                        text.push(`Medical Hx ${ff3hxDropdown.value}`);
                        text.push('\n');
                    }


                    //F/F Insertion Intro
                    if (ptff5Checkbox.checked) {
                        const ff5A1TextInputValue = ff5A1TextInput.value;
                        const presentationText = `Pt. presented to ${ff5yearDropdown.value} ${ff5clinicDropdown.value} ${ff5codeDropdown.value} for ${ff5typeDropdown.value}`;

                        if (ff5A1TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`${presentationText} ${ff5A1TextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push(presentationText);
                        }
                    }
                    if (ff5c3sCheckbox.checked) {
                        const ff5c3sTextInputValue = ff5c3sTextInput.value;
                        if (ff5c3sTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`3C’s confirmed - ${ff5c3sTextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push('3C’s confirmed');
                        }
                    }

                    if (ff5colgateCheckbox.checked) {
                        text.push('\n');
                        text.push('Colgate 1.5% Hydrogen Peroxide Mouth rinse given.');
                    }
                    if (ff5medicalHxCheckbox.checked) {
                        text.push('\n');
                        text.push(`Medical Hx ${ff5hxDropdown.value}`);
                        text.push('\n');
                    }


                    // F/F Teeth Try in Intro
                    if (ptff4Checkbox.checked) {
                        const ff4A1TextInputValue = ff4A1TextInput.value;
                        const presentationText = `Pt. presented to ${ff4yearDropdown.value} ${ff4clinicDropdown.value} ${ff4codeDropdown.value} for ${ff4typeDropdown.value}`;

                        if (ff4A1TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`${presentationText} ${ff4A1TextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push(presentationText);
                        }
                    }
                    if (ff4c3sCheckbox.checked) {
                        const ff4c3sTextInputValue = ff4c3sTextInput.value;
                        if (ff4c3sTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`3C’s confirmed - ${ff4c3sTextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push('3C’s confirmed');
                        }
                    }

                    if (ff4colgateCheckbox.checked) {
                        text.push('\n');
                        text.push('Colgate 1.5% Hydrogen Peroxide Mouth rinse given.');
                    }
                    if (ff4medicalHxCheckbox.checked) {
                        text.push('\n');
                        text.push(`Medical Hx ${ff4hxDropdown.value}`);
                        text.push('\n');
                    }


                    // F/F Review Intro

                    if (ptff6Checkbox.checked) {
                        const ff6a1TextInputValue = ff6A1TextInput.value;
                        const presentationText = `Pt. presented to ${ff6yearDropdown.value} ${ff6clinicDropdown.value} ${ff6codeDropdown.value} for ${ff6typeDropdown.value}`;

                        if (ff6a1TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`${presentationText} ${ff6A1TextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push(presentationText);
                        }
                    }
                    if (ff6c3sCheckbox.checked) {
                        const ff6c3sTextInputValue = ff6c3sTextInput.value;
                        if (ff6c3sTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`3C’s confirmed - ${ff6c3sTextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push('3C’s confirmed');
                        }
                    }

                    if (ff6colgateCheckbox.checked) {
                        text.push('\n');
                        text.push('Colgate 1.5% Hydrogen Peroxide Mouth rinse given.');
                    }
                    if (ff6medicalHxCheckbox.checked) {
                        text.push('\n');
                        text.push(`Medical Hx ${ff6hxDropdown.value}`);
                        text.push('\n');
                    }
                    //Endo 1 Intro
                    if (ptendo1Checkbox.checked) {
                        const endo1A1TextInputValue = endo1A1TextInput.value;
                        const endo1presentationText = `Pt. presented to ${endo1yearDropdown.value} ${endo1clinicDropdown.value} ${endo1codeDropdown.value} for ${endo1typeDropdown.value}`;

                        if (endo1A1TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`${endo1presentationText} ${endo1A1TextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push(endo1presentationText);
                        }
                    }
                    if (endo1c3sCheckbox.checked) {
                        const endo1c3sTextInputValue = endo1c3sTextInput.value;
                        if (endo1c3sTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`3C’s confirmed - ${endo1c3sTextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push('3C’s confirmed');
                        }
                    }

                    if (endo1colgateCheckbox.checked) {
                        text.push('\n');
                        text.push('Colgate 1.5% Hydrogen Peroxide Mouth rinse given.');
                    }
                    if (endo1medicalHxCheckbox.checked) {
                        text.push('\n');
                        text.push(`Medical Hx ${endo1hxDropdown.value}`);
                        text.push('\n');
                    }

                    //endo intro
                    if (ptendo2Checkbox.checked) {
                        const endo2A1TextInputValue = endo2A1TextInput.value;
                        const endo2presentationText = `Pt. presented to ${endo2yearDropdown.value} ${endo2clinicDropdown.value} ${endo2codeDropdown.value} for ${endo2typeDropdown.value}`;

                        if (endo2A1TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`${endo2presentationText} ${endo2A1TextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push(endo2presentationText);
                        }
                    }
                    if (endo2c3sCheckbox.checked) {
                        const endo2c3sTextInputValue = endo2c3sTextInput.value;
                        if (endo2c3sTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`3C’s confirmed - ${endo2c3sTextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push('3C’s confirmed');
                        }
                    }

                    if (endo2colgateCheckbox.checked) {
                        text.push('\n');
                        text.push('Colgate 1.5% Hydrogen Peroxide Mouth rinse given.');
                    }
                    if (endo2medicalHxCheckbox.checked) {
                        text.push('\n');
                        text.push(`Medical Hx ${endo2hxDropdown.value}`);
                        text.push('\n');
                    }


                    if (ptendo3Checkbox.checked) {
                        const endo3A1TextInputValue = endo3A1TextInput.value;
                        const endo3presentationText = `Pt. presented to ${endo3yearDropdown.value} ${endo3clinicDropdown.value} ${endo3codeDropdown.value} for ${endo3typeDropdown.value}`;

                        if (endo3A1TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`${endo3presentationText} ${endo3A1TextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push(endo3presentationText);
                        }
                    }
                    if (endo3c3sCheckbox.checked) {
                        const endo3c3sTextInputValue = endo3c3sTextInput.value;
                        if (endo3c3sTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`3C’s confirmed - ${endo3c3sTextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push('3C’s confirmed');
                        }
                    }

                    if (endo3colgateCheckbox.checked) {
                        text.push('\n');
                        text.push('Colgate 1.5% Hydrogen Peroxide Mouth rinse given.');
                    }
                    if (endo3medicalHxCheckbox.checked) {
                        text.push('\n');
                        text.push(`Medical Hx ${endo3hxDropdown.value}`);
                        text.push('\n');
                    }


                    if (ptendo4Checkbox.checked) {
                        const endo4A1TextInputValue = endo4A1TextInput.value;
                        const endo4presentationText = `Pt. presented to ${endo4yearDropdown.value} ${endo4clinicDropdown.value} ${endo4codeDropdown.value} for ${endo4typeDropdown.value}`;

                        if (endo4A1TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`${endo4presentationText} ${endo4A1TextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push(endo4presentationText);
                        }
                    }
                    if (endo4c3sCheckbox.checked) {
                        const endo4c3sTextInputValue = endo4c3sTextInput.value;
                        if (endo4c3sTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`3C’s confirmed - ${endo4c3sTextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push('3C’s confirmed');
                        }
                    }

                    if (endo4colgateCheckbox.checked) {
                        text.push('\n');
                        text.push('Colgate 1.5% Hydrogen Peroxide Mouth rinse given.');
                    }
                    if (endo4medicalHxCheckbox.checked) {
                        text.push('\n');
                        text.push(`Medical Hx ${endo4hxDropdown.value}`);
                        text.push('\n');
                    }


                    //Crown Intro

                    if (ptcrown2Checkbox.checked) {
                        const crown2A1TextInputValue = crown2A1TextInput.value;
                        const crown2presentationText = `Pt. presented to ${crown2yearDropdown.value} ${crown2clinicDropdown.value} ${crown2codeDropdown.value} for ${crown2typeDropdown.value}`;

                        if (crown2A1TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`${crown2presentationText} ${crown2A1TextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push(crown2presentationText);
                        }
                    }
                    if (crown2c3sCheckbox.checked) {
                        const crown2c3sTextInputValue = crown2c3sTextInput.value;
                        if (crown2c3sTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`3C’s confirmed - ${crown2c3sTextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push('3C’s confirmed');
                        }
                    }

                    if (crown2colgateCheckbox.checked) {
                        text.push('\n');
                        text.push('Colgate 1.5% Hydrogen Peroxide Mouth rinse given.');
                    }
                    if (crown2medicalHxCheckbox.checked) {
                        text.push('\n');
                        text.push(`Medical Hx ${crown2hxDropdown.value}`);
                        text.push('\n');
                    }


                    if (ptcrown3Checkbox.checked) {
                        const crown3A1TextInputValue = crown3A1TextInput.value;
                        const crown3presentationText = `Pt. presented to ${crown3yearDropdown.value} ${crown3clinicDropdown.value} ${crown3codeDropdown.value} for ${crown3typeDropdown.value}`;

                        if (crown3A1TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`${crown3presentationText} ${crown3A1TextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push(crown3presentationText);
                        }
                    }
                    if (crown3c3sCheckbox.checked) {
                        const crown3c3sTextInputValue = crown3c3sTextInput.value;
                        if (crown3c3sTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`3C’s confirmed - ${crown3c3sTextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push('3C’s confirmed');
                        }
                    }

                    if (crown3colgateCheckbox.checked) {
                        text.push('\n');
                        text.push('Colgate 1.5% Hydrogen Peroxide Mouth rinse given.');
                    }
                    if (crown3medicalHxCheckbox.checked) {
                        text.push('\n');
                        text.push(`Medical Hx ${crown3hxDropdown.value}`);
                        text.push('\n');
                    }

                    // OR INtro

                    if (ptsurg1Checkbox.checked) {
                        const surg1A1TextInputValue = surg1A1TextInput.value;
                        const surg1presentationText = `Pt. presented to ${surg1yearDropdown.value} ${surg1clinicDropdown.value} ${surg1codeDropdown.value} for ${surg1typeDropdown.value}`;

                        if (surg1A1TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`${surg1presentationText} ${surg1A1TextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push(surg1presentationText);
                        }
                    }
                    if (surg1c3sCheckbox.checked) {
                        const surg1c3sTextInputValue = surg1c3sTextInput.value;
                        if (surg1c3sTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`3C’s confirmed - ${surg1c3sTextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push('3C’s confirmed');
                        }
                    }

                    if (surg1colgateCheckbox.checked) {
                        text.push('\n');
                        text.push('Colgate 1.5% Hydrogen Peroxide Mouth rinse given.');
                    }
                    if (surg1medicalHxCheckbox.checked) {
                        text.push('\n');
                        text.push(`Medical Hx ${surg1hxDropdown.value}`);
                        text.push('\n');
                    }


                    if (ptcrown4Checkbox.checked) {
                        const crown4A1TextInputValue = crown4A1TextInput.value;
                        const crown4presentationText = `Pt. presented to ${crown4yearDropdown.value} ${crown4clinicDropdown.value} ${crown4codeDropdown.value} for ${crown4typeDropdown.value}`;

                        if (crown4A1TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`${crown4presentationText} ${crown4A1TextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push(crown4presentationText);
                        }
                    }
                    if (crown4c3sCheckbox.checked) {
                        const crown4c3sTextInputValue = crown4c3sTextInput.value;
                        if (crown4c3sTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`3C’s confirmed - ${crown4c3sTextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push('3C’s confirmed');
                        }
                    }

                    if (crown4colgateCheckbox.checked) {
                        text.push('\n');
                        text.push('Colgate 1.5% Hydrogen Peroxide Mouth rinse given.');
                    }
                    if (crown4medicalHxCheckbox.checked) {
                        text.push('\n');
                        text.push(`Medical Hx ${crown4hxDropdown.value}`);
                        text.push('\n');
                    }

                    if (ptcrown1Checkbox.checked) {
                        const crown1A1TextInputValue = crown1A1TextInput.value;
                        const crown1presentationText = `Pt. presented to ${crown1yearDropdown.value} ${crown1clinicDropdown.value} ${crown1codeDropdown.value} for ${crown1typeDropdown.value}`;

                        if (crown1A1TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`${crown1presentationText} ${crown1A1TextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push(crown1presentationText);
                        }
                    }
                    if (crown1c3sCheckbox.checked) {
                        const crown1c3sTextInputValue = crown1c3sTextInput.value;
                        if (crown1c3sTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`3C’s confirmed - ${crown1c3sTextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push('3C’s confirmed');
                        }
                    }

                    if (crown1colgateCheckbox.checked) {
                        text.push('\n');
                        text.push('Colgate 1.5% Hydrogen Peroxide Mouth rinse given.');
                    }
                    if (crown1medicalHxCheckbox.checked) {
                        text.push('\n');
                        text.push(`Medical Hx ${crown1hxDropdown.value}`);
                        text.push('\n');
                    }

                    // Perio Intro

                    if (ptperio1Checkbox.checked) {
                        const perio1A1TextInputValue = perio1A1TextInput.value;
                        const perio1presentationText = `Pt. presented to ${perio1yearDropdown.value} ${perio1clinicDropdown.value} ${perio1codeDropdown.value} for ${perio1typeDropdown.value}`;

                        if (perio1A1TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`${perio1presentationText} ${perio1A1TextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push(perio1presentationText);
                        }
                    }
                    if (perio1c3sCheckbox.checked) {
                        const perio1c3sTextInputValue = perio1c3sTextInput.value;
                        if (perio1c3sTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`3C’s confirmed - ${perio1c3sTextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push('3C’s confirmed');
                        }
                    }

                    if (perio1colgateCheckbox.checked) {
                        text.push('\n');
                        text.push('Colgate 1.5% Hydrogen Peroxide Mouth rinse given.');
                    }
                    if (perio1medicalHxCheckbox.checked) {
                        text.push('\n');
                        text.push(`Medical Hx ${perio1hxDropdown.value}`);
                        text.push('\n');
                    }


                    if (ptperio2Checkbox.checked) {
                        const perio2A1TextInputValue = perio2A1TextInput.value;
                        const perio2presentationText = `Pt. presented to ${perio2yearDropdown.value} ${perio2clinicDropdown.value} ${perio2codeDropdown.value} for ${perio2typeDropdown.value}`;

                        if (perio2A1TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`${perio2presentationText} ${perio2A1TextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push(perio2presentationText);
                        }
                    }
                    if (perio2c3sCheckbox.checked) {
                        const perio2c3sTextInputValue = perio2c3sTextInput.value;
                        if (perio2c3sTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`3C’s confirmed - ${perio2c3sTextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push('3C’s confirmed');
                        }
                    }

                    if (perio2colgateCheckbox.checked) {
                        text.push('\n');
                        text.push('Colgate 1.5% Hydrogen Peroxide Mouth rinse given.');
                    }
                    if (perio2medicalHxCheckbox.checked) {
                        text.push('\n');
                        text.push(`Medical Hx ${perio2hxDropdown.value}`);
                        text.push('\n');
                    }


                    //Resto Intro

                    if (ptresto1Checkbox.checked) {
                        const resto1A1TextInputValue = resto1A1TextInput.value;
                        const resto1presentationText = `Pt. presented to ${resto1yearDropdown.value} ${resto1clinicDropdown.value} ${resto1codeDropdown.value} for ${resto1typeDropdown.value}`;

                        if (resto1A1TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`${resto1presentationText} ${resto1A1TextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push(resto1presentationText);
                        }
                    }
                    if (resto1c3sCheckbox.checked) {
                        const resto1c3sTextInputValue = resto1c3sTextInput.value;
                        if (resto1c3sTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`3C’s confirmed - ${resto1c3sTextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push('3C’s confirmed');
                        }
                    }

                    if (resto1colgateCheckbox.checked) {
                        text.push('\n');
                        text.push('Colgate 1.5% Hydrogen Peroxide Mouth rinse given.');
                    }
                    if (resto1medicalHxCheckbox.checked) {
                        text.push('\n');
                        text.push(`Medical Hx ${resto1hxDropdown.value}`);
                        text.push('\n');
                    }


                    // S/C Intro


                    if (ptsc1Checkbox.checked) {
                        const sc1A1TextInputValue = sc1A1TextInput.value;
                        const sc1presentationText = `Pt. presented to ${sc1yearDropdown.value} ${sc1clinicDropdown.value} ${sc1codeDropdown.value} for ${sc1typeDropdown.value}`;

                        if (sc1A1TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`${sc1presentationText} ${sc1A1TextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push(sc1presentationText);
                        }
                    }
                    if (sc1c3sCheckbox.checked) {
                        const sc1c3sTextInputValue = sc1c3sTextInput.value;
                        if (sc1c3sTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`3C’s confirmed - ${sc1c3sTextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push('3C’s confirmed');
                        }
                    }

                    if (sc1colgateCheckbox.checked) {
                        text.push('\n');
                        text.push('Colgate 1.5% Hydrogen Peroxide Mouth rinse given.');
                    }
                    if (sc1medicalHxCheckbox.checked) {
                        text.push('\n');
                        text.push(`Medical Hx ${sc1hxDropdown.value}`);
                        text.push('\n');
                    }


                    text.push('\n');
                    text.push(`${generatedText2.value}`);


                    // 011 Body
                    if (B1Checkbox.checked) {
                        const B1TextInputValue = B1TextInput.value;
                        if (B1TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`RFV: ${B1TextInputValue}`);
                        } else {
                            text.push('');
                        }
                    }


                    if (B2Checkbox.checked) {
                        const B2TextInputValue = B2TextInput.value;
                        if (B2TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`CC: ${B2TextInputValue}`);
                            text.push('\n');
                        } else {
                            text.push('');

                        }
                    }

                    if (B30Checkbox.checked) {
                        const B30TextInputValue = B30TextInput.value;
                        if (B30TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push('Hx of Present Complaint');
                            text.push('\n');
                            text.push(`Site: ${B30TextInputValue}`);
                        } else {
                            text.push('');
                        }
                    }
                    if (B31Checkbox.checked) {
                        const B31TextInputValue = B31TextInput.value;
                        if (B31TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`Onset: ${B31TextInputValue}`);
                        } else {
                            text.push('');

                        }
                    }
                    if (B32Checkbox.checked) {
                        const B32TextInputValue = B32TextInput.value;
                        if (B32TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`Character: ${B32TextInputValue}`);
                        } else {
                            text.push('');
                        }
                    }
                    if (B33Checkbox.checked) {
                        const B33TextInputValue = B33TextInput.value;
                        if (B33TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`Radiation: ${B33TextInputValue}`);
                        } else {
                            text.push('');
                        }
                    }
                    if (B34Checkbox.checked) {
                        const B34TextInputValue = B34TextInput.value;
                        if (B34TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`Alleviating Factors: ${B34TextInputValue}`);
                        } else {
                            text.push('');
                        }
                    }
                    if (B35Checkbox.checked) {
                        const B35TextInputValue = B35TextInput.value;
                        if (B35TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`Exacerbating factors: ${B35TextInputValue}`);
                        } else {
                            text.push('');
                        }
                    }
                    if (B36Checkbox.checked) {
                        const B36TextInputValue = B36TextInput.value;
                        if (B36TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`Severity: ${B36TextInputValue}`);
                            text.push('\n');
                        } else {
                            text.push('');
                        }
                    }

                    if (B3Checkbox.checked) {
                        text.push('\n\n');
                        text.push('E/O examination: ');
                    }
                    if (B4Checkbox.checked) {
                        text.push('Temporalis m.');
                    }
                    if (B5Checkbox.checked) {
                        text.push(', masseter m.');
                    }
                    if (B6Checkbox.checked) {
                        text.push(', TMJ');
                    }
                    if (B7Checkbox.checked) {
                        text.push(', salivary glands');
                    }
                    if (B8Checkbox.checked) {
                        text.push(', lymph nodes');
                    }
                    if (B9Checkbox.checked) {
                        text.push(', muscles of facial expression');
                    }
                    if (B10Checkbox.checked) {
                        text.push('- NAD.');
                    }

                    if (B13Checkbox.checked) {
                        text.push('\n');
                        text.push('I/OE: ');
                    }
                    if (B14Checkbox.checked) {
                        text.push('FOM');
                    }
                    if (B15Checkbox.checked) {
                        text.push(', tongue');
                    }
                    if (B16Checkbox.checked) {
                        text.push(', buccal mucosa');
                    }
                    if (B17Checkbox.checked) {
                        text.push(', Palatal Mucosa');
                    }
                    if (B117Checkbox.checked) {
                        text.push('- NAD.');
                        text.push('\n');
                    }


                    if (htpsrCheckbox.checked) {
                        text.push('\n');
                        text.push('Hard tissue & PSR – as charted in ISOH.');
                    }
                    if (radioCheckbox.checked) {
                        text.push('\n');
                        text.push(`${radioDropdown.value}`);
                    }

                    if (B18CCheckbox.checked) {
                        const B18CTextInputValue = B18CTextInput.value;
                        if (B18CTextInputValue.trim() !== '') {
                            text.push('\n\n');
                            text.push('Main Findings:');
                            text.push(`${B18CTextInputValue}`);

                        } else {
                            text.push('');


                        }
                    }

                    if (BW1Checkbox.checked) {
                        const BW1TextInputValue = BW1TextInput.value;
                        if (BW1TextInputValue.trim() !== '') {
                            text.push('\n\n');
                            text.push('BW taken:');
                            text.push('\n');
                            text.push('Interproximal caries:');
                            text.push(`${BW1TextInputValue}`);

                        } else {
                            text.push('');
                        }
                    }

                    if (BW2Checkbox.checked) {
                        const BW2TextInputValue = BW2TextInput.value;
                        if (BW2TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push('Occlusal caries:');
                            text.push(`${BW2TextInputValue}`);

                        } else {
                            text.push('');
                        }
                    }
                    if (BW3Checkbox.checked) {
                        const BW3TextInputValue = BW3TextInput.value;
                        if (BW3TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push('Secondary caries:');
                            text.push(`${BW3TextInputValue}`);

                        } else {
                            text.push('');
                        }
                    }
                    if (BW4Checkbox.checked) {
                        const BW4TextInputValue = BW4TextInput.value;
                        if (BW4TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push('Bone level: ');
                            text.push(`${BW4TextInputValue}`);

                        } else {
                            text.push('');
                        }
                    }

                    if (BW5Checkbox.checked) {
                        const BW5TextInputValue = BW5TextInput.value;
                        if (BW5TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push('Calculus: ');
                            text.push(`${BW5TextInputValue}`);

                        } else {
                            text.push('');
                        }
                    }

                    if (BW6Checkbox.checked) {
                        const BW6TextInputValue = BW6TextInput.value;
                        if (BW6TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push('Restoration:');
                            text.push(`${BW6TextInputValue}`);

                        } else {
                            text.push('');
                        }
                    }


                    if (opg1Checkbox.checked) {
                        const opg1TextInputValue = opg1TextInput.value;
                        if (opg1TextInputValue.trim() !== '') {
                            text.push('\n\n');
                            text.push('OPG taken');
                            text.push('\n');
                            text.push('Missing teeth:');
                            text.push(`${opg1TextInputValue}`);

                        } else {
                            text.push('');
                        }
                    }

                    if (opg2Checkbox.checked) {
                        const opg2TextInputValue = opg2TextInput.value;
                        if (opg2TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push('8’s:');
                            text.push(`${opg2TextInputValue}`);

                        } else {
                            text.push('');
                        }
                    }
                    if (opg3Checkbox.checked) {
                        const opg3TextInputValue = opg3TextInput.value;
                        if (opg3TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push('Caries: ');
                            text.push(`${opg3TextInputValue}`);

                        } else {
                            text.push('');
                        }
                    }
                    if (opg4Checkbox.checked) {
                        const opg4TextInputValue = opg4TextInput.value;
                        if (opg4TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push('Restoration/dental work: ');
                            text.push(`${opg4TextInputValue}`);

                        } else {
                            text.push('');
                        }
                    }

                    if (opg5Checkbox.checked) {
                        const opg5TextInputValue = opg5TextInput.value;
                        if (opg5TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push('Bone level: ');
                            text.push(`${opg5TextInputValue}`);

                        } else {
                            text.push('');
                        }
                    }

                    if (opg6Checkbox.checked) {
                        const opg6TextInputValue = opg6TextInput.value;
                        if (opg6TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push('Mx sinus: ');
                            text.push(`${opg6TextInputValue}`);

                        } else {
                            text.push('');
                        }
                    }
                    if (opg7Checkbox.checked) {
                        const opg7TextInputValue = opg7TextInput.value;
                        if (opg7TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push('Condyles: ');
                            text.push(`${opg7TextInputValue}`);

                        } else {
                            text.push('');
                        }
                    }

                    if (opg8Checkbox.checked) {
                        const opg8TextInputValue = opg8TextInput.value;
                        if (opg8TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push('Ghost images: ');
                            text.push(`${opg8TextInputValue}`);

                        } else {
                            text.push('');
                        }
                    }


                    if (B18Checkbox.checked) {
                        const B18TextInputValue = B18TextInput.value;
                        if (B18TextInputValue.trim() !== '') {
                            text.push('\n\n');
                            text.push('Provisional Tx: ');
                            text.push(`${B18TextInputValue}`);

                        } else {
                            text.push('');


                        }
                    }
                    if (B19Checkbox.checked) {
                        const B19TextInputValue = B19TextInput.value;
                        if (B19TextInputValue.trim() !== '') {
                            text.push('\n\n');
                            text.push('Tx options discussed and presented to pt:');
                            text.push('\n');
                            text.push(`Systemic Phase: ${B19TextInputValue}`);

                        } else {
                            text.push('');
                        }
                    }

// For B20
                    if (B20Checkbox.checked) {
                        const B20TextInputValue = B20TextInput.value;
                        if (B20TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`Acute Phase: ${B20TextInputValue}`);

                        } else {
                            text.push('');
                        }
                    }


                    if (B21Checkbox.checked) {
                        const B21TextInputValue = B21TextInput.value;
                        if (B21TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`Disease Control: ${B21TextInputValue}`);

                        } else {
                            text.push('');
                        }
                    }

                    if (B22Checkbox.checked) {
                        const B22TextInputValue = B22TextInput.value;
                        if (B22TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`Definitive phase: ${B22TextInputValue}`);

                        } else {
                            text.push('');

                        }
                    }

                    if (B23Checkbox.checked) {
                        const B23TextInputValue = B23TextInput.value;
                        if (B23TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`Maintenance phase: ${B23TextInputValue}`);

                        } else {
                            text.push('');

                        }
                    }


                    if (B24Checkbox.checked) {
                        const B24TextInputValue = B24TextInput.value;
                        if (B24TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`Extra comment: ${B24TextInputValue}`);

                        } else {
                            text.push('');

                        }
                    }


                    if (restoCheckbox.checked) {
                        text.push('\n');
                        text.push('Tooth - required restoration due to decay/NCTL/defective margin');
                    }

                    if (bwCheckbox.checked) {
                        text.push('\n');
                        text.push('BW’s reviewed');

                    }
                    if (xylocaineCheckbox.checked) {
                        text.push('\n\n');
                        text.push(`${laDropdown.value}`);
                    }
                    if (latypeCheckbox.checked) {
                        text.push('\n');
                        text.push(`${anestheticDropdown.value} VIA ${infilDropdown.value}`);
                        text.push('\ n\n');
                    }
                    if (isolationCheckbox.checked) {
                        text.push('\n');
                        text.push(isolationDropdown.value);
                    }
                    if (cavityCheckbox.checked) {
                        text.push('\n\n');
                        text.push(cavityCheckbox.value);

                    }
                    if (C12Checkbox.checked) {
                        text.push('\n');
                        text.push(`${C12Dropdown.value}`);
                    }


                    if (cordCheckbox.checked) {
                        text.push('\n\n');
                        text.push('Retraction Cord size ');
                        text.push(cordDropdown.value);
                        text.push(' placed with hemostat');

                    }
                    if (etchedCheckbox.checked) {
                        text.push('\n\n');
                        text.push(`Etched with 37% phosphoric acid, clearfil primer and bond. Gradia ${gradiaDropdown.value} composite placed and cured.`);
                    }
                    if (C110Checkbox.checked) {
                        text.push('\n\n');
                        text.push(`Dentine conditioned w 10% polyacrylic acid`);
                    }
                    if (C111Checkbox.checked) {
                        text.push('\n');
                        text.push(`Restored with ${GICDropdown.value}`);
                        text.push(`${GICshadeDropdown.value} and cured`);
                    }
                    if (C11Checkbox.checked) {
                        text.push('\n\n');
                        text.push(`Restoration polished, occlusion checked`);
                    }


                    if (consentsCheckbox.checked) {
                        text.push('\n\n');
                        text.push('Pt consents to S/C – informed of risks bleeding, post op sensitivity, natural gaps between teeth');
                    }
                    if (debridementCheckbox.checked) {
                        text.push('\n');
                        text.push('Debridement of all quadrants using ultrasonic scaler');
                    }
                    if (refinementCheckbox.checked) {
                        text.push('\n');
                        text.push('Refinement using hand scalers');
                    }
                    if (prophyCheckbox.checked) {
                        text.push('\n\n');
                        text.push('Prophy and fluoride applied');
                    }
                    if (ohiCheckbox.checked) {
                        text.push('\n\n');
                        text.push('OHI provided');
                    }


                    // Oral surg body


                    if (o1Checkbox3.checked) {
                        const o1TextInput3Value = o1TextInput3.value;
                        if (o1TextInput3Value.trim() !== '') {
                            text.push('\n');
                            text.push(`Tooth of interest: ${o1TextInput3Value}`);
                            text.push('\n');
                        } else {
                            text.push('');
                        }
                    }

                    if (o1Checkbox3A.checked) {
                        const o1TextInput3AValue = o1TextInput3A.value;
                        if (o1TextInput3AValue.trim() !== '') {
                            text.push('\n');
                            text.push(`RADIOGRAPHIC FINDINGS ${o1TextInput3AValue}`);
                            text.push('\n');
                        } else {
                            text.push('');
                        }
                    }

                    if (o1Checkbox4.checked) {
                        const o1TextInput4Value = o1TextInput4.value;
                        if (o1TextInput4Value.trim() !== '') {
                            text.push('\n');
                            text.push(`CLINICAL EXAMINATION ${o1TextInput4Value}`);
                            text.push('\n');
                        } else {
                            text.push('');
                        }
                    }


                    if (o1Checkbox5.checked) {
                        text.push('\n');
                        text.push(`Pt informed of the risks & complications of the procedure including damage to soft tissue, adjacent teeth, infection, bleeding, swelling, dry socket, numbness & pain. Tooth replacement options discussed & pt understood.`);
                        text.push('\n');
                    }
                    if (OA11Checkbox.checked) {
                        text.push('\n\n');
                        text.push(`${OA11Dropdown.value}`);
                    }


                    if (OA12Checkbox.checked) {
                        text.push('\n');
                        text.push('Anesthetic Used');
                        text.push(`: ${OA12Dropdown.value} VIA ${OA12InfilDropdown.value}`);
                    }


                    if (o1Checkbox6.checked) {
                        text.push('\n');
                        text.push(`Luxators, elevators, forceps used to decuff & deliver the tooth.`);
                        text.push('\n');
                    }

                    if (o1Checkbox7.checked) {
                        text.push('\n');
                        text.push(`Tooth & socket inspected for fragments. Nil root fragments. Socket compressed immediately.`);
                        text.push('\n');
                    }

                    if (o1Checkbox8.checked) {
                        text.push('\n');
                        text.push(`Haemostasis achieved (HA) w/ gauze OR simple interrupted suture w/ 3-0 VR with Gelfoam.`);
                        text.push('\n');
                    }

                    if (o1Checkbox8A.checked) {
                        text.push('\n\n');
                        text.push(`REMAINING TX PLAN`);
                        text.push('\n');
                    }


                    if (o1Checkbox10.checked) {
                        text.push('\n');
                        text.push(`POIG (regarding numbness, pain, swelling, bleeding, infection) & gauze packs w/ instruction on usage provided.`);
                        text.push('\n');
                    }


                    //Crown Consult


                    if (J1Checkbox.checked) {
                        const J1TextInputValue = J1TextInput.value;
                        if (J1TextInputValue.trim() !== '') {
                            text.push('\n\n');
                            text.push(' DENTAL & SOCIAL HX ');
                            text.push('\n');
                            text.push(`Brushing freq, TB & TP: ${J1TextInputValue}`);
                        } else {
                            text.push('');
                        }
                    }

// Checkbox J2
                    if (J2Checkbox.checked) {
                        const J2TextInputValue = J2TextInput.value;
                        if (J2TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`Interdental cleaning/mouthwash: ${J2TextInputValue}`);
                        } else {
                            text.push('');
                        }
                    }

// Checkbox J3
                    if (J3Checkbox.checked) {
                        const J3TextInputValue = J3TextInput.value;
                        if (J3TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`Tobacco or alcohol consumption: ${J3TextInputValue}`);
                        } else {
                            text.push('');
                        }
                    }

// Checkbox J4
                    if (J4Checkbox.checked) {
                        const J4TextInputValue = J4TextInput.value;
                        if (J4TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`Snacks/sugary drinks (freq. & timing): ${J4TextInputValue}`);
                        } else {
                            text.push('');
                        }
                    }

// Checkbox J5
                    if (J5Checkbox.checked) {
                        const J5TextInputValue = J5TextInput.value;
                        if (J5TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`Risk factors related to occupation/interests: ${J5TextInputValue}`);
                        } else {
                            text.push('');
                        }
                    }
// PATIENT EXPECTATION
                    if (J6Checkbox.checked) {
                        text.push('\n\n');
                        text.push(' PATIENT EXPECTATION:  ' + document.getElementById('J6Dropdown').value + ' ' + document.getElementById('J6TextInput').value);

                    }

// AESTHETIC EVALUATION


// J7
                    if (J7Checkbox.checked) {
                        text.push('Smile line exposing cervical area of teeth: ' + document.getElementById('J7Dropdown').value);
                        text.push('\n');
                    }

// J8
                    if (J8Checkbox.checked) {
                        text.push('Incisal plane canting (slant): ' + document.getElementById('J8Dropdown').value);
                        text.push('\n\n');
                    }

// I/O EXAMINATION


// J9

// J10
                    if (J10Checkbox.checked) {
                        text.push('Furcation involvement: ' + document.getElementById('J10Dropdown').value);
                        text.push('\n');
                    }

// J11
                    if (J11Checkbox.checked) {
                        text.push('Working side contacts: ' + document.getElementById('J11Dropdown').value + ' ' + document.getElementById('J11TextInput').value);
                        text.push('\n');
                    }

// J12
                    if (J12Checkbox.checked) {
                        text.push('Anterior guidance: ' + document.getElementById('J12Dropdown').value + ' ' + document.getElementById('J12TextInput').value);
                        text.push('\n');
                    }

// J13
                    if (J13Checkbox.checked) {
                        text.push('Parafuction: ' + document.getElementById('J13Dropdown').value + ' ' + document.getElementById('J13TextInput').value);
                        text.push('\n');
                    }

// J14
                    if (J14Checkbox.checked) {
                        text.push('Opposing teeth: ' + document.getElementById('J14Dropdown').value + ' ' + document.getElementById('J14TextInput').value);
                        text.push('\n');
                    }

// J15
                    if (J15Checkbox.checked) {
                        text.push('OVD: ' + document.getElementById('J15Dropdown').value + ' ' + document.getElementById('J15TextInput').value);
                        text.push('\n\n');
                    }

// J16, J17


// J18 - J25

                    if (J21Checkbox.checked) {
                        text.push('Ferrule height: ' + document.getElementById('J21TextInput').value);
                        text.push('\n');
                    }


                    if (J23Checkbox.checked) {
                        text.push('Radiographic findings: ' + document.getElementById('J23TextInput').value);
                        text.push('\n');
                    }

                    if (J24Checkbox.checked) {
                        text.push('Pulp vitality (cold/ EPT): ' + document.getElementById('J24TextInput').value);
                        text.push('\n');
                    }

                    if (J25Checkbox.checked) {
                        text.push('Dx: ' + document.getElementById('J25TextInput').value);
                        text.push('\n\n');
                    }


                    if (J34BCheckbox.checked) {
                        text.push('Patient informed that tooth ___ has compromised tooth structure & requires protective measure from occluding forces. Warned risk of further fracturing, bacterial leakage requiring RCT & risk of complete fracture warranting extraction. Advised that direct restoration may be inadequate to withstand cusps & that cuspal coverage (in the form of crown, onlay or overlay depending on the extent of defect) may be ideal. Explained the multiple visits involved & what happens at each stage. Pt understood & happy to move forward with tx. Informed consent obtained.');
                        text.push('\n');
                    }


// J38 - J43
                    if (J38Checkbox.checked) {
                        text.push('Coverage: ' + document.getElementById('J38Dropdown').value);
                        text.push('\n');
                    }

                    if (J39Checkbox.checked) {
                        text.push('Material: ' + document.getElementById('J39Dropdown').value);
                        text.push('\n');
                    }

                    if (J40Checkbox.checked) {
                        text.push('FDP: ' + document.getElementById('J40Dropdown').value);
                        text.push('\n');
                    }

                    if (J41Checkbox.checked) {
                        text.push('Pontic design: ' + document.getElementById('J41Dropdown').value);
                        text.push('\n');
                    }

                    if (J43Checkbox.checked) {
                        text.push('Occlusal surface material: ' + document.getElementById('J43Dropdown').value);

                    }


// J44
                    if (J44Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Max & mand alginate primary impression taken. Impression checked for quality, sterilized & bagged. Lab card with instructions for construction of diagnostic models & custom tray for PVS impression of tooth ___ written, scanned & sent to the lab.');

                    }

// The 'text' array now contains the generated text based on the checked checkboxes and input values


                    // Crown Prep
                    //
// J50
                    if (J50Checkbox.checked) {
                        text.push('\n\n');
                        text.push(' LAB WORK ');
                        text.push('\n\n');
                    }

// J51
                    if (J51Checkbox.checked) {
                        text.push('Study model poured up & special tray fabricated.');
                        text.push('\n\n');
                    }

// J52
                    if (J52Checkbox.checked) {
                        text.push('Diagnostic wax up done & putty keys made.');
                        text.push('\n\n');
                    }

// J53
                    if (J53Checkbox.checked) {
                        text.push('Crown material chosen: ' + document.getElementById('J53Dropdown').value);
                        text.push('\n');
                    }

// J54
                    if (J54Checkbox.checked) {
                        text.push('Shade selected: ' + document.getElementById('J54ATextInput').value + ' VITA 3D Master (for PFM) / ' + document.getElementById('J54BTextInput').value + ' VITA Classic');
                        text.push('\n\n');
                    }


                    if (J60Checkbox.checked) {
                        text.push('All existing restorative materials removed. NIL pulp exposure. Foundation restoration required/ not required to establish resistance form / block out undercuts.');
                        text.push('\n\n');
                    }


                    if (J61Checkbox.checked) {
                        text.push('Crown preparation completed using H/S & refined-polished using S/S coarse soflex disc.');
                        text.push('\n\n');
                    }

// J62
                    if (J62Checkbox.checked) {
                        text.push('Gingival retraction is achieved using retraction cord.');
                        text.push('\n');
                    }

// J63
                    if (J63Checkbox.checked) {
                        text.push('Vaseline was used to lubricate the completed crown preparation & adjacent structures.');
                        text.push('\n\n');
                    }

// J64
                    if (J64Checkbox.checked) {
                        text.push('Provisional restoration is constructed using Structure 2 (flowable composite used to refine deficient margins) & finished & polish using H/S & S/S.');
                        text.push('\n');
                    }

// J65
                    if (J65Checkbox.checked) {
                        text.push('Interproximal contact checked w/ floss. Occlusion checked w/ articulating paper & adjusted accordingly.');
                        text.push('\n');
                    }

// J66
                    if (J66Checkbox.checked) {
                        text.push('Crown preparation surface is cleaned thoroughly using Endodry & provisional restoration is cemented using Temp-Bond NE. Excess cement is removed using probe & floss.');
                        text.push('\n\n');
                    }

// REMAINING TX PLAN


// J67
                    if (J67Checkbox.checked) {
                        text.push('REMAINING TX PLAN');
                        text.push('\n');
                        text.push('Secondary impression');
                        text.push('\n');
                    }

// J68
                    if (J68Checkbox.checked) {
                        text.push('Crown insertion');
                        text.push('\n\n');
                    }

// POST OP


// J69
                    if (J69Checkbox.checked) {
                        text.push('POIG. Tooth may be sensitive for the next few days after tx (recommend Panadol/Nurofen if necessary); Cautioned against consuming hot food/drinks until the LA wears off due to numb lip & cheek/lip biting.');
                        text.push('\n\n');
                    }

// The 'text' array now contains the generated text based on the checked checkboxes


                    //Crown Impression Body
                    // Assuming you have a 'text' array to store the results

// J80
                    if (J80Checkbox.checked) {
                        text.push('\n');
                        text.push('Existing temporary crown restoration removed using flat plastic &/or spoon excavator. Existing cement materials removed using U/S at low frequency.');
                    }

// J81
                    if (J81Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Gingival retraction achieved using two-cord technique with Ultrapak #0 cord followed by Ultrapk #1 cord (infil with articaine w/ adrenaline to reduce bleeding if retraction cord w/ hemodent is insufficient)');
                    }

// J82
                    if (J82Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Crown preparation margins refined using H/S.');
                    }

// J83
                    if (J83Checkbox.checked) {
                        text.push('\n');
                        text.push('Crown prep surface was ensured moisture-free with Endodry using cotton pellets');
                    }

// J84
                    if (J84Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Crown impression taken with one-step impression technique using light body & heavy body PVS.');
                    }

// J85
                    if (J85Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Secondary impression checked for quality, sterilized & bagged. Lab card with instructions for construction of model & fixed prosthesis in selected shade written, scanned & sent to the lab.');
                    }

// J86
                    if (J86Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Temporary crown recemented. Margins assessed.');
                    }

// J87
                    if (J87Checkbox.checked) {
                        text.push('\n\n');
                        text.push(' REMAINING TX PLAN ');
                        text.push('\n');
                        text.push('Crown insertion');
                    }

// J88
                    if (J88Checkbox.checked) {
                        text.push('\n\n');
                        text.push(' POST OP ');
                        text.push('\n');
                        text.push('POIG. Tooth may be sensitive for the next few days after tx (recommend Panadol/Nurofen if necessary); Cautioned against consuming hot food/drinks until the LA wears off due to numb lip & cheek/lip biting.');
                    }

// The 'text' array now contains the generated text based on the checked checkboxes


                    // Crown Insert Body
                    // Assuming you have a 'text' array to store the results

// J93
                    if (J93Checkbox.checked) {
                        text.push('\n');
                        text.push(' TX DELIVERED ');
                    }

// J94
                    if (J99Checkbox.checked) {
                        text.push('\n');
                        text.push('Existing temporary crown restoration removed using spoon excavator. Existing cement materials removed using U/S at low frequency & use of pumice on S/S.');
                    }

// J100
                    if (J100Checkbox.checked) {
                        text.push('\n');
                        text.push('Gingival retraction achieved using retraction cord.');
                    }

// J101
                    if (J101Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Fixed prosthesis trial seated & assessed for marginal adaptation using sickle probe, interproximal contacts using floss, MIP using Shimstock, lateral/protrusive slide patterns, shade & shape.');
                    }

// J102
                    if (J102Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Tooth preparation was cleaned using prophy with a mixture of flour pumice & water.');
                    }

// J103
                    if (J103Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Fixed prosthesis is cemented using resin-modified GIC (capsulated GC Fuji Plus) & held in place while excess cement is removed at the rubbery stage.');
                    }

// J104
                    if (J104Checkbox.checked) {
                        text.push('\n');
                        text.push('Isolation is maintained for at least 5mins to allow complete set before rinse.');
                    }

// J105
                    if (J105Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Occlusion post-insertion is reassessed with the patient in the upright position.');
                    }

// J106
                    if (J106Checkbox.checked) {
                        text.push('\n\n');
                        text.push(' REMAINING TX PLAN ');
                        text.push('\n');
                        text.push('Fixed prosthesis review in 4/52.');
                    }

// J107
                    if (J107Checkbox.checked) {
                        text.push('\n\n');
                        text.push(' POST OP ');
                        text.push('\n');
                        text.push('POIG. Tooth may be sensitive for the next few days & while already adjusted for, minor discrepancy may still be felt but should resolve over the next few days. Gums may be a bit tender but cont. to brush gently using a soft TB; Rinsing w/ warm saltwater may help to reduce pain. Recommended Panadol/Nurofen if necessary. Reinforced care for fixed prosthesis i.e. OHI & encourage 6-monthly maintenance. Cautioned against consuming hot food/drinks until the LA wears off due to numb lip & lip biting.');
                    }

// The 'text' array now contains the generated text based on the checked checkboxes


                    //Endo Consult Body


                    if (E1Checkbox.checked) {
                        text.push('\n\n');
                        text.push('CLINICAL FINDINGS');
                    }

                    if (E1ACheckbox.checked) {

                        text.push('\n');
                        text.push(`Discoloration: ${E1ADropdown.value}`);

                    }
                    if (E1BCheckbox.checked) {
                        text.push('\n');
                        text.push(`Swelling: ${E1BDropdown.value}`);
                    }
                    if (E1CCheckbox.checked) {
                        text.push('\n');
                        text.push(`Sinus tract: ${E1CDropdown.value}`);
                        text.push('\n');
                    }


                    if (E2Checkbox.checked) {

                        text.push('\n\n');
                        text.push(`PA radiograph taken. RADIOGRAPHIC EXAMINATION`);

                    }

                    if (E3Checkbox.checked) {
                        const E3TextInputValue = E3TextInput.value;
                        if (E3TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push('Carious w/wo exposure ');
                            text.push(`${E3TextInputValue}`);

                        } else {
                            text.push('');

                        }
                    }
                    if (E4Checkbox.checked) {
                        const E4TextInputValue = E4TextInput.value;
                        if (E4TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push('Restored ');
                            text.push(`${E4TextInputValue}`);

                        } else {
                            text.push('');

                        }
                    }
                    if (E5Checkbox.checked) {
                        const E5TextInputValue = E5TextInput.value;
                        if (E5TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push('Pulp capping ');
                            text.push(`${E5TextInputValue}`);

                        } else {
                            text.push('');
                        }
                    }

                    if (E7Checkbox.checked) {
                        const E7TextInputValue = E7TextInput.value;
                        if (E7TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push('Hx of trauma ');
                            text.push(`${E7TextInputValue}`);

                        } else {
                            text.push('');

                        }
                    }

                    if (E8Checkbox.checked) {
                        const E8TextInputValue = E8TextInput.value;
                        if (E8TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push('Previous pulpotomy ');
                            text.push(`${E8TextInputValue}`);

                        } else {
                            text.push('');

                        }
                    }
                    if (E9Checkbox.checked) {
                        const E9TextInputValue = E9TextInput.value;
                        if (E9TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push('Previously root treated ');
                            text.push(`${E9TextInputValue}`);

                        } else {
                            text.push('');

                        }
                    }

                    if (E10Checkbox.checked) {
                        text.push('\n\n');
                        text.push(`PULP SENSIBILITY TESTS performed.`);
                    }


                    if (E11Checkbox.checked) {
                        const E11TextInputValue = E11TextInput.value;
                        const E11BTextInputValue = E11BTextInput.value;
                        const E11CTextInputValue = E11CTextInput.value;
                        if (E11BTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`Cold:`);
                            text.push(` ${E11TextInputValue}`);
                            text.push(` ${E11Dropdown.value}`);
                            text.push(`, ${E11BTextInputValue}`);
                            text.push(` ${E11BDropdown.value}`);
                        } else {
                            text.push('\n');
                            text.push(`Cold:`);
                            text.push(` ${E11TextInputValue}`);
                            text.push(` ${E11Dropdown.value}`);

                        }
                        if (E11CTextInputValue.trim() !== '') {
                            text.push(`, ${E11CTextInputValue}`);
                            text.push(` ${E11CDropdown.value}`);
                        } else {
                            text.push('');


                        }
                    }


                    if (E12Checkbox.checked) {
                        const E11TextInputValue = E11TextInput.value;
                        const E11BTextInputValue = E11BTextInput.value;
                        const E11CTextInputValue = E11CTextInput.value;
                        if (E11BTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`EPT:`);
                            text.push(` ${E11TextInputValue}`);
                            text.push(` ${E12Dropdown.value}`);
                            text.push(`, ${E11BTextInputValue}`);
                            text.push(` ${E12BDropdown.value}`);
                        } else {
                            text.push('\n');
                            text.push(`EPT:`);
                            text.push(` ${E11TextInputValue}`);
                            text.push(` ${E12Dropdown.value}`);

                        }
                        if (E11CTextInputValue.trim() !== '') {
                            text.push(`, ${E11CTextInputValue}`);
                            text.push(` ${E12CDropdown.value}`);
                        } else {
                            text.push('');


                        }
                    }

                    if (E13Checkbox.checked) {
                        const E11TextInputValue = E11TextInput.value;
                        const E11BTextInputValue = E11BTextInput.value;
                        const E11CTextInputValue = E11CTextInput.value;
                        if (E11BTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`Palpation:`);
                            text.push(` ${E11TextInputValue}`);
                            text.push(` ${E13Dropdown.value}`);
                            text.push(`, ${E11BTextInputValue}`);
                            text.push(` ${E13BDropdown.value}`);
                        } else {
                            text.push('\n');
                            text.push(`Palpation:`);
                            text.push(` ${E11TextInputValue}`);
                            text.push(` ${E13Dropdown.value}`);

                        }
                        if (E11CTextInputValue.trim() !== '') {
                            text.push(`, ${E11CTextInputValue}`);
                            text.push(` ${E13CDropdown.value}`);
                        } else {
                            text.push('');


                        }
                    }

                    if (E15Checkbox.checked) {
                        const E11TextInputValue = E11TextInput.value;
                        const E11BTextInputValue = E11BTextInput.value;
                        const E11CTextInputValue = E11CTextInput.value;
                        if (E11BTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`Percussion:`);
                            text.push(` ${E11TextInputValue}`);
                            text.push(` ${E15Dropdown.value}`);
                            text.push(`, ${E11BTextInputValue}`);
                            text.push(` ${E15BDropdown.value}`);
                        } else {
                            text.push('\n');
                            text.push(`Percussion:`);
                            text.push(` ${E11TextInputValue}`);
                            text.push(` ${E15Dropdown.value}`);

                        }
                        if (E11CTextInputValue.trim() !== '') {
                            text.push(`, ${E11CTextInputValue}`);
                            text.push(` ${E15CDropdown.value}`);
                        } else {
                            text.push('');


                        }
                    }


                    if (E16Checkbox.checked) {
                        const E11TextInputValue = E11TextInput.value;
                        const E11BTextInputValue = E11BTextInput.value;
                        const E11CTextInputValue = E11CTextInput.value;
                        if (E11BTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`Mobility:`);
                            text.push(` ${E11TextInputValue}`);
                            text.push(` ${E16Dropdown.value}`);
                            text.push(`, ${E11BTextInputValue}`);
                            text.push(` ${E16BDropdown.value}`);
                        } else {
                            text.push('\n');
                            text.push(`Mobility:`);
                            text.push(` ${E11TextInputValue}`);
                            text.push(` ${E16Dropdown.value}`);

                        }
                        if (E11CTextInputValue.trim() !== '') {
                            text.push(`, ${E11CTextInputValue}`);
                            text.push(` ${E16CDropdown.value}`);
                        } else {
                            text.push('');


                        }
                    }
                    if (E17Checkbox.checked) {
                        const E17TextInputValue = E17TextInput.value;
                        if (E17TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push('Abnormal probing:');
                            text.push(` ${E17TextInputValue}`);
                        }
                    } else {
                        text.push('');

                    }

                    if (E18Checkbox.checked) {
                        text.push('\n\n');
                        text.push(`PULPAL DX: ${E18Dropdown.value}`);
                    }


                    if (E19Checkbox.checked) {
                        text.push('\n');
                        text.push(`PERIAPICAL DX: ${E19Dropdown.value}`);
                    }


                    if (E22Checkbox.checked) {
                        text.push('\n\n');
                        text.push(`Advantages & disadvantages of each Tx option were discussed with patient, written information sheets provided.`);

                    }
                    if (E23Checkbox.checked) {
                        text.push('\n');
                        text.push(`The patient understood the advantages, risks, as well as the cost involved in RCT, including the need for multiple visits, and consented for RCT.`);

                    }
                    if (E24Checkbox.checked) {
                        text.push('\n\n');
                        text.push(`Post-endodontic restorative options discussed:`);

                    }

                    if (E25Checkbox.checked) {
                        {
                            text.push('\n');
                            text.push(`Bonded composite:${E25Dropdown.value}`);

                        }
                    }

                    if (E26Checkbox.checked) {
                        {
                            text.push('\n');
                            text.push(`Crown:${E26Dropdown.value}`);

                        }
                    }


                    if (E27Checkbox.checked) {
                        text.push('\n\n');
                        text.push(`Pt understood that the type of final restoration recommended after RCT will be determined by the amount of tooth structure remaining after removal of existing restoration & caries & that a post may be indicated to retain the core.`);

                    }
                    // Pulpotomy Body


                    if (E40Checkbox.checked) {
                        text.push('\n');
                        text.push('Pt informed of the risks & complications of the procedure & an informed consent for tx was obtained.');
                    }

                    if (E41Checkbox.checked) {
                        text.push('\n\n');
                        text.push(`${E41Dropdown.value}`);
                    }


                    if (E42Checkbox.checked) {
                        text.push('\n');
                        text.push('Anesthetic Used');
                        text.push(`: ${E42Dropdown.value} VIA ${E42InfilDropdown.value}`);
                    }


                    if (E43Checkbox.checked) {
                        text.push('\n');
                        text.push('Isolation');
                        text.push(`: ${E43Dropdown.value}`);
                    }


                    if (E44Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Cavity prepared using HS and SS, previous restoration removed/caries free. Exposed pulp reveals');
                        text.push(`: ${E44Dropdown.value}`);
                    }


                    if (E45Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Pulp amputation was performed using S/S #8 large round bur. Canal orifice(s) were visually inspected to ensure complete removal of the pulp tissue.');
                    }

                    if (E46Checkbox.checked) {
                        text.push('\n');
                        text.push('Disinfection & hemostasis was achieved by compression of sterile cotton pellets soaked in 2% sodium hypochlorite over the pulp stump(s) using gentle pressure for 2-5mins.');
                    }


                    if (E47Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Access cavity is temporized with ');
                        text.push(`${E47ADropdown.value} ${E47BDropdown.value} & ${E47CDropdown.value} `);
                    }

                    if (E48Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Cusps lightly reduced to take tooth out of occlusion for symptomatic relief & decrease risk of cuspal fracture (discussed with pt prior to tx)');
                    }


// Endo Chemo body


                    if (E50Checkbox.checked) {
                        text.push('\n');
                        text.push('Advantages & disadvantages of each Tx option were discussed with patient, written information sheets provided.');
                    }


                    if (E51Checkbox.checked) {
                        text.push('\n');
                        text.push('The patient understood the advantages, risks, as well as the cost involved in RCT, including the need for multiple visits, and consented for RCT.');
                    }


                    if (E53Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Post-endodontic restorative options discussed:');
                        text.push('\n');
                        text.push(`1) Bonded composite`);
                    }


                    if (E54Checkbox.checked) {
                        text.push('\n');
                        text.push(`2) Crown`);
                    }


                    if (E55Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Pt understood that the type of final restoration recommended after RCT will be determined by the amount of tooth structure remaining after removal of existing restoration & caries & that a post may be indicated to retain the core.');
                    }

                    if (E56Checkbox.checked) {
                        text.push('\n\n');
                        text.push(`${E56Dropdown.value}`);
                    }

                    if (E57Checkbox.checked) {
                        text.push('\n');
                        text.push(`Anesthetic Used: ${E57Dropdown.value} VIA ${E57InfilDropdown.value}`);
                    }

                    if (E58Checkbox.checked) {
                        text.push('\n');
                        text.push(`${E58Dropdown.value}`);
                    }

                    if (E59Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Cavity prepared using HS and SS, previous restoration removed/caries free.');
                    }

                    if (E60Checkbox.checked) {
                        text.push('\n');
                        text.push(`${E60Dropdown.value}`);
                    }


                    if (E62Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Pre-endodontic provisional restoration completed using GIC/ composite/ bulk fill flowable composite.');
                    }

                    if (E63Checkbox.checked) {
                        text.push('\n');
                        text.push('Access cavity prepared using H/S & U/S.');
                    }


                    if (E64Checkbox.checked) {
                        text.push('\n\n');
                        text.push(`${E64Dropdown.value} `);
                        text.push(`identified. XA Protaper was used to prepare the coronal 3rd of all canal(s)`);
                    }

                    if (E65Checkbox.checked) {
                        text.push('\n');
                        text.push('EWL estimated using pre-operative radiograph & apex locator. WL radiograph taken & CWL obtained.');
                    }

                    if (E66Checkbox.checked) {
                        text.push('\n\n');
                        text.push(`Proglider was used to prepare glide path in all canal(s). Canal(s) prepared up to Protaper ${E66ProtaperDropdown.value}, irrigated with 4% sodium hypochlorite & recapitulated with size 10 hand files after each instrumentation.`);
                    }

                    if (E67Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Access cavity is temporized with ');
                        text.push(`${E67ADropdown.value} ${E67BDropdown.value} & ${E67CDropdown.value} `);
                    }

                    if (E68Checkbox.checked) {
                        text.push('\n');
                        text.push('Cusps lightly reduced to take tooth out of occlusion for symptomatic relief & decrease risk of cuspal fracture (discussed with pt prior to tx)');
                    }


                    const E69ATextInputValue = E69ATextInput.value;
                    if (E69ATextInputValue.trim() !== '') {
                        text.push('\n\n');
                        text.push('Canal:');
                        text.push(` ${E69ATextInputValue}`);
                    } else {
                        text.push('');

                    }

                    const E70ATextInputValue = E70ATextInput.value;
                    if (E70ATextInputValue.trim() !== '') {
                        text.push('\n');
                        text.push('Ref point:');
                        text.push(` ${E70ATextInputValue}`);
                    } else {
                        text.push('');

                    }

                    const E71ATextInputValue = E71ATextInput.value;
                    if (E71ATextInputValue.trim() !== '') {
                        text.push('\n');
                        text.push('EWL:');
                        text.push(` ${E71ATextInputValue}`);
                    } else {
                        text.push('');

                    }
                    const E72ATextInputValue = E72ATextInput.value;
                    if (E72ATextInputValue.trim() !== '') {
                        text.push('\n');
                        text.push('WLF Size:');
                        text.push(` ${E72ATextInputValue}`);
                    } else {
                        text.push('');

                    }

                    const E73ATextInputValue = E73ATextInput.value;
                    if (E73ATextInputValue.trim() !== '') {
                        text.push('\n');
                        text.push('CWL:');
                        text.push(` ${E73ATextInputValue}`);
                    } else {
                        text.push('');

                    }

                    const E74ATextInputValue = E74ATextInput.value;
                    if (E74ATextInputValue.trim() !== '') {
                        text.push('\n');
                        text.push('Last rotary used:');
                        text.push(` ${E74ATextInputValue}`);
                    } else {
                        text.push('');

                    }

                    const E75ATextInputValue = E75ATextInput.value;
                    if (E75ATextInputValue.trim() !== '') {
                        text.push('\n');
                        text.push('(MC):');
                        text.push(` ${E75ATextInputValue}`);
                    } else {
                        text.push('');

                    }

                    const E69BTextInputValue = E69BTextInput.value;
                    if (E69BTextInputValue.trim() !== '') {
                        text.push('\n\n');
                        text.push('Canal:');
                        text.push(` ${E69BTextInputValue}`);
                    } else {
                        text.push('');

                    }

                    const E70BTextInputValue = E70BTextInput.value;
                    if (E70BTextInputValue.trim() !== '') {
                        text.push('\n');
                        text.push('Ref point:');
                        text.push(` ${E70BTextInputValue}`);
                    } else {
                        text.push('');

                    }

                    const E71BTextInputValue = E71BTextInput.value;
                    if (E71BTextInputValue.trim() !== '') {
                        text.push('\n');
                        text.push('EWL:');
                        text.push(` ${E71BTextInputValue}`);
                    } else {
                        text.push('');

                    }
                    const E72BTextInputValue = E72BTextInput.value;
                    if (E72BTextInputValue.trim() !== '') {
                        text.push('\n');
                        text.push('WLF Size:');
                        text.push(` ${E72BTextInputValue}`);
                    } else {
                        text.push('');

                    }

                    const E73BTextInputValue = E73BTextInput.value;
                    if (E73BTextInputValue.trim() !== '') {
                        text.push('\n');
                        text.push('CWL:');
                        text.push(` ${E73BTextInputValue}`);
                    } else {
                        text.push('');

                    }

                    const E74BTextInputValue = E74BTextInput.value;
                    if (E74BTextInputValue.trim() !== '') {
                        text.push('\n');
                        text.push('Last rotary used:');
                        text.push(` ${E74BTextInputValue}`);
                    } else {
                        text.push('');

                    }

                    const E75BTextInputValue = E75BTextInput.value;
                    if (E75BTextInputValue.trim() !== '') {
                        text.push('\n');
                        text.push('(MC):');
                        text.push(` ${E75BTextInputValue}`);
                    } else {
                        text.push('');

                    }


                    const E69CTextInputValue = E69CTextInput.value;
                    if (E69CTextInputValue.trim() !== '') {
                        text.push('\n\n');
                        text.push('Canal:');
                        text.push(` ${E69CTextInputValue}`);
                    } else {
                        text.push('');

                    }

                    const E70CTextInputValue = E70CTextInput.value;
                    if (E70CTextInputValue.trim() !== '') {
                        text.push('\n');
                        text.push('Ref point:');
                        text.push(` ${E70CTextInputValue}`);
                    } else {
                        text.push('');

                    }

                    const E71CTextInputValue = E71CTextInput.value;
                    if (E71CTextInputValue.trim() !== '') {
                        text.push('\n');
                        text.push('EWL:');
                        text.push(` ${E71CTextInputValue}`);
                    } else {
                        text.push('');

                    }
                    const E72CTextInputValue = E72CTextInput.value;
                    if (E72CTextInputValue.trim() !== '') {
                        text.push('\n');
                        text.push('WLF Size:');
                        text.push(` ${E72CTextInputValue}`);
                    } else {
                        text.push('');

                    }

                    const E73CTextInputValue = E73CTextInput.value;
                    if (E73CTextInputValue.trim() !== '') {
                        text.push('\n');
                        text.push('CWL:');
                        text.push(` ${E73CTextInputValue}`);
                    } else {
                        text.push('');

                    }

                    const E74CTextInputValue = E74CTextInput.value;
                    if (E74CTextInputValue.trim() !== '') {
                        text.push('\n');
                        text.push('Last rotary used:');
                        text.push(` ${E74CTextInputValue}`);
                    } else {
                        text.push('');

                    }

                    const E75CTextInputValue = E75CTextInput.value;
                    if (E75CTextInputValue.trim() !== '') {
                        text.push('\n');
                        text.push('(MC):');
                        text.push(` ${E75CTextInputValue}`);
                    } else {
                        text.push('');

                    }

                    const E69DTextInputValue = E69DTextInput.value;
                    if (E69DTextInputValue.trim() !== '') {
                        text.push('\n\n');
                        text.push('Canal:');
                        text.push(` ${E69DTextInputValue}`);
                    } else {
                        text.push('');

                    }

                    const E70DTextInputValue = E70DTextInput.value;
                    if (E70DTextInputValue.trim() !== '') {
                        text.push('\n');
                        text.push('Ref point:');
                        text.push(` ${E70DTextInputValue}`);
                    } else {
                        text.push('');

                    }

                    const E71DTextInputValue = E71DTextInput.value;
                    if (E71DTextInputValue.trim() !== '') {
                        text.push('\n');
                        text.push('EWL:');
                        text.push(` ${E71DTextInputValue}`);
                    } else {
                        text.push('');

                    }
                    const E72DTextInputValue = E72DTextInput.value;
                    if (E72DTextInputValue.trim() !== '') {
                        text.push('\n');
                        text.push('WLF Size:');
                        text.push(` ${E72DTextInputValue}`);
                    } else {
                        text.push('');

                    }

                    const E73DTextInputValue = E73DTextInput.value;
                    if (E73DTextInputValue.trim() !== '') {
                        text.push('\n');
                        text.push('CWL:');
                        text.push(` ${E73DTextInputValue}`);
                    } else {
                        text.push('');

                    }

                    const E74DTextInputValue = E74DTextInput.value;
                    if (E74DTextInputValue.trim() !== '') {
                        text.push('\n');
                        text.push('Last rotary used:');
                        text.push(` ${E74DTextInputValue}`);
                    } else {
                        text.push('');

                    }

                    const E75DTextInputValue = E75DTextInput.value;
                    if (E75DTextInputValue.trim() !== '') {
                        text.push('\n');
                        text.push('(MC):');
                        text.push(` ${E75DTextInputValue}`);
                    } else {
                        text.push('');

                    }

                    // Obturation Body


                    if (E80Checkbox.checked) {
                        text.push('\n');
                        text.push(`${E81Dropdown.value}`);
                    }


                    if (E82Checkbox.checked) {
                        text.push('\n');
                        text.push(`Anesthetic Used: ${E82Dropdown.value} VIA ${E82InfilDropdown.value}`);
                    }


                    if (E83Checkbox.checked) {
                        text.push('\n');
                        text.push(`Isolation: ${E84Dropdown.value}`);
                    }


                    if (E85Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Temporary restorations removed using H/S & U/S.');
                    }

                    if (E86Checkbox.checked) {
                        text.push('\n');
                        text.push('Canal(s) were irrigated with 4% sodium hypochlorite & recapitulated to prepared lengths to ensure patency.');
                    }

                    if (E87Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Master cone tried & tug-back achieved. Master cone radiograph taken.');
                    }

                    if (E88Checkbox.checked) {
                        text.push('\n');
                        text.push('All canal(s) were dried with length-controlled paper points.');
                    }

                    if (E89Checkbox.checked) {
                        text.push('\n');
                        text.push('All canal(s) were obturated with master cones & medium fine accessory GP points using AH Plus sealer & lateral condensation technique.');
                    }

                    if (E90Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Excess GP were removed using Super endo up to 4mm below each canal orifice (to reduce risk of staining & allow sufficient space for Cavit placement) & the remaining GP were packed with a plugger.');
                    }

                    if (E91Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Excess GP & sealer on the coronal portion of each orifice were removed with Gates Glidden at 10,000 RPM & 5s etch, respectively.');
                    }

                    if (E92Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Final PA radiograph taken.');
                    }

                    if (E93Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Final restoration was placed using composite / Access cavity is temporized with Cavit, & Fuji 9 GIC.');
                    }

                    if (E94Checkbox.checked) {
                        text.push('\n\n');
                        text.push('POIG. Tooth may be sensitive for the next few days post-op (recommend ibuprofen 600mg &/or paracetamol if necessary); Cautioned against consuming hot food/drinks until the LA wears off due to numb lip & cheek/lip biting.');
                    }

                    if (E95Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Informed pt about future treatment appointments, such as the restoration & recall appointments.');
                    }

// Perio body
                    if (P1ACheckbox.checked) {
                        text.push('\n\n');
                        text.push('Dental Hx');
                    }
                    if (P1Checkbox.checked) {
                        const P1TextInputValue = P1TextInput.value;
                        if (P1TextInputValue.trim() !== '') {
                            text.push('\n')
                            text.push(`Brushing freq, TB & TP: ${P1TextInputValue}`);
                        } else {
                            text.push('');
                        }
                    }

                    if (P2Checkbox.checked) {
                        const P2TextInputValue = P2TextInput.value;
                        if (P2TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`Interdental cleaning/mouthwash: ${P2TextInputValue}`);
                        } else {
                            text.push('');
                        }
                    }

                    if (P3Checkbox.checked) {
                        const P3TextInputValue = P3TextInput.value;
                        if (P3TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`Pain Hx: ${P3TextInputValue}`);
                        } else {
                            text.push('');
                        }
                    }

                    if (P4Checkbox.checked) {
                        const P4TextInputValue = P4TextInput.value;
                        if (P4TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`Bleeding gums: ${P4TextInputValue}`);
                        } else {
                            text.push('');
                        }
                    }

                    if (P5Checkbox.checked) {
                        const P5TextInputValue = P5TextInput.value;
                        if (P5TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`Missing teeth & reason: ${P5TextInputValue}`);
                        } else {
                            text.push('');
                        }
                    }

                    if (P6Checkbox.checked) {
                        const P6TextInputValue = P6TextInput.value;
                        if (P6TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`Tooth mobility or movement: ${P6TextInputValue}`);
                        } else {
                            text.push('');
                        }
                    }
                    // DENTAL Hx (Continued)

                    if (P1BCheckbox.checked) {
                        text.push('\n\n');
                        text.push('SOCIAL & FAMILY HX');
                    }
                    if (P7Checkbox.checked) {
                        const P7TextInputValue = P7TextInput.value;
                        if (P7TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`Snacks/sugary drinks: ${P7TextInputValue}`);
                        } else {
                            text.push('');
                        }
                    }

                    if (P8Checkbox.checked) {
                        const P8aTextInputValue = P8aTextInput.value;
                        if (P8aTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`Smoking Hx: ${P8aTextInputValue}`);
                        } else {
                            text.push('');
                        }
                    }

                    if (P9Checkbox.checked) {
                        const P9TextInputValue = P9TextInput.value;
                        if (P9TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`Family Hx of diabetes/gum disease/tooth loss: ${P9TextInputValue}`);
                        } else {
                            text.push('');
                        }
                    }

                    if (LAperio16Checkbox.checked) {
                        text.push('\n\n');
                        text.push(`${LAperio16Dropdown.value}`);
                    }

                    if (LAperio17Checkbox.checked) {
                        text.push('\n');
                        text.push(`Anesthetic Used: ${LAperio17Dropdown.value} VIA ${LAperio17InfilDropdown.value}`);
                    }


                    if (P10Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Full perio charted. Significant findings:');
                        text.push('\n');
                    }


                    if (P101Checkbox.checked) {
                        text.push('\n');
                        text.push('Severity');
                        text.push('\n');
                        text.push(`Interdental CAL at site of greatest loss: 1 – 2 mm`);

                    }

                    if (P102Checkbox.checked) {
                        text.push('\n');
                        text.push('Severity');
                        text.push('\n');
                        text.push(`Interdental CAL at site of greatest loss: 3 – 4 mm`);

                    }


                    if (P103Checkbox.checked) {
                        text.push('\n');
                        text.push('Severity');
                        text.push('\n');
                        text.push(`Interdental CAL at site of greatest loss: ≥ 5mm`);

                    }

                    if (P104Checkbox.checked) {
                        text.push('\n');
                        text.push('Severity');
                        text.push('\n');
                        text.push(`Interdental CAL at site of greatest loss: ≥ 5mm`);

                    }

                    if (P105Checkbox.checked) {
                        text.push('\n');
                        text.push(`RBL: Coronal Third (< 15%) `);

                    }


                    if (P106Checkbox.checked) {

                        text.push('\n');
                        text.push(`RBL: Coronal Third (15 – 33 %)`);

                    }

                    if (P107Checkbox.checked) {
                        text.push('\n');
                        text.push(`RBL:  Extending to the mid third of the root and beyond.`);

                    }

                    if (P108Checkbox.checked) {
                        text.push('\n');
                        text.push(`RBL: Extending to the mid third of the root and beyond.`);

                    }
                    if (P109Checkbox.checked) {
                        text.push('\n');
                        text.push(`Periodontitis-associated tooth loss: Nil `);

                    }

                    if (P110Checkbox.checked) {
                        text.push('\n');
                        text.push(`Periodontitis-associated tooth loss:  ≤ 4 teeth `);

                    }


                    if (P111Checkbox.checked) {
                        text.push('\n');
                        text.push(`Periodontitis-associated tooth loss: ≥ 5 teeth. `);

                    }


                    if (P14Checkbox.checked) {
                        const P14DropdownValue = P14Dropdown.value;
                        if (P14DropdownValue.trim() !== '') {
                            text.push('\n\n');
                            text.push('Complexity');
                            text.push('\n');
                            text.push(`Max PPD: ${P14DropdownValue}`);
                        } else {
                            text.push('');
                        }
                    }
// P15
                    if (P15Checkbox.checked) {
                        const P15DropdownValue = P15Dropdown.value;
                        if (P15DropdownValue.trim() !== '') {
                            text.push('\n');
                            text.push(`RBL pattern: ${P15DropdownValue}`);
                        } else {
                            text.push('');
                        }
                    }

// P16
                    if (P16Checkbox.checked) {
                        const P16DropdownValue = P16Dropdown.value;
                        if (P16DropdownValue.trim() !== '') {
                            text.push('\n');
                            text.push(`Furcation involvement: ${P16DropdownValue}`);
                        } else {
                            text.push('');
                        }
                    }

// P17
                    if (P17Checkbox.checked) {
                        const P17DropdownValue = P17Dropdown.value;
                        if (P17DropdownValue.trim() !== '') {
                            text.push('\n');
                            text.push(`Ridge defects: ${P17DropdownValue}`);
                        } else {
                            text.push('');
                        }
                    }

// P18
                    if (P18Checkbox.checked) {
                        const P18TextInputValue = P18TextInput.value;
                        if (P18TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`Addition (Stage IV): ${P18TextInputValue}`);
                        } else {
                            text.push('');
                        }
                    }

// Extent & Distribution (Continued)

                    if (P19Checkbox.checked) {
                        const P19DropdownValue = P19Dropdown.value;
                        text.push('\n\n');

                        text.push(`Extent & Distribution: ${P19DropdownValue}`);

                    }
// Grading (Continued)


                    if (P116Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Grade Modifiers');
                        text.push('\n');

                        text.push(`Evidence of loss (RBL/CAL) over 5yrs: Evidence of no loss over 5 years. `);
                    }


                    if (P117Checkbox.checked) {
                        text.push('\n\n');
                        text.push(`Evidence of loss (RBL/CAL) over 5yrs: <2mm over 5 years.`);
                    }

                    if (P118Checkbox.checked) {
                        text.push('\n\n');
                        text.push(`Evidence of loss (RBL/CAL) over 5yrs: > 2mm over 5 years. `);
                    }


                    if (P119Checkbox.checked) {
                        text.push('\n');
                        text.push(`%RBL/age: <0.25 `);
                    }

                    if (P120Checkbox.checked) {
                        text.push('\n');
                        text.push(`%RBL/age: 0.25 – 1.0`);
                    }


                    if (P121Checkbox.checked) {
                        text.push('\n');
                        text.push(`%RBL/age: &gt;1.0 `);
                    }


                    if (P122Checkbox.checked) {
                        text.push('\n');
                        text.push(`Case Phenotype: Heavy biofilm deposits with low levels of destruction. `);
                    }

                    if (P123Checkbox.checked) {
                        text.push('\n');
                        text.push(`Case Phenotype: Destruction commensurate with biofilm deposits. `);
                    }

                    if (P124Checkbox.checked) {
                        text.push('\n');
                        text.push(`Case Phenotype: Destruction disproportionate to biofilm deposits; evidence of periods of rapid progression and/or early-onset disease (molar/incisor pattern); expected poor response to standard bacterial control. `);
                    }

                    if (P125Checkbox.checked) {
                        text.push('\n\n');
                        text.push('GRADE MODIFIERS');
                        text.push('\n');
                        text.push(`Non-smoker`);
                    }

                    if (P126Checkbox.checked) {
                        text.push('\n\n');
                        text.push('GRADE MODIFIERS');
                        text.push('\n');
                        text.push(`Smoker < 10 cigarettes/day `);
                    }
                    if (P127Checkbox.checked) {
                        text.push('\n\n');
                        text.push('GRADE MODIFIERS');
                        text.push('\n');
                        text.push(`Smoker >10 cigarettes/day`);
                    }

                    if (P128Checkbox.checked) {
                        text.push('\n');
                        text.push(`Diabetes: Normoglycemic / no diagnosis of Diabetes `);
                    }

                    if (P129Checkbox.checked) {
                        text.push('\n');
                        text.push(`Diabetes: HbA1c < 7.0% in a Diabetes Patient `);
                    }

                    if (P130Checkbox.checked) {
                        text.push('\n');
                        text.push(`Diabetes: HbA1c > 7.0 % in a Diabetes Patient `);
                    }

                    if (P25Checkbox.checked) {
                        const P25ADropdownValue = P25ADropdown.value;
                        const P25BDropdownValue = P25BDropdown.value;
                        const P19BDropdownValue = P19BDropdown.value;
                        text.push('\n\n');
                        text.push('Dx');
                        text.push('\n');
                        text.push(`${P25ADropdownValue} `);
                        text.push(`${P19BDropdownValue}, `);
                        text.push(`Grade ${P25BDropdownValue} periodontitis`);


                    }

                    if (LAperio26Checkbox.checked) {
                        text.push('\n\n');
                        text.push(`${LAperio26Dropdown.value}`);
                    }

                    if (LAperio27Checkbox.checked) {
                        text.push('\n');
                        text.push(`Anesthetic Used: ${LAperio27Dropdown.value} VIA ${LAperio27InfilDropdown.value}`);
                    }

                    if (p40Checkbox5.checked) {
                        text.push('\n\n');
                        text.push('U/S & hand scaling (Gracey curettes) used to debride all sub- & supra-gingival surfaces. All calculus & plaque removed.');
                    }

// Checkbox 6
                    if (p40Checkbox6.checked) {
                        text.push('\n');
                        text.push('Prophy paste used to clean & polish all supragingival surfaces. Floss confirmed removal of calculus on interproximal surfaces.');
                    }

// Checkbox 7
                    if (p40Checkbox7.checked) {
                        text.push('\n\n');
                        text.push('OHI reinforced to patient.');
                    }

// REMAINING p40 PLAN


// Checkbox 8
                    if (p40Checkbox8.checked) {
                        text.push('\n\nREMAINING Tx plan ');
                        text.push('\n');
                        text.push('250 x2 Active non-surgical perio tx Q2 & Q3 w LA.');
                    }

// Checkbox 9
                    if (p40Checkbox9.checked) {
                        text.push('\n');
                        text.push('251 Supportive periodontal therapy/review.');
                    }

// POST p40


// Checkbox 10
                    if (p40Checkbox10.checked) {
                        text.push('\n\nPOST OP');
                        text.push('\n');
                        text.push('POIG regarding bleeding, sensitivity & gap formation (if any).');
                    }


                    //F/F Primary Body


                    if (G1Checkbox.checked) {
                        const G1TextInputValue = G1TextInput.value;
                        if (G1TextInputValue.trim() !== '') {
                            text.push('\n\n');
                            text.push(`Reason for tooth loss (years of edentulous): ${G1TextInputValue}`);

                        } else {
                            text.push('');
                        }
                    }

                    if (G2Checkbox.checked) {
                        const G2TextInputValue = G2TextInput.value;
                        if (G2TextInputValue.trim() !== '') {
                            text.push('\n\n');
                            text.push(`Patient’s responsibility in home care: ${G2TextInputValue}`);

                        } else {
                            text.push('');
                        }
                    }
                    if (G3Checkbox.checked) {
                        const G3TextInputValue = G3TextInput.value;
                        if (G3TextInputValue.trim() !== '') {
                            text.push('\n\n');
                            text.push(`Hx & preference of existing & previous denture: ${G3TextInputValue}`);

                        } else {
                            text.push('');


                        }
                    }
                    if (G4Checkbox.checked) {
                        const G4TextInputValue = G4TextInput.value;
                        if (G4TextInputValue.trim() !== '') {
                            text.push('\n\n');
                            text.push(`Evaluation of existing denture: ${G4TextInputValue}`);

                        } else {
                            text.push('');

                        }
                    }
                    if (G5Checkbox.checked) {
                        const G5aTextInputValue = G5aTextInput.value;
                        const G5bTextInputValue = G5bTextInput.value;
                        const G5cTextInputValue = G5cTextInput.value;
                        if (G5aTextInputValue.trim() !== '') {
                            text.push('\n\n');
                            text.push(`Smoking Hx: ${G5aTextInputValue} a day, since ${G5bTextInputValue}, ${G5cTextInputValue} intention of quiting `);
                        } else {
                            text.push('');

                        }
                    }
                    if (G6Checkbox.checked) {
                        text.push('\n');
                        text.push('Personality assessment: ');
                        text.push(G6Dropdown.value);
                    }

                    if (G7Checkbox.checked) {
                        text.push('\n\n');
                        text.push('E/O EXAMINATION > NAD ');
                    }

                    if (G8Checkbox.checked) {
                        text.push('\n');
                        text.push('I/O EXAMINATION > NAD ');
                    }

                    if (G9Checkbox.checked) {
                        const G9TextInputValue = G9TextInput.value;

                        if (G9TextInputValue.trim() !== '') {
                            text.push('\n\n');
                            text.push(` RADIOGRAPHIC ASSESSMENT: ${G9TextInputValue}`);

                        } else {
                            text.push('\n');
                            text.push('');

                        }
                    }

                    if (G10Checkbox.checked) {
                        const G10TextInputValue = G10TextInput.value;
                        if (G10TextInputValue.trim() !== '') {
                            text.push('\n\n');
                            text.push(`Tx Options: ${G10TextInputValue}`);

                        } else {
                            text.push('');

                        }
                    }

                    if (G10ACheckbox.checked) {
                        text.push('\n');
                        text.push('Pt notified that completion of complete denture will take a min of 3mo (i.e. 6 appt with 2weeks interval');
                    }

                    if (G11Checkbox.checked) {
                        text.push('\n\n');
                        text.push('TX DELIVERED> Max & mand alginate primary impression taken. Impression checked for quality, sterilized & bagged. Lab card with instructions for pour up of impression & construction of special trays for ZOE impression written, scanned & sent to the lab.');
                    }
                    if (G12Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Denture hygiene instructions given for existing denture (i.e. to clean with a soft brush & gentle soap, to remove denture at night & to soak in diluted white vinegar or Milton antibacterial tablets)');
                    }

                    //F/F 2nd Body
                    if (G18Checkbox.checked) {
                        text.push('\n\n');
                        text.push(`Custom tray adjusted with acrylic burs to 1mm short of sulcus, not interfering with frenum`);
                    }
                    if (G19Checkbox.checked) {
                        text.push('\n\n');
                        text.push(`Border moulding was performed with the addition of compound stick to the periphery of trays`);
                    }

                    if (G20Checkbox.checked) {
                        text.push('\n\n');
                        text.push(`Max & mand secondary impression taken with ${G20Dropdown.value}. Post dam was marked with an indelible marker & transferred to the impression. Impression checked for quality, sterilized & bagged.`);
                    }

                    if (G21Checkbox.checked) {
                        text.push('\n\n');
                        text.push(`Lab card with instructions for construction of master cast & provision of occlusal wax rims in std dimensions written, scanned & sent to the lab.`);
                    }

                    //F/F Jaw Reg Body


                    if (G28Checkbox.checked) {
                        const G28TextInputValue = G28TextInput.value;
                        if (G28TextInputValue.trim() !== '') {
                            text.push('\n\n');
                            text.push('VDR:');
                            text.push(`${G28TextInputValue} mm est. from nose tip to chin. 3mm freeway space selected`);

                        } else {
                            text.push('');
                        }
                    }

                    if (G29Checkbox.checked) {
                        const G29TextInputValue = G29TextInput.value;
                        if (G29TextInputValue.trim() !== '') {
                            text.push('\n\n');
                            text.push('VDO of existing denture: ');
                            text.push(`${G29TextInputValue}mm`);

                        } else {
                            text.push('');


                        }
                    }

                    if (G30Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Occlusal wax rims were checked for their stability.');
                    }

                    if (G31Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Max wax rim was adjusted for lip support, tooth display & occlusal plane');
                    }

                    if (G32Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Facial midline, canine lines & smile line were marked on the wax rims.');
                    }

                    if (G33Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Centric relation was recorded & reproduceable.');
                    }

                    if (G34Checkbox.checked) {
                        const G34TextInputValue = G34TextInput.value;
                        if (G34TextInputValue.trim() !== '') {
                            text.push('\n\n');
                            text.push(`Tooth Shade: ${G34TextInputValue} & ${G34Dropdown.value} anterior mould selected`);

                        } else {
                            text.push('\n\n');
                            text.push(`Tooth Shade: XX & ${G34Dropdown.value} anterior mould selected`);

                        }
                    }

                    if (G35Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Marked occlusal wax rims were sterilized & bagged. Lab card with instructions for articulation of master casts & set up of teeth for try-in was written, scanned & sent to the lab.');
                    }

                    //Tooth Try in Body
                    if (G49Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Wax-tooth was inserted to verify midline, CR, VDO, lip support, tooth position, buccal corridor, occlusal plane (w/ articulating paper), phonetics, & aesthetics.');
                    }
                    if (G50Checkbox.checked) {
                        text.push('\n\n');
                        text.push(`Bite position was reverified. Retake of jaw record ${G49Dropdown.value}`);
                    }

                    if (G51Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Patient was given a mirror & was satisfied with the teeth size, colour, & the overall appearance of the denture. Patient’s approval to process the denture was obtained.');
                    }

                    if (G52Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Wax-tooth was sterilized & bagged. Lab card with instructions to seal wax rims, process the denture in 60:40 original & light pink acrylic, & finish for insertion was written, scanned & sent to the lab.');
                    }

                    // F/F Insert Body
                    if (G41Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Denture base areas & peripheral borders were checked for high spots/overextended areas using pressure indicator paste. Frenum is cleared.');
                    }

                    if (G42Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Effective post dam was confirmed w/ extrusion forces');
                    }
                    if (G43Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Occlusion was reverified with articulating paper.');
                    }
                    if (G44Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Denture hygiene instructions given (i.e. to clean with soft brush & gentle soap, to remove denture at night & to soak in diluted white vinegar or Milton antibacterial tablets)');
                    }

                    //F/F Review Body

                    if (G55Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Patient interview & intraoral examination were performed to review for any post-operative issues due to the denture.');
                    }

                    if (G56Checkbox.checked) {
                        text.push('\n\n');
                        text.push('FINDINGS > NAD ');
                    }

                    if (G57Checkbox.checked) {
                        text.push('\n');
                        text.push('Ulcers in frenum region, sulcus & mylohyoid ridge due to lack of clearance');
                    }

                    if (G58Checkbox.checked) {
                        text.push('\n');
                        text.push('Correction of occlusion required');
                    }

                    if (G59Checkbox.checked) {
                        text.push('\n');
                        text.push('Cheek biting due to lack of buccal overjet');
                    }

                    if (G60Checkbox.checked) {
                        text.push('\n');
                        text.push('Restricted food or chewing ');
                    }

                    if (G61Checkbox.checked) {
                        text.push('\n');
                        text.push('Lack of retention (i.e. overextension, processing errors)');
                    }

                    if (G62Checkbox.checked) {
                        text.push('\n');
                        text.push('Too bulky in palatal or buccal surfaces');
                    }


                    text.push('\n');
                    text.push(`${generatedText1.value}`);

                    //011 End
                    if (supervisorCheckbox.checked) {
                        const supervisorNameTextInputValue = supervisorNameTextInput.value;
                        if (supervisorNameTextInputValue.trim() !== '') {
                            text.push('\n\n');
                            text.push(`Supervisor:Dr ${supervisorNameTextInputValue}`);
                        } else {
                            text.push('\n\n');
                            text.push('Supervisor:Dr ');
                        }
                    }
                    if (nvCheckbox.checked) {
                        const nvTextInputValue = nvTextInput.value;
                        if (nvTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`N/V: ${nvTextInputValue}`);

                        } else {
                            text.push('\n');
                            text.push('N/V: ');
                        }
                    }
                    if (waitlistCheckbox.checked) {
                        const waitlistTextInputValue = waitlistTextInput.value;
                        if (waitlistTextInputValue.trim() !== '') {
                            text.push('\n');

                            text.push(`${waitlistTextInputValue}`);

                        } else {
                            text.push('\n');
                            text.push('Patient placed on general waitlist and seperated');
                        }
                    }

                    // F/F Prim End
                    if (G13Checkbox.checked) {
                        const G13TextInputValue = G13TextInput.value;
                        if (G13TextInputValue.trim() !== '') {
                            text.push('\n\n');
                            text.push(` ${G13TextInputValue}`);

                        } else {
                            text.push('\n\n');
                            text.push('Pt well on discharge');
                        }
                    }

                    if (G13aCheckbox1.checked) {
                        const G13aTextInputValue1 = G13aTextInput1.value;
                        if (G13aTextInputValue1.trim() !== '') {
                            text.push('\n\n');
                            text.push('Supervisor: Dr ');
                            text.push(`${G13aTextInputValue1}`);
                        } else {
                            text.push('\n\n');
                            text.push('Supervisor: Dr ');
                        }
                    }


                    if (G14Checkbox.checked) {
                        const G14TextInputValue = G14TextInput.value;
                        if (G14TextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push('N/V:');
                            text.push(`${G14TextInputValue}`);

                        } else {
                            text.push('\n');
                            text.push('N/V: F/F secondary impression');
                        }
                    }

                    // F/F 2ndary End

                    if (G22Checkbox.checked) {
                        text.push('\n\n');
                        text.push(`Pt well on discharge`);
                    }


                    if (ff2supervisorCheckbox.checked) {
                        const ff2supervisornameTextInputValue = ff2supervisornameTextInput.value;
                        if (ff2supervisornameTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push('Supervisor: Dr ');
                            text.push(`${ff2supervisornameTextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push('Supervisor: Dr');
                        }
                    }


                    if (G23Checkbox.checked) {
                        text.push('\n');
                        text.push('N/V: F/F Jaw registration');
                    }

                    // F/F Jaw reg End
                    if (ff3G22Checkbox.checked) {
                        text.push('\n\n');
                        text.push(`Pt well on discharge`);
                    }


                    if (ff3supervisorCheckbox.checked) {
                        const ff3supervisornameTextInputValue = ff3supervisornameTextInput.value;
                        if (ff3supervisornameTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push('Supervisor: Dr ');
                            text.push(`${ff3supervisornameTextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push('Supervisor: Dr');
                        }
                    }


                    if (ff3G23Checkbox.checked) {
                        text.push('\n');
                        text.push('N/V: F/F Teeth Try in');
                    }

                    //F/F Insertion end
                    if (ff5G22Checkbox.checked) {
                        text.push('\n\n');
                        text.push(`Written denture instructions given & explained. Pt well on discharge`);
                    }


                    if (ff5supervisorCheckbox.checked) {
                        const ff5supervisornameTextInputValue = ff5supervisornameTextInput.value;
                        if (ff5supervisornameTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push('Supervisor: Dr ');
                            text.push(`${ff5supervisornameTextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push('Supervisor: Dr');
                        }
                    }


                    if (ff5G23Checkbox.checked) {
                        text.push('\n');
                        text.push('N/V: F/F Review');
                    }

                    // F/F Teeth Try in end


                    if (ff4G22Checkbox.checked) {
                        text.push('\n\n');
                        text.push(`Pt well on discharge`);
                    }


                    if (ff4supervisorCheckbox.checked) {
                        const ff4supervisornameTextInputValue = ff4supervisornameTextInput.value;
                        if (ff4supervisornameTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push('Supervisor: Dr ');
                            text.push(`${ff4supervisornameTextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push('Supervisor: Dr');
                        }
                    }


                    if (ff4G23Checkbox.checked) {
                        text.push('\n');
                        text.push('N/V: F/F Insertion');
                    }

                    // F/F Review end
                    if (ff6G22Checkbox.checked) {
                        text.push('\n\n');
                        text.push(`Pt well on discharge`);
                    }


                    if (ff6supervisorCheckbox.checked) {
                        const ff6supervisornameTextInputValue = ff6supervisornameTextInput.value;
                        if (ff6supervisornameTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push('Supervisor: Dr ');
                            text.push(`${ff6supervisornameTextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push('Supervisor: Dr');
                        }
                    }


                    if (ff6G23Checkbox.checked) {
                        text.push('\n');
                        text.push('N/V: Review 2.0');
                    }

                    //Endo 1 End

                    if (endo1G22Checkbox.checked) {
                        text.push('\n\n');
                        text.push(`Pt well on discharge`);
                    }


                    if (endo1supervisorCheckbox.checked) {
                        const endo1supervisornameTextInputValue = endo1supervisornameTextInput.value;
                        if (endo1supervisornameTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push('Supervisor: Dr ');
                            text.push(`${endo1supervisornameTextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push('Supervisor: Dr');
                        }
                    }


                    if (endo1nvCheckbox.checked) {
                        const endo1nvTextInputValue = endo1nvTextInput.value;
                        if (endo1nvTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`N/V: ${endo1nvTextInputValue}`);

                        } else {
                            text.push('\n');
                            text.push('N/V: ');
                        }
                    }

                    if (endo4G22Checkbox.checked) {
                        text.push('\n\n');
                        text.push(`Pt well on discharge`);
                    }


                    if (endo4supervisorCheckbox.checked) {
                        const endo4supervisornameTextInputValue = endo4supervisornameTextInput.value;
                        if (endo4supervisornameTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push('Supervisor: Dr ');
                            text.push(`${endo4supervisornameTextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push('Supervisor: Dr');
                        }
                    }


                    if (endo4nvCheckbox.checked) {
                        const endo4nvTextInputValue = endo4nvTextInput.value;
                        if (endo4nvTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`N/V: ${endo4nvTextInputValue}`);

                        } else {
                            text.push('\n');
                            text.push('N/V: ');
                        }
                    }


                    if (endo2G22Checkbox.checked) {
                        text.push('\n\n');
                        text.push(`Pt well on discharge`);
                    }


                    if (endo2supervisorCheckbox.checked) {
                        const endo2supervisornameTextInputValue = endo2supervisornameTextInput.value;
                        if (endo2supervisornameTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push('Supervisor: Dr ');
                            text.push(`${endo2supervisornameTextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push('Supervisor: Dr');
                        }
                    }


                    if (endo2nvCheckbox.checked) {
                        const endo2nvTextInputValue = endo2nvTextInput.value;
                        if (endo2nvTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`N/V: ${endo2nvTextInputValue}`);

                        } else {
                            text.push('\n');
                            text.push('N/V: ');
                        }
                    }

                    if (endo3G22Checkbox.checked) {
                        text.push('\n\n');
                        text.push(`Pt well on discharge`);
                    }


                    if (endo3supervisorCheckbox.checked) {
                        const endo3supervisornameTextInputValue = endo3supervisornameTextInput.value;
                        if (endo3supervisornameTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push('Supervisor: Dr ');
                            text.push(`${endo3supervisornameTextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push('Supervisor: Dr');
                        }
                    }


                    if (endo3nvCheckbox.checked) {
                        const endo3nvTextInputValue = endo3nvTextInput.value;
                        if (endo3nvTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`N/V: ${endo3nvTextInputValue}`);

                        } else {
                            text.push('\n');
                            text.push('N/V: ');
                        }
                    }

                    //Crown END


                    if (crown2G22Checkbox.checked) {
                        text.push('\n\n');
                        text.push(`Pt well on discharge`);
                    }


                    if (crown2supervisorCheckbox.checked) {
                        const crown2supervisornameTextInputValue = crown2supervisornameTextInput.value;
                        if (crown2supervisornameTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push('Supervisor: Dr ');
                            text.push(`${crown2supervisornameTextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push('Supervisor: Dr');
                        }
                    }


                    if (crown2nvCheckbox.checked) {
                        const crown2nvTextInputValue = crown2nvTextInput.value;
                        if (crown2nvTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`N/V: ${crown2nvTextInputValue}`);

                        } else {
                            text.push('\n');
                            text.push('N/V: ');
                        }
                    }

                    if (crown3G22Checkbox.checked) {
                        text.push('\n\n');
                        text.push(`Pt well on discharge`);
                    }


                    if (crown3supervisorCheckbox.checked) {
                        const crown3supervisornameTextInputValue = crown3supervisornameTextInput.value;
                        if (crown3supervisornameTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push('Supervisor: Dr ');
                            text.push(`${crown3supervisornameTextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push('Supervisor: Dr');
                        }
                    }


                    if (crown3nvCheckbox.checked) {
                        const crown3nvTextInputValue = crown3nvTextInput.value;
                        if (crown3nvTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`N/V: ${crown3nvTextInputValue}`);

                        } else {
                            text.push('\n');
                            text.push('N/V: ');
                        }
                    }

                    if (crown4G22Checkbox.checked) {
                        text.push('\n\n');
                        text.push(`Pt well on discharge`);
                    }


                    if (crown4supervisorCheckbox.checked) {
                        const crown4supervisornameTextInputValue = crown4supervisornameTextInput.value;
                        if (crown4supervisornameTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push('Supervisor: Dr ');
                            text.push(`${crown4supervisornameTextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push('Supervisor: Dr');
                        }
                    }


                    if (crown4nvCheckbox.checked) {
                        const crown4nvTextInputValue = crown4nvTextInput.value;
                        if (crown4nvTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`N/V: ${crown4nvTextInputValue}`);

                        } else {
                            text.push('\n');
                            text.push('N/V: ');
                        }
                    }


                    if (crown1G22Checkbox.checked) {
                        text.push('\n\n');
                        text.push(`Pt well on discharge`);
                    }


                    if (crown1supervisorCheckbox.checked) {
                        const crown1supervisornameTextInputValue = crown1supervisornameTextInput.value;
                        if (crown1supervisornameTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push('Supervisor: Dr ');
                            text.push(`${crown1supervisornameTextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push('Supervisor: Dr');
                        }
                    }


                    if (crown1nvCheckbox.checked) {
                        const crown1nvTextInputValue = crown1nvTextInput.value;
                        if (crown1nvTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`N/V: ${crown1nvTextInputValue}`);

                        } else {
                            text.push('\n');
                            text.push('N/V: ');
                        }
                    }

// OR END

                    if (surg1G22Checkbox.checked) {
                        text.push('\n\n');
                        text.push(`Pt well on discharge`);
                    }


                    if (surg1supervisorCheckbox.checked) {
                        const surg1supervisornameTextInputValue = surg1supervisornameTextInput.value;
                        if (surg1supervisornameTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push('Supervisor: Dr ');
                            text.push(`${surg1supervisornameTextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push('Supervisor: Dr');
                        }
                    }


                    if (surg1nvCheckbox.checked) {
                        const surg1nvTextInputValue = surg1nvTextInput.value;
                        if (surg1nvTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`N/V: ${surg1nvTextInputValue}`);

                        } else {
                            text.push('\n');
                            text.push('N/V: ');
                        }
                    }


                    //Perio End
                    if (perio1supervisorCheckbox.checked) {
                        const perio1supervisornameTextInputValue = perio1supervisornameTextInput.value;
                        if (perio1supervisornameTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push('Supervisor: Dr ');
                            text.push(`${perio1supervisornameTextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push('Supervisor: Dr');
                        }
                    }


                    if (perio1nvCheckbox.checked) {
                        const perio1nvTextInputValue = perio1nvTextInput.value;
                        if (perio1nvTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`N/V: ${perio1nvTextInputValue}`);

                        } else {
                            text.push('\n');
                            text.push('N/V: ');
                        }
                    }

                    if (perio2G22Checkbox.checked) {
                        text.push('\n\n');
                        text.push(`Pt well on discharge`);
                    }


                    if (perio2supervisorCheckbox.checked) {
                        const perio2supervisornameTextInputValue = perio2supervisornameTextInput.value;
                        if (perio2supervisornameTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push('Supervisor: Dr ');
                            text.push(`${perio2supervisornameTextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push('Supervisor: Dr');
                        }
                    }


                    if (perio2nvCheckbox.checked) {
                        const perio2nvTextInputValue = perio2nvTextInput.value;
                        if (perio2nvTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`N/V: ${perio2nvTextInputValue}`);

                        } else {
                            text.push('\n');
                            text.push('N/V: ');
                        }
                    }

                    //resto end

                    if (resto1G22Checkbox.checked) {
                        text.push('\n\n');
                        text.push(`Pt well on discharge`);
                    }


                    if (resto1supervisorCheckbox.checked) {
                        const resto1supervisornameTextInputValue = resto1supervisornameTextInput.value;
                        if (resto1supervisornameTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push('Supervisor: Dr ');
                            text.push(`${resto1supervisornameTextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push('Supervisor: Dr');
                        }
                    }


                    if (resto1nvCheckbox.checked) {
                        const resto1nvTextInputValue = resto1nvTextInput.value;
                        if (resto1nvTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`N/V: ${resto1nvTextInputValue}`);

                        } else {
                            text.push('\n');
                            text.push('N/V: ');
                        }
                    }


                    if (perio1G22Checkbox.checked) {
                        text.push('\n\n');
                        text.push(`Pt well on discharge`);
                    }


                    // S/C end


                    if (sc1G22Checkbox.checked) {
                        text.push('\n\n');
                        text.push(`Pt well on discharge`);
                    }


                    if (sc1supervisorCheckbox.checked) {
                        const sc1supervisornameTextInputValue = sc1supervisornameTextInput.value;
                        if (sc1supervisornameTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push('Supervisor: Dr ');
                            text.push(`${sc1supervisornameTextInputValue}`);
                        } else {
                            text.push('\n');
                            text.push('Supervisor: Dr');
                        }
                    }


                    if (sc1nvCheckbox.checked) {
                        const sc1nvTextInputValue = sc1nvTextInput.value;
                        if (sc1nvTextInputValue.trim() !== '') {
                            text.push('\n');
                            text.push(`N/V: ${sc1nvTextInputValue}`);

                        } else {
                            text.push('\n');
                            text.push('N/V: ');
                        }
                    }

                    // Lab Instructions
                    if (G15Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Lab Instructions');
                        text.push('\n');
                        text.push('Please construct diagnostic models from alginate impressions.');

                    }
                    if (G16Checkbox.checked) {
                        text.push('\n');
                        text.push(`Please construct custom trays ${G16Dropdown.value}`);
                        text.push('\n\n');
                    }

                    if (G24Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Lab Instructions');
                        text.push('\n');
                        text.push('Please construct master cast in stone with 3mm land area, scribe post-dam as indicated on Max impression, depth of post dam');

                    }
                    if (G25Checkbox.checked) {
                        text.push('\n');
                        text.push('Please provide occlusal wax rims to standard dimensions.');

                    }
                    if (G38Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Lab Instructions');
                        text.push('\n');
                        text.push('Please articulate master casts with bite registration provided.')
                    }
                    if (G38ACheckbox.checked) {
                        text.push('\n');
                        text.push(`Please set up Max & Mand teeth for try-in in shade XX, ${G34Dropdown.value} anterior mold`);
                    }

                    if (G38BCheckbox.checked) {
                        text.push('\n');
                        text.push(`Please mould to match existing denture based on denture impression provided.`);
                    }

                    if (G38CCheckbox.checked) {
                        text.push('\n');
                        text.push(`Please try to achieve edge-to-edge occlusion even if max teeth have to be brought forward.`);
                    }

                    if (G54Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Lab Instructions');
                        text.push('\n');
                        text.push('Please do not move the teeth, seal wax rims & finesse wax up in anterior region.')
                        text.push('\n');
                        text.push('Please process in 60:40 original & light pink acrylic & finish for insertion.')
                    }


                    if (J47Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Lab Instructions');
                        text.push('\n');
                        text.push('Please construct diagnostic models from alginate impression & return on ___ for diagnostic wax up.');
                    }
                    if (J48Checkbox.checked) {
                        text.push('\n');
                        text.push(`Please construct custom try for PVS impression for tooth ___.`);
                    }


                    if (J91Checkbox.checked) {
                        text.push('\n\n');
                        text.push('Lab Instructions');
                        text.push('\n');
                        text.push('Please pour up PVS impression in die stone & mount max & mand model.');
                    }
                    if (J92Checkbox.checked) {
                        text.push('\n');
                        text.push(`Please construct PFM crown in fine gold cervical collar in SHADE ___ VITA 3D Master for TOOTH ___ OR Please construct Emax/Zirconia/Sinfony crown in SHADE ___ VITA Classic for TOOTH ___ with STUMP SHADE ___.`);
                    }
                    contentToSave = text;

                    generatedText.value = text.join('');
                }
            }


// Event listener to track user-edited content


        });

        // JavaScript Document// JavaScript Document
        $(document).ready(function() {
            //Show
            $(document).on('click', '#contentcat li.card', function() {
                var noteId = $(this).data('note_id');
                var csrfToken = $('meta[name="csrf-token"]').attr('content'); // Fetch CSRF token from meta tag

                $.ajax({
                    url: '/notes/show', // Replace with your actual URL
                    method: 'POST',
                    data: {
                        id: noteId,
                        // Include CSRF token in the request data
                        _token: csrfToken
                    },
                    success: function(response) {
                        if(response.status == "success"){
                            $('#contentcatselect').val(response.data.category_id);
                            $('#saveName').val(response.data.name);
                            $('#generatedText').val(response.data.notes);
                            $('#saveContent').attr('data-note_id', response.data.id);
                        } else if(response.status == "error"){
                        }
                    },
                    error: function(xhr, status, error) {
                    }
                });
            });
            //Delete
            $(document).on('click', '#contentcat li.card span.bi-trash', function(e) {
                e.stopPropagation();
                var clickedItem = $(this);
                var noteId = clickedItem.parent().data('note_id');
                var csrfToken = $('meta[name="csrf-token"]').attr('content'); // Fetch CSRF token from meta tag

                $.ajax({
                    url: '/notes/destroy', // Replace with your actual URL
                    method: 'POST',
                    data: {
                        id: noteId,
                        // Include CSRF token in the request data
                        _token: csrfToken
                    },
                    success: function(response) {
                        if(response.status == "success"){
                            // console.log("Deleted Successfully");
                            // var panel = clickedItem.closest('.panel');
                            // var button = panel.prev('.accordion');
                            // if(panel.find('ul li').length > 1){
                            //     clickedItem.parent().remove();
                            // } else {
                            //     console.log("Remove All");
                            //     panel.remove();
                            //     button.remove();
                            // }
                            window.location.reload();
                        } else if(response.status == "error"){
                        }
                    },
                    error: function(xhr, status, error) {
                    }
                });
            });
            //Save
            $(document).on('click', '#saveContent', function() {
                var noteId = $(this).data('note_id');
                var categoryId = $('#contentcatselect').val();
                var noteName = $('#saveName').val();
                var noteContent = $('#generatedText').val();
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                $('#generatedText').css('border', '1px solid #ddd');
                $('#saveName').css('border', '1px solid #ddd');
                if(noteName.trim() == ""){
                    $('#saveName').css('border', '1px solid red');
                    return;
                }
                if(noteContent.trim() == "" ){
                    $('#generatedText').css('border', '1px solid red');
                    return;
                }
                var ajaction = '/notes/update';
                if(noteId == 0) {
                    ajaction = '/notes/store';
                }


                $.ajax({
                    url: ajaction, // Replace with your actual URL
                    method: 'POST',
                    data: {
                        id: noteId,
                        categoryId: categoryId,
                        noteName: noteName,
                        noteContent: noteContent,
                        // Include CSRF token in the request data
                        _token: csrfToken
                    },
                    success: function(response) {
                            window.location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error(error); // Handle error
                    }
                });
            });
        });

    </script>
@endpush
