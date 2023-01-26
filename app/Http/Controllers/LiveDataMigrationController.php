<?php

namespace App\Http\Controllers;

use App\Models\AktivitiIsirung;
use App\Models\AktivitiKilang;
use App\Models\Bulan;
use App\Models\Daerah;
use App\Models\DaerahAsal;
use App\Models\Daerahless;
use App\Models\DynqryApplications;
use App\Models\DynqryGroups;
use App\Models\DynqryGroupsXApps;
use App\Models\DynqryUserApplications;
use App\Models\DynqryUsers;
use App\Models\DynqryUsersXGroups;
use App\Models\E07Btranshipment;
use App\Models\E07Init;
use App\Models\E07Transhipment;
use App\Models\E101B;
use App\Models\E101C;
use App\Models\E101D;
use App\Models\E101E;
use App\Models\E101Init;
use App\Models\E102b;
use App\Models\E102c;
use App\Models\E102Init;
use App\Models\E104B;
use App\Models\E104C;
use App\Models\E104D;
use App\Models\E104Init;
use App\Models\E91b;
use App\Models\E91Init;
use App\Models\Ekilangadminmenu;
use App\Models\Ekilangadminsubmenu;
use App\Models\Ekilangmenu;
use App\Models\Ekilangsubmenu;
use App\Models\Ekmessage;
use App\Models\EmelContent;
use App\Models\H07Btranshipment;
use App\Models\H07Init;
use App\Models\H07Transhipment;
use App\Models\H101B;
use App\Models\H101C;
use App\Models\H101D;
use App\Models\H101E;
use App\Models\H101Init;
use App\Models\H102c;
use App\Models\H102Init;
use App\Models\H104B;
use App\Models\H104C;
use App\Models\H104D;
use App\Models\H104Init;
use App\Models\H91b;
use App\Models\H91Init;
use App\Models\HebahanProses;
use App\Models\HebahanStokAkhir;
use App\Models\JenisProduk;
use App\Models\JenisProduk1;
use App\Models\KategoriPelesen;
use App\Models\KilangTidakRespons;
use App\Models\KodSl;
use App\Models\Linkages;
use App\Models\Negara;
use App\Models\Negeri;
use App\Models\Ng;
use App\Models\Oerdaerah;
use App\Models\Oermsia;
use App\Models\Oernegeri;
use App\Models\Oerpelesen;
use App\Models\Oersemsia;
use App\Models\Oerss;
use App\Models\P101;
use App\Models\P101D;
use App\Models\P101Master;
use App\Models\P101MonthlyDistrictUtilrate;
use App\Models\P101MonthlyGroupUtilrate;
use App\Models\P101MonthlyRegionUtilrate;
use App\Models\P101MonthlyState;
use App\Models\P101MonthlyStateUtilrate;
use App\Models\P101MonthlySyktindukUtilrate;
use App\Models\P101QuarterlyDistrictUtilrate;
use App\Models\P101QuarterlyGroupUtilrate;
use App\Models\P101QuarterlyPelesen;
use App\Models\P101QuarterlyPelesenUtilrate;
use App\Models\P101QuarterlyRegionUtilrate;
use App\Models\P101QuarterlyState;
use App\Models\P101QuarterlyStateUtilrate;
use App\Models\P101QuarterlySyktindukUtilrate;
use App\Models\P101SumberPelesen;
use App\Models\P101SumberState;
use App\Models\P101YearlyDistrictUtilrate;
use App\Models\P101YearlyGroupUtilrate;
use App\Models\P101YearlyMonthUtilrate;
use App\Models\P101YearlyPelesenUtilrate;
use App\Models\P101YearlyRegionUtilrate;
use App\Models\P101YearlyStateUtilrate;
use App\Models\P101YearlySyktindukUtilrate;
use App\Models\P102;
use App\Models\P1022;
use App\Models\P102ActivitiesDistrict;
use App\Models\P102ActivitiesLicensee;
use App\Models\P102ActivitiesMaincompany;
use App\Models\P102ActivitiesRegion;
use App\Models\P102ActivitiesState;
use App\Models\P102MonthlyDistrict;
use App\Models\P102MonthlyDistrictUtilrate;
use App\Models\P102MonthlyLicensee;
use App\Models\P102MonthlyMaincompany;
use App\Models\P102MonthlyMaincompanyUtilrate;
use App\Models\P102MonthlyRegion;
use App\Models\P102MonthlyRegionUtilrate;
use App\Models\P102MonthlyState;
use App\Models\P102MonthlyStateCrshrs;
use App\Models\P102MonthlyStateUtilrate;
use App\Models\P102MonthUtilrate;
use App\Models\P102QuarterlyDistrict;
use App\Models\P102QuarterlyLicensee;
use App\Models\P102QuarterlyMaincompany;
use App\Models\P102QuarterlyRegion;
use App\Models\P102YearlyDistrictUtilrate;
use App\Models\P102YearlyLicenseeUtilrate;
use App\Models\P102YearlyMaincompanyUtilrate;
use App\Models\P102YearlyRegionUtilrate;
use App\Models\P102YearlyStatePurchase;
use App\Models\P102YearlyStateUtilrate;
use App\Models\P104;
use App\Models\P104Master;
use App\Models\P104MonthlyDistrictUtilrate;
use App\Models\P104MonthlyGroupUtilrate;
use App\Models\P104MonthlyPelesenUtilrate;
use App\Models\P104MonthlyRegionUtilrate;
use App\Models\P104MonthlyState;
use App\Models\P104MonthlyStateUtilrate;
use App\Models\P104MonthlySyktindukUtilrate;
use App\Models\P104QuarterlyDistrictUtilrate;
use App\Models\P104QuarterlyGroupUtilrate;
use App\Models\P104QuarterlyPelesen;
use App\Models\P104QuarterlyPelesenUtilrate;
use App\Models\P104QuarterlyRegionUtilrate;
use App\Models\P104QuarterlyState;
use App\Models\P104QuarterlyStateUtilrate;
use App\Models\P104QuarterlySyktindukUtilrate;
use App\Models\P104YearlyDistrictUtilrate;
use App\Models\P104YearlyGroupUtilrate;
use App\Models\P104YearlyMonthUtilrate;
use App\Models\P104YearlyPelesenUtilrate;
use App\Models\P104YearlyRegionUtilrate;
use App\Models\P104YearlyStateUtilrate;
use App\Models\P104YearlySyktindukUtilrate;
use App\Models\P91ActivitiesLicensee;
use App\Models\P91ActivitiesState;
use App\Models\P91DtlCluster;
use App\Models\P91DtlDistrict;
use App\Models\P91DtlKawasan;
use App\Models\P91DtlMonth;
use App\Models\P91DtlPelesen;
use App\Models\P91DtlState;
use App\Models\P91MonthlyClusterOer;
use App\Models\P91MonthlyDistrictOer;
use App\Models\P91MonthlyKawasanOer;
use App\Models\P91MonthlyPelesenOer;
use App\Models\P91MonthlyStateOer;
use App\Models\P91ReceiveFfbState;
use App\Models\P91SellCpoState;
use App\Models\P91SellPkState;
use App\Models\P91YearlyClusterOer;
use App\Models\P91YearlyDistrictOer;
use App\Models\P91YearlyKawasanOer;
use App\Models\P91YearlyMonthOer;
use App\Models\P91YearlyPelesenOer;
use App\Models\P91YearlyStateOer;
use App\Models\Pbcatcol;
use App\Models\Pbcatedt;
use App\Models\Pbcatfmt;
use App\Models\Pbcattbl;
use App\Models\Pbcatvld;
use App\Models\PelabuhanLuar;
use App\Models\PelabuhanMsia;
use App\Models\Pelesen;
use App\Models\Pengumuman;
use App\Models\Pl91Individual;
use App\Models\Pr;
use App\Models\ProdCat;
use App\Models\ProdCat2;
use App\Models\Prodmsia;
use App\Models\Prodnegeri;
use App\Models\Prodsemsia;
use App\Models\Prodss;
use App\Models\Produk;
use App\Models\ProdukCategory;
use App\Models\ProdukGroup;
use App\Models\ProdukIngredient;
use App\Models\ProdukSubgroup;
use App\Models\Region;
use App\Models\RegPelesen;
use App\Models\RegPelesenStock;
use App\Models\RegUser;
use App\Models\ScLog;
use App\Models\State;
use App\Models\StatUser;
use App\Models\StkNegeri;
use App\Models\UserBatch;
use App\Models\WebAudit;
use DB;


class LiveDataMigrationController extends Controller
{


    public function data_migration()
    {
        // $this->aktiviti_isirong();
        // $this->aktiviti_kilang();
        // $this->bulan();
        // $this->daerah();
        // $this->daerah_asal();
        // $this->daerahless();
        // $this->dynqry_applications();
        // $this->dynqry_groups();
        // $this->dynqry_groups_x_apps();
        // $this->dynqry_user_applications();
        // $this->dynqry_users();
        // $this->dynqry_users_x_groups();
        // $this->e07_btranshipment();
        // $this->e07_init();
        // $this->e07_transhipment();
        // $this->e91b();
        // $this->e91_init();
        // $this->e101_b();
        // $this->e101_c();
        // $this->e101_d();
        // $this->e101_e();
        // $this->e101_init();
        // $this->e102b();
        // $this->e102c();
        // $this->e102_init();
        // $this->e104_b();
        // $this->e104_c();
        // $this->e104_d();
        // $this->e104_init();
        // $this->ekilangadminmenu();
        // $this->ekilangadminsubmenu();
        // $this->ekilangmenu();
        // $this->ekilangsubmenu();
        // $this->ekmessage();
        // $this->emel_content();
        // $this->h07_btranshipment();
        // $this->h07_init();
        // $this->h07_transhipment();
        // $this->h91b();
        // $this->h91_init();
        // $this->h101_b();
        // $this->h101_c();
        // $this->h101_d();

        // $this->h101_e();

        // $this->h101_init();
        // $this->h102b();

        // $this->h102c();

        // $this->h102_init();
        // $this->h104_b();
        // $this->h104_c();

        //brlum
        // $this->h104_d();
        // $this->h104_init();



        // $this->hebahan_stok_akhir();
        // $this->jenis_produk();
        // $this->jenis_produk1();
        // $this->kategori_pelesen();
        // $this->kilang_tidak_respons();
        // $this->kod_sl();
        // $this->linkages();
        // $this->negara();
        // $this->negeri();
        // $this->oerdaerah();
        // $this->oermsia();
        // $this->oernegeri();
        // $this->oerpelesen();
        // $this->oersemsia();
        // $this->oerss();
        // $this->p91_activities_state();
        // $this->p91_dtl_cluster();
        // $this->p91_dtl_district();
        // $this->p91_dtl_kawasan();
        // $this->p91_dtl_month();
        // $this->p91_dtl_pelesen();
        // $this->p91_monthly_cluster_oer();
        // $this->p91_monthly_district_oer();
        // $this->p91_monthly_kawasan_oer();
        // $this->p91_monthly_pelesen_oer();
        // $this->p91_monthly_state_oer();
        // $this->p91_receive_ffb_state();
        // $this->p91_sell_cpo_state();
        // $this->p91_sell_pk_state();
        // $this->p91_yearly_cluster_oer();
        // $this->p91_yearly_district_oer();
        // $this->p91_yearly_kawasan_oer();
        // $this->p91_yearly_month_oer();
        // $this->p91_yearly_pelesen_oer();
        // $this->p91_yearly_state_oer();
        // $this->p101();
        // $this->p101_d();
        // $this->p101_master();
        // $this->p101_monthly_district_utilrate();
        // $this->p101_monthly_group_utilrate();
        // $this->p101_monthly_region_utilrate();
        // $this->p101_monthly_state();
        // $this->p101_monthly_state_utilrate();
        // $this->p101_monthly_syktinduk_utilrate();
        // $this->p101_quarterly_district_utilrate();
        // $this->p101_quarterly_group_utilrate();
        // $this->p101_quarterly_pelesen();
        // $this->p101_quarterly_pelesen_utilrate();
        // $this->p101_quarterly_region_utilrate();
        // $this->p101_quarterly_state();
        // $this->p101_quarterly_state_utilrate();
        // $this->p101_quarterly_syktinduk_utilrate();
        // $this->p101_sumber_pelesen();
        // $this->p101_sumber_state();
        // $this->p101_yearly_district_utilrate();
        // $this->p101_yearly_group_utilrate();
        // $this->p101_yearly_month_utilrate();
        // $this->p101_yearly_pelesen_utilrate();
        // $this->p101_yearly_region_utilrate();
        // $this->p101_yearly_state_utilrate();
        // $this->p101_yearly_syktinduk_utilrate();
        // $this->p102();
        // $this->p102_activities_district();
        // $this->p102_activities_licensee();
        // $this->p102_activities_maincompany();
        // $this->p102_activities_region();
        // $this->p102_activities_state();
        // $this->p102_monthly_district();
        // $this->p102_monthly_district_utilrate();
        // $this->p102_monthly_licensee();
        // $this->p102_monthly_maincompany();
        // $this->p102_monthly_maincompany_utilrate();
        // $this->p102_monthly_region();
        // $this->p102_monthly_region_utilrate();
        // $this->p102_monthly_state();
        // $this->p102_monthly_state_crshrs();
        // $this->p102_monthly_state_utilrate();
        // $this->p102_month_utilrate();
        // $this->p102_quarterly_district();
        // $this->p102_quarterly_licensee();
        // $this->p102_quarterly_maincompany();
        // $this->p102_quarterly_region();
        // $this->p102_yearly_district_utilrate();
        // $this->p102_yearly_licensee_utilrate();
        // $this->p102_yearly_maincompany_utilrate();
        // $this->p102_yearly_region_utilrate();
        // $this->p102_yearly_state_purchase();
        // $this->p102_yearly_state_utilrate();
        // $this->p104();
        // $this->p104_master();
        // $this->p104_monthly_district_utilrate();
        // $this->p104_monthly_group_utilrate();
        // $this->p104_monthly_pelesen_utilrate();
        // $this->p104_monthly_region_utilrate();
        // $this->p104_monthly_state();
        // $this->p104_monthly_state_utilrate();
        // $this->p104_monthly_syktinduk_utilrate();
        // $this->p104_quarterly_district_utilrate();
        // $this->p104_quarterly_group_utilrate();
        // $this->p104_quarterly_pelesen();
        // $this->p104_quarterly_pelesen_utilrate();
        // $this->p104_quarterly_region_utilrate();
        // $this->p104_quarterly_state();
        // $this->p104_quarterly_state_utilrate();
        // $this->p104_quarterly_syktinduk_utilrate();
        // $this->p104_yearly_district_utilrate();
        // $this->p104_yearly_group_utilrate();
        // $this->p104_yearly_month_utilrate();
        // $this->p104_yearly_pelesen_utilrate();
        // $this->p104_yearly_region_utilrate();
        // $this->p104_yearly_state_utilrate();
        // $this->p104_yearly_syktinduk_utilrate();
        // $this->p102_2();
        // $this->pbcatcol();
        // $this->pbcatedt();
        // $this->pbcatfmt();
        // $this->pbcattbl();
        // $this->pbcatvld();
        // $this->pelabuhan_luar();
        // $this->pelabuhan_msia();
        $this->pelesen();
        // $this->pengumuman();
        // $this->pl91_individual();
        // $this->pr();
        // $this->prod_cat();
        // $this->prod_cat2();
        // $this->prodmsia();
        // $this->prodnegeri();
        // $this->prodsemsia();
        // $this->prodss();
        // $this->produk();
        // $this->produk_category();
        // $this->produk_group();
        // $this->produk_ingredient();
        // $this->produk_subgroup();
        // $this->region();
        // $this->reg_pelesen();
        // $this->reg_pelesen_stock();
        // $this->reg_user();
        // $this->sc_log();
        // $this->state();
        // $this->stat_user();
        // $this->stknegeri();
        // $this->user_batch();
        // $this->web_audit();

        return redirect()->back()->with('success', 'Data berjaya dimigrasi');

    }


    public function aktiviti_isirong()
    {
        $delete = DB::delete("DELETE FROM aktiviti_isirong");

        $selects = DB::connection('mysql2')->select("SELECT * FROM aktiviti_isirong");

        foreach ($selects as $key => $select) {

            $insert = AktivitiIsirung::create([
                'Activities' => $select->Activities ?? NULL,
                'ActivitiesName' => $select->ActivitiesName ?? NULL,
            ]);
        }
    }

    public function aktiviti_kilang()
    {
        $delete = DB::delete("DELETE FROM aktiviti_kilang");

        $selects = DB::connection('mysql2')->select("SELECT * FROM aktiviti_kilang");

        foreach ($selects as $key => $select) {

            $insert = AktivitiKilang::create([
                'Activities' => $select->Activities ?? NULL,
                'ActivitiesName' => $select->ActivitiesName ?? NULL,
            ]);
        }
    }

    public function bulan()
    {
        $delete = DB::delete("DELETE FROM bulan");

        $selects = DB::connection('mysql2')->select("SELECT * FROM bulan");

        foreach ($selects as $key => $select) {

            $insert = Bulan::create([
                'bulan' => $select->bulan ?? NULL,
                'nama_bulan' => $select->nama_bulan ?? NULL,
            ]);
        }
    }

    public function daerah()
    {
        $delete = DB::delete("DELETE FROM daerah");

        $selects = DB::connection('mysql2')->select("SELECT * FROM daerah");

        foreach ($selects as $key => $select) {

            $insert = Daerah::create([
                'kod_negeri' => $select->kod_negeri ?? NULL,
                'kod_sbsw' => $select->kod_sbsw ?? NULL,
                'kod_daerah' => $select->kod_daerah ?? NULL,
                'nama_daerah' => $select->nama_daerah ?? NULL,
                'nama_daesbsw' => $select->nama_daesbsw ?? NULL,
                'kod_combine' => $select->kod_combine ?? NULL,
            ]);
        }
    }

    public function daerah_asal()
    {
        $delete = DB::delete("DELETE FROM daerah_asal");

        $selects = DB::connection('mysql2')->select("SELECT * FROM daerah_asal");

        foreach ($selects as $key => $select) {

            $insert = DaerahAsal::create([
                'kod_negeri' => $select->kod_negeri ?? NULL,
                'kod_sbsw' => $select->kod_sbsw ?? NULL,
                'kod_daerah' => $select->kod_daerah ?? NULL,
                'nama_daerah' => $select->nama_daerah ?? NULL,
                'nama_daesbsw' => $select->nama_daesbsw ?? NULL,
            ]);
        }
    }

    public function daerahless()
    {
        $delete = DB::delete("DELETE FROM daerahless");

        $selects = DB::connection('mysql2')->select("SELECT * FROM daerahless");

        foreach ($selects as $key => $select) {

            $insert = Daerahless::create([
                'negeri' => $select->negeri ?? NULL,
                'daerah' => $select->daerah ?? NULL,
            ]);
        }
    }
    public function dynqry_applications()
    {
        $delete = DB::delete("DELETE FROM dynqry_applications");

        $selects = DB::connection('mysql2')->select("SELECT * FROM dynqry_applications");

        foreach ($selects as $key => $select) {

            $insert = DynqryApplications::create([
                'name' => $select->name ?? NULL,
                'description' => $select->description ?? NULL,
            ]);
        }
    }
    public function dynqry_groups()
    {
        $delete = DB::delete("DELETE FROM dynqry_groups");

        $selects = DB::connection('mysql2')->select("SELECT * FROM dynqry_groups");

        foreach ($selects as $key => $select) {

            $insert = DynqryGroups::create([
                'code' => $select->code ?? NULL,
                'description' => $select->description ?? NULL,
            ]);
        }
    }
    public function dynqry_groups_x_apps()
    {
        $delete = DB::delete("DELETE FROM dynqry_groups_x_apps");

        $selects = DB::connection('mysql2')->select("SELECT * FROM dynqry_groups_x_apps");

        foreach ($selects as $key => $select) {

            $insert = DynqryGroupsXApps::create([
                'cod_group' => $select->cod_group ?? NULL,
                'cod_application' => $select->cod_application ?? NULL,
            ]);
        }
    }
    public function dynqry_user_applications()
    {
        $delete = DB::delete("DELETE FROM dynqry_user_applications");

        $selects = DB::connection('mysql2')->select("SELECT * FROM dynqry_user_applications");

        foreach ($selects as $key => $select) {

            $insert = DynqryUserApplications::create([
                'fk_user_login' => $select->fk_user_login ?? NULL,
                'fk_interface_name' => $select->fk_interface_name ?? NULL,
            ]);
        }
    }
    public function dynqry_users()
    {
        $delete = DB::delete("DELETE FROM dynqry_users");

        $selects = DB::connection('mysql2')->select("SELECT * FROM dynqry_users");

        foreach ($selects as $key => $select) {

            $insert = DynqryUsers::create([
                'login' => $select->login ?? NULL,
                'password' => $select->password ?? NULL,
                'name' => $select->name ?? NULL,
                'email' => $select->email ?? NULL,
            ]);
        }
    }
    public function dynqry_users_x_groups()
    {
        $delete = DB::delete("DELETE FROM dynqry_users_x_groups");

        $selects = DB::connection('mysql2')->select("SELECT * FROM dynqry_users_x_groups");

        foreach ($selects as $key => $select) {

            $insert = DynqryUsersXGroups::create([
                'login' => $select->login ?? NULL,
                'cod_group' => $select->cod_group ?? NULL,
            ]);
        }
    }
    public function e07_btranshipment()
    {
        $delete = DB::delete("DELETE FROM e07_btranshipment");

        $selects = DB::connection('mysql2')->select("SELECT * FROM e07_btranshipment");

        foreach ($selects as $key => $select) {

            $insert = E07Btranshipment::create([
                'e07bt_id' => $select->e07bt_id ?? NULL,
                'e07bt_idborang' => $select->e07bt_idborang ?? NULL,
                'e07bt_produk' => $select->e07bt_produk ?? NULL,
                'e07bt_stokawal' => $select->e07bt_stokawal ?? NULL,
                'e07bt_terima' => $select->e07bt_terima ?? NULL,
                'e07bt_import' => $select->e07bt_import ?? NULL,
                'e07bt_edaran' => $select->e07bt_edaran ?? NULL,
                'e07bt_eksport' => $select->e07bt_eksport ?? NULL,
                'e07bt_pelarasan' => $select->e07bt_pelarasan ?? NULL,
                'e07bt_stokakhir' => $select->e07bt_stokakhir ?? NULL,
            ]);
        }
    }

    public function e07_init()
    {
        $delete = DB::delete("DELETE FROM e07_init");

        $selects = DB::connection('mysql2')->select("SELECT * FROM e07_init");

        foreach ($selects as $key => $select) {

            $insert = E07Init::create([
                'e07_reg' => $select->e07_reg ?? NULL,
                'e07_nl' => $select->e07_nl ?? NULL,
                'e07_bln' => $select->e07_bln ?? NULL,
                'e07_thn' => $select->e07_thn ?? NULL,
                'e07_flg' => $select->e07_flg ?? NULL,
                'e07_sdate' => $select->e07_sdate ?? NULL,
                'e07_ddate' => $select->e07_ddate ?? NULL,
                'e07_npg' => $select->e07_npg ?? NULL,
                'e07_jpg' => $select->e07_jpg ?? NULL,
                'e07_flagcetak' => $select->e07_flagcetak ?? NULL,
            ]);
        }
    }

    public function e07_transhipment()
    {
        $delete = DB::delete("DELETE FROM e07_transhipment");

        $selects = DB::connection('mysql2')->select("SELECT * FROM e07_transhipment");

        foreach ($selects as $key => $select) {

            $insert = E07Transhipment::create([
                'e07t_id' => $select->e07t_id ?? NULL,
                'e07t_idborang' => $select->e07t_idborang ?? NULL,
                'e07t_produk' => $select->e07t_produk ?? NULL,
                'e07t_stokawal' => $select->e07t_stokawal ?? NULL,
                'e07t_terima' => $select->e07t_terima ?? NULL,
                'e07t_edaran' => $select->e07t_edaran ?? NULL,
                'e07t_eksport' => $select->e07t_eksport ?? NULL,
                'e07t_pelarasan' => $select->e07t_pelarasan ?? NULL,
                'e07t_stokakhir' => $select->e07t_stokakhir ?? NULL,
            ]);
        }
    }

    public function e91b()
    {
        $delete = DB::delete("DELETE FROM e91b");

        $selects = DB::connection('mysql2')->select("SELECT * FROM e91b");

        foreach ($selects as $key => $select) {

            if ($select->e91_b8 == '0000-00-00') {
                $data = NULL;
            } else {
                $data = $select->e91_b8;
            }

            $insert = E91b::create([
                'e91_b1' => $select->e91_b1 ?? NULL,
                'e91_b2' => $select->e91_b2 ?? NULL,
                'e91_b6' => $select->e91_b6 ?? NULL,
                'e91_b7' => $select->e91_b7 ?? NULL,
                'e91_b8' => $data ?? NULL,
                'e91_b9' => $select->e91_b9 ?? NULL,
                'e91_b10' => $select->e91_b10 ?? NULL,
                'e91_b11' => $select->e91_b11 ?? NULL,

            ]);
        }
    }

