@extends($layout)

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center ">
        <div class="container position-relative" data-aos-delay="100">

            {{-- <div class="row justify-content-center" style="margin-bottom: 3%">
                <div class="col-xl-12 col-lg-9">

                    {{-- <h1 style="font-size:40px;">KILANG BUAH</h1> --}}
            {{-- <h2 style="text-align: center; color:#247c68"><b> Maklumat Asas Pelesen </b></h2>
                </div>
            </div> --}}

            <div class="mt-3 mb-4 row">
                <div class="col-md-12">

                    <div class="page-breadcrumb" style="padding: 0px">
                        <div class="pb-2 row">
                            <div class="align-self-center" style="margin-left: 2%; margin-bottom:-2%">
                                <a href="{{ $returnArr['kembali'] }}" class="btn"
                                    style="color:white; background-color:#25877bd1">Kembali</a>
                            </div>
                            <div class="align-self-center" style="margin-left: -1%;">
                                <div class="d-flex align-items-center justify-content-end">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            @foreach ($returnArr['breadcrumbs'] as $breadcrumb)
                                                @if (!$loop->last)
                                                    <li class="breadcrumb-item">
                                                        <a href="{{ $breadcrumb['link'] }}"
                                                            style="color: white !important;"
                                                            onMouseOver="this.style.color='#25877b'"
                                                            onMouseOut="this.style.color='white'">
                                                            {{ $breadcrumb['name'] }}
                                                        </a>
                                                    </li>
                                                @else
                                                    <li class="breadcrumb-item active" aria-current="page"
                                                        style="color: #25877b  !important;">
                                                        {{ $breadcrumb['name'] }}
                                                    </li>
                                                @endif
                                            @endforeach

                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card" style="margin-right:2%; margin-left:2%">
                        {{-- <div class="card-header border-bottom">
                            <h3 class='p-1 pl-3 card-heading'>Pengumuman</h3>
                        </div> --}}
                        <form action="{{ route('penapis.add.bahagian.vi') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    {{-- <div class="col-md-4 col-12"> --}}
                                    <div class="pl-3">
                                        <div class="mb-4 text-center">
                                            {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                            <h3 style="color: rgb(39, 80, 71);">Bahagian VI</h3>
                                            <h5 style="color: rgb(39, 80, 71)">Eksport Produk Sawit</h5>
                                            {{-- <p>Maklumat Kilang</p> --}}
                                        </div>
                                        <hr>
                                        <div class="container center mt-4">
                                            <div class="row">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                    Nama Produk</label>
                                                <div class="col-md-6">
                                                    {{-- <fieldset class="form-group">
                                                    <select class="form-select" id="produk"
                                                        style="margin-left:42%; width:40%" name="e101_e4">
                                                        <option selected hidden disabled>Sila Pilih</option>
                                                        @foreach ($produk as $data)
                                                            <option value="{{ $data->prodid }}">
                                                                {{ $data->prodname }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </fieldset> --}}
                                                    <fieldset class="form-group">
                                                        <select class="form-select" id="e101_e4"
                                                            style="margin-left:42%; width:40%" name='e101_e4'>
                                                            <option selected hidden disabled>Sila Pilih Produk</option>
                                                            <option value="KA"> CGRIN - KA
                                                            </option>
                                                            <option value="JN"> I-IST - JN
                                                            </option>
                                                            <option value="JL">13D2PT - JL
                                                            </option>
                                                            <option value="JT">2EHE - JT
                                                            </option>
                                                            <option value="IW">ACEMONO - IW
                                                            </option>
                                                            <option value="CV">AE-1AL - CV
                                                            </option>
                                                            <option value="CN">AE-2A - CN
                                                            </option>
                                                            <option value="AB">AE-3A - AB
                                                            </option>
                                                            <option value="AF">AE-7A - AF
                                                            </option>
                                                            <option value="CY">AE-8A - CY
                                                            </option>
                                                            <option value="CX">AE-9A - CX
                                                            </option>
                                                            <option value="CO">AEO-3A - CO
                                                            </option>
                                                            <option value="CW">AEO-7A - CW
                                                            </option>
                                                            <option value="IH">AFAEG - IH
                                                            </option>
                                                            <option value="M5">AGM - M5
                                                            </option>
                                                            <option value="BN">ALDSTR - BN
                                                            </option>
                                                            <option value="HN">ALKEN - HN
                                                            </option>
                                                            <option value="BM">ALMSTR - BM
                                                            </option>
                                                            <option value="BJ">ALS - BJ
                                                            </option>
                                                            <option value="BL">ALSTR - BL
                                                            </option>
                                                            <option value="BP">ALTSTR - BP
                                                            </option>
                                                            <option value="CI">BASTR - CI
                                                            </option>
                                                            <option value="U8">BE - U8
                                                            </option>
                                                            <option value="HP">BETN - HP
                                                            </option>
                                                            <option value="H9">BOSFP/CBS - H9
                                                            </option>
                                                            <option value="JY">BPES - JY
                                                            </option>
                                                            <option value="X3">BPKL - X3
                                                            </option>
                                                            <option value="C8">BPKL - C8
                                                            </option>
                                                            <option value="X2">BPKO - X2
                                                            </option>
                                                            <option value="DT">BPKO - DT
                                                            </option>
                                                            <option value="BK">BPKOM - BK
                                                            </option>
                                                            <option value="X4">BPKS - X4
                                                            </option>
                                                            <option value="C9">BPKS - C9
                                                            </option>
                                                            <option value="15">BPL - 15
                                                            </option>
                                                            <option value="13">BPO - 13
                                                            </option>
                                                            <option value="14">BPS - 14
                                                            </option>
                                                            <option value="U7">BVO - U7
                                                            </option>
                                                            <option value="91">CA - 91
                                                            </option>
                                                            <option value="AQ">CACACID - AQ
                                                            </option>
                                                            <option value="K1">CAL - K1
                                                            </option>
                                                            <option value="J7">CALC - J7
                                                            </option>
                                                            <option value="P8">CAM(C10) - P8
                                                            </option>
                                                            <option value="P7">CAM(C8) - P7
                                                            </option>
                                                            <option value="M9">CBE - M9
                                                            </option>
                                                            <option value="N0">CBEXT - N0
                                                            </option>
                                                            <option value="82">CBPKO - 82
                                                            </option>
                                                            <option value="N1">CBR - N1
                                                            </option>
                                                            <option value="44">CBS - 44
                                                            </option>
                                                            <option value="S7">CC - S7
                                                            </option>
                                                            <option value="EY">CC FA - EY
                                                            </option>
                                                            <option value="64">CCACID - 64
                                                            </option>
                                                            <option value="S8">CCM - S8
                                                            </option>
                                                            <option value="AR">CDPKOFA - AR
                                                            </option>
                                                            <option value="IX">CETALCOHO - IX
                                                            </option>
                                                            <option value="IY">CETEH - IY
                                                            </option>
                                                            <option value="FL">CETOSAL - FL
                                                            </option>
                                                            <option value="M2">CF - M2
                                                            </option>
                                                            <option value="F9">CG - F9
                                                            </option>
                                                            <option value="E9">CKFA - E9
                                                            </option>
                                                            <option value="CE">CL - CE
                                                            </option>
                                                            <option value="CD">CLA - CD
                                                            </option>
                                                            <option value="O4">CLAL - O4
                                                            </option>
                                                            <option value="CF">CLCA - CF
                                                            </option>
                                                            <option value="47">CO - 47
                                                            </option>
                                                            <option value="I5">COA - I5
                                                            </option>
                                                            <option value="81">COCA - 81
                                                            </option>
                                                            <option value="FK">CPAL - FK
                                                            </option>
                                                            <option value="06">CPKL - 06
                                                            </option>
                                                            <option value="04">CPKO - 04
                                                            </option>
                                                            <option value="05">CPKS - 05
                                                            </option>
                                                            <option value="03">CPL - 03
                                                            </option>
                                                            <option value="01">CPO - 01
                                                            </option>
                                                            <option value="02">CPS - 02
                                                            </option>
                                                            <option value="J2">CRA - J2
                                                            </option>
                                                            <option value="O5">CRAL - O5
                                                            </option>
                                                            <option value="P1">CSAL - P1
                                                            </option>
                                                            <option value="E7">CSFA - E7
                                                            </option>
                                                            <option value="BF">CSOAP - BF
                                                            </option>
                                                            <option value="EK">CSUPSFA - EK
                                                            </option>
                                                            <option value="FM">CTENE - FM
                                                            </option>
                                                            <option value="AS">CUPKOFA - AS
                                                            </option>
                                                            <option value="86">DF - 86
                                                            </option>
                                                            <option value="V7">DFPL - V7
                                                            </option>
                                                            <option value="Y3">DFRBDPKL - Y3
                                                            </option>
                                                            <option value="Y4">DFRBDPKS - Y4
                                                            </option>
                                                            <option value="Z9">DFRBDPL - Z9
                                                            </option>
                                                            <option value="CZ">DFRDBPS - CZ
                                                            </option>
                                                            <option value="DV">DFS - DV
                                                            </option>
                                                            <option value="CG">DG - CG
                                                            </option>
                                                            <option value="J5">DHFA - J5
                                                            </option>
                                                            <option value="FI">DIE_SPO - FI
                                                            </option>
                                                            <option value="EA">DIGO - EA
                                                            </option>
                                                            <option value="JP">DLOL - JP
                                                            </option>
                                                            <option value="EJ">DMAL - EJ
                                                            </option>
                                                            <option value="HQ">DMDGLY - HQ
                                                            </option>
                                                            <option value="EQ">DMFA - EQ
                                                            </option>
                                                            <option value="H8">DMFAO - H8
                                                            </option>
                                                            <option value="ER">DMGLY - ER
                                                            </option>
                                                            <option value="96">DMO - 96
                                                            </option>
                                                            <option value="EI">DMPKOFA - EI
                                                            </option>
                                                            <option value="O1">DMPKOFA - O1
                                                            </option>
                                                            <option value="N9">DMPOFA - N9
                                                            </option>
                                                            <option value="O0">DMPSFA - O0
                                                            </option>
                                                            <option value="J4">DOA - J4
                                                            </option>
                                                            <option value="AT">DPKOFA - AT
                                                            </option>
                                                            <option value="99">DPKOFA - 99
                                                            </option>
                                                            <option value="85">DPL - 85
                                                            </option>
                                                            <option value="84">DPO - 84
                                                            </option>
                                                            <option value="N6">DPOFA - N6
                                                            </option>
                                                            <option value="O3">DPSA - O3
                                                            </option>
                                                            <option value="N7">DPSFA - N7
                                                            </option>
                                                            <option value="DS">DPST - DS
                                                            </option>
                                                            <option value="JH">DR RBDPL - JH
                                                            </option>
                                                            <option value="F6">DRBDPO - F6
                                                            </option>
                                                            <option value="U1">DS - U1
                                                            </option>
                                                            <option value="IK">DTAEM - IK
                                                            </option>
                                                            <option value="DN">EBS - DN
                                                            </option>
                                                            <option value="DH">EDENOR - DH
                                                            </option>
                                                            <option value="FO">EFB - FO
                                                            </option>
                                                            <option value="AX">EGD - AX
                                                            </option>
                                                            <option value="ES">EGMS - ES
                                                            </option>
                                                            <option value="FP">EHO - FP
                                                            </option>
                                                            <option value="AU">EHP - AU
                                                            </option>
                                                            <option value="AV">EHS - AV
                                                            </option>
                                                            <option value="BT">EMUL - BT
                                                            </option>
                                                            <option value="IZ">ETHHL - IZ
                                                            </option>
                                                            <option value="R0">F-GEE - R0
                                                            </option>
                                                            <option value="R1">F-GG - R1
                                                            </option>
                                                            <option value="83">FA - 83
                                                            </option>
                                                            <option value="DG">FADR - DG
                                                            </option>
                                                            <option value="JX">FAl C10-12 - JX
                                                            </option>
                                                            <option value="DZ">FALRES - DZ
                                                            </option>
                                                            <option value="A4">FAME - A4
                                                            </option>
                                                            <option value="H4">FAMIN - H4
                                                            </option>
                                                            <option value="M6">FAP - M6
                                                            </option>
                                                            <option value="46">FB - 46
                                                            </option>
                                                            <option value="I9">FFA - I9
                                                            </option>
                                                            <option value="A0">FLO - A0
                                                            </option>
                                                            <option value="DE">FW - DE
                                                            </option>
                                                            <option value="JJ">G3TE - JJ
                                                            </option>
                                                            <option value="IN">GC - IN
                                                            </option>
                                                            <option value="K7">GD - K7
                                                            </option>
                                                            <option value="JC">GLYDIS - JC
                                                            </option>
                                                            <option value="JA">GLYMONOCA - JA
                                                            </option>
                                                            <option value="JB">GLYMONOLA - JB
                                                            </option>
                                                            <option value="R2">GM - R2
                                                            </option>
                                                            <option value="HO">GMST - HO
                                                            </option>
                                                            <option value="EP">GPT - EP
                                                            </option>
                                                            <option value="EL">GTC - EL
                                                            </option>
                                                            <option value="R4">GTP - R4
                                                            </option>
                                                            <option value="R3">GTS - R3
                                                            </option>
                                                            <option value="ID">GTT - ID
                                                            </option>
                                                            <option value="CH">GW - CH
                                                            </option>
                                                            <option value="L6">HCAL - L6
                                                            </option>
                                                            <option value="D7">HCBST - D7
                                                            </option>
                                                            <option value="AH">HCE - AH
                                                            </option>
                                                            <option value="Q1">HCM - Q1
                                                            </option>
                                                            <option value="H0">HDFPL - H0
                                                            </option>
                                                            <option value="I6">HDRBDSFA - I6
                                                            </option>
                                                            <option value="ED">HEA - ED
                                                            </option>
                                                            <option value="L3">HFAO - L3
                                                            </option>
                                                            <option value="B3">HFFAPO - B3
                                                            </option>
                                                            <option value="DU">HFV - DU
                                                            </option>
                                                            <option value="BR">HL - BR
                                                            </option>
                                                            <option value="E8">HMFA - E8
                                                            </option>
                                                            <option value="D2">HNBDPKL - D2
                                                            </option>
                                                            <option value="D5">HNBDPKO - D5
                                                            </option>
                                                            <option value="D6">HNBDPKS - D6
                                                            </option>
                                                            <option value="D3">HNBPKL - D3
                                                            </option>
                                                            <option value="D1">HNBPKO - D1
                                                            </option>
                                                            <option value="D4">HNBPKS - D4
                                                            </option>
                                                            <option value="Y7">HNPL - Y7
                                                            </option>
                                                            <option value="BS">HP - BS
                                                            </option>
                                                            <option value="G2">HPF - G2
                                                            </option>
                                                            <option value="87">HPFAD - 87
                                                            </option>
                                                            <option value="DA">HPKF - DA
                                                            </option>
                                                            <option value="E6">HPKFA - E6
                                                            </option>
                                                            <option value="C6">HPKL - C6
                                                            </option>
                                                            <option value="54">HPKO - 54
                                                            </option>
                                                            <option value="C7">HPKOFA - C7
                                                            </option>
                                                            <option value="65">HPKS - 65
                                                            </option>
                                                            <option value="C3">HPL - C3
                                                            </option>
                                                            <option value="Y9">HPMF - Y9
                                                            </option>
                                                            <option value="55">HPO - 55
                                                            </option>
                                                            <option value="69">HPOFA - 69
                                                            </option>
                                                            <option value="H7">HPPS - H7
                                                            </option>
                                                            <option value="B9">HPS - B9
                                                            </option>
                                                            <option value="E2">HPSA - E2
                                                            </option>
                                                            <option value="V5">HPSA - V5
                                                            </option>
                                                            <option value="N8">HPSFA - N8
                                                            </option>
                                                            <option value="W1">HRBDDFL - W1
                                                            </option>
                                                            <option value="73">HRBDPKL - 73
                                                            </option>
                                                            <option value="72">HRBDPKO - 72
                                                            </option>
                                                            <option value="74">HRBDPKS - 74
                                                            </option>
                                                            <option value="A3">HRBDPL - A3
                                                            </option>
                                                            <option value="H2">HRBDPO - H2
                                                            </option>
                                                            <option value="B6">HRBDSF - B6
                                                            </option>
                                                            <option value="B8">HRBDST - B8
                                                            </option>
                                                            <option value="D9">HSFA - D9
                                                            </option>
                                                            <option value="E5">HSSA - E5
                                                            </option>
                                                            <option value="AJ">HVF - AJ
                                                            </option>
                                                            <option value="C0">HVG - C0
                                                            </option>
                                                            <option value="78">HVO - 78
                                                            </option>
                                                            <option value="Q7">I-BO - Q7
                                                            </option>
                                                            <option value="Q6">I-OO - Q6
                                                            </option>
                                                            <option value="Q5">I-OS - Q5
                                                            </option>
                                                            <option value="FG">I-PA - FG
                                                            </option>
                                                            <option value="Q8">I-PO - Q8
                                                            </option>
                                                            <option value="Q9">I-PP - Q9
                                                            </option>
                                                            <option value="FA">IEFAT - FA
                                                            </option>
                                                            <option value="B4">IGPO - B4
                                                            </option>
                                                            <option value="IR">IL - IR
                                                            </option>
                                                            <option value="DX">IMO - DX
                                                            </option>
                                                            <option value="Z3">IMPF - Z3
                                                            </option>
                                                            <option value="H5">IMVF - H5
                                                            </option>
                                                            <option value="Z2">IMVO - Z2
                                                            </option>
                                                            <option value="Z7">INTER PKO - Z7
                                                            </option>
                                                            <option value="X8">INTER PL - X8
                                                            </option>
                                                            <option value="Z6">INTER PO - Z6
                                                            </option>
                                                            <option value="DK">INTERPST - DK
                                                            </option>
                                                            <option value="DL">INTFATBLD - DL
                                                            </option>
                                                            <option value="BU">IPL - BU
                                                            </option>
                                                            <option value="EH">IPL - EH
                                                            </option>
                                                            <option value="L8">IPM - L8
                                                            </option>
                                                            <option value="Z4">JGQ RBDPO - Z4
                                                            </option>
                                                            <option value="AA">JGQRBDPKOS - AA
                                                            </option>
                                                            <option value="CJ">KSTR - CJ
                                                            </option>
                                                            <option value="R5">L-MA - R5
                                                            </option>
                                                            <option value="O7">L-MAL - O7
                                                            </option>
                                                            <option value="39">LA - 39
                                                            </option>
                                                            <option value="K3">LAC - K3
                                                            </option>
                                                            <option value="IL">LAEM - IL
                                                            </option>
                                                            <option value="J8">LAL - J8
                                                            </option>
                                                            <option value="S6">LAM - S6
                                                            </option>
                                                            <option value="EW">LCA - EW
                                                            </option>
                                                            <option value="AC">LCE - AC
                                                            </option>
                                                            <option value="P9">LCM(CE810) - P9
                                                            </option>
                                                            <option value="89">LE - 89
                                                            </option>
                                                            <option value="DB">LE - DB
                                                            </option>
                                                            <option value="B7">LFAD - B7
                                                            </option>
                                                            <option value="BC">LGA - BC
                                                            </option>
                                                            <option value="EE">LINA - EE
                                                            </option>
                                                            <option value="DC">LP - DC
                                                            </option>
                                                            <option value="O9">LSAL - O9
                                                            </option>
                                                            <option value="42">M - 42
                                                            </option>
                                                            <option value="75">MA - 75
                                                            </option>
                                                            <option value="J9">MAL - J9
                                                            </option>
                                                            <option value="59">MAO - 59
                                                            </option>
                                                            <option value="FC">MAOIL - FC
                                                            </option>
                                                            <option value="BW">MC - BW
                                                            </option>
                                                            <option value="P5">MC1214FA - P5
                                                            </option>
                                                            <option value="P6">MC1618FA - P6
                                                            </option>
                                                            <option value="P4">MC810FA - P4
                                                            </option>
                                                            <option value="P2">MCAL - P2
                                                            </option>
                                                            <option value="AE">MCE - AE
                                                            </option>
                                                            <option value="BX">MCL - BX
                                                            </option>
                                                            <option value="BY">MCLC - BY
                                                            </option>
                                                            <option value="Q0">MCM(CE1214 - Q0
                                                            </option>
                                                            <option value="BV">MCT - BV
                                                            </option>
                                                            <option value="70">ME - 70
                                                            </option>
                                                            <option value="EC">MEA - EC
                                                            </option>
                                                            <option value="71">MER - 71
                                                            </option>
                                                            <option value="FB">MES - FB
                                                            </option>
                                                            <option value="IE">MFA - IE
                                                            </option>
                                                            <option value="I1">MFAO - I1
                                                            </option>
                                                            <option value="S0">MFES - S0
                                                            </option>
                                                            <option value="FT">MFOH - FT
                                                            </option>
                                                            <option value="FU">MFOHLE - FU
                                                            </option>
                                                            <option value="GT">MGLY - GT
                                                            </option>
                                                            <option value="BE">MGSOAP - BE
                                                            </option>
                                                            <option value="CK">MGSTR - CK
                                                            </option>
                                                            <option value="K8">ML - K8
                                                            </option>
                                                            <option value="FS">MLFA - FS
                                                            </option>
                                                            <option value="EU">MLM - EU
                                                            </option>
                                                            <option value="FD">MLP - FD
                                                            </option>
                                                            <option value="JR">MLS - JR
                                                            </option>
                                                            <option value="Q2">MM - Q2
                                                            </option>
                                                            <option value="Q3">MO - Q3
                                                            </option>
                                                            <option value="IO">MONOGLY - IO
                                                            </option>
                                                            <option value="K6">MP - K6
                                                            </option>
                                                            <option value="BZ">MPS - BZ
                                                            </option>
                                                            <option value="K5">MS - K5
                                                            </option>
                                                            <option value="S1">MSOAP - S1
                                                            </option>
                                                            <option value="I4">MVAO - I4
                                                            </option>
                                                            <option value="KB">MVORBDPLMB - KB
                                                            </option>
                                                            <option value="EN">MVO_CPKO - EN
                                                            </option>
                                                            <option value="GV">MVO_PMF - GV
                                                            </option>
                                                            <option value="Y2">MVO_RBDPKL - Y2
                                                            </option>
                                                            <option value="Y1">MVO_RBDPKO - Y1
                                                            </option>
                                                            <option value="Y0">MVO_RBDPL - Y0
                                                            </option>
                                                            <option value="X9">MVO_RBDPO - X9
                                                            </option>
                                                            <option value="BO">MVO_RBDPS - BO
                                                            </option>
                                                            <option value="Q4">N-BO - Q4
                                                            </option>
                                                            <option value="CL">NASTR - CL
                                                            </option>
                                                            <option value="GA">NBDDFPL - GA
                                                            </option>
                                                            <option value="Y6">NBDHPL - Y6
                                                            </option>
                                                            <option value="W3">NBDHPO - W3
                                                            </option>
                                                            <option value="W5">NBDHPS - W5
                                                            </option>
                                                            <option value="A6">NBDPKL - A6
                                                            </option>
                                                            <option value="68">NBDPKO - 68
                                                            </option>
                                                            <option value="66">NBDPKS - 66
                                                            </option>
                                                            <option value="28">NBDPL - 28
                                                            </option>
                                                            <option value="JW">NBDPLRS - JW
                                                            </option>
                                                            <option value="HM">NBDPMF - HM
                                                            </option>
                                                            <option value="24">NBDPO3 - 24
                                                            </option>
                                                            <option value="22">NBDPO6 - 22
                                                            </option>
                                                            <option value="26">NBDPS - 26
                                                            </option>
                                                            <option value="X6">NBHPKL - X6
                                                            </option>
                                                            <option value="X5">NBHPKO - X5
                                                            </option>
                                                            <option value="X7">NBHPKS - X7
                                                            </option>
                                                            <option value="W7">NBHPL - W7
                                                            </option>
                                                            <option value="Y8">NBHPL - Y8
                                                            </option>
                                                            <option value="W6">NBHPO - W6
                                                            </option>
                                                            <option value="W8">NBHPS - W8
                                                            </option>
                                                            <option value="H6">NBIF - H6
                                                            </option>
                                                            <option value="K0">NBIOL - K0
                                                            </option>
                                                            <option value="L0">NBIS - L0
                                                            </option>
                                                            <option value="A1">NBPKL - A1
                                                            </option>
                                                            <option value="57">NBPKO - 57
                                                            </option>
                                                            <option value="A8">NBPKS - A8
                                                            </option>
                                                            <option value="20">NBPL - 20
                                                            </option>
                                                            <option value="16">NBPO - 16
                                                            </option>
                                                            <option value="18">NBPS - 18
                                                            </option>
                                                            <option value="L5">NBS - L5
                                                            </option>
                                                            <option value="S3">NFA - S3
                                                            </option>
                                                            <option value="IA">NGD - IA
                                                            </option>
                                                            <option value="IU">NGDD - IU
                                                            </option>
                                                            <option value="G9">NO - G9
                                                            </option>
                                                            <option value="A5">NPKL - A5
                                                            </option>
                                                            <option value="58">NPKO - 58
                                                            </option>
                                                            <option value="A7">NPKS - A7
                                                            </option>
                                                            <option value="11">NPL - 11
                                                            </option>
                                                            <option value="07">NPO - 07
                                                            </option>
                                                            <option value="09">NPS - 09
                                                            </option>
                                                            <option value="36">OA - 36
                                                            </option>
                                                            <option value="FH">OAL - FH
                                                            </option>
                                                            <option value="JQ">OCTPTE - JQ
                                                            </option>
                                                            <option value="O6">ODAL - O6
                                                            </option>
                                                            <option value="Z0">OPF - Z0
                                                            </option>
                                                            <option value="EX">OPFMAT - EX
                                                            </option>
                                                            <option value="P0">OSAL - P0
                                                            </option>
                                                            <option value="37">PA - 37
                                                            </option>
                                                            <option value="34">PAO - 34
                                                            </option>
                                                            <option value="BI">PDME - BI
                                                            </option>
                                                            <option value="II">PE - II
                                                            </option>
                                                            <option value="JZ">PESFAH - JZ
                                                            </option>
                                                            <option value="M3">PF - M3
                                                            </option>
                                                            <option value="35">PFAD - 35
                                                            </option>
                                                            <option value="DF">PFAME - DF
                                                            </option>
                                                            <option value="C4">PFARES - C4
                                                            </option>
                                                            <option value="DW">PFAT - DW
                                                            </option>
                                                            <option value="CU">PFIBRE - CU
                                                            </option>
                                                            <option value="BH">PG1M - BH
                                                            </option>
                                                            <option value="IB">PGDD - IB
                                                            </option>
                                                            <option value="IQ">PGDO - IQ
                                                            </option>
                                                            <option value="IF">PGEFA - IF
                                                            </option>
                                                            <option value="BA">PGM - BA
                                                            </option>
                                                            <option value="JS">PGMO - JS
                                                            </option>
                                                            <option value="JK">PGMONO - JK
                                                            </option>
                                                            <option value="AY">PGP - AY
                                                            </option>
                                                            <option value="EG">PHG - EG
                                                            </option>
                                                            <option value="R8">PIT O - R8
                                                            </option>
                                                            <option value="C1">PKAO - C1
                                                            </option>
                                                            <option value="EM">PKDEA - EM
                                                            </option>
                                                            <option value="79">PKF - 79
                                                            </option>
                                                            <option value="Z8">PKFA - Z8
                                                            </option>
                                                            <option value="56">PKFAD - 56
                                                            </option>
                                                            <option value="53">PKME - 53
                                                            </option>
                                                            <option value="EV">PKMF - EV
                                                            </option>
                                                            <option value="M1">PKOF - M1
                                                            </option>
                                                            <option value="77">PKOFA - 77
                                                            </option>
                                                            <option value="P3">PKOFAL - P3
                                                            </option>
                                                            <option value="CA">PKOM - CA
                                                            </option>
                                                            <option value="E3">PKORES - E3
                                                            </option>
                                                            <option value="Z1">PKS - Z1
                                                            </option>
                                                            <option value="CB">PLM - CB
                                                            </option>
                                                            <option value="45">PMF - 45
                                                            </option>
                                                            <option value="C2">POFAL - C2
                                                            </option>
                                                            <option value="C5">POME - C5
                                                            </option>
                                                            <option value="IM">PP - IM
                                                            </option>
                                                            <option value="FF">PRE ST - FF
                                                            </option>
                                                            <option value="FQ">PREFA - FQ
                                                            </option>
                                                            <option value="DI">PRLFAT - DI
                                                            </option>
                                                            <option value="G5">PRYO - G5
                                                            </option>
                                                            <option value="AZ">PS - AZ
                                                            </option>
                                                            <option value="V6">PSA - V6
                                                            </option>
                                                            <option value="97">PSFA - 97
                                                            </option>
                                                            <option value="92">PSME - 92
                                                            </option>
                                                            <option value="R9">PSOA - R9
                                                            </option>
                                                            <option value="IC">PTS - IC
                                                            </option>
                                                            <option value="IS">PTT - IS
                                                            </option>
                                                            <option value="Y5">PWAX - Y5
                                                            </option>
                                                            <option value="AD">RBD SL - AD
                                                            </option>
                                                            <option value="D0">RBDBO - D0
                                                            </option>
                                                            <option value="X0">RBDHPKL - X0
                                                            </option>
                                                            <option value="W9">RBDHPKO - W9
                                                            </option>
                                                            <option value="X1">RBDHPKS - X1
                                                            </option>
                                                            <option value="V9">RBDHPL - V9
                                                            </option>
                                                            <option value="B0">RBDHPMF - B0
                                                            </option>
                                                            <option value="W2">RBDHPMF - W2
                                                            </option>
                                                            <option value="V8">RBDHPO - V8
                                                            </option>
                                                            <option value="W0">RBDHPS - W0
                                                            </option>
                                                            <option value="E0">RBDMO - E0
                                                            </option>
                                                            <option value="F5">RBDPFAD - F5
                                                            </option>
                                                            <option value="32">RBDPKL - 32
                                                            </option>
                                                            <option value="GG">RBDPKL IP - GG
                                                            </option>
                                                            <option value="GE">RBDPKL MB - GE
                                                            </option>
                                                            <option value="GF">RBDPKL SG - GF
                                                            </option>
                                                            <option value="30">RBDPKO - 30
                                                            </option>
                                                            <option value="31">RBDPKS - 31
                                                            </option>
                                                            <option value="29">RBDPL - 29
                                                            </option>
                                                            <option value="25">RBDPO3 - 25
                                                            </option>
                                                            <option value="23">RBDPO6 - 23
                                                            </option>
                                                            <option value="27">RBDPS - 27
                                                            </option>
                                                            <option value="AL">RBDPSH - AL
                                                            </option>
                                                            <option value="21">RBPL - 21
                                                            </option>
                                                            <option value="17">RBPO - 17
                                                            </option>
                                                            <option value="19">RBPS - 19
                                                            </option>
                                                            <option value="Z5">RED PSL - Z5
                                                            </option>
                                                            <option value="DJ">REDPO - DJ
                                                            </option>
                                                            <option value="JV">RefGly - JV
                                                            </option>
                                                            <option value="B5">RESD - B5
                                                            </option>
                                                            <option value="U0">RFS - U0
                                                            </option>
                                                            <option value="G1">RG - G1
                                                            </option>
                                                            <option value="T1">RHPS - T1
                                                            </option>
                                                            <option value="G4">RL - G4
                                                            </option>
                                                            <option value="M7">RPKL - M7
                                                            </option>
                                                            <option value="G3">RPKO - G3
                                                            </option>
                                                            <option value="M8">RPKS - M8
                                                            </option>
                                                            <option value="12">RPL - 12
                                                            </option>
                                                            <option value="08">RPO - 08
                                                            </option>
                                                            <option value="10">RPS - 10
                                                            </option>
                                                            <option value="40">SA - 40
                                                            </option>
                                                            <option value="BQ">SA(IV&gt;1) - BQ
                                                            </option>
                                                            <option value="O8">SAL - O8
                                                            </option>
                                                            <option value="M4">SAP - M4
                                                            </option>
                                                            <option value="DD">SBE - DD
                                                            </option>
                                                            <option value="G6">SBO - G6
                                                            </option>
                                                            <option value="IJ">SE - IJ
                                                            </option>
                                                            <option value="43">SH - 43
                                                            </option>
                                                            <option value="D8">SHPFA - D8
                                                            </option>
                                                            <option value="N5">SHPKOFA - N5
                                                            </option>
                                                            <option value="E1">SHPS - E1
                                                            </option>
                                                            <option value="EF">SHPSFA - EF
                                                            </option>
                                                            <option value="I7">SHRBDSFA - I7
                                                            </option>
                                                            <option value="H1">SL - H1
                                                            </option>
                                                            <option value="HK">SLES - HK
                                                            </option>
                                                            <option value="IV">SML - IV
                                                            </option>
                                                            <option value="BB">SMO - BB
                                                            </option>
                                                            <option value="JM">SMONOS - JM
                                                            </option>
                                                            <option value="A9">SN - A9
                                                            </option>
                                                            <option value="49">SO - 49
                                                            </option>
                                                            <option value="48">SOAP - 48
                                                            </option>
                                                            <option value="AP">SOCF - AP
                                                            </option>
                                                            <option value="AO">SOCO - AO
                                                            </option>
                                                            <option value="JD">SORTRISTE - JD
                                                            </option>
                                                            <option value="80">SPAO - 80
                                                            </option>
                                                            <option value="98">SPFA - 98
                                                            </option>
                                                            <option value="K2">SPFAD - K2
                                                            </option>
                                                            <option value="A2">SPKFA - A2
                                                            </option>
                                                            <option value="S9">SPKLA - S9
                                                            </option>
                                                            <option value="FZ">SPKLFA - FZ
                                                            </option>
                                                            <option value="CC">SPKOM - CC
                                                            </option>
                                                            <option value="BG">SPPHPKOFA - BG
                                                            </option>
                                                            <option value="O2">SPSA - O2
                                                            </option>
                                                            <option value="67">SPSFA - 67
                                                            </option>
                                                            <option value="F0">SPST - F0
                                                            </option>
                                                            <option value="JI">SPTE - JI
                                                            </option>
                                                            <option value="R6">SRBDS - R6
                                                            </option>
                                                            <option value="IG">SSL - IG
                                                            </option>
                                                            <option value="EB">STT - EB
                                                            </option>
                                                            <option value="JO">SULMETERS - JO
                                                            </option>
                                                            <option value="I0">SW - I0
                                                            </option>
                                                            <option value="EO">TFPS - EO
                                                            </option>
                                                            <option value="L7">TG - L7
                                                            </option>
                                                            <option value="F2">TKFA - F2
                                                            </option>
                                                            <option value="JU">TMP TO - JU
                                                            </option>
                                                            <option value="I3">TOCO - I3
                                                            </option>
                                                            <option value="S4">TPKP - S4
                                                            </option>
                                                            <option value="K4">TPSA - K4
                                                            </option>
                                                            <option value="IT">TPT - IT
                                                            </option>
                                                            <option value="FN">TRIE - FN
                                                            </option>
                                                            <option value="JE">TRIPK - JE
                                                            </option>
                                                            <option value="JF">TRITC - JF
                                                            </option>
                                                            <option value="JG">TRITPKO - JG
                                                            </option>
                                                            <option value="AG">TSFA - AG
                                                            </option>
                                                            <option value="IP">TTPTC - IP
                                                            </option>
                                                            <option value="FR">UCOME - FR
                                                            </option>
                                                            <option value="CM">UFO - CM
                                                            </option>
                                                            <option value="N4">UMPKOFA - N4
                                                            </option>
                                                            <option value="N2">UMPOFA - N2
                                                            </option>
                                                            <option value="N3">UMPSFA - N3
                                                            </option>
                                                            <option value="61">US - 61
                                                            </option>
                                                            <option value="F8">VC - F8
                                                            </option>
                                                            <option value="AK">VCO - AK
                                                            </option>
                                                            <option value="I2">VEGPO - I2
                                                            </option>
                                                            <option value="M0">VF - M0
                                                            </option>
                                                            <option value="DY">VFM - DY
                                                            </option>
                                                            <option value="41">VG - 41
                                                            </option>
                                                            <option value="AN">VO - AN
                                                            </option>
                                                            <option value="T7">VOL - T7
                                                            </option>
                                                            <option value="AM">VPL - AM
                                                            </option>
                                                            <option value="DR">VPO - DR
                                                            </option>
                                                            <option value="AI">VSO - AI
                                                            </option>
                                                            <option value="DM">ZNLAURATE - DM
                                                            </option>
                                                            <option value="BD">ZSOAP - BD
                                                            </option>

                                                        </select>
                                                    </fieldset>
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                    Nombor Borang Kastam 2</label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name='e101_e5'
                                                        style="margin-left:42%; width:40%" id="e101_e5" required
                                                        title="Sila isikan butiran ini.">
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                    Tarikh Eksport (dd/mm/yyyy) </label>
                                                <div class="col-md-6">
                                                    <input type="date" class="form-control" name='e101_e6'
                                                        style="margin-left:42%; width:40%" id="e101_e6" required
                                                        title="Sila isikan butiran ini.">
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                    Kuantiti(Tan Metrik) </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name='e101_e7'
                                                        style="margin-left:42%; width:40%" id="e101_e7" required
                                                        title="Sila isikan butiran ini.">
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                    Nilai</label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name='e101_e8'
                                                        style="margin-left:42%; width:40%" id="e101_e8" required
                                                        title="Sila isikan butiran ini.">
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                    Destinasi Negara</label>
                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <select class="form-select" id="e101_e9"
                                                            style="margin-left:42%; width:40%" name="e101_e9">
                                                            <option selected hidden disabled>Sila Pilih</option>
                                                            @foreach ($negara as $data)
                                                                <option value="{{ $data->kodnegara }}">
                                                                    {{ $data->namanegara }}
                                                                </option>
                                                            @endforeach

                                                        </select>
                                                    </fieldset>
                                                    {{-- <fieldset class="form-group">
                                                    <select class="form-select" id="basicSelect" style="margin-left:42%; width:40%">
                                                        <option selected hidden disabled>Sila Pilih Negara</option>

                                                        </option><option value="A01">AFGHANISTAN
                                                        </option><option value="A02">ALBANIA
                                                        </option><option value="A03">ALGERIA
                                                        </option><option value="A05">ANGOLA
                                                        </option><option value="A06">ANGUILLA
                                                        </option><option value="A07">ANTIGUA
                                                        </option><option value="A08">ARGENTINA
                                                        </option><option value="A09">AUSTRALIA
                                                        </option><option value="A10">AUSTRIA
                                                        </option><option value="A12">ARMENIA
                                                        </option><option value="A13">AZERBAIJAN
                                                        </option><option value="A14">AMERICAN SAMOA
                                                        </option><option value="A15">ANDORRA
                                                        </option><option value="B01">BAHAMAS
                                                        </option><option value="B02">BAHRAIN
                                                        </option><option value="B03">BANGLADESH
                                                        </option><option value="B04">BARBADOS
                                                        </option><option value="B05">BELGIUM
                                                        </option><option value="B06">BERMUDA
                                                        </option><option value="B07">BHUTAN
                                                        </option><option value="B08">BOLIVIA
                                                        </option><option value="B09">BOTSWANA
                                                        </option><option value="B10">BRAZIL
                                                        </option><option value="B11">BRUNEI
                                                        </option><option value="B12">BULGARIA
                                                        </option><option value="B14">BURUNDI
                                                        </option><option value="B15">BENIN
                                                        </option><option value="B16">BELARUS
                                                        </option><option value="B17">BELIZE
                                                        </option><option value="B18">BOSNIA  AND HERZEGOVINA
                                                        </option><option value="B19">BULKINA FASO
                                                        </option><option value="B20">BRITISH VIRGIN ISLANDS
                                                        </option><option value="C01">CAMEROON
                                                        </option><option value="C02">CANADA
                                                        </option><option value="C03">CHAD
                                                        </option><option value="C04">CHILE
                                                        </option><option value="C05">CHINA
                                                        </option><option value="C06">COLOMBIA
                                                        </option><option value="C07">CONGO, DEMOCRATIC REP. OF THE
                                                        </option><option value="C08">COSTA RICA
                                                        </option><option value="C09">CUBA
                                                        </option><option value="C10">CYPRUS
                                                        </option><option value="C11">CZECH
                                                        </option><option value="C12">CROATIA
                                                        </option><option value="C14">CAMBODIA
                                                        </option><option value="C15">COMOROS
                                                        </option><option value="C16">CHECHNYA
                                                        </option><option value="C17">CENTRAL AFRICAN REPUBLIC
                                                        </option><option value="C18">CAPE VERDE
                                                        </option><option value="C19">COOK ISLANDS
                                                        </option><option value="C20">CASTRIES
                                                        </option><option value="C21">CURACAO
                                                        </option><option value="C22">COMMONWEALTH OF DOMINICA
                                                        </option><option value="D01">DAHOMEY
                                                        </option><option value="D02">DENMARK
                                                        </option><option value="D03">DOMINICA
                                                        </option><option value="D04">DJIBOUTI
                                                        </option><option value="D05">DOMINICAN REPUBLIC
                                                        </option><option value="E01">ECUADOR
                                                        </option><option value="E02">EGYPT
                                                        </option><option value="E03">EL SALVADOR
                                                        </option><option value="E04">ETHIOPIA
                                                        </option><option value="E05">ERITREA
                                                        </option><option value="E06">ESTONIA
                                                        </option><option value="E07">EAST TIMOR
                                                        </option><option value="E08">EQUATORIAL GUINEA
                                                        </option><option value="F01">FIJI
                                                        </option><option value="F02">FINLAND
                                                        </option><option value="F03">FRANCE
                                                        </option><option value="F04">FRENCH POLYNESIA
                                                        </option><option value="G01">GABON
                                                        </option><option value="G02">GUAM
                                                        </option><option value="G03">GERMANY
                                                        </option><option value="G04">GHANA
                                                        </option><option value="G05">GIBRALTAR
                                                        </option><option value="G06">GREECE
                                                        </option><option value="G07">GRENADA
                                                        </option><option value="G08">GUATEMALA
                                                        </option><option value="G09">GUINEA
                                                        </option><option value="G10">GUYANA
                                                        </option><option value="G11">GAMBIA
                                                        </option><option value="G12">GEORGIA
                                                        </option><option value="G13">GERMANY, DEMOCRATIC REP. OF
                                                        </option><option value="G14">GUINEA BISSAU
                                                        </option><option value="G15">GUADELOUPE
                                                        </option><option value="H01">HAITI
                                                        </option><option value="H03">HONDURAS
                                                        </option><option value="H04">HONG KONG
                                                        </option><option value="H05">HUNGARY
                                                        </option><option value="I01">ICELAND
                                                        </option><option value="I02">INDIA
                                                        </option><option value="I03">INDONESIA
                                                        </option><option value="I04">IRAN
                                                        </option><option value="I05">IRAQ
                                                        </option><option value="I06">IRELAND REP.
                                                        </option><option value="I07">ISRAEL
                                                        </option><option value="I08">ITALY
                                                        </option><option value="I09">COTE D'IVOIRE
                                                        </option><option value="J01">JAMAICA
                                                        </option><option value="J02">JAPAN
                                                        </option><option value="J03">JORDAN
                                                        </option><option value="K02">KENYA
                                                        </option><option value="K04">NORTH KOREA
                                                        </option><option value="K05">SOUTH KOREA
                                                        </option><option value="K06">KUWAIT
                                                        </option><option value="K08">KAZAKHSTAN
                                                        </option><option value="K09">KYRGYZSTAN
                                                        </option><option value="K10">KIRIBATI
                                                        </option><option value="K45">KIRIBATI
                                                        </option><option value="L01">LAOS
                                                        </option><option value="L02">LEBANON
                                                        </option><option value="L03">LESOTHO
                                                        </option><option value="L04">LIBERIA
                                                        </option><option value="L05">LIBYA
                                                        </option><option value="L06">LIECHTENSTEIN
                                                        </option><option value="L07">LUXEMBOURG
                                                        </option><option value="L08">LATVIA
                                                        </option><option value="L09">LITHUANIA
                                                        </option><option value="M02">MALAWI
                                                        </option><option value="M03">MALAYSIA
                                                        </option><option value="M04">MALI
                                                        </option><option value="M05">MALTA
                                                        </option><option value="M06">MAURITANIA
                                                        </option><option value="M07">MAURITIUS
                                                        </option><option value="M08">MEXICO
                                                        </option><option value="M09">MONACO
                                                        </option><option value="M10">MONGOLIA
                                                        </option><option value="M11">MONTSERRAT
                                                        </option><option value="M12">MOROCCO
                                                        </option><option value="M13">MOZAMBIQUE
                                                        </option><option value="M14">MALDIVES
                                                        </option><option value="M15">MADAGASCAR
                                                        </option><option value="M16">MOLDOVA
                                                        </option><option value="M17">MYANMAR
                                                        </option><option value="M18">MUSCAT
                                                        </option><option value="M19">MACAU
                                                        </option><option value="M20">MACEDONIA
                                                        </option><option value="M21">MAYOTTE
                                                        </option><option value="M22">MARSHALL ISLAND
                                                        </option><option value="M23">MICRONESIA FEDERATION
                                                        </option><option value="M24">MONTENEGRO
                                                        </option><option value="N01">NAURU
                                                        </option><option value="N02">NEPAL
                                                        </option><option value="N03">NETHERLANDS
                                                        </option><option value="N04">NEW ZEALAND
                                                        </option><option value="N05">NICARAGUA
                                                        </option><option value="N06">NIGER
                                                        </option><option value="N07">NIGERIA
                                                        </option><option value="N08">NORWAY
                                                        </option><option value="N09">NAMIBIA
                                                        </option><option value="N10">NEW CALEDONIA
                                                        </option><option value="N11">NETHERLANDS ANTILLES
                                                        </option><option value="N12">NORTHERN MARIANA ISLANDS
                                                        </option><option value="O01">OMAN
                                                        </option><option value="P01">PAKISTAN
                                                        </option><option value="P02">PANAMA
                                                        </option><option value="P03">PAPUA N GUINEA
                                                        </option><option value="P04">PARAGUAY
                                                        </option><option value="P05">PERU
                                                        </option><option value="P06">PHILIPPINES
                                                        </option><option value="P07">POLAND
                                                        </option><option value="P08">PORTUGAL
                                                        </option><option value="P09">PACIFIC ISLAND
                                                        </option><option value="P10">PUERTO RICO
                                                        </option><option value="P11">PALESTINE
                                                        </option><option value="P12">PALAU
                                                        </option><option value="Q01">QATAR
                                                        </option><option value="R01">RHODESIA
                                                        </option><option value="R02">ROMANIA
                                                        </option><option value="R04">RWANDA
                                                        </option><option value="R05">REUNION
                                                        </option><option value="R06">RUSSIA
                                                        </option><option value="R07">CONGO, REP. OF THE
                                                        </option><option value="R08">REP OF NAURU
                                                        </option><option value="S01">SAMOA
                                                        </option><option value="S02">SAN MARINO
                                                        </option><option value="S03">SAUDI ARABIA
                                                        </option><option value="S04">SENEGAL
                                                        </option><option value="S05">SEYCHELLES
                                                        </option><option value="S06">SIERRA LEONE
                                                        </option><option value="S07">SINGAPORE
                                                        </option><option value="S08">SOMALIA
                                                        </option><option value="S09">SOUTH AFRICA
                                                        </option><option value="S10">SPAIN
                                                        </option><option value="S11">SRI LANKA
                                                        </option><option value="S12">SUDAN
                                                        </option><option value="S14">SWEDEN
                                                        </option><option value="S15">SWITZERLAND
                                                        </option><option value="S16">SYRIA
                                                        </option><option value="S17">SOLOMON ISLAND
                                                        </option><option value="S18">SLOVENIA
                                                        </option><option value="S19">SLOVAKIA, REP.
                                                        </option><option value="S20">SURINAME
                                                        </option><option value="S21">SWAZILAND
                                                        </option><option value="S22">SAO TOME &amp; PRINCIPE
                                                        </option><option value="S23">SERBIA  AND MONTENEGRO
                                                        </option><option value="S24">ST. LUCIA
                                                        </option><option value="S25">SOUTH GEORGIA &amp; SOUTH SANDWICH ISLAND
                                                        </option><option value="S26">SERBIA
                                                        </option><option value="S27">ST. VINCENT AND THE GRENADINES
                                                        </option><option value="S28">SOUTH SUDAN
                                                        </option><option value="S29">SAINT KITTS AND NEVIS
                                                        </option><option value="T01">TAHITI
                                                        </option><option value="T02">TAIWAN
                                                        </option><option value="T03">TANZANIA
                                                        </option><option value="T04">TURKMENISTAN
                                                        </option><option value="T05">THAILAND
                                                        </option><option value="T06">TOBAGO
                                                        </option><option value="T07">TOGO
                                                        </option><option value="T08">TONGA
                                                        </option><option value="T09">TRINIDAD
                                                        </option><option value="T10">TUNISIA
                                                        </option><option value="T11">TURKEY
                                                        </option><option value="T12">TAJIKISTAN
                                                        </option><option value="T13">TUVALU
                                                        </option><option value="U01">UGANDA
                                                        </option><option value="U03">UNITED KINGDOM
                                                        </option><option value="U04">U.S.A
                                                        </option><option value="U05">URUGUAY
                                                        </option><option value="U06">U.A.E
                                                        </option><option value="U07">UKRAINE
                                                        </option><option value="U08">UZBEKISTAN
                                                        </option><option value="V01">VENEZUELA
                                                        </option><option value="V02">VIETNAM
                                                        </option><option value="V03">VANUATU
                                                        </option><option value="Y01">YEMEN ARAB REP.
                                                        </option><option value="Y02">YUGOSLAVIA
                                                        </option><option value="Z01">ZAIRE
                                                        </option><option value="Z02">ZAMBIA
                                                        </option><option value="Z03">ZIMBABWE
                                                                   </option>
                                                    </select>
                                                </fieldset> --}}
                                                </div>
                                            </div>


                                        </div>
                                        <div class="row form-group">

                                            <div class="row form-group" style="margin-left: 45%;">
                                                <div class="text-right col-md-12 mb-4 ">
                                                    <button type="submit" class="btn btn-primary ">Tambah</button>
                                                </div>
                                            </div>
                                            {{-- <div class="text-right col-md-10 mb-7 ">
                                            <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                                                style="float: right" data-bs-target="#exampleModalCenter">Simpan</button>
                                        </div> --}}

                                        </div>

                                        {{-- <div class="row form-group" style="padding-top: 10px; ">



                                        <div class="text-right col-md-11 mb-4 ">
                                            <button type="submit" class="btn btn-primary " data-toggle="modal"
                                                style="float: right" data-target="#confirmation">
                                                Tambah</button>
                                        </div>

                                    </div> --}}
                        </form>
                        <br>
                        <br>
                        <hr>
                        <h5 style="color: rgb(39, 80, 71); text-align:center">Senarai Produk Minyak Sawit</h5>

                        <section class="section">
                            <div class="card">

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0"  style="font-size: 13px">
                                            <thead>
                                                <tr>
                                                    <th>Nama Produk</th>
                                                    <th>Kod Produk</th>
                                                    <th>Nombor Borang Kastam 2</th>
                                                    <th>Tarikh Eksport</th>
                                                    <th>Kuantiti (Tan Metrik)</th>
                                                    <th>Nilai</th>
                                                    <th>Destinasi Negara</th>
                                                    <th>Kemaskini</th>
                                                    <th>Hapus?</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($penyata as $data)
                                                    <tr style="text-align: right">
                                                        <td style="text-align: left">{{ $data->produk[0]->prodname }}</td>
                                                        <td>{{ $data->produk[0]->prodid }}</td>
                                                        <td>{{ $data->e101_e5 }}</td>
                                                        <td>{{ $data->e101_e6 }}</td>
                                                        <td>{{ $data->e101_e7 }}</td>
                                                        <td>{{ $data->e101_e8 }}</td>
                                                        <td>{{ $data->negara[0]->namanegara }}</td>
                                                        <td>
                                                            <div class="icon" style="text-align: center">
                                                                <a href="#" type="button" data-bs-toggle="modal"
                                                                    data-bs-target="#modal{{ $data->e101_e1 }}">
                                                                    <i class="fas fa-edit fa-lg" style="color: #228c1c">
                                                                    </i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="icon" style="text-align: center">
                                                                <a href="#" type="button">
                                                                    <i class="fa fa-trash-o"
                                                                        style="color: #228c1c;font-size:18px"></i>
                                                                </a>
                                                            </div>

                                                        </td>
                                                    </tr>

                                                    <div class="col-md-6 col-12">

                                                        <!--scrolling content Modal -->
                                                        <div class="modal fade" id="modal{{ $data->e101_e1 }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalScrollableTitle"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-scrollable"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalScrollableTitle">
                                                                            Kemaskini Maklumat Produk</h5>
                                                                        <button type="button" class="close"
                                                                            data-bs-dismiss="modal" aria-label="Close">
                                                                            <i data-feather="x"></i>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form
                                                                            action="{{ route('penapis.edit.bahagian.vi', [$data->e101_e1]) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            <div class="modal-body">
                                                                                <label>Nama Produk </label>
                                                                                <div class="form-group">
                                                                                    <input type="text" name='e101_e4'
                                                                                        class="form-control"
                                                                                        value="{{ $data->produk[0]->prodname }}"
                                                                                        readonly>
                                                                                </div>
                                                                                <label>Nombor Borang Kastam 2 </label>
                                                                                <div class="form-group">
                                                                                    <input type="text" name='e101_e5'
                                                                                        class="form-control"
                                                                                        value="{{ $data->e101_e5 }}">
                                                                                </div>
                                                                                <label>Tarikh Eksport </label>
                                                                                <div class="form-group">
                                                                                    <input type="date" name='e101_e6'
                                                                                        class="form-control"
                                                                                        value="{{ $data->e101_e6 }}">
                                                                                </div>
                                                                                <label>Kuantiti (Tan Metrik) </label>
                                                                                <div class="form-group">
                                                                                    <input type="text" name='e101_e7'
                                                                                        class="form-control"
                                                                                        value="{{ $data->e101_e7 }}">
                                                                                </div>
                                                                                <label>Nilai </label>
                                                                                <div class="form-group">
                                                                                    <input type="text" name='e101_e8'
                                                                                        class="form-control"
                                                                                        value="{{ $data->e101_e8 }}">
                                                                                </div>
                                                                                <label>Destinasi Negara</label>

                                                                                <fieldset class="form-group">
                                                                                    <select class="form-select"
                                                                                        id="e101_e9" name="e101_e9">
                                                                                        <option
                                                                                            value="{{ $data->e101_e9 }}"
                                                                                            hidden>
                                                                                            {{ $data->negara[0]->namanegara }}
                                                                                        </option>
                                                                                        @foreach ($negara as $data)
                                                                                            <option
                                                                                                value="{{ $data->kodnegara }}">
                                                                                                {{ $data->namanegara }}
                                                                                            </option>
                                                                                        @endforeach

                                                                                    </select>
                                                                                </fieldset>

                                                                                {{-- <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-light-secondary"
                                                                                            data-bs-dismiss="modal">
                                                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                                                            <span class="d-none d-sm-block">Batal</span>
                                                                                        </button>
                                                                                        <button type="button" class="btn btn-primary ml-1"
                                                                                            data-bs-dismiss="modal">
                                                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                                                            <span class="d-none d-sm-block">Kemaskini</span>
                                                                                        </button>
                                                                                    </div> --}}


                                                                            </div>

                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-light-secondary"
                                                                                    data-bs-dismiss="modal">
                                                                                    <i
                                                                                        class="bx bx-x d-block d-sm-none"></i>
                                                                                    <span
                                                                                        class="d-none d-sm-block">Batal</span>
                                                                                </button>
                                                                                <button type="submit"
                                                                                    class="btn btn-primary ml-1">
                                                                                    <i
                                                                                        class="bx bx-check d-block d-sm-none"></i>
                                                                                    <span
                                                                                        class="d-none d-sm-block">Kemaskini</span>
                                                                                </button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                @endforeach

                                                <br>

                                            </tbody>

                                        </table>
                                    </div>

                                </div>
                            </div>

                        </section>

                    </div>











                    <div class="row form-group" style="padding-top: 10px; ">


                        <div class="text-left col-md-5">
                            <a href="{{ route('penapis.bahagiani') }}" class="btn btn-primary"
                                style="float: left">Sebelumnya</a>
                        </div>
                        <div class="text-right col-md-7 mb-4 ">
                            <button type="button" class="btn btn-primary " data-bs-toggle="modal" style="float: right"
                                data-bs-target="#exampleModalCenter">Papar Penyata</button>
                        </div>

                    </div>

                    <!-- Vertically Centered modal Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                            role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">
                                        PENGESAHAN</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>
                                        Anda pasti mahu memapar penyata?
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                    </button>
                                    <a href="{{ route('penapis.paparpenyata') }}" type="button"
                                        class="btn btn-primary ml-1">

                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Ya</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                </form>

            </div>

            <br>

        </div>
        </div>
        </div>













        <br>




    </section><!-- End Hero -->



    </main><!-- End #main -->

    <!-- ======= Footer ======= -->





    {{-- <div id="preloader"></div> --}}
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js" />
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.calc').change(function() {
                var total = 0;
                $('.calc').each(function() {
                    if ($(this).val() != '') {
                        total += parseInt($(this).val());
                    }
                });
                $('#total').html(total);
            });
        });
    </script>




    </body>

    </html>
@endsection
