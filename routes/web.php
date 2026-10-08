<?php

use App\Http\Controllers\{
    MainController,
    AboutController,
    ProductController,
    TechnologyController,
    InvestorController,
    GovernanceController,
    CsrController,
    WeController,
    UnitOfWorkController
};

use App\Http\Controllers\Admin\{
    AuthController,
    AdminController,
    HomeController,
    AdminProductController,
    CareerController,
    ManagementController
};

use App\Http\Controllers\Admin\Investor\{
    RupsController,
    AnnualReportController,
    FinancialController,
    // FinancialHightLightController,
    // StockController,
    // DevidentController,
    // NewsController
};

use App\Http\Controllers\Admin\{
    FeedbackController,
    NewsController,
    TestimoniController
};

use App\Http\Controllers\Admin\CSR\{
    EnvController,
    SafetyController,
    SosialController
};

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Scalar\Encapsed;

Route::controller(AboutController::class)->name("about-us")->prefix("about-us")->group(function(){
    Route::redirect('/', '/summary');
    Route::get('/summary', 'summary')->name(".summary");
    Route::get('/profile', 'profile')->name(".profile");
    Route::get('/management', 'management')->name(".management");
    Route::get('/corporate-structure', 'corporateStructure')->name(".corporate-structure");
    
});

Route::controller(UnitOfWorkController::class)->name("uow")->prefix("business-unit")->group(function(){
    Route::redirect('/', '/business-unit/summary');
    Route::get('/summary', 'summary');
    Route::get('/sidoagung-agro-prima', 'agroprima');
    Route::get('/sidoagung-farm', 'farm');
    Route::get('/sidosari-multi-farm', 'sidosari');
    Route::get('/asia-pangan-utama', 'asiapangan');
    Route::get('/sidoagung-food', 'food');
});

Route::controller(ProductController::class)->name("products")->prefix("products")->group(function(){
    Route::redirect('/', '/summary');
    Route::get('/summary', 'summary')->name(".summary");
    Route::get('/feed', 'feed')->name(".feed");
    Route::get('/day-old-chick', 'dayOldChick')->name(".day-old-chick");
    Route::get('/live-bird', 'liveBird')->name(".live-bird");
    Route::get('/broilers', 'broilers')->name(".broilers");
    Route::get('/processed-food', 'processedFood')->name(".processed-food");

    Route::get('/get-product/{id}', 'get');
    Route::post('/sendFaq', 'faq')->name(".faq");
});

Route::controller(TechnologyController::class)->name("technology")->prefix("technology")->group(function(){
    Route::get('/', 'index');
    Route::get('/halal-blockchain', 'halalBlockchain')->name(".halal-blockchain");
    Route::get('/smart-farm', 'smartFarm')->name(".smart-farm");
    Route::get('/pineapple', 'pineapple')->name(".pineapple");
});

Route::controller(InvestorController::class)->name("investor")->prefix("investor")->group(function(){
    Route::redirect('/', '/summary');
    Route::get('/summary', 'summary')->name(".summary");
    Route::get('/rups', 'rups')->name(".rups");
    Route::get('/annual-report', 'annualReport')->name(".annual-report");
    Route::get('/financial-statement', 'financialStatement')->name(".financial-statement");
    Route::get('/financial-hightlight', 'financialHightlight')->name(".financial-hightlight");
    Route::get('/stock-information-chronologies', 'stockInformationChronologies')->name(".stock-information-chronologies");
    Route::get('/devidend-information', 'devidendInformation')->name(".devidend-information");
    Route::get('/news', 'news')->name(".news");

    Route::get('/stock-information', 'stockInformation')->name(".stock-information");
    Route::get('/stock-realtime', 'stockRealtime')->name(".stock-realtime");

    Route::get('/annual-report-2019', 'annualReport2019')->name(".annual-report-2019");
    Route::get('/annual-report-2018', 'annualReport2018')->name(".annual-report-2018");
    Route::get('/annual-report-2017', 'annualReport2017')->name(".annual-report-2017");
});

Route::controller(GovernanceController::class)->name("governance")->prefix("governance")->group(function(){
    Route::redirect('/', '/summary');
    Route::get('/summary', 'summary')->name(".summary");
    Route::get('/charter', 'charter')->name(".charter");
    Route::get('/audit-commitee', 'auditCommitee')->name(".audit-commitee");
    Route::get('/whistleblowing-system', 'whistleblowingSystem')->name(".whistleblowing-system");
    Route::get('/risk-management', 'riskManagement')->name(".risk-management");
});

