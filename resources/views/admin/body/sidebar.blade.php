@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();

@endphp

<aside class="main-sidebar">

  <!-- sidebar-->
  <section class="sidebar">

    <div class="user-profile">
      <div class="ulogo">
        <a href="index.html">
          <!-- logo for regular state and mobile devices -->
          <div class="d-flex align-items-center justify-content-center">
            <img src="{{asset('backend/images/waterfall_institute_logo.png')}}" style="width: 38px;" alt="">
            <h3><b>Waterfall </b>Insititute</h3>
          </div>
        </a>
      </div>
    </div>

    <!-- sidebar menu-->
    <ul class="sidebar-menu" data-widget="tree">
      @can('lecStudentView', App\Models\User::class)
      <li class="{{ ($route == 'announcements.view')?'active':'' }}">
        <a href="{{route('announcements.view')}}">
          <i data-feather="home"></i>
          <span>Dashboard</span>
        </a>
      </li>
      @endcan
      @can('adminView', App\Models\User::class)
      <li class="treeview {{ ($prefix == '/dashboard')?'active':'' }}">
        <a href="#">
          <i data-feather="home"></i>
          <span>Dashboard</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('dashboard')}}"><i class="ti-more"></i>Home</a></li>
          <li><a href="{{route('announcements.view') }}"><i class="ti-more"></i>Announcements</a></li>
        </ul>
      </li>
      @endcan
      @can('adminView', App\Models\User::class)
      <li class="treeview {{ ($prefix == '/users')?'active':'' }}">
        <a href="#">
          <i data-feather="folder-plus"></i>
          <span>Manage Users</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('user.view')}}"><i class="ti-more"></i>View User</a></li>
          <li><a href="{{route('user.add') }}"><i class="ti-more"></i>Add User</a></li>
        </ul>
      </li>
      @endcan

      <li class="treeview {{ ($prefix == '/profile')?'active':'' }}">
        <a href="#">
          <i data-feather="camera"></i> <span>Manage Profile</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('profile.view')}}"><i class="ti-more"></i>Your Profile</a></li>
          <li><a href="{{route('password.view')}}"><i class="ti-more"></i>Change Password</a></li>
        </ul>
      </li>

      <li class="treeview {{ ($prefix == '/setup')?'active':'' }}">
        <a href="#">
          <i data-feather="loader"></i> <span>Setup Management</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          @can('adminView', App\Models\User::class)
          <li><a href="{{route('student.course.view')}}"><i class="ti-more"></i>Student Course</a></li>
          <li><a href="{{route('student.unit.view')}}"><i class="ti-more"></i>Student Unit</a></li>
          <li><a href="{{route('student.year.view')}}"><i class="ti-more"></i>Student Year</a></li>
          @endcan

          <li><a href="{{route('student.group.view')}}"><i class="ti-more"></i>Student Group</a></li>

          <li><a href="{{route('student.shift.view')}}"><i class="ti-more"></i>Student Shift</a></li>

          @can('lecAdminView', App\Models\User::class)
          <li><a href="{{route('fee.category.view')}}"><i class="ti-more"></i>Fee Category</a></li>
          <li><a href="{{route('fee.amount.view')}}"><i class="ti-more"></i>Fee Category Amount</a></li>
          <li><a href="{{route('exam.type.view')}}"><i class="ti-more"></i>Exam Type</a></li>
          @endcan

          @can('adminView', App\Models\User::class)
          <li><a href="{{route('assign.unit.view')}}"><i class="ti-more"></i>Assign Unit</a></li>
          <li><a href="{{route('designation.view')}}"><i class="ti-more"></i>Designation</a></li>
          <li><a href="{{route('room.view')}}"><i class="ti-more"></i>Room</a></li>
          @endcan

          <li><a href="{{route('lesson.view')}}"><i class="ti-more"></i>Lessons</a></li>
        </ul>
      </li>

      <li class="treeview {{ ($prefix == '/student')?'active':'' }}">
        <a href="#">
          <i data-feather="book"></i> <span>Student Management</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          @can('adminView', App\Models\User::class)
          <li><a href="{{route('student.registration.view')}}"><i class="ti-more"></i>Student Registration</a></li>
          @endcan
          @can('lecAdminView', App\Models\User::class)
          <li><a href="{{route('student.attendance.view')}}"><i class="ti-more"></i>Student Attendance</a></li>
          <li><a href="{{route('roll.generate.view')}}"><i class="ti-more"></i>Roll Generation</a></li>
          @endcan

          <li><a href="{{route('registration.fee.view')}}"><i class="ti-more"></i>Registration Fee</a></li>
          <li><a href="{{route('semester.fee.view')}}"><i class="ti-more"></i>Semester Fee</a></li>
          <li><a href="{{route('exam.fee.view')}}"><i class="ti-more"></i>Exam Fee</a></li>

        </ul>
      </li>
      @can('lecAdminView', App\Models\User::class)
      <li class="treeview {{ ($prefix == '/marks')?'active':'' }}">
        <a href="#">
          <i data-feather="check-square"></i> <span>Marks Management</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('marks.entry.add')}}"><i class="ti-more"></i>Mark Entry</a></li>
          <li><a href="{{route('marks.entry.grade')}}"><i class="ti-more"></i>Mark Grade</a></li>
          <li><a href="{{route('marksheet.generate.view')}}"><i class="ti-more"></i>Marksheet Generator</a></li>

        </ul>
      </li>
      @endcan

      @can('adminView', App\Models\User::class)
      <li class="treeview {{ ($prefix == '/employee')?'active':'' }}">
        <a href="#">
          <i data-feather="users"></i> <span>Employee Management</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('employee.registration.view')}}"><i class="ti-more"></i>Employee Registration</a></li>
          <li><a href="{{route('employee.salary.view')}}"><i class="ti-more"></i>Employee Salary</a></li>
          <li><a href="{{route('employee.leave.view')}}"><i class="ti-more"></i>Employee Leave</a></li>
          <li><a href="{{route('employee.attendance.view')}}"><i class="ti-more"></i>Employee Attendance</a></li>

        </ul>
      </li>
      @endcan

      @can('adminView', App\Models\User::class)
      <li class="treeview {{ ($prefix == '/employee')?'active':'' }}">
        <a href="#">
          <i data-feather="log-in"></i> <span>Admissions</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('applications.view')}}"><i class="ti-more"></i>View Applications</a></li>


        </ul>
      </li>
      @endcan

      @can('onlyStudent', App\Models\User::class)
      <li class="treeview {{ ($prefix == '/mpesa')?'active':'' }}">
        <a href="#">
      <li><a href="{{route('mpesa.payment.view')}}"><i class="ti-wallet"></i>Make Fee Payment</a></li>

      </a>
      <ul class="treeview-menu">
      </ul>
      </li>
      @endcan


      <li class="header nav-small-cap">---------------------------------------------------------</li>





      <li>
        <a href="{{ route('admin.logout') }}">
          <i data-feather="lock"></i>
          <span>Log Out</span>
        </a>
      </li>
      <li>

    </ul>
  </section>


</aside>