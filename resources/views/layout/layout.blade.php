<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>@yield('title', 'Dashboard')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" ></script>

        
    
    <body class="bg-light" id="body-pd">
        <header class="header" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
            <div class="header_img"> <img src="{{ asset('/images/logo.png') }}" alt=""> </div>
            <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div> 
                    <a href="/" class="nav_logo">
                        <i class='bx bx-layer nav_logo-icon'></i> 
                        <span class="nav_logo-name">Maldives Public <br> Library</span> 
                    </a>

                    <div class="nav_list">
                         <a href="/" class="nav_link {{ Request::is('/') ? 'active' : '' }}"> 
                            <i class='bx bx-grid-alt nav_icon'></i>
                            <span class="nav_name">Dashboard</span> 
                         </a> 

                        <a href="/admin/book-details" class="nav_link {{ Request::path() ==  'admin/book-details' ? 'active' : ''  }}"> 
                            <i class='bx bx-book-content nav_icon'></i> 
                            <span class="nav_name">Book Details</span> 
                        </a> 

                        <a href="/admin/borrowers" class="nav_link {{ Request::path() ==  'admin/borrowers' ? 'active' : ''  }}"> 
                            <i class='bx bx-book-reader nav_icon'></i> 
                            <span class="nav_name">Borrowers</span> 
                        </a> 
                        
                        <a href="/admin/book-issue" class="nav_link {{ Request::path() ==  'admin/book-issue' ? 'active' : ''  }}"> 
                            <i class='bx bx-podcast nav_icon'></i> 
                            <span class="nav_name">Book Issue</span> 
                        </a> 
                        
                        <a href="/admin/book-return" class="nav_link {{ Request::path() ==  'admin/book-return' ? 'active' : ''  }}" > 
                            <i class='bx bx-book nav_icon'></i> 
                            <span class="nav_name">Book Returns</span> 
                        </a> 
                        
                        <a href="/admin/late-return" class="nav_link {{ Request::path() ==  'admin/late-return' ? 'active' : ''  }}"> 
                            <i class='bx bx-alarm-exclamation nav_icon'></i> 
                            <span class="nav_name">Late Returns</span> 
                        </a> 

                        <a href="/admin/users" class="nav_link {{ Request::path() ==  'admin/users' ? 'active' : ''  }}"> 
                            <i class='bx bx-group nav_icon'></i> 
                            <span class="nav_name">Users</span> 
                        </a>

                        <a href="/admin/login-information" class="nav_link {{ Request::path() ==  'admin/login-information' ? 'active' : ''  }}" > 
                            <i class='bx bx-user nav_icon'></i> 
                            <span class="nav_name">Login Information</span> 
                        </a>
                    </div>
                </div> <a href="{{ route('auth.logout') }}" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
            </nav>
        </div>
        </header>
        <!--Container Main start-->
        <div class="height-100">
            @section('content')
            @show
        </div>

        
    
    </body>

    <style>
            :root {
                --header-height: 4rem;
                --nav-width: 68px;
                --first-color: #4723D9;
                --first-color-light: #AFA5D9;
                --white-color: #F7F6FB;
                --body-font: 'Nunito', sans-serif;
                --normal-font-size: 1rem;
                --z-fixed: 100
            }

            *,
            ::before,
            ::after {
                box-sizing: border-box
            }

            body {
                position: relative;
                margin: var(--header-height) 0 0 0;
                padding: 0 1rem;
                font-family: var(--body-font);
                font-size: var(--normal-font-size);
                transition: .5s
            }

            a {
                text-decoration: none
            }

            .header {
                width: 100%;
                height: var(--header-height);
                position: fixed;
                top: 0;
                left: 0;
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 0 1rem;
                background-color: var(--white-color);
                z-index: var(--z-fixed);
                transition: .5s
            }

            .header_toggle {
                color: var(--first-color);
                font-size: 1.5rem;
                cursor: pointer
            }

            .header_img {
                width: 50px;
                height: 50px;
                display: flex;
                justify-content: center;
                border-radius: 50%;
                overflow: hidden
            }

            .header_img img {
                width: 40px
            }

            .l-navbar {
                position: fixed;
                top: 0;
                left: -40%;
                width: var(--nav-width);
                height: 100vh;
                background-color: var(--first-color);
                padding: .5rem 1rem 0 0;
                transition: .5s;
                z-index: var(--z-fixed)
            }

            .nav {
                height: 100%;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                overflow: hidden
            }

            .nav_logo,
            .nav_link {
                display: grid;
                grid-template-columns: max-content max-content;
                align-items: center;
                column-gap: 1rem;
                padding: .5rem 0 .5rem 1.5rem
            }

            .nav_logo {
                margin-bottom: 2rem
            }

            .nav_logo-icon {
                font-size: 1.25rem;
                color: var(--white-color)
            }

            .nav_logo-name {
                color: var(--white-color);
                font-weight: 700
            }

            .nav_link {
                position: relative;
                color: var(--first-color-light);
                margin-bottom: 1.5rem;
                transition: .3s
            }

            .nav_link:hover {
                color: var(--white-color)
            }

            .nav_icon {
                font-size: 1.25rem
            }

            .show {
                left: 0
            }

            .body-pd {
                padding-left: calc(var(--nav-width) + 1rem)
            }

            .active {
                color: var(--white-color)
            }

            .active::before {
                content: '';
                position: absolute;
                left: 0;
                width: 2px;
                height: 32px;
                background-color: var(--white-color)
            }

            .height-100 {
                height: 100vh
            }

            @media screen and (min-width: 768px) {
                body {
                    margin: calc(var(--header-height) + 1rem) 0 0 0;
                    padding-left: calc(var(--nav-width) + 2rem)
                }

                .header {
                    height: calc(var(--header-height) + 1rem);
                    padding: 0 2rem 0 calc(var(--nav-width) + 2rem)
                }

                .header_img {
                    width: 40px;
                    height: 40px
                }

                .header_img img {
                    width: 45px
                }

                .l-navbar {
                    left: 0;
                    padding: 1rem 1rem 0 0
                }

                .show {
                    width: calc(var(--nav-width) + 156px)
                }

                .body-pd {
                    padding-left: calc(var(--nav-width) + 188px)
                }
            }
        </style>

        <script>
            document.addEventListener("DOMContentLoaded", function(event) {

            const showNavbar = (toggleId, navId, bodyId, headerId) =>{
            const toggle = document.getElementById(toggleId),
            nav = document.getElementById(navId),
            bodypd = document.getElementById(bodyId),
            headerpd = document.getElementById(headerId)

            // Validate that all variables exist
            if(toggle && nav && bodypd && headerpd){
            toggle.addEventListener('click', ()=>{
            // show navbar
            nav.classList.toggle('show')
            // change icon
            toggle.classList.toggle('bx-x')
            // add padding to body
            bodypd.classList.toggle('body-pd')
            // add padding to header
            headerpd.classList.toggle('body-pd')
            })
            }
            }

            showNavbar('header-toggle','nav-bar','body-pd','header')

            /*===== LINK ACTIVE =====*/
            const linkColor = document.querySelectorAll('.nav_link')

            function colorLink(){
            if(linkColor){
            linkColor.forEach(l=> l.classList.remove('active'))
            this.classList.add('active')
            }
            }
            linkColor.forEach(l=> l.addEventListener('click', colorLink))

            // Your code to run since DOM is loaded and ready
            });
        </script>
</html>