Route::controller(CsrController::class)->name("csr")->prefix("csr")->group(function(){
    Route::redirect('/', '/summary');
    Route::get('/summary', 'summary')->name(".summary");
    Route::get('/education', 'education')->name(".education");
    Route::get('/safety', 'safety')->name(".safety");
    Route::get('/sosial', 'sosial')->name(".sosial");
    Route::get('/news', 'news')->name(".news");

    Route::get('/getList', 'getList')->name(".getList");
    Route::get('/getDetail', 'getDetail')->name(".getDetail");
});

Route::controller(WeController::class)->name("we")->prefix("talk-us")->group(function(){
    Route::redirect('/', '/summary');
    Route::get('/summary', 'summary')->name(".summary");
    Route::post('/sent-question', 'question')->name(".question");
    Route::get('/join-us', 'joinUs')->name(".join-us");
    Route::get('/be-our-partner', 'beOurPartner')->name(".be-our-partner");
    Route::get('/career/{id?}', 'career')->name(".career");
    Route::get('/career-apply/{id}', 'apply')->name(".career.apply");
    Route::post('/job-apply', 'saveApply')->name(".job-apply");

    Route::post('/join-as-partner', 'joinAsPartner')->name(".join-as-partner");
});

Route::controller(MainController::class)->name("main")->group(function (){
    Route::get('/', "index")->middleware("visitor");
    Route::get('/getResource/{id}', "getResource")->name(".getResource");
    Route::prefix("data")->group(function(){
        Route::get("/testimoni", "testimoni");
    });
});

Route::prefix("wongelek")->group(function (){

    Route::controller(AuthController::class)->group(function (){
        Route::get("/", function(){
            return redirect()->route("login");
        });
        Route::match(["get", "post"], "/login", "login")->name("login");
        Route::get("logout", "logout")->name("logout");
    });

    Route::middleware(['auth'])->name("admin")->group(function (){
        Route::get("/main", [AdminController::class, "main"])->name(".main");

        Route::controller(AdminController::class)->prefix("users")->name(".users")->group(function(){
            Route::get("/", "userList");
            Route::get("/remove/{id}", "remove");
            Route::get("/getOne/{id}", "getOne");
            Route::post("/save", "save");
        });

        Route::controller(HomeController::class)->prefix("home")->name(".home")->group(function(){
            Route::prefix("banner")->name(".banner")->group(function(){
                Route::get("/", "bannerList");
                Route::get("/remove/{id}", "bannerRemove");
                Route::get("/publish/{id}", "bannerPublish");
                Route::post("/save", "bannerSave");
            });
            Route::prefix("banner-menu")->name(".banner-menu")->group(function(){
                Route::get("/", "bannerMenuList");
                Route::get("/removeMenu/{id}", "bannerMenuRemove");
                Route::get("/publishMenu/{id}", "bannerMenuPublish");
                Route::post("/saveMenu", "bannerMenuSave");
            });
        });

        Route::controller(AdminProductController::class)->prefix("product")->name(".product")->group(function(){
            Route::get("/", "list");
            Route::get("/get/{id}", "get");
            Route::get("/remove/{id}", "remove");
            Route::get("/publish/{id}", "publish");
            Route::post("/save", "save");
        });

        Route::prefix("investor")->name(".investor")->group(function(){
            Route::controller(RupsController::class)->prefix("rups")->name(".rups")->group(function(){
                Route::get("/", "list");
                Route::get("/getOne/{id}", "getOne");
                Route::get("/remove/{id}", "remove");
                Route::get("/publish/{id}", "publish");
                Route::post("/save", "save");
            });

            Route::controller(AnnualReportController::class)->prefix("laporantahunan")->name(".laporantahunan")->group(function(){
                Route::get("/", "list");
                Route::get("/remove/{id}", "remove");
                Route::get("/publish/{id}", "publish");
                Route::post("/save", "save");
            });

            Route::controller(FinancialController::class)->prefix("laporankeuangan")->name(".laporantahunan")->group(function(){
                Route::get("/", "list");
                Route::get("/remove/{id}", "remove");
                Route::get("/publish/{id}", "publish");
                Route::post("/save", "save");
            });

        });

        Route::controller(FeedbackController::class)->prefix("feedback")->name(".feedback")->group(function(){
            Route::prefix("karir")->name(".karir")->group(function(){
                Route::get("/", "careerList");
                Route::get("/applicants/{careerId}", "getApplicants");
                Route::get("/getApplicant/{id}", "getApplicant");
                Route::get("/approveApp/{id}", "approveApp");
                Route::post("/rejectApp", "rejectApp");
                Route::get("/download-cv/{id}", "downloadCV");
            });
            Route::prefix("pertanyaan")->name(".pertanyaan")->group(function(){
                Route::get("/", "faqList");
                Route::get("/get", "faqGet");
                Route::get("/replied", "faqReplied");
            });
            Route::prefix("mitra")->name(".mitra")->group(function(){
                Route::get("/", "mitraList");
                Route::get("/get/{id}", "mitraGet");
                Route::get("/replied/{id}", "mitraReplied");
            });
        });

        Route::controller(CareerController::class)->prefix("karir")->name(".karir")->group(function(){
            Route::get("/", "list");
            Route::get("/add", "add");
            Route::get("/edit/{id}", "edit");
            Route::get("/form", "form");
            Route::post("/save", "save");
            Route::get("/delete/{id}", "delete");
        });

        Route::prefix("csr")->name(".csr")->group(function(){
            Route::controller(EnvController::class)->prefix("env")->name(".env")->group(function(){
                Route::get("/", "list");
                Route::get("/add", "add");
                Route::get("/edit/{id}", "edit");
                Route::get("/form", "form");
                Route::post("/save", "save");
                Route::get("/delete/{id}", "delete");
                Route::get("/publish/{id}", "publish");
            });

            Route::controller(SafetyController::class)->prefix("safety")->name(".safety")->group(function(){
                Route::get("/", "list");
                Route::get("/add", "add");
                Route::get("/edit/{id}", "edit");
                Route::get("/form", "form");
                Route::post("/save", "save");
                Route::get("/delete/{id}", "delete");
                Route::get("/publish/{id}", "publish");
            });

            Route::controller(SosialController::class)->prefix("sosial")->name(".sosial")->group(function(){
                Route::get("/", "list");
                Route::get("/add", "add");
                Route::get("/edit/{id}", "edit");
                Route::get("/form", "form");
                Route::post("/save", "save");
                Route::get("/delete/{id}", "delete");
                Route::get("/publish/{id}", "publish");
            });

        });

        Route::controller(NewsController::class)->prefix("news")->name(".news")->group(function(){
            Route::get("/", "list");
            Route::get("/add", "add");
            Route::get("/edit/{id}", "edit");
            Route::get("/form", "form");
            Route::post("/save", "save");
            Route::get("/delete/{id}", "delete");
        });

        Route::controller(TestimoniController::class)->prefix("testimoni")->name(".testimoni")->group(function(){
            Route::get("/", "list");
            Route::get("/remove/{id}", "remove");
            Route::post("/save", "save");
        });

        Route::controller(ManagementController::class)->prefix("management")->name(".management")->group(function(){
            Route::get("/", "list");
            Route::get("/add", "add");
            Route::get("/edit/{id}", "edit");
            Route::get("/form", "form");
            Route::post("/save", "save");
            Route::get("/delete/{id}", "delete");
        });
        
    });   

    
});

