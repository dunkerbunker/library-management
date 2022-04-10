@extends('layout.layout')

@section('title', 'Login-Information')

@section('content')
<div class="container mt-4 mb-4 d-flex justify-content-center">
    <div class="custom-shape-divider-bottom-1648996474">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
            <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
            <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
        </svg>
    </div>
    <div class="card border-dark p-4">
        <div class=" image d-flex flex-column justify-content-center align-items-center"> 
            <button class="btn btn-secondary"> 
                <img src = "{{ asset('/images/profile.png') }}"  height="100" width="100" />
            </button> 

            <span class="name mt-3">{{ $LoggedUserInfo['name'] }}</span> 


            <div class="d-flex flex-row justify-content-center align-items-center gap-2"> 
                <span class="idd1">Staff ID: {{ $LoggedUserInfo['staff_id'] }}</span> 
            </div>
        </div>

        <div class="d-flex flex-row mt-4 px-3"> 
                <span class="number">Other information</span> 
        </div>
        <br>
        <div class="line"></div>
        <br>

        <div class="list-group list-group-flush"> 
            <li class="list-group-item">Phone number: {{ $LoggedUserInfo['phone_no'] }}</li>
            <li class="list-group-item">Username: {{ $LoggedUserInfo['username'] }}</li>
        </div>

        <br>

        <div class=" image d-flex flex-column justify-content-center align-items-center"> 
            <div class=" px-2 rounded mt-4 date "> 
                <span class="join">{{  date('Y-m-d H:i:s'); }}</span> 
            </div>
        </div>
    </div>
</div>
<style>
    .container{
        align-items: center;
        min-height: 85vh;
        padding-bottom: 2rem;
    }
    html, body {
    margin: 0;
    height: 100%;
    overflow: hidden
    }
    * {
        margin: 0;
        padding: 0
    }

    .list-group{
        color:#4723D9;
    }

    .line{
        width: 100%;
        height: 1px;
        background-color: #4723D9;
    }

    body {
        background-color: #4723D9
    }

    .card {
        width: 350px;
        background-color: #F7F6FB;
        cursor: pointer;
        transition: all 0.5s;
    }

    .image img {
        transition: all 0.5s
    }

    .card:hover .image img {
        transform: scale(1.5)
    }

    .btn {
        height: 140px;
        width: 140px;
        border-radius: 50%
    }

    .name {
        font-size: 22px;
        font-weight: bold;
        text-align: center;
        color: #4723D9;
    }

    .idd {
        font-size: 14px;
        font-weight: 600
    }

    .idd1 {
        font-size: 16px;
        padding: 20px;
        font-weight: 600;
    }

    .number {
        font-size: 16px;
        text-align: left;
        color:#4723D9;
    }

    .follow {
        font-size: 12px;
        font-weight: 500;
        color: #4723D9
    }

    .btn1 {
        height: 40px;
        width: 150px;
        border: none;
        background-color: #000;
        color: #4723D9;
        font-size: 15px
    }

    .text span {
        font-size: 13px;
        color: #4723D9;
        font-weight: 500
    }

    .icons i {
        font-size: 19px
    }

    hr .new1 {
        border: 1px solid
    }

    .join {
        font-size: 14px;
        color: #fff;
        font-weight: bold
    }

    .date {
        background-color: #4723D9
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