    public function e91_init()
    {
        $delete = DB::delete("DELETE FROM e91_init");

        $selects = DB::connection('mysql2')->select("SELECT * FROM e91_init");

        foreach ($selects as $key => $select) {

            $insert = E91Init::create([
                'e91_reg' => $select->e91_reg ?? NULL,
                'e91_nl' => $select->e91_nl ?? NULL,
                'e91_bln' => $select->e91_bln ?? NULL,
                'e91_thn' => $select->e91_thn ?? NULL,
                'e91_flg' => $select->e91_flg ?? NULL,
                'e91_sdate' => $select->e91_sdate ?? NULL,
                'e91_ddate' => $select->e91_ddate ?? NULL,
                'e91_aa1' => $select->e91_aa1 ?? NULL,
                'e91_aa2' => $select->e91_aa2 ?? NULL,
                'e91_aa3' => $select->e91_aa3 ?? NULL,
                'e91_aa4' => $select->e91_aa4 ?? NULL,
                'e91_ab1' => $select->e91_ab1 ?? NULL,
                'e91_ab2' => $select->e91_ab2 ?? NULL,
                'e91_ab3' => $select->e91_ab3 ?? NULL,
                'e91_ab4' => $select->e91_ab4 ?? NULL,
                'e91_ac1' => $select->e91_ac1 ?? NULL,
                'e91_ad1' => $select->e91_ad1 ?? NULL,
                'e91_ad2' => $select->e91_ad2 ?? NULL,
                'e91_ad3' => $select->e91_ad3 ?? NULL,
                'e91_ae1' => $select->e91_ae1 ?? NULL,
                'e91_ae2' => $select->e91_ae2 ?? NULL,
                'e91_ae3' => $select->e91_ae3 ?? NULL,
                'e91_ae4' => $select->e91_ae4 ?? NULL,
                'e91_af1' => $select->e91_af1 ?? NULL,
                'e91_af2' => $select->e91_af2 ?? NULL,
                'e91_af3' => $select->e91_af3 ?? NULL,
                'e91_ag1' => $select->e91_ag1 ?? NULL,
                'e91_ag2' => $select->e91_ag2 ?? NULL,
                'e91_ag3' => $select->e91_ag3 ?? NULL,
                'e91_ag4' => $select->e91_ag4 ?? NULL,
                'e91_ah1' => $select->e91_ah1 ?? NULL,
                'e91_ah2' => $select->e91_ah2 ?? NULL,
                'e91_ah3' => $select->e91_ah3 ?? NULL,
                'e91_ah4' => $select->e91_ah4 ?? NULL,
                'e91_ai1' => $select->e91_ai1 ?? NULL,
                'e91_ai2' => $select->e91_ai2 ?? NULL,
                'e91_ai3' => $select->e91_ai3 ?? NULL,
                'e91_ai4' => $select->e91_ai4 ?? NULL,
                'e91_ai5' => $select->e91_ai5 ?? NULL,
                'e91_ai6' => $select->e91_ai6 ?? NULL,
                'e91_aj1' => $select->e91_aj1 ?? NULL,
                'e91_aj2' => $select->e91_aj2 ?? NULL,
                'e91_aj3' => $select->e91_aj3 ?? NULL,
                'e91_aj4' => $select->e91_aj4 ?? NULL,
                'e91_aj5' => $select->e91_aj5 ?? NULL,
                'e91_aj6' => $select->e91_aj6 ?? NULL,
                'e91_aj7' => $select->e91_aj7 ?? NULL,
                'e91_aj8' => $select->e91_aj8 ?? NULL,
                'e91_ak1' => $select->e91_ak1 ?? NULL,
                'e91_ak2' => $select->e91_ak2 ?? NULL,
                'e91_ak3' => $select->e91_ak3 ?? NULL,
                'e91_npg' => $select->e91_npg ?? NULL,
                'e91_jpg' => $select->e91_jpg ?? NULL,
                'e91_flagcetak' => $select->e91_flagcetak ?? NULL,
                'e91_ah5' => $select->e91_ah5 ?? NULL,
                'e91_ah6' => $select->e91_ah6 ?? NULL,
                'e91_ah7' => $select->e91_ah7 ?? NULL,
                'e91_ah8' => $select->e91_ah8 ?? NULL,
                'e91_ah9' => $select->e91_ah9 ?? NULL,
                'e91_ah10' => $select->e91_ah10 ?? NULL,
                'e91_ah11' => $select->e91_ah11 ?? NULL,
                'e91_ah12' => $select->e91_ah12 ?? NULL,
                'e91_ah13' => $select->e91_ah13 ?? NULL,
                'e91_ah14' => $select->e91_ah14 ?? NULL,
                'e91_ah15' => $select->e91_ah15 ?? NULL,
                'e91_ah16' => $select->e91_ah16 ?? NULL,
                'e91_ah17' => $select->e91_ah17 ?? NULL,
                'e91_ah18' => $select->e91_ah18 ?? NULL,

            ]);
        }
    }

    public function e101_b()
    {
        $delete = DB::delete("DELETE FROM e101_b");

        $selects = DB::connection('mysql2')->select("SELECT * FROM e101_b");

        foreach ($selects as $key => $select) {

            $insert = E101B::create([
                'e101_b1' => $select->e101_b1 ?? NULL,
                'e101_reg' => $select->e101_reg ?? NULL,
                'e101_b3' => $select->e101_b3 ?? NULL,
                'e101_b4' => $select->e101_b4 ?? NULL,
                'e101_b5' => $select->e101_b5 ?? NULL,
                'e101_b6' => $select->e101_b6 ?? NULL,
                'e101_b7' => $select->e101_b7 ?? NULL,
                'e101_b8' => $select->e101_b8 ?? NULL,
                'e101_b9' => $select->e101_b9 ?? NULL,
                'e101_b10' => $select->e101_b10 ?? NULL,
                'e101_b11' => $select->e101_b11 ?? NULL,
                'e101_b12' => $select->e101_b12 ?? NULL,
                'e101_b13' => $select->e101_b13 ?? NULL,
                'e101_b14' => $select->e101_b14 ?? NULL,


            ]);
        }
    }

    public function e101_c()
    {
        $delete = DB::delete("DELETE FROM e101_c");

        $selects = DB::connection('mysql2')->select("SELECT * FROM e101_c");

        foreach ($selects as $key => $select) {

            $insert = E101C::create([
                'e101_c1' => $select->e101_c1 ?? NULL,
                'e101_reg' => $select->e101_reg ?? NULL,
                'e101_c3' => $select->e101_c3 ?? NULL,
                'e101_c4' => $select->e101_c4 ?? NULL,
                'e101_c5' => $select->e101_c5 ?? NULL,
                'e101_c6' => $select->e101_c6 ?? NULL,
                'e101_c7' => $select->e101_c7 ?? NULL,
                'e101_c8' => $select->e101_c8 ?? NULL,
                'e101_c9' => $select->e101_c9 ?? NULL,
                'e101_c10' => $select->e101_c10 ?? NULL,


            ]);
        }
    }

    public function e101_d()
    {
        $delete = DB::delete("DELETE FROM e101_d");

        $selects = DB::connection('mysql2')->select("SELECT * FROM e101_d");

        foreach ($selects as $key => $select) {

            $insert = E101D::create([
                'e101_d1' => $select->e101_d1 ?? NULL,
                'e101_reg' => $select->e101_reg ?? NULL,
                'e101_d3' => $select->e101_d3 ?? NULL,
                'e101_d4' => $select->e101_d4 ?? NULL,
                'e101_d5' => $select->e101_d5 ?? NULL,
                'e101_d6' => $select->e101_d6 ?? NULL,
                'e101_d7' => $select->e101_d7 ?? NULL,
                'e101_d8' => $select->e101_d8 ?? NULL,


            ]);
        }
    }

    public function e101_e()
    {
        $delete = DB::delete("DELETE FROM e101_e");

        $selects = DB::connection('mysql2')->select("SELECT * FROM e101_e");

        foreach ($selects as $key => $select) {
            if ($select->e101_e6 == '0000-00-00') {
                $data = NULL;
            } else {
                $data = $select->e101_e6;
            }

            $insert = E101E::create([
                'e101_e1' => $select->e101_e1 ?? NULL,
                'e101_reg' => $select->e101_reg ?? NULL,
                'e101_e3' => $select->e101_e3 ?? NULL,
                'e101_e4' => $select->e101_e4 ?? NULL,
                'e101_e5' => $select->e101_e5 ?? NULL,
                'e101_e6' => $data ?? NULL,
                'e101_e7' => $select->e101_e7 ?? NULL,
                'e101_e8' => $select->e101_e8 ?? NULL,
                'e101_e9' => $select->e101_e9 ?? NULL,
                'nokontrak' => $select->nokontrak ?? NULL,
                'port' => $select->port ?? NULL,
                'portdest' => $select->portdest ?? NULL,
                'matawang' => $select->matawang ?? NULL,
                'nilai' => $select->nilai ?? NULL,
                'nolesen_sykt' => $select->nolesen_sykt ?? NULL,
                'nama_sykt' => $select->nama_sykt ?? NULL,
                'nama_produk' => $select->nama_produk ?? NULL,
                'nama_pelabuhan' => $select->nama_pelabuhan ?? NULL,
                'kenderaan' => $select->kenderaan ?? NULL,
                'kenderaan_nodaftar' => $select->kenderaan_nodaftar ?? NULL,
                'nama_destport' => $select->nama_destport ?? NULL,
                'nama_destnegara' => $select->nama_destnegara ?? NULL,
                'nama_sykt1' => $select->nama_sykt1 ?? NULL,
                'mpobq_bungkusan' => $select->mpobq_bungkusan ?? NULL,
                'mpobq_nilai_2' => $select->mpobq_nilai_2 ?? NULL,


            ]);
        }
    }

    public function e101_init()
    {
        $delete = DB::delete("DELETE FROM e101_init");

        $selects = DB::connection('mysql2')->select("SELECT * FROM e101_init");

        foreach ($selects as $key => $select) {

            $insert = E101Init::create([
                'e101_reg' => $select->e101_reg ?? NULL,
                'e101_nl' => $select->e101_nl ?? NULL,
                'e101_bln' => $select->e101_bln ?? NULL,
                'e101_thn' => $select->e101_thn ?? NULL,
                'e101_flg' => $select->e101_flg ?? NULL,
                'e101_sdate' => $select->e101_sdate ?? NULL,
                'e101_ddate' => $select->e101_ddate ?? NULL,
                'e101_a1' => $select->e101_a1 ?? NULL,
                'e101_a2' => $select->e101_a2 ?? NULL,
                'e101_a3' => $select->e101_a3 ?? NULL,
                'e101_npg' => $select->e101_npg ?? NULL,
                'e101_jpg' => $select->e101_jpg ?? NULL,
                'e101_flagcetak' => $select->e101_flagcetak ?? NULL,


            ]);
        }
    }

    public function e102b()
    {
        $delete = DB::delete("DELETE FROM e102b");

        $selects = DB::connection('mysql2')->select("SELECT * FROM e102b");

        foreach ($selects as $key => $select) {

            $insert = E102b::create([
                'e102_b1' => $select->e102_b1 ?? NULL,
                'e102_b2' => $select->e102_b2 ?? NULL,
                'e102_b3' => $select->e102_b3 ?? NULL,
                'e102_b4' => $select->e102_b4 ?? NULL,
                'e102_b5' => $select->e102_b5 ?? NULL,
                'e102_b6' => $select->e102_b6 ?? NULL,


            ]);
        }
    }


    public function e102c()
    {
        $delete = DB::delete("DELETE FROM e102c");

        $selects = DB::connection('mysql2')->select("SELECT * FROM e102c");

        foreach ($selects as $key => $select) {

            if ($select->e102_c6 == '0000-00-00') {
                $data = NULL;
            } else {
                $data = $select->e102_c6;
            }

            $insert = E102c::create([
                'e102_c1' => $select->e102_c1 ?? NULL,
                'e102_c2' => $select->e102_c2 ?? NULL,
                'e102_c3' => $select->e102_c3 ?? NULL,
                'e102_c4' => $select->e102_c4 ?? NULL,
                'e102_c5' => $select->e102_c5 ?? NULL,
                'e102_c6' => $data ?? NULL,
                'e102_c7' => $select->e102_c7 ?? NULL,
                'e102_c8' => $select->e102_c8 ?? NULL,
                'e102_c9' => $select->e102_c9 ?? NULL,
                'nokontrak' => $select->nokontrak ?? NULL,
                'port' => $select->port ?? NULL,
                'portdest' => $select->portdest ?? NULL,
                'matawang' => $select->matawang ?? NULL,
                'nilai' => $select->nilai ?? NULL,
                'nolesen_sykt' => $select->nolesen_sykt ?? NULL,
                'nama_sykt' => $select->nama_sykt ?? NULL,
                'nama_produk' => $select->nama_produk ?? NULL,
                'nama_pelabuhan' => $select->nama_pelabuhan ?? NULL,
                'kenderaan' => $select->kenderaan ?? NULL,
                'kenderaan_nodaftar' => $select->kenderaan_nodaftar ?? NULL,
                'nama_destport' => $select->nama_destport ?? NULL,
                'nama_destnegara' => $select->nama_destnegara ?? NULL,
                'nama_sykt1' => $select->nama_sykt1 ?? NULL,
                'mpobq_bungkusan' => $select->mpobq_bungkusan ?? NULL,
                'mpobq_nilai_2' => $select->mpobq_nilai_2 ?? NULL,


            ]);
        }
    }

    public function e102_init()
    {
        $delete = DB::delete("DELETE FROM e102_init");

        $selects = DB::connection('mysql2')->select("SELECT * FROM e102_init");

        foreach ($selects as $key => $select) {

            $insert = E102Init::create([
                'e102_reg' => $select->e102_reg ?? NULL,
                'e102_nl' => $select->e102_nl ?? NULL,
                'e102_bln' => $select->e102_bln ?? NULL,
                'e102_thn' => $select->e102_thn ?? NULL,
                'e102_flg' => $select->e102_flg ?? NULL,
                'e102_sdate' => $select->e102_sdate ?? NULL,
                'e102_ddate' => $select->e102_ddate ?? NULL,
                'e102_aa1' => $select->e102_aa1 ?? NULL,
                'e102_aa2' => $select->e102_aa2 ?? NULL,
                'e102_aa3' => $select->e102_aa3 ?? NULL,
                'e102_ab1' => $select->e102_ab1 ?? NULL,
                'e102_ab2' => $select->e102_ab2 ?? NULL,
                'e102_ab3' => $select->e102_ab3 ?? NULL,
                'e102_ac1' => $select->e102_ac1 ?? NULL,
                'e102_ac2' => $select->e102_ac2 ?? NULL,
                'e102_ac3' => $select->e102_ac3 ?? NULL,
                'e102_ad1' => $select->e102_ad1 ?? NULL,
                'e102_ad2' => $select->e102_ad2 ?? NULL,
                'e102_ad3' => $select->e102_ad3 ?? NULL,
                'e102_ae1' => $select->e102_ae1 ?? NULL,
                'e102_af2' => $select->e102_af2 ?? NULL,
                'e102_af3' => $select->e102_af3 ?? NULL,
                'e102_ag1' => $select->e102_ag1 ?? NULL,
                'e102_ag2' => $select->e102_ag2 ?? NULL,
                'e102_ag3' => $select->e102_ag3 ?? NULL,
                'e102_ah1' => $select->e102_ah1 ?? NULL,
                'e102_ah2' => $select->e102_ah2 ?? NULL,
                'e102_ah3' => $select->e102_ah3 ?? NULL,
                'e102_ai1' => $select->e102_ai1 ?? NULL,
                'e102_ai2' => $select->e102_ai2 ?? NULL,
                'e102_ai3' => $select->e102_ai3 ?? NULL,
                'e102_aj1' => $select->e102_aj1 ?? NULL,
                'e102_aj2' => $select->e102_aj2 ?? NULL,
                'e102_aj3' => $select->e102_aj3 ?? NULL,
                'e102_ak1' => $select->e102_ak1 ?? NULL,
                'e102_ak2' => $select->e102_ak2 ?? NULL,
                'e102_ak3' => $select->e102_ak3 ?? NULL,
                'e102_npg' => $select->e102_npg ?? NULL,
                'e102_jpg' => $select->e102_jpg ?? NULL,
                'e102_flagcetak' => $select->e102_flagcetak ?? NULL,
                'e102_ae3' => $select->e102_ae3 ?? NULL,

            ]);
        }
    }

    public function e104_b()
    {
        $delete = DB::delete("DELETE FROM e104_b");

        $selects = DB::connection('mysql2')->select("SELECT * FROM e104_b");

        foreach ($selects as $key => $select) {

            $insert = E104B::create([
                'e104_b1' => $select->e104_b1 ?? NULL,
                'e104_reg' => $select->e104_reg ?? NULL,
                'e104_b3' => $select->e104_b3 ?? NULL,
                'e104_b4' => $select->e104_b4 ?? NULL,
                'e104_b5' => $select->e104_b5 ?? NULL,
                'e104_b6' => $select->e104_b6 ?? NULL,
                'e104_b7' => $select->e104_b7 ?? NULL,
                'e104_b8' => $select->e104_b8 ?? NULL,
                'e104_b9' => $select->e104_b9 ?? NULL,
                'e104_b10' => $select->e104_b10 ?? NULL,
                'e104_b11' => $select->e104_b11 ?? NULL,
                'e104_b12' => $select->e104_b12 ?? NULL,
                'e104_b13' => $select->e104_b13 ?? NULL,


            ]);
        }
    }

    public function e104_c()
    {
        $delete = DB::delete("DELETE FROM e104_c");

        $selects = DB::connection('mysql2')->select("SELECT * FROM e104_c");

        foreach ($selects as $key => $select) {

            $insert = E104C::create([
                'e104_c1' => $select->e104_c1 ?? NULL,
                'e104_reg' => $select->e104_reg ?? NULL,
                'e104_c3' => $select->e104_c3 ?? NULL,
                'e104_c4' => $select->e104_c4 ?? NULL,
                'e104_c5' => $select->e104_c5 ?? NULL,
                'e104_c6' => $select->e104_c6 ?? NULL,
                'e104_c7' => $select->e104_c7 ?? NULL,
                'e104_c8' => $select->e104_c8 ?? NULL,


            ]);
        }
    }


    public function e104_d()
    {
        $delete = DB::delete("DELETE FROM e104_d");

        $selects = DB::connection('mysql2')->select("SELECT * FROM e104_d");

        foreach ($selects as $key => $select) {

            if ($select->e104_d6 == '0000-00-00') {
                $data = NULL;
            } else {
                $data = $select->e104_d6;
            }

            $insert = E104D::create([
                'e104_d1' => $select->e104_d1 ?? NULL,
                'e104_reg' => $select->e104_reg ?? NULL,
                'e104_d3' => $select->e104_d3 ?? NULL,
                'e104_d4' => $select->e104_d4 ?? NULL,
                'e104_d5' => $select->e104_d5 ?? NULL,
                'e104_d6' => $data ?? NULL,
                'e104_d7' => $select->e104_d7 ?? NULL,
                'e104_d8' => $select->e104_d8 ?? NULL,
                'e104_d9' => $select->e104_d9 ?? NULL,
                'nokontrak' => $select->nokontrak ?? NULL,
                'port' => $select->port ?? NULL,
                'portdest' => $select->portdest ?? NULL,
                'matawang' => $select->matawang ?? NULL,
                'nilai' => $select->nilai ?? NULL,
                'nolesen_sykt' => $select->nolesen_sykt ?? NULL,
                'nama_sykt' => $select->nama_sykt ?? NULL,
                'nama_produk' => $select->nama_produk ?? NULL,
                'nama_pelabuhan' => $select->nama_pelabuhan ?? NULL,
                'kenderaan' => $select->kenderaan ?? NULL,
                'kenderaan_nodaftar' => $select->kenderaan_nodaftar ?? NULL,
                'nama_destport' => $select->nama_destport ?? NULL,
                'nama_destnegara' => $select->nama_destnegara ?? NULL,
                'nama_sykt1' => $select->nama_sykt1 ?? NULL,
                'mpobq_bungkusan' => $select->mpobq_bungkusan ?? NULL,
                'mpobq_nilai_2' => $select->mpobq_nilai_2 ?? NULL,


            ]);
        }
    }


    public function e104_init()
    {
        $delete = DB::delete("DELETE FROM e104_init");

        $selects = DB::connection('mysql2')->select("SELECT * FROM e104_init");

        foreach ($selects as $key => $select) {

            $insert = E104Init::create([
                'e104_reg' => $select->e104_reg ?? NULL,
                'e104_nl' => $select->e104_nl ?? NULL,
                'e104_bln' => $select->e104_bln ?? NULL,
                'e104_thn' => $select->e104_thn ?? NULL,
                'e104_flg' => $select->e104_flg ?? NULL,
                'e104_sdate' => $select->e104_sdate ?? NULL,
                'e104_ddate' => $select->e104_ddate ?? NULL,
                'e104_a5' => $select->e104_a5 ?? NULL,
                'e104_a6' => $select->e104_a6 ?? NULL,
                'e104_npg' => $select->e104_npg ?? NULL,
                'e104_jpg' => $select->e104_jpg ?? NULL,
                'e104_flagcetak' => $select->e104_flagcetak ?? NULL,

            ]);
        }
    }

    public function ekilangadminmenu()
    {
        $delete = DB::delete("DELETE FROM ekilangadminmenu");

        $selects = DB::connection('mysql2')->select("SELECT * FROM ekilangadminmenu");

        foreach ($selects as $key => $select) {

            $insert = Ekilangadminmenu::create([
                'admenu_id' => $select->admenu_id ?? NULL,
                'admenu_status' => $select->admenu_status ?? NULL,
                'admenu_item' => $select->admenu_item ?? NULL,
                'admenu_file' => $select->admenu_file ?? NULL,
                'admenu_desc' => $select->admenu_desc ?? NULL,

            ]);
        }
    }

    public function ekilangadminsubmenu()
    {
        $delete = DB::delete("DELETE FROM ekilangadminsubmenu");

        $selects = DB::connection('mysql2')->select("SELECT * FROM ekilangadminsubmenu");

        foreach ($selects as $key => $select) {

            $insert = Ekilangadminsubmenu::create([
                'adsubmenu_id' => $select->adsubmenu_id ?? NULL,
                'adsubmenu_status' => $select->adsubmenu_status ?? NULL,
                'adsubmenu_item' => $select->adsubmenu_item ?? NULL,
                'adsubmenu_file' => $select->adsubmenu_file ?? NULL,
                'adsubmenu_desc' => $select->adsubmenu_desc ?? NULL,

            ]);
        }
    }

    public function ekilangmenu()
    {
        $delete = DB::delete("DELETE FROM ekilangmenu");

        $selects = DB::connection('mysql2')->select("SELECT * FROM ekilangmenu");

        foreach ($selects as $key => $select) {

            $insert = Ekilangmenu::create([
                'menu_id' => $select->menu_id ?? NULL,
                'menu_status' => $select->menu_status ?? NULL,
                'menu_item' => $select->menu_item ?? NULL,
                'menu_file' => $select->menu_file ?? NULL,
                'menu_desc' => $select->menu_desc ?? NULL,

            ]);
        }
    }

    public function ekilangsubmenu()
    {
        $delete = DB::delete("DELETE FROM ekilangsubmenu");

        $selects = DB::connection('mysql2')->select("SELECT * FROM ekilangsubmenu");

        foreach ($selects as $key => $select) {

            $insert = Ekilangsubmenu::create([
                'submenu_id' => $select->submenu_id ?? NULL,
                'menu_id' => $select->menu_id ?? NULL,
                'submenu_status' => $select->submenu_status ?? NULL,
                'submenu_status_borang' => $select->submenu_status_borang ?? NULL,
                'submenu_item' => $select->submenu_item ?? NULL,
                'submenu_file' => $select->submenu_file ?? NULL,
                'submenu_desc' => $select->submenu_desc ?? NULL,

            ]);
        }
    }

    public function ekmessage()
    {
        $delete = DB::delete("DELETE FROM ekmessage");

        $selects = DB::connection('mysql2')->select("SELECT * FROM ekmessage");

        foreach ($selects as $key => $select) {

            $insert = Ekmessage::create([
                'Date' => $select->Date ?? NULL,
                'FromName' => $select->FromName ?? NULL,
                'FromLicense' => $select->FromLicense ?? NULL,
                'FromEmail' => $select->FromEmail ?? NULL,
                'Category' => $select->Category ?? NULL,
                'TypeOfEmail' => $select->TypeOfEmail ?? NULL,
                'Subject' => $select->Subject ?? NULL,
                'Message' => $select->Message ?? NULL,
                'Status' => $select->Status ?? NULL,
                'file_upload' => $select->file_upload ?? NULL,


            ]);
        }
    }

    public function emel_content()
    {
        $delete = DB::delete("DELETE FROM emel_content");

        $selects = DB::connection('mysql2')->select("SELECT * FROM emel_content");

        foreach ($selects as $key => $select) {

            $insert = EmelContent::create([
                'Id' => $select->Id ?? NULL,
                'tajuk' => $select->tajuk ?? NULL,
                'kandungan' => $select->kandungan ?? NULL,

            ]);
        }
    }

    public function h07_btranshipment()
    {
        $delete = DB::delete("DELETE FROM h07_btranshipment");

        $selects = DB::connection('mysql2')->select("SELECT * FROM h07_btranshipment");

        foreach ($selects as $key => $select) {

            $insert = H07Btranshipment::create([
                'e07bt_id' => $select->e07bt_id ?? NULL,
                'e07bt_nobatch' => $select->e07bt_nobatch ?? NULL,
                'e07bt_produk' => $select->e07bt_produk ?? NULL,
                'e07bt_stokawal' => $select->e07bt_stokawal ?? NULL,
                'e07bt_terima' => $select->e07bt_terima ?? NULL,
                'e07bt_import' => $select->e07bt_import ?? NULL,
                'e07bt_edaran' => $select->e07bt_edaran ?? NULL,
                'e07bt_eksport' => $select->e07bt_eksport ?? NULL,
                'e07bt_pelarasan' => $select->e07bt_pelarasan ?? NULL,
                'e07bt_stokakhir' => $select->e07bt_stokakhir ?? NULL,
            ]);
        }
    }

    public function h07_init()
    {
        $delete = DB::delete("DELETE FROM h07_init");

        $selects = DB::connection('mysql2')->select("SELECT * FROM h07_init");

        foreach ($selects as $key => $select) {

            $insert = H07Init::create([
                'e07_nobatch' => $select->e07_nobatch ?? NULL,
                'e07_nl' => $select->e07_nl ?? NULL,
                'e07_bln' => $select->e07_bln ?? NULL,
                'e07_thn' => $select->e07_thn ?? NULL,
                'e07_flg' => $select->e07_flg ?? NULL,
                'e07_sdate' => $select->e07_sdate ?? NULL,
                'e07_ddate' => $select->e07_ddate ?? NULL,
                'e07_npg' => $select->e07_npg ?? NULL,
                'e07_jpg' => $select->e07_jpg ?? NULL,
            ]);
        }
    }

    public function h07_transhipment()
    {
        $delete = DB::delete("DELETE FROM h07_transhipment");

        $selects = DB::connection('mysql2')->select("SELECT * FROM h07_transhipment");

        foreach ($selects as $key => $select) {

            $insert = H07Transhipment::create([
                'e07t_id' => $select->e07t_id ?? NULL,
                'e07t_nobatch' => $select->e07t_nobatch ?? NULL,
                'e07t_produk' => $select->e07t_produk ?? NULL,
                'e07t_stokawal' => $select->e07t_stokawal ?? NULL,
                'e07t_terima' => $select->e07t_terima ?? NULL,
                'e07t_edaran' => $select->e07t_edaran ?? NULL,
                'e07t_eksport' => $select->e07t_eksport ?? NULL,
                'e07t_pelarasan' => $select->e07t_pelarasan ?? NULL,
                'e07t_stokakhir' => $select->e07t_stokakhir ?? NULL,
            ]);
        }
    }


