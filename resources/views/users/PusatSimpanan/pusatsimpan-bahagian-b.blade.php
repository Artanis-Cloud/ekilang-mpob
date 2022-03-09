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

            <div class="mt-5 mb-4 row">
                <div class="col-md-12">

                    <div class="page-breadcrumb" style="padding: 0px">
                        <div class="pb-2 row">
                            <div class="col-5 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn"
                                    style="margin-left:5%; color:white; background-color:#25877bd1">Kembali</a>
                            </div>
                            <div class="col-7 align-self-center"  style="margin-left:-1%;">
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

                        <div class="card-body">
                            <div class="row">
                                {{-- <div class="col-md-4 col-12"> --}}
                                <div class="pl-3">

                                    <div class="mb-4 text-center">
                                        {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                        <h3 style="color: rgb(39, 80, 71); ">Bahagian B</h3>
                                        <h5 style="color: rgb(39, 80, 71)">Instolasi Keluaran Minyak Sawit - Aktiviti Peralihan (Transhipment)
                                        </h5>
                                        {{-- <p>Maklumat Kilang</p> --}}
                                    </div>
                                    <hr>

                                    <div class="container center mt-4">

                                        <div class="row">
                                            <div class="col-md-2">
                                                <span class="required">Nama Produk Sawit:</span>
                                            </div>
                                            <div class="col-md-4">
                                                <fieldset class="form-group">
                                                    <select class="form-select" id="basicSelect" style="width:50%">
                                                        <option selected hidden disabled>Sila Pilih Produk</option>
                                                        <option value="KA"> CGRIN - KA
                                                        </option><option value="JN"> I-IST - JN
                                                        </option><option value="JL">13D2PT - JL
                                                        </option><option value="JT">2EHE - JT
                                                        </option><option value="IW">ACEMONO - IW
                                                        </option><option value="CV">AE-1AL - CV
                                                        </option><option value="CN">AE-2A - CN
                                                        </option><option value="AB">AE-3A - AB
                                                        </option><option value="AF">AE-7A - AF
                                                        </option><option value="CY">AE-8A - CY
                                                        </option><option value="CX">AE-9A - CX
                                                        </option><option value="CO">AEO-3A - CO
                                                        </option><option value="CW">AEO-7A - CW
                                                        </option><option value="IH">AFAEG - IH
                                                        </option><option value="M5">AGM - M5
                                                        </option><option value="BN">ALDSTR - BN
                                                        </option><option value="HN">ALKEN - HN
                                                        </option><option value="BM">ALMSTR - BM
                                                        </option><option value="BJ">ALS - BJ
                                                        </option><option value="BL">ALSTR - BL
                                                        </option><option value="BP">ALTSTR - BP
                                                        </option><option value="CI">BASTR - CI
                                                        </option><option value="U8">BE - U8
                                                        </option><option value="HP">BETN - HP
                                                        </option><option value="H9">BOSFP/CBS - H9
                                                        </option><option value="JY">BPES - JY
                                                        </option><option value="X3">BPKL - X3
                                                        </option><option value="C8">BPKL - C8
                                                        </option><option value="X2">BPKO - X2
                                                        </option><option value="DT">BPKO - DT
                                                        </option><option value="BK">BPKOM - BK
                                                        </option><option value="C9">BPKS - C9
                                                        </option><option value="X4">BPKS - X4
                                                        </option><option value="15">BPL - 15
                                                        </option><option value="13">BPO - 13
                                                        </option><option value="14">BPS - 14
                                                        </option><option value="U7">BVO - U7
                                                        </option><option value="91">CA - 91
                                                        </option><option value="AQ">CACACID - AQ
                                                        </option><option value="K1">CAL - K1
                                                        </option><option value="J7">CALC - J7
                                                        </option><option value="P8">CAM(C10) - P8
                                                        </option><option value="P7">CAM(C8) - P7
                                                        </option><option value="M9">CBE - M9
                                                        </option><option value="N0">CBEXT - N0
                                                        </option><option value="82">CBPKO - 82
                                                        </option><option value="N1">CBR - N1
                                                        </option><option value="44">CBS - 44
                                                        </option><option value="S7">CC - S7
                                                        </option><option value="EY">CC FA - EY
                                                        </option><option value="64">CCACID - 64
                                                        </option><option value="S8">CCM - S8
                                                        </option><option value="U9">CCNO - U9
                                                        </option><option value="AR">CDPKOFA - AR
                                                        </option><option value="IX">CETALCOHO - IX
                                                        </option><option value="IY">CETEH - IY
                                                        </option><option value="FL">CETOSAL - FL
                                                        </option><option value="M2">CF - M2
                                                        </option><option value="F9">CG - F9
                                                        </option><option value="E9">CKFA - E9
                                                        </option><option value="CE">CL - CE
                                                        </option><option value="CD">CLA - CD
                                                        </option><option value="O4">CLAL - O4
                                                        </option><option value="CF">CLCA - CF
                                                        </option><option value="V0">CNOFA - V0
                                                        </option><option value="47">CO - 47
                                                        </option><option value="I5">COA - I5
                                                        </option><option value="81">COCA - 81
                                                        </option><option value="FK">CPAL - FK
                                                        </option><option value="06">CPKL - 06
                                                        </option><option value="04">CPKO - 04
                                                        </option><option value="05">CPKS - 05
                                                        </option><option value="03">CPL - 03
                                                        </option><option value="01">CPO - 01
                                                        </option><option value="02">CPS - 02
                                                        </option><option value="J2">CRA - J2
                                                        </option><option value="O5">CRAL - O5
                                                        </option><option value="P1">CSAL - P1
                                                        </option><option value="E7">CSFA - E7
                                                        </option><option value="BF">CSOAP - BF
                                                        </option><option value="EK">CSUPSFA - EK
                                                        </option><option value="FM">CTENE - FM
                                                        </option><option value="AS">CUPKOFA - AS
                                                        </option><option value="V1">DCNOFA - V1
                                                        </option><option value="86">DF - 86
                                                        </option><option value="V7">DFPL - V7
                                                        </option><option value="Y3">DFRBDPKL - Y3
                                                        </option><option value="Y4">DFRBDPKS - Y4
                                                        </option><option value="Z9">DFRBDPL - Z9
                                                        </option><option value="CZ">DFRDBPS - CZ
                                                        </option><option value="DV">DFS - DV
                                                        </option><option value="CG">DG - CG
                                                        </option><option value="V2">DHCNOFA - V2
                                                        </option><option value="J5">DHFA - J5
                                                        </option><option value="FI">DIE_SPO - FI
                                                        </option><option value="EA">DIGO - EA
                                                        </option><option value="JP">DLOL - JP
                                                        </option><option value="EJ">DMAL - EJ
                                                        </option><option value="HQ">DMDGLY - HQ
                                                        </option><option value="EQ">DMFA - EQ
                                                        </option><option value="H8">DMFAO - H8
                                                        </option><option value="ER">DMGLY - ER
                                                        </option><option value="96">DMO - 96
                                                        </option><option value="EI">DMPKOFA - EI
                                                        </option><option value="O1">DMPKOFA - O1
                                                        </option><option value="N9">DMPOFA - N9
                                                        </option><option value="O0">DMPSFA - O0
                                                        </option><option value="J4">DOA - J4
                                                        </option><option value="99">DPKOFA - 99
                                                        </option><option value="AT">DPKOFA - AT
                                                        </option><option value="85">DPL - 85
                                                        </option><option value="84">DPO - 84
                                                        </option><option value="N6">DPOFA - N6
                                                        </option><option value="O3">DPSA - O3
                                                        </option><option value="N7">DPSFA - N7
                                                        </option><option value="DS">DPST - DS
                                                        </option><option value="JH">DR RBDPL - JH
                                                        </option><option value="F6">DRBDPO - F6
                                                        </option><option value="U1">DS - U1
                                                        </option><option value="IK">DTAEM - IK
                                                        </option><option value="DN">EBS - DN
                                                        </option><option value="DH">EDENOR - DH
                                                        </option><option value="FO">EFB - FO
                                                        </option><option value="AX">EGD - AX
                                                        </option><option value="ES">EGMS - ES
                                                        </option><option value="FP">EHO - FP
                                                        </option><option value="AU">EHP - AU
                                                        </option><option value="AV">EHS - AV
                                                        </option><option value="BT">EMUL - BT
                                                        </option><option value="IZ">ETHHL - IZ
                                                        </option><option value="R0">F-GEE - R0
                                                        </option><option value="R1">F-GG - R1
                                                        </option><option value="FE">F-GV0 - FE
                                                        </option><option value="83">FA - 83
                                                        </option><option value="DG">FADR - DG
                                                        </option><option value="JX">FAl C10-12 - JX
                                                        </option><option value="DZ">FALRES - DZ
                                                        </option><option value="A4">FAME - A4
                                                        </option><option value="H4">FAMIN - H4
                                                        </option><option value="M6">FAP - M6
                                                        </option><option value="46">FB - 46
                                                        </option><option value="I9">FFA - I9
                                                        </option><option value="A0">FLO - A0
                                                        </option><option value="DE">FW - DE
                                                        </option><option value="JJ">G3TE - JJ
                                                        </option><option value="IN">GC - IN
                                                        </option><option value="K7">GD - K7
                                                        </option><option value="JC">GLYDIS - JC
                                                        </option><option value="JA">GLYMONOCA - JA
                                                        </option><option value="JB">GLYMONOLA - JB
                                                        </option><option value="R2">GM - R2
                                                        </option><option value="HO">GMST - HO
                                                        </option><option value="EP">GPT - EP
                                                        </option><option value="EL">GTC - EL
                                                        </option><option value="R4">GTP - R4
                                                        </option><option value="R3">GTS - R3
                                                        </option><option value="ID">GTT - ID
                                                        </option><option value="CH">GW - CH
                                                        </option><option value="L6">HCAL - L6
                                                        </option><option value="D7">HCBST - D7
                                                        </option><option value="AH">HCE - AH
                                                        </option><option value="Q1">HCM - Q1
                                                        </option><option value="H0">HDFPL - H0
                                                        </option><option value="I6">HDRBDSFA - I6
                                                        </option><option value="ED">HEA - ED
                                                        </option><option value="L3">HFAO - L3
                                                        </option><option value="B3">HFFAPO - B3
                                                        </option><option value="DU">HFV - DU
                                                        </option><option value="BR">HL - BR
                                                        </option><option value="E8">HMFA - E8
                                                        </option><option value="D2">HNBDPKL - D2
                                                        </option><option value="D5">HNBDPKO - D5
                                                        </option><option value="D6">HNBDPKS - D6
                                                        </option><option value="D3">HNBPKL - D3
                                                        </option><option value="D1">HNBPKO - D1
                                                        </option><option value="D4">HNBPKS - D4
                                                        </option><option value="Y7">HNPL - Y7
                                                        </option><option value="BS">HP - BS
                                                        </option><option value="G2">HPF - G2
                                                        </option><option value="87">HPFAD - 87
                                                        </option><option value="DA">HPKF - DA
                                                        </option><option value="E6">HPKFA - E6
                                                        </option><option value="C6">HPKL - C6
                                                        </option><option value="54">HPKO - 54
                                                        </option><option value="C7">HPKOFA - C7
                                                        </option><option value="65">HPKS - 65
                                                        </option><option value="C3">HPL - C3
                                                        </option><option value="Y9">HPMF - Y9
                                                        </option><option value="55">HPO - 55
                                                        </option><option value="69">HPOFA - 69
                                                        </option><option value="H7">HPPS - H7
                                                        </option><option value="B9">HPS - B9
                                                        </option><option value="E2">HPSA - E2
                                                        </option><option value="V5">HPSA - V5
                                                        </option><option value="N8">HPSFA - N8
                                                        </option><option value="W1">HRBDDFL - W1
                                                        </option><option value="73">HRBDPKL - 73
                                                        </option><option value="72">HRBDPKO - 72
                                                        </option><option value="74">HRBDPKS - 74
                                                        </option><option value="A3">HRBDPL - A3
                                                        </option><option value="H2">HRBDPO - H2
                                                        </option><option value="B6">HRBDSF - B6
                                                        </option><option value="B8">HRBDST - B8
                                                        </option><option value="D9">HSFA - D9
                                                        </option><option value="E5">HSSA - E5
                                                        </option><option value="AJ">HVF - AJ
                                                        </option><option value="C0">HVG - C0
                                                        </option><option value="78">HVO - 78
                                                        </option><option value="Q7">I-BO - Q7
                                                        </option><option value="Q6">I-OO - Q6
                                                        </option><option value="Q5">I-OS - Q5
                                                        </option><option value="FG">I-PA - FG
                                                        </option><option value="Q8">I-PO - Q8
                                                        </option><option value="Q9">I-PP - Q9
                                                        </option><option value="FA">IEFAT - FA
                                                        </option><option value="B4">IGPO - B4
                                                        </option><option value="IR">IL - IR
                                                        </option><option value="DX">IMO - DX
                                                        </option><option value="Z3">IMPF - Z3
                                                        </option><option value="H5">IMVF - H5
                                                        </option><option value="Z2">IMVO - Z2
                                                        </option><option value="Z7">INTER  PKO - Z7
                                                        </option><option value="X8">INTER PL - X8
                                                        </option><option value="Z6">INTER PO - Z6
                                                        </option><option value="DK">INTERPST - DK
                                                        </option><option value="DL">INTFATBLD - DL
                                                        </option><option value="EH">IPL - EH
                                                        </option><option value="BU">IPL - BU
                                                        </option><option value="L8">IPM - L8
                                                        </option><option value="Z4">JGQ RBDPO - Z4
                                                        </option><option value="AA">JGQRBDPKOS - AA
                                                        </option><option value="CJ">KSTR - CJ
                                                        </option><option value="R5">L-MA - R5
                                                        </option><option value="O7">L-MAL - O7
                                                        </option><option value="39">LA - 39
                                                        </option><option value="K3">LAC - K3
                                                        </option><option value="IL">LAEM - IL
                                                        </option><option value="J8">LAL - J8
                                                        </option><option value="S6">LAM - S6
                                                        </option><option value="EW">LCA - EW
                                                        </option><option value="AC">LCE - AC
                                                        </option><option value="P9">LCM(CE810) - P9
                                                        </option><option value="89">LE - 89
                                                        </option><option value="DB">LE - DB
                                                        </option><option value="B7">LFAD - B7
                                                        </option><option value="BC">LGA - BC
                                                        </option><option value="EE">LINA - EE
                                                        </option><option value="DC">LP - DC
                                                        </option><option value="O9">LSAL - O9
                                                        </option><option value="42">M - 42
                                                        </option><option value="75">MA - 75
                                                        </option><option value="J9">MAL - J9
                                                        </option><option value="59">MAO - 59
                                                        </option><option value="FC">MAOIL - FC
                                                        </option><option value="BW">MC - BW
                                                        </option><option value="P5">MC1214FA - P5
                                                        </option><option value="P6">MC1618FA - P6
                                                        </option><option value="P4">MC810FA - P4
                                                        </option><option value="P2">MCAL - P2
                                                        </option><option value="AE">MCE - AE
                                                        </option><option value="BX">MCL - BX
                                                        </option><option value="BY">MCLC - BY
                                                        </option><option value="Q0">MCM(CE1214 - Q0
                                                        </option><option value="BV">MCT - BV
                                                        </option><option value="70">ME - 70
                                                        </option><option value="EC">MEA - EC
                                                        </option><option value="71">MER - 71
                                                        </option><option value="FB">MES - FB
                                                        </option><option value="IE">MFA - IE
                                                        </option><option value="I1">MFAO - I1
                                                        </option><option value="S0">MFES - S0
                                                        </option><option value="FT">MFOH - FT
                                                        </option><option value="FU">MFOHLE - FU
                                                        </option><option value="GT">MGLY - GT
                                                        </option><option value="BE">MGSOAP - BE
                                                        </option><option value="CK">MGSTR - CK
                                                        </option><option value="K8">ML - K8
                                                        </option><option value="FS">MLFA - FS
                                                        </option><option value="EU">MLM - EU
                                                        </option><option value="FD">MLP - FD
                                                        </option><option value="JR">MLS - JR
                                                        </option><option value="Q2">MM - Q2
                                                        </option><option value="Q3">MO - Q3
                                                        </option><option value="IO">MONOGLY - IO
                                                        </option><option value="K6">MP - K6
                                                        </option><option value="BZ">MPS - BZ
                                                        </option><option value="K5">MS - K5
                                                        </option><option value="S1">MSOAP - S1
                                                        </option><option value="I4">MVAO - I4
                                                        </option><option value="KB">MVORBDPLMB - KB
                                                        </option><option value="EN">MVO_CPKO - EN
                                                        </option><option value="GV">MVO_PMF - GV
                                                        </option><option value="Y2">MVO_RBDPKL - Y2
                                                        </option><option value="Y1">MVO_RBDPKO - Y1
                                                        </option><option value="Y0">MVO_RBDPL - Y0
                                                        </option><option value="X9">MVO_RBDPO - X9
                                                        </option><option value="BO">MVO_RBDPS - BO
                                                        </option><option value="Q4">N-BO - Q4
                                                        </option><option value="CL">NASTR - CL
                                                        </option><option value="GA">NBDDFPL - GA
                                                        </option><option value="Y6">NBDHPL - Y6
                                                        </option><option value="W3">NBDHPO - W3
                                                        </option><option value="W5">NBDHPS - W5
                                                        </option><option value="A6">NBDPKL - A6
                                                        </option><option value="68">NBDPKO - 68
                                                        </option><option value="66">NBDPKS - 66
                                                        </option><option value="28">NBDPL - 28
                                                        </option><option value="JW">NBDPLRS - JW
                                                        </option><option value="HM">NBDPMF - HM
                                                        </option><option value="24">NBDPO3 - 24
                                                        </option><option value="22">NBDPO6 - 22
                                                        </option><option value="26">NBDPS - 26
                                                        </option><option value="X6">NBHPKL - X6
                                                        </option><option value="X5">NBHPKO - X5
                                                        </option><option value="X7">NBHPKS - X7
                                                        </option><option value="Y8">NBHPL - Y8
                                                        </option><option value="W7">NBHPL - W7
                                                        </option><option value="W6">NBHPO - W6
                                                        </option><option value="W8">NBHPS - W8
                                                        </option><option value="H6">NBIF - H6
                                                        </option><option value="K0">NBIOL - K0
                                                        </option><option value="L0">NBIS - L0
                                                        </option><option value="A1">NBPKL - A1
                                                        </option><option value="57">NBPKO - 57
                                                        </option><option value="A8">NBPKS - A8
                                                        </option><option value="20">NBPL - 20
                                                        </option><option value="16">NBPO - 16
                                                        </option><option value="18">NBPS - 18
                                                        </option><option value="L5">NBS - L5
                                                        </option><option value="S3">NFA - S3
                                                        </option><option value="IA">NGD - IA
                                                        </option><option value="IU">NGDD - IU
                                                        </option><option value="G9">NO - G9
                                                        </option><option value="A5">NPKL - A5
                                                        </option><option value="58">NPKO - 58
                                                        </option><option value="A7">NPKS - A7
                                                        </option><option value="11">NPL - 11
                                                        </option><option value="07">NPO - 07
                                                        </option><option value="09">NPS - 09
                                                        </option><option value="36">OA - 36
                                                        </option><option value="FH">OAL - FH
                                                        </option><option value="JQ">OCTPTE - JQ
                                                        </option><option value="O6">ODAL - O6
                                                        </option><option value="Z0">OPF - Z0
                                                        </option><option value="EX">OPFMAT - EX
                                                        </option><option value="P0">OSAL - P0
                                                        </option><option value="U5">OTHERS - U5
                                                        </option><option value="37">PA - 37
                                                        </option><option value="34">PAO - 34
                                                        </option><option value="BI">PDME - BI
                                                        </option><option value="II">PE - II
                                                        </option><option value="JZ">PESFAH - JZ
                                                        </option><option value="M3">PF - M3
                                                        </option><option value="35">PFAD - 35
                                                        </option><option value="DF">PFAME - DF
                                                        </option><option value="C4">PFARES - C4
                                                        </option><option value="DW">PFAT - DW
                                                        </option><option value="CU">PFIBRE - CU
                                                        </option><option value="BH">PG1M - BH
                                                        </option><option value="IB">PGDD - IB
                                                        </option><option value="IQ">PGDO - IQ
                                                        </option><option value="IF">PGEFA - IF
                                                        </option><option value="BA">PGM - BA
                                                        </option><option value="JS">PGMO - JS
                                                        </option><option value="JK">PGMONO - JK
                                                        </option><option value="AY">PGP - AY
                                                        </option><option value="EG">PHG - EG
                                                        </option><option value="R8">PIT O - R8
                                                        </option><option value="C1">PKAO - C1
                                                        </option><option value="33">PKC - 33
                                                        </option><option value="EM">PKDEA - EM
                                                        </option><option value="B1">PKE - B1
                                                        </option><option value="79">PKF - 79
                                                        </option><option value="Z8">PKFA - Z8
                                                        </option><option value="56">PKFAD - 56
                                                        </option><option value="53">PKME - 53
                                                        </option><option value="EV">PKMF - EV
                                                        </option><option value="M1">PKOF - M1
                                                        </option><option value="77">PKOFA - 77
                                                        </option><option value="P3">PKOFAL - P3
                                                        </option><option value="CA">PKOM - CA
                                                        </option><option value="E3">PKORES - E3
                                                        </option><option value="B2">PKP - B2
                                                        </option><option value="Z1">PKS - Z1
                                                        </option><option value="CB">PLM - CB
                                                        </option><option value="45">PMF - 45
                                                        </option><option value="C2">POFAL - C2
                                                        </option><option value="C5">POME - C5
                                                        </option><option value="IM">PP - IM
                                                        </option><option value="FF">PRE ST - FF
                                                        </option><option value="FQ">PREFA - FQ
                                                        </option><option value="DI">PRLFAT - DI
                                                        </option><option value="G5">PRYO - G5
                                                        </option><option value="AZ">PS - AZ
                                                        </option><option value="V6">PSA - V6
                                                        </option><option value="97">PSFA - 97
                                                        </option><option value="92">PSME - 92
                                                        </option><option value="R9">PSOA - R9
                                                        </option><option value="IC">PTS - IC
                                                        </option><option value="IS">PTT - IS
                                                        </option><option value="Y5">PWAX - Y5
                                                        </option><option value="AD">RBD SL - AD
                                                        </option><option value="D0">RBDBO - D0
                                                        </option><option value="X0">RBDHPKL - X0
                                                        </option><option value="W9">RBDHPKO - W9
                                                        </option><option value="X1">RBDHPKS - X1
                                                        </option><option value="V9">RBDHPL - V9
                                                        </option><option value="W2">RBDHPMF - W2
                                                        </option><option value="B0">RBDHPMF - B0
                                                        </option><option value="V8">RBDHPO - V8
                                                        </option><option value="W0">RBDHPS - W0
                                                        </option><option value="E0">RBDMO - E0
                                                        </option><option value="F5">RBDPFAD - F5
                                                        </option><option value="32">RBDPKL - 32
                                                        </option><option value="GG">RBDPKL IP - GG
                                                        </option><option value="GE">RBDPKL MB - GE
                                                        </option><option value="GF">RBDPKL SG - GF
                                                        </option><option value="30">RBDPKO - 30
                                                        </option><option value="31">RBDPKS - 31
                                                        </option><option value="29">RBDPL - 29
                                                        </option><option value="25">RBDPO3 - 25
                                                        </option><option value="23">RBDPO6 - 23
                                                        </option><option value="27">RBDPS - 27
                                                        </option><option value="AL">RBDPSH - AL
                                                        </option><option value="21">RBPL - 21
                                                        </option><option value="17">RBPO - 17
                                                        </option><option value="19">RBPS - 19
                                                        </option><option value="Z5">RED PSL - Z5
                                                        </option><option value="DJ">REDPO - DJ
                                                        </option><option value="JV">RefGly - JV
                                                        </option><option value="B5">RESD - B5
                                                        </option><option value="U0">RFS - U0
                                                        </option><option value="G1">RG - G1
                                                        </option><option value="T1">RHPS - T1
                                                        </option><option value="G4">RL - G4
                                                        </option><option value="M7">RPKL - M7
                                                        </option><option value="G3">RPKO - G3
                                                        </option><option value="M8">RPKS - M8
                                                        </option><option value="12">RPL - 12
                                                        </option><option value="08">RPO - 08
                                                        </option><option value="10">RPS - 10
                                                        </option><option value="40">SA - 40
                                                        </option><option value="BQ">SA(IV&gt;1) - BQ
                                                        </option><option value="O8">SAL - O8
                                                        </option><option value="M4">SAP - M4
                                                        </option><option value="DD">SBE - DD
                                                        </option><option value="G6">SBO - G6
                                                        </option><option value="IJ">SE - IJ
                                                        </option><option value="43">SH - 43
                                                        </option><option value="D8">SHPFA - D8
                                                        </option><option value="N5">SHPKOFA - N5
                                                        </option><option value="E1">SHPS - E1
                                                        </option><option value="EF">SHPSFA - EF
                                                        </option><option value="I7">SHRBDSFA - I7
                                                        </option><option value="H1">SL - H1
                                                        </option><option value="HK">SLES - HK
                                                        </option><option value="IV">SML - IV
                                                        </option><option value="BB">SMO - BB
                                                        </option><option value="JM">SMONOS - JM
                                                        </option><option value="A9">SN - A9
                                                        </option><option value="49">SO - 49
                                                        </option><option value="48">SOAP - 48
                                                        </option><option value="AP">SOCF - AP
                                                        </option><option value="AO">SOCO - AO
                                                        </option><option value="JD">SORTRISTE - JD
                                                        </option><option value="80">SPAO - 80
                                                        </option><option value="98">SPFA - 98
                                                        </option><option value="K2">SPFAD - K2
                                                        </option><option value="A2">SPKFA - A2
                                                        </option><option value="S9">SPKLA - S9
                                                        </option><option value="FZ">SPKLFA - FZ
                                                        </option><option value="CC">SPKOM - CC
                                                        </option><option value="BG">SPPHPKOFA - BG
                                                        </option><option value="O2">SPSA - O2
                                                        </option><option value="67">SPSFA - 67
                                                        </option><option value="F0">SPST - F0
                                                        </option><option value="JI">SPTE - JI
                                                        </option><option value="R6">SRBDS - R6
                                                        </option><option value="IG">SSL - IG
                                                        </option><option value="EB">STT - EB
                                                        </option><option value="JO">SULMETERS - JO
                                                        </option><option value="I0">SW - I0
                                                        </option><option value="EO">TFPS - EO
                                                        </option><option value="L7">TG - L7
                                                        </option><option value="F2">TKFA - F2
                                                        </option><option value="JU">TMP TO - JU
                                                        </option><option value="I3">TOCO - I3
                                                        </option><option value="S4">TPKP - S4
                                                        </option><option value="K4">TPSA - K4
                                                        </option><option value="IT">TPT - IT
                                                        </option><option value="FN">TRIE - FN
                                                        </option><option value="JE">TRIPK - JE
                                                        </option><option value="JF">TRITC - JF
                                                        </option><option value="JG">TRITPKO - JG
                                                        </option><option value="AG">TSFA - AG
                                                        </option><option value="IP">TTPTC - IP
                                                        </option><option value="FR">UCOME - FR
                                                        </option><option value="CM">UFO - CM
                                                        </option><option value="N4">UMPKOFA - N4
                                                        </option><option value="N2">UMPOFA - N2
                                                        </option><option value="N3">UMPSFA - N3
                                                        </option><option value="61">US - 61
                                                        </option><option value="F8">VC - F8
                                                        </option><option value="AK">VCO - AK
                                                        </option><option value="I2">VEGPO - I2
                                                        </option><option value="M0">VF - M0
                                                        </option><option value="DY">VFM - DY
                                                        </option><option value="41">VG - 41
                                                        </option><option value="AN">VO - AN
                                                        </option><option value="T7">VOL - T7
                                                        </option><option value="AM">VPL - AM
                                                        </option><option value="DR">VPO - DR
                                                        </option><option value="AI">VSO - AI
                                                        </option><option value="DM">ZNLAURATE - DM
                                                        </option><option value="BD">ZSOAP - BD
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
                                        <div class="row mt-4">
                                            <div class="col-md-2">
                                                <span class="required">Stok Awal:</span>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name='#'
                                                    style="width:50%" id="#" required
                                                    title="Sila isikan butiran ini.">
                                                {{-- @error('alamat_kilang_1')
                                                <div class="alert alert-danger">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror --}}
                                            </div>
                                            <div class="col-md-2">
                                                <span class="required"> Eksport:</span>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name='#'
                                                    style="width:50%" id="#" required
                                                    title="Sila isikan butiran ini.">
                                                {{-- @error('alamat_kilang_1')
                                                <div class="alert alert-danger">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror --}}
                                            </div>

                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-md-2">
                                                <span class="required">Penerimaan Dari Luar Negara:</span>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name='#'
                                                    style="width:50%" id="#" required
                                                    title="Sila isikan butiran ini.">
                                            </div>

                                            <div class="col-md-2">
                                                <span class="required">Pelarasan(+/-):</span>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name='#'
                                                    style="width:50%" id="#" required
                                                    title="Sila isikan butiran ini.">
                                                {{-- @error('alamat_kilang_1')
                                                <div class="alert alert-danger">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror --}}
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-md-2">
                                                <span class="required">Eksport:</span>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name='#'
                                                    style="width:50%" id="#" required
                                                    title="Sila isikan butiran ini.">
                                            </div>

                                            <div class="col-md-2">
                                                <span class="required">Stok Akhir:</span>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name='#'
                                                    style="width:50%" id="#" required
                                                    title="Sila isikan butiran ini.">
                                                {{-- @error('alamat_kilang_1')
                                                <div class="alert alert-danger">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror --}}
                                            </div>
                                        </div>


                                    </div>
                                    <br>

                                    <div class="row form-group" style="padding-top: 10px; ">


                                        <div class="row form-group">
                                            <div class="text-right col-md-12 mb-4 " style="margin-left: 45%;">
                                                <button type="submit" class="btn btn-primary ">Tambah</button>
                                            </div>
                                        </div>

                                    </div>


                                    <hr>
                                    <br>
                                    <br>
                                    <h5 style="color: rgb(39, 80, 71); text-align:center">Senarai Instolasi Keluaran Minyak Sawit - Aktiviti Peralihan (Transhipment)</h5>

                                    <section class="section">
                                        <div class="card">

                                            <div class="card-body">
                                                <table class='table table-striped' id="table1">
                                                    <thead>
                                                        <tr style="text-align: center">
                                                            <th>Nama Produk Sawit</th>
                                                            <th>Stok Awal</th>
                                                            <th>Penerimaan Dari Luar Negara</th>
                                                            <th>Edaran ke Dalam Negeri/Import</th>
                                                            <th>Eksport</th>
                                                            <th>Pelarasan (+/-)</th>
                                                            <th>Stok Akhir</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>BPL</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>

                                                        </tr>

                                                        <br>

                                                    </tbody>

                                                </table>

                                            </div>
                                        </div>

                                    </section>

                                </div>











                                <div class="row form-group" style="padding-top: 10px; ">


                                    <div class="text-left col-md-5">
                                        <a href="{{ route('buah.bahagianv') }}" class="btn btn-primary"
                                            style="float: left">Sebelumnya</a>
                                    </div>
                                    <div class="text-right col-md-7 mb-4 ">
                                        <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                                            style="float: right" data-bs-target="#exampleModalCenter">Simpan &
                                            Seterusnya</button>
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
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>
                                                    Anda pasti mahu menyimpan maklumat ini?
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary"
                                                    data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                                </button>
                                                <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Ya</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            </form>

                        </div>
                    </div>

                </div>
                <br>
                <br>
                <br>
                <br>



                {{-- </div>
                                                                    </div> --}}

                {{-- </section> --}}















                {{-- </div>

                    </div> --}}



                <br>
                <br>




    </section><!-- End Hero -->



    </main><!-- End #main -->

    <!-- ======= Footer ======= -->





    {{-- <div id="preloader"></div> --}}
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


    <script src="{{ asset('theme/js/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('theme/dist/js/custom.js') }}"></script>
    <script src="{{ asset('theme/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('theme/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('theme/js/app.js') }}"></script>

    <script src="assets/js/main.js"></script>

    <script src="{{ asset('theme/libs/DataTables2/datatables.min.js') }}"></script>
    <script src="{{ asset('theme/js/pages/datatable/datatable-basic.init.js') }}"></script>

    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "language": {
                    "lengthMenu": "Memaparkan _MENU_ rekod per halaman",
                    "zeroRecords": "Maaf, tiada rekod.",
                    "info": "Memaparkan halaman _PAGE_ dari _PAGES_",
                    "infoEmpty": "Tidak ada rekod yang tersedia",
                    "infoFiltered": "(Ditapis dari _MAX_ jumlah rekod)",
                    "search": "Carian",
                    "previous": "Sebelum",
                    "paginate": {
                        "first": "Pertama",
                        "last": "Terakhir",
                        "next": "Seterusnya",
                        "previous": "Sebelumnya"
                    },
                },
            });
        });

        $(window).on('changed', (e) => {
            // if($('#example').DataTable().clear().destroy()){
            // $('#example').DataTable();
            // }
        });

        // document.getElementById("form_type").onchange = function() {
        //     myFunction()
        // };

        // function myFunction() {
        //     console.log('asasa');
        //     table.clear().draw();
        // }
    </script>
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

    <script>
        function onlyNumberKey(evt) {

            // Only ASCII charactar in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;
        }
    </script>

    </body>

    </html>

@endsection
