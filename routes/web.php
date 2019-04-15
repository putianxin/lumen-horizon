<?php

use Illuminate\Support\Facades\Route;


// Dashboard Routes...
Route::group(['prefix'=>'api'],function(){
    Route::get('/stats', ['as'=>'horizon.stats.index','uses'=>'DashboardStatsController@index']);
//
//// Workload Routes...
    Route::get('/workload', ['as'=>'horizon.workload.index','uses'=>'WorkloadController@index']);
//
//// Master Supervisor Routes...
    Route::get('/masters', ['as'=>'horizon.masters.index','uses'=>'MasterSupervisorController@index']);
//
//// Monitoring Routes...
    Route::get('/monitoring', ['as'=>'horizon.monitoring.index','uses'=>'MonitoringController@index']);
    Route::post('/monitoring', ['as'=>'horizon.monitoring.store','uses'=>'MonitoringController@store']);
    Route::get('/monitoring/{tag}', ['as'=>'horizon.monitoring-tag.paginate','uses'=>'MonitoringController@paginate']);
    Route::delete('/monitoring/{tag}', ['as'=>'horizon.monitoring-tag.destroy','uses'=>'MonitoringController@destroy']);
//
//// Job Metric Routes...
    Route::get('/metrics/jobs', ['as'=>'horizon.jobs-metrics.index','uses'=>'JobMetricsController@index']);
    Route::get('/metrics/jobs/{id}', ['as'=>'horizon.jobs-metrics.show','uses'=>'JobMetricsController@show']);
//
//// Queue Metric Routes...
    Route::get('/metrics/jobs', ['as'=>'horizon.queues-metrics.index','uses'=>'QueueMetricsController@index']);
    Route::get('/metrics/jobs/{id}', ['as'=>'horizon.queues-metrics.show','uses'=>'QueueMetricsController@show']);
//
//// Job Routes...
    Route::get('/jobs/recent', ['as'=>'horizon.recent-jobs.index','uses'=>'RecentJobsController@index']);
    Route::get('/jobs/failed', ['as'=>'horizon.failed-jobs.index','uses'=>'FailedJobsController@index']);
    Route::get('/jobs/failed/{id}', ['as'=>'horizon.failed-jobs.show','uses'=>'FailedJobsController@show']);
    Route::post('/jobs/retry/{id}', ['as'=>'horizon.retry-jobs.show','uses'=>'RetryController@store']);
});

//
//// Catch-all Route...
//Route::get('/{view?}', 'HomeController@index')->where('view', '(.*)')->name('horizon.index');
Route::get('/dashboard', ['as'=>'horizon.index','uses'=>'HomeController@index']);