    public function h91b()
    {
        $delete = DB::delete("DELETE FROM h91b");

        $selects = DB::connection('mysql2')->select("SELECT * FROM h91b");

        foreach ($selects as $key => $select) {

            if ($select->e91_b8 == '0000-00-00') {
                $data = NULL;
            } else {
                $data = $select->e91_b8;
            }


            $insert = H91b::create([
                'e91_b1' => $select->e91_b1 ?? NULL,
                'e91_nobatch' => $select->e91_nobatch ?? NULL,
                'e91_b6' => $select->e91_b6 ?? NULL,
                'e91_b7' => $select->e91_b7 ?? NULL,
                'e91_b8' => $data?? NULL,
                'e91_b9' => $select->e91_b9 ?? NULL,
                'e91_b10' => $select->e91_b10 ?? NULL,
                'e91_b11' => $select->e91_b11 ?? NULL,

            ]);
        }
    }

    public function h91_init()
    {
        $delete = DB::delete("DELETE FROM h91_init");

        $selects = DB::connection('mysql2')->select("SELECT * FROM h91_init");

        foreach ($selects as $key => $select) {

            $insert = H91Init::create([
                'e91_nobatch' => $select->e91_nobatch ?? NULL,
                'e91_nl' => $select->e91_nl ?? NULL,
                'e91_bln' => $select->e91_bln ?? NULL,
                'e91_thn' => $select->e91_thn ?? NULL,
                'e91_flg' => $select->e91_flg ?? NULL,
                'e91_sdate' => $select->e91_sdate ?? NULL,
                'e91_ddate' => $select->e91_ddate ?? NULL,
                'e91_aa1' => $select->e91_aa1 ?? NULL,
                'e91_aa2' => $select->e91_aa2 ?? NULL,
                'e91_aa3' => $select->e91_aa3 ?? NULL,
                'e91_aa4' => $select->e91_aa4 ?? NULL,
                'e91_ab1' => $select->e91_ab1 ?? NULL,
                'e91_ab2' => $select->e91_ab2 ?? NULL,
                'e91_ab3' => $select->e91_ab3 ?? NULL,
                'e91_ab4' => $select->e91_ab4 ?? NULL,
                'e91_ac1' => $select->e91_ac1 ?? NULL,
                'e91_ad1' => $select->e91_ad1 ?? NULL,
                'e91_ad2' => $select->e91_ad2 ?? NULL,
                'e91_ad3' => $select->e91_ad3 ?? NULL,
                'e91_ae1' => $select->e91_ae1 ?? NULL,
                'e91_ae2' => $select->e91_ae2 ?? NULL,
                'e91_ae3' => $select->e91_ae3 ?? NULL,
                'e91_ae4' => $select->e91_ae4 ?? NULL,
                'e91_af1' => $select->e91_af1 ?? NULL,
                'e91_af2' => $select->e91_af2 ?? NULL,
                'e91_af3' => $select->e91_af3 ?? NULL,
                'e91_ag1' => $select->e91_ag1 ?? NULL,
                'e91_ag2' => $select->e91_ag2 ?? NULL,
                'e91_ag3' => $select->e91_ag3 ?? NULL,
                'e91_ag4' => $select->e91_ag4 ?? NULL,
                'e91_ah1' => $select->e91_ah1 ?? NULL,
                'e91_ah2' => $select->e91_ah2 ?? NULL,
                'e91_ah3' => $select->e91_ah3 ?? NULL,
                'e91_ah4' => $select->e91_ah4 ?? NULL,
                'e91_ai1' => $select->e91_ai1 ?? NULL,
                'e91_ai2' => $select->e91_ai2 ?? NULL,
                'e91_ai3' => $select->e91_ai3 ?? NULL,
                'e91_ai4' => $select->e91_ai4 ?? NULL,
                'e91_ai5' => $select->e91_ai5 ?? NULL,
                'e91_ai6' => $select->e91_ai6 ?? NULL,
                'e91_aj1' => $select->e91_aj1 ?? NULL,
                'e91_aj2' => $select->e91_aj2 ?? NULL,
                'e91_aj3' => $select->e91_aj3 ?? NULL,
                'e91_aj4' => $select->e91_aj4 ?? NULL,
                'e91_aj5' => $select->e91_aj5 ?? NULL,
                'e91_aj6' => $select->e91_aj6 ?? NULL,
                'e91_aj7' => $select->e91_aj7 ?? NULL,
                'e91_aj8' => $select->e91_aj8 ?? NULL,
                'e91_ak1' => $select->e91_ak1 ?? NULL,
                'e91_ak2' => $select->e91_ak2 ?? NULL,
                'e91_ak3' => $select->e91_ak3 ?? NULL,
                'e91_npg' => $select->e91_npg ?? NULL,
                'e91_jpg' => $select->e91_jpg ?? NULL,
                'e91_ah5' => $select->e91_ah5 ?? NULL,
                'e91_ah6' => $select->e91_ah6 ?? NULL,
                'e91_ah7' => $select->e91_ah7 ?? NULL,
                'e91_ah8' => $select->e91_ah8 ?? NULL,
                'e91_ah9' => $select->e91_ah9 ?? NULL,
                'e91_ah10' => $select->e91_ah10 ?? NULL,
                'e91_ah11' => $select->e91_ah11 ?? NULL,
                'e91_ah12' => $select->e91_ah12 ?? NULL,
                'e91_ah13' => $select->e91_ah13 ?? NULL,
                'e91_ah14' => $select->e91_ah14 ?? NULL,
                'e91_ah15' => $select->e91_ah15 ?? NULL,
                'e91_ah16' => $select->e91_ah16 ?? NULL,
                'e91_ah17' => $select->e91_ah17 ?? NULL,
                'e91_ah18' => $select->e91_ah18 ?? NULL,

            ]);
        }
    }


    public function h101_b()
    {
        $delete = DB::delete("DELETE FROM h101_b");

        $selects = DB::connection('mysql2')->select("SELECT * FROM h101_b");

        foreach ($selects as $key => $select) {

            $insert = H101B::create([
                'e101_b1' => $select->e101_b1 ?? NULL,
                'e101_nobatch' => $select->e101_nobatch ?? NULL,
                'e101_b3' => $select->e101_b3 ?? NULL,
                'e101_b4' => $select->e101_b4 ?? NULL,
                'e101_b5' => $select->e101_b5 ?? NULL,
                'e101_b6' => $select->e101_b6 ?? NULL,
                'e101_b7' => $select->e101_b7 ?? NULL,
                'e101_b8' => $select->e101_b8 ?? NULL,
                'e101_b9' => $select->e101_b9 ?? NULL,
                'e101_b10' => $select->e101_b10 ?? NULL,
                'e101_b11' => $select->e101_b11 ?? NULL,
                'e101_b12' => $select->e101_b12 ?? NULL,
                'e101_b13' => $select->e101_b13 ?? NULL,
                'e101_b14' => $select->e101_b14 ?? NULL,


            ]);
        }
    }

    public function h101_c()
    {
        $delete = DB::delete("DELETE FROM h101_c");

        $selects = DB::connection('mysql2')->select("SELECT * FROM h101_c");

        foreach ($selects as $key => $select) {

            $insert = H101C::create([
                'e101_c1' => $select->e101_c1 ?? NULL,
                'e101_nobatch' => $select->e101_nobatch ?? NULL,
                'e101_c3' => $select->e101_c3 ?? NULL,
                'e101_c4' => $select->e101_c4 ?? NULL,
                'e101_c5' => $select->e101_c5 ?? NULL,
                'e101_c6' => $select->e101_c6 ?? NULL,
                'e101_c7' => $select->e101_c7 ?? NULL,
                'e101_c8' => $select->e101_c8 ?? NULL,
                'e101_c9' => $select->e101_c9 ?? NULL,
                'e101_c10' => $select->e101_c10 ?? NULL,


            ]);
        }
    }

    public function h101_d()
    {
        $delete = DB::delete("DELETE FROM h101_d");

        $selects = DB::connection('mysql2')->select("SELECT * FROM h101_d");

        foreach ($selects as $key => $select) {

            $insert = H101D::create([
                'e101_d1' => $select->e101_d1 ?? NULL,
                'e101_nobatch' => $select->e101_nobatch ?? NULL,
                'e101_d3' => $select->e101_d3 ?? NULL,
                'e101_d4' => $select->e101_d4 ?? NULL,
                'e101_d5' => $select->e101_d5 ?? NULL,
                'e101_d6' => $select->e101_d6 ?? NULL,
                'e101_d7' => $select->e101_d7 ?? NULL,
                'e101_d8' => $select->e101_d8 ?? NULL,


            ]);
        }
    }

    public function h101_e()
    {
        $delete = DB::delete("DELETE FROM h101_e");

        $selects = DB::connection('mysql2')->select("SELECT * FROM h101_e");

        foreach ($selects as $key => $select) {

            if ($select->e101_e6 == '0000-00-00' || $select->e101_e6 == '2020-00-03' || $select->e101_e6 == '2020-00-01'  || $select->e101_e6 == '2020-00-00'|| $select->e101_e6 == '2020-00-08'|| $select->e101_e6 == '2000-04-00'|| $select->e101_e6 == '2020-00-12') {
                $data = NULL;
            } elseif($select->e101_e6 == '2020-00-07' || $select->e101_e6 == '2000-00-22' || $select->e101_e6 == '2000-07-00' || $select->e101_e6 == '2020-00-06' || $select->e101_e6 == '2000-08-00' || $select->e101_e6 == '2020-00-09' || $select->e101_e6 == '2009-00-05') {
                $data = NULL;
            }
             elseif($select->e101_e6 == '2009-00-09' || $select->e101_e6 == '2001-00-02' || $select->e101_e6 == '2001-00-03' || $select->e101_e6 == '2001-00-04'|| $select->e101_e6 == '2001-00-05'){
                $data = NULL;
            }
             elseif($select->e101_e6 == '2001-00-06' || $select->e101_e6 == '2001-00-07' || $select->e101_e6 == '2001-00-08' || $select->e101_e6 == '2021-00-07' || $select->e101_e6 == '2021-00-06'){
                $data = NULL;
            }
             else {
                $data = $select->e101_e6;
            }

            $insert = H101E::create([
                'e101_e1' => $select->e101_e1 ?? NULL,
                'e101_nobatch' => $select->e101_nobatch ?? NULL,
                'e101_e3' => $select->e101_e3 ?? NULL,
                'e101_e4' => $select->e101_e4 ?? NULL,
                'e101_e5' => $select->e101_e5 ?? NULL,
                'e101_e6' => $data ?? NULL,
                'e101_e7' => $select->e101_e7 ?? NULL,
                'e101_e8' => $select->e101_e8 ?? NULL,
                'e101_e9' => $select->e101_e9 ?? NULL,
                'nokontrak' => $select->nokontrak ?? NULL,
                'port' => $select->port ?? NULL,
                'portdest' => $select->portdest ?? NULL,
                'matawang' => $select->matawang ?? NULL,
                'nilai' => $select->nilai ?? NULL,
                'nolesen_sykt' => $select->nolesen_sykt ?? NULL,
                'nama_sykt' => $select->nama_sykt ?? NULL,
                'nama_produk' => $select->nama_produk ?? NULL,
                'nama_pelabuhan' => $select->nama_pelabuhan ?? NULL,
                'kenderaan' => $select->kenderaan ?? NULL,
                'kenderaan_nodaftar' => $select->kenderaan_nodaftar ?? NULL,
                'nama_destport' => $select->nama_destport ?? NULL,
                'nama_destnegara' => $select->nama_destnegara ?? NULL,
                'nama_sykt1' => $select->nama_sykt1 ?? NULL,
                'mpobq_bungkusan' => $select->mpobq_bungkusan ?? NULL,
                'mpobq_nilai_2' => $select->mpobq_nilai_2 ?? NULL,


            ]);
        }
    }

    public function h101_init()
    {
        $delete = DB::delete("DELETE FROM h101_init");

        $selects = DB::connection('mysql2')->select("SELECT * FROM h101_init");



        foreach ($selects as $key => $select) {

            if ($select->e101_ddate == '2020-00-09'  ) {
                $data = NULL;
            }
             else {
                $data = $select->e101_ddate;
            }

            $insert = H101Init::create([
                'e101_nobatch' => $select->e101_nobatch ?? NULL,
                'e101_nl' => $select->e101_nl ?? NULL,
                'e101_bln' => $select->e101_bln ?? NULL,
                'e101_thn' => $select->e101_thn ?? NULL,
                'e101_flg' => $select->e101_flg ?? NULL,
                'e101_sdate' => $select->e101_sdate ?? NULL,
                'e101_ddate' => $data ?? NULL,
                'e101_a5' => $select->e101_a5 ?? NULL,
                'e101_a6' => $select->e101_a6 ?? NULL,
                'e101_a7' => $select->e101_a7 ?? NULL,
                'e101_npg' => $select->e101_npg ?? NULL,
                'e101_jpg' => $select->e101_jpg ?? NULL,


            ]);
        }
    }

    public function h102b()
    {
        $delete = DB::delete("DELETE FROM h102b");

        $selects = DB::connection('mysql2')->select("SELECT * FROM h102b");

        foreach ($selects as $key => $select) {

            $insert = H101B::create([
                'e102_b1' => $select->e102_b1 ?? NULL,
                'e102_nobatch' => $select->e102_nobatch ?? NULL,
                'e102_b3' => $select->e102_b3 ?? NULL,
                'e102_b4' => $select->e102_b4 ?? NULL,
                'e102_b5' => $select->e102_b5 ?? NULL,
                'e102_b6' => $select->e102_b6 ?? NULL,


            ]);
        }
    }


    public function h102c()
    {
        $delete = DB::delete("DELETE FROM h102c");

        $selects = DB::connection('mysql2')->select("SELECT * FROM h102c");

        foreach ($selects as $key => $select) {

            if ($select->e102_c6 == '2001-00-03'  ) {
                $data = NULL;
            }
             else {
                $data = $select->e102_c6;
            }

            $insert = H102c::create([
                'e102_c1' => $select->e102_c1 ?? NULL,
                'e102_nobatch' => $select->e102_nobatch ?? NULL,
                'e102_c3' => $select->e102_c3 ?? NULL,
                'e102_c4' => $select->e102_c4 ?? NULL,
                'e102_c5' => $select->e102_c5 ?? NULL,
                'e102_c6' => $data ?? NULL,
                'e102_c7' => $select->e102_c7 ?? NULL,
                'e102_c8' => $select->e102_c8 ?? NULL,
                'e102_c9' => $select->e102_c9 ?? NULL,
                'nokontrak' => $select->nokontrak ?? NULL,
                'port' => $select->port ?? NULL,
                'portdest' => $select->portdest ?? NULL,
                'matawang' => $select->matawang ?? NULL,
                'nilai' => $select->nilai ?? NULL,
                'nolesen_sykt' => $select->nolesen_sykt ?? NULL,
                'nama_sykt' => $select->nama_sykt ?? NULL,
                'nama_produk' => $select->nama_produk ?? NULL,
                'nama_pelabuhan' => $select->nama_pelabuhan ?? NULL,
                'kenderaan' => $select->kenderaan ?? NULL,
                'kenderaan_nodaftar' => $select->kenderaan_nodaftar ?? NULL,
                'nama_destport' => $select->nama_destport ?? NULL,
                'nama_destnegara' => $select->nama_destnegara ?? NULL,
                'nama_sykt1' => $select->nama_sykt1 ?? NULL,
                'mpobq_bungkusan' => $select->mpobq_bungkusan ?? NULL,
                'mpobq_nilai_2' => $select->mpobq_nilai_2 ?? NULL,


            ]);
        }
    }

    public function h102_init()
    {
        $delete = DB::delete("DELETE FROM h102_init");

        $selects = DB::connection('mysql2')->select("SELECT * FROM h102_init");

        foreach ($selects as $key => $select) {

            $insert = H102Init::create([
                'e102_nobatch' => $select->e102_nobatch ?? NULL,
                'e102_nl' => $select->e102_nl ?? NULL,
                'e102_bln' => $select->e102_bln ?? NULL,
                'e102_thn' => $select->e102_thn ?? NULL,
                'e102_flg' => $select->e102_flg ?? NULL,
                'e102_sdate' => $select->e102_sdate ?? NULL,
                'e102_ddate' => $select->e102_ddate ?? NULL,
                'e102_aa1' => $select->e102_aa1 ?? NULL,
                'e102_aa2' => $select->e102_aa2 ?? NULL,
                'e102_aa3' => $select->e102_aa3 ?? NULL,
                'e102_ab1' => $select->e102_ab1 ?? NULL,
                'e102_ab2' => $select->e102_ab2 ?? NULL,
                'e102_ab3' => $select->e102_ab3 ?? NULL,
                'e102_ac1' => $select->e102_ac1 ?? NULL,
                'e102_ac2' => $select->e102_ac2 ?? NULL,
                'e102_ac3' => $select->e102_ac3 ?? NULL,
                'e102_ad1' => $select->e102_ad1 ?? NULL,
                'e102_ad2' => $select->e102_ad2 ?? NULL,
                'e102_ad3' => $select->e102_ad3 ?? NULL,
                'e102_ae1' => $select->e102_ae1 ?? NULL,
                'e102_af1' => $select->e102_af1 ?? NULL,
                'e102_af2' => $select->e102_af2 ?? NULL,
                'e102_af3' => $select->e102_af3 ?? NULL,
                'e102_ag1' => $select->e102_ag1 ?? NULL,
                'e102_ag2' => $select->e102_ag2 ?? NULL,
                'e102_ag3' => $select->e102_ag3 ?? NULL,
                'e102_ah1' => $select->e102_ah1 ?? NULL,
                'e102_ah2' => $select->e102_ah2 ?? NULL,
                'e102_ah3' => $select->e102_ah3 ?? NULL,
                'e102_ai1' => $select->e102_ai1 ?? NULL,
                'e102_ai2' => $select->e102_ai2 ?? NULL,
                'e102_ai3' => $select->e102_ai3 ?? NULL,
                'e102_aj1' => $select->e102_aj1 ?? NULL,
                'e102_aj2' => $select->e102_aj2 ?? NULL,
                'e102_aj3' => $select->e102_aj3 ?? NULL,
                'e102_ak1' => $select->e102_ak1 ?? NULL,
                'e102_ak2' => $select->e102_ak2 ?? NULL,
                'e102_ak3' => $select->e102_ak3 ?? NULL,
                'e102_npg' => $select->e102_npg ?? NULL,
                'e102_jpg' => $select->e102_jpg ?? NULL,
                'e102_ae3' => $select->e102_ae3 ?? NULL,

            ]);
        }
    }

    public function h104_b()
    {
        $delete = DB::delete("DELETE FROM h104_b");

        $selects = DB::connection('mysql2')->select("SELECT * FROM h104_b");

        foreach ($selects as $key => $select) {

            $insert = H104B::create([
                'e104_b1' => $select->e104_b1 ?? NULL,
                'e104_nobatch' => $select->e104_nobatch ?? NULL,
                'e104_b3' => $select->e104_b3 ?? NULL,
                'e104_b4' => $select->e104_b4 ?? NULL,
                'e104_b5' => $select->e104_b5 ?? NULL,
                'e104_b6' => $select->e104_b6 ?? NULL,
                'e104_b7' => $select->e104_b7 ?? NULL,
                'e104_b8' => $select->e104_b8 ?? NULL,
                'e104_b9' => $select->e104_b9 ?? NULL,
                'e104_b10' => $select->e104_b10 ?? NULL,
                'e104_b11' => $select->e104_b11 ?? NULL,
                'e104_b12' => $select->e104_b12 ?? NULL,
                'e104_b13' => $select->e104_b13 ?? NULL,


            ]);
        }
    }

    public function h104_c()
    {
        $delete = DB::delete("DELETE FROM h104_c");

        $selects = DB::connection('mysql2')->select("SELECT * FROM h104_c");

        foreach ($selects as $key => $select) {

            $insert = H104C::create([
                'e104_c1' => $select->e104_c1 ?? NULL,
                'e104_nobatch' => $select->e104_nobatch ?? NULL,
                'e104_c3' => $select->e104_c3 ?? NULL,
                'e104_c4' => $select->e104_c4 ?? NULL,
                'e104_c5' => $select->e104_c5 ?? NULL,
                'e104_c6' => $select->e104_c6 ?? NULL,
                'e104_c7' => $select->e104_c7 ?? NULL,
                'e104_c8' => $select->e104_c8 ?? NULL,


            ]);
        }
    }


    public function h104_d()
    {
        $delete = DB::delete("DELETE FROM h104_d");

        $selects = DB::connection('mysql2')->select("SELECT * FROM h104_d");

        foreach ($selects as $key => $select) {

            $insert = H104D::create([
                'e104_d1' => $select->e104_d1 ?? NULL,
                'e104_nobatch' => $select->e104_nobatch ?? NULL,
                'e104_d3' => $select->e104_d3 ?? NULL,
                'e104_d4' => $select->e104_d4 ?? NULL,
                'e104_d5' => $select->e104_d5 ?? NULL,
                'e104_d6' => $select->e104_d6 ?? NULL,
                'e104_d7' => $select->e104_d7 ?? NULL,
                'e104_d8' => $select->e104_d8 ?? NULL,
                'e104_d9' => $select->e104_d9 ?? NULL,
                'nokontrak' => $select->nokontrak ?? NULL,
                'port' => $select->port ?? NULL,
                'portdest' => $select->portdest ?? NULL,
                'matawang' => $select->matawang ?? NULL,
                'nilai' => $select->nilai ?? NULL,
                'nolesen_sykt' => $select->nolesen_sykt ?? NULL,
                'nama_sykt' => $select->nama_sykt ?? NULL,
                'nama_produk' => $select->nama_produk ?? NULL,
                'nama_pelabuhan' => $select->nama_pelabuhan ?? NULL,
                'kenderaan' => $select->kenderaan ?? NULL,
                'kenderaan_nodaftar' => $select->kenderaan_nodaftar ?? NULL,
                'nama_destport' => $select->nama_destport ?? NULL,
                'nama_destnegara' => $select->nama_destnegara ?? NULL,
                'nama_sykt1' => $select->nama_sykt1 ?? NULL,
                'mpobq_bungkusan' => $select->mpobq_bungkusan ?? NULL,
                'mpobq_nilai_2' => $select->mpobq_nilai_2 ?? NULL,


            ]);
        }
    }


    public function h104_init()
    {
        $delete = DB::delete("DELETE FROM h104_init");

        $selects = DB::connection('mysql2')->select("SELECT * FROM h104_init");

        foreach ($selects as $key => $select) {

            $insert = H104Init::create([
                'e104_nobatch' => $select->e104_nobatch ?? NULL,
                'e104_nl' => $select->e104_nl ?? NULL,
                'e104_bln' => $select->e104_bln ?? NULL,
                'e104_thn' => $select->e104_thn ?? NULL,
                'e104_flg' => $select->e104_flg ?? NULL,
                'e104_sdate' => $select->e104_sdate ?? NULL,
                'e104_ddate' => $select->e104_ddate ?? NULL,
                'e104_a5' => $select->e104_a5 ?? NULL,
                'e104_a6' => $select->e104_a6 ?? NULL,
                'e104_npg' => $select->e104_npg ?? NULL,
                'e104_jpg' => $select->e104_jpg ?? NULL,
                'e104_flagcetak' => $select->e104_flagcetak ?? NULL,

            ]);
        }
    }


    public function hebahan_proses()
    {
        $delete = DB::delete("DELETE FROM hebahan_proses");

        $id = HebahanProses::max('id');
        if ($id) {
            $noid = $id + 1;
        } else {
            $noid = 1;
        }

        $selects = DB::connection('mysql2')->select("SELECT * FROM hebahan_proses");

        foreach ($selects as $key => $select) {

            $insert = HebahanProses::create([
                    'id' => $noid,
                    'tahun' => $select->tahun ?? NULL,
                    'bulan' => $select->bulan ?? NULL,
                    'cpo_msia' => $select->cpo_msia ?? NULL,
                    'ppo_msia' => $select->ppo_msia ?? NULL,
                    'cpko_msia' => $select->cpko_msia ?? NULL,
                    'ppko_msia' => $select->ppko_msia ?? NULL,

            ]);
        }
    }

    public function hebahan_stok_akhir()
    {
        $delete = DB::delete("DELETE FROM hebahan_stok_akhir");

        $selects = DB::connection('mysql2')->select("SELECT * FROM hebahan_stok_akhir_old");

        foreach ($selects as $key => $select) {

            $insert = HebahanStokAkhir::create([
                    'id' => $select->id ?? NULL,
                    'tahun' => $select->tahun ?? NULL,
                    'bulan' => $select->bulan ?? NULL,
                    'cpo_sm' => $select->cpo_sm ?? NULL,
                    'ppo_sm' => $select->ppo_sm ?? NULL,
                    'cpko_sm' => $select->cpko_sm ?? NULL,
                    'ppko_sm' => $select->ppko_sm ?? NULL,
                    'cpo_sbh' => $select->cpo_sbh ?? NULL,
                    'ppo_sbh' => $select->ppo_sbh ?? NULL,
                    'cpko_sbh' => $select->cpko_sbh ?? NULL,
                    'ppko_sbh' => $select->ppko_sbh ?? NULL,
                    'cpo_srwk' => $select->cpo_srwk ?? NULL,
                    'ppo_srwk' => $select->ppo_srwk ?? NULL,
                    'cpko_srwk' => $select->cpko_srwk ?? NULL,
                    'ppko_srwk' => $select->ppko_srwk ?? NULL,

            ]);
        }
    }

    public function jenis_produk()
    {
        $delete = DB::delete("DELETE FROM jenis_produk");

        $selects = DB::connection('mysql2')->select("SELECT * FROM jenis_produk");

        foreach ($selects as $key => $select) {

            $insert = JenisProduk::create([
                    'kod_produk' => $select->kod_produk ?? NULL,
                    'nama_produk' => $select->nama_produk ?? NULL,
                    'nama_column' => $select->nama_column ?? NULL,

            ]);
        }
    }

    public function jenis_produk1()
    {
        $delete = DB::delete("DELETE FROM jenis_produk1");

        $selects = DB::connection('mysql2')->select("SELECT * FROM jenis_produk1");

        foreach ($selects as $key => $select) {

            $insert = JenisProduk1::create([
                    'kod_produk' => $select->kod_produk ?? NULL,
                    'nama_produk' => $select->nama_produk ?? NULL,
                    'nama_column' => $select->nama_column ?? NULL,

            ]);
        }
    }

    public function kategori_pelesen()
    {
        $delete = DB::delete("DELETE FROM kategori_pelesen");

        $selects = DB::connection('mysql2')->select("SELECT * FROM kategori_pelesen");

        foreach ($selects as $key => $select) {

            $insert = KategoriPelesen::create([
                    'kat_pelesen' => $select->kat_pelesen ?? NULL,
                    'nama_kategori' => $select->nama_kategori ?? NULL,

            ]);
        }
    }

    public function kilang_tidak_respons()
    {
        $delete = DB::delete("DELETE FROM kilang_tidak_respons");

        $selects = DB::connection('mysql2')->select("SELECT * FROM kilang_tidak_respons");

        foreach ($selects as $key => $select) {

            $insert = KilangTidakRespons::create([
                    'No_Lesen' => $select->No_Lesen ?? NULL,

            ]);
        }
    }

