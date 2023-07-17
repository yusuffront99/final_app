<?php

use App\Http\Controllers\Admin\AboutEquipmentController;
use App\Http\Controllers\Admin\CRUD\CrudBurner;
use App\Http\Controllers\Admin\CRUD\CrudCoboiler;
use App\Http\Controllers\Admin\CRUD\CrudCocommon;
use App\Http\Controllers\Admin\CRUD\CrudCoturbine;
use App\Http\Controllers\Admin\CRUD\CrudEdg;
use App\Http\Controllers\Admin\CRUD\CrudFwPump;
use App\Http\Controllers\Admin\CRUD\CrudHpPump;
use App\Http\Controllers\Admin\CRUD\CrudHsdLevel;
use App\Http\Controllers\Admin\CRUD\CrudLeader;
use App\Http\Controllers\Admin\CRUD\CrudMaintenanceController;
use App\Http\Controllers\Admin\CRUD\CrudSootblower;
use App\Http\Controllers\Admin\CRUD\CrudUser;
use App\Http\Controllers\Admin\CRUD\Maintenance\BurnerController;
use App\Http\Controllers\Admin\CRUD\Maintenance\MainCOBoilerContoller;
use App\Http\Controllers\Admin\CRUD\Maintenance\MainCOCommonContoller;
use App\Http\Controllers\Admin\CRUD\Maintenance\MainCOTurbineContoller;
use App\Http\Controllers\Admin\CRUD\Maintenance\MainEDGContoller;
use App\Http\Controllers\Admin\CRUD\Maintenance\MainFWPumpContoller;
use App\Http\Controllers\Admin\CRUD\Maintenance\MainHPPumpContoller;
use App\Http\Controllers\Admin\CRUD\Maintenance\MainHSDLevelContoller;
use App\Http\Controllers\Admin\CRUD\Maintenance\MainSootblowerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TaskScheduleController as AdminTaskScheduleController;
use App\Http\Controllers\Auth\NewRegisterController;
use App\Http\Controllers\EDGSystem\EDGSystemController;
use App\Http\Controllers\Supervisor\Laporan\LaporanMasuk;
use App\Http\Controllers\Supervisor\SupervisorOpController;
use App\Http\Controllers\Supervisor\SupervisorHarController;
use App\Http\Controllers\BurnerSystem\BurnerSystemController;
use App\Http\Controllers\ChangeOver\COBoilerController;
use App\Http\Controllers\ChangeOver\COCommonController;
use App\Http\Controllers\ChangeOver\COTurbineController;
use App\Http\Controllers\LFOSystem\FWPumpController;
use App\Http\Controllers\LFOSystem\HPPumpController;
use App\Http\Controllers\LFOSystem\HSDLevelController;
use App\Http\Controllers\Print\Admin\LaporanDataController;
use App\Http\Controllers\Profile\AuthController;
use App\Http\Controllers\Report\Alls\AllDataController;
use App\Http\Controllers\Sootblower\SootblowerController;
use App\Http\Controllers\UnitInformationController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::prefix('/home')
    ->middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/unit_information', [UnitInformationController::class, 'unit_information'])->name('unit-information');
    Route::get('/unit_information/equipment/{id}', [UnitInformationController::class, 'detail_about_equipment'])->name('detail-about-equipment');

    // Route::get('/events', [EventController::class, 'index'])->name('event.index');
    // ===== PROFILE
    Route::resource('profile', AuthController::class);


    // Route::post('profile_img', [ProfileController::class, 'store'])->name('store-img');
    // Route::get('profile_img/{id}/edit', [ProfileController::class, 'edit'])->name('edit-img');
    // Route::put('profile_img/{id}', [ProfileController::class, 'update'])->name('update-img');
    // ===== PROFILE
    // *** CHART FILTER
    Route::get('home/lfo_system/hsd_level/chart', [HSDLevelController::class, 'showChart'])->name('show.chart');
    // *** CHART FILTER
    // ================================================================================================================= SUPERVISOR OPERASI
    // ==== SUPERVISOR MENU BURNER
    Route::middleware('isSpvOp')->group(function(){
        Route::get('inbox/burner', [LaporanMasuk::class, 'lmasuk_op_burner'])->name('lmasuk.op.burner');
        Route::get('inbox/burner/{id}/edit', [SupervisorOpController::class, 'burner_validation'])->name('op.burner_validation');
        Route::put('inbox/burner/{id}', [SupervisorOpController::class, 'burner_updated'])->name('op.burner_updated');
        Route::get('inbox/burner/data', [SupervisorOpController::class, 'all_burner_validation'])->name('op.all_burner_validation');

        Route::get('inbox/burner/data_shift', [SupervisorOpController::class, 'burner_data_shift'])->name('op.burner_data_shift');

        // ==== SUPERVISOR MENU SBL
        Route::get('inbox/sootblower', [LaporanMasuk::class, 'lmasuk_op_sootblower'])->name('lmasuk.op.sootblower');
        Route::get('inbox/sootblower/{id}/edit', [SupervisorOpController::class, 'sootblower_validation'])->name('op.sootblower_validation');
        Route::put('inbox/sootblower/{id}', [SupervisorOpController::class, 'sootblower_updated'])->name('op.sootblower_updated');
        Route::get('inbox/sootblower/data', [SupervisorOpController::class, 'all_sootblower_validation'])->name('op.all_sootblower_validation');

        Route::get('inbox/sootblower/data_shift', [SupervisorOpController::class, 'sootblower_data_shift'])->name('op.sootblower_data_shift');

        // ==== SUPERVISOR MENU EDG
        Route::get('inbox/edg', [LaporanMasuk::class, 'lmasuk_op_edg'])->name('lmasuk.op.edg');
        Route::get('inbox/edg/{id}/edit', [SupervisorOpController::class, 'edg_validation'])->name('op.edg_validation');
        Route::put('inbox/edg/{id}', [SupervisorOpController::class, 'edg_updated'])->name('op.edg_updated');
        Route::get('inbox/edg/data', [SupervisorOpController::class, 'all_edg_validation'])->name('op.all_edg_validation');

        Route::get('inbox/edg/data_shift', [SupervisorOpController::class, 'edg_data_shift'])->name('op.edg_data_shift');

        // ===== SUPERVISOR MENU CO TURBINE
        Route::get('inbox/co_turbine', [LaporanMasuk::class, 'lmasuk_op_coturbine'])->name('lmasuk.op.coturbine');
        Route::get('inbox/co_turbine/{id}/edit', [SupervisorOpController::class, 'coturbine_validation'])->name('op.coturbine_validation');
        Route::put('inbox/co_turbine/{id}', [SupervisorOpController::class, 'coturbine_updated'])->name('op.coturbine_updated');
        Route::get('inbox/co_turbine/data', [SupervisorOpController::class, 'all_coturbine_validation'])->name('op.all_coturbine_validation');

        Route::get('inbox/co_turbine/data_shift', [SupervisorOpController::class, 'coturbine_data_shift'])->name('op.coturbine_data_shift');

        // ===== SUPERVISOR MENU CO BOILER
        Route::get('inbox/co_boiler', [LaporanMasuk::class, 'lmasuk_op_coboiler'])->name('lmasuk.op.coboiler');
        Route::get('inbox/co_boiler/{id}/edit', [SupervisorOpController::class, 'coboiler_validation'])->name('op.coboiler_validation');
        Route::put('inbox/co_boiler/{id}', [SupervisorOpController::class, 'coboiler_updated'])->name('op.coboiler_updated');
        Route::get('inbox/co_boiler/data', [SupervisorOpController::class, 'all_coboiler_validation'])->name('op.all_coboiler_validation');

        Route::get('inbox/co_boiler/data_shift', [SupervisorOpController::class, 'coboiler_data_shift'])->name('op.coboiler_data_shift');

        // ===== SUPERVISOR MENU CO COMMON
        Route::get('inbox/co_common', [LaporanMasuk::class, 'lmasuk_op_cocommon'])->name('lmasuk.op.cocommon');
        Route::get('inbox/co_common/{id}/edit', [SupervisorOpController::class, 'cocommon_validation'])->name('op.cocommon_validation');
        Route::put('inbox/co_common/{id}', [SupervisorOpController::class, 'cocommon_updated'])->name('op.cocommon_updated');
        Route::get('inbox/co_common/data', [SupervisorOpController::class, 'all_cocommon_validation'])->name('op.all_cocommon_validation');

        Route::get('inbox/co_common/data_shift', [SupervisorOpController::class, 'cocommon_data_shift'])->name('op.cocommon_data_shift');
        

        // *********** NEW MENU

        // ===== SUPERVISOR MENU CO FW Pump
        Route::get('inbox/fw_pump', [LaporanMasuk::class, 'lmasuk_op_fwpump'])->name('lmasuk.op.fwpump');
        Route::get('inbox/fw_pump/{id}/edit', [SupervisorOpController::class, 'fwpump_validation'])->name('op.fwpump_validation');
        Route::put('inbox/fw_pump/{id}', [SupervisorOpController::class, 'fwpump_updated'])->name('op.fwpump_updated');
        Route::get('inbox/fw_pump/data', [SupervisorOpController::class, 'all_fwpump_validation'])->name('op.all_fwpump_validation');

        Route::get('inbox/fw_pump/data_shift', [SupervisorOpController::class, 'fwpump_data_shift'])->name('op.fwpump_data_shift');

        // ===== SUPERVISOR MENU HP Pump
        Route::get('inbox/hp_pump', [LaporanMasuk::class, 'lmasuk_op_hppump'])->name('lmasuk.op.hppump');
        Route::get('inbox/hp_pump/{id}/edit', [SupervisorOpController::class, 'hppump_validation'])->name('op.hppump_validation');
        Route::put('inbox/hp_pump/{id}', [SupervisorOpController::class, 'hppump_updated'])->name('op.hppump_updated');
        Route::get('inbox/hp_pump/data', [SupervisorOpController::class, 'all_hppump_validation'])->name('op.all_hppump_validation');

        Route::get('inbox/hp_pump/data_shift', [SupervisorOpController::class, 'hppump_data_shift'])->name('op.hppump_data_shift');

        // ===== SUPERVISOR MENU HSD Level
        Route::get('inbox/hsd_level', [LaporanMasuk::class, 'lmasuk_op_hsdlevel'])->name('lmasuk.op.hsdlevel');
        Route::get('inbox/hsd_level/{id}/edit', [SupervisorOpController::class, 'hsdlevel_validation'])->name('op.hsdlevel_validation');
        Route::put('inbox/hsd_level/{id}', [SupervisorOpController::class, 'hsdlevel_updated'])->name('op.hsdlevel_updated');
        Route::get('inbox/hsd_level/data', [SupervisorOpController::class, 'all_hsdlevel_validation'])->name('op.all_hsdlevel_validation');

        Route::get('inbox/hsd_level/data_shift', [SupervisorOpController::class, 'hsdlevel_data_shift'])->name('op.hsdlevel_data_shift');

    });

    // ========================================================================================================= SUPERVISOR OPERASI
    
    // ========================================================================================================= SUPERVISOR PEMELIHARAAN
    Route::middleware('isSpvHar')->group(function(){
        Route::get('inbox', [SupervisorHarController::class, 'index'])->name('lmasuk.har');

        // ===== BURNER
        Route::get('inbox/har_burner', [LaporanMasuk::class, 'lmasuk_har_burner'])->name('lmasuk.har.burner');
        Route::get('inbox/har_burner/{id}/edit', [SupervisorHarController::class, 'burner_validation'])->name('har.burner_validation');
        Route::put('inbox/har_burner/{id}', [SupervisorHarController::class, 'burner_updated'])->name('har.burner_updated');
        Route::get('inbox/har_burner/data', [SupervisorHarController::class, 'all_burner_validation'])->name('har.all_burner_validation');

        // ===== SOOTBLOWER
        Route::get('inbox/har_sootblower', [LaporanMasuk::class, 'lmasuk_har_sootblower'])->name('lmasuk.har.sootblower');
        Route::get('inbox/har_sootblower/{id}/edit', [SupervisorHarController::class, 'sootblower_validation'])->name('har.sootblower_validation');
        Route::put('inbox/har_sootblower/{id}', [SupervisorHarController::class, 'sootblower_updated'])->name('har.sootblower_updated');
        Route::get('inbox/har_sootblower/data', [SupervisorHarController::class, 'all_sootblower_validation'])->name('har.all_sootblower_validation');

        // ===== EDG
        Route::get('inbox/har_edg', [LaporanMasuk::class, 'lmasuk_har_edg'])->name('lmasuk.har.edg');
        Route::get('inbox/har_edg/{id}/edit', [SupervisorharController::class, 'edg_validation'])->name('har.edg_validation');
        Route::put('inbox/har_edg/{id}', [SupervisorHarController::class, 'edg_updated'])->name('har.edg_updated');
        Route::get('inbox/har_edg/data', [SupervisorHarController::class, 'all_edg_validation'])->name('har.all_edg_validation');

        // ===== EDG
        Route::get('inbox/har_coturbine', [LaporanMasuk::class, 'lmasuk_har_coturbine'])->name('lmasuk.har.coturbine');
        Route::get('inbox/har_coturbine/{id}/edit', [SupervisorharController::class, 'coturbine_validation'])->name('har.coturbine_validation');
        Route::put('inbox/har_coturbine/{id}', [SupervisorHarController::class, 'coturbine_updated'])->name('har.coturbine_updated');
        Route::get('inbox/har_coturbine/data', [SupervisorHarController::class, 'all_coturbine_validation'])->name('har.all_coturbine_validation');

        // ===== EDG
        Route::get('inbox/har_coboiler', [LaporanMasuk::class, 'lmasuk_har_coboiler'])->name('lmasuk.har.coboiler');
        Route::get('inbox/har_coboiler/{id}/edit', [SupervisorharController::class, 'coboiler_validation'])->name('har.coboiler_validation');
        Route::put('inbox/har_coboiler/{id}', [SupervisorHarController::class, 'coboiler_updated'])->name('har.coboiler_updated');
        Route::get('inbox/har_coboiler/data', [SupervisorHarController::class, 'all_coboiler_validation'])->name('har.all_coboiler_validation');
        // ===== EDG
        Route::get('inbox/har_cocommon', [LaporanMasuk::class, 'lmasuk_har_cocommon'])->name('lmasuk.har.cocommon');
        Route::get('inbox/har_cocommon/{id}/edit', [SupervisorharController::class, 'cocommon_validation'])->name('har.cocommon_validation');
        Route::put('inbox/har_cocommon/{id}', [SupervisorHarController::class, 'cocommon_updated'])->name('har.cocommon_updated');
        Route::get('inbox/har_cocommon/data', [SupervisorHarController::class, 'all_cocommon_validation'])->name('har.all_cocommon_validation');

        // **** NEW MENU
        // ===== HSD LEVEL
        Route::get('inbox/har_hsdlevel', [LaporanMasuk::class, 'lmasuk_har_hsdlevel'])->name('lmasuk.har.hsdlevel');
        Route::get('inbox/har_hsdlevel/{id}/edit', [SupervisorHarController::class, 'hsdlevel_validation'])->name('har.hsdlevel_validation');
        Route::put('inbox/har_hsdlevel/{id}', [SupervisorHarController::class, 'hsdlevel_updated'])->name('har.hsdlevel_updated');
        Route::get('inbox/har_hsdlevel/data', [SupervisorHarController::class, 'all_hsdlevel_validation'])->name('har.all_hsdlevel_validation');
        
        // ===== LFO SYSTEM FW PUMP
        Route::get('inbox/har_fwpump', [LaporanMasuk::class, 'lmasuk_har_fwpump'])->name('lmasuk.har.fwpump');
        Route::get('inbox/har_fwpump/{id}/edit', [SupervisorHarController::class, 'fwpump_validation'])->name('har.fwpump_validation');
        Route::put('inbox/har_fwpump/{id}', [SupervisorHarController::class, 'fwpump_updated'])->name('har.fwpump_updated');
        Route::get('inbox/har_fwpump/data', [SupervisorHarController::class, 'all_fwpump_validation'])->name('har.all_fwpump_validation');

        // ===== LFO SYSTEM HP PUMP
        Route::get('inbox/har_hppump', [LaporanMasuk::class, 'lmasuk_har_hppump'])->name('lmasuk.har.hppump');
        Route::get('inbox/har_hppump/{id}/edit', [SupervisorHarController::class, 'hppump_validation'])->name('har.hppump_validation');
        Route::put('inbox/har_hppump/{id}', [SupervisorHarController::class, 'hppump_updated'])->name('har.hppump_updated');
        Route::get('inbox/har_hppump/data', [SupervisorHarController::class, 'all_hppump_validation'])->name('har.all_hppump_validation');

        // ===== DATA LAPORAN
        Route::get('inboxta', [AllDataController::class, 'laporan_data'])->name('laporan.data');
        Route::get('inboxta/burner', [AllDataController::class, 'all_data_burner'])->name('laporan.all_data_burner');
        Route::get('inboxta/edg', [AllDataController::class, 'all_data_edg'])->name('laporan.all_data_edg');
    });

    // ========================================================================================================= SUPERVISOR PEMELIHARAAN

    //===== BURNER SYSTEM
    Route::middleware('isOperatorBoiler')->group(function(){
        Route::get('burner_system', [BurnerSystemController::class, 'index'])->name('burner_system.index');
        Route::get('burner_system/create', [BurnerSystemController::class, 'create'])->name('burner_system.create');
        Route::post('burner_system/', [BurnerSystemController::class, 'store'])->name('burner_system.store');
        Route::put('burner_system/{id}', [BurnerSystemController::class, 'update'])->name('burner_system.update');
        Route::get('burner_system/{id}/edit', [BurnerSystemController::class, 'edit'])->name('burner_system.edit');
        Route::get('burner_system/data', [BurnerSystemController::class, 'shift_data_burner'])->name('burner_system.shift_data_burner');
        Route::get('burner_system/data/print', [BurnerSystemController::class, 'print'])->name('burner_system.print');
        Route::get('burner_system/all_burner', [BurnerSystemController::class, 'all_view_burner'])->name('all_view_burner');
        Route::get('burner_system/one_print/{id}', [BurnerSystemController::class, 'one_print'])->name('one_print_burner');

        // ==== SOOTBLOWERS SYSTEM
        Route::get('sbl_system', [SootblowerController::class, 'index'])->name('sbl_system.index');
        Route::get('sbl_system/create', [SootblowerController::class, 'create'])->name('sbl_system.create');
        Route::post('sbl_system/', [SootblowerController::class, 'store'])->name('sbl_system.store');
        Route::put('sbl_system/{id}', [SootblowerController::class, 'update'])->name('sbl_system.update');
        Route::get('sbl_system/{id}/edit', [SootblowerController::class, 'edit'])->name('sbl_system.edit');
        Route::get('sbl_system/data', [SootblowerController::class, 'shift_data_sootblower'])->name('sbl_system.shift_data_sootblower');
        Route::get('sbl_system/data/print', [SootblowerController::class, 'print'])->name('sbl_system.print');
        Route::get('sbl_system/all_sootblower', [SootblowerController::class, 'all_view_sootblower'])->name('all_view_sootblower');
        Route::get('sbl_system/one_print/{id}', [SootblowerController::class, 'one_print'])->name('one_print_sootblower');

         // ==== FORWARDING PUMP
        Route::get('lfo_system/fw_pump', [FWPumpController::class, 'index'])->name('fw_pump.index');
        Route::get('lfo_system/fw_pump/create', [FWPumpController::class, 'create'])->name('fw_pump.create');
        Route::post('lfo_system/fw_pump/', [FWPumpController::class, 'store'])->name('fw_pump.store');
        Route::put('lfo_system/fw_pump/{id}', [FWPumpController::class, 'update'])->name('fw_pump.update');
        Route::get('lfo_system/fw_pump/{id}/edit', [FWPumpController::class, 'edit'])->name('fw_pump.edit');
        Route::get('lfo_system/fw_pump/data', [FWPumpController::class, 'shift_data_lfo'])->name('fw_pump.shift_data_lfo');
        Route::get('lfo_system/fw_pump/data/print', [FWPumpController::class, 'print'])->name('fw_pump.print');
        Route::get('lfo_system/fw_pump/all_view', [FWPumpController::class, 'all_view_fwpump'])->name('all_view_fwpump');
        Route::get('lfo_system/fw_pump/one_print/{id}', [FWPumpController::class, 'one_print'])->name('one_print_fwpump');

         // ==== HP PUMP
        Route::get('lfo_system/hp_pump', [HPPumpController::class, 'index'])->name('hp_pump.index');
        Route::get('lfo_system/hp_pump/create', [HPPumpController::class, 'create'])->name('hp_pump.create');
        Route::post('lfo_system/hp_pump/', [HPPumpController::class, 'store'])->name('hp_pump.store');
        Route::put('lfo_system/hp_pump/{id}', [HPPumpController::class, 'update'])->name('hp_pump.update');
        Route::get('lfo_system/hp_pump/{id}/edit', [HPPumpController::class, 'edit'])->name('hp_pump.edit');
        Route::get('lfo_system/hp_pump/data', [HPPumpController::class, 'shift_data_lfo'])->name('hp_pump.shift_data_lfo');
        Route::get('lfo_system/hp_pump/data/print', [HPPumpController::class, 'print'])->name('hp_pump.print');
        Route::get('lfo_system/hp_pump/all_view', [HPPumpController::class, 'all_view_hppump'])->name('all_view_hppump');
        Route::get('lfo_system/hp_pump/one_print/{id}', [HPPumpController::class, 'one_print'])->name('one_print_hppump');

         // ==== HSD LEVEL
        Route::get('lfo_system/hsd_level', [HSDLevelController::class, 'index'])->name('hsd_level.index');
        Route::get('lfo_system/hsd_level/create', [HSDLevelController::class, 'create'])->name('hsd_level.create');
        Route::get('lfo_system/hsd_level/chart', [HSDLevelController::class, 'chart'])->name('hsd_level.chart');

        Route::post('lfo_system/hsd_level/', [HSDLevelController::class, 'store'])->name('hsd_level.store');
        Route::put('lfo_system/hsd_level/{id}', [HSDLevelController::class, 'update'])->name('hsd_level.update');
        Route::get('lfo_system/hsd_level/{id}/edit', [HSDLevelController::class, 'edit'])->name('hsd_level.edit');
        Route::get('lfo_system/hsd_level/data', [HSDLevelController::class, 'shift_data_lfo'])->name('hsd_level.shift_data_lfo');
        Route::get('lfo_system/hsd_level/data/print', [HSDLevelController::class, 'print'])->name('hsd_level.print');
        // Route::get('lfo_system/hsd_level/all_view', [HSDLevelController::class, 'all_view_hppump'])->name('all_view_hppump');
        // Route::get('lfo_system/hsd_level/one_print/{id}', [HSDLevelController::class, 'one_print'])->name('one_print_hppump');


        // === CHANGE OVER BOILER
        Route::get('co_boiler', [COBoilerController::class, 'index'])->name('coboiler.index');
        Route::get('co_boiler/create', [COBoilerController::class, 'create'])->name('coboiler.create');
        Route::post('co_boiler/', [COBoilerController::class, 'store'])->name('coboiler.store');
        Route::put('co_boiler/{id}', [COBoilerController::class, 'update'])->name('coboiler.update');
        Route::get('co_boiler/{id}/edit', [COBoilerController::class, 'edit'])->name('coboiler.edit');
        Route::get('co_boiler/data', [COBoilerController::class, 'shift_data_coboiler'])->name('shift_data_coboiler');
        Route::get('co_boiler/all_coboiler', [COBoilerController::class, 'all_view_coboiler'])->name('all_view_coboiler');
        Route::get('co_boiler/data/print', [COBoilerController::class, 'print'])->name('coboiler.print');
        Route::get('co_boiler/one_print/{id}', [COBoilerController::class, 'one_print'])->name('one_print_coboiler');
    });


    Route::middleware('isOperatorTurbine')->group(function(){
        // ==== EDG SYSTEM
        Route::get('edg_system', [EDGSystemController::class, 'index'])->name('edg_system.index');
        Route::get('edg_system/create', [EDGSystemController::class, 'create'])->name('edg_system.create');
        Route::post('edg_system/', [EDGSystemController::class, 'store'])->name('edg_system.store');
        Route::put('edg_system/{id}', [EDGSystemController::class, 'update'])->name('edg_system.update');
        Route::get('edg_system/{id}/edit', [EDGSystemController::class, 'edit'])->name('edg_system.edit');
        Route::get('edg_system/data', [EDGSystemController::class, 'shift_data_edg'])->name('edg_system.shift_data_edg');
        Route::get('edg_system/data/print', [EDGSystemController::class, 'print'])->name('edg_system.print');
        Route::get('edg_system/all_edg', [EDGSystemController::class, 'all_view_edg'])->name('all_view_edg');
        Route::get('edg_system/one_print/{id}', [EDGSystemController::class, 'one_print'])->name('one_print_edg');

        // === CHANGE OVER TURBINE
        Route::get('co_turbine', [COTurbineController::class, 'index'])->name('coturbine.index');
        Route::get('co_turbine/create', [COTurbineController::class, 'create'])->name('coturbine.create');
        Route::post('co_turbine/', [COTurbineController::class, 'store'])->name('coturbine.store');
        Route::put('co_turbine/{id}', [COTurbineController::class, 'update'])->name('coturbine.update');
        Route::get('co_turbine/{id}/edit', [COTurbineController::class, 'edit'])->name('coturbine.edit');
        Route::get('co_turbine/data', [COTurbineController::class, 'shift_data_coturbine'])->name('shift_data_coturbine');
        Route::get('co_turbine/all_coturbine', [COTurbineController::class, 'all_view_coturbine'])->name('all_view_coturbine');
        Route::get('co_turbine/data/print', [COTurbineController::class, 'print'])->name('coturbine.print');
        Route::get('co_turbine/one_print/{id}', [COTurbineController::class, 'one_print'])->name('one_print_coturbine');
        
        // === CHANGE OVER COMMON
        Route::get('co_common', [COCommonController::class, 'index'])->name('cocommon.index');
        Route::get('co_common/create', [COCommonController::class, 'create'])->name('cocommon.create');
        Route::post('co_common/', [COCommonController::class, 'store'])->name('cocommon.store');
        Route::put('co_common/{id}', [COCommonController::class, 'update'])->name('cocommon.update');
        Route::get('co_common/{id}/edit', [COCommonController::class, 'edit'])->name('cocommon.edit');
        Route::get('co_common/data', [COCommonController::class, 'shift_data_cocommon'])->name('shift_data_cocommon');
        Route::get('co_common/all_cocommon', [COCommonController::class, 'all_view_cocommon'])->name('all_view_cocommon');
        Route::get('co_common/data/print', [COCommonController::class, 'print'])->name('cocommon.print');
        Route::get('co_common/one_print/{id}', [COCommonController::class, 'one_print'])->name('one_print_cocommon');
    });


});

