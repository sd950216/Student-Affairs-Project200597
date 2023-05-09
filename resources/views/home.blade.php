@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row pt-3">
        <div class="col ps-4">
            <!-- <h1 class="display-6 mb-3"><i class="ms-auto bi bi-grid"></i> Dashboard</h1> -->
            <div class="row dashboard">
                <div class="col">
                    <div class="card rounded-pill">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold"><i class="bi bi-person-lines-fill me-3"></i> <a href="/list/students" style="text-decoration: none;
  color: black;">Total Students</a></div>
                                </div>
                                <span class="badge bg-dark rounded-pill">{{$students}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card rounded-pill">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">
                                        <i class="bi bi-person-lines-fill me-3"></i><a href="/list/doctors" style="text-decoration: none;color: black;">Total Doctors</a></div>
                                </div>
                                <span class="badge bg-dark rounded-pill">{{$doctors}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card rounded-pill">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold"><i class="bi bi-diagram-3 me-3"></i> <a href="/list/courses" style="text-decoration: none;color: black;">Total Courses</a></div>
                                </div>
                                <span class="badge bg-dark rounded-pill">{{$courses}}</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row align-items-md-stretch mt-4">
                <div class="col">
                    <div class="p-3 text-white bg-dark rounded-3">
                        <h3>Welcome to Trap System!</h3>
                        <p><i class="bi bi-emoji-heart-eyes"></i> Thanks for your love and support.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="p-3 bg-white border rounded-3" style="height: 100%;">
                        <h3>Manage colleague better</h3>
                        <p class="text-end">with <i class="bi bi-lightning"></i> <a href="https://github.com/changeweb/Unifiedtransform" target="_blank" style="text-decoration: none;">Unifiedtransform</a> <i class="bi bi-lightning"></i>.</p>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-6">
                    <div class="card mb-3">
                        <div class="card-header bg-transparent"><i class="bi bi-calendar-event me-2"></i> Events</div>
                        <div class="card-body text-dark">
                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css">
                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

                            <div id="full_calendar_events" class="fc fc-unthemed fc-ltr"><div class="fc-toolbar fc-header-toolbar"><div class="fc-left"><div class="fc-button-group"><button type="button" class="fc-prev-button fc-button fc-state-default fc-corner-left" aria-label="prev"><span class="fc-icon fc-icon-left-single-arrow"></span></button><button type="button" class="fc-next-button fc-button fc-state-default fc-corner-right" aria-label="next"><span class="fc-icon fc-icon-right-single-arrow"></span></button></div></div><div class="fc-right"><div class="fc-button-group"><button type="button" class="fc-month-button fc-button fc-state-default fc-corner-left fc-state-active">month</button><button type="button" class="fc-agendaWeek-button fc-button fc-state-default">week</button><button type="button" class="fc-agendaDay-button fc-button fc-state-default fc-corner-right">day</button></div></div><div class="fc-center"><h2>May 2023</h2></div><div class="fc-clear"></div></div><div class="fc-view-container" style=""><div class="fc-view fc-month-view fc-basic-view" style=""><table class=""><thead class="fc-head"><tr><td class="fc-head-container fc-widget-header"><div class="fc-row fc-widget-header" style="border-right-width: 1px; margin-right: 16px;"><table class=""><thead><tr><th class="fc-day-header fc-widget-header fc-sun"><span>Sun</span></th><th class="fc-day-header fc-widget-header fc-mon"><span>Mon</span></th><th class="fc-day-header fc-widget-header fc-tue"><span>Tue</span></th><th class="fc-day-header fc-widget-header fc-wed"><span>Wed</span></th><th class="fc-day-header fc-widget-header fc-thu"><span>Thu</span></th><th class="fc-day-header fc-widget-header fc-fri"><span>Fri</span></th><th class="fc-day-header fc-widget-header fc-sat"><span>Sat</span></th></tr></thead></table></div></td></tr></thead><tbody class="fc-body"><tr><td class="fc-widget-content"><div class="fc-scroller fc-day-grid-container" style="overflow: hidden scroll; height: 333px;"><div class="fc-day-grid fc-unselectable"><div class="fc-row fc-week fc-widget-content fc-rigid"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-other-month fc-past" data-date="2023-04-30"></td><td class="fc-day fc-widget-content fc-mon fc-past" data-date="2023-05-01"></td><td class="fc-day fc-widget-content fc-tue fc-past" data-date="2023-05-02"></td><td class="fc-day fc-widget-content fc-wed fc-past" data-date="2023-05-03"></td><td class="fc-day fc-widget-content fc-thu fc-past" data-date="2023-05-04"></td><td class="fc-day fc-widget-content fc-fri fc-past" data-date="2023-05-05"></td><td class="fc-day fc-widget-content fc-sat fc-past" data-date="2023-05-06"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-other-month fc-past" data-date="2023-04-30"><span class="fc-day-number">30</span></td><td class="fc-day-top fc-mon fc-past" data-date="2023-05-01"><span class="fc-day-number">1</span></td><td class="fc-day-top fc-tue fc-past" data-date="2023-05-02"><span class="fc-day-number">2</span></td><td class="fc-day-top fc-wed fc-past" data-date="2023-05-03"><span class="fc-day-number">3</span></td><td class="fc-day-top fc-thu fc-past" data-date="2023-05-04"><span class="fc-day-number">4</span></td><td class="fc-day-top fc-fri fc-past" data-date="2023-05-05"><span class="fc-day-number">5</span></td><td class="fc-day-top fc-sat fc-past" data-date="2023-05-06"><span class="fc-day-number">6</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content fc-rigid"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-past" data-date="2023-05-07"></td><td class="fc-day fc-widget-content fc-mon fc-past" data-date="2023-05-08"></td><td class="fc-day fc-widget-content fc-tue fc-today " data-date="2023-05-09"></td><td class="fc-day fc-widget-content fc-wed fc-future" data-date="2023-05-10"></td><td class="fc-day fc-widget-content fc-thu fc-future" data-date="2023-05-11"></td><td class="fc-day fc-widget-content fc-fri fc-future" data-date="2023-05-12"></td><td class="fc-day fc-widget-content fc-sat fc-future" data-date="2023-05-13"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-past" data-date="2023-05-07"><span class="fc-day-number">7</span></td><td class="fc-day-top fc-mon fc-past" data-date="2023-05-08"><span class="fc-day-number">8</span></td><td class="fc-day-top fc-tue fc-today " data-date="2023-05-09"><span class="fc-day-number">9</span></td><td class="fc-day-top fc-wed fc-future" data-date="2023-05-10"><span class="fc-day-number">10</span></td><td class="fc-day-top fc-thu fc-future" data-date="2023-05-11"><span class="fc-day-number">11</span></td><td class="fc-day-top fc-fri fc-future" data-date="2023-05-12"><span class="fc-day-number">12</span></td><td class="fc-day-top fc-sat fc-future" data-date="2023-05-13"><span class="fc-day-number">13</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content fc-rigid"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-future" data-date="2023-05-14"></td><td class="fc-day fc-widget-content fc-mon fc-future" data-date="2023-05-15"></td><td class="fc-day fc-widget-content fc-tue fc-future" data-date="2023-05-16"></td><td class="fc-day fc-widget-content fc-wed fc-future" data-date="2023-05-17"></td><td class="fc-day fc-widget-content fc-thu fc-future" data-date="2023-05-18"></td><td class="fc-day fc-widget-content fc-fri fc-future" data-date="2023-05-19"></td><td class="fc-day fc-widget-content fc-sat fc-future" data-date="2023-05-20"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-future" data-date="2023-05-14"><span class="fc-day-number">14</span></td><td class="fc-day-top fc-mon fc-future" data-date="2023-05-15"><span class="fc-day-number">15</span></td><td class="fc-day-top fc-tue fc-future" data-date="2023-05-16"><span class="fc-day-number">16</span></td><td class="fc-day-top fc-wed fc-future" data-date="2023-05-17"><span class="fc-day-number">17</span></td><td class="fc-day-top fc-thu fc-future" data-date="2023-05-18"><span class="fc-day-number">18</span></td><td class="fc-day-top fc-fri fc-future" data-date="2023-05-19"><span class="fc-day-number">19</span></td><td class="fc-day-top fc-sat fc-future" data-date="2023-05-20"><span class="fc-day-number">20</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content fc-rigid"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-future" data-date="2023-05-21"></td><td class="fc-day fc-widget-content fc-mon fc-future" data-date="2023-05-22"></td><td class="fc-day fc-widget-content fc-tue fc-future" data-date="2023-05-23"></td><td class="fc-day fc-widget-content fc-wed fc-future" data-date="2023-05-24"></td><td class="fc-day fc-widget-content fc-thu fc-future" data-date="2023-05-25"></td><td class="fc-day fc-widget-content fc-fri fc-future" data-date="2023-05-26"></td><td class="fc-day fc-widget-content fc-sat fc-future" data-date="2023-05-27"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-future" data-date="2023-05-21"><span class="fc-day-number">21</span></td><td class="fc-day-top fc-mon fc-future" data-date="2023-05-22"><span class="fc-day-number">22</span></td><td class="fc-day-top fc-tue fc-future" data-date="2023-05-23"><span class="fc-day-number">23</span></td><td class="fc-day-top fc-wed fc-future" data-date="2023-05-24"><span class="fc-day-number">24</span></td><td class="fc-day-top fc-thu fc-future" data-date="2023-05-25"><span class="fc-day-number">25</span></td><td class="fc-day-top fc-fri fc-future" data-date="2023-05-26"><span class="fc-day-number">26</span></td><td class="fc-day-top fc-sat fc-future" data-date="2023-05-27"><span class="fc-day-number">27</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content fc-rigid"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-future" data-date="2023-05-28"></td><td class="fc-day fc-widget-content fc-mon fc-future" data-date="2023-05-29"></td><td class="fc-day fc-widget-content fc-tue fc-future" data-date="2023-05-30"></td><td class="fc-day fc-widget-content fc-wed fc-future" data-date="2023-05-31"></td><td class="fc-day fc-widget-content fc-thu fc-other-month fc-future" data-date="2023-06-01"></td><td class="fc-day fc-widget-content fc-fri fc-other-month fc-future" data-date="2023-06-02"></td><td class="fc-day fc-widget-content fc-sat fc-other-month fc-future" data-date="2023-06-03"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-future" data-date="2023-05-28"><span class="fc-day-number">28</span></td><td class="fc-day-top fc-mon fc-future" data-date="2023-05-29"><span class="fc-day-number">29</span></td><td class="fc-day-top fc-tue fc-future" data-date="2023-05-30"><span class="fc-day-number">30</span></td><td class="fc-day-top fc-wed fc-future" data-date="2023-05-31"><span class="fc-day-number">31</span></td><td class="fc-day-top fc-thu fc-other-month fc-future" data-date="2023-06-01"><span class="fc-day-number">1</span></td><td class="fc-day-top fc-fri fc-other-month fc-future" data-date="2023-06-02"><span class="fc-day-number">2</span></td><td class="fc-day-top fc-sat fc-other-month fc-future" data-date="2023-06-03"><span class="fc-day-number">3</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content fc-rigid"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-other-month fc-future" data-date="2023-06-04"></td><td class="fc-day fc-widget-content fc-mon fc-other-month fc-future" data-date="2023-06-05"></td><td class="fc-day fc-widget-content fc-tue fc-other-month fc-future" data-date="2023-06-06"></td><td class="fc-day fc-widget-content fc-wed fc-other-month fc-future" data-date="2023-06-07"></td><td class="fc-day fc-widget-content fc-thu fc-other-month fc-future" data-date="2023-06-08"></td><td class="fc-day fc-widget-content fc-fri fc-other-month fc-future" data-date="2023-06-09"></td><td class="fc-day fc-widget-content fc-sat fc-other-month fc-future" data-date="2023-06-10"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-other-month fc-future" data-date="2023-06-04"><span class="fc-day-number">4</span></td><td class="fc-day-top fc-mon fc-other-month fc-future" data-date="2023-06-05"><span class="fc-day-number">5</span></td><td class="fc-day-top fc-tue fc-other-month fc-future" data-date="2023-06-06"><span class="fc-day-number">6</span></td><td class="fc-day-top fc-wed fc-other-month fc-future" data-date="2023-06-07"><span class="fc-day-number">7</span></td><td class="fc-day-top fc-thu fc-other-month fc-future" data-date="2023-06-08"><span class="fc-day-number">8</span></td><td class="fc-day-top fc-fri fc-other-month fc-future" data-date="2023-06-09"><span class="fc-day-number">9</span></td><td class="fc-day-top fc-sat fc-other-month fc-future" data-date="2023-06-10"><span class="fc-day-number">10</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div></div></div></td></tr></tbody></table></div></div></div>

                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mb-3">
                        <div class="card-header bg-transparent d-flex justify-content-between"><span><i class="bi bi-megaphone me-2"></i> Notices</span> </div>
                        <div class="card-body p-0 text-dark">
                            <div>
                                <div class="accordion accordion-flush" id="noticeAccordion">
                                    <div class="p-3">No notices</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