    public function kod_sl()
    {
        $delete = DB::delete("DELETE FROM kod_sl");

        $selects = DB::connection('mysql2')->select("SELECT * FROM kod_sl");

        foreach ($selects as $key => $select) {

            $insert = KodSl::create([
                    'catid' => $select->catid ?? NULL,
                    'catname' => $select->catname ?? NULL,

            ]);
        }
    }

    public function linkages()
    {
        $delete = DB::delete("DELETE FROM linkages");

        $selects = DB::connection('mysql2')->select("SELECT * FROM linkages");

        foreach ($selects as $key => $select) {

            $insert = Linkages::create([
                    'web_add' => $select->web_add ?? NULL,
                    'web_desc' => $select->web_desc ?? NULL,

            ]);
        }
    }

    public function negara()
    {
        $delete = DB::delete("DELETE FROM negara");

        $selects = DB::connection('mysql2')->select("SELECT * FROM negara");

        foreach ($selects as $key => $select) {

            $insert = Negara::create([
                'kodnegara' => $select->kodnegara ?? NULL,
                'namanegara' => $select->namanegara ?? NULL,
                'benua' => $select->benua ?? NULL,
                'eu15' => $select->eu15 ?? NULL,
                'eu25' => $select->eu25 ?? NULL,
                'eu27' => $select->eu27 ?? NULL,
                'eu28' => $select->eu28 ?? NULL,
                'eu27_2020' => $select->eu27_2020 ?? NULL,

            ]);
        }
    }

    public function negeri()
    {
        $delete = DB::delete("DELETE FROM negeri");

        $selects = DB::connection('mysql2')->select("SELECT * FROM negeri");

        foreach ($selects as $key => $select) {

            $insert = Negeri::create([
                'kod_negeri' => $select->kod_negeri ?? NULL,
                'nama_negeri' => $select->nama_negeri ?? NULL,
                'kod_region' => $select->kod_region ?? NULL,
                'nama_region' => $select->nama_region ?? NULL,
                'nama_kumpulan' => $select->nama_kumpulan ?? NULL,
                'kod_kumpulan' => $select->kod_kumpulan ?? NULL,

            ]);
        }
    }

    public function ng()
    {
        $delete = DB::delete("DELETE FROM ng");

        $selects = DB::connection('mysql2')->select("SELECT * FROM ng");

        foreach ($selects as $key => $select) {

            $insert = Ng::create([
                'kodnegara' => $select->kodnegara ?? NULL,
                'namanegara' => $select->namanegara ?? NULL,
            ]);
        }
    }

    public function oerdaerah()
    {
        $delete = DB::delete("DELETE FROM oerdaerah");

        $selects = DB::connection('mysql2')->select("SELECT * FROM oerdaerah");

        foreach ($selects as $key => $select) {

            $insert = Oerdaerah::create([
                'oerdaerah_id' => $select->oerdaerah_id ?? NULL,
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'daerah' => $select->daerah ?? NULL,
                'oer_cpo' => $select->oer_cpo ?? NULL,
                'oer_cpko' => $select->oer_cpko ?? NULL,
                'ker_pk' => $select->ker_pk ?? NULL,
                'ker_pkc' => $select->ker_pkc ?? NULL,
                'cpo_proc' => $select->cpo_proc ?? NULL,
                'ffb_proc' => $select->ffb_proc ?? NULL,
            ]);
        }
    }

    public function oermsia()
    {
        $delete = DB::delete("DELETE FROM oermsia");

        $selects = DB::connection('mysql2')->select("SELECT * FROM oermsia");

        foreach ($selects as $key => $select) {

            $insert = Oermsia::create([
                'oermsia_id' => $select->oermsia_id ?? NULL,
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'oer_cpo' => $select->oer_cpo ?? NULL,
                'oer_cpko' => $select->oer_cpko ?? NULL,
                'ker_pk' => $select->ker_pk ?? NULL,
                'ker_pkc' => $select->ker_pkc ?? NULL,
                'cpo_proc' => $select->cpo_proc ?? NULL,
                'ffb_proc' => $select->ffb_proc ?? NULL,
            ]);
        }
    }

    public function oernegeri()
    {
        $delete = DB::delete("DELETE FROM oernegeri");

        $selects = DB::connection('mysql2')->select("SELECT * FROM oernegeri");

        foreach ($selects as $key => $select) {

            $insert = Oernegeri::create([
                'oernegeri_id' => $select->oernegeri_id ?? NULL,
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'oer_cpo' => $select->oer_cpo ?? NULL,
                'oer_cpko' => $select->oer_cpko ?? NULL,
                'ker_pk' => $select->ker_pk ?? NULL,
                'ker_pkc' => $select->ker_pkc ?? NULL,
                'cpo_proc' => $select->cpo_proc ?? NULL,
                'ffb_proc' => $select->ffb_proc ?? NULL,
            ]);
        }
    }

    public function oerpelesen()
    {
        $delete = DB::delete("DELETE FROM oerpelesen");

        $selects = DB::connection('mysql2')->select("SELECT * FROM oerpelesen");

        foreach ($selects as $key => $select) {

            $insert = Oerpelesen::create([
                'oerind_id' => $select->oerind_id ?? NULL,
                'nolesen' => $select->nolesen ?? NULL,
                'namakilang' => $select->namakilang ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'daerah' => $select->daerah ?? NULL,
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'oer_cpo' => $select->oer_cpo ?? NULL,
                'ker_pk' => $select->ker_pk ?? NULL,
                'cpo_proc' => $select->cpo_proc ?? NULL,
                'ffb_proc' => $select->ffb_proc ?? NULL,
            ]);
        }
    }


    public function oersemsia()
    {
        $delete = DB::delete("DELETE FROM oersemsia");

        $selects = DB::connection('mysql2')->select("SELECT * FROM oersemsia");

        foreach ($selects as $key => $select) {

            $insert = Oersemsia::create([
                'oersemsia_id' => $select->oersemsia_id ?? NULL,
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'oer_cpo' => $select->oer_cpo ?? NULL,
                'oer_cpko' => $select->oer_cpko ?? NULL,
                'ker_pk' => $select->ker_pk ?? NULL,
                'ker_pkc' => $select->ker_pkc ?? NULL,
                'cpo_proc' => $select->cpo_proc ?? NULL,
                'ffb_proc' => $select->ffb_proc ?? NULL,
            ]);
        }
    }


    public function oerss()
    {
        $delete = DB::delete("DELETE FROM oerss");

        $selects = DB::connection('mysql2')->select("SELECT * FROM oerss");

        foreach ($selects as $key => $select) {

            $insert = Oerss::create([
                'oerss_id' => $select->oerss_id ?? NULL,
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'oer_cpo' => $select->oer_cpo ?? NULL,
                'oer_cpko' => $select->oer_cpko ?? NULL,
                'ker_pk' => $select->ker_pk ?? NULL,
                'ker_pkc' => $select->ker_pkc ?? NULL,
                'cpo_proc' => $select->cpo_proc ?? NULL,
                'ffb_proc' => $select->ffb_proc ?? NULL,
            ]);
        }
    }