// ===== ADMIN ROUTES
Route::prefix('/dashboard')
    ->middleware(['auth', 'isRendalOp'])
    ->group(function(){
        Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    
        // --- DATA LAPORAN BURNER
        // Route::get('data_laporan', [DataLaporanController::class, 'index'])->name('admin.data_laporan');
        Route::get('report/burner/', [CrudBurner::class, 'index'])->name('admin.index.burner');
        Route::get('report/burner/{id}/edit', [CrudBurner::class, 'edit'])->name('admin.edit.burner');
        Route::put('report/burner/{id}', [CrudBurner::class, 'update'])->name('admin.update.burner');
        Route::delete('report/burner/{id}', [CrudBurner::class, 'delete'])->name('admin.delete.burner');
        Route::get('report/burner/trash', [CrudBurner::class, 'trash'])->name('admin.trash.burner');
        Route::get('report/burner/delete_permanent/{id}', [CrudBurner::class, 'delete_permanent'])->name('admin.delete_permanent.burner');
        Route::get('report/burner/restore/{id}', [CrudBurner::class, 'restore'])->name('admin.restore.burner');


        // --- DATA LAPORAN SOOTBLOWER
        Route::get('report/sootblower/', [CrudSootblower::class, 'index'])->name('admin.index.sootblower');
        Route::get('report/sootblower/{id}/edit', [CrudSootblower::class, 'edit'])->name('admin.edit.sootblower');
        Route::put('report/sootblower/{id}', [CrudSootblower::class, 'update'])->name('admin.update.sootblower');
        Route::delete('report/sootblower/{id}', [CrudSootblower::class, 'delete'])->name('admin.delete.sootblower');
        Route::get('report/sootblower/trash', [CrudSootblower::class, 'trash'])->name('admin.trash.sootblower');
        Route::get('report/sootblower/delete_permanent/{id}', [CrudSootblower::class, 'delete_permanent'])->name('admin.delete_permanent.sootblower');
        Route::get('report/sootblower/restore/{id}', [CrudSootblower::class, 'restore'])->name('admin.restore.sootblower');

        // --- DATA LAPORAN EDG
        Route::get('report/edg/', [CrudEdg::class, 'index'])->name('admin.index.edg');
        Route::get('report/edg/{id}/edit', [CrudEdg::class, 'edit'])->name('admin.edit.edg');
        Route::put('report/edg/{id}', [CrudEdg::class, 'update'])->name('admin.update.edg');
        Route::delete('report/edg/{id}', [CrudEdg::class, 'delete'])->name('admin.delete.edg');
        Route::get('report/edg/trash', [CrudEdg::class, 'trash'])->name('admin.trash.edg');
        Route::get('report/edg/delete_permanent/{id}', [CrudEdg::class, 'delete_permanent'])->name('admin.delete_permanent.edg');
        Route::get('report/edg/restore/{id}', [CrudEdg::class, 'restore'])->name('admin.restore.edg');
        
        // --- DATA LAPORAN CO TURBINE
        Route::get('report/coturbine/', [CrudCoturbine::class, 'index'])->name('admin.index.coturbine');
        Route::get('report/coturbine/{id}/edit', [CrudCoturbine::class, 'edit'])->name('admin.edit.coturbine');
        Route::put('report/coturbine/{id}', [CrudCoturbine::class, 'update'])->name('admin.update.coturbine');
        Route::delete('report/coturbine/{id}', [CrudCoturbine::class, 'delete'])->name('admin.delete.coturbine');
        Route::get('report/coturbine/trash', [CrudCoturbine::class, 'trash'])->name('admin.trash.coturbine');
        Route::get('report/coturbine/delete_permanent/{id}', [CrudCoturbine::class, 'delete_permanent'])->name('admin.delete_permanent.coturbine');
        Route::get('report/coturbine/restore/{id}', [CrudCoturbine::class, 'restore'])->name('admin.restore.coturbine');
    
        // --- DATA LAPORAN CO BOILER
        Route::get('report/coboiler/', [CrudCoboiler::class, 'index'])->name('admin.index.coboiler');
        Route::get('report/coboiler/{id}/edit', [CrudCoboiler::class, 'edit'])->name('admin.edit.coboiler');
        Route::put('report/coboiler/{id}', [CrudCoboiler::class, 'update'])->name('admin.update.coboiler');
        Route::delete('report/coboiler/{id}', [CrudCoboiler::class, 'delete'])->name('admin.delete.coboiler');
        Route::get('report/coboiler/trash', [CrudCoboiler::class, 'trash'])->name('admin.trash.coboiler');
        Route::get('report/coboiler/delete_permanent/{id}', [CrudCoboiler::class, 'delete_permanent'])->name('admin.delete_permanent.coboiler');
        Route::get('report/coboiler/restore/{id}', [CrudCoboiler::class, 'restore'])->name('admin.restore.coboiler');
        
        // --- DATA LAPORAN CO COMMON
        Route::get('report/cocommon/', [CrudCocommon::class, 'index'])->name('admin.index.cocommon');
        Route::get('report/cocommon/{id}/edit', [CrudCocommon::class, 'edit'])->name('admin.edit.cocommon');
        Route::put('report/cocommon/{id}', [CrudCocommon::class, 'update'])->name('admin.update.cocommon');
        Route::delete('report/cocommon/{id}', [CrudCocommon::class, 'delete'])->name('admin.delete.cocommon');
        Route::get('report/cocommon/trash', [CrudCocommon::class, 'trash'])->name('admin.trash.cocommon');
        Route::get('report/cocommon/delete_permanent/{id}', [CrudCocommon::class, 'delete_permanent'])->name('admin.delete_permanent.cocommon');
        Route::get('report/cocommon/restore/{id}', [CrudCocommon::class, 'restore'])->name('admin.restore.cocommon');

        // **** NEW MENU
        // --- DATA LAPORAN LFO SYSTEM

        Route::get('report/fwpump/', [CrudFwPump::class, 'index'])->name('admin.index.fwpump');
        Route::get('report/fwpump/{id}/edit', [CrudFwPump::class, 'edit'])->name('admin.edit.fwpump');
        Route::put('report/fwpump/{id}', [CrudFwPump::class, 'update'])->name('admin.update.fwpump');
        Route::delete('report/fwpump/{id}', [CrudFwPump::class, 'delete'])->name('admin.delete.fwpump');
        Route::get('report/fwpump/trash', [CrudFwPump::class, 'trash'])->name('admin.trash.fwpump');
        Route::get('report/fwpump/delete_permanent/{id}', [CrudFwPump::class, 'delete_permanent'])->name('admin.delete_permanent.fwpump');
        Route::get('report/fwpump/restore/{id}', [CrudFwPump::class, 'restore'])->name('admin.restore.fwpump');


        // === HP PUMP
        Route::get('report/hppump/', [CrudHpPump::class, 'index'])->name('admin.index.hppump');
        Route::get('report/hppump/{id}/edit', [CrudHpPump::class, 'edit'])->name('admin.edit.hppump');
        Route::put('report/hppump/{id}', [CrudHpPump::class, 'update'])->name('admin.update.hppump');
        Route::delete('report/hppump/{id}', [CrudHpPump::class, 'delete'])->name('admin.delete.hppump');
        Route::get('report/hppump/trash', [CrudHpPump::class, 'trash'])->name('admin.trash.hppump');
        Route::get('report/hppump/delete_permanent/{id}', [CrudHpPump::class, 'delete_permanent'])->name('admin.delete_permanent.hppump');
        Route::get('report/hppump/restore/{id}', [CrudHpPump::class, 'restore'])->name('admin.restore.hppump');
        
        // === HSD LEVEL
        Route::get('report/hsdlevel/', [CrudHsdLevel::class, 'index'])->name('admin.index.hsdlevel');
        Route::get('report/hsdlevel/{id}/edit', [CrudHsdLevel::class, 'edit'])->name('admin.edit.hsdlevel');
        Route::put('report/hsdlevel/{id}', [CrudHsdLevel::class, 'update'])->name('admin.update.hsdlevel');
        Route::delete('report/hsdlevel/{id}', [CrudHsdLevel::class, 'delete'])->name('admin.delete.hsdlevel');
        Route::get('report/hsdlevel/trash', [CrudHsdLevel::class, 'trash'])->name('admin.trash.hsdlevel');
        Route::get('report/hsdlevel/delete_permanent/{id}', [CrudHsdLevel::class, 'delete_permanent'])->name('admin.delete_permanent.hsdlevel');
        Route::get('report/hsdlevel/restore/{id}', [CrudHsdLevel::class, 'restore'])->name('admin.restore.hsdlevel');

        // **** NEW MENU

        // ==== PRINTS
        Route::get('report/burner/print', [LaporanDataController::class, 'laporan_burner'])->name('print.admin.laporan_burner');
        Route::get('report/sootblower/print', [LaporanDataController::class, 'laporan_sootblower'])->name('print.admin.laporan_sootblower');
        Route::get('report/hsdlevel/print', [LaporanDataController::class, 'laporan_hsdlevel'])->name('print.admin.laporan_hsdlevel');
        Route::get('report/fwpump/print', [LaporanDataController::class, 'laporan_fwpump'])->name('print.admin.laporan_fwpump');
        Route::get('report/hppump/print', [LaporanDataController::class, 'laporan_hppump'])->name('print.admin.laporan_hppump');
        Route::get('report/edg/print', [LaporanDataController::class, 'laporan_edg'])->name('print.admin.laporan_edg');
        Route::get('report/coturbine/print', [LaporanDataController::class, 'laporan_coturbine'])->name('print.admin.laporan_coturbine');
        Route::get('report/coboiler/print', [LaporanDataController::class, 'laporan_coboiler'])->name('print.admin.laporan_coboiler');
        Route::get('report/cocommon/print', [LaporanDataController::class, 'laporan_cocommon'])->name('print.admin.laporan_cocommon');
        Route::get('report/maintenance/print', [LaporanDataController::class, 'laporan_maintenance'])->name('print.admin.laporan_maintenance_history');
        Route::get('report/user/download', [LaporanDataController::class, 'laporan_user'])->name('print.admin.laporan_user');

        // --- DATA LAPORAN USER
        Route::get('employee', [CrudUser::class, 'index'])->name('admin.index.user');
        Route::get('employee/{id}/edit', [CrudUser::class, 'edit'])->name('admin.edit.user'); 
        Route::put('employee/{id}', [CrudUser::class, 'update'])->name('admin.update.user');
        Route::delete('employee/{id}', [CrudUser::class, 'delete'])->name('admin.delete.user');
        Route::get('employee/trash', [CrudUser::class, 'trash'])->name('admin.trash.user');
        Route::get('employee/delete_permanent/{id}', [CrudUser::class, 'delete_permanent'])->name('admin.delete_permanent.user');
        Route::get('employee/restore/{id}', [CrudUser::class, 'restore'])->name('admin.restore.user');

        // --- DATA LAPORAN LEADER
        Route::get('leader', [CrudLeader::class, 'index'])->name('leader.index');
        Route::post('leader', [CrudLeader::class, 'store'])->name('leader.store');
        Route::get('leader/{id}/edit', [CrudLeader::class, 'edit'])->name('leader.edit');
        Route::get('leader/{nip}', [CrudLeader::class, 'chooise'])->name('leader.chooise');
        Route::get('leader/create', [CrudLeader::class, 'create'])->name('leader.create');
        Route::put('leader/{id}', [CrudLeader::class, 'update'])->name('leader.update');
        Route::delete('leader/{id}', [CrudLeader::class, 'destroy'])->name('leader.destroy');

        // --- DATA ABOUT EQUIPMENT
        Route::get('equipment_about', [AboutEquipmentController::class, 'index'])->name('equipment_about.index');
        Route::post('equipment_about', [AboutEquipmentController::class, 'store'])->name('equipment_about.store');
        Route::get('equipment_about/{id}/edit', [AboutEquipmentController::class, 'edit'])->name('equipment_about.edit');
        Route::get('equipment_about/create', [AboutEquipmentController::class, 'create'])->name('equipment_about.create');
        Route::put('equipment_about/{id}', [AboutEquipmentController::class, 'update'])->name('equipment_about.update');
        Route::delete('equipment_about/{id}', [AboutEquipmentController::class, 'destroy'])->name('equipment_about.destroy');

        Route::resource('task_schedule', AdminTaskScheduleController::class);


        // MAINTENANCE MAIN PAGE
        Route::get('maintenance', [CrudMaintenanceController::class, 'index'])->name('maintenance.index');
        Route::get('maintenance/repair_history', [CrudMaintenanceController::class, 'histories'])->name('maintenance.histories');
        Route::delete('maintenance/{id}', [CrudMaintenanceController::class, 'delete'])->name('maintenance.delete');
        Route::get('maintenance/{id}/edit', [CrudMaintenanceController::class, 'edit'])->name('maintenance.edit');
        Route::put('maintenance/{id}', [CrudMaintenanceController::class, 'histories_update'])->name('maintenance.update');
        Route::get('maintenance/delete_permanent/{id}', [CrudMaintenanceController::class, 'delete_permanent'])->name('maintenance.delete_permanent');
        Route::get('maintenance/trash', [CrudMaintenanceController::class, 'trash'])->name('maintenance.trash');
        Route::get('maintenance/restore/{id}', [CrudMaintenanceController::class, 'restore'])->name('maintenance.restore');

        // === MAINTENANCE - BURNER
        Route::get('maintenance/burner/{id}', [BurnerController::class, 'chooise'])->name('maintenance-burner.chooise');
        Route::get('maintenance/burner/{id}/edit', [BurnerController::class, 'create_detail'])->name('maintenance-burner.create_detail');
        Route::post('maintenance/burner/store', [BurnerController::class, 'store'])->name('maintenance-burner.store');
        Route::get('maintenance/burner', [BurnerController::class, 'index_burner'])->name('maintenance-burner.index');

        // === MAINTENANCE - SOOTBLOWER
        Route::get('maintenance/sootblower/{id}', [MainSootblowerController::class, 'chooise'])->name('maintenance-sootblower.chooise');
        Route::get('maintenance/sootblower/{id}/edit', [MainSootblowerController::class, 'create_detail'])->name('maintenance-sootblower.create_detail');
        Route::post('maintenance/sootblower/store', [MainSootblowerController::class, 'store'])->name('maintenance-sootblower.store');
        Route::get('maintenance/sootblower', [MainSootblowerController::class, 'index_sootblower'])->name('maintenance-sootblower.index');
        
        // === MAINTENANCE - EDG
        Route::get('maintenance/edg/{id}', [MainEDGContoller::class, 'chooise'])->name('maintenance-edg.chooise');
        Route::get('maintenance/edg/{id}/edit', [MainEDGContoller::class, 'create_detail'])->name('maintenance-edg.create_detail');
        Route::post('maintenance/edg/store', [MainEDGContoller::class, 'store'])->name('maintenance-edg.store');
        Route::get('maintenance/edg', [MainEDGContoller::class, 'index_edg'])->name('maintenance-edg.index');

        // === MAINTENANCE - HP PUMP
        Route::get('maintenance/hppump/{id}', [MainHPPumpContoller::class, 'chooise'])->name('maintenance-hppump.chooise');
        Route::get('maintenance/hppump/{id}/edit', [MainHPPumpContoller::class, 'create_detail'])->name('maintenance-hppump.create_detail');
        Route::post('maintenance/hppump/store', [MainHPPumpContoller::class, 'store'])->name('maintenance-hppump.store');
        Route::get('maintenance/hppump', [MainHPPumpContoller::class, 'index_hppump'])->name('maintenance-hppump.index');

        // === MAINTENANCE - FW PUMP
        Route::get('maintenance/fwpump/{id}', [MainFWPumpContoller::class, 'chooise'])->name('maintenance-fwpump.chooise');
        Route::get('maintenance/fwpump/{id}/edit', [MainFWPumpContoller::class, 'create_detail'])->name('maintenance-fwpump.create_detail');
        Route::post('maintenance/fwpump/store', [MainFWPumpContoller::class, 'store'])->name('maintenance-fwpump.store');
        Route::get('maintenance/fwpump', [MainFWPumpContoller::class, 'index_fwpump'])->name('maintenance-fwpump.index');

        // === MAINTENANCE - HSD LEVEL
        Route::get('maintenance/hsdlevel/{id}', [MainHSDLevelContoller::class, 'chooise'])->name('maintenance-hsdlevel.chooise');
        Route::get('maintenance/hsdlevel/{id}/edit', [MainHSDLevelContoller::class, 'create_detail'])->name('maintenance-hsdlevel.create_detail');
        Route::post('maintenance/hsdlevel/store', [MainHSDLevelContoller::class, 'store'])->name('maintenance-hsdlevel.store');
        Route::get('maintenance/hsdlevel', [MainHSDLevelContoller::class, 'index_hsdlevel'])->name('maintenance-hsdlevel.index');

        // === MAINTENANCE - CO TURBINE
        Route::get('maintenance/coturbine/{id}', [MainCOTurbineContoller::class, 'chooise'])->name('maintenance-coturbine.chooise');
        Route::get('maintenance/coturbine/{id}/edit', [MainCOTurbineContoller::class, 'create_detail'])->name('maintenance-coturbine.create_detail');
        Route::post('maintenance/coturbine/store', [MainCOTurbineContoller::class, 'store'])->name('maintenance-coturbine.store');
        Route::get('maintenance/coturbine', [MainCOTurbineContoller::class, 'index_coturbine'])->name('maintenance-coturbine.index');

        // === MAINTENANCE - CO BOILER
        Route::get('maintenance/coboiler/{id}', [MainCOBoilerContoller::class, 'chooise'])->name('maintenance-coboiler.chooise');
        Route::get('maintenance/coboiler/{id}/edit', [MainCOBoilerContoller::class, 'create_detail'])->name('maintenance-coboiler.create_detail');
        Route::post('maintenance/coboiler/store', [MainCOBoilerContoller::class, 'store'])->name('maintenance-coboiler.store');
        Route::get('maintenance/coboiler', [MainCOBoilerContoller::class, 'index_coboiler'])->name('maintenance-coboiler.index');

        // === MAINTENANCE - CO COMMON
        Route::get('maintenance/cocommon/{id}', [MainCOCommonContoller::class, 'chooise'])->name('maintenance-cocommon.chooise');
        Route::get('maintenance/cocommon/{id}/edit', [MainCOCommonContoller::class, 'create_detail'])->name('maintenance-cocommon.create_detail');
        Route::post('maintenance/cocommon/store', [MainCOCommonContoller::class, 'store'])->name('maintenance-cocommon.store');
        Route::get('maintenance/cocommon', [MainCOCommonContoller::class, 'index_cocommon'])->name('maintenance-cocommon.index');

       
        // Route::post('/', [TaskScheduleController::class, 'destroy'])->name('schedule.destroy');

        // NEW REGISTER
        Route::get('new_register', [NewRegisterController::class, 'new_register'])->name('new-register');
        Route::post('process_registration', [NewRegisterController::class, 'processRegistration'])->name('process-registration');


        // ==== DOWNLOADS
        Route::get('data_laporan/burner/download/{id}', [CrudBurner::class, 'download'])->name('admin.download_burner');

    });


Auth::routes();


Route::get('/', function(){
    return view('auth.login');
});


