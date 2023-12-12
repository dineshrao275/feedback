<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\FacultyFeedbackController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TopicController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [StudentController::class, 'index'])->name('student_info');

// user authentication
Route::post('loginDetails', [UserController::class, 'authenticate'])->name('loginDetails');
Route::get('login', [UserController::class, 'checkLogin'])->name('admin.login');

// Forgot password
Route::get('forgot_password', [ForgetPasswordController::class, 'index'])->name('forgot.password');
Route::post('reset_password_link', [ForgetPasswordController::class, 'resetPasswordLink'])->name('reset.password.link');
Route::get('reset-password/{token}', [ForgetPasswordController::class, 'resetPassword'])->name('reset.password');
Route::post('reset_password_store', [ForgetPasswordController::class, 'resetPasswordStore'])->name('reset.password.store');



// Route group for Authenticate user
Route::group(['middleware' => 'auth'], function () {
    // dashboard
    Route::get('dashboard', [DashboardController::class, 'showData'])->name('admin.dashboard');

    // faculty
    Route::get('faculties', [FacultyController::class, 'index'])->name('admin.faculties');
    Route::get('faculty_table', [FacultyController::class, 'getFaculties'])->name('admin.faculty_table');
    Route::get('faculty_table_data', [FacultyController::class, 'getFacultiesData'])->name('admin.faculty_table_data');
    Route::post('newfaculty', [FacultyController::class, 'addUpdateFaculty'])->name('newfaculty');
    Route::get('edit_faculty', [FacultyController::class, 'getFaculty'])->name('    ');
    Route::get('delete_faculty', [FacultyController::class, 'deleteFaculty'])->name('delete_faculty');

    // subject
    Route::get('subjects', [SubjectController::class, 'index'])->name('admin.subjects');
    Route::get('subject_table', [SubjectController::class, 'subjectTable'])->name('admin.subject_table');
    Route::get('sutdent_table_data', [SubjectController::class, 'subjectTableData'])->name('admin.sutdent_table_data');
    Route::post('add_update_subject', [SubjectController::class, 'addUpdate'])->name('add_update_subject');
    Route::get('get_courses', [SubjectController::class, 'get_courses'])->name('get_subject_courses');
    Route::get('get_type', [SubjectController::class, 'getCourseType'])->name('get_type');
    Route::get('get_subjects_faculties', [SubjectController::class, 'getFaculties'])->name('get_subjects_faculties');
    Route::get('edit_subject', [SubjectController::class, 'getSubject'])->name('edit_subject_id');
    Route::get('delete_subject', [SubjectController::class, 'deleteSubject'])->name('delete_subject');

    // courses
    Route::get('courses', [CourseController::class, 'index'])->name('admin.courses');
    Route::get('course_table', [CourseController::class, 'getCourses'])->name('admin.course_table');
    Route::get('course_table_data', [CourseController::class, 'courseTableData'])->name('admin.course_table_data');
    Route::post('add_update_course', [CourseController::class, 'addUpdate'])->name('add_update_course');
    Route::get('edit_course', [CourseController::class, 'getCourse'])->name('edit_course_id');
    Route::get('delete_course', [CourseController::class, 'deleteCourse'])->name('delete_course');

    // topic
    Route::get('topics', [TopicController::class, 'index'])->name('admin.topics');
    Route::get('topic_table', [TopicController::class, 'getTopics'])->name('admin.topic_table');
    Route::get('topic_table_data', [TopicController::class, 'topicTableData'])->name('admin.topic_table_data');
    Route::post('add_update_topic', [TopicController::class, 'addUpdate'])->name('add_update_topic');
    Route::get('edit_topic', [TopicController::class, 'getTopic'])->name('get_topic');
    Route::get('delete_topic', [TopicController::class, 'deleteTopic'])->name('delete_topic');

    // student
    Route::get('student_table', [StudentController::class, 'studentTable'])->name('admin.student_table');
    Route::get('student_table_data', [StudentController::class, 'studentTableData'])->name('admin.student_table_data');

    // admin-user
    Route::get('profile', [UserController::class, 'index'])->name('admin.profile');
    Route::get('create_user', [UserController::class, 'createUserPage'])->name('admin.create_user');
    Route::post('newuser', [UserController::class, 'createNewUser'])->name('newUser');
    Route::post('updateuser', [UserController::class, 'change_profile'])->name('updateprofile');
    Route::post('change_password', [UserController::class, 'change_password'])->name('change_password');
    Route::get('logout', [UserController::class, 'logout'])->name('admin.logout');
    Route::get('user_table_data', [UserController::class, 'userTableData'])->name('admin.user_table_data');
    Route::get('delete_user', [UserController::class, 'deleteUser'])->name('admin.delete_user');

    // feedback
    Route::get('faculty_wise', [FacultyFeedbackController::class, 'getFacultyData'])->name('report.facultywise');
    Route::get('faculty_report/{id}', [FacultyFeedbackController::class, 'getFacultyFeedbackData'])->name('admin.faculty.report');
    Route::get('course_wise', [FacultyFeedbackController::class, 'getCourseData'])->name('admin.coursewise');
    Route::get('course_report/{id}', [FacultyFeedbackController::class, 'getCourseFeedbackData'])->name('admin.course.report');
});

// data for student table
Route::get('get_course_type', [SubjectController::class, 'getCourseType'])->name('get.course.type');
Route::get('get_section_student', [SubjectController::class, 'getSection'])->name('get_section_student');
Route::get('get_feedbackdata_student', [SubjectController::class, 'getFeedbackData'])->name('get_feedbackdata_student');
Route::post('/feedbackDetails', [FeedbackController::class, 'newFeedback'])->name('new.feedback');
