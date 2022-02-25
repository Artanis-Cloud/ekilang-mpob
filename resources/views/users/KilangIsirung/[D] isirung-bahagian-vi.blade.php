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

            <div class="mt-5 mb-2 row">
                <div class="col-md-12">

                    <div class="page-breadcrumb" style="padding: 0px">
                        <div class="pb-2 row">
                            <div class="col-5 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn"
                                    style="color:white; background-color:#25877bd1">Kembali</a>
                            </div>
                            <div class="col-7 align-self-center">
                                <div class="d-flex align-items-center justify-content-end">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            @foreach ($returnArr['breadcrumbs'] as $breadcrumb)
                                                @if (!$loop->last)
                                                    <li class="breadcrumb-item">
                                                        <a href="{{ $breadcrumb['link'] }}"
                                                            style="color: white !important;"
                                                            onMouseOver="this.style.color='lightblue'"
                                                            onMouseOut="this.style.color='white'">
                                                            {{ $breadcrumb['name'] }}
                                                        </a>
                                                    </li>
                                                @else
                                                    <li class="breadcrumb-item active" aria-current="page"
                                                        style="color: #fff03e  !important;">
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
                                                <fieldset class="form-group">
                                                    <select class="form-select" id="basicSelect" style="margin-left:42%; width:40%">
                                                        <option selected hidden disabled>Sila Pilih Produk</option>

                                                            <option value="X3">BPKL - X3
                                                            </option><option value="C8">BPKL - C8
                                                            </option><option value="DT">BPKO - DT
                                                            </option><option value="X2">BPKO - X2
                                                            </option><option value="C9">BPKS - C9
                                                            </option><option value="X4">BPKS - X4
                                                            </option><option value="82">CBPKO - 82
                                                            </option><option value="06">CPKL - 06
                                                            </option><option value="04">CPKO - 04
                                                            </option><option value="05">CPKS - 05
                                                            </option><option value="Y3">DFRBDPKL - Y3
                                                            </option><option value="Y4">DFRBDPKS - Y4
                                                            </option><option value="D2">HNBDPKL - D2
                                                            </option><option value="D5">HNBDPKO - D5
                                                            </option><option value="D6">HNBDPKS - D6
                                                            </option><option value="D3">HNBPKL - D3
                                                            </option><option value="D1">HNBPKO - D1
                                                            </option><option value="D4">HNBPKS - D4
                                                            </option><option value="C6">HPKL - C6
                                                            </option><option value="54">HPKO - 54
                                                            </option><option value="65">HPKS - 65
                                                            </option><option value="73">HRBDPKL - 73
                                                            </option><option value="72">HRBDPKO - 72
                                                            </option><option value="74">HRBDPKS - 74
                                                            </option><option value="Z7">INTER  PKO - Z7
                                                            </option><option value="AA">JGQRBDPKOS - AA
                                                            </option><option value="EN">MVO_CPKO - EN
                                                            </option><option value="Y2">MVO_RBDPKL - Y2
                                                            </option><option value="Y1">MVO_RBDPKO - Y1
                                                            </option><option value="A6">NBDPKL - A6
                                                            </option><option value="68">NBDPKO - 68
                                                            </option><option value="66">NBDPKS - 66
                                                            </option><option value="X6">NBHPKL - X6
                                                            </option><option value="X5">NBHPKO - X5
                                                            </option><option value="X7">NBHPKS - X7
                                                            </option><option value="A1">NBPKL - A1
                                                            </option><option value="57">NBPKO - 57
                                                            </option><option value="A8">NBPKS - A8
                                                            </option><option value="A5">NPKL - A5
                                                            </option><option value="58">NPKO - 58
                                                            </option><option value="A7">NPKS - A7
                                                            </option><option value="C1">PKAO - C1
                                                            </option><option value="33">PKC - 33
                                                            </option><option value="B1">PKE - B1
                                                            </option><option value="56">PKFAD - 56
                                                            </option><option value="EV">PKMF - EV
                                                            </option><option value="M1">PKOF - M1
                                                            </option><option value="B2">PKP - B2
                                                            </option><option value="X0">RBDHPKL - X0
                                                            </option><option value="W9">RBDHPKO - W9
                                                            </option><option value="X1">RBDHPKS - X1
                                                            </option><option value="32">RBDPKL - 32
                                                            </option><option value="GG">RBDPKL IP - GG
                                                            </option><option value="GE">RBDPKL MB - GE
                                                            </option><option value="GF">RBDPKL SG - GF
                                                            </option><option value="30">RBDPKO - 30
                                                            </option><option value="31">RBDPKS - 31
                                                            </option><option value="M7">RPKL - M7
                                                            </option><option value="G3">RPKO - G3
                                                            </option><option value="M8">RPKS - M8
                                                            </option><option value="FZ">SPKLFA - FZ
                                                            </option><option value="51"> Palm Kernel-51 </option>


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
                                                <input type="text" class="form-control" name='nombor_borang_kastam' style="margin-left:42%; width:40%"
                                                    id="nombor_borang_kastam" required title="Sila isikan butiran ini.">
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
                                                Tarikh Eksport (dd/mm/yyyy)	</label>
                                            <div class="col-md-6">
                                                <input type="date" class="form-control" name='nombor_borang_kastam' style="margin-left:42%; width:40%"
                                                    id="nombor_borang_kastam" required title="Sila isikan butiran ini.">
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
                                                Kuantiti(Tan Metrik)	</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name='destinasi_negara' style="margin-left:42%; width:40%"
                                                    id="destinasi_negara" required title="Sila isikan butiran ini.">
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
                                                <input type="text" class="form-control" name='destinasi_negara' style="margin-left:42%; width:40%"
                                                    id="destinasi_negara" required title="Sila isikan butiran ini.">
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
                                                    <select class="form-select" id="basicSelect" style="margin-left:42%; width:40%">
                                                        <option selected hidden disabled>Sila Pilih Negara</option>

                                                            <option value="A01">AFGHANISTAN
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
                                                </fieldset>
                                                {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                            </div>
                                        </div>


                                    </div>


                                    <div class="row form-group" style="padding-top: 10px; ">



                                        <div class="text-right col-md-11 mb-4 ">
                                            <button type="button" class="btn btn-primary " data-toggle="modal"
                                                style="float: right" data-target="#confirmation">
                                                Simpan</button>
                                        </div>

                                    </div>
                                    <br>
                                    <h5 style="color: rgb(39, 80, 71); text-align:center">Senarai Produk Minyak Sawit</h5>
                                    <hr>
                                    <section class="section">
                                        <div class="card">

                                            <div class="card-body">
                                                <table class='table table-striped' id="table1">
                                                    <thead>
                                                        <tr style="text-align: center">
                                                            <th>Nama Produk</th>
                                                            <th>Nombor Borang Kastam 2</th>
                                                            <th>Tarikh Eksport</th>
                                                            <th>Kuantiti (Tan Metrik)</th>
                                                            <th>Nilai</th>
                                                            <th>Destinasi Negara</th>

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
                                        <a href="{{ route('penapis.bahagiani') }}" class="btn btn-primary"
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

                        <br>

                    </div>
                </div>
            </div>




    </section><!-- End Hero -->



    </main><!-- End #main -->

    <!-- ======= Footer ======= -->





    {{-- <div id="preloader"></div> --}}
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js" >
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
