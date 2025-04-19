<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garage Management</title>
    <link href="https://cdn.jsdelivr.net/npm/fontico.css/fontico.css" rel="stylesheet" />
    <link rel="icon" href="path/to/your/favicon.ico" />


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        
        /* Sidebar Styles */
       /* Scrollable Sidebar */
.sidebar {
    width: 250px;
    height: 100vh;
    background-color: #000000;
    color: white;
    position: fixed;
    transition: all 0.3s ease;
    z-index: 999;
    overflow-y: auto; /* Enable vertical scroll */
}

.sidebar::-webkit-scrollbar {
    width: 4px;
}

.sidebar::-webkit-scrollbar-thumb {
    background-color: #555;
    border-radius: 5px;
}

.sidebar a, .sidebar .dropdown-toggle {
    color: white;
    padding: 12px 20px;
    display: flex;
    width: auto;
    align-items: center;
    text-decoration: none;
    font-size: 16px;
    transition: all 0.3s ease;
}

.sidebar .dropdown-menu {
    background-color: #000000; /* Same as sidebar */
    width: 100%; /* Match width with other sidebar links */
    border: none; /* Remove default border */
}

.sidebar .dropdown-item {
    color: white;
    padding-left: 3rem; /* Adjust padding as needed */
}


.sidebar .dropdown-item:hover {
    background-color: #495057;
}


        .sidebar a {
            color: white;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            text-decoration: none;
            font-size: 15px;
            transition: all 0.3s ease;
        }

        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background-color: #495057;
            border-left: 4px solid #007bff;
        }

        .sidebar a i {
            margin-right: 10px;
        }

        /* Sidebar Toggle */
        .sidebar-toggle {
            display: none;
            cursor: pointer;
            background-color: #343a40;
            padding: 10px 15px;
            color: white;
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 20px;
            border-radius: 5px;
        }

        /* Close Button inside Sidebar */
        .sidebar-close-btn {
            display: none;
            cursor: pointer;
            /* background-color: #ff3b3b; */
            color:#ff3b3b;
                font-size: 42px;
                border-radius: 101%;
                position: absolute;
                top: 1px;
                right: 4px;
        }

        /* Content Styles */
        .content {
            margin-left: 260px;
            padding-top: 20px;
            transition: all 0.3s ease;
        }

        /* Topbar Styles */
        .topbar {
            background-color: #495057;
            padding: 15px;
            color: white;
            text-align: right;
            height: 60px;
            font-size: 16px;
            font-weight: bold;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }
       

        .topbar .menu-toggle {
            font-size: 22px;
            cursor: pointer;
            color: white;
            display: none;
        }

        /* Responsive Styles */
        @media (max-width: 868px) {
            .sidebar {
                width: 0;
                overflow: hidden;
            }
            .content {
                margin-left: 0;
            }
            .sidebar-toggle {
                display: block;
            }
            .topbar .menu-toggle {
                display: block;
            }

            /* Display close button only on mobile */
            .sidebar-close-btn {
                display: block;
            }
        }
        .collapse {
            visibility: visible !important;
            display: none; /* Bootstrap ka default behavior */
        }
        
        .collapse.show {
            display: block !important;
        }

           @media (min-width: 868px) {
               .datahai{
                   position:fixed;
                   background-color: #000000;
                   
               }
               .datatoto{
                   padding-top:2.8rem;
                   
               }
              
           }
    </style>