Route::prefix("sagversion")->group(function (){

    Route::get("/pip", function(){
        return response()->json([
            "LatestVersion" => "3.0.0",
            "ReleaseDate" => "2026-05-01",
            "ChangeLog" => "SAG Contract Farming Versi Terbaru telah dirilis, Mohon segera update.",
            //"DownloadUrl" => "https://app.box.com/s/s1ljt1iz9iys23wog29jtoxq4v6nfhs2",
			"DownloadUrl" => "https://sidoagunggroup.com/download-pip/v3.0.0-Contract-Farming-2026-04-22.apk",

            "IsUnderMaintenance" => false,
            "MaintenanceMessage" => "Server Under Maintenance. Mohon Tunggu.",
            "MaintenanceStart" => "2026-04-22 16:00:00",
            "MaintenanceEnd" => "2026-04-22 17:00:00",
        ]);
    });

    Route::get("/ams", function(){
        return response()->json([
            "LatestVersion" => "3.0.0",
            "ReleaseDate" => "2026-05-01",
            "ChangeLog" => "SAG Contract Farming Versi Terbaru telah dirilis, Mohon segera update.",
            "DownloadUrl" => "https://sidoagunggroup.com/download-ams/v3.0.0-Contract-Farming-2026-04-22.apk",

            "IsUnderMaintenance" => false,
            "MaintenanceMessage" => "Server Under Maintenance. Mohon Tunggu.",
            "MaintenanceStart" => "2026-04-22 20:00:00",
            "MaintenanceEnd" => "2026-04-22 21:00:00",
        ]);
    });
});

Route::get("/download-pip/{filename}", function($filename){
	
	$filePath = public_path('androids/pip/' . $filename);
	$headers = [
		'Content-Type: application/vnd.android.package-archive',
	];
	
	if (file_exists($filePath)) {
		return response()->download($filePath, $filename, $headers);
	} 
	
	abort(404, 'File not found');
		
});

