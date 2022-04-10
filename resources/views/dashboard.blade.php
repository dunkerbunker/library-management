@extends('layout.layout')

@section('content')
<div class=" all d-flex flex-column justify-content-center align-items-center"> 
    <div class="custom-shape-divider-bottom-1648996474">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
            <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
            <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
        </svg>
    </div>
    <div class=" image d-flex flex-column justify-content-center align-items-center"> 
        <img src = "{{ asset('/images/logo.png') }}"  height="250" width="250" />
    </div>
    <h2 class="main text-center">Welcome to the Dashboard!</h2>
    <div class="btn-toolbar">
        <a href="/admin/book-details">
            <button type="button" class="btn btn-primary m-3">Book Details</button>
        </a>
        <a href="/admin/borrowers">
            <button type="button" class="btn btn-primary m-3">Borrowers</button>
        </a>
        <a href="/admin/book-issue">
            <button type="button" class="btn btn-primary m-3">Book Issue</button>
        </a>
        <a href="/admin/book-return">
            <button type="button" class="btn btn-primary m-3">Book Returns</button>
        </a>
        <a href="/admin/late-return">
            <button type="button" class="btn btn-primary m-3">Late Returns</button>
        </a>
        <a href="/admin/users">
            <button type="button" class="btn btn-primary m-3">Users</button>
        </a>
        <a href="/admin/login-information">
            <button type="button" class="btn btn-primary m-3">Login Information</button>
        </a>
    </div>
</div>


<style>

html, body {
  margin: 0;
  height: 100%;
  overflow: hidden
}

.main{
    color: #4723D9;
    font-size: 3.5em;
    font-weight: bold;
    margin-top: 40px;
    padding-bottom: 100px;
}
.image{
    padding-top: 60px;

}
.custom-shape-divider-bottom-1648996474 {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    overflow: hidden;
    line-height: 0;
    transform: rotate(180deg);
}

.custom-shape-divider-bottom-1648996474 svg {
    position: relative;
    display: block;
    width: calc(168% + 1.3px);
    height: 346px;
}

.custom-shape-divider-bottom-1648996474 .shape-fill {
    fill: #4723D9;
}

</style>


@endsection      