</head>
<body>

   <!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="">
        <a href="/dashboard" class="p-0 datahai">
            <div class="p-3 fs-5 ps-4 pe-2 fs-bolder datahai2">
                Garage Management
            </div>
        </a>
    </div>
    <div class=" datatoto">
        
    </div>
    {{-- Check if the user is authenticated --}}
    @if(Auth::check())
        {{-- Check if the user role is 'admin' --}}
        @if(Auth::user()->role === 'admin')
            {{-- Admin links --}}
            <a href="{{ route('dashboard') }}" class="nav-link" style="margin-top: 20px;"> 🏠 Dashboard</a>
            <!-- <a href="{{ route('dashboard') }}" class="nav-link" style="margin-top: 20px;"><i class="fas fa-home"></i> 🏠Dashboard</a> -->
            <a href="{{ route('vehicle-checkin.create') }}" class="nav-link"> 📑  Job Cards</a>
             <!--<a href="{{ route('vehicle-checklist.index') }}" class="nav-link">🚗 Checklist & Estimat</a> -->
            <a href="{{ route('customer-complaints.index') }}" class="nav-link">  💬 Customer Complaints</a>
            <!-- <a href="{{ route('vehicle-checkin.index') }}" class="nav-link"><i class="fas fa-car"></i>  🚗 Vehicle Check-in</a> -->
            <!--<a href="{{ route('job-cards.index') }}" class="nav-link">📑  Job Cards</a>-->
            <a href="{{ route('inspections.index') }}" class="nav-link"> 📝  Inspections - Estimat </a>
            <!-- <a href="{{ route('job-cards.index') }}" class="nav-link"><i class="fas fa-file-alt"></i> Job Cards</a> -->
            <!-- <a href="{{ route('customer-complaints.index') }}" class="nav-link"><i class="fas fa-comments"></i> Customer Complaints</a> -->
            <!--<a href="{{ route('estimated-inspections.index') }}" class="nav-link"> 📝  Estimated Inspections</a>-->
            <!-- <a href="{{ route('estimated-inspections.index') }}" class="nav-link"><i class="fas fa-clipboard"></i> Estimated Inspections</a> -->

            <a href="{{ route('drawbacks.index') }}" class="nav-link"> ⚠️ Drawbacks</a>
            <!-- <a href="{{ route('drawbacks.index') }}" class="nav-link"><i class="fas fa-exclamation-triangle"></i> Drawbacks</a> -->
            <a href="{{ route('drawback-parts.index') }}" class="nav-link"> 🛠️  Drawbacks-parts</a>
            <!-- <a href="{{ route('drawback-parts.index') }}" class="nav-link"><i class="fas fa-tools"></i>  Drawbacks-parts</a> -->
            <a href="{{ route('work_assignments.index') }}" class="nav-link"> ▶️  Work Assignmet</a>
             <a href="{{ route('purchases.index') }}" class="nav-link"> 🛒   Purchase</a>
            <!--<a href="{{ route('work-starts.index') }}" class="nav-link"> ▶️  Work Starts</a>-->
            <!-- <a href="{{ route('work-starts.index') }}" class="nav-link"><i class="fas fa-play-circle"></i>  Work Starts</a> -->
            <a href="{{ route('final-bills.index') }}" class="nav-link">🧾 Final Bill</a>
            <!-- <a href="{{ route('final-bills.index') }}" class="nav-link"><i class="fas fa-file-invoice"></i> Final Bill</a> -->
            <a href="{{ route('profit-reports.index') }}" class="nav-link"> 📊 Profit Reports</a>
            <!-- <a href="{{ route('profit-reports.index') }}" class="nav-link"><i class="fas fa-chart-bar"></i>Profit Reports</a> -->
            <!-- <a href="/" class="nav-link"><i class="fas fa-shopping-cart"></i>  Purchase</a> -->
               
           <a class="nav-link" data-bs-toggle="collapse" href="#employeeManagement" role="button" aria-expanded="false" aria-controls="employeeManagement">👥 EmployeeManagement ▼</a>

            <div class="collapse" id="employeeManagement">
                <a class="nav-link ps-4 ms-5" href="{{ route('employees.index') }}">👥 Employees</a>
                <a class="nav-link ps-4 ms-5" href="{{ route('attendance.index') }}">✔️ Attendance</a>
                <a class="nav-link ps-4 ms-5" href="{{ route('leave.index') }}">📝 Leave</a>
            </div>



            
            <!-- Salary Management Collapse -->
            <a class="nav-link" data-bs-toggle="collapse" href="#salaryManagement" role="button" aria-expanded="false" aria-controls="salaryManagement">
                💰 Salary Management ▼
            </a>
            <div class="collapse" id="salaryManagement">
                <a class="nav-link ps-4 ms-5" href="/salaries">✔️ Salary</a>
                <a class="nav-link ps-4 ms-5" href="/vendors">📝 Vendor Payment</a>
            </div>

          
            <a href="#" class="nav-link"> ⚙️  Settings</a>
            <!-- <a href="#" class="nav-link"><i class="fas fa-cogs"></i> ⚙️  Settings</a> -->
        @else
            {{-- User links (limited to only Customer Complaints) --}}
            <a href="{{ route('dashboard') }}" class="nav-link" style="margin-top: 20px;"><i class="fas fa-home"></i>  Dashboard</a>
            <a href="{{ route('vehicle-checkin.index') }}" class="nav-link"><i class="fas fa-car"></i> Vehicle Check-in</a>
            <a href="{{ route('customer-complaints.index') }}" class="nav-link"><i class="fas fa-comments"></i>  Customer Complaints</a>
             <!-- Employee Management Collapse for Users -->
            <a class="nav-link" data-bs-toggle="collapse" href="#userEmployeeManagement" role="button" aria-expanded="false" aria-controls="userEmployeeManagement">
                👥 EmployeeManagement▼
            </a>
            <div class="collapse" id="userEmployeeManagement">
                <a class="nav-link ps-4 ms-5" href="{{ route('attendance.index') }}">✔️ Attendance</a>
                <a class="nav-link ps-4 ms-5" href="{{ route('leave.index') }}">📝 Leave</a>
            </div>
            <a href="#" class="nav-link"><i class="fas fa-cogs"></i> ⚙️ Settings</a>
        @endif

        {{-- Logout link --}}
        <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display: none;">
            @csrf
        </form>

        <a href="#" class="nav-link" onclick="document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i>  Logout
        </a>
    @endif

    <!-- Close Button inside Sidebar -->
    <span class="sidebar-close-btn" onclick="closeSidebar()">×</span>
</div>


    <!-- Topbar -->
    <div class="topbar d-flex justify-content-between align-items-center ">
        <span class="menu-toggle" onclick="toggleSidebar()">☰ Menu</span>

        <div class="d-flex align-items-center ms-auto">
            <div>
                <!-- Welcome, Admin -->
                @include('layouts.navigation')
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="content">
        @yield('content')
    </div>

    <script>
        // Sidebar Toggle Function for Mobile View
        function toggleSidebar() {
            var sidebar = document.getElementById("sidebar");
            if (sidebar.style.width === "250px") {
                sidebar.style.width = "0";
            } else {
                sidebar.style.width = "250px";
            }
        }

        // Close Sidebar Function
        function closeSidebar() {
            var sidebar = document.getElementById("sidebar");
            sidebar.style.width = "0";
        }

        // Highlight Active Navigation
        $(document).ready(function() {
            var currentURL = window.location.href;
            $(".sidebar a").each(function() {
                if (this.href === currentURL) {
                    $(this).addClass("active");
                }
            });
        });
        
        
     document.addEventListener("DOMContentLoaded", function () {
        var collapseElements = document.querySelectorAll('.collapse');
        
        collapseElements.forEach(function (collapse) {
            collapse.addEventListener('shown.bs.collapse', function () {
                console.log('Collapse opened:', this.id);
            });
            collapse.addEventListener('hidden.bs.collapse', function () {
                console.log('Collapse closed:', this.id);
            });
        });
    });


    </script>

</body>
</html>
