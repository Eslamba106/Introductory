<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\News;
use App\Models\Artical;
use App\Models\Knowledge;
use App\Models\Employment;
use App\Models\ListSetting;
use App\Models\NewsCategory;
use App\Models\GeneralSetting;
use App\Models\KnowledgeCategory;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // $general_settings = GeneralSetting::first();
        // $blog_departments = Blog::take(4)->get();
        // $blog_artical = Artical::take(6)->get();
        // $news_category = NewsCategory::take(3)->get();
        // $news = News::take(3)->get();
        // $knowledge_category = KnowledgeCategory::take(3)->get();
        // $knowledge_center   = Knowledge::take(3)->get();
        // $jobs = Employment::take(6)->get();
        // $list_settings = ListSetting::first();
        // $general_settings = GeneralSetting::first();
        // if ($general_settings) {
        //     View::share('general_settings', $general_settings);
        // }
        // if ($blog_departments) {
        //     View::share('blog_departments', $blog_departments);
        // }
        // if ($blog_artical) {
        //     View::share('blog_artical', $blog_artical);
        // }
        // if ($news_category) {
        //     View::share('news_category', $news_category);
        // }
        // if ($news) {
        //     View::share('news', $news);
        // }
        // if ($knowledge_category) {
        //     View::share('knowledge_category', $knowledge_category);
        // }
        // if ($knowledge_center) {
        //     View::share('knowledge_center', $knowledge_center);
        // }
        // if ($jobs) {
        //     View::share('jobs', $jobs);
        // }
        // if ($list_settings) {
        //     View::share('list_settings', $list_settings);
        // }

        Paginator::useBootstrapFour();
    }
}