    public function p91_activities_licensee()
    {
        $delete = DB::delete("DELETE FROM p91_activities_licensee");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p91_activities_licensee");

        foreach ($selects as $key => $select) {

            $insert = P91ActivitiesLicensee::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'no_lesen' => $select->no_lesen ?? NULL,
                'produk' => $select->produk ?? NULL,
                'stkawal' => $select->stkawal ?? NULL,
                'terimaan' => $select->terimaan ?? NULL,
                'proses' => $select->proses ?? NULL,
                'pengeluaran' => $select->pengeluaran ?? NULL,
                'jualan' => $select->jualan ?? NULL,
                'eksport' => $select->eksport ?? NULL,
                'stkakhir' => $select->stkakhir ?? NULL,

            ]);
        }
    }

    public function p91_activities_state()
    {
        $delete = DB::delete("DELETE FROM p91_activities_state");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p91_activities_state");

        foreach ($selects as $key => $select) {

            $insert = P91ActivitiesState::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'produk' => $select->produk ?? NULL,
                'bilpelesen' => $select->bilpelesen ?? NULL,
                'stkawal' => $select->stkawal ?? NULL,
                'terimaan' => $select->terimaan ?? NULL,
                'proses' => $select->proses ?? NULL,
                'pengeluaran' => $select->pengeluaran ?? NULL,
                'jualan' => $select->jualan ?? NULL,
                'eksport' => $select->eksport ?? NULL,
                'stkakhir' => $select->stkakhir ?? NULL,

            ]);
        }
    }

    public function p91_dtl_cluster()
    {
        $delete = DB::delete("DELETE FROM p91_dtl_cluster");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p91_dtl_cluster");

        foreach ($selects as $key => $select) {

            $insert = P91DtlCluster::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'kawasan' => $select->kawasan ?? NULL,
                'cluster' => $select->cluster ?? NULL,
                'ffb_sstock' => $select->ffb_sstock ?? NULL,
                'cpo_sstock' => $select->cpo_sstock ?? NULL,
                'ffb_rec' => $select->ffb_rec ?? NULL,
                'cpo_rec' => $select->cpo_rec ?? NULL,
                'ffb_proc' => $select->ffb_proc ?? NULL,
                'cpo_proc' => $select->cpo_proc ?? NULL,
                'ffb_estock' => $select->ffb_estock ?? NULL,
                'cpo_estock' => $select->cpo_estock ?? NULL,
                'oer' => $select->oer ?? NULL,

            ]);
        }
    }

    public function p91_dtl_district()
    {
        $delete = DB::delete("DELETE FROM p91_dtl_district");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p91_dtl_district");

        foreach ($selects as $key => $select) {

            $insert = P91DtlDistrict::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'daerah' => $select->daerah ?? NULL,
                'ffb_sstock' => $select->ffb_sstock ?? NULL,
                'cpo_sstock' => $select->cpo_sstock ?? NULL,
                'ffb_rec' => $select->ffb_rec ?? NULL,
                'cpo_rec' => $select->cpo_rec ?? NULL,
                'ffb_proc' => $select->ffb_proc ?? NULL,
                'cpo_proc' => $select->cpo_proc ?? NULL,
                'ffb_estock' => $select->ffb_estock ?? NULL,
                'cpo_estock' => $select->cpo_estock ?? NULL,
                'oer' => $select->oer ?? NULL,

            ]);
        }
    }

    public function p91_dtl_kawasan()
    {
        $delete = DB::delete("DELETE FROM p91_dtl_kawasan");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p91_dtl_kawasan");

        foreach ($selects as $key => $select) {

            $insert = P91DtlKawasan::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'kawasan' => $select->kawasan ?? NULL,
                'ffb_sstock' => $select->ffb_sstock ?? NULL,
                'cpo_sstock' => $select->cpo_sstock ?? NULL,
                'ffb_rec' => $select->ffb_rec ?? NULL,
                'cpo_rec' => $select->cpo_rec ?? NULL,
                'ffb_proc' => $select->ffb_proc ?? NULL,
                'cpo_proc' => $select->cpo_proc ?? NULL,
                'ffb_estock' => $select->ffb_estock ?? NULL,
                'cpo_estock' => $select->cpo_estock ?? NULL,
                'oer' => $select->oer ?? NULL,

            ]);
        }
    }

    public function p91_dtl_month()
    {
        $delete = DB::delete("DELETE FROM p91_dtl_month");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p91_dtl_month");

        foreach ($selects as $key => $select) {

            $insert = P91DtlMonth::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'ffb_sstock' => $select->ffb_sstock ?? NULL,
                'cpo_sstock' => $select->cpo_sstock ?? NULL,
                'ffb_rec' => $select->ffb_rec ?? NULL,
                'cpo_rec' => $select->cpo_rec ?? NULL,
                'ffb_proc' => $select->ffb_proc ?? NULL,
                'cpo_proc' => $select->cpo_proc ?? NULL,
                'ffb_estock' => $select->ffb_estock ?? NULL,
                'cpo_estock' => $select->cpo_estock ?? NULL,
                'oer' => $select->oer ?? NULL,

            ]);
        }
    }

    public function p91_dtl_pelesen()
    {
        $delete = DB::delete("DELETE FROM p91_dtl_pelesen");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p91_dtl_pelesen");

        foreach ($selects as $key => $select) {

            $insert = P91DtlPelesen::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'kawasan' => $select->kawasan ?? NULL,
                'ffb_sstock' => $select->ffb_sstock ?? NULL,
                'cpo_sstock' => $select->cpo_sstock ?? NULL,
                'ffb_rec' => $select->ffb_rec ?? NULL,
                'cpo_rec' => $select->cpo_rec ?? NULL,
                'ffb_proc' => $select->ffb_proc ?? NULL,
                'cpo_proc' => $select->cpo_proc ?? NULL,
                'ffb_estock' => $select->ffb_estock ?? NULL,
                'cpo_estock' => $select->cpo_estock ?? NULL,
                'oer' => $select->oer ?? NULL,

            ]);
        }
    }

    public function p91_dtl_state()
    {
        $delete = DB::delete("DELETE FROM p91_dtl_state");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p91_dtl_state");

        foreach ($selects as $key => $select) {

            $insert = P91DtlState::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'ffb_sstock' => $select->ffb_sstock ?? NULL,
                'cpo_sstock' => $select->cpo_sstock ?? NULL,
                'ffb_rec' => $select->ffb_rec ?? NULL,
                'cpo_rec' => $select->cpo_rec ?? NULL,
                'ffb_proc' => $select->ffb_proc ?? NULL,
                'cpo_proc' => $select->cpo_proc ?? NULL,
                'ffb_estock' => $select->ffb_estock ?? NULL,
                'cpo_estock' => $select->cpo_estock ?? NULL,
                'oer' => $select->oer ?? NULL,

            ]);
        }
    }

    public function p91_monthly_cluster_oer()
    {
        $delete = DB::delete("DELETE FROM p91_monthly_cluster_oer");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p91_monthly_cluster_oer");

        foreach ($selects as $key => $select) {

            $insert = P91MonthlyClusterOer::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'kawasan' => $select->kawasan ?? NULL,
                'cluster' => $select->cluster ?? NULL,
                'sum_cpo_prod' => $select->sum_cpo_prod ?? NULL,
                'sum_ffb_proc' => $select->sum_ffb_proc ?? NULL,
                'oer_cpo' => $select->oer_cpo ?? NULL,

            ]);
        }
    }
    public function p91_monthly_district_oer()
    {
        $delete = DB::delete("DELETE FROM p91_monthly_district_oer");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p91_monthly_district_oer");

        foreach ($selects as $key => $select) {

            $insert = P91MonthlyDistrictOer::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'daerah' => $select->daerah ?? NULL,
                'sum_cpo_prod' => $select->sum_cpo_prod ?? NULL,
                'sum_ffb_proc' => $select->sum_ffb_proc ?? NULL,
                'oer_cpo' => $select->oer_cpo ?? NULL,

            ]);
        }
    }
    public function p91_monthly_kawasan_oer()
    {
        $delete = DB::delete("DELETE FROM p91_monthly_kawasan_oer");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p91_monthly_kawasan_oer");

        foreach ($selects as $key => $select) {

            $insert = P91MonthlyKawasanOer::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'kawasan' => $select->kawasan ?? NULL,
                'sum_cpo_prod' => $select->sum_cpo_prod ?? NULL,
                'sum_ffb_proc' => $select->sum_ffb_proc ?? NULL,
                'oer_cpo' => $select->oer_cpo ?? NULL,

            ]);
        }
    }
    public function p91_monthly_pelesen_oer()
    {
        $delete = DB::delete("DELETE FROM p91_monthly_pelesen_oer");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p91_monthly_pelesen_oer");

        foreach ($selects as $key => $select) {

            $insert = P91MonthlyPelesenOer::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'no_lesen' => $select->no_lesen ?? NULL,
                'namapremis' => $select->namapremis ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'daerah' => $select->daerah ?? NULL,
                'kawasan' => $select->kawasan ?? NULL,
                'cluster' => $select->cluster ?? NULL,
                'katkilang' => $select->katkilang ?? NULL,
                'sum_cpo_prod' => $select->sum_cpo_prod ?? NULL,
                'sum_ffb_proc' => $select->sum_ffb_proc ?? NULL,
                'oer_cpo' => $select->oer_cpo ?? NULL,

            ]);
        }
    }

    public function p91_monthly_state_oer()
    {
        $delete = DB::delete("DELETE FROM p91_monthly_state_oer");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p91_monthly_state_oer");

        foreach ($selects as $key => $select) {

            $insert = P91MonthlyStateOer::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'sum_cpo_prod' => $select->sum_cpo_prod ?? NULL,
                'sum_ffb_proc' => $select->sum_ffb_proc ?? NULL,
                'oer_cpo' => $select->oer_cpo ?? NULL,

            ]);
        }
    }

    public function p91_receive_ffb_state()
    {
        $delete = DB::delete("DELETE FROM p91_receive_ffb_state");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p91_receive_ffb_state");

        foreach ($selects as $key => $select) {

            $insert = P91ReceiveFfbState::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'bilpelesen' => $select->bilpelesen ?? NULL,
                'sstock' => $select->sstock ?? NULL,
                'rec' => $select->rec ?? NULL,
                'proc' => $select->proc ?? NULL,
                'sell' => $select->sell ?? NULL,
                'estock' => $select->estock ?? NULL,
                'price' => $select->price ?? NULL,
                'tes' => $select->tes ?? NULL,
                'tel' => $select->tel ?? NULL,
                'tbp' => $select->tbp ?? NULL,
                'tpk' => $select->tpk ?? NULL,
                'tkb' => $select->tkb ?? NULL,
                'tll' => $select->tll ?? NULL,

            ]);
        }
    }

    public function p91_sell_cpo_state()
    {
        $delete = DB::delete("DELETE FROM p91_sell_cpo_state");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p91_sell_cpo_state");

        foreach ($selects as $key => $select) {

            $insert = P91SellCpoState::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'bilpelesen' => $select->bilpelesen ?? NULL,
                'sstock' => $select->sstock ?? NULL,
                'rec' => $select->rec ?? NULL,
                'prod' => $select->prod ?? NULL,
                'sell' => $select->sell ?? NULL,
                'export' => $select->export ?? NULL,
                'estock' => $select->estock ?? NULL,
                'jkb' => $select->jkb ?? NULL,
                'jkp' => $select->jkp ?? NULL,
                'jko' => $select->jko ?? NULL,
                'jp' => $select->jp ?? NULL,
                'jps' => $select->jps ?? NULL,
                'je' => $select->je ?? NULL,
                'jt' => $select->jt ?? NULL,
                'jll' => $select->jll ?? NULL,

            ]);
        }
    }

    public function p91_sell_pk_state()
    {
        $delete = DB::delete("DELETE FROM p91_sell_pk_state");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p91_sell_pk_state");

        foreach ($selects as $key => $select) {

            $insert = P91SellPkState::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'bilpelesen' => $select->bilpelesen ?? NULL,
                'sstock' => $select->sstock ?? NULL,
                'rec' => $select->rec ?? NULL,
                'prod' => $select->prod ?? NULL,
                'sell' => $select->sell ?? NULL,
                'export' => $select->export ?? NULL,
                'estock' => $select->estock ?? NULL,
                'jki' => $select->jki ?? NULL,
                'jp' => $select->jp ?? NULL,
                'jll' => $select->jll ?? NULL,

            ]);
        }
    }

    public function p91_yearly_cluster_oer()
    {
        $delete = DB::delete("DELETE FROM p91_yearly_cluster_oer");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p91_yearly_cluster_oer");

        foreach ($selects as $key => $select) {

            $insert = P91YearlyClusterOer::create([
                'tahun' => $select->tahun ?? NULL,
                'kawasan' => $select->kawasan ?? NULL,
                'cluster' => $select->cluster ?? NULL,
                'sum_cpo_prod' => $select->sum_cpo_prod ?? NULL,
                'sum_ffb_proc' => $select->sum_ffb_proc ?? NULL,
                'oer_cpo' => $select->oer_cpo ?? NULL,

            ]);
        }
    }

    public function p91_yearly_district_oer()
    {
        $delete = DB::delete("DELETE FROM p91_yearly_district_oer");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p91_yearly_district_oer");

        foreach ($selects as $key => $select) {

            $insert = P91YearlyDistrictOer::create([
                'tahun' => $select->tahun ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'daerah' => $select->daerah ?? NULL,
                'sum_cpo_prod' => $select->sum_cpo_prod ?? NULL,
                'sum_ffb_proc' => $select->sum_ffb_proc ?? NULL,
                'oer_cpo' => $select->oer_cpo ?? NULL,

            ]);
        }
    }

    public function p91_yearly_kawasan_oer()
    {
        $delete = DB::delete("DELETE FROM p91_yearly_kawasan_oer");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p91_yearly_kawasan_oer");

        foreach ($selects as $key => $select) {

            $insert = P91YearlyKawasanOer::create([
                'tahun' => $select->tahun ?? NULL,
                'kawasan' => $select->kawasan ?? NULL,
                'sum_cpo_prod' => $select->sum_cpo_prod ?? NULL,
                'sum_ffb_proc' => $select->sum_ffb_proc ?? NULL,
                'oer_cpo' => $select->oer_cpo ?? NULL,

            ]);
        }
    }

    public function p91_yearly_month_oer()
    {
        $delete = DB::delete("DELETE FROM p91_yearly_month_oer");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p91_yearly_month_oer");

        foreach ($selects as $key => $select) {

            $insert = P91YearlyMonthOer::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'sum_cpo_prod' => $select->sum_cpo_prod ?? NULL,
                'sum_ffb_proc' => $select->sum_ffb_proc ?? NULL,
                'oer_cpo' => $select->oer_cpo ?? NULL,

            ]);
        }
    }
    public function p91_yearly_pelesen_oer()
    {
        $delete = DB::delete("DELETE FROM p91_yearly_pelesen_oer");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p91_yearly_pelesen_oer");

        foreach ($selects as $key => $select) {

            $insert = P91YearlyPelesenOer::create([
                'tahun' => $select->tahun ?? NULL,
                'no_lesen' => $select->no_lesen ?? NULL,
                'namapremis' => $select->namapremis ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'daerah' => $select->daerah ?? NULL,
                'kawasan' => $select->kawasan ?? NULL,
                'cluster' => $select->cluster ?? NULL,
                'katkilang' => $select->katkilang ?? NULL,
                'sum_cpo_prod' => $select->sum_cpo_prod ?? NULL,
                'sum_ffb_proc' => $select->sum_ffb_proc ?? NULL,
                'oer_cpo' => $select->oer_cpo ?? NULL,

            ]);
        }
    }

    public function p91_yearly_state_oer()
    {
        $delete = DB::delete("DELETE FROM p91_yearly_state_oer");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p91_yearly_state_oer");

        foreach ($selects as $key => $select) {

            $insert = P91YearlyStateOer::create([
                'tahun' => $select->tahun ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'sum_cpo_prod' => $select->sum_cpo_prod ?? NULL,
                'sum_ffb_proc' => $select->sum_ffb_proc ?? NULL,
                'oer_cpo' => $select->oer_cpo ?? NULL,

            ]);
        }
    }

    public function p101()
    {
        $delete = DB::delete("DELETE FROM p101");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p101");

        foreach ($selects as $key => $select) {

            $insert = P101::create([
                'noid' => $select->noid ?? NULL,
                'nolesen' => $select->nolesen ?? NULL,
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'prodid' => $select->prodid ?? NULL,
                'produk_kump' => $select->produk_kump ?? NULL,
                'prodcat' => $select->prodcat ?? NULL,
                'produk_ingredient' => $select->produk_ingredient ?? NULL,
                'stkawal_premis' => $select->stkawal_premis ?? NULL,
                'stkawal_ps' => $select->stkawal_ps ?? NULL,
                'belian' => $select->belian ?? NULL,
                'import' => $select->import ?? NULL,
                'pengeluaran' => $select->pengeluaran ?? NULL,
                'guna_proses' => $select->guna_proses ?? NULL,
                'jual_edar' => $select->jual_edar ?? NULL,
                'eksport' => $select->eksport ?? NULL,
                'stkakhir_premis' => $select->stkakhir_premis ?? NULL,
                'stkakhir_ps' => $select->stkakhir_ps ?? NULL,
            ]);
        }
    }

    public function p101_d()
    {
        $delete = DB::delete("DELETE FROM p101_d");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p101_d");

        foreach ($selects as $key => $select) {

            $insert = P101D::create([
                'id_p101d' => $select->id_p101d ?? NULL,
                'nolesen' => $select->nolesen ?? NULL,
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'jenis_aktiviti' => $select->jenis_aktiviti ?? NULL,
                'beli_daripada' => $select->beli_daripada ?? NULL,
                'cpo' => $select->cpo ?? NULL,
                'ppo' => $select->ppo ?? NULL,
                'cpko' => $select->cpko ?? NULL,
                'ppko' => $select->ppko ?? NULL,
            ]);
        }
    }

    public function p101_master()
    {
        $delete = DB::delete("DELETE FROM p101_master");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p101_master");

        foreach ($selects as $key => $select) {

            $insert = P101Master::create([
                'noid' => $select->noid ?? NULL,
                'nolesen' => $select->nolesen ?? NULL,
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'harioperasi' => $select->harioperasi ?? NULL,
                'cap_ref' => $select->cap_ref ?? NULL,
                'cap_frac' => $select->cap_frac ?? NULL,
                'cpo_proc' => $select->cpo_proc ?? NULL,
                'cpko_proc' => $select->cpko_proc ?? NULL,
                'refkap' => $select->refkap ?? NULL,
                'refutilrate' => $select->refutilrate ?? NULL,
                'statusaktif' => $select->statusaktif ?? NULL,
                'refutilratecpo' => $select->refutilratecpo ?? NULL,
                'refutilratecpko' => $select->refutilratecpko ?? NULL,
                'ppo_proc' => $select->ppo_proc ?? NULL,
                'ppko_proc' => $select->ppko_proc ?? NULL,
                'refutilrateppo' => $select->refutilrateppo ?? NULL,
                'refutilrateppko' => $select->refutilrateppko ?? NULL,
            ]);
        }
    }

    public function p101_monthly_district_utilrate()
    {
        $delete = DB::delete("DELETE FROM p101_monthly_district_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p101_monthly_district_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P101MonthlyDistrictUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'daerah' => $select->daerah ?? NULL,
                'sum_cpo' => $select->sum_cpo ?? NULL,
                'sum_cpko' => $select->sum_cpko ?? NULL,
                'sum_refkap' => $select->sum_refkap ?? NULL,
                'rate_cpocpko' => $select->rate_cpocpko ?? NULL,
                'rate_cpo' => $select->rate_cpo ?? NULL,
                'rate_cpko' => $select->rate_cpko ?? NULL,
            ]);
        }
    }

    public function p101_monthly_group_utilrate()
    {
        $delete = DB::delete("DELETE FROM p101_monthly_group_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p101_monthly_group_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P101MonthlyGroupUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'syktgroup' => $select->syktgroup ?? NULL,
                'sum_cpo' => $select->sum_cpo ?? NULL,
                'sum_cpko' => $select->sum_cpko ?? NULL,
                'sum_refkap' => $select->sum_refkap ?? NULL,
                'rate_cpocpko' => $select->rate_cpocpko ?? NULL,
                'rate_cpo' => $select->rate_cpo ?? NULL,
                'rate_cpko' => $select->rate_cpko ?? NULL,
            ]);
        }
    }

    public function p101_monthly_region_utilrate()
    {
        $delete = DB::delete("DELETE FROM p101_monthly_region_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p101_monthly_region_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P101MonthlyRegionUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'kawasan' => $select->kawasan ?? NULL,
                'sum_cpo' => $select->sum_cpo ?? NULL,
                'sum_cpko' => $select->sum_cpko ?? NULL,
                'sum_refkap' => $select->sum_refkap ?? NULL,
                'rate_cpocpko' => $select->rate_cpocpko ?? NULL,
                'rate_cpo' => $select->rate_cpo ?? NULL,
                'rate_cpko' => $select->rate_cpko ?? NULL,
            ]);
        }
    }

    public function p101_monthly_state()
    {
        $delete = DB::delete("DELETE FROM p101_monthly_state");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p101_monthly_state");

        foreach ($selects as $key => $select) {

            $insert = P101MonthlyState::create([
                'id_mth' => $select->id_mth ?? NULL,
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'prodid' => $select->prodid ?? NULL,
                'produk_kump' => $select->produk_kump ?? NULL,
                'prodcat' => $select->prodcat ?? NULL,
                'stkawal_premis' => $select->stkawal_premis ?? NULL,
                'stkawal_ps' => $select->stkawal_ps ?? NULL,
                'belian' => $select->belian ?? NULL,
                'import' => $select->import ?? NULL,
                'pengeluaran' => $select->pengeluaran ?? NULL,
                'guna_proses' => $select->guna_proses ?? NULL,
                'jual_edar' => $select->jual_edar ?? NULL,
                'eksport' => $select->eksport ?? NULL,
                'stkakhir_premis' => $select->stkakhir_premis ?? NULL,
                'stkakhir_ps' => $select->stkakhir_ps ?? NULL,
            ]);
        }
    }

    public function p101_monthly_state_utilrate()
    {
        $delete = DB::delete("DELETE FROM p101_monthly_state_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p101_monthly_state_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P101MonthlyStateUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'sum_cpo' => $select->sum_cpo ?? NULL,
                'sum_cpko' => $select->sum_cpko ?? NULL,
                'sum_refkap' => $select->sum_refkap ?? NULL,
                'rate_cpocpko' => $select->rate_cpocpko ?? NULL,
                'rate_cpo' => $select->rate_cpo ?? NULL,
                'rate_cpko' => $select->rate_cpko ?? NULL,
            ]);
        }
    }

    public function p101_monthly_syktinduk_utilrate()
    {
        $delete = DB::delete("DELETE FROM p101_monthly_syktinduk_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p101_monthly_syktinduk_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P101MonthlySyktindukUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'syktinduk' => $select->syktinduk ?? NULL,
                'sum_cpo' => $select->sum_cpo ?? NULL,
                'sum_cpko' => $select->sum_cpko ?? NULL,
                'sum_refkap' => $select->sum_refkap ?? NULL,
                'rate_cpocpko' => $select->rate_cpocpko ?? NULL,
                'rate_cpo' => $select->rate_cpo ?? NULL,
                'rate_cpko' => $select->rate_cpko ?? NULL,
            ]);
        }
    }


    public function p101_quarterly_district_utilrate()
    {
        $delete = DB::delete("DELETE FROM p101_quarterly_district_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p101_quarterly_district_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P101QuarterlyDistrictUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'daerah' => $select->daerah ?? NULL,
                'sum_cpo' => $select->sum_cpo ?? NULL,
                'sum_cpko' => $select->sum_cpko ?? NULL,
                'sum_refkap' => $select->sum_refkap ?? NULL,
                'rate_cpocpko' => $select->rate_cpocpko ?? NULL,
                'rate_cpo' => $select->rate_cpo ?? NULL,
                'rate_cpko' => $select->rate_cpko ?? NULL,
            ]);
        }
    }

    public function p101_quarterly_group_utilrate()
    {
        $delete = DB::delete("DELETE FROM p101_quarterly_group_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p101_quarterly_group_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P101QuarterlyGroupUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'syktgroup' => $select->syktgroup ?? NULL,
                'sum_cpo' => $select->sum_cpo ?? NULL,
                'sum_cpko' => $select->sum_cpko ?? NULL,
                'sum_refkap' => $select->sum_refkap ?? NULL,
                'rate_cpocpko' => $select->rate_cpocpko ?? NULL,
                'rate_cpo' => $select->rate_cpo ?? NULL,
                'rate_cpko' => $select->rate_cpko ?? NULL,
            ]);
        }
    }

    public function p101_quarterly_pelesen()
    {
        $delete = DB::delete("DELETE FROM p101_quarterly_pelesen");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p101_quarterly_pelesen");

        foreach ($selects as $key => $select) {

            $insert = P101QuarterlyPelesen::create([
                'p101_qtrid' => $select->p101_qtrid ?? NULL,
                'Year' => $select->Year ?? NULL,
                'Activities' => $select->Activities ?? NULL,
                'LicenseNo' => $select->LicenseNo ?? NULL,
                'ProductGroup' => $select->ProductGroup ?? NULL,
                'ProductCategory' => $select->ProductCategory ?? NULL,
                'Product' => $select->Product ?? NULL,
                'Jan' => $select->Jan ?? NULL,
                'Feb' => $select->Feb ?? NULL,
                'Mar' => $select->Mar ?? NULL,
                'Quarter1' => $select->Quarter1 ?? NULL,
                'Apr' => $select->Apr ?? NULL,
                'May' => $select->May ?? NULL,
                'Jun' => $select->Jun ?? NULL,
                'Quarter2' => $select->Quarter2 ?? NULL,
                'FirstHalf' => $select->FirstHalf ?? NULL,
                'Jul' => $select->Jul ?? NULL,
                'Aug' => $select->Aug ?? NULL,
                'Sep' => $select->Sep ?? NULL,
                'Quarter3' => $select->Quarter3 ?? NULL,
                'SecondHalf' => $select->SecondHalf ?? NULL,
                'Oct' => $select->Oct ?? NULL,
                'Nov' => $select->Nov ?? NULL,
                'Dece' => $select->Dece ?? NULL,
                'Quarter4' => $select->Quarter4 ?? NULL,
                'TotalAll' => $select->TotalAll ?? NULL,
            ]);
        }
    }

    public function p101_quarterly_pelesen_utilrate()
    {
        $delete = DB::delete("DELETE FROM p101_quarterly_pelesen_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p101_quarterly_pelesen_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P101QuarterlyPelesenUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'nolesen' => $select->nolesen ?? NULL,
                'namapremis' => $select->namapremis ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'daerah' => $select->daerah ?? NULL,
                'kawasan' => $select->kawasan ?? NULL,
                'syktinduk' => $select->syktinduk ?? NULL,
                'syktgroup' => $select->syktgroup ?? NULL,
                'thnoperasi' => $select->thnoperasi ?? NULL,
                'sum_cpo' => $select->sum_cpo ?? NULL,
                'sum_cpko' => $select->sum_cpko ?? NULL,
                'sum_refkap' => $select->sum_refkap ?? NULL,
                'rate_cpocpko' => $select->rate_cpocpko ?? NULL,
                'rate_cpo' => $select->rate_cpo ?? NULL,
                'rate_cpko' => $select->rate_cpko ?? NULL,
            ]);
        }
    }

    public function p101_quarterly_region_utilrate()
    {
        $delete = DB::delete("DELETE FROM p101_quarterly_region_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p101_quarterly_region_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P101QuarterlyRegionUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'kawasan' => $select->kawasan ?? NULL,
                'sum_cpo' => $select->sum_cpo ?? NULL,
                'sum_cpko' => $select->sum_cpko ?? NULL,
                'sum_refkap' => $select->sum_refkap ?? NULL,
                'rate_cpocpko' => $select->rate_cpocpko ?? NULL,
                'rate_cpo' => $select->rate_cpo ?? NULL,
                'rate_cpko' => $select->rate_cpko ?? NULL,
            ]);
        }
    }

    public function p101_quarterly_state()
    {
        $delete = DB::delete("DELETE FROM p101_quarterly_state");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p101_quarterly_state");

        foreach ($selects as $key => $select) {

            $insert = P101QuarterlyState::create([
                'p101_qtrid' => $select->p101_qtrid ?? NULL,
                'Year' => $select->Year ?? NULL,
                'Activities' => $select->Activities ?? NULL,
                'State' => $select->State ?? NULL,
                'ProductGroup' => $select->ProductGroup ?? NULL,
                'ProductCategory' => $select->ProductCategory ?? NULL,
                'Product' => $select->Product ?? NULL,
                'Jan' => $select->Jan ?? NULL,
                'Feb' => $select->Feb ?? NULL,
                'Mar' => $select->Mar ?? NULL,
                'Quarter1' => $select->Quarter1 ?? NULL,
                'Apr' => $select->Apr ?? NULL,
                'May' => $select->May ?? NULL,
                'Jun' => $select->Jun ?? NULL,
                'Quarter2' => $select->Quarter2 ?? NULL,
                'FirstHalf' => $select->FirstHalf ?? NULL,
                'Jul' => $select->Jul ?? NULL,
                'Aug' => $select->Aug ?? NULL,
                'Sep' => $select->Sep ?? NULL,
                'Quarter3' => $select->Quarter3 ?? NULL,
                'SecondHalf' => $select->SecondHalf ?? NULL,
                'Oct' => $select->Oct ?? NULL,
                'Nov' => $select->Nov ?? NULL,
                'Dece' => $select->Dece ?? NULL,
                'Quarter4' => $select->Quarter4 ?? NULL,
                'TotalAll' => $select->TotalAll ?? NULL,
            ]);
        }
    }

    public function p101_quarterly_state_utilrate()
    {
        $delete = DB::delete("DELETE FROM p101_quarterly_state_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p101_quarterly_state_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P101QuarterlyStateUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'sum_cpo' => $select->sum_cpo ?? NULL,
                'sum_cpko' => $select->sum_cpko ?? NULL,
                'sum_refkap' => $select->sum_refkap ?? NULL,
                'rate_cpocpko' => $select->rate_cpocpko ?? NULL,
                'rate_cpo' => $select->rate_cpo ?? NULL,
                'rate_cpko' => $select->rate_cpko ?? NULL,
            ]);
        }
    }

    public function p101_quarterly_syktinduk_utilrate()
    {
        $delete = DB::delete("DELETE FROM p101_quarterly_syktinduk_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p101_quarterly_syktinduk_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P101QuarterlySyktindukUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'syktinduk' => $select->syktinduk ?? NULL,
                'sum_cpo' => $select->sum_cpo ?? NULL,
                'sum_cpko' => $select->sum_cpko ?? NULL,
                'sum_refkap' => $select->sum_refkap ?? NULL,
                'rate_cpocpko' => $select->rate_cpocpko ?? NULL,
                'rate_cpo' => $select->rate_cpo ?? NULL,
                'rate_cpko' => $select->rate_cpko ?? NULL,
            ]);
        }
    }

    public function p101_sumber_pelesen()
    {
        $delete = DB::delete("DELETE FROM p101_sumber_pelesen");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p101_sumber_pelesen");

        foreach ($selects as $key => $select) {

            $insert = P101SumberPelesen::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'nolesen' => $select->nolesen ?? NULL,
                'produk_kump' => $select->produk_kump ?? NULL,
                'KB' => $select->KB ?? NULL,
                'KP' => $select->KP ?? NULL,
                'KI' => $select->KI ?? NULL,
                'KO' => $select->KO ?? NULL,
                'PS' => $select->PS ?? NULL,
                'PN' => $select->PN ?? NULL,
                'EX' => $select->EX ?? NULL,
                'IM' => $select->IM ?? NULL,
                'LL' => $select->LL ?? NULL,
                'KB2' => $select->KB2 ?? NULL,
                'KP2' => $select->KP2 ?? NULL,
                'KI2' => $select->KI2 ?? NULL,
                'KO2' => $select->KO2 ?? NULL,
                'PS2' => $select->PS2 ?? NULL,
                'PN2' => $select->PN2 ?? NULL,
                'EX2' => $select->EX2 ?? NULL,
                'IM2' => $select->IM2 ?? NULL,
                'LL2' => $select->LL2 ?? NULL,
                'totalval' => $select->totalval ?? NULL,

            ]);
        }
    }

    public function p101_sumber_state()
    {
        $delete = DB::delete("DELETE FROM p101_sumber_state");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p101_sumber_state");

        foreach ($selects as $key => $select) {

            $insert = P101SumberState::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'produk_kump' => $select->produk_kump ?? NULL,
                'KB' => $select->KB ?? NULL,
                'KP' => $select->KP ?? NULL,
                'KI' => $select->KI ?? NULL,
                'KO' => $select->KO ?? NULL,
                'PS' => $select->PS ?? NULL,
                'PN' => $select->PN ?? NULL,
                'EX' => $select->EX ?? NULL,
                'IM' => $select->IM ?? NULL,
                'LL' => $select->LL ?? NULL,
                'KB2' => $select->KB2 ?? NULL,
                'KP2' => $select->KP2 ?? NULL,
                'KI2' => $select->KI2 ?? NULL,
                'KO2' => $select->KO2 ?? NULL,
                'PS2' => $select->PS2 ?? NULL,
                'PN2' => $select->PN2 ?? NULL,
                'EX2' => $select->EX2 ?? NULL,
                'IM2' => $select->IM2 ?? NULL,
                'LL2' => $select->LL2 ?? NULL,
                'totalval' => $select->totalval ?? NULL,

            ]);
        }
    }


    public function p101_yearly_district_utilrate()
    {
        $delete = DB::delete("DELETE FROM p101_yearly_district_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p101_yearly_district_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P101YearlyDistrictUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'daerah' => $select->daerah ?? NULL,
                'sum_cpo' => $select->sum_cpo ?? NULL,
                'sum_cpko' => $select->sum_cpko ?? NULL,
                'sum_refkap' => $select->sum_refkap ?? NULL,
                'rate_cpocpko' => $select->rate_cpocpko ?? NULL,
                'rate_cpo' => $select->rate_cpo ?? NULL,
                'rate_cpko' => $select->rate_cpko ?? NULL,
            ]);
        }
    }

    public function p101_yearly_group_utilrate()
    {
        $delete = DB::delete("DELETE FROM p101_yearly_group_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p101_yearly_group_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P101YearlyGroupUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'syktgroup' => $select->syktgroup ?? NULL,
                'sum_cpo' => $select->sum_cpo ?? NULL,
                'sum_cpko' => $select->sum_cpko ?? NULL,
                'sum_refkap' => $select->sum_refkap ?? NULL,
                'rate_cpocpko' => $select->rate_cpocpko ?? NULL,
                'rate_cpo' => $select->rate_cpo ?? NULL,
                'rate_cpko' => $select->rate_cpko ?? NULL,
            ]);
        }
    }

    public function p101_yearly_month_utilrate()
    {
        $delete = DB::delete("DELETE FROM p101_yearly_month_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p101_yearly_month_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P101YearlyMonthUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'sum_cpo' => $select->sum_cpo ?? NULL,
                'sum_cpko' => $select->sum_cpko ?? NULL,
                'sum_refkap' => $select->sum_refkap ?? NULL,
                'rate_cpocpko' => $select->rate_cpocpko ?? NULL,
                'rate_cpo' => $select->rate_cpo ?? NULL,
                'rate_cpko' => $select->rate_cpko ?? NULL,
            ]);
        }
    }


    public function p101_yearly_pelesen_utilrate()
    {
        $delete = DB::delete("DELETE FROM p101_yearly_pelesen_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p101_yearly_pelesen_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P101YearlyPelesenUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'nolesen' => $select->nolesen ?? NULL,
                'namapremis' => $select->namapremis ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'daerah' => $select->daerah ?? NULL,
                'kawasan' => $select->kawasan ?? NULL,
                'syktinduk' => $select->syktinduk ?? NULL,
                'syktgroup' => $select->syktgroup ?? NULL,
                'thnoperasi' => $select->thnoperasi ?? NULL,
                'sum_cpo' => $select->sum_cpo ?? NULL,
                'sum_cpko' => $select->sum_cpko ?? NULL,
                'sum_refkap' => $select->sum_refkap ?? NULL,
                'rate_cpocpko' => $select->rate_cpocpko ?? NULL,
                'rate_cpo' => $select->rate_cpo ?? NULL,
                'rate_cpko' => $select->rate_cpko ?? NULL,
            ]);
        }
    }

    public function p101_yearly_region_utilrate()
    {
        $delete = DB::delete("DELETE FROM p101_yearly_region_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p101_yearly_region_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P101YearlyRegionUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'kawasan' => $select->kawasan ?? NULL,
                'sum_cpo' => $select->sum_cpo ?? NULL,
                'sum_cpko' => $select->sum_cpko ?? NULL,
                'sum_refkap' => $select->sum_refkap ?? NULL,
                'rate_cpocpko' => $select->rate_cpocpko ?? NULL,
                'rate_cpo' => $select->rate_cpo ?? NULL,
                'rate_cpko' => $select->rate_cpko ?? NULL,
            ]);
        }
    }


    public function p101_yearly_state_utilrate()
    {
        $delete = DB::delete("DELETE FROM p101_yearly_state_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p101_yearly_state_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P101YearlyStateUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'sum_cpo' => $select->sum_cpo ?? NULL,
                'sum_cpko' => $select->sum_cpko ?? NULL,
                'sum_refkap' => $select->sum_refkap ?? NULL,
                'rate_cpocpko' => $select->rate_cpocpko ?? NULL,
                'rate_cpo' => $select->rate_cpo ?? NULL,
                'rate_cpko' => $select->rate_cpko ?? NULL,
            ]);
        }
    }

    public function p101_yearly_syktinduk_utilrate()
    {
        $delete = DB::delete("DELETE FROM p101_yearly_syktinduk_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p101_yearly_syktinduk_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P101YearlySyktindukUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'syktinduk' => $select->syktinduk ?? NULL,
                'sum_cpo' => $select->sum_cpo ?? NULL,
                'sum_cpko' => $select->sum_cpko ?? NULL,
                'sum_refkap' => $select->sum_refkap ?? NULL,
                'rate_cpocpko' => $select->rate_cpocpko ?? NULL,
                'rate_cpo' => $select->rate_cpo ?? NULL,
                'rate_cpko' => $select->rate_cpko ?? NULL,
            ]);
        }
    }

    public function p102()
    {
        $delete = DB::delete("DELETE FROM p102");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p102");

        foreach ($selects as $key => $select) {

            $insert = P102::create([
                'noid' => $select->noid ?? NULL,
                'nolesen' => $select->nolesen ?? NULL,
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'pk_stkawal_premis' => $select->pk_stkawal_premis ?? NULL,
                'cpko_stkawal_premis' => $select->cpko_stkawal_premis ?? NULL,
                'pkc_stkawal_premis' => $select->pkc_stkawal_premis ?? NULL,
                'pk_stkawal_ps' => $select->pk_stkawal_ps ?? NULL,
                'cpko_stkawal_ps' => $select->cpko_stkawal_ps ?? NULL,
                'pkc_stkawal_ps' => $select->pkc_stkawal_ps ?? NULL,
                'pk_belian' => $select->pk_belian ?? NULL,
                'cpko_belian' => $select->cpko_belian ?? NULL,
                'pkc_belian' => $select->pkc_belian ?? NULL,
                'pk_import' => $select->pk_import ?? NULL,
                'cpko_import' => $select->cpko_import ?? NULL,
                'pkc_import' => $select->pkc_import ?? NULL,
                'pk_proses' => $select->pk_proses ?? NULL,
                'cpko_pengeluaran' => $select->cpko_pengeluaran ?? NULL,
                'pkc_pengeluaran' => $select->pkc_pengeluaran ?? NULL,
                'pk_jualan' => $select->pk_jualan ?? NULL,
                'cpko_jualan' => $select->cpko_jualan ?? NULL,
                'pkc_jualan' => $select->pkc_jualan ?? NULL,
                'pk_hantar' => $select->pk_hantar ?? NULL,
                'cpko_hantar' => $select->cpko_hantar ?? NULL,
                'pkc_hantar' => $select->pkc_hantar ?? NULL,
                'pk_eksport' => $select->pk_eksport ?? NULL,
                'cpko_eksport' => $select->cpko_eksport ?? NULL,
                'pkc_eksport' => $select->pkc_eksport ?? NULL,
                'pk_stkakhir_premis' => $select->pk_stkakhir_premis ?? NULL,
                'cpko_stkakhir_premis' => $select->cpko_stkakhir_premis ?? NULL,
                'pkc_stkakhir_premis' => $select->pkc_stkakhir_premis ?? NULL,
                'pk_stkakhir_ps' => $select->pk_stkakhir_ps ?? NULL,
                'cpko_stkakhir_ps' => $select->cpko_stkakhir_ps ?? NULL,
                'pkc_stkakhir_ps' => $select->pkc_stkakhir_ps ?? NULL,
                'cpko_oer' => $select->cpko_oer ?? NULL,
                'pkc_ker' => $select->pkc_ker ?? NULL,
                'pk_jumjam' => $select->pk_jumjam ?? NULL,
                'pk_utilrate' => $select->pk_utilrate ?? NULL,
                'pk_capacity' => $select->pk_capacity ?? NULL,
                'crs_capacity' => $select->crs_capacity ?? NULL,

            ]);
        }
    }

    public function p102_activities_district()
    {
        $delete = DB::delete("DELETE FROM p102_activities_district");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p102_activities_district");

        foreach ($selects as $key => $select) {

            $insert = P102ActivitiesDistrict::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'district' => $select->district ?? NULL,
                'produk' => $select->produk ?? NULL,
                'stkawal_premis' => $select->stkawal_premis ?? NULL,
                'stkawal_ps' => $select->stkawal_ps ?? NULL,
                'belian' => $select->belian ?? NULL,
                'import' => $select->import ?? NULL,
                'proses' => $select->proses ?? NULL,
                'pengeluaran' => $select->pengeluaran ?? NULL,
                'jualan' => $select->jualan ?? NULL,
                'hantar' => $select->hantar ?? NULL,
                'eksport' => $select->eksport ?? NULL,
                'stkakhir_premis' => $select->stkakhir_premis ?? NULL,
                'stkakhir_ps' => $select->stkakhir_ps ?? NULL,

            ]);
        }
    }

    public function p102_activities_licensee()
    {
        $delete = DB::delete("DELETE FROM p102_activities_licensee");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p102_activities_licensee");

        foreach ($selects as $key => $select) {

            $insert = P102ActivitiesLicensee::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'nolesen' => $select->nolesen ?? NULL,
                'produk' => $select->produk ?? NULL,
                'stkawal_premis' => $select->stkawal_premis ?? NULL,
                'stkawal_ps' => $select->stkawal_ps ?? NULL,
                'belian' => $select->belian ?? NULL,
                'import' => $select->import ?? NULL,
                'proses' => $select->proses ?? NULL,
                'pengeluaran' => $select->pengeluaran ?? NULL,
                'jualan' => $select->jualan ?? NULL,
                'hantar' => $select->hantar ?? NULL,
                'eksport' => $select->eksport ?? NULL,
                'stkakhir_premis' => $select->stkakhir_premis ?? NULL,
                'stkakhir_ps' => $select->stkakhir_ps ?? NULL,

            ]);
        }
    }

    public function p102_activities_maincompany()
    {
        $delete = DB::delete("DELETE FROM p102_activities_maincompany");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p102_activities_maincompany");

        foreach ($selects as $key => $select) {

            $insert = P102ActivitiesMaincompany::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'syktinduk' => $select->syktinduk ?? NULL,
                'produk' => $select->produk ?? NULL,
                'stkawal_premis' => $select->stkawal_premis ?? NULL,
                'stkawal_ps' => $select->stkawal_ps ?? NULL,
                'belian' => $select->belian ?? NULL,
                'import' => $select->import ?? NULL,
                'proses' => $select->proses ?? NULL,
                'pengeluaran' => $select->pengeluaran ?? NULL,
                'jualan' => $select->jualan ?? NULL,
                'hantar' => $select->hantar ?? NULL,
                'eksport' => $select->eksport ?? NULL,
                'stkakhir_premis' => $select->stkakhir_premis ?? NULL,
                'stkakhir_ps' => $select->stkakhir_ps ?? NULL,

            ]);
        }
    }

    public function p102_activities_region()
    {
        $delete = DB::delete("DELETE FROM p102_activities_region");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p102_activities_region");

        foreach ($selects as $key => $select) {

            $insert = P102ActivitiesRegion::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'kawasan' => $select->kawasan ?? NULL,
                'produk' => $select->produk ?? NULL,
                'stkawal_premis' => $select->stkawal_premis ?? NULL,
                'stkawal_ps' => $select->stkawal_ps ?? NULL,
                'belian' => $select->belian ?? NULL,
                'import' => $select->import ?? NULL,
                'proses' => $select->proses ?? NULL,
                'pengeluaran' => $select->pengeluaran ?? NULL,
                'jualan' => $select->jualan ?? NULL,
                'hantar' => $select->hantar ?? NULL,
                'eksport' => $select->eksport ?? NULL,
                'stkakhir_premis' => $select->stkakhir_premis ?? NULL,
                'stkakhir_ps' => $select->stkakhir_ps ?? NULL,

            ]);
        }
    }

    public function p102_activities_state()
    {
        $delete = DB::delete("DELETE FROM p102_activities_state");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p102_activities_state");

        foreach ($selects as $key => $select) {

            $insert = P102ActivitiesState::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'produk' => $select->produk ?? NULL,
                'stkawal_premis' => $select->stkawal_premis ?? NULL,
                'stkawal_ps' => $select->stkawal_ps ?? NULL,
                'belian' => $select->belian ?? NULL,
                'import' => $select->import ?? NULL,
                'proses' => $select->proses ?? NULL,
                'pengeluaran' => $select->pengeluaran ?? NULL,
                'jualan' => $select->jualan ?? NULL,
                'hantar' => $select->hantar ?? NULL,
                'eksport' => $select->eksport ?? NULL,
                'stkakhir_premis' => $select->stkakhir_premis ?? NULL,
                'stkakhir_ps' => $select->stkakhir_ps ?? NULL,

            ]);
        }
    }

    public function p102_monthly_district()
    {
        $delete = DB::delete("DELETE FROM p102_monthly_district");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p102_monthly_district");

        foreach ($selects as $key => $select) {

            $insert = P102MonthlyDistrict::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'daerah' => $select->daerah ?? NULL,
                'produk' => $select->produk ?? NULL,
                'aktiviti' => $select->aktiviti ?? NULL,
                'kuantiti' => $select->kuantiti ?? NULL,

            ]);
        }
    }

    public function p102_monthly_district_utilrate()
    {
        $delete = DB::delete("DELETE FROM p102_monthly_district_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p102_monthly_district_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P102MonthlyDistrictUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'daerah' => $select->daerah ?? NULL,
                'pk_proc' => $select->pk_proc ?? NULL,
                'cpko_prod' => $select->cpko_prod ?? NULL,
                'pkc_prod' => $select->pkc_prod ?? NULL,
                'cpko_oer_cal' => $select->cpko_oer_cal ?? NULL,
                'pk_ker_cal' => $select->pk_ker_cal ?? NULL,
                'crs_capacity' => $select->crs_capacity ?? NULL,
                'crs_hours' => $select->crs_hours ?? NULL,
                'crs_utilrate' => $select->crs_utilrate ?? NULL,

            ]);
        }
    }


    public function p102_monthly_licensee()
    {
        $delete = DB::delete("DELETE FROM p102_monthly_licensee");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p102_monthly_licensee");

        foreach ($selects as $key => $select) {

            $insert = P102MonthlyLicensee::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'nolesen' => $select->nolesen ?? NULL,
                'produk' => $select->produk ?? NULL,
                'aktiviti' => $select->aktiviti ?? NULL,
                'kuantiti' => $select->kuantiti ?? NULL,

            ]);
        }
    }

    public function p102_monthly_maincompany()
    {
        $delete = DB::delete("DELETE FROM p102_monthly_maincompany");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p102_monthly_maincompany");

        foreach ($selects as $key => $select) {

            $insert = P102MonthlyMaincompany::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'syktinduk' => $select->syktinduk ?? NULL,
                'produk' => $select->produk ?? NULL,
                'aktiviti' => $select->aktiviti ?? NULL,
                'kuantiti' => $select->kuantiti ?? NULL,

            ]);
        }
    }


    public function p102_monthly_maincompany_utilrate()
    {
        $delete = DB::delete("DELETE FROM p102_monthly_maincompany_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p102_monthly_maincompany_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P102MonthlyMaincompanyUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'syktinduk' => $select->syktinduk ?? NULL,
                'pk_proc' => $select->pk_proc ?? NULL,
                'cpko_prod' => $select->cpko_prod ?? NULL,
                'pkc_prod' => $select->pkc_prod ?? NULL,
                'cpko_oer_cal' => $select->cpko_oer_cal ?? NULL,
                'pk_ker_cal' => $select->pk_ker_cal ?? NULL,
                'crs_capacity' => $select->crs_capacity ?? NULL,
                'crs_hours' => $select->crs_hours ?? NULL,
                'crs_utilrate' => $select->crs_utilrate ?? NULL,

            ]);
        }
    }

    public function p102_monthly_region()
    {
        $delete = DB::delete("DELETE FROM p102_monthly_region");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p102_monthly_region");

        foreach ($selects as $key => $select) {

            $insert = P102MonthlyRegion::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'region' => $select->region ?? NULL,
                'produk' => $select->produk ?? NULL,
                'aktiviti' => $select->aktiviti ?? NULL,
                'kuantiti' => $select->kuantiti ?? NULL,

            ]);
        }
    }


    public function p102_monthly_region_utilrate()
    {
        $delete = DB::delete("DELETE FROM p102_monthly_region_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p102_monthly_region_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P102MonthlyRegionUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'kawasan' => $select->kawasan ?? NULL,
                'pk_proc' => $select->pk_proc ?? NULL,
                'cpko_prod' => $select->cpko_prod ?? NULL,
                'pkc_prod' => $select->pkc_prod ?? NULL,
                'cpko_oer_cal' => $select->cpko_oer_cal ?? NULL,
                'pk_ker_cal' => $select->pk_ker_cal ?? NULL,
                'crs_capacity' => $select->crs_capacity ?? NULL,
                'crs_hours' => $select->crs_hours ?? NULL,
                'crs_utilrate' => $select->crs_utilrate ?? NULL,

            ]);
        }
    }

    public function p102_monthly_state()
    {
        $delete = DB::delete("DELETE FROM p102_monthly_state");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p102_monthly_state");

        foreach ($selects as $key => $select) {

            $insert = P102MonthlyState::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'produk' => $select->produk ?? NULL,
                'aktiviti' => $select->aktiviti ?? NULL,
                'kuantiti' => $select->kuantiti ?? NULL,

            ]);
        }
    }


    public function p102_monthly_state_crshrs()
    {
        $delete = DB::delete("DELETE FROM p102_monthly_state_crshrs");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p102_monthly_state_crshrs");

        foreach ($selects as $key => $select) {

            $insert = P102MonthlyStateCrshrs::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'crs_hours' => $select->crs_hours ?? NULL,

            ]);
        }
    }


    public function p102_monthly_state_utilrate()
    {
        $delete = DB::delete("DELETE FROM p102_monthly_state_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p102_monthly_state_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P102MonthlyStateUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'pk_proc' => $select->pk_proc ?? NULL,
                'cpko_prod' => $select->cpko_prod ?? NULL,
                'pkc_prod' => $select->pkc_prod ?? NULL,
                'cpko_oer_cal' => $select->cpko_oer_cal ?? NULL,
                'pk_ker_cal' => $select->pk_ker_cal ?? NULL,
                'crs_capacity' => $select->crs_capacity ?? NULL,
                'crs_hours' => $select->crs_hours ?? NULL,
                'crs_utilrate' => $select->crs_utilrate ?? NULL,

            ]);
        }
    }


    public function p102_month_utilrate()
    {
        $delete = DB::delete("DELETE FROM p102_month_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p102_month_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P102MonthUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'pk_proc' => $select->pk_proc ?? NULL,
                'cpko_prod' => $select->cpko_prod ?? NULL,
                'pkc_prod' => $select->pkc_prod ?? NULL,
                'cpko_oer_cal' => $select->cpko_oer_cal ?? NULL,
                'pk_ker_cal' => $select->pk_ker_cal ?? NULL,
                'crs_capacity' => $select->crs_capacity ?? NULL,
                'crs_hours' => $select->crs_hours ?? NULL,
                'crs_utilrate' => $select->crs_utilrate ?? NULL,

            ]);
        }
    }


    public function p102_quarterly_district()
    {
        $delete = DB::delete("DELETE FROM p102_quarterly_district");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p102_quarterly_district");

        foreach ($selects as $key => $select) {

            $insert = P102QuarterlyDistrict::create([
                'tahun' => $select->tahun ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'daerah' => $select->daerah ?? NULL,
                'produk' => $select->produk ?? NULL,
                'aktiviti' => $select->aktiviti ?? NULL,
                'Jan' => $select->Jan ?? NULL,
                'Feb' => $select->Feb ?? NULL,
                'Mar' => $select->Mar ?? NULL,
                'Quarter1' => $select->Quarter1 ?? NULL,
                'Apr' => $select->Apr ?? NULL,
                'May' => $select->May ?? NULL,
                'Jun' => $select->Jun ?? NULL,
                'Quarter2' => $select->Quarter2 ?? NULL,
                'FirstHalf' => $select->FirstHalf ?? NULL,
                'Jul' => $select->Jul ?? NULL,
                'Aug' => $select->Aug ?? NULL,
                'Sep' => $select->Sep ?? NULL,
                'Quarter3' => $select->Quarter3 ?? NULL,
                'SecondHalf' => $select->SecondHalf ?? NULL,
                'Oct' => $select->Oct ?? NULL,
                'Nov' => $select->Nov ?? NULL,
                'Dece' => $select->Dece ?? NULL,
                'Quarter4' => $select->Quarter4 ?? NULL,
                'TotalAll' => $select->TotalAll ?? NULL,

            ]);
        }
    }

    public function p102_quarterly_licensee()
    {
        $delete = DB::delete("DELETE FROM p102_quarterly_licensee");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p102_quarterly_licensee");

        foreach ($selects as $key => $select) {

            $insert = P102QuarterlyLicensee::create([
                'tahun' => $select->tahun ?? NULL,
                'nolesen' => $select->nolesen ?? NULL,
                'namapremis' => $select->namapremis ?? NULL,
                'produk' => $select->produk ?? NULL,
                'aktiviti' => $select->aktiviti ?? NULL,
                'Jan' => $select->Jan ?? NULL,
                'Feb' => $select->Feb ?? NULL,
                'Mar' => $select->Mar ?? NULL,
                'Quarter1' => $select->Quarter1 ?? NULL,
                'Apr' => $select->Apr ?? NULL,
                'May' => $select->May ?? NULL,
                'Jun' => $select->Jun ?? NULL,
                'Quarter2' => $select->Quarter2 ?? NULL,
                'FirstHalf' => $select->FirstHalf ?? NULL,
                'Jul' => $select->Jul ?? NULL,
                'Aug' => $select->Aug ?? NULL,
                'Sep' => $select->Sep ?? NULL,
                'Quarter3' => $select->Quarter3 ?? NULL,
                'SecondHalf' => $select->SecondHalf ?? NULL,
                'Oct' => $select->Oct ?? NULL,
                'Nov' => $select->Nov ?? NULL,
                'Dece' => $select->Dece ?? NULL,
                'Quarter4' => $select->Quarter4 ?? NULL,
                'TotalAll' => $select->TotalAll ?? NULL,

            ]);
        }
    }

    public function p102_quarterly_maincompany()
    {
        $delete = DB::delete("DELETE FROM p102_quarterly_maincompany");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p102_quarterly_maincompany");

        foreach ($selects as $key => $select) {

            $insert = P102QuarterlyMaincompany::create([
                'tahun' => $select->tahun ?? NULL,
                'syktinduk' => $select->syktinduk ?? NULL,
                'produk' => $select->produk ?? NULL,
                'aktiviti' => $select->aktiviti ?? NULL,
                'Jan' => $select->Jan ?? NULL,
                'Feb' => $select->Feb ?? NULL,
                'Mar' => $select->Mar ?? NULL,
                'Quarter1' => $select->Quarter1 ?? NULL,
                'Apr' => $select->Apr ?? NULL,
                'May' => $select->May ?? NULL,
                'Jun' => $select->Jun ?? NULL,
                'Quarter2' => $select->Quarter2 ?? NULL,
                'FirstHalf' => $select->FirstHalf ?? NULL,
                'Jul' => $select->Jul ?? NULL,
                'Aug' => $select->Aug ?? NULL,
                'Sep' => $select->Sep ?? NULL,
                'Quarter3' => $select->Quarter3 ?? NULL,
                'SecondHalf' => $select->SecondHalf ?? NULL,
                'Oct' => $select->Oct ?? NULL,
                'Nov' => $select->Nov ?? NULL,
                'Dece' => $select->Dece ?? NULL,
                'Quarter4' => $select->Quarter4 ?? NULL,
                'TotalAll' => $select->TotalAll ?? NULL,

            ]);
        }
    }

    public function p102_quarterly_region()
    {
        $delete = DB::delete("DELETE FROM p102_quarterly_region");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p102_quarterly_region");

        foreach ($selects as $key => $select) {

            $insert = P102QuarterlyRegion::create([
                'tahun' => $select->tahun ?? NULL,
                'region' => $select->region ?? NULL,
                'produk' => $select->produk ?? NULL,
                'aktiviti' => $select->aktiviti ?? NULL,
                'Jan' => $select->Jan ?? NULL,
                'Feb' => $select->Feb ?? NULL,
                'Mar' => $select->Mar ?? NULL,
                'Quarter1' => $select->Quarter1 ?? NULL,
                'Apr' => $select->Apr ?? NULL,
                'May' => $select->May ?? NULL,
                'Jun' => $select->Jun ?? NULL,
                'Quarter2' => $select->Quarter2 ?? NULL,
                'FirstHalf' => $select->FirstHalf ?? NULL,
                'Jul' => $select->Jul ?? NULL,
                'Aug' => $select->Aug ?? NULL,
                'Sep' => $select->Sep ?? NULL,
                'Quarter3' => $select->Quarter3 ?? NULL,
                'SecondHalf' => $select->SecondHalf ?? NULL,
                'Oct' => $select->Oct ?? NULL,
                'Nov' => $select->Nov ?? NULL,
                'Dece' => $select->Dece ?? NULL,
                'Quarter4' => $select->Quarter4 ?? NULL,
                'TotalAll' => $select->TotalAll ?? NULL,

            ]);
        }
    }


    public function p102_yearly_district_utilrate()
    {
        $delete = DB::delete("DELETE FROM p102_yearly_district_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p102_yearly_district_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P102YearlyDistrictUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'daerah' => $select->daerah ?? NULL,
                'pk_proc' => $select->pk_proc ?? NULL,
                'cpko_prod' => $select->cpko_prod ?? NULL,
                'pkc_prod' => $select->pkc_prod ?? NULL,
                'cpko_oer_cal' => $select->cpko_oer_cal ?? NULL,
                'pk_ker_cal' => $select->pk_ker_cal ?? NULL,
                'crs_capacity' => $select->crs_capacity ?? NULL,
                'crs_hours' => $select->crs_hours ?? NULL,
                'crs_utilrate' => $select->crs_utilrate ?? NULL,

            ]);
        }
    }

    public function p102_yearly_licensee_utilrate()
    {
        $delete = DB::delete("DELETE FROM p102_yearly_licensee_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p102_yearly_licensee_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P102YearlyLicenseeUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'nolesen' => $select->nolesen ?? NULL,
                'namapremis' => $select->namapremis ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'daerah' => $select->daerah ?? NULL,
                'pk_proc' => $select->pk_proc ?? NULL,
                'cpko_prod' => $select->cpko_prod ?? NULL,
                'pkc_prod' => $select->pkc_prod ?? NULL,
                'cpko_oer_cal' => $select->cpko_oer_cal ?? NULL,
                'pk_ker_cal' => $select->pk_ker_cal ?? NULL,
                'crs_capacity' => $select->crs_capacity ?? NULL,
                'crs_hours' => $select->crs_hours ?? NULL,
                'crs_utilrate' => $select->crs_utilrate ?? NULL,

            ]);
        }
    }

    public function p102_yearly_maincompany_utilrate()
    {
        $delete = DB::delete("DELETE FROM p102_yearly_maincompany_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p102_yearly_maincompany_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P102YearlyMaincompanyUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'syktinduk' => $select->syktinduk ?? NULL,
                'pk_proc' => $select->pk_proc ?? NULL,
                'cpko_prod' => $select->cpko_prod ?? NULL,
                'pkc_prod' => $select->pkc_prod ?? NULL,
                'cpko_oer_cal' => $select->cpko_oer_cal ?? NULL,
                'pk_ker_cal' => $select->pk_ker_cal ?? NULL,
                'crs_capacity' => $select->crs_capacity ?? NULL,
                'crs_hours' => $select->crs_hours ?? NULL,
                'crs_utilrate' => $select->crs_utilrate ?? NULL,

            ]);
        }
    }

    public function p102_yearly_region_utilrate()
    {
        $delete = DB::delete("DELETE FROM p102_yearly_region_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p102_yearly_region_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P102YearlyRegionUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'kawasan' => $select->kawasan ?? NULL,
                'pk_proc' => $select->pk_proc ?? NULL,
                'cpko_prod' => $select->cpko_prod ?? NULL,
                'pkc_prod' => $select->pkc_prod ?? NULL,
                'cpko_oer_cal' => $select->cpko_oer_cal ?? NULL,
                'pk_ker_cal' => $select->pk_ker_cal ?? NULL,
                'crs_capacity' => $select->crs_capacity ?? NULL,
                'crs_hours' => $select->crs_hours ?? NULL,
                'crs_utilrate' => $select->crs_utilrate ?? NULL,

            ]);
        }
    }

    public function p102_yearly_state_purchase()
    {
        $delete = DB::delete("DELETE FROM p102_yearly_state_purchase");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p102_yearly_state_purchase");

        foreach ($selects as $key => $select) {

            $insert = P102YearlyStatePurchase::create([
                'nolesen' => $select->nolesen ?? NULL,
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'jenis_aktiviti' => $select->jenis_aktiviti ?? NULL,
                'jenis_kilang' => $select->jenis_kilang ?? NULL,
                'produk' => $select->produk ?? NULL,
                'kuantiti' => $select->kuantiti ?? NULL,

            ]);
        }
    }

    public function p102_yearly_state_utilrate()
    {
        $delete = DB::delete("DELETE FROM p102_yearly_state_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p102_yearly_state_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P102YearlyStateUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'pk_proc' => $select->pk_proc ?? NULL,
                'cpko_prod' => $select->cpko_prod ?? NULL,
                'pkc_prod' => $select->pkc_prod ?? NULL,
                'cpko_oer_cal' => $select->cpko_oer_cal ?? NULL,
                'pk_ker_cal' => $select->pk_ker_cal ?? NULL,
                'crs_capacity' => $select->crs_capacity ?? NULL,
                'crs_hours' => $select->crs_hours ?? NULL,
                'crs_utilrate' => $select->crs_utilrate ?? NULL,

            ]);
        }
    }

    public function p104()
    {
        $delete = DB::delete("DELETE FROM p104");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p104");

        foreach ($selects as $key => $select) {

            $insert = P104::create([
                'noid' => $select->noid ?? NULL,
                'nolesen' => $select->nolesen ?? NULL,
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'prodid' => $select->prodid ?? NULL,
                'produk_kump' => $select->produk_kump ?? NULL,
                'prodcat' => $select->prodcat ?? NULL,
                'prodsubcat' => $select->prodsubcat ?? NULL,
                'stkawal_premis' => $select->stkawal_premis ?? NULL,
                'stkawal_ps' => $select->stkawal_ps ?? NULL,
                'belian' => $select->belian ?? NULL,
                'import' => $select->import ?? NULL,
                'pengeluaran' => $select->pengeluaran ?? NULL,
                'pk_import' => $select->pk_import ?? NULL,
                'guna_proses' => $select->guna_proses ?? NULL,
                'jual_edar' => $select->jual_edar ?? NULL,
                'eksport' => $select->eksport ?? NULL,
                'stkakhir_premis' => $select->stkakhir_premis ?? NULL,
                'stkakhir_ps' => $select->stkakhir_ps ?? NULL,

            ]);
        }
    }

    public function p104_master()
    {
        $delete = DB::delete("DELETE FROM p104_master");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p104_master");

        foreach ($selects as $key => $select) {

            $insert = P104Master::create([
                'noid' => $select->noid ?? NULL,
                'nolesen' => $select->nolesen ?? NULL,
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'harioperasi' => $select->harioperasi ?? NULL,
                'capacity_dec' => $select->capacity_dec ?? NULL,
                'cpo_proc' => $select->cpo_proc ?? NULL,
                'cpko_proc' => $select->cpko_proc ?? NULL,
                'oleokap' => $select->oleokap ?? NULL,
                'oleoutilrate' => $select->oleoutilrate ?? NULL,
                'statusaktif' => $select->statusaktif ?? NULL,
                'oleoutilratecpo' => $select->oleoutilratecpo ?? NULL,
                'oleoutilratecpko' => $select->oleoutilratecpko ?? NULL,
                'ppo_proc' => $select->ppo_proc ?? NULL,
                'ppko_proc' => $select->ppko_proc ?? NULL,
                'oleoutilrateppo' => $select->oleoutilrateppo ?? NULL,
                'oleoutilrateppko' => $select->oleoutilrateppko ?? NULL,
                'po_proc' => $select->po_proc ?? NULL,
                'oleoutilratepo' => $select->oleoutilratepo ?? NULL,

            ]);
        }
    }

    public function p104_monthly_district_utilrate()
    {
        $delete = DB::delete("DELETE FROM p104_monthly_district_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p104_monthly_district_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P104MonthlyDistrictUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'daerah' => $select->daerah ?? NULL,
                'sum_cpo' => $select->sum_cpo ?? NULL,
                'sum_cpko' => $select->sum_cpko ?? NULL,
                'sum_oleokap' => $select->sum_oleokap ?? NULL,
                'rate_cpocpko' => $select->rate_cpocpko ?? NULL,
                'rate_cpo' => $select->rate_cpo ?? NULL,
                'rate_cpko' => $select->rate_cpko ?? NULL,
                'rate_ppo' => $select->rate_ppo ?? NULL,
                'rate_ppko' => $select->rate_ppko ?? NULL,
                'rate_po' => $select->rate_po ?? NULL,

            ]);
        }
    }

    public function p104_monthly_group_utilrate()
    {
        $delete = DB::delete("DELETE FROM p104_monthly_group_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p104_monthly_group_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P104MonthlyGroupUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'syktgroup' => $select->syktgroup ?? NULL,
                'sum_cpo' => $select->sum_cpo ?? NULL,
                'sum_cpko' => $select->sum_cpko ?? NULL,
                'sum_oleokap' => $select->sum_oleokap ?? NULL,
                'rate_cpocpko' => $select->rate_cpocpko ?? NULL,
                'rate_cpo' => $select->rate_cpo ?? NULL,
                'rate_cpko' => $select->rate_cpko ?? NULL,
                'rate_ppo' => $select->rate_ppo ?? NULL,
                'rate_ppko' => $select->rate_ppko ?? NULL,
                'rate_po' => $select->rate_po ?? NULL,

            ]);
        }
    }

    public function p104_monthly_pelesen_utilrate()
    {
        $delete = DB::delete("DELETE FROM p104_monthly_pelesen_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p104_monthly_pelesen_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P104MonthlyPelesenUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'nolesen' => $select->nolesen ?? NULL,
                'namapremis' => $select->namapremis ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'daerah' => $select->daerah ?? NULL,
                'kawasan' => $select->kawasan ?? NULL,
                'syktinduk' => $select->syktinduk ?? NULL,
                'syktgroup' => $select->syktgroup ?? NULL,
                'thnoperasi' => $select->thnoperasi ?? NULL,
                'sum_cpo' => $select->sum_cpo ?? NULL,
                'sum_cpko' => $select->sum_cpko ?? NULL,
                'sum_oleokap' => $select->sum_oleokap ?? NULL,
                'rate_cpocpko' => $select->rate_cpocpko ?? NULL,
                'rate_cpo' => $select->rate_cpo ?? NULL,
                'rate_cpko' => $select->rate_cpko ?? NULL,
                'rate_ppo' => $select->rate_ppo ?? NULL,
                'rate_ppko' => $select->rate_ppko ?? NULL,
                'rate_po' => $select->rate_po ?? NULL,

            ]);
        }
    }

    public function p104_monthly_region_utilrate()
    {
        $delete = DB::delete("DELETE FROM p104_monthly_region_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p104_monthly_region_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P104MonthlyRegionUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'kawasan' => $select->kawasan ?? NULL,
                'sum_cpo' => $select->sum_cpo ?? NULL,
                'sum_cpko' => $select->sum_cpko ?? NULL,
                'sum_oleokap' => $select->sum_oleokap ?? NULL,
                'rate_cpocpko' => $select->rate_cpocpko ?? NULL,
                'rate_cpo' => $select->rate_cpo ?? NULL,
                'rate_cpko' => $select->rate_cpko ?? NULL,
                'rate_ppo' => $select->rate_ppo ?? NULL,
                'rate_ppko' => $select->rate_ppko ?? NULL,
                'rate_po' => $select->rate_po ?? NULL,

            ]);
        }
    }


    public function p104_monthly_state()
    {
        $delete = DB::delete("DELETE FROM p104_monthly_state");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p104_monthly_state");

        foreach ($selects as $key => $select) {

            $insert = P104MonthlyState::create([
                'id_mth' => $select->id_mth ?? NULL,
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'prodid' => $select->prodid ?? NULL,
                'produk_kump' => $select->produk_kump ?? NULL,
                'prodcat' => $select->prodcat ?? NULL,
                'prodsubcat' => $select->prodsubcat ?? NULL,
                'stkawal_premis' => $select->stkawal_premis ?? NULL,
                'stkawal_ps' => $select->stkawal_ps ?? NULL,
                'belian' => $select->belian ?? NULL,
                'import' => $select->import ?? NULL,
                'pengeluaran' => $select->pengeluaran ?? NULL,
                'pk_import' => $select->pk_import ?? NULL,
                'guna_proses' => $select->guna_proses ?? NULL,
                'jual_edar' => $select->jual_edar ?? NULL,
                'eksport' => $select->eksport ?? NULL,
                'stkakhir_premis' => $select->stkakhir_premis ?? NULL,
                'stkakhir_ps' => $select->stkakhir_ps ?? NULL,

            ]);
        }
    }

    public function p104_monthly_state_utilrate()
    {
        $delete = DB::delete("DELETE FROM p104_monthly_state_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p104_monthly_state_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P104MonthlyStateUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'sum_cpo' => $select->sum_cpo ?? NULL,
                'sum_cpko' => $select->sum_cpko ?? NULL,
                'sum_oleokap' => $select->sum_oleokap ?? NULL,
                'rate_cpocpko' => $select->rate_cpocpko ?? NULL,
                'rate_cpo' => $select->rate_cpo ?? NULL,
                'rate_cpko' => $select->rate_cpko ?? NULL,
                'rate_ppo' => $select->rate_ppo ?? NULL,
                'rate_ppko' => $select->rate_ppko ?? NULL,
                'rate_po' => $select->rate_po ?? NULL,

            ]);
        }
    }

    public function p104_monthly_syktinduk_utilrate()
    {
        $delete = DB::delete("DELETE FROM p104_monthly_syktinduk_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p104_monthly_syktinduk_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P104MonthlySyktindukUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'syktinduk' => $select->syktinduk ?? NULL,
                'sum_cpo' => $select->sum_cpo ?? NULL,
                'sum_cpko' => $select->sum_cpko ?? NULL,
                'sum_oleokap' => $select->sum_oleokap ?? NULL,
                'rate_cpocpko' => $select->rate_cpocpko ?? NULL,
                'rate_cpo' => $select->rate_cpo ?? NULL,
                'rate_cpko' => $select->rate_cpko ?? NULL,
                'rate_ppo' => $select->rate_ppo ?? NULL,
                'rate_ppko' => $select->rate_ppko ?? NULL,
                'rate_po' => $select->rate_po ?? NULL,

            ]);
        }
    }

    public function p104_quarterly_district_utilrate()
    {
        $delete = DB::delete("DELETE FROM p104_quarterly_district_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p104_quarterly_district_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P104QuarterlyDistrictUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'daerah' => $select->daerah ?? NULL,
                'sum_cpo' => $select->sum_cpo ?? NULL,
                'sum_cpko' => $select->sum_cpko ?? NULL,
                'sum_oleokap' => $select->sum_oleokap ?? NULL,
                'rate_cpocpko' => $select->rate_cpocpko ?? NULL,
                'rate_cpo' => $select->rate_cpo ?? NULL,
                'rate_cpko' => $select->rate_cpko ?? NULL,
                'rate_ppo' => $select->rate_ppo ?? NULL,
                'rate_ppko' => $select->rate_ppko ?? NULL,
                'rate_po' => $select->rate_po ?? NULL,

            ]);
        }
    }

    public function p104_quarterly_group_utilrate()
    {
        $delete = DB::delete("DELETE FROM p104_quarterly_group_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p104_quarterly_group_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P104QuarterlyGroupUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'syktgroup' => $select->syktgroup ?? NULL,
                'sum_cpo' => $select->sum_cpo ?? NULL,
                'sum_cpko' => $select->sum_cpko ?? NULL,
                'sum_oleokap' => $select->sum_oleokap ?? NULL,
                'rate_cpocpko' => $select->rate_cpocpko ?? NULL,
                'rate_cpo' => $select->rate_cpo ?? NULL,
                'rate_cpko' => $select->rate_cpko ?? NULL,
                'rate_ppo' => $select->rate_ppo ?? NULL,
                'rate_ppko' => $select->rate_ppko ?? NULL,
                'rate_po' => $select->rate_po ?? NULL,

            ]);
        }
    }

    public function p104_quarterly_pelesen()
    {
        $delete = DB::delete("DELETE FROM p104_quarterly_pelesen");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p104_quarterly_pelesen");

        foreach ($selects as $key => $select) {

            $insert = P104QuarterlyPelesen::create([
                'p104_qtrid' => $select->p104_qtrid ?? NULL,
                'Year' => $select->Year ?? NULL,
                'Activities' => $select->Activities ?? NULL,
                'LicenseNo' => $select->LicenseNo ?? NULL,
                'ProductGroup' => $select->ProductGroup ?? NULL,
                'ProductCategory' => $select->ProductCategory ?? NULL,
                'ProductSubGroup' => $select->ProductSubGroup ?? NULL,
                'Product' => $select->Product ?? NULL,
                'Jan' => $select->Jan ?? NULL,
                'Feb' => $select->Feb ?? NULL,
                'Mar' => $select->Mar ?? NULL,
                'Quarter1' => $select->Quarter1 ?? NULL,
                'Apr' => $select->Apr ?? NULL,
                'May' => $select->May ?? NULL,
                'Jun' => $select->Jun ?? NULL,
                'Quarter2' => $select->Quarter2 ?? NULL,
                'FirstHalf' => $select->FirstHalf ?? NULL,
                'Jul' => $select->Jul ?? NULL,
                'Aug' => $select->Aug ?? NULL,
                'Sep' => $select->Sep ?? NULL,
                'Quarter3' => $select->Quarter3 ?? NULL,
                'SecondHalf' => $select->SecondHalf ?? NULL,
                'Oct' => $select->Oct ?? NULL,
                'Nov' => $select->Nov ?? NULL,
                'Dece' => $select->Dece ?? NULL,
                'Quarter4' => $select->Quarter4 ?? NULL,
                'TotalAll' => $select->TotalAll ?? NULL,

            ]);
        }
    }

    public function p104_quarterly_pelesen_utilrate()
    {
        $delete = DB::delete("DELETE FROM p104_quarterly_pelesen_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p104_quarterly_pelesen_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P104QuarterlyPelesenUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'nolesen' => $select->nolesen ?? NULL,
                'namapremis' => $select->namapremis ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'daerah' => $select->daerah ?? NULL,
                'kawasan' => $select->kawasan ?? NULL,
                'syktinduk' => $select->syktinduk ?? NULL,
                'syktgroup' => $select->syktgroup ?? NULL,
                'thnoperasi' => $select->thnoperasi ?? NULL,
                'sum_cpo' => $select->sum_cpo ?? NULL,
                'sum_cpko' => $select->sum_cpko ?? NULL,
                'sum_oleokap' => $select->sum_oleokap ?? NULL,
                'rate_cpocpko' => $select->rate_cpocpko ?? NULL,
                'rate_cpo' => $select->rate_cpo ?? NULL,
                'rate_cpko' => $select->rate_cpko ?? NULL,
                'rate_ppo' => $select->rate_ppo ?? NULL,
                'rate_ppko' => $select->rate_ppko ?? NULL,
                'rate_po' => $select->rate_po ?? NULL,

            ]);
        }
    }

    public function p104_quarterly_region_utilrate()
    {
        $delete = DB::delete("DELETE FROM p104_quarterly_region_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p104_quarterly_region_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P104QuarterlyRegionUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'kawasan' => $select->kawasan ?? NULL,
                'sum_cpo' => $select->sum_cpo ?? NULL,
                'sum_cpko' => $select->sum_cpko ?? NULL,
                'sum_oleokap' => $select->sum_oleokap ?? NULL,
                'rate_cpocpko' => $select->rate_cpocpko ?? NULL,
                'rate_cpo' => $select->rate_cpo ?? NULL,
                'rate_cpko' => $select->rate_cpko ?? NULL,
                'rate_ppo' => $select->rate_ppo ?? NULL,
                'rate_ppko' => $select->rate_ppko ?? NULL,
                'rate_po' => $select->rate_po ?? NULL,

            ]);
        }
    }


    public function p104_quarterly_state()
    {
        $delete = DB::delete("DELETE FROM p104_quarterly_state");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p104_quarterly_state");

        foreach ($selects as $key => $select) {

            $insert = P104QuarterlyState::create([
                'p101_qtrid' => $select->p101_qtrid ?? NULL,
                'Year' => $select->Year ?? NULL,
                'Activities' => $select->Activities ?? NULL,
                'State' => $select->State ?? NULL,
                'ProductGroup' => $select->ProductGroup ?? NULL,
                'ProductSubGroup' => $select->ProductSubGroup ?? NULL,
                'ProductCategory' => $select->ProductCategory ?? NULL,
                'Product' => $select->Product ?? NULL,
                'Jan' => $select->Jan ?? NULL,
                'Feb' => $select->Feb ?? NULL,
                'Mar' => $select->Mar ?? NULL,
                'Quarter1' => $select->Quarter1 ?? NULL,
                'Apr' => $select->Apr ?? NULL,
                'May' => $select->May ?? NULL,
                'Jun' => $select->Jun ?? NULL,
                'Quarter2' => $select->Quarter2 ?? NULL,
                'FirstHalf' => $select->FirstHalf ?? NULL,
                'Jul' => $select->Jul ?? NULL,
                'Aug' => $select->Aug ?? NULL,
                'Sep' => $select->Sep ?? NULL,
                'Quarter3' => $select->Quarter3 ?? NULL,
                'SecondHalf' => $select->SecondHalf ?? NULL,
                'Oct' => $select->Oct ?? NULL,
                'Nov' => $select->Nov ?? NULL,
                'Dece' => $select->Dece ?? NULL,
                'Quarter4' => $select->Quarter4 ?? NULL,
                'TotalAll' => $select->TotalAll ?? NULL,

            ]);
        }
    }


    public function p104_quarterly_state_utilrate()
    {
        $delete = DB::delete("DELETE FROM p104_quarterly_state_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p104_quarterly_state_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P104QuarterlyStateUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'sum_cpo' => $select->sum_cpo ?? NULL,
                'sum_cpko' => $select->sum_cpko ?? NULL,
                'sum_oleokap' => $select->sum_oleokap ?? NULL,
                'rate_cpocpko' => $select->rate_cpocpko ?? NULL,
                'rate_cpo' => $select->rate_cpo ?? NULL,
                'rate_cpko' => $select->rate_cpko ?? NULL,
                'rate_ppo' => $select->rate_ppo ?? NULL,
                'rate_ppko' => $select->rate_ppko ?? NULL,
                'rate_po' => $select->rate_po ?? NULL,

            ]);
        }
    }

    public function p104_quarterly_syktinduk_utilrate()
    {
        $delete = DB::delete("DELETE FROM p104_quarterly_syktinduk_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p104_quarterly_syktinduk_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P104QuarterlySyktindukUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'syktinduk' => $select->syktinduk ?? NULL,
                'sum_cpo' => $select->sum_cpo ?? NULL,
                'sum_cpko' => $select->sum_cpko ?? NULL,
                'sum_oleokap' => $select->sum_oleokap ?? NULL,
                'rate_cpocpko' => $select->rate_cpocpko ?? NULL,
                'rate_cpo' => $select->rate_cpo ?? NULL,
                'rate_cpko' => $select->rate_cpko ?? NULL,
                'rate_ppo' => $select->rate_ppo ?? NULL,
                'rate_ppko' => $select->rate_ppko ?? NULL,
                'rate_po' => $select->rate_po ?? NULL,

            ]);
        }
    }

    public function p104_yearly_district_utilrate()
    {
        $delete = DB::delete("DELETE FROM p104_yearly_district_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p104_yearly_district_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P104YearlyDistrictUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'daerah' => $select->daerah ?? NULL,
                'sum_cpo' => $select->sum_cpo ?? NULL,
                'sum_cpko' => $select->sum_cpko ?? NULL,
                'sum_oleokap' => $select->sum_oleokap ?? NULL,
                'rate_cpocpko' => $select->rate_cpocpko ?? NULL,
                'rate_cpo' => $select->rate_cpo ?? NULL,
                'rate_cpko' => $select->rate_cpko ?? NULL,
                'rate_ppo' => $select->rate_ppo ?? NULL,
                'rate_ppko' => $select->rate_ppko ?? NULL,
                'rate_po' => $select->rate_po ?? NULL,

            ]);
        }
    }

    public function p104_yearly_group_utilrate()
    {
        $delete = DB::delete("DELETE FROM p104_yearly_group_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p104_yearly_group_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P104YearlyGroupUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'syktgroup' => $select->syktgroup ?? NULL,
                'sum_cpo' => $select->sum_cpo ?? NULL,
                'sum_cpko' => $select->sum_cpko ?? NULL,
                'sum_oleokap' => $select->sum_oleokap ?? NULL,
                'rate_cpocpko' => $select->rate_cpocpko ?? NULL,
                'rate_cpo' => $select->rate_cpo ?? NULL,
                'rate_cpko' => $select->rate_cpko ?? NULL,
                'rate_ppo' => $select->rate_ppo ?? NULL,
                'rate_ppko' => $select->rate_ppko ?? NULL,
                'rate_po' => $select->rate_po ?? NULL,

            ]);
        }
    }

    public function p104_yearly_month_utilrate()
    {
        $delete = DB::delete("DELETE FROM p104_yearly_month_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p104_yearly_month_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P104YearlyMonthUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'sum_cpo' => $select->sum_cpo ?? NULL,
                'sum_cpko' => $select->sum_cpko ?? NULL,
                'sum_oleokap' => $select->sum_oleokap ?? NULL,
                'rate_cpocpko' => $select->rate_cpocpko ?? NULL,
                'rate_cpo' => $select->rate_cpo ?? NULL,
                'rate_cpko' => $select->rate_cpko ?? NULL,
                'rate_ppo' => $select->rate_ppo ?? NULL,
                'rate_ppko' => $select->rate_ppko ?? NULL,
                'rate_po' => $select->rate_po ?? NULL,

            ]);
        }
    }


    public function p104_yearly_pelesen_utilrate()
    {
        $delete = DB::delete("DELETE FROM p104_yearly_pelesen_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p104_yearly_pelesen_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P104YearlyPelesenUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'nolesen' => $select->nolesen ?? NULL,
                'namapremis' => $select->namapremis ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'daerah' => $select->daerah ?? NULL,
                'kawasan' => $select->kawasan ?? NULL,
                'syktinduk' => $select->syktinduk ?? NULL,
                'syktgroup' => $select->syktgroup ?? NULL,
                'thnoperasi' => $select->thnoperasi ?? NULL,
                'sum_cpo' => $select->sum_cpo ?? NULL,
                'sum_cpko' => $select->sum_cpko ?? NULL,
                'sum_oleokap' => $select->sum_oleokap ?? NULL,
                'rate_cpocpko' => $select->rate_cpocpko ?? NULL,
                'rate_cpo' => $select->rate_cpo ?? NULL,
                'rate_cpko' => $select->rate_cpko ?? NULL,
                'rate_ppo' => $select->rate_ppo ?? NULL,
                'rate_ppko' => $select->rate_ppko ?? NULL,
                'rate_po' => $select->rate_po ?? NULL,

            ]);
        }
    }


    public function p104_yearly_region_utilrate()
    {
        $delete = DB::delete("DELETE FROM p104_yearly_region_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p104_yearly_region_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P104YearlyRegionUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'kawasan' => $select->kawasan ?? NULL,
                'sum_cpo' => $select->sum_cpo ?? NULL,
                'sum_cpko' => $select->sum_cpko ?? NULL,
                'sum_oleokap' => $select->sum_oleokap ?? NULL,
                'rate_cpocpko' => $select->rate_cpocpko ?? NULL,
                'rate_cpo' => $select->rate_cpo ?? NULL,
                'rate_cpko' => $select->rate_cpko ?? NULL,
                'rate_ppo' => $select->rate_ppo ?? NULL,
                'rate_ppko' => $select->rate_ppko ?? NULL,
                'rate_po' => $select->rate_po ?? NULL,

            ]);
        }
    }

    public function p104_yearly_state_utilrate()
    {
        $delete = DB::delete("DELETE FROM p104_yearly_state_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p104_yearly_state_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P104YearlyStateUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'sum_cpo' => $select->sum_cpo ?? NULL,
                'sum_cpko' => $select->sum_cpko ?? NULL,
                'sum_oleokap' => $select->sum_oleokap ?? NULL,
                'rate_cpocpko' => $select->rate_cpocpko ?? NULL,
                'rate_cpo' => $select->rate_cpo ?? NULL,
                'rate_cpko' => $select->rate_cpko ?? NULL,
                'rate_ppo' => $select->rate_ppo ?? NULL,
                'rate_ppko' => $select->rate_ppko ?? NULL,
                'rate_po' => $select->rate_po ?? NULL,

            ]);
        }
    }

    public function p104_yearly_syktinduk_utilrate()
    {
        $delete = DB::delete("DELETE FROM p104_yearly_syktinduk_utilrate");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p104_yearly_syktinduk_utilrate");

        foreach ($selects as $key => $select) {

            $insert = P104YearlySyktindukUtilrate::create([
                'tahun' => $select->tahun ?? NULL,
                'syktinduk' => $select->syktinduk ?? NULL,
                'sum_cpo' => $select->sum_cpo ?? NULL,
                'sum_cpko' => $select->sum_cpko ?? NULL,
                'sum_oleokap' => $select->sum_oleokap ?? NULL,
                'rate_cpocpko' => $select->rate_cpocpko ?? NULL,
                'rate_cpo' => $select->rate_cpo ?? NULL,
                'rate_cpko' => $select->rate_cpko ?? NULL,
                'rate_ppo' => $select->rate_ppo ?? NULL,
                'rate_ppko' => $select->rate_ppko ?? NULL,
                'rate_po' => $select->rate_po ?? NULL,

            ]);
        }
    }


    public function p102_2()
    {
        $delete = DB::delete("DELETE FROM p102_2");

        $selects = DB::connection('mysql2')->select("SELECT * FROM p102_2");

        foreach ($selects as $key => $select) {

            $insert = P1022::create([
                'noid' => $select->noid ?? NULL,
                'nolesen' => $select->nolesen ?? NULL,
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'produk' => $select->produk ?? NULL,
                'jenis_aktiviti' => $select->jenis_aktiviti ?? NULL,
                'jenis_kilang' => $select->jenis_kilang ?? NULL,
                'kuantiti' => $select->kuantiti ?? NULL,

            ]);
        }
    }

    public function pbcatcol()
    {
        $delete = DB::delete("DELETE FROM pbcatcol");

        $selects = DB::connection('mysql2')->select("SELECT * FROM pbcatcol");

        foreach ($selects as $key => $select) {

            $insert = Pbcatcol::create([
                'pbc_tnam' => $select->pbc_tnam ?? NULL,
                'pbc_tid' => $select->pbc_tid ?? NULL,
                'pbc_ownr' => $select->pbc_ownr ?? NULL,
                'pbc_cnam' => $select->pbc_cnam ?? NULL,
                'pbc_cid' => $select->pbc_cid ?? NULL,
                'pbc_labl' => $select->pbc_labl ?? NULL,
                'pbc_lpos' => $select->pbc_lpos ?? NULL,
                'pbc_hdr' => $select->pbc_hdr ?? NULL,
                'pbc_hpos' => $select->pbc_hpos ?? NULL,
                'pbc_jtfy' => $select->pbc_jtfy ?? NULL,
                'pbc_mask' => $select->pbc_mask ?? NULL,
                'pbc_case' => $select->pbc_case ?? NULL,
                'pbc_hght' => $select->pbc_hght ?? NULL,
                'pbc_wdth' => $select->pbc_wdth ?? NULL,
                'pbc_ptrn' => $select->pbc_ptrn ?? NULL,
                'pbc_bmap' => $select->pbc_bmap ?? NULL,
                'pbc_init' => $select->pbc_init ?? NULL,
                'pbc_cmnt' => $select->pbc_cmnt ?? NULL,
                'pbc_edit' => $select->pbc_edit ?? NULL,
                'pbc_tag' => $select->pbc_tag ?? NULL,

            ]);
        }
    }

    public function pbcatedt()
    {
        $delete = DB::delete("DELETE FROM pbcatedt");

        $selects = DB::connection('mysql2')->select("SELECT * FROM pbcatedt");

        foreach ($selects as $key => $select) {

            $insert = Pbcatedt::create([
                'pbe_name' => $select->pbe_name ?? NULL,
                'pbe_edit' => $select->pbe_edit ?? NULL,
                'pbe_type' => $select->pbe_type ?? NULL,
                'pbe_cntr' => $select->pbe_cntr ?? NULL,
                'pbe_seqn' => $select->pbe_seqn ?? NULL,
                'pbe_flag' => $select->pbe_flag ?? NULL,
                'pbe_work' => $select->pbe_work ?? NULL,

            ]);
        }
    }

    public function pbcatfmt()
    {
        $delete = DB::delete("DELETE FROM pbcatfmt");

        $selects = DB::connection('mysql2')->select("SELECT * FROM pbcatfmt");

        foreach ($selects as $key => $select) {

            $insert = Pbcatfmt::create([
                'pbf_name' => $select->pbf_name ?? NULL,
                'pbf_frmt' => $select->pbf_frmt ?? NULL,
                'pbf_type' => $select->pbf_type ?? NULL,
                'pbf_cntr' => $select->pbf_cntr ?? NULL,

            ]);
        }
    }

    public function pbcattbl()
    {
        $delete = DB::delete("DELETE FROM pbcattbl");

        $selects = DB::connection('mysql2')->select("SELECT * FROM pbcattbl");

        foreach ($selects as $key => $select) {

            $insert = Pbcattbl::create([
                'pbt_tnam' => $select->pbt_tnam ?? NULL,
                'pbt_tid' => $select->pbt_tid ?? NULL,
                'pbt_ownr' => $select->pbt_ownr ?? NULL,
                'pbd_fhgt' => $select->pbd_fhgt ?? NULL,
                'pbd_fwgt' => $select->pbd_fwgt ?? NULL,
                'pbd_fitl' => $select->pbd_fitl ?? NULL,
                'pbd_funl' => $select->pbd_funl ?? NULL,
                'pbd_fchr' => $select->pbd_fchr ?? NULL,
                'pbd_fptc' => $select->pbd_fptc ?? NULL,
                'pbd_ffce' => $select->pbd_ffce ?? NULL,
                'pbh_fhgt' => $select->pbh_fhgt ?? NULL,
                'pbh_fwgt' => $select->pbh_fwgt ?? NULL,
                'pbh_fitl' => $select->pbh_fitl ?? NULL,
                'pbh_funl' => $select->pbh_funl ?? NULL,
                'pbh_fchr' => $select->pbh_fchr ?? NULL,
                'pbh_fptc' => $select->pbh_fptc ?? NULL,
                'pbh_ffce' => $select->pbh_ffce ?? NULL,
                'pbl_fhgt' => $select->pbl_fhgt ?? NULL,
                'pbl_fwgt' => $select->pbl_fwgt ?? NULL,
                'pbl_fitl' => $select->pbl_fitl ?? NULL,
                'pbl_funl' => $select->pbl_funl ?? NULL,
                'pbl_fchr' => $select->pbl_fchr ?? NULL,
                'pbl_fptc' => $select->pbl_fptc ?? NULL,
                'pbl_ffce' => $select->pbl_ffce ?? NULL,
                'pbt_cmnt' => $select->pbt_cmnt ?? NULL,
            ]);
        }
    }

    public function pbcatvld()
    {
        $delete = DB::delete("DELETE FROM pbcatvld");

        $selects = DB::connection('mysql2')->select("SELECT * FROM pbcatvld");

        foreach ($selects as $key => $select) {

            $insert = Pbcatvld::create([
                'pbv_name' => $select->pbv_name ?? NULL,
                'pbv_vald' => $select->pbv_vald ?? NULL,
                'pbv_type' => $select->pbv_type ?? NULL,
                'pbv_cntr' => $select->pbv_cntr ?? NULL,
                'pbv_msg' => $select->pbv_msg ?? NULL,
            ]);
        }
    }

    public function pelabuhan_luar()
    {
        $delete = DB::delete("DELETE FROM pelabuhan_luar");

        $selects = DB::connection('mysql2')->select("SELECT * FROM pelabuhan_luar");

        foreach ($selects as $key => $select) {

            $insert = PelabuhanLuar::create([
                'kod_pelabuhan' => $select->kod_pelabuhan ?? NULL,
                'nama_pelabuhan' => $select->nama_pelabuhan ?? NULL,
                'kodnegara' => $select->kodnegara ?? NULL,
                'namanegara' => $select->namanegara ?? NULL,
            ]);
        }
    }

    public function pelabuhan_msia()
    {
        $delete = DB::delete("DELETE FROM pelabuhan_msia");

        $selects = DB::connection('mysql2')->select("SELECT * FROM pelabuhan_msia");

        foreach ($selects as $key => $select) {

            $insert = PelabuhanMsia::create([
                'kod_pelabuhan' => $select->kod_pelabuhan ?? NULL,
                'nama_pelabuhan' => $select->nama_pelabuhan ?? NULL,
                'kaw_pelabuhan' => $select->kaw_pelabuhan ?? NULL,
                'negeri_pelabuhan' => $select->negeri_pelabuhan ?? NULL,
            ]);
        }
    }

    public function pelesen()
    {
        $delete = DB::delete("DELETE FROM pelesen");

        $selects = DB::connection('mysql2')->select("SELECT * FROM pelesen");



        foreach ($selects as $key => $select) {
            $e_kats = DB::connection('mysql2')->select("SELECT e_kat FROM reg_pelesen where e_nl='$select->e_nl'");
            // $ekat= $e_kat[0]->e_kat;
            foreach ($e_kats as $e_kat) {
                $ekat= $e_kat->e_kat;
                // dd($ekat);

            }

            $insert = Pelesen::create([
                'e_id' => $select->e_id ?? NULL,
                'e_nl' => $select->e_nl ?? NULL,
                'e_np' => $select->e_np ?? NULL,
                'e_kat' => $ekat,
                'e_ap1' => $select->e_ap1 ?? NULL,
                'e_ap2' => $select->e_ap2 ?? NULL,
                'e_ap3' => $select->e_ap3 ?? NULL,
                'e_as1' => $select->e_as1 ?? NULL,
                'e_as2' => $select->e_as2 ?? NULL,
                'e_as3' => $select->e_as3 ?? NULL,
                'e_notel' => $select->e_notel ?? NULL,
                'e_nofax' => $select->e_nofax ?? NULL,
                'e_email' => $select->e_email ?? NULL,
                'e_npg' => $select->e_npg ?? NULL,
                'e_jpg' => $select->e_jpg ?? NULL,
                'e_notel_pg' => $select->e_notel_pg ?? NULL,
                'e_email_pg' => $select->e_email_pg ?? NULL,
                'kodpgw' => $select->kodpgw ?? NULL,
                'nosiri' => $select->nosiri ?? NULL,
                'e_npgtg' => $select->e_npgtg ?? NULL,
                'e_jpgtg' => $select->e_jpgtg ?? NULL,
                'eqc_npg' => $select->eqc_npg ?? NULL,
                'eqc_jpg' => $select->eqc_jpg ?? NULL,
                'eqc_email' => $select->eqc_email ?? NULL,
                'e_asnegeri' => $select->e_asnegeri ?? NULL,
                'e_asdaerah' => $select->e_asdaerah ?? NULL,
                'e_negeri' => $select->e_negeri ?? NULL,
                'e_daerah' => $select->e_daerah ?? NULL,
                'e_kawasan' => $select->e_kawasan ?? NULL,
                'e_syktinduk' => $select->e_syktinduk ?? NULL,
                'stk_npg' => $select->stk_npg ?? NULL,
                'stk_notel' => $select->stk_notel ?? NULL,
                'stk_nofax' => $select->stk_nofax ?? NULL,
                'stk_email' => $select->stk_email ?? NULL,
                'stk_syktinduk' => $select->stk_syktinduk ?? NULL,
                'stk_cpo_kap' => $select->stk_cpo_kap ?? NULL,
                'stk_rbdpo_kap' => $select->stk_rbdpo_kap ?? NULL,
                'stk_rbdpl_kap' => $select->stk_rbdpl_kap ?? NULL,
                'stk_rbdps_kap' => $select->stk_rbdps_kap ?? NULL,
                'stk_lainppo_kap' => $select->stk_lainppo_kap ?? NULL,
                'stk_ppo_kap' => $select->stk_ppo_kap ?? NULL,
                'stk_po_kap' => $select->stk_po_kap ?? NULL,
                'stk_pfad_kap' => $select->stk_pfad_kap ?? NULL,
                'e_group' => $select->e_group ?? NULL,
                'e_subgroup' => $select->e_subgroup ?? NULL,
                'e_poma' => $select->e_poma ?? NULL,
                'e_biogas' => $select->e_biogas ?? NULL,
                'e_status_biogas' => $select->e_status_biogas ?? NULL,
                'e_year' => $select->e_year ?? NULL,
                'e_cluster' => $select->e_cluster ?? NULL,
                'e_katkilang' => $select->e_katkilang ?? NULL,
                'e_status' => $select->e_status ?? NULL,
                'e_email_pengurus' => $select->e_email_pengurus ?? NULL,
                'kap_proses' => $select->kap_proses ?? NULL,
                'bil_tangki_cpo' => $select->bil_tangki_cpo ?? NULL,
                'bil_tangki_ppo' => $select->bil_tangki_ppo ?? NULL,
                'bil_tangki_cpko' => $select->bil_tangki_cpko ?? NULL,
                'bil_tangki_ppko' => $select->bil_tangki_ppko ?? NULL,
                'bil_tangki_oleo' => $select->bil_tangki_oleo ?? NULL,
                'bil_tangki_others' => $select->bil_tangki_others ?? NULL,
                'bil_tangki_jumlah' => $select->bil_tangki_jumlah ?? NULL,
                'kap_tangki_cpo' => $select->kap_tangki_cpo ?? NULL,
                'kap_tangki_ppo' => $select->kap_tangki_ppo ?? NULL,
                'kap_tangki_cpko' => $select->kap_tangki_cpko ?? NULL,
                'kap_tangki_ppko' => $select->kap_tangki_ppko ?? NULL,
                'kap_tangki_oleo' => $select->kap_tangki_oleo ?? NULL,
                'kap_tangki_others' => $select->kap_tangki_others ?? NULL,
                'kap_tangki_jumlah' => $select->kap_tangki_jumlah ?? NULL,
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
            ]);
        }
        // dd($e_kat);
    }

    public function pengumuman()
    {
        $delete = DB::delete("DELETE FROM pengumuman");

        $selects = DB::connection('mysql2')->select("SELECT * FROM pengumuman");

        foreach ($selects as $key => $select) {

            $insert = Pengumuman::create([
                'Id' => $select->Id ?? NULL,
                'Message' => $select->Message ?? NULL,
                'Start_date' => $select->Start_date ?? NULL,
                'End_date' => $select->End_date ?? NULL,
                'Icon_new' => $select->Icon_new ?? NULL,
            ]);
        }
    }

    public function pl91_individual()
    {
        $delete = DB::delete("DELETE FROM pl91_individual");

        $selects = DB::connection('mysql2')->select("SELECT * FROM pl91_individual");

        foreach ($selects as $key => $select) {

            $insert = Pl91Individual::create([
                'ind_id' => $select->ind_id ?? NULL,
                'no_lesen' => $select->no_lesen ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'tahun' => $select->tahun ?? NULL,
                'ffb_sstock' => $select->ffb_sstock ?? NULL,
                'cpo_sstock' => $select->cpo_sstock ?? NULL,
                'pk_sstock' => $select->pk_sstock ?? NULL,
                'so_sstock' => $select->so_sstock ?? NULL,
                'ffb_rec' => $select->ffb_rec ?? NULL,
                'cpo_rec' => $select->cpo_rec ?? NULL,
                'pk_rec' => $select->pk_rec ?? NULL,
                'so_rec' => $select->so_rec ?? NULL,
                'ffb_proc' => $select->ffb_proc ?? NULL,
                'cpo_prod' => $select->cpo_prod ?? NULL,
                'pk_prod' => $select->pk_prod ?? NULL,
                'so_prod' => $select->so_prod ?? NULL,
                'ffb_sell' => $select->ffb_sell ?? NULL,
                'cpo_sell' => $select->cpo_sell ?? NULL,
                'pk_sell' => $select->pk_sell ?? NULL,
                'so_sell' => $select->so_sell ?? NULL,
                'cpo_export' => $select->cpo_export ?? NULL,
                'pk_export' => $select->pk_export ?? NULL,
                'so_export' => $select->so_export ?? NULL,
                'ffb_estock' => $select->ffb_estock ?? NULL,
                'cpo_estock' => $select->cpo_estock ?? NULL,
                'pk_estock' => $select->pk_estock ?? NULL,
                'so_estock' => $select->so_estock ?? NULL,
                'mill_hrs' => $select->mill_hrs ?? NULL,
                'mill_oer_cpo' => $select->mill_oer_cpo ?? NULL,
                'mill_ker_pk' => $select->mill_ker_pk ?? NULL,
                'ffb_price' => $select->ffb_price ?? NULL,
                'ffb_tes' => $select->ffb_tes ?? NULL,
                'ffb_tel' => $select->ffb_tel ?? NULL,
                'ffb_tpb' => $select->ffb_tpb ?? NULL,
                'ffb_tpk' => $select->ffb_tpk ?? NULL,
                'ffb_tkb' => $select->ffb_tkb ?? NULL,
                'ffb_tll' => $select->ffb_tll ?? NULL,
                'cpo_jkb' => $select->cpo_jkb ?? NULL,
                'cpo_jkp' => $select->cpo_jkp ?? NULL,
                'cpo_jko' => $select->cpo_jko ?? NULL,
                'cpo_jp' => $select->cpo_jp ?? NULL,
                'cpo_jps' => $select->cpo_jps ?? NULL,
                'cpo_je' => $select->cpo_je ?? NULL,
                'cpo_jt' => $select->cpo_jt ?? NULL,
                'cpo_jll' => $select->cpo_jll ?? NULL,
                'pk_jki' => $select->pk_jki ?? NULL,
                'pk_jp' => $select->pk_jp ?? NULL,
                'pk_jll' => $select->pk_jll ?? NULL,
                'mill_capacity' => $select->mill_capacity ?? NULL,
                'mill_utilrate' => $select->mill_utilrate ?? NULL,
            ]);
        }
    }

    public function pr()
    {
        $delete = DB::delete("DELETE FROM pr");

        $selects = DB::connection('mysql2')->select("SELECT * FROM pr");

        foreach ($selects as $key => $select) {

            $insert = Pr::create([
                'prodid' => $select->prodid ?? NULL,
                'prodnama' => $select->prodnama ?? NULL,
                'prodcat' => $select->prodcat ?? NULL,
                'proddesc' => $select->proddesc ?? NULL,
            ]);
        }
    }

    public function prod_cat()
    {
        $delete = DB::delete("DELETE FROM prod_cat");

        $selects = DB::connection('mysql2')->select("SELECT * FROM prod_cat");

        foreach ($selects as $key => $select) {

            $insert = ProdCat::create([
                'catid' => $select->catid ?? NULL,
                'catname' => $select->catname ?? NULL,
            ]);
        }
    }

    public function prod_cat2()
    {
        $delete = DB::delete("DELETE FROM prod_cat2");

        $selects = DB::connection('mysql2')->select("SELECT * FROM prod_cat2");

        foreach ($selects as $key => $select) {

            $insert = ProdCat2::create([
                'catid' => $select->catid ?? NULL,
                'catname' => $select->catname ?? NULL,
            ]);
        }
    }

    public function prodmsia()
    {
        $delete = DB::delete("DELETE FROM prodmsia");

        $selects = DB::connection('mysql2')->select("SELECT * FROM prodmsia");

        foreach ($selects as $key => $select) {

            $insert = Prodmsia::create([
                'prodmsia_id' => $select->prodmsia_id ?? NULL,
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'mill_millhrs' => $select->mill_millhrs ?? NULL,
                'ffb_millcapacity' => $select->ffb_millcapacity ?? NULL,
                'mill_utilrate' => $select->mill_utilrate ?? NULL,
                'crusher_crshrs' => $select->crusher_crshrs ?? NULL,
                'pk_crscapacity' => $select->pk_crscapacity ?? NULL,
                'crusher_utilrate' => $select->crusher_utilrate ?? NULL,
                'refcap' => $select->refcap ?? NULL,
                'refutilrate' => $select->refutilrate ?? NULL,
                'oleocap' => $select->oleocap ?? NULL,
                'oleoutilrate' => $select->oleoutilrate ?? NULL,
            ]);
        }
    }

    public function prodnegeri()
    {
        $delete = DB::delete("DELETE FROM prodnegeri");

        $selects = DB::connection('mysql2')->select("SELECT * FROM prodnegeri");

        foreach ($selects as $key => $select) {

            $insert = Prodnegeri::create([
                'prodnegeri_id' => $select->prodnegeri_id ?? NULL,
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'cpo' => $select->cpo ?? NULL,
                'pk' => $select->pk ?? NULL,
                'ffb_proc' => $select->ffb_proc ?? NULL,
                'ffb_rec' => $select->ffb_rec ?? NULL,
                'mill_millhrs' => $select->mill_millhrs ?? NULL,
                'ffb_millcapacity' => $select->ffb_millcapacity ?? NULL,
                'mill_utilrate' => $select->mill_utilrate ?? NULL,
                'cpko' => $select->cpko ?? NULL,
                'pkc' => $select->pkc ?? NULL,
                'pk_proc' => $select->pk_proc ?? NULL,
                'crusher_crshrs' => $select->crusher_crshrs ?? NULL,
                'pk_crscapacity' => $select->pk_crscapacity ?? NULL,
                'crusher_utilrate' => $select->crusher_utilrate ?? NULL,
                'refprod_cps' => $select->refprod_cps ?? NULL,
                'refprod_cpl' => $select->refprod_cpl ?? NULL,
                'refprod_rbdpo' => $select->refprod_rbdpo ?? NULL,
                'refprod_rbdpl' => $select->refprod_rbdpl ?? NULL,
                'refprod_rbdps' => $select->refprod_rbdps ?? NULL,
                'refprod_pfad' => $select->refprod_pfad ?? NULL,
                'refprod_co' => $select->refprod_co ?? NULL,
                'refproc_cpo' => $select->refproc_cpo ?? NULL,
                'refproc_cpko' => $select->refproc_cpko ?? NULL,
                'refcap' => $select->refcap ?? NULL,
                'refutilrate' => $select->refutilrate ?? NULL,
                'reffp_mar' => $select->reffp_mar ?? NULL,
                'reffp_ghee' => $select->reffp_ghee ?? NULL,
                'reffp_fat' => $select->reffp_fat ?? NULL,
                'reffp_short' => $select->reffp_short ?? NULL,
                'reffp_coco' => $select->reffp_coco ?? NULL,
                'reffp_soap' => $select->reffp_soap ?? NULL,
                'reffp_redol' => $select->reffp_redol ?? NULL,
                'reffp_pry' => $select->reffp_pry ?? NULL,
                'reffp_blend' => $select->reffp_blend ?? NULL,
                'reffp_otheredb' => $select->reffp_otheredb ?? NULL,
                'reffp_othernot' => $select->reffp_othernot ?? NULL,
                'oleoprod_cps' => $select->oleoprod_cps ?? NULL,
                'oleoprod_cpl' => $select->oleoprod_cpl ?? NULL,
                'oleoprod_rbdpo' => $select->oleoprod_rbdpo ?? NULL,
                'oleoprod_rbdpl' => $select->oleoprod_rbdpl ?? NULL,
                'oleoprod_rbdps' => $select->oleoprod_rbdps ?? NULL,
                'oleoprod_pfad' => $select->oleoprod_pfad ?? NULL,
                'oleoproc_cpo' => $select->oleoproc_cpo ?? NULL,
                'oleoproc_cpko' => $select->oleoproc_cpko ?? NULL,
                'oleocap' => $select->oleocap ?? NULL,
                'oleoutilrate' => $select->oleoutilrate ?? NULL,
                'oleoproc_ppo' => $select->oleoproc_ppo ?? NULL,
                'oleoproc_ppko' => $select->oleoproc_ppko ?? NULL,
                'ffb_millno' => $select->ffb_millno ?? NULL,
                'pk_crsno' => $select->pk_crsno ?? NULL,
                'ref_no' => $select->ref_no ?? NULL,
                'oleo_no' => $select->oleo_no ?? NULL,
                'mill_actualmillhrs' => $select->mill_actualmillhrs ?? NULL,
            ]);
        }
    }

    public function prodsemsia()
    {
        $delete = DB::delete("DELETE FROM prodsemsia");

        $selects = DB::connection('mysql2')->select("SELECT * FROM prodsemsia");

        foreach ($selects as $key => $select) {

            $insert = Prodsemsia::create([
                'prodsemsia_id' => $select->prodsemsia_id ?? NULL,
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'mill_millhrs' => $select->mill_millhrs ?? NULL,
                'ffb_millcapacity' => $select->ffb_millcapacity ?? NULL,
                'mill_utilrate' => $select->mill_utilrate ?? NULL,
                'crusher_crshrs' => $select->crusher_crshrs ?? NULL,
                'pk_crscapacity' => $select->pk_crscapacity ?? NULL,
                'crusher_utilrate' => $select->crusher_utilrate ?? NULL,
                'refcap' => $select->refcap ?? NULL,
                'refutilrate' => $select->refutilrate ?? NULL,
                'oleocap' => $select->oleocap ?? NULL,
                'oleoutilrate' => $select->oleoutilrate ?? NULL,
            ]);
        }
    }

    public function prodss()
    {
        $delete = DB::delete("DELETE FROM prodss");

        $selects = DB::connection('mysql2')->select("SELECT * FROM prodss");

        foreach ($selects as $key => $select) {

            $insert = Prodss::create([
                'prodss_id' => $select->prodss_id ?? NULL,
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'mill_millhrs' => $select->mill_millhrs ?? NULL,
                'ffb_millcapacity' => $select->ffb_millcapacity ?? NULL,
                'mill_utilrate' => $select->mill_utilrate ?? NULL,
                'crusher_crshrs' => $select->crusher_crshrs ?? NULL,
                'pk_crscapacity' => $select->pk_crscapacity ?? NULL,
                'crusher_utilrate' => $select->crusher_utilrate ?? NULL,
                'refcap' => $select->refcap ?? NULL,
                'refutilrate' => $select->refutilrate ?? NULL,
                'oleocap' => $select->oleocap ?? NULL,
                'oleoutilrate' => $select->oleoutilrate ?? NULL,
            ]);
        }
    }

    public function produk()
    {
        $delete = DB::delete("DELETE FROM produk");

        $selects = DB::connection('mysql2')->select("SELECT * FROM produk");

        foreach ($selects as $key => $select) {

            $insert = Produk::create([
                'prodid' => $select->prodid ?? NULL,
                'prodname' => $select->prodname ?? NULL,
                'prodcat' => $select->prodcat ?? NULL,
                'proddesc' => $select->proddesc ?? NULL,
                'prodtariff1' => $select->prodtariff1 ?? NULL,
                'prodtariff2' => $select->prodtariff2 ?? NULL,
                'prodtariff3' => $select->prodtariff3 ?? NULL,
                'sub_group' => $select->sub_group ?? NULL,
                'sub_group_rspo' => $select->sub_group_rspo ?? NULL,
                'sub_group_mspo' => $select->sub_group_mspo ?? NULL,
            ]);
        }
    }

    public function produk_category()
    {
        $delete = DB::delete("DELETE FROM produk_category");

        $selects = DB::connection('mysql2')->select("SELECT * FROM produk_category");

        foreach ($selects as $key => $select) {

            $insert = ProdukCategory::create([
                'prodcat' => $select->prodcat ?? NULL,
                'prodcat_name' => $select->prodcat_name ?? NULL,
            ]);
        }
    }

    public function produk_group()
    {
        $delete = DB::delete("DELETE FROM produk_group");

        $selects = DB::connection('mysql2')->select("SELECT * FROM produk_group");

        foreach ($selects as $key => $select) {

            $insert = ProdukGroup::create([
                'ProductGroup' => $select->ProductGroup ?? NULL,
                'ProductGroupName' => $select->ProductGroupName ?? NULL,
            ]);
        }
    }

    public function produk_ingredient()
    {
        $delete = DB::delete("DELETE FROM produk_ingredient");

        $selects = DB::connection('mysql2')->select("SELECT * FROM produk_ingredient");

        foreach ($selects as $key => $select) {

            $insert = ProdukIngredient::create([
                'ProductIngredient' => $select->ProductIngredient ?? NULL,
                'ProductIngredientName' => $select->ProductIngredientName ?? NULL,
            ]);
        }
    }

    public function produk_subgroup()
    {
        $delete = DB::delete("DELETE FROM produk_subgroup");

        $selects = DB::connection('mysql2')->select("SELECT * FROM produk_subgroup");

        foreach ($selects as $key => $select) {

            $insert = ProdukSubgroup::create([
                'kod_subgroup' => $select->kod_subgroup ?? NULL,
                'nama_subgroup' => $select->nama_subgroup ?? NULL,
            ]);
        }
    }

    public function region()
    {
        $delete = DB::delete("DELETE FROM region");

        $selects = DB::connection('mysql2')->select("SELECT * FROM region");

        foreach ($selects as $key => $select) {

            $insert = Region::create([
                'kod_region' => $select->kod_region ?? NULL,
                'nama_region' => $select->nama_region ?? NULL,
            ]);
        }
    }

    public function reg_pelesen()
    {
        $delete = DB::delete("DELETE FROM reg_pelesen");

        $selects = DB::connection('mysql2')->select("SELECT * FROM reg_pelesen");

        foreach ($selects as $key => $select) {

            $insert = RegPelesen::create([
                'e_id' => $select->e_id ?? NULL,
                'e_nl' => $select->e_nl ?? NULL,
                'e_kat' => $select->e_kat ?? NULL,
                'e_pwd' => $select->e_pwd ?? NULL,
                'kodpgw' => $select->kodpgw ?? NULL,
                'nosiri' => $select->nosiri ?? NULL,
                'e_status' => $select->e_status ?? NULL,
                'e_stock' => $select->e_stock ?? NULL,
                'directory' => $select->directory ?? NULL,

            ]);
        }
    }

    public function reg_pelesen_stock()
    {
        $delete = DB::delete("DELETE FROM reg_pelesen_stock");

        $selects = DB::connection('mysql2')->select("SELECT * FROM reg_pelesen_stock");

        foreach ($selects as $key => $select) {

            $insert = RegPelesenStock::create([
                'e_id' => $select->e_id ?? NULL,
                'e_nl' => $select->e_nl ?? NULL,
                'e_kat' => $select->e_kat ?? NULL,
                'e_pwd' => $select->e_pwd ?? NULL,
                'kodpgw' => $select->kodpgw ?? NULL,
                'nosiri' => $select->nosiri ?? NULL,
                'e_status' => $select->e_status ?? NULL,
                'e_stock' => $select->e_stock ?? NULL,

            ]);
        }
    }

    public function reg_user()
    {
        $delete = DB::delete("DELETE FROM reg_user");

        $selects = DB::connection('mysql2')->select("SELECT * FROM reg_user");

        foreach ($selects as $key => $select) {

            $insert = RegUser::create([
                'e_userid' => $select->e_userid ?? NULL,
                'e_kat' => $select->e_kat ?? NULL,
                'e_pwd' => $select->e_pwd ?? NULL,
                'e_priv' => $select->e_priv ?? NULL,

            ]);
        }
    }

    public function sc_log()
    {
        $delete = DB::delete("DELETE FROM sc_log");

        $selects = DB::connection('mysql2')->select("SELECT * FROM sc_log");

        foreach ($selects as $key => $select) {

            $insert = ScLog::create([
                'id' => $select->id ?? NULL,
                'inserted_date' => $select->inserted_date ?? NULL,
                'username' => $select->username ?? NULL,
                'application' => $select->application ?? NULL,
                'creator' => $select->creator ?? NULL,
                'ip_user' => $select->ip_user ?? NULL,
                'action' => $select->action ?? NULL,
                'description' => $select->description ?? NULL,

            ]);
        }
    }

    public function state()
    {
        $delete = DB::delete("DELETE FROM state");

        $selects = DB::connection('mysql2')->select("SELECT * FROM state");

        foreach ($selects as $key => $select) {

            $insert = State::create([
                'kod_negeri' => $select->kod_negeri ?? NULL,
                'nama_negeri' => $select->nama_negeri ?? NULL,
                'kod_region' => $select->kod_region ?? NULL,
                'nama_region' => $select->nama_region ?? NULL,
                'nama_kumpulan' => $select->nama_kumpulan ?? NULL,

            ]);
        }
    }

    public function stat_user()
    {
        $delete = DB::delete("DELETE FROM stat_user");

        $selects = DB::connection('mysql2')->select("SELECT * FROM stat_user");

        foreach ($selects as $key => $select) {

            $insert = StatUser::create([
                'userid' => $select->userid ?? NULL,
                'userpwd' => $select->userpwd ?? NULL,
                'user_kat' => $select->user_kat ?? NULL,
                'user_priv' => $select->user_priv ?? NULL,
                'user_name' => $select->user_name ?? NULL,


            ]);
        }
    }

    public function stknegeri()
    {
        $delete = DB::delete("DELETE FROM stknegeri");

        $selects = DB::connection('mysql2')->select("SELECT * FROM stknegeri");

        foreach ($selects as $key => $select) {

            $insert = StkNegeri::create([
                'stknegeri_id' => $select->stknegeri_id ?? NULL,
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'negeri' => $select->negeri ?? NULL,
                'millstk_cpo' => $select->millstk_cpo ?? NULL,
                'millstk_pk' => $select->millstk_pk ?? NULL,
                'crsstk_cpko' => $select->crsstk_cpko ?? NULL,
                'crsstk_pk' => $select->crsstk_pk ?? NULL,
                'crsstk_pkc' => $select->crsstk_pkc ?? NULL,
                'refstk_cps' => $select->refstk_cps ?? NULL,
                'refstk_cpl' => $select->refstk_cpl ?? NULL,
                'refstk_rbdpo' => $select->refstk_rbdpo ?? NULL,
                'refstk_rbdpl' => $select->refstk_rbdpl ?? NULL,
                'refstk_rbdps' => $select->refstk_rbdps ?? NULL,
                'refstk_pfad' => $select->refstk_pfad ?? NULL,
                'refstk_co' => $select->refstk_co ?? NULL,
                'refstk_cpo' => $select->refstk_cpo ?? NULL,
                'refstk_ppo' => $select->refstk_ppo ?? NULL,
                'refstk_cpko' => $select->refstk_cpko ?? NULL,
                'refstk_ppko' => $select->refstk_ppko ?? NULL,
                'refstk_mar' => $select->refstk_mar ?? NULL,
                'refstk_ghee' => $select->refstk_ghee ?? NULL,
                'refstk_fat' => $select->refstk_fat ?? NULL,
                'refstk_short' => $select->refstk_short ?? NULL,
                'refstk_coco' => $select->refstk_coco ?? NULL,
                'refstk_soap' => $select->refstk_soap ?? NULL,
                'refstk_redol' => $select->refstk_redol ?? NULL,
                'refstk_pry' => $select->refstk_pry ?? NULL,
                'refstk_blend' => $select->refstk_blend ?? NULL,
                'refstk_otheredb' => $select->refstk_otheredb ?? NULL,
                'refstk_othernot' => $select->refstk_othernot ?? NULL,
                'oleostk_cps' => $select->oleostk_cps ?? NULL,
                'oleostk_cpl' => $select->oleostk_cpl ?? NULL,
                'oleostk_rbdpo' => $select->oleostk_rbdpo ?? NULL,
                'oleostk_rbdpl' => $select->oleostk_rbdpl ?? NULL,
                'oleostk_rbdps' => $select->oleostk_rbdps ?? NULL,
                'oleostk_pfad' => $select->oleostk_pfad ?? NULL,
                'oleostk_cpo' => $select->oleostk_cpo ?? NULL,
                'oleostk_ppo' => $select->oleostk_ppo ?? NULL,
                'oleostk_cpko' => $select->oleostk_cpko ?? NULL,
                'oleostk_ppko' => $select->oleostk_ppko ?? NULL,
                'bulkstk_cpo' => $select->bulkstk_cpo ?? NULL,
                'bulkstk_ppo' => $select->bulkstk_ppo ?? NULL,
                'bulkstk_cpko' => $select->bulkstk_cpko ?? NULL,
                'bulkstk_ppko' => $select->bulkstk_ppko ?? NULL,
                'stk_cpo' => $select->stk_cpo ?? NULL,
                'stk_ppo' => $select->stk_ppo ?? NULL,
                'stk_cpko' => $select->stk_cpko ?? NULL,
                'stk_ppko' => $select->stk_ppko ?? NULL,
                'stk_pk' => $select->stk_pk ?? NULL,
                'stk_pkc' => $select->stk_pkc ?? NULL,
                'biostk_rbdpo' => $select->biostk_rbdpo ?? NULL,
                'biostk_rbdpl' => $select->biostk_rbdpl ?? NULL,
                'biostk_rbdps' => $select->biostk_rbdps ?? NULL,
                'biostk_pfad' => $select->biostk_pfad ?? NULL,
                'bulkstk_rbdpo' => $select->bulkstk_rbdpo ?? NULL,
                'bulkstk_rbdpl' => $select->bulkstk_rbdpl ?? NULL,
                'bulkstk_rbdps' => $select->bulkstk_rbdps ?? NULL,
                'bulkstk_pfad' => $select->bulkstk_pfad ?? NULL,
                'refstk_rbdpko' => $select->refstk_rbdpko ?? NULL,
                'refstk_rbdpkl' => $select->refstk_rbdpkl ?? NULL,
                'refstk_rbdpks' => $select->refstk_rbdpks ?? NULL,
                'refstk_pkfad' => $select->refstk_pkfad ?? NULL,
                'biostk_rbdpko' => $select->biostk_rbdpko ?? NULL,
                'biostk_rbdpkl' => $select->biostk_rbdpkl ?? NULL,
                'biostk_rbdpks' => $select->biostk_rbdpks ?? NULL,
                'biostk_pkfad' => $select->biostk_pkfad ?? NULL,
                'bulkstk_rbdpko' => $select->bulkstk_rbdpko ?? NULL,
                'bulkstk_rbdpkl' => $select->bulkstk_rbdpkl ?? NULL,
                'bulkstk_rbdpks' => $select->bulkstk_rbdpks ?? NULL,
                'bulkstk_pkfad' => $select->bulkstk_pkfad ?? NULL,
                'oleostk_rbdpko' => $select->oleostk_rbdpko ?? NULL,
                'oleostk_rbdpkl' => $select->oleostk_rbdpkl ?? NULL,
                'oleostk_rbdpks' => $select->oleostk_rbdpks ?? NULL,
                'oleostk_pkfad' => $select->oleostk_pkfad ?? NULL,


            ]);
        }
    }

    public function user_batch()
    {
        $delete = DB::delete("DELETE FROM user_batch");

        $selects = DB::connection('mysql2')->select("SELECT * FROM user_batch");

        foreach ($selects as $key => $select) {

            $insert = UserBatch::create([
                'userid' => $select->userid ?? NULL,
                'tahun' => $select->tahun ?? NULL,
                'bulan' => $select->bulan ?? NULL,
                'bil' => $select->bil ?? NULL,


            ]);
        }
    }

    public function web_audit()
    {
        $delete = DB::delete("DELETE FROM web_audit");

        $selects = DB::connection('mysql2')->select("SELECT * FROM web_audit");

        foreach ($selects as $key => $select) {

            $insert = WebAudit::create([
                'year_access' => $select->year_access ?? NULL,
                'month_access' => $select->month_access ?? NULL,
                'no_report' => $select->no_report ?? NULL,
                'userid' => $select->userid ?? NULL,
                'access' => $select->access ?? NULL,


            ]);
        }
    }

}
